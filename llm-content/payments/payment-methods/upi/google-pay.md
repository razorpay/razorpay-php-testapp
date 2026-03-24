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

@include payment-methods/upi-collect-deprecated/standard

    

     When using the Standard Checkout, Google Pay is shown inside the payment method **UPI**. The customer selects Google Pay from the list of apps and click **Pay**. Customers are then redirected to the Google Pay application, provided it is installed on the mobile device they are using to access checkout, where they can make the payment.
    
    

     You also have the option to integrate Google Pay with the Standard Checkout on your Android app using Google's SDK. This lets you open Google Pay within your application for customers to make the payment without any redirection, enhancing the user experience.

     #### Prerequisites

     1. [Sign up](https://support.google.com/pay/business/answer/7684271?hl=en&ref_topic=7684388) for a business account with Google Pay.
     1.  and have them **whitelist your UPI ID/VPA**.
     1. Verify your UPI ID/VPA details on the [Google Merchant Console](https://support.google.com/pay/business/answer/7684398?hl=en&ref_topic=7684388). Google deposits a small amount into the bank account linked to your VPA (UPI ID).
     1. You should have already integrated [Razorpay Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md).
     1. [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) from the Dashboard.

     @include payment-methods/google-pay-sdk-integration
    
    

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
