<?php session_start();
require_once  '../config/connection.php';
include 'send-otp.php';
// include 'send-mail.php';

$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$mobile_no = $_POST['mobile_no'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];
$otp = rand(100000, 999999);
$hash = md5($otp);

if (empty($firstName) || empty($lastName) || empty($mobile_no) || empty($password) || empty($confirmPassword)) {
   responseData("All fields are required !", false);
} else if (filter_var($firstName, FILTER_VALIDATE_INT) || filter_var($lastName, FILTER_VALIDATE_INT)) {
   responseData("Name must be a string !", false);
} else if (strlen($mobile_no) !== 10) {
   responseData("Invalid Mobile No !", false);
} else if (strlen($password) < 8) {
   responseData('Password must be of 8 characters !', false);
} else if ($password != $confirmPassword) {
   responseData('Password and Confirm Password does not match', false);
} else {
   $checkMobileNoSql = "SELECT * FROM users WHERE mobile_no = '$mobile_no'";
   $checkMobileNoQuery = mysqli_query($conn, $checkMobileNoSql);
   $isMobileNoExists = mysqli_num_rows($checkMobileNoQuery);
   if ($isMobileNoExists) {
      responseData("Mobile No. Already Exists !", false);
   } else {
      $email = strtolower($firstName) . rand(1000, 9999) . "@filestorage.com";
      $createdAt = date('Y-m-d H:i:s');
      $password = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO users(first_name, last_name, mobile_no, email, password, otp, hash, created_at, updated_at) values ('$firstName', '$lastName', '$mobile_no', '$email', '$password', '$otp', '$hash', '$createdAt', '$createdAt')";
      $query = mysqli_query($conn, $sql);

      if ($query) {
         $selectUser = "SELECT * FROM users WHERE mobile_no = '$mobile_no'";
         $queryUser = mysqli_query($conn, $selectUser);
         $currentUser = mysqli_fetch_object($queryUser);
         $_SESSION['is_authenticated'] = true;
         $_SESSION['is_verified'] = $currentUser->is_verified;
         $_SESSION['id'] = $currentUser->id;
         $_SESSION['first_name'] = $currentUser->first_name;
         $_SESSION['last_name'] = $currentUser->last_name;
         $_SESSION['mobile_no'] = $currentUser->mobile_no;
         $_SESSION['email'] = $currentUser->email;
         $directory = '../public/storage/users' . '/' . $currentUser->id;
         if (!file_exists($directory)) {
            $old = umask(0);
            mkdir($directory, 0777);
            umask($old);
         }
         $subscriptionSqlQuery = mysqli_query($conn, "INSERT INTO subscriptions(user_id, package_id, created_at, updated_at) VALUES('$currentUser->id', 1, '$createdAt', '$createdAt')");
         sendOTP($currentUser);
         // sendVerificationMail($currentUser);
         responseData("Successfully Registered !");
      } else {
         responseData("Something went wrong !", false);
      }
   }
}

function responseData($data, $success = true)
{
   $_SESSION['message'] = $data;
   if ($success) {
      header('Location: ' . BASE_URL . 'auth/verify');
   } else {
      echo "<script>window.history.back();</script>";
   }
}
