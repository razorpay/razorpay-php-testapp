---
title: Fetch a Subscription With ID
description: Fetch a Subscription using the unique identifier.
---

# Fetch a Subscription With ID

## Fetch a Subscription With ID

Use this endpoint to fetch a Subscription by the unique identifier.

### Request

@include subscriptions/subscriptions/subscriptions-fetch

### Response

@include subscriptions/subscriptions/subscriptions-fetch-response-code

### Parameters

@include subscriptions/subscriptions/subscriptions-path

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

ub_id%7D is not a valid id
* code: 400
* description: This error occurs when you are not passing the right `subscription_id` in the API endpoint to fetch a plan based on the id.
* solution: Ensure that you are passing the right `subscription_id` in the API endpoint. 
 For example, `https://api.razorpay.com/v1/subscriptions/sub_KA8rfWnXwyEw0j`.
