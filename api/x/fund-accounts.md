---
title: Fund Accounts
description: List of Fund Accounts APIs to create, retrieve and activate Fund Accounts.
---

# Fund Accounts

Every Contact has an associated Fund Account. When you [make payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md) to a Contact, they receive the amount in their Fund Account. Fund Accounts can be of [four types](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/fund-accounts.md#fund-account-types), and a Contact can have multiple Fund Accounts.  
 

You must [create a Contact](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/contacts/create.md) to create a Fund Account. We recommend you to create Contacts and Fund Accounts beforehand to improve the [payout processing time](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/status-details.md). When making payouts, ensure to [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md), else the request will fail. 
 

Fork the Razorpay Postman Public Workspace and try the Fund Accounts APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/api-keys.md).

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-47aa8c0b-d897-48d2-aa5a-5d5c10c5c2b1)

### Related Guides

[About Fund Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/fund-accounts.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/account-validation.md)

### Endpoints

- **post** `/v1/fund_accounts` - Create Bank Account type Fund Account: 
Creates a new Fund Account using bank account details.

- **post** `/v1/fund_accounts` - Create VPA type Fund Account: 
Creates a new Fund Account using VPA details.

- **get** `/v1/fund_accounts` - Fetch All Fund Account: 
Retrieves all the Fund Accounts.

- **get** `/v1/fund_accounts/:id` - Fetch a Fund Account with ID: 
Retrieves a single Fund Account with ID.

- **patch** `/v1/fund_accounts/:id` - Activate/Deactivate a Fund Account: 
Activates or deactivates an existing Fund Account.
