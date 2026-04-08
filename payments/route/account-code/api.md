---
title: Transfers API and Webhooks
description: Use Account Code parameter as an alternative to Account ID in the Transfers API.
---

# Transfers API and Webhooks

The `account_code` parameter must be passed only in Transfers API.

## Postman Collection

We have a Postman collection to make the integration quicker and easier. Click the **Download Postman Collection** button below to get started.

[Download Postman Collection](https://app.getpostman.com/run-collection/e35a6d91a76a57519889)

## Instructions for Using Postman Collection

- All Razorpay APIs are authenticated using Basic Authentication.
  - [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.
  - Add your API Keys in Postman. Selected the required API → Auth → Type = Basic Auth → Username = [Your_Key_ID]; Password = [Your_Key_secret]
  
- Some APIs in the collection require data specific to your account either in the request body or as path or query parameters.
  - For example, the create Transfers via Payments API requires you to add the `pay_id` as a path parameter in the endpoint.
  - These parameters are enclosed in \{\} in the collection. For example, \{pay_id\}.
  - The API throws an error if this value is incorrect or does not exist in your system.

## Transfer Entity

The attributes of the `transfer` entity are listed below:

`id`
: `string`  Unique identifier of the transfer.

`entity`
: `string` The name of the entity. Here, it is `transfer`.

`source`
: `string` Unique identifier of the transfer source. The source can be a `payment` or an `order`.

`recipient`
: `string` Unique identifier of the transfer destination, that is, the linked account.

`account_code`
: `string` An alternative to the linked account ID. 
- Minimum character length is 3 and maximum is 20.
- Alphanumeric (A-Z, a-z, 0-9), periods (.), dashes(-) and underscores(_). Alphabets are case-sensitive.

`amount`
: `integer` The amount to be transferred to the linked account, in paise. For example, for an amount of ₹200.35, the value of this field should be 20035.

`currency`
: `string`  ISO currency code. We support route transfers only in `INR`.

`amount_reversed`
: `integer` Amount reversed from this transfer for refunds.

`notes` 
: `json object` Set of key-value pairs that can be associated with an entity.  This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "bangalore"`.

`linked_account_notes` 
: `array` List of keys from the `notes` object which needs to be shown to linked accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

`on_hold`
: `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
    - `true`: Puts the settlement on hold.
    - `false`: Releases the settlement.

`on_hold_until`
: `integer` Timestamp, in Unix format, that indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.

`recipient_settlement_id`
: `string` Unique identifier of the settlement.

`created_at`
: `integer` Timestamp, in Unix, at which the record was created.

```json: Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "trf_ECB6hBEYWuQkEC",
      "entity": "transfer",
      "source": "pay_EB1R2s8D4vOAKG",
      "recipient": "acc_CPRsN1LkFccllA",
      "account_code": "GoodWill_Traders-1."
      "amount": 100,
      "currency": "INR",
      "amount_reversed": 0,
      "notes": {
        "name": "Gaurav Kumar",
        "roll_no": "IEC2011025"
      },
      "fees": 1,
      "tax": 0,
      "on_hold": true,
      "on_hold_until": 1671222870,
      "recipient_settlement_id": null,
      "created_at": 1580712811,
      "linked_account_notes": [
        "roll_no"
      ],
      "processed_at": 1580712811
    },
    {
      "id": "trf_ECB6hP5cyN30pU",
      "entity": "transfer",
      "source": "pay_EB1R2s8D4vOAKG",
      "recipient": "acc_CNo3jSI8OkFJJJ",
      "account_code": "GoodWill_Traders-2."
      "amount": 100,
      "currency": "INR",
      "amount_reversed": 0,
      "notes": {
        "name": "Saurav Kumar",
        "roll_no": "IEC2011026"
      },
      "fees": 1,
      "tax": 0,
      "on_hold": false,
      "on_hold_until": null,
      "recipient_settlement_id": null,
      "created_at": 1580712811,
      "linked_account_notes": [
        "roll_no"
      ],
      "processed_at": 1580712811
    }
  ]
}
```

## Create Transfers from Orders

Use the following endpoint to create transfers from orders.

/orders

```curl: Request
curl -X POST https://api.razorpay.com/v1/orders \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type: application/json'
-d '{
  "amount": 2000,
  "currency": "INR",
  "transfers": [
    {
      "account_code": "GoodWill_Traders-1."
      "amount": 1000,
      "currency": "INR",
      "notes": {
        "branch": "GoodWill Traders Bangalore North",
        "name": "Gaurav Kumar"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": true,
      "on_hold_until": 1671222870
    },
    {
      "account_code": "GoodWill_Traders-2."
      "amount": 1000,
      "currency": "INR",
      "notes": {
        "branch": "GoodWill Traders Bangalore South",
        "name": "Saurav Kumar"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": false
    }
  ]
}'

```json: Response
{
  "id": "order_E9uTczH8uWPCyQ",
  "entity": "order",
  "amount": 2000,
  "amount_paid": 0,
  "amount_due": 2000,
  "currency": "INR",
  "receipt": null,
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1580217565,
  "transfers": [
    {
      "recipient": "acc_CPRsN1LkFccllA",
      "account_code": "GoodWill_Traders-1."
      "amount": 1000,
      "currency": "INR",
      "notes": {
        "branch": "GoodWill Traders Bangalore North",
        "name": "Gaurav Kumar"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": true,
      "on_hold_until": 1671222870
    },
    {
      "recipient": "acc_CNo3jSI8OkFJJJ",
      "account_code": "GoodWill_Traders-2."
      "amount": 1000,
      "currency": "INR",
      "notes": {
        "branch": "GoodWill Traders Bangalore South",
        "name": "Saurav Kumar"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": false,
      "on_hold_until": null
    }
  ]
}
```

You can set up transfer of funds right at the time of order creation using the Orders API. This can be done by passing the `transfers` parameters as part of the Order API request body.

/orders

### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount, in paise. For example, for an amount of ₹299.35, the value of this field should be 29935.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. We support only `INR` for Route transactions.

`receipt` _optional_
: `string` Unique identifier that you can use for internal reference.

`transfers`
: `json object` Details regarding the transfer.

    `account` _mandatory if `account_code` is not passed_
    : `string` Unique identifier of the linked account to which the transfer is to be made.

    `account_code` _mandatory if `account` is not passed_
    : `string` An alternative unique identifier of the linked account ID.

    `amount` _mandatory_
    : `integer` The amount to be transferred to the linked account. For example, for an amount of ₹200.35, the value of this field should be 20035. This amount cannot exceed the order amount.

    `currency` _mandatory_
    : `string` The currency in which the transfer should be made. We support only `INR` for Route transactions.

    `notes` _optional_
    : `json object` Set of key-value pairs that can be associated with an entity.  This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "bangalore"`.

    `linked_account_notes` _optional_
    : `array` List of keys from the `notes` object which needs to be shown to linked accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

    `on_hold` _optional_
    : `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
        - `true`: Puts the settlement on hold.
        - `false`: Releases the settlement.

    `on_hold_until` _optional_
    : `integer` Timestamp, in Unix format, that indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.

> **INFO**
>
> 
> **Note**
> 
> Pass either account or account_code. Do not pass both the parameters.
> 

### Response Parameters

`id`
: `string` Unique identifier of the Order created.

`entity`
: `string` The name of the entity. Here, it is `order`.

`amount`
: `integer` The Order amount, in paise. For example, for an amount of ₹299.35, the value of this field should be 29935.

`amount_paid`
: `integer` The amount paid against the Order.

`amount_due`
: `integer` The amount pending against the Order.

`currency`
: `string` The currency in which the order should be created. We support only `INR` for Route transactions.

`receipt`
: `string` Unique identifier that you can use for internal reference.

`status`
: `string` The status of the Order. Possible values:
  - created
  - attempted
  - paid

`notes`
: `json object` Set of key-value pairs that can be associated with an entity.  This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported.

`created_at`
: `integer` Timestamp, in Unix, that indicates when this Order was created.

`transfers`
: `json object` Details regarding the transfer.

    `recipient`
    : `string` Unique identifier of the linked account to which the transfer is to be made.

    `account_code`
    : `string` An alternative unique identifier of the linked account ID.

    `amount`
    : `integer` The amount to be transferred to the linked account, in paise. For example, for an amount of ₹200.35, the value of this field should be 20035. This amount cannot exceed the order amount.

    `currency`
    : `string` The currency in which the transfer should be made. We support only `INR` for Route transactions.

    `notes` 
    : `json object` Set of key-value pairs that can be associated with an entity.  This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "bangalore"`.

    `linked_account_notes` 
    : `array` List of keys from the `notes` object which needs to be shown to linked accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

    `on_hold`
    : `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
      - `true`: Puts the settlement on hold.
      - `false`: Releases the settlement.

    `on_hold_until`
    : `integer` Timestamp, in Unix, that indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.

> **INFO**
>
> 
> **Notes**
> 
> - You cannot create transfers on an order which has `partial_payment` parameter enabled. Ensure that this parameter is set to `0`.
> - You cannot create transfers on an order for international currencies. Currently, this feature only supports orders created using INR.
> 

## Create Transfers from Payments

You can create and capture payments in the regular payments flow, using [Razorpay Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md) and [Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment).

To disburse payments using Razorpay Route, there is an additional step in the payment flow called transfers which is described below:

1. Customer pays the amount via normal payment flow.
2. Once the payment is `captured`, you can initiate a transfer to linked accounts with a transfer API call. You have to specify the details of the `account_id` and `amount`.

The following endpoint transfers a `captured` payment to one or more linked accounts using `account_id`. On a successful transfer, a response will be generated with a collection of transfer entities created for the payment.

/payments/:id/transfers

> **WARN**
>
> 
> **Transfer Requirements**
> 
> - Your account must have sufficient funds to process the transfer to the linked account. The transfer will fail in case of insufficient funds.
> - Only `captured` payments can be transferred.
> - You can create more than one transfer on a `payment_id`. This holds good as long as the total transfer amount does not exceed the captured payment amount.
> - A transfer cannot be requested on a payment once a refund has been initiated.
> 

In the sample request given, transfers to multiple linked accounts are specified. The payments transferred to the linked accounts will be settled to their respective bank accounts as per the pre-defined `settlement_period`.

```curl: Request
curl -X POST https://api.razorpay.com/v1/payments/pay_E8JR8E0XyjUSZd/transfers \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type: application/json'
-d '{
  "transfers": [
    {
      "account_code": "GoodWill_Traders-1."
      "amount": 100,
      "currency": "INR",
      "notes": {
        "name": "Gaurav Kumar",
        "roll_no": "IEC2011025"
      },
      "linked_account_notes": [
        "roll_no"
      ],
      "on_hold": true,
      "on_hold_until": 1671222870
    },
    {
      "account_code": "GoodWill_Traders-2."
      "amount": 100,
      "currency": "INR",
      "notes": {
        "name": "Saurav Kumar",
        "roll_no": "IEC2011026"
      },
      "linked_account_notes": [
        "roll_no"
      ],
      "on_hold": false
    }
  ]
}'

```json: Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "trf_E9uhYLFLLZ2pks",
      "entity": "transfer",
      "source": "pay_E8JR8E0XyjUSZd",
      "recipient": "acc_CPRsN1LkFccllA",
      "account_code": "GoodWill_Traders-1."
      "amount": 100,
      "currency": "INR",
      "amount_reversed": 0,
      "notes": {
        "name": "Gaurav Kumar",
        "roll_no": "IEC2011025"
      },
      "fees": 1,
      "tax": 0,
      "on_hold": true,
      "on_hold_until": 1671222870,
      "recipient_settlement_id": null,
      "created_at": 1580218356,
      "linked_account_notes": [
        "roll_no"
      ],
      "processed_at": 1580218357
    },
    {
      "id": "trf_E9uhYYeckSXd5H",
      "entity": "transfer",
      "source": "pay_E8JR8E0XyjUSZd",
      "recipient": "acc_CNo3jSI8OkFJJJ",
      "account_code": "GoodWill_Traders-1."
      "amount": 100,
      "currency": "INR",
      "amount_reversed": 0,
      "notes": {
        "name": "Saurav Kumar",
        "roll_no": "IEC2011026"
      },
      "fees": 1,
      "tax": 0,
      "on_hold": false,
      "on_hold_until": null,
      "recipient_settlement_id": null,
      "created_at": 1580218357,
      "linked_account_notes": [
        "roll_no"
      ],
      "processed_at": 1580218357
    }
  ]
}
```

### Path Parameter

`id` _mandatory_
: `string` Unique identifier of the payment on which the transfer must be created.

### Request Parameters

`transfers`
: `json object` Details regarding the transfer.

    `account` _mandatory if `account_code` is not passed_
    : `string` Unique identifier of the linked account to which the transfer is to be made.

    `account_code` _mandatory if `account` is not passed_
    : `string` An alternative unique identifier of the linked account ID.

    `amount` _mandatory_
    : `integer` The amount to be transferred to the linked account. For example, for an amount of ₹200.35, the value of this field should be 20035.

    `currency` _mandatory_
    : `string` The currency in which the transfer should be made. We support only `INR` for Route transactions.

    `notes` _optional_
    : `json object` Set of key-value pairs that can be associated with an entity.  This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "bangalore"`.

    `linked_account_notes` _optional_
    : `array` List of keys from the `notes` object which needs to be shown to linked accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

    `on_hold`
    : `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
      - `true`: Puts the settlement on hold.
      - `false`: Releases the settlement.

    `on_hold_until`
    : `integer` Timestamp, in Unix, that indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.

> **INFO**
>
> 
> **Note**
> 
> Pass either account or account_code. Do not pass both the params.
> 

### Response Parameters

The response parameters are same as the [transfer entity parameters](#transfer-entity).

## Direct Transfers

You can transfer funds to your linked accounts directly from your account balance using the Direct Transfers API.

/transfers

This API creates a direct transfer of funds from your account to linked account.
On successful creation, the API responds with the created `transfer` entity.

```curl: Request
curl -X POST https://api.razorpay.com/v1/transfers \1
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type: application/json' \
-d '{
  "account_code": "GoodWill_Traders-1."
  "amount": 100,
  "currency": "INR"
}'

```json: Response
{
  "id": "trf_E9utgtfGTcpcmm",
  "entity": "transfer",
  "source": "acc_CJoeHMNpi0nC7k",
  "recipient": "acc_CPRsN1LkFccllA",
  "account_code": "GoodWill_Traders-1."
  "amount": 100,
  "currency": "INR",
  "amount_reversed": 0,
  "notes": [],
  "fees": 1,
  "tax": 0,
  "on_hold": false,
  "on_hold_until": null,
  "recipient_settlement_id": null,
  "created_at": 1580219046,
  "linked_account_notes": [],
  "processed_at": 1580219046
}
```

### Request Parameters

`account` _mandatory if `account_code` is not passed_
: `string` Unique identifier of the linked account to which the transfer must be made.

`account_code` _mandatory if `account` is not passed_
: `string` Alternate unique identifier of the linked account to which the transfer must be made.

`amount` _mandatory_
: `integer` The amount (in paise) to be transferred to the linked account. For example, for an amount of ₹200.35, the value of this field should be 20035.

`currency` _mandatory_
: `string` The currency used in the transaction. We support only `INR` for Route transactions.

`notes` _optional_
: `json object` Set of key-value pairs that can be associated with an entity.  This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported.

> **INFO**
>
> 
> **Note**
> 
> Pass either account or account_code. Do not pass both the params.
> 

The response parameters are same as the [transfer entity parameters](#transfer-entity).

## Webhook

The `account_code` parameter appears in the `transfer.processed` event payload.

```json: transfer.processed
{
  "entity": "event",
  "account_id": "acc_CJoeHMNpi0nC7k",
  "event": "transfer.processed",
  "contains": [
    "transfer"
  ],
  "payload": {
    "transfer": {
      "entity": {
        "id": "trf_EB1gHgrzOZff6d",
        "entity": "transfer",
        "source": "order_EB1gHfAfmr65cS",
        "recipient": "acc_CNo3jSI8OkFJJJ",
        "account_code": "GoodWill_Traders-1.",
        "amount": 100,
        "currency": "INR",
        "amount_reversed": 0,
        "notes": {
          "branch": "GoodWill Traders Bangalore South",
          "name": "Saurav Kumar"
        },
        "fees": 1,
        "tax": 0,
        "on_hold": false,
        "on_hold_until": null,
        "recipient_settlement_id": null,
        "created_at": 1580461276,
        "linked_account_notes": [
          "branch"
        ],
        "processed_at": 1580461335
      }
    }
  },
  "created_at": 1580461335
}
```
