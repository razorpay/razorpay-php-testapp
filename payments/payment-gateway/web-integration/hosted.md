---
title: Prerequisites | Razorpay Hosted Checkout
heading: Prerequisites
description: Check the prerequisites before you integrate with Razorpay Hosted Checkout.
---

# Prerequisites

- **Troubleshooting & FAQs**: Troubleshoot common error scenarios and find answers to frequently asked questions about Hosted Web Integration.

Hosted Checkout is a standard redirection-based integration where the complete checkout is developed and managed by Razorpay. 

- Hosted Checkout lets you hand over the control of the entire checkout process to Razorpay. As the customer payment information is securely stored with Razorpay, you do not have to worry about implementing the PCI compliance requirements at your end.
- Unlike Standard Checkout, where customers enter their payment details on a pop-up page, Hosted Checkout securely redirects customers to a separate page hosted by Razorpay. The payment details submitted by the customer are sent to our server.

## Supported Payment Methods

Payment Methods such as netbanking, credit and debit cards, wallets, UPI and Pay Later are available by default on Hosted Checkout. 

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> We do not support EMI, Offers and UPI intent on Hosted Checkout.
> 

Know how to [enable](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/payment-methods.md#enable-payment-methods) and [disable](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/payment-methods.md#disable-payment-methods) Payment Methods from the Dashboard.

## Integration Steps

**Before you proceed:**

- Create a [Razorpay account](https://dashboard.razorpay.com/signup). 

- Generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

Follow these integration steps:

- [Build Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/hosted/integration-steps.md#1-build-integration)
- [Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/hosted/integration-steps.md#2-test-integration)
- [Go-live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/hosted/integration-steps.md#3-go-live-checklist)

### Related Information

- [Best Practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/hosted/best-practices.md)
- [Troubleshooting and FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/hosted/troubleshooting-faqs.md)
