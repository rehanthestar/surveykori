<h1>Manage Users</h1>
<?php show_flash(); ?>

<form method="get" class="card row">
    <input class="input" type="text" name="q" placeholder="Search name, email or university"
           value="<?php echo e($search); ?>">
    <button class="btn btn-primary" type="submit">Search</button>
    <?php if ($search !== ''): ?>
        <a class="btn btn-outline" href="<?php echo BASE_URL; ?>/admin/users.php">Reset</a>
    <?php endif; ?>
</form>

<div class="card table-wrap">
<table class="table">
    <tr>
        <th>Name</th><th>Email</th><th>University</th>
        <th>Available</th><th>Earned</th><th>Spent</th><th>Status</th><th>Actions</th>
    </tr>
    <?php if (!$users): ?>
        <tr><td colspan="8" class="text-muted">No users found.</td></tr>
    <?php endif; ?>
    <?php foreach ($users as $u): ?>
        <tr>
            <td><?php echo e($u['full_name']); ?></td>
            <td class="small"><?php echo e($u['email']); ?></td>
            <td class="small"><?php echo e($u['university']); ?></td>
            <td><?php echo (int)$u['available_points']; ?></td>
            <td><?php echo (int)$u['earned_points']; ?></td>
            <td><?php echo (int)$u['spent_points']; ?></td>
            <td>
                <span class="badge <?php echo $u['status'] === 'active' ? 'badge-active' : 'badge-rejected'; ?>">
                    <?php echo e(ucfirst($u['status'])); ?>
                </span>
            </td>
            <td>
                <div class="row">
                    <form method="post" style="display:inline">
                        <input type="hidden" name="user_id" value="<?php echo (int)$u['id']; ?>">
                        <?php if ($u['status'] === 'active'): ?>
                            <input type="hidden" name="action" value="block">
                            <button class="btn btn-sm btn-danger" data-confirm="Block this user?">Block</button>
                        <?php else: ?>
                            <input type="hidden" name="action" value="unblock">
                            <button class="btn btn-sm btn-success">Unblock</button>
                        <?php endif; ?>
                    </form>
                    <form method="post" class="row" style="display:inline-flex">
                        <input type="hidden" name="user_id" value="<?php echo (int)$u['id']; ?>">
                        <input type="hidden" name="action" value="bonus">
                        <input class="input input-sm" type="number" name="bonus" min="1" max="1000" placeholder="Pts" style="width:80px">
                        <button class="btn btn-sm btn-outline" type="submit">Give</button>
                    </form>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</div>

<div class="modal" id="confirmModal">
    <div class="modal-box">
        <h3>Please confirm</h3>
        <p class="modal-message"></p>
        <div class="modal-actions">
            <button class="button" class="btn modal-no">Cancel</button>
            <button class="button" class="btn btn-danger modal-yes">Yes</button>
        </div>
    </div>
</div>
