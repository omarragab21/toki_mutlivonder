<?php
/**
 * Built-in PHP server router for WordPress
 */
$root = __DIR__;
$uri  = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$file = $root . $uri;

// Check if static file exists
if ($uri !== '/' && file_exists($file) && !is_dir($file)) {
    return false;
}

// Ensure PHP files are executed if requested directly
if (file_exists($file) && is_file($file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
    require $file;
    return;
}

// Directory index fallback
if (is_dir($file) && file_exists(rtrim($file, '/') . '/index.php') && $uri !== '/') {
    require rtrim($file, '/') . '/index.php';
    return;
}

// Fallback to WordPress main index
$_SERVER['SCRIPT_NAME'] = '/index.php';
$_SERVER['SCRIPT_FILENAME'] = $root . '/index.php';
require_once $root . '/index.php';
