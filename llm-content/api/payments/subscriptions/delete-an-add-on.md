---
title: Delete an Add-on
description: Delete an Add-on by its unique ID.
---

# Delete an Add-on

## Delete an Add-on

Use this endpoint to delete an add-on.

**Handy Tips**

You cannot delete an add-on associated with an invoice.

### Request

@include subscriptions/add-ons/add-ons-delete

### Response

@include subscriptions/add-ons/add-ons-delete-res-code

### Parameters

@include subscriptions/add-ons/add-ons-path

### Parameters

@include subscriptions/add-ons/add-ons-entities

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
