---
title: API Reference
description: Check the Razorpay Wallet APIs.
---

# API Reference

> **WARN**
>
> 
> **Watch Out!**
> 
> We have discontinued support for this product, effective April 2023. As a result, we will not be onboarding new users for this product anymore.
> 

Refer to the [API Reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md) guide to understand the basic concepts of API.

> **INFO**
>
> 
> **Handy Tips**
> 
> Before creating a wallet, you must create a [customer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#create-a-customer).
> 

## Transfer a Payment

Use the below endpoint to transfer a payment to a customer's wallet. If the customer wallet entity does not exist, the `transfers` endpoint creates a wallet for a `customer_id`. The amount which you transfer gets credited to this wallet.

/payments/:id/transfers

When the request is successful, the wallet gets credited with the transferred amount and the corresponding `customer_transaction` and `transfer` entities are created.

The following validations apply to the payment transfer request:
- The transfer amount can be set to a value less than or equal to the payment amount captured.
- The transfer amount is debited from your account balance. The transfer will fail if there is insufficient balance.
- You can only request for a transfer to one `customer_id` in an API call.
- The transfer request fails if the `customer_id` provided is invalid or does not exist.

> **WARN**
>
> 
> **Watch Out!**
> 
> The wallet is created only if the customer’s contact number is a valid Indian mobile number, failing which, an error is returned.
> 

```curl: Request
curl -X POST https://api.razorpay.com/v1/payments/pay_00000000000001/transfers \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type: application/json' \
-d '{
  "transfers": [
    {
      "customer": "cust_MrZYbZYSmbUxz9",
      "amount": 100,
      "currency": "INR",
      "notes": {
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey decaf"
      }
    }
  ]
}'
```json: Response
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "trf_N1vfI74toJ5WU0",
      "entity": "transfer",
      "status": "created",
      "source": "pay_MrZifnGzMM6V3W",
      "recipient": "cust_MrZYbZYSmbUxz9",
      "amount": 100,
      "currency": "INR",
      "amount_reversed": 0,
      "notes": {
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey decaf"
      },
      "linked_account_notes": [],
      "on_hold": false,
      "on_hold_until": null,
      "recipient_settlement_id": null,
      "created_at": 1700308808,
      "processed_at": null,
      "error": {
        "code": null,
        "description": null,
        "reason": null,
        "field": null,
        "step": null,
        "id": "trf_N1vfI74toJ5WU0",
        "source": null,
        "metadata": null
      }
    }
  ]
}
```

#### Path Parameters

`id` _mandatory_
: `string` Unique identifier for the payment which you want to transfer to the wallet. For example, `pay_00000000000001`.

#### Request Parameters

`transfers`
: Details regarding the transfer.

  `customer` _mandatory_
  : `string` Unique identifier of the customer to whom the wallet is linked.

  `amount` _mandatory_
  : `integer` The amount to be transferred to the linked account. For an amount of ₹200.35, pass `20035`.

  `currency` _mandatory_
  : `string` The currency in which the transfer should be made. We support only `INR` for Route transactions.

  `notes` _optional_
  : `object` Key-value pairs you can attach to an entity for internal reference. Maximum 15 pairs, 256 characters each. For example,`"note_key": "Beam me up Scotty”`.

#### Response Parameters

`id`
: `string` Unique identifier of the transfer. For example, `trf_00000000000001`.

`entity`
: `string` The name of the entity. Here, it is `transfer`.

`status`
: `string` The status of the transfer. Possible values:
  - `created`
  - `processed`
  - `failed`
  
  
> **WARN**
>
> 
>   **Watch Out!**
>   
>   The values `processed` and `failed` are relevant only for users who have subscribed to specific webhooks. Ensure that you have subscribed to the following webhooks to utilize these values:
>     - `transfer_processed` 
>     - `transfer_failed`
>   

`source`
: `string` Unique identifier of the transfer source. For example, `pay_00000000000001`.

`recipient`
: `string` Unique identifier of the customer to whom the transfer was made. For example, `cust_00000000000001`.

`amount`
: `integer` The amount, in paise, to be transferred to the wallet. For an amount of ₹200.35, pass `20035`.

