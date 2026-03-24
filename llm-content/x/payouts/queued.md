---
title: RazorpayX Queued Payouts
heading: Queued Payouts
description: Check about scenarios when payouts are queued and how to cancel a queued payout.
---

# Queued Payouts

When you do not have sufficient balance to process a payout, we queue the payout instead of failing the payout, saving you time and effort.

Payouts that are queued get processed when you add funds to your account. Know more about [adding funds to your RazorpayX account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/account-types/current-account#add-funds.md), whether it is current account or RazorpayX Lite.

> **WARN**
>
> 
> **Watch Out!**
> 
> Any payout in `queued` state for more than 3 months will automatically be `cancelled`/`rejected` by the system.
> 

## Queued Payouts Processing

> **INFO**
>
> 
> **Handy Tips**
> 
> - This feature is available to you by default. You do not need to do anything to enable the feature.
> - A payout is queued only when there is insufficient funds to process the payout. You cannot use this feature to schedule a payout. If you want to schedule your payouts, use [Scheduled payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/scheduled.md).
> 

### Payout Processing - Order

Queued payouts are processed in a first-in-first-out (FIFO) basis. If a payout cannot be processed due to insufficient balance, Razorpay attempts to process the next payout in the queue.

Account Balance | Action | Payout Status
---
₹5,000 | Create 3 payouts:
-  Payout A → ₹6,000

-  Payout B → ₹3,000

-  Payout C → ₹5,000
 | -  Payout A → queued( insufficient balance). Account balance → ₹5,000. 
-  Payout B → processed. Account balance → ₹2,000.
-  Payout C → queued( insufficient balance). Account balance → ₹2,000.

### Payout Life Cycle

Once a payout is queued, it can have the following statuses during its life cycle:

- `queued`
- `processing`
- `processed`
- `reversed`
- `cancelled`
- `failed`

![Payout life cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-queued_payout_life_cycle.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> The `Pending` and `Rejected` states are available only if you have [Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md) enabled on your account.
> 

### Cancel a Queued Payout Using API

You can cancel a queued payout using the [Cancel a Queued Payout API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts/cancel.md).

### Related Information

- [Payout Life Cycle and States](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle.md)
- [Intelligent Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/intelligent-payouts.md)
- [Payouts to Cards](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/cards.md)
- [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
- [Payout Best Practices](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/best-practices.md)
