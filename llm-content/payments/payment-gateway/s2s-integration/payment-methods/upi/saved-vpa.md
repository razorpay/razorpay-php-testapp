---
title: About Saved VPA in Server-to-Server Integration
description: Store VPA details entered by your customers as tokens that can be used later for repeated transactions on your website.
---

# About Saved VPA in Server-to-Server Integration

In an online transaction using UPI collect flow, customers perform these steps:

1. Enter their virtual payment address (VPA) at the Checkout.
2. Open the respective UPI apps.
3. Complete the payment after successful two-factor authentication.

In this flow, customers likely enter invalid VPAs or forget their VPAs, which could lead to higher drop-off rates. To overcome this problem, Razorpay enables you to save the VPAs of a customer. The VPAs entered by the customer are stored and secured as **tokens** in Razorpay. This saves the customer the hassle of entering the VPA again for every transaction. Thereafter, on subsequent visits, the customers select the saved VPA of their choice and complete the payment.

 to get this feature activated on your Razorpay account.

@include payment-methods/upi-collect-deprecated/s2s

## Prerequisites

- Create a [Razorpay Account](https://dashboard.razorpay.com/signup).
- [Generate API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) from your Dashboard.

## User Flow

The user flow for accepting payments using tokens is as follows:

1. The customer enters the VPA to make UPI payments on your UI.
2. The entered VPAs are saved as tokens by Razorpay.
3. On a repeat visit to your site, all the tokens saved for a customer are displayed on the UI.
4. From the displayed list of VPAs, customers select the VPA of their choice to complete the payment.

## Integration

Know how to [Build Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/saved-vpa/build-integration.md) to save VPAs.
