---
title: Fetch a Payout Link With ID
description: Fetch a Payout Links with its ID using the API.
---

# Fetch a Payout Link With ID

## Fetch a Payout Link With ID

Use this endpoint to retrieve the payout details of a Payout Link using its id.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X GET https://api.razorpay.com/v1/payout-links/poutlk_00000000000001?expand[l=payouts
```

### Response

```json: Success
{
  "id": "poutlk_00000000000001",
  "entity": "payout_link",
  "contact_id": "cont_00000000000001",
  "contact": {
    "name": "Gaurav Kumar",
    "contact": "912345678",
    "email": "gaurav.kumar@example.com"
  },
  "fund_account_id": "fa_00000000000001",
  "purpose": "refund",
  "status": "processed",
  "amount": 1000,
  "currency": "INR",
  "description": "Payout link for Gaurav Kumar",
  "attempt_count": 1,
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "short_url": "https://rzp.io/i/3b1Tw6",
  "send_sms": true,
  "send_email": true,
  "cancelled_at": null,
  "created_at": 1545383037,
  "expire_by": 1545384058,
  "expired_at": 1545384658
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier for the Payout Link. For example, `poutlk_00000000000001`.

### Parameters

`id`
: `string` The unique identifier of the Payout Link created. For example, `poutlk_00000000000001`.

`entity`
: `string` The entity created. Here it will be `payout_link`.

`contact`
: `object` Details of the contact to whom the Payout Link is to be sent.

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
: `integer` The amount, in paise, that was transferred from the business account to the contact's fund account. 
 
 The value passed here does not include fees and tax. Fees and tax, if any, would have been deducted from your account balance.

`currency`
: `string` The currency in which the payout was made. Here, it is `INR`.

`description`
: `string` A user-entered description for the Payout Link. For example, `Payout link for Gaurav Kumar`.

`short_url`
: `string` A short link for the Payout Link that was created. This is the link that is shared with the contact.

`created_at`
: `integer` Timestamp, in Unix, when the Payout Link was created.

`contact_id`
: `string` The unique identifier of the contact to whom the Payout Link was sent to. For example, `cont_00000000000001`.

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
 
 This value is returned only when the Payout Link moves to the [`processed` state](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payout-links/life-cycle.md) after the contact receives the amount in their account. 

`cancelled_at`
: `integer` Timestamp, in Unix, if the Payout Link was cancelled by you. This value is returned only when the Payout Link moves to the `cancelled` state.

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
