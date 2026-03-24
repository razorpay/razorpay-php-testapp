---
title: Transactions Entity
description: Check the entity code of the Transactions API.
---

# Transactions Entity

## Transactions Entity

The Transactions Entity has the following parameters: 
 

### Response

```json: Sample Entity 
{
    "id": "txn_00000000000002",
    "entity": "transaction",
    "account_number": "7878780080316316",
    "amount": 1000000,
    "currency": "INR",
    "credit": 0,
    "debit": 1000000,
    "balance": 9000000,
    "source": {
        // if source entity = bank_transfer, the system returns the following values.
        "id":"bt_00000000000001",
        "entity":"bank_transfer",
        "payer_name":"Saurav Kumar",
        "payer_account":"6543266545411243",
        "payer_ifsc":"UTIB0000002",
        "mode":"NEFT",
        "bank_reference":"AXIR000000000001",
        // end of source entity = bank_transfer. 
        // start of source entity = payout (default source).
        "id": "pout_00000000000001",
        "entity": "payout",
        "fund_account_id": "fa_00000000000001",
        "amount": 1000000, 
        "notes": {
            "notes_key_1": "Tea, Earl Grey, Hot",
            "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "fees": 3,
        "tax": 1,
        "status": "processed",
        "utr": "000000000001",
        "mode": "NEFT",
        "created_at": 1545224066,
        "fee_type": null
    },
    "created_at": 1545224066
}
```

### Parameters

@include rzpx/transactions/transactions-res
