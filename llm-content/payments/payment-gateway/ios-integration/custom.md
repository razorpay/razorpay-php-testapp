---
title: Integrate With iOS Custom SDK
description: Integrate Razorpay iOS Custom SDK with your iOS application and accept payments.
---

# Integrate With iOS Custom SDK

With Razorpay iOS Custom SDK, you can customise the Razorpay Checkout UI.
Customise the look and feel such as colours and themes of your app's Checkout form.
- Validate customer inputs such as card number, expiry date and others using the [Luhn check algorithm](https://en.wikipedia.org/wiki/Luhn_algorithm).
- Configure and integrate the payment methods on the Checkout form.

> **WARN**
>
> 
> **Watch Out!**
> 
> - [Razorpay iOS Standard SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/standard.md) supports all payment methods by default. We recommend you integrate with the Razorpay iOS Standard SDK. If you integrate with Custom Checkout SDK, you will need to integrate these manually. 
> - This framework only supports iOS version **10.0 and above**.
> 

## List of Razorpay iOS Custom SDK Versions (Last 5 versions)

SDK | Framework Compiled With | Release Date | Changes
---
[2.1.2](https://github.com/razorpay/razorpay-customui-pod/releases/tag/2.1.2) | Swift 5.4.2+ | 08 Dec 2025 | Bug Fixes.
---
[2.1.1](https://github.com/razorpay/razorpay-customui-pod/releases/tag/2.1.1) | Swift 5.4.2+ | 18 Nov 2025 | **Feature**: Added turbo property in Checkout implementation. 
 Bug Fixes.
---
[2.1.0](https://github.com/razorpay/razorpay-customui-pod/releases/tag/2.1.0) | Swift 5.4.2+ | 07 Nov 2025 | **Feature**: SDK modularisation to allow Razorpay custom and standard SDKs in the same app. 
---
[2.0.22](https://github.com/razorpay/razorpay-customui-pod/releases/tag/2.0.22) | Swift 5.4.2+ | 04 Nov 2025 | **Bug Fix**: - Xcode 16 compatibility issue.
- WebView `decidePolicyFor` function.

---
[2.0.21](https://github.com/razorpay/razorpay-customui-pod/releases/tag/2.0.21) | Swift 5.4.2+ | 17 Oct 2025 | **Feature**: TNG deeplink auto-redirection from TNG app to your business app. This version is only applicable for Malaysia and Singapore businesses.

> **SUCCESS**
>
> 
> **Update SDK**
> 
> Check your [current SDK version](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/troubleshooting-faqs/#10-how-can-i-check-the-razorpay-ios.md). If it is outdated, please [update the SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/troubleshooting-faqs/#11-how-can-i-update-the-razorpay-ios.md) to ensure uninterrupted settlements of your funds.
> 

## Integration Steps

Follow these integration steps:

1. [Build Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/build-integration.md)
2. [Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/test-integration.md)
3. [Go-Live Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/go-live-checklist.md)

### Related Information
