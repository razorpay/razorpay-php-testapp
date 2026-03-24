---
title: Payments Webhook Events
description: List of Payments webhook events along with sample payloads.
---

# Payments Webhook Events

You can accept customer payments using Razorpay products. By subscribing to payments webhook events you can get notified about payment state changes.

## List of Payments Webhook Events

@include payments/payments-available-events

### Comparison: payment.captured vs order.paid

Orders and payments go hand-in-hand. Once a payment is captured, the order is marked paid.  This is reflected in the `order.paid` and `payment.captured` webhook events as well. These events are triggered when the payment associated with the order is captured.

`payment.captured` Webhook Event | `order.paid` Webhook Event
---
This event is triggered when the payment is successfully captured. | This event is triggered when a customer completes the checkout process and the order's status changes to `paid`.
---
This payload only contains the payment entity, providing details specific to the transaction, such as the amount, currency, and payment method. | This payload includes both order and payment entities, making all relevant information available in a single payload.

## Sample Payloads

Given below are the sample payloads for payments webhook events.

### Payment Authorised

@include payments/payment-authorized-payload

### Payment Captured

@include payments/payment-captured-payload

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You may occasionally observe a `payment.failed` webhook followed by a `payment.captured` webhook for the same transaction. While late authorisation is a known reason for this, user-initiated retries, particularly with UPI transactions, also cause this sequence.
> 
> Here is a common scenario:
> 
> A customer attempts a UPI payment via their Third-Party Application Provider (TPAP) such as PhonePe or Google Pay. The initial attempt fails, perhaps due to an **incorrect PIN** or **insufficient balance**.
> 
> Most UPI TPAPs offer an immediate option to retry the payment directly within their app. When a customer retries, here is how our system responds:
> 
> 1. We **trigger and send a `payment.failed` webhook** to your configured endpoint, indicating the initial payment failure.
> 2. If the customer retries the payment and successfully completes it (for example, by entering the correct PIN), the transaction concludes.
> 3. Subsequently, we **send a `payment.captured` webhook**, confirming the successful capture of funds for that same transaction.
> 
> This sequence is **expected behaviour**. It allows customers to correct errors and complete their transactions without having to start a new payment process.
> 
> 

### Payment Failed

@include payments/payment-failed-payload

## Payments Downtime

Downtime is a period during which one or more payment options underperform, leading to considerable delays in payment processing. These downtimes are due to technical issues or outages at Razorpay's partner or issuing banks side. Razorpay informs you about the downtime to communicate it to your customers.

### List of Payments Downtime Webhook Events

@include payments/downtime/webhooks

@include webhooks/webhook-code-tips
