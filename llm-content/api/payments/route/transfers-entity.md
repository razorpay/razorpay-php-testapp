---
title: Transfers Entity
description: Know about transfers entity parameters and their description.
---

# Transfers Entity

## Transfers Entity

The transfers entity has the following parameters.

### Response

```json: Entity
{
  "entity":"collection",
  "count":2,
  "items":[
    {
      "id":"trf_ECB6hP5cyN30pU",
      "entity":"transfer",
      "transfer_status":"failed",
      "settlement_status":null,
      "source":"pay_EB1R2s8D4vOAKG",
      "recipient":"acc_CNo3jSI8OkFJJJ",
      "amount":100,
      "currency":"INR",
      "amount_reversed":0,
      "notes":{
        "name":"Saurav Kumar",
        "roll_no":"IEC2011026"
      },
      "error":{
        "code":"BAD_REQUEST_TRANSFER_INSUFFICIENT_BALANCE",
        "description":"Transfer failed due to insufficient balance",
        "field":null,
        "source":"transfer",
        "step":"balance_check",
        "reason":"insufficient_balance"
      },
      "fees":1,
      "tax":0,
      "on_hold":false,
      "on_hold_until":null,
      "recipient_settlement_id":null,
      "created_at":1580712811,
      "linked_account_notes":[
        "roll_no"
      ],
      "processed_at":1580712811
    },
    {
      "id":"trf_ECB6hP5cyN30pU",
      "entity":"transfer",
      "transfer_status":"failed",
      "settlement_status":null,
      "source":"pay_EB1R2s8D4vOAKG",
      "recipient":"acc_CNo3jSI8OkFJJJ",
      "amount":100,
      "currency":"INR",
      "amount_reversed":0,
      "notes":{
        "name":"Saurav Kumar",
        "roll_no":"IEC2011026"
      },
      "error":{
        "code":"BAD_REQUEST_PAYMENT_FEES_GREATER_THAN_AMOUNT",
        "description":"Transfer amount was greater than amount available for transfer",
        "field":null,
        "source":"transfer",
        "step":"amount_validation",
        "reason":"transfer_amount_higher_than_balance"
      },
      "fees":1,
      "tax":0,
      "on_hold":false,
      "on_hold_until":null,
      "recipient_settlement_id":null,
      "created_at":1580712811,
      "linked_account_notes":[
        "roll_no"
      ],
      "processed_at":1580712811
    }
  ]
}
```

### Parameters

`id` 
: `string`  Unique identifier of the transfer.

`entity`
: `string` The name of the entity. Here, it is `transfer`.

`transfer_status`
: `string` The status of the transfer. Possible values are:
    - `created`
    - `pending`
    - `processed`
    - `failed`
    - `reversed`
    - `partially_reversed`

`settlement_status`
: `string` The status of the settlement. Possible values are:
    - `pending`
    - `on_hold`
    - `settled`

`source` 
: `string` Unique identifier of the transfer source. The source can be a `payment` or an `order`.

`recipient` 
: `string` Unique identifier of the transfer destination, that is, the Linked Account.

`amount` 
: `integer` The amount to be transferred to the Linked Account, in paise. For example, for an amount of ₹200.35, the value of this field should be 20035.

`currency` 
: `string`  ISO currency code. We support route transfers only in `INR`.

`amount_reversed` 
: `integer` Amount reversed from this transfer for refunds.

`notes` 
: `json object` Set of key-value pairs that can be associated with an entity. These pairs can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "Bangalore"`.

`error`
: `string` Provides error details that may occur during transfers.

    `code`
    : `string` Type of the error.

    `description`
    : `string` Error description.

    `field`
    : `string` Name of the parameter in the API request that caused the error.

    `source`
    : `string` The point of failure in the specific operation. For example, customer, business and so on.

    `step`
    : `string` The stage where the transaction failure occurred. Stages can be different depending on the payment method used to make the transaction.

    `id`
    : `string`  Unique identifier of the transfer.

    `reason`
    : `string` The exact error reason. It can be handled programmatically.

`linked_account_notes` 
: `array` List of keys from the `notes` object which needs to be shown to Linked Accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

`on_hold` 
: `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
    - `true`: Puts the settlement on hold.
    - `false`: Releases the settlement.

`on_hold_until` 
: `integer` Timestamp, in Unix format, indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.

`recipient_settlement_id`
: `string` Unique identifier of the settlement.

`created_at` 
: `integer` Timestamp, in Unix, at which the record was created.
