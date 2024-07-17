<?php
session_start();

require_once '../../config/connection.php';

$response = array();
$userId = $_SESSION['id'];
$packageId = $_GET['packageId'];

$createdAt = date('Y-m-d H:i:s');
$sql = "DELETE FROM subscriptions WHERE user_id = $userId AND package_id = $packageId AND is_active = 1";
$query = mysqli_query($conn, $sql);
if ($query) {
    $subscriptionSql = "UPDATE subscriptions SET is_active = 1, updated_at = '$createdAt' WHERE user_id = $userId ORDER BY id DESC LIMIT 1";
    $subscriptionQuery = mysqli_query($conn, $subscriptionSql);
    $response['success'] = true;
    $response['message'] = 'Unsubscribed Successfully';
} else {
    $response['success'] = false;
    $response['message'] = 'Something went wrong';
}
header("Location: " . BASE_URL . "plans");
