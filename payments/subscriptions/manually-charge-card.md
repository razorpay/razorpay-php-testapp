---
title: Charge a Card Manually
description: Manually charge a card for Razorpay Subscriptions from the Razorpay Dashboard.
---

# Charge a Card Manually

If one or more auto-charge attempts fail, you will receive a webhook notification. Know more about [webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md). In such scenarios, you can manually charge the card linked to the Subscription from the Dashboard. Until a successful charge is made, the invoice will be in the `issued` state.

> **WARN**
>
> 
> **Watch Out!**
> 
> Manual charging of a domestic card is not supported.
> 

## Manually Charge a Card From Dashboard

To manually charge a card:

1. Log in to the Dashboard and click **Subscriptions** under **PAYMENT PRODUCTS** in the left menu.
1. Click the **Subscription Id** in the `pending` state that is to be charged.
1. Click the invoice in the `issued` state and click **Attempt Charge**. Alternatively, you can click **Attempt Charge** against the invoice in the `issued` state on the details panel.

### Related Information

- [Create and View Plans](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-plans.md)
- [Create Subscriptions via Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create-subscription-links.md)
- [Update a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/update.md)
- [Subscriptions Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/settings.md)
