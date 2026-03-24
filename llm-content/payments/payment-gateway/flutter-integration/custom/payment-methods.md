---
title: Payment Methods
description: Integrate different payment methods in Razorpay Flutter Custom SDK.
---

# Payment Methods

You can use the Razorpay Flutter Custom SDK to integrate the supported payment methods on your Flutter app's Checkout form.

## Debit and Credit Card

For card payments, `method` should be specified as `card`. 

#### Sample Code

The sample code shown below allows the checkout to accept a card payment of :

```java: Card
var options = {
                "key": key,
                "amount": 29935,
                "currency": "",
                "contact": "",
                "email": "",
                "order_id": "order_EMBFqjDHEEn80l", // Generate order_id using Orders API,
                "description": "Fine T-Shirt"
                "method": "card",
                "card[name]": "Test User",
                "card[number]": "card number",
                "card[expiry_month]": 11,
                "card[expiry_year]": 30,
                "card[cvv]": ,
                "display_logo": "0"
            };
        _razorpay.submit(options);
```

## Netbanking

For netbanking, `method` should be specified as `netbanking` and an additional field `bank` must specify the bank with its respective bank code. Use `getPaymentMethods` to retrieve the list of supported bank codes.

#### Sample Code

The sample code shown below allows the checkout to perform a netbanking transaction for a payment of ₹299.35:

```java: Netbanking
netBankingOptions = {
      "key": key,
      "amount": 29935,
      "currency": "INR",
      "email": "gaurav.kumar@example.com",
      "order_id": "",
      "contact": "9009009009",
      "method": "netbanking",
      "bank": "icic"
    };
_razorpay.submit(netBankingOptions!);

```

## UPI

For UPI payments, `method` should be specified as `upi`. The SDK supports two flows:

1. Intent
2. Collect

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

```java: UPI Intent
 
final supportedUpiApps = _razorpay.getAppsWhichSupportUpi();
 
var options = {
       "key": key,
       "amount": 29935,
       "currency": "INR",
       "email": "gaurav.kumar@example.com",
       "contact": "9009009009",
       "method": "upi",
       "_[flow]": "intent",
       "upi_app_package_name": "paytm",
       "order_id": ""
};
_razorpay.submit(options);
```

> **INFO**
>
> 
> **Handy Tips**
> 
> If your application targetSdkVersion is 30 or above, add the following code in your app's manifest file to support the UPI Intent flow.
> 
> ```xml: AndroidManifest.xml
> 
>     
>     
>     
>               Specific intents you query for,
>          eg: for a custom share UI
>     -->
>     
>         
>     
> 
> ```
> 

View the complete list of [UPI supported apps and their package names](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/supported-apps.md).

#### Collect Flow

In Collect Flow, the collect request will be sent to the UPI app for the specified `vpa`. 

#### Sample Code

The sample code below will send collect request to `gaurav.kumar@exampleupi` handle:

```java: UPI Collect
 
var options = {
       "key": key,
       "amount": 29935,
       "currency": "INR",
       "email": "gaurav.kumar@example.com",
       "order_id": "",
       "contact": "9009009009",
       "method": "upi",
       "_[flow]": "collect",
       "vpa": "gauravkumar@exampleupi"
};
_razorpay.submit(options);

```

## CRED

Given below is the sample code when the payment method is `app` and provider is `cred`.

#### Intent Flow

- Check if the Cred app is installed on the customer’s phone. This can be detected by calling `isCredAppAvailable` method.

```js:Intent Flow
onPressed: () {
   final credAppInstalled = _razorpay.isCredAppAvailable();   
var options = {
           "key": key,
           "amount": 29935,
           "currency": "INR",
           "email": "gaurav.kumar@example.com",
           "contact": "9009009009",
           "app_present": true,
           "method": "app",
           "provider": "cred",
           "order_id": ""
           if (credAppInstalled) {
             'callback_url': 'flutterCustomUI://'
           }
       };
_razorpay.payWithCred(options); 
}
```

- Handle the Cred app callback in the `AppDelegate`. To do this:
    1. Open `Runner.xcworkspace`.
    2. Go to `AppDelegate.swift`.
    3. Add the `open url: method` as given below:

```java: Open URL
override func application(_ app: UIApplication, open url: URL, options: [UIApplication.OpenURLOptionsKey : Any] = [:]) -> Bool {
        DispatchQueue.main.asyncAfter(deadline: .now() + 2.0) {
            NotificationCenter.default.post(name: NSNotification.Name(rawValue: "CRED_CALLBACK_NOTIFICATION"), object: nil, userInfo: ["response":url.absoluteString])
    }
        return false
    }
```

#### Collect Flow

Check if the Cred app is installed on the customer’s phone. This can be detected by calling `isCredAppAvailable` method.

```js: Collect Flow

var options = {
           "key": key,
           "amount": 29935,
           "currency": "INR",
           "email": "gaurav.kumar@example.com",
           "contact": "9009009009",
           "app_present": false,
           "method": "app",
           "provider": "cred",
           "order_id": ""
       };
_razorpay.submit(options); 
```

## Pay Later

Given below is the sample code for the payment method `paylater`. Know more about [paylater](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later/custom-integration.md).

```js: Paylater
var options = {
      "key": key,
      "amount": 29935,
      "currency": "INR",
      "email": "gaurav.kumar@example.com",
      "contact": "9009009009",
      "method": "paylater",
      "provider": "",
      "order_id": ""
    };
_razorpay.submit(options!);

```

## Cardless EMI

Given below is the sample code for the payment method `cardless_emi`. Know more about [Cardless EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi/custom-integration.md).

```js: Cardless EMI
var options = {
      "key": key,
      "amount": 29935,
      "currency": "INR",
      "email": "gaurav.kumar@example.com",
      "contact": "9009009009",
      "method": "cardless_emi",
      "provider": "",
      "order_id": ""
    };
_razorpay.submit(netBankingOptions!);
```

## EMI

Given below is the sample code for the payment method `emi`.

```js: EMI
var options = {
       "key": key,
       "amount": 100,
       "card[cvv]": 123,
       "card[expiry_month]": 11,
       "card[expiry_year]": 25,
       "card[name]": "Test User",
       "card[number]": "4386289407660153",
       "contact": "9900990099",
       "currency": "INR",
       "display_logo": "0",
       "email": "gaurav.kumar@example.com",
       "description": "Fine T-Shirt",
       "method": "emi",
       "emi_duration": 9,
       "order_id": ""
};
_razorpay.submit(options);
```
