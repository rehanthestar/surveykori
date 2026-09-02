<h1>Manage Surveys</h1>
<?php show_flash(); ?>

<div class="row mb">
    <?php foreach ($statuses as $st): ?>
        <a class="btn btn-sm <?php echo $status === $st ? 'btn-primary' : 'btn-outline'; ?>"
           href="?status=<?php echo $st; ?>"><?php echo ucfirst($st); ?></a>
    <?php endforeach; ?>
</div>

<?php if (!$rows): ?>
    <div class="card text-muted">No surveys with this status.</div>
<?php endif; ?>

<?php foreach ($rows as $s): ?>
    <div class="card">
        <div class="row space-between">
            <h3><?php echo e($s['title']); ?></h3>
            <?php echo survey_badge($s['status']); ?>
        </div>
        <p class="small text-muted">
            By <?php echo e($s['full_name']); ?> (<?php echo e($s['email']); ?>) &middot;
            <?php echo e($s['category']); ?> &middot;
            <?php echo question_count($s['id']); ?> questions &middot;
            <?php echo (int)$s['reward_per_response']; ?> pts &times; <?php echo (int)$s['required_responses']; ?> responses
            = <?php echo (int)$s['reward_per_response'] * (int)$s['required_responses']; ?> pts locked
        </p>
        <p><?php echo nl2br(e($s['description'])); ?></p>

        <?php if ($s['rejection_reason']): ?>
            <div class="alert alert-error small">Rejected: <?php echo e($s['rejection_reason']); ?></div>
        <?php endif; ?>

        <div class="row">
            <a class="btn btn-sm btn-outline" href="<?php echo BASE_URL; ?>/survey/preview.php?id=<?php echo (int)$s['id']; ?>">Preview questions</a>

            <?php if ($s['status'] === 'pending'): ?>
                <form method="post" style="display:inline">
                    <input type="hidden" name="survey_id" value="<?php echo (int)$s['id']; ?>">
                    <input type="hidden" name="back_status" value="<?php echo e($status); ?>">
                    <input type="hidden" name="action" value="approve">
                    <button class="btn btn-sm btn-success" data-confirm="Approve this survey?">Approve</button>
                </form>

                <form method="post" class="row" style="display:inline-flex">
                    <input type="hidden" name="survey_id" value="<?php echo (int)$s['id']; ?>">
                    <input type="hidden" name="back_status" value="<?php echo e($status); ?>">
                    <input type="hidden" name="action" value="reject">
                    <input class="input input-sm" type="text" name="reason" placeholder="Rejection reason" maxlength="255">
                    <button class="btn btn-sm btn-danger" type="submit">Reject</button>
                </form>
            <?php endif; ?>

            <?php if ($s['status'] === 'active'): ?>
                <form method="post" style="display:inline">
                    <input type="hidden" name="survey_id" value="<?php echo (int)$s['id']; ?>">
                    <input type="hidden" name="back_status" value="<?php echo e($status); ?>">
                    <input type="hidden" name="action" value="close">
                    <button class="btn btn-sm btn-danger" data-confirm="Force close this survey?">Force Close</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>

<div class="modal" id="confirmModal">
    <div class="modal-box">
        <h3>Please Confirm</h3>
        <p class="modal-message"></p>
        <div class="modal-actions">
            <button type="button" class="btn modal-no">Cancel</button>
            <button type="button" class="btn btn-danger modal-yes">Yes</button>
        </div>
    </div>
</div>
