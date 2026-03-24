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
> Check your [current SDK version](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/custom/troubleshooting-faqs/#6-how-can-i-check-the-razorpay-flutter.md). If it is outdated, please [update the SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/custom/troubleshooting-faqs/#7-how-can-i-update-the-razorpay-flutter.md) to ensure uninterrupted settlements of your funds.
> 

@include payment-methods/upi-collect-deprecated/custom

## Prerequisites

- Create a Razorpay account.
- Generate [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.
- Know about the [Razorpay Payment Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/how-it-works.md).

## Integration Steps

Follow these integration steps:

1. [Build Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/custom/build-integration.md)
2. [Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/custom/test-integration.md)
3. [Go-Live Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/custom/go-live-checklist.md)

### Related Information

- [Troubleshooting and FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/custom/troubleshooting-faqs.md)
- [Address Verification System](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/address-verification-system.md)
