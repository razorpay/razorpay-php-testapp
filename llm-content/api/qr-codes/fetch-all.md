---
title: Fetch All QR Codes
description: Fetch the details of multiple QR Codes using this endpoint.
---

# Fetch All QR Codes

## Fetch All QR Codes

Use this endpoint to retrieve the details of multiple QR Codes.

### Request

@include qr-codes/api/fetch/all

### Response

@include qr-codes/api/fetch/all-res

### Parameters

@include qr-codes/api/fetch/all-query

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
: `json object` Key-value pair that can be used to store additional information about the QR Code. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`customer_id`
: `string` The unique identifier of the customer the QR Code is linked with. Know more about the [Customers API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers.md).

`close_by`
: `integer` Unix timestamp at which the QR Code is scheduled to be automatically closed. The time must be at least 15 minutes after the current time. The date range can be set to `2147483647` in Unix timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

  
> **INFO**
>
> 
>   **Handy Tips**
> 
>   - Any request beyond 2147483647 Unix timestamp will fail.
>   

  
> **WARN**
>
> 
>   **Watch Out!**
>   
>   - This parameter is only available for QR codes with `usage` set as `single_use`. You will not be able to use this parameter for `multiple_use` QR codes as it will generate an error.
>   - For `single_use` QR codes, the `close_by` date can be set for a maximum of 45 days. If no `close_by` date is specified, the QR code will automatically become inactive after 45 days. Conversely, `multiple_use` QR codes do not have an expiration date.
>   

`closed_at`
: `integer` Unix timestamp at which the QR Code is automatically closed.

`close_reason`
: `string` The reason for the closure of the QR Code. Possible values:
  - `on_demand`: When you close the QR Code using the APIs or the Dashboard.
  - `paid`: If the QR Code is created with the `usage=single_payment` parameter, the QR Code closes automatically once the customer makes the payment, with the reason marked as `paid`.
  - `null`: The QR Code has not been closed yet.

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
 
The id provided does not exist.
* code: 400
* description: Possible reasons: - The URL is wrong or is missing something.
- A GET API is executed by POST Method.

* solution: Suggested solutions: - Ensure you have the correct and complete URL.
- Use the right method, that is, GET.
 

We are facing some trouble completing your request at the moment. Please try again shortly.
* code: 400
* description: A GET API is executed by POST Method.
* solution: Use the correct method, that is, GET.

The requested URL was not found on the server.
* code: 400
* description: The URL is wrong or missing something.
* solution: Use the correct and complete URL.
