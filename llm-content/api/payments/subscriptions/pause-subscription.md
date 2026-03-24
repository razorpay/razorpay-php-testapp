---
title: Pause a Subscription
description: Pause a Subscription using the Razorpay API.
---

# Pause a Subscription

## Pause a Subscription

Use this endpoint to pause a Subscription.

> **WARN**
>
> 
> **Watch Out!**
> 
> - You can only pause a Subscriptions in the `active` state.
> - If you pause a Subscription in the `authenticated` state, it goes to the `cancelled` state.
> 

### Request

@include subscriptions/subscriptions/subscriptions-pause

### Response

@include subscriptions/subscriptions/subscriptions-pause-res-code

### Parameters

@include subscriptions/subscriptions/subscriptions-path

### Parameters

@include subscriptions/subscriptions/subscriptions-pause-req

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
