---
title: Modify Settlement Hold for Transfers
description: Modify Settlement Hold for Transfers using the Razorpay API.
---

# Modify Settlement Hold for Transfers

## Modify Settlement Hold for Transfers

Use this endpoint to modify the settlement configuration for a particular `transfer_id`. On a successful request, the API responds with the modified transfer entity.

### Request

@include route/api/modify-settlement-hold-code

### Response

@include route/api/modify-settlement-hold-res-code

### Parameters

@include route/api/modify-settlement-hold-path

### Parameters

@include route/api/modify-settlement-hold-request

### Parameters

@include route/api/entity-parameters

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
The amount must be at least INR 1.00
* code: 400
* description: This error occurs when the amount is less than the minimum amount. The transaction amount expressed in the currency subunit, such as paise (in INR) should always be greater than or equal to ₹1.
* solution: Make sure the amount is equal to or greater than the minimum amount of ₹1.

transfer_id is not a valid id
* code: 400
* description: This error occurs when you pass an invalid `transfer_id` in the API endpoint.
* solution: Make sure to pass a vaild `transfer_id`.
