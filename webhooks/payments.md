---
title: Payments Webhook Events
description: List of Payments webhook events along with sample payloads.
---

# Payments Webhook Events

You can accept customer payments using Razorpay products. By subscribing to payments webhook events you can get notified about payment state changes.

## List of Payments Webhook Events

The table below lists the webhook events available for payments.

Webhook Event | Description
---
`payment.authorized` | Triggered when a payment is authorised.
---
`payment.captured` | Triggered when a payment is successfully captured.
---
`payment.failed` | Triggered when a payment fails.

> **INFO**
>
> 
> **Handy Tips**
> 
> - The payload for a Webhook is a snapshot of the entity when the event occurred.
> For example, when a customer makes a payment, its status changes to `authorized`. It can then immediately move to the `captured` state.

> - The payment can be in the `captured` state when the `payment.authorized` Webhook is fired. However, the payload for the `payment.authorized` event contains details of the events when the payment was authorised, not when it was captured.

> - In case of network tokenised cards, the last 4 digits will be of the tokenised card and not the actual card.
- The field `flow` is present only in the case of Turbo UPI Payments.

> 
> 

### Comparison: payment.captured vs order.paid

Orders and payments go hand-in-hand. Once a payment is captured, the order is marked paid.  This is reflected in the `order.paid` and `payment.captured` webhook events as well. These events are triggered when the payment associated with the order is captured.

`payment.captured` Webhook Event | `order.paid` Webhook Event
---
This event is triggered when the payment is successfully captured. | This event is triggered when a customer completes the checkout process and the order's status changes to `paid`.
---
This payload only contains the payment entity, providing details specific to the transaction, such as the amount, currency, and payment method. | This payload includes both order and payment entities, making all relevant information available in a single payload.

## Sample Payloads

Given below are the sample payloads for payments webhook events.

### Payment Authorised

```json: Netbanking
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "payment.authorized",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DESlfW9H8K9uqM",
        "entity": "payment",
        "amount": 100,
        "currency": "",
        "status": "authorized",
        "order_id": "order_DESlLckIVRkHWj",
        "invoice_id": null,
        "international": false,
        "method": "netbanking",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": false,
        "description": null,
        "card_id": null,
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": null,
        "tax": null,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "bank_transaction_id": "0125836177"
        },
        "created_at": 1567674599
      }
    }
  },
  "created_at": 1567674606
}

```json: Card
{
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "contains": [
    "payment"
  ],
  "created_at": 1691735748,
  "entity": "event",
  "event": "payment.authorized",
  "payload": {
    "payment": {
      "entity": {
        "acquirer_data": {
          "auth_code": "828553",
          "rrn": "322206890934"
        },
        "amount": 100,
        "amount_refunded": 0,
        "amount_transferred": 0,
        "bank": null,
        "captured": true,
        "card": {
          "emi": false,
          "entity": "card",
          "id": "card_DESp9fNnu0RoNc",
          "iin": "999999",
          "international": false,
          "issuer": null,
          "last4": "0153",
          "name": "Gaurav Kumar",
          "network": "Visa",
          "sub_type": "business",
          "type": "debit"
        },
        "card_id": "card_DESp9fNnu0RoNc",
        "contact": "+919876543210",
        "created_at": 1567674797,
        "currency": "INR",
        "description": null,
        "email": "gaurav.kumar@example.com",
        "entity": "payment",
        "error_code": "",
        "error_description": "",
        "error_reason": null,
        "error_source": null,
        "error_step": null,
        "fee": null,
        "id": "pay_DESp9bgForNoUd",
        "international": false,
        "invoice_id": null,
        "method": "card",
        "notes": [],
        "order_id": "order_DESoU0U4ikYA19",
        "refund_status": null,
        "status": "authorized",
        "tax": null,
        "token_id": "token_MOfFlFTC1CBDOi",
        "vpa": null,
        "wallet": null
      }
    }
  }
}

