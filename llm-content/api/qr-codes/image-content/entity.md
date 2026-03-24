---
title: QR Codes (Image Content) Entity
description: Know about QR Codes (Image Content) entity parameters and their description.
---

# QR Codes (Image Content) Entity

## QR Codes (Image Content) Entity

The QR Codes (Image Content) entity has the following parameters:

### Response

```json: Entity
{
  "id":"qr_I39xhFWWLO4wjM",
  "entity":"qr_code",
  "created_at":1632892063,
  "name":"Store_3",
  "usage":"single_use",
  "type":"upi_qr",
  "image_url":"https://rzp.io/i/67FsPSHWvw",
  "payment_amount":300,
  "status":"active",
  "description":"For Store 4",
  "fixed_amount":true,
  "payments_amount_received":0,
  "payments_count_received":0,
  "notes":{
    "purpose":"Test UPI QR Code notes"
  },
  "customer_id":"cust_HjSs5QuKahsnng",
  "close_by":1632922955,
  "image_content":"upi://pay?pa=rzr.qrfoodapp54462255833@icic&pn=FoodApp&tr=RZPI39xhFWWLO4wjMqrv2&tn=PaymenttoFoodApp&cu=INR&mc=5811&am=3&invoiceNo=INV001&invoiceDate=2021-09-29T13:42:35+05:30&invoiceName=GauravKumar&gstIn=22AAAAA0000A1Z5&gstBrkUp=GST:40%7CSGST:20%7CCGST:20%7CCESS:0",
  "tax_invoice":{
    "number":"INV001",
    "date":1632922955,
    "customer_name":"Gaurav Kumar",
    "business_gstin":"22AAAAA0000A1Z5",
    "gst_amount":4000,
    "cess_amount":0,
    "supply_type":"intrastate"
  }
}
```

### Parameters

`id`
: `string` The unique identifier of the QR Code.

`entity`
: `string` Indicates the type of entity. Here, it is `qr_code`.

`type`
: `string` The type of the QR Code. Possible values:
  - `upi_qr`: Create a QR Code that accepts only UPI payments.
  - `bharat_qr`: Create a QR Code that accepts UPI and card payments. This is an on-demand feature. Learn more about [Bharat QR](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bharatqr.md).

`image_url`
: `string` The URL of the QR Code. For example, `http://rzp.io/l6MS`. Click the link to download the code.

`image_content`
: `string` The link encoded to the payable QR Code using any QR Code generator. For example:
  - For UPI QR: `upi://pay?pa=dmart.razorpay@hdfcbank&pn=TestAccount&tr=RZPGT5viB4WHeoUuuqrv2&tn=TestAccountRaftarSoft&am=100&cu=INR&mc=5411`
  - For Bharat QR: `000201010212021643926300000000850415540461000000008061661005900000000890827YESB0CMSNOC222333004882700126430010A0000005240117razorpaybqr@icici02041.1027350010A0000005240117RZPGT8ildsFTgS5Sp52047531530335654041.105802IN5906zxcbmn6005Delhi610611008562300514GT8ildsFTgS5Sp070838R004506304B6A9`

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
: `integer` Unix timestamp at which the QR Code is scheduled to be automatically closed. The time must be at least 15 minutes after the current time. The date range can be set to `2147483647` in Unix timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   Any request beyond 2147483647 Unix timestamp will fail.
>   

`closed_at`
: `integer` Unix timestamp at which the QR Code is automatically closed.

`created_at`
: `integer` Unix timestamp at which the QR Code was created. 

`close_reason`
: `string` The reason for the closure of the QR Code. Possible values:
  - `on_demand`: When you close the QR Code using the APIs or the Dashboard.
  - `paid`: If the QR Code is created with the `usage=single_payment` parameter, the QR Code closes automatically once the customer makes the payment, with the reason marked as `paid`.
  - `null`: The QR Code has not been closed yet.

```json: Sample Entity
{
  "id": "qr_HMsVL8HOpbMcjU",
  "entity": "qr_code",
  "created_at": 1623660301,
  "name": "Store_1",
  "usage": "single_use",
  "type": "upi_qr",
  "image_url": "https://rzp.io/i/BWcUVrLp",
  "image_content": "upi://pay?pa=qmart.razorpay@hdfcbank&pn=TestAccount&tr=RZPGT5viB4WHeoUuuqrv2&tn=TestAccountRaftarSoft&am=100&cu=INR&mc=5411",
  "payment_amount": 300,
  "status": "closed",
  "description": "For Store 1",
  "fixed_amount": true,
  "payments_amount_received": 0,
  "payments_count_received": 0,
  "notes": {
    "purpose": "Test UPI QR Code notes"
  },
  "customer_id": "cust_HKsR5se84c5LTO",
  "close_by": 1681615838,
  "closed_at": 1623660445,
  "close_reason": "on_demand"
}
```
