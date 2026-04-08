---
title: Payment Gateway | React Native - Troubleshooting & FAQs
heading: Troubleshooting and FAQs
description: Troubleshoot common error scenarios and find answers to frequently asked questions about Standard React Native integration.
---

# Troubleshooting and FAQs

### 1. How do I resolve the following error?

       ```
       dyld: Library not loaded: @rpath/libswiftCoreGraphics.dylib
       Referenced from: /private/var/mobile/Containers/Bundle/Application/696F0EAD-E2A6-4C83-876F-07E3D015D167/.app/Frameworks/.framework/
       Reason: image not found 
       ```

       To work around this issue, in your Xcode project:
    
       1. Set the `Embedded Content Contains Swift Code (EMBEDDED_CONTENT_CONTAINS_SWIFT)` build setting to `YES` in your app. Know more  [here](https://developer.apple.com/library/archive/qa/qa1881/_index.html).
    
       2. Navigate to **Target Settings** → **General** and ensure that:
           1. The framework is added in **Frameworks, Libraries, and Embed Content**. 
           2. Change **Embed status** from - **'Do not Embed'** to **'Embed & Sign'**.

       3. Verify that you have installed CocoaPods.

       For Android, if you are using proguard for your builds, you need to add the following lines to proguard files.

       ```
       -keepattributes *Annotation*
       -dontwarn com.razorpay.**
       -keep class com.razorpay.** {*;}
       -optimizations !method/inlining/
       -keepclasseswithmembers class * {
         public void onPayment*(...);
       }
       ```
    

  
### 2. How do I auto-link the Razorpay React Native SDK with my app?

       Auto linking is possible only if you are using React Native version 0.60+. Use the code given below to install and run the SDK: 

       ```js: Install
       npm install react-native-razorpay --save
       cd ios && open podfile # Change the platform from iOS 9.0 to 10.0
       pod install && cd .. # CocoaPods on iOS needs this extra step
       ```

       ```js: Run the app
       yarn react-native run-ios
       ```
    

  
### 3. How do I integrate the Razorpay SDK if my React Native app version is 0.59 and lower?

       If you are using React Native version 0.59 and lower, follow the steps given below to install, link and run the SDK:

       1. Install the SDK.

           ```js: Install
           $ npm install react-native-razorpay --save // Install the Razorpay React Native Standard SDK using the npm command.
           ```
       2. Link the SDK.

           ```js: Link the SDK
           react-native link react-native-razorpay // Link the SDK with React Native Project using Xcode.
           ```
       3. Configure the SDK.
          1. Drag the Razorpay.framework file from the **Libraries** folder and drop it under the root folder.
          2.  Set the `Embedded Content Contains Swift Code (EMBEDDED_CONTENT_CONTAINS_SWIFT)` build setting to `YES` in your app. Know more  [here](https://developer.apple.com/library/archive/qa/qa1881/_index.html).
          3. Navigate to **Target Settings** → **General** and ensure that:
             1. The framework is added in **Frameworks, Libraries, and Embed Content**. 
             2. Change **Embed status** from - **'Do not Embed'** to **'Embed & Sign'**.
    

  
### 4. How do I install the Razorpay React Native SDK through manual linking?

       To manually link the SDK, the steps differ for iOS and Android platforms.

       #### For iOS (via CocoaPods)

       Add the following line to your build targets in your Podfile.

       ```js: Podfile
       pod 'react-native-razorpay', :path => '../node_modules/react-native-razorpay'
       ```
  
       Run the following command:
  
       ```js: Podfile
       pod install
       ```
     #### For iOS (without CocoaPods)

       1. In XCode, go to the project navigator:
           1. Right-click **Libraries**.
           2. Add files to [your project's name].
           3. Go to `node_modules/react-native-razorpay`.
           4. Add the `.xcodeproj` file.
       2. In the project navigator, select your project:
           1. `Add the libRNDeviceInfo.a` from the deviceinfo project to your project's **Build Phases** ➜ **Link Binary With Libraries**.
           2. Click `.xcodeproj` file you added before in the project navigator and go to the **Build Settings** tab. Make sure **All** is selected (instead of Basic).
           3. Look for **Header Search Paths** and make sure it contains both `$(SRCROOT)/../react-native/React` and `$(SRCROOT)/../../React`. Mark both as recursive (should be OK by default).
       3. Run your project using the **Cmd+R** keys.

     #### For Android

     Follow the steps to perform manual linking:
       1. `Open android/app/src/main/java/[...]/MainApplication.java`.
           - Add `import com.razorpay.rn.RazorpayPackage;` to the imports.
           - Add `new RazorpayPackage()` to the list returned by the `getPackages()` method.
       2. Append the following lines to `android/settings.gradle`:

           ```java: Settings Gradle
           include ':react-native-razorpay'
           project(':react-native-razorpay').projectDir = new File(rootProject.projectDir,   '../node_modules/react-native-razorpay/android')
           ```
       3. Insert the following lines inside the dependencies block in android/app/build.gradle:

           ```java: Add Dependencies
           implementation project(':react-native-razorpay')
           ```
    

  
### 5. How can I update the existing **'razorpay-pod'**?

       - Go to **iOS** folder in your project and run **'pod update'** to update all the pods. 
  
       - If you do not want to update all pods, run **'pod update razorpay-pod'**
    

  
### 6. What is the process for raising a request for a new feature?

       To raise a request for a new feature, go to **New Issue** → **Feature Request** on our [GitHub repository](https://github.com/razorpay/razorpay-capacitor/issues/new/choose).
    

  
### 7. I am facing issues integrating the Razorpay React Native Plugin with my React Native Expo app. How do I resolve this?

       Expo does not support native code, so you cannot integrate with the Razorpay React Native Plugin. As a workaround, you can load the Razorpay page in a web view and use the callback URL logic to accept payments in your React Native Expo app. Check the [limitations](https://docs.expo.dev/faq/#limitations?redirected).
    

  
### 8. In the new M1 MacBook, why am I not able to compile the React Native Razorpay plugin for release mode?

       New changes introduced in Xcode 12 might cause the issue.

       To resolve this:
       1. Use [Rosetta 2](https://support.apple.com/en-us/HT211861) for launching the app on your Mac.
       2. Add the following lines to Podfile within `post_install do |installer|` .

       ```js: podfile
       installer.pods_project.build_configurations.each do |config|
       config.build_settings["EXCLUDED_ARCHS[sdk=iphonesimulator*]"] = "arm64"
       end
       ```

       Know more about [compilation errors](https://khushwanttanwar.medium.com/xcode-12-compilation-errors-while-running-with-ios-14-simulators-5731c91326e9).
    

  
### 9. How can I update the Razorpay React Native Standard SDK version?

     To update the SDK version using npm, follow these steps:

     1. Open the terminal or command prompt and navigate to your project directory where the `package.json` file resides.
     2. Use the npm update command followed by the package name to update a specific package to its latest version. For example, npm update `` (replace `` with the name of the package you want to update).
     3. If you are using a React Native iOS application, run `cd ios && pod repo update && pod update` to ensure the internal iOS dependencies are updated to the versions set by the Razorpay package. This is because cocoapods may not automatically update the internal trunk spec to fetch the latest versions.
     4. After running the update command, review the updates fetched by npm to ensure they do not introduce any breaking changes.
     5. Conduct thorough testing to ensure that the updated packages do not adversely affect the application functionality and commit the changes.
