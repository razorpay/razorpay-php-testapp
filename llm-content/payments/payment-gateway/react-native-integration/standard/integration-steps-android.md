---
title: React Native Android SDK - Integration Steps | Razorpay Payment Gateway
heading: Integration Steps (Android)
description: Steps to integrate your React Native Android application with Razorpay Payment Gateway.
---

# Integration Steps (Android)

Follow these steps to integrate your React Native Android application:

  - **1. Build Integration**: Integrate React Android Standard Checkout.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/TCRHqz4Hh5Q]

> **INFO**
>
> 
> **Handy Tips**
> 
> The **compileSdkVersion** is the version of Android. Increase the value of **minSdkVersion** to at least 19 in the build.gradle file in the Android folder to work with the latest Android SDK Build Tools version. Using it with a lower **minSdkVersion** version will lead to errors.
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

  
### 1.1 Install Razorpay React Native SDK

     Install the SDK using the following `npm` command in the **Terminal** window. If you are using Windows, please use **Git Bash** instead of the **Command Prompt** window. Ensure that you run this code within your React Native project folder in the **Terminal** window. 

     ```node:Installation Code
     //using npm
     $ npm install react-native-razorpay --save
     ```

     Additionally, run the code given below if you are using `yarn` or `expo`:

     ```node:Installation Code using yarn 
     // using yarn
     $ yarn add react-native-razorpay
     ```

     ```node:Installation Code using expo
     // for expo
     $ npx expo install react-native-razorpay
     ```
    

  
### 1.2 Run React Native App

     Run the React Native app.

     ```node: Run
     npx react-native run-android
     ```

     This links the SDK with your React Native project.

     
      
        Expo Application
        
         After adding the `react-native-razorpay` package, use the option to prebuild the app. This generates the **android** platform folders in the project to use native-modules. 

         ```node: Run
         npx expo prebuild
         ```

         The application is installed on the device/emulator.

         ```node:
         npx expo run:[android] --device
         ```
        

     
    
  
  
### 1.3 Create an Order in Server

     @include integration-steps/order-creation-v2
    

  
### 1.4 Add Razorpay Checkout Options to .js File

     To integrate the Razorpay Checkout with your React Native app, you must add the Checkout Display Options in the **.js** file.

     Open the **.js** file in your project folder and perform the following:

     1. Import the `RazorpayCheckout` module to your component.

           ```js: Import Razorpay Checkout Module
           import RazorpayCheckout from 'react-native-razorpay';
           ```

     2. Call the `RazorpayCheckout.open` method with the payment options. The method returns a JS Promise where the `then` part corresponds to a successful payment and the `catch` part corresponds to payment failure.

     ```Javascript: Checkout Options
      {
         var options = {
         description: 'Credits towards consultation',
         image: 'https://i.imgur.com/3g7nmJC.jpg',
         currency: '',
         key: '',
         amount: '50000',
         name: 'Acme Corp',
         order_id: 'order_DslnoIgkIDL8Zt',//Replace this with an order_id created using Orders API.
         prefill: {
           email: '',
           contact: '',
           name: ''
         },
         theme: {color: '#53a20e'}
       }
       RazorpayCheckout.open(options).then((data) => {
         // handle success
         alert(`Success: ${data.razorpay_payment_id}`);
       }).catch((error) => {
         // handle failure
         alert(`Error: ${error.code} | ${error.description}`);
       });
     }}>
     ```

     
      
        Checkout Options
        
         You must pass these parameters in Checkout to initiate the payment.

         @include checkout-parameters/standard
        

     
    
  

  
### 1.5 Store Fields in Your Server

     @include integration-steps/store-fields
    

  
### 1.6 Verify Payment Signature

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
        

     
    
  
  
### 1.7 Verify Payment Status

     @include integration-steps/verify-payment-status
    

## 2. Test Integration

@include integration-steps/next-steps

## 3. Go-live Checklist

Check the go-live checklist for Razorpay React Native Android integration. Consider these steps before taking the integration live.

    
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
