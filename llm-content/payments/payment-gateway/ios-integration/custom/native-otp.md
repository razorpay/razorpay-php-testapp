---
title: 1. Native OTP Integration
description: Integrate the Razorpay Native OTP feature with iOS Custom Checkout.
---

# 1. Native OTP Integration

Razorpay payment gateway supports one-time passwords (OTPs) in the Checkout itself, preventing the customers from being redirected to the ACS page of their respective issuing banks.

## Advantages

Using the Native OTP feature, you can:
- Increase success rates.
- Reduce payment failures due to low internet speeds.
- Avoid failures due to redirects to bank pages.
- Offer a consistent experience on mobile and web checkout.

## Prerequisites

Before implementing the Native OTP feature, check the following prerequisites:

1. Log in to the Dashboard and generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md).
2. Integrate with the [Razorpay iOS Custom SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom.md).

## Integration Steps

**1.1** [Initialise the Razorpay iOS Custom SDK](#11-initialise-the-razorpay-ios-custom-sdk)

**1.2** [Check Native OTP enablement using `getCardsFlow` function](#12-check-native-otp-enablement-using-the-getcardsflow)

**1.3** [Generate OTP using the `razorpay.getCardOtpData` function](#13-generate-otp-using-the-razorpaygetcardotpdata-function)

**1.4** [Handle Success and Error Events](#14-handle-success-and-error-events)

**1.5** [Store Details in Server](#15-store-the-fields-in-server)

**1.6** [Verify Payment Signature](#16-verify-payment-signature)

### 1.1 Initialise the Razorpay iOS Custom SDK

Use the code given below to initialise the SDK.

```swift:Initialise SDK
razorpay = RazorpayCheckout.initWithKey(,
andDelegate:,
withPaymentWebView:) 
```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> WebView is used to fall back to the current Custom UI flow or redirect to bank flow.
> 
> 

### 1.2 Check Native OTP Enablement Using the getCardsFlow Function

Use the `getCardsFlow` function to determine whether the native OTP flow is enabled for the card BIN.

Given below is the sample code.

```swift: getCardsFlow
razorpay.getCardFlows(options){ otp in 
if otp == true { }  //Native OTP is enabled on the card
else { }            //Fallback to current Custom UI flow
}

```

The card details are passed in the options dictionary, as shown below:

```swift: Payment details
{
  "method": "card",
  "card": {
    "name": "Gaurav Kumar",
    "number": "4386289407660153",
    "cvv": "111",
    "expiry_month": "11",
    "expiry_year": "2023"
  },
  "amount": 100,
  "contact": "9000090000",
  "email": "gaurav.kumar@example.com",
  "currency": "INR"
}
```

### 1.3 Generate OTP Using the razorpay.getCardOtpData Function

If Native OTP is enabled for the BIN, you should call the `razorpay.getCardOtpData` function. The function callback returns a boolean and informs whether the OTP was successfully sent to the customer or not. Based on this information, you can display the generated OTP UI to the customer.

Given below is the sample code:

```swift: getCardOtpData
razorpay.getCardOtpData { otp_generated in 
if otp_generated == true { }    //Display Native OTP UI
else { } //Fallback to current Custom UI flow
}
```

After the OTP is generated, the customer can choose to:
- Submit the OTP.
- Request for the OTP to be resent.
- Cancel the OTP.
- Navigate to the bank page.

#### Submit the OTP

The customer needs to submit the OTP for authenticating the payment. The customer receives the OTP through your application frontend. For card payments, the customer receives the OTP via their preferred notification medium, SMS or email.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Do not perform any validation on the length of the OTP since this can vary across banks. However, the OTP should not be blank.
> 

Given below is the function to be invoked when customer clicks the submit button:
   
```swift: Submit OTP
func submitRazorpayOtp(otp){
    razorpay.submitOtp(otp)
}   
```

#### Resend OTP 

There could be situations when customers have to re-generate the OTP. Given below is the function to be invoked when the customer clicks the resend button: 
   
```swift: Resend OTP
func resendRazorpayOtp(){
    razorpay.resendOtp {otp_resent in
        if otp_resent {}
    }
}
```

#### Cancel the OTP

Cancel the payment by cancelling the OTP. 
Given below is the function to be invoked when customer clicks the cancel button:
   
```swift: Cancel OTP
func cancelRazorpayPayment(){
    razorpay.userCancelledPayment()
    }
```

#### Redirect to Bank Page

Customers can navigate to the bank page by clicking the redirect button. You need to:

1. Display the payment WebView passed earlier while initialising the SDK.
2. Invoke the `redirectToBankPage()` function.

```swift: Invoke redirect function
func redirectToBankPage(){
razorpay.redirectToBankPage()
}
```

### 1.4 Handle Success and Error Events

You must handle the payment success and error events using the `RazorpayPaymentCompletionProtocol` delegate methods:

```swift: Payment Success
func onPaymentSuccess(_ payment_id:String, andData response:[[AnyHashable]:Any])
```swift: Payment Failure
func onPaymentError(_ code: Int32, description:String, andData response:[[AnyHashable] :Any])
```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> To reuse the Razorpay Checkout web integration inside a WebView on Android or iOS, pass a [callback_url](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/callback-url.md) along with other checkout options to process the desired payment.
> 

## 1.5 Store the Fields in Server

@include integration-steps/store-fields

## 1.6 Verify Payment Signature

@include integration-steps/verify-signature
