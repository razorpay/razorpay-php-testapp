---
title: Fetch All Fund Accounts
description: Fetch all Fund Accounts using API.
---

# Fetch All Fund Accounts

## Fetch All Fund Accounts

Use this endpoint to retrieve all fund accounts.

@include rzpx/fund-accounts/fetch-all-code

### Parameters

@include rzpx/fund-accounts/fund-account-fetch-all-query

### Parameters

@include rzpx/fund-accounts/validation/vpa/fund-account-vpa-res

### Errors

`` is not a valid id.
* code: 4xx
* description: The fund account ID entered is invalid.
* solution: Re-check or find the Fund Account ID: - In the response body of [create a Fund Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/fund-accounts.md) API.
- On the [RazorpayX Dashboard](https://x.razorpay.com/auth).
