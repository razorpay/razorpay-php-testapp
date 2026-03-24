---
title: Fetch Contact With ID
description: Fetch Contact with ID using APIs.
---

# Fetch Contact With ID

## Fetch Contact With ID

Use this endpoint to retrieve the details of a specific contact.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/contacts/cont_00000000000001
```

### Response

```json: Success
{
  "id": "cont_00000000000001",
  "entity": "contact",
  "name": "Gaurav Kumar",
  "contact": "9000090000",
  "email": "gaurav.kumar@example.com",
  "type": "self",
  "reference_id": "Acme Contact ID 12345",
  "batch_id": null,
  "active": true,
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "created_at": 1545322986
}
```json: Failure
{
  "error": {
      "code": "BAD_REQUEST_ERROR",
      "description": "cont_00000000000001 is not a valid id.",
      "source": "business",
      "step": null,
      "reason": "input_validation_failed",
      "metadata": {},
      "field": "id"
  }
}
```

### Parameters

`id`_mandatory_
: `string` The unique identifier linked to the contact. For example, `cont_00000000000001`.

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

### Errors

`` is not a valid id.
* code: 4xx
* description: The contact id entered in the request body is invalid/does not exist.
* solution: Enter the correct Contact ID. You can find the Contact ID: - In the response body of [create a Contact](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/contacts/create.md) API.
- On the [RazorpayX Dashboard](http://x.razorpay.com/auth).
