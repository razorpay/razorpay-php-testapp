---
title: Integrate with Turbo UPI
description: Steps to integrate Razorpay Turbo UPI with your app.
---

# Integrate with Turbo UPI

- **Turbo UPI Cordova Standard SDK**: Discover new features, updates and deprecations related to Turbo UPI on Cordova Standard Checkout (since Jan 2024).

With Razorpay Turbo UPI, businesses experience faster and simpler payments. It condenses the payment process from 5 steps to just 1, eliminating app redirections. Enjoy a seamless in-app payment experience, reduce dependencies on third-party UPI apps, and gain complete visibility of the payment journey.

You can seamlessly integrate Turbo UPI with Razorpay Cordova Standard SDK. Explore the full potential of [Razorpay Turbo UPI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/upi/turbo-upi.md) and know how it works.

![Turbo UPI Standard Checkout Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/turbo-upi-flow.jpg.md)

    
### Prerequisites

         1. Integrate with [Razorpay Cordova Standard SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/cordova-integration.md).

         2. Import the following frameworks:
             - Razorpay Cordova Standard SDK
             - Razorpay Turbo Wrapper Plugin SDK (maven)
             - Razorpay Turbo Core SDK
             - Razorpay Turbo UI SDK
             - Razorpay SecureComponent SDK
             - Bank SDK

         3. Enable data binding in your `app.gradle`.

            ```json: Data binding
            {
             "android": {
                 // Containing other settings
                 "buildFeatures": {
                     "dataBinding": true
                 }
              }
            }
            ```
        

## Onboarding Flow

Ensure your customers [onboard with Razorpay Turbo UPI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/upi/turbo-upi/#onboarding-flow.md) to get started.

## Turbo UPI SDK Integration

Follow these steps to integrate with Razorpay Turbo UPI:

1. Use the code given below to initialise the SDK.

    ```java: Initialise
    RazorpayCheckout.initUpiTurbo("rzp_test_0wFRWIZnH65uny")
    ```

2. Use the following code to link the newly created UPI account with your app. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app.

    ```js: Link New UPI Account
    RazorpayCheckout.upiTurbo.linkNewUpiAccount("mobileNo", "color", function (upiAccounts) {
        // handle data
    }, function(error) {
        // handle error
    });
    ```
    
    
        
### Request Parameters

             `mobileNumber` _mandatory_
             : `string` Mobile number of the customer.

             `color` _optional_
             : `string` Colour in HEX format.
            

        
### Response Parameters

             
             Parameters | Description
             ---
             `function(upiAccounts)` | This function is triggered if the list is fetched successfully. The `upiAccounts` can be empty to indicate that no accounts have been linked yet.
             ---
             `function(error)` | This function is triggered in case of an error, and the error object will be received.
             
            

    

    - Handle payment failure responses, displaying important details such as error codes, error descriptions, and metadata. This function is responsible for handling and logging information in the event of a payment error.

    ```js: Payment Failure Response Handling
    var cancelCallback = function(error) {
        /**
         * error contains two values:
         * 1. Error Code
         * 2. Error Description
        **/
  
        // handle failure
    };
    ```

    - Handle successful payment responses, displaying key information like order id, payment id, and signature. This code manages and logs details when a payment transaction is successful.

    ```js: Payment Success Response Handling
    var successCallback = function(response) {
        /**
         * response contains three values:
         * 1. Order ID
         * 2. Payment ID
         * 3. Signature
        **/
  
        // handle success
    };
    ```

3. To accept payments, call Standard Checkout’s `submit` method with the following payload:
 
    ```js: Submit Payment Details
    var rzpOptions = {
        amount: 2000,
        currency: "INR",
        prefill: {
            contact: "1234567890",
            email: "gaurav.kumar@example.com"
        },
        theme: {
            color: "#063970"
        },
        send_sms_hash: true,
        retry: {
            enabled: false,
            max_count: 4
        }
    };

    RazorpayCheckout.open(rzpOptions, successCallback, cancelCallback);
    ```
    
    
        
### Request Parameter

             `payload` _mandatory_
             : `variable` Payload for initiating transaction.
            

        
### Response Parameters

             
             Parameters | Description
             ---
             `successCallback` | It is triggered upon successful completion of the payment, providing access to a response object.
             ---
             `cancelCallback` | It is invoked in the event of a failure, providing access to an error object.
             
            

    

### Non-Transactional Flow

Razorpay provides a single exposed function that allows you to manage linked UPI accounts and access all non-transactional flows seamlessly. 

![View the non-transactional flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/turbo-upi-non-transactional.jpg.md)

    
### Manage UPI Accounts

         The SDK manages the linked `UpiAccounts` on the application by triggering `manageUpiAccounts()`. The sequence of steps is as given below:

         - **Fetch balance**: Check the customer's account balance. 
         - **Change UPI PIN**: Provide the customer the ability to change their UPI PIN. 
         - **Reset UPI PIN**: Let your customers reset the PIN for their account.
         - **Delete the account from the application**: Let your customers delink, that is, remove a selected UPI account from your application.

         ```js: Java
         RazorpayCheckout.upiTurbo.manageUpiAccounts("mobileNo", "color", function(error) {
             // handle error
         });
         ``` 

         
            
                Request Parameters
                
                `mobileNumber` _mandatory_
                : `string` Mobile number of the customer.

                `color` _optional_
                : `string` Colour in HEX format.
                

            
### Response Parameter

                
                Parameters | Description
                ---
                `function(error)` | This function is triggered in case of an error, and the error object will be received.
                
                

         
        
    

### Models Exposed from the SDKs

The SDKs given below provide access to exposed models for seamless integration.

    
### Error

         

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
         `errorSource` | Indicates the origin of the error.
         ---
         `errorStep` |  Highlights the stage where the error occurred.

         

         [Refer to the list of possible error reasons](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/cordova-integration/payment-methods/turbo-upi/error-codes.md).
         
        

    
### UpiAccount

         
         Fields | Return Type | Description
         ---
         `accountNumber` | String | Masked account number.
         ---
         `ifsc` | String | IFSC of the bank.
         ---
         `bankLogoUrl` | String | Image URL of the bank logo.
         ---
         `bankName` | String | Name of the bank.
         ---
         `bankPlaceholderUrl` | String | Image URL of the bank logo placeholder.
         
        

    
### Response

         
         Fields | Return Type | Description
         ---
         `paymentId` | String | Payment id.
         ---
         `orderId` | String | Order id.
         ---
         `signature` | String | Signature of the transaction.
