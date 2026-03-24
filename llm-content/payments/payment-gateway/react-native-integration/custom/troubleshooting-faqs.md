---
title: Troubleshooting and FAQs
description: Troubleshoot common error scenarios and find answers to frequently asked questions.
---

# Troubleshooting and FAQs

#### 1. In the new M1 MacBook, why am I not able to compile the React Native Razorpay plugin for release mode?

This issue is caused by the new changes introduced in Xcode 12.

To resolve this:
1. Use [Rosetta 2](https://support.apple.com/en-us/HT211861) for launching the app on your Mac.
2. Add the following lines to Podfile within `post_install do |installer|` .

```js: podfile
installer.pods_project.build_configurations.each do |config|
  config.build_settings["EXCLUDED_ARCHS[sdk=iphonesimulator*]"] = "arm64"
end
```

Know more about [compilation errors](https://khushwanttanwar.medium.com/xcode-12-compilation-errors-while-running-with-ios-14-simulators-5731c91326e9).

#### 2. I am getting the error "Cannot read property 'open' of undefined." How can I resolve this?

For Expo: This error typically occurs when the `react-native-razorpay` package's native libraries are not included in the build. To resolve this, switch to a development build instead of an expo build, as development builds allow for the use of native libraries, which should enable the package to access the necessary functionality.

For React CLI: This error indicates that the `react-native-razorpay` package was not correctly installed. To fix this, try reinstalling the package.

#### 3. How can I update the Razorpay React Native Custom SDK version?

To update the SDK version using npm, follow these steps:

1. Open the terminal or command prompt and navigate to your project directory where the `package.json` file resides.
2. Use the npm update command followed by the package name to update a specific package to its latest version. For example, npm update `` (replace `` with the name of the package you want to update).
3. If you are using a React Native iOS application, run `cd ios && pod repo update && pod update` to ensure the internal iOS dependencies are updated to the versions set by the Razorpay package. This is because cocoapods may not automatically update the internal trunk spec to fetch the latest versions.
4. After running the update command, review the updates fetched by npm to ensure they do not introduce any breaking changes.
5. Conduct thorough testing to ensure that the updated packages do not adversely affect the application functionality and commit the changes.

#### 4. My customer is unable to click the **Cancel** button on the netbanking page, on their iOS device? How do I fix this?

Your customer is unable to click the Cancel button because the navigation bar is hidden. Follow the steps to [unhide the navigation bar](https://stackoverflow.com/questions/46084885/performing-action-on-swipe-back-react-navigation).
