---
title: Fund/Bank Account Validation
heading: Account Validation Entity
description: Overview of Account Validation for RazorpayX, APIs and webhook payload. Validate customer's bank account before you make payouts.
---

# Account Validation Entity

The Account Validation entity has the following parameters:

### Response

```json: Sample Entity
{
  "id": "fav_00000000000001",
  "entity": "fund_account.validation",
  "fund_account": {
    "id": "fa_00000000000001",
    "entity": "fund_account",
    "contact_id": "cont_00000000000001",
    "account_type": "bank_account",
    "bank_account": {
      "name": "Gaurav Kumar",
      "bank_name": "HDFC",
      "ifsc": "HDFC0000053",
      "account_number": "765432123456789"
    },
    "batch_id": null,
    "active": true,
    "created_at": 1567064019
  },
  "status": "completed",
  "amount": 100,
  "currency": "INR",
  "notes": {
    "random_key_1": "Make it so.",
    "random_key_2": "Tea. Earl Grey. Hot."
  },
  "results": {
    "account_status": "active",
    "registered_name": "Gaurav Kumar"
  },
  "created_at": 1547566278,
  "utr": "XXXXR7310682908954385XX"
}
```

### Parameters

@include rzpx/fund-accounts/validation/vpa/fund-account-vpa-res
