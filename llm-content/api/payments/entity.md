---
title: Payments Entity
description: Know about payment entities and their description.
---

# Payments Entity

The Payments entity has the following parameters:

### Response

```json: Success
{
  "id": "pay_L0nSsccovt6zyp",
  "entity": "payment",
  "amount": 9900,
  "currency": "INR",
  "status": "captured",
  "order_id": "order_L0nS83FfCHaWqV",
  "invoice_id": "inv_L0nS7JIyuX6Lyb",
  "international": false,
  "method": "card",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": true,
  "description": "#L0nS7JIyuX6Lyb",
  "card_id": "card_L0nSsfPv1LjA20",
  "card": {
    "id": "card_L0nSsfPv1LjA20",
    "entity": "card",
    "name": "",
    "last4": "0153",
    "network": "Visa",
    "type": "debit",
    "issuer": null,
    "international": false,
    "emi": false,
    "sub_type": "consumer",
    "token_iin": null
  },
  "bank": null,
  "wallet": null,
  "vpa": null,
  "email": "gaurav.kumar@example.com",
  "contact": "+9000090000",
  "notes": [],
  "fee": 198,
  "tax": 0,
  "error_code": null,
  "error_description": null,
  "error_source": null,
  "error_step": null,
  "error_reason": null,
  "acquirer_data": {
    "auth_code": "299196",
    "authentication_reference_number": "100222021120200000000742753928" // Pass AEVV as the value for AMEX card transactions.
  },
  "created_at": 1672987417
}
```json: Failure
{
  "id": "pay_Kb8P4crStfXJea",
  "entity": "payment",
  "amount": 10000,
  "currency": "INR",
  "status": "failed",
  "order_id": null,
  "invoice_id": null,
  "international": false,
  "method": "card",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": false,
  "description": "Test Transaction",
  "card_id": "card_Kb8P4eO7zAsjQJ",
  "card": {
    "id": "card_Kb8P4eO7zAsjQJ",
    "entity": "card",
    "name": "",
    "last4": "0153",
    "network": "Visa",
    "type": "debit",
    "issuer": null,
    "international": false,
    "emi": false,
    "sub_type": "consumer",
    "token_iin": null
  },
  "bank": null,
  "wallet": null,
  "vpa": null,
  "email": "gaurav.kumar@example.com",
  "contact": "+9000090000",
  "notes": {
    "address": "Razorpay Corporate Office"
  },
  "fee": null,
  "tax": null,
  "error_code": "BAD_REQUEST_ERROR",
  "error_description": "Your payment has been cancelled. Try again or complete the payment later.",
  "error_source": "customer",
  "error_step": "payment_authentication",
  "error_reason": "payment_cancelled",
  "acquirer_data": {
    "auth_code": null
  },
  "created_at": 1667384312
}
```

### Parameters

`id`
: `string` Unique identifier of the payment.

`entity`
: `string` Indicates the type of entity.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as `295`.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>     

`currency`
: `string` The currency in which the payment is made. Refer to the list of [international currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md) that we support.

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

`status`
: `string` The status of the payment. Possible values:
  - `created`
  - `authorized`
  - `captured`
  - `refunded`
  - `failed`

`method`
: `string` The payment method used for making the payment. Possible values:
   
  - `card`

  - `netbanking`

  - `wallet`

  - `emi`

  - `upi`

  

`order_id`
: `string` Order id, if provided. Know more about [Orders](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/orders.md).

`description`
: `string` Description of the payment, if any.

`international`
: `boolean` Indicates whether the payment is done via an international card or a domestic one.

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
: `integer` Fee (including GST) charged by Razorpay.

`tax`
: `integer` GST charged for the payment.

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

`card`
: `object` Details of the card used to make the payment.

  `id`
  : `string` The unique identifier of the card used by the customer to make the payment.

  `entity`
  : `string` The name of the entity. Here, it is `card`.

  `name`
  : `string` Name of the cardholder.

  `last4`
  : `integer` The last 4 digits of the card number.

  

  `network`
  : `string` The card network. Possible values:
    - `American Express`
    - `Diners Club`
    - `Maestro`
    - `MasterCard`
    - `RuPay`
    - `Unknown`
    - `Visa`
  
  

  

  

  

  `type`
  : `string` The card type. Possible values:
    - `credit`
    - `debit`
    - `prepaid`
    - `unknown`

  `issuer`
  : `string` The card issuer. The 4-character code denotes the issuing bank. 

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     This attribute will not be set for the card issued by a foreign bank.
>     

  

  `emi`
  : `boolean` This attribute is set to `true` if the card can be used for EMI payment method.

  

  `sub_type`
  : `string` The sub-type of the customer's card. Possible values:
    - `customer` 
    - `business`
      
> **INFO**
>
> 
>       **Handy Tips**
> 
>       Know how to accept payments made by customers using [corporate cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/corporate-cards.md).
>       

`upi`
: `object` Details of the UPI payment received. Only applicable if `method` is `upi`.

  `payer_account_type`
  : `string` The payment method used for making the payment. Possible values:
    - `bank_account`
    - `credit_card`
    - `wallet`

  `vpa`
  : `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.

  `flow` 
  : `string` The type of UPI flow. Possible value `in_app`.
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     The field `flow` is present only in the case of Turbo UPI Payments.
>     

`bank`
: `string` The 4-character bank code which the customer's account is associated with. For example, `UTIB` for Axis Bank.

`vpa`
: `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.

`wallet`
: `string` The name of the wallet used by the customer to make the payment. For example, `payzapp`.

`acquirer_data`
: `array` A dynamic array consisting of a unique reference numbers. 

    `rrn`
    : `string` A unique bank reference number provided by the banking partner when a refund is processed. This reference number can be used by the customer to track the status of the refund with the bank.

    

    `authentication_reference_number`
    : `string` A unique reference number generated for RuPay card payments.

    
    
    `bank_transaction_id`
    : `string` A unique reference number provided by the banking partner in case of netbanking payments.
