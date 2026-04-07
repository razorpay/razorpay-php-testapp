---
title: Create a Payout to Bank Account Using Composite API
description: Create a Payout to Bank Account using the Composite API.
---

# Create a Payout to Bank Account Using Composite API

## Create a Payout to a Bank Account Using Composite API

Use this endpoint to create a payout to bank account using Composite Payout API.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout.
> 

 Consider the points given below before firing this API:

- Contact
  - A new contact is created if any combination of the following details is unique: 
    - `fund_account.contact.name`
    - `fund_account.contact.email`
    - `fund_account.contact.contact`
    - `fund_account.contact.type`
    - `fund_account.contact.reference_id`
  - If **all** the above details match the details of an existing contact, the API returns details of the existing contact.
  - Use the [Update Contact API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/contacts/update.md) if you want to make changes to an existing contact.
- Fund Account
  - A new fund account is created if any combination of the following details is unique: 
    - `fund_account.card.name`
    - `fund_account.card.number`
    - `fund_account.contact.name`
    - `fund_account.contact.email`
    - `fund_account.contact.contact`
    - `fund_account.contact.type` 
    - `fund_account.contact.reference_id`
  - If **all** the above details match the details of an existing fund account, the API returns details of the existing fund account.
  - You cannot edit the details of a fund account.

