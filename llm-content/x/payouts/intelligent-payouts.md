---
title: RazorpayX Intelligent Payouts
heading: Intelligent Payouts
description: Find out how Intelligent Payouts reduce the risk of delayed payments via RazorpayX.
---

# Intelligent Payouts

Intelligent Payouts detects downtimes or degradations at Razorpay's partner or beneficiary banks' side and prevents the money from being blocked for T+3 days. Downtimes refer to the time period when payouts underperform, leading to considerable delays in processing. 

Intelligent Payout feature also reduces the chances of payouts being [deemed success](https://razorpay.com/blog/business-banking/payout-processing-imps-upi-transactions-deemed-success-npci/). With this, we aim to streamline online transactions and ensure a smoother payout experience for you.

## How it Works

If the beneficiary or the partner bank experiences downtime after a payout is made, the payout enters a `queued` state.

> **WARN**
>
> 
> **Watch Out!**
> 
> Intelligent payouts is available by default for Current Account users. RazorpayX Lite users must consume `payout.failed` [webhook](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/#payout-failed.md) to enable Intelligent payouts.
> 

- You receive a `payout.queued` webhook event to inform you of the `status_details`.
    - The reason is either `beneficiary_bank_down` or `gateway_degraded`.
- If the issue is resolved within the defined SLA, the payout is `processed`.
- If the issue is not resolved within the defined SLA, the payout is moved to the `failed` state and you receive `payout.failed` webhook event.
- You can choose to `cancel` payouts in `queued` state from the RazorpayX Dashboard or via API.

Know more about [Payout States and Life Cycle](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle.md).

Entity | Default SLA | Supported Modes | Supported Account Type
---
Beneficiary Bank/ NPCI| 15 minutes | IMPS & NEFT | Current Account & RazorpayX Lite
---
Partner Bank | 60 minutes | IMPS, NEFT, RTGS & UPI | Current Account
---

You can customise the SLA by contacting our [Support Team](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support#razorpayx-users.md).

### Related Information

- [Queued Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/queued.md)
- [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
- [Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md)
