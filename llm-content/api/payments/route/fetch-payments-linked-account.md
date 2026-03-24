---
title: Fetch Payments of a Linked Account
description: Fetch Payments of a Linked Account using the Razorpay API.
---

# Fetch Payments of a Linked Account

## Fetch Payments of a Linked Account

Use this endpoint to fetch a list of all the payments received by a Linked Account. For this, you should send the Linked Account id in the `X-Razorpay-Account` API request header, as shown in the Curl example.

### Request

@include route/api/fetch-payments

### Response

@include route/api/fetch-payments-res-code

### Parameters

@include route/api/fetch-payments-res

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
The id provided does not exist
* code: 400
* description: This error occurs when the Linked Account is invalid or does not belong to the requested merchant.
* solution: Ensure the Linked Account is valid and belongs to the requested merchant.
