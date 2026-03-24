---
title: Notifications
description: Receive notifications for your Razorpay virtual account for payment captured event using webhooks and receive email notifications for payment successful event.
---

# Notifications

All payments made using Smart Collect will show up on your Dashboard as well as in the usual payment response APIs.

## Webhooks

Payments made using Smart Collect will also trigger webhooks much like regular payments. To use webhooks, refer our [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) documentation.

### Event - Virtual Account Created

When a virtual account is created the `virtual_account.created` webhook event is fired. The payload is given below:

@include smart-collect-qr/virtual-account-created-payload

### Event - Virtual Account Credited

Payments made using Smart Collect are notified via the `virtual_account.credited` webhook event. 

@include smart-collect-qr/virtual-account-credited-payload

### Event - Virtual Account Closed

When a virtual account is closed the `virtual_account.closed` webhook event is fired. The payload is given below:

@include smart-collect-qr/virtual-account-closed-payload

## Emails
You will also receive a `payment successful` notification email, as you do for regular payments.
