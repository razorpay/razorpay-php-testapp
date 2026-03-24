---
title: Fetch a QR Code With ID | Image Content
description: Fetch the details of a QR Code with id.
---

# Fetch a QR Code With ID | Image Content

## Fetch a Qr Code With ID

Use this endpoint to fetch the details of a QR Code.

### Request

@include qr-codes-flipkart-intent-url/api/fetch/fetch-id

### Response

@include qr-codes-flipkart-intent-url/api/fetch/fetch-id-res

### Parameters

@include qr-codes/api/path-param

### Parameters

@include qr-codes-flipkart-intent-url/api/entity-res

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
 
The id provided does not exist.
* code: 400
* description: - The URL is wrong or is missing something.
- A GET API is executed by POST Method.

* solution: - Ensure you have the correct and complete URL.
- Use the right method, that is, GET.
 

\{Qr code id\} is not a valid id.
* code: 400
* description: A wrong QR Code id is provided.
* solution: Check if you have used a valid QR Code id.
