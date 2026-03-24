---
title: Fetch All Account Validation Transactions
description: Retrieve all account validations transactions via API.
---

# Fetch All Account Validation Transactions

## Fetch All Account Validation Transactions

Use this endpoint to retrieve the details of all Fund Account Validation transactions you have made. 

@include rzpx/fund-accounts/validation/composite/fetch-all

### Parameters

`account_number`_mandatory_
: `string` The account that was used to debit money for validation transaction. 
Account details can be found on the RazorpayX Dashboard. For example, `7878780080316316`. 
     - Pass your Customer Identifier (RazorpayX Lite number) if money was deducted from RazorpayX Lite.
     - Pass your Current Account number if money was deducted from your Current Account.
     - This is an alphanumeric or numeric value.

     
> **WARN**
>
> 
>        **Watch Out!**
> 
>       - Log in to your [**RazorpayX Dashboard**](https://x.razorpay.com/auth/?intent=current_account) and go to **My Account & Settings → Banking → Customer Identifier**.
>       - This value is different for Test Mode and Live Mode.
>      

`from`_optional_
: `integer` Timestamp in Unix from when you want to fetch payouts.

`to`_optional_
: `integer` Timestamp in Unix till when you want to fetch payouts.

`count`_optional_
: `integer` Number of payouts to be retrieved. Default value is `10`. Maximum value is `100`. This can be used for pagination, in combination with `skip`.

`skip`_optional_
: `integer` Number of payouts to be skipped. Default value is `0`. This can be used for pagination, in combination with `count`.

### Parameters

@include rzpx/fund-accounts/composite-account-validation/fetch-all-res
