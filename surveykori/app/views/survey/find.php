
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
        
        <div class="grid-3">
            <div class="survey-card">
                <h3>Campus Transport Experience</h3>
                <p class="small text-muted">How do students travel to campus every day and what problems do they face?</p>
                <div>
                    <span class="badge badge-cat">Social</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Ayesha Rahman</span>
                    <span>6 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>5 points</strong></span>
                    <span>8 / 25 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 20 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
            </div>

            <div class="survey-card">
                <h3>Library Facility Feedback</h3>
                <p class="small text-muted">Share your opinion about the central library services and reading environment.</p>
                <div>
                    <span class="badge badge-cat">Education</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Nusrat Jahan</span>
                    <span>7 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>4 points</strong></span>
                    <span>18 / 20 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 18 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
            </div>
<div class="survey-card">
                <h3>Library Facility Feedback</h3>
                <p class="small text-muted">Share your opinion about the central library services and reading environment.</p>
                <div>
                    <span class="badge badge-cat">Education</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Nusrat Jahan</span>
                    <span>7 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>4 points</strong></span>
                    <span>18 / 20 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 18 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
            </div>
<div class="survey-card">
                <h3>Library Facility Feedback</h3>
                <p class="small text-muted">Share your opinion about the central library services and reading environment.</p>
                <div>
                    <span class="badge badge-cat">Education</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Nusrat Jahan</span>
                    <span>7 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>4 points</strong></span>
                    <span>18 / 20 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 18 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
            </div>
<div class="survey-card">
                <h3>Library Facility Feedback</h3>
                <p class="small text-muted">Share your opinion about the central library services and reading environment.</p>
                <div>
                    <span class="badge badge-cat">Education</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Nusrat Jahan</span>
                    <span>7 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>4 points</strong></span>
                    <span>18 / 20 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 18 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
                </div>
            </div>
<div class="survey-card">
                <h3>Library Facility Feedback</h3>
                <p class="small text-muted">Share your opinion about the central library services and reading environment.</p>
                <div>
                    <span class="badge badge-cat">Education</span>
                    <span class="badge badge-active">Active</span>
                </div>
                <div class="survey-meta">
                    <span>By Nusrat Jahan</span>
                    <span>7 questions</span>
                </div>
                <div class="survey-meta">
                    <span>Reward: <strong>4 points</strong></span>
                    <span>18 / 20 responses</span>
                </div>
                <div class="survey-meta"><snap>Deadline: 18 Sep 2026</snap></div>
                <div class="row">
                    <a class="btn btn-outline btn-sm" href="view.html">View Survey</a>
                    <a class="btn btn-primary btn-sm" href="take.html">Take Survey</a>
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