---
title: Validate a Bank Account
description: Create Contact, Fund account and Validate Fund Account of type bank account via a single API.
---

# Validate a Bank Account

## Validate a Bank Account

Use this endpoint to create contact, fund account and validate the bank account in a single API call. 

@include rzpx/fund-accounts/validation/composite/bank-account

### Parameters

`source_account_number` _mandatory_
: `string` The account from which money should be deducted for the account validation transaction.

`validation_type` _optional_
: `string` The chosen type of validation. Possible values: - `pennydrop`: Razorpay will make a transaction for validation.
- `penniless`: Razorpay will validate the account without a transaction.
- `optimized` (default): Razorpay will decide whether the validation requires a transaction or not.

`fund_account` _mandatory_
: `object` Fund account details to which the payout was made.

    `account_type` _mandatory_
    : `string` The fund account type being created. Here it will be `bank_account`.

        `bank_account` _mandatory_
        : `object` The contact's bank account details.

            `name` _optional_
            : `string` Account holder's name. For example,`Gaurav Kumar`.

            `ifsc` _mandatory_
            : `string` Beneficiary bank IFSC. For example, `HDFC0000053`.

            `account_number` _mandatory_
            : `string` Beneficiary account number. For example, `765432123456789`.

`contact` _mandatory_
: `object` Contact details to which the payout was made.

    `name` _mandatory_
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
