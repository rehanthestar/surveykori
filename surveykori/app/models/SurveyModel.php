<?php

function survey_find($id)
{
    return db_one('SELECT * FROM surveys WHERE id = ?', [$id]);
}

function question_count($survey_id)
{
    $row = db_one('SELECT COUNT(*) AS c FROM questions WHERE survey_id = ?', [$survey_id]);
    return (int)$row['c'];
}

function survey_questions($survey_id)
{
    return db_all('SELECT * FROM questions WHERE survey_id = ? ORDER BY question_order', [$survey_id]);
}

function question_options($question_id)
{
    return db_all('SELECT * FROM question_options WHERE question_id = ? ORDER BY option_order', [$question_id]);
}

function get_own_survey($survey_id, $user_id)
{
    $survey = survey_find($survey_id);
    if (!$survey || (int)$survey['user_id'] !== (int)$user_id) {
        return null;
    }
    return $survey;
}

function survey_set_status($survey_id, $status)
{
    db_run('UPDATE surveys SET status = ? WHERE id = ?', [$status, $survey_id]);
}

function close_survey_and_refund($survey_id, $new_status = 'closed')
{
    global $pdo;

    $survey = survey_find($survey_id);
    if (!$survey) {
        return;
    }

    $remaining = (int)$survey['required_responses'] - (int)$survey['collected_responses'];
    $refund    = $remaining > 0 ? $remaining * (int)$survey['reward_per_response'] : 0;

    $pdo->beginTransaction();
    try {
        if ($refund > 0) {
            db_run(
                'UPDATE user_points
                    SET locked_points = GREATEST(locked_points - ?, 0),
                        available_points = available_points + ?,
                        spent_points = GREATEST(spent_points - ?, 0)
                  WHERE user_id = ?',
                [$refund, $refund, $refund, $survey['user_id']]
            );
            add_transaction($survey['user_id'], $survey_id, 'REFUND', $refund, 'Refund of unused points from "' . $survey['title'] . '"');
            notify($survey['user_id'], 'You received a refund of ' . $refund . ' points from "' . $survey['title'] . '".');
        }
        survey_set_status($survey_id, $new_status);
        $pdo->commit();
    } catch (Exception $ex) {
        $pdo->rollBack();
    }
}

function survey_categories()
{
    return ['Education', 'Technology', 'Student Life', 'Research', 'Social Media', 'Health', 'Other'];
}

function question_types()
{
    return [
        'short_answer' => 'Short Answer',
        'paragraph'    => 'Paragraph',
        'multiple_choice' => 'Multiple Choice',
        'checkbox' => 'Checkbox',
        'rating' => 'Rating',
    ];
}