---
title: Best Practices
description: Follow these Best practices while doing TPV integration.
---

# Best Practices

Given below are some of the best practices to be followed for a smooth TPV integration and payment experience:

  
### Capture Payment Using Payment Capture Settings

     When a payment made by your customer is authorised, it needs to be captured for it to be settled to your bank account. Use the [Payment Capture Settings](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/capture-settings.md) to configure the capture settings at an account level using the Dashboard.
    

  
### Integrate Orders API

    Orders help in binding multiple payment attempts against a single order. This helps to prevent multiple payments. Integrate with Orders API on your server-side and [pass the `order_id`](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/fetch-with-id.md) to Checkout. 
    

  
### Verify Signature to Avoid Data Tampering

    This is a mandatory step that allows you to confirm the authenticity of the details returned to the Checkout form for successful payments. Know more about how to [verify payment signature](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation/#step-6-verify-signature.md).
    

  
### Check Payment/Order Status Before Providing Services

    Check the payment/order status if the payment's status is `captured` and the order's status is `paid` before providing the services to the customers.

    You can determine payment and order status using:
    - [Fetch All Payments for an Order API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/fetch-payments.md)
    - [Fetch Status of a Payment using Payment ID API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/fetch-with-id.md)
    - [Fetch Status of an Order using Order ID API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/fetch-with-id.md)
  

  
### Use Webhooks

    Use Webhooks or API query to avoid any cases of callback failure (drop-offs can be dues to connectivity or network failure) and to verify the payment details using an S2S call. Following are some of the Webhook events you should enable:
    - `payment.captured`
    - `payment.failed`
    - `order.paid`

   Know more about [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md).
  

  
### Use Callback URL

    Use the `callback_url` if your customers make online payments on browsers such as Instagram, Facebook Messenger, Opera, UC browsers and so on. This is because these browsers do not support i-frame.
