---
title: 1. Create the Authorisation Transaction
description: Steps to create an authorisation transaction for UPI one time mandate.
---

# 1. Create the Authorisation Transaction

Create a one time mandate on UPI to let your customers block an amount and pay later. The amount gets blocked on the customer's bank account and can be debited once within the expiry of the mandate. A one time mandate on UPI can help charge customers post-delivery of products or services, helping make the customer experience delightful for businesses like E-commerce, Travel, Transport, Healthcare, and many more.

**Example**

Gaurav Kumar wants to reserve a room at Acme Hotel. However, he is still determining the travel plan. He wants to pay after check-in.

Using UPI One Time Mandate, Gaurav Kumar can consent to block the hotel booking amount and only let Acme Hotel debit the amount after check-in.

To create a one time mandate:
1. [Create an authorisation transaction](#create-an-authorisation-transaction)
2. [Fetch and manage tokens](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/collect/tokens.md)
3. [Create a one time mandate](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/collect/one-time-payment.md)

## Create an Authorisation Transaction

@include recurring-payments/create-auth-s2s-tran-two-methods

## 1.1 Using Razorpay APIs

To create an authorisation transaction using the Razorpay APIs, you need to:

1. [Create a Customer](#111-create-a-customer).
1. [Create an Order](#112-create-an-order).
1. [Validate the UPI ID](#113-validate-the-vpa-upi-id).
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
    

### 1.1.3. Validate the VPA (UPI ID)

Use the below endpoint to validate the customer's UPI ID.

/payments/validate/vpa

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

#### Request Parameters

`vpa` _mandatory_
: `string` The UPI ID you want to validate. For example, `gauravkumar@exampleupi`.

### 1.1.4. Create an Authorisation Payment

After you create an order, you should create a payment. Use the endpoint below to create a payment. This is a dummy transaction that fails with an error `BAD_REQUEST_ERROR` when a customer tries to approve the mandate request from a PSP application. A token is created and marked as `confirmed` for the same.

> **INFO**
>
> 
> **Handy Tips**
> 
> You will get the [token.confirmed](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/webhooks/#token-confirmed.md) webhook after the customer approves the mandate request.
> 

/payments/create/upi

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
: `integer` The amount associated with the payment in the smallest unit of the supported currency. For example, `2000` means ₹20. Must match the amount in [Step 1.1.2: Create an Order](#112-create-an-order).

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`order_id` _mandatory_
: `string` The unique identifier of the order created in [Step 1.1.2: Create an Order](#112-create-an-order).

`email` _mandatory_
: `string` The customer's email address. For example, `gaurav.kumar@example.com`.

`contact` _mandatory_
: `string` The customer's contact number. For example, `9123456780`.

`customer_id` _mandatory_
: `string` Unique identifier of the customer, obtained from the response of [Step 1.1.1: Create a Customer](#111-create-a-customer).

`recurring` _mandatory_
: `string` Determines if the recurring payment is enabled or not. Possible values:
    - `1`: Recurring payment is enabled.
    - `preferred`: Use this if you want to allow **recurring payments** and **one-time payment** in the same flow.

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
  : `string` The VPA of the customer where the collect request will be sent.

  `expiry_time` _mandatory_
  : `integer` Period of time (in minutes) after which the link will expire. The default value is **5**.

`ip` _mandatory_
: `string` Client's browser IP address. For example, **117.217.74.98**.

`referer` _mandatory_
: `string` Value of `referer` header passed by the client's browser. For example, **https://example.com/**.

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
 Refer to the [Notes](@/Applications/MAMP/htdocs/new-docs/llm-content/api/understand#notes.md) section of the API Reference Guide.
    

## 1.2. Using a Registration Link

Registration Links are an alternate way of creating an authorisation transaction. If you create a registration link, you need not create a customer or an order.

When you create a registration link, an [invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices.md) is automatically issued to the customer. The customer can use the invoice to make the Authorisation Payment.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can use [Token Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/webhooks/#check-authorization-link-status-using-webhooks.md) to get notifications about successful payments against a registration link. Do not use payment webhooks for Authorisation Payments.
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
