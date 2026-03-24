---
title: 1. Create the Authorisation Transaction
description: Create an authorisation transaction for UPI.
---

# 1. Create the Authorisation Transaction

@include recurring-payments/create-auth-tran-rr-custom-two-methods

## 1.1 Using Razorpay APIs

@include recurring-payments/create-auth-tran-rr-custom-checkout-intro

### 1.1.1 Create a Customer

@include recurring-payments/customer/tpv-api

#### Request Parameters

@include recurring-payments/customer/tpv-api-req

### 1.1.2. Create an Order

@include recurring-payments/auth-order-api-intro

@include recurring-payments/upi/order-note-freq

@include recurring-payments/upi/order-code-tpv

#### Request Parameters

@include recurring-payments/upi/order-req-tpv

#### Error Response Parameters

@include recurring-payments/upi/order-tpv-error-res

### 1.1.3. Create an Authorisation Payment

@include recurring-payments/auth-payment-api

#### Additional Checkout Fields

@include recurring-payments/auth-payment-api-additional-fields

`recurring` _mandatory_
: `string` Determines if the recurring payment is enabled or not. Possible values:
    - `1`: Recurring payment is enabled.
    - `preferred`: Use this if you want to allow **recurring payments** and **one-time payment** in the same flow.

#### Error Response Parameters

@include recurring-payments/auth-payment-error-res

## 1.2. Using a Registration Link

@include recurring-payments/link-api-intro

A registration link must always have the amount (in Paise) that the customer will be charged when making the authorisation payment. For UPI, the amount must be a minimum of `₹1`.

### 1.2.1. Create a Registration Link

@include recurring-payments/upi/auth-link-tpv

#### Request Parameters

@include recurring-payments/auth-link-req-man

@include recurring-payments/upi/auth-link-req-tpv

@include recurring-payments/auth-link-req-opt

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

#### Path Parameters

@include recurring-payments/send-notification-path-api

### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

#### Path Parameter

@include recurring-payments/cancel-path
