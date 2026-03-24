---
title: Fetch Payments Made Using Bank Transfer
description: Fetch Payments made using Bank Transfer payment method.
---

# Fetch Payments Made Using Bank Transfer

## Fetch Payments Made By Bank Transfer

Use this endpoint to retrieve details of payments made using the bank transfer method.

If Razorpay does not receive the bank account information of the customer from the remitting bank, the `payer_bank_account` parameter will be set to null.

### Request

@include smart-collect/api/fetch/transfer-method-bank

### Response

@include smart-collect/api/fetch/transfer-method-bank-res-code

### Parameters

@include smart-collect/api/fetch/transfer-method-bank-path

### Parameters

@include smart-collect/api/fetch/transfer-method-bank-res

### Errors

The API `` provided is invalid.
* code: 4xx
* description: Occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the dashboard.
* solution: Make sure that the API keys are active and entered correctly. Also, make sure there are no whitespaces before or after the keys.
