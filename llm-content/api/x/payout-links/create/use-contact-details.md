---
title: Create Payout Links Using Contact Details
description: Create Payout Links via API using recipient's contact details.
---

# Create Payout Links Using Contact Details

## Create Payout Links Using Contact Details

Use this endpoint to create a Payout Link using customer's contact details such as email id or mobile number. You can choose to send the Payout Link to either contact details. Know more about [Payout Links](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links.md).

### Request

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payout-links \
-H "Content-Type: application/json" \
-d '{
  "account_number": "7878780080857996",
  "contact": {
    "name": "Gaurav Kumar",
    "contact": "912345678",
    "email": "gaurav.kumar@example.com",
    "type": "customer"
  }, // Only applicable when you have the contact details of the recipient. 
  "amount": 1000,
  "currency": "INR",
  "purpose": "refund",
  "description": "Payout link for Gaurav Kumar",
  "receipt": "Receipt No. 1",
  "send_sms": true,
  "send_email": true,
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "expire_by": 1545384058 // This parameter can be used only if you have enabled the expiry feature for Payout Links.
}'
```

### Response

```json: Success
{
  "id": "poutlk_00000000000001",
  "entity": "payout_link",
  "contact": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "912345678"
  },
  
  "purpose": "refund",
  "status": "issued",
  "amount": 1000,
  "currency": "INR",
  "description": "Payout link for Gaurav Kumar",
  "short_url": "https://rzp.io/i/3b1Tw6",
  "created_at": 1545383037,
  "contact_id": "cont_00000000000001",
  "send_sms": true,
  "send_email": true,
  "fund_account_id": null,
  "cancelled_at": null,
  "attempt_count": 0,
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "expire_by": 1545384058,
  "expired_at": 1545384658
}
```

### Parameters

`account_number`_mandatory_
: `string` The account from which you want to make the payout.
Account details can be found on the [RazorpayX Dashboard](https://x.razorpay.com/settings/banking). For example, `7878780080316316`.
  - Pass your customer identifier if you want money to be deducted from RazorpayX Lite.
  - Pass your current account number if you want money to be deducted from your current account.
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   - This is **NOT** your contact's bank account number. Log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier**.
>   - This value is different for Test Mode and Live Mode.
>   

`contact`_mandatory_
: `object` Details of the contact to whom the Payout Link is to be sent. Do not pass the `id` parameter.

    `name`_mandatory_
    : `string`

**Use this only if you are not using the `id` parameter.**

The contact's name. This field is case-sensitive. A minimum of 3 characters and a maximum of 50 characters are allowed. Name cannot end with a special character, except `.`. Supported characters: `a-z`, `A-Z`, `0-9`, `space`, `’` , `-` , `_` , `/` , `(` , `)` and , `.`. For example, `Gaurav Kumar`.For example, `Gaurav Kumar`.

    `contact`_either_
    : `string` Use this only if you are not using the `id` parameter. The contact's phone number. For example, `9000090000`.

    `email`_either contact or email mandatory if id is not used_
    : `string` Use this only if you are not using the `id` parameter. The contact's email address. For example, `gaurav.kumar@example.com`.

    `type`_optional_
    : `string` Use this only if you are not using the `id` parameter. Classification for the contact being created. For example, `employee`.

The following classifications are available by default:
        - `vendor`
        - `customer`
        - `employee`
        - `self`

        
        Additional classifications can be created via the [Dashboard](https://x.razorpay.com/) and then used in APIs. It is not possible to create new classifications via the API.

`amount`_mandatory_
: `integer` The amount, in paise, to be transferred from the business account to the contact's fund account. For example, pass `1000000` to transfer an amount of ₹10,000. The minimum value that can be passed is `100`. 
 
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`_mandatory_
: `string` The currency in which the payout is being made. Here, it is `INR`.

`purpose`_mandatory_
: `string` The purpose of the payout that is being created via the Payout Link. For example, `refund`.

