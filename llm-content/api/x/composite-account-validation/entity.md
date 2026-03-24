---
title: Composite Fund/Bank Account Validation
heading: Composite Account Validation Entity
description: Overview of Composite Account Validation for RazorpayX, APIs and webhook payload. Validate your customers’ bank account or VPA with a single API before you make payouts.
---

# Composite Account Validation Entity

The Account Validation entity has the following parameters:

### Response

```json: Sample Entity
{
  "id": "fav_00000000000001",
  "entity": "fund_account.validation",
  "status": "completed",
  "validation_results": {
      "account_status": "valid",
      "registered_name": "Gaurav Kumar",
      "details": "The beneficiary account is valid." ,
      "name_match_score": 100
   },
  "status_details": {
    "description": "Validation request is completed",
    "source": "beneficiary_bank",
    "reason": "validation_completed"
    },
  "reference_id": "112233",
  "notes": {
      "random_key_1": "Make it so.",
      "random_key_2": "Tea. Earl Grey. Hot."
   },
  "fund_account": {
      "id": "fa_00000000000001",
      "entity": "fund_account",
      "account_type": "bank_account",
      "bank_account": {
            "name": "Gaurav Kumar",
            "bank_name": "HDFC",
            "ifsc": "HDFC0000053",
            "account_number": "765432123456789"
      },
      "active": true,
      "created_at": 1567064019,
      "contact": {
          "id": "cont_00000000000001",
          "entity": "contact",
          "name":"Gaurav Kumar",
          "email":"gaurav.kumar@example.com",
          "contact":"9123456789",
          "type":"employee",
          "reference_id":"Acme Contact ID 12345",
          "active": true,
          "created_at": 1567064019,
          "notes":{
          "notes_key_1":"Tea, Earl Grey, Hot",
          "notes_key_2":"Tea, Earl Grey... decaf."
          }
      }
  }
}
```

### Parameters

@include rzpx/fund-accounts/composite-account-validation/fetch-all-res
