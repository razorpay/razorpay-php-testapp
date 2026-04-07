---
title: Customer Identifier Status
description: Learn about the different states of the Customer Identifier.
---

# Customer Identifier Status

The Customer Identifier is Active or Closed state in its life cycle.

## Active

When you create a Customer Identifier via [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/create.md) or [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md#create-virtual-account), it is `active` and ready to accept payments.

## Closed

You can close a Customer Identifier using any of the following methods:
- Automatically, by using the `close_by` option at the time of Customer Identifier creation, via [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/create.md) or [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md#create-virtual-account).
- Manually, from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/close.md) or using the [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md#close-a-virtual-account).

Once the account is in the `closed` state, your customers cannot make payments to that closed account.
