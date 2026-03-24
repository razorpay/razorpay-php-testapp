---
title: All Webhook Events
description: List of all Payments, Partners and Payouts webhook events.
---

# All Webhook Events

Given below is the complete list of webhook events for [Payments](#payments-webhooks), [Partners](#partners-oauth-webhooks) and [Payouts](#payouts-webhooks).

Concept/Product | Webhook Event | Description
---
Orders | [order.paid](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/orders/#order-paid.md) | Triggered when an order is successfully paid.
---
Payments ^^^ | [payment.authorized](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payments/#payment-authorized.md) | Triggered when a payment is authorised.
---
 | [payment.captured](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payments/#payment-captured.md) | Triggered when a payment is successfully captured.
---
 | [payment.failed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payments/#payment-failed.md) | Triggered when a payment fails.
---
Payment Downtime ^^^ | [payment.downtime.started](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payments/#payment-downtime-started.md) | Triggered at the beginning of the downtime.
---
 | [payment.downtime.resolved](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payments/#payment-downtime-resolved.md) | Triggered when a downtime is resolved.
---
 | [payment.downtime.updated](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payments/#payment-downtime-updated.md) | Triggered when a downtime is updated.
---
Refunds ^^^^ | [refund.created](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/refunds/#refund-created.md) | Triggered when a refund is created.
---
 | [refund.processed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/refunds/#refund-processed.md) | Triggered when the refund is successfully processed.
---
 | [refund.failed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/refunds/#refund-failed.md) | Triggered when we are not able to process a refund.
---
 | [refund.speed_changed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/refunds/#refund-speed-changed.md) | Triggered when the refund speed is changed.
---
Disputes ^^^^^^ | [payment.dispute.created](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/disputes/#payment-dispute-created.md) | Triggered when a dispute is raised by the customer's issuing bank against a payment.
---
 | [payment.dispute.won](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/disputes/#payment-dispute-won.md) | Triggered when you win a dispute against a payment.
---
 | [payment.dispute.lost](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/disputes/#payment-dispute-lost.md) | Triggered when you lose a dispute against a payment.
---
 | [payment.dispute.closed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/disputes/#payment-dispute-closed.md) | Triggered when a dispute is closed.
---
 | [payment.dispute.under_review](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/disputes/#payment-dispute-under-review.md) | Triggered when you contest a dispute and submit the evidence for review.
---
 | [payment.dispute.action_required](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/disputes/#payment-dispute-action-required.md) | Triggered when the evidence submitted is insufficient, unreadable or does not correspond to the contested amount. Please update/add evidences before contesting the dispute again.
---
Invoices ^^^ | [invoice.partially_paid](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/invoices/#invoice-partially-paid.md) | Triggered when a partial payment is made against an invoice.
---
 | [invoice.paid](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/invoices/#invoice-paid.md) | Triggered when an invoice is successfully paid.
---
 | [invoice.expired](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/invoices/#invoice-expired.md) | Triggered when an invoice expires.
---
Subscriptions ^^^^^^^^^^ | [subscription.authenticated](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/subscriptions/#subscription-authenticated.md) | Sent when the first payment is made on the subscription. This can either be the authorisation amount, the upfront amount, the plan amount or a combination of the plan amount and the upfront amount.
---
 | [subscription.activated](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/subscriptions/#subscription-activated.md) | Sent when the subscription moves to the active state either from the authenticated, pending or halted state. If a Subscription moves to the active state from the pending or halted state, only the subsequent invoices that are generated are charged. Existing invoices that were already generated are not charged.
---
 | [subscription.charged](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/subscriptions/#subscription-charged.md) | Sent every time a successful charge is made on the subscription.
---
 | [subscription.completed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/subscriptions/#subscription-completed.md) | Sent when all the invoices are generated for a subscription and the subscription moves to the completed state.
---
 | [subscription.updated](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/subscriptions/#subscription-updated.md) | Sent when a subscription is successfully updated. There is no state change when a subscription is updated.
---
 | [subscription.pending](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/subscriptions/#subscription-pending.md) | Sent when the subscription moves to the pending state. This happens when a charge on the card fails. We try to charge the card on a periodic basis while it is in the pending state. If the payment fails again, the Webhook is triggered again.
---
 | [subscription.halted](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/subscriptions/#subscription-halted.md) | Sent when all retries have been exhausted and the subscription moves from the pending state to the halted state. The customer has to manually retry the charge or change the card linked to the subscription, for the subscription to move back to the active state.
---
 | [subscription.cancelled](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/subscriptions/#subscription-cancelled.md) | Sent when a subscription is cancelled and moved to the cancelled state.
---
 | [subscription.paused](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/subscriptions/#subscription-paused.md) | Sent when a subscription is paused and moved to the paused state.
---
 | [subscription.resumed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/subscriptions/#subscription-resumed.md) | Sent when a subscription is resumed and moved to the resumed state.
---
Route (Transfers) ^^ | [transfer.processed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/route/#transfer-processed.md) | Triggered when a transfer made to a Linked Account is processed.
---
 | [transfer.failed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/route/#transfer-failed.md) | Triggered when a transfer made to a Linked Account is failed.
---
Settlements | [settlement.processed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/route/#settlement-processed.md) | Triggered when a settlement is successfully processed to your bank account.
---
Route (Linked Accounts) ^^^ | [product.route.under_review](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/route/#product-route-under-review.md) | Triggered when the Linked account is in the process of being verified by Razorpay.
---
 | [product.route.needs_clarification](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/route/#product-route-needs-clarification.md) | Triggered when verification of the Linked account has failed, reasons are also included in the data object.
---
 | [product.route.activated](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/route/#product-route-activated.md) | Triggered when a Linked account has been verified successfully and is activated.
---
QR Codes ^^^ | [qr_code.created](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/qr-codes/#qr-code-created.md) | Triggered when a QR code is created.
---
 | [qr_code.credited](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/qr-codes/#qr-code-credited.md) | Triggered when a payment is made using a QR code.
---
 | [qr_code.closed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/qr-codes/#qr-code-closed.md) | Triggered when a QR code is closed.
---
Virtual Accounts ^^^ | [virtual_account.created](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/smart-collect/#virtual-account-created.md) | Triggered when a virtual account is created.
---
 | [virtual_account.credited](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/smart-collect/#virtual-account-credited.md) | Triggered when a payment is made to a virtual account.
---
 | [virtual_account.closed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/smart-collect/#virtual-account-closed.md) | Triggered when a virtual account expires on a date set by you or is manually closed by you.
---
Payment Links ^^^^ | [payment_link.paid](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payment-links/#payment-link-paid.md) | Triggered when a Payment Link is paid.
---
 | [payment_link.partially_paid](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payment-links/#payment-link-partially-paid.md) | Triggered when a partial payment is made on a Standard Payment Link.
---
 | [payment_link.cancelled](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payment-links/#payment-link-cancelled.md) | Triggered when a Payment Link is cancelled by you.
---
 | [payment_link.expired](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payment-links/#payment-link-expired.md) | Triggered when a Payment Link expires.
---
Partners OAuth | [account.app.authorization_revoked](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/oauth/#account-app-authorization-revoked.md) | Triggered when the sub-merchant revokes access to the partner application.
---
Payouts ^^^^^^^^ | [payout.pending](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts/#payout-pending.md) | Triggered whenever a payout moves to the pending state. The payout remains in this state till you approve or reject it.
---
 | [payout.rejected](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts/#payout-rejected.md) | Triggered whenever a payout moves to the rejected state. The payout was rejected by someone from your team.
---
 | [payout.queued](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts/#payout-queued.md) | Triggered whenever a payout moves to the queued state. - Payout goes to queued state when you do not have sufficient funds to process it or when the beneficiary bank/NPCI/partner bank is down. This event is applicable only for RazorpayX Lite.
- You will receive the reason for the payout to be in the queued state as part of the status_details object.

---
 | [payout.initiated](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts/#payout-initiated.md) | Triggered when the payout moves to the processing state when the payout is created or from the queued state when sufficient funds are available to process the payout.
---
 | [payout.processed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts/#payout-processed.md) | Triggered when a payout moves to the processed state. This happens when the payout is processed by the contact's bank.
---
 | [payout.updated](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts/#payout-updated.md) | Triggered whenever there is a change in the payout entity. For example, when we receive the UTR for the payout from the bank.- For NEFT transactions, this webhook is fired within 90 seconds.
- For IMPS and UPI transactions, this webhook is generally fired immediately.

---
 | [payout.reversed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts/#payout-reversed.md) | Triggered whenever a payout fails and the amount is returned to your business account.
---
 | [payout.failed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts/#payout-failed.md) | Triggered when a payout is failed because the beneficiary bank OR NPCI OR processing partner bank is down. If the beneficiary bank/partner bank/NPCI does not recover within the stipulated SLA, a FAILED event will be sent with the respective reason.
---
Payout Downtime ^^ | [payout.downtime.started](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts/#payout-downtime-started.md) | Triggered when a payout downtime starts. Do not initiate a payout if this is triggered since the beneficiary bank is down and the payout will fail.
---
 | [payout.downtime.resolved](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts/#payout-downtime-resolved.md) | Triggered when a payout downtime is resolved. Make payouts once this webhook is triggered as it indicates that the beneficiary bank downtime is resolved.
---
Fund Account Validation ^^ | [fund_account.validation.completed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/account-validation/#fund-account-validation-completed.md) | Triggered whenever an account validation transaction is completed.
---
 | [fund_account.validation.failed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/account-validation/#fund-account-validation-failed.md) | Triggered whenever an account validation transaction fails.
---
Payout Links ^^^^^^^^ | [payout_link.pending](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payout-links/#payout-link-pending.md) | Triggered whenever a payout link moves to the pending state. This indicates that the payout link has been created. Applicable only for cases where approval workflow is set.
---
 | [payout_link.issued](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payout-links/#payout-link-issued.md) | Triggered whenever a payout link moves to the issued state. This indicates that the payout link has been created.
---
 | [payout_link.processing](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payout-links/#payout-link-processing.md) | Triggered whenever a payout link moves to the processing state. This indicates that your contact has entered their fund account details and the payout is being processed.
---
 | [payout_link.processed](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payout-links/#payout-link-processed.md) | Triggered whenever a payout link moves to the processed state. This indicates that the payout has been successfully made.
---
 | [payout_link.attempted](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payout-links/#payout-link-attempted.md) | Triggered whenever the underlying payout has reversed and another attempt is required on the payout link.
---
 | [payout_link.cancelled](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payout-links/#payout-link-cancelled.md) | Triggered whenever a payout link moves to the cancelled state. This indicates that you have cancelled the payout link.
---
 | [payout_link.rejected](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payout-links/#payout-link-rejected.md) | Triggered whenever a payout link moves to the rejected state. This indicates that the Approver has rejected the payout link. Applicable only for cases where approval workflow is set.
---
 | [payout_link.expired](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payout-links/#payout-link-expired.md) | Triggered whenever a payout link moves to the expired state. This indicates that the payout link has expired.
---
Transactions | [transaction.created](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/transactions/#transaction-created.md) | Triggered whenever you: - Make a Payout (RazorpayX Lite).
- Add funds to your RazorpayX account (RazorpayX Lite).
