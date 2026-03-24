---
title: API | Payments - Smart Collect With TPV
heading: Smart Collect With TPV
description: Create and manage Customer Identifiers and fetch payment details using Razorpay **Smart Collect TPV** APIs.
---

# Smart Collect With TPV

You can create Customer Identifiers using the **Smart Collect** APIs to accept large payments from your customers in the form of bank transfers via NEFT, RTGS and IMPS. In addition, you can also  add an Allowed Payer or delete an Allowed payer using **Smart Collect TPV** APIs.

> **INFO**
>
> 
> **Handy Tips**
> 
>   If you are a new customer, explore [Smart Collect 2.0 ](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect-2.md) . It uses the same APIs as **Smart Collect**, while also offering additional endpoints—such as creating a Customer Identifier with a VPA and bank account, fetching UPI payments, and adding a VPA Receiver to an existing Customer Identifier.
>   
> 

Fork the Razorpay Postman Public Workspace and try the Smart Collect with TPV APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-3ea069ae-e9fc-4778-b70b-193e0693e476)

### Related Guides

[ About Smart Collect](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect.md)
[Set Up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md)
[Webhook Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/smart-collect.md)

### Endpoints

  - **post** `/v1/virtual_accounts` - Create a Customer Identifier with TPV: 
    Creates a Customer Identifier with bank account.
  

  - **post** `/v1/virtual_accounts/:va_id/allowed_payers` - Add an Allowed Payer With TPV: 
    Adds an allowed payer's account.
  

  - **get** `/v1/virtual_accounts/:id` - Fetch a Customer Identifier Using id With TPV: 
    Retrieves details of a Customer Identifier with id.
  

  - **get** `/v1/virtual_accounts` - Fetch All Customer Identifiers With TPV: 
    Retrieves details of all Customer Identifiers.
  

  - **get** `/v1/virtual_accounts/:id/payments` - Fetch Payments for a Customer Identifier With TPV: 
    Retrieves details of payments made against a particular Customer Identifier.
  

  - **get** `/v1/payments/:id/bank_transfer` - Fetch Payment Details Using id and Transfer Method With TPV: 
    Retrieves details of a payment using payment id and bank transfer method.
  

  - **delete** `/v1/virtual_accounts/:va_id/allowed_payers/:id` - Delete an Allowed Payer Account With TPV: 
    Deletes an allowed payer account.
