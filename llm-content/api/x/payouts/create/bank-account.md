---
title: Create a Payout to a Bank Account
description: Create a Payout to a Bank Account using APIs.
---

# Create a Payout to a Bank Account

## Create a Payout to a Bank Account

Use this endpoint to create a payout to fund account type `bank_account`.

To understand the status of the payouts, refer to [Payout Status Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout.
> 

@include rzpx/payouts/payout-create-bank

### Parameters

@include rzpx/payouts/payout-create-bank-req

### Parameters

@include rzpx/payouts/res
