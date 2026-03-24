---
title: Fetch Transfers for a Payment
description: Fetch Transfers for a payment using the Razorpay API.
---

# Fetch Transfers for a Payment

## Fetch Transfers for a Payment

Use this endpoint to retrieve the collection of all transfers created on a specific Payment id. Once the settlement against the transfer is processed, a webhook notification `settlement.processed` is sent which contains a `recipient_settlement_id`. Know more about [sample webhook payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/route/#settlement-processed.md).

### Request

@include route/api/fetch-transfer-payments

### Response

@include route/api/fetch-transfer-payments-res-code

### Parameters

@include route/api/fetch-transfer-payments-path

### Parameters

@include route/api/entity-parameters

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
payment_id is not a valid id
* code: 400
* description: This error occurs when you pass an invalid `payment_id` in the API endpoint.
* solution: Make sure to pass a vaild `payment_id`.
