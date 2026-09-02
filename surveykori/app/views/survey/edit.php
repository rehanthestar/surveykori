<h1>Edit Survey Information</h1>
<?php foreach ($errors as $error): ?>
    <div class="alert alert-error"><?php echo e($error); ?></div>
<?php endforeach; ?>

<div class="card" style="max-width:660px">
<form method="post">
    <div class="form-group">
        <label>Title</label>
        <input class="input" type="text" name="title" value="<?php echo e($survey['title']); ?>" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea class="textarea" name="description" required><?php echo e($survey['description']); ?></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="select" name="category">
            <?php foreach (survey_categories() as $c): ?>
                <option value="<?php echo e($c); ?>" <?php echo $survey['category'] === $c ? 'selected' : ''; ?>><?php echo e($c); ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="grid-2">
        <div class="form-group">
            <label>Required Response</label>
            <input class="input" type="number" min="1" name="required_responses" value="<?php echo (int)$survey['required_responses']; ?>" required>
        </div>
        <div class="form-group">
            <label for="">Reward Per Response</label>
            <input class="input" type="number" min="1" name="reward_per_response" value="<?php echo (int)$survey['reward_per_response']; ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label>Deadline</label>
        <input class="input" type="date" name="deadline" value="<?php echo e($survey['deadline']); ?>" required>
    </div>
    <div class="row">
        <button class="btn btn-primary" type="submit">Save</button>
        <a class="btn btn-outline" href="<?php echo BASE_URL; ?>/survey/builder.php?id=<?php echo $survey_id; ?>">Back to Questions</a>
    </div>
                        
</form>
</div>
