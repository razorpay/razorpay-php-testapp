---
title: 1. Create the Authorisation Transaction
description: Create an authorisation transaction for emandate to complete your customer's authorization using their netbanking login.
---

# 1. Create the Authorisation Transaction

@include recurring-payments/create-auth-s2s-tran-two-methods

## 1.1. Using Razorpay APIs

To create an authorisation transaction using the Razorpay APIs, you need to:

1. [Fetch Payment Methods](#111-fetch-payment-methods).
2. [Create a Customer](#112-create-a-customer).
3. [Create an Order](#113-create-an-order).
4. [Create Authorisation Payment using Razorpay APIs](#113-create-an-authorisation-payment).

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
curl -u [YOUR_KEY_ID] \
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

#### Request Parameters

@include recurring-payments/customer/api-req

### 1.1.3. Create an Order

@include recurring-payments/auth-order-api-intro

@include recurring-payments/emandate/order

#### Request Parameters

@include recurring-payments/emandate/order-req-1

@include recurring-payments/emandate/order-req-token

@include recurring-payments/emandate/order-req-2

### 1.1.3. Create an Authorisation Payment

@include recurring-payments/emandate/auth-payment

#### Request Parameters

@include recurring-payments/emandate/auth-payment-req

#### Response Parameters

@include recurring-payments/emandate/auth-payment-res

## 1.2. Using a Registration Link

@include recurring-payments/auth-link-intro-api

A registration link must always have an amount (in Paise) that the customer will be charged when making the authorisation payment. In the case of emandate, the order amount must be `0`.

### 1.2.1. Create a Registration Link

@include recurring-payments/emandate/auth-link

#### Request Parameters

@include recurring-payments/auth-link-req-man

@include recurring-payments/emandate/auth-link-req-1

@include recurring-payments/emandate/auth-link-req-2

@include recurring-payments/auth-link-req-opt

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

#### Path Parameters

@include recurring-payments/send-notification-path-api

### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

#### Path Parameter

@include recurring-payments/cancel-path
