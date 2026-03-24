---
title: RazorpayX Payouts API Documentation
heading: Payouts
description: Create, fetch and cancel Payouts using APIs. Set up webhooks for notifications.
---

# Payouts

A [payout](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts.md) is a transfer of funds from your business account to a Contact's Fund Account(s). You can create and process payouts both on the RazorpayX Dashboard and via the Payouts API. Ensure to [create a contact](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/create.md) and add a [fund account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/fund-accounts.md). 

> **SUCCESS**
>
> 
>     **What's New**
> 
>     [Idempotency Key](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency.md) is mandatory for all payout requests starting March 15, 2025.
> 

To make payouts, you must [allowlist IPs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency.md).

Making payouts from [RazorpayX Lite](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/razorpayx-lite.md) account to RazorpayX Lite Customer Identifiers or Razorpay [Customer identifiers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect.md) is not supported.

Fork the Razorpay Postman Public Workspace and try the Payouts APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/api-keys.md).
[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-117c93d1-1a79-4958-9067-eb97a3459f08)

### Related Guides

[About Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts.md)
[Set up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md)
[Webhooks Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md)

### Endpoints

- **post** `
/v1/payouts` - Creates a Payout to a Bank Account: 
Create a payout to a bank account.

- **post** `
/v1/payouts` - Create a Payout to a VPA: 
Creates a payout to a VPA.

- **get** `/v1/payouts?account_number=\{account number\}` - Fetch all Payouts: 
Retrieves details of all the payouts.

- **get** `/v1/payouts/:id` - Fetch a Payout with ID: 
Retrieves details of one payout via ID.

- **patch** `/v1/payouts/:id/cancel` - Cancel a Queued Payout: 
Cancels a payout in `queued` state.
