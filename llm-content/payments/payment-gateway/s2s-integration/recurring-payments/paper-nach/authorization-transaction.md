---
title: 1. Create the Authorisation Transaction
description: Create an authorisation transaction for NACH using Razorpay APIs.
---

# 1. Create the Authorisation Transaction

@include recurring-payments/paper-nach/intro

The acceptable image formats and size are:
- jpeg
- jpg
- png
- Maximum accepted size is 6 MB.

## Ways to Accept Authorisation Payment

@include recurring-payments/create-auth-s2s-tran-two-methods

## 1.1. Using Razorpay APIs

@include recurring-payments/create-auth-tran-s2s-checkout-intro

### 1.1.1. Create a Customer

@include recurring-payments/customer/api

#### Request Parameters

@include recurring-payments/customer/api-req

### 1.1.2. Create an Order

@include recurring-payments/auth-order-api-intro

@include recurring-payments/paper-nach/order

@include recurring-payments/paper-nach/order-note

#### Request Parameters

@include recurring-payments/paper-nach/order-req-1

@include recurring-payments/paper-nach/order-req-token

@include recurring-payments/paper-nach/order-req-2

### 1.1.3. Create an Authorisation Payment

@include recurring-payments/paper-nach/auth-payment-s2s-intro

@include recurring-payments/paper-nach/upload-nach-form-api

#### Error Reasons

To learn about errors, refer to the FAQ [Upload the NACH File](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/paper-nach/faqs.md) section.

## 1.2. Using a Registration Link

@include recurring-payments/auth-link-intro-api

In the case of Paper NACH, the order amount must be `0`.

### 1.2.1. Create a Registration Link

@include recurring-payments/paper-nach/auth-link-endpoint

@include recurring-payments/paper-nach/auth-link-code

@include recurring-payments/paper-nach/auth-link-note

#### Request Parameters

@include recurring-payments/auth-link-req-man
`subscription_registration`
: Details of the authorisation payment.

@include recurring-payments/paper-nach/auth-link-req

@include recurring-payments/auth-link-req-opt

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

#### Path Parameters

@include recurring-payments/send-notification-path-api

### 1.2.3. Cancel a Registration Link

@include recurring-payments/paper-nach/auth-link-cancel-intro

@include recurring-payments/paper-nach/auth-link-cancel-code

#### Path Parameter

@include recurring-payments/cancel-path
