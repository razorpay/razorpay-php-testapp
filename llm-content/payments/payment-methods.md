---
title: About Payment Methods
description: Check the different payment methods that can be configured to accept payments from your customers using Razorpay products.
---

# About Payment Methods

The Razorpay Checkout offers multiple payment methods, allowing your customer the flexibility to complete the payment using the payment method of their choice. This improves user experience and allows you to offer alternate payment methods to your customer in the case of downtimes or low success rate with one of the payment methods. 

For example, if you are facing downtime with netbanking, the customer can complete the payment using cards or wallets.

You can view the payment methods enabled for your account or [raise requests for additional payment methods or providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/payment-methods.md#enable-payment-methods) on the Dashboard. 

## View Payment Methods

To view payment methods enabled for you:
1. Log in to the Dashboard.
2. Click **Account & Settings** in the left menu.
    ![Dashboard - Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-methods-view.jpg.md)
3. Go to **Payment methods** to view the payment methods enabled for your Razorpay account.
    ![Dashboard - Payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-method-enable.jpg.md)

You can also request for [Additional Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/payment-methods.md#request-for-payment-methods) from the Dashboard.

## Supported Payment Methods

@include payment-methods/supported-payment-methods

## Supported UPI apps

@include payment-methods/google-pay-only

## Transaction Limits

- [Transaction Limits for Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/transaction-limits.md)
- [UPI Transaction Limits](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/transaction-limits/upi.md)

## Payment Method Error Codes

There are certain error codes specific for each payment method supported by Razorpay. Know more about the [Payment Method Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/payment-methods-error-parameters.md).
