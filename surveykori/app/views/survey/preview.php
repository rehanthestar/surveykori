<h1>Preview</h1>
<div class="alert alert-info">This is only a preview. Answers cannot be submitted here.</div>

<div class="card">
    <h2><?php echo e($survey['title']); ?></h2>
    <p class="text-muted"><?php echo nl2br(e($survey['description'])); ?></p>
    <p class="small text-muted">
        <span class="badge badge-cat"><?php echo e($survey['category']); ?></span>
        <?php echo count($questions); ?> questions &middot;
        Reward <?php echo (int)$survey['reward_per_response']; ?> points &middot;
        Deadline <?php echo nice_date($survey['deadline']); ?>
    </p>
</div>
<?php if (!$questions): ?>
    <div class="card text-muted">This survey has no questions yet.</div>
<?php endif; ?>

<?php foreach ($questions as $i => $q): ?>
    <div class="card">
        <h3><?php echo ($i + 1) . '. ' . e($q['question_text']); ?>
            <?php if ($q['is_required']): ?><span class="text-danger">*</span><?php endif; ?>
        </h3>
        <?php if ($q['question_type'] === 'short_answer'): ?>
            <input class="input" type="text" placeholder="Short answer" disabled>

        <?php elseif ($q['question_type'] === 'paragraph'): ?>
            <textarea class="textarea" placeholder="Long answer" disabled></textarea>

        <?php elseif ($q['question_type'] === 'rating'): ?>
            <div class="rating-group">
                <?php for ($r = 1; $r <= 5; $r++): ?>
                    <label class="check-line"><input type="radio" disabled> <?php echo $r; ?> &#9733;</label>
                <?php endfor; ?>
            </div>
        <?php else: ?>
            <?php $options = db_all('SELECT * FROM question_options WHERE question_id = ? ORDER BY option_order', [$q['id']]); ?>
            <?php foreach ($options as $o): ?>
                <label class="check-line">
                    <input type="<?php echo $q['question_type'] === 'checkbox' ? 'checkbox' : 'radio'; ?>" disabled>
                    <?php echo e($o['option_text']); ?>
                </label>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<div class="row">
    <a class="btn btn-outline" href="<?php echo BASE_URL; ?>/survey/builder.php?id=<?php echo $survey_id; ?>">Back to Builder</a>
    <?php if ($survey['status'] === 'draft' || $survey['status'] === 'rejected'): ?>
        <a class="btn btn-success" href="<?php echo BASE_URL; ?>/survey/publish.php?id=<?php echo $survey_id; ?>">Publish</a>
    <?php endif; ?>
</div>
                    