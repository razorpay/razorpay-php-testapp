---
title: Create an Add-on
description: Create an Add-on using the Razorpay API.
---

# Create an Add-on

## Create an Add-on

Use this endpoint to create an add-on.

### Request

### Response

### Parameters

`id` _mandatory_
: `string` The Subscription id to which the add-on is being added.

### Parameters

.

    `description` _optional_
    : `string` Description for the add-on. For example, `1 extra oil fried appala with meals`.

`quantity` _optional_
: `integer` This specifies the number of units of the add-on to be charged to the customer. For example, `2`. Defaults to `1`. The total amount is calculated as `amount` * `quantity`.

### Parameters

`id`
: `string` The unique identifier of the created add-on. For example, `ao_00000000000001`.

`quantity`
: `integer` This specifies the number of units of the add-on to be charged to the customer. For example, `2`. The total amount is calculated as `amount` * `quantity`.

`created_at`
: `integer` The timestamp, in Unix format, when the add-on was created. For example, `1581597318`.

`subscription_id`
: `string` The unique identifier of the subscription to which the add-on is being added. For example, `sub_00000000000001`.

`invoice_id`
: `string` The add-on is added to the **next** invoice that is generated after the add-on is created. This field is populated only after the invoice is generated. Until then, it is `null`. Once the add-on is linked to an invoice, it cannot be deleted.

### Errors

Add-ons can't be added for Subscriptions when payment mode is upi
* code: 400
* description: This error occurs when you are trying to create add-ons for a Subscription authorised via UPI.
* solution: You cannot create add-ons for a Subscription authorized via UPI. Currently, add-ons are only available for Subscription authorised using cards.
