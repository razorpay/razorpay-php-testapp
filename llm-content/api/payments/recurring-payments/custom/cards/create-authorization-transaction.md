---
title: 1. Create the Authorisation Transaction
description: Create an authorisation transaction for cards using Razorpay APIs.
---

# 1. Create the Authorisation Transaction

@include recurring-payments/create-auth-tran-rr-custom-two-methods

## 1.1. Using Razorpay APIs

@include recurring-payments/create-auth-tran-rr-custom-checkout-intro

### 1.1.1. Create a Customer

@include recurring-payments/customer/api

    
### Request Parameters

         @include recurring-payments/customer/api-req
        

    
### Response Parameters

         @include recurring-payments/customer/api-res 
        

### 1.1.2. Create an Order

@include recurring-payments/cards/orders

    
### Request Parameters

         @include recurring-payments/cards/orders-req
        

    
### Response Parameters

         @include recurring-payments/card/order-api-res
        

### 1.1.3. Create an Authorisation Payment

@include recurring-payments/custom-int/cards

    
### Additional Checkout Fields

         @include recurring-payments/auth-payment-api-additional-fields
         
         @include recurring-payments/card-upi-cust-additional-fields
        

After this step, you can proceed to integrate with the [Fetch Token API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/custom/cards/tokens.md).

## 1.2. Using a Registration Link

@include recurring-payments/link-api-intro

A registration link must always have the amount (in Paise) that the customer will be charged when making the authorisation payment. For cards, the amount must be a minimum of `₹1`.

### 1.2.1. Create a Registration Link

@include recurring-payments/cards/links

    
### Request Parameters

         @include recurring-payments/link-req-man
         @include recurring-payments/cards/links-req
         @include recurring-payments/link-req-opt
        

    
### Response Parameters

         @include recurring-payments/auth-link-res
        

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

    
### Path Parameters

         @include recurring-payments/send-notification-path-api
        

    
### Response Parameter

`success`
: `boolean` Indicates whether the notifications were sent successfully. Possible values:
        - `true`: The notifications were successfully sent via SMS, email or both.
        - `false`: The notifications were not sent.
        

### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

    
### Path Parameter

         @include recurring-payments/cancel-path
        

    
### Response Parameters

         @include recurring-payments/auth-link-res
        

After this step, you can proceed to integrate with the [Fetch Token API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/custom/cards/tokens.md).
