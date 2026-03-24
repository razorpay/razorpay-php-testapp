---
title: Fetch All Invoices of a Subscription
description: Fetch all invoices of a Subscription using the Razorpay API.
---

# Fetch All Invoices of a Subscription

## Fetch All Invoices of a Subscription

Use this endpoint to retrieve all invoices of a Subscription. The `count` in the response indicates the number of invoices generated for a Subscription.

### Request

@include subscriptions/subscriptions/subscriptions-invoice

### Response

@include subscriptions/subscriptions/subscriptions-invoice-res-code

### Parameters

@include subscriptions/subscriptions/subscriptions-invoice-query

### Parameters

@include subscriptions/subscriptions/subscriptions-invoice-res

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
