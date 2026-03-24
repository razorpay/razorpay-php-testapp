---
title: Integrate With React Native Custom SDK
description: Check the React Native Razorpay Custom UI SDKs.
---

# Integrate With React Native Custom SDK

The React Native SDK acts as a wrapper around the Razorpay Custom UI SDK to build a dynamic and responsive Checkout interface for your iOS or Android application.

> **WARN**
>
> 
> **Watch Out!**
> 
>   - Minimum software requirement: React version 16.5.0
>   - React Native version 0.57.1: This version of the Razorpay-React Native SDK supports Xcode 10. The  [known issues of React Native on Xcode 10](https://github.com/facebook/react-native/issues/19573) are fixed in the current version of our SDK.
> 

> **INFO**
>
> 
> **Handy Tips**
> 
> [Razorpay React Native Standard SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/react-native-integration/standard.md) supports all payment methods by default. We recommend you integrate with the Razorpay React Native Standard SDK. If you integrate with Custom Checkout SDK, you will need to integrate these manually.
> 

## List of Razorpay React Native Custom SDK Versions (Last 4 versions)

Version No. | Release Date | Changes
---
2.2.5 | 08 Nov 2025 | **Feature**: Added support for unified Checkout experience.
---
2.2.5 | 24 Jun 2024 | **Bug Fix**: `getAppsWhichSupportUPI` NPE.
---
2.2.4 | 22 Feb 2024 | **Feature**: Calculate EMI function available on Android and iOS platforms.
---
2.2.2 | 10 May 2022 | **Features**: -  Auto linking support for native modules iOS. 
-  Updated version to pick the latest SDK version in Android and iOS. 

---
2.2.0 | 06 Apr 2022 | **Features**: -  Updated Android SDK version to 3.9.9. 
-  Updated Razorpay iOS framework. 
-  Support Functions on Custom Checkout Android-based SDK. 

> **SUCCESS**
>
> 
> **Update SDK**
> 
> Check your current SDK version. If it is outdated, please [update the SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/react-native-integration/custom/troubleshooting-faqs.md#4-how-can-i-update-the-razorpay-react) to ensure uninterrupted settlements of your funds.
> 

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
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#intent-flow). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md).
> 

## Prerequisites

- Create a [Razorpay Account](https://dashboard.razorpay.com/signup).

- [Generate API Keys in Test Mode](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys). To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.
- Know about the [Razorpay Payment Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md).

## Integration Steps

Follow these integration steps:

1. [Build Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/react-native-integration/custom/build-integration.md)
2. [Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/react-native-integration/custom/test-integration.md)
3. [Go-Live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/react-native-integration/custom/go-live-checklist.md)

### Related Information

- [Troubleshooting and FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/react-native-integration/standard/troubleshooting-faqs.md)
- [Address Verification System](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/address-verification-system.md)
