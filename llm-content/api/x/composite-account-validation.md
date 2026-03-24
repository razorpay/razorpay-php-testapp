---
title: Fund/Bank Account Validation Composite
heading: Account Validation Composite
description: Composite Account Validation for RazorpayX, APIs and webhook payload. Validate your customers’ bank account or VPA with a single API before you make payouts.
---

# Account Validation Composite

Composite Account Validation API allows you to create a Contact [Linked Text](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/contacts/create.md), the contact's Fund Account (bank account or UPI) and validate it in a single API call.

> **WARN**
>
> 
> **Watch Out!**
> 
> Account Validation is not available in test mode and is possible only for RazorpayX Lite.
> 

To make an account validation transaction, you must [allowlist your IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md), [Create a Contact](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/account-validation/create-contact.md) and Create a Fund Account for the Contact using either [bank account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/account-validation/bank-account/create-fund-account.md) or [VPA details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/account-validation/vpa/create-fund-account.md). 

### Related Guides
 
[About Fund Account Validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/fund-account-validation.md)
[Set up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md)
[Webhooks Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/account-validation.md)

### Endpoints
 

- **post** `/v1/fund_accounts/validations` - Validate a Bank Account: 
Creates and validates the contact's bank account.

- **post** `/v1/fund_accounts/validations` - Validate a VPA: 
Creates and validates the contact's virtual payment address or UPI fund account.

- **get** `/v1/fund_accounts/validations?account_number={account number}` - Fetch All Account Validation Transactions: 
Retrieves the details of all Fund Account Validation transactions you have made.

- **get** `/v1/fund_accounts/validations/:id` - Fetch Account Validation Transactions With ID: 
Retrieves particular Fund Account Validation transaction with its id.
