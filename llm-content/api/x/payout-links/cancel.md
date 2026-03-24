---
title: Cancel a Payout Link
description: Cancel a Payout Link via API.
---

# Cancel a Payout Link

## Cancel a Payout Link

Use this endpoint to cancel a Payout Link. You can only cancel Payout Links in the `issued` state. Know more about the [Payout Link Life Cycle section](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md).

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X POST https://api.razorpay.com/v1/payout-links/poutlk_00000000000003/cancel
```

### Response

```json: Success
{
  "id": "poutlk_00000000000001",
  "entity": "payout_link",
  "contact_id": "cont_00000000000001",
  "contact": {
    "name": "Gaurav Kumar",
    "type": "customer",
    "contact": "912345678",
    "email": "gaurav.kumar@example.com"
  },
  "fund_account_id": null,
  "payout_id": null,
  "purpose": "refund",
  "status": "cancelled",
  "amount": 1000,
  "currency": "INR",
  "description": "Payout Link for Gaurav Kumar",
  "attempt_count": 0,
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "short_url": "https://rzp.io/i/3b1Tw6",
  "send_sms": true,
  "send_email": true,
  "cancelled_at": 1596122334, // 
  "created_at": 1545383037,
  "expire_by": 1545384058, //This value is returned only if you have enabled and set expiry for Payout Links.
  "expired_at": 1545384658 //This value is returned only if you have enabled and set expiry for Payout Links.
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier for the Payout Link you want to cancel. For example, `poutlk_00000000000003`.

### Parameters

`id`
: `string` The unique identifier of the Payout Link that was created. For example, `poutlk_00000000000001`.

`entity`
: `string` The entity created. Here it will be `payout_link`.

`contact`
: `object` Details of the contact to whom the Payout Link was to be sent.

  `name`
  : `string` The contact's name. For example, `Gaurav Kumar`.

  `type`
  : `string` Classification of the contact created. For example, `employee`.

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
: `integer` The amount, in paise, that was to be transferred from the business account to the contact's fund account. 
 
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`
: `string` The currency in which the payout was to be made. Here, it is `INR`.

`description`
: `string` A user-entered description for the Payout Link. For example, `Payout Link for Gaurav Kumar`.

`short_url`
: `string` A short link for the Payout Link that was created. This is the link shared with the contact.

`created_at`
: `integer` Timestamp, in Unix, when the Payout Link was created.

`contact_id`
: `string` The unique identifier of the contact to whom the Payout Link was sent. For example, `cont_00000000000001`.

`send_sms`
: `boolean` Possible values:
  - `true`: SMS sent to the provided contact number.
  - `false`: SMS could not be sent to the provided contact number. This could be because the contact number provided was wrong.

`send_email`
: `boolean` Possible values:
  - `true`: Email sent to the provided email address.
  - `false`: Email could not be sent to the provided email address. This could be because the email address provided was wrong.

`fund_account_id`
: `string` The unique identifier of the contact's fund account to which the payout will be made. For example, `fa_00000000000001`. 
 
 Fund Account id is returned only when the Payout Link moves to the [`processing` state](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md) after the contact provides their account details.

`payout_id`
: `string` The unique identifier for the payout made to the contact. For example, `pout_00000000000001`. 
 
 This value is returned only when the Payout Link moves to the [`processed` state](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md) after the contact would receive the amount in their account.

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
