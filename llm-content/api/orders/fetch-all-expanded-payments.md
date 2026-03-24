---
title: Fetch All Orders (With Expanded Payments)
description: Expand payments object when fetching Order details using Razorpay Orders API.
---

# Fetch All Orders (With Expanded Payments)

## Fetch All Orders (With Expanded Payments)

Use this endpoint to retrieve the details of all the orders that you created, with the payment parameter expanded.

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/orders?expand[]=payments

```

### Response

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "order_EpMTIJM0rhOj3H",
      "entity": "order",
      "amount": 10000,
      "amount_paid": 0,
      "amount_due": 10000,
      "currency": "",
      "receipt": null,
      "payments": {
        "entity": "collection",
        "count": 1,
        "items": [
          {
            "id": "pay_EpMq4YcK0z5UYk",
            "entity": "payment",
            "amount": 10000,
            "currency": "",
            "status": "authorized",
            "order_id": "order_EpMTIJM0rhOj3H",
            "invoice_id": null,
            "international": false,
            "method": "card",
            "amount_refunded": 0,
            "refund_status": null,
            "captured": false,
            "description": null,
            "card_id": "card_EpMq4e7H6fHBQZ",
            "bank": null,
            "wallet": null,
            "vpa": null,
            "email": "",
            "contact": "",
            "notes": [],
            "fee": null,
            "tax": null,
            "error_code": null,
            "error_description": null,
            "error_source": null,
            "error_step": null,
            "error_reason": null,
            "created_at": 1589269390
          }
        ]
      },
      "offer_id": null,
      "status": "attempted",
      "attempts": 1,
      "notes": [],
      "created_at": 1589268096
    },
    {
      "id": "order_Eoryq8z9wd0y7i",
      "entity": "order",
      "amount": 10000,
      "amount_paid": 0,
      "amount_due": 10000,
      "currency": "",
      "receipt": null,
      "payments": {
        "entity": "collection",
        "count": 1,
        "items": [
          {
            "id": "pay_EpMr7r6DRIdYPO",
            "entity": "payment",
            "amount": 10000,
            "currency": "",
            "status": "authorized",
            "order_id": "order_Eoryq8z9wd0y7i",
            "invoice_id": null,
            "international": false,
            "method": "card",
            "amount_refunded": 0,
            "refund_status": null,
            "captured": false,
            "description": null,
            "card_id": "card_EpMr7y6E5cDXvd",
            "bank": null,
            "wallet": null,
            "vpa": null,
            "email": "",
            "contact": "",
            "notes": [],
            "fee": null,
            "tax": null,
            "error_code": null,
            "error_description": null,
            "error_source": null,
            "error_step": null,
            "error_reason": null,
            "created_at": 1589269450
          }
        ]
      },
      "offer_id": null,
      "status": "attempted",
      "attempts": 1,
      "notes": [],
      "created_at": 1589160718
    }
  ]
}
```

### Parameters

`expand[]=payments`
: `string` Use to expand the payments made for an order.

### Parameters

`id`
: `string` The unique identifier of the order.

`amount`
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

`entity`
: `string` Name of the entity. Here, it is `order`.

`amount_paid`
: `integer` The amount paid against the order.

`amount_due`
: `integer` The amount pending against the order.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters. Refer to the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).  

`receipt`
: `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

`status`
: `string` The status of the order. Possible values:
  - `created`: When you create an order it is in the `created` state. It stays in this state till a payment is attempted on it.
  - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
  - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` Indicates the Unix timestamp when this order was created.

`payments`
: `object` Details of the payment.

    `id`
    : `string` Unique identifier of the payment.

    `entity`
    : `string` Indicates the type of entity.

    `amount`
    : `integer` The payment amount in currency subunits. For example, for an amount of  enter 100.

    `currency`
    : `string` The currency in which the payment is made.

    `status`
    : `string` The status of the payment. Possible values:
      - `created`
      - `authorized`
      - `captured`
      - `refunded`
      - `failed`

    

    `method`
    : `string` The payment method used for making the payment. Possible values:- `card`
- `netbanking`
- `wallet`
- `upi`
- `emi`

    

    

    

    

    `order_id`
    : `string` Order id, if provided. Know more about [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders.md).

    `description`
    : `string` Description of the payment, if any.

    `international`
    : `boolean` Indicates whether the payment is done via an international card or a domestic one. Possible values:
      - `true`: Payment made using international card.
      - `false`: Payment not made using international card.

    `refund_status`
    : `string` The refund status of the payment. Possible values:
      - `null`
      - `partial` 
      - `full`

    `amount_refunded`
    : `integer` The amount refunded in currency subunits. For example, if `amount_refunded = 100`, it is equal to .

    `captured`
    : `boolean` Indicates if the payment is captured.

    `email`
    : `string` Customer email address used for the payment.

    `contact`
    : `string` Customer contact number used for the payment.

    `fee`
    : `integer` Fee (including tax) charged by us.

    `tax`
    : `integer` Tax charged for the payment.

    `error_code`
    : `string` Error that occurred during payment. For example, `BAD_REQUEST_ERROR`.

    `error_description`
    : `string` Description of the error that occurred during payment. For example, `Payment processing failed because of incorrect OTP`.

    `error_source`
    : `string` The point of failure. For example, `customer`.

    `error_step`
    : `string` The stage where the transaction failure occurred. The stages can vary depending on the payment method used to complete the transaction. For example, `payment_authentication`.

    `error_reason`
    : `string` The exact error reason. For example, `incorrect_otp`.

    `notes`
    : `json object` Contains user-defined fields, stored for reference purposes.

    `created_at`
    : `integer` Timestamp, in UNIX format, on which the payment was created.

    `card_id`
    : `string` The unique identifier of the card used by the customer to make the payment.
     
    
    
    `wallet`
    : `string` The name of the wallet used by the customer to make the payment. For example, `payzapp`.

    

    `acquirer_data`
    : `array` A dynamic array consisting unique reference numbers. 

        `rrn`
        : `string` A unique bank reference number provided by the banking partner when a refund is processed. This reference number can be used by the customer to track the status of the refund with the bank.

        
         
        `authentication_reference_number`
        : `string` A unique reference number generated for RuPay card payments.

        `bank_transaction_id`
        : `string` A unique reference number provided by the banking partner in case of netbanking payments.

        

    

    `bank`
    : `string` The 4-character bank code which the customer's account is associated with. For example, `UTIB` for Axis Bank.

    

    

    

     

    `upi`
    : `object` Details of the UPI payment received. Applicable if `method` is `upi`.

        `payer_account_type`
        : `string` The payment method used for making the payment. Possible values:
            - `bank_account`
            - `credit_card`
            - `wallet`

        `vpa`
        : `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.

    `vpa`
    : `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.
