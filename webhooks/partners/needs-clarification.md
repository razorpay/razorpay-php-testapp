---
title: Sample Payloads When Status is Needs Clarification
description: List of webhook events and associated payloads when the account is in Needs Clarification state.
---

# Sample Payloads When Status is Needs Clarification

## Product Payment Gateway Needs Clarification

```json: Payment Gateway Needs Clarification
{
  "entity": "event",
  "account_id": "acc_H7Tba8KmUr255a",
  "event": "product.payment_gateway.needs_clarification",
  "contains": [
    "merchant_product"
  ],
  "payload": {
    "merchant_product": {
      "entity": {
        "id": "acc_prd_H7TsOEbwlqe5aY",
        "merchant_id": "acc_H7Tba8KmUr255a",
        "activation_status": "needs_clarification"
      },
      "data": {
        "requirements": [
          {
            "field_reference": "legal_info.pan",
            "resolution_url": "/accounts/acc_H7Tba8KmUr255a",
            "status": "required",
            "reason_code": "needs_clarification"
          },
          {
            "field_reference": "individual_proof_of_address.aadhar_back",
            "resolution_url": "/accounts/acc_H7Tba8KmUr255a/stakeholders/sth_JI1ADtXrE6OHI2/documents",
            "reason_code": "needs_clarification",
            "description": "The document attached is not legible. Please resubmit a clearer copy",
            "status": "required"
          },
          {
            "field_reference": "individual_proof_of_address.aadhar_front",
            "resolution_url": "/accounts/acc_H7Tba8KmUr255a/stakeholders/sth_JI1ADtXrE6OHI2/documents",
            "reason_code": "needs_clarification",
            "description": "The document attached is not legible. Please resubmit a clearer copy",
            "status": "required"
          }
        ]
      }
    }
  },
  "created_at": 1622008278
}
```

## Product Payment Link Needs Clarification

```json: Payment Link Needs Clarification
{
  "entity": "event",
  "account_id": "acc_JNuCwk8oQ59DKR",
  "event": "product.payment_links.needs_clarification",
  "contains": [
    "merchant_product"
  ],
  "payload": {
    "merchant_product": {
      "entity": {
        "id": "acc_prd_JNuIbL01ZYCXas",
        "merchant_id": "acc_JNuCwk8oQ59DKR",
        "activation_status": "needs_clarification"
      },
      "data": {
        "requirements": [
          {
            "field_reference": "business_name",
            "resolution_url": "/accounts/acc_H7Tba8KmUr255a",
            "status": "required",
            "reason_code": "needs_clarification"
          },
          {
            "field_reference": "individual_proof_of_address.aadhar_back",
            "resolution_url": "/accounts/acc_H7Tba8KmUr255a/stakeholders/sth_JI1ADtXrE6OHI2/documents",
            "reason_code": "needs_clarification",
            "description": "The document attached is not legible. Please resubmit a clearer copy",
            "status": "required"
          },
          {
            "field_reference": "individual_proof_of_address.aadhar_front",
            "resolution_url": "/accounts/acc_H7Tba8KmUr255a/stakeholders/sth_JI1ADtXrE6OHI2/documents",
            "reason_code": "needs_clarification",
            "description": "The document attached is not legible. Please resubmit a clearer copy",
            "status": "required"
          }
        ]
      }
    }
  },
  "created_at": 1650961595
}
```

## Account Needs Clarification

