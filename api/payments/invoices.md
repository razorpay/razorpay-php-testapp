---
title: API | Invoices
heading: Invoices
description: Create, update, delete, cancel, fetch and send Invoices using Razorpay APIs.
---

# Invoices

You can use [Razorpay Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) to send invoices to your customers and accept payments instantly. The invoice contains information regarding the sale such as the name of the invoiced products or services, quantity, billing cycle, price breakup, receipt number and customer information. 

You can create and manage Invoices using APIs or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/create.md#create-an-invoice-from-dashboard).

> **INFO**
>
> 
> **Handy Tips**
> 
> You can only create non-GST Invoices via APIs. Non-GST invoices can be created in any of the [supported international currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). You cannot add tax rates for invoices created using international currencies.
> 

Fork the Razorpay Postman Public Workspace and try the invoices APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-6109230d-794c-4a01-b982-4d8479afee53)

### Related Guides

[About Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/invoices.md)

### Endpoints

  - **post** `/v1/invoices` - Create an Invoice (Example 1): 
    Creates an Invoice using a Customer id.
  

  - **post** `/v1/invoices` - Create an Invoice (Example 2): 
    Creates an Invoice using customer details such as name and billing details.
  

  - **patch** `/v1/invoices/:id` - Update an Invoice: 
    Updates an Invoice.
  

  - **post** `/v1/invoices/:id/issue` - Issue an Invoice: 
    Issues an Invoice.
  

  - **delete** `/v1/invoices/:id` - Delete an Invoice: 
    Deletes an Invoice.
  

  - **post** `/v1/invoices/:id/cancel` - Cancel an Invoice: 
    Cancels an Invoice.
  

  - **get** `/v1/invoices/:id` - Fetch an Invoice With ID: 
    Retrieves details of a particular Invoice using id.
  

  - **get** `/v1/invoices` - Fetch All Invoices: 
    Retrieves details of all Invoices.
  

  - **post** `/v1/invoices/:id/notify_by/:medium` - Send Notifications: 
    Sends notifications to customers.
  

  - **post** `/v1/items` - Create an Item: 
    Creates an item by providing basic details such as name and amount. 
  

  - **get** `/v1/items/:id` - Fetch an Item With ID: 
    Retrieves details an item by id.
  

  - **get** `/v1/items` - Fetch All Items: 
    Retrieves details of multiple items.
  

  - **patch** `/v1/items/:id` - Update an Item: 
    Updates the details of an item.
  

  - **delete** `/v1/items/:id` - Delete an Item: 
    Deletes an item.
