---
title: Create a Contact
description: Create a Contact using API.
---

# Create a Contact

## Create a Contact

Use this endpoint to create a new contact.- A new contact is created if any combination of the following details is unique: `name`, `email`, `contact`, `type` and `reference_id`.
- If **all** the above details match the details of an existing contact, the API returns details of the existing contact.

@include rzpx/contacts/contact-create-code

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
