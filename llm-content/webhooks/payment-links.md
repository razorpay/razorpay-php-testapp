---
title: Payment Links Webhook Events
description: List of Payment Links webhook events along with sample payloads.
---

# Payment Links Webhook Events

**Payment Links** enable businesses to accept payments without a website or app by generating and sharing secure links via email, SMS, or social media.

## List of Payment Links Webhook Events

The table below lists the webhook events available for Payment Links.

Webhook Event | Description | Payment Link Type
---
`payment_link.paid` | Triggered when a Payment Link is paid. | -  Standard Payment Links
- UPI Payment Links

---
`payment_link.partially_paid` | Triggered when a partial payment is made on a Standard Payment Link. | Standard Payment Link
---
`payment_link.cancelled` | Triggered when a Payment Link is cancelled by you. | -  Standard Payment Links
-  UPI Payment Links

---
`payment_link.expired` | Triggered when a Payment Link expires. |-  Standard Payment Links
-  UPI Payment Links

## Sample Payloads

Given below are the sample payloads for Payment Links webhook events.

### Payment Link Paid

```json: payment_link.paid (Standard)
{
  "account_id": "acc_OU2H3nkLn9jDVo",
  "contains": [
    "payment_link",
    "order",
    "payment"
  ],
  "created_at": 1749618314,
  "entity": "event",
  "event": "payment_link.paid",
  "payload": {
    "order": {
      "entity": {
        "account_number": null,
        "amount": 1000,
        "amount_due": 0,
        "amount_paid": 1000,
        "app_offer": false,
        "attempts": 1,
        "authorized": true,
        "bank": null,
        "bank_account": null,
        "checkout_config_id": null,
        "created_at": 1749618325,
        "currency": "INR",
        "customer_id": null,
        "discount": false,
        "first_payment_min_amount": null,
        "force_offer": null,
        "id": "QflczVVaNJciLq",
        "late_auth_config_id": null,
        "merchant_id": "OU2H3nkLn9jDVo",
        "method": null,
        "notes": [],
        "offers": {},
        "order_metas": [],
        "order_relationships": [],
        "partial_payment": false,
        "payer_name": null,
        "payment_capture": true,
        "product_id": "QflcnnZqCekuvL",
        "product_type": "payment_link_v2",
        "provider_context": null,
        "public_key": "rzp_live_XXXXXXXXXXXXXX",
        "public_response": null,
        "receipt": "23",
        "reference2": null,
        "reference3": null,
        "reference4": null,
        "reference5": null,
        "reference6": null,
        "reference7": null,
        "reference8": null,
        "source": null,
        "status": "paid",
        "transfers": null,
        "updated_at": 1749618372
      }
    },
    "payment": {
      "entity": {
        "acquirer_data": {
          "rrn": "103608848276"
        },
        "amount": 1000,
        "amount_refunded": 0,
        "amount_transferred": 0,
        "bank": null,
        "base_amount": 1000,
        "captured": true,
        "card": null,
        "card_id": null,
        "contact": "+919876543210",
        "created_at": 1749618371,
        "currency": "INR",
        "description": "#QflcnnZqCekuvL",
        "email": null,
        "entity": "payment",
        "error_code": null,
        "error_description": null,
        "error_reason": null,
        "error_source": null,
        "error_step": null,
        "fee": 24,
        "fee_bearer": "platform",
        "id": "pay_Qfldmt5StKZFCB",
        "international": false,
        "invoice_id": null,
        "method": "upi",
        "notes": [],
        "order_id": "order_QflczVVaNJciLq",
        "refund_status": null,
        "status": "captured",
        "tax": 4,
        "upi": {
          "payer_account_type": "bank_account",
          "vpa": "gaurav.kumar@exampleupi"
        },
        "vpa": "gaurav.kumar@exampleupi",
        "wallet": null
      }
    },
    "payment_link": {
      "entity": {
        "accept_partial": false,
        "amount": 1000,
        "amount_paid": 1000,
        "cancelled_at": 0,
        "created_at": 1749618314,
        "currency": "INR",
        "customer": {
          "contact": "9000090000",
          "email": "gauravkumar@example.com"
        },
        "description": "Test Payment",
        "expire_by": 0,
        "expired_at": 0,
        "first_min_partial_amount": 0,
        "id": "plink_QflcnnZqCekuvL",
        "notes": null,
        "notify": {
          "email": false,
          "sms": false,
          "whatsapp": false
        },
        "order_id": "order_QflczVVaNJciLq",
        "reference_id": "23",
        "reminder_enable": false,
        "reminders": {
          "status": "failed"
        },
        "short_url": "https://rzp.io/rzp/twH5w1Y",
        "status": "paid",
        "updated_at": 1749618371,
        "upi_link": false,
        "user_id": "HWPf1AudnADDV5",
        "whatsapp_link": false
      }
    }
  }
}
```json: payment_link.paid (UPI)
{
  "account_id": "acc_MWWeS9Ico5tQBk",
  "contains": [
    "payment_link",
    "order",
    "payment"
  ],
  "created_at": 1748586679,
  "entity": "event",
  "event": "payment_link.paid",
  "payload": {
    "order": {
      "entity": {
        "account_number": null,
        "amount": 100,
        "amount_due": 0,
        "amount_paid": 100,
        "app_offer": false,
        "attempts": 1,
        "authorized": true,
        "bank": null,
        "bank_account": null,
        "checkout_config_id": null,
        "created_at": 1748586685,
        "currency": "INR",
        "customer_id": null,
        "discount": false,
        "first_payment_min_amount": null,
        "force_offer": null,
        "id": "Qb2gOAUzSm5zpv",
        "late_auth_config_id": null,
        "merchant_id": "MWWeS9Ico5tQBk",
        "method": "upi",
        "notes": {
          "policy_name": "Jeevan Bima"
        },
        "offers": {},
        "order_metas": [],
        "order_relationships": [],
        "partial_payment": false,
        "payer_name": null,
        "payment_capture": true,
        "product_id": "Qb2gHrKr01Maky",
        "product_type": "payment_link_v2",
        "provider_context": null,
        "public_key": "rzp_live_XXXXXXXXXXXXXX",
        "public_response": null,
        "receipt": "UPItest2",
        "reference2": null,
        "reference3": null,
        "reference4": null,
        "reference5": null,
        "reference6": null,
        "reference7": null,
        "reference8": null,
        "source": null,
        "status": "paid",
        "transfers": null,
        "updated_at": 1748586717
      }
    },
    "payment": {
      "entity": {
        "acquirer_data": {
          "rrn": "551652213711"
        },
        "amount": 100,
        "amount_captured": null,
        "amount_refunded": 0,
        "amount_transferred": 0,
        "bank": null,
        "base_amount": 100,
        "captured": true,
        "card": null,
        "card_id": null,
        "contact": "+918840152270",
        "created_at": 1748586694,
        "currency": "INR",
        "description": "#Qb2gHrKr01Maky",
        "email": "gaurav.kumar@example.com",
        "entity": "payment",
        "error_code": null,
        "error_description": null,
        "error_reason": null,
        "error_source": null,
        "error_step": null,
        "fee": 2,
        "fee_bearer": "platform",
        "id": "pay_Qb2gYRc7dxedX8",
        "international": false,
        "invoice_id": null,
        "method": "upi",
        "notes": {
          "policy_name": "Jeevan Bima"
        },
        "order_id": "order_Qb2gOAUzSm5zpv",
        "provider": null,
        "refund_status": null,
        "reward": null,
        "status": "captured",
        "tax": 0,
        "upi": {
          "payer_account_type": "bank_account",
          "vpa": "gaurav.kumar@okexample"
        },
        "vpa": "gaurav.kumar@okexample",
        "wallet": null
      }
    },
    "payment_link": {
      "entity": {
        "accept_partial": false,
        "amount": 100,
        "amount_paid": 100,
        "callback_method": "get",
        "callback_url": "https://example-callback-url.com/",
        "cancelled_at": 0,
        "created_at": 1748586679,
        "currency": "INR",
        "customer": {
          "contact": "+919000090000",
          "email": "gaurav.kumar@example.com",
          "name": "Gaurav Kumar"
        },
        "description": "Payment for policy no #23456",
        "expire_by": 1748587814,
        "expired_at": 0,
        "first_min_partial_amount": 0,
        "id": "plink_Qb2gHrKr01Maky",
        "notes": {
          "policy_name": "Jeevan Bima"
        },
        "notify": {
          "email": true,
          "sms": true,
          "whatsapp": false
        },
        "order_id": "order_Qb2gOAUzSm5zpv",
        "reference_id": "UPItest2",
        "reminder_enable": true,
        "reminders": {
          "status": "failed"
        },
        "short_url": "https://rzp.io/rzp/S12PdyW",
        "status": "paid",
        "updated_at": 1748586718,
        "upi_link": true,
        "user_id": "",
        "whatsapp_link": false
      }
    }
  }
}
```

### Payment Link Cancelled

```json: payment_link.cancelled (Standard)
{
  "account_id": "acc_MWWeS9Ico5tQBk",
  "contains": [
    "payment_link"
  ],
  "created_at": 1748425318,
  "entity": "event",
  "event": "payment_link.cancelled",
  "payload": {
    "payment_link": {
      "entity": {
        "accept_partial": true,
        "amount": 1000,
        "amount_paid": 0,
        "callback_method": "get",
        "callback_url": "https://example-callback-url.com/",
        "cancelled_at": 1748425346,
        "created_at": 1748425318,
        "currency": "INR",
        "customer": {
          "contact": "+919000090000",
          "email": "gaurav.kumar@example.com",
          "name": "Gaurav Kumar"
        },
        "description": "Payment for policy no #23456",
        "expire_by": 1748426427,
        "expired_at": 0,
        "first_min_partial_amount": 100,
        "id": "plink_QaIrRSjWiIuxAO",
        "notes": null,
        "notify": {
          "email": true,
          "sms": true,
          "whatsapp": false
        },
        "reference_id": "NewTestPayment4",
        "reminder_enable": true,
        "reminders": {
          "status": "failed"
        },
        "short_url": "https://rzp.io/rzp/zIUYsg6E",
        "status": "cancelled",
        "updated_at": 1748425346,
        "upi_link": false,
        "user_id": "",
        "whatsapp_link": false
      }
    }
  }
}
```json: payment_link.cancelled (UPI)
{
  "account_id": "acc_MWWeS9Ico5tQBk",
  "contains": [
    "payment_link"
  ],
  "created_at": 1748586933,
  "entity": "event",
  "event": "payment_link.cancelled",
  "payload": {
    "payment_link": {
      "entity": {
        "accept_partial": false,
        "amount": 100,
        "amount_paid": 0,
        "callback_method": "get",
        "callback_url": "https://example-callback-url.com/",
        "cancelled_at": 1748586950,
        "created_at": 1748586933,
        "currency": "INR",
        "customer": {
          "contact": "+919000090000",
          "email": "gaurav.kumar@example.com",
          "name": "Gaurav Kumar"
        },
        "description": "Payment for policy no #23456",
        "expire_by": 1748588114,
        "expired_at": 0,
        "first_min_partial_amount": 0,
        "id": "plink_Qb2kkyr7V58HsP",
        "notes": {
          "policy_name": "Jeevan Bima"
        },
        "notify": {
          "email": true,
          "sms": true,
          "whatsapp": false
        },
        "reference_id": "UPItest3",
        "reminder_enable": true,
        "reminders": {
          "status": "failed"
        },
        "short_url": "https://rzp.io/rzp/ZT8PL5TF",
        "status": "cancelled",
        "updated_at": 1748586950,
        "upi_link": true,
        "user_id": "",
        "whatsapp_link": false
      }
    }
  }
}
```

