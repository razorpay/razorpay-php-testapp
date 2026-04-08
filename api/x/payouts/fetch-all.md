---
title: Fetch All Payouts
description: Fetch All Payouts using API.
---

# Fetch All Payouts

## Fetch All Payouts

Use this endpoint to retrieve the details of all the available payouts in the system.

To understand the status of the payouts, refer to [Payout Status Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md).

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> We do not recommend using the Fetch Payout API to check the status of the payouts. Instead, we recommend that you subscribe to our [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/apis/subscribe.md) to get instant notifications. Whenever the status of your payouts change, you will be notified via these webhooks. 
> 

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X GET https://api.razorpay.com/v1/payouts?account_number=7878780080316316
```

### Response

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
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
      "purpose": "payout",
      "utr": null,
      "mode": "NEFT",
      "reference_id": "Acme Transaction ID 12345",
      "narration": "Acme Corp Fund Transfer",
      "debit_account_number": "002281300012871",
      "batch_id": null,
      "status_details": {
          "description": "Payout is processed and the money has been credited into the beneficiaries account",
          "source": "beneficiary_bank",
          "reason": "payout_processed"
        }
      "created_at": 1545382870,
      "fee_type": "",
    },
    {
      "id": "pout_00000000000002",
      "entity": "payout",
      "fund_account_id": "fa_00000000000002",
      "amount": 1000000,
      "currency": "INR",
      "notes": {
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey… decaf."
      },
      "fees": 590,
      "tax": 90,
      "status": "reversed",
      "purpose": "refund",
      "utr": null,
      "mode": "NEFT",
      "reference_id": "Acme Transaction ID 123456",
      "narration": "Acme Corp Fund Transfer",
      "debit_account_number": "002281300012999",
      "batch_id": null,
      "status_details": {
        "description": "The NEFT 24*7 limits for your account has been exhausted. Please retry after sometime",
        "source": "business",
        "reason": "amount_limit_exhausted"
      }
      "created_at": 1545382870,
      "fee_type": "",
    }
  ]
}
```

### Parameters

`account_number`_mandatory_
: `string` The account from which the payouts were done. For example, `7878780080316316`.
  - Pass your Customer Identifier(RazorpayX Lite number) if money was deducted from it.
  - Pass your Current Account number if  money was deducted from your Current Account.
  - This is a numeric or alphanumeric value
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   - To view your Customer Identifier, log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier**.
>   - Customer Identifier value is different for Test Mode and Live Mode.
>   

`contact_id` _optional_
: `string` The unique identifier of the contact for which you want to fetch payouts. For example, `cont_00000000000001`.

`fund_account_id` _optional_
: `string` The unique identifier of the fund account for which you want to fetch payouts. For example, `fa_00000000000001`.

`mode` _optional_
: `string` The mode for which payouts are to be fetched. You can use one of the following payout modes:
  - `NEFT`
  - `RTGS`
  - `IMPS`
  - `UPI`
  - `card`
  - `amazonpay` 

  The payout modes are case-sensitive. Ensure payout modes are entered in upper case.

`reference_id` _optional_
: `string` Maximum length is 40 characters. The user-generated reference for which payouts are to be fetched. For example, `Acme Transaction ID 12345`.

`status` _optional_
: `string` The payout status. Possible payout states:
  - `queued`
  - `pending` (if you have [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) enabled)
  - `rejected` (if you have [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) enabled)
  - `processing`
  - `processed`
  - `cancelled`
  - `reversed`
  - `failed` 
    
  Know more about [Payout statuses](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/states-life-cycle.md) and [Payout Status Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md). 

`from` _optional_
: `integer` Timestamp, in Unix, from when you want to fetch payouts.

`to` _optional_
: `integer` Timestamp, in Unix, till when you want to fetch payouts.

`count` _optional_
: `integer` Number of payouts to be fetched. Default value is `10`. Maximum value is `100`. This can be used for pagination, in combination with `skip`.

`skip` _optional_
: `integer` Numbers of payouts to be skipped. Default value is `0`. This can be used for pagination, in combination with `count`.

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
