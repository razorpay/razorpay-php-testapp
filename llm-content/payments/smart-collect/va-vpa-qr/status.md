---
title: Virtual Account Status
description: Learn about the different states of the virtual account.
---

# Virtual Account Status

The virtual account is Active or Closed state in its life cycle.

## Active

When you create a virtual account via [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/dashboard/create.md) or [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/create.md), it is `active` and ready to accept payments.

## Closed

You can close a virtual account using any of the following methods:
- Automatically, by using the `close_by` option at the time of virtual account creation, via [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/dashboard/create.md) or [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/create.md).
- Manually, from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/dashboard/close.md) or using the [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/close.md).

Once the account is in the `closed` state, your customers cannot make payments to that closed account.
