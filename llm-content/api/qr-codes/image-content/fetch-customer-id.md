---
title: Fetch QR Codes for a Customer ID | Image Content
description: Fetch the details of a QR Codes using a Customer id.
---

# Fetch QR Codes for a Customer ID | Image Content

## Fetch QR Codes for a Customer ID

Use this endpoint to retrieve the details of a QR Code by using a Customer Id.

### Request

@include qr-codes-flipkart-intent-url/api/fetch/customer-id

### Response

@include qr-codes-flipkart-intent-url/api/fetch/customer-id-res

### Parameters

@include qr-codes-flipkart-intent-url/api/fetch/customer-id-query

### Parameters

@include qr-codes-flipkart-intent-url/api/entity-res

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
 
We are facing some trouble completing your request at the moment. Please try again shortly.
* code: 400
* description: A GET API is executed by POST Method.
* solution: Use the correct method, that is, GET.

\{Customer_id\} is not a valid id.
* code: 400
* description: A wrong Customer id is provided.
* solution: Check if you have used a valid Customer id.

\{parameter\} “cusomer_id” is/are not required and should not be sent
* code: 400
* description: Possible reasons: - The URL is wrong or is missing something.
- The Customer id has a spelling error in the URL.

* solution: Suggested solutions: - Ensure that you use the correct and complete URL.
- Check for spelling mistakes in the Customer id.

The id provided does not exist.
* code: 400
* description: The URL is wrong or is missing something.
* solution: Use the correct and complete URL.
