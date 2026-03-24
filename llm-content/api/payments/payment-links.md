---
title: API | Payment Links
heading: Payment Links
description: Create, update, delete, cancel, fetch and send Payment Links using Razorpay APIs.
---

# Payment Links

[Payment Links](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-links.md) are URLs that you can send to your customers through SMS and email to collect payments from them. Customers can click on the URL, which opens the payment request page, and complete the payment using any of the available payment methods. You can create, fetch, edit or cancel Payment Links using APIs or from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/#dashboard-actions.md).

Fork the Razorpay Postman Public Workspace and try the Payment Links APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-a731e460-9f2d-4fa8-b149-3fc7df7983f5?ctx=documentation)

### Related Guides

[ About Payment Links](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-links.md)
[Set Up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payments.md)
[Webhook Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payment-links.md)

### Endpoints

  - **post** `/v1/payment_links` - Create a Standard Payment Link: 
    Creates a Standard Payment Link.
  

  - **post** `/v1/payment_links` - Create a UPI Payment Link: 
    Creates a UPI Payment Link.
  

  - **get** `/v1/payment_links` - Fetch All Standard Payment Links: 
    Retrieves data of all Standard Payment Links.
  

  - **get** `/v1/payment_links` - Fetch All UPI Payment Links: 
    Retrieves data of all UPI Payment Links.
  

  - **get** `/v1/payment_links/:id` - Fetch a Standard Payment Link With ID: 
    Retrieves data of a Standard Payment Link with id.
  

  - **get** `/v1/payment_links/:id` - Fetch a UPI Payment Link With ID: 
    Retrieves data of a UPI Payment Link with id.
  

  - **post** `/v1/payment_links/:id/notify_by/:medium` - Send or Resend Notifications: 
    Sends notifications to your customers.
  

  - **patch** `/v1/payment_links/:id` - Update a Standard Payment Link: 
    Updates the details of a Standard Payment Link.
  

  - **patch** `/v1/payment_links/:id` - Update a UPI Payment Link: 
    Updates the details of a UPI Payment Link.
  

  - **post** `/v1/payment_links/:id/cancel` - Cancel a Standard Payment Link: 
    Cancels a Standard Payment Link.
  

  - **post** `/v1/payment_links/:id/cancel` - Cancel a UPI Payment Link: 
    Cancels a UPI Payment Link.
  

  - **post** `/v1/payment_links` - Implement Thematic Changes on Checkout: 
    Makes thematic chages to your Payment Links.
  

  - **post** `/v1/payment_links` - Changes Business Name: 
    Changes your Business name.
  

  - **post** `/v1/payment_links` - Customise Payment Methods (Example 1): 
    Customises Payment Methods with the Options and Method Parameters.
  

  - **post** `/v1/payment_links` - Customise Payment Methods (Example 2): 
    Customises Payment Methods with the Options and Config Parameters.
  

  - **post** `/v1/payment_links` - Rename Labels in the Checkout Section: 
    Renames Labels in the Checkout Section.
  

  - **post** `/v1/payment_links` - Rename Labels in Payment Details Section: 
    Renames Labels in the Payment details section.
  

  - **post** `/v1/payment_links` - Offers on Payment Links: 
    Helps you provide discount and cashback offers on Payment Links
  

  - **post** `/v1/payment_links` - Manage Reminders for Payment Links: 
    Helps you manage reminders on Payment Links.
  

  - **post** `/v1/payment_links` - Transfer Payments Received Using Payment Links: 
    Helps you transfer payments received using Payment Links.
  

  - **post** `/v1/payment_links` - Perform Third-Party Validation Using Payment Links: 
    Helps you perform Third-Party Validation using Payment Links.
