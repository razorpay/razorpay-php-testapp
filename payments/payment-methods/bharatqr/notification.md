---
title: Payment Methods | BharatQR - Notifications
heading: Notifications
description: Receive notifications for your Razorpay virtual account for payment captured event using webhooks and receive email notifications for payment successful event .
---

# Notifications

You will be notified of any payments made to your virtual accounts via webhook and email.

All payments made using BharatQR towards your account will show up on your Dashboard as well as in the usual payment API response as payments made with receiver `qr_code`. You can view the funds received by a virtual account using the `amount_paid` field in the virtual account entity. This field specifies the total amount (in Paise) that has been paid to the virtual account.

## Webhooks
Payments made using this method will also trigger webhooks much like regular payments. Refer our [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) documentation to learn how to use webhooks.

### Virtual Account Credited Event

Payments made using BharatQR are notified via the `virtual_account.credited` webhook event. The payload for this event contains details of the payment itself, as well as the virtual account that the payment was made towards.

```json: Virtual Account Credited
{
  "entity": "event",
  "account_id": "acc_CJoeHMNpi0nC7k",
  "event": "virtual_account.credited",
  "contains": [
    "payment",
    "virtual_account"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_EsWT9LM5LNXtG6",
        "entity": "payment",
        "amount": 500,
        "currency": "INR",
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": true,
        "description": "Bharat Qr Payment",
        "card_id": "card_EsWT9QCC3I1E1c",
        "card": {
          "id": "card_EsWT9QCC3I1E1c",
          "entity": "card",
          "name": "Razorpay",
          "last4": "0153",
          "network": "Visa",
          "type": "debit",
          "issuer": null,
          "international": false,
          "emi": false
        },
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": null,
        "contact": null,
        "notes": {
          "tea": "earl_grey"
        },
        "fee": 5,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "created_at": 1589958324
      }
    },
    "virtual_account": {
      "entity": {
        "id": "va_EsWSDoOxW3zhPV",
        "name": "Acme Corp",
        "entity": "virtual_account",
        "status": "active",
        "description": "test it",
        "amount_expected": null,
        "notes": {
          "reference_key": "repeat"
        },
        "amount_paid": 500,
        "customer_id": null,
        "close_by": null,
        "closed_at": null,
        "created_at": 1589958272,
        "receivers": [
          {
            "id": "qr_EsWSDoeAS1SREz",
            "entity": "qr_code",
            "reference": "EsWSDoeAS1SREz",
            "short_url": "https://rzp.io/i/81k6IXD",
            "created_at": 1589958272
          }
        ]
      }
    }
  },
  "created_at": 1589958325
}
```

## Emails

You will also receive a **payment successful** notification email, as you do for regular payments.
