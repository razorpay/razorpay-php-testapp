---
title: Subscriptions
description: Create and fetch Plans and Subscriptions. Create and delete Add-ons using Razorpay Subscriptions APIs.
---

# Subscriptions

You can create, fetch, query or cancel plans, subscriptions and addons using the Subscriptions API. These operations can also be performed on the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions.md).

## Postman Collection

We have a Postman collection to make the integration quicker and easier. Click the **Download Postman Collection** button below to get started.

[Download Postman Collection](https://app.getpostman.com/run-collection/2d531340e7ec07fad630)

### Instructions to Use Postman Collection

- All Razorpay APIs are authenticated using Basic Authentication.
  - [Generate API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) from the Dashboard.
  - Add your API Keys in Postman. Select the required API → Auth → Type = Basic Auth → Username = [Your_Key_ID]; Password = [Your_Key_secret]
  ![](/docs/assets/images/api-postman_basic_auth.gif)
- Some APIs in the collection require data specific to your account such as `plan_id`, `sub_id` and `ao_id` either in the request body or as a query parameter.
  - For example, the create subscription API requires you to add the `plan_id` (Plan ID) in the request body.
  - These parameters are enclosed in \{\} in the collection. For example, \{plan_id\}.
  - The API throws an error if these are incorrect or do not exist in your system.

## Plans

@include subscriptions/plans/plans-intro

### Create a Plan

Use the below endpoint to create a plan.

/plans

#### Request Parameters

@include subscriptions/plans/plans-create-req

@include subscriptions/plans/plans-create

#### Response Parameters

@include subscriptions/plans/plans-create-res

### Fetch all Plans

Use the below endpoint to fetch details of all plans.

/plans

#### Query Parameters

@include subscriptions/plans/plans-query

@include subscriptions/plans/plans-fetch-all

### Fetch a Plan by ID

Use the below endpoint to fetch details of a plan by its unique identifier.

/plans/:id

#### Path Parameter

@include subscriptions/plans/plans-path

@include subscriptions/plans/plans-fetch

## Subscriptions

@include subscriptions/subscriptions/subscriptions-intro

### Create a Subscription

@include subscriptions/subscriptions/subscriptions-create

#### Request Parameters

@include subscriptions/subscriptions/subscriptions-create-req

#### Response Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Create a Subscription Link

@include subscriptions/subscriptions/subscriptions-link-create

#### Request Parameters

@include subscriptions/subscriptions/subscriptions-create-req

@include subscriptions/subscriptions/subscriptions-link-create-req

#### Response Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Fetch All Subscriptions

@include subscriptions/subscriptions/subscriptions-fetch-all

#### Query Parameters

@include subscriptions/subscriptions/subscriptions-query

### Fetch Subscription by ID

@include subscriptions/subscriptions/subscriptions-fetch

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

### Cancel a Subscription

@include subscriptions/subscriptions/subscriptions-cancel

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

#### Request Parameter

@include subscriptions/subscriptions/subscriptions-cancel-request

### Update a Subscription

@include subscriptions/subscriptions/subscriptions-update

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

#### Request Parameters

@include subscriptions/subscriptions/subscriptions-update-request

### Fetch Details of a Pending Update

@include subscriptions/subscriptions/subscriptions-fetch-pending-update

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

### Cancel an Update

@include subscriptions/subscriptions/subscriptions-cancel-update

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

### Pause a Subscription

@include subscriptions/subscriptions/subscriptions-pause

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

#### Request Parameters

@include subscriptions/subscriptions/subscriptions-pause-req

### Resume a Subscription

@include subscriptions/subscriptions/subscriptions-resume

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

#### Request Parameters

@include subscriptions/subscriptions/subscriptions-resume-req

### Fetch All Invoices for a Subscription

@include subscriptions/subscriptions/subscriptions-invoice

#### Query Parameter

@include subscriptions/subscriptions/subscriptions-invoice-query

#### Response Parameters

@include subscriptions/subscriptions/subscriptions-invoice-res

### Delete an Offer Linked to a Subscription

@include subscriptions/subscriptions/subscriptions-delete-offer

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-delete-offer-path

## Checkout Integration

### Authentication Transaction

@include subscriptions/checkout-custom

### Payment Verification

@include subscriptions/payment-verification

## Add-ons

@include subscriptions/add-ons/add-ons-intro

### Create an Add-on

@include subscriptions/add-ons/add-ons-create

#### Path Parameter

`id` _mandatory_
: `string` The subscription ID to which the add-on is being added.

#### Request Parameters

@include subscriptions/add-ons/add-ons-create-req

#### Response Parameters

@include subscriptions/add-ons/add-ons-create-res

### Fetch all Add-ons

@include subscriptions/add-ons/add-ons-fetch-all

#### Query Parameters

@include subscriptions/add-ons/add-ons-query

### Fetch an Add-on by ID

@include subscriptions/add-ons/add-ons-fetch

#### Path Parameter

@include subscriptions/add-ons/add-ons-path

### Delete an Add-on

@include subscriptions/add-ons/add-ons-delete

#### Path Parameter

@include subscriptions/add-ons/add-ons-path

## Webhooks

### Available Webhook Events

Refer to the Webhooks section for a list of available webhook events for Subscriptions.

### Setup Webhooks

Refer to the Webhooks section to learn how to setup webhooks.

### Sample Payloads

Refer to the Webhooks section for sample payloads.
