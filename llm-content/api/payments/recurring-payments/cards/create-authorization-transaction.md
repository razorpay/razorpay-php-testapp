---
title: 1. Create the Authorisation Transaction
description: Create an authorisation transaction for cards using Razorpay APIs.
---

# 1. Create the Authorisation Transaction

@include recurring-payments/create-auth-tran-rr-custom-two-methods

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> Bank downtime can affect success rates when processing recurring payments via debit cards.
> 

## 1.1. Using Razorpay APIs

@include recurring-payments/create-auth-tran-rr-custom-checkout-intro

### 1.1.1. Create a Customer

@include recurring-payments/customer/api

    
### Request Parameters

         @include recurring-payments/customer/api-req
        

    
### Response Parameters

         @include recurring-payments/customer/api-res 
        

### 1.1.2. Create an Order

@include recurring-payments/auth-order-api-intro

@include recurring-payments/card/order-api

    
### Request Parameters

         @include recurring-payments/card/order-api-req
        

    
### Response Parameters

         @include recurring-payments/card/order-api-res
        

### 1.1.3. Create an Authorisation Payment

@include recurring-payments/auth-payment-api

    
### Additional Checkout Fields

         @include recurring-payments/auth-card-payment-api-additional-fields
        

After this step, you can proceed to integrate with the [Fetch Token API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/cards/tokens.md).

## 1.2. Using a Registration Link

Registration Link is an alternate way of creating an authorisation transaction. You can create a registration link using the API or [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#1-create-a-registration-link).

- You do not have to create a customer if you choose the registration link method for creating an authorisation transaction.

- When you create a registration link, an [invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) is automatically issued to the customer. They can use this invoice to make the authorisation payment.
- A registration link should always have an order amount (in subunits) the customer will be charged when making the authorisation payment. For cards, the amount should be  in the case of cards.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> You can [use Webhooks to get notifications about successful payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-authorization-link-status-using-webhooks) against a registration link.
> 
> 

### 1.2.1. Create a Registration Link

@include recurring-payments/card/auth-link

    
### Request Parameters

         @include recurring-payments/auth-link-req-man

         @include recurring-payments/card/auth-link-req

         @include recurring-payments/auth-link-req-opt
        

    
### Response Parameters

         @include recurring-payments/auth-link-res
        

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

    
### Path Parameters

         @include recurring-payments/send-notification-path-api
        

    
### Response Parameter

`success`
: `boolean` Indicates whether the notifications were sent successfully. Possible values:
        - `true`: The notifications were successfully sent via SMS, email or both.
        - `false`: The notifications were not sent.
        

### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

    
### Path Parameter

         @include recurring-payments/cancel-path
        

    
### Response Parameter

         @include recurring-payments/auth-link-res
        

After this step, you can proceed to integrate with the [Fetch Token API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/cards/tokens.md).
