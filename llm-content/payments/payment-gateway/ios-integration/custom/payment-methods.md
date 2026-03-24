---
title: Additional Support For Payment Methods
description: Additional support features available for card, netbanking, EMI and more.
---

# Additional Support For Payment Methods

The Razorpay iOS Custom SDK lets you integrate the supported payment methods on your iOS app's Checkout form.

## Fetch Payment Methods

Use the [Fetch Payment Methods API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration/#14-fetch-payment-methods.md) to fetch the payment methods available for your account.

Below are the sample payloads for each payment method.

## Debit and Credit Card

Add the following code where you want to initiate a card payment:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR", // We support international currencies.
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "card",
    "card[name]": "Gaurav Kumar",
    "card[number]": "4386289407660153",
    "card[expiry_month]": 06,
    "card[expiry_year]": 30,
    "card[cvv]": "123"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR", // We support international currencies.
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"card",
    @"card[name]": @"Gaurav Kumar",
    @"card[number]": @"4386289407660153",
    @"card[expiry_month]": @"06",
    @"card[expiry_year]": @"30",
    @"card[cvv]": @"123"
};

[_razorpay authorize: options];
```

Check the [list of supported cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods#supported-cards.md).

## Bank Transfer

This payment method allows you to display your Customer Identifier details on checkout. Your customers can make online bank transfers to this account.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

There are no specific request parameters to be passed. Instead, you must pass the `fetchVirtualAccount` method for your Customer Identifier to get created and the details to appear on the checkout. Know more about [integrating bank transfer with Custom Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/bank-transfer/custom-integration.md).

 to get this feature activated on your account.

There are no specific request parameters to be passed. Instead, you must pass the `fetchVirtualAccount` method for your Customer Identifier to get created and the details to appear on the checkout. Know more about [integrating bank transfer with Custom Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/bank-transfer/custom-integration.md).

## EMI on Debit and Credit Cards

Add the following code where you want to initiate an EMI payment:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "emi",
    "emi_duration": 9,
    "card[name]": "Gaurav Kumar",
    "card[number]": "4386289407660153",
    "card[expiry_month]": 06,
    "card[expiry_year]": 30,
    "card[cvv]": "123"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"emi",
    @"emi_duration": @"9",
    @"card[name]": @"Gaurav Kumar",
    @"card[number]": @"4386289407660153",
    @"card[expiry_month]": @"06",
    @"card[expiry_year]": @"30",
    @"card[cvv]": @"123"
};

[_razorpay authorize: options];
```

Check the list of supported [debit card](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/debit-card-emi#supported-banks-for-debit-card-emis.md) and [credit card](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/credit-card-emi#supported-banks-for-credit-card-emis.md) EMI providers.

## Cardless EMI

Add the following code where you want to initiate a cardless EMI payment:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "cardless_emi",
    "provider": "earlysalary"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"cardless_emi",
    @"provider": @"earlysalary"
};

[_razorpay authorize: options];
```

Check the [list of supported cardless EMI providers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/cardless-emi#supported-payment-partners.md).

## Netbanking

Add the following code where you want to initiate a netbanking payment:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR", // We support international currencies.
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "netbanking",
    "bank": "HDFC"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR", // We support international currencies.
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"netbanking",
    @"bank": @"HDFC"
};

[_razorpay authorize: options];
```

Check the [list of supported banks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/netbanking.md).

## Pay Later

Add the following code where you want to initiate a Pay Later payment:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb", // From response of Step 3
    "method": "paylater",
    "provider": "icic"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"paylater",
    @"provider": @"icic"
};

[_razorpay authorize: options];
```

Check the [list of Pay Later providers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/pay-later#providers.md).

## Wallet

Add the following code where you want to initiate a wallet payment:

```swift: ViewController.swift
let options = [
    "amount": "100",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_4xbQrmEoA5WJ0G",
    "contact": "9000090000",
    "method": "wallet",
    "wallet": "mobikwik",
   ]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100",
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"wallet",
    @"wallet": @"mobikwik"
};

