---
title: RazorpayX Payout States and Life Cycle
heading: Payout States and Life Cycle
description: Explore the various states of processing a payout. Know more about its life cycle.
---

# Payout States and Life Cycle

[Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts.md) are made to [Contacts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md). A payout has various states in its life cycle.

## Payout Life Cycle

The following flow illustrates the various states in the payout life cycle:

![Payouts Life Cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/rzpx-payouts-life-cycle-modified.jpg.md)

## Payout States

Following are the various payout states:

- `pending`
- `queued`
- `scheduled`
- `processing`
- `processed`
- `reversed`
- `cancelled`
- `rejected`
- `failed`

> **INFO**
>
> 
> **Handy Tips**
> 
> For more information on the complete Payout States and the Status Response Code, refer [Payout Status Details.](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
> 
> Get automatic notifcations about the payout states using [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md). [Set up and configure webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/x/apis/subscribe.md) to improve process efficiency, and stay updated on the status of the payout.
> 
> 

### Pending

If you have the [Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md) feature enabled on your account, the payout moves to the `pending` state if the payout requires approval as per the Approval Workflow. 

At this stage, the payout details are stored in the system, but no processing is done either by Razorpay or the Contact's bank.

> **INFO**
>
> 
> **Handy Tips**
> 
> - The payout needs to be approved/rejected by the required user(s). Any payout in `pending` state for more than 3 months will automatically be `rejected`.
> - The `Pending` and `Rejected` states are available only if you have [Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md) enabled on your account.
> 
> 

From the `pending` state, payouts can either move to the:
- `queued` state if you do not have sufficient balance to process the payout.
- `scheduled` state if you have scheduled the payout.
- `processing` state if you have sufficient balance to process the payout.
- `rejected` state if you reject the payout or if you did not approve the payout before the scheduled date and time.

### Queued

@include rzpx/payouts/payout-states/queued

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> The `scheduled` state does not apply to Queued Payouts. Know more about [Queued Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/queued.md).
> 

### Scheduled

The payout remains in the `scheduled` state until the scheduled date and time. At this stage, the payout details are stored in the system, but no processing is done either by Razorpay or the Contact's bank.

From the `scheduled` state, payouts can either move to the:
- `processing` state when the scheduled time is reached.
- `cancelled` state if you cancel the payout.
- `failed` state if you do not have sufficient balance to process the payout.

> **INFO**
>
> 
> **Handy Tips**
> 
> The `queued` state does not apply to Scheduled Payouts. Know more about [Scheduled Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/scheduled.md).
> 

### Processing

A payout can acquire the `processing` state in one of the three ways:

- From the `pending` state, when you approve the payout and you have sufficient balance to process the payout.
- From the `queued` state, when you add sufficient funds to your account to process the payout.
- Immediately, when a payout is created if you do not have the Queued Payouts or Approval Workflow feature enabled on your account.

At this stage, either Razorpay or the Contact's bank process the payout. No further action is required by you while a payout is in the `processing` state.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - IMPS and UPI payouts can remain in the [`processing` state for T+3 working days.](#deemed-success) 
> - You can check status details of a payout to know why it is in the `processing` state. It maybe due to:
>     - [Deemed Success](https://razorpay.com/blog/business-banking/payout-processing-imps-upi-transactions-deemed-success-npci/)
>     - NEFT/RTGS off hours
>     - Partner bank or beneficiary bank issues
>     - Other bank or server issues
> You can use this information to keep your beneficiaries informed.
> 
> 1. [Status Details via API](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
> 2. [Status Details via Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/status-details.md)
> 3. You can subscribe to daily reports to receive a detailed document on the status, reason for status and SLA for the payouts in `processing state`. [Raise a support ticket](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md) from the Dashboard, with a list of recipient email IDs. We will enable the function for you in 3 working days.
> 
> 

From `processing` state, payouts can either move to the:
- `processed` state if the payout is successful.
- `reversed` state if the payout fails.

#### Deemed Success

IMPS and UPI Payouts can be in the processing state for up to T+3 working days. NPCI marks these payouts as [deemed success/deemed approved](https://razorpay.com/blog/business-banking/payout-processing-imps-upi-transactions-deemed-success-npci/). 

Below is how a payout is processed from when you authorise it to when you receive the terminal payout state (`processed`/`failed`/`reversed`).

![payout transaction flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/RZPX-payout-npci.jpg.md)

- If NPCI is successfully able to credit money to your beneficiary account, it returns a success status to the partner bank who in turn returns it to us and we mark the payout as `processed`.
- If NPCI is not able to credit money to your beneficiary account, it returns a failed status to the partner bank, who passes the status to us and we mark the payout as `reversed`.

Sometimes, there are technical errors when trying to credit the payout to the beneficiary account. When this happens, it is not possible to be certain if the payout was credited to the beneficiary. 

In such cases, NPCI moves the payout to an intermediate state ([deemed success](https://razorpay.com/blog/business-banking/payout-processing-imps-upi-transactions-deemed-success-npci/)). From this state, the payout can go to the `processed`, `failed` or `reversed` state.

When we receive the deemed success from NPCI, we do not move the payout to a terminal state. We do this to avoid returning a false positive state to you. Instead, we keep the payout in the `processing` state till we receive the final status from the partner bank.

After NPCI and beneficiary bank reconcile the deemed success transactions, we receive the final status from the partner bank. Only then do we move the payout to the terminal state (`processed`/`failed`/`reversed`). This takes T+3 working days.

### Processed

@include rzpx/payouts/payout-states/processed

### Reversed

@include rzpx/payouts/payout-states/reversed

> **WARN**
>
> 
> **Watch Out!**
> 
> A transaction can also move from `failed` to `reversed` status in certain situations. When a transaction fails but money is debited from the account, the status changes to `reversed` only after the money is credited back. Until then, the status remains as `failed`. 
> 
> 
> 

### Rejected

A payout in the `pending` state moves to the `rejected` state when:

- You manually reject the payout.
- You do not approve it before the scheduled date and time.

No further action is possible on a payout at this state.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> The `Pending` and `Rejected` states are available only if you have [Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md) enabled on your account.
> 

### Cancelled

A payout moves to the `cancelled` state when you manually cancel a payout in the:

- `queued` state. You can cancel a payout in the `queued` state either from the [Dashboard](https://x.razorpay.com/) or using our [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts/cancel.md).
- `scheduled` state. You can cancel a payout in the `scheduled` state from the [Dashboard](https://x.razorpay.com/).

A payout that is cancelled acquires the `cancelled` state. No further action is possible on a payout at this state.

### Failed

The payout failed status is applicable in both cases when you're making payouts using your current account balance or your RazorpayX Lite balance.

- Payouts in the `processing` state move to the `failed` state when they are failed by our current account partner bank.
- Payouts in the `scheduled` state move to the `failed` state if you do not have sufficient balance to process them.

This is a terminal state for a payout. No further action is possible on a payout at this state.

## Reversal Transaction

A reversal transaction is created whenever a payout fails. 

A payout may fail at Razorpay, at the contact's bank or elsewhere. In some rare scenarios, failure might happen a few days after the payout is moved to the `processed` state.

As soon as Razorpay detects a failure, we create a reversal transaction and credit the payout amount (including the fees and tax) to your business account. The original payout transaction status is changed to `reversed`.

Anytime a payout fails, a webhook is triggered to notify of the failure. A payout failure event is accompanied by a reversal transaction.

You can view a list of reversed transactions from the [RazorpayX Dashboard](https://x.razorpay.com/).

### Related Information

- [Queued Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/queued.md)
- [Scheduled Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/scheduled.md)
- [Intelligent Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/intelligent-payouts.md)
- [Payouts to Cards](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/cards.md)
- [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
- [Payout Best Practices](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/best-practices.md)
