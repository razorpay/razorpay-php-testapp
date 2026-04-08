---
title: Payout Links Webhook Events
description: List of Payout Links webhook events along with sample payloads.
---

# Payout Links Webhook Events

Payout Links enable you to make payouts to those Contacts whose Fund Account details are not available. The payload remains the same irrespective of the `fund_account_type` to which payout was made. That is, the payload is same whether the payout was made to a bank account, VPA or card.

## List of Payout Links Webhook Events

The table below lists the webhook events available for RazorpayX Payout Links.

Term | Description
---
`payout_link.pending` | Triggered whenever a payout link moves to the `pending` state. This indicates that the payout link has been created. Applicable only for cases where approval workflow is set.
---
`payout_link.issued` | Triggered whenever a payout link moves to the `issued` state. This indicates that the payout link has been created.
---
`payout_link.processing` | Triggered whenever a payout link moves to the `processing` state. This indicates that your contact has entered their fund account details and the payout is being processed.
---
`payout_link.processed` | Triggered whenever a payout link moves to the `processed` state. This indicates that the payout has been successfully made.
---
`payout_link.attempted` | Triggered whenever the underlying payout has reversed and another attempt is required on the payout link.
---
`payout_link.cancelled` | Triggered whenever a payout link moves to the `cancelled` state. This indicates that you have cancelled the payout link.
---
`payout_link.rejected` | Triggered whenever a payout link moves to the `rejected` state. This indicates that the Approver has rejected the payout link. Applicable only for cases where approval workflow is set.
---
`payout_link.expired`| Triggered whenever a payout link moves to the `expired` state. This indicates that the payout link has expired. 

> **INFO**
>
> **Handy Tips**
 Expiry feature for Payout Links must be enabled before using this webhook event. Know more about how to [ enable the expiry feature.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links/set-expiry.md)

## Sample Payloads

Given below are the sample payloads for Payout Links webhook events.

### Payout Link Attempted

```json: payout_link.attempted
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "payout_link.attempted",
  "contains": [
    "payout_link"
  ],
  "payload": {
    "payout_link": {
      "entity": {
        "id": "poutlk_00000000000001",
        "entity": "payout_link",
        "contact_id": "cont_00000000000001",
        "contact": {
          "name": "Gaurav Kumar",
          "contact": "912345678",
          "email": "gaurav.kumar@example.com"
        },
        "fund_account_id": "fa_00000000000001",
        "purpose": "refund",
        "status": "issued",
        "amount": 1000,
        "currency": "INR",
        "description": "Payout link for Gaurav Kumar",
        "attempt_count": 0,
        "receipt": "Receipt No. 1",
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "short_url": "https://rzp.io/i/3b1Tw6",
        "send_sms": true,
        "send_email": true,
        "cancelled_at": null,
        "created_at": 1545383037,
        "expire_by": 1545384058,
        "expired_at": null
      }
    }
  },
  "created_at": 1545383037
}
```

### Payout Link Issued

```json: payout_link.issued
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "payout_link.issued",
  "contains": [
    "payout_link"
  ],
  "payload": {
    "payout_link": {
      "entity": {
        "id": "poutlk_FKkrBbaVLrr72C",
        "entity": "payout_link",
        "contact_id": "cont_FKkZzShONqnji5",
        "contact": {
          "name": "Gaurav Kumar",
          "email": "gaurav.kumar@example.com",
          "contact": "9876543210"
        },
        "fund_account_id": null,
        "purpose": "refund",
        "status": "issued",
        "amount": 1000,
        "currency": "INR",
        "description": "Payout link for Gaurav Kumar",
        "attempt_count": 0,
        "receipt": "Receipt No. 1",
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "short_url": "https://rzp.io/i/hEHLODQ",
        "send_sms": true,
        "send_email": true,
        "cancelled_at": null,
        "created_at": 1596122515,
        "expire_by": 1545384058,
        "expired_at": null
      }
    }
  },
  "created_at": 1596122515
}
```

### Payout Link Pending

```json: payout_link.pending
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "payout_link.pending",
  "contains": [
    "payout_link"
  ],
  "payload": {
    "payout_link": {
      "entity": {
        "id": "poutlk_FKkrBbaVLrr72C",
        "entity": "payout_link",
        "contact_id": "cont_FKkZzShONqnji5",
        "contact": {
          "name": "Gaurav Kumar",
          "email": "gaurav.kumar@example.com",
          "contact": "9876543210"
        },
        "fund_account_id": null,
        "purpose": "refund",
        "status": "pending",
        "amount": 1000,
        "currency": "INR",
        "description": "Payout link for Gaurav Kumar",
        "attempt_count": 0,
        "receipt": "Receipt No. 1",
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "short_url": "https://rzp.io/i/hEHLODQ",
        "send_sms": true,
        "send_email": true,
        "cancelled_at": null,
        "created_at": 1596122515,
        "expire_by": 1545384058,
        "expired_at": null
      }
    }
  },
  "created_at": 1596122515
}
```

### Payout Link Processing

The `fund_account_id` is populated at this stage.

