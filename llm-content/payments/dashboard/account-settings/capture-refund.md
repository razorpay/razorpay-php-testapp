---
title: Capture and Refund Settings
description: Steps to configure payment capture and refund settings on the Razorpay Dashboard.
---

# Capture and Refund Settings

You can accept online payments from your customers. When a customer makes a payment, it usually flows through different [payment states](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/#payment-life-cycle.md). Check how to [capture payments](/payments/dashboard/account-settings/capture-refund/#payment-capture-settings) and [set refunds](/payments/dashboard/account-settings/capture-refund/#choose-refund-speed).

## Payments in Authorised state

By default, once your customer completes a payment, it is automatically moved to the `captured` state. However, the payment can remain in the `authorized` state in the following scenarios:

- **Late authorization**: Due to external factors such as network issues or technical errors, Razorpay may not immediately receive payment status from the bank. In this case, Razorpay polls the APIs intermittently for 3 days to check the status. If we receive the payment status as successful, the payment is moved to the `authorized` state. Know more about [late authorization](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/late-authorisation.md).
- **Specific business use case**: Some businesses such as those in the Ecommerce industry, may retain the payment in the `authorized` state and later move them to the `captured` state.

> **WARN**
>
> 
> **Watch Out!**
> 
> - For businesses which have the **Direct Settlement** feature enabled, payments will be auto-captured irrespective of the configuration.
> - You must ensure that all payments in the authorized state are moved to the captured state within 3 days of creation. This is mandatory because payments that are not captured within this period will be refunded automatically to customers.
> 

## Payment Capture Settings

You can configure **Payment Capture settings** on the Dashboard. You can choose to:

- [Auto-capture all payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/capture-settings/#auto-capture-all-payments.md)
- [Auto-capture with set timeouts](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/capture-settings/#auto-capture-with-custom-timeouts.md)
- [Manually capture timeout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/capture-settings/#manual-capture-timeout.md)

## Choose Refund Speed

You can make Normal Refunds or Instant Refunds. You can also issue refunds in batches. Know more about [Refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds.md).

1. Log in to the Dashboard.
2. Click **Account & Settings**.
3. Click **Capture and refund settings** under **Payments and refunds**.
4. You can choose the type of refund you wish to make a default setting.
