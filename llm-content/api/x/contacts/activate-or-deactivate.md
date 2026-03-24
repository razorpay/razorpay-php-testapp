---
title: Activate or Deactivate a Contact
description: Activate or Deactivate a Contact using APIs.
---

# Activate or Deactivate a Contact

## Activate or Deactivate a Contact

Use this endpoint to activate or deactivate a contact. This helps you block payouts to certain contacts, as and when required.

@include rzpx/contacts/contact-acti-code

### Parameters

@include rzpx/contacts/contact-path

### Parameters

@include rzpx/contacts/contact-acti-req

### Parameters

@include rzpx/contacts/res

### Errors

`` is not a valid id.
* code: 4xx
* description: The contact id entered in the request body is invalid/does not exist.
* solution: Enter the correct Contact ID. You can find the Contact ID: - In the response body of [create a Contact](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/contacts/create.md) API.
- On the [RazorpayX Dashboard.](http://x.razorpay.com/auth)
