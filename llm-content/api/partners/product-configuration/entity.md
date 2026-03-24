---
title: Product Configuration Entity
description: Entity parameters and sample code for Product Configuration API.
---

# Product Configuration Entity

The Product Configuration entity has the following parameters:

### Response

```json: PG Entity
{
  "requested_configuration": [],
  "active_configuration": {
    "payment_capture": {
      "mode": "automatic",
      "refund_speed": "normal",
      "automatic_expiry_period": 7200
    },
    "settlements": {
      "account_number": "1234567890",
      "ifsc_code": "HDFC0000317",
      "beneficiary_name": "Gaurav Kumar"
    },
    "checkout": {
      "theme_color": "#528FFF",
      "flash_checkout": true,
      "logo": "https://example.com/your_logo"
    },
    "refund": {
      "default_refund_speed": "optimum"
    },
    "notifications": {
      "whatsapp": false,
      "sms": false,
      "email": [
        "gaurav.kumar@example.com",
        "acd@example.com"
      ]
    }
  },
  "requirements": [
    {
      "field_reference": "settlements.account_number",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9e",
      "reason_code": "field_missing",
      "status": "required"
    },
    {
      "field_reference": "settlements.ifsc",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9e",
      "reason_code": "field_missing",
      "status": "required"
    },
    {
      "field_reference": "settlements.beneficiary_name",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9e",
      "reason_code": "field_missing",
      "status": "required"
    }
  ],
  "tnc":{
    "id": "tnc_IgohZaDBHRGjPv",
    "accepted": true,
    "accepted_at": 1641550798
  },
  "id": "acc_prd_HEgNpywUFctQ9e",
  "account_id": "acc_HQVlm3bnPmccC0",
  "product_name": "payment_gateway",
  "activation_status": "needs_clarification",
  "requested_at": 1605181524
}
```json: PL Entity
{
  "requested_configuration": [],
  "active_configuration": {
    "payment_capture": {
      "mode": "automatic",
      "refund_speed": "normal",
      "automatic_expiry_period": 7200
    },
    "settlements": {
      "account_number": "1234567890",
      "ifsc_code": "HDFC0000317",
      "beneficiary_name": "Gaurav Kumar"
    },
    "checkout": {
      "theme_color": "#528FFF",
      "flash_checkout": true,
      "logo": "https://example.com/your_logo"
    },
    "refund": {
      "default_refund_speed": "optimum"
    },
    "notifications": {
      "whatsapp": false,
      "sms": false,
      "email": [
        "gaurav.kumar@example.com",
        "acd@example.com"
      ]
    }
  },
  "requirements": [
    {
      "field_reference": "settlements.account_number",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9f",
      "reason_code": "field_missing",
      "status": "required"
    },
    {
      "field_reference": "settlements.ifsc",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9f",
      "reason_code": "field_missing",
      "status": "required"
    },
    {
      "field_reference": "settlements.beneficiary_name",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9f",
      "reason_code": "field_missing",
      "status": "required"
    }
  ],
  "tnc":{
    "id": "tnc_IgohZaDBHRGjPq",
    "accepted": true,
    "accepted_at": 1641550798
  },
  "id": "acc_prd_HEgNpywUFctQ9f",
  "account_id": "acc_HQVlm3bnPmccC0",
  "product_name": "payment_links",
  "activation_status": "needs_clarification",
  "requested_at": 1605181524
}
```

### Parameters

@include partners-api/prod-config/entity
