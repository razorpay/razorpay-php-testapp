---
title: Fetch All Subscriptions
description: Fetch all Subscriptions using the Razorpay API.
---

# Fetch All Subscriptions

## Fetch All Subscriptions

Use this endpoint to fetch all the created Subscriptions.

### Request

@include subscriptions/subscriptions/subscriptions-fetch-all

### Response

@include subscriptions/subscriptions/subscriptions-fetch-all-response-code

### Parameters

@include subscriptions/subscriptions/subscriptions-query

### Parameters

@include subscriptions/subscriptions/subscriptions-entities

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
