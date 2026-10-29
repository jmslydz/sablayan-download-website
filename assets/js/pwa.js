(() => {
  'use strict';

  const baseUrl = new URL(document.currentScript.dataset.baseUrl, location.href);
  const installButton = document.querySelector('#pwa-install');
  const status = document.querySelector('#pwa-status');
  const instructions = document.querySelector('#pwa-instructions');
  const offlineNotice = document.querySelector('#offline-notice');
  const standalone = window.matchMedia('(display-mode: standalone)');
  let installPrompt = null;

  const messages = {
    usingInstalled: 'You’re using the installed Sablayan page.',
    manualInstall: 'In Chrome, tap the three dots (⋮), then Install app or Add to Home screen.',
    secureLink: 'Open the school’s secure link (https://) in Chrome, then follow the steps in this guide.',
    requested: 'Installation requested. Follow your browser’s instructions to finish.',
    dismissed: 'You can install later using your browser’s menu.',
    promptFailed: 'Use your browser’s menu to install this page.',
    installed: 'Sablayan is installed. Open it from your home screen or apps.',
    offlineFailed: 'Offline access is unavailable right now. Reconnect and reload to try again.'
  };

  function setStatus(key) {
    status.textContent = messages[key];
  }

  function isInstalled() {
    return standalone.matches || navigator.standalone === true;
  }

  function updateInstalledState() {
    if (isInstalled()) {
      installPrompt = null;
      installButton.hidden = true;
      setStatus('usingInstalled');
    }
  }

  window.addEventListener('beforeinstallprompt', event => {
    event.preventDefault();
    if (isInstalled()) return;
    installPrompt = event;
    installButton.hidden = false;
  });

  installButton.addEventListener('click', async () => {
    if (!installPrompt) {
      instructions.querySelector('h3').focus();
      setStatus(window.isSecureContext ? 'manualInstall' : 'secureLink');
      return;
    }
    const prompt = installPrompt;
    installPrompt = null;
    installButton.disabled = true;
    try {
      await prompt.prompt();
      const choice = await prompt.userChoice;
      setStatus(choice.outcome === 'accepted' ? 'requested' : 'dismissed');
    } catch (error) {
      setStatus('promptFailed');
    } finally {
      installButton.disabled = false;
    }
  });

  window.addEventListener('appinstalled', () => {
    installPrompt = null;
    installButton.hidden = true;
    setStatus('installed');
  });
  standalone.addEventListener('change', updateInstalledState);
  updateInstalledState();

  function updateConnection() {
    offlineNotice.hidden = navigator.onLine;
  }
  window.addEventListener('online', updateConnection);
  window.addEventListener('offline', updateConnection);
  updateConnection();

  document.addEventListener('click', event => {
    if (!navigator.onLine && event.target.closest('[data-download]')) {
      event.preventDefault();
      event.stopImmediatePropagation();
      document.querySelector('#offline-dialog').showModal();
    }
  }, true);

  if ('serviceWorker' in navigator && window.isSecureContext && baseUrl.origin === location.origin) {
    navigator.serviceWorker.register(new URL('sw.js', baseUrl), {
      scope: baseUrl.pathname,
      updateViaCache: 'none'
    }).catch(error => {
      console.warn('Sablayan offline setup failed:', error);
      setStatus('offlineFailed');
    });
  }
})();
