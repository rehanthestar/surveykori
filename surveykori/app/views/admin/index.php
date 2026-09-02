<h1>Admin Dashboard</h1>
<?php show_flash(); ?>

<div class="grid-4">
    <div class="stat-card"><div class="label">Total Users</div><div class="value"><?php echo $total_users; ?></div></div>
    <div class="stat-card"><div class="label">Total Surveys</div><div class="value"><?php echo $total_surveys; ?></div></div>
    <div class="stat-card green"><div class="label">Total Responses</div><div class="value"><?php echo $total_responses; ?></div></div>
    <div class="stat-card green"><div class="label">Points in Circulation</div><div class="value"><?php echo $market_points; ?></div></div>
</div>

<div class="grid-4 mt">
    <div class="stat-card orange"><div class="label">Pending Surveys</div><div class="value"><?php echo $pending_surveys; ?></div></div>
    <div class="stat-card green"><div class="label">Active Surveys</div><div class="value"><?php echo $active_surveys; ?></div></div>
    <div class="stat-card"><div class="label">Completed Surveys</div><div class="value"><?php echo $completed_surveys; ?></div></div>
    <div class="stat-card red"><div class="label">Other Surveys</div><div class="value"><?php echo $other_surveys; ?></div></div>
</div>

<div class="card mt">
    <div class="card-title">
        <h3>Surveys Waiting for Approval</h3>
        <a class="btn btn-sm btn-outline" href="<?php echo BASE_URL; ?>/admin/surveys.php?status=pending">Open queue</a>
    </div>
    <?php if (!$pending): ?>
        <p class="text-muted small">Nothing to review right now.</p>
    <?php else: ?>
        <div class="table-wrap">
        <table class="table">
            <tr><th>Title</th><th>Creator</th><th>Reward</th><th>Needed</th><th></th></tr>
            <?php foreach ($pending as $p): ?>
                <tr>
                    <td><?php echo e($p['title']); ?></td>
                    <td><?php echo e($p['full_name']); ?></td>
                    <td><?php echo (int)$p['reward_per_response']; ?> pts</td>
                    <td><?php echo (int)$p['required_responses']; ?></td>
                    <td><a class="btn btn-sm btn-primary" href="<?php echo BASE_URL; ?>/admin/surveys.php?status=pending">Review</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        </div>
    <?php endif; ?>
</div>

<div class="card">
    <div class="card-title">
        <h3>Newest Users</h3>
        <a class="btn btn-sm btn-outline" href="<?php echo BASE_URL; ?>/admin/users.php">Manage users</a>
    </div>
    <div class="table-wrap">
    <table class="table">
        <tr><th>Name</th><th>Email</th><th>University</th><th>Joined</th></tr>
        <?php foreach ($recent_users as $u): ?>
            <tr>
                <td><?php echo e($u['full_name']); ?></td>
                <td class="small"><?php echo e($u['email']); ?></td>
                <td class="small"><?php echo e($u['university']); ?></td>
                <td class="small"><?php echo nice_date($u['created_at']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
</div>

<p class="small text-muted">
    Points in circulation means available + locked points across all user accounts.
    Currently locked: <strong><?php echo $locked_points; ?></strong> &middot;
    All-time earned: <strong><?php echo $points_earned; ?></strong>
</p>