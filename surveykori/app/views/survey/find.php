
        <h1>Find Surveys</h1>
        <p class="text-muted">Answer surveys made by other students and researchers to earn points.</p>
        <?php show_flash(); ?>
        <div class="card">
            <form method="get" class="row">
                
                    <input class="input" style="max-width:260px" type="text" name="search" placeholder="Search title or description" value="<?php echo e($search); ?>">
                    <select class="select" style="max-width:180px" name="category">
                        <option value="">All categories</option>
                        <?php foreach (survey_categories() as $c): ?>
                            <option value="<?php echo e($c); ?>" <?php echo $category === $c ? 'selected' : ''; ?>><?php echo e($c); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select class="select" style="max-width:180px" name="sort">
                        <option value="newest" <?php echo $sort === 'newest' ? 'selected' : ''; ?>>Newest first</option>
                        <option value="reward" <?php echo $sort === 'reward' ? 'selected' : ''; ?>>Highest reward</option>
                    </select>
                    <button class="btn btn-primary" type="button">Apply</button>
                    <a class="btn btn-outline" href="<?php echo BASE_URL; ?>/survey/find.php">Reset</a>
                
            </form>
        </div>

        <?php if (!$surveys): ?>
            <div class="card text-muted">No surveys available right now. Please check again later.</div>
        <?php else: ?>
            <div class="grid-3">
                <?php foreach ($surveys as $s): ?>
                    <div class="survey-card">
                        <h3><?php echo e($s['title']); ?></h3>
                        <p class="small text-muted"><?php echo e(mb_substr($s['description'], 0, 90)); ?><?php echo mb_strlen($s['description']) > 90 ? '...' : ''; ?></p>
                        <div>
                            <span class="badge badge-cat"><?php echo e($s['category']); ?></span>
                            <?php echo survey_badge($s['status']); ?>
                        </div>
                        <div class="survey-meta">
                            <span>By <?php echo e($s['full_name']); ?></span>
                            <span><?php echo (int)$s['q_count']; ?> questions</span>
                        </div>
                        <div class="survey-meta">
                            <span>Reward: <strong><?php echo (int)$s['reward_per_response']; ?> points</strong></span>
                            <span><?php echo (int)$s['collected_responses']; ?> / <?php echo (int)$s['required_responses']; ?> responses</span>
                        </div>
                        <div class="survey-meta"><span>Deadline: <?php echo nice_date($s['deadline']); ?></span></div>
                        <div class="row">
                            <a class="btn btn-outline btn-sm" href="<?php echo BASE_URL; ?>/survey/view.php?id=<?php echo (int)$s['id']; ?>">View Survey</a>
                            <a class="btn btn-primary btn-sm" href="<?php echo BASE_URL; ?>/survey/take.php?id=<?php echo (int)$s['id']; ?>">Take Survey</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
                
            