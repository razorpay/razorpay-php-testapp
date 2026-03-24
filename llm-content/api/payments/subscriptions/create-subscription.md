---
title: Create a Subscription
description: Create a Subscription using the Razorpay API.
---

# Create a Subscription

## Create a Subscription

Use this endpoint to create a Subscription.

### Request

@include subscriptions/subscriptions/subscriptions-create

### Response

@include subscriptions/subscriptions/subscriptions-create-response-code

### Parameters

@include subscriptions/subscriptions/subscriptions-create-req

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

The requested URL was not found on the server.
* code: 400
* description: This error occurs when the Subscriptions feature is not enabled.
* solution: Ensure that the [Subscriptions feature](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/#flash-checkout.md) is enabled both in the test and live modes before creating a Subscription.
 
The id provided does not exist
* code: 400
* description: This error occurs when passing  an incorrect `plan_id`.
* solution: Ensure that you are passing the correct `plan_id`. The plan should be active and created using the same API key and Secret.

Offer Not Found
* code: 400
* description: This error occurs when you are linking an invalid/expired offer to a Subscription.
* solution: Ensure that the Subscription offer created on the Dashboard is valid and has not expired.

Offer not applicable for this Subscription
* code: 400
* description: This error occurs when you are linking/passing an `offer_id` to a Subscription on which the offer doesn't apply.
* solution: Ensure that the plan amount is greater than the minimum amount set for the offer.
