<?php

session_start();

require_once '../../../config/connection.php';

$userId = $_GET['id'];
$sql = "DELETE FROM users WHERE id = '$userId'";
$query = mysqli_query($conn, $sql);
if ($query) {
    $folderSqlQuery = mysqli_query($conn, "DELETE FROM folders WHERE user_id = '$userId'");
    $fileSqlQuery = mysqli_query($conn, "DELETE FROM files WHERE user_id = '$userId'");
    $subscriptionSqlQuery = mysqli_query($conn, "DELETE FROM subscriptions WHERE user_id = '$userId'");
    $directory = '../../../public/storage/users' . '/' . $userId;
    if (file_exists($directory)) {
        $old = umask(0);
        rmdir($directory);
        umask($old);
    }
    $_SESSION['is_user_action_success'] = true;
    $_SESSION['message'] = 'User Deleted Successfully';
    header('Location: ' . BASE_URL . 'admin/users');
} else {
    $_SESSION['is_user_action_success'] = false;
    $_SESSION['message'] = 'Error Deleting User';
    echo "<script>window.history.back();</script>";
}
