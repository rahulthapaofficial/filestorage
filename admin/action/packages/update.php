<?php

session_start();

require_once '../../../config/connection.php';

$packageId = $_GET['id'];
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
    $sql = "UPDATE packages SET name = '$name', storage_size = '$storageSize', price = '$price', duration = '$duration', updated_at = '$createdAt' WHERE id = '$packageId'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['is_package_success'] = true;
        $_SESSION['message'] = 'Package Updated Successfully';
        header('Location: ' . BASE_URL . 'admin/viewpackages');
    } else {
        $_SESSION['is_package_success'] = false;
        $_SESSION['message'] = 'Error Updating Package';
        echo "<script>window.history.back();</script>";
    }
}
