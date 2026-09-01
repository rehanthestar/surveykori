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
        <td><span class="badge badge-cat">Education</span></td>
        <td>5 pts</td>
        <td>12 / 20</td>
        <td class="small">30 Sep 2026</td>
                        <td><span class="badge badge-active">Active</span></td>
                        <td>
                            <div class="row">
                                <a class="btn btn-sm btn-outline" href="results.html">Results</a>
                                <form style="display:inline">
                                    <button class="btn btn-sm btn-danger" type="button" data-confirm="Close this survey and refund unused points?">Close</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Campus Food Quality
                        </td>
                        <td><span class="badge badge-cat">Health</span></td>
                        <td>4 pts</td>
                        <td>0 / 15</td>
                        <td class="small">28 Sep 2026</td>
                        <td><span class="badge badge-pending">Pending</span></td>
                        <td>
                            <div class="row">
                                <a class="btn btn-sm btn-outline" href="results.html">Results</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Online Class Feedback
                        </td>
                        <td><span class="badge badge-cat">Education</span></td>
                        <td>3 pts</td>
                        <td>0 / 10</td>
                        <td class="small">05 Oct 2026</td>
                        <td><span class="badge badge-draft">Draft</span></td>
                        <td>
                            <div class="row">
                                <a class="btn btn-sm btn-outline" href="results.html">Results</a>
                                <a class="btn btn-sm" href="builder.html">Edit</a>
                                <a class="btn btn-sm btn-success" href="publish.html">Publish</a>
                                <form style="display:inline">
                                    <button class="btn btn-sm btn-danger" type="button" data-confirm="Delete this survey?">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Gaming Habits Poll
                            <div class="small text-danger">Reason: Topic is not related to academic research.</div>
                        </td>
                        <td><span class="badge badge-cat">Other</span></td>
                        <td>2 pts</td>
                        <td>0 / 10</td>
                        <td class="small">02 Oct 2026</td>
                        <td><span class="badge badge-rejected">Rejected</span></td>
                        <td>
                            <div class="row">
                                <a class="btn btn-sm btn-outline" href="results.html">Results</a>
                                <a class="btn btn-sm" href="builder.html">Edit</a>
                                <a class="btn btn-sm btn-success" href="publish.html">Publish</a>
                                <form style="display:inline">
                                    <button class="btn btn-sm btn-danger" type="button" data-confirm="Delete this survey?">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Alumni Career Path
                        </td>
                        <td><span class="badge badge-cat">Business</span></td>
                        <td>6 pts</td>
                        <td>20 / 20</td>
                        <td class="small">01 Aug 2026</td>
                        <td><span class="badge badge-completed">Completed</span></td>
                        <td>
                            <div class="row">
                                <a class="btn btn-sm btn-outline" href="results.html">Results</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

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
        </main>
    </div>
    <footer class="footer">
        <p>Survey Kori &mdash; University Web Technology Project</p>
    </footer>
    <script src="../assets/js/script.js"></script>
</body>
</html>