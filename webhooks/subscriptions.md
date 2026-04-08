---
title: Subscriptions Webhook Events
description: List of Subscriptions webhook events along with sample payloads.
---

# Subscriptions Webhook Events

A **Subscription** is an automated recurring payment system that charges customers based on a predefined billing cycle without manual intervention.

## List of Subscriptions Webhook Events

The table below lists the webhook events available for Subscriptions.

Webhook Event | Description
---
`subscription.authenticated`| Sent when the first payment is made on the subscription. This can either be the authorisation amount, the upfront amount, the plan amount or a combination of the plan amount and the upfront amount.
---
`subscription.activated` | Sent when the subscription moves to the `active` state either from the `authenticated`, `pending` or `halted` state. If a Subscription moves to the `active` state from the `pending` or `halted` state, only the subsequent invoices that are generated are charged. Existing invoices that were already generated are not charged.
---
`subscription.charged` | Sent every time a successful charge is made on the subscription.
---
`subscription.completed`| Sent when all the invoices are generated for a subscription and the subscription moves to the `completed` state.
---
`subscription.updated` | Sent when a subscription is successfully updated. There is no state change when a subscription is updated.
---
`subscription.pending` | Sent when the subscription moves to the `pending` state. This happens when a charge on the card fails. We try to charge the card on a periodic basis while it is in the `pending` state. If the payment fails again, the Webhook is triggered again.
---
`subscription.halted`| Sent when all retries have been exhausted and the subscription moves from the `pending` state to the `halted` state. The customer has to manually retry the charge or change the card linked to the subscription, for the subscription to move back to the `active` state.
---
`subscription.cancelled` | Sent when a subscription is cancelled and moved to the `cancelled` state.
---
`subscription.paused`| Sent when a subscription is paused and moved to the `paused` state.
---
`subscription.resumed`| Sent when a subscription is resumed and moved to the `resumed` state.

> **INFO**
>
> 
> **Handy Tips**
> 
> The payload for all these events contain the subscription entity. They also contain a payment entity if a payment attempt was made before the event was triggered.
> 

## Sample Payloads

Given below are the sample payloads for Subscription webhook events.

### Subscription Authenticated

```json: subscription.authenticated
{
  "entity": "event",
  "account_id": "acc_F5Motm2sJ5Fomd",
  "event": "subscription.authenticated",
  "contains": [
    "subscription"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_F5aa7VaVXtXh80",
        "entity": "subscription",
        "plan_id": "plan_F5Zu0nrXVhHV2m",
        "customer_id": "cust_F5ZuzTm0cqYpzp",
        "status": "authenticated",
        "current_start": null,
        "current_end": null,
        "ended_at": null,
        "quantity": 1,
        "notes": [],
        "charge_at": 1593109800,
        "start_at": 1593109800,
        "end_at": 1598380200,
        "auth_attempts": 0,
        "total_count": 3,
        "paid_count": 0,
        "customer_notify": true,
        "created_at": 1592811228,
        "expire_by": null,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "remaining_count": 3
      }
    }
  },
  "created_at": 1592811255
}
```

### Subscription Activated

