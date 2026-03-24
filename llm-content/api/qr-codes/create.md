---
title: Create a QR Code
description: Create QR Codes with this endpoint and share with your customers.
---

# Create a QR Code

## Create a QR Code

Use this endpoint to create a QR Code.

- You can share the short URL with customers to accept payments.
- You can print and download it.
- You can create QR Codes for single or multiple use and for specific or all customers.

### Request

@include qr-codes/api/create

### Response

@include qr-codes/api/create-res

### Parameters

@include qr-codes/api/create-req-param

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
>   This is an on-demand feature.   to get this feature activated on your account.
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
: `integer` Unix timestamp at which the QR Code is scheduled to be automatically closed. The time must be at least 2 minutes after the current time.

  
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
 
The selected \{field name\} is invalid.
* code: 400
* description: Data sent for a field is invalid. For example, when the data sent for `type` is `abc`, instead of the acceptable value.
* solution: Ensure that the data sent for a field is valid. Re-check the acceptable values for that request parameter.

The \{field name\} is required.
* code: 400
* description: A mandatory field is missing.
* solution: Ensure all mandatory fields are present.

The payment amount must be at least 1.
* code: 400
* description: The amount specified is less than the minimum amount.
* solution: Enter an amount equal to or greater than the minimum amount, that is 1.

\{Customer_id\} is not a valid id.
* code: 400
* description: Data entered for the Customer id field is invalid.
* solution: Ensure that the Customer id is correct and valid.

type, usage, fixed_amount, payment_amount, description, close_by is/are not required and should not be sent
* code: 400
* description: A POST API is executed by GET Method.
* solution: Use the correct method, that is, POST.

\{close_by\} must be between 946684800 and 4765046400
* code: 400
* description: A wrong close by date is passed.
* solution: Ensure you pass the correct close by date(Unix timestamp). It must be between 946684800 and 4765046400.

\{any extra field\} ajshdas is/are not required and should not be sent
* code: 400
* description: An additional or unrequired parameter is passed.
* solution: Ensure that you only pass the required parameters in the request body.
