---
title: Create a Payout to Card with Razorpay TokenHQ
description: Create a Payout to Card with Razorpay TokenHQ using API.
---

# Create a Payout to Card with Razorpay TokenHQ

## Create a Payout to Card with Razorpay TokenHQ

Use this endpoint to create a payout to fund account type `card` by saving the card with [Razorpay TokenHQ](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/razorpay-requestor-with-network-tokens.md).

To understand the status of the payouts, refer to [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you [allowlist IPs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout. 
> 

@include rzpx/payouts/create-card-tokenhq-code

### Parameters

@include rzpx/payouts/create-card-tokenhq-req

### Parameters

@include rzpx/payouts/payout-create-card-res