```json: Account Needs Clarification
{
  "entity": "event",
  "account_id": "acc_JNraR8O85H1atC",
  "event": "account.needs_clarification",
  "contains": [
    "account"
  ],
  "payload": {
    "account": {
      "entity": {
        "id": "JNraR8O85H1atC",
        "entity": "merchant",
        "name": "Test account",
        "email": "gaurav.kumar@example.com",
        "activated": true,
        "activated_at": 1650951410,
        "live": true,
        "hold_funds": true,
        "pricing_plan_id": "C4uidYkQYsDdgX",
        "parent_id": null,
        "website": "",
        "category": "8211",
        "category2": "pvt_education",
        "international": false,
        "linked_account_kyc": false,
        "has_key_access": false,
        "fee_bearer": "platform",
        "fee_model": "prepaid",
        "refund_source": "balance",
        "billing_label": "Test account",
        "receipt_email_enabled": true,
        "receipt_email_trigger_event": "authorized",
        "transaction_report_email": [
          "gaurav.kumar@example.com"
        ],
        "invoice_label_field": null,
        "channel": "axis2",
        "convert_currency": false,
        "max_payment_amount": 50000000,
        "max_international_payment_amount": null,
        "auto_refund_delay": null,
        "auto_capture_late_auth": false,
        "brand_color": null,
        "handle": null,
        "risk_rating": 3,
        "risk_threshold": 8,
        "partner_type": null,
        "created_at": 1650949582,
        "updated_at": 1650951410,
        "suspended_at": null,
        "archived_at": null,
        "icon_url": null,
        "logo_url": null,
        "org_id": "100000razorpay",
        "notes": [],
        "whitelisted_ips_live": [],
        "whitelisted_ips_test": [],
        "whitelisted_domains": [],
        "merchant_detail": {
          "contact_name": "Test webhook",
          "contact_email": "gaurav.kumar@example.com",
          "contact_mobile": "9000090000",
          "contact_landline": null,
          "business_type": "4",
          "business_name": "Test account",
          "business_description": null,
          "business_dba": "Test account",
          "business_website": "",
          "business_international": false,
          "business_paymentdetails": null,
          "business_registered_address": "Kormangala ",
          "business_registered_address_l2": null,
          "business_registered_country": null,
          "business_registered_state": "KA",
          "business_registered_city": "Bengaluru",
          "business_registered_district": null,
          "business_registered_pin": "560068",
          "business_operation_address": "Kormangala ",
          "business_operation_address_l2": null,
          "business_operation_country": null,
          "business_operation_state": "KA",
          "business_operation_city": "Bengaluru",
          "business_operation_district": null,
          "business_operation_pin": "560068",
          "promoter_pan": "DAZPK0968P",
          "promoter_pan_name": "Gaurav Kumar",
          "business_doe": null,
          "gstin": null,
          "p_gstin": null,
          "company_cin": "L21091KA2019OPC141331",
          "company_pan": "ABCTY1234D",
          "company_pan_name": null,
          "business_category": "education",
          "business_subcategory": "schools",
          "business_model": "Please give a brief description of the nature of your business. Please include examples of products you sell, the business category you operate under",
          "transaction_volume": null,
          "transaction_value": null,
          "website_about": null,
          "website_contact": null,
          "website_privacy": null,
          "website_terms": null,
          "website_refund": null,
          "website_pricing": null,
          "website_login": null,
          "steps_finished": "[]",
          "activation_progress": 80,
          "locked": true,
          "activation_status": "needs_clarification",
          "bank_details_verification_status": "initiated",
          "poa_verification_status": null,
          "poi_verification_status": "initiated",
          "clarification_mode": "email",
          "archived": 0,
          "allowed_next_activation_statuses": [
            "under_review"
          ],
          "reviewer_id": null,
          "issue_fields": "aadhar_front,aadhar_back",
          "issue_fields_reason": "Invalid doc",
          "internal_notes": "Invalid doc",
          "marketplace_activation_status": null,
          "virtual_accounts_activation_status": null,
          "subscriptions_activation_status": null,
          "submitted": true,
          "submitted_at": 1650951410,
          "transaction_report_email": null,
          "bank_account_number": "1234567890",
          "bank_account_name": "Gaurav Kumar",
          "bank_account_type": null,
          "bank_branch": null,
          "bank_branch_ifsc": "HDFC0000186",
          "bank_beneficiary_address1": null,
          "bank_beneficiary_address2": null,
          "bank_beneficiary_address3": null,
          "bank_beneficiary_city": null,
          "bank_beneficiary_state": null,
          "bank_beneficiary_pin": null,
          "role": null,
          "department": null,
          "created_at": 1650949582,
          "updated_at": 1650953650,
          "activation_flow": "whitelist",
          "international_activation_flow": "whitelist",
          "live_transaction_done": 0,
          "kyc_clarification_reasons": null,
          "kyc_additional_details": null,
          "additional_websites": [],
          "estd_year": null,
          "authorized_signatory_residential_address": null,
          "authorized_signatory_dob": null,
          "platform": null,
          "fund_account_validation_id": null,
          "gstin_verification_status": null,
          "date_of_establishment": null,
          "activation_form_milestone": "L2",
          "company_pan_verification_status": "initiated",
          "cin_verification_status": "initiated",
          "company_pan_doc_verification_status": "initiated",
          "personal_pan_doc_verification_status": null,
          "bank_details_doc_verification_status": null,
          "msme_doc_verification_status": null,
          "shop_establishment_number": null,
          "shop_establishment_verification_status": null,
          "client_applications": [],
          "business_suggested_pin": null,
          "business_suggested_address": null,
          "fraud_type": null,
          "bas_business_id": null,
          "iec_code": null
        },
        "fee_credits_threshold": null,
        "amount_credits_threshold": null,
        "refund_credits_threshold": null,
        "balance_threshold": null,
        "display_name": null,
        "activation_source": "primary",
        "business_banking": false,
        "second_factor_auth": false,
        "restricted": false,
        "default_refund_speed": "normal",
        "partnership_url": null,
        "external_id": null,
        "product_international": "0000000000",
        "signup_source": null,
        "dcc_markup_percentage": 7,
        "purpose_code": null
      }
    }
  },
  "created_at": 1650951410
}
```
