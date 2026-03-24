---
title: Create a Payout to Externally Tokenised Card
description: Create a Payout by saving an external Tokenised Card using API.
---

# Create a Payout to Externally Tokenised Card

## Create a Payout to Externally Tokenised Card

Use this endpoint to create a payout to fund account type `card` by saving the card as an external token.

To understand the status of the payouts, refer to [Payout Status Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x/payout-status-details.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout. 
> 

@include rzpx/payouts/create-card-external-token-code

### Parameters

@include rzpx/payouts/create-card-external-token-req

### Parameters

@include rzpx/payouts/payout-create-card-res
