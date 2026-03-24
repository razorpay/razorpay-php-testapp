---
title: Create a Payout to a Mobile Number Using Composite API
description: Create a Payout to Mobile Number using the Composite API.
---

# Create a Payout to a Mobile Number Using Composite API

## Create a Payout to a Mobile Number Using the Composite API

Use this endpoint to create a payout to a mobile number using Composite Payout API.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> - Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout.
> - You can send payouts to VPA (UPI) linked mobile numbers only.
> 
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
curl -u : 
-X POST https://api.razorpay.com/v1/payouts 
-H "Content-Type: application/json" 
-H "X-Payout-Idempotency: 53cda91c-8f81-4e77-bbb9-7388f4ac6bf4" 
-d '{
  "account_number": "7878780080316316",
  "amount": 1000,
  "currency": "INR",
  "mode": "UPI",
  "purpose": "cashback",
  "fund_account": {
    "account_type": "mobile",
    "mobile": {
      "number": "9876543210",
      "account_holder_name": "Gaurav Kumar"
    },
    "contact": {
      "name": "Gaurav Kumar",
      "email": "gaurav.kumar@example.com",
      "contact": "9000090000",
      "type": "self",
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
      "contact": "9000090000",
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
    "account_type": "mobile", 
    "mobile": {
      "number": "9876543210",
      "account_holder_name": "Gaurav Kumar"
    },
    "vpa": {
      "username": null,
      "handle": "exampleupi",
      "address": null,
    },
    "batch_id": null,
    "active": true,
    "created_at": 1592929016
  },
  "amount": 1000,
  "currency": "INR",
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage",
    "VPA_HANDLE": "okhdfcbank"
  },
  "fees": 59,
  "tax": 9,
  "status": "processed",
  "purpose": "refund",
  "utr": "UPI2928292020",
  "mode": "UPI",
  "reference_id": "Acme Transaction ID 12345",
  "narration": "Acme Corp Fund Transfer",
  "batch_id": null,
  "failure_reason": null,
  "created_at": 1592929017,
  "fee_type": null,
  "status_details": {
        "reason": "pending_approval",
        "description": "Workflow for the payout is pending approval from the approver(s)",
        "source": "business"
    },
  "merchant_id": "Pup4LDLiA1DssX",
  "status_details_id": "R7aA38hQzg5TDj",
  "error": {
    "description": null,
    "source": null,
    "reason": null,
    "code": "NA",
    "step": "NA",
    "metadata": {}
  }
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "No linked account details found",
    "source": "customer",
    "step": "fetch_account_details",
    "reason": "no_linked_account_found",
    "metadata": {},
    "field": "number"
  }
}
```

### Parameters

`account_number` _mandatory_
: `string` The account from which you want to make the payout.
Account details can be found on the RazorpayX Dashboard. For example, `7878780080316316`.
  - Pass your customer identifier if you want money to be deducted from RazorpayX Lite.
  - Pass your Current Account number if you want money to be deducted from your Current Account.
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   - This is **not** your contact's bank account number. Log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier.**
>   - This value is different for Test Mode and Live Mode.
>   

`amount` _mandatory_
: `integer` The payout amount, in paise. For example, pass `1000000` to transfer an amount of ₹10,000. Minimum value is `100`. 
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency` _mandatory_
: `string` The payout currency. Here, it is `INR`.

`mode` _mandatory_
: `string` The mode to be used to create the payout. Here, it is `UPI`.

 The payout modes are case-sensitive. When creating payouts using APIs, ensure payout modes are entered in upper case. 

`purpose` _mandatory_
: `string` The purpose of the payout. Classifications available in the system by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill` 

  
  Additional purposes for payouts can be created via the [Dashboard](https://x.razorpay.com/) and then used in the API. However, it is not possible to create a new purpose for the payout via the API.

`fund_account` _mandatory_
: `object` Details of the contact and fund account to which the payout should be made.

  `account_type` _mandatory_
  : `string` The type of account linked to the contact ID. Here, the value has to be `mobile`.

  `mobile` _mandatory_
  : `object` Object for capturing phone number and the name linked to it (optional). 

    `number` _mandatory_
    : `string` The contact's 10-digit mobile number (without country code) to which you wish to send the payout. This has to be linked to a VPA (UPI). For example, `9876543210`.

    `account_holder_name` _optional_
    : `string` The name linked to the mobile number. This, if provided, will be validated against the linked UPI/bank account name.  This will not be validated if not entered. For example, `Gaurav Kumar`.

  `contact` _mandatory_
  : `object` Details of the contact to whom the payout should be made.

    `name` _mandatory_
    : `string` Contact's name. Minimum 3 characters. Maximum 50 characters. This field is case-sensitive. Supported characters: `a-z`, `A-Z`, `0-9`, `space`, `’` , `-` , `_` , `/` , `(` , `)` and , `.`. For example, `Gaurav Kumar`.

    `email` _optional_
    : `string` The contact's email address. For example, `gaurav.kumar@example.com`.

    `contact` _optional_
    : `string` The contact's phone number. For example, `9000090000`. This can be same or different from the number passed to the `mobile` object for payout.

    `type` _optional_
    : `string` Classification for the contact. For example, `employee`. Classifications are available by default:
      - `vendor`
      - `customer`
      - `employee`
      - `self` 

      Additional classifications can be created via the [Dashboard](https://x.razorpay.com/) and then used in APIs. It is not possible to create new classifications via the API.

    `reference_id` _optional_
    : `string` Maximum length is 40 characters. A reference you enter for the contact. For example, `Acme Contact ID 12345`.

    `notes` _optional_
    : `object` Notes you can enter for the contact for future reference. This is a key-value pair. For example, `"note_key": "Beam me up Scotty"`.

`queue_if_low_balance` _optional_
: `boolean` Possible values:
  - `true`: The payout is queued when your business account does not have sufficient balance to process the payout.
  - `false` (default): The payout is never queued. The payout fails if your business account does not have sufficient balance to process the payout.

`reference_id` _optional_
: `string` Maximum length is 40 characters. A reference you enter for the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`narration` _optional_
: `string` Maximum length 30 characters. Allowed characters: `a-z`, `A-Z`, `0-9` and `space`. This is a custom note that also appears on the bank statement. If no value is passed for this parameter, it defaults to the Merchant Billing Label. 
 Enter the important text in the first 9 characters as banks truncate the rest as per their standards.

`notes` _optional_
: `array` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Parameters

`id`
: `string` The unique identifier linked to the payout. For example, `pout_00000000000001`.

`entity`
: `string` The entity being created. Here, it will be `payout`.

`fund_account_id`
: `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

