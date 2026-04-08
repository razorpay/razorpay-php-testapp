---
title: Composite Fund/Bank Account Validation
heading: Composite Account Validation Entity
description: Overview of Composite Account Validation for RazorpayX, APIs and webhook payload. Validate your customers’ bank account or VPA with a single API before you make payouts.
---

# Composite Account Validation Entity

The Account Validation entity has the following parameters:

### Response

```json: Sample Entity
{
  "id": "fav_00000000000001",
  "entity": "fund_account.validation",
  "status": "completed",
  "validation_results": {
      "account_status": "valid",
      "registered_name": "Gaurav Kumar",
      "details": "The beneficiary account is valid." ,
      "name_match_score": 100
   },
  "status_details": {
    "description": "Validation request is completed",
    "source": "beneficiary_bank",
    "reason": "validation_completed"
    },
  "reference_id": "112233",
  "notes": {
      "random_key_1": "Make it so.",
      "random_key_2": "Tea. Earl Grey. Hot."
   },
  "fund_account": {
      "id": "fa_00000000000001",
      "entity": "fund_account",
      "account_type": "bank_account",
      "bank_account": {
            "name": "Gaurav Kumar",
            "bank_name": "HDFC",
            "ifsc": "HDFC0000053",
            "account_number": "765432123456789"
      },
      "active": true,
      "created_at": 1567064019,
      "contact": {
          "id": "cont_00000000000001",
          "entity": "contact",
          "name":"Gaurav Kumar",
          "email":"gaurav.kumar@example.com",
          "contact":"9123456789",
          "type":"employee",
          "reference_id":"Acme Contact ID 12345",
          "active": true,
          "created_at": 1567064019,
          "notes":{
          "notes_key_1":"Tea, Earl Grey, Hot",
          "notes_key_2":"Tea, Earl Grey... decaf."
          }
      }
  }
}
```

### Parameters

`id`
: `string` The unique identifier linked to the fund account. For example, `fav_000000000001`.

`entity`
: `string` Here it will be `fund_account.validation`.

`status`
: `string` The status of the account validation transaction.
           Possible values: - `created`
- `completed`
- `failed`

`utr`
: `string` A 12-digit unique identifier for the successful IMPS fund account validation transaction. For example, `123456789012`.

`validation_results`
: `object` Result of the validation.

    `account_status`
    : `string` Displays if the account is valid or not. 
               Possible values: - `active`
- `invalid`

    
    `registered_name`
    : `string` The name linked to the account. For example,`Gaurav Kumar`.

    `details`
    : `string` Details of the beneficiary account depending on the validation result. 

    `name_match_score`
    : `string` A score between 0 - 100. - `100`: The name provided by you and the bank registered name are the same.
- `0`: There is no match between the name provided by you and the bank registered name.
- Between `0` & `100`: There is a partial match between the name provided by you and the bank registered name.

    `validated_account_type`
    : `string` Returns the underlying account type for the UPI ID, this can be a bank account, wallet, card or credit line.
   
    `bank_account`
    : `object` Returns the details of validated bank account.

        `bank_routing_code`
        : `string` Returns the IFSC of the account number. For example, `ICIC0000047`.

        `account_number`
        : `string` Returns the primary account number linked to the VPA (UPI).

        `bank_name`
        : `string` Returns the financial institution/bank name of the primary account linked to the UPI ID. For example, `ICICI Bank`.

        `account_type`
        : `string` Returns the account type. For example, `saving` or `current`.
    

`status_details`
: `object` This parameter returns the current status of the customer's bank account.

    `description`
    : `string` A description for the status. For example, `Validation request is completed`.

    `source`
    : `string` Possible values:
        - `gateway`: Technical error at Razorpay Partner bank.
        - `beneficiary_bank`: Technical error at beneficiary bank.
        - `business`: Merchant action required.
        - `internal`: Technical error at Razorpay's server.

    `reason`
    : `string` The reason for the status, based on the description. For example, `validation_completed`.

`fund_account`
: `object` Fund account details to which the payout was made.

    `id`
    : `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

    `entity`
    : `string` Here it will be `fund_account`.

    `account_type`
    : `string` The fund account type being created. Here it will either be `bank_account` or `vpa`.

        `bank_account`
        : `object` The contact's bank account details.

            `name`
            : `string` Account holder's name. For example,`Gaurav Kumar`.

            `bank_name`
            : `string` The contact's bank name. For example, `HDFC`.

            `ifsc`
            : `string` Beneficiary bank IFSC. For example, `HDFC0000053`.

            `account_number`
            : `string` Beneficiary account number. For example, `765432123456789`.

        `vpa`
        : `object` The contact's virtual payment address (VPA) details.

            `address`
            : `string` The virtual payment address. For example, `gaurav.kumar@exampleupi`.

`contact`
: `object` Contact details to which the payout was made.

    `id`
    : `string` The unique identifier linked to the contact. For example, `cont_00000000000001`.

    `entity`
    : `string` The entity being created. Here, it will be `contact`.

    `name`
    : `string` The contact's name. For example, `Gaurav Kumar`.

    `email`
    : `string` The contact's email address. For example, `gaurav.kumar@example.com`.

    `contact`
    : `string` The contact's phone number. For example, `9000090000`.

    `type`
    : `string` A classification for the contact being created. For example, `employee`.

    `reference_id`
    : `string` A user-generated reference given to the payout. Maximum length is 40 characters. For example, `112233`. You can use this field to store your own transaction ID, if any.

    `active`
    : `boolean` Possible values of Fund Account status:
    - `true`:  active
    - `false`: inactive

    `created_at`
    : `integer` Timestamp, in Unix, when the fund account was created. For example, `1543650891`.

    `notes`
    : `object` User-entered notes for internal reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Beam me up Scotty"`.
