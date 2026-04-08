---
title: Google Pay
description: Use Google Pay at the Razorpay Standard or Custom Checkout page.
---

# Google Pay

Your customers can make payments using Google Pay™ at the Razorpay checkout. You can integrate and show Google Pay on any of the following platforms: Desktop Browser, Mobile Web (M-Web) and Android App.

## Integration on Standard Checkout - Web and Android

If you are using Razorpay's Standard Checkout, you do not need to make any change to integrate Google Pay on your checkout page. Razorpay will display Google Pay as an option under the **UPI** section on the checkout page.

![](/docs/assets/images/upi-checkout-header-changes.jpg)

### Web 

    

     On your website, all Google Pay requests are Collect requests. 

     1. The customer selects the Google Pay option, enters their UPI handle and clicks **Pay**. 
     2. A request is sent to the Google Pay app installed on their mobile device. 
     3. The customer manually opens the Google Pay app and approves the request.
    
    

     Customers can make intent-based payments using Google Pay on mobile-web applications. The customer is redirected to Google Pay’s application, installed on their mobile devices, to complete the payment.

     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      This feature is only available for web pages running on HTTPS on Google Chrome for Android (v56 and above) and not on Google Chrome web views.
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
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

    

### Android 

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

    

     When using the Standard Checkout, Google Pay is shown inside the payment method **UPI**. The customer selects Google Pay from the list of apps and click **Pay**. Customers are then redirected to the Google Pay application, provided it is installed on the mobile device they are using to access checkout, where they can make the payment.
    
    

     You also have the option to integrate Google Pay with the Standard Checkout on your Android app using Google's SDK. This lets you open Google Pay within your application for customers to make the payment without any redirection, enhancing the user experience.

     #### Prerequisites

     1. [Sign up](https://support.google.com/pay/business/answer/7684271?hl=en&ref_topic=7684388) for a business account with Google Pay.
     1.  and have them **whitelist your UPI ID/VPA**.
     1. Verify your UPI ID/VPA details on the [Google Merchant Console](https://support.google.com/pay/business/answer/7684398?hl=en&ref_topic=7684388). Google deposits a small amount into the bank account linked to your VPA (UPI ID).
     1. You should have already integrated [Razorpay Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md).
     1. [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) from the Dashboard.

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
    
    

     This is same as [UPI Collect Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods.md#collect-flow).

     The customers enter their UPI handle in the **Enter your UPI ID** section at Checkout and click **Pay**. Collect the customer's UPI handle and pass it in the payment request with method as `upi`.

     Razorpay then triggers a Collect request. The Collection request is sent to the customer's Google Pay application where they can make the payment.

     
     **NPCI Restrictions for UPI Collect Flow**

     - UPI Collect Flow is not available for these MCCs. You can use [UPI Intent Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/upi-intent.md) as an alternative.
        - 5816
        - 6540
        - 4812
        - 4814
        - 5413
        - 7408
        - 6513
        - 7995
        - 5412
        - 5413
     
    

## Integration on Custom Checkout

To enable Google Pay on your custom checkout:

1. Show Google Pay as a separate Option.
1. Trigger payment when a user clicks Google Pay on your checkout.

Know more about [Google Pay Custom Checkout Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/google-pay/custom-integration.md).
