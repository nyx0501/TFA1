<?php
/**
 * Router script for PHP's built-in server (used by Railway's start command).
 * Mimics the Apache .htaccess rewrite: serve real files/assets directly,
 * otherwise hand every request to CodeIgniter's front controller.
 */

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$path = __DIR__ . $uri;

if ($uri !== '/' && file_exists($path) && !is_dir($path)) {
    return false; // let the built-in server serve the file as-is (css, js, images...)
}

require __DIR__ . '/index.php';
