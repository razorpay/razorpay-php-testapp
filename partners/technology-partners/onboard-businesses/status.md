---
title: Onboarding Status | Razorpay Partners Embedded Payments
heading: Onboarding Status
description: Track your sub-merchant's onboarding status through webhooks.
---

# Onboarding Status

You can [subscribe to webhook events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/subscribe-to-webhooks.md) to receive real-time notifications about a merchant's account activation status. Using this information, you can:
- Nudge your sub-merchants to complete their onboarding and get payments enabled.
- Know when a sub-merchant's account is activated to manage their payments. 

## Available Webhook Events

Webhook Event | Description | Payload
---
`account.activated` | Triggered when an account is successfully activated and ready for use. |[Sample Payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners/activated.md#account-activated)
---
`account.under_review` | Triggered when an account is under review for verification or compliance checks. | [Sample Payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners/under-review.md#account-under-review)
---
`account.needs_clarification` | Triggered when additional information is required to complete account verification. | [Sample Payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners/needs-clarification.md#account-needs-clarification)
---
`account.suspended` | Triggered when an account is disabled due to policy or compliance violations. | [Sample Payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners/suspended.md#account-suspended)
---
`account.rejected` | Triggered when an account application is declined and cannot be activated. | [Sample Payload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/partners/rejected.md#account-rejected)
