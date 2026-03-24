---
title: Create a Plan
description: Create a plan with basic details such as amount and currency
---

# Create a Plan

## Create a Plan

Use this endpoint to create a plan.

### Request

@include subscriptions/plans/plans-create-request-code

### Response

@include subscriptions/plans/plans-create-response-code

### Parameters

@include subscriptions/plans/plans-create-req

### Parameters

@include subscriptions/plans/plans-create-res

### Errors

Authentication failed
* code: 401
* description: This error occurs when you use incorrect or invalid API Keys.
* solution: Use the right set of API keys.

`offer_id` is/are not required and should not be sent
* code: 400
* description: This error occurs when you are passing `offer_id` parameter in the request body.
* solution: `offer_id` should not be passed in the request body.

 
The amount must be at least INR 1.00.
* code: 400
* description: The amount specified is less than the minimum amount. Currency subunits, such as paise (in the case of INR), should always be greater than 100.
* solution: Enter an amount equal to or greater than the minimum amount, that is 100.
