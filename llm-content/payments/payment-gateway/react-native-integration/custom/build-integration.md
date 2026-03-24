---
title: 1. Build Integration
description: Steps to integrate your React Native Razorpay custom UI SDK with Razorpay Payment Gateway.
---

# 1. Build Integration

Follow the steps given below to use the SDK and integrate with Razorpay Payment Gateway:

**1.1** [Install Razorpay React Native Custom UI SDK](#11-install-razorpay-react-native-custom-ui-sdk).

**1.2** [Link SDK](#12-link-sdk).

**1.3** [Create an Order in Server](#13-create-an-order-in-server).

**1.4** [Fetch Payment Methods](#14-fetch-payment-methods).

**1.5** [Import Razorpay module](#15-import-razorpay-module).

**1.6** [Add Razorpay Checkout Options to app.js File](#16-add-razorpay-checkout-options-to-appjs-file).

**1.7** [Store Fields in Your Server](#17-store-fields-in-your-server).

**1.8** [Verify Payment Signature](#18-verify-payment-signature).

**1.9** [Verify Payment Status](#19-verify-payment-status).

> **WARN**
>
> 
> **Watch Out!**
> 
> If you use M1 MacBook, you need to make [these changes](#m1-macbook-changes) in your `podfile`.
> 

## 1.1 Install Razorpay React Native Custom UI SDK

You can install the SDK using NPM, Yarn and Expo.

To install using NPM, use the command given below:

```js: Code using npm
npm install --save react-native-customui
```

To install using Yarn, use the command given below:

```js: Code using yarn
yarn add react-native-customui
```

To install using Expo, use the command given below:

```js: Code using expo
npx expo install react-native-customui
```

## 1.2 Link SDK

- [iOS](#ios)
- [Android](#android)

#### iOS

#### Automatic

**Automatic linking is available only for iOS.**  The steps are given below:

1. Install the Razorpay React Native Custom UI SDK using the npm command.

      ```js: Install
      $ npm install react-native-customui --save
      ```

2. Navigate to the iOS folder on the terminal and run `pod install`.

> **INFO**
>
> 
> **Handy Tips**
> 
> Ensure the **Razorpay.framework** file is added in the embedded binaries section and that the **Always Embed Swift Standard Binaries** option is set to **Yes** in **Build Settings**.
> 

#### Manual (via CocoaPods)

You can link the SDK manually using CocoaPods. To do this:

1. Add the following line to your build targets in your Podfile. 

      ```
      pod 'react-native-customui', :path => '../node_modules/react-native-customui'
      ```

2. Run the following command: 

      ```
      pod install
      ```

#### Manual (without CocoaPods)

If you do not use CocoaPods, follow these steps to link the SDK manually:

1. In XCode, in the Project Navigator:
    - Right click **Libraries**.
    - Add Files to `[your project's name]`.
    - Navigate to `node_modules/react-native-customui`.
    - Add the `.xcodeproj` file.
2. In the project navigator, select your project.
    - Add the `libRNDeviceInfo.a` from the `deviceinfo` project to your project's **Build Phases** ➜ **Link Binary With Libraries**.
    - Click the `.xcodeproj` file you added before in the Project Navigator and navigate to the **Build Settings** tab. Ensure **All** is selected, and not **Basic**.
    - Look for **Header Search Paths** and ensure it contains both `$(SRCROOT)/../react-native/React` and `$(SRCROOT)/../../React`.
    - Mark both as recursive. It should be marked **OK** by default.
3. Run your project using **cmd+R**.

#### Expo Application

After adding the `react-native-razorpay` package, use the option to prebuild the app. This generates the **iOS** platform folders in the project to use native-modules. 

```node: Run
npx expo prebuild
```

The application is installed on the device/emulator.

```node:
npx expo run:[ios] --device
```

#### Android

To link the SDK manually, follow these steps:

1. Open the `android/app/src/main/java/[...]/MainApplication.java` file. Add the following to the imports at the top of the file:

      ```java: Import
      import com.razorpay.rn.RazorpayPackage;
      ```

2. Add `new RazorpayPackage()` to the list returned by the `getPackages()` method.

3. Append the following lines to `android/settings.gradle`:

      ```java: Settings Gradle
      include ':react-native-razorpay'
      project(':react-native-razorpay').projectDir = new File(rootProject.projectDir,   '../node_modules/react-native-customui/android')
      ```

4. Insert the dependencies in `android/app/build.gradle`:

      ```java: Dependencies
      implementation project(':react-native-customui')
      ```

#### Expo Application

After adding the `react-native-razorpay` package, use the option to prebuild the app. This generates the **android** platform folders in the project to use native-modules. 

```node: Run
npx expo prebuild
```

The application is installed on the device/emulator.

```node:
npx expo run:[android] --device
```

## 1.3 Create an Order in Server

@include integration-steps/order-creation

## 1.4 Fetch Payment Methods

You can accept payments through UPI, credit and debit cards, netbanking and wallets, as per the methods enabled on your account.

  - When you use Razorpay React Native Standard SDK, you do not have to handle the availability of different payment methods.
  - When creating a Custom checkout form, you must ensure that only the methods activated for your account are displayed to the customer. To get a list of available payment methods, call `getPaymentMethods`. This fetches the list of payment methods asynchronously and returns the result in JSON format in the `onPaymentMethodsReceived` callback.

#### Sample Code
The following API is used to fetch all enabled payment methods for a given API Key ID:

```curl: Curl
https://api.razorpay.com/v1/methods?key_id=[Your_Key_ID]
```

```java: Java
razorpay.getPaymentMethods(new PaymentMethodsCallback() {
	@Override
	public void onPaymentMethodsReceived(String result) {
		JSONObject paymentMethods = new JSONObject(result);
	}

	@Override
	public void onError(String error){

	}
	});
});
```kotlin: Kotlin
 razorpay?.getPaymentMethods(object : PaymentMethodsCallback {
            override fun onPaymentMethodsReceived(result: String?) {
                /**
                 * This returns JSON data
                 * The structure of this data can be seen at the following link:
                 * https://api.razorpay.com/v1/methods?key_id=rzp_test_XXXXXXXXXXXXXX
                 *
                 */
                Log.d("Result", "" + result)
                inflateLists(result)
            }

            override fun onError(error: String?) {
                Log.e("Get Payment error", error)
            }
        })
```

Check the [additional support for payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/react-native-integration/custom/additional-features.md) available with the Razorpay React Native Custom SDK.

> **INFO**
>
> 
> **Handy Tips**
> 
> If you are using Subscriptions, you can pass the `subscription_id` in the options, which fetches subscription related details along with the payment method. This saves you a network call to get amount for that `subscription_id`. Know more about [Subscriptions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions.md).
> 

## 1.5 Import Razorpay Module

Import Razorpay module to your component:

```js: Import
import Razorpay from 'react-native-customui';
```

## 1.6 Add Razorpay Checkout Options to app.js File

Call the `Razorpay.open` method with the payment options. The method returns a JS Promise, where:
  - The then part corresponds to a successful payment.
  - The catch part corresponds to payment failure.

```js: Payment Options
 {
  var options = {
    description: 'Credits towards consultation',
    currency: 'INR',
    key_id: '',
    amount: '50000',
    email: 'gaurav.kumar@example.com',
    contact: '9999999123',
    method: 'netbanking',
    bank: 'HDFC'

  }
  Razorpay.open(options).then((data) => {
    // handle success
    alert(`Success: ${data.razorpay_payment_id}`);
  }).catch((error) => {
    // handle failure
    alert(`Error: ${error.code} | ${error.description}`);
  });
}}>
```

Know more about [passing callback URL](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/callback-url.md).

#### Checkout Parameters

`key` _mandatory_
: `string` API Key ID generated from the Dashboard.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as `295`.

   
> **WARN**
>
> 
>    **Watch Out!**
> 
>    As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>    

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. See the list of [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

   
> **INFO**
>
> 
>    **Handy Tips**
> 
>    Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>    

`description` _optional_
: `string` Description of the product shown in the Checkout form. It must start with an alphanumeric character.

`image` _optional_
: `string` Link to an image (usually your business logo) shown in the Checkout form. Can also be a **base64** string, if loading the image from a network is not desirable.

`order_id` _mandatory_
: `string` Order ID generated via the [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`method` _mandatory_
: `string` The payment method used by the customer on Checkout. 
Possible values:
    - `card` (default)
    - `upi` (default)
    - `netbanking` (default)
    - `wallet` (default)
    - `emi` (default)
    - `cardless_emi` (requires [approval](https://razorpay.com/support/#request))
    - `paylater` (requires [approval](https://razorpay.com/support/#request))
    - `emandate` (requires [approval](https://razorpay.com/support/#request))

`card` _mandatory if method=card/emi_
: `object` The details of the card that should be entered while making the payment.

    `number` 
    : `integer` Unformatted card number.

    `name`
    : `string` The name of the cardholder.

    `expiry_month`
    : `integer` Expiry month for card in MM format.

    `expiry_year`
    : `integer` Expiry year for card in YY format.

    `cvv`
    : `integer` CVV printed on the back of the card.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>       - CVV is not required by default for tokenised cards across all networks.
>       - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>       - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>       - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>       - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.        
>     

    `emi_duration`
    : `integer` Defines the number of months in the EMI plan.

`bank_account` _mandatory if method=emandate_
: The details of the bank account that should be passed in the request. These details include bank account number, IFSC code and the name of the customer associated with the bank account.

    `account_number`
    : `string` Bank account number used to initiate the payment.

    `ifsc`
    : `string` IFSC of the bank used to initiate the payment.

    `name`
    : `string` Name associated with the bank account used to initiate the payment.

`bank` _mandatory if method=netbanking_
: `string` Bank code. List of available banks enabled for your account can be fetched via [**methods**](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods/#fetch-supported-methods.md).

`wallet` _mandatory if method=wallet_
: `string` Wallet code for the wallet used for the payment. Possible values:
    - `payzapp` (default)
    - `olamoney` (requires [approval](https://razorpay.com/support/#request))
    - `phonepe` (requires [approval](https://razorpay.com/support/#request))
    - `airtelmoney` (requires [approval](https://razorpay.com/support/#request))
    - `mobikwik` (requires [approval](https://razorpay.com/support/#request))
    - `jiomoney` (requires [approval](https://razorpay.com/support/#request))
    - `amazonpay` (requires [approval](https://razorpay.com/support/#request))
    - `paypal` (requires [approval](https://razorpay.com/support/#request))
    - `phonepeswitch` (requires [approval](https://razorpay.com/support/#request))

`provider` _mandatory if method=cardless_emi/paylater_
: `string`  Name of the cardless EMI provider partnered with Razorpay.

  Available options for Cardless EMI (requires [approval](https://razorpay.com/support/#request)):
    - `hdfc`
    - `icic`
    - `idfb`
    - `kkbk`
    - `zestmoney`
    - `earlysalary`
    - `walnut369`

  Available options for Pay Later:
    - `lazypay`
    - `paypal`

`vpa` _mandatory if method=upi_
: `string` UPI ID used for making the payment on the UPI app.

  
> **WARN**
>
> 
>   **Deprecation Notice**
> 
>   UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [ migration documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/custom-integration.md) to switch to UPI Intent.
>   

`callback_url` _optional_
: `string` The URL to which the customer must be redirected upon completion of payment. The URL must accept incoming `POST` requests. The callback URL will have `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` as the request parameters for a successful payment.

`redirect` _conditionally mandatory_
: `boolean` Determines whether customer should be redirected to the URL mentioned in the
`callback_url` parameter. This is mandatory if `callback_url` parameter is used. Possible values:
    - `true`: Customer will be redirected to the `callback_url`.
    - `false`: Customer will not be redirected to the `callback_url`.

## 1.7 Store Fields in Your Server

@include integration-steps/store-fields

## 1.8 Verify Payment Signature

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

## 1.9 Verify Payment Status

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/react-native-integration/custom/test-integration.md)
