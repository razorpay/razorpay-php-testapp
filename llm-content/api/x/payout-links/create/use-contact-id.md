---
title: Create Payout Links Using Contact ID
description: Create Payout Links via API using RazorpayX Contact id.
---

# Create Payout Links Using Contact ID

## Create Payout Links Using Contact ID

Use this endpoint to create a Payout Link using the Contact id of the recipient. [Create a Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts/#create-a-contact.md) to generate the Contact id/Customer id.

### Request

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payout-links \
-H "Content-Type: application/json" \
-d '{
  "account_number": "7878780080857996",
  "contact": {
    "id": "cont_00000000000001"
  }, // Only applicable when you have the bank account details of the recipient saved as a RazorpayX Contact. 
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
: `object` Details of the contact to whom the Payout Link is to be sent.

    `id`_mandatory_
    : `string` The unique identifer for the contact. For example, `cont_00000000000001`. 
 
 If you are using this, do not use the other parameters in the array.

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
 
 This value is returned only if you have enabled the expiry feature for Payout Links. Know how to [set expiry](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/set-expiry.md) to Payout Links.

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

`contact_id`
: `string` The unique identifier of the contact to whom the Payout Link has to be sent. For example, `cont_00000000000001`.

`fund_account_id` _only if contact provides their account details_
: `string` The unique identifier of the contact's fund account to which the payout will be made. For example, `fa_00000000000001`. 
 
 Fund Account id is returned only when the Payout Link moves to the [`processing` state](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md).

`payout_id` _only if the contact receives the amount in their account_
: `string` The unique identifier for the payout made to the contact. For example, `pout_00000000000001`. 
 
 This value is returned only when the Payout Link moves to the [`processed` state](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md).

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

`attempt_count`
: `integer` The number of attempts to complete the payout.

`receipt`
: `string` A user-entered receipt number for the payout. For example, `Receipt No. 1`.

`notes`
: `object` User-entered notes for internal reference. This is a key-value pair. For example, `"note_key": "Beam me up Scotty”`.

`short_url`
: `string` A short link for the Payout Link that was created. This is the link that is shared with the contact.

`send_sms`
: `boolean` Possible values:
  - `true`: SMS sent to the provided contact number.
  - `false`: SMS could not be sent to the provided contact number. This could be because the contact number provided was wrong.

`send_email`
: `boolean` Possible values:
  - `true`: Email sent to the provided email address.
  - `false`: Email could not be sent to the provided email address. This could be because the email address provided was wrong.

`created_at`
: `integer` Timestamp, in Unix, when the Payout Link was created.

`cancelled_at`
: `integer` Timestamp, in Unix, when the Payout Link was cancelled by you. This value is returned only when the Payout Link moves to the `cancelled` state.

`expire_by`
: `integer` Timestamp, in Unix, when the Payout Link was to expire. This is set at the time of creation of the Payout Link and is set at least 15 minutes ahead of the current time. 
 
 This value is returned only if you have enabled the expiry feature for Payout Links. Know more about how to [set expiry](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/set-expiry.md) to Payout Links.

`expired_at`
: `integer` Timestamp, in Unix, when the Payout Link expired. This is set at the time of creation of the Payout Link.