`currency`
: `string` 3-letter ISO currency code for the transfer. Currently, we only support `INR`.

`amount_reversed`
: `integer` Amount reversed from this transfer for refunds.

`fees`
: `integer` Fees, in paise, charged for the transfer. `500` means ₹5.

`tax`
: `integer` Tax, in paise, deducted for the fee charged. `200` means ₹2.

`notes`
: `json object` Set of key-value pairs that can be associated with an entity.  This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "bangalore"`.

`linked_account_notes`
: `array` List of keys from the `notes` object which needs to be shown to linked accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

`on_hold`
: `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
    - `true`: Puts the settlement on hold.
    - `false`: Releases the settlement.

`on_hold_until`
: `integer` Timestamp, in Unix, that indicates until when the settlement of the transfer must be put on hold. If no value is passed, and `on_hold` = 1, the settlement is put on hold indefinitely.

`recipient_settlement_id`
: `string` Unique identifier of the settlement.

`created_at`
: `integer` Timestamp, in Unix, at which the record was created. For example, `1462887226`.

#### Webhooks

The table below lists the Webhook events you can subscribe for this API:

Webhook Event | Description
---
`transfer.processed` | Triggered when a transfer made to a Linked Account is processed.
---
`transfer.failed` | Triggered when a transfer made to a Linked Account has failed.

#### Sample Payloads

```json: Transfer Processed
{
  "entity": "event",
  "account_id": "acc_MDbiQ3Ryz14HMM",
  "event": "transfer.processed",
  "contains": [
    "transfer"
  ],
  "payload": {
    "transfer": {
      "entity": {
        "id": "trf_N1vfI74toJ5WU0",
        "entity": "transfer",
        "status": "processed",
        "source": "pay_MrZifnGzMM6V3W",
        "recipient": "cust_MrZYbZYSmbUxz9",
        "amount": 100,
        "currency": "INR",
        "amount_reversed": 0,
        "fees": 0,
        "tax": 0,
        "notes": {
          "notes_key_1": "transfer2"
        },
        "linked_account_notes": [],
        "on_hold": false,
        "on_hold_until": null,
        "settlement_status": null,
        "recipient_settlement_id": null,
        "created_at": 1700308808,
        "processed_at": null,
        "error": {
          "code": null,
          "description": null,
          "reason": null,
          "field": null,
          "step": null,
          "id": "trf_N1vfI74toJ5WU0",
          "source": null,
          "metadata": null
        }
      }
    }
  },
  "created_at": 1700308808
}

```json: Transfer Failed
{
  "entity": "event",
  "account_id": "acc_MDbiQ3Ryz14HMM",
  "event": "transfer.failed",
  "contains": [
    "transfer"
  ],
  "payload": {
    "transfer": {
      "entity": {
        "id": "trf_N1vfI74toJ5WU0",
        "entity": "transfer",
        "status": "processed",
        "source": "pay_MrZifnGzMM6V3W",
        "recipient": "cust_MrZYbZYSmbUxz9",
        "amount": 100,
        "currency": "INR",
        "amount_reversed": 0,
        "fees": 0,
        "tax": 0,
        "notes": {
          "notes_key_1": "transfer2"
        },
        "linked_account_notes": [],
        "on_hold": false,
        "on_hold_until": null,
        "settlement_status": null,
        "recipient_settlement_id": null,
        "created_at": 1700308808,
        "processed_at": null,
        "error": {
          "code": "BAD_REQUEST_TRANSFER_INSUFFICIENT_BALANCE",
          "description": "Transfer failed due to insufficient balance",
          "reason": "insufficient_balance",
          "field": null,
          "step": "balance_check",
          "id": "trf_N1vfI74toJ5WU0",
          "source": "transfer",
          "metadata": null
        }
      }
    }
  },
  "created_at": 1700308808
}
```

## Create a Payment to a Customer's Wallet

To create a payment to a wallet, you must:
1. [Create an Order](#create-an-order)
1. [Create a Payment](#create-a-payment)

### Create an Order

Use the below endpoint to create an order.

/orders

```cURL: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "payment_capture": true,
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
}'
```json: Response
{
  "id": "order_EKwxwAgItmmXdp",
  "entity": "order",
  "amount": 50000,
  "amount_paid": 0,
  "amount_due": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "created_at": 1582628071
}
```

