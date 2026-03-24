---
title: Fetch an Add-on With ID
description: Fetch an Add-on by its unique ID.
---

# Fetch an Add-on With ID

## Fetch an Add-on With ID

Use this endpoint to retrieve an Add-on by its unique identifier.

### Request

@include subscriptions/add-ons/add-ons-fetch

### Response

@include subscriptions/add-ons/add-ons-fetch-res-code

### Parameters

@include subscriptions/add-ons/add-ons-path

### Parameters

@include subscriptions/add-ons/add-ons-create-res

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
