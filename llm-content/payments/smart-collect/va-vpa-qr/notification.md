---
title: Notifications
description: Receive notifications for your Razorpay virtual account for payment captured event using webhooks and receive email notifications for payment successful event.
---

# Notifications

All payments made using Smart Collect will show up on your Dashboard as well as in the usual payment response APIs.

## Webhooks

Payments made using Smart Collect will also trigger webhooks much like regular payments. To use webhooks, refer our [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) documentation.

### Event - Virtual Account Created

When a virtual account is created the `virtual_account.created` webhook event is fired. The payload is given below:

```json: virtual_account.created
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
          },
          {
            "id": "vpa_DzZcAjcRevv5JO",
            "entity": "vpa",
            "username": "rpy.payto00000gaurikumari",
            "handle": "icici",
            "address": "rpy.payto00000gaurikumari@icici"
          },
          {
            "id": "qr_F8ibAwwQs5H1kb",
            "entity": "qr_code",
            "reference": "F8ibAwwQs5H1kb",
            "short_url": "https://rzp.io/i/o60mXWk",
            "created_at": 1593494482
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

### Event - Virtual Account Credited

Payments made using Smart Collect are notified via the `virtual_account.credited` webhook event. 

```json: bank_transfer
{
  "entity":"event",
  "account_id":"acc_BFQ7uQEaa7j2z7",
  "event":"virtual_account.credited",
  "contains":[
    "payment",
    "virtual_account",
    "bank_transfer"
  ],
  "payload":{
    "payment":{
      "entity":{
        "id":"pay_DETA2KrOlhqQzF",
        "entity":"payment",
        "amount":61900,
        "currency":"INR",
        "status":"captured",
        "order_id":null,
        "invoice_id":null,
        "international":false,
        "method":"bank_transfer",
        "amount_refunded":0,
        "amount_transferred":0,
        "refund_status":null,
        "captured":true,
        "description":"NA",
        "card_id":null,
        "bank":null,
        "wallet":null,
        "vpa":null,
        "email":"gaurav.kumar@example.com",
        "contact":"+919000090000",
        "customer_id":"cust_BtQNqzmBlAXyTY",
        "notes":[],
        "fee":731,
        "tax":112,
        "error_code":null,
        "error_description":null,
        "created_at":1567675983
      }
    },
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
        "amount_paid":61900,
        "customer_id":"cust_BtQNqzmBlAXyTY",
        "close_by":null,
        "closed_at":null,
        "created_at":1567675923,
        "receivers":[
          {
            "id":"ba_DET8z5Z5ghv4hW",
            "entity":"bank_account",
            "ifsc":"RATN0VAAPIS",
            "bank_name": "RBL Bank",
            "name":"Acme Corp",
            "account_number":"1112220006712324"
          }
        ]
      }
    },
    "bank_transfer":{
      "entity":{
        "id":"bt_DETA2KSUJ3uCM9",
        "entity":"bank_transfer",
        "payment_id":"pay_DETA2KrOlhqQzF",
        "mode":"NEFT",
        "bank_reference":"156767598340",
        "amount":61900,
        "payer_bank_account":{
          "id":"ba_DETA2UuuKtKLR1",
          "entity":"bank_account",
          "ifsc": "KKBK0000007",
          "bank_name": "Kotak Mahindra Bank",
          "name":"Saurav Kumar",
          "account_number":"765432123456789"
        },
        "virtual_account_id":"va_DET8z3wBxfPB5L"
      }
    }
  },
  "created_at":1567675983
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
            "username": "rpy.payto00000gaurikumari",
            "handle": "icici",
            "address": "rpy.payto00000gaurikumari@icici"
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
```json: qr_code
{
  "entity": "event",
  "account_id": "acc_8TgNt9DVrJB0bl",
  "event": "virtual_account.credited",
  "contains": [
    "payment",
    "virtual_account"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_F8ik6ycZZEvZgK",
        "entity": "payment",
        "amount": 100000,
        "currency": "INR",
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "upi",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": true,
        "description": "Bharat Qr Payment",
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": "gaurav.kumar@icici",
        "email": "k@u.com",
        "contact": "+911231231234",
        "customer_id": "cust_F77cxV1BsMDubi",
        "notes": [],
        "fee": 1,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "created_at": 1593494989
      }
    },
    "virtual_account": {
      "entity": {
        "id": "va_F8ibAfPwwkvCW7",
        "name": "Intuit India",
        "entity": "virtual_account",
        "status": "active",
        "description": "Receive payment instalment from Gaurav Kumar- Flat No 105",
        "amount_expected": null,
        "notes": [],
        "amount_paid": 100,
        "customer_id": "cust_F77cxV1BsMDubi",
        "close_by": 1681615838,
        "closed_at": null,
        "created_at": 1593494482,
        "receivers": [
          {
            "id": "qr_F8ibAwwQs5H1kb",
            "entity": "qr_code",
            "reference": "F8ibAwwQs5H1kb",
            "short_url": "https://rzp.io/i/o60mXWk",
            "created_at": 1593494482
          }
        ]
      }
    }
  },
  "created_at": 1593494989
}
```

### Event - Virtual Account Closed

When a virtual account is closed the `virtual_account.closed` webhook event is fired. The payload is given below:

```json: virtual_account.closed
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
          },
          {
            "id": "vpa_DzYPeu6ntqxhcE",
            "entity": "vpa",
            "username": "rpy.payto00000gaurikumari",
            "handle": "icici",
            "address": "rpy.payto00000gaurikumari@icici"
          },
          {
            "id": "qr_F8M0o50kAJjqIE",
            "entity": "qr_code",
            "reference": "F8M0o50kAJjqIE",
            "short_url": "https://rzp.io/i/jpiGilg",
            "created_at": 1593414941
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

## Emails
You will also receive a `payment successful` notification email, as you do for regular payments.
