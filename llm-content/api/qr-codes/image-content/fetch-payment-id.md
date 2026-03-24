---
title: Fetch QR Codes for a Payment ID
description: Fetch the details of a QR Codes using a Payment Id.
---

# Fetch QR Codes for a Payment ID

## Fetch QR Codes for a Payment ID

Use this endpoint to retrieve the details of a QR Code by using a Payment Id.

### Request

@include qr-codes-flipkart-intent-url/api/fetch/payment-id

### Response

@include qr-codes-flipkart-intent-url/api/fetch/payment-id-res

### Parameters

@include qr-codes-flipkart-intent-url/api/fetch/payment-id-query

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

\{Payment_id\} is not a valid id.
* code: 400
* description: A wrong Payment id is provided.
* solution: Check if you have used a valid Payment id.

\{Payment_id\} is/are not required and should not be sent
* code: 400
* description: The URL is wrong or is missing something.
* solution: Ensure that you use the correct and complete URL without any spelling mistakes.  

The requested URL was not found on the server.
* code: 400
* description: The URL is wrong or is missing something.
* solution: Ensure that you use the correct and complete URL without any spelling mistakes. 

"count": 0
* code: 400
* description: No QR Code is found for the search criteria.
* solution: There is no data for a particular Payment id. Try a different Payment id.
