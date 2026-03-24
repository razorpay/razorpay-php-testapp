---
title: Disputes Webhook Events
description: List of Disputes webhook events along with sample payloads.
---

# Disputes Webhook Events

A **Dispute** occurs when a customer or issuing bank challenges a payment's validity due to unauthorised charges, non-delivery of goods, or excessive fees.

## List of Disputes Webhook Events

The table below lists the webhook events available for disputes.

Webhook Event | Description
---
`payment.dispute.created` | Triggered when a dispute is raised by the customer's issuing bank against a payment.
---
`payment.dispute.won` | Triggered when you win a dispute against a payment.
---
`payment.dispute.lost` | Triggered when you lose a dispute against a payment.
---
`payment.dispute.closed` |  Triggered when a dispute is closed.
---
`payment.dispute.under_review` | Triggered when you contest a dispute and submit the evidence for review.
---
`payment.dispute.action_required` | Triggered when the evidence submitted is insufficient, unreadable or does not correspond to the contested amount. Please update/add evidences before contesting the dispute again.

## Sample Payloads

Given below are the sample payloads for disputes webhook events.

### Payment Dispute Created

```json: Payment Dispute Created
{
  "entity": "event",
  "account_id": "acc_CFvOKjkTwf3GQy",
  "event": "payment.dispute.created",
  "contains": [
    "payment",
    "dispute"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_EFtmUsbwpXwBHI",
        "entity": "payment",
        "amount": 5297600,
        "currency": "INR",
        "base_amount": 5297600,
        "status": "captured",
        "order_id": "order_EFtkA6f5jdkfud",
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 700000,
        "amount_transferred": 0,
        "refund_status": "partial",
        "captured": true,
        "description": null,
        "card_id": "card_EADblPSDnnk5ZG",
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919900000000",
        "notes": [],
        "fee": 0,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {},
        "created_at": 1581525157
      }
    },
    "dispute": {
      "entity": {
        "id": "disp_EsIAlDcoUr8CaQ",
        "entity": "dispute",
        "payment_id": "pay_EFtmUsbwpXwBHI",
        "amount": 39000,
        "currency": "INR",
        "amount_deducted": 0,
        "reason_code": "processed_invalid_expired_card",
        "respond_by": 1590431400,
        "status": "open",
        "evidence": {
          "amount": 39000,
          "summary": null,
          "shipping_proof": null,
          "billing_proof": null,
          "cancellation_proof": null,
          "customer_communication": null,
          "proof_of_service": null,
          "explanation_letter": null,
          "refund_confirmation": null,
          "access_activity_log": null,
          "refund_cancellation_policy": null,
          "term_and_conditions": null,
          "others": null,
          "submitted_at": null
        },
        "phase": "chargeback",
        "created_at": 1589907957
      }
    }
  },
  "created_at": 1589907977
}
```

### Payment Dispute Won

```json: Payment Dispute Won
{
  "entity": "event",
  "account_id": "acc_CFvOKjkTwf3GQy",
  "event": "payment.dispute.won",
  "contains": [
    "payment",
    "dispute"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_EsIStomuIwFQ6U",
        "entity": "payment",
        "amount": 1000000,
        "currency": "INR",
        "base_amount": 1000000,
        "status": "authorized",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": false,
        "description": null,
        "card_id": "card_EFEmBYkUF2ZzYw",
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919900000000",
        "notes": [],
        "fee": null,
        "tax": null,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "created_at": 1589909038
      }
    },
    "dispute": {
      "entity": {
        "id": "disp_EsIUyp8XlaZOUt",
        "entity": "dispute",
        "payment_id": "pay_EsIStomuIwFQ6U",
        "amount": 130000,
        "currency": "INR",
        "amount_deducted": 0,
        "reason_code": "non_matching_account_number",
        "respond_by": 1590431400,
        "status": "won",
        "phase": "chargeback",
        "created_at": 1589909126,
        "evidence": {
          "amount": 130000,
          "summary": "goods delivered",
          "shipping_proof": [
            "doc_EFtmUsbwpXwBH9",
            "doc_EFtmUsbwpXwBH8"
          ],
          "billing_proof": [
            "doc_EFtmUsbwpXwBG9",
            "doc_EFtmUsbwpXwBG8"
          ],
          "cancellation_proof": null,
          "customer_communication": null,
          "proof_of_service": null,
          "explanation_letter": null,
          "refund_confirmation": null,
          "access_activity_log": null,
          "refund_cancellation_policy": null,
          "term_and_conditions": null,
          "others": [
            {
              "type": "receipt_signed_by_customer",
              "document_ids": [
                "doc_EFtmUsbwpXwBH1",
                "doc_EFtmUsbwpXwBH7"
              ]
            }
          ],
          "submitted_at": 1589909726
        }
      }
    }
  },
  "created_at": 1589909172
}
```

