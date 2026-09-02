
            <h1>Welcome, <?php echo e($user['full_name']); ?></h1>
            <p class="text-muted"> <?php echo e(ucfirst($user['user_type'])) ?> &middot; 
                <?php echo e($user['department']); ?>, <?php echo e($user['university']); ?></p>

                <?php show_flash(); ?>

            <div class="grid-4 mt">

                <div class="stat-card">
                    <div class="label">Available Points</div>
                    <div class="value"><?php echo (int)$points['available_points']; ?></div>
                </div>
                <div class="stat-card">
                    <div class="label">Locked Points</div>
                    <div class="value"><?php echo (int)$points['locked_points']; ?></div>
                </div>
                <div class="stat-card">
                    <div class="label">Surveys Created</div>
                    <div class="value"><?php echo (int)$created; ?></div>
                </div>
                <div class="stat-card">
                    <div class="label">Surveys Completed</div>
                    <div class="value"><?php echo (int)$completed; ?></div>
                </div>


            </div>

            <div class="grid-3 mt">

                <div class="stat-card">
                    <div class="label">Total Earned Points</div>
                    <div class="value"><?php echo (int)$points['earned_points']; ?></div>
                </div>
                <div class="stat-card">
                    <div class="label">Total Spent Points</div>
                    <div class="value"><?php echo (int)$points['spent_points']; ?></div>
                </div>
                <div class="stat-card">
                    <div class="label">Responses Received</div>
                    <div class="value"><?php echo (int)$received; ?>    </div>
                </div>
             


            </div>


            <div class="row mt mb">

                <a class="btn btn-primary" href="<?php echo BASE_URL; ?>/survey/create.php">Create Survey</a>
                <a class="btn btn-primary" href="<?php echo BASE_URL; ?>/survey/find.php">Find Survey</a>
                <a class="btn btn-primary" href="<?php echo BASE_URL; ?>/survey/my-surveys.php">My Surveys</a>
                <a class="btn btn-primary" href="<?php echo BASE_URL; ?>/points/index.php">Point Center</a>
            </div>


            <div class="grid-2">

                <div class="card">
                    <h3>Recent Survey</h3>

                    <?php if (!$recent_surveys): ?>
                        <p class="text-muted small">You have not created any survey yet.</p>
                    <?php else: ?>
                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Response</th>
                            </tr>
                            <?php foreach ($recent_surveys as $s): ?>
                            <tr>
                                <td><a href="<?php echo BASE_URL; ?>/survey/results.php?id=<?php echo (int)$s['id']; ?>"><?php echo e($s['title']); ?></a></td>

                                <td><?php echo survey_badge($s['status']); ?></td>
                                <td><?php echo (int)$s['collected_responses']; ?> / <?php echo (int)$s['required_responses']; ?></td>
                            </tr>   

                            <?php endforeach; ?>
                        </table>

                    <?php endif; ?>
                </div>
                          

                <div class="card">
                    <h3>Recent Transection</h3>


                    <?php if (!$recent_transection): ?>
                        <p class="text-muted small">You have not any transection yet.</p>
                    <?php else: ?>
                        <table class="table">

                        <tr>
                            <th>Date</th>
                            <th>Activity</th>
                            <th>Points</th>
                        </tr>


                        <?php foreach ($recent_transection as $t): ?>
                            <tr>
                                <td class="small"><?php echo nice_date($t['created_at']); ?></td>
                                <td class="small"><?php echo e($t['description']); ?></td>
                                <td class="<?php echo in_array($t['transaction_type'], ['EARN', 'REFUND']) ? 'text-success' : 'text-danger'; ?>">
                                    <?php echo in_array($t['transaction_type'], ['EARN', 'REFUND']) ? '+' : '-'; ?><?php echo (int)$t['points']; ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>





                  




                    </table>

                    <?php endif; ?>
                </div>







            </div>


            <div class="card">
                <h3>recent notification</h3>
                <?php if (!$recent_notifications): ?>
                    <p class="text-muted small">You have not any notification yet.</p>
                <?php else: ?>
                    <?php foreach ($recent_notifications as $n): ?>
                        <div class="notif-card <?php echo $n['is_read'] ? '' : 'unread'; ?>">
                            <span><?php echo e($n['message']); ?></span>
                            <span class="small text-muted"><?php echo nice_date($n['created_at']); ?></span>
                        </div>
                    <?php endforeach; ?>    

                    <?php endif; ?>


           
            </div>

