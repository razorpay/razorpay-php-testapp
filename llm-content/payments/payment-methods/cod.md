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
> [Razorpay Magic Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout.md) supports Cash on Delivery (COD) by default. For a simplified experience without the address section, use this flow that directly opens the payment page. Both flows support COD as a payment method.
> 

## Prerequisites

- [Create a Razorpay account](https://dashboard.razorpay.com/).
- Generate [API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/api-keys/#generate-api-keys.md) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.
- Integrate with Razorpay Magic Checkout:
    - [Native (Web)](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/web.md)
    - [Android](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/android-integration.md)
    - [iOS](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/ios-integration.md)
    - [React Native: Android](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/react-native-android-integration.md)
    - [React Native: iOS](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/react-native-ios-integration.md)
    - [Flutter](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/flutter-integration.md)
    - [Capacitor](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/magic-checkout/capacitor-integration.md)

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

![COD on checkout - customer experience](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-methods-cod.gif.md)

### Related Information

[Payment Configuration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/payment-configuration/#configure-payment-options.md)
