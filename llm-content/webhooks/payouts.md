---
title: Payouts Webhook Events
description: List of Payouts webhook events along with sample payloads.
---

# Payouts Webhook Events

Payouts are transfer of funds from your business account to a contact's fund account.

## List of Payouts Webhook Events

The table below lists the webhook events available for RazorpayX Payouts.

Webhook Event | Applicable For | Description
---
`payout.pending` |_all payouts_ | Triggered whenever a payout moves to the `pending` state. The payout remains in this state till you approve or reject it.
---
`payout.rejected` |_all payouts_ | Triggered whenever a payout moves to the `rejected` state. The payout was rejected by someone from your team.
---
`payout.queued` |_all payouts_ | -  Triggered whenever a payout moves to the queued state. Payout goes to queued state when you do not have sufficient funds to process it or when the beneficiary bank/NPCI/partner bank is down. This event is applicable only for RazorpayX Lite.
- You will receive the reason for the payout to be in the queued state as part of the status_details object.

---
`payout.initiated` |_all payouts_ | Triggered when the payout moves to the `processing` state when the payout is created or from the `queued` state when sufficient funds are available to process the payout.
---
`payout.processed` |_all payouts_ | Triggered when a payout moves to the `processed` state. This happens when the payout is processed by the contact's bank.
---
`payout.updated`|_all payouts_ | Triggered whenever there is a change in the payout entity. For example, when we receive the UTR for the payout from the bank. - For NEFT transactions, this webhook is fired within 90 seconds.
- For IMPS and UPI transactions, this webhook is generally fired immediately.

---
`payout.reversed` |_all payouts_ | Triggered whenever a payout fails and the amount is returned to your business account.
---
`payout.failed` |_all payouts_ | Triggered when a payout is failed because the beneficiary bank OR NPCI OR processing partner bank is down. If the beneficiary bank/partner bank/NPCI does not recover within the stipulated SLA, a FAILED event will be sent with the respective reason. 
> **INFO**
>
> **Handy Tips** It is mandatory to subscribe to the `payout.failed` event if you are using Payout APIs. 

---
`payout.downtime.started` | _all payouts_ | Triggered when a payout downtime starts. Do not initiate a payout if this is triggered since the beneficiary bank is down and the payout will fail. 
> **WARN**
>
> **Watch Out!** UPI mode is not supported by `payout.downtime` webhooks. 
 
---
`payout.downtime.resolved` | _all payouts_ | Triggered when a payout downtime is resolved. Make payouts once this webhook is triggered as it indicates that the beneficiary bank downtime is resolved.

**Handy Tips**

The `error` object has been deprecated.

## Sample Payloads

Given below are the sample payloads for Payouts webhook events.

### Payout Pending

```json: payout.pending
{
  "entity":"event",
  "account_id":"acc_BfVUrG6tDiL7H0",
  "event":"payout.pending",
  "contains":[
    "payout"
  ],
  "payload":{
    "payout":{
      "entity":{
        "id":"pout_1Aa00000000001",
        "entity":"payout",
        "fund_account_id":"fa_1Aa00000000001",
        "amount":100,
        "currency":"INR",
        "notes":{
          "note_key 1":"Tea. Earl Gray. Hot.",
          "note_key 2":"Tea. Earl Gray. Decaf."
        },
        "fees":0,
        "tax":0,
        "status":"pending",
        "purpose":"refund",
        "utr":null,
        "mode":"NEFT",
        "reference_id":null,
        "narration":"Test Fund Transfer",
        "debit_account_number": "null",
        "batch_id":null,
        "status_details": {
          "description": "Confirmation of the credit to the beneficiary is pending from HDFC bank. Please check the status after after 24th October 2021, 10:40 PM",
          "source": "beneficiary_bank",
          "reason": "beneficiary_bank_confirmation_pending"
        }
        "created_at":1580808301,
        "fee_type": ""
      }
    }
  },
  "created_at":1580808301
}
```

