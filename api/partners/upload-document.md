---
title: Document APIs
description: Use the Document APIs to upload files and complete the mandatory KYC requirements.
---

# Document APIs

Use the Document APIs to upload and fetch documents for the KYC verification process. Check the [product activation status and updates permitted](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md#product-activation-status-and-updates-permitted) for Document APIs.

The maximum supported file size for a JPG/PNG is 4MB. The maximum supported file size for a PDF is 2MB. Do not pass file URLs instead of uploading documents. If you have uploaded the document but mandatory field-level parameters are not passed in the API, you need to re-execute the Documents API with the same document and pass the fields.

Fork the Razorpay Postman Public Workspace and try the Document APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md#api-authentication/).

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-91288595-d910-4f84-822d-808de103aeba)

### Related Guides

[Sub-merchant Onboarding APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md)
[Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/webhooks.md)
[Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners.md)

### Endpoints

  - **post** `/v2/accounts/:account_id/documents` - Upload Account Documents: 
    Uploads business documents for a sub-merchant's account.
  

  - **post** `/v2/accounts/:account_id/stakeholders/:stakeholder_id/documents` - Upload Stakeholder Documents: 
    Uploads signatory documents for a stakeholder.
  

  - **get** `/v2/accounts/:account_id/documents` - Fetch Account Documents: 
    Retrieves the documents uploaded for an account.
  

  - **get** `/v2/accounts/:account_id/stakeholders/:stakeholder_id/documents` - Fetch Stakeholder Documents: 
    Retrieves the documents uploaded for a stakeholder.
