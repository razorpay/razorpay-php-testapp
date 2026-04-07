---
title: Items Entity
description: Entity parameters and sample code for Items API.
---

# Items Entity

The Items entity has the following parameters:

### Response

```json: Entity
{
  "id": "item_JInaSLODeDUQiQ",
  "active": true,
  "name": "Book / English August",
  "description": "An Indian story, Booker prize winner.",
  "amount": 20000,
  "unit_amount": 20000,
  "currency": "",
  "type": "invoice",
  "unit": null,
  "tax_inclusive": false,
  "hsn_code": null,
  "sac_code": null,
  "tax_rate": null,
  "tax_id": null,
  "tax_group_id": null,
  "created_at": 1649843796
}
```

### Parameters

`id`
: `string` The unique identifier of the item.

`active`
: `boolean` Indicates the status of the item. Possible values:
  - `true` (default): Item is in the active state.
  - `false`: Item is in the inactive state.

`name`
: `string` The name of the item.

`description`
: `string` A text description about the item.

`amount` _mandatory_
: `integer` The price of the item. In the case of three decimal currencies, such as KWD, BHD and OMR, to refund a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to refund a payment of 295, pass the value as `295`.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to refund a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`currency` _mandatory_
: `string` The currency in which the amount should be charged. Check the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

`unit_amount`
: `integer` The per unit billing amount for each individual unit.

`type`
: `string` Here, it must be `invoice`.

`unit`
: `integer` The number of units of the item billed in the invoice.

`tax_inclusive`
: `boolean` Indicates whether the base amount includes tax.
  - `true`: The base amount includes tax.
  - `false`: The base amount does not include tax. By default, the value is set to `false`.

`hsn_code`
: `integer` The 8-digit code used to classify the product as per the Harmonised System of Nomenclature.

`sac_code`
: `integer` The 6-digit code used to classify the service as per the Services Accounting Code.

`tax_rate`
: `string` The percentage at which an individual or a corporation is taxed.

`tax_id`
: `string` The identification number that gets displayed on invoices issued to the customer.

`tax_group_id`
: `string` The identification number for the tax group. A tax group is a collection of taxes that can be applied as a single set of rules. 

`created_at`
: `integer` Unix timestamp, at which the item was created. For example, `1649843796`.