### Payment Dispute Lost

```json: Payment Dispute Lost
{
  "entity": "event",
  "account_id": "acc_CFvOKjkTwf3GQy",
  "event": "payment.dispute.lost",
  "contains": [
    "payment",
    "dispute"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_EFtmUsbwpXwBHI",
        "entity": "payment",
        "amount": 5297600,
        "currency": "INR",
        "base_amount": 5297600,
        "status": "captured",
        "order_id": "order_EFtkA6f5jdkfud",
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 700000,
        "amount_transferred": 0,
        "refund_status": "partial",
        "captured": true,
        "description": null,
        "card_id": "card_EADblPSDnnk5ZG",
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "++919900000000",
        "notes": [],
        "fee": 0,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "created_at": 1581525157
      }
    },
    "dispute": {
      "entity": {
        "id": "disp_EsIAlDcoUr8CaQ",
        "entity": "dispute",
        "payment_id": "pay_EFtmUsbwpXwBHI",
        "amount": 39000,
        "currency": "INR",
        "amount_deducted": 39000,
        "reason_code": "processed_invalid_expired_card",
        "respond_by": 1590431400,
        "status": "lost",
        "phase": "chargeback",
        "evidence": {
          "amount": 39000,
          "summary": null,
          "shipping_proof": null,
          "billing_proof": null,
          "cancellation_proof": null,
          "customer_communication": null,
          "proof_of_service": null,
          "explanation_letter": null,
          "refund_confirmation": null,
          "access_activity_log": null,
          "refund_cancellation_policy": null,
          "term_and_conditions": null,
          "others": null,
          "submitted_at": null
        },
        "created_at": 1589907977
      }
    }
  },
  "created_at": 1589908238
}
```

### Payment Dispute Closed

```json: Payment Dispute Closed
{
  "entity": "event",
  "account_id": "acc_CFvOKjkTwf3GQy",
  "event": "payment.dispute.closed",
  "contains": [
    "payment",
    "dispute"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_EsIKS2bpFiWghA",
        "entity": "payment",
        "amount": 10000,
        "currency": "INR",
        "base_amount": 10000,
        "status": "captured",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": true,
        "description": null,
        "card_id": "card_ECijxX3uDiBYJ4",
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919900000000",
        "notes": [],
        "fee": 100,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "created_at": 1589908559
      }
    },
    "dispute": {
      "entity": {
        "id": "disp_EsIMubKldQtcu5",
        "entity": "dispute",
        "payment_id": "pay_EsIKS2bpFiWghA",
        "amount": 10000,
        "currency": "INR",
        "amount_deducted": 0,
        "reason_code": "goods_or_services_not_received_or_partially_received",
        "respond_by": 1590431400,
        "status": "closed",
        "phase": "fraud",
        "evidence": {
          "amount": 10000,
          "summary": null,
          "shipping_proof": null,
          "billing_proof": null,
          "cancellation_proof": null,
          "customer_communication": null,
          "proof_of_service": null,
          "explanation_letter": null,
          "refund_confirmation": null,
          "access_activity_log": null,
          "refund_cancellation_policy": null,
          "term_and_conditions": null,
          "others": null,
          "submitted_at": null
        },
        "created_at": 1589908667
      }
    }
  },
  "created_at": 1589908856
}
```

### Payment Dispute Under Review

