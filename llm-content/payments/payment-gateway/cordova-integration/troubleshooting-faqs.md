---
title: Payment Gateway | Cordova Integration - Troubleshooting & FAQs
heading: Troubleshooting & FAQs
description: Troubleshoot common error scenarios and find answers to frequently asked questions about Cordova Integration.
---

# Troubleshooting & FAQs

### 1. What should I do if I see the following error?

     ```js: Error
     dyld: Library not loaded: @rpath/libswiftCoreGraphics.dylib
       Referenced from: /private/var/mobile/Containers/Bundle/Application/696F0EAD-E2A6-4C83-876F-07E3D015D167/.app/Frameworks/.framework/
       Reason: image not found
     ```
     To fix the above error message:

     - Set the `Embedded Content Contains Swift Code (EMBEDDED_CONTENT_CONTAINS_SWIFT)` build setting to `YES` in your app. To know more, refer to [this Apple document](https://developer.apple.com/library/archive/qa/qa1881/_index.html).
     - Ensure that you have the framework added in `Frameworks, Libraries, and Embed Content` under `Target settings` - `General`. Ensure the `Embed status` is set to 'Embed & Sign'.
    

  
### 2. Is Capacitor supported in Razorpay Cordova Plugin?

     No, we do not support Capacitor in our plugin as it has its own [dependencies](https://capacitorjs.com/docs/getting-started).
    

  
### 3. What is order id and how to generate it?

     Order creation is the primary step of the Razorpay payment flow. When a customer clicks the pay button on your app, an Order is created and a corresponding order_id is generated in the response. This order_id must be passed to the Razorpay Checkout options added in your Capacitor app.
     Know more about [Orders](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).
    

  
### 4. What is the process for raising a request for a new feature?

     To raise a request for a new feature, navigate to **New Issue** → **Feature Request** on our [GitHub repository](https://github.com/razorpay/razorpay-cordova/issues/new/choose).
    

  
### 5. How can I update the existing **'razorpay-pod'**?

     - Go to your project's iOS folder and run **'pod update'** to update all the pods.

     - If you do not want to update all pods, run **'pod update razorpay-pod'**.
    

  
### 6. In the new M1 MacBook, why am I not able to compile the Cordova Razorpay plugin for release mode?

     This is because of the new changes introduced in Xcode 12.

     To resolve this:
     1. Use [Rosetta 2](https://support.apple.com/en-us/HT211861) for launching the app on your Mac.
     2. Add the following lines to Podfile:

     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      Add the following code inside `post_install do |installer|`.
>      

     ```js: podfile
     installer.pods_project.build_configurations.each do |config|
       config.build_settings["EXCLUDED_ARCHS[sdk=iphonesimulator*]"] = "arm64"
     end
     ```

     Know more about [compilation errors](https://khushwanttanwar.medium.com/xcode-12-compilation-errors-while-running-with-ios-14-simulators-5731c91326e9).
    

  
### 7. How can I check the Razorpay Cordova Standard SDK version?

     To check the SDK version: 
     1. Open your Cordova project in your preferred code editor.
     2. Navigate to the `config.xml` file in the root directory of your project.
     3. Look for the `` tag that includes the Razorpay SDK plugin. The version number is represented by `x.y.z`.
    

  
### 8. How can I check the Razorpay Ionic Standard SDK version?

     To check the SDK version: 
     1. Open your Ionic project in your preferred code editor.
     2. Open the `package.json` file in the root directory of your project.
     3. In the `dependencies` section, look for the Razorpay entry. The version number is specified next to the package name in the format `x.y.z`.
    

  
### 9. How can I update the Razorpay Cordova and Ionic Standard SDK version?

     To update the SDK version using npm, follow these steps:

     1. Open the terminal or command prompt and navigate to your project directory where the `package.json` file resides.
     2. Use the npm update command followed by the package name to update a specific package to its latest version. For example, npm update `` (replace `` with the name of the package you want to update).
     3. If you are using a Cordova iOS application, run `cd platforms && cd ios && pod repo update && pod update` to ensure the internal iOS dependencies are updated to the versions set by the Razorpay package. This is because cocoapods may not automatically update the internal trunk spec to fetch the latest versions.
     4. After running the update command, review the updates fetched by npm to ensure they do not introduce any breaking changes.
     5. Conduct thorough testing to ensure that the updated packages do not adversely affect the application functionality and commit the changes.