```json: Future start date and no upfront amount
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "subscription.activated",
  "contains": [
    "subscription"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_DEX6xcJ1HSW4CR",
        "entity": "subscription",
        "plan_id": "plan_BvrFKjSxauOH7N",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "status": "active",
        "current_start": 1570213800,
        "current_end": 1572892200,
        "ended_at": null,
        "quantity": 1,
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "charge_at": 1570213800,
        "start_at": 1570213800,
        "end_at": 1599244200,
        "auth_attempts": 0,
        "total_count": 12,
        "paid_count": 0,
        "customer_notify": true,
        "created_at": 1567689895,
        "expire_by": 1567881000,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "remaining_count": 11
      }
    }
  },
  "created_at": 1567690383
}
```json: Immediate start date/Upfront amount/Both
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "subscription.activated",
  "contains": [
    "subscription"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_DEX6xcJ1HSW4CR",
        "entity": "subscription",
        "plan_id": "plan_BvrFKjSxauOH7N",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "status": "active",
        "type": 2,
        "current_start": 1570213800,
        "current_end": 1572892200,
        "ended_at": null,
        "quantity": 1,
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "charge_at": 1570213800,
        "start_at": 1570213800,
        "end_at": 1599244200,
        "auth_attempts": 0,
        "total_count": 12,
        "paid_count": 1,
        "customer_notify": true,
        "created_at": 1567689895,
        "expire_by": 1567881000,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "remaining_count": 11
      }
    },
    "payment": {
      "entity": {
        "id": "pay_DEXFWroJ6LikKT",
        "entity": "payment",
        "amount": 100000,
        "currency": "INR",
        "status": "captured",
        "order_id": "order_DEXFWXwO24pDxH",
        "invoice_id": "inv_DEXFWVuM6rPqlK",
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": "1",
        "description": "Recurring Payment via Subscription",
        "card_id": "card_DEXFX0KGtXexrH",
        "card": {
          "id": "card_DEXFX0KGtXexrH",
          "entity": "card",
          "name": "Gaurav Kumar",
          "last4": "5558",
          "network": "MasterCard",
          "type": "credit",
          "issuer": "KARB",
          "international": false,
          "emi": false,
          "expiry_month": 2,
          "expiry_year": 2022
        },
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "token_id": null,
        "notes": [],
        "fee": 2900,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "created_at": 1567690382
      }
    },
    "created_at": 1567690383
  }
}
```

### Subscription Charged

```json: subscription.charged
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "subscription.charged",
  "contains": [
    "subscription",
    "payment"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_DEX6xcJ1HSW4CR",
        "entity": "subscription",
        "plan_id": "plan_BvrFKjSxauOH7N",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "status": "active",
        "type": 2,
        "current_start": 1570213800,
        "current_end": 1572892200,
        "ended_at": null,
        "quantity": 1,
        "notes": {
          "Important": "Notes for Internal Reference"
        },
        "charge_at": 1572892200,
        "start_at": 1570213800,
        "end_at": 1599244200,
        "auth_attempts": 0,
        "total_count": 12,
        "paid_count": 1,
        "customer_notify": true,
        "created_at": 1567689895,
        "expire_by": 1567881000,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "remaining_count": 11
      }
    },
    "payment": {
      "entity": {
        "id": "pay_DEXFWroJ6LikKT",
        "entity": "payment",
        "amount": 100000,
        "currency": "INR",
        "status": "captured",
        "order_id": "order_DEXFWXwO24pDxH",
        "invoice_id": "inv_DEXFWVuM6rPqlK",
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": "1",
        "description": "Recurring Payment via Subscription",
        "card_id": "card_DEXFX0KGtXexrH",
        "card": {
          "id": "card_DEXFX0KGtXexrH",
          "entity": "card",
          "name": "Gaurav Kumar",
          "last4": "5558",
          "network": "MasterCard",
          "type": "credit",
          "issuer": "KARB",
          "international": false,
          "emi": false,
          "expiry_month": 2,
          "expiry_year": 2022
        },
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "token_id": null,
        "notes": [],
        "fee": 2900,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "created_at": 1567690382
      }
    }
  },
  "created_at": 1567690383
}
```

### Subscription Completed

```json: subscription.completed
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "subscription.completed",
  "contains": [
    "subscription",
    "payment"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_DEX6xcJ1HSW4CR",
        "entity": "subscription",
        "plan_id": "plan_BvrFKjSxauOH7N",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "status": "completed",
        "type": 2,
        "current_start": 1599244200,
        "current_end": 1601836200,
        "ended_at": 1599244200,
        "quantity": 1,
        "notes": {
          "Important": "Notes for Internal Reference"
        },
        "charge_at": null,
        "start_at": 1570213800,
        "end_at": 1599244200,
        "auth_attempts": 0,
        "total_count": 12,
        "paid_count": 11,
        "customer_notify": true,
        "created_at": 1567689895,
        "expire_by": 1567881000,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "remaining_count": 0
      }
    },
    "payment": {
      "entity": {
        "id": "pay_DEXkZ54GsNwVk9",
        "entity": "payment",
        "amount": 100000,
        "currency": "INR",
        "status": "captured",
        "order_id": "order_DEXkYoCpua7kn3",
        "invoice_id": "inv_DEXkYmFDy966lT",
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": "1",
        "description": "Recurring Payment via Subscription",
        "card_id": "card_DEXkZBosDfKGEe",
        "card": {
          "id": "card_DEXkZBosDfKGEe",
          "entity": "card",
          "name": "Gaurav Kumar",
          "last4": "0008",
          "network": "MasterCard",
          "type": "unknown",
          "issuer": "",
          "international": false,
          "emi": false,
          "expiry_month": 11,
          "expiry_year": 2031
        },
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "token_id": null,
        "notes": [],
        "fee": 2900,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "created_at": 1567692144
      }
    }
  },
  "created_at": 1567692150
}
```

### Subscription Updated

```json: subscription.updated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "subscription.updated",
  "contains": [
    "subscription"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_DEXpmJhEIZK4fe",
        "entity": "subscription",
        "plan_id": "plan_BvrHngQ0xLNnNG",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "status": "active",
        "type": 3,
        "current_start": 1567692455,
        "current_end": 1570213800,
        "ended_at": null,
        "quantity": 4,
        "notes": {
          "Important": "Notes for Internal Reference"
        },
        "charge_at": 1570213800,
        "start_at": 1567692455,
        "end_at": 1599071400,
        "auth_attempts": 0,
        "total_count": 53,
        "paid_count": 1,
        "customer_notify": true,
        "created_at": 1567692440,
        "expire_by": 1567881000,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "remaining_count": 52
      }
    }
  },
  "created_at": 1567692560
}
```

### Subscription Pending

```json: subscription.pending
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "subscription.pending",
  "contains": [
    "subscription"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_DEX6xcJ1HSW4CR",
        "entity": "subscription",
        "plan_id": "plan_BvrFKjSxauOH7N",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "status": "pending",
        "type": 2,
        "current_start": 1572892200,
        "current_end": 1575484200,
        "ended_at": null,
        "quantity": 1,
        "notes": {
          "Important": "Notes for Internal Reference"
        },
        "charge_at": 1572978600,
        "start_at": 1570213800,
        "end_at": 1599244200,
        "auth_attempts": 1,
        "total_count": 12,
        "paid_count": 1,
        "customer_notify": true,
        "created_at": 1567689895,
        "expire_by": 1567881000,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "remaining_count": 10
      }
    }
  },
  "created_at": 1567691026
}
```

### Subscription Halted

```json: subscription.halted
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "subscription.halted",
  "contains": [
    "subscription"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_DEX6xcJ1HSW4CR",
        "entity": "subscription",
        "plan_id": "plan_BvrFKjSxauOH7N",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "status": "halted",
        "type": 2,
        "current_start": 1572892200,
        "current_end": 1575484200,
        "ended_at": null,
        "quantity": 1,
        "notes": {
          "Important": "Notes for Internal Reference"
        },
        "charge_at": 1575484200,
        "start_at": 1570213800,
        "end_at": 1599244200,
        "auth_attempts": 4,
        "total_count": 12,
        "paid_count": 1,
        "customer_notify": true,
        "created_at": 1567689895,
        "expire_by": 1567881000,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "remaining_count": 10
      }
    }
  },
  "created_at": 1567691269
}
```

### Subscription Paused

```json: subscription.paused
{
  "entity": "event",
  "account_id": "acc_Fe3fPCmiStazv3",
  "event": "subscription.paused",
  "contains": [
    "subscription"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_FeQ9WWOjGUZMpG",
        "entity": "subscription",
        "plan_id": "plan_FeMmuaVVa1HR0W",
        "customer_id": "cust_FeOEa4PPa0by07",
        "status": "paused",
        "type": 1,
        "current_start": 1600416437,
        "current_end": 1602959400,
        "ended_at": null,
        "quantity": 1,
        "notes": [],
        "charge_at": null,
        "start_at": 1600416437,
        "end_at": 1610908200,
        "auth_attempts": 0,
        "total_count": 5,
        "paid_count": 1,
        "customer_notify": true,
        "created_at": 1600416405,
        "expire_by": null,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "payment_method": "card",
        "remaining_count": 4,
        "pause_initiated_by": "self",
        "cancel_initiated_by": null
      }
    }
  },
  "created_at": 1600416473
}
```

### Subscription Resumed

```json: subscription.resumed
{
  "entity": "event",
  "account_id": "acc_Fe3fPCmiStazv3",
  "event": "subscription.resumed",
  "contains": [
    "subscription"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_FeQ9WWOjGUZMpG",
        "entity": "subscription",
        "plan_id": "plan_FeMmuaVVa1HR0W",
        "customer_id": "cust_FeOEa4PPa0by07",
        "status": "active",
        "type": 1,
        "current_start": 1600416437,
        "current_end": 1602959400,
        "ended_at": null,
        "quantity": 1,
        "notes": [],
        "charge_at": 1602959400,
        "start_at": 1600416437,
        "end_at": 1610908200,
        "auth_attempts": 0,
        "total_count": 5,
        "paid_count": 1,
        "customer_notify": true,
        "created_at": 1600416405,
        "expire_by": null,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "payment_method": "card",
        "remaining_count": 4,
        "pause_initiated_by": null,
        "cancel_initiated_by": null
      }
    }
  },
  "created_at": 1600416481
}
```

### Subscription Cancelled

```json: subscription.cancelled
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "subscription.cancelled",
  "contains": [
    "subscription"
  ],
  "payload": {
    "subscription": {
      "entity": {
        "id": "sub_DEXpmJhEIZK4fe",
        "entity": "subscription",
        "plan_id": "plan_BvrHngQ0xLNnNG",
        "customer_id": "cust_C0WlbKhp3aLA7W",
        "status": "cancelled",
        "type": 3,
        "current_start": 1568226600,
        "current_end": 1568831400,
        "ended_at": 1567692729,
        "quantity": 4,
        "notes": {
          "Important": "Notes for Internal Reference"
        },
        "charge_at": null,
        "start_at": 1567692455,
        "end_at": 1599071400,
        "auth_attempts": 0,
        "total_count": 53,
        "paid_count": 2,
        "customer_notify": true,
        "created_at": 1567692440,
        "expire_by": 1567881000,
        "short_url": null,
        "has_scheduled_changes": false,
        "change_scheduled_at": null,
        "source": "api",
        "offer_id":"offer_JHD834hjbxzhd38d",
        "remaining_count": 51
      }
    }
  },
  "created_at": 1567692732
}
```

> **WARN**
>
> 
> **Watch Out!**
> 
> - If you have changed your webhook secret, remember to use the old secret for webhook signature validation while retrying older requests. Using the new secret will lead to a signature mismatch.
> 
> - While generating a signature at your end, ensure that the webhook body is passed as an argument in the **raw webhook request body**. **Do not parse or cast the webhook request body**.
>
