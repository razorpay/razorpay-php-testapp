---
title: Fetch Reversals for a Transfer
description: Fetch Reversals for a Transfer using the Razorpay API.
---

# Fetch Reversals for a Transfer

## Fetch Reversals for a Transfer

Use this endpoint to retrieve a list of reversals made for a transfer.

### Request

@include route/api/fetch-reversal-transfer

### Response

@include route/api/fetch-reversal-transfer-res-code

### Parameters

`id` _mandatory_
: `string` Unique identifier of the transfer.

### Parameters

@include route/api/fetch-reversal-res

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
