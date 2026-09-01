<div class="row space-between">
    <div>
        <h1><?php echo e($survey['title']); ?></h1>
        <p class="text-muted small">
            <?php echo survey_badge($survey['status']); ?>
            <span class="badge badge-cat"><?php echo e($survey['category']); ?></span>
            Cost: <?php echo (int)$survey['total_points']; ?> points
            (<?php echo (int)$survey['required_responses']; ?> &times; <?php echo (int)$survey['reward_per_response']; ?>)
        </p>
    </div>
    <a class="btn btn-outline btn-sm" href="<?php echo BASE_URL; ?>/survey/edit.php?id=<?php echo $survey_id; ?>">Edit Settings</a>
</div>
       
<?php show_flash(); ?>

<?php if (!$editable): ?>
    <div class="alert alert-info">This survey is <?php echo e($survey['status']); ?> and can no longer be edited.</div>
<?php endif; ?>

<form method="post" class="builder">
    <input type="hidden" name="questions_json" id="questionsJson">
    <input type="hidden" name="builder_action" id="builderAction" value="draft">
    <div class="card">
        <h3>Add Question</h3>
        <?php foreach (question_types() as $key => $label): ?>
            <button type="button" class="btn btn-outline btn-block" style="margin-bottom:6px"
                    onclick="addQuestion('<?php echo $key; ?>')">+ <?php echo $label; ?></button>
        <?php endforeach; ?>
        <p class="help-text">Question: <strong id="questionCount">0</strong></p>
    </div>

    <div>
        <div id="questionList"></div>
        <div class="row">
            <button  class="btn btn-primary" type="submit" onclick="return beforeSave('draft')">Save Draft</button>
            <button  class="btn btn-secondary" type="submit" onclick="return beforeSave('preview')">Preview</button>
            <button  class="btn btn-primary" type="submit" onclick="return beforeSave('publish')">Publish</button>
        </div>
    </div>
</form>

<div class="modal" id="confirmModal">
    <div class="modal-box">
        <h3>Please confirm</h3>
        <p class="modal-actions"></p>
        <div class="modal-actions">
            <button type="button" class="btn modal-no">Cancel</button>
            <button type="button" class="btn btn-danger modal-yes">Yes</button>
        </div>
    </div>
</div>

<script>
    window.existingQuestion = <?php echo json_encode($existing); ?>;
</script>
<script src="<?php echo BASE_URL; ?>/assets/js/survey-builder.js"></script>