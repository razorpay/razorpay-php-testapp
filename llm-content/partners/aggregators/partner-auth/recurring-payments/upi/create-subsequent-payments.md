---
title: 3. Create Subsequent Payments
description: Create and charge subsequent payments using Razorpay APIs after the customer's selected payment method is successfully authorised.
---

# 3. Create Subsequent Payments

Create and charge subsequent payments using Razorpay APIs after the customer's selected payment method is successfully authorised.

You should perform the following steps to create and charge your customer subsequent payments:
1. Create an order to charge the customer
2. Create a recurring payment

## 3.1. Create an Order to Charge the Customer
You have to create a new order every time you want to charge your customers. This order is different from the one created during the authorisation transaction.

The following endpoint creates an order.

/orders

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "amount":1000,
  "currency":"INR",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey... decaf."
  }
}'
```json: Response
{
   "id":"order_KmZQcRzcp2LroX",
   "entity":"order",
   "amount":1000,
   "amount_paid":0,
   "amount_due":1000,
   "currency":"INR",
   "receipt":"Receipt No. 1",
   "offer_id":null,
   "status":"created",
   "attempts":0,
   "notes":{
      "notes_key_1":"Tea, Earl Grey, Hot",
      "notes_key_2":"Tea, Earl Grey... decaf."
   },
   "created_at":1579782776
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the minimum value is 100 (₹1).

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`receipt` _optional_
: `string` A user-entered unique identifier for the order. For example, Receipt No. 1. You must map this parameter to the order_id sent by Razorpay.

`notes` _optional_
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, "note_key": "Beam me up Scotty”.

`payment_capture` _mandatory_
: `boolean` Determines whether tha payment status should be changed to captured automatically or not. Possible values:
    - `true`: Payments are captured automatically.
    - `false`: Payments are not captured automatically.

#### Response Parameters

`id`
: `string` A unique identifier of the order created. For example order_1Aa00000000001.

`entity`
: `string` The entity that has been created. Here it is order.

`amount`
: `integer` Amount in currency subunits.

`amount_paid`
: `integer` The amount that has been paid.

`amount_due`
: `integer` The amount that is yet to be paid.

`currency`
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`receipt`
: `string` A user-entered unique identifier of the order. For example, rcptid #1.

`status`
: `string` The status of the order.

`notes`
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, "note_key": "Beam me up Scotty”.

`created_at`
: `integer` The Unix timestamp at which the order was created.

`method`
: `string` The payment method used. Here, it is `card`.

## 3.2. Create a Recurring Payment
Once you have generated an `order_id`, use it with the `token_id` to create a payment and charge the customer. The following endpoint creates a payment to charge the customer.

/payments/create/recurring

- For UPI, it may take between 24-36 hours for the subsequent payment to reflect on your Dashboard.
- This is because of the failure of pre-debit notification and/or any retries that we attempt for the payment.
- Do not create another subsequent payment until you get the status of the previous one.
For UPI, do not create subsequent payments on the last day of the cycle. This will cause the payment to fail.

```curl: Curl
curl -X POST https://api.razorpay.com/v1/payments/create/recurring \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "email": "gaurav.kumar@example.com",
  "contact": "9876543210",
  "amount": 71000,
  "currency": "INR",
  "order_id": "order_KhUvbWvROaN5cu",
  "customer_id": "cust_KhOZydVZbcThjW",
  "token": "token_KhT8dzSCFruvfj",
  "recurring": true,
  "description": "Creating recurring payment for Kay Say",
  "notes": {
    "note_key 1": "i dare you",
    "note_key 2": "i double dare you"
  }
}'
```json: Response
{
  "razorpay_payment_id" : "pay_JnYhfTyEOagtYa",
  "razorpay_order_id" : "order_KhUvbWvROaN5cu",
  "razorpay_signature" : "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

#### Request Parameters

`email` _mandatory_
: `string` The customer's email address. For example, gaurav.kumar@example.com.

`contact` _mandatory_
: `integer` The customer's phone number. For example, 9876543210.

`amount` _mandatory_
: `integer` The amount you want to charge your customer. This should be the same as the order amount.

`currency` _mandatory_
: `string` 3-letter ISO currency code for the payment. Currently, only INR is allowed.

`order_id` _mandatory_
: `string` The unique identifier of the order created. For example, order_1Aa00000000002.

`customer_id` _mandatory_
: `string` The unique identifier of the customer you want to charge. For example, cust_1Aa00000000002.

`token` _mandatory_
: `string` The token_id generated when the customer successfully completes the authorisation payment. Different payment instruments for the same customer have different token_id.

`recurring` _mandatory_
: `boolean` Determines whether recurring payment is enabled or not.
    - `true`: Recurring payment is enabled.
    - `false`: Recurring payment is not enabled.

`description` _optional_
: `string` A user-entered description for the payment. For example, Creating recurring payment for Gaurav Kumar.

`notes` _optional_
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty"`.

#### Response Parameters

`razorpay_payment_id`
: `string` The unique identifier of the payment that is created. For example, pay_1Aa00000000001.

`razorpay_order_id`
: `string` The unique identifier of the order that is created. For example, order_1Aa00000000001.

`razorpay_signature`
: `string` The signature generated by the Razorpay. For example, 9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d
