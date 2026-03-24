---
title: Cancel a Subscription
description: Cancel a Subscription using the Razorpay API.
---

# Cancel a Subscription

## Cancel a Subscription

Use this endpoint to cancel a Subscription. You can either cancel the Subscription immediately or at the end of the current billing cycle. Once cancelled, you cannot renew or reactivate it.

- When you cancel a Subscription, the status changes to `cancelled`.
- If you choose to cancel a Subscription at the end of a billing cycle, its status changes to `cancelled` only at the end of the current billing cycle.

### Request

@include subscriptions/subscriptions/subscriptions-cancel

### Response

@include subscriptions/subscriptions/subscriptions-cancel-response-code

### Parameters

@include subscriptions/subscriptions/subscriptions-path

### Parameters

@include subscriptions/subscriptions/subscriptions-cancel-request

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

Subscription is not cancellable in expired status.
* code: 400
* description: This error occurs when you are trying to cancel a Subscription which is in the expired state.
* solution: You cannot cancel a Subscription in the expired state. Ensure that the Subscription is in the active or authenticated state to cancel.
