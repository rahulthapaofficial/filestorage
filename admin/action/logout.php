<?php
session_start();
include '../../config/config.php';
unset(
    $_SESSION['is_admin_authenticated'],
    $_SESSION['admin_id'],
    $_SESSION['admin_first_name'],
    $_SESSION['admin_last_name'],
    $_SESSION['admin_email']
);

header('Location: ' . BASE_URL . 'admin/login');
