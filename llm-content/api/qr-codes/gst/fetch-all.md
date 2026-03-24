---
title: Fetch All QR Codes
description: Fetch the details of multiple QR Codes using this endpoint.
---

# Fetch All QR Codes

## Fetch All QR Codes

Use this endpoint to retrieve the details of multiple QR Codes.

### Request

@include qr-codes/gst-api/fetch/all

### Response

@include qr-codes/gst-api/fetch/all-res

### Parameters

@include qr-codes/gst-api/fetch/all-query

### Parameters

`id`
: `string` The unique identifier of the QR Code.

`entity`
: `string` Indicates the type of entity. Here, it is `qr_code`.

`tax_invoice`
: `json object` This block contains information about the invoices. If not provided, the transaction will default to non-GST compliant UPI flow.
    
    `number`
    : `string` This is the invoice number against which the payment is collected. If not provided, the transaction will default to non-GST compliant UPI flow.

    `date`
    : `integer` Timestamp, in Unix format, that indicates the issue date of the invoice. For example. `1589994898`. If not provided, it will default to the current date.

    `customer_name`
    : `string` Customer name on the invoice. If not provided, the transaction will default to non-GST compliant UPI flow.

    `gst_amount`
    : `integer` GST amount on the invoice in paise. If not provided, the transaction will default to the non-GST compliant UPI flow.

    `cess_amount`
    : `integer` CESS Amount on the invoice in paise. If not provided, the transaction will default to the non-GST compliant UPI flow.

    `supply_type`
    : `string` Indicates whether the transaction is interstate or intrastate. Possible values:
      - `interstate`
      - `intrastate`

      If not provided, the transaction will default to the non-GST compliant UPI flow.

    `business_gstin`
    : `string` The GSTIN mentioned on the invoice. For example, `06AABCU9603R1ZR`. If not passed, it will be picked up from the database.

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         1. This parameter is only available for UPI QR Codes.

>         2. This is an optional parameter.

>         3. The business is responsible for the completeness and correctness of the data and not Razorpay.
>         

      
`type`
: `string` The type of the QR Code. Possible values:
  - `upi_qr`: Create a QR Code that accepts only UPI payments.

`image_url`
: `string` The URL of the QR Code. A sample short URL looks like this `http://rzp.io/l6MS`. Click the link to download the code.

`name`
: `string` Label entered to identify the QR Code. For example, `Store Front Display`.

`usage`
: `string` Indicates if the QR Code should be allowed to accept single payment or multiple payments. Possible values:
  - `single_use`: QR Code will accept only one payment and then close automatically.
  - `multiple_use` (default): QR Code will accept multiple payments.

`fixed_amount`
: `boolean` Indicates if the QR should accept payments of specific amounts or any amount. Possible values:
  - `true`: QR Code accepts only a specific amount.
  - `false` (default): QR Code accepts any amount.

`payment_amount` _if fixed_amount=true_
: `integer` The amount allowed for a transaction. If this is specified, then any transaction of an amount less than or more than this value is not allowed. For example, if this amount is set as `500000`, the customer cannot pay an amount less than or more than ₹5000.

`status`
: `string` Indicates the status of the QR Code. Possible values: 
  - `active`
  - `closed`

`description`
: `string` A brief description about the QR Code.

`payments_amount_received`
: `integer` The total amount received on the QR Code. All captured payments are considered.

`payments_count_received`
: `integer` The total number of payments received on the QR Code. All captured payments are considered.

`notes`
: `object` Key-value pair that can be used to store additional information about the QR Code. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`customer_id`
: `string` Unique identifier of the customer the QR Code is linked with. Know more about to the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

`close_by`
: `integer` UNIX timestamp at which the QR Code is scheduled to be automatically closed. The time must be at least 15 minutes after the current time. The date range can be set to `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

  
> **WARN**
>
> 
>   **Watch Out**
> 
>   Any request beyond 2147483647 UNIX timestamp will fail.
>   

`closed_at`
: `integer` UNIX timestamp at which the QR Code is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the QR Code was created. 

`close_reason`
: `string` The reason for the closure of the QR Code. Possible values:
  - `on_demand`: When you close the QR Code using the APIs or the Dashboard.
  - `paid`: If the QR Code is created with the `usage=single_payment` parameter, the QR Code closes automatically once the customer makes the payment, with the reason marked as `paid`.
  - `null`: The QR Code has not been closed yet.
