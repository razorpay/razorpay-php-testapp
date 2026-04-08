---
title: Fetch All Transactions
description: Retrieve the details of all transactions from your account using the API.
---

# Fetch All Transactions

## Fetch All Transactions

Use this endpoint to retrieve the details of all transactions.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X GET https://api.razorpay.com/v1/transactions?account_number=7878780080316316
```

### Response

```json: Success
{
  "entity":"collection",
  "count":2,
  "items":[
    {
      "id":"txn_00000000000001",
      "entity":"transaction",
      "account_number":"1121431121541121",
      "amount":10000000,
      "currency":"INR",
      "credit":10000000,
      "debit":0,
      "balance":10000000,
      "source":{
        "id":"bt_00000000000001",
        "entity":"bank_transfer",
        "payer_name":"Saurav Kumar",
        "payer_account":"6543266545411243",
        "payer_ifsc":"UTIB0000002",
        "mode":"NEFT",
        "bank_reference":"AXIR000000000001",
        "amount":10000000
      },
      "created_at":1545125568
    },
    {
      "id":"txn_00000000000003",
      "entity":"transaction",
      "account_number":"7878780080316316",
      "amount":1000000,
      "currency":"INR",
      "credit":0,
      "debit":1000000,
      "balance":9000000,
      "source":{
        "id":"pout_00000000000001",
        "entity":"payout",
        "fund_account_id":"fa_00000000000001",
        "amount":1000000,
        "notes":{
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "fees":3,
        "tax":1,
        "status":"processed",
        "utr":"000000000001",
        "mode":"NEFT",
        "created_at":1545224066,
        "fee_type": null
      },
      "created_at":1545224066
    }
  ]
}
```

### Parameters

`account_number`_mandatory_
: `string` The account for which you want to view the transactions.
Account details can be found on the RazorpayX Dashboard. For   example, `7878780080316316`.
    - Pass your Customer Identifier (RazorpayX Lite number) if the transaction was done through it.
    - Pass your Current Account number if the transaction was done through it.
    - This is an alphanumeric or numeric value.
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   - Log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier**.
>   - This value is different for Test Mode and Live Mode.
> 
>   

`from`_optional_
: `integer` Timestamp, in Unix, from when you want to fetch transactions.

`to`_optional_
: `integer` Timestamp, in Unix, till when you want to fetch transactions.

`count`_optional_
: `integer` Number of payouts to be fetched. Default value is `10`. Maximum value is `100`. This can be used for pagination, in combination with `skip`.

`skip`_optional_
: `integer` Numbers of payouts to be skipped. Default value is `0`. This can be used for pagination, in combination with `count`.

### Parameters

`id`
: `string` The unique identifier linked to the transaction. For example, `txn_00000000000001`.

`entity`
: `string` The entity created. Here, it is `transaction`.

`account_number`
: `string` The business account from which the payout was made. For example, `7878780080316316`.

`amount`
: `integer` The amount transferred, in paise. The transfer can either be a credit (when you add funds to your account) or a debit (when you make a payout).

 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`
: `string` The transaction currency. Here, it is `INR`.

`credit`
: `integer` The amount, in paise, credited to your account. Is `0` for debit transactions (when making payouts).

`debit`
: `integer` The amount, in paise, debited to your account. Is `0` for credit transactions (when adding funds to your account).

`balance`
: `integer` The remaining amount, in paise, in your account after the debit or credit transaction.

`source`
: `object` Details of the payout made or details of the bank account from which money was added to your business account.

  `id`
  : `string` The payout id when making payouts or the bank transfer id when adding funds to your account.

  `entity`
  : `string` The entity for which the transaction was created. Possible values:
    - `payout`
    - `bank_transfer`

  `amount`
  : `integer` The amount transferred, in paise.

  `fund_account_id`
  : `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`. 
 This value is returned only when the source entity is `payout`. 

  `notes`
  : `object` User-entered notes for internal reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Beam me up Scotty”`. 
 
 This value is returned only when the source entity is `payout`.

  `payer_name`
  : `string` Name linked to the account making the transfer. For example, `Saurav Kumar`. 
 This value is returned only when the source entity is `bank_transfer`.

  `payer_account`
  : `string` The account number from which money is transferred to your business bank account. For example, `6543266545411243`. 
 This value is returned only when the source entity is `bank_transfer`.

  `payer_ifsc`
  : `string` The branch IFSC from where the transfer is being made. For example, `UTIB0000002`. This value is returned only when the source entity is `bank_transfer`.

  `mode`
  : `string` The mode used to transfer money to your business bank account. For example, `NEFT`. This value is returned only when the source entity is `bank_transfer`.

  `bank_reference`
  : `string` Reference from the bank from which money was transferred to your business bank account. For example, `AXIR000000000001`. 
 This value is returned only when the source entity is `bank_transfer`.

`fees`
: `integer` The fees, in paise, for the transaction. This field is populated only when the transaction moves to the `processing` state. For example, `5`. 
 This value is returned only when the source entity is `payout`.

`tax`
: `integer` The tax, in paise, for the fee being charged. This field is populated only when the transaction moves to the `processing` state. For example, `1`. 
 This value is returned only when the source entity is `payout`.

`status`
: `string` The status of the transaction. A transaction can be in any of the following states:
  - `pending`
  - `queued`
  - `processing`
  - `processed`
  - `reversed`
  - `cancelled`
  - `rejected` 

  This value is returned only when the source entity is `payout`.

`utr`
: `string` The unique transaction number for the transaction. For example, `HDFCN00000000001`. 
 This value is returned only when the source entity is `payout`.

`mode`
: `string` The payout mode. Refer to the [Supported Banks and Payout Modes section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payouts-cards.md#supported-banks-and-payout-modes) for more details. 
 This value is returned only when the source entity is `payout`.

`created_at`
: `integer` Timestamp, in Unix, when the source entity or transaction entity was created. For example, `1545320320`.
