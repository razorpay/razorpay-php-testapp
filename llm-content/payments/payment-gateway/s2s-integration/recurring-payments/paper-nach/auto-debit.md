---
title: Register NACH and Charge First Payment Together
description: Register a customer's mandate and charge them the first recurring payment as part of the same transaction via paper NACH.
---

# Register NACH and Charge First Payment Together

@include recurring-payments/paper-nach/intro

## 1. Create an Authorisation Transaction

@include recurring-payments/create-auth-s2s-tran-two-methods

### 1.1. Using Razorpay APIs

@include recurring-payments/create-auth-tran-s2s-checkout-intro

#### 1.1.1. Create a Customer

@include recurring-payments/customer/api

##### Request Parameters

@include recurring-payments/customer/api-req

#### 1.1.2. Create an Order

@include recurring-payments/auth-order-api-intro

@include recurring-payments/paper-nach/order-first-payment

@include recurring-payments/auth-order-api-intro

##### Request Parameters

@include recurring-payments/paper-nach/order-req-1

@include recurring-payments/paper-nach/order-req-token-first-payment

@include recurring-payments/paper-nach/order-req-2

#### 1.1.3. Create an Authorisation Payment

@include recurring-payments/paper-nach/auth-payment-s2s-intro

@include recurring-payments/paper-nach/upload-nach-form-api

### 1.2. Using a Registration Link

@include recurring-payments/auth-link-intro-api

A registration link must always have an amount (in paise) that the customer will be charged when making the authorisation payment. In the case of Paper NACH, the order amount must be `0`.

#### 1.2.1. Create a Registration Link

@include recurring-payments/paper-nach/auth-link-endpoint

@include recurring-payments/paper-nach/auth-link-note

@include recurring-payments/paper-nach/auth-link-code-first-payment

##### Request Parameters

@include recurring-payments/auth-link-req-man

`subscription_registration`
: Details of the authorisation payment.

  `first_payment_amount` _optional_
  : `integer` The amount, in paise, the customer should be auto-charged in addition to the authorization amount. For example, `100000`.

@include recurring-payments/paper-nach/auth-link-req

@include recurring-payments/auth-link-req-opt

#### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

##### Path Parameters

@include recurring-payments/send-notification-path-api

#### 1.2.3. Cancel a Registration Link

@include recurring-payments/paper-nach/auth-link-cancel-intro

@include recurring-payments/paper-nach/auth-link-cancel-code-first-payment

##### Path Parameter

@include recurring-payments/cancel-path

## 2. Fetch and Manage Tokens

@include recurring-payments/fetch-token-api

### 2.1. Fetch Token by Payment ID

@include recurring-payments/paper-nach/token-by-payment

#### Path Parameter

@include recurring-payments/fetch-token-pay-path-api

### 2.2. Fetch Tokens by Customer ID

@include recurring-payments/paper-nach/token-by-customer

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
