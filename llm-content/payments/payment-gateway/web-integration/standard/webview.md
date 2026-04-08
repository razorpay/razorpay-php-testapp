---
title: About Webview for Mobile Apps
description: Reuse web integration code to accept payments via WebView on your Android and iOS mobile apps.
---

# About Webview for Mobile Apps

If you want to accept payments on your Android or iOS apps without integrating with our native SDKs, reuse your Standard Integration code. This opens the checkout form in a WebView on your mobile app. Pass the **callback_url** parameter along with other checkout options to process payments.

![Webview in Mobile App](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-method-webview-mobile.jpg.md)

## Why Webview Checkout is Problematic  

Users seem to utilise web checkout within webviews rather than integrating with our SDKs. While this allows you to reuse your existing web integration and avoid re-implementing cart/checkout in the SDK, it introduces multiple issues and is **not recommended**.

Integrating web checkout within webviews can result in several critical issues including but not limited to: 

- **Popup Restrictions**: Flows requiring popups may be disabled or may not function as expected.
- **UPI Intent Configuration**: Additional configuration is required to make UPI intent work within webviews.
- **Bank Transfers and Downloads**: Payment methods like bank transfer, which rely on downloads, will fail as webviews do not support downloads by default.

## Recommended Approach  

We strongly recommend migrating to our [SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md) instead of using webviews to ensure full compatibility and a smoother experience.

If you still decide to proceed with webview-based checkout, please consider the below adjustments to minimise issues, including but not limited to.

## Webview Integration Guide (For Users Proceeding Anyway)  

- **Integration Steps**: Follow the [integrations steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/integration-steps.md) for a seamless setup.
- **Implement Callback URL Handling**: Ensure your integration correctly handles [callback URLs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/callback-url.md) to receive payment status updates reliably.
- **Configure UPI Intent**: Follow additional steps to ensure UPI intent payments function correctly on [Android](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-android.md) or [iOS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-ios.md).
- **Handle Download Restrictions**: Implement solutions for payment methods that require file downloads. For now, you will need to manage downloads on your end.
