---
title: Subscriptions
description: Know about Subscriptions and list of endpoints.
---

# Subscriptions

You can use Subscriptions to charge a customer periodically. A Subscription contains details like the plan, the start date, the total number of billing cycles, the free trial period (if any) and the upfront amount to be collected. 

 

 
 Below are the steps to integrate Subscriptions. You can also refer to our comprehensive [Subscriptions Integration guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/integration-guide.md).

 1. [Create a Plan](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions/create-plan.md)
 2. [Create a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions/create-subscription.md)
 3. [Checkout Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/integration-guide.md#step-14-integrate-with-standard-checkout/)

 Fork the Razorpay Postman Public Workspace and try the Subscription APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).
 
 [](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-33ddca50-ea58-4c30-be41-bd7643a1438c)

### Related Guides

[About Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md)
[Integrate With Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/integration-guide.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md)

### Endpoints

- **post** `/v1/plans` - Create a Plan: 
 Creates a plan.

- **get** `/v1/plans` - Fetch All Plans: 
 Fetches all the plans.

- **get** `/v1/plans/:id` - Fetch a Plan With ID: 
 Fetches a plan by its unique identifier.

- **post** `/v1/subscriptions` - Create a Subscription: 
 Creates a Subscription.

        
- **post** `/v1/subscriptions` - Create a Subscription Link: 
 Creates a Subscription link.

- **get** `/v1/subscriptions` - Fetch All Subscriptions: 
 Fetches all the created Subscriptions.

- **get** `/v1/subscriptions/:id` - Fetch Subscription With ID: 
 Fetches a Subscription details using its unique identifier.

- **post** `/v1/subscriptions/:id/cancel` - Cancel a Subscription: 
 Cancels a Subscription.

- **patch** `/v1/subscriptions/:id` - Update a Subscription: 
 Updates a Subscription.

- **get** `/v1/subscriptions/:id/retrieve_scheduled_changes` - Fetch Details of a Pending Update: 
 Fetches details about any update of a Subscription.

- **post** `/v1/subscriptions/:id/cancel_scheduled_changes` - Cancel an Update: 
 Cancels an update.

- **post** `/v1/subscriptions/:id/pause` - Pause a Subscription: 
 Pauses an active Subscription.

- **post** `/v1/subscriptions/:id/resume` - Resume a Subscription: 
 Resumes a paused Subscription.

- **get** `/v1/subscriptions` - Fetch All Invoices for a Subscription: 
 Fetches all the generated invoices for a Subscription.

- **post** `/v1/subscriptions` - Link an Offer to a Subscription: 
 Links an Offer to a Subscription.

- **delete** `/v1/subscriptions/:sub_id/:offer_id` - Delete an Offer linked to a Subscription: 
 Deletes an Offer linked to a Subscription.
