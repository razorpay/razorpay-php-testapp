---
title: Partners Sub-merchant Onboarding APIs | Account
heading: Account
description: Use the Account APIs to onboard sub-merchants.
---

# Account

You can use the Account APIs to create a sub-merchant account. After an account gets created, an `account_id` is assigned. Check the [account activation flow and states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md#account-activation).

Fork the Razorpay Postman Public Workspace and try the Account APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-51a4958d-ae00-4717-9ec4-64cb7c1bf7fb)

### Related Guides

[Sub-merchant Onboarding APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/webhooks.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners.md)

### Endpoints

  - **post** `/v2/accounts` - Create an Account: 
    Creates a sub-merchant account.
  

  - **get** `/v2/accounts/:account_id` - Fetch an Account: 
    Retrieves the details of an account.
  

  - **patch** `/v2/accounts/:account_id` - Update an Account: 
    Updates an account for different product activation statuses.
  

  - **delete** `/v2/accounts/:account_id` - Delete an Account: 
    Deletes a sub-merchant account.
