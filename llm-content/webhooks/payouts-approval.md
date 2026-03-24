---
title: Payouts Approval Webhook Events
description: List of Payouts Approval webhook events along with sample payloads.
---

# Payouts Approval Webhook Events

Assign user roles to create and approve payouts using the [Payouts Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts-approval.md).

## List of Payouts Approval Webhook Events

The table below lists the webhook events available for RazorpayX Payouts Approval.

Webhook Event | Description
---
`payout.pending` | Triggered whenever a payout moves to the pending state. The payout remains in this state till you approve or reject it.

## Sample Payloads

Given below are the sample payloads for Payouts Approval webhook events.

### Payout Pending

```json: UPI
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "payout.pending",
  "contains": [
    "payout"
  ],
  "payload": {
    "payout": {
      "entity": {
        "id": "pout_1Aa00000000001",
        "entity": "payout",
        "fund_account": {
          "id": "fa_F681qr6Bqy1Je7",
          "entity": "fund_account",
          "contact_id": "cont_F681qmU11CfPDl",
          "contact": {
            "id": "cont_F681qmU11CfPDl",
            "entity": "contact",
            "name": "Gaurav Kumar",
            "contact": "9876543210",
            "email": "gaurav.kumar@example.com",
            "type": "employee",
            "reference_id": "Acme Contact ID 12345",
            "batch_id": null,
            "active": true,
            "notes": {
              "notes_key_1": "Tea, Earl Grey, Hot",
              "notes_key_2": "Tea, Earl Grey… decaf."
            },
            "created_at": 1592929016
          },
          "account_type": "bank_account",
          "vpa": {
            "username": "gaurav.kumar",
            "handle": "exampleupi",
            "address": "gaurav.kumar@exampleupi"
          }
        },
        "batch_id": "null",
        "active": true,
        "created_at": 1592929016
      },
      "amount": 100,
      "currency": "INR",
      "notes": {
        "note_key 1": "Tea. Earl Gray. Hot.",
        "note_key 2": "Tea. Earl Gray. Decaf."
      },
      "fees": 0,
      "tax": 0,
      "status": "pending",
      "purpose": "refund",
      "utr": null,
      "mode": "NEFT",
      "reference_id": null,
      "narration": "Test Fund Transfer",
      "batch_id": null,
      "status_details": {
        "description": "Confirmation of the credit to the beneficiary is pending from HDFC bank. Please check the status after 24th October 2021, 10:40 PM",
        "source": "beneficiary_bank"
      },
      "created_at": 1580808301
    }
  }
}
```json: Bank Account
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "payout.pending",
  "contains": [
    "payout"
  ],
  "payload": {
    "payout": {
      "entity": {
        "id": "pout_1Aa00000000001",
        "entity": "payout",
        "fund_account": {
          "id": "fa_F681qr6Bqy1Je7",
          "entity": "fund_account",
          "contact_id": "cont_F681qmU11CfPDl",
          "contact": {
            "id": "cont_F681qmU11CfPDl",
            "entity": "contact",
            "name": "Gaurav Kumar",
            "contact": "9876543210",
            "email": "gaurav.kumar@example.com",
            "type": "employee",
            "reference_id": "Acme Contact ID 12345",
            "batch_id": null,
            "active": true,
            "notes": {
              "notes_key_1": "Tea, Earl Grey, Hot",
              "notes_key_2": "Tea, Earl Grey… decaf."
            },
            "created_at": 1592929016
          },
          "account_type": "bank_account",
          "bank_account": {
            "ifsc": "HDFC0001234",
            "bank_name": "HDFC Bank",
            "name": "Gaurav Kumar",
            "notes": [],
            "account_number": "1121431121541121"
          },
          "batch_id": null,
          "active": true,
          "created_at": 1592929016
        },
        "amount": 100,
        "currency": "INR",
        "notes": {
          "note_key 1": "Tea. Earl Gray. Hot.",
          "note_key 2": "Tea. Earl Gray. Decaf."
        },
        "fees": 0,
        "tax": 0,
        "status": "pending",
        "purpose": "refund",
        "utr": null,
        "mode": "NEFT",
        "reference_id": null,
        "narration": "Test Fund Transfer",
        "batch_id": null,
        "status_details": {
          "description": "Confirmation of the credit to the beneficiary is pending from HDFC bank. Please check the status after 24th October 2021, 10:40 PM",
          "source": "beneficiary_bank"
        },
        "created_at": 1580808301
      }
    }
  }
}
```

@include webhooks/webhook-code-tips
