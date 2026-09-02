<?php


    require_once __DIR__ . '/Config.php';
    require_once __DIR__ . '/Database.php';
    require_once __DIR__ . '/helpers.php';


    foreach (glob(APP_PATH . '/models/*.php') as $model) {
        require_once $model;
    }

    require_once __DIR__ . '/Auth.php';

    function run_controller($controller)
    {
        global $pdo;
        $file = APP_PATH . '/controllers/' . $controller . '.php';
        if (!file_exists($file)) {
            die('Controller not found: ' . htmlspecialchars($controller));
        }
        require $file;
        $data = get_defined_vars();
        unset($data['controller'], $data['file']);
        return $data;
    }

    function render_view($view, $data = [], $layout = 'app')
    {
        if ($view === null) {
            return;
        }
        extract($data);
        if (!isset($page_title)) {
            $page_title = APP_NAME;
        }
        if (!isset($active)) {
            $active = '';
        }
        if (!isset($user)) {
            $user = current_user();
        }

        if ($layout === 'app' || $layout === 'header') {
            include APP_PATH . '/views/layouts/header.php';
        }
        if ($layout === 'app') {
            include APP_PATH . '/views/layouts/sidebar.php';
        }

        include APP_PATH . '/views/' . $view;

        if ($layout === 'app' || $layout === 'header') {
            include APP_PATH . '/views/layouts/footer.php';
        }
    }

    function dispatch($controller, $view = null, $layout = 'app')
    {
        $data = run_controller($controller);
        render_view($view, $data, $layout);
    }

?>