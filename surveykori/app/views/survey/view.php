
        <h1><?php echo e($survey['title']); ?></h1>
        <p class="text-muted">
            <?php echo survey_badge($survey['status']); ?>
            <span class="badge badge-cat"><?php echo e($survey['category']); ?></span>
        </p>
        <div class="card" style="max-width:700px">
            <p><?php echo e($survey['description']); ?></p>
            <table class="table">
                <tr><th>Creator</th><td><?php echo e($survey['full_name']); ?></td></tr>
                <tr><th>Questions</th><td><?php echo $count; ?></td></tr>
                <tr><th>Reward</th><td><?php echo (int)$survey['reward_per_response']; ?> points</td></tr>
                <tr><th>Responses</th><td><?php echo (int)$survey['collected_responses']; ?> / <?php echo (int)$survey['required_responses']; ?></td></tr>
                <tr><th>Deadline</th><td><?php echo nice_date($survey['deadline']); ?></td></tr>
            </table>
            
            <a class="btn btn-primary mt" href="take.html">Start Survey</a>
            <a class="btn btn-outline mt" href="find.html">Back to list</a>
        </div>
        </main>
        </div>
        <footer class="footer">
            <p>Survey Kori &mdash; University Web Technology Project</p>
        </footer>
        <script src="../assets/js/script.js"></script>
</body>
</html>