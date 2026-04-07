---
title: UPI Intent Flow for iOS SDK
description: Use iOS UPI Intent SDK to accept UPI payments from your iOS device customers.
---

# UPI Intent Flow for iOS SDK

Use the iOS Standard SDK to support UPI Intent payments on your iOS apps. We support UPI Intent on iOS for these PSP apps:
- Google Pay
- PhonePe
- Paytm

## Prerequisites
- Sign up for a Razorpay account.
- [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.

## iOS Standard Checkout

To enable UPI Intent on your iOS app's Standard Checkout:

1. Ensure that the [latest version of the iOS Standard SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/standard.md#list-of-razorpay-ios-standard-sdk-versions-last) is integrated with your app.
2. Your iOS app must seek permission from the device to open the UPI PSP app that the customer selects on Checkout. For this, you must make the following changes in your iOS app's info.plist file.

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

## UPI Intent on Recurring Payments

Configure and initiate a recurring payment transaction on UPI Intent:

```swift: ViewController.swift
let options: [String:Any] = [
  "key": "YOUR_KEY_ID",  
  "order_id": "order_DBJOWzybfXXXX", 
  "customer_id": "cust_BtQNqzmBlXXXX",  
  "prefill": [
    "contact": "+919000090000",
    "email": "gaurav.kumar@example.com"
  ],
  "image": "https://spaceplace.nasa.gov/templates/featured/sun/sunburn300.png",
  "amount": 10000,  // Amount should match the order amount 
  "currency": "INR",
  "recurring": 1  // This key value pair is mandatory for Intent Recurring Payment.
]
```objectivec: ViewController.m
NSDictionary *options = @{
    @"key": @"YOUR_KEY_ID",
    @"order_id": @"order_DBJOWzybfXXXX",
    @"customer_id": @"cust_BtQNqzmBlXXXX",
    @"prefill": @{
        @"contact": @"+919000090000",
        @"email": @"gaurav.kumar@example.com"
    },
    @"image": @"https://spaceplace.nasa.gov/templates/featured/sun/sunburn300.png",
    @"amount": @(10000), // Amount should match the order amount 
    @"currency": @"INR",
    @"recurring": @(1)  // This key value pair is mandatory for Intent Recurring Payment.
};
```
