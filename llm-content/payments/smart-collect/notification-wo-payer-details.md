---
title: Notification (prior to 24/05/19)
description: Receive notifications for your Razorpay Customer Identifier for payment captured event using webhooks and receive email notifications for payment successful event.
---

# Notification (prior to 24/05/19)

All payments made using Smart Collect will show up on your Dashboard as well as in the usual payment response APIs, as payments made with method `bank_transfer`.

## Webhooks
Payments made using this method will also trigger webhooks much like regular payments. To use webhooks, refer our [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md) documentation.

### Virtual Account Credited Event

You are notified about payments made using Smart Collect via the `virtual_account.credited` webhook.

The payload for this event contains details of the payment as well as the Customer Identifier that the payment was made towards.

Given below is the webhook payload for `virtual_account.credited`.

```
{
  "event": "virtual_account.credited",
  "entity": "event",
  "contains": [
    "payment",
    "virtual_account"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_6X6jcHoHdRdy79",
        "entity": "payment",
        "amount": 50000,
        "currency": "INR",
        "status": "captured",
        "amount_refunded": 0,
        "refund_status": null,
        "method": "bank_transfer",
        "order_id": "order_6X4mcHoSXRdy79",
        "card_id": null,
        "bank": null,
        "captured": true,
        "email": "saurav.kumar@example.com",
        "contact": "9123456780",
        "description": "Payment Description",
        "error_code": null,
        "error_description": null,
        "fee": 200,
        "tax": 10,
        "international": false,
        "notes": [],
        "vpa": null,
        "wallet": null
      }
    },
    "virtual_account": {
      "entity": {
        "id": "va_4xbQrmEoA5WJ0G",
        "entity": "virtual_account",
        "description": "First Virtual Account",
        "customer_id": "cust_805c8oBQdBGPwS",
        "status": "active",
        "amount_paid": 50000,
        "notes": {
          "reference_key": "reference_value"
        },
        "receivers": [
          {
            "id": "ba_4lsdkfldlteskf",
            "entity": "bank_account",
            "name": "Merchant Billing Label",
            "account_number": "11122219877893452",
            "ifsc": "RAZR0000001"
          }
        ],
        "created_at": 1455696638
      }
    },
    "created_at": 1400826760
  }
}
```

## Emails
You will also receive a 'payment successful' notification email, as you do for regular payments.
