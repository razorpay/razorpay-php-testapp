---
title: Integrate Turbo UPI UI with TPV
description: Know how Razorpay performs Third-Party Validation (TPV) of investor bank accounts in real-time using Razorpay Turbo UPI with UI.
---

# Integrate Turbo UPI UI with TPV

Third-party validation (TPV) of bank accounts is mandatory for businesses in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Brokering and Mutual Funds. You can accept customer payments by integrating with the Turbo UPI UI with TPV SDK. Know more about [How TPV works](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation/#how-it-works.md).

    
### Prerequisites

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number, app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/razorpay-turbo-flutter` - sample app repository. 

         2. Integrate with [Razorpay Flutter Custom Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/flutter-integration/custom/build-integration.md).

         3. Update the `pubspec.yaml` with the following dependencies:

         UAT
            ```yml: Dependencies
                razorpay_turbo:
                 git:
                    url: https://github.com/razorpay/razorpay-flutter-customui.git
                    ref: feat/customUI-turbo-tpv
                     
                ```
        PROD
              ```yml: Dependencies
                 razorpay_turbo: 1.0.0                     
                ```

         
> **WARN**
>
> 
> 
>          **Watch Out!**
> 
>          - `minSDKversion` for using Turbo UPI is currently for Android is 23 and iOS is 12.0 and cannot be overwritten.
>          - API Key Usage for Different Environments:
>             - Use the `rzp_test_8UzRYt0d70Ntgz` API key id for testing on the UAT environment.
>             - Use the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.
>          - As a compliance requirement, you need to get approval from Google for **READ_SMS** permission. Refer [to the Google article](https://support.google.com/googleplay/android-developer/answer/10208820?hl=en) for more details.
> 
>          

        

## 1. Integration Steps

Given below are the steps:

    
### Step 1: Whitelist Customer Bank Accounts *(Optional)*

         You can whitelist (also known as allowlist) your customer's bank accounts to ensure that only those accounts are considered during customer onboarding. By whitelisting the accounts at the start, you can avoid the bank account linking during payment. Use the Customer APIs to create customers and add their bank account details.

         For example, if a customer named Gaurav has two bank accounts, ABC and XYZ, you can use the APIs to create a customer id and link the bank accounts to id. You can then pass this customer id during initiating the payment.

         Follow these steps.
         
            
                1.1: Create a Customer
                
                 Use this endpoint to create or add a customer with basic details such as name and contact details.

                Environment based URLs:

                 - UAT: `https://api-web-turbo-upi.ext.dev.razorpay.in`

                 - Production: `https://api.razorpay.com`

                 ```cURL: Curl
                 curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
                 -X POST {environment_based_url}/v1/customers \
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

                 ```json: Success
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

                 ```json: Failure
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
                        

                 
                
            
            
### 1.2: Add Customer's Bank Account

                 The following endpoint adds the customer's bank accounts.

                 Environment based URLs:

                 - UAT: `https://api-web-turbo-upi.ext.dev.razorpay.in`

                 - Production: `https://api.razorpay.com`

                 ```cURL: Curl
                 curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
                 -X POST {environment_based_url}/v1/customers/:customer_id/bank_account \
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

                 ```json: Success
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

         Environment based URLs:

         - UAT: `https://api-web-turbo-upi.ext.dev.razorpay.in`

         - Production: `https://api.razorpay.com`

         ```curl: Request
         curl -u : \
         -X POST {environment_based_url}/v1/orders \
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
                

         
        
     

 
    
### Step 3: Turbo UPI with UI SDK Action 

         You need to link the customer's UPI account with your app. Use the code samples given below to fetch the UPI account.  

            
                
                    3.1 Initialise the SDK
                    
                    
                    Use the following code snippet to initialise the SDK.    

                     ```yml: Import Package
                     import 'package:razorpay_flutter/razorpay_flutter.dart'; 
                     // Create a Razorpay instance
                     razorpay = Platform.isAndroid ? Razorpay("YOUR_KEY_ID") :Razorpay.initWith("YOUR_KEY_ID",true);
                     
                     ```
                    

                
### 3.2 Create a Session Token

                    
                    To enhance security, you must create a session token via a server-to-server (S2S) call between your backend and Razorpay's backend. This session token ensures secure communication between the Turbo SDK and Razorpay's systems.
                         
                    #### How to Create a Session Token
                    
                    1. Trigger the S2S API from your Backend. Use the following API to generate a session token:

                      Environment based URLs:

                      - UAT: `https://api-web-turbo-upi.ext.dev.razorpay.in`

                      - Production: `https://api.razorpay.com`

                     Authorization Header Creation: `Base64.encode(${public_key}:${secret})`

                     
                     ```curl: Curl
                       curl -X POST '{environment_based_url}/v1/upi/turbo/customer/session' \ 
                       -H "Authorization: Basic {Base64 of public key and secret}" \ 
                       -H "Content-type: application/json" \ 
                       -d '{ 
                     "customer_reference": "CUSTOMER_ID/CUSTOMER_MOBILE" 
                     }'

                     ``` curl: Success
                     {
                       "token": "session_token",
                       "expire_at": 1730097636
                      }
                     ``` curl: Failure
                     {
                       "error": {
                        "code": "BAD_REQUEST_ERROR",
                        "description": "customer_reference is required",
                        "source": "customer",
                        "step": "CreateSession",
                        "reason": "customer_reference_field_is_missing",
                        "metadata": {}
                     }
                    }
                         ```
                        
                    
                        
                            
                            Request Parameters
                                
                                 
                                 Parameter | Description
                                 ---
                                 `customer_reference` _mandatory_ | `string` A unique identifier for the customer provided by the business. The recommended value is mobile number. For example, `9000090000`.
                                   
                                

                            
### Response Parameters

                                 
                                 Parameter | Description
                                 ---
                                 `token` | `string` A session token to be used in subsequent session-protected APIs.
                                 ---
                                 `expire_at` | `long` Expiry time (in seconds) for the session token, used to optimise session handling and reduce unnecessary reinitialisations.
                                  --- 
                                 `error` | `object` The request failure due to business or technical failure.
                                   
                                

                        
                    
                    2. Create/Retry Session Token Mechanism

                    To ensure a smooth experience during token expiry, the Turbo SDK provides the `updateSessionToken` method. This method dynamically fetches and updates the session token without reinitialising the session.

                    This allows you to seamlessly refresh the session by retrieving a new token via a server-to-server (S2S) call.

                    Below is an example of using `updateSessionToken` 

                     - Initialise the instance to handle the event using the code given below:
    
                     ```java: dart
                     razorpay.on(Razorpay.EVENT_FETCH_SESSION_TOKEN,
                     _handleRefreshToken);
                     ```

                     ```java: dart
                     void _handleRefreshToken(dynamic response) async {
                        // API Call to generate token
                     razorpay.upiTurbo.updateSessionToken(token: ‘GENERATED_TOKEN’);
                     };
                     ```

                    
                

                
### 3.3 Link New UPI Account

                    
                     Use the following code to link the newly created UPI account with your app. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app.

                     ```java: dart
                     razorpay.upiTurbo.tpv
                        .setcustomerMobile('YOUR_MOBILE_NUMBER')
                        .setCustomerId('YOUR_CUSTOMER_ID')
                        .setOrderId('YOUR_ORDER_ID')
                        .setTpvBankAccount('TPV_BANK_ACCOUNT')
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
                         TPV bank account without `CustomerId` and `OrderId` | You cannot provide the TPVBankAccount without `CustomerId`.
                         
                        

                     

                     - Initialise the instance to handle the event using the code given below:
    
                     ```java: dart
                    razorpay.on(Razorpay.EVENT_UPI_TURBO_LINK_NEW_UPI_TPV_ACCOUNT,
                     _handleLinkNewTPVAccountReponse);
                     ```

                     - Handle dynamic responses to perform specific actions, including error handling and interactions with the integration.
        
                     
                     ```yml: dart
                     void _handleLinkNewTPVAccountReponse(dynamic response) {
                     if (response["error"] != null) {
                     Error error = response["error"];
                    // Handle error
                    return;
                    }

                    List upiAccounts = response["data"];
                    // Handle the data
                    }
                     ```
                     
                    
                
                
### 3.4 Submit Method

                    
                     To accept payments, call Custom Checkout’s `submit` method with the following payload:
 
                         ```java: dart
                         Map payload = {
                         "key": "[YOUR_KEY_ID]",
                         "order_id": "[YOUR_ORDER_ID]"
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

                         ```java: dart
                         razorpay.on(Razorpay.EVENT_PAYMENT_SUCCESS, _handlePaymentSuccess);
                         razorpay.on(Razorpay.EVENT_PAYMENT_ERROR, _handlePaymentError);
                         ```

                     - Print payment success and error responses by attaching event listeners to payment events as given below:

                         ```yml: dart
                         void _handlePaymentSuccess(Map response) {
                            print('Payment Success');
                         }

                         void _handlePaymentError(Map response) {
                         print('Payment Failure');
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
         
             
                Response Parameters
                

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout **only** for successful payments.

`razorpay_order_id`
: `string` Unique identifier for the order returned by Checkout.

`razorpay_signature`
: `string` Signature returned by the Checkout. This is used to verify the payment.
                

         
        
    
    
### Step 5: Verify Signature

        
            @include integration-steps/verify-signature
        

### Get Linked Accounts
If your customer has already linked the UPI account, use the following code to fetch it. If there are no linked UPI accounts, an empty list is returned

```java: dart
        razorpay.upiTurbo.getLinkedUpiAccounts(customerMobile: mobileNumber,
      onSuccess: (List upiAccounts){
         //Display on boarded UpiAccounts.     
      },
      onFailure: (Error error) {
         //Display error message to user.             
      }
);
         ```

### Non-Transactional Flow

You can directly interact with the exposed methods of the Turbo Framework to perform the non-transactional flows listed below.

    
### Manage UPI Accounts

         Let Razorpay SDK manage the linked UpiAccounts on the applications by triggering `manageUpiAccounts()`.

            ```java: dart
             razorpay.upiTurbo.manageUpiAccounts(
                      customerMobile: turboUPIModel?.mobileNumber,
                      onFailure: (Error error) {});
            ```
        

### Models Exposed from the SDKs

The SDKs provide access to exposed models for seamless integration.

    
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
- Perform the UAT testing using the Razorpay-provided API keys.

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

- Replace the UAT credential with the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.
