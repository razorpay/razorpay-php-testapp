---
title: Prerequisites | Magento Plugin - Prerequisites
heading: Prerequisites
description: Check the prerequisites before you integrate your Magento website with Razorpay Payment Gateway.
---

# Prerequisites

- **Magento Changelog**: Discover new features, updates and deprecations related to the Razorpay Magento plugin (since Jan 2024).

  - **Troubleshooting & FAQs**: Troubleshoot common error scenarios and find answers to frequently asked questions about the Razorpay Magento plugin.

**Before you proceed:**

- Create a [Razorpay account](https://dashboard.razorpay.com/signup).
- Understand the [payment flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/how-it-works.md) process.

We support the following versions of Magento:

- [Magento 1.x extension](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/magento/integration-steps/#integration-steps-for-magento-1x-extension.md)
- [Magento 2.x extension](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ecommerce-plugins/magento/integration-steps/#integration-steps-for-magento-2x-extension.md)

Our extensions are supported on all operating systems, such as Windows, Mac OS, and Linux.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> As Magento 1.x is a legacy plugin, it is recommended that you use the Magento 2.x plugin.
> 
> 

### Upgrade Magento Extension

If you are an existing user, you can upgrade the Magento extension using the composer. Enter the command given below:

```curl: Upgrade
composer update razorpay/magento
bin/magento setup:upgrade
```

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> If you have installed the plugin using the `code.zip` steps, you must install the [latest code.zip](https://github.com/razorpay/razorpay-magento/releases/latest) file again. 
> 
> 

  - **Video Tutorial**: Watch the video before you start integrating the Magento plugin with Payment Gateway.

  - **Integration Steps**: Check the steps to integrate the Magento plugin with Payment Gateway.

## Supported Products

Razorpay Magento Plugin is only supported on Web Standard Checkout and the following products: 

Payment Gateway | Route | Subscriptions 
---
✓ | x | ✓ 

## Support

- Queries: If you have any queries, raise a ticket on the Razorpay [Support Portal](https://razorpay.com/support/).
- Feature Request: If you have a feature request, create an issue on [GitHub](https://github.com/razorpay/razorpay-magento/issues).

### Related Information

[Address Verification System](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/address-verification-system.md)
