---
title: Best Practices
description: Best practices you must follow for smoother integration and payment experience.
---

# Best Practices

You can use Razorpay Custom Checkout to customise the checkout experience as per your requirements and use it as a white-label solution.

Given below are some of the best practices to be followed for smoother integration and payment experience.

## 1. Integrate Payments Rainy Day Kit

Use Payments Rainy Day kit to overcome payments exceptions such as:
- [Late Authorisation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md)
- [Payment Downtime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md)
- [Payment Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md)

## 2. Integrate Orders API

Orders help in binding multiple payment attempts against a single order. This helps to prevent multiple payments. [Integrate with Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders.md) on your server-side and pass the `order_id` to Checkout.

## 3. Verify Signature to Avoid Data Tampering

Verifying the Signature is a mandatory step that lets you confirm the authenticity of the details returned to the Checkout form for successful payments. Know more about [how to verify payment signature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md#15-verify-payment-signature).

## 4. Check Payment or Order Status before Providing Services

Check the payment/order status, that is, if the payment's status is `captured` and the order's status is `paid` before proving the services to the customers.

You can determine payment and order status using:
- [Fetch All Payments for an Order API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-payments.md)
- [Fetch Status of a Payment using Payment id API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md)
- [Fetch Status of an Order using Order id API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-with-id.md)

## 5. Implement Webhooks

Implement webhooks or the query API to avoid any cases of callback failure (drop-offs could be connectivity or network failure) and to verify the payment details via an S2S call. Some of the webhook events you should enable are:
- `payment.captured`
- `payment.failed`
- `order.paid`

Know more about [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

## 6. Implement Callback URL

Implement `callback_url` if your customers make online payments on browsers such as Instagram, Facebook Messenger, Opera, UC browsers and so on. This is because these browsers do not support i-frame.

## 7. Implement Card Saving and Validation Features

Follow these best practices if you accept card payments from customers:

1. Validate the card number to avoid any payment failures. Know more about [Card Validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/input-restriction.md).
2. Use the [Saved card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-cards.md) feature provided by Razorpay for better user experience and prevent payment failures because of incorrect card details.

## 8. Implement VPA Saving and Validation Features

Follow these best practices if you accept UPI collect payments from customers:

1. Validate the VPA before initiating the payment request. Know more about [VPA Validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/validate-vpa.md).
2. Add a custom UPI collect expiry based on the business requirement to provide enough time for the customer to complete the payment.
3. Use the [Saved VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-vpa.md) feature provided by Razorpay to provide a better customer experience and avoid payment failures.
