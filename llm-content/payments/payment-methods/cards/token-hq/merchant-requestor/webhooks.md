---
title: Tokenisation Webhooks
description: List of webhook events for token status updates.
---

# Tokenisation Webhooks

Use Razorpay Webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL.

## Webhook Events for Token Status Updates

The table below lists the webhook events available for tokens.

Event | Description
---
`token.initiated` | Triggered when the tokenisation request is initiated.
---
`token.activated` | Triggered when: 
• The token status is changed to active for the first time. 
• The token status for a previously suspended token is changed to `active` again.
---
`token.suspended` | Triggered when the issuing bank temporarily suspends a token.
---
`token.deactivated` | Triggered when the token is permanently deactivated.
---
`token.expiry_updated` | Triggered when the issuing bank updates the expiry date for a token.

> **INFO**
>
> 
> **Handy Tips**
> 
> In case of network tokenised cards, the last 4 digits will be of the tokenised card and not the actual card.
> 

### token.initiated

```json: Initiated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.initiated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_4lsdksD31GaZ09",
        "entity": "token",
        "customer_id": "cust_1Aa00000000001",
        "method": "card",
        "card": {
          "last4": "3335",
          "network": "Visa",
          "type": "debit",
          "issuer": "HDFC",
          "international": false,
          "emi": true,
          "sub_type": "consumer",
          "token_iin": "453335"
        },
        "compliant_with_tokenisation_guidelines": true,
        "expired_at": 1748716199,
        "status": "initiated",
        "notes": []
      }
    }
  }
}
```

### token.activated

```json: Activated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.activated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_4lsdksD31GaZ09",
        "entity": "token",
        "customer_id": "cust_1Aa00000000001",
        "method": "card",
        "card": {
          "last4": "3335",
          "network": "Visa",
          "type": "debit",
          "issuer": "HDFC",
          "international": false,
          "emi": true,
          "sub_type": "consumer",
          "token_iin": "453335"
        },
        "compliant_with_tokenisation_guidelines": true,
        "expired_at": 1748716199,
        "status": "active",
        "notes": []
      }
    }
  }
}
```

### Sample Payload for token.activated as part of payment

```json: Token activated as part of payment
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.activated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_4lsdksD31GaZ09",
        "entity": "token",
        "customer_id": "cust_1Aa00000000001",
        "method": "card",
        "card": {
          "last4": "3335",
          "network": "Visa",
          "type": "debit",
          "issuer": "HDFC",
          "international": false,
          "emi": true,
          "sub_type": "consumer",
          "token_iin": "453335"
        },
        "compliant_with_tokenisation_guidelines": true,
        "expired_at": 1748716199,
        "status": "active",
        "notes": []
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
  }
}
```

### token.suspended

```json: Suspended
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.suspended",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_4lsdksD31GaZ09",
        "entity": "token",
        "customer_id": "cust_1Aa00000000001",
        "method": "card",
        "card": {
          "last4": "3335",
          "network": "Visa",
          "type": "debit",
          "issuer": "HDFC",
          "international": false,
          "emi": true,
          "sub_type": "consumer",
          "token_iin": "453335"
        },
        "compliant_with_tokenisation_guidelines": true,
        "expired_at": 1748716199,
        "status": "suspended",
        "notes": []
      }
    }
  }
}
```

### token.deactivated

```json: Deactivated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.deactivated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_4lsdksD31GaZ09",
        "entity": "token",
        "customer_id": "cust_1Aa00000000001",
        "method": "card",
        "card": {
          "last4": "3335",
          "network": "Visa",
          "type": "debit",
          "issuer": "HDFC",
          "international": false,
          "emi": true,
          "sub_type": "consumer",
          "token_iin": "453335"
        },
        "compliant_with_tokenisation_guidelines": true,
        "expired_at": 1748716199,
        "status": "deactivated",
        "notes": []
      }
    }
  }
}
```

### token.expiry_updated

```json: Expiry updated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.expiry_updated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_4lsdksD31GaZ09",
        "entity": "token",
        "customer_id": "cust_1Aa00000000001",
        "method": "card",
        "card": {
          "last4": "3335",
          "network": "Visa",
          "type": "debit",
          "issuer": "HDFC",
          "international": false,
          "emi": true,
          "sub_type": "consumer",
          "token_iin": "453335"
        },
        "compliant_with_tokenisation_guidelines": true,
        "expired_at": 1748716199,
        "status": "active",
        "notes": []
      }
    }
  }
}
```
