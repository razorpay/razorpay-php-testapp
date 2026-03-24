---
title: Integrate Turbo UPI Headless
description: Steps to integrate Razorpay Turbo UPI Headless with your app.
---

# Integrate Turbo UPI Headless

---
title: Integrate Turbo UPI Headless
desc: Steps to integrate Razorpay Turbo UPI Headless with your app.
index: false
--- 

With Razorpay Turbo UPI, businesses experience faster and simpler payments. It condenses the payment process from 5 steps to just 1, eliminating app redirections. Enjoy a seamless in-app payment experience, reduce dependencies on third-party UPI apps, and gain complete visibility of the payment journey.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> Currently, Flutter SDK is supported only for Android.
> 
> 

    
### Prerequisites

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number, app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/android-turbo-sample-app` - sample app repository. In this repository, you will find the AAR files (libraries for Turbo). The AARs on the main branch are for the UAT environment, and the ones on the prod branch are for the production environment.

             These are the important files in the sample app repo:
             - `app/libs`: All libraries (Bank, SecureComponent and Turbo) common for headless SDK.
             - `app/build.gradle`: All transitive dependencies needed to integrate Turbo SDK.

         2. Integrate with [Razorpay Flutter Custom Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/custom/build-integration.md).

         3. Import the following frameworks:
             - Razorpay Turbo Wrapper Plugin SDK (maven)
             - Razorpay Turbo Core SDK
             - Razorpay SecureComponent SDK
             - Bank SDK

         4. Add the following lines to your Android project's `gradle.properties` file:
             - `android.enableJetifier=true`
             - `android.useAndroidX=true`

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          Currently, the Flutter SDK is available for Android, while iOS support is under development and will be available soon.
>          

        

## 1. Integration Steps

1. Use the code given below to initialise the SDK.

    ```yml: Import Package
    import 'package:razorpay_flutter/razorpay_flutter.dart'; 
     // Create a Razorpay instance
    razorpay = Razorpay("YOUR_KEY_ID");
    ```

2. Use the following code to link the newly created UPI account with your app. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app.

    ```java: Link UPI Account
    razorpay.upiTurbo.linkNewUpiAccount("mobileNumber");
    ```
    
    
        
### Request Parameter

             
             Parameter | Description
             ---
             `mobileNumber` | Mobile number of the customer.
              
            

    

    - Initialise the instance to handle the event using the code given below:
    
    ```java: Instantiate
    razorpay.on(Razorpay.EVENT_UPI_TURBO_LINK_NEW_UPI_ACCOUNT,
    _handleLinkNewUpiAccountFlows);
    ```

    - Handle dynamic responses to perform specific actions, including error handling and interactions with the integration, based on 'type' and 'action' properties.

    
> **WARN**
>
> 
>     **Watch Out!**
>         
>     It is mandatory to add the import statement within the `linkNewUpiAccount` function for **RazorpayCard** access.
>     

        

    ```yml: Attach Event Listeners
    import 'package:razorpay_flutter_customui/card.dart' as RazorPayCard;

    void _handleLinkNewUpiAccountFlows(dynamic response) {
     if (response["error"] != null) {
        Error error = response["error"];
        error.errorCode;
        error.errorDescription;
        return;
    }

    switch (response["action"]) {
     case "ASK_FOR_PERMISSION":
        razorpay.upiTurbo.askForPermission();
        break;
     case "LOADER_DATA":
        / Use this trigger to easily show background process happening in the SDK during onboarding
        break;
     case "STATUS":
        razorpay.upiTurbo.getLinkedUpiAccounts(
            customerMobile: mobileNumber,
            onSuccess: (List upiAccounts) {},
            onFailure: (Error error) {},
        );
        break;
     case "SELECT_SIM":
        List sims = response["data"];
        // Show dialog with a list of sims
        razorpay.upiTurbo.register(sim: sims[0]);
        break;
     case "SELECT_BANK":
        AllBanks allBank = response["data"];
        List popularBanks = allBank.popularBanks;
        List banks = allBank.banks;

        // Show dialog with bank list
        razorpay.upiTurbo.getBankAccounts(bank: banks[0]);
        break;
     case "SELECT_BANK_ACCOUNT":
        List bankAccounts = response["data"];
        razorpay.upiTurbo.selectedBankAccount(bankAccount: bankAccounts[0]);
        break;
     case "SETUP_UPI_PIN":
        var card = RazorPayCard.Card(
            lastSixDigits: lastSixDigits,
            expiryYear: expiryYear,
            expiryMonth: expiryMonth,
        );
        razorpay.upiTurbo.setupUpiPin(card: card);
        break;
     default:
      // Wrong action message
     }
    }
    ```

3. If your customer has already linked the UPI account, use the following code to fetch it. If there are no linked UPI accounts, an empty list is returned.

    ```java: Get Linked UPI Account
    razorpay.upiTurbo.getLinkedUpiAccounts(customerMobile: mobileNumber,
      onSuccess: (List upiAccounts){
         //Display on boarded UpiAccounts.     
      },
      onFailure: (Error error) {
         //Display error message to user.             
      }
    );
    ```

    
        
### Request Parameter

             
             Parameter | Description
             ---
             `mobileNumber` | Mobile number of the customer.
              
            

        
### Response Parameters

             
             Parameter | Description
             ---
             `onSuccess` | This function is triggered if the list is fetched successfully. accList can be empty to indicate that no accounts have been linked yet.
             ---
             `onFailure` | This function is triggered in case an error is thrown during the retrieval process, either by the Razorpay SDK or the Bank SDK.
              
            

    

4. To accept payments, call Custom Checkout’s `submit` method with the following payload:
 
    ```java: Submit Payment Details
    Map payload = {
     "key": "[YOUR_KEY_ID]",
     "currency": "INR",
     "amount": 100,
     "contact": "9000090000",
     "method": "upi",
     "email": "gaurav.kumar@example.com",
     "upi": {
         "flow": "in_app"
     }
    };

    Map turboPayload = {
     "upiAccount": getUpiAccountStr(upiAccounts[0]),
     "payload": payload,
    };

    String getUpiAccountStr(UpiAccount upiAccount) {
        return jsonEncode(UpiAccount(
            accountNumber: upiAccount.accountNumber,
            bankLogoUrl: upiAccount.bankLogoUrl,
            bankName: upiAccount.bankName,
            bankPlaceholderUrl: upiAccount.bankPlaceholderUrl,
            ifsc: upiAccount.ifsc,
            pinLength: upiAccount.pinLength,
            vpa: upiAccount.vpa,
        ).toJson());
    }

    razorpay.submit(turboPayload);
    ```

    
        
### Request Parameter

             
             Parameter | Description
             ---
             `turboPayload` | Payload for initiating transaction.
              
            

        
### Response Parameters

             
             Parameter | Description
             ---
             `onSuccess` | This function is triggered if the list is fetched successfully. accList can be empty to indicate that no accounts have been linked yet.
             ---
             `onFailure` | This function is triggered in case an error is thrown during the retrieval process, either by the Razorpay SDK or the Bank SDK.
              
            

    

    - Initialise the instance to handle the event, using the code given below:

    ```java: Instantiate
    razorpay.on(Razorpay.EVENT_PAYMENT_SUCCESS, _handlePaymentSuccess);
    razorpay.on(Razorpay.EVENT_PAYMENT_ERROR, _handlePaymentError);
    ```

    - Print payment success and error responses by attaching event listeners to payment events as given below:

    ```yml: Attach Event Listeners
    void _handlePaymentSuccess(Map response) {
        print('Payment Success Response : $response');
    }

    void _handlePaymentError(Map response) {
        print('Payment Error Response : $response');
    }
    ```

### Non-Transactional Flow

You can directly interact with the exposed methods of the Turbo Framework to perform the non-transactional flows listed below.

    
### Fetch Balance 

         Fetch the customer's account balance. Call `getBalance()` on the bank account object received from `upiAccount`.
 
         ```java: Fetch Balance
         razorpay.upiTurbo.getBalance(upiAccount: upiAccount,
             onSuccess: (AccountBalance accountBalance){
             },
             onFailure: (Error error) {
             }
         );
         ```

            
                
                    Request Parameter
                    
                    
                    Parameter | Description
                    ---
                    `upiAccount` | Provides a bank account.
                     
                    

                
### Response Parameters

                    
                    Parameter | Description
                    ---
                    `onSuccess` | AccountBalance object received in the response.
                    ---
                    `onFailure` | This function is triggered in case of an error. An Error object will be received.
                     
                    

            
        
    
    
### Change UPI PIN

         Provide the customer with the ability to change their UPI PIN. Call `changeUpiPin()` on the bank account object received from `UpiAccount`.

         ```java: Change UPI PIN
         razorpay.upiTurbo.changeUpiPin(upiAccount: upiAccount,
             onSuccess: (UpiAccount upiAccount){
             },
             onFailure: (Error error) {
             }
         );
         ```

         
            
                Request Parameters
                 
                 
                 Parameter | Description
                 ---
                 `upiAccount` | Provides a bank account. 
                  
                 

             
### Response Parameters

                 
                 Parameter | Description
                 ---
                 `onSuccess` | UpiAccount object received in the response.
                 ---
                 `onFailure` | This function is triggered in case of an error. An Error object will be received.
                  
                 

         
        
    
    
### Reset UPI

         Let your customers reset the PIN for their account.

         ```java: Reset UPI
         razorpay.upiTurbo.resetUpiPin(upiAccount: upiAccount, card: card,
             onSuccess: (UpiAccount upiAccount){
             },
             onFailure: (Error error) {
             }
         );
         ```

         
             
                 Request Parameters
                 
                 
                 Parameter | Description
                 ---
                 `upiAccount` | Provides a bank account. 
                 ---
                 `card` | Provides a card.
                  
                 

             
### Response Parameters

                 
                 Parameter | Description
                 ---
                 `onSuccess` | UpiAccount object received in the response.
                 ---
                 `onFailure` | This function is triggered in case of an error. An Error object will be received.
                  
                 

         
        
    
    
### Delink

         Let your customers delink, that is, remove a selected UPI account from your application.

         ```java: Delink
         razorpay.upiTurbo.delink(upiAccount: upiAccount,
             onSuccess: (Empty empty){
             },
             onFailure: (Error error) {
             }
         );
         ```

         
             
                 Request Parameter
                 
                 
                 Parameter | Description
                 ---
                 `upiAccount` | Provides a bank account. 
                  
                 

             
### Response Parameters

                 
                 Parameter | Description
                 ---
                 `onSuccess` | Empty object will be received.
                 ---
                 `onFailure` | This function is triggered in case of an error. An Error object will be received.
                  
                 

         
        
    

### Models Exposed from the SDKs

The SDKs given below provide access to exposed models for seamless integration.

    
### BankAccount

         

         Fields | Return Type | Description
         ---
         `maskedAccountNumber` | String | Masked account number.
         ---
         `beneficiaryName` | String | Name of the account holder.
         ---
         `type` | String | The account type. Possible values are savings and current.
         --- 
         `bank` | Bank | Bank Object.
         
        

    
### Bank

         

         Fields | Return Type | Description
         ---
         `ifsc` | String | IFSC of bank.
         ---
         `name` | String | Name of bank.
         ---
         `imageURL` | String | Image URL of bank logo.
         ---
         `bankPlaceholderUrl` | String | Image URL for bank logo placeholder.
         
        

    
### AccountBalance

         

         Method | Return Type | Description
         ---
         `id` | long | Balance Account id.
         ---
         `balance` | String | Balance amount in paise.
         ---
         `currency` | String | Currency in INR.
             
        

    
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

         

         [Refer to the list of possible error reasons](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/custom/payment-methods/turbo-upi/error-codes.md).
        

    
### UpiAccount

         

         Method | Return Type | Description
         ---
         `accountNumber` | String | Masked account number.
         ---
         `ifsc` | String | IFSC of the bank.
         ---
         `bankLogoUrl` | String |  Image URL of the bank logo.
         ---
         `bankName` | String | Name of the bank.
         --- 
         `bankPlaceholderUrl` | String | Image URL for bank logo placeholder.
         
        

    
### SIM

         

         Method | Return Type | Description
         ---
         `id` | String | SIM id used to target SIM card for binding.
         ---
         `provider` | String | Network provider name.
         ---
         `slotNumber` | Integer | SIM slot number. Possible values are `0` and `1`.
         ---
         `number` | String | Mobile number stored in SIM card.
         
        

    
### Card

         

         Method | Return Type | Description
         ---
         `lastSixDigits` | String | Last six digits of the debit card number.
         ---
         `expiryYear` | String | Expiry year. Format: `YY`.
         ---
         `expiryMonth` | String | Expiry month.
         
        

    
### AllBanks

         

         Method | Return Type | Description
         ---
         `popularBanks` | String | Returns the list of the top 8 banks.
         ---
         `banks` | String | Returns a list of all banks.
             
        

## 2. Test Integration

We recommend the following:
- Complete the integration on UAT before using the prod builds. 
- Perform the UAT using the Razorpay-provided API keys.

## 3. Go-live Checklist

Complete these steps to take your integration live:

1. You should get your app id whitelisted by Razorpay to test on prod. 
    
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number and app whitelisted.    
>     

    
1. Import the prod library from the GitHub repository → `https://github.com/upi-turbo/android-turbo-sample-app/tree/prod/app/libs` prod branch.

1. Add Proguard rules:

    - `keepclassmembers,allowobfuscation class * { 
        @com.google.gson.annotations.SerializedName ;
       }`
    - `keepclassmembers enum * { *; }`
    - `keepclassmembers class * {
        @android.webkit.JavascriptInterface ;
       }`
    - `dontwarn com.razorpay.**`
    - `keep class com.razorpay.** {*;}`
    - `keep class com.olivelib.** {*;}`
    - `keep class com.olive.** {*;}`
    - `keep class org.apache.xml.security.** {*;}`
    - `keep interface org.apache.xml.security.** {*;}`
    - `keep class org.npci.** {*;}`
    - `keep interface org.npci.** {*;}`
    - `keep class retrofit2.** { *; }`
    - `keep class okhttp3.** { *; }`

1. Replace the UAT credential with the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.
