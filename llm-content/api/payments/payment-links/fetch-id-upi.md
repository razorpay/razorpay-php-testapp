---
title: Fetch UPI Payment Links With ID
description: Fetch UPI Payment Links with their Id using this endpoint.
---

# Fetch UPI Payment Links With ID

## Fetch UPI Payment Links With ID

Use this endpoint to retrieve the details of a UPI Payment Link using its id.

### Request

@include payment-links-v2/fetch-id-upi-req

### Response

@include payment-links-v2/fetch-id-upi-res

### Parameters

@include payment-links-v2/fetch-id-path

### Parameters

@include payment-links-v2/create-res

### Errors

invalid input [strippedId] = [xxxxxxxxxxxx]
* code: 400
* description: An invalid Payment Link id has been passed.
* solution: Ensure that a valid Payment Link id is sent in the API endpoint.
 
The id provided does not exist
* code: 400
* description: The Payment Link does not belong to the requestor business, or it doesn't exist.
* solution: Ensure that the Payment Link is valid and belongs to the requestor business.

The api \{key/secret\} provided is invalid
* code: 4xx
* description: There is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure that: - The API Keys are active and entered correctly.
- There are no white-spaces before or after the keys.
