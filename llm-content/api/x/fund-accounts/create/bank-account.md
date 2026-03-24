---
title: Create a Fund Account of Type Bank Account
description: Create a Fund Account with Bank Account details using APIs.
---

# Create a Fund Account of Type Bank Account

## Create a Fund Account of Type Bank Account

Use this endpoint to create a fund account with bank account details.- A new fund account is created if any combination of the following details is unique: `contact_id`, `bank_account.name`, `bank_account.ifsc` and `bank_account.account_number`.
- If **all** the above details match the details of an existing fund account, the API returns details of the existing fund account.
- You cannot edit the details of a fund account.

@include rzpx/fund-accounts/create-bank-account-code

### Parameters

@include rzpx/fund-accounts/fund-account-create-bank-req

### Parameters

@include rzpx/fund-accounts/validation/vpa/fund-account-vpa-res

### Errors

The contact id provided does not exist.
* code: 4xx
* description: The contact ID provided is incorrect.
* solution: Enter the correct Contact ID. Check if this contact already exists in your RazorpayX account using [Fetch Contact id API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/fetch-with-id.md) or use the [search option](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/global-search.md) on the Dashboard. Or find the Contact ID: - In the response body of [create a Contact](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/contacts/create.md) API.
- On the [Contacts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md) Dashboard.

The IFSC must be 11 characters.
* code: 4xx
* description: The IFSC code provided is either incorrect or does not have 11 characters.
* solution: Check and pass the correct 11 characters IFSC.

The account number format is invalid.
* code: 4xx
* description: The account number is incorrect.
* solution: Enter the beneficiary account number between 5 and 35 characters. Supported characters- a-z, A-Z, and 0-9.
