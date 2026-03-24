---
title: Validate and Test Webhooks
description: Validate and test Payments and Payout Webhooks before you start using them. Read about idempotency and the importance of the order of Webhook Events.
---

# Validate and Test Webhooks

You need to validate and test the webhook before starting using them. It is also important to understand idempotency and the importance of the order of Webhook Events.

@include webhooks/webhook-test

> **INFO**
>
> 
> **Handy Tips**
> 
> Enter the default OTP `754081` when prompted, while setting up, editing or deleting a webhook in test mode.
> 
> 
> 

## Validate Webhooks

@include webhooks/webhooks-validation

## Idempotency

@include webhooks/webhooks-idempotency

## Order of Webhooks

Ideally, you should receive a webhook in the order in which the webhook events occur. However, you may not always receive the webhooks in the order.

### Example - Payments

For example, in the case of a payment, you should receive webhooks in the following order:
1. `payment.authorized`
2. `payment.captured`

**The above order may not be followed at all times.** You should configure your webhook URL to not expect delivery of these events in this order and handle such scenarios. 

### Example - RazorpayX

@include rzpx/webhooks/event-order

### Related Information

- [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md)

- [Set Up and Edit Payments Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md)

- [Set Up and Edit Payout Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md)
