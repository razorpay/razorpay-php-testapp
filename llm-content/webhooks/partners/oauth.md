---
title: Partners OAuth Webhook Events
description: List of Partners OAuth webhook events along with sample payloads.
---

# Partners OAuth Webhook Events

Razorpay OAuth is a token-based authentication method where you can obtain an access token with the consent of the user, without them having to compromise their API key secret. OAuth lets the user decide who can access what level of resources within their Razorpay account.

## List of OAuth Webhook Events

The table below lists the webhook events available for OAuth partners.

@include partners/partners-oauth-available-events

## Sample Payloads

Given below is the sample payload for the Partners Oauth webhook event.

### Account App Authorization Revoked

@include partners/account-access-revoked-payload

@include webhooks/webhook-code-tips
