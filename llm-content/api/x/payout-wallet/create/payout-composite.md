---
title: Make Payouts to Amazon Pay Wallet Using Composite API
description: Make Payout to wallet via Composite API.
---

# Make Payouts to Amazon Pay Wallet Using Composite API

## Make Payouts to Amazon Pay Wallet Using Composite API

Use this endpoint to create a payout to a Fund Account of type wallet. Know more about [RazorpayX Composite API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-composite.md). 

Composite API gives you the flexibility to either create a new Contact and Fund Account or use the existing Contact and Fund Account details (`contact_id` and `fund_account_id`) to make a payout.

Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout. 

### Request

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payouts \
-H "Content-Type: application/json" \
-H "X-Payout-Idempotency: 53cda91c-8f81-4e77-bbb9-7388f4ac6bf4" \
-d '{
    "account_number": "7878780080316316",
    "amount": 1000000,
    "currency": "INR",
    "mode": "amazonpay",
    "purpose": "refund",
    "fund_account": {
        "account_type": "wallet",
        "wallet": {
            "provider": "amazonpay",
            "phone": "+919876543210",
            "email": " gaurav.kumar@example.com",
            "name": "Gaurav Kumar"
        },
        "contact": {
            "name": "Gaurav Kumar",
            "email": "gaurav.kumar@example.com",
            "contact": "9876543210",
            "type": "employee",
            "reference_id": "Acme Contact ID 12345",
            "notes": {
                "notes_key_1": "Tea, Earl Grey, Hot",
                "notes_key_2": "Tea, Earl Grey… decaf."
            }
        }
    },
    "queue_if_low_balance": true,
    "reference_id": "Acme Transaction ID 12345",
    "narration": "Acme Corp Fund Transfer",
    "notes": {
        "notes_key_1": "Beam me up Scotty",
        "notes_key_2": "Engage"
    }
}'
```

### Response

```json: Success
{
    "id": "pout_00000000000001",
    "entity": "payout",
    "fund_account_id": "fa_00000000000001",
    "fund_account": {
        "id": "fa_00000000000001",
        "entity": "fund_account",
        "contact_id": "cont_00000000000001",
        "contact": {
            "id": "cont_00000000000001",
            "entity": "contact",
            "name": "Gaurav Kumar",
            "contact": "9876543210",
            "email": "gaurav.kumar@example.com",
            "type": "employee",
            "reference_id": "Acme Contact ID 12345",
            "batch_id": null,
            "active": true,
            "notes": {
                "notes_key_1": "Tea, Earl Grey, Hot",
                "notes_key_2": "Tea, Earl Grey… decaf."
            },
            "created_at": 1580817353
        },
        "account_type": "wallet",
        "wallet": {
            "provider": "amazonpay",
            "phone": "+919876543210",
            "email": " gaurav.kumar@example.com",
            "name": "Gaurav Kumar"
        },
        "batch_id": null,
        "active": true,
        "created_at": 1581080272
    },
    "amount": 1000000,
    "currency": "INR",
    "notes": {
        "notes_key_1": "Beam me up Scotty",
        "notes_key_2": "Engage"
    },
    "fees": 590,
    "tax": 90,
    "status": "processed",
    "purpose": "payout",
    "utr": "GCID1234567",
    "mode": "amazonpay",
    "reference_id": "Acme Transaction ID 12345",
    "narration": "Acme Corp Fund Transfer",
    "batch_id": null,
    "status_details": null,
    "created_at": 1581499319
}
```

### Parameters

`account_number`_mandatory_
: `string` Your customer identifier.
Account details can be found on the RazorpayX Dashboard. For example, `7878780080316316`.
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   - This is **not** your contact's bank account number. Log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier**.
>   - This value is different for Test Mode and Live Mode.
>   

`amount`_mandatory_
: `integer` The payout amount, in paise. For example, pass `1000000` to transfer an amount of ₹10,000. Minimum value is `100` (₹1). Maximum value `1000000` (₹10,000). 
 
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`_mandatory_
: `string` The payout currency. Here, it is `INR`.

`mode`_mandatory_
: `string` The mode to be used to create the payout. Here, it has to be `amazonpay`. 
 
 The payout modes are case-sensitive. When creating payouts using APIs, ensure payout modes are entered in upper case.

