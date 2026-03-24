---
title: Payment Links - Legacy
description: Know about API and Razorpay Dashboard actions on Legacy Contract Payment Links.
---

# Payment Links - Legacy

> **WARN**
>
> 
> 
> **Deprecation**
> 
> The legacy version of Payment Links (Dashboard app and API) will be deprecated on ~~31st March 2021~~ 15th August 2021. Raise a request with our [support team](https://razorpay.com/support/#request) to enable the new version of the app/API on your account. We will be enabling the new version for you post-July end.
> 

## Which Version Do I Have

Check your Dashboard to see which version you have access to.

- If you see the new tag beside Documentation on the Dashboard, you are using the latest version of the app.

    ![Documentation tag Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-links-new-contract-identifier.jpg.md)

- If the new tag is NOT shown on Dashboard, you are using the legacy version of the app. We recommend you migrate to the new version of the app for more features, improved scalability and better support. Raise a request with our [support team](https://razorpay.com/support/#request) to enable the new version of the app on your account.

### Supported Features

The legacy version of Payment Links supports the following features:
- [Partial Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/partial-payments.md)
- [International Currency Support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md)
- [Bulk Upload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/batch.md)
- [Reminders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/reminders.md)
- [Customization](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/customise.md)
- [Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/offers.md)
- [Bank Transfers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/bank-transfer.md)

> **WARN**
>
> 
> **UPI Payment Links Not Supported**
> 
> The legacy version does not support the UPI Payment Links feature.
> 

## API and Dashboard Operations

You can perform Payment Links operations via [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md) or the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/create.md).

## Webhooks

The table below lists the various webhooks available for legacy version of the app. Sample payloads are available [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/invoices.md).

Webhook Events | Description
---
`invoice.partially_paid` | Triggered when a partial payment is made against a payment link.
---
`invoice.paid` | Triggered when a payment link is successfully paid.
---
`invoice.expired` | Triggered when a payment link expires.
