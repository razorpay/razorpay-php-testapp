---
title: Account Validation Webhook Events
description: List of Account Validation webhook events along with sample payloads.
---

# Account Validation Webhook Events

Account Validation API validates your Contact's Fund Account details such as bank account or VPA (UPI).

## List of Account Validation Webhook Events

The table below lists the webhook events available for RazorpayX Account Validation.

Webhook Event | Available For | Description
---
`fund_account.validation.completed`|  _Bank Account and VPA_ | Triggered whenever an account validation transaction is completed.
---
`fund_account.validation.failed` |  _Bank Account and VPA_ | Triggered whenever an account validation transaction fails.

## Sample Payloads

Given below are the sample payloads for Account Validation webhook events.

### Fund Account Validation Completed

```json: Bank Account
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "fund_account.validation.completed",
  "contains": [
    "fund_account.validation"
  ],
  "payload": {
    "fund_account.validation": {
      "entity": {
        "id": "fav_Fa6RwlxjoX0xeO",
        "entity": "fund_account.validation",
        "fund_account": {
          "id": "fa_Fa6Rq1WwNrpMoK",
          "entity": "fund_account",
          "contact_id": "cont_FYSVUV5EeJKkKb",
          "account_type": "bank_account",
          "bank_account": {
            "name": "Gaurav Kumar",
            "bank_name": "HDFC",
            "ifsc": "HDFC0000053",
            "account_number": "1121431121541121"
          },
          "batch_id": null,
          "active": true,
          "created_at": 1599473652
        },
        "status": "completed",
        "amount": 127,
        "currency": "INR",
        "notes": {
          "random_key_1": "Make it so.",
          "random_key_2": "Tea. Earl Grey. Hot."
        },
        "results": {
          "account_status": "active",
          "registered_name": "Gaurav Kumar",
          "details": "The beneficiary account is valid.",
          "name_match_score" : 100

        },
        "created_at": 1599473659,
        "utr": "XXXXR7310682908954385XX"
      }
    }
  },
  "created_at": 1599473661
}
```json: VPA
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "fund_account.validation.completed",
  "contains": [
    "fund_account.validation"
  ],
  "payload": {
    "fund_account.validation": {
      "entity": {
        "id": "fav_Fa6RwlxjoX0xeO",
        "entity": "fund_account.validation",
        "fund_account": {
          "id": "fa_Fa6Rq1WwNrpMoK",
          "entity": "fund_account",
          "contact_id": "cont_FYSVUV5EeJKkKb",
          "account_type": "vpa",
          "vpa": {
            "username": "gaurav.kumar",
            "handle": "exampleupi",
            "address": "gaurav.kumar@exampleupi"
          },
          "batch_id": null,
          "active": true,
          "created_at": 1599473652,
        },
        "status": "completed",
        "amount": null,
        "currency": null,
        "notes": {
          "random_key_1": "Make it so.",
          "random_key_2": "Tea. Earl Grey. Hot."
        },
        "results": {
          "account_status": "active",
          "registered_name": "Gaurav Kumar",
          "details": "The beneficiary account is valid.",
          "name_match_score" : 100
          "bank_account" : {
          "ifsc": "ICIC0000047",
          "account_number": "1121431121541121",
          "bank_name": "ICICI Bank",
          "account_type": "saving"
    },
        },
        "created_at": 1599473659,
        "utr": null
      }
    }
  },
  "created_at": 1599473661
}
```

### Fund Account Validation Failed

```json: Bank Account
{
  "entity": "event",
  "account_id": "acc_BfVUrG6tDiL7H0",
  "event": "fund_account.validation.failed",
  "contains": [
    "fund_account.validation"
  ],
  "payload": {
    "fund_account.validation": {
      "entity": {
        "id": "fav_Fa6RwlxjoX0xeO",
        "entity": "fund_account.validation",
        "fund_account": {
          "id": "fa_Fa6Rq1WwNrpMoK",
          "entity": "fund_account",
          "contact_id": "cont_FYSVUV5EeJKkKb",
          "account_type": "bank_account",
          "bank_account": {
            "name": "Gaurav Kumar",
            "bank_name": "HDFC",
            "ifsc": "HDFC0000053",
            "account_number": "1121431121541121"
          },
          "batch_id": null,
          "active": true,
          "created_at": 1599652242
        },
        "status": "failed",
        "amount": 127,
        "currency": "INR",
        "notes": {
          "random_key_1": "Make it so.",
          "random_key_2": "Tea. Earl Grey. Hot."
        },
        "results": {
          "account_status": "",
          "registered_name": "",
          "details": "null",
          "name_match_score" : null
        },
        "created_at": 1599473659,
        "utr": null
      }
    }
  },
  "created_at": 1599473661
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
