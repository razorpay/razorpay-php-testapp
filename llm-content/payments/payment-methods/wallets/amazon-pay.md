---
title: Amazon Pay - Standard Checkout
description: Offer Amazon Pay wallet as a payment method to your customers on Razorpay Standard Checkout.
---

# Amazon Pay - Standard Checkout

Amazon Pay is a wallet-based payment method that allows customers with an Amazon account to make payments using their Amazon Pay balance. After Amazon Pay is enabled and integrated, it is listed on your website/app Checkout page as an option under the wallet payment method. Know more about [ Amazon Pay](https://www.amazonpay.in/).

  
### On-Demand Feature - Raise a Request

     

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

    

## Integrate Amazon Pay on Standard Checkout - Web, Mobile and iOS

You can accept payments through wallets which are available by default. However, if you want to accept payments from external wallets, such as Amazon Pay, integration is required. Razorpay does not process payments for external wallets and gives you the control along with all the customer data entered in the Checkout form.

> **INFO**
>
> 
> **Handy Tips**
> 
> The wallet payment option can be used for a purchase amount of up to ₹20000 (2000000 in paise).
> 
> 

  
    To list external wallets on your web application, you need to first integrate our [Checkout form](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md). After you integrate, follow the steps given below:

    1. Add a key `external` to `checkout.js` options.
    2. Set `wallets` with wallet name array in `external` as the first parameter.

        ```javascript: JavaScript
          external: {
            wallets: ['amazonpay']
          }
        ```
    3. Set `handler` with a callback function in `external` as the second parameter.

        ```javascript: JavaScript
          external: {
            wallets: ['amazonpay'],
            handler: function(data) {
              'data'
              console.log(this, data)
            }
          }
        ```

    The Amazon Pay is now shown in the wallets section. If the customer selects the external wallet and clicks **Submit**, our Standard Checkout library returns the control to you in the `external:handler:` method. You will get the selected wallet name as an argument. You will have to handle the payment flow for the wallet from hereon.

  
  
    To integrate Amazon Pay wallet with the Standard Checkout on your Android app:

    1. Download the following SDKs and add the `aar` files to the application library.
        - Download [Amazon-SDK](https://rzp-1415-prod-mobile.s3.amazonaws.com/android/googlepay-sdk/tez-client-api-0.9.4.aar).
        - Download [Razorpay-Amazon Pay SDK](https://rzp-1415-prod-mobile.s3.amazonaws.com/android/googlepay-sdk/tez-client-api-0.9.4.aar).
        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         The Razorpay-Amazon Pay SDK acts as a wrapper over the native Amazon-SDK.
>         

    2. Add the following lines of code to the `build.gradle` file of your application:

        ```java: build.gradle
            dependencies {
              implementation(name: 'razorpay-amazonpay-1.3.0', ext: 'aar')
              implementation(name:'PayWithAmazon', ext:'aar')
              implementation 'com.android.support:customtabs:26.1.0'
            }
        ```
    This will add the dependencies for the SDK and display the Amazon Pay wallet on your Checkout form.
  
  ### iOS

   Amazon Pay as a payment method is available by default on iOS and no additional integration is needed.
