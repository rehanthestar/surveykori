<?php

function e($text): string
{
    return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');
}
function redirect(string $path): void
{
    header('Location: ' . BASE_URL . $path);
    exit;
}

function set_flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function show_flash(): void
{
    if (!empty($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        echo '<div class="alert alert-' . e($flash['type']) . '">' . e($flash['message']) . '</div>';
    }
}

function nice_date($date): string
{
    if (!$date) {
        return '-';
    }

    return date('M d, Y', strtotime($date));
}

function survey_badge(string $status): string
{
    $map = [
        'draft' => 'badge-draft',
        'pending' => 'badge-pending',
        'active' => 'badge-active',
        'completed' => 'badge-completed',
        'rejected' => 'badge-rejected',
        'closed' => 'badge-closed',
    ];
    $class = $map[$status] ?? 'badge-draft';
    return '<span class="badge ' . $class . '">' . e(ucfirst($status)) . '</span>';
}

function survey_categories(): array
{
    return ['Education', 'Technology', 'Student Life', 'Research', 'Social Media', 'Health', 'Other'];
}

function question_types(): array
{
    return [
        'short_answer' => 'Short Answer',
        'paragraph' => 'Paragraph',
        'multiple_choice' => 'Multiple Choice',
        'checkboxes' => 'Checkboxes',
        'dropdown' => 'Dropdown',
        'linear_scale' => 'Linear Scale',
        'date' => 'Date',
        'time' => 'Time',
    ];
}

?>
