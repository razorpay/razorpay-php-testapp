---
title: About Merchant Onboarding UI
description: Integrate with the Merchant Onboarding UI to build a seamless onboarding flow for your sub-merchants.
---

# About Merchant Onboarding UI

Merchant Onboarding UI is a set of pre-built UI components for Razorpay Partners that assists in building a native business onboarding flow. This allows Partners to onboard their sub-merchants to Razorpay right from their platform. 

Merchant Onboarding UI offers customisation wherein Partners can configure colour theme, logo and brand name to mimic the platform theme.

 to get this feature activated on your Razorpay account.

## Prerequisites
- [Sign up as Partner](https://razorpay.com/partners/) and complete KYC to activate your account.
- Get the Merchant Onboarding UI capability enabled for your account.
- Keep a redirect URL ready. Razorpay will redirect users to this URL after they complete the onboarding process.

## How it Works

Given below is the workflow:

1. Sign up as a Razorpay partner.
2. Configure the merchant onboarding theme as per your platform branding.
3. Subscribe to account creation webhooks to receive real time notifications about merchant onboarding status.
4. Embed the signup link in your platform, to enable merchants to complete Razorpay onboarding and start accepting payments.
5. After the merchant authorises to connect your platform/account, we add the merchant as a sub-merchant under your Razorpay Partner account.
6. You can start managing the merchant account and payments on their behalf after the account is activated.   

![Onboarding flow for Aggregators](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/platforms-and-marketplaces-how-onboarding-works.gif.md)

## Integration Steps

Follow these steps to complete the integration:

1. [Build Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-ui/build-integration.md): Perform the steps on your website/app and the Razorpay Dashboard.
2. [Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-ui/test-integration.md): Test the integration before going live with the integration.

### Related Information

- [Fetch Merchant Account Onboarding Status](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-ui/status.md)
