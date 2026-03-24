---
title: 1. Build Integration
description: Steps to integrate your Custom Flutter application with Razorpay Payment Gateway.
---

# 1. Build Integration

Follow these steps to integrate your Flutter application with the Razorpay Payment Gateway:

**1.1** [Install Razorpay Flutter Plugin](#11-install-razorpay-flutter-plugin).

**1.2** [Add Dependencies](#12-add-dependencies).

**1.3** [Import Package](#13-import-package).

**1.4** [Create Razorpay instance](#14-create-razorpay-instance).

**1.5** [Attach Event Listeners](#15-attach-event-listeners).

**1.6** [Create an Order in Server](#16-create-an-order-in-server).

**1.7** [Add Checkout Options](#17-add-checkout-options).

**1.8** [Open Checkout](#18-open-checkout).

**1.9** [Store Fields in Your Server](#19-store-fields-in-your-server).

**1.10** [Verify Payment Signature](#110-verify-payment-signature).

**1.11** [Verify Payment Status](#111-verify-payment-status).

> **INFO**
>
> 
> **Handy Tips**
> 
> After you complete the integration:
> 
> - Set up webhooks
> - Make test payments
> - Replace Test API keys with Live API keys
> - Integrate with other APIs

> Refer to the [post-integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/test-integration.md).
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> If you use M1 MacBook, you need to make [these changes](#m1-macbook-changes) in your `podfile`.
> 

## 1.1 Install Razorpay Flutter Plugin

[Download the plugin](https://pub.dev/packages/razorpay_flutter_customui) from Pub.dev.

## 1.2 Add Dependencies

Add the below code to `dependencies` in your app's `pubspec.yaml`:

```yml: Add Dependencies
razorpay_flutter_customui: 1.0.0
```
#### Add Proguard Rules (Android Only)

If you are using Proguard for your builds, you need to add the following lines to the Proguard files:

```java: Add Proguard Rules
-keepattributes *Annotation*
-dontwarn com.razorpay.**
-keep class com.razorpay.** {*;}
-optimizations !method/inlining/
-keepclasseswithmembers class * {
  public void onPayment*(...);
}
```

Know more about [Proguard rules](https://github.com/razorpay/razorpay-flutter/issues/42#issuecomment-550161626).

#### Get Packages

Run `flutter packages get` in the root directory of your app.

> **INFO**
>
> 
> **Handy Tips**
> 
> - For **Android**, ensure that the minimum API level for your app is 19 or higher.
>     

> - For **iOS**, ensure that the minimum deployment target for your app is iOS 10.0 or higher. Also, do not forget to enable bitcode for your project.
> 

## 1.3 Import Package

Use the below code to import the `razorpay_flutter_customui.dart` file to your project:

```yml: Import Package
import 'package:razorpay_flutter_customui/razorpay_flutter_customui.dart';
```

## 1.4 Create Razorpay instance

For Android, use the below code to create a Razorpay instance:

```java: Instantiate
_razorpay = Razorpay();
```

For iOS, you need to initialise and instantiate the SDK using the following method:

```swift: Initialise and Instantiate
@override
void initState() {
  _razorpay = Razorpay();
  _razorpay.initializeSDK(key);
}
```

## 1.5 Attach Event Listeners

The plugin uses event-based communication and emits events when payments fail or succeed.

- The event names are exposed via the constants `EVENT_PAYMENT_SUCCESS` and `EVENT_PAYMENT_ERROR` from the `Razorpay` class.
- Use the `on(String event, Function handler)` method on the Razorpay instance to attach event listeners.

```yml: Attach Event Listeners
_razorpay.on(Razorpay.EVENT_PAYMENT_SUCCESS, _handlePaymentSuccess);
_razorpay.on(Razorpay.EVENT_PAYMENT_ERROR, _handlePaymentError);
```

The handlers would be defined in the class as:

```yml: Handlers
void _handlePaymentSuccess(PaymentSuccessResponse response) {
  // Do something when payment succeeds
}

void _handlePaymentError(PaymentFailureResponse response) {
  // Do something when payment fails
}
```

## 1.6 Create an Order in Server

@include integration-steps/order-creation

## 1.7 Add Checkout Options

Pass the Checkout options. Ensure that you pass the `order_id` that you received in the response of the previous step.

```yml: Checkout Options
var options = {
                "key": key,
                "amount": 29935,
                "currency": "",
                "contact": "",
                "email": "",
                "order_id": "order_EMBFqjDHEEn80l", // Generate order_id using Orders API
                "description": "Fine T-Shirt",
                "method": "card",
                "card[name]": "Test User",
                "card[number]": "card number",
                "card[expiry_month]": 11,
                "card[expiry_year]": 30,
                "card[cvv]": 
            };
        _razorpay.submit(options);
```
You must pass these parameters in Checkout to initiate the payment.

@include checkout-parameters/custom

#### Enable UPI Intent on iOS

@include integration-steps/ios-upi-intent

## 1.8 Open Checkout

Use the below code to open the Razorpay checkout:

```yml: Open Razorpay Checkout
_razorpay.submit(options);
```

## 1.9 Store Fields in Your Server

@include integration-steps/store-fields

## 1.10 Verify Payment Signature

@include integration-steps/verify-signature

#### M1 MacBook Changes
If you use M1 MacBook, you need to make the following changes in your podfile.

> **INFO**
>
> 
> **Handy Tips**
> 
> Add the following code inside `post_install do |installer|`.
> 

```js: podfile
installer.pods_project.build_configurations.each do |config|
  config.build_settings["EXCLUDED_ARCHS[sdk=iphonesimulator*]"] = "arm64"
end
```

## 1.8 Verify Payment Status

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/test-integration.md)
