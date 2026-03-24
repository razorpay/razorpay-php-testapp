---
title: Payout Composite
description: Explore composite APIs to make a payout using a single API call.
---

# Payout Composite

Composite API allows you to make three requests in a single API call. No OTP authorization is required when creating a payout using APIs. Ensure you [allowlist IPs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout. 

You can either create a new Contact and its Fund Account while making the payout, or use an existing Contact and Fund Account details to make the payout. Using the Contact and Fund Account details instead of IDs will not create duplicate Contacts or Fund Accounts in your system. However, we recommend that you create the Contact and Fund Account before making a payout to help **improve payout processing time**.

Fork the Razorpay Postman Public Workspace and try the Payout Composite APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/api-keys.md).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-d81df592-f496-49f0-a3b1-e8cf62855d50)

### Related Guides

[About Payouts API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts.md)
[Set Up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md)
[Webhook Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md)
[Payouts Best Practices](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/best-practices.md)

### Endpoints

- **post** `/v1/payouts` - Create a Payout to a Bank Account: 
    Creates a payout along with the Contact and Fund Account with of the type bank account.

- **post** `/v1/payouts` - Create a Payout to a VPA: 
    Creates a payout along with the Contact and Fund Account of the type VPA.

- **post** `/v1/payouts` - Create a Payout to a Card: 
    Creates a payout along with the Contact and Fund Account of the type card.
