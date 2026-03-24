---
title: Fetch Details of a Pending Update
description: Fetch details of a pending update using the Razorpay API.
---

# Fetch Details of a Pending Update

## Fetch Details of a Pending Update

Use this endpoint to retrieve details of a pending update. This happens when a Subscription is updated using the `end of cycle` option for the `schedule_change_at` parameter.

**Example**

A Subscription is to be charged on the 1st of every month. It was charged on January 01, 2021. On January 15, 2021, it was updated using the `end of cycle` option for the `schedule_change_at` parameter. In this case, the update goes live after the Subscription is charged on February 01, 2021. Such updates are said to be scheduled updates and details of such updates can be fetched using this API.

### Request

@include subscriptions/subscriptions/subscriptions-fetch-pending-update

### Response

@include subscriptions/subscriptions/subscriptions-fetch-pending-update-res-code

### Parameters

@include subscriptions/subscriptions/subscriptions-path

### Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
