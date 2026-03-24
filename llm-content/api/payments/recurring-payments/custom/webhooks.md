---
title: Webhooks
description: Learn how to set up webhooks for recurring payments, available webhook events and sample payloads for these events. Webhooks are the best ways to receive alerts about the authorisation payment, the status of tokens and subsequent recurring payments.
---

# Webhooks

@include webhooks/webhooks-introduction

## Idempotency

@include webhooks/webhooks-idempotency

## Deactivation

@include webhooks/webhooks-deactivation

## Setup Webhooks

@include webhooks/webhooks-setup

## Validation

@include webhooks/webhooks-validation

## Check Payment Status using Webhooks

@include recurring-payments/webhooks/payment-events

### Payment Authorized

@include recurring-payments/webhooks/payment-authorized

### Payment Captured

@include recurring-payments/webhooks/payment-captured

### Order Paid

@include recurring-payments/webhooks/order-paid

### Payment Failed

@include recurring-payments/webhooks/payment-failed

## Check Token Status using Webhooks

@include recurring-payments/webhooks/token-events

### Token Confirmed

@include recurring-payments/webhooks/token-confirmed

### Token Rejected

@include recurring-payments/webhooks/token-rejected

### Token Cancelled

@include recurring-payments/webhooks/token-cancelled

### Token Paused

@include recurring-payments/webhooks/token-paused

### Token Resumed

@include recurring-payments/webhooks/token-resumed

## Check Registration Link Status using Webhooks

@include recurring-payments/webhooks/link-events

### Invoice Paid

@include recurring-payments/webhooks/invoice-paid

### Invoice Expired

@include recurring-payments/webhooks/invoice-expired
