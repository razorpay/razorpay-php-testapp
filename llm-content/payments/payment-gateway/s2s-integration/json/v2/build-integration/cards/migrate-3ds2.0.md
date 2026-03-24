---
title: 3DS2 Migration Guide for Existing S2S Cards Integration
description: If you integrated with our APIs before October 15, 2022, you should make the following changes to your integration to accept card payments with the 3DS2 protocol.
---

# 3DS2 Migration Guide for Existing S2S Cards Integration

If you integrated with our S2S APIs before October 15, 2022, you must make the following changes to your integration to accept card payments with the 3DS2 authentication protocol.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You must have a PCI compliance certificate to get this feature enabled on your account.
> 

## 3DS2 Authentication

3DS2 is an authentication protocol, the successor of 3DS1, that enables businesses and payment providers to send additional information (such as customer device or browser data) to verify the transaction's authenticity. Razorpay integration is compliant with the 3DS2 protocol. 

**Know more**: Razorpay supports [3DS2 transactions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/cards/3ds2.0.md).

The customer's bank evaluates the transaction for risk and decides on the payment flow.

- **Frictionless Flow**: This flow is activated if the bank determines that the transaction is from a trusted device and allows the payment to go through without any additional authentication from the customer. 

Currently, this would not be applicable in India for domestic payments as RBI mandates OTP-based authentication. For international payments, this flow is viable.

- **Challenge Flow**: This flow is activated if the bank determines that the transaction is not from a trusted device and needs additional information. The customer needs to perform additional authentication steps.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - Integration does not differ for the challenge flow or the frictionless flows.
> - Frictionless flow is not applicable for payments on cards issued in India.
> 

Given below is a diagram that explains the 3DS2 flow:

![Cards 3DS2 Protocol](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cards-3ds-flowchart.jpg.md)

## Choose Payment Processing Method

There are two methods to process the payments:

1. **Process all payments as browser payments**: 

This process does not require additional integration of the EVM 3DS 2 SDK. You can pass additional browser parameters in your [existing API integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/build-integration/cards/browser.md). There will not be any changes in the payments flow and the API responses.

2. **Process all payments as browser and app payments**: 

You can process web-initiated payments as browser payments and app-initiated payments as native app payments. You need to make the changes as mentioned [here to make browser payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/build-integration/cards/evm-sdk.md). For payments originating from your app, you need to make the following changes:
    - Integrate EMV 3DS 2 SDK for both Android and iOS apps.
    - API Integration.
