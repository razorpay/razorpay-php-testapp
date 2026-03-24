---
title: RazorpayX | Subscribe to Webhooks
heading: Subscribe to Webhooks
description: Subscribe to various Webhook events related to RazorpayX to receive instant notifications.
---

# Subscribe to Webhooks

Webhooks (Web Callback, HTTP Push API or Reverse API) are one of the ways in which one web application can send information to another application in real-time when a specific event happens. Know more about [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md).

## Set Up and Edit Payout Webhooks
You must first [set up and edit Payout Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md) as per your requirement.

## Validate and Test Webhooks
Then you must [validate and test webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/validate-test.md) as a best practice. 

## Webhook Events and Descriptions

Listed below are the various webhook events available in RazorpayX. The payload remains the same irrespective of the `fund_account_type`, that is, a bank account, VPA or card, to which the payout is made.

@include rzpx/webhooks/payout-events

@include rzpx/webhooks/transaction-events

@include rzpx/webhooks/validation

## Sample Payloads and Events

See [Payout Sample Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/#payout-payloads.md).

For transaction webhook events, check the [Transaction Sample Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/#transaction-payloads.md).

### Related Information

- [Set Up Webhooks for Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md)
- [Payout APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts.md)
