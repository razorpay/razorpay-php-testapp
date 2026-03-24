---
title: Activate or Deactivate a Fund Account
description: Activate or Deactivate a Fund Account using API.
---

# Activate or Deactivate a Fund Account

## Activate or Deactivate a Fund Account

Use this endpoint to activate or deactivate a fund account. This helps you block payouts to certain fund accounts, as and when required.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X PATCH https://api.razorpay.com/v1/fund_accounts/fa_00000000000001 \
-H "Content-Type: application/json" \
-d '{
      "active": false
    }'
```

### Response

```json: Success
{
  "id": "fa_00000000000001",
  "entity": "fund_account",
  "contact_id": "cont_00000000000001",
  "account_type": "bank_account",
  "bank_account": {
    "ifsc": "HDFC0000053",
    "bank_name": "HDFC Bank",
    "name": "Gaurav Kumar",
    "account_number": "765432123456789"
  },
  "active": false,
  "batch_id": null,
  "created_at": 1545312598
}
```

### Parameters

`id`_mandatory_
: `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

### Parameters

`active`_mandatory_
: `boolean` The state to which you want to move the fund account. Possible values:
  - `true` (default): active
  - `false`: inactive
Pass `false` to deactivate an account and pass `true` to activate an account.

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

### Errors

`` is not a valid id.
* code: 4xx
* description: The fund account ID entered is invalid.
* solution: Re-check or find the Fund Account ID: - In the response body of [create a Fund Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/fund-accounts.md) API.
- On the [Contacts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/contacts.md) Dashboard.
