<h1>Create Survey</h1>
<p class="text-muted">Step 1 of 2 &mdash; survey information.</p>

<?php foreach ($errors as $error): ?>
    <div class="alert alert-error"><?php echo e($error); ?></div>
<?php endforeach; ?>

<div class="card" style="max-width:660px">
<form method="post">
    <div class="form-group">
        <label>Title</label>
        <input class="input" type="text" name="title" value="<?php echo e($form['title']); ?>" maxlength="150" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="textarea" name="description" required><?php echo e($form['description']); ?></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="select" name="category">
            <?php foreach (survey_categories() as $c): ?>
                <option value="<?php echo e($c); ?>" <?php echo $form['category'] === $c ? 'selected' : ''; ?>><?php echo e($c); ?></option>
            <?php endforeach; ?>
        </select>
        </div>
        <div class="grid-2">
            <div class="form-group">
                <label>Required Responses</label>
                <input class="input" type="number" min="1" name="required_responses" value="<?php echo (int)$form['required_responses']; ?>" required>
            </div>
            <div class="form-group">
                <lable>Reward Points Per Response</lable>
                <input class="input" type="number" min="1" name="reward_per_response" value="<?php echo (int)$form['reward_per_response']; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label>Deadline</label>
            <input class="input" type="date" name="deadline" value="<?php echo e($form['deadline']); ?>" required>
        </div>
        <p class="help-text">Total cost = required responses &times; reward per response.
            The points are locked only when you publish the survey.</p>
        <button class="btn btn-primary" type="submit">Save &amp; Add Questions</button>
</form>
</div>   