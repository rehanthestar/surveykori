<?php

return function (Router $router): void {
    $router->get('/', [HomeController::class, 'index']);
    $router->get('/index.php', [HomeController::class, 'index']);

    $router->match(['GET', 'POST'], '/login.php', [AuthController::class, 'login']);
    $router->match(['GET', 'POST'], '/register.php', [AuthController::class, 'register']);
    $router->get('/logout.php', [AuthController::class, 'logout']);
    $router->match(['GET', 'POST'], '/admin/login.php', [AuthController::class, 'adminLogin']);

    $router->get('/dashboard.php', [DashboardController::class, 'index']);
    $router->match(['GET', 'POST'], '/profile.php', [ProfileController::class, 'index']);
    $router->match(['GET', 'POST'], '/notifications.php', [NotificationController::class, 'index']);

    $router->match(['GET', 'POST'], '/survey/create.php', [SurveyController::class, 'create']);
    $router->match(['GET', 'POST'], '/survey/builder.php', [SurveyController::class, 'builder']);
    $router->match(['GET', 'POST'], '/survey/edit.php', [SurveyController::class, 'edit']);
    $router->get('/survey/preview.php', [SurveyController::class, 'preview']);
    $router->match(['GET', 'POST'], '/survey/publish.php', [SurveyController::class, 'publish']);
    $router->get('/survey/find.php', [SurveyController::class, 'find']);
    $router->get('/survey/view.php', [SurveyController::class, 'viewSurvey']);
    $router->match(['GET', 'POST'], '/survey/my-surveys.php', [SurveyController::class, 'mine']);
    $router->get('/survey/take.php', [ResponseController::class, 'take']);
    $router->match(['GET', 'POST'], '/survey/submit.php', [ResponseController::class, 'submit']);
    $router->get('/survey/results.php', [ResponseController::class, 'results']);

    $router->get('/points/index.php', [PointController::class, 'index']);
    $router->get('/points/transactions.php', [PointController::class, 'transactions']);

    $router->get('/admin/index.php', [AdminController::class, 'dashboard']);
    $router->match(['GET', 'POST'], '/admin/users.php', [AdminController::class, 'users']);
    $router->match(['GET', 'POST'], '/admin/surveys.php', [AdminController::class, 'surveys']);
};
?>