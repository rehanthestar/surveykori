<?php

    if(!isset($active)){
        $active = '';
    }
    $menu = !empty($is_admin_area) ? [
        'admin-home'    => ['Admin Dashboard', '/admin/index.php'],
        'admin-surveys' => ['Manage Surveys', '/admin/surveys.php'],
        'admin-users'   => ['Manage Users', '/admin/users.php'],
    ] : [
        'dashboard'     => ['Dashboard', '/dashboard.php'],
        'find'          => ['Find Surveys', '/survey/find.php'],
        'my-surveys'    => ['My Surveys', '/survey/my-surveys.php'],
        'create'        => ['Create Survey', '/survey/create.php'],
        'points'        => ['Point Center', '/points/index.php'],
        'notifications' => ['Notifications', '/notifications.php'],
        'profile'       => ['Profile', '/profile.php'],
    ];
?>


<aside class="sidebar" id="sidebar">
    <nav>
        <?php foreach ($menu as $key => $item): ?>
            <a class="side-link <?php echo $active === $key ? 'is-active' : ''; ?>"
               href="<?php echo BASE_URL . $item[1]; ?>"><?php echo e($item[0]); ?></a>
        <?php endforeach; ?>
        <?php if (empty($is_admin_area) && $user && $user['role'] === 'admin'): ?>
            <a class="side-link" href="<?php echo BASE_URL; ?>/admin/index.php">Admin Panel</a>
        <?php endif; ?>
        <a class="side-link" href="<?php echo BASE_URL; ?>/logout.php">Logout</a>
    </nav>

        </aside>

        <main class="content">