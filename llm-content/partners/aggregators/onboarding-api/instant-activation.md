---
title: Instantly Activate Sub-Merchant Accounts
description: Instantly activate sub-merchant accounts and enable them to start accepting customer payments before KYC submission (Razorpay Partnership).
---

# Instantly Activate Sub-Merchant Accounts

With our Instant Activation feature, you can cut down the account activation wait time and enable sub-merchants to start accepting customer payments immediately after signing up. 

## Features

With this feature:
- The sub-merchants can accept payments **up to ₹15,000** without KYC completion, using Payment Gateway and/or Payment Links products. 

- In case of the ₹15,000 transaction volume breach, Razorpay disables payments till the KYC process is completed. There is no change in the product's status when payments are disabled.

- When a sub-merchant completes their KYC, the product status moves to `under_review` and they can start accepting payments. 

- Razorpay settles the transaction amount only after successful KYC verification.

- You can configure webhook events to receive notifications on transaction volume levels. For example, alerts are sent to the sub-merchants when their transaction volume breaches ₹12,000 and so on.

## Workflow

Given below is an illustration of the workflow:

![Instant Activation Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/partners-onboarding-api-instant-activation-flow.jpg.md)

## Webhook Events and Payloads

Event Name | Description
---
`account.instant_activation_gmv_limit_warning` | Triggered after the sub-merchant's transaction volume crosses one of these levels: - ₹5000
- ₹10,000
- ₹15,000

### Sample Payload: Volume Hits ₹10,000

```json: instant_activation_gmv_limit_warning
{
  "entity": "event",
  "account_id": "acc_K7UEVHASFftJfL",
  "event": "account.instant_activation_gmv_limit_warning",
  "contains": [
    "acc_id",
    "gmv_limit",
    "current_gmv",
    "message"
  ],
  "payload": {
    "acc_id": "K7UEVHASFftJfL",
    "gmv_limit": 15000,
    "current_gmv": 10000,
    "message": "You can accept payments upto INR 5000. In order to remove this limit and settle the amount to your account, fill in the remaining details"
  },
  "created_at": 1660911446
}
```

### Sample Payload: Volume Breached ₹15,000

```json: instant_activation_gmv_limit_warning
{
  "entity": "event",
  "account_id": "acc_K7U7hK1PeatxIs",
  "event": "account.instant_activation_gmv_limit_warning",
  "contains": [
    "acc_id",
    "gmv_limit",
    "current_gmv",
    "message"
  ],
  "payload": {
    "acc_id": "K7U7hK1PeatxIs",
    "gmv_limit": 15000,
    "current_gmv": 15200,
    "message": "You can no longer accept payments as you have breached the INR 15,000 limit. Kindly fill in the remaining details to re-activate your account."
  },
  "created_at": 1660937354
}
```

## API Response Code Changes

The sub-merchant can accept payments only up to ₹15,000. When they breach this limit, Razorpay sends a description in the **Fetch a Product Configuration API** response's `requirement` parameter, urging the sub-merchant to submit the remaining details and complete KYC.

```json: API Response
{
  "requested_configuration": [],
  "active_configuration": {
    "payment_capture": {
      "mode": "automatic",
      "refund_speed": "normal",
      "automatic_expiry_period": 7200
    },
    "settlements": {
      "account_number": null,
      "ifsc_code": null,
      "beneficiary_name": null
    },
    "checkout": {
      "theme_color": "#FFFFFF",
      "flash_checkout": true
    },
    "refund": {
      "default_refund_speed": "normal"
    },
    "notifications": {
      "whatsapp": false,
      "sms": false,
      "email": [
        "testcreateaccount4147apr@razorpay.com"
      ]
    }
  },
  "requirements": [
    {
      "field_reference": "business_proof_of_identification.business_pan_url",
      "resolution_url": "/accounts/acc_KB87VG5MDvcIpl/documents",
      "status": "required",
      "reason_code": "document_missing",
      "description": "You can no longer accept payments as you have breached the INR 15,000 limit. Kindly fill in the remaining details to re-activate your account."
    },
    {
      "field_reference": "business_proof_of_identification.business_proof_url",
      "resolution_url": "/accounts/acc_KB87VG5MDvcIpl/documents",
      "status": "required",
      "reason_code": "document_missing",
      "description": "You can no longer accept payments as you have breached the INR 15,000 limit. Kindly fill in the remaining details to re-activate your account."
    },
    {
      "field_reference": "individual_proof_of_address",
      "resolution_url": "/accounts/acc_KB87VG5MDvcIpl/stakeholders/sth_KB88x5dxpYtSdw/documents",
      "status": "required",
      "reason_code": "document_missing",
      "description": "You can no longer accept payments as you have breached the INR 15,000 limit. Kindly fill in the remaining details to re-activate your account."
    },
    {
      "field_reference": "settlements.beneficiary_name",
      "resolution_url": "/accounts/acc_KB87VG5MDvcIpl/products/acc_prd_KB8AggJtFqqQiJ",
      "reason_code": "field_missing",
      "status": "required",
      "description": "You can no longer accept payments as you have breached the INR 15,000 limit. Kindly fill in the remaining details to re-activate your account."
    },
    {
      "field_reference": "settlements.account_number",
      "resolution_url": "/accounts/acc_KB87VG5MDvcIpl/products/acc_prd_KB8AggJtFqqQiJ",
      "reason_code": "field_missing",
      "status": "required",
      "description": "You can no longer accept payments as you have breached the INR 15,000 limit. Kindly fill in the remaining details to re-activate your account."
    },
    {
      "field_reference": "settlements.ifsc_code",
      "resolution_url": "/accounts/acc_KB87VG5MDvcIpl/products/acc_prd_KB8AggJtFqqQiJ",
      "reason_code": "field_missing",
      "status": "required",
      "description": "You can no longer accept payments as you have breached the INR 15,000 limit. Kindly fill in the remaining details to re-activate your account."
    }
  ],
  "tnc": {
    "id": "tnc_KB89LFr5vuo3GQ",
    "accepted": true,
    "accepted_at": 1661706575
  },
  "id": "acc_prd_KB8AggJtFqqQiJ",
  "product_name": "payment_gateway",
  "activation_status": "instantly_activated",
  "account_id": "acc_KB87VG5MDvcIpl",
  "requested_at": 1661706652
}
```
