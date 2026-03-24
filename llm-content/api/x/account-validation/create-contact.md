---
title: Create a Contact
description: Create a Contact via API.
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
```

### Parameters

@include rzpx/contacts/contact-create-req

### Parameters

@include rzpx/contacts/res
