---
title: Vanity Account Numbers
description: Learn how to enable Vanity Accounts for your virtual accounts.
---

# Vanity Account Numbers

> **INFO**
>
> 
> **Enable Vanity Account Numbers**
> 
> To enable Vanity Accounts for your account, contact our [support](https://razorpay.com/support/), with the desired merchant [handle](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/va-vpa-qr/vanity#handle.md).
> 

By default, any virtual account created by you will have a randomly generated numeric bank account number.

However, Razorpay Smart Collect also allows you to create custom bank accounts with vanity account numbers. This means you will be able to create Customer Identifiers that have the account number  `RZRPXXXXYYYYYYYYY`, where the contents of the XY-segment is entirely within your control.

> **INFO**
>
> 
> **Alphanumeric Account Numbers**
> 
> By default, the account numbers generated are always numeric. To use Vanity Accounts, you must set the `receivers.bank_account.numeric` option to 0, and set the `receivers.bank_account.descriptor` option to the desired custom value.
> 

> If `receivers.bank_account.descriptor` is set without setting `receivers.bank_account.numeric` to 0, the request will result in an error: "Descriptor cannot be used for numeric accounts."
> 

The possible options that can be set for the `bank_account` receiver are given below.

Attribute                           | Mandatory/Optional (in request) | Type        | Description
---
`receivers`                         | Mandatory                       | JSON Object | Configuration of desired receivers for the virtual account
---
`receivers.types`                   | Mandatory                       | array       | List of desired receiver types. Currently `bank_account` is the only supported type.
---
`receivers.bank_account.numeric`    | Optional, default: 1            | integer     | Flag to indicate whether a numeric or alphanumeric account is desired.
---
`receivers.bank_account.descriptor` | Optional                        | string      | Alphanumeric string that is to be used for account number generation, only valid if `numeric` is 0.

## Handle

The 5th through the 8th character, X-segment, in the account number (`XXXX` in the above example) is referred to as the merchant handle and can be set on request. This segment is fixed and will then be used in the generation of all your alphanumeric virtual account numbers.

> **WARN**
>
> 
> **Avoid Ambiguous Handles**
> 
> When displaying a virtual account to a customer, the font used may cause the customer to misread the alphanumeric characters (if any) in the account number. The customers may commit typos while entering the beneficiary account during the payment initiation. It is very common to misread the letter 'O' in an account number as the numeral '0'.
> 

> Payments made to such mistyped accounts are considered invalid and are refunded to the customer's account within 1 working day. This could cause inconvenience to customers as they have to wait for 24 hours when large amounts should be refunded.
> 

> For this reason, we strongly recommend not to use the following characters in your handle, as they may appear ambiguous in certain fonts.
> 

> - `0` or `O`
> - `1` or `I`
> - `5` or `S`
> - `8` or `B`
> - `2` or `Z`
> 

## Descriptor

The `descriptor` field defines the last 9 characters of the generated bank account number.

```json:JSON Input
{
  "receiver": {
    "types": [
      "bank_account"
    ],
    "bank_account": {
      "descriptor": "000000001",
      "numeric": 0
    }
  },
  "customer_id": "cust_805c8oBQdBGPwS",
  "description": "Vanity Virtual Account"
}
```json:Output
{
  "id": "va_4xbQrmEoA5WJ0G",
  "entity": "virtual_account",
  "description": "Vanity Virtual Account",
  "customer_id": "cust_805c8oBQdBGPwS",
  "status": "active",
  "amount_paid": 0,
  "receivers": [
    {
      "id": "ba_4lsdkfldlteskf",
      "entity": "bank_account",
      "name": "Merchant Billing Label",
      "account_number": "RZRPABCD000000001",
      "ifsc": "RAZR0000001"
    }
  ],
  "created_at": 1455696638
}
```

Here in this example, a descriptor `000000001` is used to generate an account number, while merchant handle `ABCD` is pre-decided.

> **WARN**
>
> 
> **Descriptor Usage**
> 
> The descriptor can have a maximum length of 9 characters. This is because some banks do not allow the addition of beneficiary accounts that have an account number of more than 17 characters.
> 

> This `descriptor` field can only be used if your merchant handle is set. If it is not set, sending any value in the descriptor field will return an error.
> 

> ```json:Error
> {
>   "error": {
>     "description": "Descriptor field cannot be used as merchant handle is not set for your account.",
>     "code": "BAD_REQUEST_ERROR"
>   }
> }
> ```
> 

> The `descriptor` must be unique for each active virtual account. If a descriptor is sent, which is already in use by another active virtual account, the following error is returned.
> 

> ```json:Error
> {
>   "error": {
>     "description": "An active virtual account with the same descriptor already exists for your account.",
>     "code": "BAD_REQUEST_ERROR"
>   }
> }
> ```
> 

**Note**

If the `descriptor` field is not sent but `numeric` is set to 0, the account number will be a randomly generated alphanumeric string that still uses the merchant handle.
