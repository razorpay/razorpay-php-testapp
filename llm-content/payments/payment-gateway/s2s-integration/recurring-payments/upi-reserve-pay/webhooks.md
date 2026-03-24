---
title: Webhooks
description: Subscribe to UPI Reserve Pay webhook events to track token and mandate status.
---

# Webhooks

Subscribe to the following webhook events to receive real-time notifications about token and mandate status changes. For general webhook setup instructions, see [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

## token.confirmed

Sent when the customer approves the mandate after completing the authorisation flow. Once you receive this event, the mandate is active and funds are blocked. You can safely proceed to create subsequent payments.

```json: token.confirmed
{
  "entity": "event",
  "account_id": "acc_EDUGNVWZIB7Ewb",
  "event": "token.confirmed",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_RtP3bvcI7tle25",
        "entity": "token",
        "token": "4w03TrEDtkjmEJ",
        "bank": null,
        "wallet": null,
        "method": "upi",
        "vpa": {
          "username": "9876543210",
          "handle": "upi",
          "name": "GAURAV KUMAR",
          "status": "valid",
          "received_at": 1757596287
        },
        "recurring": true,
        "recurring_details": {
          "status": "confirmed",
          "failure_reason": null,
          "amount_blocked": 200,
          "amount_debited": 0
        },
        "auth_type": null,
        "mrn": null,
        "used_at": null,
        "created_at": 1766132688,
        "start_time": 1766132682,
        "notes": [],
        "error_description": null,
        "entity_id": null,
        "dcc_enabled": false,
        "max_amount": 200,
        "expired_at": 1767091469
      }
    }
  },
  "created_at": 1766133037
}
```

> **WARN**
>
> 
> **Watch Out!**
> 
> There is no mandate rejection option in the TPAP apps during testing.
> 

## token.cancellation_initiated

Sent when a cancellation request is acknowledged by NPCI. This event confirms that the cancellation process has begun; the blocked funds will be released to the customer's account once the cancellation is complete.

```json: token.cancellation_initiated
{
  "entity": "event",
  "account_id": "acc_EDUGNVWZIB7Ewb",
  "event": "token.cancellation_initiated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_RtOSr9o9lZwv5C",
        "entity": "token",
        "token": "9uZG3CE8KsVG9J",
        "bank": null,
        "wallet": null,
        "method": "upi",
        "vpa": {
          "username": "9876543210",
          "handle": "upi",
          "name": "GAURAV KUMAR",
          "status": "valid",
          "received_at": 1757596287
        },
        "recurring": true,
        "recurring_details": {
          "status": "cancellation_initiated",
          "failure_reason": "Mandate execution is completed.",
          "amount_blocked": 200,
          "amount_debited": 200
        },
        "auth_type": null,
        "mrn": null,
        "used_at": 1766131484,
        "created_at": 1766130600,
        "start_time": 1766130592,
        "notes": [],
        "error_description": null,
        "entity_id": null,
        "dcc_enabled": false,
        "max_amount": 200,
        "expired_at": 1767091469
      }
    }
  },
  "created_at": 1766380810
}
```
