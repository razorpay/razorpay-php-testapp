---
title: Fetch Transfer for an Order
description: Fetch Transfer for an order using the Razorpay API.
---

# Fetch Transfer for an Order

## Fetch Transfer for an Order

Use this endpoint to retrieve the collection of all transfers created on a specific order id.

### Request

@include route/api/fetch-transfer-orders

### Response

@include route/api/fetch-transfer-orders-res-code

### Parameters

@include route/api/fetch-transfer-orders-path

### Parameters

@include route/api/fetch-transfer-orders-query

### Parameters

@include route/api/entity-parameters

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
order_id is not a valid id
* code: 400
* description: This error occurs when you pass an invalid `order_id` in the API endpoint.
* solution: Make sure to pass a vaild `order_id`.
