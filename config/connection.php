<?php
include 'config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$a = 0;
if ($conn->connect_error) {
    die("Connection Failed:" . $conn->connect_error);
}
