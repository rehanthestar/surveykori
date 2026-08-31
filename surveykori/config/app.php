<?php

    define('BASE_URL', '/surveykori/surveykori');
    define('APP_NAME', 'Survey Kori');

    if
    (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    date
date_default_timezone_set('Asia/Dhaka');


?>