Classifications available by default:
  - `refund`
  - `cashback`
  - `payout`
  - `salary`
  - `utility bill`
  - `vendor bill`

  
  Additional purposes for payouts can be created via the [Dashboard](https://x.razorpay.com/) and then used in the API. You cannot create new payout purposes via the API.

`description`_mandatory_
: `string` Add a description to communicate the context of the Payout Link to the recipient. For example, `Cashback for Mr. Gaurav Kumar on the purchase on Earl Grey Tea`.

`receipt`_optional_
: `string` A user-entered receipt number for the payout. For example, `Receipt No. 1`.

`send_sms`_optional_
: `boolean` Possible values:
  - `true`: Razorpay sends the Payout Link to the provided contact number via SMS.
  - `false` (default): You send the Payout Link to the contact via SMS.

`send_email`_optional_
: `boolean` Possible values:
  - `true`: Razorpay sends the Payout Link to the provided email address via email.
  - `false` (default): You send the Payout Link to the contact via email.

`notes`_optional_
: `object` User-entered notes for internal reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Beam me up Scotty”`.

`expire_by`_optional_
: `integer` Timestamp, in Unix, when the Payout Link was to expire. This is set at the time of creation of the Payout Link and is set at least 15 minutes ahead of the current time. 
 
 This value is returned only if you have enabled expiry feature for Payout Links. Know more about how to [set expiry](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/set-expiry.md) to Payout Links.

### Parameters

`id`
: `string` The unique identifier of the Payout Link that is created. For example, `poutlk_00000000000001`.

`entity`
: `string` The entity being created. Here it will be `payout_link`.

`contact`
: `object` Details of the contact to whom the Payout Link is to be sent.

  `name`
  : `string` The contact's name. For example, `Gaurav Kumar`.

  `type`
  : `string` Classification of the contact being created. For example, `employee`.

  `contact`
  : `string` The contact's phone number. For example, `9000090000`.

  `email`
  : `string` The contact's email address. For example, `gaurav.kumar@example.com`.

`purpose`
: `string` The purpose of the payout. For example, `refund`, `cashback` or `payout`.

`status`
: `string` The Payout Link status. Possible values:
  - `pending`
  - `issued`
  - `processing`
  - `processed`
  - `cancelled`
  - `rejected`
 
 
 Refer to the [Payout Link Life Cycle section](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md) for more details.

`amount`
: `integer` The amount, in paise, to be transferred from the business account to the contact's fund account. 
 
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`
: `string` The currency in which the payout is being made. Here, it is `INR`.

`description`
: `string` A user-entered description for the Payout Link. For example, `Payout link for Gaurav Kumar`.

`short_url`
: `string` A short link for the Payout Link that was created. This is the link that is shared with the contact.

`created_at`
: `integer` Timestamp, in Unix, when the Payout Link was created.

`contact_id`
: `string` The unique identifier of the contact to whom the Payout Link has to be sent. For example, `cont_00000000000001`.

`send_sms`
: `boolean` Possible values:
  - `true`: SMS sent to the provided contact number.
  - `false`: SMS could not be sent to the provided contact number. This could be because the contact number provided was wrong.

`send_email`
: `boolean` Possible values:
  - `true`: Email sent to the provided email address.
  - `false`: Email could not be sent to the provided email address. This could be because the email address provided was wrong.

`fund_account_id` _when the contact provides their account details_
: `string` The unique identifier of the contact's fund account to which the payout will be made. For example, `fa_00000000000001`. 
 
 Fund Account id is returned only when the Payout Link moves to the [`processing` state](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md).

`payout_id` _only if the contact receives the amount in their account_
: `string` The unique identifier for the payout made to the contact. For example, `pout_00000000000001`. 
 
 This value is returned only when the Payout Link moves to the [`processed` state](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md). 

`cancelled_at`
: `integer` Timestamp, in Unix, when the Payout Link was cancelled by you. This value is returned only when the Payout Link moves to the `cancelled` state.

`attempt_count`
: `integer` The number of attempts to complete the payout. For example, `0`.

`receipt`
: `string` A user-entered receipt number for the payout. For example, `Receipt No. 1`.

`notes`
: `object` User-entered notes for internal reference. This is a key-value pair. For example, `"note_key": "Beam me up Scotty”`.

`expire_by`
: `integer` Timestamp, in Unix, when the Payout Link was to expire. This is set at the time of creation of the Payout Link and is set at least 15 minutes ahead of the current time. 
 
 This value is returned only if you have enabled the expiry feature for Payout Links. Know how to [set expiry](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/set-expiry.md) to Payout Links.

`expired_at`
: `integer` Timestamp, in Unix, when the Payout Link expired. This is set at the time of creation of the Payout Link.
