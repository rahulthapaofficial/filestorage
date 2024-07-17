<?php

session_start();
require_once '../config/connection.php';

$mobile_no = $_POST['mobile_no'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE mobile_no='$mobile_no'";
$query = mysqli_query($conn, $sql);

$count = mysqli_num_rows($query);

if ($count) {
    $result = mysqli_fetch_array($query);

    $hashedPassword = $result['password'];

    if (password_verify($password, $hashedPassword)) {
        $_SESSION['is_authenticated'] = true;
        $_SESSION['is_verified'] = $result['is_verified'];
        $_SESSION['id'] = $result['id'];
        $_SESSION['first_name'] = $result['first_name'];
        $_SESSION['last_name'] = $result['last_name'];
        $_SESSION['mobile_no'] = $result['mobile_no'];
        $_SESSION['email'] = $result['email'];

        header('Location: ' . BASE_URL . 'dashboard');
    } else {
        $_SESSION['message'] = "Invalid Credentials !";
        header('Location: ' . BASE_URL . 'auth/login');
    }
} else {
    $_SESSION['message'] = "Invalid Credentials !";
    header('Location: ' . BASE_URL . 'auth/login');
}
