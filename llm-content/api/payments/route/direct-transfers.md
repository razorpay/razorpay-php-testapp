---
title: Create a Direct Transfer
description: Create a Direct Transfer using the Razorpay API.
---

# Create a Direct Transfer

## Create a Direct Transfer

Use this endpoint to create a direct transfer of funds from your account to a Linked Account. Apart from transferring payments received from customers, you can also transfer funds to your Linked Accounts directly from your account balance using the **Direct Transfers** API.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

### Request

@include route/api/direct_transfer

### Response

@include route/api/direct_transfer-res-code

### Parameters

@include route/api/direct_transfer-request

### Parameters

@include route/api/entity-parameters

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
The transfers.0.amount must be at least 100.
* code: 400
* description: This error occurs when the amount is less than the minimum amount. The transaction amount expressed in the currency subunit, such as paise (in INR) should always be greater than or equal to 100.
* solution: Make sure the amount is equal to or greater than the minimum amount of ₹100.

The input field is required
* code: 400
* description: This error occurs when a mandatory field is empty.
* solution: Make sure to fill in all the mandatory fields.