#### Request Parameters

Following are the parameters to be sent in the request body:

`amount` _mandatory_
: `integer` The amount, in paise. For example, enter `69999` for ₹699.99.

`currency` _mandatory_
: `string` 3-letter ISO currency code for the payment. Currently, we only support `INR`.

`receipt` _optional_
: `string` Maximum 40 characters. User-entered reference for the order.

`payment_capture` _mandatory_
: `boolean` Determines if payment should be automatically captured. Possible values:
  - `true` (recommended): Automatically capture the payment.
  - `false` (default/not recommended): You have to manually capture payments.
  
Know more about [payment capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Response Parameters

`id`
: `string` The unique identifier of the Order. For example, `order_Fa8N7puWEjpoQN`.

`entity`
: `string` Here, it is `order`.

`amount`
: `integer` The amount, in paise. For example, `69999` means ₹699.99.

`amount_paid`
: `integer` The amount, in paise, paid against the Order.

`amount_due`
: `integer` The amount, in paise, pending against the Order.

`currency`
: `string` 3-letter ISO currency code for the payment. Currently, we only support `INR`.

`receipt`
: `string` User-entered reference for the order.

`offer_id`
: `string` Unique identifier of offers linked to the order.

`status`
: `string` The status of the Order. Possible values:
  - `created`: When you create an order it is in the `created` state. It stays in this state till a payment is attempted on it.
  - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
  - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` Timestamp, in Unix, when this Order was created.

### Create a Payment

Use the below endpoint to create a payment for a wallet.

/payments/create/openwallet

> **WARN**
>
> 
> **Customer Wallet Balance**
> 
> If the customer's wallet has an insufficient balance for the requested payment, the API returns an error. The customer must [load sufficient amount in the wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/wallet-operations.md#load-a-wallet) to complete the transaction.
> 

```curl: Request
curl -X POST https://api.razorpay.com/v1/payments/create/openwallet \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type: application/json' \
-d '{
  "method": "wallet",
  "wallet": "openwallet",
  "customer_id": "cust_FVjPW3o1BxxOsa",
  "order_id": "order_Fa8AceMp2VLhZs",
  "amount": 5000,
  "currency": "INR",
  "contact": "9876543210",
  "email": "gaurav.kumar@example.com",
  "description": "Against order #1",
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
}'
```json: Response
{
  "razorpay_payment_id": "pay_Fa8AvBnnHXH0UZ",
  "razorpay_order_id": "order_Fa8AceMp2VLhZs",
  "razorpay_signature": "ebfc4102fc6351218e8af613235918fae4cf2ad00004781ed3fdfb35eb889f69"
}
```

#### Request Parameters

`method` _mandatory_
: `string` Here, it must be `wallet`.

`wallet` _mandatory_
: `string` Here, it must be `openwallet`.

`customer_id` _mandatory_
: `string` Unique identifier linked to the customer. For example, `cust_00000000000001`.

`order_id` _mandatory_
: `string` Unique identifier of the order created. For example, `order_00000000000001`.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. For example, if the amount to be charged is ₹299, then pass `29900` in this field.

`currency` _mandatory_
: `string` 3-letter ISO code for the currency for the payment. You can make payments in **INR** only.

`contact` _mandatory_
: `string` Contact number of the customer. For example, `9876543210`.

`email` _mandatory_
: `string` email ID of the customer. For example, `gaurav.kumar@example.com`.

`description` _optional_
: `string` Description about the payment. For example, `Payment for seaweed`.

`notes` _optional_
: `object` Key-value pairs you can attach to an entity for internal reference. Maximum 15 pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.

#### Response Parameter

`razorpay_payment_id`
: `string` Unique identifier of the created payment. For example, `pay_00000000000001`.

`razorpay_order_id`
: `string` Unique identifier of the order. For example, `order_00000000000001`.

`razorpay_signature`
: `string` Signature for the payment. This can be used to verify the payment. For example, `ebfc4102fc6351218e8af613235918fae4cf2ad00004781ed3fdfb35eb889f69`.

