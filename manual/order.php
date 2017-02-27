<?php

require('../config.php');

require_once ('../razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

session_start();

$api = new Api($keyId, $keySecret);

$orderData = [
    'receipt'         => 3456,
    'amount'          => 2000 * 100, // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture 
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay_order_id'] = $razorpayOrderId;

$amount = $orderData['amount'];

$html = <<<EOT
<button id="rzp-button1">Pay with Razorpay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify-signature.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
</form>
<script>
var options = {
    "key": "$keyId",
    "amount": "$amount", 
    "name": "Merchant Name",
    "description": "Purchase Description",
    "image": "../daft-punk.jpg",
    "handler": function (response){
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    },
    "prefill": {
        "name": "Test customer",
        "email": "customer@merchant.com",
        "contact": "9999999999",
    },
    "notes": {
        "address": "Hello World",
        "merchant_order_id": "12312321",
    },
    "theme": {
        "color": "#F37254"
    },
    "order_id": "$razorpayOrderId",
};
var rzp1 = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
EOT;

// Echoing the checkout form
echo $html;