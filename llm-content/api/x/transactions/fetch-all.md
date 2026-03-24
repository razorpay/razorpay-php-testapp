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

@include rzpx/transactions/transactions-res
