---
title: Payment Links | Transfer Payments
heading: Transfer Payments Received Using Payment Links
description: Set up Payment Links to automatically transfer payments to a linked account, saving the need for a separate API call.
---

# Transfer Payments Received Using Payment Links

You can configure your **Payment Links** to automatically transfer payments to a **linked account** once the payment is successfully received. This feature saves you the additional step of making a separate Transfer API call.

Check the [transfer payments received using Payment Links API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/transfer-payments.md).

## Workflow

Follow these steps to transfer payments received using Payment Links to linked accounts.

### Step 1: Create and Onboard Linked Accounts

You need to use **Razorpay Route** to create and onboard linked accounts. You can do this directly from your Dashboard.

> **WARN**
>
> 
> **Watch Out\!**
> 
>   - You cannot create transfers on a Payment Link if the `accept_partial` parameter is enabled. Ensure this parameter is set to `false` and that you do not pass the `first_min_partial_amount` parameter.
>   - Transfers are currently only supported for Payment Links created using `INR`. You cannot create transfers for Payment Links with an international currency.
> 
> 

### Step 2: Transfer Payments

Use the [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/transfer-payments.md) to transfer payments received using Payment Links.
