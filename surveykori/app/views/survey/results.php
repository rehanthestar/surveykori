<div class="row space-between">
    <h1><?php echo e($survey['title']); ?></h1>
    <a class="btn btn-outline btn-sm" href="?id=<?php echo $survey_id; ?>&export=csv">Export CSV</a>
</div>

<div class="card">
    <div class="row space-between">
        <strong><?php echo $total; ?> / <?php echo $required; ?> Responses</strong>
        <span><?php echo $percent; ?>%</span>
    </div>
    <div class="progress mt"><span style="width:<?php echo min($percent, 100); ?>%"></span></div>
    <p class="small text-muted mt">
        Status: <?php echo survey_badge($survey['status']); ?> &middot;
        Created: <?php echo nice_date($survey['created_at']); ?> &middot;
        Deadline: <?php echo nice_date($survey['deadline']); ?>
    </p>
</div>

<h2>Answer Statistics</h2>

<?php foreach ($questions as $index => $q): ?>
    <div class="card">
        <h3><?php echo ($index + 1) . '. ' . e($q['question_text']); ?></h3>
        <p class="q-type"><?php echo e(question_types()[$q['question_type']]); ?></p>

        <?php if (in_array($q['question_type'], ['multiple_choice', 'checkbox', 'rating'])): ?>
            <?php
            if ($q['question_type'] === 'rating') {
                $labels = ['1', '2', '3', '4', '5'];
            } else {
                $labels = [];
                foreach (db_all('SELECT option_text FROM question_options WHERE question_id = ? ORDER BY option_order', [$q['id']]) as $o) {
                    $labels[] = $o['option_text'];
                }
            }

            $all_answers = db_all(
                'SELECT a.answer_text FROM answers a
                   JOIN responses r ON r.id = a.response_id
                  WHERE a.question_id = ? AND r.survey_id = ?',
                [$q['id'], $survey_id]
            );
            $counts = array_fill_keys($labels, 0);
            foreach ($all_answers as $row) {
                foreach (explode(', ', $row['answer_text']) as $part) {
                    $part = trim($part);
                    if ($part !== '' && isset($counts[$part])) {
                        $counts[$part]++;
                    }
                }
            }
            $sum = array_sum($counts);
            ?>

            <?php foreach ($counts as $label => $count): ?>
                <?php $p = $sum > 0 ? round(($count / $sum) * 100) : 0; ?>
                <div class="chart-row">
                    <div class="chart-label">
                        <span><?php echo e($label); ?><?php echo $q['question_type'] === 'rating' ? ' &#9733;' : ''; ?></span>
                        <span><?php echo $count; ?> (<?php echo $p; ?>%)</span>
                    </div>
                    <div class="chart-bar"><span data-percent="<?php echo $p; ?>" style="width:<?php echo $p; ?>%"></span></div>
                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <?php
            $texts = db_all(
                'SELECT a.answer_text FROM answers a
                   JOIN responses r ON r.id = a.response_id
                  WHERE a.question_id = ? AND r.survey_id = ? AND a.answer_text <> "" LIMIT 20',
                [$q['id'], $survey_id]
            );
            ?>
            <?php if (!$texts): ?>
                <p class="text-muted small">No text answers yet.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($texts as $t): ?>
                        <li class="small"><?php echo e($t['answer_text']); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<h2>Individual Responses</h2>
<?php if (!$responses): ?>
    <div class="card text-muted">No responses yet.</div>
<?php else: ?>
    <?php foreach ($responses as $r): ?>
        <div class="card">
            <div class="row space-between">
                <strong><?php echo e($r['full_name']); ?></strong>
                <span class="small text-muted"><?php echo nice_date($r['submitted_at']); ?></span>
            </div>
            <table class="table">
                <?php foreach ($questions as $q): ?>
                    <?php $a = db_one('SELECT answer_text FROM answers WHERE response_id = ? AND question_id = ?', [$r['id'], $q['id']]); ?>
                    <tr>
                        <th style="width:40%"><?php echo e($q['question_text']); ?></th>
                        <td><?php echo $a && $a['answer_text'] !== '' ? e($a['answer_text']) : '<span class="text-muted">(no answer)</span>'; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<script src="<?php echo BASE_URL; ?>/assets/js/charts.js"></script>