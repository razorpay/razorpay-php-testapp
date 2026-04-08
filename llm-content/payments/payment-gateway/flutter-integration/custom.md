---
title: Integrate With Flutter Custom SDK
description: Integrate the Razorpay Flutter Custom plugin with our native Android and iOS SDKs.
---

# Integrate With Flutter Custom SDK

Flutter custom SDK is a wrapper for Flutter framework that interacts with native our custom SDK (iOS and Android platforms). Flutter apps can interact with wrapper methods to initiate payment and other payment operations.

## Platform Support

Platform | Version
---
Android |  API-level 19 and later
---
iOS | iOS 10 and later

## List of Razorpay Flutter Custom SDK Versions (Last 5 versions)

Version No. | Release Date | Changes
---
1.4.2 | 03 Dec 2025 | **Bug Fix**: iOS native platform issues resolved. 
 **Maintenance**: Pinned internal native library version to avoid upgrade misses.
---
1.4.1 | 18 Aug 2025 |**Features**: - Added null checks for `pendingResult` before usage to prevent NPE.
- Implemented early return guards in `onPaymentSuccess` and `onPaymentError` methods.
- Cleared `pendingResult` after sending responses to prevent duplicate replies.
- Enhanced resync method to handle null `pendingReply` gracefully.
- Added success response after `setPaymentID` operation.
- Improved `RazorpayPlugin` with proper resync method call handling.
- Removed commented dead code for cleaner codebase.
- Resolves race conditions that could cause null pointer exceptions and method channel errors due to multiple callback invocations.

---
1.4.0 | 15 Apr 2025 | **Feature**: V2 embedding enabled for Android.
---
1.3.3 | 03 Nov 2022 | Bug fixes
---
1.3.2 | 12 Jul 2022 | **Feature**: Sample app update `payment_slection_page.dart` 
 **Bug Fixes**: - `getBankLogoUrl`fix
 
- Android fixes
 

> **SUCCESS**
>
> 
> **Update SDK**
> 
> Check your [current SDK version](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/troubleshooting-faqs.md#6-how-can-i-check-the-razorpay-flutter). If it is outdated, please [update the SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/troubleshooting-faqs.md#7-how-can-i-update-the-razorpay-flutter) to ensure uninterrupted settlements of your funds.
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

- Create a Razorpay account.
- Generate [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.
- Know about the [Razorpay Payment Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md).

## Integration Steps

Follow these integration steps:

1. [Build Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/build-integration.md)
2. [Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/test-integration.md)
3. [Go-Live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/go-live-checklist.md)

### Related Information

- [Troubleshooting and FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/troubleshooting-faqs.md)
- [Address Verification System](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/address-verification-system.md)
