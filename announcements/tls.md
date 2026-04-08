---
title: Announcement Regarding TLS
description: Payment processing is not allowed on TLS 1.0. Configure TLS 1.1 or TLS 1.2 on the device to continue processing payments.
---

# Announcement Regarding TLS

> **WARN**
>
> 
> **Watch Out!**
> 
> According to PCI regulations, payment processing is not allowed on TLS 1.0. To process a payment, TLS 1.1 or TLS 1.2 should be configured on the device. In case of Android devices, TLS 1.1 and TLS 1.2 both are rolled out together. 
> 
> Payments via Razorpay will not work on devices that do not have TLS 1.2 configured.
> 
> 

## Which devices have TLS 1.2 enabled?

As per official Android documentation, TLS 1.2 is supported in API level 16+ and enabled by default in API level 20+. Please note that for API levels 16, 17, 18 and 19, its not guaranteed that TLS 1.2 will be enabled. So if TLS 1.2 is not enabled in any of these devices then the SDK will give an error for the same and users will not be able to complete payments.

## How would the existing apps be affected?

If the device does not have TLS 1.2, the payment will fail with an error message given in `onPaymentError` callback. The devices which have TLS 1.2 would not be affected.

## Upcoming SDK changes

We will update `minSdkVersion` to 19 in our SDK and will support Android devices with API level 19 and above.

If your app wants to support any device which has lower API version, then you may override the `minSdkVersion` of our SDK. In such a case, if devices do not have TLS 1.2, payment will still fail. You can check by calling `Checkout.isDeviceSupported()` method, if the SDK is triggered for a device without TLS 1.2, the SDK will give the error ("The device does not have TLSv1.2") in `onPaymentError` callback. Please refer to sample code given below to override minSdkVersion of the SDK.

```xml

```

## FAQs

  
### 1. Being a Merchant, do I need to take any action?

     Unless you are using Java/.NET on your server backend or your customers are using any of the above mentioned device platforms, there is no action required from your end.
    

  
### 2. How do I know if a customer is affected?

     The Checkout popup won't open for the customer's browser/app. Please ask them to upgrade their browser or device.
    

  
### 3. Is Android affected as well?

     Yes, we can no longer support our Android SDK on Android versions below 4.4 (4.4 is supported). This is less than 0.5% of payments that we see on the platform.
    

  
### 4. Is there a new Android SDK release?

     Yes. Our new release sets the minimum version of our SDK to Android 4.4
    

If you have any further queries, please mail our [Integrations Team](mailto:integrations@razorpay.com).
