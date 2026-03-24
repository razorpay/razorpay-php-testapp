---
title: Close a QR Code | Image Content
description: Close QR Codes with this endpoint.
---

# Close a QR Code | Image Content

## Close a QR Code

Use this endpoint to close a QR Code.

### Request

@include qr-codes-flipkart-intent-url/api/close

### Response

@include qr-codes-flipkart-intent-url/api/close-res

### Parameters

@include qr-codes/api/path-param

### Parameters

@include qr-codes-flipkart-intent-url/api/entity-res

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
 
The id provided does not exist
* code: 400
* description: The QR Code id was created on a different key and secret.
* solution: Ensure that you use the same keys while creating and closing a QR Code.

We are facing some trouble completing your request at the moment. Please try again shortly.
* code: 400
* description: There is an error in the QR Code id. It may be incorrect or invalid.
* solution: Check if you have used a valid QR Code id.

The requested URL was not found on the server.
* code: 400
* description: Possible reasons: - A POST API is executed by GET Method.
- The QR Code id is not passed.

* solution: Use the correct method (POST) and QR Code id while running the API.
