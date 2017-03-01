<?php

require('../config.php');

//These should be commented out in production
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require('../razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

$success = false;

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $success = $api->utility->verifyPaymentSignature($attributes);
    }
    catch(Exception $e)
    {
        echo 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
}
else 
{
    $html = "<p>Your payment failed</p>
             <p>Error Message: Payment Failed</p>";
}

echo $html;