`fund_account`
: `string` Contact and fund account details to which the payout was made.

  `id`
  : `string` The unique identifier linked to the fund account. For example, `fa_00000000000001`.

  `entity`
  : `string` Here it will be `fund_account`.

  `contact_id`
  : `string` The unique identifier linked to the contact. For example, `cont_00000000000001`.

  `contact`
  : `string` Details of the contact to whom the payout is being made.

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
    : `string` This parameter is populated if the contact was created as part of a bulk upload. For example, `batch_00000000000001`.

    `active`
    : `boolean` Possible values:
      - `true`: active
      - `false`: inactive

    `notes`
    : `object` User-entered notes for internal reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Beam me up Scotty”`.

    `created_at`
    : `integer` Timestamp, in Unix, when the contact was created. For example, `1545320320`.

  `account_type`
  : `string` The type of fund account being created. Here, it will be `mobile`. 

  `mobile`
    : `object` The contact's mobile number to which you wish to make a payout.

    `number` _mandatory_
    : `string` Account holder's mobile number containing 10 digits.

    `account_holder_name` _optional_
    : `string` The name linked to the mobile number.

  `vpa`
  : `string` The contact's VPA (UPI) details.

    `username`
    : `string` The user name from the VPA (UPI). For example, `gauravkumar`.

    `handle`
    : `string` The handle from the VPA (UPI) address. For example, `exampleupi`.

    `address`
    : `string` The VPA (UPI) address. For example, `gauravkumar@exampleupi`.

  `batch_id`
    : `string` This parameter is populated if the contact was created as part of a bulk upload. For example, `batch_00000000000001`.

  `active`
  : `boolean` Possible values:
    - `true`: active
    - `false`: inactive

  `created_at`
  : `integer` Timestamp, in Unix, when the contact was created. For example, `1545320320`.

`amount`
: `integer` The payout amount, in paise. For example, if the amount transferred is ₹100, it will display  10000.  
This value  does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`
: `string` The payout currency. Here, it is `INR`.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`fees`
: `integer` The fees for the payout. This field is populated only when the payout moves to the `processing` state. For example, `59`

`tax`
: `integer` The tax that is applicable for the fee being charged. This field is populated only when the payout moves to the `processing` state. For example, `9`

`status`
: `string` The payout status. Possible payout states:
  - `queued`
  - `pending` (if you have [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) enabled)
  - `rejected` (if you have [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) enabled)
  - `processing`
  - `processed`
  - `cancelled`
  - `reversed`

`purpose`
: `string` The purpose of the payout. Classifications available by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill`

`utr`
: `string` The unique transaction number linked to a payout. For example, `UPI2928292020`.

`mode`
: `string` Here, it is `UPI`.

`reference_id`
: `string` A user-generated reference given to the payout. For example, `Acme Transaction ID 12345`. You can use this field to store your own transaction ID, if any.

`narration`
: `string` This is a custom note that also appears on the bank statement.

If no value is passed for this parameter, it defaults to the Merchant Billing Label.

`batch_id`
: `string` This parameter is populated if the contact was created as part of a bulk upload. For example, `batch_00000000000001`

`failure_reason`
: `string` The reason why the payout has failed (only in case of a failure, else it will return a null value).

`merchant_id`
: `string` This parameter returns the merchant id. For example, `Pup4LDLiA1DssX`

`status_details_id`
: `string` This parameter returns the status id of the payout. For example, `R7aA38hQzg5TDj`

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
  : `string` Reason for the current status. For example, `imps_not_allowed`. [Payout Status Details and Next Steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md).

`created_at`
: `integer` Timestamp, in Unix, when the payout was created. For example, `1545320320`.

`fee_type`
: `string` Indicates the fee type charged for the payout. Possible values is `free_payout`.

### Errors

  
No linked account details found
* code: 400
* description: No linked VPA (UPI) found for the entered mobile number.
* solution: Enter a mobile number which is linked to a VPA.

Account holder name not matching with bank provided name
* code: 400
* description: Account holder name is not matching with the name fetched from the bank.
* solution: `account_holder_name` is optional. Enter this only if you are sure of the name linked to the phone number, as per bank records. System will validate the name only if entered.

Mobile number should be 10-digit long
* code: 400
* description: Entered mobile number is not 10-digit long.
* solution: Enter the correct 10-digit mobile number, without country code.

We are facing trouble fetching account details. Please try again shortly
* code: 500
* description: Server error. Unable to fetch account details from the server.
* solution: This is due to the NPCI mapper API being unresponsive. Retry the request after sometime.
