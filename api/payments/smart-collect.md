---
title: API | Payments - Smart Collect
heading: Smart Collect
description: Create Customer Identifiers on-demand for customers to pay via NEFT, RTGS and IMPS using Razorpay Smart Collect APIs.
---

# Smart Collect

You can create Customer Identifiers using the Smart Collect APIs to accept large payments from your customers in the form of bank transfers via NEFT, RTGS and IMPS.

> **INFO**
>
> 
> **Handy Tips**
> 
> -  If you are a new customer, explore [Smart Collect 2.0](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-2.md) . It uses the same APIs as **Smart Collect**, while also offering additional endpoints—such as creating a Customer Identifier with a VPA and bank account, fetching UPI payments, and adding a VPA Receiver to an existing Customer Identifier.
> - You can also **Add an Allowed Payer** or **Delete an Allowed Payer** using [Smart Collect TPV](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv.md)  APIs.
> 

Fork the Razorpay Postman Public Workspace and try the Smart Collect APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-9fd01f11-0b59-4e97-a281-40f4b14277ec)

### Related Guides

[About Smart Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/smart-collect.md)

### Endpoints

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
