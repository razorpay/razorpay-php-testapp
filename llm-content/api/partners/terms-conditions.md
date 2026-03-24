---
title: Terms and Conditions APIs
description: Use the Terms and Conditions APIs to accept and fetch terms and conditions for a sub-merchant.
---

# Terms and Conditions APIs

You can use the Terms and Conditions APIs to fetch terms and conditions for a sub-merchant. Check the [workflow to fetch and accept terms and conditions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md#terms-and-conditions-workflow) for a sub-merchant.

Fork the Razorpay Postman Public Workspace and try the Terms and Conditions APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md#api-authentication/).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-69580306-114f-4e7e-b960-4b0f5cc1ddd6)

### Related Guides

[Sub-merchant Onboarding APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/webhooks.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners.md)

### Endpoints

  - **get** `/v2/products/:product_name/tnc` - Fetch Terms and Conditions: 
    Retrieves terms and conditions for a sub-merchant.
  

  - **post** `/v2/accounts/:account_id/products` - Accept Terms and Conditions: 
    Use the Product Configuration API to accept terms and conditions for a sub-merchant.
