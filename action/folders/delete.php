<?php

session_start();

require_once '../../config/connection.php';
require '../../helpers/common.php';

$userId = $_SESSION['id'];
$slug = $_GET['slug'];
if (!checkFolderIfExists($userId, $slug)) {
    $_SESSION['is_folder_deleted'] = false;
    $_SESSION['message'] = 'Folder Not Available!';
    echo "<script>window.history.back();</script>";
} else {
    $deletedAt = date('Y-m-d H:i:s');
    $sql = "UPDATE folders SET deleted_at = '$deletedAt' WHERE user_id = '$userId' AND slug = '$slug'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['is_folder_deleted'] = true;
        $_SESSION['message'] = 'Folder Deleted Successfully';
        header('Location: ' . BASE_URL . 'folders');
    } else {
        $_SESSION['is_folder_deleted'] = false;
        $_SESSION['message'] = 'Error Deleting Folder';
        echo "<script>window.history.back();</script>";
    }
}
