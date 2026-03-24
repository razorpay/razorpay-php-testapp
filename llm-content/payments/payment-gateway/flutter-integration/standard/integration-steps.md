---
title: Flutter SDK - Integration Steps | Razorpay Payment Gateway
heading: Integration Steps
description: Steps to integrate the Flutter application with Razorpay Payment Gateway.
---

# Integration Steps

Follow these steps to integrate your Flutter application:

  - **1. Build Integration**: Integrate Flutter Standard Checkout.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/pakLL37M6KI]

> **INFO**
>
> 
> **Handy Tips**
> 
> After you complete the integration:
> 
> - Set up webhooks
> - Make test payments
> - Replace Test API keys with Live API keys
> - Integrate with other APIs

> Refer to the [post-integration steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/standard/integration-steps/#2-test-integration.md).
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> If you use M1 MacBook, you need to make [these changes](#m1-macbook-changes) in your `podfile`.
> 

## 1. Build Integration 

Follow the steps given below: 

  
### 1.1 Install Razorpay Flutter Plugin

     [Download the plugin](https://pub.dev/packages/razorpay_flutter) from Pub.dev.

     Add the below code to `dependencies` in your app's `pubspec.yaml`

     ```yml: Add Dependencies
     razorpay_flutter: 1.4.0
     ```

     
      
        Add Proguard Rules (Android Only)
        
         If you are using Proguard for your builds, you need to add the following lines to the Proguard files:

         ```java: Add Proguard Rules
         -keepattributes *Annotation*
         -dontwarn com.razorpay.**
         -keep class com.razorpay.** {*;}
         -optimizations !method/inlining/
         -keepclasseswithmembers class * {
          public void onPayment*(...);
         }
         ```

         Know more about [Proguard rules](https://github.com/razorpay/razorpay-flutter/issues/42#issuecomment-550161626).
        

      
### Get Packages

         Run `flutter packages get` in the root directory of your app.

         
> **INFO**
>
> 
>          **Minimum Version Requirement**
> 
>          - For **Android**, ensure that the minimum API level for your app is 19 or higher.
>          - For **iOS**, ensure that the minimum deployment target for your app is iOS 10.0 or higher. Also, do not forget to enable bitcode for your project.
>          

        

     
    
  
  
### 1.2 Import Package and Create Razorpay Instance

     Use the below code to import the `razorpay_flutter.dart` file to your project.

     ```yml: Import Package
     import 'package:razorpay_flutter/razorpay_flutter.dart';
     ```

     Use the below code to create a Razorpay instance.

     ```yml: Instantiate
     _razorpay = Razorpay();
     ```
    

  
### 1.3 Attach Event Listeners

     The plugin uses event-based communication and emits events when payments fail or succeed.

     The event names are exposed via the constants `EVENT_PAYMENT_SUCCESS`, `EVENT_PAYMENT_ERROR` and `EVENT_EXTERNAL_WALLET` from the `Razorpay` class.

     Use the `on(String event, Function handler)` method on the `Razorpay` instance to attach event listeners.

     ```yml: Attach Event Listeners
     _razorpay.on(Razorpay.EVENT_PAYMENT_SUCCESS, _handlePaymentSuccess);
     _razorpay.on(Razorpay.EVENT_PAYMENT_ERROR, _handlePaymentError);
     _razorpay.on(Razorpay.EVENT_EXTERNAL_WALLET, _handleExternalWallet);
     ```

     The handlers would be defined in the class as:

     ```yml: Handlers
     void _handlePaymentSuccess(PaymentSuccessResponse response) {
       // Do something when payment succeeds
     }

     void _handlePaymentError(PaymentFailureResponse response) {
       // Do something when payment fails
     }

     void _handleExternalWallet(ExternalWalletResponse response) {
       // Do something when an external wallet is selected
     }
     ```

     To clear event listeners, use the `clear` method on the `Razorpay` instance.

     ```yml: Clear Event Listeners
     _razorpay.clear(); // Removes all listeners
     ```
    

  
### 1.4 Create an Order in Server

     @include integration-steps/order-creation-v2
    

  
### 1.5 Add Checkout Options

     Pass the Checkout options. Ensure that you pass the `order_id` that you received in the response of the previous step.

     ```yml: Checkout Options
     var options = {
       'key': '',
       'amount': 50000, 
       'currency': '',
       'name': 'Acme Corp.',
       'order_id': 'order_EMBFqjDHEEn80l', // Generate order_id using Orders API
       'description': 'Fine T-Shirt',
       'timeout': 60, // in seconds
       'prefill': {
         'contact': '',
         'email': ''
       }
     };
     ```
     
      
        Checkout Options
        
         You must pass these parameters in Checkout to initiate the payment.

         @include checkout-parameters/standard
        

      
      
### 1.5.1 Enable UPI Intent on iOS *(Optional)*

         @include integration-steps/ios-upi-intent
        

      
     
    
  

  
### 1.6 Open Checkout

     Use the below code to open the Razorpay checkout.

     ```yml: Open Razorpay Checkout
     _razorpay.open(options);
     ```
    

  
### 1.7 Store Fields in Your Server

     @include integration-steps/store-fields
    

  
### 1.8 Verify Payment Signature

     @include integration-steps/verify-signature

     
      
        M1 MacBook Changes
        
         If you use M1 MacBook, you need to make the following changes in your podfile.

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          Add the following code inside `post_install do |installer|`.
>          

         ```js: podfile
         installer.pods_project.build_configurations.each do |config|
           config.build_settings["EXCLUDED_ARCHS[sdk=iphonesimulator*]"] = "arm64"
         end
         ```
        

     
    
  
  
### 1.9 Verify Payment Status

     @include integration-steps/verify-payment-status
    

## 2. Test Integration

@include integration-steps/next-steps

## 3. Go-live Checklist

Check the go-live checklist for Razorpay Flutter integration. Consider these steps before taking the integration live.

    
### 3.1 Accept Live Payments

         Perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the integration is working as expected, switch to the Live Mode and start accepting payments from customers.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you are switching your test API keys with API keys generated in Live Mode.
> 

To generate API Keys in Live Mode on your Razorpay Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

        

    
### 3.2 Payment Capture

         @include integration-steps/capture-settings
        

    
### 3.3 Set Up Webhooks

         @include integration-steps/set-up-webhooks
