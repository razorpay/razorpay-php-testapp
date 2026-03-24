---
title: Fetch a Plan With ID
description: Fetch a plan using the unique identifier
---

# Fetch a Plan With ID

## Fetch a Plan With ID

Use this endpoint to retrieve the details of a plan using its unique identifier.

### Request

@include subscriptions/plans/plans-fetch

### Response

@include subscriptions/plans/plans-fetch-response-code

### Parameters

@include subscriptions/plans/plans-path

### Parameters

@include subscriptions/plans/plans-create-res

### Errors

an_id%7D is not a valid id
* code: 400
* description: This error occurs when you are not passing the `plan_id` in the API endpoint to fetch a plan based on the id.
* solution: Ensure that you are passing the `plan_id` in the API endpoint. 
 For example, `https://api.razorpay.com/v1/plans/plan_K8lVuxetc2OGR8`.
