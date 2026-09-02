
                <h1><?php echo e($survey['title']); ?></h1>
                <p class="text-muted"><?php echo nl2br($survey['description']); ?></p>
                <p class="small text-muted">By <?php echo e($survey['full_name']); ?> &middot;
                     Reward <?php echo (int)$survey['reward_per_response']; ?> points</p>

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

                    <div class= "row">
                        <button type="button" class="btn btn-outline" id="prevBtn" onclick="prevQuestion()">Previous</button>
                        <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextQuestion()">Next</button>
                        <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">Submit Survey</button>
                    </div>

                </form>
            
        <script src="<?php echo BASE_URL; ?>assets/js/survey.js"></script>
       
