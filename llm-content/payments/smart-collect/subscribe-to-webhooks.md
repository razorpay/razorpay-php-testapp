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
> - Ensure that you have subscribed to [Smart Collect Events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/smart-collect.md#smart-collect).
> - If the Customer Identifier is customer-specific, please pass `customer_id` while creating the Customer Identifier. Customer_id will be reflected in webhooks as well for easy reconciliation.
> - To uniquely identify the payment, store the `bank_reference` (unique reference number on the customer's bank statement) received in [webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/smart-collect.md#smart-collect) or the [Fetch API response](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md#fetch-a-customer-identifier-by-id).
> 

## Webhook Events and Descriptions

Webhook Events | Description
---
virtual_account.created | Triggered when a Customer Identifier is created.
---
virtual_account.credited | Triggered when a payment is made to a Customer Identifier.
---
virtual_account.closed | Triggered when a Customer Identifier expires on a date set by you or is manually closed by you.

Know more about [ Webhooks ](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) and check the [sample payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/smart-collect.md).

### Related Information
- [Razorpay Smart Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md)
- [How Smart Collect Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/how-it-works.md)
- [Customer Identifier States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/states.md)
- [Smart Collect Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md)
- [Create Customer Identifiers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/create.md)
- [Close Customer Identifiers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/close.md)
- [Refund Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/refund.md)
- [Refund Failures](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/refund-failures.md)
- [Search for a Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/search.md)
- [Make Test Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/test-payments.md)
- [Smart Collect APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md)
