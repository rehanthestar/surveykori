<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Kori - Point Based Survey Exchange for Students</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/components.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/responsive.css">
</head>
<body>
<nav class="public-nav">
    
    
        <a class="brand" href="<?php echo BASE_URL; ?>/index.php">Survey<span>Kori</span></a>
        <a class="btn btn-primary btn-sm" href="<?php echo BASE_URL; ?>/register.php">Register</a>
    
</nav>

<div class="auth-box">
    <h1>Login</h1>
    <p class="text-muted small">Use your survey kori account</p>
    <?php show_flash(); ?>
    <?php foreach ($errors as $error): ?>
        <div class="alert alert-error"><?php echo e($error); ?></div>   
    <?php endforeach; ?>


    <form method="post">

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="input" value="<?php echo e($data['email']); ?>" name="email" required>
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="input" name="password" required>
        </div>

        <button class="btn-orimary btn btn-block" type="submit">Login</button>
    </form>


    <p class="small mt">No Account <a href="<?php echo BASE_URL; ?>/register.php">Register Here</a></p>
    <p class="small mt">Admin? <a href="<?php echo BASE_URL; ?>/admin/login.php">Admin Login</a></p>
</div>
    
</body>
</html>