```json: Wallets
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "payment.authorized",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DEStK8twGApHtW",
        "entity": "payment",
        "amount": 100,
        "currency": "",
        "status": "authorized",
        "order_id": "order_DESso0U9bpuzQc",
        "invoice_id": null,
        "international": false,
        "method": "wallet",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": false,
        "description": null,
        "card_id": null,
        "bank": null,
        "wallet": "payzapp",
        "vpa":null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": null,
        "tax": null,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "transaction_id": null
        },
        "created_at": 1567675034
      }
    }
  },
  "created_at": 1567675037
}
```json: UPI
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "payment.authorized",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DESyzxuld02Zul",
        "entity": "payment",
        "amount": 100,
        "currency": "",
        "status": "authorized",
        "order_id": "order_DESxiijbl9xjDB",
        "invoice_id": null,
        "international": false,
        "method": "upi",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": false,
        "description": null,
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": "gaurav.kumar@upi",
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": null,
        "tax": null,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "rrn": "0125836177"
        },
        "created_at": 1567675356,
        "upi": {
          "payer_account_type": "credit_card",
          "vpa": "gaurav.kumar@upi",
          "flow": "intent"
        }
      }
    }
  },
  "created_at": 1567675356
}
```

### Payment Captured

```json: Netbanking
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "payment.captured",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DESlfW9H8K9uqM",
        "entity": "payment",
        "amount": 100,
        "currency": "",
        "base_amount": 100,
        "status": "captured",
        "order_id": "order_DESlLckIVRkHWj",
        "invoice_id": null,
        "international": false,
        "method": "netbanking",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": 2,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "bank_transaction_id": "0125836177"
        },
        "created_at": 1567674599
      }
    }
  },
  "created_at": 1567674606
}

```json: Card
{
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "contains": [
    "payment"
  ],
  "created_at": 1691735748,
  "entity": "event",
  "event": "payment.captured",
  "payload": {
    "payment": {
      "entity": {
        "acquirer_data": {
          "auth_code": "828553",
          "rrn": "322206890934"
        },
        "amount": 100,
        "amount_refunded": 0,
        "amount_transferred": 0,
        "bank": null,
        "captured": true,
        "card": {
          "emi": false,
          "entity": "card",
          "id": "card_DESp9fNnu0RoNc",
          "iin": "999999",
          "international": false,
          "issuer": null,
          "last4": "0153",
          "name": "Gaurav Kumar",
          "network": "Visa",
          "sub_type": "business",
          "type": "debit"
        },
        "card_id": "card_DESp9fNnu0RoNc",
        "contact": "+919876543210",
        "created_at": 1567674797,
        "currency": "INR",
        "description": null,
        "email": "gaurav.kumar@example.com",
        "entity": "payment",
        "error_code": "",
        "error_description": "",
        "error_reason": null,
        "error_source": null,
        "error_step": null,
        "fee": null,
        "id": "pay_DESp9bgForNoUd",
        "international": false,
        "invoice_id": null,
        "method": "card",
        "notes": [],
        "order_id": "order_DESoU0U4ikYA19",
        "refund_status": null,
        "status": "captured",
        "tax": null,
        "token_id": "token_MOfFlFTC1CBDOi",
        "vpa": null,
        "wallet": null
      }
    }
  }
}

```json: Wallets
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "payment.captured",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DEStK8twGApHtW",
        "entity": "payment",
        "amount": 100,
        "currency": "",
        "base_amount": 100,
        "status": "captured",
        "order_id": "order_DESso0U9bpuzQc",
        "invoice_id": null,
        "international": false,
        "method": "wallet",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": null,
        "wallet": "payzapp",
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": 2,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "transaction_id": null
        },
        "created_at": 1567675034
      }
    }
  },
  "created_at": 1567675037
}
```json: UPI
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "payment.captured",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DESyzxuld02Zul",
        "entity": "payment",
        "amount": 100,
        "currency": "",
        "base_amount": 100,
        "status": "captured",
        "order_id": "order_DESxiijbl9xjDB",
        "invoice_id": null,
        "international": false,
        "method": "upi",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": "gaurav.kumar@upi",
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": 2,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "rrn": "0125836177"
        },
        "created_at": 1567675356,
        "upi": {
          "payer_account_type": "credit_card",
          "vpa": "gaurav.kumar@upi",
          "flow": "intent"
        }
      }
    }
  },
  "created_at": 1567675356
}
```

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You may occasionally observe a `payment.failed` webhook followed by a `payment.captured` webhook for the same transaction. While late authorisation is a known reason for this, user-initiated retries, particularly with UPI transactions, also cause this sequence.
> 
> Here is a common scenario:
> 
> A customer attempts a UPI payment via their Third-Party Application Provider (TPAP) such as PhonePe or Google Pay. The initial attempt fails, perhaps due to an **incorrect PIN** or **insufficient balance**.
> 
> Most UPI TPAPs offer an immediate option to retry the payment directly within their app. When a customer retries, here is how our system responds:
> 
> 1. We **trigger and send a `payment.failed` webhook** to your configured endpoint, indicating the initial payment failure.
> 2. If the customer retries the payment and successfully completes it (for example, by entering the correct PIN), the transaction concludes.
> 3. Subsequently, we **send a `payment.captured` webhook**, confirming the successful capture of funds for that same transaction.
> 
> This sequence is **expected behaviour**. It allows customers to correct errors and complete their transactions without having to start a new payment process.
> 
> 

