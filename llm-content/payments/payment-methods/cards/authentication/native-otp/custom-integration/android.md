---
title: Native OTP on Android Custom Checkout
description: Integrate the Razorpay Native OTP feature with Android custom checkout to avoid customer payment issues such as payment failures due to low internet speeds and bank page redirects.
---

# Native OTP on Android Custom Checkout

Razorpay Payment Gateway supports one-time passwords (OTPs) at the Checkout itself, preventing the customers from being redirected to the ACS page of their respective issuing banks.

## Advantages

Using the Native OTP feature, you can:
- Increase success rates by up to 4%.
- Reduce payment failures due to low internet speeds.
- Avoid failures due to redirects to bank pages.
- Offer a consistent experience on mobile and web checkout.

## Prerequisites

Before implementing the Native OTP feature, check the following prerequisites:

1. Log in to the Dashboard and generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md).
2. Integrate with the [Razorpay Android Custom SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom.md).

## Integration Steps

**1.1** [Update Razorpay Android Custom SDK version](#11-update-razorpay-android-custom-sdk-version). 

**1.2** [Implement `CardsFlowCallback` interface in the `getCardsFlow` function](#12-implement-cardsflowcallback-interface-in-getcardsflow-function). 

**1.3** [Call `razorpay.getCardOtpData(CardsFlowCallback)` Function.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/native-otp-integration.md#13-call-razorpaygetcardotpdata-cardsflowcallback-function) 

**1.4** [Handle Success and Error Events](#14-handle-success-and-error-events). 

**1.5** [Store Field in Server](#15-store-fields-in-server). 

**1.6** [Verify Payment Signature](#16-verify-payment-signature). 

### 1.1 Update Razorpay Android Custom SDK version

Update the [Android Custom SDK version](https://rzp-1415-prod-mobile.s3.amazonaws.com/customui/razorpay-android-3.9.3.aar). This feature is available from version 3.9.3 and above.

### 1.2 Implement CardsFlowCallback Interface in getCardsFlow Function

Implement the `CardsFlowCallback` interface in the `getCardsFlow` function in the payment activity. 
The SDK fires the `isNativeOtpEnabled` function and determines whether the native OTP flow is enabled for the BIN.

#### Sample Code

```java: Java
razorpay.getCardsFlow(payload, new CardsFlowCallback() {
        @Override
        public void isNativeOtpEnabled(boolean isNativeOtpEnabled) {
            if (isNativeOtpEnabled) {
                //this generates the OTP for the card holder
                razorpay.getCardOtpData(this);
            }else{
                //use your normal payment flow here
                sendRequest();
            }
        }
```kotlin: Kotlin
razorpay.getCardsFlow(payload, object : CardsFlowCallback() {
        fun isNativeOtpEnabled(isNativeOtpEnabled: Boolean) {
            if (isNativeOtpEnabled) {
                //this generates the OTP for the card holder
                razorpay.getCardOtpData(this)
            } else {
                //use your normal payment flow here
                sendRequest()
            }
        }
```

### 1.3 Call razorpay.getCardOtpData(CardsFlowCallback) Function

If Native OTP is enabled for BIN, you should call the `razorpay.getCardOtpData(CardsFlowCallback)` function. The SDK then fires the `otpGenerateResponse(boolean otpGenerated)` function and confirms if the OTP was successfully sent to the customer. Based on this information, you can display the generated OTP UI to the customer.

After entering the OTP, the customer can either:
- **Submit OTP** 

   The customer needs to submit the OTP for authenticating the payment. The customer receives the OTP through your application frontend. For card payments, the customer receives the OTP via their preferred notification medium, SMS or email.

   
> **INFO**
>
> 
>    **Handy Tips**
> 
>    Do not perform any validation on the length of the OTP since this can vary across banks. However, the OTP should not be blank.
>    

- **Request for OTP to be resent** 

   There could be situations when customers have to re-enter the OTP sent to them. The bank determines the number of retries that the user is allowed.

- **Cancel OTP** 

   Cancel the payment by cancelling the OTP.

#### Sample Code

```java: Java
@Override
        public void otpGenerateResponse(boolean otpGenerated) {
            //check if otp was generated successfully and show UI
            if (otpGenerated) {
                //show UI to the user here
                //will have submit_otp btn resend_otp btn & redirect_to_bank_page button
                razorpay.otpSubmit(otpEnteredByUser,this);//for submitting OTP entered by USER, if payment was successful, the onPaymentSuccess function will be called.
                razorpay.otpResend(this);//for resending the OTP to the user
                razorpay.redirectToBankPage();//to open webview and redirect the user to bank page no callback for this
            }else {
                //otp wasn't generated call getCardOtpData again
                razorpay.getCardOtpData(this);
            }
        }
        @Override
        public void otpResendResponse(boolean otpResent) {
            //status response for otp_resend function, change UI accordingly
        }
        @Override
        public void onOtpSubmitError(boolean otpSubmitError) {
            //status response for error during otp submit. Wrong OTP, network issue, or timeout, this function will be called with the boolean
            //change UI accordingly
        }
```kotlin: Kotlin
fun otpGenerateResponse(otpGenerated: Boolean) {
            //check if otp was generated successfully and show UI
            if (otpGenerated) {
                //show UI to the user here
                //will have submit_otp btn resend_otp btn & redirect_to_bank_page button
                razorpay.otpSubmit(otpEnteredByUser, this) //for submitting OTP entered by USER, if payment was successful, the onPaymentSuccess function will be called.
                razorpay.otpResend(this) //for resending the OTP to the user
                razorpay.redirectToBankPage() //to open webview and redirect the user to bank page no callback for this
            } else {
                //otp wasn't generated call getCardOtpData again
                razorpay.getCardOtpData(this)
            }
        }
        fun otpResendResponse(otpResent: Boolean) {
            //status response for otp_resend function, change UI accordingly
        }
        fun onOtpSubmitError(otpSubmitError: Boolean) {
            //status response for error during otp submit. Wrong OTP, network issue, or timeout, this function will be called with the boolean
            //change UI accordingly
        }
```

### 1.4 Handle Success and Error Events

You must handle the payment success and error events as shown in the code sample below:

```java: Java
try {
    razorpay.submit(data, new PaymentResultListener() {
        @Override
        public void onPaymentSuccess(String razorpayPaymentId) {
            // Razorpay payment ID is passed here after a successful payment
        }

        @Override
        public void onPaymentError(int code, String description) {
            // Error code and description is passed here
        }
    });

} catch (Exception e) {
    Log.e(TAG, "Error in submitting payment details", e);
}
```kotlin: Kotlin
        override fun onPaymentError(errorCode: Int, errorDescription: String?) {
        webView?.visibility = View.GONE
        outerBox?.visibility = View.VISIBLE
        Toast.makeText(this@PaymentOptions, "Error $errorCode : $errorDescription",Toast.LENGTH_LONG).show()
        Log.e(TAG,"onError: $errorCode : $errorDescription")
    }

    /**
     * Is called if the payment was successful
     * You can now destroy the webview
     */
    override fun onPaymentSuccess(rzpPaymentId: String?) {
        webView?.visibility = View.GONE
        outerBox?.visibility = View.VISIBLE
        Toast.makeText(this@PaymentOptions, "Payment Successful: $rzpPaymentId",Toast.LENGTH_LONG).show()
    }

```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> To reuse the Razorpay Checkout web integration inside a web view on Android or iOS, pass a [callback_url](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/callback-url.md) along with other checkout options to process the desired payment.
> 

#### Use `PaymentResultWithDataListener`

You have the option to implement `PaymentResultListener` or `PaymentResultWithDataListener` to receive callbacks for the payment result.

- `PaymentResultListener` provides only payment_id as the payment result.
- `PaymentResultWithDataListener` provides additional payment data such as email and contact of the customer, along with the `order_id`, `payment_id`, `signature` and more.

```java: Java
razorpay.submit(data, new PaymentResultWithDataListener() {
        @Override
        public void onPaymentSuccess(String razorpayPaymentId, PaymentData paymentData) {
            // Razorpay payment ID and PaymentData passed here after a successful payment
        }

        @Override
        public void onPaymentError(int code, String description) {
            // Error code and description is passed here
        }
    });

} catch (Exception e) {
    Log.e(TAG, "Error in submitting payment details", e);
}
```

### Step 5: Store the Fields in Server

@include integration-steps/store-fields

### Step 6: Verify Payment Signature

@include integration-steps/verify-signature

## Test the Integration

@include integration-steps/next-steps
