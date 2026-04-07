---
title: Razorpay Refunds APIs
heading: Refunds
description: Initiate normal and instant refunds to your customers using Razorpay Refund APIs. View and update refund using APIs.
---

# Refunds

Make full or partial refunds to customers. You can initiate refunds only on those payments that are in `captured` state. A payment in `authorized` state is auto-refunded if not `captured` within 3 days of creation. You can create and manage refunds using APIs or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#dashboard-actions).

Fork the Razorpay Postman Public Workspace and try the Refunds APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-49fdb1f6-7e7d-426c-b7b4-3dd468d8565e)

### Related Guides

[About Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)
[Sample Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/refunds.md)

### Endpoints

- **post** `/v1/payments/:id/refund` - Create a Normal Refund: 
 Creates a normal refund for a payment.

- **post** `/v1/payments/:id/refund` - Create a Normal Refund (Idempotent Request): 
 Retry or send the same normal refund request multiple times safely by creating a normal refund idempotency request.

- **post** `/v1/payments/:id/refund` - Create an Instant Refund: 
 Creates an instant refund for a payment.

- **post** `/v1/payments/:id/refund` - Create an Instant Refund (Idempotent Request): 
 Retry or send the same instant refund request multiple times safely by creating an instant refund idempotency request.

- **get** `/v1/payments/:id/refunds` - Fetch Multiple Refunds for a Payment: 
 Retrieves multiple refunds for a payment.

- **get** `/v1/payments/:payment_id/refunds/:refund_id` - Fetch a Specific Refund for a Payment: 
 Retrieves details of a specific refund made for a payment.

- **get** `/v1/refunds/` - Fetch All Refunds: 
 Retrieves details of all refunds.

- **get** `/v1/refunds/:id` - Fetch Refund With ID: 
 Retrieves the refund using the id.

- **patch** `/v1/refunds/:id/` - Update a Refund: 
 Updates the `notes` parameter for a refund.
