---
title: Integrate With Android Custom SDK
description: Customise the default Razorpay Checkout form for your Android apps using the Custom SDK libraries.
---

# Integrate With Android Custom SDK

With Razorpay Android Custom SDK, you can customise the Razorpay Checkout UI.
- Customise the look-and-feel such as colors and themes of your app's Checkout form.
- Validate customer inputs such as card number, expiry date and others using the [Luhn check algorithm](https://en.wikipedia.org/wiki/Luhn_algorithm).
- Configure and integrate the payment methods on the Checkout form.

> **IMP**
>
> 
> **Handy Tips**
> 
> It is recommended to integrate with the [Razorpay Android Standard SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard.md) as it supports all payment methods by default. If you integrate with Custom Checkout SDK, you will need to integrate these manually.
> 

## List of Razorpay Android Custom SDK Versions (Last 5 versions)

Version No. | Release Date | Changes
---
3.9.22 | 07 Aug 2024 | **Feature**: Implemented Gradle bill-of-materials for Razorpay Plugins such as [OTP-Assist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/otp-assist.md). 
---
3.9.21 | 12 Apr 2024 |  **Bug Fix**: `Application not responding` crash fix for UPI Intent payments
---
3.9.20 | 13 Dec 2023 |  **Feature**: Added auto-read and auto-submit features for card and native OTP payments in the [OTP-Assist SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/otp-assist.md)
---
3.9.19 | 07 Nov 2023 | Changed the encryption mode
---
3.9.18 | 22 Aug 2023 | **Feature**: Added a new GPG Key to sign all artifacts, allowing you to verify the downloaded artifacts using the [public key](https://keyserver.ubuntu.com/pks/lookup?op=get&search=0xfc93fa80ce2cb687b7d4a9e1bdb7ee27d107b361) 
 
**Bug Fix**: `NullPointerException` fix in `isValidVpa` function during API timeouts

> **SUCCESS**
>
> 
> **Update SDK**
> 
> Check your [current SDK version](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/troubleshooting-faqs.md#6-how-can-i-check-the-razorpay-android). If it is outdated, please [update the SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/troubleshooting-faqs.md#7-how-can-i-update-the-razorpay-android) to ensure uninterrupted settlements of your funds. 
> 
> From version 3.9.22 onwards, the latest version is automatically updated, eliminating the need for manual updates.
> 

## Sample Code

Check the sample code on [GitHub](https://github.com/razorpay/razorpay-android-custom-sample-app) to integrate.

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

- Create a [Razorpay account](https://dashboard.razorpay.com/signup). 

- Generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

- According to the PCI regulations, payment processing is not allowed on TLS v1. Hence, if the device does not have TLS v1.1 or v1.2, the SDK will throw an error in the onPaymentError method. Check the [TLS versions](https://developer.android.com/reference/javax/net/ssl/SSLSocket#default-configuration-for-different-android-versions).

## Integration Steps

Follow these integration steps:

1. [Build Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration.md)
2. [Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/test-integration.md)
3. [Go Live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/go-live-checklist.md)

### Related Information

- [Troubleshooting and FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard/troubleshooting-faqs.md)
- [Address Verification System](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/address-verification-system.md)
