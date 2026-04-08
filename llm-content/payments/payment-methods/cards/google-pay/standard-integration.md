---
title: Google Pay Card Payments - Android Standard Checkout
description: Know how to integrate Cards on Google Pay at your Razorpay Android Standard Integration.
---

# Google Pay Card Payments - Android Standard Checkout

Use this feature to let your customers to make payments on your Android app using cards they saved on Google Pay.

> **INFO**
>
> 
> **Available on Android Apps Only**
> 
> Google Pay has launched the option of adding Cards to their Google Pay accounts only for Android users. 
> 

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## Prerequisites

- You should have already integrated [Razorpay Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard.md) on your Android app.
- Complete the onboarding process mentioned [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/google-pay.md).

## Integration Steps

1. [Add or update the Google SDKs](#step-1-add-or-update-the-google-sdks)
2. [Update the Razorpay Standard Integration SDK](#step-2-update-razorpay-standard-integration-sdk)
3. [Add dependencies in the Build Gradle file](#step-3-add-dependencies-in-build-gradle-file)
4. [Add metadata in the Android Manifest file](#step-4-add-metadata-in-android-manifest-file)

### Step 1: Add or Update the Google SDKs

You will need to integrate the Google SDK in your android app. You may use one of the two methods listed below:

- [**Method 1**: Import the SDK from our Maven Repository](#method-1-import-the-sdk-from-our-maven)
- [**Method 2**: Download from GitHub](#method-2-download-from-github)

#### Method 1: Import the SDK from our Maven Repository

Import the SDK from our Maven repository by adding the following lines to your app's `build.gradle` file.

```java: build.gradle
repositories {
    mavenCentral()
}

dependencies {
    implementation 'com.razorpay:gpay:1.0.0'
}
```

#### Method 2: Download from GitHub

Download [Google Pay SDK](https://rzp-1415-prod-mobile.s3.amazonaws.com/android/googlepay-sdk/google-pay-client-api-1.0.0.aar) AAR file and add the following lines to your app's `build.gradle` file.

```java: build.gradle
dependencies {
  ...
  implementation(name: 'rzp-googlepay-1.3.0', ext: 'aar')
}
```

### Step 2: Update Razorpay Standard Integration SDK

Google Pay Cards is supported on Razorpay Android - Standard Checkout version number 1.6.5 and higher. If you are using an older version, you will need to update it.

You can update the Standard Checkout version in your `build.gradle` file as shown below:

```java: Update Razorpay Checkout version
dependencies {
  ...
  implementation('com.razorpay:checkout:1.6.12')
}
```

### Step 3: Add Dependencies in Build Gradle File

Add the following lines to your app's `build.gradle` file.

```java: Dependencies
dependencies {
  ...
  implementation 'com.android.support:customtabs:26.1.0'
  implementation 'com.google.android.gms:play-services-tasks:15.0.1'
  implementation 'com.google.android.gms:play-services-wallet:18.0.0'
  ...
}
```

### Step 4: Add Metadata in Android Manifest File

Add the following lines inside the app’s `AndroidManifest.xml` file.

```xml: Adds Meta Data

```
