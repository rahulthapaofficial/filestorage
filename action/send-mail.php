<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function sendVerificationMail($user)
{
    $name = $user->first_name . ' ' . $user->last_name;
    $email = $user->email;
    $password = $_POST['password'];
    $otp = $user->otp;
    $hash = $user->hash;
    $emailVerificationUrl = BASE_URL . "action/verify?email=" . $email . "&hash=" . $hash;
    $emailVerificationPage = BASE_URL . "auth/verify";

    $to = $email;
    $subject = 'Signup | Verification';
    $body = "
<table width='100%' cellspacing='0' cellpadding='0'>
    <tr>
        <td>
            <table cellspacing='0' cellpadding='0'>
                <tr>
                    <td style='border-radius: 2px;' bgcolor='#24292e'>
                        <p style='width: 100%; padding: 8px 15px; font-size: 18px; color: #fff'>Email Verification | File Storage Security</p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
Thanks for signing up!<br />
Your OTP (One Time Passcode) for File Storage is: " . $otp . "<br />
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br />
<a href='" . $emailVerificationPage . "'>Click Here</a> to continue with your OTP (One Time Passcode).<br />
------------------------<br />
Email : " . $email . "<br />
Password: " . $password . "<br />
OTP : " . $otp . "<br />
------------------------<br />
Please click the button below to verify your email address:<br />
<table width='100%' cellspacing='0' cellpadding='0'>
    <tr>
        <td>
            <table cellspacing='0' cellpadding='0'>
                <tr>
                    <td style='border-radius: 2px;' bgcolor='#24292e'>
                        <a href='" . $emailVerificationUrl . "' target='_blank' style='padding: 8px 12px; border-radius: 2px; font-family: Helvetica, Arial, sans-serif;font-size: 13px; color: #fff; text-decoration: none;font-weight:bold;display: inline-block;'>
                            Verify Your Email Address
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>";

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'mailto.minicloudstorage@gmail.com';
        $mail->Password = 'rlwrofiaevnrvvrp';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('mailto.minicloudstorage@gmail.com', 'File Storage');
        $mail->addAddress($to, $name);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
