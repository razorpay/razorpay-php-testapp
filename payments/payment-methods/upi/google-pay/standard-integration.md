---
title: Google Pay Integration -  Standard Checkout
description: Integrate Google Pay on Razorpay's Standard Checkout page for web and Android apps.
---

# Google Pay Integration -  Standard Checkout

When using Razorpay Standard Checkout Integration, you do not require any extra integration to display the Google Pay option in the list of payment options.Google Pay is shown inside the **UPI** section on the checkout form.

Google pay is shown under the **UPI** section on the checkout form.

## Web Integration

### Collect flow

On your website, all Google Pay requests will be Collect requests. The customer selects the Google Pay option, enters their UPI handle and clicks **Pay**. A request is sent to the Google Pay app installed on their mobile device. The customer has to manually open the Google Pay app and approve the request.

### Intent flow

Customers can make intent-based payments using Google Pay on mobile-web applications. Here, the customer is redirected to Google Pay’s application, installed on their mobile devices, to complete the payment.

> **WARN**
>
> 
> **Watch Out!**
> 
> This feature is only available for web pages running on HTTPS on Google Chrome for Android (v56 and above) and not on Google Chrome web views.
> 

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> 
> 

 to get this feature activated on your account.

## Android Integration

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
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/upi-intent.md). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/standard-integration.md).
> 

### Intent-Based Integration

When using the Standard Checkout, Google Pay is shown inside the payment method **UPI**. The customer selects Google Pay from the list of apps and click **Pay**. Customers are then redirected to the Google Pay application, provided it is installed on the mobile device they are using to access checkout, where they can make the payment.

#### Intent-Based Integration Using Google Pay SDK

You also have the option to integrate Google Pay with the Standard Checkout on your Android app using Google's SDK.

This offers the advantage of letting you open Google Pay within your application for customers to make the payment without any redirection, enhancing the user experience.

#### Prerequisites

1. [Sign up](https://support.google.com/pay/business/answer/7684271?hl=en&ref_topic=7684388) for a business account with Google Pay.
1. [Contact our Support Team](https://razorpay.com/support/#request) and have them **whitelist your UPI ID/VPA**.
1. Verify your UPI ID/VPA details on the [Google Merchant Console](https://support.google.com/pay/business/answer/7684398?hl=en&ref_topic=7684388). Here, Google deposits a small amount into the bank account linked to your VPA (UPI ID).
1. You should have already integrated [Razorpay Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md).
1. [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.

### Collect-Based Integration

This is same as [UPI Collect Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods.md#collect-flow).

The customers enter their UPI handle in the **Enter your UPI ID** section on the Checkout form and click **Pay**. Collect the customer's UPI handle and pass it in the payment request with method as `upi`.

Razorpay then triggers a Collect request. The Collection request is sent to the customer's Google Pay application where they can make the payment.

**NPCI Restrictions for UPI Collect Flow**

As per NPCI guidelines, the following MCC codes are restricted and cannot accept UPI Collect payments:

  
### Restricted MCC Codes

     
     MCC Code | Category
     ---
     5816 | Digital Goods: Games
     ---
     6540 | POI Funding Transactions (excluding MoneySend)
     ---
     4812 | Telecommunication Equipment and Telephone Sales
     ---
     4814 | Telecommunication Services
     ---
     7408 | Lending Platform
     ---
     6513 | Real Estate Agents and Managers - Rentals
     ---
     7995 | Betting/Lottery
     ---
     5412 | Grocery Stores, Supermarkets
     ---
     5413 | Grocery Stores, Supermarkets
     
    

To integrate Google Pay with the Checkout on your Android app using Google's SDK:

1. Download the [Google Pay SDK](https://rzp-1415-prod-mobile.s3.amazonaws.com/android/googlepay-sdk/google-pay-client-api-1.0.0.aar) and add the `.aar` files to the application library.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     The Razorpay-Google Pay SDK acts as a wrapper over the native Google-SDK. This SDK connects Razorpay's SDK with the Google SDK. You need all the 3 SDKs (listed below) for the flow to work.
>     - Razorpay Android SDK
>     - Google Pay SDK
>     - Razorpay-Google Pay SDK
>     

1. Add the following lines of code to the `build.gradle` file of your application:

    ```java: build.gradle
        dependencies {
          implementation(name: 'razorpay-googlepay-1.3.0', ext: 'aar')
          implementation(name:'google-pay-client-api-1.0.0  ', ext:'aar')
          implementation 'com.android.support:customtabs:26.1.0'
          implementation 'com.google.android.gms:play-services-tasks:15.0.1
        }
    ```

This adds the dependencies for the SDK and creates a Google Pay UPI payment method on your Checkout form.
