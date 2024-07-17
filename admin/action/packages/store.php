<?php

session_start();

require_once '../../../config/connection.php';

$userId = $_SESSION['admin_id'];
$name = $_POST['validation-name'];
$storageSize = $_POST['validation-size'];
$price = $_POST['validation-price'];
$duration = $_POST['validation-duration'];

if (!filter_var($storageSize, FILTER_VALIDATE_INT)) {
    $_SESSION['is_package_success'] = false;
    $_SESSION['message'] = 'Error Creating Package - Storage Size must be a number';
    echo "<script>window.history.back();</script>";
} else {
    $createdAt = date('Y-m-d H:i:s');
    $sql = "INSERT INTO packages (name, storage_size, price, duration, created_at, updated_at) VALUES ('$name', '$storageSize', '$price', '$duration', '$createdAt', '$createdAt')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['is_package_success'] = true;
        $_SESSION['message'] = 'Package Created Successfully';
        header('Location: ' . BASE_URL . 'admin/viewpackages');
    } else {
        $_SESSION['is_package_success'] = false;
        $_SESSION['message'] = 'Error Creating Package';
        echo "<script>window.history.back();</script>";
    }
}
