---
title: Fetch Transactions With ID
description: Retrieve the details of a transaction with its id using the API.
---

# Fetch Transactions With ID

## Fetch Transactions With ID

Use this endpoint to retrieve details of a specific transaction using its id. 

### Request

```curl: Curl

curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X GET https://api.razorpay.com/v1/transactions/txn_00000000000002
```

### Response

```json: Success
{
  "id":"txn_00000000000002",
  "entity":"transaction",
  "account_number":"7878780080316316",
  "amount":1000000,
  "currency":"INR",
  "credit":0,
  "debit":1000000,
  "balance":9000000,
  "source":{
    // if source entity = payout, the system returns the following values.
    "id":"pout_00000000000001",
    "entity":"payout",
    "fund_account_id":"fa_00000000000001", // end of source entity = payout. 
    // if source entity = bank_transfer, the system returns the following values.
    "id":"bt_00000000000001",
    "entity":"bank_transfer",
    "payer_name":"Saurav Kumar",
    "payer_account":"6543266545411243",
    "payer_ifsc":"UTIB0000002",
    "mode":"NEFT",
    "bank_reference":"AXIR000000000001",
    // end of source entity = bank_transfer.
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
```

### Parameters

`id`_mandatory_
: `string` The unique identifier linked to the transaction. For example, `txn_00000000000002`.

### Parameters

@include rzpx/transactions/transactions-res
