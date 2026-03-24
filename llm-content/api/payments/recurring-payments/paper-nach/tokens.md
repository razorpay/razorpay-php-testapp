---
title: 2. Fetch and Manage Tokens
description: Retrieve tokens using Razorpay APIs to create subsequent payments.
---

# 2. Fetch and Manage Tokens

@include recurring-payments/fetch-token-api

Know more about [Tokens](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/paper-nach/integrate/#fetch-nach-mandate-registration-details.md).

## 2.1 Fetch Payment ID using Order ID

@include recurring-payments/payment-id-order-id

### Path Parameter

@include recurring-payments/payment-id-order-id-path

### Response Parameters

@include recurring-payments/fetch-token-pay-res

## 2.2. Fetch Token by Payment ID

@include recurring-payments/paper-nach/token-by-payment

### Path Parameter

@include recurring-payments/fetch-token-pay-path-api

### Response Parameters

@include recurring-payments/fetch-token-pay-res

## 2.3. Fetch Tokens by Customer ID

@include recurring-payments/paper-nach/token-by-customer

### Path Parameters

@include recurring-payments/fetch-token-cust-path-api

### Response Parameters

@include recurring-payments/fetch-token-cust-response-api

## 2.4. Delete Tokens

@include recurring-payments/fetch-token-delete-api

### Path Parameter

@include recurring-payments/delete-token-path

### Response Parameters

`deleted`
: `boolean` Indicates whether the token is deleted. Possible values:
    - `true`: The token is deleted successfully.
    - `false`: The token was not deleted.
