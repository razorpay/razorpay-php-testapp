---
title: Route Webhook Events
description: List of Route webhook events along with sample payloads.
---

# Route Webhook Events

**Route** enables businesses to split payments among third parties, sellers, or bank accounts while managing settlements, refunds, and vendor payments in a one-to-many model.

## List of Route Webhook Events

@include route/route-available-events

## Sample Payloads

Given below are the sample payloads for Route webhook events.

### Transfer Processed

@include route/transfer.processed

### Settlement Processed

> **INFO**
>
> 
> **Handy Tips**
> 
> - The `settlement.processed` webhook is triggered when a transfer to a Linked Account settles with the parent merchant.
> 

Given below are the sample payloads for Settlement webhook events.

@include route/settlement-processed-payload

### Transfer Failed

@include route/transfer.failed

### Product Route Under Review

@include route/under-review

### Product Route Needs Clarification

@include route/needs-clarification

### Product Route Activated

@include route/activated

@include webhooks/webhook-code-tips
