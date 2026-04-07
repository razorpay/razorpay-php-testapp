---
title: Amazon Pay - Custom Checkout
description: Let your customers make payments using the Amazon Pay payment method on the Razorpay Custom Checkout.
---

# Amazon Pay - Custom Checkout

Amazon Pay is a wallet-based payment method that allows customers with an Amazon account to make payments using their Amazon Pay balance. After Amazon Pay is enabled and integrated, it is listed on your website/app Checkout page as an option under the wallet payment method. Know more about[Amazon Pay](https://www.amazonpay.in/).

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

## Web Integration

After an order is created and the customer's payment details are received, the information should be sent to Razorpay to complete the payment. You can do this by invoking `createPayment` method and passing `method = wallet` and `wallet=amazonpay`.

```js: Example
razorpay.createPayment({
  amount: 5000,
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  order_id: 'order_9A33XWu170gUtm',
  method: 'wallet',
  wallet: 'amazonpay'
});
```

## Android Integration

To integrate Amazon Pay wallet with the Custom Checkout on your Android app:

1. Download the following SDKs and add the `aar` files to the application library.
    - Download [Amazon-SDK](https://rzp-1415-prod-mobile.s3.amazonaws.com/android/googlepay-sdk/tez-client-api-0.9.4.aar).
    - Download [Razorpay-Amazon Pay SDK](https://rzp-1415-prod-mobile.s3.amazonaws.com/android/googlepay-sdk/tez-client-api-0.9.4.aar).

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     The Razorpay-Amazon Pay SDK acts as a wrapper over the native Amazon-SDK.
>     

1. Add the following lines of code to the `build.gradle` file of your application:

    ```java: build.gradle
        dependencies {
          implementation(name: 'razorpay-amazonpay-1.3.0', ext: 'aar')
          implementation(name:'PayWithAmazon', ext:'aar')
        }
    ```

This will add the dependencies for the SDK and create an Amazon Pay payment method on your Checkout form.

## iOS Integration

The iOS integration for Amazon Pay is similar to the [Razorpay iOS Custom UI SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom.md) integration.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Always use the Live key with Amazon Pay, even for testing.
> 

> - Razorpay SDK has a minimum deployment target of iOS 10.0, built with Swift 4.2. It requires Xcode 10 and above to work.
> 

## Prerequisites

Before you begin the integration, download the following SDKs:
  - [Razorpay SDK](https://rzp-1415-prod-mobile.s3.amazonaws.com/android/googlepay-sdk/tez-client-api-0.9.4.aar) that has Amazon Pay enabled.
  - [AmazonPay SDK](https://s3.ap-south-1.amazonaws.com/rzp-1415-prod-mobile/ios/CustomLinks/StripInvalidArchitectures.sh).

## Integration Steps

To use Amazon Pay via the Razorpay SDK:

1. Add the Amazon Pay SDK to the project directory containing your _.xcodeproj_ or _.xcworkspace_ file.

1. Add `$(PROJ_DIR)` to the framework search paths of your target and set the search type to recursive.

1. Add the following code to your _info.plist_ file:

    ```xml
    CFBundleURLTypes
       
           
               CFBundleURLName
               com.amazon.pwain
               CFBundleURLSchemes
               
                   amzn.$(PRODUCT_BUNDLE_IDENTIFIER)
               
           
       
    ```

1. Import the _PayWithAmazon_ file to your AppDelegate and implement the following function:

    ```swift:
    func application(_ app: UIApplication, open url: URL, options:
           [UIApplicationOpenURLOptionsKey : Any] = [:]) -> Bool {
           #if canImport(PayWithAmazon)
           return PayWithAmazon.sharedInstance().handleRedirectURL(url,
             sourceApplication: "")
           #endif
           return false
    }
    ```

1. Use the following command to trigger Amazon Pay:

    ```swift:
    let options: [String:Any] = [
       "method": "wallet",
       "wallet": "amazonpay",
       "amount": 100,
       "contact": "9000090000",
       "email": "gaurav.kumar@example.com",
       "currency": "INR"
    ]
    razorpayInstance.payWithExternalPaymentEntity(options: dataSource.options)
    ```

    Here, `razorpayInstance` is an instance of Razorpay.
