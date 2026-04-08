---
title: Validate a VPA
description: Create Contact, Fund account and validate Fund Account of type VPA via a single API.
---

# Validate a VPA

## Validate a VPA

Use this endpoint to create contact, fund account and validate VPA (UPI) in a single API call. 

### Request

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/fund_accounts/validations \
-H "Content-Type: application/json" \
-d '{
  "source_account_number": "7878780080316316",
  "reference_id": "112233",
  "notes": {
    "random_key_1": "Make it so.",
    "random_key_2": "Tea. Earl Grey. Hot."
           },
  "fund_account": {
    "account_type":"vpa",
    "vpa":{
          "address":"gaurav.kumar@exampleupi"
          }
        "contact": {
            "name":"Gaurav Kumar",
            "email":"gaurav.kumar@example.com",
            "contact":"9123456789",
            "type":"employee",
            "reference_id":"Acme Contact ID 12345",
            "notes":{
                "notes_key_1":"Tea, Earl Grey, Hot",
                "notes_key_2":"Tea, Earl Grey... decaf."
        }
      }
    }
  }
}'
```

### Response

```json: Created
{
  "id": "fav_00000000000001",
  "entity": "fund_account.validation",
  "status": "created",
  "utr" : "123456789012",
  "validation_results": {
      "account_status": null,
      "registered_name": null,
      "details": null,
      "name_match_score": null
   },
  "status_details": {
    "description": "Validation request is created",
    "source": "internal",
    "reason": "validation_request_created"
    },
  "reference_id": "112233",
  "notes": {
      "random_key_1": "Make it so.",
      "random_key_2": "Tea. Earl Grey. Hot."
   },
  "fund_account": {
      "id": "fa_00000000000001",
      "entity": "fund_account",
      "account_type":"vpa",
      "vpa":{
          "address":"gaurav.kumar@exampleupi"
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
```json: Completed
{
  "id": "fav_00000000000001",
  "entity": "fund_account.validation",
  "status": "completed",
  "utr": "123456789012",
  "validation_results": {
    "account_status": "active",
    "registered_name": "Gaurav Kumar",
    "details": "The beneficiary account is valid.",
    "name_match_score": 100,
    "validated_account_type" : "bank account",
    "bank_account": {
      "bank_routing_code": "ICIC0000047",
      "account_number": "1121431121541121",
      "bank_name": "ICICI Bank",
      "account_type": "saving"
    }
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
    "account_type": "vpa",
    "vpa": {
      "address": "gaurav.kumar@exampleupi"
    },
    "active": true,
    "created_at": 1567064019,
    "contact": {
      "id": "cont_00000000000001",
      "entity": "contact",
      "name": "Gaurav Kumar",
      "email": "gaurav.kumar@example.com",
      "contact": "9123456789",
      "type": "employee",
      "reference_id": "Acme Contact ID 12345",
      "active": true,
      "created_at": 1567064019,
      "notes": {
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey... decaf."
      }
    }
  }
}

```json: Failed
{
  "id": "fav_00000000000002",
  "entity": "fund_account.validation",
  "fund_account": {
    "id": "fa_00000000000002",
    "entity": "fund_account",
    "contact_id": "cont_00000000000001",
    "account_type": "vpa",
    "vpa": {
      "username": "gaurav.kumar",
      "handle": "exampleupi",
      "address": "gaurav.kumar@exampleupi"
    },
    "batch_id": null,
    "active": true,
    "created_at": 1573110860
  },
  "status": "failed",
  "amount": null,
  "currency": null,
  "notes": {
    "random_key_1": "Make it so.",
    "random_key_2": "Tea. Earl Grey. Hot."
  },
  "validation_results": {
    "account_status": "",
    "registered_name": "",
    "details": null,
    "name_match_score": null,
    "bank_account": {
      "bank_name": null,
      "ifsc": null,
      "account_number": null,
      "account_type": null
    }
  },
  "created_at": 1574244676,
  "utr": null
}
```

### Parameters

`source_account_number` _mandatory_
: `string` The account from which money should be deducted for the account validation transaction.

`fund_account` _mandatory_
: `object` Fund account details to which the payout was made.

    `account_type` _mandatory_
    : `string` The fund account type being created. Here it will be `vpa`.

        `vpa`
        : `object` The contact's virtual payment address (VPA) details.

            `address`
            : `string` The virtual payment address. For example, `gaurav.kumar@exampleupi`.

    `contact` _optional_
    : `object` Contact details to which the payout was made.

        `name` _optional_
        : `string` The contact's name. For example, `Gaurav Kumar`.

        `email` _optional_
        : `string` The contact's email address. For example, `gaurav.kumar@example.com`.

        `contact` _optional_
        : `string` The contact's phone number. For example, `9000090000`.

        `type` _optional_
        : `string` A classification for the contact being created. For example, `employee`.

`notes`_optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`reference_id` _optional_
: `string` A user-generated reference given to the payout. Maximum length is 40 characters. For example, `112233`. You can use this field to store your own transaction ID, if any.

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