### Payment Failed

```json: Netbanking
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "payment.failed",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DEAU825sJlCbGa",
        "entity": "payment",
        "amount": 50000,
        "currency": "",
        "status": "failed",
        "order_id": "order_DEATVTRRctwEGb",
        "invoice_id": null,
        "international": false,
        "method": "netbanking",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": false,
        "description": null,
        "card_id": null,
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": null,
        "tax": null,
        "error_code": "BAD_REQUEST_ERROR",
        "error_description": "Payment failed",
        "error_source": "bank",
        "error_step": "payment_authorization",
        "error_reason": "payment_failed",
        "acquirer_data": {
          "bank_transaction_id": null
        },
        "created_at": 1567610214
      }
    }
  },
  "created_at": 1567610215
}
```json: Card
{
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "contains": [
    "payment"
  ],
  "created_at": 1691735748,
  "entity": "event",
  "event": "payment.failed",
  "payload": {
    "payment": {
      "entity": {
        "acquirer_data": {
          "auth_code": "828553",
          "rrn": "322206890934"
        },
        "amount": 100,
        "amount_refunded": 0,
        "amount_transferred": 0,
        "bank": null,
        "captured": true,
        "card": {
          "emi": false,
          "entity": "card",
          "id": "card_DESp9fNnu0RoNc",
          "iin": "999999",
          "international": false,
          "issuer": null,
          "last4": "0153",
          "name": "Gaurav Kumar",
          "network": "Visa",
          "sub_type": "business",
          "type": "debit"
        },
        "card_id": "card_DESp9fNnu0RoNc",
        "contact": "+919000090000",
        "created_at": 1567674797,
        "currency": "",
        "description": null,
        "email": "gaurav.kumar@example.com",
        "entity": "payment",
        "error_code": "",
        "error_description": "",
        "error_reason": null,
        "error_source": null,
        "error_step": null,
        "fee": null,
        "id": "pay_DESp9bgForNoUd",
        "international": false,
        "invoice_id": null,
        "method": "card",
        "notes": [],
        "order_id": "order_DESoU0U4ikYA19",
        "refund_status": null,
        "status": "failed",
        "tax": null,
        "token_id": "token_MOfFlFTC1CBDOi",
        "vpa": null,
        "wallet": null
      }
    }
  }
}

