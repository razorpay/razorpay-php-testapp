---
title: Custom Account Numbers
---

# Custom Account Numbers

> **INFO**
>
> 
> **Enabling Custom Account Numbers**
> 
> To enable Custom Accounts for your account, contact our [Support Team](https://razorpay.com/support) for any queries.
> 

By default, any Customer Identifier created by you will have randomly generated numeric bank account number.

However, Razorpay Smart Collect also allows you to create custom bank accounts with customizable account numbers. This means you will be able to create Customer Identifiers that have the account number  `XXXXXXXXYYYYYYYY`, where the X-segment remains static, but the content of the Y-segment is within your control.

The possible options that can be set for the `bank_account` receiver are given below.

Attribute                           | Mandatory/Optional (in request) | Type        | Description
---
`receivers`                         | Mandatory                       | JSON Object | Configuration of desired receivers for the Customer Identifier
---
`receivers.types`                   | Mandatory                       | array       | List of desired receiver types. Currently `bank_account` is the only supported type.
---
`receivers.bank_account.numeric`    | Optional, default: 1            | integer     | Flag to indicate whether a numeric or alphanumeric account is desired.
---
`receivers.bank_account.descriptor` | Optional                        | string      | String that is to be used for account number generation. If not sent, a random 8-digit descriptor will be used.
---

## Prefix

The first 8 characters in your account number will remain fixed for all your generated account numbers, eg. `22233344`. This is ordinarily set to a completely numeric value for your account, but an alphanumeric value can also be set upon request, eg. `RAZORPXY`.

## Descriptor

The `descriptor` field can be used to define the last eight characters of the generated bank account number.

```json:JSON Input
{
  "receivers": {
    "types": [
      "bank_account"
    ],
    "bank_account": {
      "descriptor": "00000001"
    }
  },
  "customer_id": "cust_805c8oBQdBGPwS",
  "description": "Custom Virtual Account"
}
```json:Output
{
  "id": "va_4xbQrmEoA5WJ0G",
  "entity": "virtual_account",
  "description": "Custom Virtual Account",
  "customer_id": "cust_805c8oBQdBGPwS",
  "status": "active",
  "amount_paid": 0,
  "receivers": [
    {
      "id": "ba_4lsdkfldlteskf",
      "entity": "bank_account",
      "name": "Merchant Billing Label",
      "account_number": "2223334400000001",
      "ifsc": "RAZR0000001"
    }
  ],
  "created_at": 1455696638
}
```

Here in this example, a descriptor `00000001` is being used to generate an account number, while prefix `22233344` is pre-decided.

> **WARN**
>
> 
> **Descriptor Usage**
> 
> The descriptor can have a maximum length of upto 8 characters. This is because some banks do not allow addition of beneficiary accounts that have an account number longer than 16 characters.
> 
> This `descriptor` field can only be used if custom Customer Identifiers are enabled for your account. If it is not set, sending any value in the descriptor field will return an error.
> 
> ```json:Error
> {
>   "error": {
>     "description": "Descriptor cannot be used with your account.",
>     "code": "BAD_REQUEST_ERROR"
>   }
> }
> ```
> 
> The `descriptor` is required to be unique amongst your active Customer Identifiers. If a descriptor is sent, which is already in use by another active Customer Identifier, the following error is returned.
> 
> ```json:Error
> {
>   "error": {
>     "description": "An active Customer Identifier with the same descriptor already exists for your account.",
>     "code": "BAD_REQUEST_ERROR"
>   }
> }
> ```
> 

> **WARN**
>
> 
> **Avoiding Ambiguous Account Numbers**
> 
> When displaying a bank account number to a customer, the font used may cause the customer to misread the alphanumeric characters (if any) in the number. This means customers are very liable to committing typos when required to enter the beneficiary account while initiating a payment. Misreading the letter 'O' in an account number as the numeral '0', for example, is extremely common.
> 
> Payments made to such mistyped accounts are considered invalid, and are refunded back to the customer's account within 1 working day. However, this is still a huge inconvenience for the customer, who now has to wait 24 hours to receive a refund for what is often a rather large payment.
> 
> For this reason, we strongly advice against using the following characters in your descriptor for alphanumeric accounts, as they may appear ambiguous in certain fonts.
> 
> - `0` or `O`
> - `1` or `I`
> - `5` or `S`
> - `8` or `B`
> - `2` or `Z`
>
