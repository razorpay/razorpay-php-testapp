---
title: Payouts to Cards Entity
description: Check the entity code for Payouts to Cards APIs.
---

# Payouts to Cards Entity

## Payouts to Cards Entity

The Payouts to Cards Entity has the following parameters:

### Response

```json: Sample Entity 
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
    "account_type": "card",
    "card": {
      "last4": "6789",
      "network": "Visa",
      "type": "credit",
      "issuer": "HDFC",
      "input_type": "card"
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
  "utr": null,
  "mode": "NEFT",
  "reference_id": "Acme Transaction ID 12345",
  "narration": "Acme Corp Fund Transfer",
  "batch_id": null,
  "failure_reason": null,
  "created_at": 1581499319,
  "fee_type": "",
  "error": {
    "description": null,
    "source": null,
    "reason": null
  }
}
```

### Parameters

@include rzpx/payouts/payout-create-card-res
