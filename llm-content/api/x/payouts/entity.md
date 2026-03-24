---
title: Payouts Entity
description: View RazorpayX Payouts entity parameters and descriptions.
---

# Payouts Entity

## Payouts Entity

The Payouts' Entity has the following parameters:

### Response

```json: Sample Entity
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
  "utr": null,
  "mode": "IMPS",
  "purpose": "refund",
  "reference_id": "Acme Transaction ID 12345",
  "narration": "Acme Corp Fund Transfer",
  "batch_id": null,
  "status_details": {
    "description": "Payout is queued as there is insufficient balance in your business account to process the payout",
    "source": "business",
    "reason": "low_balance"
    }
  "created_at": 1545383037
}
```

### Parameters

`id`
: `string` The unique identifier of the payout. For example, `pout_00000000000001`. 

`entity`
: `string` The entity being created. Here, it will be `payout`.

`fund_account_id`
: `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

`amount`
: `integer` The payout amount, in paise. For example, if you want to transfer ₹10,000, pass `1000000`. Minimum value `100`. 
The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`
: `string` The payout's currency. Here, it is `INR`.

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
    - `failed` 
    
    Know more about [Payout States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/states-life-cycle.md) and [Payout Status Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md).  

`utr`
: `string` The unique transaction number linked to a payout. For example, `HDFCN00000000001`.

`mode`
: `string` The mode used to make the payout. Available modes:
  - `NEFT`
  - `RTGS`
  - `IMPS`
  - `card` 

  
  The payout modes are case-sensitive.

`purpose`
: `string` The purpose of the payout that is being created. The following classifications are available in the system by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill` 

  
  Additional purposes for payouts can be created via the [Dashboard](https://x.razorpay.com/) and then used in the API. However, it is not possible to create a new purpose for the payout via the API.

`reference_id`
: `string` Maximum length is 40 characters. A user-generated reference given to the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`debit_account_number` 
: `string` The account from which the payout was processed. For example, `002281300012871`.

`narration`
: `string` Custom note that also appears on the bank statement. Maximum length 30 characters. Allowed characters: `a-z`, `A-Z`, `0-9` and space. 
 
 If no value is passed for this parameter, it defaults to the Merchant Billing Label. Ensure that the most important text forms the first 9 characters as banks may truncate the rest as per their standards.

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
: `integer` Indicates the Unix timestamp when this payout was created.

`fee_type`
: `string` Indicates the fee type charged for the payout. Possible values is `free_payout`.
