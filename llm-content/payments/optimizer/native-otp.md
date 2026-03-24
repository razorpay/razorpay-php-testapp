---
title: Native OTP
description: Use Razorpay's Native OTP feature to help you confirm online payments without getting redirected to your bank's page.
---

# Native OTP

Razorpay's Native OTP feature allows direct usage of one-time passwords (OTPs) within the Checkout form, eliminating redirection to issuing banks' ACS (Access Control Server) pages. This provides a seamless OTP flow, reducing payment failures due to slow internet speeds and avoiding losses from redirects to external bank pages. Use this feature to enhance the user experience, saving time and reducing payment failures caused by poor internet connectivity. Shown below is a sample OTP input screen:

![native otp screen](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/rzp-acs_page.jpg.md)

Razorpay's Native OTP offers the following additional features:
- [Auto Read + Auto Fill](#auto-read-auto-fill)
- [Auto Submit](#auto-submit)

> **WARN**
>
> 
> **Watch Out!**
> 
> The auto-read, auto-fill, and auto-submit features are compatible with merchants using the Android SDK for standard checkout. 
> 

## Auto Read + Auto Fill
Check how **Auto Read + Auto Fill** works:

![auto read fill otp](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-auto-submit-otp-new1.gif.md)

1. Razorpay requests user permission to read SMS messages.
2. By obtaining permission to read SMS messages, Razorpay can:
    - Automatically extract the OTP from the received SMS.
    - Add the OTP to the Native OTP page.

#### Advantages
- Simplifies the payment process for users
- Increases Success Rate
- Eliminates the need for users to manually enter the OTP
- Reduces errors in OTP input
- Improves the overall user experience

## Auto Submit
Customers no longer need to manually enter one-time passwords (OTPs) for card payments. 

![auto submit otp](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/optimizer-auto-submit-otp-new1.gif.md)

Razorpay handles the entire process seamlessly by obtaining permission to read SMS messages to:
    - Automatically read the OTP.
    - Fill the OTP.
    - Submit the OTP on behalf of the customer.

#### Advantages
- Reduces friction during the transaction flow
- Increases Success Rate
- Reduces errors associated with manual entry of OTPs
- Lower transaction time by eliminating the manual OTP submission step

## Supported Payment Methods, Cards Networks and Payment Gateways

Below is a list of payment gateways and their respective card networks that support the Native OTP feature.

Payment Gateway | Card Networks
---
Billdesk | Visa and Mastercard 
---
Cashfree | RuPay
---
CCAvenue | Visa and Mastercard
---
Easebuzz | RuPay
---
Paytm | Visa, Mastercard and RuPay
---
PayU | Visa, Mastercard and RuPay (credit cards only)
---
PineLabs | RuPay

The Native OTP feature supports only **card** payments.
