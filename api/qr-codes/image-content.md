---
title: QR Codes (Image Content)
---

# QR Codes (Image Content)

Create Razorpay [QR Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes.md) and share them with customers to accept digital payments.

> **INFO**
>
> 
>  **Feature Request**
> 
>  This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
>  

Fork the Razorpay Postman Public Workspace and try the QR Codes (Image Content) APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-90436eef-f17f-4bc1-9d13-b622a4270125)

### Related Guides

[About QR Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes.md)

### Endpoints

- **post** `/v1/payments/qr_codes` - Create a QR Code: 
 Creates a QR Code.

- **post** `/v1/payments/qr_codes/:qr_id/close` - Close a QR Code: 
 Closes a QR Code.

- **get** `/v1/payments/qr_codes?count=2` - Fetch All QR Codes: 
 Retrieves details of all QR Codes.

- **get** `/v1/payments/qr_codes/:qr_id` - Fetch a QR Code With ID: 
 Retrieves details of a QR Code using id.

- **get** `/v1/payments/qr_codes?customer_id={customer_id}` - Fetch QR Codes for a Customer ID: 
 Retrieves QR Codes generated for a Customer id.

- **get** `/v1/payments/qr_codes?payment_id={payment_id}` - Fetch QR Codes for a Payment ID: 
 Retrieves QR Codes by Payment id.

- **get** `/v1/payments/qr_codes/:qr_id/payments` - Fetch Payments for a QR Code: 
 Retrieves payments made on a QR Code.

- **post** `/v1/payments/:id/refund` - Refund Payments: 
 Refunds payments made on a QR Code.
