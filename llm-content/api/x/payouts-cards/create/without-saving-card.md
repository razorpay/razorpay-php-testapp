---
title: Create a Payout Without Saving Card
description: Create a Payout without Saving Card using API.
---

# Create a Payout Without Saving Card

## Create a Payout Without Saving Card

Use this endpoint to create a payout to fund account type `card` without saving the card. 

To understand the status of the payouts, refer to [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you [allowlist IPs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout. 
> 

@include rzpx/payouts/composite-card-code

### Parameters

@include rzpx/payouts/payout-create-card-req

### Parameters

@include rzpx/payouts/payout-create-card-res
