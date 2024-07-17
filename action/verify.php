<?php
session_start();
require_once '../config/connection.php';

if (isset($_POST['otp'])) {
    $otp = $_POST['otp'];
    $sql = "SELECT * FROM users WHERE otp = '$otp'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if ($count) {
        $updateSql = "UPDATE users SET is_verified = 1 WHERE otp = '$otp'";
        $updateQuery = mysqli_query($conn, $updateSql);

        $selectSql = "SELECT * FROM users WHERE otp='$otp'";
        $selectQuery = mysqli_query($conn, $selectSql);
        $userData = mysqli_fetch_array($selectQuery);
        $_SESSION['is_authenticated'] = true;
        $_SESSION['is_verified'] = $userData['is_verified'];
        $_SESSION['id'] = $userData['id'];
        $_SESSION['first_name'] = $userData['first_name'];
        $_SESSION['last_name'] = $userData['last_name'];


        header('Location: ' . BASE_URL . 'dashboard.php');
    } else {
        $_SESSION['message'] = "Invalid OTP !";
        header('Location: ' . BASE_URL . 'auth/login');
    }
} else {
    $mobile_no = $_GET['mobile_no'];
    $hash = $_GET['hash'];

    $sql = "SELECT * FROM users WHERE mobile_no='$mobile_no' AND hash='$hash'";
    $query = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($query);
    if ($count) {
        $updateSql = "UPDATE users SET is_verified = 1 WHERE mobile_no='$mobile_no' AND hash='$hash'";
        $updateQuery = mysqli_query($conn, $updateSql);

        $selectSql = "SELECT * FROM users WHERE mobile_no='$mobile_no' AND hash='$hash'";
        $selectQuery = mysqli_query($conn, $selectSql);
        $userData = mysqli_fetch_array($selectQuery);
        $_SESSION['is_authenticated'] = true;
        $_SESSION['is_verified'] = $userData['is_verified'];
        $_SESSION['id'] = $userData['id'];
        $_SESSION['first_name'] = $userData['first_name'];
        $_SESSION['last_name'] = $userData['last_name'];

        header('Location: ' . BASE_URL . 'dashboard.php');
    }
}
