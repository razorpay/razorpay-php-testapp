---
title: Make Payouts to Amazon Pay Wallet Using Composite API
description: Make Payout to wallet via Composite API.
---

# Make Payouts to Amazon Pay Wallet Using Composite API

## Make Payouts to Amazon Pay Wallet Using Composite API

Use this endpoint to create a payout to a Fund Account of type wallet. Know more about [RazorpayX Composite API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-composite.md). 

Composite API gives you the flexibility to either create a new Contact and Fund Account or use the existing Contact and Fund Account details (`contact_id` and `fund_account_id`) to make a payout.

Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout. 

@include rzpx/payouts/composite-amazon-pay-code

### Parameters

@include rzpx/payouts/composite-amazon-pay-req

### Parameters

@include rzpx/payouts/composite-amazon-pay-res
