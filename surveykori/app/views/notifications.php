
    <div class="space-between row">
    <h1>Notifications</h1>
    <form method="post">
        <input type="hidden" name="action" value="read_all">
        <button class="btn-outline btn-sm btn">Mark as read all</button>
    </form>

    </div>


    <?php if (!$notifications): ?>
        <div class="card text-muted">You have no notifications.</div>
    <?php else: ?>


        <?php foreach ($notifications as $n): ?>
            <div class="notif-card <?php echo $n['is_read'] ? '' : 'unread'; ?>">
                <div>
                    <div><?php echo e($n['message']); ?></div>
                    <div class="text-muted small"><?php echo nice_date($n['created_at']); ?></div>
                </div>
                <?php if (!$n['is_read']): ?>
                <form method="post">
                    <input type="hidden" name="action" value="read_one">
                    <input type="hidden" name="id" value="<?php echo (int)$n['id']; ?>">
                    <button class="btn-sm btn" type="submit">mark read</button>
                </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
