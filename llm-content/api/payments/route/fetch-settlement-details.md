---
title: Fetch Settlement Details
description: Fetch settlement details using the Razorpay API.
---

# Fetch Settlement Details

## Fetch Settlement Details

Use this endpoint to fetch details of settlements made to Linked Accounts. You should append `?expand[]=recipient_settlement` as the query parameter to the fetch transfer request. This would return a `settlement` entity and the `transfer` entity.

### Request

@include route/api/fetch-settlement-details

### Response

@include route/api/fetch-settlement-details-res-code

### Parameters

@include route/api/fetch-settlement-details-query

### Parameters

@include route/api/fetch-settlement-res

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys. If you get null as an API response, an invalid `recipient_settlement_id` was passed. Ensure to pass a valid `recipient_settlement_id`, and it belongs to the Linked Account.
