---
title: 1. Create the Authorisation Transaction
description: Steps to create an authorisation transaction for UPI one time mandate.
---

# 1. Create the Authorisation Transaction

Create a one time mandate on UPI to let your customers block an amount and pay later. The amount gets blocked on the customer's bank account and can be debited once within the expiry of the mandate. A one time mandate on UPI can help charge customers post-delivery of products or services, helping make the customer experience delightful for businesses like Ecommerce, Travel, Transport, Healthcare and many more.

**Example**

Gaurav Kumar wants to reserve a room at Acme Hotel. However, he is still determining the travel plan. He wants to pay after check-in.

Using UPI One Time Mandate, Gaurav Kumar can consent to block the hotel booking amount and only let Acme Hotel debit the amount after check-in.

To create a one time mandate:
1. [Create an authorisation transaction](#create-an-authorisation-transaction)
2. [Fetch and manage tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/collect/tokens.md)
3. [Create a one time mandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/collect/one-time-payment.md)

## Create an Authorisation Transaction

@include recurring-payments/create-auth-s2s-tran-two-methods

## 1.1 Using Razorpay APIs

To create an authorisation transaction using the Razorpay APIs, you need to:

1. [Create a Customer](#111-create-a-customer).
1. [Create an Order](#112-create-an-order).
1. [Create Authorisation Payment using Razorpay APIs](#114-create-an-authorization-payment).

### 1.1.1 Create a Customer

@include recurring-payments/customer/api

  
### Request Parameters

     @include recurring-payments/customer/api-req
    

### 1.1.2. Create an Order

@include recurring-payments/auth-order-api-intro-otm

@include recurring-payments/upi/order-code-otm

  
### Request Parameters

     @include recurring-payments/upi/order-req-otm
    

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

Registration Links are an alternate way of creating an authorisation transaction. If you create a registration link, you need not create a customer or an order.

When you create a registration link, an [invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) is automatically issued to the customer. The customer can use the invoice to make the Authorisation Payment.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can use [Token Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-authorization-link-status-using-webhooks) to get notifications about successful payments against a registration link. Do not use payment webhooks for Authorisation Payments.
> 

### 1.2.1. Create a Registration Link

@include recurring-payments/upi/auth-link-otm

  
### Request Parameters

     @include recurring-payments/auth-link-req-man

     @include recurring-payments/upi/auth-link-req-otm

     @include recurring-payments/auth-link-req-opt
    

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

  
### Path Parameters

     @include recurring-payments/send-notification-path-api
    

### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

  
### Path Parameters

     @include recurring-payments/cancel-path
