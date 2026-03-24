---
title: Payment Gateway | iOS Integration - Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Troubleshoot common error scenarios and find answers to frequently asked questions about standard iOS integration.
---

# Troubleshooting & FAQs

### 1. I am getting an error "Razorpay contains unsupported Architecture x86_64" while submitting the archive to the app store. What should I do?

         When a framework is distributed, it contains architectures of the simulators so that the consumer of the framework can build it on a simulator. However, when uploading the archive on iTunes, you have to strip these architectures. If you use Cocoapods, it strips the simulator architectures on its own. 
   
         Since you are not using it, please follow the below-mentioned steps:

         1. Download the [script](https://s3.ap-south-1.amazonaws.com/rzp-1415-prod-mobile/ios/CustomLinks/StripInvalidArchitectures.sh).
         2. Locate the directory in which Razorpay.framework is present in the archive that you are trying to upload.
         3. Move the attached script to the above directory and run it.
         4. Remove the script file.
        

    
### 2. I see a message on the screen to update my SDK. Will my customers also see the message?

         No. You see the update SDK alert because a newer version of our SDK is available. We recommend you use the latest SDK. This message shows up only when running the app on a simulator or using a test key to initialise the SDK.
        

    
### 3. I am getting an error `Image not loaded: .dyld`. What should I do?

         - Ensure that Razorpay.framework is present in your project settings in both the Embedded Binaries and Linked Frameworks.
         - Set Always Embed Swift Libraries to "yes" in the project settings. It can happen because of the incompatibility between the developed Swift version with Razorpay.framework and the Swift version of your project.
         - We recommend using the framework compiled with the required Swift language from our iOS documentation.
        

    
### 4. Razorpay's framework is bitcode enabled. Do I also have to enable bitcode in my project?

         Razorpay's bitcode enabled framework works even if you do not enable bitcode in your project.
        

    
### 5. I am getting an error "Module compiled with Swift X version cannot be imported in the Swift Y version."  What should I do?

         There are multiple Swift versions available, but unfortunately, Apple does not make all the versions compatible, so we release frameworks compiled in multiple Swift versions.
         - Download the framework that is compatible with your project.
         - If you run into a compatibility issue, ensure that you try both frameworks.
        

    
### 6. I am getting an error saying "Could not find module RazorpayCommonCrypto." What should I do?

         A module map is used to define the header files that should be converted into modules and used by your project. Razorpay handles this internally.
         - **Cause**: By default, the Xcode's name is assumed to be Xcode.app. For example, your default Xcode appears as Xcode9.3.
         - **Resolution**: Insert [this](https://s3.ap-south-1.amazonaws.com/rzp-1415-prod-mobile/ios/CustomLinks/StripInvalidArchitectures.sh) script in the directory that contains `Razorpay.framework` file and run it from your terminal.
        

    
### 7. My builds are failing and I am getting an error "Cannot find protocol declaration for RazorpayPaymentCompletionProtocol." What should I do?

         Add the following code in the `ViewController.m` file:

             ```objectivec: Add code
             include  instead of  in your ViewController.m file
             ```

         This will improve the iOS sample app experience and reduce the build failure.
        

    
### 8. Does Razorpay support Xamarin for SDK integration?

         No, we do not support Xamarin. However, since Xamarin is essentially a wrapper around Android and iOS, you can create your own Xamarin wrapper using our [Android](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/standard.md) and [iOS](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/standard.md) SDKs.   

         You can refer to Xamarin for integrating native [Android](https://docs.microsoft.com/en-us/xamarin/android/platform/binding-java-library/) and [iOS](https://docs.microsoft.com/en-us/xamarin/ios/platform/binding-objective-c/) libraries. Alternatively, you can use web integration to open the checkout form in a web view.
        

    
### 9. How can I check the Razorpay iOS Standard SDK version?

         To check the SDK version: 
         1. Open your iOS project in Xcode.
         2. In the project navigator, locate the `Podfile` in the root directory of your project.
         3. Open the `Podfile` and look for the line that specifies the Razorpay SDK pod. The version number is represented by `x.y.z`.
        

    
### 10. How can I update the Razorpay iOS Standard SDK version?

         To update the iOS Standard SDK, follow these steps:
         1. In your project’s Podfile, specify the [latest SDK version](https://github.com/razorpay/razorpay-pod/releases/). If you do not mention any version, it automatically picks the latest version from Cocoapods.
         2. Run `pod repo update` to fetch the latest release versions of the pods.
         3. After updating, ensure that the integration is successful and there are no issues with the updated SDK.
        

    
### 11. How to generate privacy report with Razorpay's SDKs PrivacyManifest file?

            After installing the `razorpay-pod` cocoapod in the project, once the application is archived, privacy report can be generated from the context menu for the created archive. 
            The data used by the Razorpay SDK will be listed under Razorpay.framework along with the reasons for the usage of the data. 
            For more information, you can refer to [Apple's documentation for generating the privacy report](https://developer.apple.com/documentation/bundleresources/privacy_manifest_files/describing_data_use_in_privacy_manifests#4239187). 
            For more information about PrivacyManifests and Required Reason API please refer to [Apple's documentation](https://developer.apple.com/documentation/bundleresources/privacy_manifest_files/describing_data_use_in_privacy_manifests).
        

    
### 12. How can I verify the signature used for razorpay-pod's xcframework? 

            After the installation of the `razorpay-pod` cocoapod, inside the pods folder, expand the folder Development `Pods/razorpay-pod/Frameworks`. Inside this folder, you will find the Razorpay.xcframework file. On selecting this file, XCode's File inspector shows you the XCFramework’s code signing status. If the framework is signed with an Apple Developer certificate, the inspector also shows which Apple Developer team signed the framework.

            You can find more about verification of the signature [here](https://developer.apple.com/documentation/xcode/verifying-the-origin-of-your-xcframeworks).
        

    
### 13. How can I accept payments on my Android or iOS apps without integrating with the native SDKs?

         If you want to accept payments on your Android or iOS apps without integrating with our native SDKs, you can reuse your Standard Integration code. This approach opens the checkout form in a WebView within your mobile app. Know more about [Webview for Mobile Apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/webview.md).
        

    
### 14. I have integrated with the Razorpay Payment Gateway to accept payments on my mobile app. However, it gets rejected when I try to publish my app on the Apple App Store. The following message is displayed, "We noticed that your app offers a subscription with a mechanism other than the in-app purchase API." How to resolve this?

         - **Cause**: As per Apple's policy, if you use a subscription model in your iOS app, you must use Apple's in-app purchase APIs. Apple does not redirect out of the app for digital product purchases.
         - **Resolution**: Use Apple's in-app purchase APIs.
        

    
### 15. Why did my App get rejected by the iOS team as per the guideline 3.1.1?

         An application involving a subscription model could be rejected because of the guideline **3.1.1 - Business - Payments - In-App Purchase**. This is due to the fact that subscription comes under the **Auto-renewable subscriptions to a service** section of the [Apple guidelines.](https://developer.apple.com/design/human-interface-guidelines/in-app-purchase)

         You cannot use an external payment gateway to accept payments by selling digital products or content. You must use Apple’s In-App Purchase to avoid app rejection. 
         ### List of Restricted Payment Modes

         - **Consumable content** like lives or gems in a game. 
         - **Non-consumable content** like premium features in an app. 
         - **Auto-renewable subscriptions** to a service, like cloud storage or a magazine.
         - **Non-renewing subscriptions** to a service or content that lasts for a limited time, like access to an in-game battle pass.
        

    
### 16. Can I enable UPI Intent on my Android or iOS app?

         Yes, you can enable UPI Intent on your [Android](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-android.md) or [iOS](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/webview/upi-intent-ios.md) app.
