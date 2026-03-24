---
title: Create a Fund Account of Type VPA
description: Create a Fund Account with VPA details using APIs.
---

# Create a Fund Account of Type VPA

## Create a Fund Account of Type VPA

Use this endpoint to create a fund account with VPA details.- A new fund account is created if any combination of the following details is unique: `contact_id` and `vpa.address`.
- If **all** the above details match the details of an existing fund account, the API returns details of the existing fund account.
- You cannot edit the details of a fund account.

@include rzpx/fund-accounts/create-vpa-code

### Parameters

@include rzpx/fund-accounts/fund-account-create-vpa-req

### Parameters

@include rzpx/fund-accounts/validation/vpa/fund-account-vpa-res

### Errors

The contact ID provided does not exist.
* code: 4xx
* description: The contact id provided is incorrect.
* solution: Enter the correct Contact ID. Check if this contact already exists in your RazorpayX account using [Fetch Contact id API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/fetch-with-id.md) or use the [search option](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/global-search.md) on the Dashboard. Or find the Contact ID: - In the response body of [create a Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/create.md) API.
- On the [Contacts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md) Dashboard.
