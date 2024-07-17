<?php

session_start();

require_once '../../config/connection.php';
require '../../helpers/common.php';

$name = $_POST['name'];
$userId = $_SESSION['id'];
$slug = str_replace(' ', '-', strtolower($name));
if (checkFolderIfExists($userId, $slug)) {
    $_SESSION['is_folder_created'] = false;
    $_SESSION['message'] = 'Folder already exists';
    echo "<script>window.history.back();</script>";
} else {
    $createdAt = date('Y-m-d H:i:s');
    $sql = "INSERT INTO folders (user_id, name, slug, created_at, updated_at) VALUES ('$userId', '$name', '$slug', '$createdAt', '$createdAt')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $directory = '../../public/storage/users' . '/' . $userId . '/' . $slug;
        if (!file_exists($directory)) {
            $old = umask(0);
            echo mkdir($directory, 0777);
            umask($old);
        }
        $_SESSION['is_folder_created'] = true;
        $_SESSION['message'] = 'Folder Created Successfully';
        header('Location: ' . BASE_URL . 'folders');
    } else {
        $_SESSION['is_folder_created'] = false;
        $_SESSION['message'] = 'Error Creating Folder';
        echo "<script>window.history.back();</script>";
    }
}
