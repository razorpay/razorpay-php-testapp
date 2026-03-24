---
title: Smart Collect With TPV Entity
description: Entity parameters and sample code for Smart Collect With TPV API.
---

# Smart Collect With TPV Entity

The Smart Collect with TPV entity has the following parameters:

### Response

```json: Entity
{
  "id":"va_CaVE4QbyJvQRdk",
  "name":"Acme Corp",
  "entity":"virtual_account",
  "status":"active",
  "description":"Customer Identifier created for Gaurav Kumar",
  "notes":{
    "flat no":"105"
  },
  "amount_paid":0,
  "customer_id":"cust_805c8oBQdBGPwS",
  "receivers":[
    {
      "id": "ba_DzXNNxY8yQu5iV",
      "entity": "bank_account",
      "ifsc":"RATN0VAAPIS",
      "bank_name": "RBL Bank",
      "name": "Acme Corp",
      "notes": [],
      "account_number": "2223333230231378"
    }
  ],
  "allowed_payers": [
    {
      "type": "bank_account",
      "id":"ba_DlGmm9mSj8fjRM",
      "bank_account": {
        "ifsc": "UTIB0000013",
        "account_number": "914010012345679"
      }
    },
    {
      "type": "bank_account",
      "id":"ba_Cmtnm5tSj6agUW",
      "bank_account": {
        "ifsc": "UTIB0000014",
        "account_number": "914010012345680"
      }
    }
  ],
  "close_by": 1581615838,
  "closed_at": null,
  "created_at": 1577962694
}
```

### Parameters

@include smart-collect/api-tpv/entity
