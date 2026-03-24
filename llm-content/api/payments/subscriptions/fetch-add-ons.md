---
title: Fetch All Add-ons
description: Fetch all Add-ons using the Razorpay API.
---

# Fetch All Add-ons

## Fetch All Add-ons

Use this endpoint to retrieve all created add-ons.

### Request

@include subscriptions/add-ons/add-ons-fetch-all

### Response

@include subscriptions/add-ons/add-ons-fetch-all-res-code

### Parameters

@include subscriptions/add-ons/add-ons-query

### Parameters

@include subscriptions/add-ons/add-ons-create-res

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
