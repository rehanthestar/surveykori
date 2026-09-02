
            <h1>my profile</h1>



            <?php show_flash(); ?>
            <?php foreach ($errors as $error): ?>
                <div class="alert alert-error"><?php echo e($error); ?></div>
            <?php endforeach; ?>





            <div class="grid-2">
                <div class="card">
                    <h3>profil info</h3>

                    <form method="post">

                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" class="input" name="full_name" value="<?php echo e($user['full_name']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email ( Cannot Change )</label>
                            <input type="email" class="input" name="email" value="<?php echo e($user['email']); ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label for="">University</label>
                            <input type="text" class="input" name="university" value="<?php echo e($user['university']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Department</label>
                            <input type="text" class="input" name="department" value="<?php echo e($user['department']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="">User Type</label>
                            <select class="select" name="user_type" id="">
                                <option value="student" <?php echo $user['user_type'] === 'student' ? 'selected' : ''; ?>> Student</option>
                                <option value="researcher" <?php echo $user['user_type'] === 'researcher' ? 'selected' : ''; ?>> Research</option>
                            </select>
                        </div>

                        <button class="btn btn-primary " type="submit">Save Changes</button>
                        


                    </form>
                </div>



                <div class="card">

                    <h3>Change Password</h3>

                    <form method="post">
                        <div class="form-group">
                            <label for="">Current Password</label>
                            <input type="password" class="input" name="old_password" required>
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="password" class="input" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm New Password</label>
                            <input type="password" class="input" name="confirm_password" required>
                        </div>

                        <button type="button" class="btn-secondary btn">Update pass</button>

                       



                    </form>

                     <p class="small text-muted mt">Member since <?php echo nice_date($user['created_at']); ?></p>
                </div>
            </div>

