---
title: Integrate Turbo UPI TPV
description: Know how to integrate Razorpay Turbo UPI Headless TPV with your app.
---

# Integrate Turbo UPI TPV

Third-party validation (TPV) of bank accounts is mandatory for businesses in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Broking and Mutual Funds. You can accept customer payments by integrating with the Turbo UPI Headless - TPV SDK.

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

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number, app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/android-turbo-sample-app` - sample app repository. 

             - In this repository, you will find the AAR files (libraries for Turbo) and the sample app source code to help you with the integration. 
             - The AARs on the main branch are for the UAT environment, and the ones on the prod branch are for the production environment.

             These are the important files in the sample app repo:
             - `app/libs`: All libraries (Bank, SecureComponent and Turbo) common for headless SDK.
             - `app/build.gradle`: All transitive dependencies needed to integrate the Turbo SDK.

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
> 
>          **Watch Out!**
> 
>          - `minSDKversion` for using Turbo UPI is currently 19 and cannot be overwritten.
>          - API Key Usage for Different Environments:
>             - Use the `rzp_test_0wFRWIZnH65uny` API key id for testing on the UAT environment.
>             - Use the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.
>          - As a compliance requirement, you need to get approval from Google for **READ_SMS** permission. Refer [to the Google article](https://support.google.com/googleplay/android-developer/answer/10208820?hl=en) for more details.
>          

        

## 1. Integration Steps

Given below are the steps:

    
### Step 1: Whitelist Customer Bank Accounts *(Optional)*

         You can whitelist (also known as allowlist) your customer's bank accounts to ensure that only those accounts are considered during customer onboarding. By whitelisting the accounts at the start, you can avoid the bank account linking during payment. Use the Customer APIs to create customers and add their bank account details.

         For example, if a customer, Gaurav, has two bank accounts ABC and XYZ, you can use the APIs to create a customer id and link the bank accounts to that id. You can then pass this customer id at the time of payment.

         Follow these steps.
         
            
                Step 1.1: Create a Customer
                
                 Use this endpoint to create or add a customer with basic details such as name and contact details.

                 ```cURL: Request
                 curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
                 -X POST https://api.razorpay.com/v1/customers \
                 -H "Content-Type: application/json" \
                 -d '{
                     "name": "Gaurav Kumar",
                     "contact": "9123456780",
                     "email": "gaurav.kumar@example.com",
                     "fail_existing": "0",
                     "notes": {
                         "notes_key_1": "Tea, Earl Grey, Hot",
                         "notes_key_2": "Tea, Earl Grey… decaf."
                     }
                 }'

                 ```json: Success Response
                 {
                     "id" : "cust_1Aa00000000004",
                     "entity": "customer",
                     "name" : "Gaurav Kumar",
                     "email" : "gaurav.kumar@example.com",
                     "contact" : "9123456780",
                     "gstin": null,
                     "notes": {
                         "notes_key_1":"Tea, Earl Grey, Hot",
                         "notes_key_2":"Tea, Earl Grey… decaf."
                     },
                     "created_at ": 1234567890
                 }

                 ```json: Failure Response
                 {
                  "error": {
                    "code": "BAD_REQUEST_ERROR",
                    "description": "Contact number should be at least 8 digits, including country code",
                    "source": "business",
                    "step": "NA",
                    "reason": "invalid_contact_number",
                    "metadata": {},
                    "field": "contact"
                  }
                 }
                 ```

                 
                    
                        Request Parameters
                        
                         Razorpay identifies a customer by a unique customer identifier generated at the time of creation. This allows Razorpay to take action on a particular customer on behalf of the merchant for example, send an invoice, set recurring payments, and others./create-customer-req
                        

                    
### Response Parameters

                          Razorpay identifies a customer by a unique customer identifier generated at the time of creation. This allows Razorpay to take action on a particular customer on behalf of the merchant for example, send an invoice, set recurring payments, and others./create-customer-res
                        

                 
                
            
            
### Step 1.2: Add Customer's Bank Account

                 The following endpoint adds the customer's bank accounts.

                 ```cURL: Request
                 curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
                 -X POST https://api.razorpay.com/v1/customers/:customer_id/bank_account \
                 -H "Content-Type: application/json" \
                 -d '{
                        "ifsc_code": "UTIB0000194",
                        "account_number": "11214311215411",
                        "beneficiary_name": "Gaurav",
                        "beneficiary_address1": "address 1",
                        "beneficiary_address2": "address 2",
                        "beneficiary_address3": "address 3",
                        "beneficiary_address4": "address 4",
                        "beneficiary_email": "gaurav.kumar@gmail.com",
                        "beneficiary_mobile": "9900990099",
                        "beneficiary_city": "Bangalore",
                        "beneficiary_state": "KA",
                        "beneficiary_country": "IN"
                    }' 

                 ```json: Response
                 {
                    "id": "ba_LSZht1Cm7xFTwF",
                    "entity": "bank_account",
                    "ifsc": "ICIC0001207",
                    "bank_name": "ICICI Bank",
                    "name": "Gaurav Kumar",
                    "notes": [],
                    "account_number": "XXXXXXXXXXXXXXX0434"
                 }
                 ```

                 
                    
                        Path Parameter
                        
