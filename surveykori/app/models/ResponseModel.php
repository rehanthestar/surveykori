<?php

function has_responded($survey_id, $user_id)
{
    return (bool)db_one('SELECT id FROM responses WHERE survey_id = ? AND user_id = ?', [$survey_id, $user_id]);
}

function survey_responses($survey_id)
{
    return db_all(
        'SELECT r.*, u.full_name FROM responses r JOIN users u ON u.id = r.user_id
          WHERE r.survey_id = ? ORDER BY r.id DESC',
        [$survey_id]
    );
}

function response_answer($response_id, $question_id)
{
    return db_one('SELECT answer_text FROM answers WHERE response_id = ? AND question_id = ?',
        [$response_id, $question_id]);
}

