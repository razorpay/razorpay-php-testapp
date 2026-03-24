---
title: Prerequisites | Razorpay Android Standard SDK
heading: Prerequisites
description: Check the prerequisites before you integrate with Razorpay Android Standard Checkout.
---

# Prerequisites

- **Android Standard SDK Changelog**: Discover new features, updates and deprecations related to Razorpay Android Standard SDK (since Jan 2024).

  - **Troubleshooting & FAQs**: Troubleshoot common error scenarios and find answers to frequently asked questions about Android Standard integration.

You can use Razorpay Standard SDK to integrate the Razorpay Payment Gateway with your Android Application.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - Starting from version 1.6.22, the Android Standard SDK includes codes in **Kotlin**. Please add the Kotlin library to your project.
> 
> - Due to the [changes](https://support.google.com/googleplay/android-developer/answer/9047303) in Google Play Developer policy, we have removed auto-read SMS feature from Razorpay Android Standard SDK versions 1.5.1 and higher. 
> 
>     However, if your Android app already has permission to read SMS, then Razorpay auto-reads it.
> 
> - Upgrade to the latest version available on the [Maven Repository](https://mvnrepository.com/artifact/com.razorpay/checkout).
> 
> - According to the PCI regulations, payment processing is not allowed on TLS v1. Hence, if the device does not have TLS v1.1 or v1.2, the SDK will throw an error in the `onPaymentError` method. Check the [TLS versions](https://developer.android.com/reference/javax/net/ssl/SSLSocket#default-configuration-for-different-android-versions).
> 
> - If you are using SDK version below 1.6.15, you need to make [changes to your Android `Manifest.xml` file](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard/troubleshooting-faqs.md).
> 

> **SUCCESS**
>
> 
> **Update SDK**
> 
> Check your [current SDK version](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard/troubleshooting-faqs/#5-how-can-i-check-the-razorpay-android.md). If it is outdated, please [update the SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard/troubleshooting-faqs/#6-how-can-i-update-the-razorpay-android.md) manually to ensure uninterrupted settlements of your funds. 
> 
> From version 1.6.40 onwards, the latest version is automatically updated, eliminating the need for manual updates.
> 

## Integration Steps

**Before you proceed:**
         

- Create a [Razorpay account](https://dashboard.razorpay.com/signup). 

- Generate the [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/api-keys/#generate-api-keys.md) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

Follow these integration steps:

  - **1. Build Integration**: Integrate Android Standard SDK.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

  - **Sample App**: Check the sample app to integrate on GitHub.

### Related Information

[Address Verification System](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/address-verification-system.md)
