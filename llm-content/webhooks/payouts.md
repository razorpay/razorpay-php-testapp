---
title: Payouts Webhook Events
description: List of Payouts webhook events along with sample payloads.
---

# Payouts Webhook Events

Payouts are transfer of funds from your business account to a contact's fund account.

## List of Payouts Webhook Events

@include rzpx/webhooks/payout-events

**Handy Tips**

The `error` object has been deprecated.

## Sample Payloads

Given below are the sample payloads for Payouts webhook events.

### Payout Pending

@include rzpx/payouts/payouts-webhooks/payout-pending

Know about the [Payouts Approval Payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payouts-approval.md#webhooks).

### Payout Rejected

@include rzpx/payouts/payouts-webhooks/payout-rejected

### Payout Queued

@include rzpx/payouts/payouts-webhooks/payout-queued

### Payout Initiated

@include rzpx/payouts/payouts-webhooks/payout-initiated

### Payout Processed

@include rzpx/payouts/payouts-webhooks/payout-processed

### Payout Updated

@include rzpx/payouts/payouts-webhooks/payout-updated

### Payout Reversed

@include rzpx/payouts/payouts-webhooks/payout-reversed

### Payout Failed

@include rzpx/payouts/payouts-webhooks/payout-failed

### Payout Downtime Started

@include rzpx/payouts/payouts-webhooks/payout-downtime-started

### Payout Downtime Resolved

@include rzpx/payouts/payouts-webhooks/payout-downtime-resolved