`customer_id` _mandatory_
: `string` Customer id of the customer whose bank account is to be added.

                        

                    
### Request Parameters

                         
`account_number` _mandatory_
: `string` Customer's bank account number. For example, `11214311215411`.

`beneficiary_name` _mandatory_
: `string` The name of the beneficiary associated with the bank account.

`beneficiary_address1` _optional_
: `string` The virtual payment address.

`beneficiary_email` _optional_
: `string` Email address of the beneficiary. For example, `gaurav.kumar@example.com`.

`beneficiary_mobile` _optional_
: `string` Mobile number of the beneficiary.

`beneficiary_city` _optional_
: `string` The city of the beneficiary. 

`beneficiary_state` _optional_
: `string` The state of the beneficiary.

`beneficiary_country` _optional_
: `string` The country of the beneficiary.

`beneficiary_pin` _optional_
: `integer`  The pin code of the beneficiary's address.

`ifsc_code` _mandatory_
: `string` The IFSC of the bank branch associated with the account.
                        

                    
### Response Parameters

`bank_accounts`
: `array` An array containing bank account details.

    `id`
    : `string` Unique identifier of the bank account.

    `entity`
    : `string` The type of entity, which in this case is `bank_account`.

    `ifsc`
    : `string` The IFSC of the bank branch associated with the account.

    `bank_name`
    : `string` The name of the bank.

    `name`
    : `string` The name associated with the bank account.

    `notes`
    : `object` Set of key-value pairs that can be used to store additional information about the payment.

    `account_number`
    : `integer` Customer's bank account number. For example, `11214311215411`.
                        

                 
                
            
         
        
    

    
