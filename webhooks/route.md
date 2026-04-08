---
title: Route Webhook Events
description: List of Route webhook events along with sample payloads.
---

# Route Webhook Events

**Route** enables businesses to split payments among third parties, sellers, or bank accounts while managing settlements, refunds, and vendor payments in a one-to-many model.

## List of Route Webhook Events

The table below lists the webhook events available for Route.

Webhook Event | Description
---
`transfer.processed` | Triggered when a transfer made to a Linked Account is processed.
---
`settlement.processed` | Triggered when a settlement is successfully processed to your bank account.
---
`transfer.failed` | Triggered when a transfer made to a Linked Account is failed.
---
`product.route.under_review` | Triggered when the Linked account is in the process of being verified by Razorpay.
---
`product.route.needs_clarification` | Triggered when verification of the Linked account has failed, reasons are also included in the data object.
---
`product.route.activated` | Triggered when a Linked account has been verified successfully and is activated.

## Sample Payloads

Given below are the sample payloads for Route webhook events.

### Transfer Processed

@include route/transfer.processed

### Settlement Processed

> **INFO**
>
> 
> **Handy Tips**
> 
> - The `settlement.processed` webhook is triggered when a transfer to a Linked Account settles with the parent merchant.
> 

Given below are the sample payloads for Settlement webhook events.

```json: settlement.processed
{
  "entity": "event",
  "account_id": "acc_PR7UDve9UNcOxW",
  "event": "settlement.processed",
  "contains": [
    "settlement"
  ],
  "payload": {
    "settlement": {
      "entity": {
        "id": "setl_Rf8uva1MU98B4l",
        "entity": "settlement",
        "amount": 1524,
        "status": "processed",
        "fees": 0,
        "tax": 0,
        "utr": "AXISCN1153863727",
        "created_at": 1763019089
      }
    }
  },
  "created_at": 1763021990
}
```

### Transfer Failed

@include route/transfer.failed

### Product Route Under Review

```json: product.route.under_review
{
  "entity": "event",
  "account_id": "acc_QTzbto7NlAgZU4",
  "event": "product.route.under_review",
  "contains": [
    "merchant_product"
  ],
  "payload": {
    "merchant_product": {
      "entity": {
        "id": "acc_prd_QTzcNTia8qHzYG",
        "merchant_id": "acc_QTzbto7NlAgZU4",
        "activation_status": "under_review"
      },
      "data": []
    }
  },
  "created_at": 1747047572
}
```

### Product Route Needs Clarification

```json: product.route.needs_clarification
{
  "entity": "event",
  "account_id": "acc_QTzf1oMb6lfvIL",
  "event": "product.route.needs_clarification",
  "contains": [
    "merchant_product"
  ],
  "payload": {
    "merchant_product": {
      "entity": {
        "id": "acc_prd_QTzgAPhwEwsO9Z",
        "merchant_id": "acc_QTzf1oMb6lfvIL",
        "activation_status": "needs_clarification"
      },
      "data": {
        "requirements": [
          {
            "field_reference": "settlements.ifsc_code",
            "resolution_url": "/accounts/acc_QTzf1oMb6lfvIL/products/acc_prd_QTzgAPhwEwsO9Z",
            "reason_code": "needs_clarification",
            "description": "Max retry exceeded for bank account details.",
            "status": "required"
          },
          {
            "field_reference": "settlements.beneficiary_name",
            "resolution_url": "/accounts/acc_QTzf1oMb6lfvIL/products/acc_prd_QTzgAPhwEwsO9Z",
            "reason_code": "needs_clarification",
            "description": "Max retry exceeded for bank account details.",
            "status": "required"
          },
          {
            "field_reference": "settlements.account_number",
            "resolution_url": "/accounts/acc_QTzf1oMb6lfvIL/products/acc_prd_QTzgAPhwEwsO9Z",
            "reason_code": "needs_clarification",
            "description": "Max retry exceeded for bank account details.",
            "status": "required"
          }
        ]
      }
    }
  },
  "created_at": 1747047833
}
```

### Product Route Activated

```json: product.route.activated
{
  "entity": "event",
  "account_id": "acc_QTzbto7NlAgZU4",
  "event": "product.route.activated",
  "contains": [
    "merchant_product"
  ],
  "payload": {
    "merchant_product": {
      "entity": {
        "id": "acc_prd_QTzcNTia8qHzYG",
        "merchant_id": "acc_QTzbto7NlAgZU4",
        "activation_status": "activated"
      },
      "data": []
    }
  },
  "created_at": 1747047578
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
