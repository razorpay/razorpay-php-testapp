---
title: Hosted Web Integration - Best Practices | Razorpay Payment Gateway
heading: Best Practices
description: Best practices for a smoother Hosted Web Integration and payment experience.
---

# Best Practices

Follow these best practices while integrating with Hosted Checkout:

## 1. Capture Payment Using Payment Capture Settings 

You must capture the authorised payments for the settlement of the payments in your bank account. Use the [Payment Capture Setting](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/hosted/integration-steps/#3-go-live-checklist/#payment-capture.md) to configure the capture settings at an account level via the Dashboard. 

## 2. Integrate Orders API

Orders bind multiple payment attempts for a single order. This helps to prevent multiple payments. Integrate with Orders API on your server-side and pass the `order_id` to Checkout.

## 3. Verify Signature to Avoid Data Tampering

This mandatory step allows you to confirm the authenticity of the details returned to the Checkout form for successful payments. [Verify payment signature](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/hosted/integration-steps/#1-build-integration/#14-verify-payment-signature.md).

## 4. Check Payment/Order Status before Providing Services

Check the payment/order status, that is, if the payment's status is `captured` and the order's status is `paid` before proving the services to the customers.
  
  
  - [Fetch Status of a Payment using Payment ID API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/fetch-with-id.md)

  - [Fetch Status of an Order using Order ID API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/fetch-with-id.md)

  

## 5. Implement Webhooks

Implement webhooks or the query API to avoid any cases of callback failure (drop-offs could be connectivity or network failure) and to verify the payment details via an S2S call. Know more about [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md). You should enable the following webhooks:
  - `payment.captured`
  - `payment.failed`
  - `order.paid`
