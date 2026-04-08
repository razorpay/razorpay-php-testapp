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

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md).
> 

## Prerequisites

- Create a [Razorpay Account](https://dashboard.razorpay.com/signup).
- [Generate API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from your Dashboard.

## User Flow

The user flow for accepting payments using tokens is as follows:

1. The customer enters the VPA to make UPI payments on your UI.
2. The entered VPAs are saved as tokens by Razorpay.
3. On a repeat visit to your site, all the tokens saved for a customer are displayed on the UI.
4. From the displayed list of VPAs, customers select the VPA of their choice to complete the payment.

## Integration

Know how to [Build Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/saved-vpa/build-integration.md) to save VPAs.
