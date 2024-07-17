<?php   
require_once '../config/connection.php';

$otp = $_POST['otp'];

$sql = "SELECT * FROM users WHERE otp = '$otp'";

$query = mysqli_query($conn, $sql);

$result = mysqli_num_rows($query);

if($result){
    header('Location: ../index.php');
}


?>