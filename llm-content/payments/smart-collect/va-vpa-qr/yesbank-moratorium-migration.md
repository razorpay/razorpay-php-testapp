---
title: Account Migration due to Yes Bank Moratorium
description: Updating your setup to work with our new banking partners.
---

# Account Migration due to Yes Bank Moratorium

Due to [Yes Bank moratorium](https://economictimes.indiatimes.com/industry/banking/finance/banking/govt-limits-withdrawals-from-yes-bank-at-rs-50000/articleshow/74498382.cms?utm_campaign=Yes%20Bank%20Moratarium&utm_source=hs_email&utm_medium=email&_hsenc=p2ANqtz--EYqAIp-sSFuL_W5KQKGvfKAwON8T78jF5TA1xsFyQgBji1f-zNiL1x0XioKukSc-FJT3G), Customer Identifiers via YesBank were temporarily disabled between March 6, 2020 and March 18, 2020. During this time period, Razorpay onboarded a new partner bank and issued the same Customer Identifiers numbers with an updated IFSC as `RATN0VAAPIS`. Customers had to use the same account number, but switch the IFSC. Now that the moratorium has been lifted, if your virtual account was created before March 6, 2020, it would now appear as shown below:

![](/docs/assets/images/smart-collect-va_pre_moratorium.jpg)

Your customers can make payments using the account number and either of the IFSCs:
- `RATN0VAAPIS`
- `YESB0CMSNOC`

> **INFO**
>
> 
> **New Customer Identifiers**
> 
> 
> Post March 6, 2020, IFSC for all newly issued Customer Identifiers will be `RATN0VAAPIS`.
> 

## Smart Collect Integration

Your Virtual Account integration will likely work in one of the following ways:

- By mapping your customers/orders to **Razorpay virtual account IDs.**
- By mapping your customers/orders to **Razorpay customer IDs.**
- By mapping your customers/orders to **Customer Identifiers.**
- By mapping your customers/orders to **your own reference identifiers**, which you passed in the notes array of your virtual account creation request.

In each of these cases, the Razorpay `virtual_account.credited` webhook is responsible for informing your server about which order to fulfill.

```json: Existing Virtual Account Credited Webhook
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
          "internal_order_id": "12345"
        },
        "amount_paid": 0,
        "customer_id": "cust_BtQNqzmBlAXyTY",
        "receivers": [
          {
            "id": "ba_DET8z5Z5ghv4hW",
            "entity": "bank_account",
            "ifsc": "YESB0CMSN5C",
            "bank_name": "Yes Bank",
            "name": "Acme Corp",
            "notes": [],
            "account_number": "2223330012341234"
          }
        ],
        "close_by": null,
        "closed_at": null,
        "created_at": 1567675923
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
```

    **Reconciliation ID**           | **Example**                    | **Location in credit webhook**
    ---
    Razorpay virtual account ID | `va_EPeK1ykH2PRtnD`        | `payload.virtual_account.entity.id`
    ---
    Razorpay customer ID        | `cust_EPeLtyhSwk5tub`      | `payload.virtual_account.entity.customer_id`
    ---
    Customer Identifier | `2223330012341234`           | `payload.virtual_account.entity.receivers.0.account_number`
    ---
    Virtual Account Notes ID    | `internal_order_id: 12345` | `payload.virtual_account.entity.notes.internal_order_id`

The webhook payload for the migrated virtual accounts will look like this.

```json: Virtual Account Credited Webhook for Migrated Account
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
          "internal_order_id": "12345"
        },
        "amount_paid": 0,
        "customer_id": "cust_BtQNqzmBlAXyTY",
        "receivers": [
          {
            "id": "ba_DET8z5Z5ghv4hW",
            "entity": "bank_account",
            "ifsc": "YESB0CMSN5C",
            "bank_name": "Yes Bank",
            "name": "Acme Corp",
            "notes": [],
            "account_number": "2223330012341234"
          },
          {
            "id": "ba_EPf3KwRHCgEnum",
            "entity": "bank_account",
            "ifsc": "RATN0VAAPIS",
            "bank_name": "RBL Bank",
            "name": "Acme Corp",
            "notes": [],
            "account_number": "2223330012341234"
          }
        ],
        "close_by": null,
        "closed_at": null,
        "created_at": 1567675923
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
```

As you can see, while a new bank account receiver block has been added to the receivers array of the virtual account, all considered reconciliation IDs are still present in the Razorpay webhook, *in the same location*.

Notably, since the old receiver is still a part of the webhook, your server will still be correctly notified of the virtual account that received the payment, and of the order on your end that needs to be fulfilled.

**This means as long as your integration uses one of the 4 considered identifiers for payment reconciliation, it does not require any changes.**
