---
title: Web Integration - Razorpay Custom Checkout
description: Integrate Razorpay Custom Checkout with your website to start accepting payments.
---

# Web Integration - Razorpay Custom Checkout

Integrate Razorpay Payment Gateway with your Custom Checkout. You can build a checkout form to suit your unique business needs and branding guidelines.

![](/docs/assets/images/web-integration-custom-custom-checkout.jpg)

Custom Checkout's JavaScript library lets you customise the checkout interface at a granular level. For example, you can white-label the checkout to:

- Display only the select payment methods.
- Integrate external wallets such as Paytm.
- Modify the look and feel of Checkout.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You can accept payments **only** from those websites that you had registered with us at the time of [account setup](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/set-up.md). Razorpay **fails** the payments received on the **unregistered websites**. If you want to accept payments from multiple websites, contact our [Support team](https://razorpay.com/support/) to register additional websites for your account.
> 
> 

## Prerequisites

Before integrating with the Checkout, run through this checklist:

- Create a [Razorpay account](https://dashboard.razorpay.com/signup).
- Generate the [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.
- Know about the [Razorpay Payment Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/how-it-works.md).

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

1. Build Integration
- [E-Commerce](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/chargeback/build-integration-ecommerce.md)
- [Hotel](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/chargeback/build-integration-hotel.md)
- [Travel](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/chargeback/build-integration-travel.md)
2. [Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/chargeback/test-integration.md)
3. [Go-Live Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/chargeback/go-live-checklist.md)

### Related Information

- [Best Practices](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/best-practices.md)
- [Address Verification System](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/address-verification-system.md)
