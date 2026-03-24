---
title: About Server-to-Server Redirect Integration
description: Use S2S Redirect API to integrate with Razorpay Payment Gateway.
---

# About Server-to-Server Redirect Integration

Server-to-Server payments integration lets you communicate directly with the Razorpay servers and seamlessly integrate the service in your web application. The direct integration enables you to capture payment details on your secure server and process the payments at your end using our Checkout. 

This integration method provides you with complete control over the look and feel of the payment experience for your customers.

## Prerequisites
- Create a [Razorpay account](https://dashboard.razorpay.com/signup).
- Raise a request with our Support team to get this feature enabled on your account.
- Generate the [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.
- Know about [Razorpay Payment Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/how-it-works.md).

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> PCI Compliance: In order to securely save the sensitive card details entered by the customer, a PCI compliance certificate is mandatory. For more details, refer to the [PCI Compliance](https://www.pcisecuritystandards.org/) website.
> 

## Integration Steps
Follow these integration steps:

1. [Build Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/build-integration.md).
2. [Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/test-integration.md).
3. [Go-Live Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/go-live-checklist.md).

### Related Information
- [Best Practices](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/best-practices.md)
- [Address Verification System](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/features/address-verification-system.md)
