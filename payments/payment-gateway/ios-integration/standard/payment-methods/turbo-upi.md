---
title: Integrate with Turbo UPI
description: Steps to integrate Razorpay Turbo UPI with your app.
---

# Integrate with Turbo UPI

With Razorpay Turbo UPI, businesses experience faster and simpler payments. It condenses the payment process from 5 steps to just 1, eliminating app redirections. Enjoy a seamless in-app payment experience, reduce dependencies on third-party UPI apps, and gain complete visibility of the payment journey.

You can seamlessly integrate Turbo UPI with Razorpay iOS Standard SDK. Explore the full potential of [Razorpay Turbo UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/turbo-upi.md) and know How it Works.

## Prerequisites

- Integrate with [Razorpay iOS Standard SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/standard/integration-steps.md). Ensure that you integrate with SDK version 1.0.0 or higher.
- Import the following frameworks:
    - Common library/NPCI framework 
    - Axis olive framework
    - Razorpay Turbo UPI framework

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> The minimum supported iOS version for Turbo UPI is 11 and above.
> 

## Onboarding Flow

Ensure your customers [onboard with Razorpay Turbo UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/turbo-upi.md#2-onboarding-flow) to get started.

## Installation

Turbo UPI wrapper plugin is available as a cocoapod, which can be integrated with any iOS application with a minimum deployment target of iOS 11 later. Add the code given below in the project’s `podfile` to get this cocoapod:

```json:
pod razorpay-turbo-pod
```

## Turbo UI SDK Integration

Follow these steps to integrate with Razorpay Turbo UPI:

1. Initialise the Checkout object to enable the Turbo UPI functionality.

    ```swift: Swift 
    // The `razorpay` variable can be declared a Global Variable in the ViewController.

    var razorpay: RazorpayCheckout?

    self.razorpay = RazorpayCheckout.initWithKey(checkoutKey ?? "",  andDelegateWithData: self, plugin: RazorpayTurboUPI.turboUIPlugin())

    ```objectivec: Objective C
    razorpay = [RazorpayCheckout initWithKey:@"Your_Key_ID" andDelegate: self withPaymentWebView: webView plugin: [RazorpayTurboUPI turboUIPlugin]];
    ```

2. Use the following code to link the newly created UPI account with your app. This function can be called from any application section, offering multiple entry points for customers to link their UPI account with your app. Linking it in advance allows customers to pay directly with the linked `UpiAccount` without repeating the linking process.

    ```swift: Swift 
    self.razorpay?.upiTurbo?.linkNewUpiAccount(mobileNumber: , color: , completionHandler: { response, error in
        // Handle the onboarded accounts Response
    })

    ```objectivec: Objective C
    [razorpay.upiTurbo linkNewUpiAccountWithMobileNumber:@"919000000000" color:@"0xFF1234" completionHandler:^(id _Nullable upiAccounts, NSError * _Nullable error) {
    }];
    ```

> **INFO**
>
> 
> **Payment Flow**
> 
> Razorpay SDK will handle all the changes related to `UpiTurbo` internally. To integrate with the payment flow, [pass payment option and display the checkout form](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/standard/integration-steps.md#14-pass-payment-options-and-display-checkout-form).
> 

## Non-Transactional Flow

Razorpay provides a single exposed function that allows you to manage linked UPI accounts and access all non-transactional flows seamlessly. 

    
### Manage UPI Accounts

         The SDK manages the linked `UpiAccounts` on the application by triggering `manageUpiAccounts()`, which follows the following internal non-transaction flows for `UpiAccounts`:

         - **Fetch balance**: Check the customer's account balance. 
         - **Change UPI pin**: Provide the customer the ability to change their UPI PIN. 
         - **Reset UPI pin**: Let your customers reset the pin for their account.
         - **Delete the account from the application**: Let your customers delink, that is, remove a selected UPI account from your application.

         ```swift: Swift 
         self.razorpay?.upiTurbo?.manageUpiAccount(mobileNumber: , color: "")

         ```objectivec: Objective C
         [razorpay.upiTurbo manageUpiAccountWithMobileNumber:@"919000000000" color:@"0xFF1234"];
         ```
        

## Models Exposed from the SDKs

The SDKs given below provide access to exposed models for seamless integration.

    
### TurboError

         

         Error | Description
         ---
         `errorCode` | Types of error codes - `BAD_REQUEST_ERROR`: Failure from the client's end (SDK).
- `GATEWAY_ERROR`: Failure either from the Secure Component or the Bank.
- `SERVER_ERROR`: Failure at PSP.

         ---
         `errorDescription` | Brief description of the error.
         ---
         `errorReason` | Specifies the specific reason for the error.
         ---
         `errorSource` | Indicates the origin of the error. Possible values: - `gateway`
- `issuer_bank`
- `beneficiary_bank`
- `customer_psp`
- `customer`
- `internal`

         ---
         `errorStep` |  Highlights the stage where the error occurred.

         

         [Refer to the list of possible error reasons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/standard/payment-methods/turbo-upi/error-codes.md).
        

## Go-Live Checklist

For iOS users, outgoing device binding SMS is editable by default. To ensure these SMS messages are non-editable, you must complete the following steps:

### Requesting UPI Device Validation Entitlement

    
### 1. Submit a Request on the Apple Developer Portal

         - Log in to the [Apple Developer Portal](https://developer.apple.com/contact/request/upi-device-validation). 
         - Fill out the necessary details to request permission for the `setUPIVerificationCodeSendCompletion` API, which allows secure, non-editable content for device registration SMS.
         - Await approval from Apple.
        

    
### 2. Submit Details to NPCI

         Once Apple approves the entitlement, share the request details with NPCI for their approval. Use the format given below for submitting the details:
            - Name of the App:
            - Functionality (UPI or CBDC App): UPI
            - App ID:
            - Team ID:
            - Request ID:
            - Bundle ID:
        

    
### 3. Follow the Guidelines for Implementation

         - Ensure your app supports iOS 17 and above.
         - Use the `setUPIVerificationCodeSendCompletion` API to comply with NPCI requirements.
