---
title: Customer Identifier Status
description: Learn about the different states of the Customer Identifier.
---

# Customer Identifier Status

The Customer Identifier is Active or Closed state in its life cycle.

## Active

When you create a Customer Identifier via [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/create.md) or [API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect#create-virtual-account.md), it is `active` and ready to accept payments.

## Closed

You can close a Customer Identifier using any of the following methods:
- Automatically, by using the `close_by` option at the time of Customer Identifier creation, via [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/create.md) or [API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect#create-virtual-account.md).
- Manually, from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/close.md) or using the [API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect#close-a-virtual-account.md).

Once the account is in the `closed` state, your customers cannot make payments to that closed account.
