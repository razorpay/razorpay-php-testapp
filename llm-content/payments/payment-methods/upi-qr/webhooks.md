---
title: Webhook Notifications
description: Set Webhooks to get notified about the events related to virtual accounts.
---

# Webhook Notifications

You can be notified of the events related to virtual accounts and payments by subscribing to the Webhooks available on the Dashboard.

@include webhooks/webhooks-setup

## Virtual Account Events

In the **Active Events** section, select the following events:

### virtual_account.created

This event is triggered when a virtual account is created.

```json: virtual_account.created
{
  "entity": "event",
  "account_id": "acc_BTIVttuC4ACVOz",
  "event": "virtual_account.created",
  "contains": [
    "virtual_account"
  ],
  "payload": {
    "virtual_account": {
      "entity": {
        "id": "va_Dzzpk3sCZKrcwf",
        "name": "acme",
        "entity": "virtual_account",
        "status": "active",
        "description": "Test001",
        "amount_expected": null,
        "notes": {
          "purpose": "emi payment"
        },
        "amount_paid": 0,
        "customer_id": null,
        "receivers": [
          {
            "id": "qr_Dzzpk4GF9c87kT",
            "entity": "qr_code",
            "reference": "Dzzpk4GF9c87kT",
            "short_url": "https://rzp.io/i/7WYVO8U",
            "created_at": 1578053029
          }
        ],
        "close_by": null,
        "closed_at": null,
        "created_at": 1578053030
      }
    }
  },
  "created_at": 1578053030
}
```

### virtual_account.credited

This event is generated when the payment is made to a virtual account.

```json: virtual_account.credited
{
  "entity": "event",
  "account_id": "acc_BTIVttuC4ACVOz",
  "event": "virtual_account.credited",
  "contains": [
    "payment",
    "virtual_account"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_Dzzhsw8OqB4LH3",
        "entity": "payment",
        "amount": 100,
        "currency": "INR",
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "upi",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": "l.-.l@ybl",
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "notes": [],
        "fee": 1,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "acquirer_data": {
          "rrn": null
        },
        "created_at": 1578052582
      }
    },
    "virtual_account": {
      "entity": {
        "id": "va_DzzhQ8z0VOy6N4",
        "name": "acme",
        "entity": "virtual_account",
        "status": "active",
        "description": "Test001",
        "amount_expected": 100,
        "notes": {
          "purpose": "emi payment"
        },
        "amount_paid": 100,
        "customer_id": null,
        "close_by": null,
        "closed_at": null,
        "created_at": 1578052556,
        "receivers": [
          {
            "id": "qr_DzzhQ9GuultaKH",
            "entity": "qr_code",
            "reference": "DzzhQ9GuultaKH",
            "short_url": "https://rzp.io/i/romdKJQ",
            "created_at": 1578052556
          }
        ]
      }
    }
  },
  "created_at": 1578052583
}
```

### virtual_account.closed

This event is triggered when a virtual account either expires on a date set or is manually closed by you. For example, you might want to stop accepting further payments for a virtual account. In such cases, the virtual account should be closed.

```json: virtual_account.closed
{
  "entity": "event",
  "account_id": "acc_BTIVttuC4ACVOz",
  "event": "virtual_account.closed",
  "contains": [
    "virtual_account"
  ],
  "payload": {
    "virtual_account": {
      "entity": {
        "id": "va_DzzhQ8z0VOy6N4",
        "name": "acme",
        "entity": "virtual_account",
        "status": "closed",
        "description": "Test001",
        "amount_expected": 100,
        "notes": {
          "purpose": "emi payment"
        },
        "amount_paid": 100,
        "customer_id": null,
        "receivers": [
          {
            "id": "qr_DzzhQ9GuultaKH",
            "entity": "qr_code",
            "reference": "DzzhQ9GuultaKH",
            "short_url": "https://rzp.io/i/romdKJQ",
            "created_at": 1578052556
          }
        ],
        "close_by": null,
        "closed_at": 1578053294,
        "created_at": 1578052556
      }
    }
  },
  "created_at": 1578053294
}
```

### Related Information

- [Set up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md)
- [Validate Signature](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/#validation.md)
