---
title: 1. Create the Authorisation Transaction
description: Know how to create an authorisation transaction with method emandate so customers can complete the authorization using their netbanking login.
---

# 1. Create the Authorisation Transaction

@include recurring-payments/create-auth-tran-rr-custom-two-methods

## 1.1. Using Razorpay APIs

To create an authorisation transaction using the Razorpay APIs, you need to:

1. [Fetch Payment Methods](#111-fetch-payment-methods).
2. [Create a Customer](#111-create-a-customer).
3. [Create an Order](#112-create-an-order).
4. [Create Authorisation Payment using Razorpay APIs](#114-create-an-authorisation-payment).

### 1.1.1. Fetch Payment Methods

Use the below endpoint to fetch a list of banks Razorpay supports for different payment methods.

/methods

> **WARN**
>
> 
> **Watch Out!**
> 
> To fire this API, provide your [KEY_ID] for authorization. Your [KEY_SECRET] is NOT required and should NOT be passed.
> 

```curl: Request
curl -u [YOUR_KEY_ID]\
- X GET https://api.razorpay.com/v1/methods \
```json: Response
{
    "methods": {
        "entity": "methods",
        ...
        recurring: {
            emandate: {
                        "AUBL": {
                            "auth_types": [
                            "netbanking",
                            "aadhaar",
                            "debitcard"
                            ],
                            "is_merged_bank": false,
                            "name": "AU SMALL FINANCE BANK"
                        },
                    },
            }
        }
    }
```

### 1.1.2. Create a Customer

@include recurring-payments/customer/api

### Request Parameters

@include recurring-payments/customer/api-req

### 1.1.3. Create an Order

@include recurring-payments/emandate/order

### Request Parameters

@include recurring-payments/emandate/order-req

### 1.1.4. Create an Authorisation Payment

@include recurring-payments/custom-int/emandate

### Additional Checkout Fields

@include recurring-payments/auth-payment-api-additional-fields

@include recurring-payments/eman-nach-additional-fields

## 1.2. Using a Registration Link

@include recurring-payments/link-api-intro

A registration link must always have an amount (in Paise) that the customer will be charged when making the authorisation payment. In the case of emandate, the order amount must be `0`.

### 1.2.1. Create a Registration Link

@include recurring-payments/emandate/link

### Request Parameters

@include recurring-payments/link-req-man

@include recurring-payments/emandate/link-req

@include recurring-payments/link-req-opt

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

### Path Parameters

@include recurring-payments/send-notification-path-api

### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

### Path Parameter

@include recurring-payments/cancel-path
