---
title: Create a Payout to Amazon Pay Wallet
description: Create a Payout to wallet via API.
---

# Create a Payout to Amazon Pay Wallet

## Create a Payout to Amazon Pay Wallet

Use this endpoint to create a payout to a wallet. You cannot enter a custom narration when creating a payout via Amazon Pay. Know more about [RazorpayX Payout API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payouts.md).

Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout. 

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
  "mode": "amazonpay",
  "purpose": "refund",
  "queue_if_low_balance": true,
  "reference_id": "Acme Transaction ID 12345",
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
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
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "fees": 0,
  "tax": 0,
  "status": "queued",
  "utr": "GCID1234567",
  "mode": "amazonpay",
  "purpose": "refund",
  "reference_id": "Acme Transaction ID 12345",
  "narration": "Acme Corp Fund Transfer",
  "batch_id": null,
  "status_details": null,
  "created_at": 1545383037
}
```

### Parameters

`account_number`_mandatory_
: `string` Your customer identifier.
Account details can be found on the [RazorpayX Dashboard](https://x.razorpay.com/settings/banking). For example, `7878780080316316`.
    
> **WARN**
>
> 
> 
>     **Watch Out!**
> 
>     - This is **not** your contact's bank account number. Log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier**.
>     - This value is different for Test Mode and Live Mode.
>     
>     

`fund_account_id`_mandatory_
: `string` The unique identifier linked to a fund account. For example, `fa_00000000000001`.

`amount`_mandatory_
: `integer` The payout amount, in paise. For example, pass `1000000` to transfer an amount of ₹10,000. Minimum value `100` (₹1). Maximum value `1000000` (₹10,000). 
 
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`_mandatory_
: `string` The payout currency. Here, it is `INR`.

`mode`_mandatory_
: `string` The mode to be used to create the payout. Here it has to be `amazonpay`. 
 
 Payout modes are case-sensitive. Ensure the payout mode is entered in upper case.

`purpose`_mandatory_
: `string` The purpose of the payout that is being created. The following classifications are available in the system by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill`

  

  Additional purposes for payouts can be created via the [Dashboard](https://x.razorpay.com/) and then used in the API. However, it is not possible to create a new purpose for the payout via the API.

`queue_if_low_balance`_optional_
: `boolean` Possible values:
  - `true`: The payout is queued when your business account does not have sufficient balance to process the payout.
  - `false` (default): The payout is never queued. The payout fails if your business account does not have sufficient balance to process the payout.

`reference_id`_optional_
: `string` Maximum length is 40 characters. A user-generated reference given to the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`notes`_optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Parameters

`id`
: `string` The unique identifier linked to the payout. For example, `pout_00000000000001`.

`entity`
: `string` The entity being created. Here, it will be `payout`.

`fund_account_id`
: `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

`amount`
: `integer` The payout amount, in paise. 
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`
: `string` The payout currency. Here, it is `INR`.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`fees`
: `integer` The fees for the payout. This field is populated only when the payout moves to the `processing` state. For example, `5`.

`tax`
: `integer` The tax that is applicable for the fee being charged. This field is populated only when the payout moves to the `processing` state. For example, `1`.

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

`utr`
: `string` Here, it will be the Amazon Pay gift card ID. For example, `GCID1234567`.

`mode`
: `string` The mode used to make the payout. Here it will be `amazonpay`. Payout modes are case-sensitive.

`purpose`
: `string` The purpose of the payout that is being created. The following classifications are available in the system by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill`

`reference_id`
: `string` Maximum length is 40 characters. A user-generated reference given to the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`narration`
: `string` Defaults to the Merchant Billing Label. You cannot enter a custom narration when creating a payout via Amazon Pay. Contact RazorpayX support for more information.

`batch_id`
: `string` This parameter is populated if the contact was created as part of a bulk upload. For example, `batch_00000000000001`.

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
: `integer` Timestamp, in Unix, when the contact was created. For example, `1545320320`.
