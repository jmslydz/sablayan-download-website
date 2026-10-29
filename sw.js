'use strict';

// Bump this version whenever the offline files change.
const CACHE_PREFIX = 'sablayan-pwa-' + self.registration.scope + '::';
const CACHE_NAME = CACHE_PREFIX + 'v10';
const urlFor = path => new URL(path, self.registration.scope).href;
const HOME = urlFor('./');
const OFFLINE = urlFor('offline.html');
const ASSETS = [
  'offline.html',
  'manifest.webmanifest',
  'assets/css/landing.css',
  'assets/js/landing.js',
  'assets/js/pwa.js',
  'assets/images/school-logo-white-year.png',
  'assets/images/icon-192.png',
  'assets/images/icon-512.png',
  'assets/images/icon-maskable-512.png',
  'assets/images/apple-touch-icon.png'
].map(urlFor);

self.addEventListener('install', event => {
  event.waitUntil(caches.open(CACHE_NAME).then(cache => cache.addAll([HOME, ...ASSETS])));
  // Allow an existing version to finish serving its open tabs before updating.
});

self.addEventListener('activate', event => {
  event.waitUntil((async () => {
    const names = await caches.keys();
    await Promise.all(names.filter(name => name.startsWith(CACHE_PREFIX) && name !== CACHE_NAME)
      .map(name => caches.delete(name)));
    await self.clients.claim();
  })());
});

self.addEventListener('fetch', event => {
  const request = event.request;
  const url = new URL(request.url);
  if (request.method !== 'GET' || url.origin !== self.location.origin
      || !url.href.startsWith(self.registration.scope)) return;

  const isHome = !url.search && (url.href === HOME || url.href === urlFor('index.php'));
  const isAsset = ASSETS.includes(url.href);
  if (request.mode !== 'navigate' && !isAsset) return;

  event.respondWith((async () => {
    const cache = await caches.open(CACHE_NAME);
    try {
      // Network first keeps the configured download link and page content fresh.
      const response = await fetch(request);
      if (response.ok && !response.redirected && (isHome || isAsset)) {
        try {
          await cache.put(isHome ? HOME : request, response.clone());
        } catch (error) {
          // Storage limits must not prevent a successful online response.
        }
      }
      return response;
    } catch (error) {
      const cached = await cache.match(isHome ? HOME : request);
      if (cached) return cached;
      // Download redirects and other dynamic routes are never cached.
      if (request.mode === 'navigate') return cache.match(OFFLINE);
      return Response.error();
    }
  })());
});
