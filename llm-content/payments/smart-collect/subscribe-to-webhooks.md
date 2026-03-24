---
title: Smart Collect | Subscribe to Webhooks
heading: Subscribe to Webhooks
description: Subscribe to various webhook events related to Smart Collect to receive instant notifications.
---

# Subscribe to Webhooks

Subscribe to webhook events relevant to Smart Collect.

To subscribe to webhook events:
1. Log in to the Dashboard.
2.  Navigate to **Dashboard** → **Account & Settings** → **Webhooks** to subscribe to any of the events mentioned in the following section.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Ensure that you mitigate possible webhook failures.
> - Ensure that you have subscribed to [Smart Collect Events](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/smart-collect/#smart-collect.md).
> - If the Customer Identifier is customer-specific, please pass `customer_id` while creating the Customer Identifier. Customer_id will be reflected in webhooks as well for easy reconciliation.
> - To uniquely identify the payment, store the `bank_reference` (unique reference number on the customer's bank statement) received in [webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/smart-collect/#smart-collect.md) or the [Fetch API response](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect/#fetch-a-customer-identifier-by-id.md).
> 

## Webhook Events and Descriptions

Webhook Events | Description
---
virtual_account.created | Triggered when a Customer Identifier is created.
---
virtual_account.credited | Triggered when a payment is made to a Customer Identifier.
---
virtual_account.closed | Triggered when a Customer Identifier expires on a date set by you or is manually closed by you.

Know more about [ Webhooks ](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md) and check the [sample payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/smart-collect.md).

### Related Information
- [Razorpay Smart Collect](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect.md)
- [How Smart Collect Works](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/how-it-works.md)
- [Customer Identifier States](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/states.md)
- [Smart Collect Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect.md)
- [Create Customer Identifiers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/create.md)
- [Close Customer Identifiers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/close.md)
- [Refund Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/refund.md)
- [Refund Failures](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/refund-failures.md)
- [Search for a Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/search.md)
- [Make Test Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/test-payments.md)
- [Smart Collect APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect.md)
