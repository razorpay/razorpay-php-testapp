---
title: Payments
description: Capture and fetch Payments using Razorpay APIs.
---

# Payments

Payments APIs are used to capture and fetch payments. You can also fetch payments based on orders and card details of payment.

 
> **INFO**
>
> 
>  **Handy Tips**
> 
>  You can use Payments API only to retrieve payment details or change the status from `authorized` to `captured` and **not** to collect payments. You can use our [products](@/Applications/MAMP/htdocs/new-docs/llm-content/payments.md) to accept payments. 
>  

 

 Fork the Razorpay Postman Public Workspace and try the Payments APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/api-keys/#generate-api-keys.md).

 [![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-11b2db21-9019-4814-9669-c70305b8fd6e)

 

### Related Guides

[ About Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments.md)
[Set Up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md)
[Sample Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payments.md)

### Endpoints

  - **post** `/v1/payments/:id/capture` - Capture a Payment: 
    Captures a payment.
  

  - **get** `/v1/payments/:id` - Fetch a Payment With ID: 
    Retrieves details of a specific payment using id.
  

  - **get** `/v1/payments/:id/?expand[]=card` - Fetch a Payment With ID (Example 1): 
    Retrieves details of all the payments that is created, with the `card` parameter.
  

  - **get** `/v1/payments/:id/?expand[]=emi` - Fetch a Payment With ID (Example 2): 
    Retrieves details of all the payments that is created, with the `emi` parameter.
  

  - **get** `/v1/payments/:id/?expand[]=offers` - Fetch a Payment With ID (Example 3): 
    Retrieves details of all the payments that is created, with the `offers` parameter.
  

  - **get** `/v1/payments` - Fetch All Payments: 
    Retrieves details of all payments.
  

  - **get** `/v1/payments?expand[]=card` - Fetch All Payments (Example 1): 
    Retrieves expanded card details of a payment.
  

  - **get** `/v1/payments?expand[]=emi` - Fetch All Payments (Example 2): 
    Retrieves expanded EMI details of a payment.
  

  - **get** `/v1/orders/:id/payments` - Fetch Payments Based on Orders: 
    Retrieves payments linked to an Order.
  

  - **get** `/v1/payments/:id/card` - Fetch Card Details of a Payment: 
    Retrieves card details of a payment.
  

  
  - **patch** `/v1/payments/:id/` - Update a Payment: 
    Edits an existing payment.
