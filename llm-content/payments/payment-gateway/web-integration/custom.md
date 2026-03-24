---
title: Web Integration - Razorpay Custom Checkout
description: Integrate Razorpay Custom Checkout with your website to start accepting payments.
---

# Web Integration - Razorpay Custom Checkout

Integrate Razorpay Payment Gateway with your Custom Checkout. You can build a checkout form to suit your unique business needs and branding guidelines.

![](/docs/assets/images/web-integration-custom-custom-checkout.jpg)

Custom Checkout's JavaScript library lets you customise the checkout interface at a granular level. For example, you can white-label the checkout to:

- Display only the select payment methods.
- Integrate external wallets.
- Modify the look and feel of Checkout.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You can accept payments **only** from those websites that you had registered with us at the time of [account setup](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md). Razorpay **fails** the payments received on the **unregistered websites**. If you want to accept payments from multiple websites, contact our [Support team](https://razorpay.com/support/) to register additional websites for your account.
> 
> 

@include payment-methods/upi-collect-deprecated/custom

## Prerequisites

Before integrating with the Checkout, run through this checklist:

- Create a [Razorpay account](https://dashboard.razorpay.com/signup). 

- Generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> A customer's payment information should never reach your servers unless you are PCI-DSS certified.
> 

## Integration Steps

Follow these integration steps:

1. [Build Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md)
2. [Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/test-integration.md)
3. [Go-Live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/go-live-checklist.md)

### Related Information

- [Best Practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/best-practices.md)
- [Address Verification System](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/address-verification-system.md)
