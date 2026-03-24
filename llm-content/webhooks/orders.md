---
title: Orders Webhook Events
description: List of Orders webhook events along with sample payloads.
---

# Orders Webhook Events

Order creation is an important step as it helps you associate every payment with an order, thus preventing multiple payments. 

## List of Orders Webhook Events

@include orders/orders-available-events

### Comparison: order.paid vs. payment.captured

Orders and payments go hand-in-hand. Once a payment is captured, the order is marked paid.  This is reflected in the `order.paid` and `payment.captured` webhook events as well. These events are triggered when the payment associated with the order is captured.

`order.paid` Webhook Event | `payment.captured` Webhook Event
---
This event is triggered when a customer completes the checkout process and the order's status changes to `paid`. | This event is triggered when the payment is successfully captured.
---
This payload includes both order and payment entities, making all relevant information available in a single payload. | This payload only contains the payment entity, providing details specific to the transaction, such as the amount, currency, and payment method.

## Sample Payloads

Given below is the sample payload for orders webhook event.

### Order Paid

@include orders/orders-paid-payload

@include webhooks/webhook-code-tips