`purpose`_mandatory_
: `string` The purpose of the payout. Classifications available in the system by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill`
  
  

  Additional purposes for payouts can be created via the [Dashboard](https://x.razorpay.com/) and then used in the API. However, it is not possible to create a new purpose for the payout via the API.

`fund_account`_mandatory_
: `object` Details of the contact and fund account to which the payout should be made.

  `account_type`_mandatory_
  : `string` The type of account to be linked to the contact id. Here, the value has to be `wallet`.

  `wallet`_mandatory_
  : `object` The contact's wallet details.

    `provider` _mandatory_
    : `string` The wallet provider. Here, it is `amazonpay`.

    `phone` _mandatory_
    : `string` 10 digit beneficiary phone number with the country code. For example, `+919876543210`.

    `email` _optional_
    : `string` Beneficiary email address. For example, `gaurav.kumar@example.com`.

    `name ` _optional_
    : `string` Wallet holder's name. Between 4 and 120 characters. This field is case-sensitive. Supported characters: `a-z`, `A-Z`, `0-9`, `space`, `’` , `-` , `_` , `/` , `(` , `)` and , `.`. For example, `Gaurav Kumar`.

  `contact`_mandatory_
  : `object` Details of the contact to whom the payout should be made.

    `name`_mandatory_
    : `string` Contact's name. Minimum 3 characters. Maximum 50 characters. This field is case-sensitive. Supported characters: `a-z`, `A-Z`, `0-9`, `space`, `’` , `-` , `_` , `/` , `(` , `)` and , `.`. For example, `Gaurav Kumar`.

    `email`_optional_
    : `string` The contact's email address. For example, `gaurav.kumar@example.com`.

    `contact`_optional_
    : `string` The contact's phone number. For example, `9000090000`.

    `type`_optional_
    : `string` Classification for the contact. For example, `employee`. Classifications are available by default:
      - `vendor`
      - `customer`
      - `employee`
      - `self`

      

      Additional classifications can be created via the [Dashboard](https://x.razorpay.com/) and then used in APIs. It is not possible to create new classifications via the API.

    `reference_id`_optional_
    : `string` A reference you enter for the contact. Maximum length is 40 characters. For example, `Acme Contact ID 12345`.

    `notes`_optional_
    : `object` Notes you can enter for the contact for future reference. This is a key-value pair. For example, `"note_key": "Beam me up Scotty"`.

`queue_if_low_balance`_optional_
: `boolean` Possible values:
  - `true`: The payout is queued when your business account does not have sufficient balance to process the payout.
  - `false` (default): The payout is never queued. The payout fails if your business account does not have sufficient balance to process the payout.

`reference_id`_optional_
: `string` Maximum length is 40 characters. A reference you enter for the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`narration`_optional_
: `string` Maximum length 30 characters. Allowed characters: `a-z`, `A-Z`, `0-9` and `space`. This custom note also appears on the bank statement. If no value is passed for this parameter, it defaults to the Merchant Billing Label. 
 
 Enter the important text in the first 9 characters as banks truncate the rest as per their standards.

`notes`_optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Parameters

`id`
: `string` The unique identifier of the order.

`entity`
: `string` The entity being created. Here, it will be `payout`.

`fund_account_id`
: `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

