---
title: Fund Accounts Entity
description: Check the entity code for Fund Accounts APIs.
---

# Fund Accounts Entity

## Fund Accounts Entity

The Fund Accounts Entity has the following parameters:

### Response

```json: Sample Entity
{
  "id" : "fa_00000000000001",
  "entity": "fund_account",
  "contact_id" : "cont_00000000000001",
  "account_type": "bank_account",
  "bank_account": {
    "ifsc": "HDFC0000053",
    "bank_name": "HDFC Bank",
    "name": "Gaurav Kumar",
    "account_number": "765432123456789",
    "notes": []
  },
  "active": true,
  "batch_id": null,
  "created_at": 1543650891
}
```

### Parameters
 
@include rzpx/fund-accounts/validation/vpa/fund-account-vpa-res
