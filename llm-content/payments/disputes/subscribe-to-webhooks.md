---
title: Disputes | Subscribe to Webhooks
heading: Subscribe to Webhooks
description: Subscribe to various webhook events related to disputes to receive instant notifications.
---

# Subscribe to Webhooks

Subscribe to webhook events available for disputes to get notifications.

To subscribe to webhook events:
1. Log in to the Dashboard.
2. Navigate to **Account & Settings** → **Webhooks** to subscribe to any of the events listed below.

## List of Webhook Events

The table below lists the webhook events available for disputes.

Webhook Event | Description
---
`payment.dispute.created` | Triggered when a dispute is raised by the customer's issuing bank against a payment.
---
`payment.dispute.won` | Triggered when you win a dispute against a payment.
---
`payment.dispute.lost` | Triggered when you lose a dispute against a payment.
---
`payment.dispute.closed` |  Triggered when a dispute is closed.
---
`payment.dispute.under_review` | Triggered when you contest a dispute and submit the evidence for review.
---
`payment.dispute.action_required` | Triggered when the evidence submitted is insufficient, unreadable or does not correspond to the contested amount. Please update/add evidences before contesting the dispute again.

Know more about [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) and check the [sample payloads.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/disputes.md)

### Related Information
- [About Disputes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes.md)
- [Disputes APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/apis.md)
