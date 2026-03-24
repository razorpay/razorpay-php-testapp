---
title: Smart Collect Entity
description: Entity parameters and sample code for Smart Collect API.
---

# Smart Collect Entity

The Smart Collect entity has the following parameters:

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
  "close_by": 1581615838,
  "closed_at": null,
  "created_at": 1577962694
}
```

### Parameters

@include smart-collect/api/entity
