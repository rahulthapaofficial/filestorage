<?php
session_start();

require_once '../../config/connection.php';

$response = array();
$userId = $_SESSION['id'];
$packageId = $_POST['package_id'];

$createdAt = date('Y-m-d H:i:s');
$subscriptionSql = "SELECT * FROM subscriptions WHERE user_id = $userId AND package_id = $packageId";
$subscriptionResult = mysqli_query($conn, $subscriptionSql);
$subscriptionCount = mysqli_num_rows($subscriptionResult);
$prevSubscriptionSql = "UPDATE subscriptions SET is_active = 0, updated_at = '$createdAt' WHERE user_id = $userId AND package_id != $packageId";
$prevSubscriptionResult = mysqli_query($conn, $prevSubscriptionSql);
if ($subscriptionCount) {
    $sql = "UPDATE subscriptions SET package_id = $packageId, updated_at = '$createdAt' WHERE user_id = $userId";
} else {
    $sql = "INSERT INTO subscriptions (user_id, package_id, created_at, updated_at) VALUES ($userId, $packageId, '$createdAt', '$createdAt')";
}
$query = mysqli_query($conn, $sql);
if ($query) {
    $response['success'] = true;
    $response['message'] = 'Subscribed successfully';
} else {
    $response['success'] = false;
    $response['message'] = 'Something went wrong';
}
echo json_encode($response);
