---
title: UPI Intent Flow
description: Enable UPI intent payments on your Android app using the Razorpay Android UPI Intent SDK.
---

# UPI Intent Flow

The Razorpay Android SDK for UPI Intent Flow enables support for UPI Intent payments on Android apps.

In this scenario, when UPI is selected as the payment method by the customers, they do not need to open the UPI app to make the payment. Instead, they can complete the payment right from their Android app, by entering the UPI pin in the WebView that appears within the app.

![](/docs/assets/images/android-integration-custom-intent-flow.jpg)

## Integration Steps
**1.1** [Install Razorpay Android UPI Intent SDK](#11-install-razorpay-android-upi-intent-sdk). 

**1.2** [Initialise SDK by Adding API Key](#12-initialise-sdk-by-adding-api-key). 

**1.2** [Pass Result to Razorpay](#13-pass-result-to-razorpay). 

### 1.1 Install Razorpay Android UPI Intent SDK

[Download the jar file](http://rzp-mobile.s3.amazonaws.com/android/upi-intent-sdk/razorpay-upi-intent-sdk.jar) and include it in the `libs` folder.

### 1.2 Initialise SDK by Adding API Key

To initiate the SDK, call the Razorpay class constructor in your project and pass Razorpay API Key ID as the `key` and `webView` as the object that handles the payment flow.

```java
import com.razorpay.Razorpay

Razorpay razorpay = new Razorpay(key, webView, activity);
```

### 1.3 Pass Result to Razorpay

When UPI is selected as the payment method, Razorpay invokes the Intent Flow page that lists all installed UPI apps on the customer's phone that support intent flow. The customer can select an app and make the payment.

Upon payment completion, the UPI app will return the result back to your `activity` in `onActivityResult` method. This should be  passed to Razorpay as shown below:

```java
@Override
protected void onActivityResult(int requestCode, int resultCode, Intent data) {
    super.onActivityResult(requestCode, resultCode, data);
    if (requestCode == Razorpay.UPI_INTENT_REQUEST_CODE) {
        razorpay.onActivityResult(requestCode, resultCode, data);
    }
}
```
