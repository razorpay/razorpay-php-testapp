---
title: Fetch a Transfer With ID
description: Fetch a Transfer using the Razorpay API.
---

# Fetch a Transfer With ID

## Fetch a Transfer With ID

Use this endpoint to fetch details of a transfer by its unique identifier.

### Request

@include route/api/fetch-transfer-by-id

### Response

@include route/api/fetch-transfer-by-id-res-code

### Parameters

@include route/api/fetch-transfer-by-id-path

### Parameters

@include route/api/entity-parameters

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
transfer_id is not a valid id
* code: 400
* description: This error occurs when you pass an invalid `transfer_id` in the API endpoint.
* solution: Make sure to pass a vaild `transfer_id`.
