---
title: Refunds Webhook Events
description: List of Refunds webhook events along with sample payloads.
---

# Refunds Webhook Events

A **Refund** is the reversal of a transaction, returning the customer's payment made for a product or service.

## List of Refunds Webhook Events

The table below lists the webhook events available for refunds.

Webhook Event | Description
---
`refund.created` | Triggered when a refund is created.
---
`refund.processed` | Triggered when the refund is successfully processed.
---
`refund.failed` | Triggered when we are not able to process a refund.
---
`refund.speed_changed` | Triggered when refund speed is changed.

## Sample Payloads

Given below are the sample payloads for refunds webhook events.

### Refund Created

```json: Normal Refunds
{
  "entity": "event",
  "account_id": "acc_E7OQJcEANmBHTC",
  "event": "refund.created",
  "contains": [
    "refund",
    "payment"
  ],
  "payload": {
    "refund": {
      "entity": {
        "id": "rfnd_FS8TWyPrCsa0OB",
        "entity": "refund",
        "amount": 50000,
        "currency": "INR",
        "payment_id": "pay_FPoJKWQQ8lK13n",
        "notes": {
          "comment": "Customer Notes for Webhooks."
        },
        "receipt": null,
        "acquirer_data": {
          "arn": null
        },
        "created_at": 1597734071,
        "batch_id": null,
        "status": "processed",
        "speed_processed": "normal",
        "speed_requested": "optimum"
      }
    },
    "payment": {
      "entity": {
        "id": "pay_FPoJKWQQ8lK13n",
        "entity": "payment",
        "amount": 500000,
        "currency": "INR",
        "base_amount": 500000,
        "status": "captured",
        "order_id": "order_FPoIeimWki9j8A",
        "invoice_id": null,
        "international": false,
        "method": "netbanking",
        "amount_refunded": 190000,
        "amount_transferred": 0,
        "refund_status": "partial",
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "notes": [],
        "fee": 11800,
        "tax": 1800,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "bank_transaction_id": "4827433"
        },
        "created_at": 1597226379
      }
    }
  },
  "created_at": 1597734071
}
```

### Refund Processed

```json: Normal Refunds
{
  "entity": "event",
  "account_id": "acc_E7OQJcEANmBHTC",
  "event": "refund.processed",
  "contains": [
    "refund",
    "payment"
  ],
  "payload": {
    "refund": {
      "entity": {
        "id": "rfnd_FS8TWyPrCsa0OB",
        "entity": "refund",
        "amount": 50000,
        "currency": "INR",
        "payment_id": "pay_FPoJKWQQ8lK13n",
        "notes": {
          "comment": "Customer Notes for Webhooks."
        },
        "receipt": null,
        "acquirer_data": {
          "arn": null
        },
        "created_at": 1597734071,
        "batch_id": null,
        "status": "processed",
        "speed_processed": "normal",
        "speed_requested": "optimum"
      }
    },
    "payment": {
      "entity": {
        "id": "pay_FPoJKWQQ8lK13n",
        "entity": "payment",
        "amount": 500000,
        "currency": "INR",
        "base_amount": 500000,
        "status": "captured",
        "order_id": "order_FPoIeimWki9j8A",
        "invoice_id": null,
        "international": false,
        "method": "netbanking",
        "amount_refunded": 190000,
        "amount_transferred": 0,
        "refund_status": "partial",
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "notes": [],
        "fee": 11800,
        "tax": 1800,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "bank_transaction_id": "4827433"
        },
        "created_at": 1597226379
      }
    }
  },
  "created_at": 1597734071
}
```

### Refund Failed

```json: Normal Refunds
{
  "entity": "event",
  "account_id": "acc_E7OQJcEANmBHTC",
  "event": "refund.failed",
  "contains": [
    "refund",
    "payment"
  ],
  "payload": {
    "refund": {
      "entity": {
        "id": "rfnd_FS8TWyPrCsa0OB",
        "entity": "refund",
        "amount": 50000,
        "currency": "INR",
        "payment_id": "pay_FPoJKWQQ8lK13n",
        "notes": {
          "comment": "Customer Notes for Webhooks."
        },
        "receipt": null,
        "acquirer_data": {
          "arn": null
        },
        "created_at": 1597734071,
        "batch_id": null,
        "status": "failed",
        "speed_processed": "normal",
        "speed_requested": "optimum"
      }
    },
    "payment": {
      "entity": {
        "id": "pay_FPoJKWQQ8lK13n",
        "entity": "payment",
        "amount": 500000,
        "currency": "INR",
        "base_amount": 500000,
        "status": "captured",
        "order_id": "order_FPoIeimWki9j8A",
        "invoice_id": null,
        "international": false,
        "method": "netbanking",
        "amount_refunded": 190000,
        "amount_transferred": 0,
        "refund_status": "partial",
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "notes": [],
        "fee": 11800,
        "tax": 1800,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "bank_transaction_id": "4827433"
        },
        "created_at": 1597226379
      }
    }
  },
  "created_at": 1597734071
}
```

### Refund Speed Changed

```json: refund.speed_changed
{
  "entity": "event",
  "account_id": "acc_BTIVttuC4ACVOz",
  "event": "refund.speed_changed",
  "contains": [
    "refund",
    "payment"
  ],
  "payload": {
    "refund": {
      "entity": {
        "id": "rfnd_EcPN8eJuzH5Yaz",
        "entity": "refund",
        "amount": 200,
        "currency": "INR",
        "payment_id": "pay_EcPJsxu8cSzOK6",
        "notes": [],
        "receipt": null,
        "acquirer_data": {},
        "created_at": 1586439890,
        "status": "processed",
        "speed_processed": "normal",
        "speed_requested": "optimum"
      }
    },
    "payment": {
      "entity": {
        "id": "pay_EcPJsxu8cSzOK6",
        "entity": "payment",
        "amount": 500000,
        "currency": "INR",
        "base_amount": 500000,
        "status": "captured",
        "order_id": "order_FPoIeimWki9j8A",
        "invoice_id": null,
        "international": false,
        "method": "netbanking",
        "amount_refunded": 190000,
        "amount_transferred": 0,
        "refund_status": "partial",
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919977665544",
        "notes": [],
        "fee": 11800,
        "tax": 1800,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "bank_transaction_id": "4827433"
        },
        "created_at": 1585226379
      }
    },
    "created_at": 1586439890
  }
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
