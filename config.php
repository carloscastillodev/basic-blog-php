<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_log', 'log/app_error.txt');
error_reporting(E_ALL);

define('APP_URL', 'http://localhost/blog-basic-r1/');

define('DB_URL', 'mysql:host=localhost;dbname=blog_basic');
define('DB_USER', 'root');
define('DB_PASS', 'root');