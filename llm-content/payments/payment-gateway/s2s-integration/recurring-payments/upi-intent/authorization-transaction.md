---
title: 1. Create an Authorisation Transaction
description: Create an authorisation transaction for UPI using Razorpay APIs and Registration Link.
---

# 1. Create an Authorisation Transaction

@include recurring-payments/create-auth-s2s-tran-two-methods

## 1.1 Using Razorpay APIs

To create an authorisation transaction using the Razorpay APIs, you need to:

1. [Create a Customer](#111-create-a-customer).
1. [Create an Order](#112-create-an-order).
1. [Create Authorisation Payment using Razorpay APIs](#113-create-an-authorization-payment).

### 1.1.1 Create a Customer

@include recurring-payments/customer-intent/api

   
### Request Parameters

       @include recurring-payments/customer-intent/api-req
      

### 1.1.2 Create an Order

@include recurring-payments/auth-order-api-intro

   
### Sample Code

       @include recurring-payments/upi/order-code-intent
      

   
### Request Parameters

       @include recurring-payments/upi/order-req-intent
      

### 1.1.3 Create an Authorisation Payment

Once an order is created, your next step is to create a payment. Use the below endpoint to create a payment with payment method `upi`.

/payments/create

   
### Sample Code

       
         ```curl: Request
         curl -u : \
         -X POST https://api.razorpay.com/v1/payments/create/upi \
         -H "Content-Type: application/json" \
         -d '{
            "amount":10000,
            "currency":"INR",
            "order_id":"order_1Aa00000000002",
            "customer_id":"cust_1Aa00000000001",
            "recurring":"1",
            "method":"upi",
            "upi":{
               "flow":"intent"
            },
            "notes":{
               "address":"note value"
            }
         }'
         ```json: Response
         {
            "razorpay_payment_id": "pay_R1D5dVYdY67f7M",
            "link": "upi://mandate?mc=5045&amrule=MAX&am=1.00&fam=1.00&tr=EZM2025080415061922323116&validitystart=04082025&pn=Demo&rev=Y&pa=demotestrzp.rzp@icici&tn=Demo&cu=INR&txnType=CREATE&block=N&orgid=400011&mode=04&recur=ASPRESENTED&purpose=14&validityend=03072035"
         }
         ```
         
      

   
### Request Parameters

`amount` _mandatory_
: `integer` The amount associated with the payment in smallest unit of the supported currency. For example, `2000` means ₹20. Must match the amount in order created [previously](#112-create-an-order).

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we support only INR.

`order_id` _mandatory_
: `string` The unique identifier of the order created in the [previous step](#112-create-an-order).

`customer_id` _mandatory_
: `string` Unique identifier of the customer, obtained from the response of [Step 1.1.1: Create a Customer](#111-create-a-customer).

`recurring` _mandatory_
: `string` Determines if the payment is recurring or one-time. Possible values:
  - `1`: Recurring payment is enabled.
  - `preferred`: Use this when you want to support recurring payments and one-time payment in the same flow.

`method` _mandatory_
: `string` The payment method selected by the customer. Here, the value must be `upi`.

`upi`
: Details of the expiry of the UPI link

    `flow` _mandatory_
    : `string` Specify the type of the UPI payment flow. 
 Possible values are:
      - `intent` (default)
      - `collect`: Deprecated effective 28 February 2026. Applicable only for exempted businesses.

`notes` _optional_
: `json object` Key-value pairs that can hold additional information about the payment.
      

   
### Response Parameters

       If the payment request is valid, the response contains the following fields. Refer to the [UPI Intent Flow document](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md) for more details.
       
`razorpay_payment_id`
: `string` Unique reference for the payment created. For example, `pay_EAm09NKReXi2e0`.

      

### Next Steps by Platform

   
      Use the link returned in the response as a deeplink to redirect the customer to their preferred UPI app to complete the mandate registration.
   
   
      UPI Intent is not supported on Desktop Web. Convert the link returned in the response into a QR code and display it on your checkout UI for the customer to scan with their preferred UPI app.
   

## 1.2 Using a Registration Link

@include recurring-payments/auth-link-intro-api

A registration link must always have the amount (in paise) that the customer will be charged when making the authorisation payment. For UPI, the amount must be a minimum of `₹1`.

### 1.2.1 Create a Registration Link

@include recurring-payments/upi/auth-link

   
### Request Parameters

       @include recurring-payments/auth-link-req-man

       @include recurring-payments/upi/auth-link-req

       @include recurring-payments/auth-link-req-opt
      

### 1.2.2 Send/Resend Notifications

@include recurring-payments/send-notification-api

   
### Path Parameters

       @include recurring-payments/send-notification-path-api
      

### 1.2.3 Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

#### Path Parameter

@include recurring-payments/cancel-path
