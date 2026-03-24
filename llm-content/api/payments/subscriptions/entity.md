---
title: Subscriptions Entity
description: Know about the Subscription entity and the associated parameter descriptions.
---

# Subscriptions Entity

## Subscriptions Entity

The Subscriptions entity has the following parameters.

### Response

```json: Entity
{
  "entity":"collection",
  "count":2,
  "items":[
    {
      "id":"sub_00000000000005",
      "entity":"subscription",
      "plan_id":"plan_00000000000004",
      "customer_id":"cust_D00000000000006",
      "status":"active",
      "current_start":1577355873,
      "current_end":1582655401,
      "ended_at":null,
      "quantity":1,
      "notes":{
        "notes_key_1":"Tea, Earl Grey, Hot",
        "notes_key_2":"Tea, Earl Grey… decaf."
      },
      "charge_at":1577385995,
      "offer_id":"offer_JHD834hjbxzhd38d",
      "start_at":1577385995,
      "end_at":1603737004,
      "auth_attempts":0,
      "total_count":6,
      "paid_count":1,
      "customer_notify":true,
      "created_at":1577356088,
      "expire_by":1577485999,
      "short_url":"https://rzp.io/i/z3b1R61A9",
      "has_scheduled_changes":false,
      "change_scheduled_at":null,
      "remaining_count":5
    },
    {
      "id":"sub_00000000000006",
      "entity":"subscription",
      "plan_id":"plan_00000000000009",
      "customer_id":"cust_D00000000000005",
      "status":"active",
      "current_start":1577355875,
      "current_end":1577355875,
      "ended_at":null,
      "quantity":1,
      "notes":{
        "notes_key_1":"Tea, Earl Grey, Hot",
        "notes_key_2":"Tea, Earl Grey… decaf."
      },
      "charge_at":1561852802,
      "start_at":1561852802,
      "end_at":1590777006,
      "auth_attempts":0,
      "total_count":12,
      "paid_count":1,
      "customer_notify":true,
      "created_at":1560241237,
      "expire_by":1561939197,
      "short_url":"https://rzp.io/i/m0y0f",
      "has_scheduled_changes":false,
      "change_scheduled_at":null,
      "source":"api",
      "offer_id":"offer_JHD834hjbxzhd38d",
      "remaining_count":11
    }
  ]
}
```

### Parameters

@include subscriptions/subscriptions/subscriptions-entities
