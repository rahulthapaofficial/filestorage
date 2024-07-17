<?php

session_start();

require_once '../config/connection.php';
echo $a;
$name = $_POST['validation-name'];
$secretKey = $_POST['validation-secret-key'];
$publicKey = $_POST['validation-public-key'];
$createdAt = date('Y-m-d H:i:s');

$paymentSetupSql = "SELECT id FROM payment_setups ORDER BY id DESC LIMIT 1";
$paymentSetupQuery = mysqli_query($conn, $paymentSetupSql);
$countPaymentSetup = mysqli_num_rows($paymentSetupQuery);
if ($countPaymentSetup) {
    $_SESSION['is_payment_set'] = true;
    $_SESSION['message'] = 'Payment Setup Successfully';
    header('Location: ' . BASE_URL . 'admin/payment-setups');
    $paymentSetupId = mysqli_fetch_assoc($paymentSetupQuery)['id'];
    $sql = "UPDATE payment_setups SET name = '$name', secret_key = '$secretKey', public_key = '$publicKey', updated_at = '$createdAt' WHERE id = '$paymentSetupId'";
} else {
    $sql = "INSERT INTO payment_setups (name, secret_key, public_key, created_at, updated_at) VALUES ('$name', '$secretKey', '$publicKey', '$createdAt', '$createdAt')";
}
$query = mysqli_query($conn, $sql);
if ($query) {
    $_SESSION['is_payment_set'] = true;
    $_SESSION['message'] = 'Payment Setup Successfully';
    header('Location: ' . BASE_URL . 'admin/payment-setups');
} else {
    $_SESSION['is_payment_set'] = false;
    $_SESSION['message'] = 'Error Payment Setup';
    // echo "<script>window.history.back();</script>";
}
