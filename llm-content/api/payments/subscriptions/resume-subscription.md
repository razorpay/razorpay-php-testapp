---
title: Resume a Subscription
description: Resume a Subscription using the Razorpay API.
---

# Resume a Subscription

## Resume a Subscription

Use this endpoint to resume a Subscription.

### Request

@include subscriptions/subscriptions/subscriptions-resume

### Response

@include subscriptions/subscriptions/subscriptions-resume-res-code

### Parameters

@include subscriptions/subscriptions/subscriptions-path

### Parameters

@include subscriptions/subscriptions/subscriptions-resume-req

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
