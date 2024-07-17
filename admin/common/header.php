<?php
session_start();
require_once '../config/connection.php';
include('./helpers/common.php');

if (!isset($_SESSION['is_admin_authenticated'])) {
    header('Location: ' . BASE_URL . 'admin/login');
}

$userFullName = $_SESSION['admin_first_name'] . ' ' . $_SESSION['admin_last_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="File Storage">
    <meta name="author" content="File Storage">

    <title>File Storage | Dashboard</title>
    <style>
        body {
            opacity: 0;
        }
    </style>
    <link rel="stylesheet" href="<?php echo BASE_URL . 'admin/assets/css/styles.css' ?>">
    <script src="assets/js/settings.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-120946860-7');
    </script>
</head>

<body>
    <div class="splash active">
        <div class="splash-icon"></div>
    </div>