## Refund to a Wallet

Use the below endpoint to refund a payment made using the wallet.

/payments/:id/refund

```curl: Request
curl -X POST https://api.razorpay.com/v1/payments/pay_00000000000001/refund \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type: application/json' \
-d '{
  "amount": 50000,
  "receipt": "Receipt #1",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}'
```json: Response
{
  "id": "rfnd_Fa8V6BCLMChVOg",
  "entity": "refund",
  "amount": 500,
  "currency": "INR",
  "payment_id": "pay_Fa8AvBnnHXH0UZ",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "receipt": "Receipt #1",
  "acquirer_data": {},
  "created_at": 1599480881,
  "batch_id": null,
  "status": "processed",
  "speed_processed": "normal",
  "speed_requested": "normal"
}
```

#### Path Parameter

`id` _mandatory_
: `string` Unique identifier of the payment which is to be refunded. For example, `pay_00000000000001`.

#### Request parameter

`amount` _optional_
: `integer` The refund amount, in paise. Pass `50000` to refund ₹500.

`receipt` _optional_
: `string` The unique identifier provided by you for your internal reference. For example, `Receipt #1`.

`notes` _optional_
: `object` Key-value pairs you can attach to an entity for internal reference. Maximum 15 pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.

#### Response Parameter

`id`
: `string` Unique identifier of the refund. For example, `rfnd_EcRsvf2ayIF9mE`.

`entity`
: `string` Indicates the type of entity. Here, it is `refund`.

`amount`
: `integer` The refund amount, in paise. `50000` means ₹500.

`currency`
: `string` 3-letter ISO currency code for the refund. Currently, only `INR` is allowed.

`payment_id`
: `string` Unique identifier of the payment for which the refund is initiated. For example, `pay_00000000000001`.

`notes`
: `object` Key-value pairs you can attach to an entity for internal reference. Maximum 15 pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.

`receipt`
: `string` User-entered reference for the order.

`acquirer_data`
: `array` A dynamic array consisting of a unique reference number (either RRN, ARN or UTR) that is provided by the banking partner when a refund is processed. This reference number can be used by the customer to track the status of the refund with the bank.

`created_at`
: `integer` Timestamp, in Unix format, when the refund was created. For example, `1462887226`.

`status`
: `string` Indicates the state of the refund. Possible values include:
  - `pending`: This state indicates that Razorpay is attempting to process the refund.
  - `processed`: This is the terminal state of the refund.

`speed_requested`
: `string` The processing mode of the refund seen in the refund response. Possible values:
  - `normal`: Refund will be processed via the normal speed. That is, 5-7 working days.
  - `optimum`: Refund will be processed at an optimal speed based on Razorpay's internal fund transfer logic. That is:
    - If the refund can be processed instantly, Razorpay will do so, irrespective of the payment method used to make the payment.
    - If an instant refund is not possible, Razorpay will initiate a refund that is processed at the normal speed.

`speed_processed`
: `string` The mode used to process a refund. Possible values:
  - `instant`: This means that the refund has been processed instantly via fund transfer.
  - `normal`: The refund will take 5-7 working days.

## Direct Transfer

Use the below endpoint to create a cashback to a customer's wallet.

/transfers

> **INFO**
>
> 
> **Handy Tips**
> 
> The Direct Transfer endpoint does not consume `payment_id`.
> 

```curl: Request
curl -X POST https://api.razorpay.com/v1/transfers \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type: application/json' \
-d '{
  "customer": "cust_00000000000001",
  "amount": 5000,
  "currency": "INR",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}'

```json: Response
{
  "id": "trf_00000000000001",
  "entity": "transfer",
  "source": "acc_10000000000000",
  "recipient": "cust_00000000000001",
  "amount": 50000,
  "currency": "INR",
  "amount_reversed": 0,
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "fees": 2,
  "tax": 1,
  "on_hold": false,
  "on_hold_until": null,
  "recipient_settlement_id": null,
  "created_at": 1507798770,
  "linked_account_notes": [],
  "processed_at": null
}
```

#### Request Parameters

`customer_id` _mandatory_
: `string` Unique identifier linked to the customer. For example, ` cust_00000000000001`.

`amount` _mandatory_
: `integer` The amount (in paise) to be transferred to the linked account. For example, for an amount of ₹200.35, the value of this field should be 20035.

`currency` _mandatory_
: `string` 3-letter ISO currency code for the transaction. Currently, only `INR` is allowed.

`notes` _optional_
: `object` Key-value pairs you can attach to an entity for internal reference. Maximum 15 pairs, 256 characters each. For example,`"note_key": "Beam me up Scotty”`.

