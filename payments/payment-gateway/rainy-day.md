---
title: Handle Payment Exceptions with Rainy Day Kit
description: Provide additional support to your customer in case of payment difficulties while using Razorpay Checkout.
---

# Handle Payment Exceptions with Rainy Day Kit

While Razorpay strives to provide a positive payment experience to every customer, they might face payment exceptions such as:
- Late Authorization
- Payment Downtime
- Payment Errors

To overcome such exceptions and provide a smooth payment experience to your customers, use the Rainy Day Kit.

Exception | Solution | What it does
---
Amount debited though the payment has failed | [Payment Capture Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/rainy-day/capture-settings.md) | Allows you to better deal with 'Money debited but Payment Failed' scenarios.
---
No communication of payment method unavailability | [Payment Downtime Notifications](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/rainy-day/downtime.md) | Sends instant alerts when a particular payment method is down.
---
Errors during the payment process | [Payment Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/rainy-day/errors.md) | Helps you identify the exact cause of payment error.
