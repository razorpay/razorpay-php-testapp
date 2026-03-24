---
title: Payment Gateway | Capacitor Integration - Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Troubleshoot common error scenarios and find answers to frequently asked questions about Capacitor integration.
---

# Troubleshooting & FAQs

### 1. What is an order id and how to generate it?

     Order creation is the primary step of the Razorpay payment flow. An Order creates when a customer clicks the pay button on your app. A corresponding order_id generates in the response. Pass this order_id to the Razorpay Checkout options added in your Capacitor app. Know more about [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).
    

  
### 2. What is the process for raising a request for a new feature?

     To raise a request for a new feature, go to **New Issue** → **Feature Request** on our [GitHub repository](https://github.com/razorpay/razorpay-capacitor/issues/new/choose).
    

  
### 3. How can I update the existing **'razorpay-pod'**?

     - Go to your project's **iOS** folder and run **'pod update'** to update all the pods.
     - If you do not want to update all pods, run **'pod update razorpay-pod'**.
    

  
### 4. I have integrated with the Razorpay Payment Gateway to accept payments on my mobile app. However, it gets rejected when I try to publish my app on the Apple App Store. The following message is displayed, "We noticed that your app offers a subscription with a mechanism other than the in-app purchase API." How to resolve this?

     As per Apple's policy, if you use a subscription model in your iOS app, you must use Apple's in-app purchase APIs. Apple does not redirect out of the app for digital product purchases.
    

  
### 5. In the new M1 MacBook, why am I not able to compile the Capacitor Razorpay plugin for release mode?

     This is because of the new changes introduced in Xcode 12.

     To resolve this:
     1. Use [Rosetta 2](https://support.apple.com/en-us/HT211861) for launching the app on your Mac.
     2. Add the following lines to Podfile within `post_install do |installer|` .

     ```js: podfile
     installer.pods_project.build_configurations.each do |config|
       config.build_settings["EXCLUDED_ARCHS[sdk=iphonesimulator*]"] = "arm64"
     end
     ```

     Know more about [compilation errors](https://khushwanttanwar.medium.com/xcode-12-compilation-errors-while-running-with-ios-14-simulators-5731c91326e9).
    

  
### 6. How can I check the Razorpay Capacitor Standard SDK version?

     To check the SDK version: 
     1. Open your Capacitor project in your preferred code editor.
     2. Open the `package.json` file in the root directory of your project.
     3. In the `dependencies` section, look for the Razorpay entry. The version number is specified next to the package name in the format `x.y.z`.
    

  
### 7. How can I update the Razorpay Capacitor Standard SDK version?

     To update the SDK version using npm, follow these steps:

     1. Open the terminal or command prompt and navigate to your project directory where the `package.json` file resides.
     2. Use the npm update command followed by the package name to update a specific package to its latest version. For example, npm update `` (replace `` with the name of the package you want to update).
     3. If you are using a Capacitor iOS application, run `cd ios && pod repo update && pod update` to ensure the internal iOS dependencies are updated to the versions set by the Razorpay package. This is because cocoapods may not automatically update the internal trunk spec to fetch the latest versions.
     4. After running the update command, review the updates fetched by npm to ensure they do not introduce any breaking changes.
     5. Conduct thorough testing to ensure that the updated packages do not adversely affect the application functionality and commit the changes.
