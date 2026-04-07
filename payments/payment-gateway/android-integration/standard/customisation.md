---
title: Payment Gateway | Android Standard - Customise Checkout
heading: Customisation Options
description: Add company logo and disable Checkout on full screen using the Razorpay Android Standard SDK.
---

# Customisation Options

You can customise the Checkout form to suit your business needs. You can perform the following customisations:

- [Add Company Logo](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard/customisation.md#add-company-logo).
- [Disable Checkout in Full Screen](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard/customisation.md#disable-checkout-in-full-screen).

## Add Company Logo

By default, the Checkout form uses the logo specified in the **Account & Settings** section of the Dashboard. You can also set a custom logo in the Checkout form. Call the following method _before_ you call the [`open` method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard/integration-steps.md#14-initiate-payment-and-display-checkout-form).

```java: Add Custom Company Logo
int image = R.drawable.logo; // Can be any drawable
checkout.setImage(image);
```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> You can also pass the logo image as one of the checkout `options`.
> If you pass the image in `options` as well as through `drawable`, the image from drawable appears as the Checkout logo.
> 

## Disable Checkout in Full Screen

The Checkout form runs in a separate activity. This activity picks up the theme from the Manifest file. Therefore, if you have a full screen theme, even the Checkout will run in full screen. It is suggested to disable the Checkout in full screen mode to enable the user to switch between various apps, for example, while entering the OTP.

If your app is in full screen mode, you can disable it for Checkout by calling the following method:

```java: Disable Full Screen
checkout.setFullScreenDisable(true)
```

### Related Information

[Integrate Payment Gateway using the Android Standard SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard.md)
