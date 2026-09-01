
                <h1><?php echo e($survey['title']); ?></h1>
                <p class="text-muted"><?php echo e($survey['description']); ?></p>
                <p class="small text-muted">By <?php echo e($survey['full_name']); ?> &middot; Reward <?php echo (int)$survey['reward_per_response']; ?> points</p>

                <div class="card">
                    <div class="row space-between">
                        <strong id="progressText">Question 1</strong>
                        <span class="small text-muted"><?php echo count($questions); ?> questions</span>
                    </div>
                    <div class="progress mt"><span id="progressBar" style="width:0%"></span></div>
                </div>

                <form method="post" action="<?php echo BASE_URL; ?>/survey/submit.php" onsubmit="return validateSurvey()">
                    <input type="hidden" name="survey_id" value="<?php echo $survey_id; ?>">

                    <?php foreach ($questions as $i => $q): ?>
                        <div class="card take-question" data-required="<?php echo (int)$q['is_required']; ?>" style="display:none">
                            <h3><?php echo ($i + 1) . '. ' . e($q['question_text']); ?>
                                <?php if ($q['is_required']): ?><span class="text-danger">*</span><?php endif; ?>
                            </h3>

                            <?php $name = 'answer[' . (int)$q['id'] . ']'; ?>

                            <?php if ($q['question_type'] === 'short_answer'): ?>
                                <input class="input" type="text" name="<?php echo $name; ?>" maxlength="255">

                            <?php elseif ($q['question_type'] === 'paragraph'): ?>
                                <textarea class="textarea" name="<?php echo $name; ?>" maxlength="2000"></textarea>

                            <?php elseif ($q['question_type'] === 'rating'): ?>
                                <div class="rating-group">
                                    <?php for ($r = 1; $r <= 5; $r++): ?>
                                        <label class="check-line">
                                            <input type="radio" name="<?php echo $name; ?>" value="<?php echo $r; ?>"> <?php echo $r; ?> &#9733;
                                        </label>
                                    <?php endfor; ?>
                                </div>

                            <?php elseif ($q['question_type'] === 'multiple_choice'): ?>
                                <?php foreach (db_all('SELECT * FROM question_options WHERE question_id = ? ORDER BY option_order', [$q['id']]) as $o): ?>
                                    <label class="check-line">
                                        <input type="radio" name="<?php echo $name; ?>" value="<?php echo e($o['option_text']); ?>">
                                        <?php echo e($o['option_text']); ?>
                                    </label>
                                <?php endforeach; ?>

                            <?php else: /* checkbox */ ?>
                                <?php foreach (db_all('SELECT * FROM question_options WHERE question_id = ? ORDER BY option_order', [$q['id']]) as $o): ?>
                                    <label class="check-line">
                                        <input type="checkbox" name="answer[<?php echo (int)$q['id']; ?>][]" value="<?php echo e($o['option_text']); ?>">
                                        <?php echo e($o['option_text']); ?>
                                </label>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <p class="error-text"></p>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="card take-question" data-required="1" style="display:none">
                        <h3>1. How many hours do you study every day? <span class="text-danger">*</span></h3>
                        <input class="input" type="text" maxlength="255">
                        <p class="error-text"></p>
                    </div>
                    <div class="card take-question" data-required="1" style="display: none;">
                        <h3>2. Where do you ususally study? <span class="text-danger">*</span></h3>
                        <label class="check-line"><input type="radio" name="q2" value="Home">Home</label>
                        <label class="check-line"><input type="radio" name="q2" value="Library">Library</label>
                        <label class="check-line"><input type="radio" name="q2" value="Campus">Campus</label>
                        <label class="check-line"><input type="radio" name="q2" value="Other">Other</label>
                        <p class="error-text"></p>
                    </div>
                    <div class="card take-question" data-required="0" style="display: none;">
                        <h3>3. Which study tools do you use?</h3>
                        <label class="check-line"><input type="checkbox" name="q3" value="Printed books"> Printed books</label>
                        <label class="check-line"><input type="checkbox" name="q3" value="E-books"> E-books</label>
                        <label class="check-line"><input type="checkbox" name="q3" value="Video lectures"> Video lectures</label>
                        <label class="check-line"><input type="checkbox" name="q3" value="Group study"> Group study</label>
                        <p class="error-text"></p>
                    </div>
                    <div class="card take-question" data-required="1" style="display: none;">
                        <h3>4. Rate Your current study routine. <span class="text-danger">*</span></h3>
                        <div class="rating-group">
                            <label class="check-line"><input type="radio" name="q4" value="1"> 1 &#9733;</label>
                            <label class="check-line"><input type="radio" name="q4" value="2"> 2 &#9733;</label>
                            <label class="check-line"><input type="radio" name="q4" value="3"> 3 &#9733;</label>
                            <label class="check-line"><input type="radio" name="q4" value="4"> 4 &#9733;</label>
                            <label class="check-line"><input type="radio" name="q4" value="5"> 5 &#9733;</label>
                        </div>
                        <p class="error-text"></p>
                    </div>
                    <div class="card take-question" data-required="1" style="display: none;">
                        <h3>5. Describe one problem that distrubs your study. <span class="text-danger">*</span></h3>
                        <textarea class="textarea" maxlength="2000"></textarea>
                        <p class="error-text"></p>
                    </div>
                    
                    <div class="row">
                        <button type="button" class="btn btn-outline" id="prevBtn" onclick="prevQuestion()">Previous</button>
                        <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextQuestion()">Next</button>
                        <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">Submit Survey</button>
                    </div>

                </form>
            </main>
        </div>
        <footer class="footer">
            <p>Survey Kori &mdash; University Web Technology Project</p>
        </footer>
        <script src="../assets/js/script.js"></script>
        <script src="../assets/js/survey.js"></script>
    </body>
</html>