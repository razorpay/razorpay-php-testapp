---
title: Create a Contact
description: Create a Contact via API.
---

# Create a Contact

## Create a Contact

Use this endpoint to create a Contact using the Contact details of the Amazon Pay wallet holder.

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
```

 

### Parameters

@include rzpx/contacts/contact-create-req

### Parameters

@include rzpx/contacts/res

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