```json: payout_link.processing
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "payout_link.processing",
  "contains": [
    "payout_link"
  ],
  "payload": {
    "payout_link": {
      "entity": {
        "id": "poutlk_00000000000001",
        "entity": "payout_link",
        "contact_id": "cont_00000000000001",
        "contact": {
          "name": "Gaurav Kumar",
          "contact": "912345678",
          "email": "gaurav.kumar@example.com"
        },
        "fund_account_id": "fa_00000000000001",
        "purpose": "refund",
        "status": "processing",
        "amount": 1000,
        "currency": "INR",
        "description": "Payout link for Gaurav Kumar",
        "attempt_count": 1,
        "receipt": "Receipt No. 1",
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "short_url": "https://rzp.io/i/3b1Tw6",
        "send_sms": true,
        "send_email": true,
        "cancelled_at": null,
        "created_at": 1545383037,
        "expire_by": 1545384058,
        "expired_at": null
      }
    }
  },
  "created_at": 1545383037
}
```

### Payout Link Processed

```json: payout_link.processed
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "payout_link.processed",
  "contains": [
    "payout_link"
  ],
  "payload": {
    "payout_link": {
      "entity": {
        "id": "poutlk_00000000000001",
        "entity": "payout_link",
        "contact_id": "cont_00000000000001",
        "contact": {
          "name": "Gaurav Kumar",
          "contact": "912345678",
          "email": "gaurav.kumar@example.com"
        },
        "fund_account_id": "fa_00000000000001",
        "purpose": "refund",
        "status": "processed",
        "amount": 1000,
        "currency": "INR",
        "description": "Payout link for Gaurav Kumar",
        "attempt_count": 1,
        "receipt": "Receipt No. 1",
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "short_url": "https://rzp.io/i/3b1Tw6",
        "send_sms": true,
        "send_email": true,
        "cancelled_at": null,
        "created_at": 1545383037,
        "expire_by": 1545384058,
        "expired_at": null
      }
    }
  },
  "created_at": 1545383037
}
```

### Payout Link Rejected

```json: payout_link.rejected
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "payout_link.rejected",
  "contains": [
    "payout_link"
  ],
  "payload": {
    "payout_link": {
      "entity": {
        "id": "poutlk_00000000000001",
        "entity": "payout_link",
        "contact_id": "cont_00000000000001",
        "contact": {
          "name": "Gaurav Kumar",
          "contact": "912345678",
          "email": "gaurav.kumar@example.com"
        },
        "fund_account_id": null,
        "purpose": "refund",
        "status": "rejected",
        "amount": 1000,
        "currency": "INR",
        "description": "Payout link for Gaurav Kumar",
        "attempt_count": 0,
        "receipt": "Receipt No. 1",
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "short_url": "https://rzp.io/i/3b1Tw6",
        "send_sms": true,
        "send_email": true,
        "cancelled_at": null,
        "created_at": 1545383037,
        "expire_by": 1545384058,
        "expired_at": null
      }
    }
  },
  "created_at": 1545383037
}
```

### Payout Link Cancelled

```json: payout_link.cancelled
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "payout_link.cancelled",
  "contains": [
    "payout_link"
  ],
  "payload": {
    "payout_link": {
      "entity": {
        "id": "poutlk_00000000000001",
        "entity": "payout_link",
        "contact_id": "cont_00000000000001",
        "contact": {
          "name": "Gaurav Kumar",
          "contact": "912345678",
          "email": "gaurav.kumar@example.com"
        },
        "fund_account_id": null,
        "purpose": "refund",
        "status": "cancelled",
        "amount": 1000,
        "currency": "INR",
        "description": "Payout link for Gaurav Kumar",
        "attempt_count": 0,
        "receipt": "Receipt No. 1",
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "short_url": "https://rzp.io/i/3b1Tw6",
        "send_sms": true,
        "send_email": true,
        "cancelled_at": 1595383037,
        "created_at": 1545383037,
        "expire_by": 1545384058,
        "expired_at": null
      }
    }
  },
  "created_at": 1545383037
}
```

### Payout Link Expired

```json: payout_link.expired
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "payout_link.expired",
  "contains": [
    "payout_link"
  ],
  "payload": {
    "payout_link": {
      "entity": {
        "id": "poutlk_00000000000001",
        "entity": "payout_link",
        "contact_id": "cont_00000000000001",
        "contact": {
          "name": "Gaurav Kumar",
          "contact": "912345678",
          "email": "gaurav.kumar@example.com"
        },
        "fund_account_id": null,
        "purpose": "refund",
        "status": "cancelled",
        "amount": 1000,
        "currency": "INR",
        "description": "Payout link for Gaurav Kumar",
        "attempt_count": 0,
        "receipt": "Receipt No. 1",
        "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "short_url": "https://rzp.io/i/3b1Tw6",
        "send_sms": true,
        "send_email": true,
        "cancelled_at": null,
        "created_at": 1545383037,
        "expire_by": 1545384058,
        "expired_at": 1545384658
      }
    }
  },
  "created_at": 1545383037
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
