---
title: Link an Offer to a Subscription
description: Link an Offer to a Subscription using the Razorpay API.
---

# Link an Offer to a Subscription

## Link an Offer to a Subscription

Use this endpoint to link an existing [Offer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/offers.md) by creating a new Subscription link. Pass the `offer_id: ` parameter in the request when creating a Subscription.

### Request

@include subscriptions/subscriptions/subscriptions-link-create

### Response

@include subscriptions/subscriptions/subscriptions-link-create-response-code

### Parameters

@include subscriptions/subscriptions/subscriptions-create-req

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

Link expire by cannot be lesser than the current time.
* code: 400
* description: The link expiry time is less than the current time.
* solution: Ensure the link expiration time is greater than your current time.
