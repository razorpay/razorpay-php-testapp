---
title: Charge First Payment Automatically after NACH Registration
description: Register a customer's mandate AND charge them the first recurring payment as part of the same transaction via paper NACH.
---

# Charge First Payment Automatically after NACH Registration

## 1. Create an Authorisation Transaction

> **INFO**
>
> 
> **Authorisation transaction + auto-charge first payment**
> 
> You can register a customer's mandate **AND** charge them the first recurring payment as part of the same transaction. To do this all you have to do is pass the `first_payment_amount` parameter while creating the order.
> 

@include recurring-payments/paper-nach/custom-intro

@include recurring-payments/create-auth-tran-rr-custom-two-methods

### 1.1. Using Razorpay APIs

@include recurring-payments/create-auth-tran-rr-custom-checkout-intro

### 1.1.1. Create a Customer

@include recurring-payments/customer/api

#### Request Parameters

@include recurring-payments/customer/api-req

### 1.1.2. Create an Order

@include recurring-payments/paper-nach/auto-order

#### Request Parameters

@include recurring-payments/paper-nach/auto-order-req

### 1.1.3. Create an Authorisation Payment

Follow these steps to create authorisation transaction:

1. Download the Paper NACH form and send it to the customers.
1. Ask the customers to fill the form and
   - Upload it via the Checkout.
   - Send it to you and you can upload it from the Dashboard.
1. Upload the received form via create NACH File API.

### 1.1.3.1 Upload the NACH File via Checkout

@include recurring-payments/custom-int/paper-nach

#### Additional Checkout Fields

@include recurring-payments/auth-payment-api-additional-fields

@include recurring-payments/eman-nach-additional-fields

### 1.2. Using a Registration Link

@include recurring-payments/link-api-intro

A registration link must always have an amount (in paise) that the customer will be charged when making the authorisation payment. In the case of Paper NACH, the order amount must be `0`.

### 1.2.1. Create a Registration Link

@include recurring-payments/paper-nach/auto-link

#### Request Parameters

@include recurring-payments/link-req-man

@include recurring-payments/paper-nach/auto-link-req

@include recurring-payments/link-req-opt

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

#### Path Parameters

@include recurring-payments/send-notification-path-api

### 1.2.3. Cancel a Registration Link

@include recurring-payments/paper-nach/cancel-link

#### Path Parameter

@include recurring-payments/cancel-path

## 2. Fetch and Manage Tokens

@include recurring-payments/fetch-token-api

### 2.1. Fetch Token by Payment ID

@include recurring-payments/paper-nach/token-by-payment

### Path Parameter

@include recurring-payments/fetch-token-pay-path-api

### 2.2. Fetch Tokens by Customer ID

@include recurring-payments/paper-nach/token-by-customer

### Path Parameter

@include recurring-payments/fetch-token-cust-path-api

### 2.3. Delete Tokens

@include recurring-payments/fetch-token-delete-api

### Path Parameter

@include recurring-payments/delete-token-path

## 3. Create Subsequent Payments

@include recurring-payments/subsequent-payments/pay-intro

### 3.1. Create an Order to Charge the Customer

@include recurring-payments/subsequent-payments/order

### Request Parameters

@include recurring-payments/subsequent-payments/order-req

### 3.2. Create a Recurring Payment

@include recurring-payments/subsequent-payments/rec-pay

### Request Parameters

@include recurring-payments/subsequent-payments/rec-pay-req
