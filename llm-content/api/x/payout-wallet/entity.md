---
title: Payout Wallet - Amazon Entity
description: Check the entity code for Payout Wallet APIs.
---

# Payout Wallet - Amazon Entity

## Payout Wallet Entity

The Contact, Fund Account and Payout Entities have the following parameters:

### Response

```json: Sample Entity (Composite Payout)
{
    "id": "pout_00000000000001",
    "entity": "payout",
    "fund_account_id": "fa_00000000000001",
    "fund_account": {
        "id": "fa_00000000000001",
        "entity": "fund_account",
        "contact_id": "cont_00000000000001",
        "contact": {
            "id": "cont_00000000000001",
            "entity": "contact",
            "name": "Gaurav Kumar",
            "contact": "9876543210",
            "email": "gaurav.kumar@example.com",
            "type": "employee",
            "reference_id": "Acme Contact ID 12345",
            "batch_id": null,
            "active": true,
            "notes": {
                "notes_key_1": "Tea, Earl Grey, Hot",
                "notes_key_2": "Tea, Earl Grey… decaf."
            },
            "created_at": 1580817353
        },
        "account_type": "wallet",
        "wallet": {
            "provider": "amazonpay",
            "phone": "+919876543210",
            "email": " gaurav.kumar@example.com",
            "name": "Gaurav Kumar"
        },
        "batch_id": null,
        "active": true,
        "created_at": 1581080272
    },
    "amount": 1000000,
    "currency": "INR",
    "notes": {
        "notes_key_1": "Beam me up Scotty",
        "notes_key_2": "Engage"
    },
    "fees": 590,
    "tax": 90,
    "status": "processed",
    "purpose": "payout",
    "utr": "GCID1234567",
    "mode": "amazonpay",
    "reference_id": "Acme Transaction ID 12345",
    "narration": "Acme Corp Fund Transfer",
    "batch_id": null,
    "status_details": null,
    "created_at": 1581499319
}
```

### Parameters

@include rzpx/payouts/composite-amazon-pay-res
