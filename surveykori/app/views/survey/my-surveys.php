<div class="row space-between">
    <h1>My Surveys</h1>
    <a class="btn btn-primary" href="<?php echo BASE_URL; ?>/survey/create.php">Create Survey</a>
</div>
<?php show_flash(); ?>

<?php if (!$surveys): ?>
    <div class="card text-muted">You have not created a survey yet.</div>
<?php else: ?>
<div class="card table-wrap">
<table class="table">
    <tr>
        <th>Title</th><th>Category</th><th>Reward</th>
        <th>Responses</th><th>Deadline</th><th>Status</th><th>Actions</th>
    </tr>
    <?php foreach ($surveys as $s): ?>
    <tr>
        <td><?php echo e($s['title']); ?>
            <?php if ($s['status'] === 'rejected' && $s['rejection_reason']): ?>
                <div class="small text-danger">Reason: <?php echo e($s['rejection_reason']); ?></div>
            <?php endif; ?>
        </td>
        <td><span class="badge badge-cat"><?php echo e($s['category']); ?></span></td>
        <td><?php echo (int)$s['reward_per_response']; ?> pts</td>
        <td><?php echo (int)$s['collected_responses']; ?> / <?php echo (int)$s['required_responses']; ?></td>
        <td class="small"><?php echo nice_date($s['deadline']); ?></td>
        <td><?php echo survey_badge($s['status']); ?></td>
        <td>
            <div class="row">
            <a class="btn btn-sm btn-outline" href="<?php echo BASE_URL; ?>/survey/results.php?id=<?php echo (int)$s['id']; ?>">Results</a>

                <?php if (in_array($s['status'], ['draft', 'rejected'])): ?>
                    <a class="btn btn-sm" href="<?php echo BASE_URL; ?>/survey/builder.php?id=<?php echo (int)$s['id']; ?>">Edit</a>
                    <a class="btn btn-sm btn-success" href="<?php echo BASE_URL; ?>/survey/publish.php?id=<?php echo (int)$s['id']; ?>">Publish</a>
                    <form method="post" style="display:inline">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="survey_id" value="<?php echo (int)$s['id']; ?>">
                        <button class="btn btn-sm btn-danger" type="submit" data-confirm="Delete this survey?">Delete</button>
                    </form>
                <?php endif; ?>
                <?php if ($s['status'] === 'active'): ?>
                    <form method="post" style="display:inline">
                        <input type="hidden" name="action" value="close">
                        <input type="hidden" name="survey_id" value="<?php echo (int)$s['id']; ?>">
                        <button class="btn btn-sm btn-danger" type="submit"
                                data-confirm="Close this survey and refund unused points?">Close</button>
                    </form>
                <?php endif; ?>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
<?php endif; ?>

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