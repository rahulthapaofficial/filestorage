<?php

session_start();

require_once '../../config/connection.php';
require '../../helpers/common.php';

$userId = $_SESSION['id'];
$slug = $_GET['slug'];
$folderSql = "SELECT folder_id FROM files WHERE user_id = '$userId' AND slug = '$slug'";
$folderQuery = mysqli_query($conn, $folderSql);
$folderId = mysqli_fetch_assoc($folderQuery)['folder_id'];
if (!checkFileIfExists($userId, $folderId, $slug)) {
    $_SESSION['is_file_restored'] = false;
    $_SESSION['message'] = 'File Not Available!';
    echo "<script>window.history.back();</script>";
} else {
    $sql = "UPDATE files SET deleted_at = NULL WHERE user_id = '$userId' AND folder_id = '$folderId' AND slug = '$slug'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['is_file_restored'] = true;
        $_SESSION['message'] = 'File Deleted Successfully';
        header('Location: ' . BASE_URL . 'files');
    } else {
        $_SESSION['is_file_restored'] = false;
        $_SESSION['message'] = 'Error Deleting File';
        echo "<script>window.history.back();</script>";
    }
}