```json: Wallets
{
  "entity": "event",
  "account_id": "acc_E6ztBHzyaVFgBV",
  "event": "payment.failed",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_Epiu9wz2hXBGsJ",
        "entity": "payment",
        "amount": 10000,
        "currency": "",
        "status": "failed",
        "order_id": "order_Epitst92Bya4gC",
        "invoice_id": "inv_EpitssSmeINDJU",
        "international": false,
        "method": "wallet",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": false,
        "description": "#inv_EpitssSmeINDJU",
        "card_id": null,
        "bank": null,
        "wallet": "payzapp",
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": null,
        "tax": null,
        "error_code": "BAD_REQUEST_ERROR",
        "error_description": "Payment failed",
        "error_source": "issuer",
        "error_step": "payment_authorization",
        "error_reason": "payment_failed",
        "acquirer_data": {
          "transaction_id": null
        },
        "created_at": 1589347098
      }
    }
  },
  "created_at": 1589347099
}
```json: UPI
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "payment.failed",
  "contains": [
    "payment"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DESyzxuld02Zul",
        "entity": "payment",
        "amount": 100,
        "currency": "",
        "status": "failed",
        "order_id": "order_DESxiijbl9xjDB",
        "invoice_id": null,
        "international": false,
        "method": "upi",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": false,
        "description": null,
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": "gaurav.kumar@upi",
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": null,
        "tax": null,
        "error_code": "BAD_REQUEST_ERROR",
        "error_description": "Payment failed",
        "error_source": "issuer",
        "error_step": "payment_authorization",
        "error_reason": "payment_failed",
        "acquirer_data": {
          "rrn": null
        },
        "created_at": 1567675356,
        "upi": {
          "payer_account_type": "credit_card",
          "vpa": "gaurav.kumar@upi",
          "flow": "intent"
        }
      }
    }
  },
  "created_at": 1567675356
}
```

> **WARN**
>
> 
> **Watch Out!**
> 
> - Do not hardcode the `vpa` parameter in the integration. If a UPI Intent payment fails, the `vpa` parameter may not get displayed at times.
> - The webhook sequence is not fixed in the **JSON** payload for payment events.
> - `payment.failed` is not triggered if the payment fails during authorisation (while making the first payment).
> 

## Payments Downtime

Downtime is a period during which one or more payment options underperform, leading to considerable delays in payment processing. These downtimes are due to technical issues or outages at Razorpay's partner or issuing banks side. Razorpay informs you about the downtime to communicate it to your customers.

### List of Payments Downtime Webhook Events

The table below lists the webhook events available for payments downtime.

Webhook Event | Description
---
`payment.downtime.started` | Triggered at the beginning of the downtime.
---
`payment.downtime.resolved` | Triggered when a downtime is resolved.
---
`payment.downtime.updated` | Triggered when a downtime is updated.

### Payment Downtime Started

```json: Netbanking
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "netbanking",
        "begin": 1591935238,
        "end": null,
        "status": "started",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "bank": "VIJB"
        },
        "instrument_schema": ["bank"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Card - Issuer
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1591935238,
        "end": null,
        "status": "started",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "issuer": "SBIN",
          "type": "credit"          
        },
        "instrument_schema": ["issuer", "type"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Card - Network
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1591935238,
        "end": null,
        "status": "started",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "network": "MC",
          "type": "credit"
        },
        "instrument_schema": ["network", "type"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: UPI - VPA Handle
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1591935238,
        "end": null,
        "status": "started",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "vpa_handle": "oksbi",
          "flow":"collect"
        },
        "instrument_schema": ["vpa_handle", "flow"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: UPI - PSP
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1591935238,
        "end": null,
        "status": "started",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "psp": "bhim",
          "flow":"collect"
        },
        "instrument_schema": ["psp", "flow"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Turbo UPI
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
         "id": "down_F8LCfthx90fMOo",
         "method": "upi",
         "begin": 1593412063,
         "end": null,
         "status": "started",
         "scheduled": false,
         "severity": "high",
         "instrument": {
            "flow": "in_app"
         },
         "created_at": 1593412092,
         "updated_at": 1593412092
       }

    }
  },
  "created_at": 1591935238
}
```

### Payment Downtime Resolved

```json: Netbanking
{
  "entity": "event",
  "account_id": "acc_DjF2cSbjtnqhJ5",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_ENCWhh1lon7Hpp",
        "entity": "payment.downtime",
        "method": "netbanking",
        "begin": 1583119550,
        "end": 1583119551,
        "status": "resolved",
        "scheduled": false,
        "severity": "medium",
        "instrument": {
          "bank": "COSB"
        },
        "instrument_schema": ["bank"],
        "created_at": 1583119551,
        "updated_at": 1591948663
      }
    }
  },
  "created_at": 1591948663
}

