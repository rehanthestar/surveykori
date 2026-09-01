<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Survey Kori</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/components.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/responsive.css">
</head>
<body>

    <div class="public-nav">
        <a class="brand" href="<?php echo BASE_URL; ?>/index.php">Survey<span>Kori</span></a>
        <a class="btn btn-primary btn-sm" href="<?php echo BASE_URL; ?>/login.php">Login </a>
    </div>

    <div class="auth-box">
    <h1>Create Account</h1>



    <?php foreach ($errors as $error): ?>
        <div class="alert alert-error"><?php echo e($error); ?></div>
    <?php endforeach; ?>


    <form method="post">
        <div class="form-group">
            <label>Full Name</label>
            <input class="input" type="text" name="full_name" value="<?php echo e($data['full_name']); ?>" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input class="input" type="email" name="email" value="<?php echo e($data['email']); ?>" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input class="input" type="password" name="password" required>
            <p class="help-text">At least 6 characters.</p>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <input class="input" type="password" name="confirm_password" required>
        </div>
        <div class="form-group">
            <label>University</label>
            <input class="input" type="text" name="university" value="<?php echo e($data['university']); ?>" required>
        </div>
        <div class="form-group">
            <label>Department</label>
            <input class="input" type="text" name="department" value="<?php echo e($data['department']); ?>" required>
        </div>
        <div class="form-group">
            <label>User Type</label>
            <select class="select" name="user_type">
                <option value="student" <?php echo $data['user_type'] === 'student' ? 'selected' : ''; ?>>Student</option>
                <option value="researcher" <?php echo $data['user_type'] === 'researcher' ? 'selected' : ''; ?>>Researcher</option>
            </select>
        </div>

        <button class="btn btn-primary btn-block" type="submit">Register</button>
    <p class="small mt">already have an account <a href="<?php echo BASE_URL; ?>/login.html">Login  Here</a></p>
</div>
    
</body>
</html>