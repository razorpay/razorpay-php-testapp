---
title: Fetch an Add-on With ID
description: Fetch an Add-on by its unique ID.
---

# Fetch an Add-on With ID

## Fetch an Add-on With ID

Use this endpoint to retrieve an Add-on by its unique identifier.

### Request

### Response

### Parameters

`id` _mandatory_
: `string` The unique identifier of an add-on. For example, `ao_00000000000001`.

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

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
