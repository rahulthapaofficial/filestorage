<?php

function sendOTP($user)
{
    $name = $user->first_name . ' ' . $user->last_name;
    $mobile_no = $user->mobile_no;
    $otp = $user->otp;

    $token = 'DTEDuFw7vO1nllw71239uMPqw2LmAKqQYqWB';
    $to = $mobile_no;
    $sender = "RestroMS";
    $message = 'Dear ' . $user->first_name . ',
' . $otp . ' is your OTP for File Storage.';

    $content = [
        'token' => rawurlencode($token),
        'to' => rawurlencode($to),
        'sender' => rawurlencode($sender),
        'message' => wordwrap($message),
    ];

    sendSMS($content);
    return true;
}

function sendSMS($content)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://bulksms.nctbutwal.com.np/api/v3/sms?");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    curl_close($ch);
    return $server_output;
}
