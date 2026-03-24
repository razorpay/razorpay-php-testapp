---
title: Delete an Offer Linked to a Subscription
description: Delete an Offer linked to a Subscription using the Razorpay API.
---

# Delete an Offer Linked to a Subscription

## Delete an Offer Linked to a Subscription

Use this endpoint to delete an Offer linked to a Subscription.

### Request

@include subscriptions/subscriptions/subscriptions-delete-offer

### Response

@include subscriptions/subscriptions/subscriptions-delete-offer-res-code

### Parameters

@include subscriptions/subscriptions/subscriptions-delete-offer-path

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
