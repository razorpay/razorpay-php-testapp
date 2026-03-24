---
title: 2. Fetch and Manage Tokens
description: Retrieve tokens using Razorpay APIs to create subsequent payments.
---

# 2. Fetch and Manage Tokens

@include recurring-payments/fetch-token-api

Know more about [Tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/cards/integrate.md#fetch-card-mandate-registration-details).

## 2.1. Fetch Token by Payment ID

@include recurring-payments/card/token-by-payment

    
### Path Parameter

@include recurring-payments/fetch-token-pay-path-api
        

    
### Response Parameters

@include recurring-payments/fetch-token-pay-res
        

## 2.2. Fetch All Tokens by Customer ID

@include recurring-payments/card/token-by-customer

    
### Path Parameter

@include recurring-payments/fetch-token-cust-path-api
        

    
### Response Parameters

@include recurring-payments/fetch-token-cust-response-api
        

## 2.3 Fetch a Token by Customer ID

@include recurring-payments/card/token-by-customer-id

    
### Path Parameter

@include recurring-payments/fetch-token-cust-path-api-id
        

    
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
