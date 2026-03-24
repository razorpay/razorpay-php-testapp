---
title: Validate a VPA
description: Validate Fund Account of type VPA via API.
---

# Validate a VPA

## Validate a VPA

Use this endpoint to create a VPA (UPI) account validation transaction. 

### Request

```curl: Curl
curl -u : \
  -X POST https://api.razorpay.com/v1/fund_accounts/validations \
  -H "Content-Type: application/json" \
  -d '{
    "source_account_number": "7878780080316316",
    "validation_type": "pennydrop",
    "reference_id": "112233",
    "notes": {
      "key_1": "value_1",
      "key_2": "value_2"
    },
    "fund_account": {
      "account_type": "vpa",
      "vpa": {
        "address": "gaurav.kumar@exampleupi"
      },
      "contact": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9123456789",
        "type": "employee",
        "reference_id": "Contact_12345"
      }
    }
  }'
```

### Response

```json: Success
{
  "id": "fav_00000000000001",
  "entity": "fund_account.validation",
  "status": "completed",
  "validation_results": {
    "account_status": "active",
    "registered_name": "Gaurav Kumar",
    "details": "The beneficiary account is valid",
    "name_match_score": 100,
    "validated_account_type": "bank_account",
    "bank_account": {
      "bank_routing_code": "ICIC0000047",
      "account_number": "XXXXXXXX5599",
      "bank_name": "ICICI Bank",
      "account_type": "savings"
    }
  },
  "status_details": {
    "description": "Validation request is completed",
    "source": "beneficiary_bank",
    "reason": "validation_completed"
  },
  "reference_id": "112233",
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
      "reference_id": "Contact_12345",
      "active": true
    }
  }
}

```json: Failure
{
  "id": "fav_00000000000002",
  "entity": "fund_account.validation",
  "status": "failed",
  "validation_results": {
    "account_status": "",
    "registered_name": "",
    "details": "The beneficiary account is valid",
    "name_match_score": 100,
    "validated_account_type":
    "bank_account": {
      "bank_routing_code": null,
      "account_number": null,
      "bank_name": null,
      "account_type": null
    }
  },
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
  "amount": null,
  "currency": null,
  "notes": {
    "random_key_1": "Make it so.",
    "random_key_2": "Tea. Earl Grey. Hot."
  },
  },
  "created_at": 1574244676,
  "utr": null
}
```

### Parameters

`source_account_number` _mandatory_
: `string` The account from which money should be deducted for the account validation transaction.
  - Pass your customer identifier if you want money to be deducted from RazorpayX Lite.
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   - This is **not** your contact's bank account number. Log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier**.
>   - This value is different for Test Mode and Live Mode.
>   

`validation_type` _mandatory_
: `string` The method used for validating the bank account. In this case, `pennydrop`.

`reference_id` _optional_
: `string` Maximum 40 characters. A user-entered reference for the contact. For example, `Acme Contact ID 12345`.

`notes`_optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`fund_account` _mandatory_
: `object` The fund account id you want to validate.

  `account_type` _optional_
  : `string` Customer's bank account type. Possible values:
        - `savings` (default)
        - `current`

  `vpa` _mandatory_
  : `string` Target recipient's VPA address.

`contact` _mandatory_
: `object` The details of the contact.

`name`_optional_
: `string` The customer’s name. For example, Gaurav Kumar.

`email` _optional_
: `string` The customer’s email address. For example, gaurav.kumar@example.com.

`contact`_optional_
: `string` The customer's phone number. A maximum length of 15 characters, including country code. For example, `+919000090000`.

`type`_optional_
: `string` Defines the contact type . For example, `employee`

### Parameters

`id`
: `string` The unique identifier linked to the fund account validation. For example, `fav_0000000001`.

`entity`
: `string` Here it is `fund_account.validation`.

`status`
: `string` The status of the account validation transaction.
           Possible values: - `created`
- `completed`
- `failed`

`validation_results`
: `object` Details extracted from the results of the fund account validation.

  `account_status`
  : `string` Displays if the account is valid or not. 
               Possible values: - `active`
- `invalid`

  `registered_name`
  : `string` The name linked to the account. For example,`Gaurav Kumar` or `null`.

  `details`
  : `string` Brief description of the validation.

  `name_match_score`
  : `string` The percentage score indicating how closely the account holder's name matches the records.

`validated_account_type`
: `string` Here it is `bank_account`.

  `bank_account`
  : `object` The contact's bank account details.

    `bank_routing_code`
    : `string` Beneficiary bank IFSC. For example, `HDFC0000053`.

    `account_number`
    : `string` Beneficiary account number. For example, `765432123456789`.

    `bank_name`
    : `string` The contact's bank name. For example, `HDFC`.

    `account_type`
    : `string` The account type being validated. For example `savings`, `current`.

`status_details`
: `object` Status of the fund account validation.

  `description`
  : `string` A brief description stating if the validation is complete or not.

  `source`
  : `string` The source from which validation was done. For example, `beneficiary_bank`

  `reason`
  : `string` Reason for validation.

`reference_id`
: `string` Unique reference_id generated for the validation transaction.

`fund_account`
: `object` The details of the fund account which was validated.

  `id` 
  : `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

  `entity` 
  : `string` Here it is `fund_account`.

  `account_type`
  : `string` Fund account type.

`vpa`
: `object` The details associated with the account holder's virtual payment address.

  `address`
  : `string` The virtual payment address of the contact whose account is validated. For example, `gaurav.kumar@exampleupi`

`active`
: `boolean` Possible values of fund account status:
  - `true`: active
  - `false`: inactive

`created_at`
: `integer` Timestamp, in unix, when the fund account was created. For example, `1543650891`.

`contact`
: `object` The contact's details.

  `id`
  : `string` The unique identifier linked to the contact. For example, `cont_00000000000001`.

  `entity`
  : `string` Here it is `contact`

  `name`
  : `string` Account holder's name. For example,`Gaurav Kumar`.

  `email`
  : `string` Email address of the contact.

  `contact`
  : `string` Phone number of the contact.

  `type`
  : `string` Contact Type. For example, `employee`, `contractor`.

  `reference_id`
  : `string` Reference id associated with the contact.

  `active`
  : `boolean` Possible values of contact status:
  - `true`: active
  - `false`: inactive
