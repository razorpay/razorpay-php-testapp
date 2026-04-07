---
title: Webhooks APIs
heading: Webhooks
description: Use the Webhook APIs to receive event notifications or subscribe to events happening in a sub-merchant's account as per their integration.
---

# Webhooks

Use the Webhooks APIs to receive event notifications or subscribe to events happening in a sub-merchant's account for the integration installed.

Fork the Razorpay Postman Public Workspace and try the Webhooks APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md#api-authentication).

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-9d7fe39c-c63f-4f25-9bc8-09bcb59c7f26)

### Related Guides

[Sub-merchant Onboarding APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/webhooks.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners.md)

### Endpoints

  - **post** `/v2/accounts/:account_id/webhooks` - Create a Webhook: 
    Creates a webhook.
  

  - **get** `/v2/accounts/:account_id/webhooks/:webhook_id` - Fetch a Webhook With ID: 
    Retrieves the details of a webhook.
  

  - **get** `/v2/accounts/:account_id/webhooks` - Fetch all Webhooks: 
    Retrieves the details of all webhooks.
  

  - **patch** `/v2/accounts/:account_id/webhooks/:webhook_id` - Update a Webhook: 
    Updates a webhook.
  

  - **delete** `/v2/accounts/:account_id/webhooks/:webhook_id` - Delete a Webhook: 
    Deletes a webhook.
