<?php

if (!defined('APP_ROOT')) {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
    $domain = $_SERVER['HTTP_HOST'];
    $path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    define('APP_ROOT', $protocol . $domain . $path);
}

echo "Resource not found<br>";
echo "Return to <a href='".APP_ROOT."'>Home</a>";

?>