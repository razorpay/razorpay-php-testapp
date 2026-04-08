---
title: Payments - Dashboard Actions
description: View payment details, manually capture payments, issue a refund or view settlement details of a payment from the Razorpay Dashboard.
---

# Payments - Dashboard Actions

You can use the Dashboard to perform the following actions:

- [View Payment Details](#view-payment-details) 

- [View Settlement Details of a Payment](#view-settlement-details-of-a-payment) 

- [Manually Capture Payments](#manually-capture-payments) 

- [Issue a Refund](#issue-a-refund) 

- [Subscribe to Webhook Events](#subscribe-to-webhook-events) 

## View Payment Details

Watch this video to see how to view the payment details.

[Video: https://www.youtube.com/embed/lgeCPKJnNHk?si=-wR4AfdbYeCv_5Cm]

To view the details of a payment made to your account:
1. Log in to your Dashboard.
2. Click **Transactions** → **Payments**.
3. Click a **Payment Id** to view details of the payment.

## View Settlement Details of a Payment

Watch this video to view the settlement details of a payment.

[Video: https://www.youtube.com/embed/vatTtGeH9vU?si=fHNUcLgFPali5CFw]

To view a detailed break-down of a settlement made to your account:
1. Log in to your Dashboard.
2. Navigate to **Transactions** → **Payments**.
3. Click on the specific **Payment Id** for which you want to view the settlement details.
4. In the **Payment Details** view, you can view the settlement details.
5. Click on the **settlement_id** to view the detailed breakdown.

## Manually Capture Payments

Watch this video to capture payments manually.

[Video: https://www.youtube.com/embed/txOqhzbbwM4?si=bpN0HoEHcgcYVaFp]

To manually capture payments:

1. Log in to the Dashboard.
2. Navigate to **Transactions** → **Payments**.
3. Under the **Payments** tab, identify the authorized payment you want to capture.
4. Click the relevant **Payment Id**.
5. In the **Payment Details** pane, click **Capture Payment**.
6. A dialog box is displayed. Click **Yes, Capture**.

## Issue a Refund

You can issue refunds to your customers from the Dashboard. Know more about [issuing refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds/issue.md).

## Subscribe to Webhook Events

You can subscribe to webhook events from the Dashboard. Know more about [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

To subscribe to webhook events:
1. Log in to the Dashboard.
2.  Navigate to **Accounts & Settings** → **Webhooks** to subscribe to events available for payments.

The table below lists the webhook events available for payments.

Webhook Event | Description
---
`payment.authorized` | Triggered when a payment is authorised.
---
`payment.captured` | Triggered when a payment is successfully captured.
---
`payment.failed` | Triggered when a payment fails.

> **INFO**
>
> 
> **Handy Tips**
> 
> - The payload for a Webhook is a snapshot of the entity when the event occurred.
> For example, when a customer makes a payment, its status changes to `authorized`. It can then immediately move to the `captured` state.

> - The payment can be in the `captured` state when the `payment.authorized` Webhook is fired. However, the payload for the `payment.authorized` event contains details of the events when the payment was authorised, not when it was captured.

> - In case of network tokenised cards, the last 4 digits will be of the tokenised card and not the actual card.
- The field `flow` is present only in the case of Turbo UPI Payments.

> 
> 

Know more about [webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) and check the [sample payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md).

### Related Information 

- [About Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md)
- [Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/apis.md)
