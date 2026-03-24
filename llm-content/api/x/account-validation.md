---
title: Fund/Bank Account Validation
heading: Account Validation
description: Overview of Account Validation for RazorpayX, APIs and webhook payload. Validate customer's bank account before you make payouts.
---

# Account Validation

[Account Validation](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-account-validation.md) validates your Contact's Fund Account details (such as bank account or virtual payment address (VPA) details) to verify the account number where the user wants to receive the amount. Account Validation is not available in test mode and is possible only for RazorpayX Lite.

To make an account validation transaction, you must [allowlist your IPs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md), [Create a Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/account-validation/create-contact.md) and Create a Fund Account for the Contact using either [bank account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/account-validation/bank-account/create-fund-account.md) or [VPA details](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/account-validation/vpa/create-fund-account.md). 

Fork the Razorpay Postman Public Workspace and try the Account Validation APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/api-keys.md).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-62befdac-a937-4ee9-8bc4-943801ce2368)

### Related Guides
 
[About Fund Account Validation](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-account-validation.md)
[Set up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md)
[Webhooks Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/account-validation.md)

### Endpoints
 

- **post** `/v1/contacts` - Create Contact: 
Creates a Contact using customer's contact details such a phone number or email id.

- **post** `/v1/fund_accounts` - Create a Fund Account of Type Bank Account: 
Creates a Fund Account for an existing Contact using customer's bank account details.

- **post** `/v1/fund_accounts/validations` - Validate a Bank Account: 
Validates the contact's bank account.

- **post** `/v1/fund_accounts` - Create a Fund Account of Type VPA: 
Creates a Fund Account for an existing Contact using customer's virtual payment address or UPI.

- **post** `/v1/fund_accounts/validations` - Validate a VPA: 
Validates the contact's virtual payment address or UPI fund account.

- **post** `/v1/fund_accounts/validations` - Validate VPA using Reverse Penny Drop: 
Validates the contact's virtual payment address or UPI fund account via Reverse Penny Drop.

- **get** `/v1/fund_accounts/validations?account_number={account number}` - Fetch All Account Validation Transactions: 
Retrieves the details of all Fund Account Validation transactions you have made.

- **get** `/v1/fund_accounts/validations/:id` - Fetch Account Validation Transactions With ID: 
Retrieves particular Fund Account Validation transaction with its id.
