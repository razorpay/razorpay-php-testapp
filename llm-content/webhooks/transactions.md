---
title: Transactions Webhook Events
description: List of Transactions webhook events along with sample payloads.
---

# Transactions Webhook Events

Transactions are the records of inflow of funds to your business account, and payouts to a Contact's Fund Account and reversals.

## List of Transactions Webhook Events

The table below lists the webhook events available for RazorpayX transactions.

Webhook Events | Description
---
`transaction.created`| Triggered whenever you: -  Make a Payout (RazorpayX Lite). 
-  Add funds to your RazorpayX account (RazorpayX Lite). 

## Sample Payloads
Given below are the sample payloads for transactions webhook events.

### Transaction Created

```JSON: Payload: Payout
{
  "entity":"event",
  "account_id":"acc_1Aa00000000001",
  "event":"transaction.created",
  "contains":[
    "transaction"
  ],
  "payload":{
    "transaction":{
      "entity":{
        "id":"txn_1Aa00000000001",
        "entity":"transaction",
        "account_number":"7878780080749731",
        "amount":218,
        "currency":"INR",
        "credit":0,
        "debit":218,
        "balance":4242,
        "source":{
          "id":"pout_1Aa00000000001",
          "entity":"payout",
          "fund_account_id":"fa_1Aa00000000001",
          "amount":100,
          "notes":[],
          "fees":118,
          "tax":18,
          "status":"processing",
          "utr":null,
          "mode":"IMPS",
          "created_at":1565343608
        },
        "created_at":1565343678
      }
    }
  },
  "created_at":1565343678
}
```json: Payload: Add Funds (Direct Bank Transfer)
{
"entity": "event",
"account_id": "acc_00000000000001",
"event": "transaction.created",
"contains": ["transaction"],
"payload": {
  "transaction": {
    "entity": {
      "id": "txn_00000000000001",
      "entity": "transaction",
      "account_number": "1121431121541121",
      "amount": 10000000,
      "currency": "INR",
      "credit": 10000000,
      "debit": 0,
      "balance": 10000000,
      "source": {
        "id": "bt_00000000000001",
        "entity": "bank_transfer",
        "payer_name": "Saurav Kumar",
        "payer_account": "6543266545411243",
        "payer_ifsc": "UTIB0000001",
        "mode": "NEFT",
        "bank_reference": "AXIR000000000001",
        "amount": 10000000
      },
      "created_at": 1545125568
    }
  }
 },
"created_at": 1545125568
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
