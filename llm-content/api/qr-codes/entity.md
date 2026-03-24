---
title: QR Codes Entity
description: Know about QR Codes entity parameters and their description.
---

# QR Codes Entity

## QR Codes Entity

The QR Codes entity has the following parameters:

### Response

```json: Entity
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
    "purpose":"Test UPI QR Code notes"
  },
  "customer_id":"cust_HKsR5se84c5LTO",
  "close_by":1681615838,
  "closed_at":1623660445,
  "close_reason":"on_demand"
}
```

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

  
> **WARN**
>
> 
>   **Watch Out!**
>   
>   When setting the `usage` to `single_use`, ensure that `fixed_amount` is `true` to generate the QR Code successfully.
>   

`payments_amount_received`
: `integer` The total amount received on the QR Code. Only captured payments are considered.

`payments_count_received`
: `integer` The total number of payments received on the QR Code. All captured payments are considered.

`notes`
: `object` Key-value pair that can be used to store additional information about the QR Code. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`customer_id`
: `string` The unique identifier of the customer the QR Code is linked with. Know more about the [Customers API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers.md).

`close_by`
: `integer` Unix timestamp at which the QR Code is scheduled to be automatically closed. The time must be at least 15 minutes after the current time. The date range can be set to `2147483647` in Unix timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

  
> **INFO**
>
> 
>   **Handy Tips**
> 
>    Any request beyond 2147483647 Unix timestamp will fail.
>   

  
> **WARN**
>
> 
>   **Watch Out!**
>   
>   This parameter is available for single use QR codes only. You should ideally send a `close_by` value (expiry time less than or equal to 2 hours from QR generation).
>   - The QR code has a minimum expiration time of 2 minutes and a maximum of 2 hours.
>   - If `close_by` is `NULL`, the system sets a 2-hour expiry (returned in the response).
>   - If `close_by` is greater than 2 hours, the system overrides it to 2 hours (returned in the response).
>   - Use the returned `close_by` value for QR expiry. QR codes expire after the `close_by` time; you must regenerate them.
>   - This parameter is only available for QR codes with `usage` set as `single_use`. You will not be able to use this parameter for `multiple_use` QR codes as it will generate an error.
>   
>   

`closed_at`
: `integer` Unix timestamp at which the QR Code is automatically closed.

`close_reason`
: `string` The reason for the closure of the QR Code. Possible values:
  - `on_demand`: When you close the QR Code using the APIs or the Dashboard.
  - `paid`: If the QR Code is created with the `usage=single_payment` parameter, the QR Code closes automatically once the customer makes the payment, with the reason marked as `paid`.
  - `null`: The QR Code has not been closed yet.