### Payment Link Expired

```json: payment_link.expired (Standard)
{
  "account_id": "acc_MWWeS9Ico5tQBk",
  "contains": [
    "payment_link"
  ],
  "created_at": 1748424975,
  "entity": "event",
  "event": "payment_link.expired",
  "payload": {
    "payment_link": {
      "entity": {
        "accept_partial": true,
        "amount": 1000,
        "amount_paid": 0,
        "callback_method": "get",
        "callback_url": "https://example-callback-url.com/",
        "cancelled_at": 0,
        "created_at": 1748424975,
        "currency": "INR",
        "customer": {
          "contact": "+919000090000",
          "email": "gaurav.kumar@example.com",
          "name": "Gaurav Kumar"
        },
        "description": "Payment for policy no #23456",
        "expire_by": 1748426427,
        "expired_at": 1748426438,
        "first_min_partial_amount": 100,
        "id": "plink_QaIlOGFf8KZNF8",
        "notes": {
          "Test": "True"
        },
        "notify": {
          "email": true,
          "sms": true,
          "whatsapp": false
        },
        "reference_id": "NewTestPayment",
        "reminder_enable": true,
        "reminders": {
          "status": "failed"
        },
        "short_url": "https://rzp.io/rzp/REnL57hV",
        "status": "expired",
        "updated_at": 1748424975,
        "upi_link": false,
        "user_id": "",
        "whatsapp_link": false
      }
    }
  }
}
```json: payment_link.expired (UPI)
{
  "account_id": "acc_MWWeS9Ico5tQBk",
  "contains": [
    "payment_link"
  ],
  "created_at": 1748586657,
  "entity": "event",
  "event": "payment_link.expired",
  "payload": {
    "payment_link": {
      "entity": {
        "accept_partial": false,
        "amount": 100,
        "amount_paid": 0,
        "callback_method": "get",
        "callback_url": "https://example-callback-url.com/",
        "cancelled_at": 0,
        "created_at": 1748586657,
        "currency": "INR",
        "customer": {
          "contact": "+919000090000",
          "email": "gaurav.kumar@example.com",
          "name": "Gaurav Kumar"
        },
        "description": "Payment for policy no #23456",
        "expire_by": 1748587814,
        "expired_at": 1748587838,
        "first_min_partial_amount": 0,
        "id": "plink_Qb2ftTb6oRGMmu",
        "notes": {
          "policy_name": "Jeevan Bima"
        },
        "notify": {
          "email": true,
          "sms": true,
          "whatsapp": false
        },
        "order_id": "order_Qb2g8aDXbi3yQd",
        "reference_id": "UPItest1",
        "reminder_enable": true,
        "reminders": {
          "status": "failed"
        },
        "short_url": "https://rzp.io/rzp/l9G3mEO",
        "status": "expired",
        "updated_at": 1748586671,
        "upi_link": true,
        "user_id": "",
        "whatsapp_link": false
      }
    }
  }
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
