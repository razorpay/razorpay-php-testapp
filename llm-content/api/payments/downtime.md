---
title: Payment Downtime API
heading: Payment Downtime
description: Check the Payment Downtime API to view a list of affected payment methods during downtime.
---

# Payment Downtime

Downtime is when one or more payment options underperform, leading to considerable delays in payment processing. These downtimes are due to technical issues or outages at Razorpay's partner or issuing banks.

 
 Razorpay [informs you about the downtime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/downtime-updates.md) to communicate it to your customers and display only the unaffected payment methods while accepting payments from them. You can poll the API or configure Webhooks to be notified of the downtimes and plan the remediation steps accordingly. Downtime communication for the payment methods such as cards, netbanking and UPI is available.

 
 Fork the Razorpay Postman Public Workspace and try the Downtime APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

 [![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-4270ff49-ebe0-478e-8d3d-e7c2c75b2e4d)

### Related Guides

[About Downtime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/downtime-updates.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payments-downtime)

### Endpoints

- **get** `/v1/payments/downtimes` - Fetch Payment Downtime Details: 
 Retrieves details of Payment Downtime.

- **get** `/v1/payments/downtimes/:id` - Fetch Payment Downtime Details With ID: 
 Retrieves details of a Payment Downtime with id.
