---
title: Smart Collect 2.0 APIs
description: Integrate Smart Collect 2.0 using Razorpay APIs.
---

# Smart Collect 2.0 APIs

Smart Collect 2.0, which is an upgraded version of [Smart Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md) , offers additional APIs which enables you to create Customer Identifiers with Bank Account and VPA Receiver, add VPA Receiver to existing Customer Identifier, and fetch payments made using UPI. 

Open a Current account or an Escrow account to start using [Smart Collect 2.0](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md).

Fork the Razorpay Postman Public Workspace and try the Smart Collect APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-9fd01f11-0b59-4e97-a281-40f4b14277ec)

> **INFO**
>
> 
> **Handy Tips**
> 
> - **Smart Collect 2.0** offers all the existing functionalities of **Smart Collect** and uses the same **Smart Collect** API endpoints, in addition to the new APIs listed on this page.
> 
> - Use [Smart Collect TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv.md)  APIs to **Add an Allowed Payer** or **Delete an Allowed Payer**
> 
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> Bank account is mandatory to create a Customer Identifier. You cannot create a Customer Identifier using VPA (UPI) alone.
> 

### Related Guides

[About Smart Collect 2.0](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/smart-collect.md)

### Endpoints

  - **post** `/v1/virtual_accounts` - Create Customer Identifier with VPA and Bank Account Receivers With Smart Collect 2.0: 
    Creates a Customer Identifier with VPA and Bank Account Receivers With Smart Collect 2.0.
  

  
  - **post** `v1/virtual_accounts/:id/receivers` - Add VPA Receiver to existing Customer Identifier With Smart Collect 2.0: 
    Adds a VPA Receiver to an existing Customer Identifier With Smart Collect 2.0.
  

  - **get** `/v1/payments/:id/upi_transfer` - Fetch Payments Made Using UPI With Smart Collect 2.0: 
    Retrieves payments made using UPI With Smart Collect 2.0.
  

  - **post** `/v1/virtual_accounts` - Create a Customer Identifier With Bank Account Receiver: 
    Creates a Customer Identifier with bank account receiver.
  

  - **post** `/v1/virtual_accounts/:id` - Update a Customer Identifier: 
    Updates details of a Customer Identifier.
  

  - **get** `/v1/virtual_accounts/:id` - Fetch a Customer Identifier Using ID: 
    Retrieves details of a Customer Identifier using id.
  

  - **get** `/v1/virtual_accounts/` - Fetch All Customer Identifiers: 
    Retrieves details of all Customer Identifiers.
  

  - **get** `/v1/virtual_accounts/:id/payments` - Fetch Payments for a Customer Identifier: 
    Retrieves details of payments made against a particular Customer Identifier.
  

  - **get** `/v1/virtual_accounts/:id/payments` - Fetch Payments Made By Bank Transfer: 
    Retrieves details of a payment using bank transfer method.
  

  - **get** `/v1/payments?skip=0&count=25&va_transaction_id=:id&virtual_account=1` - Fetch Payments Using UTR: 
    Retrieves details of a payment using bank transfer method via UTR.
  

  - **post** `/v1/virtual_accounts/:id/close` - Close a Customer Identifier: 
    Closes a Customer Identifier.
  

  - **post** `v1/virtual_accounts/:id/receivers` - Add VPA Receiver to existing Customer Identifier With Smart Collect 2.0: 
    Adds a VPA Receiver to an existing Customer Identifier With Smart Collect 2.0.
  

  - **post** `/v1/virtual_accounts` - Create Customer Identifier with VPA and Bank Account Receivers With Smart Collect 2.0: 
    Creates a Customer Identifier with VPA and Bank Account Receivers With Smart Collect 2.0.
  

  - **get** `/v1/payments/:id/upi_transfer` - Fetch Payments Made Using UPI With Smart Collect 2.0: 
    Retrieves payments made using UPI With Smart Collect 2.0.