```json: Card - Issuer
{
  "entity": "event",
  "account_id": "acc_DjF2cSbjtnqhJ5",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_ENCWhh1lon7Hpp",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1583119550,
        "end": 1583119551,
        "status": "resolved",
        "scheduled": false,
        "severity": "medium",
        "instrument": {
          "issuer": "SBIN",
          "type": "credit"
        },
        "instrument_schema": ["issuer", "type"],
        "created_at": 1583119551,
        "updated_at": 1591948663
      }
    }
  },
  "created_at": 1591948663
}

```json: Card - Network
{
  "entity": "event",
  "account_id": "acc_DjF2cSbjtnqhJ5",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_ENCWhh1lon7Hpp",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1583119550,
        "end": 1583119551,
        "status": "resolved",
        "scheduled": false,
        "severity": "medium",
        "instrument": {
          "network": "MC",
          "type": "credit"
        },
        "instrument_schema": ["network", "type"],
        "created_at": 1583119551,
        "updated_at": 1591948663
      }
    }
  },
  "created_at": 1591948663
}

```json: UPI - VPA Handle
{
  "entity": "event",
  "account_id": "acc_DjF2cSbjtnqhJ5",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_ENCWhh1lon7Hpp",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1583119550,
        "end": 1583119551,
        "status": "resolved",
        "scheduled": false,
        "severity": "medium",
        "instrument": {
          "vpa_handle": "oksbi",
          "flow":"collect"
        },
        "instrument_schema": ["vpa_handle", "flow"],
        "created_at": 1583119551,
        "updated_at": 1591948663
      }
    }
  },
  "created_at": 1591948663
}

```json: UPI - PSP
{
  "entity": "event",
  "account_id": "acc_DjF2cSbjtnqhJ5",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_ENCWhh1lon7Hpp",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1583119550,
        "end": 1583119551,
        "status": "resolved",
        "scheduled": false,
        "severity": "medium",
        "instrument": {
          "psp": "bhim",
          "flow":"collect"
        },
        "instrument_schema": ["psp", "flow"],
        "created_at": 1583119551,
        "updated_at": 1591948663
      }
    }
  },
  "created_at": 1591948663
}

```json: Turbo UPI
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
         "id": "down_F8LCfthx90fMOo",
         "method": "upi",
         "begin": 1593412063,
         "end": null,
         "status": "resolved",
         "scheduled": false,
         "severity": "high",
         "instrument": {
             "flow": "in_app"
         },
         "created_at": 1593412092,
         "updated_at": 1593412092
       }

    }
  },
  "created_at": 1591935238
}
```

### Payment Downtime Updated

```json: Netbanking
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "netbanking",
        "begin": 1591935238,
        "end": null,
        "status": "updated",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "bank": "VIJB"
        },
        "instrument_schema": ["bank"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Card - Network
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1591935238,
        "end": null,
        "status": "updated",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "network": "MC",
          "type": "credit"
        },
        "instrument_schema": ["network", "type"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Card - Issuer
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1591935238,
        "end": null,
        "status": "updated",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "issuer": "SBIN",
          "type": "credit"
        },
        "instrument_schema": ["issuer", "type"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: UPI - VPA Handle
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1591935238,
        "end": null,
        "status": "updated",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "vpa_handle": "oksbi",
          "flow": "collect"
        },
        "instrument_schema": ["vpa_handle", "flow"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: UPI - PSP
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1591935238,
        "end": null,
        "status": "updated",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "psp": "bhim",
          "flow": "collect"
        },
        "instrument_schema": ["psp", "flow"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Turbo UPI
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
         "id": "down_F8LCfthx90fMOo",
         "method": "upi",
         "begin": 1593412063,
         "end": null,
         "status": "updated",
         "scheduled": false,
         "severity": "high",
         "instrument": {
             "flow": "in_app"
         },
         "created_at": 1593412092,
         "updated_at": 1593412092
       }

    }
  },
  "created_at": 1591935238
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
