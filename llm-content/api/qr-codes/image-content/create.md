---
title: Create a QR Code | Image Content
description: Create QR Codes with this endpoint and share with your customers.
---

# Create a QR Code | Image Content

## Create a QR Code

Use this endpoint to create a QR Code.

- You can share the short URL with customers to accept payments.
- You can print and download it.
- You can create QR Codes for single or multiple use and for specific or all customers.

### Request

@include qr-codes-flipkart-intent-url/api/create

### Response

@include qr-codes-flipkart-intent-url/api/create-res

### Parameters

@include qr-codes-flipkart-intent-url/api/create-req

### Parameters

@include qr-codes-flipkart-intent-url/api/entity-res

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
* description: A POST API is executed by GET Method. | Use the correct method, that is, POST.
* solution: Use the correct method, that is, POST.

\{close_by\} must be between 946684800 and 4765046400
* code: 400
* description: A wrong close by date is passed.
* solution: Ensure you pass the correct close by date(Unix timestamp). It must be between 946684800 and 4765046400.

\{any extra field\} ajshdas is/are not required and should not be sent
* code: 400
* description: An additional or unrequired parameter is passed.
* solution: Ensure that you only pass the required parameters in the request body.
