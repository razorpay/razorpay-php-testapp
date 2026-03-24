---
title: Reject Payouts
description: Reject a payout using API.
---

# Reject Payouts

## Reject a Payout

This endpoint rejects the payout.

If you face errors during the process, refer to our [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/x.md#http-errors) documentation for HTTP, 5xx and other errors.

@include rzpx/payouts/reject-payouts

### Parameters

`id` _mandatory_
: `string` The unique identifier linked to the payout. For example, `pout_00000000000001`.

### Parameters

`remarks` _mandatory_
: `string` This field contains the remarks entered by the approver during the payout approval or rejection.

### Parameters

@include rzpx/payouts/res
