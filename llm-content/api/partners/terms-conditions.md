---
title: Terms and Conditions APIs
description: Use the Terms and Conditions APIs to accept and fetch terms and conditions for a sub-merchant.
---

# Terms and Conditions APIs

You can use the Terms and Conditions APIs to fetch terms and conditions for a sub-merchant. Check the [workflow to fetch and accept terms and conditions](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/#terms-and-conditions-workflow.md) for a sub-merchant.

Fork the Razorpay Postman Public Workspace and try the Terms and Conditions APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/#api-authentication.md).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-69580306-114f-4e7e-b960-4b0f5cc1ddd6)

### Related Guides

[Sub-merchant Onboarding APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api.md)
[Set Up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/webhooks.md)
[Webhook Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners.md)

### Endpoints

  - **get** `/v2/products/:product_name/tnc` - Fetch Terms and Conditions: 
    Retrieves terms and conditions for a sub-merchant.
  

  - **post** `/v2/accounts/:account_id/products` - Accept Terms and Conditions: 
    Use the Product Configuration API to accept terms and conditions for a sub-merchant.
