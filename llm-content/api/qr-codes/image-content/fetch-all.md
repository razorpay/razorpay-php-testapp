---
title: Fetch All QR codes | Image Content
description: Fetch the details of multiple QR Codes using this endpoint.
---

# Fetch All QR codes | Image Content

## Fetch All QR Codes

Use this endpoint to retrieve the details of multiple QR Codes.

### Request

@include qr-codes-flipkart-intent-url/api/fetch/all

### Response

@include qr-codes-flipkart-intent-url/api/fetch/all-res

### Parameters

@include qr-codes-flipkart-intent-url/api/fetch/all-query-param

### Parameters

@include qr-codes-flipkart-intent-url/api/entity-res

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
