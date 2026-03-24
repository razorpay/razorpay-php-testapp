---
title: Update a QR Code
description: Update QR Codes with this endpoint and share with your customers.
---

# Update a QR Code

## Update a QR Code

Use this endpoint to update a QR Code.

### Response

```json: Success
{
  "id":"qr_HMsVL8HOpbMcjU",
  "entity":"qr_code",
  "created_at":1623660301,
  "name":"Store Front Display",
  "usage":"single_use",
  "type":"upi_qr",
  "image_url":"https://rzp.io/i/BWcUVrLp",
  "payment_amount":300,
  "status":"closed",
  "description":"For Store 1",
  "fixed_amount":true,
  "payments_amount_received":0,
  "payments_count_received":0,
  "notes":{
    "key1": "value1",
    "key2": "value2"
  },
  "customer_id":"cust_HKsR5se84c5LTO",
  "close_by":1681615838,
}
```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The api key provided is invalid",
        "source": "NA",
        "step": "NA",
        "reason": "NA",
        "metadata": {}
    }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the QR Code. For example, `qr_HMsVL8HOpbMcjU`.

### Parameters

`notes` _mandatory_
: `json object` Contains user-defined fields and is stored for reference purposes. Know more about [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes).

### Parameters

`id`
: `string` The unique identifier of the QR Code. For example, `qr_HMsVL8HOpbMcjU`.

`entity`
: `string` Indicates the type of entity. Here, it is `qr_code`.

`created_at`
: `integer` Unix timestamp at which the QR Code is created.

`name`
: `string` Label entered to identify the QR Code. For example, `Store Front Display`.

`usage`
: `string` Indicates if the QR Code should be allowed to accept single payment or multiple payments. Possible values:
  - `single_use`: QR Code will accept only one payment and then close automatically.
  - `multiple_use` (default): QR Code will accept multiple payments.

`type`
: `string` The type of the QR Code. Possible value is `upi_qr`, which creates a QR Code that accepts only UPI payments. 

  
> **INFO**
>
> 
>   **Feature Request**
> 
>   This is an on-demand feature.  to get this feature activated on your account.
>   

`image_url`
: `string` The URL of the QR Code. For example, `http://rzp.io/l6MS`. Click the link to download the code.

`payment_amount` _if fixed_amount=true_
: `integer` The amount allowed for a transaction. If this is specified, then any transaction of an amount less than or more than this value is not allowed. For example, if this amount is set as `500000`, the customer cannot pay an amount less than or more than ₹5000.

`status`
: `string` Indicates the status of the QR Code. Possible values:
  - `active`: Indicates that the QR Code has been created and is ready to accept payments.
  - `closed`: Indicates that the QR Code has been closed.

`description`
: `string` A brief description about the QR Code.

`fixed_amount`
: `boolean` Indicates if the QR Code should accept payments of specific amounts or any amount. Possible values:
  - `true`: QR Code accepts only a specific amount.
  - `false` (default): QR code accepts any amount.

`payments_amount_received`
: `integer` The total amount received on the QR Code. Only captured payments are considered.

`payments_count_received`
: `integer` The total number of payments received on the QR Code. All captured payments are considered.

`notes`
: `object` Key-value pair that can be used to store additional information about the QR Code. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`customer_id`
: `string` The unique identifier of the customer the QR Code is linked with. Know more about the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

`close_by`
: `integer` Unix timestamp at which the QR Code is scheduled to be automatically closed. The time must be at least 15 minutes after the current time. The date range can be set to `2147483647` in Unix timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
