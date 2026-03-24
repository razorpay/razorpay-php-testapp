---
title: Fetch All Account Validation Transactions
description: Retrieve all account validations transactions via API.
---

# Fetch All Account Validation Transactions

## Fetch All Account Validation Transactions

Use this endpoint to retrieve the details of all Fund Account Validation transactions you have made. 

### Request

```curl: Curl
curl -u : \
    -X GET https://api.razorpay.com/v1/fund_accounts/validations?account_number=7878780080316316
```

### Response

```json: Success
{
  "entity":"collection",
  "count":2,
  "items":[
    {
      "id": "fav_00000000000001",
      "entity": "fund_account.validation",
      "fund_account":{
        "id": "fa_00000000000001",
        "entity": "fund_account",
        "contact_id":"cont_00000000000001",
        "account_type": "bank_account",
        "bank_account":{
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
      "notes":{
        "random_key_1": "Make it so.",
        "random_key_2": "Tea. Earl Grey. Hot."
      },
      "results":{
        "account_status": "active",
        "registered_name": "Gaurav Kumar"
      },
      "created_at": 1547566278,
      "utr": "XXXXR7310682908954385XX"
    },
    {
      "id":"fav_00000000000002",
      "entity":"fund_account.validation",
      "fund_account":{
        "id":"fa_00000000000002",
        "entity":"fund_account",
        "contact_id":"cont_00000000000001",
        "account_type":"vpa",
        "vpa":{
          "username": "gaurav.kumar",
          "handle": "exampleupi",
          "address":"gaurav.kumar@exampleupi"
        },
        "batch_id": null,
        "active":true,
        "created_at":1573110860
      },
      "status":"completed",
      "amount":null,
      "currency":null,
      "notes":{
        "random_key_1":"Make it so.",
        "random_key_2":"Tea. Earl Grey. Hot."
      },
      "results":{
        "account_status":"active",
        "registered_name":"Gaurav Kumar"
      },
      "created_at":1574244676,
      "utr": null
    }
  ]
}
```

### Parameters

`account_number`_mandatory_
: `string` The account that was used to debit money for validation transaction. 
Account details can be found on the RazorpayX Dashboard. For example, `7878780080316316`.
     - Pass your Customer Identifier (RazorpayX Lite number) if money was deducted from RazorpayX Lite.
     - This is an alphanumeric or numeric value.

`from`_optional_
: `integer` Timestamp in Unix from when you want to fetch payouts.

`to`_optional_
: `integer` Timestamp in Unix till when you want to fetch payouts.

`count`_optional_
: `integer` Number of payouts to be fetched. Default value is `10`. Maximum value is `100`. This can be used for pagination, in combination with `skip`.

`skip`_optional_
: `integer` Numbers of payouts to be skipped. Default value is `0`. This can be used for pagination, in combination with `count`.

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
