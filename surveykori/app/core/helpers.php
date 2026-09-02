<?php

function e($text): string
{
    return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');
}
function redirect($path)
{
    header('Location: ' . BASE_URL . $path);
    exit;
}

function set_flash( $type,  $message)
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function show_flash()
{
    if (!empty($_SESSION['flash'])) {
        $f = $_SESSION['flash'];
        unset($_SESSION['flash']);
        echo '<div class="alert alert-' . e($f['type']) . '">' . e($f['message']) . '</div>';
    }
}

function nice_date($date)
{
    if (!$date) {
        return '-';
    }

    return date('d M, Y', strtotime($date));
}

function survey_badge($status)
{
    $map = [
        'draft' => 'badge-draft',
        'pending' => 'badge-pending',
        'active' => 'badge-active',
        'completed' => 'badge-completed',
        'rejected' => 'badge-rejected',
        'closed' => 'badge-closed',
    ];
    $class = isset($map[$status]) ? $map[$status] : 'badge-draft';
    return '<span class="badge ' . $class . '">' . e(ucfirst($status)) . '</span>';
}



?>
