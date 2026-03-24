---
title: API | QR Codes
heading: QR Codes
description: API Documentation for Razorpay QR Codes. Create, Close and Fetch QR Codes using APIs. Check the various use cases and code samples.
---

# QR Codes

You can use Razorpay [QR Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes.md) to create QR Codes and share them with customers to accept digital payments. You can create and manage QR Codes using APIs or from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/create.md).

 
Refer to the [QR Code Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/how-it-works.md) and [Integration Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes/apis/#integration-checklist.md) before you begin integrating with the APIs for QR Codes.

 Fork the Razorpay Postman Public Workspace and try the QR Codes APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/api-keys/#generate-api-keys.md).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/f960539b-c56c-41e5-810b-63d2a89d447e/folder/12492020-90436eef-f17f-4bc1-9d13-b622a4270125)
 

### Related Guides

[About QR Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/qr-codes.md)

### Endpoints

- **post** `/v1/payments/qr_codes` - Create a QR Code: 
 Creates a QR Code.

- **post** `/v1/payments/qr_codes/:id/close` - Close a QR Code: 
 Closes a QR Code.

- **get** `/v1/payments/qr_codes?count=2` - Fetch All QR Codes: 
 Retrieves details of all QR Codes.

- **get** `/v1/payments/qr_codes/:id` - Fetch a QR Code with ID: 
 Retrieves details of a specific QR Code using id.

- **get** `/v1/payments/qr_codes?customer_id={customer_id}` - Fetch QR Codes for a Customer ID: 
 Retrieves QR Codes generated for a Customer id.

- **get** `/v1/payments/qr_codes?payment_id={payment_id}` - Fetch QR Codes for a Payment ID: 
 Retrieves QR Codes by Payment id.

- **get** `/v1/payments/qr_codes/:id/payments` - Fetch Payments for a QR Code: 
 Retrieves payments made on a QR Code.

- **patch** `/v1/payments/qr_codes/:id/payments` - Update a QR Code: 
 Updates payments made on a QR Code.

- **post** `/v1/payments/:id/refund` - Refund Payments: 
 Creates a refund for a payment.
