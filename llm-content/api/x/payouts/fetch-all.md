---
title: Fetch All Payouts
description: Fetch All Payouts using API.
---

# Fetch All Payouts

## Fetch All Payouts

Use this endpoint to retrieve the details of all the available payouts in the system.

To understand the status of the payouts, refer to [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md).

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> We do not recommend using the Fetch Payout API to check the status of the payouts. Instead, we recommend that you subscribe to our [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/x/apis/subscribe.md) to get instant notifications. Whenever the status of your payouts change, you will be notified via these webhooks. 
> 

@include rzpx/payouts/fetch-all-code

### Parameters

@include rzpx/payouts/payout-path-acc
@include rzpx/payouts/payout-fetch-all-query

### Parameters

@include rzpx/payouts/res
