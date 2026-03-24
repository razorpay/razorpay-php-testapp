---
title: Payout Composite Entity
description: Check the entity code for Payout Composite APIs.
---

# Payout Composite Entity

## Payout Composite Entity

The Payout Composite Entity has the following parameters:

### Response

```json: Sample Entity
{
    "id": "pout_F681qslJ3ba70q",
    "entity": "payout",
    "fund_account_id": "fa_F681qr6Bqy1Je7",
    "fund_account": {
        "id": "fa_F681qr6Bqy1Je7",
        "entity": "fund_account",
        "contact_id": "cont_F681qmU11CfPDl",
        "contact": {
            "id": "cont_F681qmU11CfPDl",
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
            "created_at": 1592929016
        },
        "account_type": "bank_account",
        "bank_account": {
            "ifsc": "HDFC0001234",
            "bank_name": "HDFC Bank",
            "name": "Gaurav Kumar",
            "notes": [],
            "account_number": "1121431121541121"
        },
        "batch_id": null,
        "active": true,
        "created_at": 1592929016
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
    "purpose": "refund",
    "utr": null,
    "mode": "NEFT",
    "reference_id": "Acme Transaction ID 12345",
    "narration": "Acme Corp Fund Transfer",
    "batch_id": null,
    "status_details": null,
    "created_at": 1592929017,
    "fee_type": "",
    "error": {
        "description": null,
        "source": null,
        "reason": null
    }
}
```

### Parameters

@include rzpx/payouts/composite-res
