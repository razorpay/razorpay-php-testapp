---
title: Search a QR Code
description: Search for QR Codes and Payments on the Razorpay Dashboard using filters.
---

# Search a QR Code

You can search for QR Codes on the Dashboard by specifying various filters. Know more about [QR Code States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes.md#qr-code-states/).

## Search a QR Code from the Dashboard

To search a QR Code:

1. Log in to the Dashboard.
2. Select **QR Codes** from the left menu and search for a QR Code under **QR Codes** by specifying filters.

Filter | Description
---
QR Code Id | Unique identifier of the QR Code.
---
QR Name | Name of the QR Code.
---
Status | The status of the QR Code.
---
Notes | Additional information stored in the `Internal Notes` field while creating the QR Code.
---
Customer Name | Name of the customer.
---
Customer Contact | Registered phone number of the customer.
---
Customer Email | Email address of the customer.

![Search for a QR code from the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-search-search-qr-code.jpg.md)

## Search Payments

To search payments made using the QR Codes:
1. Log in to the Dashboard.
2. Select **QR Codes** from the left menu and search for a payment under **Payments** by specifying filters.

Filter | Description
---
QR Code Id | Unique identifier of the QR Code.
---
Payment Id | Unique identifier of the payment.
---
Payment Status | The status of the payment. Know more about [payment states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md).
---
Email | Email address of the customer.
---
Bank Reference Number | Unique reference provided by the bank for the payment.
---
Notes | Additional information stored in the `Internal Notes` field while creating the QR Code.
---
Count | Number of records to be shown.

![Search for a payment made using QR code from the Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/qr-codes-search-search-payments.jpg.md)

### Related Information

- [QR Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes.md)
- [Create a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/create.md)
- [Cancel a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/close.md)
- [QR Code APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/apis.md)
