---
title: Documents API
heading: Documents
description: Securely send dispute-related documents to Razorpay using the Documents API.
---

# Documents

Use the Documents APIs to securely upload and share documents with Razorpay.

 Fork the Razorpay Postman Public Workspace and try the Documents APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

 [![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-c8192d5e-7fd8-4047-a6c4-eb2ef5e34155)

### Related Guides

[About Documents](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes/submit-evidence.md)

### Endpoints

- **post** `/v1/documents` - Create a Document: 
 Uploads a document onto the Razorpay ecosystem.

- **get** `/v1/documents/:id` - Fetch Document Information: 
 Retrieves the details of any document that was uploaded.

- **get** `/v1/documents/:id/content` - Fetch Document Content: 
 Downloads a previously uploaded document.
