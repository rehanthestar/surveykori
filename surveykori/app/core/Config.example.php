<?php

define('DB_HOST', 'localhost');

define('DB_NAME', 'survey_kori');
define('DB_USER', 'root');
define('DB_PASS', '');

define('BASE_URL', '/surveykori/surveykori');
define('APP_NAME', 'Survey Kori');

define('APP_PATH', dirname(__DIR__));

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

ini_set('display_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Dhaka');


?>