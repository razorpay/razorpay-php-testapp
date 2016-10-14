# Razorpay Test App for PHP
Sample App for Razorpay PHP Integration

This app uses a non composer integration, ideally you should use composer to integrate the Razorpay API.

# Steps for Integration:

1. Make a checkout form using our Checkout Integration
2. Accept the `razorpay_payment_id` parameter in the form submission
3. Run the capture code to capture the payment

If you are re-using this as your final code, please make sure you do the following:

- Edit the key inside index.html
- Edit the keyId/keySecret in charge.php

Make sure that you download the latest version of `razorpay-php.zip` file from
the releases section **[here](https://github.com/razorpay/razorpay-php/releases)**.
You can extract that to the razorpay-php directory as well.

This release currently uses the 1.2.8 version of the SDK. Please ensure that you are
using the latest as the test app might lag behind.