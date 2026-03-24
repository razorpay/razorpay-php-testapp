---
title: Razorpay OTP-Assist | OTP Auto Read and Submit
heading: OTP-Assist
description: Steps to enable OTP auto-read and auto-submit on your Android app for payments that rely on OTP for completion.
---

# OTP-Assist

With Razorpay OTP-Assist, your customers gain a faster and enhanced checkout experience with Razorpay OTP auto-read and auto-submit. The system automatically reads the OTP received, with your customer’s consent, and submits it. It prevents errors and the users do not need to navigate or interact with additional elements to complete verification, making the process seamless.

## Prerequisites

- Create a [Razorpay account](https://dashboard.razorpay.com/signup).

- Generate the [API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

- Integrate with [Android Custom SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom.md).

## Dependencies

Add the following line in your `build.gradle`(app-level) file in the dependencies block:

```java: Dependencies
dependencies{
    //other dependencies
    implementation "com.razorpay:otp-assist:1.0.0""
    //other dependencies
}
```

## Integration Steps

**1.** [Initialise RazorpayOtpAssist Object](#step-1-initialise-razorpayotpassist-object). 

**2.** [OTP Auto-Submission](#step-2-otp-auto-submission). 

**3.** [Override onActivityResultReceived](#step-3-override-onactivityresultreceived). 

**4.** [Reset All Objects](#step-4-reset-all-objects). 

### Step 1: Initialise RazorpayOtpAssist Object

In the S2S flow, since you have not integrated with any of Razorpay’s Checkout SDKs, you must create the `RazorpayOtpAssist` object. 

```java: Java
RazorpayOtpAssist(Activity activity, String apiKey)
```kotlin: Kotlin
class RazorpayOtpAssist(activity: Activity, apiKey: String)
```

`activity`
: `object` Activity object within which the RazorpayOtpAssist object is created. This activity object displays the UI timer for the OTP submit cancellation.

`apiKey`
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys), used to ensure the feature is enabled. 

#### Sample Code

Use the sample code given below: 

```java: Java
RazorpayOtpAssist razorpayOtpAssist = RazorpayOtpAssist(activity, apiKey);
```kotlin: Kotlin
val razorpayOtpAssist = RazorpayOtpAssist(activity, apiKey);
```

### Step 2: OTP Auto-Submission

You can use one of the options below based on your requirement:

- [WebView-based Payments](#webview-based-payments): For card payments.
- [Business OTP Page-based Payments](#business-otp-page-based-payments): For native OTP payments. 

#### WebView-based Payments
 
Since you load the URL provided by Razorpay in WebView for payment completion, this step allows us to auto-fill and auto-submit the OTP directly in WebView.

```java: Java
void startSmsListener(WebView webView)
```kotlin: Kotlin
fun startSmsListener(webView: WebView)
```

`WebView`
: `object` Used to load the URL provided by Razorpay for payment completion.

#### Sample Code

Use the sample code given below: 

```java: Java
RazorpayOtpAssist razorpayOtpAssist = new RazorpayOtpAssist(PaymentActivity.this, "YOU_KEY_ID");
// Other code

razorpayOtpAssist.startSmsListener(webview);
// Other code

```kotlin: Kotlin
val razorpayOtpAssist = RazorpayOtpAssist(this@PaymentOptionsEditPayload, "YOU_KEY_ID")
// Other code

razorpayOtpAssist.startSmsListener(webView)
// Other code
```

#### Business OTP Page-based Payments
 
Razorpay offers Native OTP solutions where you can submit the OTP by using Razorpay APIs. To enable OTP auto-read and auto-submit of payments with this feature, we use a separate function that uses an interface to send the callback to you once the OTP is received.

```java: Java
public interface OtpListener {
    void onOtpReceived(String sender, String body, String otp);
    void onOtpConfirmed(String sender, String body, String otp);
}
```kotlin: Kotlin
interface OtpListener {
   fun onOtpReceived(sender: String, body: String, otp: String)
   fun onOtpConfirmed(sender: String, body: String, otp: String)
}
```

`OtpListener`
: `object` Acts as a callback, triggered when the OTP is received and parsed after the timer is displayed.

    `onOtpReceived`
    : Triggered when the message is received and the SDK extracts OTP. Values: 
        - `sender`: Sender of the message (default: razorpay).
        - `body`: The entire message.
        - `OTP`: OTP pin extracted from the message.

    `onOtpConfirmed`
    : Triggered when the timer for OTP Auto-submit is allowed/confirmed by the user. Values: 
        - `sender`: Sender of the message (default: razorpay).
        - `body`: The entire message.
        - `OTP`: OTP pin extracted from the message.

#### Sample Code

Use the sample code given below: 

```java: Java
RazorpayOtpAssist razorpayOtpAssist = new RazorpayOtpAssist(PaymentActivity.this, "YOU_KEY_ID");
// Other code

razorpayOtpAssist.startSmsListener(new OtpListener() {
    @Override
    public void onOtpReceived(String sender, String body, String otp) {
        // Fill {otp} in the input field
    }

    @Override
    public void onOtpConfirmed(String sender, String body, String otp) {
        // This function is triggered after the RazorpayOtpAssist SDK displays the timer, which can be used to stop the auto-completion.
        // If the user cancels auto-submit, this function is not triggered.
    }
});

// Other code

```kotlin: Kotlin
val razorpayOtpAssist = RazorpayOtpAssist(this@PaymentOptionsEditPayload, "YOU_KEY_ID")
// Other code

razorpayOtpAssist.startSmsListener(object : OtpListener {
    override fun onOtpReceived(sender: String, body: String, otp: String) {
        // Fill {otp} in the input field
    }

    override fun onOtpConfirmed(sender: String, body: String, otp: String) {
        // This function is triggered after the RazorpayOtpAssist SDK displays the timer, which can be used to stop auto-completion.
        // If the user cancels auto-submit, this function is not triggered.
    }
})

// Other code
```

### Step 3: Override onActivityResultReceived

When the application does not use the `RECEIVE_SMS` permission, we use the `SmsRetreiverClient` API provided by Google, which enables the user to give a one-time consent for the application to read the incoming message. 

The user’s response for the one-time consent is passed to the activity’s `onActivityResult` function. Since the SDK cannot override this, we request you send this data to us. 

```java: Java
void onActivityResultReceived(String requestCode, String resultCode, Intent data)
```kotlin: Kotlin
fun onActivityResultReceived(requestCode: String, resultCode: String, data: Intent)
```

`requestCode`
: `string` Passed by `RazorpayOtpAssist` SDK when the `startActivityForResult` is triggered.

`resultCode`
: `string` Contains user-selected action.

`data`
: `intent` Contains data from the user-selected action.

#### Sample Code

Use the sample code given below: 

```java: Java
@Override
protected void onActivityResult(int requestCode, int resultCode, Intent data) {
   super.onActivityResult(requestCode, resultCode, data);
   if (requestCode == RazorpayOtpAssist.SMS_CONSENT_REQUEST && data != null) {
       razorpayOtpAsisst.onActivityResultReceived(requestCode, resultCode, data);
   }
}
```kotlin: Kotlin
override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
    super.onActivityResult(requestCode, resultCode, data)
    if (requestCode == RazorpayOtpAssist.SMS_CONSENT_REQUEST && data != null) {
        razorpayOtpAssist.onActivityResultReceived(requestCode, resultCode, data)
    }
}
```

### Step 4: Reset All Objects

You can use this function to destroy all objects used by the `RazorpayOtpAssist` SDK to avoid leaks or when starting a new transaction with the same Razorpay object. 

```java: Java
void reset()
```kotlin: Kotlin
fun reset()
```

#### Sample Code

Use the code given below:

```java: Reset
//other code
razorpayOtpAssist.reset()
//other code
```
