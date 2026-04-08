---
title: Partners | Onboarding APIs - Subscribe to Webhooks
heading: Subscribe to Webhooks
description: Use webhooks to get notified about Transaction events and Sub-Merchant Onboarding events.
---

# Subscribe to Webhooks

Subscribe to webhook events relevant to partners to receive notifications (in the form of a webhook payload) when these events occur.

## Subscribe to Webhooks

Watch this video to see how you can subscribe to Partner Webhooks.

[Video content]

To subscribe to webhook events:
1. Log in to the Dashboard.
2. Navigate to **Partner's Dashboard** → **Settings** → **Webhooks** to subscribe to any of the events mentioned in the following section.
3. Click on **Manage** settings.
4. In the **Webhook Setup** pop-up page:
    1. Enter the **URL** where you want to receive the webhook payload when an event is triggered. We recommended using an HTTPS URL.
    1. Enter a **Secret** for the webhook endpoint. The secret is used to validate that the webhook is from Razorpay.
    1. In the **Alert Email** field, enter the email address to which the notifications should be sent in case of webhook failure.
    1. Select the required events from the list of **Active Events**.
1. Click **Create Webhook**.

### Webhook Events and Descriptions

There are 2 types of events:

1. **Transaction Events**: These are events related to payment transactions performed by the sub-merchants. The partner at a sub-merchant level can configure these events.
2. **Sub-Merchant Onboarding Events**: These events are related to the onboarding status of the sub-merchant. This is subscribed at the partner level and not configurable at the sub-merchant level. Subscribing to this event will enable the partner to get the onboarding status of all sub-merchants.

Know more about [Aggregators Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners.md).

#### Transaction Events

Event Category | Event Name | Description
---
Payment Events | payment.authorized | Triggered when a payment is authorized.
---
Payment Events| payment.failed | Triggered when a payment fails.
---
Payment Events | payment.captured | Triggered when a payment is captured.
---
Payment Events | payment.dispute.created | Triggered when a dispute for a payment is created.
---
Payment Events | payment.dispute.won | Triggered when a dispute for a payment is won.
---
Payment Events | payment.dispute.lost | Triggered when a dispute for a payment is lost.
---
Payment Events | payment.dispute.closed | Triggered when a dispute for a payment is closed.
---
Payment Events | payment.downtime.started | Triggered when the downtime for a payment starts.
---
Payment Events | payment.downtime.resolved | Triggered when the downtime for a payment is resolved.
---
Order Events | order.paid | Triggered when a payment is successfully made against an  order.
---
Invoice Events | invoice.paid | Triggered when an invoice is successfully paid.
---
Invoice Events | invoice.partially_paid | Triggered when a partial payment is made for an invoice.
---
Invoice Events | invoice.expired | Triggered when an invoice expires.
---
Fund_account Events | fund_account.validation.completed | Triggered when the validation for a fund account is completed.
---
Fund_account Events | fund_account.validation.failed | Triggered when the validation for a fund account fails.
---
Refund Events | refund.speed_changed | Triggered when the speed of a refund is changed.
---
Refund Events | refund.processed | Triggered when a refund is processed.
---
Refund Events | refund.failed | Triggered when the a refund fails.
---
Refund Events| refund.created | Triggered when the a refund is created.
---
Payment_link Events | payment_link.paid | Triggered when a Payment Link is paid.
---
Payment_link Events | payment_link.partially_paid | Triggered when a partial payment is made on a Payment Link.
---
Payment_link Events | payment_link.expired | Triggered when a Payment Link expires.
---
Payment_link Events | payment_link.cancelled | Triggered when a Payment Link is cancelled by you.

Check the [sample payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) for the above-mentioned webhook events. 

#### Sub-Merchant Onboarding Events

Event Category | Event Name | Description
---
PG Product Status | product.payment_gateway.under_review | Triggered when the status for a Payment Gateway product is `under_review`.
---
PG Product Status | product.payment_gateway.needs_clarification | Triggered when the status for a Payment Gateway product is `needs clarification`.
---
PG Product Status | product.payment_gateway.activated | Triggered when the status for a Payment Gateway product is `activated`.
---
PG Product Status | product.payment_gateway.rejected | Triggered when the status for a Payment Gateway product is `rejected`.
---
PL Product Status | product.payment_link.under_review | Triggered when the status for a Payment Link product is `under_review`.
---
PL Product Status | product.payment_link.needs_clarification | Triggered when the status for a Payment Link product is `needs clarification`.
---
PL Product Status | product.payment_link.activated | Triggered when the status for a Payment Link product is `activated`.
---
PL Product Status | product.payment_link.rejected | Triggered when the status for a Payment Link product is `rejected`.
---
Account | account.suspended | Triggered when the Partner's account gets suspended.

You can check the events and sample payloads of [Sub-Merchant Onboarding Events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners.md). Know more about [Webhook APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/partners/webhooks.md). 

### Related Information
- [Sub-Merchant Onboarding APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md)
- [Sub-Merchant Onboarding APIs Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/workflow.md)
- [List of Partner APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md)
- [Appendix](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/appendix.md)
