---
title: Cancel a Queued Payout
description: Cancel a Queued Payout using API.
---

# Cancel a Queued Payout

## Cancel a Queued Payout

Use this endpoint to cancel a queued payout, without saving the details. You can only cancel payouts that are in the `queued` state. It is not possible to cancel payouts that have any other status.

To understand the status of the payouts, refer to [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md).

@include rzpx/payouts/cancel-code

### Parameters

@include rzpx/payouts/payout-path-pid

### Parameters

@include rzpx/payouts/res
