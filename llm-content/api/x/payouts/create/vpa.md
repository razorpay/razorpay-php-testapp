---
title: Create a Payout to a VPA
description: Create a Payout to a VPA using API.
---

# Create a Payout to a VPA

## Create a Payout to a VPA

Use this endpoint to create a payout to fund account type `vpa`.

To understand the status of the payouts, refer to [Payout Status Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout.
> 

@include rzpx/payouts/payout-create-vpa

### Parameters

@include rzpx/payouts/payout-create-vpa-req

### Parameters

@include rzpx/payouts/res
