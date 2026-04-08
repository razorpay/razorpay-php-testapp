---
title: Cash on Delivery | Razorpay Payment Methods
heading: Cash on Delivery
description: Offer Cash on Delivery (COD) as a payment method on the Razorpay Checkout page.
---

# Cash on Delivery

You can now offer Cash on Delivery (COD) as a payment method on the Razorpay Checkout page. Customers can choose COD directly on the Checkout page, alongside UPI, cards, netbanking and more. This flow increases accessibility and builds trust among first-time buyers and high-value orders.

> **INFO**
>
> 
> **Handy Tips**
> 
> [Razorpay Magic Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout.md) supports Cash on Delivery (COD) by default. For a simplified experience without the address section, use this flow that directly opens the payment page. Both flows support COD as a payment method.
> 

## Prerequisites

- [Create a Razorpay account](https://dashboard.razorpay.com/).
- Generate [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.
- Integrate with Razorpay Magic Checkout:
    - [Native (Web)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/web.md)
    - [Android](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/android-integration.md)
    - [iOS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/ios-integration.md)
    - [React Native: Android](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/react-native-android-integration.md)
    - [React Native: iOS](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/react-native-ios-integration.md)
    - [Flutter](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/flutter-integration.md)
    - [Capacitor](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/capacitor-integration.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> This feature is currently supported only for native Razorpay integrations. It is not available on third-party platforms such as Shopify, WooCommerce and so on. 
> 

## Integration Steps

Follow the integration steps given below:

1. Use your existing Magic Checkout integration. While configuring the checkout options, pass the `show_address` parameter as shown below to control the visibility of the address section:

    ```js: json
    "options": {
        "show_address": false
        }
    ```
    
    `show_address` 
    : `boolean` Determines whether the shipping address section appears on the Checkout page. Possible values
      -  `true` (default): Show the address form. 
-  `false`: Hide the address form. 

    
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     Magic Checkout supports **Cash on Delivery (COD)** by default and the checkout flow includes an address section. Use the `show_address` parameter to remove this step and maintain a simplified checkout experience.
>     

    
2. **Cash on Delivery** appears as one of the available payment methods on the Checkout interface. Customers can select COD and confirm the order.

## Customer Experience

The flow below displays how customers can view and select **Cash on Delivery** during Checkout:

### Related Information

[Payment Configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/payment-configuration.md#configure-payment-options)
