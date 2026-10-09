# Validation

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
