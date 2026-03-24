---
title: UPI Intent Flow for Android SDK
description: Use the Android UPI Intent SDK to accept UPI payments from your Android device customers.
---

# UPI Intent Flow for Android SDK

Use the Android SDK to support UPI Intent payments when a payment is processed through Razorpay in a WebView inside an app.

![UPI Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/upi-checkout-header-changes.jpg.md)

## Installation

Download the JAR file and include it in the `libs` folder.

## Initialization

To initiate the SDK, call the Razorpay class constructor in your project and pass `key` as Razorpay API key and `webView` as the object that handles the payment flow.

```java: Java
import com.razorpay.Razorpay

Razorpay razorpay = new Razorpay(key, webView, activity);
```java: Kotlin
import com.razorpay.Razorpay;

val razorpay = Razorpay(key, webview, activity)
```

### Passing the Result to Razorpay

After UPI is selected as the payment method, Razorpay invokes the *Intent Flow* page that lists all the available intent flows for the user to select and make the payment. Upon payment completion, the UPI app returns the result back to your `activity` in `onActivityResult` method. This should be passed to Razorpay as shown below:

```java: Java
@Override
protected void onActivityResult(int requestCode, int resultCode, Intent data) {
    super.onActivityResult(requestCode, resultCode, data);
    if (requestCode == Razorpay.UPI_INTENT_REQUEST_CODE) {
        razorpay.onActivityResult(requestCode, resultCode, data);
    }
}
```java: Kotlin
override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
    super.onActivityResult(requestCode, resultCode, data)
    if (requestCode == Razorpay.UPI_INTENT_REQUEST_CODE) {
        razorpay.onActivityResult(requestCode, resultCode, data)
    }
}
```
