---
title: 1. Create the Authorisation Transaction
description: Learn how to create an authorisation transaction for upi.
---

# 1. Create the Authorisation Transaction

@include upi-collect-sunset-autopay/custom

@include recurring-payments/create-auth-tran-rr-custom-two-methods

## 1.1 Using Razorpay APIs

@include recurring-payments/create-auth-tran-rr-custom-checkout-intro

### 1.1.1 Create a Customer

    
### Sample Code

         @include recurring-payments/customer/api
        

    
### Request Parameters

         @include recurring-payments/customer/api-req
        

### 1.1.2. Create an Order

@include recurring-payments/upi/order

    
### Request Parameters

         @include recurring-payments/upi/order-req
        

### 1.1.3. Create an Authorisation Payment

@include recurring-payments/custom-int/upi

#### Additional Checkout fields

@include recurring-payments/auth-payment-api-additional-fields

`recurring` _mandatory_
: `string` Determines if the recurring payment is enabled or not. Possible values:
    - `1`: Recurring payment is enabled.
    - `preferred`: Use this if you want to allow **recurring payments** and **one-time payment** in the same flow.

## 1.2. Using a Registration Link

@include recurring-payments/link-api-intro

A registration link must always have the amount (in paise) that the customer will be charged when making the authorisation payment. For UPI, the amount must be a minimum of `₹1`.

### 1.2.1. Create a Registration Link

@include recurring-payments/upi/link

    
### Request Parameters

         @include recurring-payments/link-req-man

         @include recurring-payments/upi/link-req

         @include recurring-payments/link-req-opt
        

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

    
### Path Parameters

         @include recurring-payments/send-notification-path-api
        

### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

### Path Parameter

@include recurring-payments/cancel-path
