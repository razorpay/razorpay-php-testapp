---
title: 2. Fetch and Manage Tokens
description: Retrieve tokens using Razorpay APIs to create subsequent payments.
---

# 2. Fetch and Manage Tokens

@include recurring-payments/fetch-token-s2s-api

## 2.1. Fetch Token by Payment id

> **INFO**
>
> 
> **Token Sharing for Partner Auth Model**
> 
> If you are a Razorpay Partner, who wants to use this API via Partner Auth, you must ensure the following:
> - Add the basic auth with partner credentials (client_id and client_secret).
> - Add the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. For example, -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
> 
> 
> ```curl: Request
> curl -X POST https://api.razorpay.com/v1/customers \
> -u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
> -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
> ```
> 
> 

@include recurring-payments/card/token-by-payment

    
### Path Parameter

         @include recurring-payments/fetch-token-pay-path-api
        

    
### Response Parameters

         @include recurring-payments/fetch-token-pay-res
        

## 2.2. Fetch Tokens by Customer id

@include recurring-payments/card/token-by-customer

    
### Path Parameter

         @include recurring-payments/fetch-token-cust-path-api
        

    
### Response Parameters

         @include recurring-payments/fetch-token-cust-response-api
        

## 2.3. Delete Tokens

@include recurring-payments/fetch-token-delete-api

    
### Path Parameter

         @include recurring-payments/delete-token-path
        

    
### Response Parameter

         @include recurring-payments/delete-token-response
