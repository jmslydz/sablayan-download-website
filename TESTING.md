# Validation

## Page consistency cleanup

- A single installation guide refers to the actual **Install page** button.
  Browser-menu steps are explicitly a fallback and distinguish Chrome's menu
  from the website's mobile navigation.
- Restored the requested Getting started section for the separate Android app,
  with its download step pointing to the official link in the help section.
- Removed repeated download buttons, bottom
  promotional prompt, unavailable-download dialog, and repeated footer help link.
- Navigation targets the remaining sections. The FAQ shows one Android app
  download link only when a valid official HTTPS URL is configured.
- Unconfigured download routes redirect to the home page's help section instead
  of rendering a second copy of the landing page.

## PWA — 2026-10-29

The guide is now English-only. The language selector and top install strip
were removed. A full-width section contains a four-step Android Chrome guide
with the actual menu location, installation labels, confirmation, and where to
find the icon. Previous saved language preferences no longer affect the guide.

Passed on Windows with PHP's local server and headless Chromium:

- PHP syntax checks for the updated view and development router; JavaScript
  syntax checks for the PWA client and service worker.
- Manifest served with `application/manifest+json`; all 11 offline resources
  cached successfully.
- Chromium reports no installability errors in a fresh, non-incognito profile
  and emits the native install-prompt event, revealing the Install page button.
- Install-button prompt handling, dismissal, and installed-state feedback
  exercised with synthetic events (no OS installation performed).
- Offline reload renders the landing page and emblem, including `/index.php`.
- Offline download clicks show connection guidance. Direct offline download
  navigation shows the fallback page, whose home link returns to the saved page.
- Reconnection clears the offline notice; the existing online download notice
  and mobile navigation still work.
- Root URL and `/school/` subfolder mounting checked. Mobile layout checked at
  390px with no horizontal overflow and a screenshot review.
- No browser console errors during the checks.

Follow-up visibility fix: the install action remains visible when a native
prompt is unavailable and reveals manual instructions. Checked that fallback
and the new top-of-page installation shortcut in Chromium. A Windows
`start-preview.cmd` launcher is included to restart the local preview easily.

Follow-up asset-path fix: reproduced the unstyled page when `CI_BASE_URL` was
unset (CSS, scripts, and logo requested from the old hard-coded localhost
folder). Replaced that default with same-origin paths derived from the front
controller's location. With no environment override, checked root and
`/school/` subfolder hosting: green hero background, gold buttons, loaded logo,
mobile layout, offline reload, and installation guidance all pass. Both browser
runs reported zero console errors and zero failed requests. Desktop screenshot
review confirmed the colors and background render correctly.

Not yet checked: installation on physical Android/iOS devices, OS-level install
completion, production HTTPS hosting, or Apache-specific configuration.

## Original landing page

Tested on 2026-10-09 with PHP 8.3.6 CLI's local HTTP server, CodeIgniter 3.1.13,
and the distributed production-mode default.

Passed:

- PHP syntax checks for the front controller, local router, Landing controller,
  view, and changed configuration files.
- Homepage returns HTTP 200 and renders the school page without raw PHP or
  displayed framework errors.
- CSS, JavaScript, and transparent logo each return HTTP 200 with the expected bytes.
- Unconfigured `/index.php/download` and `/download` return the page with its
  download notice selected.
- With a test HTTPS URL configured, the download endpoints return HTTP 302 to
  exactly that destination. Redirects were inspected without fetching the URL.
- Query parameters cannot change the configured download destination.
- The local development router returns 404 for unknown paths and direct access
  to the application and framework folders.
- The CSS matches the approved responsive HTML preview byte-for-byte, apart
  from trimming surrounding whitespace.

Not tested in this environment:

- Apache/XAMPP-specific rewrite behavior or a Windows installation.
- A live Google Play link or APK, because none was supplied.
- Browser-based visual/interaction testing of the PHP build. The design and
  responsive stylesheet were carried over from the approved HTML version.
- Database or portal integration, which this landing page does not require.
