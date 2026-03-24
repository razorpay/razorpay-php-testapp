---
title: Fetch Contact With ID
description: Fetch Contact with ID using APIs.
---

# Fetch Contact With ID

## Fetch Contact With ID

Use this endpoint to retrieve the details of a specific contact.

@include rzpx/contacts/contact-fetch-id-code

### Parameters

@include rzpx/contacts/contact-path

### Parameters

@include rzpx/contacts/res

### Errors

`` is not a valid id.
* code: 4xx
* description: The contact id entered in the request body is invalid/does not exist.
* solution: Enter the correct Contact ID. You can find the Contact ID: - In the response body of [create a Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/create.md) API.
- On the [RazorpayX Dashboard](http://x.razorpay.com/auth).
