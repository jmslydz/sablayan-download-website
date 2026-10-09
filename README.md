# Sablayan School App — CodeIgniter 3

The approved desktop and mobile landing page, converted to CodeIgniter 3.1.13.
The official framework is included. No Composer, Node.js, database, or internet
connection is needed to display the page locally.

## Start with XAMPP on Windows

1. Extract the ZIP. Move the folder named `sablayan-codeigniter3` into
   `C:\xampp\htdocs\`.
2. Start **Apache** in the XAMPP Control Panel. MySQL is not needed.
3. Open **http://localhost/sablayan-codeigniter3/** in your browser.

If Apache uses port 8080, or you rename the folder, edit
`application/config/config.php` and set `base_url` to the actual address,
including its trailing slash. Example:

```php
$config['base_url'] = 'http://localhost:8080/sablayan-codeigniter3/';
```

The distributed default is `http://localhost/sablayan-codeigniter3/`.
The `CI_BASE_URL` environment variable can override this default.

## Add the real app download link

Open `application/config/school.php` and replace the empty value:

```php
$config['app_download_url'] = 'https://your-school-domain.example/app/school.apk';
```

Use the school's verified HTTPS Google Play or APK URL. The address above is
an example, not a real download. Alternatively set `SCHOOL_APP_DOWNLOAD_URL`
in the server environment. Do not enter passwords or credentials in the URL.

All three download buttons use the same controller endpoint. Until a valid
HTTPS link is supplied, they display the existing notice. Once a valid link is
configured, they open the configured download destination. Query parameters
cannot override that destination. No APK is included in this project.

## Main files

| File | Purpose |
| --- | --- |
| `application/controllers/Landing.php` | Renders the page and handles app downloads |
| `application/views/landing/index.php` | Approved page markup with CodeIgniter asset URLs |
| `application/config/school.php` | App download URL |
| `application/config/routes.php` | Home and download routes |
| `application/config/config.php` | Site base URL and standard CodeIgniter settings |
| `assets/css/landing.css` | Exact approved desktop and mobile styles |
| `assets/js/landing.js` | Mobile menu and download notice |
| `assets/images/school-logo-white-year.png` | Transparent school emblem with white “2008” |
| `system/` | Official CodeIgniter 3.1.13 framework |

To edit page wording, use the view. To change the design, edit the CSS.
The supplied logo is the approved edited logo from the preview.

## Add to an existing CodeIgniter 3 project

Back up the existing project first. This is a landing page, not a replacement
for your student/admin portal.

1. Copy `Landing.php`, `views/landing/`, `config/school.php`, and the three
   asset files above into their matching folders. If any filename already
   exists, merge or rename it instead of overwriting existing work.
2. Merge these lines into your existing `application/config/routes.php`:

   ```php
   $route['default_controller'] = 'landing';
   $route['download']['get'] = 'landing/download';
   ```

3. Keep your existing database, sessions, login routes, and authentication
   configuration. Use your existing correct `base_url`.
4. The controller loads the URL helper itself; you do not need to change
   `autoload.php`.
5. If your app already uses `/download`, choose a different route and change
   `site_url('download')` in the landing view to match.
6. Do not copy this project's `system/`, `index.php`, `config.php`, `.htaccess`,
   or entire config directory over a working existing application.

## Optional local PHP server

Run the command from inside `sablayan-codeigniter3`.

Windows PowerShell:

```powershell
$env:CI_BASE_URL = 'http://127.0.0.1:8080/'
php -S 127.0.0.1:8080 dev-router.php
```

macOS/Linux:

```bash
CI_BASE_URL=http://127.0.0.1:8080/ php -S 127.0.0.1:8080 dev-router.php
```

Open http://127.0.0.1:8080/. If PHP is not on your Windows PATH, replace `php`
with `C:\xampp\php\php.exe`. This development server is for local use only.

## Deployment and URL settings

- Use PHP hosting with Apache, or configure your existing PHP web server.
  This package cannot execute as a static HTML site.
- Set `base_url` to your real HTTPS address before deploying.
- The default `index_page` is `index.php`, so generated links work without
  requiring URL rewriting. Example: `/index.php/download`.
- The included Apache `.htaccess` supports optional clean URLs. Only set
  `index_page` to an empty string after confirming `mod_rewrite` and
  `AllowOverride` work on your server.
- For Apache, keep the bundled `.htaccess` files. With Nginx, explicitly deny
  HTTP access to `/application/` and `/system/` in your server configuration.
- Allow PHP to write `application/logs/` if you need error logs. Do not give
  every file broad write permissions.

## Runtime and scope

This landing page was tested with **PHP 8.3.6** and **CodeIgniter 3.1.13**.
The framework files are unmodified. `index.php` defaults to the framework's
production mode, which hides PHP errors from visitors. You can set `CI_ENV`
to `development` locally for debugging. CI3 is a legacy framework and may
show deprecation notices on newer PHP versions in development mode.

This package implements the landing page and download routing only. It does
not implement student accounts, grades, attendance records, or the Android app.
Those feature descriptions are the marketing content approved in the preview.
The existing online design preview remains a separate static preview.

See `TESTING.md` for completed checks and `THIRD_PARTY.md` for framework sources.
