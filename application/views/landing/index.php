<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="theme-color" content="#064c35"><meta name="description" content="Stay connected to Sablayan National Comprehensive High School. Explore the school app, features, and download guide."><title>Sablayan National Comprehensive High School · School App</title>
<link rel="stylesheet" href="<?= html_escape(base_url('assets/css/landing.css')) ?>">
<link rel="manifest" href="<?= html_escape(base_url('manifest.webmanifest')) ?>">
<link rel="icon" type="image/png" href="<?= html_escape(base_url('assets/images/icon-192.png')) ?>">
<link rel="apple-touch-icon" href="<?= html_escape(base_url('assets/images/apple-touch-icon.png')) ?>">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="apple-mobile-web-app-title" content="Sablayan">
</head>
<body>
<svg class="icons" xmlns="http://www.w3.org/2000/svg"><symbol id="download" viewBox="0 0 24 24"><path d="M12 3v12m-4-4 4 4 4-4M4 16v5h16v-5"/></symbol><symbol id="book" viewBox="0 0 24 24"><path d="M12 6c-3-3-8-2-9-1v15c3-2 6-2 9 0 3-2 6-2 9 0V5c-1-1-6-2-9 1zm0 0v14"/></symbol><symbol id="bell" viewBox="0 0 24 24"><path d="M18 8a6 6 0 0 0-12 0c0 8-3 8-3 9h18c0-1-3-1-3-9M9 21h6M12 2V1"/></symbol><symbol id="shield" viewBox="0 0 24 24"><path d="m12 2 8 3v6c0 5-4 8-8 11-4-3-8-6-8-11V5zM8 11l3 3 5-6"/></symbol><symbol id="cap" viewBox="0 0 24 24"><path d="m2 8 10-5 10 5-10 5zM6 10v7c4 3 8 3 12 0v-7M22 8v8"/></symbol><symbol id="phone" viewBox="0 0 24 24"><rect x="6" y="2" width="12" height="20" rx="2"/><path d="M10 5h4M11 19h2"/></symbol><symbol id="check" viewBox="0 0 24 24"><path d="m5 12 4 4L19 6"/></symbol><symbol id="people" viewBox="0 0 24 24"><circle cx="9" cy="7" r="3"/><path d="M3 21v-3a6 6 0 0 1 12 0v3M16 4a3 3 0 0 1 0 6m2 4a5 5 0 0 1 3 4v3"/></symbol><symbol id="card" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 9h20M6 15h4"/></symbol><symbol id="menu" viewBox="0 0 24 24"><path d="M3 6h18M3 12h18M3 18h18"/></symbol></svg>
<a class="skip" href="#main">Skip to content</a>
<header class="nav-wrap"><div class="container nav"><a class="brand" href="<?= html_escape(base_url()) ?>" aria-label="Sablayan National Comprehensive High School home"><span><strong>SABLAYAN NATIONAL<br>COMPREHENSIVE HIGH SCHOOL</strong></span></a><button class="menu-button" aria-label="Open navigation" aria-expanded="false" aria-controls="navigation"><svg><use href="#menu"/></svg></button><nav class="nav-links" id="navigation" aria-label="Main navigation"><a href="#install-page">How to install</a><a href="#features">School app features</a><a href="#help">Need help?</a></nav></div></header>
<main id="main">
<p class="offline-notice" id="offline-notice" role="status" hidden>You’re offline. You can browse this saved page; app downloads need an internet connection.</p>
<section class="hero" aria-labelledby="hero-title"><div class="container hero-grid"><div class="hero-copy"><div class="eyebrow">Your school. One connection.</div><h1 id="hero-title"><span>A little closer to</span> <span>every part of your</span> <em>child’s school day.</em></h1><p>Explore the Sablayan school app and save this guide to your Android phone for easy access.</p><div class="hero-actions"><a class="button gold" href="#install-page"><svg aria-hidden="true"><use href="#phone"/></svg>View installation guide</a></div><div class="platform-note"><svg><use href="#phone"/></svg>For Android <span aria-hidden="true">·</span> For students & families</div><blockquote class="hero-quote">“Training Hands, Teaching Minds,<span> Touching Hearts, Transforming Lives.”</span></blockquote></div><div class="visual"><img class="hero-logo" src="<?= html_escape(base_url('assets/images/school-logo-white-year.png')) ?>" width="1254" height="1254" alt="Sablayan National Comprehensive High School emblem" fetchpriority="high"></div></div></section>
<div class="trust-strip"><div class="container trust-items"><div class="trust-item"><svg><use href="#bell"/></svg>Important updates, together</div><div class="trust-item"><svg><use href="#book"/></svg>A clearer view of progress</div><div class="trust-item"><svg><use href="#people"/></svg>Closer school–home connection</div><div class="trust-item"><svg><use href="#phone"/></svg>Easy access on Android</div></div></div>
<section class="section how pwa-guide" id="install-page" aria-labelledby="pwa-title" lang="en">
<div class="container how-grid">
<div class="how-intro">
<div class="eyebrow">A quick guide for parents</div>
<h2 id="pwa-title">Save this page<br>on your Android phone.</h2>
<p>Add the Sablayan download page to your home screen. No Play Store needed.</p>
<p><strong>Before you start:</strong> Turn on Wi-Fi or mobile data and use Google Chrome.</p>
<button class="button" id="pwa-install" type="button"><svg aria-hidden="true"><use href="#phone"/></svg>Install page</button>
<p class="pwa-install-note">This installs the download page, not the school’s Android app. It does not include a login, grades, or attendance records.</p>
<p id="pwa-status" role="status" aria-live="polite"></p>
</div>
<div id="pwa-instructions">
<h3 class="pwa-steps-title" tabindex="-1">Follow these steps in Chrome</h3>
<ol class="pwa-install-steps">
<li><strong>Open the page.</strong> Open this Sablayan page in Google Chrome on your Android phone.</li>
<li><strong>Tap Install page.</strong> Use the green <strong>Install page</strong> button in this guide. If no installation window opens, follow the Chrome menu instructions below.</li>
<li><strong>Confirm in Chrome.</strong> In the browser’s installation window, tap <strong>Install</strong> or <strong>Add</strong>.</li>
<li><strong>Open Sablayan.</strong> Find the new <strong>Sablayan icon</strong> on your home screen or in your list of apps. Tap it to open.</li>
</ol>
<p class="pwa-install-tip"><strong>No installation window?</strong> Tap Chrome’s <strong>⋮ menu</strong> at the top-right of the browser, then <strong>Install app</strong> or <strong>Add to Home screen</strong>. This is Chrome’s menu, not this website’s navigation. Continue with step 3.</p>
</div></div>
</section>
<section class="section" id="features"><div class="container"><div class="section-heading"><div><div class="eyebrow">About the school’s Android app</div><h2>Less searching.<br>More staying in the loop.</h2></div><p>These features belong to the separate school app. Installing this download page does not provide access to them.</p></div><div class="feature-grid"><article class="feature-card"><div class="feature-icon"><svg><use href="#bell"/></svg></div><h3>Alerts & announcements</h3><p>Keep important school notices, reminders, and campus updates within reach.</p></article><article class="feature-card"><div class="feature-icon"><svg><use href="#cap"/></svg></div><h3>Academics & grades</h3><p>Follow academic progress and stay informed about classes and assignments.</p></article><article class="feature-card"><div class="feature-icon"><svg><use href="#shield"/></svg></div><h3>Attendance & conduct</h3><p>Stay aware of attendance records and notices related to your child’s school day.</p></article><article class="feature-card"><div class="feature-icon"><svg><use href="#card"/></svg></div><h3>School transactions</h3><p>Find school-issued transaction updates and related reminders, when applicable.</p></article></div></div></section>
<section class="section" id="help"><div class="container faq-grid">
<div class="faq-intro"><div class="eyebrow">A little help</div><h2>Questions<br>about installing?</h2><p>For help with school accounts, contact your class adviser or the school administrator.</p></div>
<div class="faq-list">
<details open><summary>Where do I download the Android school app?</summary>
<?php if ($download_ready): ?>
<p>The school app is a separate download. Use the official link below, then follow the instructions on the download page.</p>
<a class="text-link" data-download href="<?= html_escape(site_url('download')) ?>">Download Android school app</a>
<?php else: ?>
<p>The school’s official Android download link is not available yet. You can still install this page for easy access. Ask the school administrator about the app’s availability.</p>
<?php endif; ?>
</details>
<details><summary>Why doesn’t the installation window appear?</summary><p>Open this page directly in Chrome, not inside Facebook or Messenger. Use a normal tab, not Incognito. If Sablayan is already installed, open its icon instead. Otherwise, use the Chrome menu instructions in the guide.</p></details>
<details><summary>Can I use the installed page offline?</summary><p>After your first online visit and the page has finished saving, you can read this guide offline. Downloading the separate Android app still needs an internet connection.</p></details>
</div></div></section>
</main>
<footer><div class="container footer-inner"><div><strong>Sablayan National Comprehensive High School</strong><p>Sablayan, Occidental Mindoro, Philippines</p></div><div class="footer-right">School app download page<br>Android installation guide</div></div></footer>
<script src="<?= html_escape(base_url('assets/js/landing.js')) ?>" defer></script>
<dialog id="offline-dialog" aria-labelledby="offline-title"><h2 id="offline-title">Connect to download.</h2><p>This page is available offline, but downloading the Android school app needs an internet connection. Reconnect, then try again.</p><form method="dialog"><button class="button">Got it</button></form></dialog>
<script src="<?= html_escape(base_url('assets/js/pwa.js')) ?>" data-base-url="<?= html_escape(base_url()) ?>" defer></script>
</body></html>
