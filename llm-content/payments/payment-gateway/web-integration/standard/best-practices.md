---
title: Best Practices for Standard Checkout Integration
description: Best practices for a smoother Standard Checkout web integration and payment experience.
---

# Best Practices for Standard Checkout Integration

Follow the best practices for a smooth Standard Checkout web integration.

1. **Capture Payment Using Payment Capture Settings**

    You **must capture** the authorised payments for the **settlement of the payments** in your bank account. Use the [Payment Capture Setting](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/capture-settings.md) to configure the capture settings at an account level via the Dashboard.

2. **Integrate Orders API**

    Orders bind multiple payment attempts for a single order. This helps to **prevent multiple payments**. [Integrate with Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps/#11-create-an-order-in-server.md) on your server-side and pass the `order_id` to Checkout.

3. **Verify Signature to Avoid Data Tampering**

    This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments. Know how to [verify payment signature](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps/#15-verify-payment-signature.md).

4. **Check Payment/Order Status before Providing Services**

    Check the payment/order status, that is if the payment's status is `captured` and the order's status is `paid` before proving the services to the customers.

    - [Fetch All Payments for an Order API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/fetch-payments.md)
    - [Fetch Status of a Payment using Payment id API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/fetch-with-id.md)
    - [Fetch Status of an Order using Order id API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/fetch-with-id.md)

5. **Implement Webhooks**

    Implement webhooks or the query API to avoid callback failure (drop-offs could be due to connectivity or network failure) and to verify the payment details via an S2S call. Know more about [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md). You should enable the following webhooks:

    - `payment.captured`
    - `payment.failed`
    - `order.paid`

6. **Implement Callback URL**

    Sites like Instagram, Facebook Messenger, Opera and UC browser do not support i-frame. You should implement [callback URL](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/callback-url.md) if your customers use any of these for making payments.
