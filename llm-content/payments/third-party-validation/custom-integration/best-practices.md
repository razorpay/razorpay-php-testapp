---
title: Best Practices
description: Follow these Best practices while doing TPV integration.
---

# Best Practices

Given below are some of the best practices to be followed for a smooth TPV integration and payment experience:

- [Integrate Orders API](#1-integrate-orders-api)
- [Verify Signature to Avoid Data Tampering](#2-verify-signature-to-avoid-data-tampering)
- [Check Payment/Order Status before Providing Services](#3-check-paymentorder-status-before-providing-services)
- [Implement Webhooks](#4-implement-webhooks)
- [Implement Callback URL](#5-implement-callback-url)
- [Implement VPA Saving and Validation Features](#6-implement-vpa-saving-and-validation-features)

## 1. Integrate Orders API

Orders help in binding multiple payment attempts against a single order. This helps to prevent multiple payments. Integrate with Orders API on your server-side and pass the `order_id` to Checkout.

## 2. Verify Signature to Avoid Data Tampering

This is a mandatory step that allows you to confirm the authenticity of the details returned to the Checkout form for successful payments.

Know more about [how to verify payment signature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/custom-integration.md#16-verify-the-signature).

## 3. Check Payment/Order Status before Providing Services

Check the payment/order status, that is, if the payment's status is `captured` and the order's status is `paid` before providing the services to the customers.

You can determine payment and order status using:
- [Fetch All Payments for an Order API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-payments.md)
- [Fetch Status of a Payment using Payment ID API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md)
- [Fetch Status of an Order using Order ID API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-with-id.md)

## 4. Implement Webhooks

Implement Webhooks or the query API to avoid any cases of callback failure (drop-offs can be due to connectivity or network failure) and to verify the payment details using an S2S call. Following are some of the Webhook events that you should enable:
- `payment.captured`
- `payment.failed`
- `order.paid`

Know more about [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

## 5. Implement Callback URL

Implement `callback_url` if your customer's make online payments on browsers such as Instagram, Facebook Messenger, Opera, UC browsers and so on. These browsers do not support i-frame.

## 6. Implement VPA Saving and Validation Features

Follow these best practices if you accept UPI collect payments from customers:

1. Validate the VPA before initiating the payment request. Know more about [VPA Validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/validate-vpa.md).
2. Add a custom UPI Collect expiry based on the business requirement to provide enough time for the customer to complete the payment.
3. Use the [Saved VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-vpa.md) feature provided by Razorpay to provide a better customer experience and avoid payment failures.
