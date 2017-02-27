<?php

require('../config.php');

//These should be commented out in production
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$success = false;

if (empty($_POST['razorpay_payment_id']) === false)
{
    $razorpayOrderId = $_SESSION['razorpay_order_id'];
    $razorpayPaymentId = $_POST['razorpay_payment_id'];
    $razorpaySignature = $_POST['razorpay_signature'];

    $signature = hash_hmac('sha256', $razorpayOrderId . '|' . $razorpayPaymentId, $keySecret);

    // This method is defined only for php 5.6.0 and later
    $success = string_equals($signature , $razorpaySignature);
}

if ($success === true)
{
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$razorpayPaymentId}</p>";
}
else 
{
    $html = "<p>Your payment failed</p>
             <p>Error Message: Payment Failed</p>";
}

echo $html;

/*
 * Taken from https://stackoverflow.com/questions/10576827/secure-string-compare-function
 * under the MIT license
 * For versions later than php 5.6.0, hash_equals is used
 * For newer versions, this manual method of comparing strings is used
 */
function string_equals($str1, $str2)
{
    if (function_exists('hash_equals'))
    {
        return hash_equals($str1, $str2);
    }

    if (strlen($str1) !== strlen($str2)) 
    {
        return false;
    }
    
    $result = 0;
    
    for ($i = 0; $i < strlen($str1); $i++) 
    {
        $result |= ord($str1[$i]) ^ ord($str2[$i]);
    }
    
    return ($result == 0);
}