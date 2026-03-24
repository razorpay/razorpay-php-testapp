---
title: Fetch All Payments (With Expanded Card Details)
description: Fetch all Payments (With Expanded Card Details) using Razorpay Payments API.
---

# Fetch All Payments (With Expanded Card Details)

## Fetch All Payments (With Expanded Card Details)

Use this endpoint to retrieve the expanded card details of the payments, where the payment method is `card`.

### Response

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "pay_KbC8Hxx98GVyYb",
      "entity": "payment",
      "amount": 1000,
      "currency": "INR",
      "status": "captured",
      "order_id": null,
      "invoice_id": null,
      "international": false,
      "method": "card",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": "Test Transaction",
      "card_id": "card_KbC8I0uOUzzcqX",
      "card": {
        "id": "card_KbC8I0uOUzzcqX",
        "entity": "card",
        "name": "",
        "last4": "3818",
        "network": "RuPay",
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
      "email": "gaurav.kumar@gmail.com",
      "contact": "+919000090000",
      "token_id": "token_KbC8IC6N0evwsl",
      "notes": {
        "address": "Razorpay Corporate Office"
      },
      "fee": 20,
      "tax": 0,
      "error_code": null,
      "error_description": null,
      "error_source": null,
      "error_step": null,
      "error_reason": null,
      "acquirer_data": {
        "auth_code": "600165",
        "authentication_reference_number": null // Pass AEVV as the value for AMEX card transactions.
      },
      "created_at": 1667397446
    },
    {
      "id": "pay_KbC4riXCVxRSj9",
      "entity": "payment",
      "amount": 1000,
      "currency": "INR",
      "status": "captured",
      "order_id": null,
      "invoice_id": null,
      "international": false,
      "method": "card",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": "Test Transaction",
      "card_id": "card_KbC4rldTyupyPI",
      "card": {
        "id": "card_KbC4rldTyupyPI",
        "entity": "card",
        "name": "",
        "last4": "3818",
        "network": "RuPay",
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
      "contact": "+919000090000",
      "notes": {
        "address": "Razorpay Corporate Office"
      },
      "fee": 20,
      "tax": 0,
      "error_code": null,
      "error_description": null,
      "error_source": null,
      "error_step": null,
      "error_reason": null,
      "acquirer_data": {
        "auth_code": "231868",
        "authentication_reference_number": null // Pass AEVV as the value for AMEX card transactions.
      },
      "created_at": 1667397252
    }
  ]
}
```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The api key provided is invalid",
        "source": "NA",
        "step": "NA",
        "reason": "NA",
        "metadata": {}
    }
}
```

### Parameters

`from` _optional_
: `integer` UNIX timestamp, in seconds, from when payments are to be fetched.

`to` _optional_
: `integer` UNIX timestamp, in seconds, till when payments are to be fetched.

`count` _optional_
: `integer` Number of payments to be fetched. 
 Default value is 10. Maximum value is 100. This can be used for pagination, in combination with the `skip` parameter.

`skip` _optional_
: `integer` Number of records to be skipped while fetching the payments.

`expand[]` _optional_
: `array` Used to retrieve additional information about the payment, the method used to make the payment. The response will include a sub-entity if this parameter is used. 
Possible values:
  - `card`: Expanded card details, usable for card and EMI payments.
  - `emi`: Expanded EMI plan details, usable for EMI payments.

### Parameters

`id`
: `string` Unique identifier of the payment.

`entity`
: `string` Indicates the type of entity.

`amount`
: `integer` The payment amount in currency subunits. For example, for an amount of  enter 100.

`currency`
: `string` The currency in which the payment is made. Refer to the list of [international currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md) that we support.

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
: `boolean` Indicates if the payment is captured. Possible values:
    - `true`: Payment has been captured.
    - `false`: Payment has not been captured.

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

   
> **WARN**
>
> 
>    **Watch Out!**
>   
>    Cardholder names for domestic cards are considered sensitive information and are not populated. 
>    

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
  : `string` The card issuer. The 4-character code denotes the issuing bank. This attribute will not be set for the card issued by a foreign bank.

  `emi`
  : `boolean` Indicates whether the card can be used for EMI payment method. Possible values:
     - `true`: Card can be used for EMI payments.
     - `false`: Card cannot be used for EMI payments.

  `sub_type`
  : `string` The sub-type of the customer's card. Possible values:
    - `customer` 
    - `business`

    
    Know how to accept payments made by customers using [corporate cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/corporate-cards.md).

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
  : `string` The type of UPI flow. Possible value `in_app`. The field `flow` is present only in the case of Turbo UPI Payments.

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

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.

Value of each expand must be one of following types: card, emi, transaction, refunds, offers, token, transaction.settlement .
* code: 400
* description: The value for the `expand` parameter is incorrect.
* solution: Enter the correct value for the `expand` parameter. Here it is `card`.
