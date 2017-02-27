<?php

require('../config.php');

session_start();

require('../razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

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
<html>
<head lang="en">
    <meta charset="utf-8">
</head>
<body>
    <form action="charge.php" method="POST">
      <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="$keyId"
        data-amount="$amount"
        data-name="Daft Punk"
        data-description="Purchase Description"
        data-image="../daft-punk.jpg"
        data-netbanking="true"
        data-description="Tron Legacy"
        data-prefill.name="Harshil Mathur"
        data-prefill.email="harshil@razorpay.com"
        data-prefill.contact="9999999999"
        data-notes.shopping_order_id="3456"
        data-order_id="$razorpayOrderId">
      </script>
      <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
      <input type="hidden" name="shopping_order_id" value="3456">
    </form>
</body>
</html>
EOT;

echo $html;