#### Response Parameters

`id`
: `string` Unique identifier of the transfer. For example, `trf_00000000000001`.

`entity`
: `string` The name of the entity. Here, it is `transfer`.

`source`
: `string` Unique identifier of the transfer source. Here, the source is `payment`.

`recipient`
: `string` Unique identifier of the customer to whom the transfer was made. For example, `cust_00000000000001`.

`amount`
: `integer` The amount, in paise, to be transferred to the wallet. For an amount of ₹200.35, pass `20035`.

`currency`
: `string` 3-letter ISO currency code for the transfer. Currently, we only support `INR`.

`amount_reversed`
: `integer` Amount reversed from this transfer for refunds.

`fees`
: `integer` Fees, in paise, charged for the transfer. `500` means ₹5.

`tax`
: `integer` Tax, in paise, deducted for the fee charged. `200` means ₹2.

`on_hold`
: `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
    - `true`: Puts the settlement on hold.
    - `false`: Releases the settlement.

`on_hold_until`
: `integer` Timestamp, in Unix, that indicates until when the settlement of the transfer must be put on hold. If no value is passed, and `on_hold` = 1, the settlement is put on hold indefinitely.

`recipient_settlement_id`
: `string` Unique identifier of the settlement.

`created_at`
: `integer` Timestamp, in Unix, at which the transfer was created. For example, `1462887226`.

`notes`
: `json object` Set of key-value pairs that can be associated with an entity.  This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "bangalore"`.

`linked_account_notes`
: `array` List of keys from the `notes` object which needs to be shown to linked accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

`created_at`
: `integer` Timestamp, in Unix, at which the transfer was processed. For example, `1462887226`.

## Payout from Customer's Wallet

Payouts allow customers to transfer funds directly from their wallets to any of the linked bank (fund) accounts.

