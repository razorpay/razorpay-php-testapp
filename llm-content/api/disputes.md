---
title: Disputes
description: List of Dispute APIs available to perform various actions.
---

# Disputes

A [dispute](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes.md) arises when your customer or the issuing bank questions the validity of a payment. You can manage disputes using APIs or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes.md#dashboard-actions) to ensure a seamless dispute management experience.

 

 Fork the Razorpay Postman Public Workspace and try the Disputes APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

 [](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-0803d1d0-dbdf-4312-bd7b-b4817cea2840)
 

### Related Guides

[About Disputes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/disputes.md)

### Endpoints

- **get** `/v1/disputes` - Fetch All Disputes: 
 Retrieves information about all disputes.

- **get** `/v1/disputes/:id` - Fetch a Dispute With ID: 
 Retrieves details for a specific dispute using the unique identifier linked to the dispute.

- **get** `/v1/disputes/:id?expand[]=payment` - Fetch a Dispute With ID (Example 1): 
 Retrieves details for a specific dispute with expanded payment details.

- **get** `/v1/disputes/:id?expand[]=transaction.settlement` - Fetch a Dispute With ID (Example 2): 
 Retrieves details for a specific dispute with expanded `transaction.settlement` details.

- **post** `/v1/disputes/:id/accept` - Accept a Dispute: 
 Accepts a dispute against the payment.

- **patch** `/v1/disputes/:id/contest` - Contest a Dispute: 
 Contests a dispute with explanations and supporting documents to submit evidences.
