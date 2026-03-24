---
title: Product Configuration APIs
description: Use the Product Configuration APIs to enable sub-merchants request for a product.
---

# Product Configuration APIs

You can use the Product Configuration APIs to configure and activate Razorpay products for a sub-merchant account according to their requirements. For example, if you need our Payment Gateway product for all sub-merchants or Payment Gateway for one sub-merchant and Payment Link product for another sub-merchant, you can do so using this API.

You can even accept terms and conditions for the requested product using these APIs. You can fetch the terms and conditions using the [Fetch Terms and Conditions API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/terms-conditions/fetch.md).

The products Payment Links and Payment Gateway have similar requirements. If a requirement is submitted through a product configuration for `payment_gateway`, the same will be applicable for `payment_links`, and vice versa.

Fork the Razorpay Postman Public Workspace and try the Product Configuration APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/#api-authentication.md).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-07bc4970-f967-4020-922f-8adb7ea407e8)

### Related Guides

[Sub-merchant Onboarding APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api.md)
[Set Up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/webhooks.md)
[Webhook Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners.md)

### Endpoints

  - **post** `/v2/accounts/:account_id/products` - Request a Product Configuration: 
    Requests a product configuration for Payment Gateway and Payment Links.
  

  - **get** `/v2/accounts/:account_id/products/:product_id` - Fetch a Product Configuration: 
    Retrieves the details of an account.
  

  - **patch** `/v2/accounts/:account_id/products/:product_id` - Update Settlement Account Details: 
    Updates settlement account details.
  

  - **patch** `/v2/accounts/:account_id/products/:product_id` - Request Payment Methods: 
    Requests Payment Methods.
