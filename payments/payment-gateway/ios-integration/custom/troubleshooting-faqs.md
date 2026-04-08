---
title: Troubleshooting and FAQs
description: Troubleshoot common error scenarios and find answers to frequently asked questions.
---

# Troubleshooting and FAQs

#### 1. I am getting an error "Razorpay contains unsupported Architecture x86_64" while submitting the archive to the app store. What should I do?

When a framework is distributed, it contains architectures of the simulators so that the consumer of the framework can build it on a simulator. However, when uploading the archive on iTunes, you have to strip these architectures. If you use Cocoapods, it strips the simulator architectures on its own. 

Since you are not using it, please follow the below-mentioned steps:

 1. Download the [script](https://s3.ap-south-1.amazonaws.com/rzp-1415-prod-mobile/ios/CustomLinks/StripInvalidArchitectures.sh). 
 2. Locate the directory in which Razorpay.framework is present in the archive that you are trying to upload.
 3. Move the attached script in the above directory and run it.
 4. Remove the script file.

#### 2. I see a message on the screen to update my SDK. Will my customers also see the message?

No. You see the update SDK alert because a newer version of our SDK is available. We recommend you to use the latest SDK. This message shows up only when running the app on a simulator or using a test key to initialize the SDK.

#### 3. I am getting an error `Image not loaded: .dyld`. What should I do?

- Ensure that Razorpay.framework is present in your project settings in both the Embedded Binaries and Linked Frameworks.
- Set Always Embed Swift Libraries to "yes" in the project settings. It can happen because of the incompatibility between the developed Swift version with Razorpay.framework and the Swift version of your project.
- We recommend using the framework compiled with the required Swift language from our iOS documentation.

#### 4. Razorpay's framework is bitcode enabled. Do I also have to enable bitcode in my project?

Razorpay's bitcode enabled framework works even if you do not enable bitcode in your project.

#### 5. I am getting an error `Module compiled with Swift X version cannot be imported in Swift Y version.` What should I do?

There are multiple Swift versions available, but unfortunately, Apple does not make all the versions compatible, so we release frameworks compiled in multiple Swift versions.
- Download the framework that is compatible with your project.
- If you run into a compatibility issue, ensure that you try both frameworks.

#### 6. I am getting an error saying, "Could not find module RazorpayCommonCrypto".

A module map is used to define the header files that should be converted into modules and used by your project. Razorpay handles this internally.

**Cause**: By default, the Xcode's name is assumed to be Xcode.app. For example, your default Xcode appears as Xcode9.3.

**Resolution**: Insert [this](https://s3.ap-south-1.amazonaws.com/rzp-1415-prod-mobile/ios/CustomLinks/StripInvalidArchitectures.sh) script in the directory that contains `Razorpay.framework` file and run it from your terminal.

#### 7. I have integrated with the Razorpay Payment Gateway to accept payments on my mobile app. However, when I try to publish my app on the Apple App Store, it gets rejected. The following message is displayed, "We noticed that your app offers a subscription with a mechanism other than the in-app purchase API." How to resolve this?

**Cause**: As per Apple's policy, if you use a subscription model in your iOS app, you must use Apple's in-app purchase APIs. Apple does not redirect out of the app for digital product purchases.

**Resolution**: Use Apple's in-app purchase APIs.

#### 8. How to generate privacy report with Razorpay's SDKs PrivacyManifest file?
            
After installing the `razorpay-customui-pod` cocoapod in the project, once the application is archived, privacy report can be generated from the context menu for the created archive. 
The data used by the Razorpay SDK will be listed under Razorpay.framework along with the reasons for the usage of the data. 
For more information, you can refer to [Apple's documentation for generating the privacy report](https://developer.apple.com/documentation/bundleresources/privacy_manifest_files/describing_data_use_in_privacy_manifests#4239187).

For more information about PrivacyManifests and Required Reason API please refer to [Apple's documentation](https://developer.apple.com/documentation/bundleresources/privacy_manifest_files/describing_data_use_in_privacy_manifests).

#### 9. How can I verify the signature used for razorpay-customui-pod's xcframework? 
        
After the installation of the `razorpay-customui-pod` cocoapod, inside the pods folder, expand the folder Development `Pods/razorpay-customui-pod/Frameworks`. Inside this folder, you will find the Razorpay.xcframework file. On selecting this file, XCode's File inspector shows you the XCFramework’s code signing status. If the framework is signed with an Apple Developer certificate, the inspector also shows which Apple Developer team signed the framework.

You can find more about verification of the signature [here](https://developer.apple.com/documentation/xcode/verifying-the-origin-of-your-xcframeworks).

#### 10. How can I check the Razorpay iOS Custom SDK version?

To check the SDK version: 
1. Open your iOS project in Xcode.
2. In the project navigator, locate the `Podfile` in the root directory of your project.
3. Open the `Podfile` and look for the line that specifies the Razorpay SDK pod. The version number is represented by `x.y.z`.

#### 11. How can I update the Razorpay iOS Custom SDK version?

To update the iOS Custom SDK, follow these steps:
1. In your project’s Podfile, specify the [latest SDK version](https://github.com/razorpay/razorpay-customui-pod/releases/). If you do not mention any version, it automatically picks the latest version from Cocoapods.
2. Run `pod repo update` to fetch the latest release versions of the pods.
3. After updating, ensure that the integration is successful and there are no issues with the updated SDK.
