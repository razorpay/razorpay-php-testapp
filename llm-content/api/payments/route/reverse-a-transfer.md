---
title: Reverse a Transfer
description: Reverse a Transfer using the Razorpay API.
---

# Reverse a Transfer

## Reverse a Transfer

Use this endpoint to create reversals on a particular `transfer_id`.

- The amount specified is debited from the Linked Account balance and credited to your balance.

- Partial reversals are also supported, and you can create multiple reversals on a `transfer_id`. If you do not provide the `amount` parameter in the request, then the entire amount of the transfer is reversed.

> **INFO**
>
> 
> **Handy Tips**
> If a reversal ID is generated, the reversal was successful.
> 

### Request

@include route/api/transfer-reversal-code

### Response

@include route/api/transfer-reversal-res-code

### Parameters

@include route/api/transfer-reversal-path

### Parameters

@include route/api/transfer-reversal-request

### Parameters

@include route/api/transfer-reversal-res

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

The linked account does not have sufficient balance to process reversal.
* code: 400
* description: Insufficient balance in the linked account to complete the reversal.
* solution: Ensure that you have sufficient balance in your linked account to complete the reversal.
