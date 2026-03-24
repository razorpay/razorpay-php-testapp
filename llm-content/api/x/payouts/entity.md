---
title: Payouts Entity
description: View RazorpayX Payouts entity parameters and descriptions.
---

# Payouts Entity

## Payouts Entity

The Payouts' Entity has the following parameters:

### Response

```json: Sample Entity
{
  "id": "pout_00000000000001",
  "entity": "payout",
  "fund_account_id": "fa_00000000000001",
  "amount": 1000000,
  "currency": "INR",
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "fees": 0,
  "tax": 0,
  "status": "queued",
  "utr": null,
  "mode": "IMPS",
  "purpose": "refund",
  "reference_id": "Acme Transaction ID 12345",
  "narration": "Acme Corp Fund Transfer",
  "batch_id": null,
  "status_details": {
    "description": "Payout is queued as there is insufficient balance in your business account to process the payout",
    "source": "business",
    "reason": "low_balance"
    }
  "created_at": 1545383037
}
```

### Parameters

@include rzpx/payouts/res
