---
title: Fetch All Plans
description: Fetch details of all plans created using the Razorpay API.
---

# Fetch All Plans

## Fetch All Plans

Use this endpoint to fetch details of all plans.

### Request

@include subscriptions/plans/plans-fetch-all

### Response

@include subscriptions/plans/plans-fetch-all-response-code

### Parameters

@include subscriptions/plans/plans-query

### Parameters

@include subscriptions/plans/plans-create-res

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
