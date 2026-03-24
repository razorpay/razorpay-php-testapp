---
title: 1. Create the Authorisation Transaction
description: Learn how to create an authorisation transaction for upi.
---

# 1. Create the Authorisation Transaction

@include recurring-payments/create-auth-tran-rr-custom-two-methods

## 1.1 Using Razorpay APIs

@include recurring-payments/create-auth-tran-rr-custom-checkout-intro

### 1.1.1 Create a Customer

@include recurring-payments/customer/tpv-api

### Request Parameters

@include recurring-payments/customer/tpv-api-req

### 1.1.2. Create an Order

@include recurring-payments/auth-order-api-intro

@include recurring-payments/upi/order-note-freq

@include recurring-payments/upi/order-tpv

### Request Parameters

@include recurring-payments/upi/order-req-tpv

### 1.1.3. Create an Authorisation Payment

Integrate with Razorpay Custom Checkout using the code given below to create an authorisation payment.

@include recurring-payments/custom-int/upi-tpv

### Additional Checkout Fields

@include recurring-payments/auth-payment-api-additional-fields

@include recurring-payments/card-upi-additional-fields

## 1.2. Using a Registration Link

@include recurring-payments/link-api-intro

A registration link must always have the amount (in paise) that the customer will be charged when making the authorisation payment. For UPI, the amount must be a minimum of `₹1`.

### 1.2.1. Create a Registration Link

@include recurring-payments/upi/auth-link-tpv

### Request Parameters

@include recurring-payments/auth-link-req-man

@include recurring-payments/upi/auth-link-req-tpv

@include recurring-payments/auth-link-req-opt

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

### Path Parameters

@include recurring-payments/send-notification-path-api

### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

### Path Parameter

@include recurring-payments/cancel-path
