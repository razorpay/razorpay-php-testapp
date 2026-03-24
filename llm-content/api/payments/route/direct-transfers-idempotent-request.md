---
title: Create a Direct Transfer (Idempotent Request)
description: Retry or send the same transfer request multiple times safely using the Razorpay API.
---

# Create a Direct Transfer (Idempotent Request)

## Create a Direct Transfer (Idempotent Request)

Idempotency allows you to safely retry or send the same request multiple times without fear of repeating the transfer request more than once.

- When you try to create a transfer, in some cases due to network downtimes, you may not get a response from our servers. As a consequence, you will not be aware of the transfer id or its state. In such cases, you can safely retry the transaction using the same idempotency key without risk of double-payout or duplication.

- To make a transfer request idempotent, add the header `X-Transfer-Idempotency` to the request and pass an idempotency key against it. The idempotency key (4-36 characters) can contain alphabets, numbers, hyphens, underscores and space only. For example, `fbdabb70-9548-4cfe-8da1-c9bbf39e96b0`.

> **WARN**
>
> 
> **Watch Out!**
> 
> Currently, idempotency is supported only on the Direct Transfers API.
> 

> **INFO**
>
> 
> **Handy Tips**
> 
> - When retrying a request, the request body must be the same as the first request for idempotency to work. A different payload will be rejected as a `BAD_REQUEST`.
> - The idempotency key in retries must be the same as the original request.
> - Use unique idempotency keys for each unique request.
> - If we receive another request while the first one is in process, we will send a 409 error code. You can retry if you get this error code.
> 

### Request

@include route/api/direct_transfer_idempotency

### Response

@include route/api/direct_transfer_idempotency-res-code

### Parameters

@include route/api/direct_transfer-request

### Parameters

@include route/api/entity-parameters

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
