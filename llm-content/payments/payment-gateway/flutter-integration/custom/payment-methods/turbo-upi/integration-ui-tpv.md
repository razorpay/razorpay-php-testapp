---
title: Integrate Turbo UPI UI with TPV
description: Know how Razorpay performs Third-Party Validation (TPV) of investor bank accounts in real-time using Razorpay Turbo UPI with UI.
---

# Integrate Turbo UPI UI with TPV

Third-party validation (TPV) of bank accounts is mandatory for businesses in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Brokering and Mutual Funds. You can accept customer payments by integrating with the Turbo UPI UI with TPV SDK. Know more about [How TPV works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation.md#how-it-works).

    
### Prerequisites

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number, app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/razorpay-turbo-flutter` - sample app repository. 

         2. Integrate with [Razorpay Flutter Custom Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/build-integration.md).

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
>             - Use the [Razorpay live keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) for prod testing.
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
                        
                         
`name` _optional_
: `string` Customer's name. Alphanumeric value with period (.), apostrophe ('), forward slash (/), at (@) and parentheses are allowed. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

`contact ` _optional_
: `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919876543210`.

`email ` _optional_
: `string` The customer's email address. A maximum length of 64 characters. For example, `gaurav.kumar@example.com`.

`fail_existing` _optional_
: `string` Possible values:
     - `1` (default): If a customer with the same details already exists, throws an error.
     - `0`: If a customer with the same details already exists, fetches details of the existing customer.
   

`gstin` _optional_
: `string` Customer's GST number, if available. For example, `29XAbbA4369J1PA`.

`notes` _optional_
: `object` This is a key-value pair that can be used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

                        

                    
### Response Parameters

                          
`id`
: `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

`name` 
: `string` Customer's name. Alphanumeric, with period (.), apostrophe ('), forward slash (/), at (@) and parentheses allowed. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

`contact`
: `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919876543210`.

`email`
: `string` The customer's email address. A maximum length of 64 characters. For example, `gaurav.kumar@example.com`.

`gstin`
: `string` GST number linked to the customer. For example, `29XAbbA4369J1PA`.

`notes`
: `json object` This is a key-value pair that can be used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` UNIX timestamp, when the customer was created. For example, `1234567890`.

                        

                 
                
            
            
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
                  
                 `amount` _mandatory_
: `integer` The transaction amount expressed in paise (currency supported is INR). For example, for an actual amount of ₹1, the value of this field should be `100`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. You can create orders in **INR** only.

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`method` _mandatory_
: `string` The payment method used to make the payment. If this parameter is not passed, investors will be able to make payments using both netbanking and UPI payment methods. Possible values:
  - `netbanking`: Investors can make payments only using netbanking.
  - `card`: Investors can make payments using debit card.
  - `upi`: Investors can make payments only using UPI.

`bank_account` _mandatory_
: `object` Details of the bank account that the investor has provided at the time of registration.

    `account_number`  _mandatory_
    : `string` The bank account number from which the investor should make the payment. For example, `765432123456789` Payments will not be processed for an incorrect account number.

    `name` _mandatory_
    : `string` The name linked to the bank account. For example, `Gaurav Kumar`.

    `ifsc` _mandatory_
    : `string` The bank IFSC. For example, `HDFC0000053`.
                

            
### Response Parameters 

                 `id`
: `string` Unique identifier of the order.

`entity`
: `string` Indicates the type of entity. Here, it is `order`.

`amount`
: `integer` The order amount represented in the smallest unit of the currency passed. For example, amount = 100 translates to 100 paise, that is ₹1 (default currency is INR).

`amount_paid`
: `integer` The amount that has been paid.

`amount_due`
: `integer` The amount that is yet to be paid.

`currency`
: `string` The 3-letter ISO currency code for the payment. Currently, we support INR only.

`receipt`
: `string` A unique identifier of the order entered by the user. For example, `BILL13375649`.

`status`
: `string` The status of the order.

`notes`
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, "note_key": "Beam me up Scotty”.

`created_at`
: `integer` The Unix timestamp at which the order was created.

`offer_id` 
: `string` Unique identifier of the offer.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.
                

         
        
     

 
    
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

        
            This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments.

  
    To verify the `razorpay_signature` returned to you by the Checkout form:
    
     1. Create a signature in your server using the following attributes:
        - `order_id`: Retrieve the `order_id` from your server. Do not use the `razorpay_order_id` returned by Checkout.
        - `razorpay_payment_id`: Returned by Checkout.
        - `key_secret`: Available in your server. The `key_secret` that was generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

     2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `order_id` to construct a HMAC hex digest as shown below:

         ```html: HMAC Hex Digest
         generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

           if (generated_signature == razorpay_signature) {
             payment is successful
           }
         ```
         
     3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.
    

  
### Generate Signature on Your Server

Given below is the sample code for payment signature verification:

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String secret = "EnLs21M47BllR3X8PSFtjtbd";

JSONObject options = new JSONObject();
options.put("razorpay_order_id", "order_IEIaMR65cu6nz3");
options.put("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.put("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f");

boolean status =  Utils.verifyPaymentSignature(options, secret);

```php: PHP
$api = new Api($key_id, $secret);

$api->utility->verifyPaymentSignature(array('razorpay_order_id' => $razorpayOrderId, 'razorpay_payment_id' => $razorpayPaymentId, 'razorpay_signature' => $razorpaySignature));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

payment_response = {
       razorpay_order_id: 'order_IEIaMR65cu6nz3',
       razorpay_payment_id: 'pay_IH4NVgf4Dreq1l',
       razorpay_signature: '0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f'
     }
Razorpay::Utility.verify_payment_signature(payment_response)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.utility.verify_payment_signature({
  'razorpay_order_id': razorpay_order_id,
  'razorpay_payment_id': razorpay_payment_id,
  'razorpay_signature': razorpay_signature
  })

```c: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("razorpay_order_id", "order_IEIaMR65");
options.Add("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.Add("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50");

Utils.verifyPaymentSignature(options);

```nodejs: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var { validatePaymentVerification, validateWebhookSignature } = require('./dist/utils/razorpay-utils');
validatePaymentVerification({"order_id": razorpayOrderId, "payment_id": razorpayPaymentId }, signature, secret);

```Go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

params := map[string]interface{}{
 "razorpay_order_id": "order_IEIaMR65cu6nz3",
 "razorpay_payment_id": "pay_IH4NVgf4Dreq1l",
}

signature := "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f";
secret := "EnLs21M47BllR3X8PSFtjtbd";
utils.VerifyPaymentSignature(params, signature, secret)
```

    

  
### Post Signature Verification

After you have completed the integration, you can [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md), make test payments, replace the test key with the live key and integrate with other [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
    

        
    

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

         

         [Refer to the list of possible error reasons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/flutter-integration/custom/payment-methods/turbo-upi/error-codes.md).
        

    
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

- Replace the UAT credential with the [Razorpay live keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) for prod testing.
