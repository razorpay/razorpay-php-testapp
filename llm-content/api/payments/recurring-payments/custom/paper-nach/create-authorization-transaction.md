---
title: 1. Create the Authorisation Transaction
description: Learn how to create an authorisation transaction with method NACH so customers can set up authorization by signing a physical NACH form.
---

# 1. Create the Authorisation Transaction

@include recurring-payments/paper-nach/custom-intro

@include recurring-payments/create-auth-tran-rr-custom-two-methods

## 1.1. Using Razorpay APIs

@include recurring-payments/create-auth-tran-rr-custom-checkout-intro

### 1.1.1. Create a Customer

@include recurring-payments/customer/api

### Request Parameters

@include recurring-payments/customer/api-req

### 1.1.2. Create an Order

@include recurring-payments/paper-nach/order

### Request Parameters

@include recurring-payments/paper-nach/order-req

### 1.1.3. Create an Authorisation Payment

Follow these steps to create authorisation transaction:

1. Download the Paper NACH form and send it to the customers.
1. Ask the customers to fill the form and
   - Upload it via the Checkout.
   - Send it to you and you can upload it from the Dashboard.
1. Upload the received form via create NACH File API.

#### 1.1.3.1 Upload the NACH File via Checkout

@include recurring-payments/custom-int/paper-nach

#### Additional Checkout Fields

@include recurring-payments/auth-payment-api-additional-fields

@include recurring-payments/eman-nach-additional-fields

#### 1.1.3.2 Upload the NACH File via API

@include recurring-payments/paper-nach/upload

#### Error Reasons

To learn about errors, refer to the FAQ [Upload the NACH File](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/paper-nach/faqs.md) section.

## 1.2. Using a Registration Link

@include recurring-payments/link-api-intro

In the case of Paper NACH, the order amount must be `0`.

### 1.2.1. Create a Registration Link

@include recurring-payments/paper-nach/link

### Request Parameters

@include recurring-payments/link-req-man

@include recurring-payments/paper-nach/link-req

@include recurring-payments/link-req-opt

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

### Path Parameters

@include recurring-payments/send-notification-path-api

### 1.2.3. Cancel a Registration Link

@include recurring-payments/paper-nach/cancel-link

### Path Parameter

@include recurring-payments/cancel-path
