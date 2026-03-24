---
title: Payment Gateway | Android Standard - Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Troubleshoot common error scenarios and find answers to frequently asked questions about Standard Android integration.
---

# Troubleshooting & FAQs

### 1. Android app is crashing every time I invoke `RazorpayCheckout.open API`. How to resolve this?

         The Android App crashes because the theme color parameter is passed in curly braces.

         Use the code given below to resolve the problem:

         ```java:
         JSONObject options = new JSONObject();
             options.put("name", "Acme Corp");
             options.put("description", "Reference No. #123456");
             options.put("image", "http://example.com/image/rzp.jpg");
             options.put("order_id", "order_DBJOWzybf0sJbb");//from response of step 3.
             options.put("theme.color", "#3399CC");
         ```
        

    
### 2. During checkout, the **Paying To** name reflects my company name. Is it possible to change the **Paying To** name from my company name to my product name?

         No. **Paying to** gives your business name and not the product name. It is a standard flow. So you cannot change it.
        

    
### 3. Does Razorpay support Xamarin for SDK integration?

         No, we do not support Xamarin. However, since Xamarin is essentially a wrapper around Android and iOS, you can create your own Xamarin wrapper using our [Android](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard.md) and [iOS](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/standard.md) SDKs.  

         You can refer to Xamarin for integrating native [Android](https://docs.microsoft.com/en-us/xamarin/android/platform/binding-java-library/) and [iOS](https://docs.microsoft.com/en-us/xamarin/ios/platform/binding-objective-c/) libraries. Alternatively, you can use web integration to open the checkout form in a web view.
        

    
### 4. How can I check the Razorpay Android Standard SDK version?

         To check the SDK version: 
         1. Open your Android project in Android Studio.
         2. Navigate to the `build.gradle` file of your app module (usually `app/build.gradle`).
         3. Locate the `dependencies` block in the file.
         4. Find the line that includes the Razorpay SDK dependency. The version number will be alongside the SDK name in the format`x.y.z`.
             ```java: build.gradle
             repositories {
                 mavenCentral()
             }

             dependencies {
                 implementation 'com.razorpay:checkout:1.6.40'
             }
            ```
        
         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          From version 1.6.40 onwards, the latest version is automatically updated, eliminating the need for manual updates.
>          

        

    
### 5. How can I update the Razorpay Android Standard SDK version?

         To update the Standard Android SDK, follow these steps:
         1. Check the [latest SDK version](https://mvnrepository.com/artifact/com.razorpay/checkout).
         2. In the app-level gradle build file, update the SDK version to the latest release.
             ```java: Update SDK
             dependencies {
             //    … other dependencies
             //  For Razorpay checkout SDK
             implementation ‘com.razorpay:checkout:’
             //    … other dependencies

             }
         3. After updating, sync gradle and check for any compile-time errors.
         4. Ensure all changes are correctly integrated and the application functions as expected.
         
         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          From version 1.6.40 onwards, the latest version is automatically updated, eliminating the need for manual updates.
>          

        

    
### 6. I am trying to integrate Razorpay SDK for Android 12. However, the following error message is displayed, **Receiver not registered " error from checkoutActivity. While trying UPI" implementation 'com.razorpay:checkout:1.6.13**. How to resolve this?

        Add the code given below in your Android Manifest.xml file:
         ```java:
         
             
                 
             
         

         
             
                 
                 
             
         
         ```

         
> **INFO**
>
> 
> 
>          **Handy Tips**
> 
>          You do not need to add this code to your integration if using SDK version 1.6.17 and above.
>          

        

    
### 7. Can I enable UPI Intent on my Android or iOS app?

         Yes, you can enable UPI Intent on your [Android](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-android.md) or [iOS](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-ios.md) app. 
        

    
### 8. How can I accept payments on my Android or iOS apps without integrating with the native SDKs?

         If you want to accept payments on your Android or iOS apps without integrating with our native SDKs, you can reuse your Standard Integration code. This approach opens the checkout form in a WebView within your mobile app. Know more about [Webview for Mobile Apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/webview.md).
