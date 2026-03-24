---
title: Payout Composite Entity
description: Check the entity code for Payout Composite APIs.
---

# Payout Composite Entity

## Payout Composite Entity

The Payout Composite Entity has the following parameters:

### Response

```json: Sample Entity
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
