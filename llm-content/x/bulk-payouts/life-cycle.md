---
title: RazorpayX Bulk Payouts Life Cycle
heading: Bulk Payouts Life Cycle
description: Check the statuses that Payouts follow when they are made using the Bulk Upload feature.
---

# Bulk Payouts Life Cycle

A payout created using the Bulk Upload feature can have the following statuses during its life cycle:

- `pending`
- `scheduled`
- `processing`
- `processed`
- `reversed`
- `cancelled`
- `rejected`
- `failed`

![bulk payout life cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/RZPX-scheduled_payout_life_cycle.jpg.md)

Know more about [payout life cycle and statuses](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts/states-life-cycle.md).

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - Payouts created using the Bulk Upload feature are not queued. In case of insufficient balance, the payouts will fail.
> - The `pending` and `rejected` statuses are available only if you have [Approval Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams/approval-workflow.md) enabled on your account.
> 

### Related Information

- [About Bulk Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts.md)
- [Bulk Upload Status](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts/uploads.md)
- [Bulk Upload Report](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/bulk-payouts/report.md)
