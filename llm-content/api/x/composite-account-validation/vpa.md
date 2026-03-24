---
title: Validate a VPA
description: Create Contact, Fund account and validate Fund Account of type VPA via a single API.
---

# Validate a VPA

## Validate a VPA

Use this endpoint to create contact, fund account and validate VPA (UPI) in a single API call. 

@include rzpx/fund-accounts/validation/composite/vpa

### Parameters

`source_account_number` _mandatory_
: `string` The account from which money should be deducted for the account validation transaction.

`fund_account` _mandatory_
: `object` Fund account details to which the payout was made.

    `account_type` _mandatory_
    : `string` The fund account type being created. Here it will be `vpa`.

        `vpa`
        : `object` The contact's virtual payment address (VPA) details.

            `address`
            : `string` The virtual payment address. For example, `gaurav.kumar@exampleupi`.

    `contact` _optional_
    : `object` Contact details to which the payout was made.

        `name` _optional_
        : `string` The contact's name. For example, `Gaurav Kumar`.

        `email` _optional_
        : `string` The contact's email address. For example, `gaurav.kumar@example.com`.

        `contact` _optional_
        : `string` The contact's phone number. For example, `9000090000`.

        `type` _optional_
        : `string` A classification for the contact being created. For example, `employee`.

`notes`_optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`reference_id` _optional_
: `string` A user-generated reference given to the payout. Maximum length is 40 characters. For example, `112233`. You can use this field to store your own transaction ID, if any.

### Parameters

@include rzpx/fund-accounts/composite-account-validation/fetch-all-res