### Step 2: Create an Order *(Mandatory)*

         Pass the investor bank account details to the `bank_account` array of the Orders API. Given below is the sample code when the `method` is `upi`.

         ```curl: Request
         curl -u : \
         -X POST https://api.razorpay.com/v1/orders \
         -H "Content-Type: application/json" \
         -d '{
            "amount": 500,
            "method": "upi",
            "receipt": "BILL13375649",
            "currency": "INR",
            "bank_account": {
                "account_number": "765432123456789",
                "name": "Gaurav Kumar",
                "ifsc": "HDFC0000053"
            }
         }'

         ```json: Response
         {
            "id": "order_GAWRjlWkVcRh0V",
            "entity": "order",
            "amount": 500,
            "amount_paid": 0,
            "amount_due": 500,
            "currency": "INR",
            "receipt": "BILL13375649",
            "offer_id": null,
            "status": "created",
            "attempts": 0,
            "notes": [],
            "created_at": 1573044206
         }
         ```
         
            
                Request Parameters
                  
                 @include tpv/order-request-parameters
                

            
### Response Parameters 

                 @include tpv/order-response-parameters
                

         
        
     

 
    
### Step 3: Turbo UPI Headless SDK Action

         You need to link the customer's UPI account with your app. Use the code samples given below to [fetch the UPI account](#32-get-customer-s-linked-upi-account).  

            
                
                    3.1 Initialise the SDK
                    
                    
                     Use the code given below to initialise the SDK.

                     ```yml: Import Package
                     import 'package:razorpay_flutter/razorpay_flutter.dart'; 
                     // Create a Razorpay instance
                     razorpay = Razorpay("YOUR_KEY_ID");
                     ```
                    

                
### 3.2 Get Customer's Linked UPI Account

                    
                     Use the following code to fetch your customer's UPI account. If there are no linked UPI accounts, an empty list is returned.

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

                     
                     
                        Request Parameter
                         
                         
                         Parameter | Description
                         ---
                         `mobileNumber` | Mobile number of the customer.
                          
                        

                     
### Response Parameters

                         
                         Parameter | Description
                         ---
                         `onSuccess` | This function is triggered if the list is fetched successfully. `accList` can be empty to indicate that no accounts have been linked yet.
                         ---
                         `onFailure` | This function is triggered in case an error is thrown during the retrieval process, either by the Razorpay SDK or the Bank SDK.
                          
                        

                     
                    
                
                
### 3.3 Link New UPI Account

                    
                     Use the following code to link the newly created UPI account with your app. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app.

                     ```java: Link New UPI Account
                     razorpay.upiTurbo.tpv
                        .setcustomerMobile(919900990099)
                        .setCustomerId(cust_BtQNqzmBlXXXX)
                        .setOrderId(order_GAWN9beXgaqRyO)
                        .setTpvBankAccount(bankAccount)
                        .linkNewUpiAccount();    
                     ```
    
                     
                        
                        Request Parameters
                            
                             
                             Parameter | Description
                             ---
                             `customerMobile` | Mobile number of the customer.
                             ---
                             `customer_id` | The CustomerId will be used for fetching the TPV whitelisted bank accounts when the OrderId is not provided.
                             --- 
                             `order_id` | The OrderId to be used for fetching the TPV whitelisted bank account for the order.
                             ---
                             `bankAccount` | This object type `TPVBankAccount` will contain the bank account that the user selected in the onboard flow.
                              
                            

                        
### Parameter Combinations and Descriptions

                         
                         Parameters | Description
                         ---
                         `CustomerId` with TPV bank account | When `linkNewUpiAccount` is called with a `CustomerId`, TPV bank account details must also be included. This links the specific whitelisted account associated with that user.
                         ---
                         `OrderId` without TPV bank account | When `linkNewUpiAccount` is called with an `OrderId`, it initiates the TPV process for linking whitelisted accounts. Ensure that TPV bank account details are not provided in this case.
                         ---
                         `OrderId` and `CustomerId` | It is not allowed to pass both `OrderId` and `CustomerId` simultaneously in the `linkNewUpiAccount` function. You should choose either of them.
                         ---
                         `OrderId` and TPV bank account details | It is not allowed to pass both `OrderId` and TPV bank account details within the `linkNewUpiAccount` function. You should choose either one of them.
                         ---
                         TPV bank account without `CustomerId` and `OrderId` | You can provide only the TPVBankAccount without passing the `CustomerId` and `OrderId`.
                         
                        

                     

                     - Initialise the instance to handle the event using the code given below:
    
                     ```java: Instantiate
                     razorpay.on(Razorpay.EVENT_UPI_TURBO_LINK_NEW_UPI_ACCOUNT,
                     _handleLinkNewUpiAccountFlows);
                     ```

                     - Handle dynamic responses to perform specific actions, including error handling and interactions with the integration, based on `type` and `action` properties.

                     
> **WARN**
>
> 
>                      **Watch Out!**
>         
>                      It is mandatory to add the import statement within the `linkNewUpiAccount` function for **RazorpayCard** access.
>                       

        
                     
                     ```yml: Attach Event Listeners
                     import 'package:razorpay_flutter_customui/card.dart' as RazorpayCard;

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
                             // Use this trigger to easily show background process happening in the SDK during onboarding
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

                          case "SETUP_UPI_PIN":
                             var card = RazorpayCard.Card(
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
                     
                    
                
                
### 3.4 Submit Method

                    
                     To accept payments, call Custom Checkout’s `submit` method with the following payload:
 
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
                         razorpay.submit(turboPayload);
                         ```

                         
                         
                            Request Parameter
                            
                             
                             Parameter | Description
                             ---
                             `turboPayload` | Payload for initiating the transaction.
                              
                            

                         
### Response Parameters

                             
                             Parameter | Description
                             ---
                             `onSuccess` | This function is triggered if the list is fetched successfully. accList can be empty to indicate that no accounts have been linked yet.
                             ---
                             `onFailure` | This function is triggered in case an error is thrown during the retrieval process, either by the Razorpay SDK or the Bank SDK.
                              
                            

                         

                     - Initialise the instance to handle the event using the code given below:

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
                     
                
             
        
    
    
### Steps 4: Store Fields in Your Server

         A successful payment returns the following fields to the Checkout form.
         - You need to store these fields in your server.
         - You can confirm the authenticity of these details by verifying the signature in the next step.

         ```json: Success Callback
         {
          "razorpay_payment_id": "pay_29QQoUBi66xm2f",
          "razorpay_order_id": "order_9A33XWu170gUtm",
          "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
         }
         ```
         
             
                Parameters
                

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout **only** for successful payments.

`razorpay_order_id`
: `string` Unique identifier for the order returned by Checkout.

`razorpay_signature`
: `string` Signature returned by the Checkout. This is used to verify the payment.
                

         
        
    
    
### Step 5: Verify Signature

        
            @include integration-steps/verify-signature
        

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
         

         
             
                 Request Parameter
                 
                     
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
             
        

    
### TPVBankAccount

         

         Method | Return Type | Description
         ---
         `accountNumber` | String | Returns the account number.
         ---
         `ifsc` | String | IFSC of the bank.
         ---
         `bankName` | String | Name of the bank.
           
        

## 2. Test Integration

We recommend the following:
- Complete the integration on UAT before using the prod builds. 
- Perform the UAT using the Razorpay-provided API keys.

## 3. Go-live Checklist

Complete these steps to take your integration live:

- You should get your app id whitelisted by Razorpay to test on prod.
    
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number and app whitelisted.    
>     

    
- Import the prod library from the GitHub repository → `https://github.com/upi-turbo/android-turbo-sample-app/tree/prod/app/libs` prod branch.

- Add Proguard rules:

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

- Replace the UAT credential with the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.
