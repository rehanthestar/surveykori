<?php



if(!isset($page_title)) {
    $page_title = APP_NAME;
}

if(!isset($user)) {
    $user = current_user();
}

$home_url = !empty($is_admin_area) ? '/admin/index.php' : '/dashboard.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e($page_title); ?> | <?php echo APP_NAME; ?></title>
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/components.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/responsive.css">

    </head>
    <body>
        <header class="navbar">
            <div class="navbar-left">
                <button class="menu-btn" onclick="toggleSidebar()">&#9776;</button>
                <a class="brand" href="<?php echo BASE_URL . $home_url; ?>">Survey<span>Kori</span></a>
            </div>
            <div class="navbar-right">

            
                <?php if ($user): ?>
                    <a class="nav-link" href="<?php echo BASE_URL; ?>/notifications.php">
                        Notifications
                        <?php $un = unread_notifications($user['id']); if ($un > 0): ?>
                            <span class="dot"><?php echo $un; ?></span>
                        <?php endif; ?>
                    </a>
                    <span class="nav-user"><?php echo e($user['full_name']); ?></span>
                    <a class="btn btn-outline btn-sm" href="<?php echo BASE_URL; ?>/logout.php">Logout</a>
                <?php endif; ?>


               
            </div>
        </header>

        <div class="layout">