Know about the [Payouts Approval Payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payouts-approval.md#webhooks).

### Payout Rejected

```json: payout.rejected
{
  "entity":"event",
  "account_id":"acc_BfVUrG6tDiL7H0",
  "event":"payout.rejected",
  "contains":[
    "payout"
  ],
  "payload":{
    "payout":{
      "entity":{
        "id":"pout_1Aa00000000001",
        "entity":"payout",
        "fund_account_id":"fa_1Aa00000000001",
        "amount":10000,
        "currency":"INR",
        "notes":{
          "note_key 1":"Tea. Earl Gray. Hot.",
          "note_key 2":"Tea. Earl Gray. Decaf."
        },
        "fees":0,
        "tax":0,
        "status":"rejected",
        "purpose":"refund",
        "utr":null,
        "mode":"NEFT",
        "reference_id":null,
        "narration":"Acme Fund Transfer",
        "debit_account_number": "null",
        "batch_id":null,
        "status_details": {
          "description": "Payout rejected by beneficiary bank. Please contact beneficiary bank",
          "source": "beneficiary_bank",
          "reason": "beneficiary_bank_rejected"
        }
        "created_at":1581512005,
        "fee_type": ""
      }
    }
  },
  "created_at":1581512006
}
```

### Payout Queued

```json: payout.queued
{
  "entity":"event",
  "account_id":"acc_BfVUrG6tDiL7H0",
  "event":"payout.queued",
  "contains":[
    "payout"
  ],
  "payload":{
    "payout":{
      "entity":{
        "id":"pout_1Aa00000000001",
        "entity":"payout",
        "fund_account_id":"fa_1Aa00000000001",
        "amount":286540,
        "currency":"INR",
        "notes":{
          "note_key 1":"Tea. Earl Gray. Hot.",
          "note_key 2":"Tea. Earl Gray. Decaf."
        },
        "fees":0,
        "tax":0,
        "status":"queued",
        "purpose":"payout",
        "utr":null,
        "mode":"IMPS",
        "reference_id":null,
        "narration":"Acme Fund Transfer",
        "debit_account_number": "null",
        "batch_id":null,
        "status_details": {
          "description": "Payout is queued as there is insufficient balance in your business account to process the payout",
          "source": "business",
          "reason": "low_balance"
        }
        "created_at":1580119445,
        "fee_type": ""
      }
    }
  },
  "created_at":1580119445
}
```

### Payout Initiated

```json: payout.initiated
{
  "entity":"event",
  "account_id":"acc_BfVUrG6tDiL7H0",
  "event":"payout.initiated",
  "contains":[
    "payout"
  ],
  "payload":{
    "payout":{
      "entity":{
        "id":"pout_1Aa00000000001",
        "entity":"payout",
        "fund_account_id":"fa_1Aa00000000001",
        "amount":100,
        "currency":"INR",
        "notes":{
          "note_key 1":"Tea. Earl Gray. Hot.",
          "note_key 2":"Tea. Earl Gray. Decaf."
        },
        "fees":590,
        "tax":90,
        "status":"processing",
        "purpose":"refund",
        "utr":null,
        "mode":"NEFT",
        "reference_id":null,
        "narration":"Acme Fund Transfer",
        "debit_account_number": "00228130001287",
        "batch_id":null,
        "status_details": {
          "description": "Confirmation of the credit to the beneficiary is pending from HDFC bank. Please check the status after after 24th October 2021, 10:40 PM",
          "source": "beneficiary_bank",
          "reason": "beneficiary_bank_confirmation_pending"
        }
        "created_at":1579865132,
        "fee_type": "",
      }
    }
  },
  "created_at":1579865132
}
```

### Payout Processed

```json: payout.processed
{
    "entity": "event",
    "account_id": "acc_Pup4LDLiA1DssX",
    "event": "payout.processed",
    "contains": [
      "payout"
    ],
    "payload": {
      "payout": {
        "entity": {
          "id": "pout_R7ambiUdUvg6AD",
          "entity": "payout",
          "fund_account_id": "fa_R7amb4zOx1gJoF",
          "fund_account": {
            "id": "fa_R7amb4zOx1gJoF",
            "entity": "fund_account",
            "contact_id": "cont_R7ama5UMAMqHB2",
            "account_type": "vpa",
            "batch_id": null,
            "vpa": {
              "username": "exampleupi",
              "handle": "ybl",
              "address": "exampleupi@ybl"
            },
            "active": true,
            "created_at": 1755693655
          },
          "amount": 100,
          "currency": "INR",
          "notes": {
            "notes_key_1": "Chai Tea Latte",
            "notes_key_2": "Cafe, decaf.",
            "VPA_HANDLE": "ybl",
            "payee_ifsc": "KKBK0000197",
            "payee_bank_name": "Kotak Mahindra Bank"
          },
          "fees": 0,
          "tax": 0,
          "status": "processed",
          "purpose": "payout",
          "utr": "523223155921",
          "mode": "UPI",
          "reference_id": null,
          "narration": "Payout to Acme Corp",
          "batch_id": null,
          "failure_reason": null,
          "created_at": 1755693656,
          "status_details": {
            "reason": "payout_processed",
            "description": "Payout is processed and the money has been credited into the beneficiary account.",
            "source": "beneficiary_bank"
          },
          "error": {
            "source": null,
            "reason": null,
            "description": null,
            "code": "NA",
            "step": "NA",
            "metadata": {}
          }
        }
      }
    },
    "created_at": 1755693679
  },
```

### Payout Updated

```json: payout.updated
{
  "entity":"event",
  "account_id":"acc_BfVUrG6tDiL7H0",
  "event":"payout.updated",
  "contains":[
    "payout"
  ],
  "payload":{
    "payout":{
      "entity":{
        "id":"pout_1Aa00000000001",
        "entity":"payout",
        "fund_account_id":"fa_1Aa00000000001",
        "amount":2000000,
        "currency":"INR",
        "notes":{
          "note_key 1":"Tea. Earl Gray. Hot.",
          "note_key 2":"Tea. Earl Gray. Decaf."
        },
        "fees":1062,
        "tax":162,
        "status":"processed",
        "purpose":"refund",
        "utr":"933815233814",
        "mode":"IMPS",
        "reference_id":null,
        "narration":"Acme Fund Transfer",
        "debit_account_number": "00228130001287",
        "batch_id":null,
        "status_details": {
          "description": "Payout is processed and the money has been credited into the beneficiaries account",
          "source": "beneficiary_bank",
          "reason": "payout_processed"
        }
        "created_at":1579863747,
        "fee_type": ""
      }
    }
  },
  "created_at":1579863747
}
```

### Payout Reversed

```json: payout.reversed
{
  "entity":"event",
  "account_id":"acc_BfVUrG6tDiL7H0",
  "event":"payout.reversed",
  "contains":[
    "payout"
  ],
  "payload":{
    "payout":{
      "entity":{
        "id":"pout_1Aa00000000001",
        "entity":"payout",
        "fund_account_id":"fa_1Aa00000000001",
        "amount":212,
        "currency":"INR",
        "notes":{
          "note_key 1":"Tea. Earl Gray. Hot.",
          "note_key 2":"Tea. Earl Gray. Decaf."
        },
        "fees":9,
        "tax":2,
        "status":"reversed",
        "purpose":"payout",
        "utr":"qwer12uijaaasssd",
        "mode":"IMPS",
        "reference_id":null,
        "narration":"Acme Fund Transfer",
        "debit_account_number": "00228130001287",
        "batch_id":null,
        "status_details": {
          "description": "Beneficiary bank systems are offline, please retry after 30 min",
          "source": "beneficiary_bank",
          "reason": "beneficiary_bank_offline"
        }
        "created_at":1580118057,
        "fee_type": ""
      }
    }
  },
  "created_at":1580118468
}
```

### Payout Failed

```json: payout.failed
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "payout.failed",
  "contains": [
    "payout"
  ],
  "payload": {
    "payout": {
      "entity": {
        "id": "pout_1Aa00000000001",
        "entity": "payout",
        "fund_account_id": "fa_1Aa00000000001",
        "amount": 100,
        "currency": "INR",
        "notes": {
          "note_key 1": "Tea. Earl Gray. Hot.",
          "note_key 2": "Tea. Earl Gray. Decaf."
        },
        "fees": 0,
        "tax": 0,
        "status": "failed",
        "purpose": "payout",
        "utr": "qwer12ui3323a22d",
        "mode": "IMPS",
        "reference_id": null,
        "narration": "Acme Fund Transfer",
        "debit_account_number": "00228130001287",
        "batch_id": null,
        "status_details":  {
          "description": "Payout failed as the beneficiary account is closed. Please contact the beneficiary bank",
          "source": "beneficiary_bank",
          "reason": "bank_account_closed"
        }
        "created_at": 1580120202,
        "fee_type": ""
      }
    }
  },
  "created_at": 1580120247
}
```

### Payout Downtime Started

```json: payout.downtime.started
{ 
  "entity": ​"event"​, 
  "account_id": ​"acc_CWX291oykl9aZA"​, 
  "event": ​"payout.downtime.started"​, 
  "contains": [ 
    ​"payout.downtime" 
  ], 
  "payload": { 
    "payout.downtime": { 
      "entity": { 
        "id": ​"poutdown_F1Zppa6lcVheSE"​, 
        "entity": ​"payout.downtime"​, 
        "scheduled": ​false​, 
        "method": ​["IMPS"]​, 
        "begin": ​1591935238​, 
        "end": ​null​,  
        "status": ​"started"​, 
        "source": ​"beneficiary"​, 
        "instrument": { 
          "bank": ​"SBI" 
        }, 
        "created_at": ​1591935238​, 
        "updated_at": ​1591935238 
      } 
    } 
  }, 
  "created_at": ​1591935238 
} 
```

> **INFO**
>
> 
> **Handy Tips**
> 
> The `payout.downtime.started` webhook is applicable for RTGS and NEFT modes also.
> 

### Payout Downtime Resolved

```json: payout.downtime.resolved
{
  "entity": "event",
  "event": "payout.downtime.resolved",
  "payload": {
    "payout.downtime": {
      "entity": {
        "begin": 1610430729,
        "created_at": 1610430729,
        "end": 1610431729,
        "entity": "payout.downtime",
        "id": "poutdown_GOHp6DSA5odXTu",
        "instrument": {
          "bank": "UTIB"
        },
        "method": [
          "IMPS"
        ],
        "scheduled": false,
        "source": "BENEFICIARY",
        "status": "resolved",
        "updated_at": 1610430729
      }
    }
  }
}
```
