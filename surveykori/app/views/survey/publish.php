<h1>Publish Survey</h1>
<?php show_flash(); ?>

<div class="card" style="max-width: 620px">
    <h2><?php echo e($survey['title']); ?></h2>
    <table class="table">
        <tr><th>Questions</th><td><?php echo $count; ?></td></tr>
        <tr><th>Required Responses</th><td><?php echo (int)$survey['required_responses']; ?></td></tr>
        <tr><th>Reward Per Response</th><td><?php echo (int)$survey['reward_per_response']; ?> points</td></tr>
        <tr><th>Total Required Points</th><td><strong><?php echo $total; ?> points</strong></td></tr>
        <tr><th>Your Available Points</th><td><?php echo (int)$points['available_points']; ?> points</td></tr>
        <tr><th>Deadline</th><td><?php echo nice_date($survey['deadline']); ?></td></tr>
    </table>

    <?php if ($count === 0): ?>
        <div class="alert alert-warning mt">Add at least one question before publishing.</div>
        <a class="btn btn-primary" href="<?php echo BASE_URL; ?>/survey/builder.php?id=<?php echo $survey_id; ?>">Add Questions</a>

    <?php elseif (!$enough): ?>
        <div class="alert alert-error mt">
            You need <?php echo $total; ?> points to publish this survey,
            but you currently have only <?php echo (int)$points['available_points']; ?> points.
        </div>
        <a class="btn btn-secondary" href="<?php echo BASE_URL; ?>/survey/find.php">Earn points by answering surveys</a>

    <?php else: ?>
        <div class="alert alert-info mt">
            <?php echo $total; ?> points will be locked. Unused points are refunded when the survey closes.
        </div>
        <form method="post">
            <button class="btn btn-success" type="submit">Publish &amp; Lock Points</button>
            <a class="btn btn-outline" href="<?php echo BASE_URL; ?>/survey/builder.php?id=<?php echo $survey_id; ?>">Back</a>
        </form>
    <?php endif; ?>
</div>
