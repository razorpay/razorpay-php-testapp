---
title: Create an Add-on
description: Create an Add-on using the Razorpay API.
---

# Create an Add-on

## Create an Add-on

Use this endpoint to create an add-on.

### Request

@include subscriptions/add-ons/add-ons-create

### Response

@include subscriptions/add-ons/add-ons-create-res-code

### Parameters

@include subscriptions/add-ons/add-ons-create-path

### Parameters

@include subscriptions/add-ons/add-ons-create-req

### Parameters

@include subscriptions/add-ons/add-ons-create-res

### Errors

Add-ons can't be added for Subscriptions when payment mode is upi
* code: 400
* description: This error occurs when you are trying to create add-ons for a Subscription authorised via UPI.
* solution: You cannot create add-ons for a Subscription authorized via UPI. Currently, add-ons are only available for Subscription authorised using cards.
