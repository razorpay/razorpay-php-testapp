---
title: Balance Threshold
description: Proactively queue payouts before they fail due to low balance with Balance Threshold on RazorpayX.
---

# Balance Threshold

When you send payouts using the `queue_if_low_balance=true` parameter in the Payout API, payouts can still fail due to minor differences between the balance reflected on RazorpayX and the actual balance at the partner bank. This typically happens when you maintain your account balance close to the minimum required for your payout volume, and payouts are processed rapidly within a short span of time (payouts per minute).

Balance Threshold solves this by proactively queuing payouts before they are sent to the bank, preventing failures caused by these balance discrepancies.

### How Balance Threshold Works

You set a threshold amount (for example, ₹5,00,000) on your RazorpayX account. When a payout is initiated, the system checks if processing it would bring your balance below the threshold. If it would, the payout is queued instead of being sent to the bank.

The system evaluates the following condition for every payout:

If (`Current Balance − Payout Amount`)
