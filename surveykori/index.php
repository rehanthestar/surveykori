<?php
    define('ROOT_PATH', dirname(__DIR__));
    require ROOT_PATH . '/config/app.php';

    spl_autoload_register(function(string $class): void {
        $folders = ['Core', 'Controllers', 'Models'];
        foreach ($folders as $folder) {
            $file = ROOT_PATH . '/app/' . $folder . '/' . $class . '.php';
            if (is_file($file)) {
                require_once $file;
                return;
            }
        }
    });


    require ROOT_PATH . '/app/helpers.php';
    $database = new Database(require ROOT_PATH . '/config/database.php');
    Auth::init($database);

    $router = new Router($database);
    $registerRoutes = require ROOT_PATH . '/config/routes.php';
    $registerRoutes($router);
    $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

?>