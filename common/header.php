<?php
session_start();
require_once './config/connection.php';
include('helpers/common.php');

if (isset($_SESSION['is_authenticated'])) {
  if (isset($_SESSION['is_verified'])) {
    if (!$_SESSION['is_verified']) {
      header('Location: ' . BASE_URL . 'auth/verify');
    }
  }
} else {
  header('Location: ' . BASE_URL . 'auth/login');
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo APP_NAME . ' | Store and Explore Your Files' ?></title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" />

  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/backend.min.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/vendor/@fortawesome/fontawesome-free/css/all.min.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/vendor/remixicon/fonts/remixicon.css' ?>">

  <!-- Viewer Plugin -->
  <!--PDF-->
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/pdf/pdf.viewer.css' ?>">
  <!--Docs-->
  <!--PPTX-->
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/PPTXjs/css/pptxjs.css' ?>">
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/PPTXjs/css/nv.d3.min.css' ?>">
  <!--All Spreadsheet -->
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/SheetJS/handsontable.full.min.css' ?>">
  <!--Image viewer-->
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/verySimpleImageViewer/css/jquery.verySimpleImageViewer.css' ?>">
  <!--officeToHtml-->
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/vendor/doc-viewer/include/officeToHtml/officeToHtml.css' ?>">
  <!-- Custom Styles Starts from Here -->
  <link rel="stylesheet" href="<?php echo BASE_URL . 'assets/css/custom/styles.css' ?>">
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>

<body class="  ">
  <!-- loader Start -->
  <div id="loading">
    <div id="loading-center">
    </div>
  </div>