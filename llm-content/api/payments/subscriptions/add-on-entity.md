---
title: Add-ons Entity
description: Know about the Add-ons entity and the associated parameter descriptions.
---

# Add-ons Entity

## Add-on Entity

The Add-ons entity has the following parameters.

### Response

```json: Entity
{
  "entity":"collection",
  "count":2,
  "items":[
    {
      "id":"ao_00000000000002",
      "entity":"addon",
      "item":{
        "id":"item_00000000000002",
        "active":true,
        "name":"Extra sweet",
        "description":"1 extra sweet of the day with meals",
        "amount":90000,
        "unit_amount":90000,
        "currency":"INR",
        "type":"addon",
        "unit":null,
        "tax_inclusive":false,
        "hsn_code":null,
        "sac_code":null,
        "tax_rate":null,
        "tax_id":null,
        "tax_group_id":null,
        "created_at":1581597318,
        "updated_at":1581597318
      },
      "quantity":1,
      "created_at":1581597318,
      "subscription_id":"sub_00000000000001",
      "invoice_id":"inv_00000000000001"
    },
    {
      "id":"ao_00000000000001",
      "entity":"addon",
      "item":{
        "id":"item_00000000000001",
        "active":true,
        "name":"Extra muffin",
        "description":"extra muffin with meals",
        "amount":30000,
        "unit_amount":30000,
        "currency":"INR",
        "type":"addon",
        "unit":null,
        "tax_inclusive":false,
        "hsn_code":null,
        "sac_code":null,
        "tax_rate":null,
        "tax_id":null,
        "tax_group_id":null,
        "created_at":1581597318,
        "updated_at":1581597318
      },
      "quantity":2,
      "created_at":1581597318,
      "subscription_id":"sub_00000000000001",
      "invoice_id":null
    }
  ]
}
```

### Parameters

`id`
: `string` The unique identifier of the created add-on. For example, `ao_00000000000001`.

`item`
: `object` Details of the created add-on.

    `id`
    : `string` The unique identifier of the created item. For example, `item_00000000000001`.

    `active`
    : `boolean` Indicates whether the add-on is active. Here, the value is `true`.

    `name`
    : `string` Name of the add-on. For example, `Extra muffin`.

    `description`
    : `string` Description for the add-on. For example, `extra muffin with meals`.

    `amount`
    : `integer` Amount for the add-on in currency subunit that is to be charged for the Subscription in the next billing cycle. For example, `30000`. In the case of three decimal currencies, such as KWD, BHD and OMR, to refund a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to refund a payment of 295, pass the value as `295`.

      
> **WARN**
>
> 
>       **Watch Out!**
> 
>       As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to refund a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>       

    `currency`
    : `string` The currency in which the customer should be charged for the add-on. For example, `INR`. Know more about [supported currencies](https://razorpay.com/docs/payments/international-payments/#supported-currencies).

      
> **INFO**
>
> 
> 
>       **Handy Tips**
> 
>       Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>       

    `created_at`
    : `integer` The Unix timestamp indicates when the item was created. For example, `1581597318`.

`quantity`
: `integer` This specifies the number of units of the add-on to be charged to the customer. For example, `2`. The total amount is calculated as `amount` * `quantity`.

`created_at`
: `integer` The  Unix timestamp, indicates when the add-on was created. For example, `1581597318`.

`subscription_id`
: `string` The unique identifier of the Subscription to which the add-on is being added. For example, `sub_00000000000001`.

`invoice_id`
: `string` The add-on is added to the next invoice that is generated after it is created. This field is populated only after the invoice is generated. Until then, it is `null`. Once the add-on is linked to an invoice, it cannot be deleted.
