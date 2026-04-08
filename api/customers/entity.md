---
title: Customers Entity
description: Entity parameters and sample code for Customers API.
---

# Customers Entity

The Customers entity has the following parameters:

### Response

```json: Entity
{
  "id": "cust_JbRkXMROZUMCVq",
  "entity": "customer",
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "gstin": null,
  "notes": [],
  "created_at": 1653915355
}
```

### Parameters

`id`
: `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

`name` 
: `string` Customer's name. Alphanumeric, with period (.), apostrophe ('), forward slash (/), at (@) and parentheses allowed. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

`contact`
: `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919876543210`.

`email`
: `string` The customer's email address. A maximum length of 64 characters. For example, `gaurav.kumar@example.com`.

`gstin`
: `string` GST number linked to the customer. For example, `29XAbbA4369J1PA`.

`notes`
: `json object` This is a key-value pair that can be used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` UNIX timestamp, when the customer was created. For example, `1234567890`.
