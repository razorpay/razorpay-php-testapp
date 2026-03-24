---
title: All Webhook Events
description: List of all Payments, Partners and Payouts webhook events.
---

# All Webhook Events

Given below is the complete list of webhook events for [Payments](#payments-webhooks), [Partners](#partners-oauth-webhooks) and [Payouts](#payouts-webhooks).

Concept/Product | Webhook Event | Description
---
Orders | [order.paid](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/orders.md#order-paid) | Triggered when an order is successfully paid.
---
Payments ^^^ | [payment.authorized](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payment-authorized) | Triggered when a payment is authorised.
---
 | [payment.captured](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payment-captured) | Triggered when a payment is successfully captured.
---
 | [payment.failed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payment-failed) | Triggered when a payment fails.
---
Payment Downtime ^^^ | [payment.downtime.started](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payment-downtime-started) | Triggered at the beginning of the downtime.
---
 | [payment.downtime.resolved](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payment-downtime-resolved) | Triggered when a downtime is resolved.
---
 | [payment.downtime.updated](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payments.md#payment-downtime-updated) | Triggered when a downtime is updated.
---
Refunds ^^^^ | [refund.created](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/refunds.md#refund-created) | Triggered when a refund is created.
---
 | [refund.processed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/refunds.md#refund-processed) | Triggered when the refund is successfully processed.
---
 | [refund.failed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/refunds.md#refund-failed) | Triggered when we are not able to process a refund.
---
 | [refund.speed_changed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/refunds.md#refund-speed-changed) | Triggered when the refund speed is changed.
---
Disputes ^^^^^^ | [payment.dispute.created](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/disputes.md#payment-dispute-created) | Triggered when a dispute is raised by the customer's issuing bank against a payment.
---
 | [payment.dispute.won](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/disputes.md#payment-dispute-won) | Triggered when you win a dispute against a payment.
---
 | [payment.dispute.lost](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/disputes.md#payment-dispute-lost) | Triggered when you lose a dispute against a payment.
---
 | [payment.dispute.closed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/disputes.md#payment-dispute-closed) | Triggered when a dispute is closed.
---
 | [payment.dispute.under_review](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/disputes.md#payment-dispute-under-review) | Triggered when you contest a dispute and submit the evidence for review.
---
 | [payment.dispute.action_required](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/disputes.md#payment-dispute-action-required) | Triggered when the evidence submitted is insufficient, unreadable or does not correspond to the contested amount. Please update/add evidences before contesting the dispute again.
---
Invoices ^^^ | [invoice.partially_paid](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/invoices.md#invoice-partially-paid) | Triggered when a partial payment is made against an invoice.
---
 | [invoice.paid](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/invoices.md#invoice-paid) | Triggered when an invoice is successfully paid.
---
 | [invoice.expired](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/invoices.md#invoice-expired) | Triggered when an invoice expires.
---
Subscriptions ^^^^^^^^^^ | [subscription.authenticated](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-authenticated) | Sent when the first payment is made on the subscription. This can either be the authorisation amount, the upfront amount, the plan amount or a combination of the plan amount and the upfront amount.
---
 | [subscription.activated](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-activated) | Sent when the subscription moves to the active state either from the authenticated, pending or halted state. If a Subscription moves to the active state from the pending or halted state, only the subsequent invoices that are generated are charged. Existing invoices that were already generated are not charged.
---
 | [subscription.charged](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-charged) | Sent every time a successful charge is made on the subscription.
---
 | [subscription.completed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-completed) | Sent when all the invoices are generated for a subscription and the subscription moves to the completed state.
---
 | [subscription.updated](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-updated) | Sent when a subscription is successfully updated. There is no state change when a subscription is updated.
---
 | [subscription.pending](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-pending) | Sent when the subscription moves to the pending state. This happens when a charge on the card fails. We try to charge the card on a periodic basis while it is in the pending state. If the payment fails again, the Webhook is triggered again.
---
 | [subscription.halted](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-halted) | Sent when all retries have been exhausted and the subscription moves from the pending state to the halted state. The customer has to manually retry the charge or change the card linked to the subscription, for the subscription to move back to the active state.
---
 | [subscription.cancelled](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-cancelled) | Sent when a subscription is cancelled and moved to the cancelled state.
---
 | [subscription.paused](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-paused) | Sent when a subscription is paused and moved to the paused state.
---
 | [subscription.resumed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-resumed) | Sent when a subscription is resumed and moved to the resumed state.
---
Route (Transfers) ^^ | [transfer.processed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/route.md#transfer-processed) | Triggered when a transfer made to a Linked Account is processed.
---
 | [transfer.failed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/route.md#transfer-failed) | Triggered when a transfer made to a Linked Account is failed.
---
Settlements | [settlement.processed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/route.md#settlement-processed) | Triggered when a settlement is successfully processed to your bank account.
---
Route (Linked Accounts) ^^^ | [product.route.under_review](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/route.md#product-route-under-review) | Triggered when the Linked account is in the process of being verified by Razorpay.
---
 | [product.route.needs_clarification](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/route.md#product-route-needs-clarification) | Triggered when verification of the Linked account has failed, reasons are also included in the data object.
---
 | [product.route.activated](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/route.md#product-route-activated) | Triggered when a Linked account has been verified successfully and is activated.
---
QR Codes ^^^ | [qr_code.created](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/qr-codes.md#qr-code-created) | Triggered when a QR code is created.
---
 | [qr_code.credited](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/qr-codes.md#qr-code-credited) | Triggered when a payment is made using a QR code.
---
 | [qr_code.closed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/qr-codes.md#qr-code-closed) | Triggered when a QR code is closed.
---
Virtual Accounts ^^^ | [virtual_account.created](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/smart-collect.md#virtual-account-created) | Triggered when a virtual account is created.
---
 | [virtual_account.credited](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/smart-collect.md#virtual-account-credited) | Triggered when a payment is made to a virtual account.
---
 | [virtual_account.closed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/smart-collect.md#virtual-account-closed) | Triggered when a virtual account expires on a date set by you or is manually closed by you.
---
Payment Links ^^^^ | [payment_link.paid](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payment-links.md#payment-link-paid) | Triggered when a Payment Link is paid.
---
 | [payment_link.partially_paid](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payment-links.md#payment-link-partially-paid) | Triggered when a partial payment is made on a Standard Payment Link.
---
 | [payment_link.cancelled](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payment-links.md#payment-link-cancelled) | Triggered when a Payment Link is cancelled by you.
---
 | [payment_link.expired](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payment-links.md#payment-link-expired) | Triggered when a Payment Link expires.
---
Partners OAuth | [account.app.authorization_revoked](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners/oauth.md#account-app-authorization-revoked) | Triggered when the sub-merchant revokes access to the partner application.
---
Payouts ^^^^^^^^ | [payout.pending](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payouts.md#payout-pending) | Triggered whenever a payout moves to the pending state. The payout remains in this state till you approve or reject it.
---
 | [payout.rejected](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payouts.md#payout-rejected) | Triggered whenever a payout moves to the rejected state. The payout was rejected by someone from your team.
---
 | [payout.queued](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payouts.md#payout-queued) | Triggered whenever a payout moves to the queued state. - Payout goes to queued state when you do not have sufficient funds to process it or when the beneficiary bank/NPCI/partner bank is down. This event is applicable only for RazorpayX Lite.
- You will receive the reason for the payout to be in the queued state as part of the status_details object.

---
 | [payout.initiated](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payouts.md#payout-initiated) | Triggered when the payout moves to the processing state when the payout is created or from the queued state when sufficient funds are available to process the payout.
---
 | [payout.processed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payouts.md#payout-processed) | Triggered when a payout moves to the processed state. This happens when the payout is processed by the contact's bank.
---
 | [payout.updated](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payouts.md#payout-updated) | Triggered whenever there is a change in the payout entity. For example, when we receive the UTR for the payout from the bank.- For NEFT transactions, this webhook is fired within 90 seconds.
- For IMPS and UPI transactions, this webhook is generally fired immediately.

---
 | [payout.reversed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payouts.md#payout-reversed) | Triggered whenever a payout fails and the amount is returned to your business account.
---
 | [payout.failed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payouts.md#payout-failed) | Triggered when a payout is failed because the beneficiary bank OR NPCI OR processing partner bank is down. If the beneficiary bank/partner bank/NPCI does not recover within the stipulated SLA, a FAILED event will be sent with the respective reason.
---
Payout Downtime ^^ | [payout.downtime.started](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payouts.md#payout-downtime-started) | Triggered when a payout downtime starts. Do not initiate a payout if this is triggered since the beneficiary bank is down and the payout will fail.
---
 | [payout.downtime.resolved](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payouts.md#payout-downtime-resolved) | Triggered when a payout downtime is resolved. Make payouts once this webhook is triggered as it indicates that the beneficiary bank downtime is resolved.
---
Fund Account Validation ^^ | [fund_account.validation.completed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/account-validation.md#fund-account-validation-completed) | Triggered whenever an account validation transaction is completed.
---
 | [fund_account.validation.failed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/account-validation.md#fund-account-validation-failed) | Triggered whenever an account validation transaction fails.
---
Payout Links ^^^^^^^^ | [payout_link.pending](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payout-links.md#payout-link-pending) | Triggered whenever a payout link moves to the pending state. This indicates that the payout link has been created. Applicable only for cases where approval workflow is set.
---
 | [payout_link.issued](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payout-links.md#payout-link-issued) | Triggered whenever a payout link moves to the issued state. This indicates that the payout link has been created.
---
 | [payout_link.processing](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payout-links.md#payout-link-processing) | Triggered whenever a payout link moves to the processing state. This indicates that your contact has entered their fund account details and the payout is being processed.
---
 | [payout_link.processed](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payout-links.md#payout-link-processed) | Triggered whenever a payout link moves to the processed state. This indicates that the payout has been successfully made.
---
 | [payout_link.attempted](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payout-links.md#payout-link-attempted) | Triggered whenever the underlying payout has reversed and another attempt is required on the payout link.
---
 | [payout_link.cancelled](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payout-links.md#payout-link-cancelled) | Triggered whenever a payout link moves to the cancelled state. This indicates that you have cancelled the payout link.
---
 | [payout_link.rejected](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payout-links.md#payout-link-rejected) | Triggered whenever a payout link moves to the rejected state. This indicates that the Approver has rejected the payout link. Applicable only for cases where approval workflow is set.
---
 | [payout_link.expired](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payout-links.md#payout-link-expired) | Triggered whenever a payout link moves to the expired state. This indicates that the payout link has expired.
---
Transactions | [transaction.created](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/transactions.md#transaction-created) | Triggered whenever you: - Make a Payout (RazorpayX Lite).
- Add funds to your RazorpayX account (RazorpayX Lite).
