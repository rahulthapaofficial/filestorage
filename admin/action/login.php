<?php
session_start();
if (isset($_POST['login'])) {
    require_once '../../config/connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE email='$email'";
    $query = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($query);

    if ($count) {
        $result = mysqli_fetch_array($query);

        $useremail = $result['email'];
        $hashedPassword = $result['password'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['is_admin_authenticated'] = true;
            $_SESSION['admin_id'] = $result['id'];
            $_SESSION['admin_first_name'] = $result['first_name'];
            $_SESSION['admin_last_name'] = $result['last_name'];
            $_SESSION['admin_email'] = $result['email'];

            header('Location: ' . BASE_URL . 'admin/dashboard');
        } else {
            $_SESSION['message'] = "Invalid Credentials !";
            header('Location: ' . BASE_URL . 'admin/login');
        }
    } else {
        $_SESSION['message'] = "Invalid Credentials !";
        echo "<script>window.history.back();</script>";
    }
}
