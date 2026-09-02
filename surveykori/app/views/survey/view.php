
        <h1><?php echo e($survey['title']); ?></h1>
        <p class="text-muted">
            <?php echo survey_badge($survey['status']); ?>
            <span class="badge badge-cat"><?php echo e($survey['category']); ?></span>
        </p>
        <div class="card" style="max-width:700px">
            <p><?php echo nl2br(e($survey['description'])); ?></p>
            <table class="table">
                <tr><th>Creator</th><td><?php echo e($survey['full_name']); ?></td></tr>
                <tr><th>Questions</th><td><?php echo $count; ?></td></tr>
                <tr><th>Reward</th><td><?php echo (int)$survey['reward_per_response']; ?> points</td></tr>
                <tr><th>Responses</th><td><?php echo (int)$survey['collected_responses']; ?> / <?php echo (int)$survey['required_responses']; ?></td></tr>
                <tr><th>Deadline</th><td><?php echo nice_date($survey['deadline']); ?></td></tr>
            </table>

            <?php if ($is_mine): ?>
                <div class="alert alert-info mt">This is your own survey.</div>
                <a class="btn btn-outline" href="<?php echo BASE_URL; ?>/survey/results.php?id=<?php echo $survey_id; ?>">View Results</a>
            <?php elseif ($already): ?>
                <div class="alert alert-success mt">You have already answered this survey.</div>
            <?php elseif ($survey['status'] !== 'active'): ?>
                <div class="alert alert-warning mt">This survey is not accepting responses.</div>
            <?php else: ?>
                <a class="btn btn-primary mt" href="<?php echo BASE_URL; ?>/survey/take.php?id=<?php echo $survey_id; ?>">Take Survey</a>
           <?php endif; ?>
        </div>
        
