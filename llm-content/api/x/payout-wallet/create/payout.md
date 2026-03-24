---
title: Create a Payout to Amazon Pay Wallet
description: Create a Payout to wallet via API.
---

# Create a Payout to Amazon Pay Wallet

## Create a Payout to Amazon Pay Wallet

Use this endpoint to create a payout to a wallet. You cannot enter a custom narration when creating a payout via Amazon Pay. Know more about [RazorpayX Payout API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payouts.md).

Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout. 

@include rzpx/payouts/payout-create-amazon-pay

### Parameters

@include rzpx/payouts/payout-create-amazon-pay-req

### Parameters

@include rzpx/payouts/payout-create-amazon-pay-res
