<?php

session_start();

require_once '../../config/connection.php';
require '../../helpers/common.php';

$userId = $_SESSION['id'];
$slug = $_GET['slug'];
$folderSql = "SELECT folder_id, type FROM files WHERE user_id = '$userId' AND slug = '$slug'";
$folderQuery = mysqli_query($conn, $folderSql);
$folderData = mysqli_fetch_assoc($folderQuery);
$folderId = $folderData['folder_id'];
$fileType = $folderData['type'];
if (!checkFileIfExists($userId, $folderId, $slug)) {
    $_SESSION['is_file_deleted'] = false;
    $_SESSION['message'] = 'File Not Available!';
    echo "<script>window.history.back();</script>";
} else {
    $deletedAt = date('Y-m-d H:i:s');
    $sql = "DELETE FROM files WHERE user_id = '$userId' AND folder_id = '$folderId' AND slug = '$slug'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        if ($folderId) {
            $folderSlug = getFolderSlugById($folderId);
            $directory = '../../public/storage/users' . '/' . $userId . '/' . $folderSlug . '/';
        } else {
            $directory = '../../public/storage/users' . '/' . $userId . '/';
        }
        unlink($directory . $slug . '.' . $fileType);
        $_SESSION['is_file_deleted'] = true;
        $_SESSION['message'] = 'File Deleted Successfully';
        header('Location: ' . BASE_URL . 'files');
    } else {
        $_SESSION['is_file_deleted'] = false;
        $_SESSION['message'] = 'Error Deleting File';
        echo "<script>window.history.back();</script>";
    }
}
