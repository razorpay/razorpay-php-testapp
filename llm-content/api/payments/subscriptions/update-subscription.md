---
title: Update a Subscription
description: Update a Subscription using the Razorpay API.
---

# Update a Subscription

## Update a Subscription

Use this endpoint to update a Subscription.

### Request

@include subscriptions/subscriptions/subscriptions-update

### Response

@include subscriptions/subscriptions/subscriptions-update-response-code

### Parameters

@include subscriptions/subscriptions/subscriptions-path

### Parameters

@include subscriptions/subscriptions/subscriptions-update-request

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

Subscriptions cannot be updated when payment mode is UPI
* code: 400
* description: This error occurs when you are trying to update a Subscription authorised via UPI.
* solution: You cannot update a Subscription authorised via UPI mode or Emandate.

 
Can't update Subscription when Subscription is not in Authenticated or Active state
* code: 400
* description: This error occurs when you are trying to update a Subscription in the created state.
* solution: Ensure that the Subscription status is either in the authenticated or active state.
