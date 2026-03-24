---
title: Contacts Entity
description: Check the entity code for Contacts APIs.
---

# Contacts Entity

## Contacts Entity

The Contacts Entity has the following parameters: 
 
 

### Response

```json: Entity
{
  "id": "cont_00000000000001",
  "entity": "contact",
  "name": "Gaurav Kumar",
  "contact": "9000090000",
  "email": "gaurav.kumar@example.com",
  "type": "employee",
  "reference_id": "Acme Contact ID 12345",
  "batch_id": null,
  "active": true,
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "created_at": 1545320320
}
```

### Parameters

`id`
: `string` The unique identifier linked to the contact. For example, `cont_00000000000001`.

`entity`
: `string` The entity being created. Here, it is `contact`.

`name`
: `string` The contact's name. For example, `Gaurav Kumar`.

`contact`
: `string` The contact's phone number. For example, `9000090000`.

`email`
: `string` The contact's email address. For example, `gaurav.kumar@example.com`.

`type`
: `string` A classification for the contact being created. For example, `employee`.

`reference_id`
: `string` A user-entered reference for the contact. For example, `Acme Contact ID 12345`.

`batch_id`
: `string` This value is returned if the contact was created as part of a bulk upload. For example, `batch_00000000000001`.

`active`
: `boolean` Possible values:
  - `true` (default) : active
  - `false` : inactive

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` Timestamp, in Unix, when the contact was created. For example, `1545320320`.
