---
title: Settlements Entity
description: Know about the settlements entity parameters and their descriptions.
---

# Settlements Entity

The Settlements entity has the following parameters:

### Response

```json: Entity
{
  "id":"setl_7IZKKI4Pnt2kEe",
  "entity":"settlement",
  "amount":50000,
  "status":"processed",
  "fees":0,
  "tax":0,
  "utr":"1597813219e1pq6w",
  "created_at":1509622307
}
```

### Parameters

`id`
: `string` The unique identifier of the settlement transaction. For example, `setl_7IZKKI4Pnt2kEe`

`entity`
: `string` Indicates the type of entity. Here, it is `settlement`.

`amount`
: `integer` The amount to be settled (in the smallest unit of currency). For example,  will be `50000`.

`status`
: `string` Indicates the [state of the settlement](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements.md#settlement-states). Possible values:
  - `created`
  - `processed`
  - `failed`

`fees`
: `integer` This is the total fee charged for processing all payments received from customers settled to you in this settlement transaction. In case of a normal settlement the fee charge will be `0`.

`tax`
: `integer` The total tax, in currency subunits, charged on the fees collected to process all payments received from customers settled to you in this settlement transaction. In case of a normal settlement the tax charge will be `0`.

`utr`
: `string` The Unique Transaction Reference (UTR) number available across banks, which can be used to track a particular settlement in your bank account. For example, `1597813219e1pq6w`.

`created_at`
: `integer` Unix timestamp at which the settlement transaction was created.
