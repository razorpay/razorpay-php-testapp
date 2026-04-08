---
title: Fetch All Contacts
description: Fetch all Contacts using API.
---

# Fetch All Contacts

## Fetch All Contacts

Use this endpoint to retrieve the details of all contacts.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/contacts
```

### Response

```json: Success
{
"entity": "collection",
"count": 1,
"items": [
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
 ]
}
```json: Failure
{
  "error": {
      "code": "BAD_REQUEST_ERROR",
      "description": "The name field is required.",
      "source": "business",
      "step": null,
      "reason": "input_validation_failed",
      "metadata": {},
      "field": "name"
  }
}
```

### Parameters

`name` _optional_
: `string` Name by which results should be filtered. For example, `Gaurav`.

`email` _optional_
: `string` Email address by which results should be filtered. For example, `gaurav.kumar@example.com`.

`contact` _optional_
: `string` Phone number by which results should be filtered. For example, `9000090000`.

`reference_id` _optional_
: `string` The user-generated reference by which results should be filtered. For example, `Acme Contact ID 12345`. Maximum length is 40 characters.

`active` _optional_
: `boolean` The state by which results should be filtered. Possible values:
  - `1`: active
  - `0`: inactive

`type` _optional_
: `string` The classification by which results should be filtered. Possible values:
  - `vendor`
  - `customer`
  - `employee`
  - `self`

`from` _optional_
: `integer` Timestamp, in Unix, from when contacts are to be retrieved.

`to` _optional_
: `integer` Timestamp, in Unix, till when contacts are to be retrieved.

`count` _optional_
: `integer` The number of contacts to be retrieved. Default = `10`. Maximum = `100`. This can be used for pagination, in combination with `skip`.

`skip` _optional_
: `integer` The number of contacts to be skipped. Default = `0`. This can be used for pagination, in combination with `count`.

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

The `name` field is required.
* code: 4xx
* description: The `name` field is missing in the request body.
* solution: Enter the details in the recommended format as per the request body.
 
The `name` field is invalid.
* code: 4xx
* description: There are special characters used in the `name` field.
* solution: Enter details as per the format recommended for Create a Contact request for `name` field.

Invalid type: `contact_typeA`
* code: 4xx
* description: - There are special characters in the `type` field.
- Casing does not match as per the `type`. `type` is case-sensitive.
- Contact type sent in the request does not match the types present in the Dashboard.

* solution: Enter the correct contact type in the request body. You cannot create new contact types via API. You must create them via the [RazorpayX Dashboard](http://x.razorpay.com/auth).
