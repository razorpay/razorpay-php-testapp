---
title: Integrate Turbo UPI TPV
description: Know how Razorpay performs Third-Party Validation (TPV) of investor bank accounts in real-time using Razorpay Turbo UPI with UI.
---

# Integrate Turbo UPI TPV

Third-party validation (TPV) of bank accounts is mandatory for businesses in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Broking and Mutual Funds. You can accept customer payments with the Turbo UPI UI TPV SDK. Know more about [How TPV works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation.md#how-it-works).

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You can choose to maintain a whitelisted account per customer using the S2S [Customer Add Bank Account API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers/bank-accounts.md#1-add-bank-account-of-customer) on your end. This is an additional functionality. This will help you during the onboarding flow, where only whitelisted accounts will be shown to the users during onboarding.
> 

    
### Prerequisites

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number, app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/android-turbo-sample-app` - sample app repository. In this repository, you will find the AAR files (libraries for Turbo UPI) and the sample app source code to help you with the integration. The AARs on the main branch are for the UAT environment, and the ones on the prod branch are for the production environment.

         These are the important files in the sample app repo:
             - `app/src/turboUI`: Sample app code for UI SDK
             - `app/libs`: All libraries (Bank, SecureComponent and Turbo) common for headless and UI SDK.
             - `app/uiLibrary`: Library for UI SDK. 
             - `app/build.gradle`: All transitive dependencies needed to integrate Turbo SDK.

         2. Integrate with the [Razorpay Android Custom SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration.md).

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
>          - `minSDKversion` for using Turbo UPI is currently 19 and cannot be over written.
>          - Use the `rzp_test_5sHeuuremkiApj` API key id for testing on the UAT environment and the [Razorpay live keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) for prod testing.
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

         You need to link the customer's UPI account with your app. Use the code samples given below to [fetch the UPI account](#31-get-customer-s-linked-upi-account). 
         
            
                3.1 Get Customer's Linked UPI Account
                

                 Use the following code to fetch your customer's UPI account. If there are no linked UPI accounts, an empty list is returned.

                 ```Kotlin: Kotlin
                 razorpay.upiTurbo?.getLinkedUpiAccounts("", object : UpiTurboResultListener {
                 override fun onSuccess(accList: List) {
                     if (accList.isNotEmpty()) {
                         Log.d("UpiTurbo", "UpiAccount list")
                     } else {
                     // call linkNewAccount()
                     }
                     }
                 override fun onError(error: Error) {
                 Log.d("UpiTurbo", error.message)
                 }
                 })
                 ```
                 
                 
                     Request Parameters
                     
                     
                     Parameter | Description
                     ---
                     `customerMobile` | The customer's mobile number.
                     ---
                     `listener` | The listener to be sent should be of type `UpiTurboResultListener`.
                     
                     

                 
### Response Parameters

                     
                     Parameter | Description
                     ---
                     `onSuccess` |  This function is triggered if the list was fetched successfully. `accList` can be empty to indicate that no accounts have been linked yet.
                     ---
                     `onError` | This function is triggered in case an error is thrown during the retrieval process, either by Razorpay SDK or Bank SDK.
                      
                     

                 

                 
> **INFO**
>
> 
>                  **Handy Tips**
>     
>                  - Filter bank accounts related to each orderID or Whitelisted accounts. 
>                  - You need to select which bank accounts users can use for payments.
>                  - For new users, you should display them the approved bank accounts that they can use for transactions. Users need to choose one from the provided list.
>                  

                
            
            
### 3.2 Link New UPI Account

                 Use the following code to link the newly created UPI account with your app. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app.

                     
> **INFO**
>
> 
>                      **Handy Tips**
>     
>                      If the order is not created, you can provide CustomerId to get bank accounts whitelisted for the customer.
>                      

                 ```java: Java
                 razorpay.upiTurbo
                     .getTPV()
                     .setCustomerMobile("919900990099")
                     .setCustomerId(cust_DAtUWmvpktokrT)
                     .setOrderId(order_DEWJo825vIWdS2)
                     .setTpvBankAccount(
                         TPVBankAccount(
                         accountNumber = tpvAccountNumber,
                         ifsc = tpvAccountIfsc,
                         bankName = tpvAccountName
                         )
                     )
                     .setActivity(activity)
                     .setColor("#00000")
                     .linkNewUpiAccountWithUI(new UpiTurboLinkAccountResultListener() {
                        @Override
                        public void onSuccess(@NonNull List upiAccounts) {

                        }

                        @Override
                        public void onError(@NonNull Error error) {

                        }
                    });

                 ```Kotlin: Kotlin
                 razorpay.upiTurbo?.TPV?
                 .setTpvBankAccount(
                    TPVBankAccount(
                        accountNumber = tpvAccountNumber,
                        ifsc = tpvAccountIfsc,
                        bankName = tpvAccountName
                    )
                 )?.setCustomerMobile("919900990099")?.setActivity(context)
                 ?.setColor("#00000")?.linkNewUpiAccountWithUI(object : UpiTurboLinkAccountResultListener {
                 override fun onSuccess(upiAccounts: List) {
                 }

                 override fun onError(error: Error) {
                 }
                 })
                 ```

                 
                    
                        Request Parameters
                        
                         
                         Parameters | Description
                         ---
                         `setCustomerMobile` | The customer's mobile number.
                         ---
                         `setCustomerID` | The unique identifier of the customer. You can create `customer_id` using the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).
                         ----
                         `setActivity` | Sets the context or activity for the operation.
                         ---
                         `setOrderID` | Order ID generated via [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation.md#upi-only).
                         ----
                         `tpvBankAccount` | The tpvBankAccount parameter represents a bank account configuration used for UPI transactions, containing the account number, IFSC, and bank name.
                         ---
                         `listener` | The listener to be sent should be of type `UpiTurboLinkAccountResultListener`.
                         
                        

                    
### Parameter Combinations and Descriptions

                         
                         Parameters | Description
                         ---
                         `customerId` with TPV bank account | When `linkNewUpiAccount` is called with a `customerId`, TPV bank account details must also be included. This links the specific whitelisted account associated with that user.
                         ---
                         `orderId` without TPV bank account | When `linkNewUpiAccount` is called with an `orderId`, it initiates the TPV process for linking whitelisted accounts. Ensure that TPV bank account details are not provided in this case.
                         ---
                         `orderId` and `customerId` | It is not allowed to pass both `orderId` and `customerId` simultaneously in the `linkNewUpiAccount` function. You should choose either of them.
                         ---
                         `orderId` and TPV bank account details | It is not allowed to pass both `orderId` and TPV bank account details within the `linkNewUpiAccount` function. You should choose either one of them.
                         ---
                         TPV bank account without `customerId` and `orderId` | You can provide only the TPVBankAccount without passing the `customerId` and `orderId`.
                         
                        

                    
### Response Parameters

                         
                         Parameters | Description
                         ---
                         `onSuccess` | This function is triggered if the list was fetched successfully. `accList` can be empty to indicate that no accounts have been linked yet.
                         ---
                         `onError` | This function is triggered in case an error is thrown during the retrieval process, either by the Razorpay SDK or the Bank SDK.
                         
                        

                 

                 
> **WARN**
>
> 
>                  **Watch Out!**
>         
>                   - You can filter UpiAccounts for bank accounts related to each orderID or Whitelisted accounts. 
>                   - You can choose to maintain a whitelisted account list per customer using S2S Customers API on your end.
>                  

                
            
            
### 3.3 Submit Method

                 1. To accept payments, call Custom Checkout’s `submit` method with the following payload:

                     ```java: Submit method
                     val payload = JSONObject("""
                     {
                     "currency":"INR",
                     "amount":"700",
                     "email":"gaurav.kumar@example.com",
                     "contact":"9999999999",
                     "method":"upi",
                     // The below upi block is specific for Turbo UPI Payment
                     "upi":{ 
                       "flow":"in_app"
                     },
                     "order_id":"order_L2MUBUOeFItcpU",//mandatory
                     "customer_id":"cust_KQlMczYKcDIqmB"//optional
                     }
                     """.trimIndent())
                    ```

                 2. Pass the `upiAccount` and `payload` objects as shown in the code below:

                     ```java: Function call
                     HashMap turboPayload = new HashMap<>();
                     turboPayload.put("upiAccount", upiAccount);
                     turboPayload.put("payload", payload);
                     razorpay.submit(turboPayload, object : PaymentResultListener {
                        override fun onPaymentSuccess(razorpay_payment_id: String?, data: PaymentData?) {
                            // show the appropriate status of the payment to the user. 
                        }

                        override fun onPaymentError(code: Int, message: String?, data: PaymentData?) {
                            //Show the appropriate status of the payment to the user. 
                        }
                     })
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

You can directly interact with the exposed methods of the Turbo Framework to perform the non-transactional flows listed below.

    
### Manage UPI Accounts

         Let Razorpay SDK manage the linked UpiAccounts on the applications by triggering `manageUpiAccounts()`.

         ```kotlin: Kotlin
         razorpay.upiTurbo
             .manageUpiAccounts("9999999999", new UpiTurboManageAccountListener {
                 @Override
                 public void onSuccess(@NonNull List tpvEnabledAccoun) {

                 }

                 @Override
                 public void onError(@NonNull Error error) {

                 }
             });

         ```java: Java
         razorpay.upiTurbo?.manageUpiAccounts("9999999999",
             object : UpiTurboManageAccountListener {
                 override fun onError(error: JSONObject)  {
                     /*Throws error if UPI Turbo cannot be initialized or throws error*/}

                 override fun onSuccess(data: Any) {/*Can be safely ignored*/}
         })
         ```
        

### Additional Features

1. The below function is triggered internally after integrating with the Razorpay Android custom SDK.

    ```java: Initialise SDK
    import com.razorpay.Razorpay

    Razorpay razorpay = new Razorpay(activity, merchantKey);
    ```

2. The `.onBackPressed()` is triggered when a customer tries to exit the app or return to the previous page. The `razorpay.upiTurbo.destroy()` function clears that particular session so that when the customer returns, the payment process starts from the beginning.

    ```Kotlin: Kotlin
    override fun onBackPressed() {
    razorpay.onBackPressed()
    razorpay.upiTurbo.destroy()
    super.onBackPressed()
    }
    ```

> **INFO**
>
> 
> **Handy Tips**
> 
> You can use the following S2S APIs to maintain and fetch a list of all tpv bank accounts for a customer.
> - Use the [Add Bank Account of Customers API](#step-12-add-customer-s-bank-account) to add bank account of the customers.
> - Use the [Delete Bank Account of Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers/bank-accounts.md#2-delete-bank-account-of-customer) to delete bank account of the customers.
> 

### Models Exposed from the SDKs

The SDKs given below provide access to exposed models for seamless integration.

    
### TPVBankAccount

         

         Method | Return Type | Description
         ---
         getAccountNumber | String | Returns masked bank account number.
         ---
         getIfsc | String | Returns IFSC for Bank.
         ---
         getBankName | String | Returns the name of the bank.
         ---
         getBankLogoUrl | String | Returns URL to the logo of the PNG image.
         ---
         bankPlaceholderUrl | String | Image URL for bank logo placeholder.
         
        

    
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

         

         [Refer to the list of possible error reasons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/error-codes.md).
        

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
