---
title: Create a Contact
description: Create a Contact using API.
---

# Create a Contact

## Create a Contact

Use this endpoint to create a new contact.- A new contact is created if any combination of the following details is unique: `name`, `email`, `contact`, `type` and `reference_id`.
- If **all** the above details match the details of an existing contact, the API returns details of the existing contact.

### Request

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/contacts \
-H "Content-Type: application/json" \
-d '{
  "name":"Gaurav Kumar",
  "email":"gaurav.kumar@example.com",
  "contact":"9000090000",
  "type":"employee",
  "reference_id":"Acme Contact ID 12345",
  "notes":{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
}'
```

### Response

```json: Success
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
```json: Failure
{
  "error": {
      "code": "BAD_REQUEST_ERROR",
      "description": "Invalid type: employee",
      "source": "business",
      "step": null,
      "reason": "input_validation_failed",
      "metadata": {},
      "field": "type"
  }
}
```

### Parameters

`name`_mandatory_
: `string` The contact's name. This field is case-sensitive. A minimum of 3 characters and a maximum of 50 characters are allowed. Name cannot end with a special character, except `.`. Supported characters: `a-z`, `A-Z`, `0-9`, `space`, `’` , `-` , `_` , `/` , `(` , `)` and , `.`. For example, `Gaurav Kumar`.

`email`_optional_
: `string` The contact's email address. For example, `gaurav.kumar@example.com`.

`contact`_optional_
: `string` The contact's phone number. For example, `9000090000`.

`type`_optional_
: `string` Maximum 40 characters. Classification for the contact being created. For example, `employee`. The following classifications are available by default:
  - `vendor`
  - `customer`
  - `employee`
  - `self`
  

  Additional classifications can be created via the [Dashboard](https://x.razorpay.com/) and then used in APIs. It is not possible to create new classifications via API.

`reference_id`_optional_
: `string` Maximum 40 characters. A user-entered reference for the contact. For example, `Acme Contact ID 12345`.

`notes`_optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

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
