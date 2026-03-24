---
title: Subscriptions | OpenCart - Webhook Events
heading: Webhook Events
description: Check the webhook payloads for events relevant to OpenCart Plugin for Razorpay Subscriptions.
---

# Webhook Events

Webhooks (Web Callback, HTTP Push API or Reverse API) automatically notify your application when specific events occur. Instead of continuously polling APIs to check for updates, webhooks push notifications directly to your server when events happen.

## Webhooks vs APIs

Here is how webhooks compare to traditional API polling:

Aspect | APIs | Webhooks
---
**Data retrieval** | Pull-based (you request) | Push-based (we send)
---
**Timing** | On-demand | Near real-time when events occur
---
**Resource usage** | Requires polling | Event-driven, efficient

## How Razorpay Webhooks Work

When you subscribe to webhook events, Razorpay sends an HTTP POST request with JSON payload to your configured endpoint URL whenever those events are triggered.

Suppose you have subscribed to the `order.paid` webhook event, you will receive a notification every time a user pays you for an order, in the configured endpoint URL.

### Use Cases

There can be multiple uses for webhook events. Two of these are listed below.

    
### Capturing Late Authorised Payments

         Capturing payments for which you did not receive a response on the client-side is perhaps the most important use case for the `payment.authorized` event.

         Sometimes, the communication between the bank and Razorpay or between you and Razorpay may not occur. This could be because of a slow network connection or your customer closing the window while processing the payment. This could lead to a payment being marked as **Failed** on the Dashboard but changed to **Authorized** at a later time. Know more about [late authorisation of payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md).

         You can use webhooks to get notified about payments that get authorised and analyse this data to decide whether to capture the payment or not.
        

    
### Notifications on Failed Payments

         When a payment attempted by your customer fails, we receive the failed payment status from the bank. This payment gets recorded in our system as **Failed**.

         Suppose you have enabled the `payment.failed` webhook, you will receive a notification from us about the failed payment. You can then further analyse this payment and notify your customer about the failure.

        

### Setup and Configuration

- You can set up webhooks from your Dashboard and configure separate URLs for **Live** mode and **Test** mode. Know more about setting up [Payment webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) and [Payout webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md).
- A **Test** mode webhook receives events for your test transactions. Know more about [testing webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/validate-test.md).
- Webhook URLs must use ports **80** or **443** only.
- Ensure Razorpay webhook IPs are whitelisted on your server. Even if your server accepts all incoming requests, webhooks may still be blocked by cloud security groups or network configurations. Refer to [Razorpay IPs and Certificates](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/security/whitelists.md#webhook-ips) for the complete list of webhook IP addresses.

> **WARN**
>
> 
> **Implementation Considerations**
> 
> Webhooks are the primary and most efficient method for event notifications. They are delivered asynchronously in near real-time. For critical user-facing flows that need instant confirmation (like showing "Payment Successful" immediately), supplement webhooks with API verification.
> 
> **Recommended approach** 

> - Rely on webhooks for all automation, which can be asynchronous.
> - If a critical user-facing flow requires instant status, but the webhook notification has not arrived within the time mandated by your business needs, perform an immediate API Fetch call ([Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md), [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-with-id.md) and [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds/fetch-specific-refund-payment.md)) to verify the status.
>
