---
title: Create a Subscription Link
description: Create a Subscription link using the Razorpay API.
---

# Create a Subscription Link

## Create a Subscription Link

Use this endpoint to create a Subscription link.

### Request

@include subscriptions/subscriptions/subscriptions-link-create

### Response

@include subscriptions/subscriptions/subscriptions-link-create-response-code

### Parameters

@include subscriptions/subscriptions/subscriptions-create-req

@include subscriptions/subscriptions/subscriptions-link-create-req

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

Link expire by cannot be lesser than the current time.
* code: 400
* description: This error occurs when the time mentioned in the `expire_by` parameter has already passed. For example, if today's date is December 12, 2022, but the expiry date is mentioned as December 10, 2022.
* solution: Ensure that the time passed in the `expiry_by` parameter occurs after the current time at the time of creating the Subscription link.
