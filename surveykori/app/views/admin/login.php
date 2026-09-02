<div class="auth-wrap">
    <div class="card auth-card" style="max-width:460px;margin:40px auto">
        <h1>Admin Login</h1>
        <p class="text-muted small">Survey Kori administration panel</p>

        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo e($error); ?></div>
        <?php endif; ?>

        <form method="post">
            <label class="label">Admin Email</label>
            <input class="input" type="email" name="email" required
                   value="<?php echo e($_POST['email'] ?? ''); ?>">

            <label class="label">Password</label>
            <input class="input" type="password" name="password" required>

            <button class="btn btn-primary btn-block mt" type="submit">Login</button>
        </form>

        <p class="small text-muted mt">
            Not an admin? <a href="<?php echo BASE_URL; ?>/login.php">User login</a>
        </p>
    </div>
</div>
