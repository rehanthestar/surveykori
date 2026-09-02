<?php
    require_once __DIR__ . '/../app/core/App.php';
    dispatch('SurveyCreateController', 'survey/create.php', 'app');
?>