To understand the status of the payouts, refer to [Payout Status Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md).

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
    "mode": "NEFT",
    "purpose": "refund",
    "fund_account": {
        "account_type": "bank_account",
        "bank_account": {
            "name": "Gaurav Kumar",
            "ifsc": "HDFC0001234",
            "account_number": "1121431121541121"
        },
        "contact": {
            "name": "Gaurav Kumar",
            "email": "gaurav.kumar@example.com",
            "contact": "9876543210",
            "type": "vendor",
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
    "id": "pout_F681qslJ3ba70q",
    "entity": "payout",
    "fund_account_id": "fa_F681qr6Bqy1Je7",
    "fund_account": {
        "id": "fa_F681qr6Bqy1Je7",
        "entity": "fund_account",
        "contact_id": "cont_F681qmU11CfPDl",
        "contact": {
            "id": "cont_F681qmU11CfPDl",
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
            "created_at": 1592929016
        },
        "account_type": "bank_account",
        "bank_account": {
            "ifsc": "HDFC0001234",
            "bank_name": "HDFC Bank",
            "name": "Gaurav Kumar",
            "notes": [],
            "account_number": "1121431121541121"
        },
        "batch_id": null,
        "active": true,
        "created_at": 1592929016
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
    "purpose": "refund",
    "utr": null,
    "mode": "NEFT",
    "reference_id": "Acme Transaction ID 12345",
    "narration": "Acme Corp Fund Transfer",
    "batch_id": null,
    "status_details": null,
    "created_at": 1592929017,
    "fee_type": "",
    "error": {
        "description": null,
        "source": null,
        "reason": null
    }
}
```

### Parameters

`account_number`_mandatory_
: `string` The account from which you want to make the payout.
Account details can be found on the RazorpayX Dashboard. For example, `7878780080316316`.
  - Pass your customer identifier if you want money to be deducted from RazorpayX Lite.
  - Pass your Current Account number if you want money to be deducted from your Current Account.
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   - This is **not** your contact's bank account number. Log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier**.
>   - This value is different for Test Mode and Live Mode.
>   

`amount`_mandatory_
: `integer` The payout amount, in paise. For example, pass `1000000` to transfer an amount of ₹10,000. Minimum value is `100`. 
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`_mandatory_
: `string` The payout currency. Here, it is `INR`.

`mode`_mandatory_
: `string` The mode to be used to create the payout. Available modes:
  - `NEFT`
  - `RTGS`
  - `IMPS`
  - `card` 

  
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
  : `string` The type of account to be linked to the contact ID. Here, the value has to be `bank_account`.

  `bank_account`_mandatory_
  : `object` The contact's bank account details.

    `name`_mandatory_
    : `string` Account holder's name. Between 4 and 120 characters. This field is case-sensitive. Supported characters: `a-z`, `A-Z`, `0-9`, `space`, `’` , `-` , `_` , `/` , `(` , `)` and , `.`. For example,`Gaurav Kumar`.

    `ifsc`_mandatory_
    : `string` Beneficiary bank IFSC. Has to be 11 characters. Unique identifier of a bank branch. For example, `HDFC0000053`.

    `account_number`_mandatory_
    : `string` Beneficiary bank account number. Between 5 and 35 characters. Supported characters: `a-z`, `A-Z` and `0-9`. Beneficiary account number. For example, `765432123456789`.

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
    : `string` Maximum length is 40 characters. A reference you enter for the contact. For example, `Acme Contact ID 12345`.

    `notes`_optional_
    : `object` Notes you can enter for the contact for future reference. This is a key-value pair. For example, `"note_key": "Beam me up Scotty"`.

`queue_if_low_balance`_optional_
: `boolean` Possible values:
  - `true`: The payout is queued when your business account does not have sufficient balance to process the payout.
  - `false` (default): The payout is never queued. The payout fails if your business account does not have sufficient balance to process the payout.

`reference_id`_optional_
: `string` Maximum length is 40 characters. A reference you enter for the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`narration`_optional_
: `string` Maximum length 30 characters. Allowed characters: `a-z`, `A-Z`, `0-9` and `space`. This is a custom note that also appears on the bank statement. If no value is passed for this parameter, it defaults to the Merchant Billing Label. 
 
 Enter the important text in the first 9 characters as banks truncate the rest as per their standards.

`notes`_optional_
: `array` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Parameters

`id` 
: `string` The unique identifier linked to the payout. For example, `pout_00000000000001`.

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

    `reference_id` 
    : `string` A reference you entered for the contact. For example, `Acme Contact ID 12345`.

    `batch_id` 
    : `string` This value is returned if the contact was created as part of a bulk upload. For example, `batch_00000000000001`.

    `active` 
    : `boolean` Possible values:
      - `true`: active
      - `false`: inactive

    `notes` 
    : `object` User-entered notes for internal reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Beam me up Scotty”`.

    `created_at`
    : `integer` Timestamp, in Unix, when the contact was created. For example, `1545320320`.

  `account_type`
  : `string` The type of fund account being created. It can be a `bank_account`, `vpa`, `card`.

    `bank_account`
    : `object` The contact's bank account details.

        `ifsc`
        : `string` Unique identifier of a bank branch. For example, `HDFC0000053`.

        `bank_name`
        : `string` The contact's bank name. For example, `HDFC`.

        `name`
        : `string` Account holder's name. For example,`Gaurav Kumar`.

        `account_number`
        : `string` Beneficiary account number. For example, `765432123456789`.

        `notes`
        : `object` User-entered notes for internal reference.

    `vpa`
    : `object` The contact's virtual payment address (VPA) details.

        `username`
        : `string` The user name from the virtual payment address. For example, `gauravkumar`.

        `handle`
        : `string` The handle from the virtual payment address. For example, `exampleupi`.

        `address`
        : `string` The virtual payment address. For example, `gauravkumar@exampleupi`.

    `card`
    : `object` Details of the credit card that is being used to create the fund account.

        `name`
        : `string` The credit card holder's name. For example,`Gaurav Kumar`.

        `last4`
        : `string` The last four digits of the credit card. For example, `0001`.

        `network`
        : `string` The credit card issuing network. Possible values are:
        - `Visa`
        - `Mastercard`
        - `American Express`
        - `Diners Club`

        `type`
        : `string` Currently, this can only be `credit`.

        `issuer`
        : `string` The name of bank that issued the card. For example, `HDFC`. Refer to the [Supported Banks and Payout Modes section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payouts-cards.md#supported-banks-and-payout-modes) section for more details.

  `batch_id`
  : `string` This value is returned if the fund account was created as part of a bulk upload. For example, `batch_00000000000001`.

  `active`
  : `boolean` Possible values:
    - `true`: active
    - `false`: inactive

  `created_at`
  : `integer` Timestamp, in Unix, when the fund account was created. For example, `1545320320`.

`amount`
: `integer` Minimum value `100`. The payout amount, in paise. For example, if you want to transfer ₹10,000, pass `1000000`.
The value passed here does not include fees and tax. Fee and tax, if any, is deducted from your account balance.

`currency`
: `string` The payout currency. Here, it is `INR`.

`notes`
: `object` User-entered notes for internal reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Beam me up Scotty”`.

`fees`
: `integer` The fees for the payout. This value is returned only when the payout moves to the `processing` state. For example, `5`.

`tax`
: `integer` The tax that is applicable for the fee being charged. This value is returned only when the payout moves to the `processing` state. For example, `1`.

`status`
: `string` The payout status. Possible payout states:
  - `queued`
  - `pending` (if you have [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) enabled)
  - `rejected` (if you have [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) enabled)
  - `processing`
  - `processed`
  - `cancelled`
  - `reversed`
  - `failed`

`purpose`
: `string` The purpose of the payout. Classifications available by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill`

`utr`
: `string` The unique transaction number linked to a payout. For example, `HDFCN00000000001`.

`mode`
: `string` The mode used to make the payout. Refer to the [Payouts section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md#payout-modes) for more details. Available modes:
    - `NEFT`
    - `RTGS`
    - `IMPS`
    - `UPI`
    - `card`

`reference_id`
: `string` A reference you entered for the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`narration`
: `string` This is a custom note that also appears on the bank statement. 

If no value is passed for this parameter, it defaults to the Merchant Billing Label.

`batch_id`
: `string` This value is returned if the contact was created as part of a bulk upload. For example, `batch_00000000000001`.

`status_details`
: `object` This parameter returns the current status of the payout. For example, `IMPS is not enabled on beneficiary account, Retry with different mode.`

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
: `integer` Timestamp, in Unix, at which the payout was created. For example, `1545320320`.

`fee_type`
: `string` Indicates the fee type charged for the payout. Possible value is `free_payout`.
