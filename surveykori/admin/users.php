<?php
require_once __DIR__ . '/../app/core/App.php';
dispatch('AdminUsersController', 'admin/users.php', 'app');
?>