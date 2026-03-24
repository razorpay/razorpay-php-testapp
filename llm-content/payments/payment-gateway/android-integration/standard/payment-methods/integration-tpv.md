---
title: Integrate Turbo UPI TPV
description: Know how Razorpay performs Third-Party Validation (TPV) of investor bank accounts in real-time using Razorpay Turbo UPI on Standard Checkout.
---

# Integrate Turbo UPI TPV

Third-party validation (TPV) of bank accounts is mandatory for businesses in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Broking and Mutual Funds. You can accept customer payments with the Turbo UPI TPV SDK. Know more about [How TPV works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation.md#how-it-works).

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You can choose to maintain a whitelisted account per customer using the S2S [Customer Add Bank Account API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers/bank-accounts.md#1-add-bank-account-of-customer) on your end. This is an additional functionality. This will help you during the onboarding flow, where only whitelisted accounts will be shown to the users during onboarding.
> 

    
### Prerequisites

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number, app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/android-standard-turbo-sample` - sample app repository. 
            - In this repository, you will find the AAR files (libraries for Turbo UPI) and the sample app source code to help you with the integration. 
            - The AARs on the main branch are for the production environment, the ones on the `TURBO-719` branch are for the UAT environment and the ones on `mock-product` are for the Mock environment.

             These are the important files in the sample app repo:
             - `app/libs`: All libraries (Bank, SecureComponent and Turbo).
             - `app/build.gradle`: All transitive dependencies needed to integrate Turbo SDK.

         2. Integrate with the [Razorpay Android Standard Checkout SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard/integration-steps.md).

         3. Import the following frameworks:
             - Checkout SDK
             - Razorpay Turbo Wrapper Plugin SDK (maven)
             - Razorpay Turbo Core SDK
             - Razorpay Turbo UI SDK
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
>             - Use the `rzp_test_5sHeuuremkiApj` API key id for testing on the UAT environment.
>             - Use the `rzp_test_V5AtnjYvupQXm1` API key id for testing on the Mock environment. 
>             - Use the [Razorpay live keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) for prod testing.
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

                 customers/:customer_id/bank_account

                 ```cURL: Request
                 curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
                 -X POST https://api.razorpay.com/v1/customers/:customer_id/bank_account \
                 -H "Content-Type: application/json" \
                 -d '{
                    "ifsc_code" : "UTIB0000194",
                    "account_number"         :"916010082985661",
                    "beneficiary_name"      : "Gaurav",
                    "beneficiary_address1"  : "address 1",
                    "beneficiary_address2"  : "address 2",
                    "beneficiary_address3"  : "address 3",
                    "beneficiary_address4"  : "address 4",
                    "beneficiary_email"     : "gaurav.kumar@example.com",
                    "beneficiary_mobile"    : "9900990099",
                    "beneficiary_city"      :"Bangalore",
                    "beneficiary_state"     : "KA",
                    "beneficiary_country"   : "IN"
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
    : `integer` Customer's bank account number. For example, `0002020000304030434`.
                        

                 
                
            
         
        
    
    
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
                

         
        
      
    
### Step 3: Turbo UPI SDK Action

         You need to link the customer's UPI account with your app. Use the code samples given below to [link a New UPI account](#32-link-new-upi-account). 
         
                
                    3.1 Initialise the SDK
                    
                    
                     Use the code given below to initialise the SDK.

                     ```java: Java
                     Checkout checkout = new Checkout()
                        .upiTurbo(activity) //mandatory
                        .setColor("/*color*/ #000000"); //optional

                     ```kotlin: Kotlin
                     val checkout = Checkout()
                        .upiTurbo(activity) // mandatory
                        .setColor("/*color*/ #000000") // optional
                     ```
                    

                
### 3.2 Link New UPI Account

                    
                     Use the following code to link the newly created UPI account with your app. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app. Linking the new UPI account in advance allows customers to pay directly without repeating the linking process.
     
                      ```java: Java
                     checkout.upiTurbo.linkNewUpiAccount("", "#000000" /*color - in hex format*/,
                         new GeneralPluginCallback(){

                             @Override
                             public void onSuccess(UpiAccount upiAccount) {

                             }

                             @Override
                             public void onError(JSONObject error) {
 
                             }

                         });

 
                     ```kotlin: Kotlin
                     checkout.upiTurbo?.linkNewUpiAccount("", "#000000" /*color - in hex format*/,
                         object : GeneralPluginCallback{

                             override fun onSuccess(upiAccount: UpiAccount) {
                                 // use upiAccount to display data to the User
                             }

                             override fun onError(error: JSONObject) {
                                 // error regarding linking of UpiAccount
                             }

                     })
                     // color parameter in the function can be used to customize the screens in
                     // linking process   
                     ``` 

                     
                        
                        Request Parameters
                          

`customerMobile` _mandatory_
: `string` Mobile number of the customer.

`color` _mandatory_
: `string` Colour in HEX format.

`listener` _mandatory_
: `GeneralPluginCallback` The listener used to receive callbacks for success or failure events.
                          

                        
### Response Parameters

                         
                         Parameter | Description
                         ---
                         `onSuccess` |  This function is triggered if the list was fetched successfully.
                         ---
                         `onError` | This function is triggered in case an error is thrown during the retrieval process, either by Razorpay SDK or Bank SDK.
                         
                         
  
                     
                
            
        
      
    
    
### Step 4: Payment Flow

         Razorpay SDK will handle all the changes related to Turbo UPI internally. To integrate with the payment flow, [initiate payment and display the checkout form](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard/integration-steps.md#14-initiate-payment-and-display-checkout-form).
        

    
### Steps 5: Store Fields in Your Server

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
                

         
        
    
    
### Step 6: Verify Signature

    
         This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments.

         To verify the `razorpay_signature` returned to you by the Checkout form:

         1. Create a signature in your server using the following attributes:
            - `order_id`: Retrieve the `order_id` from your server. Do not use the `razorpay_order_id` returned by Checkout.
            - `razorpay_payment_id`: Returned by Checkout.
            - `key_secret`: Available in your server. The `key_secret` that was generated from the  [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).  

         2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `order_id` to construct a HMAC hex digest as shown below:

            ```html: HMAC Hex Digest
            generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

            if (generated_signature == razorpay_signature) {
                payment is successful
            }
            ```

         3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.
        

### Non-Transactional Flow

Razorpay provides a single exposed function that allows you to manage linked UPI accounts and access all non-transactional flows seamlessly. 

    
### Manage UPI Accounts

         The SDK manages the linked `UpiAccounts` on the application by triggering `manageUpiAccounts()`, which follows the following internal non-transaction flows for `UpiAccounts`:

         - **Fetch balance**: Check the customer's account balance. 
         - **Change UPI PIN**: Provide the customer the ability to change their UPI PIN. 
         - **Reset UPI PIN**: Let your customers reset the PIN for their account.
         - **Delete the account from the application**: Let your customers delink, that is, remove a selected UPI account from your application.

         ```java: Java
         if (checkout.upiTurbo != null) {
             checkout.upiTurbo.manageUpiAccounts("9000090000","#000000"/*color - in hex format(nullable)*/, new GenericPluginCallback() {
                 @Override
                 public void onSuccess(@NonNull Object data) {
                     /* can be safely ignored */
                 }

                 @Override
                 public void onError(@NonNull JSONObject error) {
                     /* Throws error if Turbo UPI cannot be initialized or throws error */
                 }
             });
         }
         ```kotlin: Kotlin
         checkout.upiTurbo?.manageUpiAccounts("9000090000", "#000000"/*color - in hex format(nullable)*/, object : GenericPluginCallback {
             override fun onError(error: JSONObject) {
                 /* Throws error if Turbo UPI cannot be initialized or throws error */
             }

             override fun onSuccess(data: Any) {
                 /* Can be safely ignored */
             }
         })
         ``` 
        

> **INFO**
>
> 
> **Handy Tips**
> 
> You can use the following S2S APIs to maintain and fetch a list of all TPV bank accounts for a customer.
> - Use the [Add Bank Account of Customers API](#step-12-add-customer-s-bank-account) to add bank account of the customers.
> - Use the [Delete Bank Account of Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers/bank-accounts.md#2-delete-bank-account-of-customer) to delete bank account of the customers.
> 

### Models Exposed from the SDKs

The SDKs given below provide access to exposed models for seamless integration.

    
### UpiAccount

         

         Method | Return Type | Description
         ---
         `getAccountNumber` | String | Returns masked bank account number.
         ---
         `getAccountType` | String | The account type. Possible values are `savings` and `current`.
         ---
         `getIfsc` | String | Returns IFSC for Bank.
         ---
         `getBankName` | String | Returns name of bank.
         ---
         `getBankLogoUrl` | String | Returns URL to the PNG image logo.
         --- 
         `bankPlaceholderUrl` | String | Image URL for bank logo placeholder.
         ---
         `pinLength` | Integer | Length on UPI PIN.

         
        

    
### Error

         

         Error | Description
         ---
         `getErrorCode()` | Types of error codes - `BAD_REQUEST_ERROR`: Failure from the client's end (SDK).
- `GATEWAY_ERROR`: Failure either from the Secure Component or the Bank.
- `SERVER_ERROR`: Failure at PSP.

         ---
         `getErrorDescription()` | Brief description of the error.
         ---
         `getErrorReason()` | Specifies the reason for the error.
         ---
         `getErrorSource()` | Indicates the origin of the error.
         ---
         `getErrorStep()` |  Highlights the stage where the error occurred.

         

         [Refer to the list of possible error reasons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard/payment-methods/turbo-upi/error-codes.md).
        

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

- Replace the UAT credential with the [Razorpay live keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) for prod testing.
