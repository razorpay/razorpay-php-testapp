---
title: Razorpay OTP-Assist | OTP Auto Read and Submit
heading: OTP-Assist
description: Steps to enable OTP auto-read and auto-submit on your Android app for payments that rely on OTP for completion.
---

# OTP-Assist

With Razorpay OTP-Assist, your customers gain a faster and enhanced checkout experience with Razorpay OTP auto-read and auto-submit. The system automatically reads the OTP your customers receive, and with the customer's consent, auto-fills and auto-submits the OTP. It prevents errors and the users do not need to navigate or interact with additional elements to complete verification, making the process seamless.

## Prerequisites

- Create a [Razorpay account](https://dashboard.razorpay.com/signup).

- Generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

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

**1.** [OTP Auto-Submission](#step-1-otp-auto-submission). 

**2.** [Override onActivityResultReceived](#step-2-override-onactivityresultreceived). 

**3** [Reset All Objects](#step-3-reset-all-objects). 

### Step 1: OTP Auto-Submission

You can use one of the options below based on your requirement:

- [WebView-based Payments](#webview-based-payments): For card payments.
- [Business OTP Page-based Payments](#business-otp-page-based-payments): For native OTP payments. 

#### WebView-based Payments

The `startSmsListener` function starts `SmsRetrieverClient` and attaches `BroadcastReceivers`, which notifies about the incoming SMS messages. Once the message is received and parsed, the OTP is auto-filled and subsequently auto-submitted on the page loaded in WebView. 

```java: Java
void startSmsListener(WebView webView)
```kotlin: Kotlin
fun startSmsListener(webView: WebView)
```

`WebView`
: `object` The object created by you and passed to Razorpay Custom Checkout SDK within which the ACS page loads. 

#### Sample Code

Use the sample code given below: 

```java: Java
Razorpay razorpay = new Razorpay(PaymentActivity.this);
// RazorpayOtpAssist is initialized by Custom Checkout's Razorpay object internally

// You need the UI Activity object here as RazorpayOtpAssist attaches a new fragment to display the timer

// Other code

razorpay.otpAssist.startSmsListener(webview);
razorpay.submit(cardsPayload, new PaymentResultWithDataListener() {
   @Override
   public void onPaymentSuccess(String razorpayPaymentID, PaymentData paymentData) {}

   @Override
   public void onPaymentError(int code, String response, PaymentData paymentData) {}
});
// Other code

```kotlin: Kotlin
val razorpay = Razorpay(this@PaymentOptionsEditPayload)
// RazorpayOtpAssist is initialized by Custom Checkout's Razorpay object internally

// You need the UI Activity object here as RazorpayOtpAssist attaches a new fragment to display the timer

// Other code

razorpay.otpAssist.startSmsListener(webView)
razorpay.submit(cardsPayload, object : PaymentResultWithDataListener {
   override fun onPaymentSuccess(razorpayPaymentID: String?, paymentData: PaymentData?) {}
   override fun onPaymentError(code: Int, response: String?, paymentData: PaymentData?) {}
})
// Other code
```

#### Business OTP Page-based Payments
 
Razorpay offers Native OTP solutions where you can submit the OTP by calling the API provided by the Razorpay Custom Checkout SDK. To enable OTP auto-read and auto-submit of payments with this feature, we use a separate function that uses an interface to send the callback to you once the OTP is received.

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
Razorpay razorpay = new Razorpay(PaymentActivity.this);
// Other code

razorpay.getCardsFlow(cardsPayload, new CardsFlowCallback() {
    @Override
    public void isNativeOtpEnabled(boolean isNativeOtpEnabled) {
        if (isNativeOtpEnabled) {
            razorpay.getCardOtpData(this);
        }
    }

    @Override
    public void otpGenerateResponse(boolean otpGenerated) {
        if (otpGenerated) {
            razorpay.otpAssist.startSmsListener(new OtpListener() {
                @Override
                public void onOtpReceived(@NonNull String sender, @NonNull String body, @NonNull String otp) {
                    // Fill {otp} in the input field
                }

                @Override
                public void onOtpConfirmed(String sender, String body, String otp) {
                    razorpay.otpSubmit(otp, this);
                }
            });
        }
    }

    @Override
    public void otpResendResponse(boolean otpResent) {}

    @Override
    public void onOtpSubmitError(boolean otpSubmitError) {}
});

// Other code
```kotlin: Kotlin
val razorpay = Razorpay(this@PaymentOptionsEditPayload)
// Other code

razorpay.getCardsFlow(cardsPayload, object : CardsFlowCallback {
    override fun isNativeOtpEnabled(isNativeOtpEnabled: Boolean) {
        if (isNativeOtpEnabled) {
            razorpay.getCardOtpData(this)
        }
    }

    override fun otpGenerateResponse(otpGenerated: Boolean) {
        razorpay.otpAssist.startSmsListener(object : OtpListener {
            override fun onOtpReceived(sender: String, body: String, otp: String) {
                // Fill {otp} in the input field
            }

            override fun onOtpConfirmed(sender: String, body: String, otp: String) {
                razorpay.otpSubmit(otp, this)
            }
        })
    }

    override fun otpResendResponse(otpResent: Boolean) {}

    override fun onOtpSubmitError(otpSubmitError: Boolean) {}
})

// Other code
```

## Step 2: Override onActivityResultReceived

When the application does not use the `RECEIVE_SMS` permission, we use the `SmsRetreiverClient` API provided by Google, which enables the user to give a one-time consent for the application to read the incoming message. 

The user’s response for the one-time consent is passed to the activity’s `onActivityResult` function. Since the SDK cannot override this, we request you send this data to us. 

```java: Java
void onActivityResult(String requestCode, String resultCode, Intent data)
```kotlin: Kotlin
fun onActivityResult(requestCode: String, resultCode: String, data: Intent)
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
   razorpay.onActivityResult(requestCode, resultCode, data);
}
```kotlin: Kotlin
override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
    super.onActivityResult(requestCode, resultCode, data)
    razorpay.onActivityResult(requestCode, resultCode, data)
}
```

## Step 3: Reset All Objects

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
razorpay.otpAssist.reset()
//other code
```

> **INFO**
>
> 
> **Handy Tips**
> 
> We recommend using the existing Razorpay object for the following reasons:
> 
> - You need not manage creating and deleting the `RazorpayOtpAssist` object. The Custom Checkout SDK handles this for you.
> - The Custom Checkout SDK becomes a singular entry point to use all Razorpay-powered features. This simplifies your integration process and improves the checkout experience for your customers.
>
