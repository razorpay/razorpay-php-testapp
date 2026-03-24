---
title: Refund Payments
description: Refund payments made on a QR Code with this endpoint.
---

# Refund Payments

## Refund Payments

Use this endpoint to refund payments made on a QR Code.

### Request

@include qr-codes-flipkart-intent-url/api/refunds

### Response

@include qr-codes-flipkart-intent-url/api/refunds-res

### Parameters

@include qr-codes/api/refunds-path-param

### Parameters

@include qr-codes-flipkart-intent-url/api/refunds-req-param

### Parameters

@include qr-codes-flipkart-intent-url/api/refunds-res-param

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
 
\{Payment_id\} is not a valid id.
* code: 400
* description: A wrong Payment id is provided.
* solution: Check if you have used a valid Payment id.

The requested URL was not found on the server.
* code: 400
* description: - The URL is wrong or is missing something.
- A POST API is executed by GET Method.

* solution: - Ensure that the URL is correct and complete.
- Use the correct method, that is, POST.
