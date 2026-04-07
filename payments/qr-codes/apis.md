---
title: QR Code APIs
description: Checklist to integrate using QR Code APIs. List of QR Code APIs and GST QR Code APIs - Create, Close, Fetch and Refund.
---

# QR Code APIs

You can use the QR Codes APIs to perform various actions. You can perform all of these actions from the Dashboard as well.

    
### Integration Checklist

> **WARN**
>
> 
> **Watch Out!**
> 
> Once the QR Code has been created, you cannot edit its details.
> 

1. If you are creating a Dynamic QR Code, we suggest you create a single `customer_id` rather than making multiple ids for the same customer. In any case, if their details change, you can use the [Edit Customer Details API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#edit-customer-details).
2. To keep a check on the duplicate customer details:
    - If you use the `fail_existing : "1"` parameter, the API throws an error when existing customer details are added. 
    - If you use the `fail_existing : "0"` parameter, the API returns the `customer_id` when existing customer details are added. 
3. Use [Payment Downtime API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md) to check for any downtimes that might affect the UPI generation/transactions.
4. Please note that the Razorpay order id gets generated automatically when a customer makes the payment using the QR Code provided by you.
5. While [creating a QR Code via API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes.md#create-a-qr-code) or using the Dashboard, make sure that you pass all the critical parameters for non-GST and GST QR Codes.
6. Pass the type as `upi_qr` while creating the QR Code. Since we also have a BharatQR feature, not passing the type can lead to errors.
7. Check the difference between Static and Dynamic QR Codes:

    
    Dynamic QR | Static QR
    ---
    Single use. Can be used only once. | Can be used multiple times.
    ---
    If it is generated for specific customers, then you can pass `customer_id`. | Not required to pass `customer_id`.
    

8. If the `fixed_amount` parameter is passed, you must pass the `amount` parameter at the time of QR Code creation.
9. To fetch the details about the QR Codes, you can use [QR Code webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/subscribe-to-webhooks.md) or use [Fetch a QR Code API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/fetch-with-id.md) to get details about payment activity or the status of your QR Codes.
10. We recommend using the [Fetch a QR Code API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/fetch-with-id.md) to fetch relative information about QR Codes.

> **INFO**
>
> 
> **Best Practices for Image Content Integration**
> 
> You can check the contents passed in the QR Code using the response payload for [Create a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes.md#create-a-qr-code). The `image_content` parameter displays the QR Code content. For Example, once the `qr_image_content` feature is enabled, you can get the Create QR Code response as given on the right-hand side.
> 

        

## List of QR Code APIs

The table below lists the various QR Code APIs and gives a brief description of each API:

API | Description
---
[Create a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/create.md) | API to create a new QR Code
---
[Close a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/close.md) | API to close a QR Code
---
[Fetch a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/fetch-with-id.md) | API to view details of a QR Code
---
[Fetch a QR Code for Customer ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/fetch-customer-id.md) | API to view details of a QR Code for a customer id
---
[Fetch a QR Code for Payment ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/fetch-payment-id.md) | API to view details of a QR Code for a payment id
---
[Fetch payments made to a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/fetch-payments.md) | API to view details of payments made to a QR Code
---
[Fetch multiple QR Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/fetch-all.md) | API to view a list of all QR Codes

## List of QR GST Code APIs
The table below lists the various QR Code APIs and gives a brief description of each API:

API | Description
---
[Create a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/gst.md#create-a-qr-code/) | API to create a new QR Code
---
[Close a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/gst.md#close-a-qr-code/) | API to close a QR Code
---
[Fetch a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/gst.md#fetch-a-qr-code/) | API to view details of a QR Code
---
[Fetch a QR Code for Customer ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/gst.md#fetch-qr-code-customer-id/) | API to view details of a QR Code for a customer id
---
[Fetch a QR Code for Payment ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/gst.md#fetch-qr-code-payment-id/) | API to view details of a QR Code for a payment id
---
[Fetch payments made to a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/gst.md#fetch-payments-qr-code/) | API to view details of payments made to a QR Code
---
[Fetch multiple QR Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes/gst.md#fetch-multiple-qr-codes/) | API to view a list of all QR Codes
---
[Refund Payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md) | API to refund a payment

### Related Information

- [Create a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/create.md)
- [Search a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/search.md)
- [Close a QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/close.md)
- [Subscribe to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes/subscribe-to-webhooks.md)
