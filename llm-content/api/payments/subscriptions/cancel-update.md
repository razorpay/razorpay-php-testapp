---
title: Cancel an Update
description: Cancel an update using the Razorpay API.
---

# Cancel an Update

## Cancel an Update

Use this endpoint to cancel a pending update. This happens when a Subscription is updated using the `end of cycle` option for the `schedule_change_at` parameter.

**Example**

A Subscription is to be charged on the 1st of every month. It was charged on January 01, 2021. On January 15, 2021, it was updated using the `end of cycle` option for the `schedule_change_at` parameter. In this case, the update goes live after the Subscription is charged on February 01, 2021. Such updates are said to be scheduled updates and can be cancelled using this API.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> You can only cancel a pending update for a subscription. You cannot cancel an update once it is live.
> 

### Request

@include subscriptions/subscriptions/subscriptions-cancel-update

### Response

@include subscriptions/subscriptions/subscriptions-cancel-update-res-code

### Parameters

@include subscriptions/subscriptions/subscriptions-path

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