To make a payout to a customer's wallet, you must:
1. [Create a Fund Account](#create-a-fund-account)
1. [Create a Payout](#create-a-payout)

### Create a Fund Account

You can use the below endpoint to create a fund account for a customer.

/fund_accounts

```curl: Example Request
curl -u : \
-X POST https://api.razorpay.com/v1/fund_accounts \
-H "Content-Type: application/json" \
-d '{
  "customer_id":"cust_Aa000000000001",
  "account_type":"bank_account",
  "bank_account":{
    "name":"Gaurav Kumar",
    "account_number":"11214311215411",
    "ifsc":"HDFC0000053"
  }
}'
```json: Response
{
  "id":"fa_Aa00000000001",
  "entity":"fund_account",
  "customer_id":"cust_Aa000000000001",
  "account_type":"bank_account",
  "bank_account":{
    "name":"Gaurav Kumar",
    "account_number":"11214311215411",
    "ifsc":"HDFC0000053",
    "bank_name":"HDFC Bank"
  },
  "active":true,
  "created_at":1543650891
}
```

#### Request Parameters

`customer_id` _mandatory_
: `string` This is the unique ID linked to a customer. For example, `cust_Aa000000000001`.

`account_type` _mandatory_
: `string` The type of account to be linked to the customer ID. Here, it will be `bank_account`.

`bank_account`
: Customer bank account details.

    `name` _mandatory_
    : `string` Name of account holder as per bank records. For example, `Gaurav Kumar`.

    `ifsc` _mandatory_
    : `string` Customer's bank IFSC. For example, `HDFC0000053`.

    `account_number` _mandatory_
    : `string` Beneficiary account number. For example, `11214311215411`.

#### Response Parameters

`id`
: `string` The unique ID linked to the fund account. For example, `fa_Aa000000000001`.

`entity`
: `string` The name of the Razorpay entity. Here, it will be `fund_account`.

`customer_id`
: `string` The unique identifier for a customer. For example, `cust_Aa000000000001`.

`account_type`
: `string` The type of account linked to the customer ID. Here, it will be `bank_account`.

`bank_account`
: Customer bank account details.

    `name`
    : `string` Name of account holder as per bank records. For example, `Gaurav Kumar`.

    `account_number`
    : `string` Beneficiary account number. For example, `11214311215411`.

    `ifsc`
    : `string` Customer's bank IFSC. For example, `HDFC0000053`.

    `bank_name`
    : `string` Beneficiary bank name. For example `HDFC`.

`active`
: `string` Status of the fund account. Possible values:
    - `true`: Fund account is active.
    - `false`: Fund account is inactive.

`created_at`
: `integer` The timestamp, in Unix, from when the account was created at Razorpay. For example, `1543650891`.

### Create a Payout

Use the below endpoint to create a payout. Using a payout you can instantly transfer funds from a customer's wallet to the customer's fund account.

/customers/:cust_id/payouts

```curl: Request
curl -u : \
-X POST https://api.razorpay.com/v1/customers/cust_FVjPW3o1BxxOsa/payouts \
-H "Content-Type: application/json" \
-d '{
  "fund_account_id": "fa_FaSwoEzHbedyPz",
  "purpose": "refund",
  "amount": 100,
  "currency": "INR",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}'
```json: Response
{
  "id": "pout_FaSx8rqhHoslRm",
  "entity": "payout",
  "customer_id": "cust_FVjPW3o1BxxOsa",
  "fund_account_id": "fa_FaSwoEzHbedyPz",
  "amount": 100,
  "currency": "INR",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "fees": 2,
  "tax": 1,
  "status": "processing",
  "purpose": "refund",
  "utr": null,
  "mode": null,
  "reference_id": null,
  "narration": "Abcd Fund Transfer",
  "batch_id": null,
  "failure_reason": null,
  "created_at": 1599552906,
  "fee_type": null
}
```
#### Path Parameter

`cust_id` _mandatory_
: `string` The unique identifier of the customer to whom the fund account is linked. For example, `cust_FVjPW3o1BxxOsa`.

#### Request Parameters

`fund_account_id` _mandatory_
: `string` The unique identifier of the fund account to which the payout is to be made.

`purpose` _mandatory_
: `string` The reason for the payout. For example, `refund`.

`amount` _mandatory_
: `integer` The payout amount (in paise). `500` means ₹5.

`currency` _mandatory_
: `string` 3-letter ISO currency code for the payout. Currently, only `INR` is allowed.

`notes` _optional_
: `object` Key-value pairs you can attach to an entity for internal reference. Maximum 15 pairs, 256 characters each. For example,`"note_key": "Beam me up Scotty”`.

#### Response Parameters

`id`
: `string` Unique identifier of the payout. For example, `pout_00000000000001`.

`entity`
: `string` The name of the Razorpay entity. Here it is `payout`.

`customer_id`
: `string` The unique identifier of the customer to whom the fund account is linked. For example, `cust_FVjPW3o1BxxOsa`.

`fund_account_id`
: `string` Unique identifier for the fund account to which the payout is being made. For example, `fa_00000000000001`.

`amount`
: `integer` The payout amount, in paise. `500` means ₹5.

`currency`
: `string` 3-letter ISO currency code for the payout. Currently, only `INR` is allowed.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`fees`
: `integer` Fees, in paise, charged for the transfer. `500` means ₹5.

`tax`
: `integer` Tax, in paise, deducted for the fee charged. `200` means ₹2.

`status`
: `string` The status of the payout. The possible values are:
  - `processing`
  - `processed`
  - `reversed`

`purpose`
: `string` The reason for the payout. For example, `refund`.

`utr`
: `string` A unique transaction reference (UTR) number generated for all transactions. You can obtain UTR from the [`payout.updated` webhook payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

`reference_id`
: `string` Maximum length is 40 characters. A user-generated reference given to the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`narration`
: `string` Maximum length 30 characters. Allowed characters: a-z, A-Z, 0-9 and space. This is a custom note that also appears on the bank statement.
  
> **INFO**
>
> 
>   **Handy Tips**
> 
>   -  If no value is passed for this parameter, it defaults to the Merchant Billing Label.
-  Ensure that the most important text forms the first 9 characters as banks may truncate the rest as per their standards.

>   

`batch_id`
: `string` This parameter is populated if the contact was created as part of a bulk upload. For example, `batch_00000000000001`.

`failure_reason`
: `string` The reason for the payout failing.

`created_at`
: `integer` Timestamp, in UNIX, when the payout was created.

`fee_type`
: `string` The fee type for the payout.

## Fetch Wallet Balance

Use the below endpoint to fetch the customer's wallet balance and the details about current usage.

/customers/:id/balance

> **INFO**
>
> 
> **Handy Tips**
> 
> The wallet APIs always return the amount in paise.
> 

```curl: Example Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/customers/cust_00000000000001/balance
```json: Response
{
  "balance": 199800,
  "monthly_usage": 200100,
  "max_balance": 2000000
}
```

#### Path Parameter

`id` _mandatory_
: `string` Unique identifier for the customer to whom the wallet is linked. For example, `cust_00000000000001`.

#### Response Parameters

`balance`
: `integer` Balance in the wallet, in paise. `500` means ₹5.

`monthly_usage`
: `integer` Monthly usage for the wallet. `500` means ₹5.

`max_balance`
: `integer` Maximum balance in the wallet. `500` means ₹5.

## Fetch Wallet Statement

Use the below endpoint to fetch the transaction statement of a customer’s wallet associated with a `customer_id`.

/customers/:id/statement

Retrieves the transaction statement of the customer’s wallet using the customer `id`.

```curl: Example Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/customers/cust_00000000000001/statement
```json: Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "ctxn_00000000000001",
      "entity": "customer_transaction",
      "source": "pay_00000000000001",
      "status": "complete",
      "type": "transfer",
      "amount": 50000,
      "currency": "INR",
      "credit": 0,
      "debit": 50000,
      "balance": 100000,
      "description": "Against order #1",
      "created_at": 1507750332
    },
    {
      "id": "ctxn_00000000000002",
      "entity": "customer_transaction",
      "source": "trf_00000000000001",
      "status": "complete",
      "type": "transfer",
      "amount": 50000,
      "currency": "INR",
      "credit": 50000,
      "debit": 0,
      "balance": 150000,
      "description": "NA",
      "created_at": 1507749557
    }
  ]
}
```

#### Path Parameter

`id` _mandatory_
: `string` Unique identifier of the customer to whom the wallet is linked. For example, `cust_00000000000001`.

#### Query Parameters

`from`
: `integer` The timestamp, in Unix, from when the statement is to be fetched.

`to`
: `integer` The timestamp, in Unix, till when the statement is to be fetched.

`count`
: `integer` The number of entries to be fetched. Default value is 10. Maximum value is 100. This can be used for pagination, in combination with `skip`.

`skip`
: `integer` The number of entries to be skipped. Default value is 0. This can be used for pagination, in combination with `count`.

#### Response Parameters

`id`
: `string` Unique identifier for the transaction. For example, `ctxn_00000000000001`.

`entity`
: `string` Name of the entity being fetched. Here, it is `customer_transaction`.

`source`
: `string` Unique identifier of the transfer source. For example, `pay_00000000000001`.

`status`
: `string` The status of the transaction. For example, `completed`.

`type`
: `string` Type of transaction. Possible values:
  - `transfer`
  - `refund`

`amount`
: `integer` Transaction amount, in paise. `500` means ₹5.

`currency`
: `string` 3-letter ISO currency code.

`credit`
: `integer` Credited amount, in paise. `500` means ₹5.

`debit`
: `integer` Debited amount, in paise. `500` means ₹5.

`balance`
: `integer` Wallet balance updated after the transaction, in paise. `500` means ₹5.

`description`
: `string` Maximum 255 characters. Description for the transaction. For example, `Against order #1`.

`created_at`
: `integer` Timestamp, in Unix, at which the record was created. For example, `1462887226`.
