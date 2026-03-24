---
title: 1. Create the Authorisation Transaction
description: Learn how to create an authorisation transaction for UPI.
---

# 1. Create the Authorisation Transaction

@include upi-collect-sunset-autopay/s2s

@include recurring-payments/create-auth-s2s-tran-two-methods

## 1.1 Using Razorpay APIs

To create an authorisation transaction using the Razorpay APIs, you need to:

1. [Create a Customer](#111-create-a-customer).
1. [Create an Order](#112-create-an-order).
1. [Validate the UPI ID](#113-validate-the-vpa-upi-id).
1. [Create Authorisation Payment using Razorpay APIs](#114-create-an-authorization-payment-upi-collect-flow).

### 1.1.1 Create a Customer

@include recurring-payments/customer/api

  
### Request Parameters

     @include recurring-payments/customer/api-req
    

### 1.1.2. Create an Order

@include recurring-payments/auth-order-api-intro

  
### Sample Code

     @include recurring-payments/upi/order-code
    

  
### Request Parameters

     @include recurring-payments/upi/order-req
    

### 1.1.3. Validate the VPA (UPI ID)

Use the below endpoint to validate the customer's UPI ID.

/payments/validate/vpa

  
### Sample Code

     ```curl: Request
      curl -u : \
      -X POST https://api.razorpay.com/v1/payments/validate/vpa \
      -H "Content-Type: application/json" \
      -d '{
        "vpa": "gauravkumar@exampleupi"
      }'
      ```json: Response
      {
        "vpa": "gauravkumar@exampleupi",
        "success": true,
        "customer_name": "Gaurav Kumar"
      }
      ```
    

#### Request Parameter

`vpa` _mandatory_
: `string` The UPI ID you want to validate. For example, `gauravkumar@exampleupi`.

### 1.1.4. Create an Authorisation Payment (UPI Collect Flow)

Once an order is created, your next step is to create a payment. Use the below endpoint to create a payment with payment method `upi`.

/payments/create/upi

  
### Sample Code

     
      ```curl: Request
      curl -u : \
      -X POST https://api.razorpay.com/v1/payments/create/upi \
      -H "Content-Type: application/json" \
      -d '{
        "amount": 200,
        "currency": "INR",
        "order_id": "order_Ee0biRtLOqzRjP",
        "email": "gaurav.kumar@example.com",
        "contact": "9000090000",
        "customer_id": "cust_EIW4T2etiweBmG",
        "recurring": "1",
        "method": "upi",
        "upi": {
          "flow": "collect",
          "vpa": "gauravkumar@exampleupi",
          "expiry_time": 5
        },
        "ip": "192.168.0.103",
        "referer": "http",
        "user_agent": "Mozilla/5.0",
        "description": "Test flow",
        "save": true,
        "notes": {
          "note_key": "value1"
        }
      }'
      ```json: Response
      {
      "razorpay_payment_id": "pay_EAm09NKReXi2e0"
      }
      ```
      
    

  
### Request Parameters

`amount` _mandatory_
: `integer` The amount associated with the payment in smallest unit of the supported currency. For example, `2000` means ₹20. Must match the amount in [Step 1.1.2.: Create an Order](/#112-create-an-order).

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`order_id` _mandatory_
: `string` The unique identifier of the order created in [Step 1.1.2.: Create an Order](/#112-create-an-order).

`email` _mandatory_
: `string` The customer's email address. For example, `gaurav.kumar@example.com`.

`contact` _mandatory_
: `string` The customer's contact number. For example, `9123456780`.

`customer_id` _mandatory_
: `string` Unique identifier of the customer, obtained from the response of [Step 1.1.1.: Create an Customer](#111-create-a-customer).

`recurring` _mandatory_
: `string` Possible values:
  - `1`: Recurring payment is enabled.
  - `preferred`: Use this when you want to support recurring payments and one-time payment in the same flow.

`method` _mandatory_
: `string` The payment method selected by the customer. Here, the value must be `upi`.

`upi`
: `object` Details of the expiry of the UPI link

    `flow` _mandatory_
    : `string` Specify the type of the UPI payment flow. 
 Possible values are:
      - `collect` (default)
      - `intent`

     `vpa` _mandatory_
    : `string` VPA of the customer where the collect request will be sent.

    `expiry_time` _mandatory_
    : `integer` Period of time (in minutes) after which the link will expire. The default value is **5**.

`ip` _mandatory_
: `string` Client's browser IP address. For example, **117.217.74.98**.

`referer` _mandatory_
: `string` Value of `referer` header passed by the client's browser. For example, **https://example.com/**

`user_agent` _mandatory_
: `string` Value of `user_agent` header passed by the client's browser. 
For example, **Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36**

`description` _optional_
: `string` Descriptive text of the payment.

`save` _optional_
: `boolean` Specifies if the VPA should be stored as a token. Possible values:
  - `true`: Saves the VPA details.
  - `false`(default): Does not save the VPA details.

`notes` _optional_
: `json object` Key-value pairs that can hold additional information about the payment. 
 Refer to the [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) section of the API Reference Guide.

    

#### Response Parameters

If the payment request is valid, the response contains the following fields. Refer to the [UPI Collect Flow document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/collect.md#step-4-initiate-a-payment) for more details.

`razorpay_payment_id`
: `string` Unique reference for the payment created. For example, `pay_EAm09NKReXi2e0`.

## 1.2. Using a Registration Link

@include recurring-payments/auth-link-intro-api

A registration link must always have the amount (in Paise) that the customer will be charged when making the authorisation payment. For UPI, the amount must be a minimum of `₹1`.

### 1.2.1. Create a Registration Link

@include recurring-payments/upi/auth-link

  
### Request Parameters

     @include recurring-payments/auth-link-req-man

     @include recurring-payments/upi/auth-link-req

     @include recurring-payments/auth-link-req-opt
    

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

  
### Path Parameters

     @include recurring-payments/send-notification-path-api
    

### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

#### Path Parameter

@include recurring-payments/cancel-path
