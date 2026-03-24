---
title: 2. Test Native OTP Integration
description: Test the Razorpay Native OTP feature with Android Custom Checkout.
---

# 2. Test Native OTP Integration

Integrate the [Native OTP](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/native-otp-integration.md) feature with Android custom checkout to avoid customer payment issues such as payment failures due to low internet speeds and bank page redirects.

After the integration is complete, you need to test the integration to ensure that it is working as expected. You can make a test transaction using the test cards, verify the payment status from the Dashboard, APIs or subscribe to related Webhook events to take appropriate actions at your end. After testing the integration in Test mode, you can start accepting actual payments from your customers.

## Test Payments

- No money is deducted from the customer's account as this is a test transaction.
- In the Checkout code, ensure that you have entered the API keys generated in the Test mode.

#### Test Cards

You can use any of the test cards to make transactions in the Test mode. Use any valid expiration date in the future and any random CVV to create a successful payment.

Card Network | Card Number | Supports Native OTP
---
Mastercard | 5267 3181 8797 5449 | Yes
---
Visa | 4895 1911 1111 1115 | Yes
---
Visa | 4386 2894 0766 0153 | No

## Verify Payment Status

You can track the status of the payment from the Dashboard by subscribing to webhooks or polling our APIs.

Know more about how to [Verify Payment Status](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration#19-verify-payment-status.md).

## Accept Live Payments

After testing the flow of funds end-to-end in Test mode and confident that the integration is working as expected, switch to the Live mode and start accepting payments from customers. 
 
Know more about how to [Accept Live Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/go-live-checklist/#accept-live-payments.md).
