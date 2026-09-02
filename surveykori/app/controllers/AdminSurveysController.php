<?php

$admin = require_admin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $survey_id = (int)($_POST['survey_id'] ?? 0);
    $action    = $_POST['action'] ?? '';
    $survey    = db_one('SELECT * FROM surveys WHERE id = ?', [$survey_id]);

    if ($survey) {
        if ($action === 'approve' && $survey['status'] === 'pending') {
            db_run('UPDATE surveys SET status = "active", approved_at = NOW() WHERE id = ?', [$survey_id]);
            notify($survey['user_id'], 'Your survey "' . $survey['title'] . '" was approved and is now live.');
            set_flash('success', 'Survey approved.');

        } elseif ($action === 'reject' && $survey['status'] === 'pending') {
            $reason = trim($_POST['reason'] ?? '');
            if ($reason === '') {
                set_flash('error', 'Please write a rejection reason.');
                redirect('/admin/surveys.php?status=pending');
            }
            db_run('UPDATE surveys SET rejection_reason = ? WHERE id = ?', [$reason, $survey_id]);
            close_survey_and_refund($survey_id, 'rejected');
            notify($survey['user_id'], 'Your survey "' . $survey['title'] . '" was rejected: ' . $reason);
            set_flash('success', 'Survey rejected and points refunded.');

        } elseif ($action === 'close' && $survey['status'] === 'active') {
            close_survey_and_refund($survey_id, 'closed');
            notify($survey['user_id'], 'An administrator closed your survey "' . $survey['title'] . '".');
            set_flash('success', 'Survey closed and unused points refunded.');
        }
    }
    redirect('/admin/surveys.php?status=' . urlencode($_POST['back_status'] ?? 'pending'));
}

$status   = $_GET['status'] ?? 'pending';
$statuses = ['pending', 'active', 'completed', 'rejected', 'closed', 'draft', 'all'];
if (!in_array($status, $statuses)) {
    $status = 'pending';
}

$sql    = 'SELECT s.*, u.full_name, u.email FROM surveys s JOIN users u ON u.id = s.user_id';
$params = [];
if ($status !== 'all') {
    $sql     .= ' WHERE s.status = ?';
    $params[] = $status;
}
$sql   .= ' ORDER BY s.id DESC';
$rows   = db_all($sql, $params);

$page_title = 'Manage Surveys';
$active     = 'admin-surveys';
$is_admin_area = true;
