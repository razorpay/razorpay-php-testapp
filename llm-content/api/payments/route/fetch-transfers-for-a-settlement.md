---
title: Fetch Transfers for a Settlement
description: Fetch Transfers for a Settlement using the Razorpay API.
---

# Fetch Transfers for a Settlement

## Fetch Transfers for a Settlement

Use this endpoint to retrieve the collection of all transfers made for a particular `recipient_settlement_id`.

### Request

@include route/api/fetch-transfer-settlement

### Response

@include route/api/fetch-transfer-settlement-res-code

### Parameters

@include route/api/fetch-transfer-settlement-query

### Parameters

@include route/api/entity-parameters

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
