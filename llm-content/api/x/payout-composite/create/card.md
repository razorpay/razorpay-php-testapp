---
title: Create a Payout to Card Using Composite API
description: Create a Composite Payout using Card using API.
---

# Create a Payout to Card Using Composite API

## Create a Payout to Card Using Composite API

Use this endpoint to create a payout to card using Composite Payout API, without saving the details. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout.
> 

@include rzpx/payouts/composite-card-intro

@include rzpx/payouts/composite-card-code

### Parameters

@include rzpx/payouts/payout-create-card-req

### Parameters

@include rzpx/payouts/composite-res
