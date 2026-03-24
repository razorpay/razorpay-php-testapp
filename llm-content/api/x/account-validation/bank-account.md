---
title: Validate a Bank Account
description: Validate Fund Account of type bank account via API.
---

# Validate a Bank Account

## Validate a Bank Account

Use this endpoint to create a bank account validation transaction. 

### Request

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/fund_accounts/validations \
-H "Content-Type: application/json" \
-d '{
  "account_number": "7878780080316316",
  "fund_account": {
    "id": "fa_00000000000001"
  },
  "amount": 100,
  "currency": "INR",
  "notes": {
    "random_key_1": "Make it so.",
    "random_key_2": "Tea. Earl Grey. Hot."
  }
}'
```

### Response

```json: Created
{
  "id": "fav_00000000000001",
  "entity": "fund_account.validation",
  "fund_account": {
    "id": "fa_00000000000001",
    "entity": "fund_account",
    "contact_id": "cont_00000000000001",
    "account_type": "bank_account",
    "bank_account": {
      "name": "Gaurav Kumar",
      "bank_name": "HDFC",
      "ifsc": "HDFC0000053",
      "account_number": "765432123456789"
    },
    "batch_id": null,
    "active": true,
    "created_at": 1567064019
  },
  "status": "created",
  "amount": 100,
  "currency": "INR",
  "notes": {
    "random_key_1": "Make it so.",
    "random_key_2": "Tea. Earl Grey. Hot."
  },
  "results": {
    "account_status": null,
    "registered_name": null
  },
  "created_at": 1547566278,
  "utr": null
}
```json: Completed
{
  "id": "fav_00000000000001",
  "entity": "fund_account.validation",
  "fund_account": {
    "id": "fa_00000000000001",
    "entity": "fund_account",
    "contact_id": "cont_00000000000001",
    "account_type": "bank_account",
    "bank_account": {
      "name": "Gaurav Kumar",
      "bank_name": "HDFC",
      "ifsc": "HDFC0000053",
      "account_number": "765432123456789"
    },
    "batch_id": null,
    "active": true,
    "created_at": 1567064019
  },
  "status": "completed",
  "amount": 100,
  "currency": "INR",
  "notes": {
    "random_key_1": "Make it so.",
    "random_key_2": "Tea. Earl Grey. Hot."
  },
  "results": {
    "account_status": "active",
    "registered_name": "Gaurav Kumar"
  },
  "created_at": 1547566278,
  "utr": "XXXXR7310682908954385XX"
}
```json: Failed
{
  "id": "fav_Fa6RwlxjoX0xeO",
  "entity": "fund_account.validation",
  "fund_account": {
    "id": "fa_Fa6Rq1WwNrpMoK",
    "entity": "fund_account",
    "contact_id": "cont_FYSVUV5EeJKkKb",
    "account_type": "bank_account",
    "bank_account": {
      "name": "Gaurav Kumar",
      "bank_name": "HDFC",
      "ifsc": "HDFC0000053",
      "account_number": "1121431121541121"
    },
    "batch_id": null,
    "active": true,
    "created_at": 1599652242
  },
  "status": "failed",
  "amount": 127,
  "currency": "INR",
  "notes": {
    "random_key_1": "Make it so.",
    "random_key_2": "Tea. Earl Grey. Hot."
  },
  "results": {
    "account_status": "",
    "registered_name": ""
  },
  "created_at": 1599473659,
  "utr": null
}
```

### Parameters

`account_number` _mandatory_
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

`fund_account`_mandatory_
: `object` The fund account id you want to validate.

  `id` _mandatory_
  : `string` The unique identifier linked to a fund account. For example, `fa_00000000000001`.

`amount`_mandatory_
: `integer` The amount, in paise, to be transferred. For example, pass `100` for ₹1. The default value for this parameter is `100`.
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`_optional_
: `string` The currency for the transfer. The value has to be `INR`. If no value is passed, it is assumed to be `INR`.

`notes`_optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

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
