---
title: Fetch Card Details of a Payment
description: Fetch Card Details of a Payment using Razorpay Payments API.
---

# Fetch Card Details of a Payment

## Fetch Card Details of a Payment

Use this endpoint to retrieve the details of the card used to make a payment.

### Response

```json: Success
{
  "id": "card_JXPULjlKqC5j0i",
  "entity": "card",
  "name": "Gaurav Kumar",
  "last4": "4366",
  "network": "Visa",
  "type": "credit",
  "issuer": "UTIB",
  "international": false,
  "emi": false,
  "sub_type": "consumer",
  "token_iin": null
}

```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "Payment was not done using card",
        "source": "NA",
        "step": "NA",
        "reason": "NA",
        "metadata": {}
    }
}
```

### Parameters

`id` _mandatory_
: `string` Unique identifier of the payment for which you want to retrieve card details.

### Parameters

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

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.

The id provided does not exist.
* code: 400
* description: The `payment_id` provided is incorrect.
* solution: Enter the correct `payment_id`.

Payment was not done using card.
* code: 400
* description: The payment for the `payment_id` entered was not completed using a card.
* solution: Use a `payment_id` which was completed using a card.
