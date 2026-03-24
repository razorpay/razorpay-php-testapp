---
title: Fetch All UPI Payment Links
description: Fetch all UPI Payment Links using this endpoint.
---

# Fetch All UPI Payment Links

## Fetch All UPI Payment Links

Use this endpoint to retrieve the details of all the UPI Payment Links.

### Request

@include payment-links-v2/fetch-upi-req

### Response

@include payment-links-v2/fetch-upi-res

### Parameters

@include payment-links-v2/fetch-query

### Parameters

@include payment-links-v2/create-res

### Errors

The api \{key/secret\} provided is invalid
* code: 4xx
* description: There is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure that: - The API Keys are active and entered correctly.
- There are no white-spaces before or after the keys.
