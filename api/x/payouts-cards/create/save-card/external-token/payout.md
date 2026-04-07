---
title: Create a Payout to Externally Tokenised Card
description: Create a Payout by saving an external Tokenised Card using API.
---

# Create a Payout to Externally Tokenised Card

## Create a Payout to Externally Tokenised Card

Use this endpoint to create a payout to fund account type `card` by saving the card as an external token.

To understand the status of the payouts, refer to [Payout Status Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout. 
> 

### Request

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payouts \
-H "Content-Type: application/json" \
-H "X-Payout-Idempotency: 53cda91c-8f81-4e77-bbb9-7388f4ac6bf4" \
-d '{
  "account_number": "7878780080316316",
  "fund_account_id": "fa_00000000000001",
  "amount": 1000000,
  "currency": "INR",
  "mode": "card",
  "purpose": "refund",
  "queue_if_low_balance": true,
  "reference_id": "Acme Transaction ID 12345",
  "narration": "Acme Corp Fund Transfer",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}'
```

### Response

```json: Success
{
  "id": "pout_00000000000001",
  "entity": "payout",
  "fund_account_id": "fa_00000000000001",
  "amount": 1000000,
  "currency": "INR",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "fees": 590,
  "tax": 90,
  "status": "processed",
  "utr": null,
  "mode": "card",
  "purpose": "refund",
  "reference_id": "Acme Transaction ID 12345",
  "narration": "Acme Corp Fund Transfer",
  "batch_id": null,
  "failure_reason": null,
  "created_at": 1545383037,
  "fee_type": "",
  "error": {
    "description": null,
    "source": null,
    "reason": null
  }
}
```

### Parameters

`account_number` _mandatory_
: `string` The account from which you want to make the payout. Account details can be found on the RazorpayX Dashboard. For example, `7878780080316316`.
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   - This is **not** your contact's bank account number. Log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier**.
>   - This value is different for Test Mode and Live Mode.
>   

`amount` _mandatory_
: `integer` The payout amount, in paise. For example, if you want to transfer ₹10000, pass `1000000`. Minimum value is `100`.

`currency` _mandatory_
: `string` The payout currency. Here, it is `INR`.

`mode` _mandatory_
: `string` The mode to be used to create the payout. Available modes: 
  - `NEFT`
  - `RTGS`
  - `IMPS`
  - `UPI`
  - `card`

`purpose` _mandatory_
: `string` The purpose of the payout that is being created. The following classifications are available in the system by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill` 

  
  Additional purposes for payouts can be created via the [Dashboard](https://x.razorpay.com/) and then used in the API. However, it is not possible to create a new purpose for the payout via the API.

`fund_account_id` _mandatory_
: `string` The unique identifier linked to the fund account.

`reference_id` _optional_
: `string` Maximum length is 40 characters. A user-generated reference given to the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`narration` _optional_
: `string` Maximum length 30 characters. Allowed characters: `a-z`, `A-Z`, `0-9` and space. This is a custom note that also appears on the bank statement. If no value is passed for this parameter, it defaults to the Merchant Billing Label. 
 
 Enter the important text in the first 9 characters as banks truncate the rest as per their standards.

`queue_if_low_balance` _optional_
: `boolean` The payout is automatically queued if the account balance is low.

### Parameters

`id`
: `string` The unique identifier linked to the payout. For example, `pout_00000000000001`.

`entity`
: `string` The entity being created. For example, `payout`.

`fund_account_id`
: `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

`fund_account`
: `object` The account to which you want to make the payout.

  `id`
  : `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

  `account_type`
  : `string` The type of account linked to the contact id. Here, it will be `card`.

  `contact_id`
  : `string` The unique identifier linked to the contact. For example, `cont_00000000000001`.

  `contact`
  : `object`

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
    : `string` A classification for the contact being created. For example, `employee`.

    `reference_id`
    : `string` A user-entered reference for the contact. For example, `Acme Contact ID 12345`.

    `batch_id`
    : `string` This value is returned if the contact was created as part of a bulk upload. For example, `batch_00000000000001`.

    `active`
    : `boolean` Possible values:
      - `true` (default): active
      - `false`: inactive

    `notes`
    : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

    `created_at`
    : `integer` Timestamp, in Unix, when the contact was created. For example, `1545320320`.

  `card` 
  : `object` The details of the card used.

    `last4`
    : `string` The last 4 digits of the card number. If the input_type = `service_provider_token` then it is the last 4 digits of the card token.

    `network`
    : `string` The network operator that has issued the card. For example, `Mastercard`, `Visa`.

    `type`
    : `string` The type of card. For example, `credit` or `debit`.

    `issuer`
    : `string` The bank that has issued the card. For example, `ICIC`, `HDFC`.

    `input_type` 
    : `string`  Possible values:- `service_provider_token` : When the token number used is provided by an external service.
- `card` : When a card number is provided.
- `razorpay_token` : When the token id used is provided by Razorpay.
 

`amount`
: `integer` The payout amount, in paise. For example, if you want to transfer ₹10,000, pass `1000000`. Minimum value `100`. 
 
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`
: `string` The payout currency. Here, it is `INR`.

`notes`
: `array of objects` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

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

`purpose`
: `string` The purpose of the payout that is being created. The following classifications are available in the system by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill`

`utr`
: `string` The unique transaction number linked to a payout. For example, `HDFCN00000000001`.

`mode`
: `string` The mode used to make the payout. Available modes:
  - `NEFT`
  - `RTGS`
  - `IMPS`
  - `UPI`
  - `card` 

  The payout modes are case-sensitive.

`reference_id`
: `string` Maximum length is 40 characters. A user-generated reference given to the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`narration`
: `string` Maximum length 30 characters. Allowed characters: `a-z`, `A-Z`, `0-9` and space. This is a custom note that also appears on the bank statement. If no value is passed for this parameter, it defaults to the Merchant Billing Label. 
 
 Enter the important text in the first 9 characters as banks truncate the rest as per their standards.

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
  : `string` The error reason. For example, `imps_not_allowed`. Know more about [Payout Status Details and Next Steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md).

`created_at`
: `integer` Timestamp, in Unix, when the contact was created. For example, `1545320320`.

`fee_type`
: `string` Indicates the fee type charged for the payout. Possible value is `free_payout`.
