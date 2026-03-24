---
title: Merchant Onboarding Status
description: Check the merchant's onboarding status through API and webhooks.
---

# Merchant Onboarding Status

You can retrieve a merchant's account onboarding status. Using this information, you can:
- Nudge your sub-merchants to complete their onboarding and get payments enabled.
- Know when the merchant account is activated to manage their payments. 

There are two ways to fetch the status of merchant onboarding:

- [Using API](#using-apis)
- [Using Webhooks](#using-webhooks)

## Using API

Use the [Fetch account API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/account-onboarding/fetch.md) to get the onboarding status of the sub-merchant. 

## Using Webhooks

[Subscribe to webhook events](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/webhooks.md) to receive real-time notifications about the merchant account activation status. 

    
    Webhook Event | Payload
    ---
    `account.activated` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/activated/#account-activated.md)
    ---
    `account.under_review` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/under-review#account-under-review.md)
    ---
    `account.needs_clarification` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/needs-clarification#account-needs-clarification.md)
    ---
    `account.suspended` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/suspended#account-suspended.md)
    ---
    `account.rejected` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/rejected#account-rejected.md)
    ---
    `account.activated_kyc_pending` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/activated-kyc-pending#account-activated-kyc-pending.md)
    ---
    `account.funds_hold` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/funds-onhold#account-funds-on-hold.md)
    ---
    `account.funds_unhold` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/funds-unhold#account-funds-unhold.md)
    ---
    `account.activated_kyc_pending` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/activated-kyc-pending#account-activated-kyc-pending.md)
    ---
    `account.instantly_activated` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/instantly-activated#account-instantly-activated.md)
    ---
    `account.payments_enabled` | [Sample Payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners/payment-enabled#account-payment-enabled.md)