```json: Payment Dispute Under Review
{
  "entity": "event",
  "account_id": "acc_CFvOKjkTwf3GQy",
  "event": "payment.dispute.under_review",
  "contains": [
    "payment",
    "dispute"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_EsIStomuIwFQ6U",
        "entity": "payment",
        "amount": 1000000,
        "currency": "INR",
        "base_amount": 1000000,
        "status": "authorized",
        "order_id": null,
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": false,
        "description": null,
        "card_id": "card_EFEmBYkUF2ZzYw",
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919900000000",
        "notes": [],
        "fee": null,
        "tax": null,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "created_at": 1589909038
      }
    },
    "dispute": {
      "entity": {
        "id": "disp_EsIUyp8XlaZOUt",
        "entity": "dispute",
        "payment_id": "pay_EsIStomuIwFQ6U",
        "amount": 130000,
        "currency": "INR",
        "amount_deducted": 0,
        "reason_code": "non_matching_account_number",
        "respond_by": 1590431400,
        "status": "under_review",
        "phase": "chargeback",
        "created_at": 1589909126,
        "evidence": {
          "amount": 100000,
          "summary": "goods delivered",
          "shipping_proof": [
            "doc_EFtmUsbwpXwBH9",
            "doc_EFtmUsbwpXwBH8"
          ],
          "billing_proof": [
            "doc_EFtmUsbwpXwBG9",
            "doc_EFtmUsbwpXwBG8"
          ],
          "cancellation_proof": null,
          "customer_communication": null,
          "proof_of_service": null,
          "explanation_letter": null,
          "refund_confirmation": null,
          "access_activity_log": null,
          "refund_cancellation_policy": null,
          "term_and_conditions": null,
          "others": [
            {
              "type": "receipt_signed_by_customer",
              "document_ids": [
                "doc_EFtmUsbwpXwBH1",
                "doc_EFtmUsbwpXwBH7"
              ]
            }
          ],
          "submitted_at": 1589909726
        }
      }
    }
  },
  "created_at": 1589909172
}
```

### Payment Dispute Action Required

```json: Payment Dispute Action Required
{
  "entity": "event",
  "account_id": "acc_CFvOKjkTwf3GQy",
  "event": "payment.dispute.action_required",
  "contains": [
    "payment",
    "dispute"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_EFtmUsbwpXwBHI",
        "entity": "payment",
        "amount": 5297600,
        "currency": "INR",
        "base_amount": 5297600,
        "status": "captured",
        "order_id": "order_EFtkA6f5jdkfud",
        "invoice_id": null,
        "international": false,
        "method": "card",
        "amount_refunded": 700000,
        "amount_transferred": 0,
        "refund_status": "partial",
        "captured": true,
        "description": null,
        "card_id": "card_EADblPSDnnk5ZG",
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919900000000",
        "notes": [],
        "fee": 0,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {},
        "created_at": 1581525157
      }
    },
    "dispute": {
      "entity": {
        "id": "disp_EsIAlDcoUr8CaQ",
        "entity": "dispute",
        "payment_id": "pay_EFtmUsbwpXwBHI",
        "amount": 390000,
        "currency": "INR",
        "amount_deducted": 0,
        "reason_code": "processed_invalid_expired_card",
        "respond_by": 1590431400,
        "status": "open",
        "phase": "chargeback",
        "created_at": 1589907977
      },
      "evidence": {
        "amount": 130000,
        "summary": "goods delivered",
        "shipping_proof": [
          "doc_EFtmUsbwpXwBH9",
          "doc_EFtmUsbwpXwBH8"
        ],
        "billing_proof": [
          "doc_EFtmUsbwpXwBG9",
          "doc_EFtmUsbwpXwBG8"
        ],
        "cancellation_proof": null,
        "customer_communication": null,
        "proof_of_service": null,
        "explanation_letter": null,
        "refund_confirmation": null,
        "access_activity_log": null,
        "refund_cancellation_policy": null,
        "term_and_conditions": null,
        "others": [
          {
            "type": "receipt_signed_by_customer",
            "document_ids": [
              "doc_EFtmUsbwpXwBH1",
              "doc_EFtmUsbwpXwBH7"
            ]
          }
        ],
        "submitted_at": null
      }
    }
  },
  "created_at": 1589907977
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
