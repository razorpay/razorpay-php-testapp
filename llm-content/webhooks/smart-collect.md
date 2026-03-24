---
title: Smart Collect Webhook Events
description: List of Smart Collect webhook events along with sample payloads.
---

# Smart Collect Webhook Events

**Smart Collect** enables businesses to generate customer-specific identifiers for receiving payments via NEFT, RTGS, and IMPS while automating tracking, notifications, and reconciliation.

## List of Smart Collect Webhook Events

The table below lists the webhook events available for Smart Collect (Virtual Account).

Webhook Event | Description
---
`virtual_account.created` | Triggered when a virtual account is created.
---
`virtual_account.credited` | Triggered when a payment is made to a virtual account.
---
`virtual_account.closed` | Triggered when a virtual account expires on a date set by you or is manually closed by you.

> **INFO**
>
> 
> **Smart Collect with TPV**
> 
> If the TPV feature is enabled for Smart Collect, the webhook payloads described above contain the `allowed_payers` object parameter.
> 

## Sample Payloads

Given below are the sample payloads for Smart Collect webhook events.

### Virtual Account Created

```json: virtual_account.created
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "virtual_account.created",
  "contains": [
    "virtual_account"
  ],
  "payload": {
    "virtual_account": {
      "entity": {
        "id": "va_DET8z3wBxfPB5L",
        "name": "Acme Corp",
        "entity": "virtual_account",
        "status": "active",
        "description": "Virtual Account to test webhook",
        "amount_expected": null,
        "notes": {
          "Important": "Notes for Internal Reference"
        },
        "amount_paid": 0,
        "customer_id": "cust_BtQNqzmBlAXyTY",
        "receivers": [
          {
            "id": "ba_DET8z5Z5ghv4hW",
            "entity": "bank_account",
            "ifsc": "RATN0VAAPIS",
            "bank_name": "RBL Bank",
            "name": "Acme Corp",
            "notes": [],
            "account_number": "1112220006712324"
          },
          {
            "id": "vpa_DzZcAjcRevv5JO",
            "entity": "vpa",
            "username": "rpy.payto00000468657501",
            "handle": "icici",
            "address": "rpy.payto00000468657501@icici"
          }
        ],
        "close_by": null,
        "closed_at": null,
        "created_at": 1567675923
      }
    }
  },
  "created_at": 1567675923
}
```json: virtual_account.created with TPV
{
  "entity":"event",
  "account_id":"acc_BFQ7uQEaa7j2z7",
  "event":"virtual_account.created",
  "contains":[
    "virtual_account"
  ],
  "payload":{
    "virtual_account":{
      "entity":{
        "id":"va_DET8z3wBxfPB5L",
        "name":"Acme Corp",
        "entity":"virtual_account",
        "status":"active",
        "description":"Virtual Account to test webhook",
        "amount_expected":null,
        "notes":{
          "Important":"Notes for Internal Reference"
        },
        "amount_paid":0,
        "customer_id":"cust_BtQNqzmBlAXyTY",
        "receivers":[
          {
            "id":"ba_DET8z5Z5ghv4hW",
            "entity":"bank_account",
            "ifsc":"RATN0VAAPIS",
            "bank_name": "RBL Bank",
            "name":"Acme Corp",
            "notes": [],
            "account_number":"1112220006712324"
          }
        ],
        "allowed_payers": [
          {
            "type": "bank_account",
            "id":"ba_DlGmm9mSj8fjRM",
            "bank_account": {
              "ifsc": "UTIB0000013",
              "account_number": "914010012345679"
            }
          },
          {
            "type": "bank_account",
            "id":"ba_Cmtnm5tSj6agUW",
            "bank_account": {
              "ifsc": "UTIB0000014",
              "account_number": "914010012345680"
            }
          }
        ],
        "close_by":null,
        "closed_at":null,
        "created_at":1567675923
      }
    }
  },
  "created_at":1567675923
}
```

### Virtual Account Credited

```json: bank_transfer
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "virtual_account.credited",
  "contains": [
    "payment",
    "virtual_account",
    "bank_transfer"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DETA2KrOlhqQzF",
        "entity": "payment",
        "amount": 61900,
        "currency": "INR",
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "bank_transfer",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": true,
        "description": "NA",
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "customer_id": "cust_BtQNqzmBlAXyTY",
        "notes": [],
        "fee": 731,
        "tax": 112,
        "error_code": null,
        "error_description": null,
        "created_at": 1567675983
      }
    },
    "virtual_account": {
      "entity": {
        "id": "va_DET8z3wBxfPB5L",
        "name": "Acme Corp",
        "entity": "virtual_account",
        "status": "active",
        "description": "Virtual Account to test webhook",
        "amount_expected": null,
        "notes": {
          "Important": "Notes for Internal Reference"
        },
        "amount_paid": 61900,
        "customer_id": "cust_BtQNqzmBlAXyTY",
        "close_by": null,
        "closed_at": null,
        "created_at": 1567675923,
        "receivers": [
          {
            "id": "ba_DET8z5Z5ghv4hW",
            "entity": "bank_account",
            "ifsc": "RATN0VAAPIS",
            "bank_name": "RBL Bank",
            "name": "Acme Corp",
            "account_number": "1112220006712324"
          }
        ]
      }
    },
    "bank_transfer": {
      "entity": {
        "id": "bt_DETA2KSUJ3uCM9",
        "entity": "bank_transfer",
        "payment_id": "pay_DETA2KrOlhqQzF",
        "mode": "NEFT",
        "bank_reference": "156767598340",
        "amount": 61900,
        "payer_bank_account": {
          "id": "ba_DETA2UuuKtKLR1",
          "entity": "bank_account",
          "ifsc": "KKBK0000007",
          "bank_name": "Kotak Mahindra Bank",
          "name": "Saurav Kumar",
          "account_number": "765432123456789"
        },
        "virtual_account_id": "va_DET8z3wBxfPB5L"
      }
    }
  },
  "created_at": 1567675983
}
```json: vpa
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "virtual_account.credited",
  "contains": [
    "payment",
    "virtual_account",
    "upi_transfer"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DETA2KrOlhqQzF",
        "entity": "payment",
        "amount": 500,
        "currency": "INR",
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "upi",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": true,
        "description": "Virtual UPI ID payment",
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": "gauravkumar@icic",
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "customer_id": "cust_BM8NbnFAk1BVDA",
        "notes": [],
        "fee": 0,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "acquirer_data": {
          "rrn": null
        },
        "created_at": 1567675983
      }
    },
    "virtual_account": {
      "entity": {
        "id": "va_DzYPeYqvsYEdNq",
        "name": "Acme Corp",
        "entity": "virtual_account",
        "status": "active",
        "description": "Receive payment instalment from Gaurav Kumar- Flat No 105",
        "amount_expected": null,
        "notes": [],
        "amount_paid": 500,
        "customer_id": "cust_BM8NbnFAk1BVDA",
        "close_by": 1580491859,
        "closed_at": null,
        "created_at": 1577956463,
        "receivers": [
          {
            "id": "vpa_DzYPeu6ntqxhcE",
            "entity": "vpa",
            "username": "rpy.payto00000468657501",
            "handle": "icici",
            "address": "rpy.payto00000468657501@icici"
          }
        ]
      }
    },
    "upi_transfer": {
      "entity": {
        "id": "ut_DzZjcnY8n3oU65",
        "entity": "upi_transfer",
        "amount": 500,
        "payer_vpa": "gauravkumar@icic",
        "payer_bank": "Kotak Mahindra Bank",
        "payer_account": "765432123456789",
        "payer_ifsc": "KKBK0000007",
        "payment_id": "pay_DETA2KrOlhqQzF",
        "rrn": "006516367819",
        "virtual_account_id": "va_DzYPeYqvsYEdNq"
      }
    }
  },
  "created_at": 1567675984
}
```json: bank_transfer with TPV
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "virtual_account.credited",
  "contains": [
    "payment",
    "virtual_account",
    "bank_transfer"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DETA2KrOlhqQzF",
        "entity": "payment",
        "amount": 61900,
        "currency": "INR",
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "bank_transfer",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": true,
        "description": "NA",
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "customer_id": "cust_BtQNqzmBlAXyTY",
        "notes": [],
        "fee": 731,
        "tax": 112,
        "error_code": null,
        "error_description": null,
        "created_at": 1567675983
      }
    },
    "virtual_account": {
      "entity": {
        "id": "va_DET8z3wBxfPB5L",
        "name": "Acme Corp",
        "entity": "virtual_account",
        "status": "active",
        "description": "Virtual Account to test webhook",
        "amount_expected": null,
        "notes": {
          "Important": "Notes for Internal Reference"
        },
        "amount_paid": 61900,
        "customer_id": "cust_BtQNqzmBlAXyTY",
        "close_by": null,
        "closed_at": null,
        "created_at": 1567675923,
        "receivers": [
          {
            "id": "ba_DET8z5Z5ghv4hW",
            "entity": "bank_account",
            "ifsc": "RATN0VAAPIS",
            "bank_name":  "RBL Bank",
            "name": "Acme Corp",
            "account_number": "1112220006712324"
          }
        ],
        "allowed_payers": [
          {
            "type": "bank_account",
            "id":"ba_DlGmm9mSj8fjRM",
            "bank_account": {
              "ifsc": "UTIB0000013",
              "account_number": "914010012345679"
            }
          },
          {
            "type": "bank_account",
            "id":"ba_Cmtnm5tSj6agUW",
            "bank_account": {
              "ifsc": "UTIB0000014",
              "account_number": "914010012345680"
            }
          }
        ]
      }
    },
    "bank_transfer": {
      "entity": {
        "id": "bt_DETA2KSUJ3uCM9",
        "entity": "bank_transfer",
        "payment_id": "pay_DETA2KrOlhqQzF",
        "mode": "NEFT",
        "bank_reference": "156767598340",
        "amount": 61900,
        "payer_bank_account": {
          "id": "ba_DETA2UuuKtKLR1",
          "entity": "bank_account",
          "ifsc":  "KKBK0000007",
          "bank_name":  "Kotak Mahindra Bank",
          "name": "Saurav Kumar",
          "account_number": "765432123456789"
        },
        "virtual_account_id": "va_DET8z3wBxfPB5L"
      }
    }
  },
  "created_at": 1567675983
}
```

### Virtual Account Closed

```json: virtual_account.closed
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "virtual_account.closed",
  "contains": [
    "virtual_account"
  ],
  "payload": {
    "virtual_account": {
      "entity": {
        "id": "va_DET8z3wBxfPB5L",
        "name": "Acme Corp",
        "entity": "virtual_account",
        "status": "closed",
        "description": "Receive payment instalment from Gaurav Kumar- Flat No 105",
        "amount_expected": null,
        "notes": [],
        "amount_paid": 500,
        "customer_id": "cust_BM8NbnFAk1BVDA",
        "receivers": [
          {
            "id": "ba_DzYPeiYdd2RVSc",
            "entity": "bank_account",
            "ifsc": "RATN0VAAPIS",
            "bank_name": "RBL Bank",
            "name": "Acme Corp",
            "account_number": "1112220006712324"
          },
          {
            "id": "vpa_DzYPeu6ntqxhcE",
            "entity": "vpa",
            "username": "rpy.payto00000468657501",
            "handle": "icici",
            "address": "rpy.payto00000468657501@icici"
          }
        ],
        "close_by": 1580491859,
        "closed_at": 1567677769,
        "created_at": 1567675923
      }
    }
  },
  "created_at": 1567677769
}
```json: virtual_account.closed with TPV
{
  "entity":"event",
  "account_id":"acc_BFQ7uQEaa7j2z7",
  "event":"virtual_account.closed",
  "contains":[
    "virtual_account"
  ],
  "payload":{
    "virtual_account":{
      "entity":{
        "id":"va_DET8z3wBxfPB5L",
        "name":"Acme Corp",
        "entity":"virtual_account",
        "status":"closed",
        "description":"Receive payment instalment from Gaurav Kumar- Flat No 105",
        "amount_expected":null,
        "notes":[],
        "amount_paid":500,
        "customer_id":"cust_BM8NbnFAk1BVDA",
        "receivers":[
          {
            "id":"ba_DzYPeiYdd2RVSc",
            "entity":"bank_account",
            "ifsc":"RATN0VAAPIS",
            "bank_name": "RBL Bank",
            "name":"Acme Corp",
            "account_number":"1112220006712324"
          }
        ],
        "allowed_payers": [
          {
            "type": "bank_account",
            "id":"ba_DlGmm9mSj8fjRM",
            "bank_account": {
              "ifsc": "UTIB0000013",
              "account_number": "914010012345679"
            }
          },
          {
            "type": "bank_account",
            "id":"ba_Cmtnm5tSj6agUW",
            "bank_account": {
              "ifsc": "UTIB0000014",
              "account_number": "914010012345680"
            }
          }
        ],
        "close_by":1580491859,
        "closed_at":1567677769,
        "created_at":1567675923
      }
    }
  },
  "created_at":1567677769
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