`fund_account`
: `object` Contact and fund account details to which the payout was made.

  `id`
  : `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

  `entity`
  : `string` Here it will be `fund_account`.

  `contact_id`
  : `string` The unique identifier linked to the contact. For example, `cont_00000000000001`.

  `contact`
  : `object` Details of the contact to whom the payout is being made.

    `id`
    : `string` The unique identifier linked to the contact. For example, `cont_00000000000001`.

    `entity`
    : `string` The entity being created. Here, it will be `contact`.

    `name`
    : `string` The contact's name. For example, `Gaurav Kumar`.

    `contact`
    : `string` The contact's phone number. For example, `9000090000`.

    `email`
    : `string` The contact's email address. For example, `gaurav.kumar@example.com`.

    `type`
    : `string` Classification for the contact being created. For example, `employee`. Classifications are available by default:
      - `vendor`
      - `customer`
      - `employee`
      - `self`
      
 

      Additional Classifications can be created via the [Dashboard](https://x.razorpay.com/) and then used in APIs. It is not possible to create new Classifications via API.

    `reference_id`
    : `string` A reference you entered for the contact. For example, `Acme Contact ID 12345`.

    `batch_id`
    : `string` This value is returned if the contact was created as part of a bulk upload. For example, `batch_00000000000001`.

    `active`
    : `boolean` Possible values:
      - `true`: active
      - `false`: inactive

    `notes`
    : `object` User-entered notes for internal reference. This is a key-value pair. For example, `"note_key": "Beam me up Scotty"`.

    `created_at`
    : `integer` Timestamp, in Unix, when the contact was created. For example, `1545320320`.

  `account_type`
  : `string` The type of fund account being created. Here, it will be `wallet`.

  `wallet`
  : `object` The contact's wallet details. 

    `provider`
    : `string` The wallet provider. Here, it is `amazonpay`.

    `phone` 
    : `string` 10 digit beneficiary phone number with the country code. For example, `+919876543210`.

    `email`
    : `string` Beneficiary email address. For example, `gaurav.kumar@example.com`.

    `name ` 
    : `string` Wallet holder's name. Between 4 and 120 characters. This field is case-sensitive. Supported characters: `a-z`, `A-Z`, `0-9`, `space`, `’` , `-` , `_` , `/` , `(` , `)` and , `.`. For example, `Gaurav Kumar`.

  `active`
  : `boolean` Possible values:
    - `true`: active
    - `false`: inactive

  `batch_id`
  : `string` This value is returned if the fund account was created as part of a bulk upload. For example, `batch_00000000000001`.

  `created_at`
  : `integer` Timestamp, in Unix, when the fund account was created. For example, `1545320320`.

`amount`
: `integer` The payout amount, in paise. For example, pass `1000000` to transfer an amount of ₹10,000. Minimum value `100`. 
 
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`
: `string` The payout's currency. Here, it is `INR`.

`notes`
: `array of objects` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty"`.

`fees`
: `integer` The fees for the payout. This value is returned only when the payout moves to the `processing` state. For example, `5`.

`tax`
: `integer` The tax that is applicable for the fee being charged. This value is returned only when the payout moves to the `processing` state. For example, `1`.

`status`
: `string` The status of the payout. Possible payout states:
    - `queued`
    - `pending` (if you have [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) enabled)
    - `rejected` (if you have [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) enabled)
    - `processing`
    - `processed`
    - `cancelled`
    - `reversed` 

    Refer to [Payout Life Cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/states-life-cycle.md).

`purpose`
: `string` The purpose of the payout that is being created. The following classifications are available in the system by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill`
  

  
  Additional purposes for payouts can be created via the [RazorpayX Dashboard](https://x.razorpay.com/) and then used in the API. However, it is not possible to create a new purpose for the payout via the API.

`utr`
: `string` The unique transaction number linked to a payout. For example, `GCID1234567`.

`mode`
: `string` The mode used to make the payout. Available modes is `amazonpay`. The payout modes are case-sensitive.

`reference_id`
: `string` A user-generated reference given to the payout. Maximum length is 40 characters. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`narration`
: `string` Custom note that also appears on the bank statement. Maximum length 30 characters. Allowed characters: a-z, A-Z, 0-9 and space. 
 
 You cannot enter a custom narration when creating a payout via Amazon Pay. 

`batch_id`
: `string` This value is returned if the contact was created as part of a bulk upload. For example, `batch_00000000000001`.

`status_details`
: `object` This parameter returns the current status of the payout. For example, `IMPS is not enabled on beneficiary account, Retry with different mode`.

    `description`
    : `string` A description for the error. For example, `IMPS is not enabled on beneficiary account, please retry with different mode`.

    `source`
    : `string` Possible values:
        - `gateway`: Technical error at Razorpay Partner bank.
        - `beneficiary_bank`: Technical error at beneficiary bank.
        - `business`: Merchant action required.
        - `internal`: Technical error at Razorpay's server.

    `reason`
    : `string` The error reason. For example, `imps_not_allowed`. [Payout Status Details and Next Steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md).

`created_at`
: `integer` Indicates the Unix timestamp when this order was created. For example, `1545320320`.
