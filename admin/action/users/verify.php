<?php

session_start();

require_once '../../../config/connection.php';

$userId = $_GET['id'];
$sql = "UPDATE users SET is_verified = 1 WHERE id = '$userId'";
$query = mysqli_query($conn, $sql);
if ($query) {
    $_SESSION['is_user_action_success'] = true;
    $_SESSION['message'] = 'User Verified Successfully';
    header('Location: ' . BASE_URL . 'admin/users');
} else {
    $_SESSION['is_user_action_success'] = false;
    $_SESSION['message'] = 'Error Verifying User';
    echo "<script>window.history.back();</script>";
}
