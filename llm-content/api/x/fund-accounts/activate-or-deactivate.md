---
title: Activate or Deactivate a Fund Account
description: Activate or Deactivate a Fund Account using API.
---

# Activate or Deactivate a Fund Account

## Activate or Deactivate a Fund Account

Use this endpoint to activate or deactivate a fund account. This helps you block payouts to certain fund accounts, as and when required.

@include rzpx/fund-accounts/acti-code

### Parameters

@include rzpx/fund-accounts/fund-account-path

### Parameters

@include rzpx/fund-accounts/fund-account-acti-req

### Parameters

@include rzpx/fund-accounts/validation/vpa/fund-account-vpa-res

### Errors

`` is not a valid id.
* code: 4xx
* description: The fund account ID entered is invalid.
* solution: Re-check or find the Fund Account ID: - In the response body of [create a Fund Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/fund-accounts.md) API.
- On the [Contacts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/contacts.md) Dashboard.
