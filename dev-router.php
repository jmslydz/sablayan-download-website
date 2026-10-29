<?php
// Local PHP development server only: php -S 127.0.0.1:8095 dev-router.php
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$decoded = rawurldecode(is_string($path) ? $path : '/');
$asset = realpath(__DIR__ . $decoded);
$asset_root = realpath(__DIR__ . '/assets') . DIRECTORY_SEPARATOR;
if ($asset !== FALSE && strpos($asset, $asset_root) === 0 && is_file($asset)) {
    return FALSE;
}
if (in_array($decoded, array('/sw.js', '/manifest.webmanifest', '/offline.html'), TRUE)) {
    $types = array('/sw.js' => 'application/javascript', '/manifest.webmanifest' => 'application/manifest+json', '/offline.html' => 'text/html; charset=utf-8');
    header('Content-Type: ' . $types[$decoded]);
    header('Cache-Control: no-cache');
    readfile(__DIR__ . $decoded);
    return TRUE;
}
if ($decoded !== '/' && $decoded !== '/index.php'
    && strpos($decoded, '/index.php/') !== 0 && $decoded !== '/download') {
    http_response_code(404);
    echo 'Not found';
    return TRUE;
}
$_SERVER['SCRIPT_NAME'] = '/index.php';
require __DIR__ . '/index.php';
