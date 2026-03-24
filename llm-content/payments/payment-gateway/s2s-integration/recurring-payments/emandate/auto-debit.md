---
title: Register Emandate and Charge First Payment Together
description: Register a customer's mandate and charge them the first recurring payment as part of the same transaction via Emandate.
---

# Register Emandate and Charge First Payment Together

## 1. Create an Authorisation Transaction

> **INFO**
>
> 
> **Authorisation transaction + auto-charge first payment**
> 
> You can register a customer's mandate **AND** charge them the first recurring payment as part of the same transaction. To do this all you have to do is pass the `first_payment_amount` parameter while creating the order.
> 

@include recurring-payments/create-auth-s2s-tran-two-methods

### 1.1. Using Razorpay APIs

@include recurring-payments/create-auth-tran-s2s-checkout-intro

#### 1.1.1. Create a Customer

@include recurring-payments/customer/api

##### Request Parameters

@include recurring-payments/customer/api-req

#### 1.1.2. Create an Order

@include recurring-payments/auth-order-api-intro

@include recurring-payments/emandate/order-first-payment

##### Request Parameters

@include recurring-payments/emandate/order-req-1

@include recurring-payments/emandate/order-req-token-first-payment

@include recurring-payments/emandate/order-req-2

#### 1.1.3. Create an Authorisation Payment

@include recurring-payments/emandate/auth-payment

##### Request Parameters

@include recurring-payments/emandate/auth-payment-req

##### Response Parameters

@include recurring-payments/emandate/auth-payment-res

### 1.2. Using a Registration Link

@include recurring-payments/auth-link-intro-api

A registration link must always have an amount (in paise) that the customer will be charged when making the authorisation payment. In the case of emandate, the order amount must be `0`.

#### 1.2.1. Create a Registration Link

@include recurring-payments/emandate/auth-link-first-payment

##### Request Parameters

@include recurring-payments/auth-link-req-man

@include recurring-payments/emandate/auth-link-req-1

@include recurring-payments/emandate/auth-link-req-first-payment

@include recurring-payments/emandate/auth-link-req-2

@include recurring-payments/auth-link-req-opt

#### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

##### Path Parameters

@include recurring-payments/send-notification-path-api

#### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

##### Path Parameter

@include recurring-payments/cancel-path

## 2. Fetch and Manage Tokens

@include recurring-payments/fetch-token-api

### 2.1. Fetch Token by Payment ID

@include recurring-payments/emandate/token-by-payment

#### Path Parameter

@include recurring-payments/fetch-token-pay-path-api

### 2.2. Fetch Tokens by Customer ID

@include recurring-payments/emandate/token-by-customer

#### Path Parameter

@include recurring-payments/fetch-token-cust-path-api

### 2.3. Delete Tokens

@include recurring-payments/fetch-token-delete-api

#### Path Parameter

@include recurring-payments/delete-token-path

## 3. Create Subsequent Payments

@include recurring-payments/subsequent-payments/pay-intro

### 3.1. Create an Order to Charge the Customer

@include recurring-payments/subsequent-payments/order

### 3.2. Create a Recurring Payment

@include recurring-payments/subsequent-payments/rec-pay

#### Request Parameters

@include recurring-payments/subsequent-payments/rec-pay-req