[_razorpay authorize: options];
```

## UPI

Specify `upi` the `method` parameter for UPI payments. The SDK supports two flows:
- Collect
- Intent

#### Collect Flow

Customers enter their `vpa` or [phone number](#upi-payments-using-phone-number) on your UI and complete the payments on their respective UPI apps in collect flow. 

You can now pass the `vpa` parameter in the `upi` array as shown below.

@include payment-methods/upi-collect-deprecated/custom

#### Sample Code

The sample code below sends a collect request to the `gaurav.kumar@exampleupi` handle:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "upi",
    "_[flow]": "collect",
    "vpa": "gaurav.kumar@exampleupi"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"upi",
    @"_[flow]": @"collect",
    @"vpa": @"gaurav.kumar@exampleupi"
};

[_razorpay authorize: options];
```

  
### UPI Payments Using Phone Number

     You can accept UPI payments using phone number for the collect flow. Follow the steps given below: 

     1. You must collect the customer's phone number from your end.
     2. Check if any `vpa` is associated with the given number and get the `vpa_token` for that number using the sample code given below:
        ```swift: ViewController.swift
        self.razorpay?.isValidVpa("9000090000", withSuccessCallback: { response in
            // VPA Validation Successful
            // get and store response.vpa_token for initiating payment
            // you will get response.masked_vpa in this response which you can show to the end user
        }, withFailure: { responseError in
            print(responseError)
            // Error: no VPA associated with the given number
        })
        ```objectivec: ViewController.m
        [razorpay isValidVpa:@"9000090000" withSuccessCallback:^(NSDictionary * _Nonnull success) {
            // VPA Validation Successful
            // get and store response.vpa_token for initiating payment
            // you will get response.masked_vpa in this response which you can show to the end
        } withFailure:^(NSDictionary * _Nonnull error) {
            NSLog(@"%@", error.description);
            // Error: no VPA associated with the given number
        }];
        ```
     3. Pass the `vpa_token` parameter in the `upi` array as shown below:
        ```swift: ViewController.swift
        let options: [String: Any] = [
            "amount": 5000, 
            "currency": "INR",
            "email": "gaurav.kumar@example.com",
            "contact": "9000090000",
            "order_id": "order_DBJOWzybf0XXXX",
            "method": "upi",
            "_[flow]": "collect",
            "vpa_token": "f731951149df8903d374b117f921ab41"
        ]
        razorpay.authorize(options)
        ```objectivec: ViewController.m
        NSDictionary *options = @{
            @"amount": @"5000",
            @"currency": @"INR",
            @"email": @"gaurav.kumar@example.com",
            @"contact": @"9000090000",
            @"order_id": @"order_4xbQrmEoA5XXXX",
            @"method": @"upi",
            @"_[flow]": @"collect",
            @"vpa_token": @"f731951149df8903d374b117f921ab41"
        };
        [_razorpay authorize: options];
        ```
    

#### Intent Flow
Provide your customers with a better payment experience by enabling UPI Intent on your app's Checkout form. In the UPI Intent flow:

1. You have to fetch the list of UPI supported apps and show it in your app so that the customer can see only valid apps.
2. After the customer selects the app, you have to pass the app name in `options`, with the key `upi_app_package_name` value. Possible values for `upi_app_package_name` are:
    - `google_pay`
    - `phonepe`
    - `paytm`
    - `cred` 
3. The customer enters their UPI PIN to complete the transaction.
4. The customer returns to your app manually without redirection.

#### Step 1: Update the info.plist File

Your iOS app must seek permission from the device to open the UPI PSP app that the customer selects on the Checkout. For this, you must make the following changes to your iOS app's info.plist file:

```xml: info.plist
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

#### Step 2: Get a List of UPI Supported Apps
This sample code fetches the list of apps on the customer's device that support UPI payments.

```swift: ViewController.swift
RazorpayCheckout.getAppsWhichSupportUpi { (upiApps) in
    print(upiApps)
}
```objectivec: ViewController.m
[RazorpayCheckout getAppsWhichSupportUpiWithHandler:^(NSArray * upiApps) {
    NSLog(@"%@", upiApps);
}];
```

The sample code below invokes the UPI intent where the user can select the desired application.

Ensure that the `upi_app_package_name` is passed from the `getAppsWhichSupportUpi()` method value. Otherwise, it will not pass the validation.

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "upi",
    "_[flow]": "intent",
    "upi_app_package_name": "google_pay"
]
razorpay?.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"upi",
    @"_[flow]": @"intent",
    @"upi_app_package_name": @"google_pay",
};

[_razorpay authorize: options];
```

#### UPI Intent on Recurring Payments

Configure and initiate a recurring payment transaction on UPI Intent:

```swift: ViewController.swift
let options: [String:Any] = [
    "key": "YOUR_KEY_ID",   
    "order_id": "order_DBJOWzybfXXXX", 
    "customer_id": "cust_BtQNqzmBlXXXX",
    "contact": "9000000000",
    "amount": 10000, // Amount should match the order amount 
    "email": "gaurav.kumar@example.com",
    "currency": "INR",
    "recurring": 1, // This key value pair is mandatory for Intent Recurring Payment.
    "upi_app_package_name": "",
    "method": "upi",
    "_[flow]": "intent"
]
```objectivec: ViewController.m
NSDictionary *options = @{
    @"key": @"YOUR_KEY_ID",
    @"order_id": @"order_DBJOWzybfXXXX",
    @"customer_id": @"cust_BtQNqzmBlXXXX",
    @"contact": @"9000090000",
    @"amount": @(10000), // Amount should match the order amount 
    @"email": @"gaurav.kumar@example.com",
    @"currency": @"INR",
    @"recurring": @(1), // This key value pair is mandatory for Intent Recurring Payment.
    @"upi_app_package_name": @"",
    @"method": @"upi",
    @"_[flow]": @"intent"
};
```

#### Turbo UPI

Make UPI payments a faster, 2-step experience for your customers with Razorpay's Turbo UPI SDK.

1. [Turbo UPI Headless Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-ui.md)
2. [Turbo UPI UI Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-noui.md)

Know more about the [Customer Onboarding](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi#customer-onboarding-flow.md) and [Integration Steps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi#next-steps.md).

## CRED

@include payment-methods/upi-collect-deprecated/custom

@include payment-methods/cred/ios-custom
