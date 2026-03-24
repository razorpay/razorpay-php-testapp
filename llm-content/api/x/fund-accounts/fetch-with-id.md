---
title: Fetch a Fund Account With ID
description: Fetch a Fund Account with ID using API.
---

# Fetch a Fund Account With ID

## Fetch a Fund Account With ID

Use this endpoint to retrieve a fund account with id.

@include rzpx/fund-accounts/fund-account-fetch-id

### Parameters

@include rzpx/fund-accounts/fund-account-path

### Parameters

@include rzpx/fund-accounts/validation/vpa/fund-account-vpa-res

### Errors

`` is not a valid id.
* code: 4xx
* description: The fund account ID entered is invalid.
* solution: Re-check or find the Fund Account ID: - In the response body of [create a Fund Account](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/fund-accounts.md) API.
- On the [Contacts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md) Dashboard.
