---
title: API | Create Customers
heading: Customers
description: Create, edit, and fetch Customer details using Razorpay APIs.
---

# Customers

Add or create [Customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md) with basic details such as name, email and contact details. You can then offer various Razorpay solutions to your customers. Edit customer details as needed. You can create and manage customers using APIs or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md).

Fork the Razorpay Postman Public Workspace and try the Customers APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-d53fbf12-1684-44ab-9c20-47d7b3d1f2ae)

### Related Guides

[About Customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md)

### Endpoints

  - **post** `/v1/customers` - Create a Customer: 
    Creates or adds a customer with basic details such as name and contact details.
  

  - **put** `/v1/customers/:id` - Edit Customer Details: 
    Edits the customer details such as name, email and contact details.
  

  - **get** `/v1/customers` - Fetch All Customers: 
    Retrieves details of all the customers.
  

  - **get** `/v1/customers/:id` - Fetch Customer With ID: 
    Retrieves details of a customer as per the id.
