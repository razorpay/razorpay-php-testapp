---
title: Prerequisites | Razorpay Quick Integration
heading: Prerequisites
description: Check the prerequisites before you integrate with Razorpay Quick Integration.
---

# Prerequisites

- **Troubleshooting & FAQs**: Troubleshoot common error scenarios and find answers to frequently asked questions about Quick Integration.

Quick integration is the fastest way to integrate Razorpay Checkout on your website and accept domestic and international payments from customers.

## Quick Integration vs Standard Integration

> **INFO**
>
> 
> **Handy Tips**
> 
> The Quick Integration (previously known as Automatic integration method) is simple and fast. However, in case you would like more control over your integration and checkout, we recommend the [Standard Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md).
> 

Given below is a comparison between the Standard and Quick integrations:

Particulars | Quick Integration | Standard Integration
---
**Pay Button** | The pay button is auto-created and cannot be customised. For example, you cannot change its font or background colour. | You can create and customise the pay button as per your business requirements.
---
**Checkout Functions** | This is an HTML-based form action method, which does not support any JavaScript customisations.| This is a JavaScript method, allowing you to use additional functions to automatically open and close Checkout as required.

## Integration Steps

**Before you proceed:**

- Create a [Razorpay Account](https://dashboard.razorpay.com/signup)

- Generate [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.
- Know about the [Razorpay Payment Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md).

Follow these integration steps:

  - **1. Build Integration**: Integrate Standard Checkout form on website.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

> **INFO**
>
> 
> **Other Solutions**
> 
> Looking to integrate Razorpay with your mobile app or at a server-level? Check the list of [integration types](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md#integration-types).
> 

### Related Information

@include integration-steps/related-info
- [Address Verification System](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/address-verification-system.md)
- [Troubleshooting and FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/quick-integration/troubleshooting-faqs.md)
