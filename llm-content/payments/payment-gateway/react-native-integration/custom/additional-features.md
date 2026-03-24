---
title: Additional Support for Payment Methods
description: Additional support features available for Cards, Netbanking, Wallets and more.
---

# Additional Support for Payment Methods

Use the Razorpay React Native SDK to integrate supported payment methods on the Checkout form of your app as per your business requirements. Here are some **additional methods** provided by the SDK for the integration and usage of payment methods:

- [Fetch Payment Methods](#fetch-payment-methods)
- [Card Utilities](#card-utilities)
- [Logo](#logo)

- [CRED](#cred)

## Fetch Payment Methods

Use the [Fetch Payment Methods API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration.md#14-fetch-payment-methods) to fetch the payment methods available for your account.

Below are the sample payloads for each payment method.

Given below are the sample codes for fetching netbanking and UPI payment methods.

## Netbanking

For netbanking payments, specify the `method` as `netbanking`.

```java: JavaScript
Razorpay.initRazorpay('');
    Razorpay.getPaymentMethods().then(paymentMethods => {
        console.log(paymentMethods.netbanking);
});
```

## UPI 

For UPI payments, specify the `method` as `upi`.

```java: JavaScript
Razorpay.getAppsWhichSupportUPI().then(response => {
  for (const responseElement of response.data) {
    console.log(responseElement.appName);
  }
});
```
The SDK supports two flows:

1. [Intent](#intent-flow)
2. [Collect](#collect-flow)

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#intent-flow). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md).
> 

#### Intent Flow

Follow the steps given below to use UPI Intent flow in Razorpay's React Native Custom UI plugin:

1. Call `getAppsWhichSupportUPI` function to get all the available apps in customer's device.

    ```java: JavaScript
    Razorpay.getAppsWhichSupportUPI((data) => {
      console.log("Supported Apps", data);
    });
    ```

2. Ensure that the `upi_app_package_name` is passed from the `getSupportedUPIApps()` method value otherwise, it will not pass the validation.

    ``` java: JavaScript
    var options = {
      "description": "Credits towards consultation",
      "currency": "INR",
      "key_id": "[YOUR_KEY_ID]",
      "amount": "5000", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
      "email": "gauravkumar@example.com",
      "contact": "9000090000",
      "method": "upi",
      "upi_app_package_name": "google_pay",
      "_[flow]": "intent"
    };
    ```

3. Your iOS app must seek permission from the device to open the UPI PSP app that the customer selects on the Checkout. For this, you must make the following changes in your iOS app's `info.plist` file.

    ```java: XML
     LSApplicationQueriesSchemes
     
         tez
         phonepe
         paytmmp
         credpay
         mobikwik
         in.fampay.app
         bhim
         amazonpay
         navi
         kiwi
         payzapp
         jupiter
         omnicard
         icici
         popclubapp
         sbiyono
         myjio
         slice-upi
         bobupi
         shriramone
         indusmobile
         whatsapp
         kotakbank
     
    ```

Check the complete list of [UPI supported apps and their package names](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/supported-apps.md).

#### Collect Flow

In Collect Flow, the collect request is sent to the UPI app for the specified `vpa`. 

#### Sample Code

The sample code below sends a collect request to `gauravkumar@exampleupi` handle.

```java: JavaScript
var options = {
  "description": "Credits towards consultation",
  "currency": "INR",
  "key_id": "[YOUR_KEY_ID]",
  "amount": "5000", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "vpa": "gauravkumar@exampleupi",
  "method": "upi",
  "_[flow]": "collect"
};
```

## Card Utilities

You can use these methods for card payment method integration.

#### Fetch Card Network

The SDK provides a method to get the card network name of the card number. 

- At least 6 digits of the card number are required to identify the network. 

- Possible values returned by this method are `visa`, `mastercard`, `maestro16`, `amex`, `rupay`, `maestro`, `diners` and `unknown`.

- If it cannot identify the network, it returns `unknown`.

```java: JavaScript
//needs Razorpay.initRazorpay()
Razorpay.getCardsNetwork('4386289407660153').then(resp => {
  console.log(resp.data); // returns visa
});
```

#### Card Number Validation

The SDK provides a checksum-based method to determine if the entered card number is valid or not.

```java: JavaScript
//needs Razorpay.initRazorpay()
Razorpay.isValidCardNumber('4386289407660153').then(resp => {
  console.log('is card number valid:');
  console.log(resp.data); // returns true or false
});
```

#### Fetch Card Number Length for Card Network

The SDK provides a method to get the card number length for a specific card network.

```java: JavaScript
Razorpay.getCardNetworkLength('visa').then(resp => {
  console.log(resp.data); // returns 16 for visa
});
```

## Validate VPA

The SDK provides a method to determine if the entered Virtual Payment Address (VPA) is valid or not. A failure response is triggered when the `vpaAddress` is empty or the device is not connected to data to make the validation.

```java: JavaScript
//needs Razorpay.initRazorpay()
Razorpay.isValidVpa('a@okaxis').then(resp => {
  console.log('is vpa valid');
  console.log(resp); // returns {"customer_name": null, "success": true, "vpa": "a@okaxis"} or {
    "code": "BAD_REQUEST_ERROR",
    "description": "Invalid VPA. Please enter a valid Virtual Payment Address",
    "field": "vpa",
    "metadata": Object {},
    "reason": "invalid_vpa",
    "source": "customer",
    "step": "payment_initiation",
  } for invalid vpa
});
```

## Logo

Given below are the sample codes for fetching various payment method logo URLs.

#### Fetch Bank Logo URL

The SDK provides a method to fetch the bank logo's URL here, `bankCode` is the bank's code; you will be able to get it from the response received in `onPaymentMethodsReceived` callback.

```java: JavaScript
//needs Razorpay.initRazorpay()
Razorpay.getBankLogoUrl('UTIB').then(resp => {
  console.log(resp.data); // returns banklogo url: https://cdn.razorpay.com/bank/UTIB.gif
});
```

#### Fetch Wallet Logo URL

The SDK provides a method to get the wallet logo's URL.

```java: JavaScript
//needs Razorpay.initRazorpay()
Razorpay.getWalletLogoUrl('mobikwik').then(resp => {
  console.log(resp.data); returns URL: https://cdn.razorpay.com/wallet/mobikwik.png
});
```

#### Fetch Wallet Square Logo URL

The SDK provides a method to get the wallet's square-shaped logo's URL.

```java: JavaScript
//needs Razorpay.initRazorpay()
//returns square wallet logo url
Razorpay.getSqWalletLogoUrl('mobikwik').then(resp => {
  console.log(resp.data); returns url for Square Logo
});
```

## CRED

The SDK provides a method to determine if the CRED app is installed on the customer's mobile device.

```java: JavaScript
//needs Razorpay.initRazorpay()
Razorpay.isCredAppAvailable().then(resp => {
  console.log('isCredAppAvailable');
  console.log(resp.data); returns true or false
});
```
