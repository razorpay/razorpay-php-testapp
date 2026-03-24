---
title: Validate a Bank Account
description: Validate Fund Account of type bank account via API.
---

# Validate a Bank Account

## Validate a Bank Account

Use this endpoint to create a bank account validation transaction. 

@include rzpx/fund-accounts/validation/bank-account

### Parameters

`account_number` _mandatory_
: `string` The account from which money should be deducted for the account validation transaction.
  - Pass your customer identifier if you want money to be deducted from RazorpayX Lite.
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   - This is **not** your contact's bank account number. Log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier**.
>   - This value is different for Test Mode and Live Mode.
>   

`fund_account`_mandatory_
: `object` The fund account id you want to validate.

  `id` _mandatory_
  : `string` The unique identifier linked to a fund account. For example, `fa_00000000000001`.

`amount`_mandatory_
: `integer` The amount, in paise, to be transferred. For example, pass `100` for ₹1. The default value for this parameter is `100`.
 The value passed here does not include fees and tax. Fees and tax, if any, are deducted from your account balance.

`currency`_optional_
: `string` The currency for the transfer. The value has to be `INR`. If no value is passed, it is assumed to be `INR`.

`notes`_optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Parameters

@include rzpx/fund-accounts/validation/vpa/fund-account-vpa-res
