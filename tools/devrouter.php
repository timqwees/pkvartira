<?php
/**
 * tools/devrouter.php — PHP built-in server router for pkvartira.
 *
 * Mirrors the Apache .htaccess rule from the repo root:
 *     RewriteRule ^(.*)$ index.php?route=$1 [QSA,L]
 *
 * Usage:
 *     php -S 127.0.0.1:8099 -t /path/to/pkvartira tools/devrouter.php
 *
 * How it works:
 *   - Static files under public/ (css/js/img/module) are served as-is.
 *   - Every other request is dispatched through the framework front controller
 *     (project root index.php), which reads $_GET['route'] exactly like Apache
 *     did. Works for both pkvartira.ru and upgrade.pkvartira.ru (use Host: header).
 *
 * Note: local PHP built-in server does not run Apache .htaccess rewrites, so this
 * small router replaces them for QA/dogfooding. Requires a populated SQLite DB
 * (dev default) unless the requested page is cache/static.
 */
declare(strict_types=1);

$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
$uri = '/' === $uri ? '/' : '/' . ltrim($uri, '/');

// Static files (public/) are served directly by the server.
if (is_file(__DIR__ . '/public' . $uri) && !preg_match('#\.(?:php|phtml|phar)$#i', $uri)) {
    return false;
}

// Everything else is a dynamic route -> the app's front controller.
// Mirrors: RewriteRule ^(.*)$ index.php?route=$1
$_GET['route'] = $uri;

chdir(__DIR__);
require 'index.php';

exit(0);
