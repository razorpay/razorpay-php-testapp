---
title: Payout Links Webhook Events
description: List of Payout Links webhook events along with sample payloads.
---

# Payout Links Webhook Events

Payout Links enable you to make payouts to those Contacts whose Fund Account details are not available. The payload remains the same irrespective of the `fund_account_type` to which payout was made. That is, the payload is same whether the payout was made to a bank account, VPA or card.

## List of Payout Links Webhook Events

@include rzpx/webhooks/payout-links-events

## Sample Payloads

Given below are the sample payloads for Payout Links webhook events.

@include rzpx/webhooks/payout-links-webhooks/payout-link-attempted

@include rzpx/webhooks/payout-links-webhooks/payout-link-issued

@include rzpx/webhooks/payout-links-webhooks/payout-link-pending

@include rzpx/webhooks/payout-links-webhooks/payout-link-processing

@include rzpx/webhooks/payout-links-webhooks/payout-link-processed

@include rzpx/webhooks/payout-links-webhooks/payout-link-rejected

@include rzpx/webhooks/payout-links-webhooks/payout-link-cancelled

@include rzpx/webhooks/payout-links-webhooks/payout-link-expired

@include webhooks/webhook-code-tips
