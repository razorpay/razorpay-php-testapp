<?php
//These should be commented out in production
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Load API, Ideally it should installed by composer and autoloaded if your project uses composer
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

//Use your key_id and key secret
$api = new Api('rzp_test_KEY_ID', 'INSERT_KEY_SECRET');

//This is submited by the checkout form
if (isset($_POST['razorpay_payment_id']) === false)
{
    die("Payment id not provided");
}

$id = $_POST['razorpay_payment_id'];

//capture Rs 5100
$payment = $api->payment->fetch($id)->capture(array('amount'=>5100));

//echo response
echo json_encode($payment->toArray());

//Payment is captured, do whatever else you need to do
// Mark order as done using the submitted hidden field
$shopping_order_id = $_POST['shopping_order_id'];
// markOrderAsDone($shopping_order_id);
?>