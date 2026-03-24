---
title: Payouts Approval Entity
description: Check the entity code for Payouts Approval APIs.
---

# Payouts Approval Entity

## Payouts Approval Entity

    The Payouts Approval Entity has the following parameters:
    

### Response

```json: Entity
{
  "id": "pout_00000000000001",
  "entity": "payout",
  "fund_account_id": "fa_00000000000001",
  "amount": 1000000,
  "currency": "INR",
  "notes": {
    "note_key": "Beam me up Scotty"
  },
  "fees": 590,
  "tax": 90,
  "status": "processing",
  "purpose": "payout",
  "utr": null,
  "mode": "NEFT",
  "reference_id": "Acme Transaction ID 12345",
  "narration": "Acme Corp Fund Transfer",
  "batch_id": null,
  "failure_reason": null,
  "created_at": 1630261800,
  "fee_type": "",
  "status_details": {
    "reason": "beneficiary_bank_confirmation_pending",
    "description": "Payout is pending confirmation from the beneficiary bank. Payout status will be confirmed by end of day 1st July, 2023",
    "source": "beneficiary_ban"
  }
}
```

### Parameters

    @include rzpx/payouts/res
