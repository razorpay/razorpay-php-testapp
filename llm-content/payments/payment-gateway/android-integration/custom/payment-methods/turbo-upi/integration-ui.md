---
title: Integrate Turbo UPI (with UI) on Android App
description: Steps to integrate Razorpay Turbo UPI with UI on your Android app.
---

# Integrate Turbo UPI (with UI) on Android App

Use Razorpay Turbo UPI to make UPI payments faster. Follow these steps to integrate with  the Razorpay Turbo UPI UI SDK.

    
### Prerequisites

         1. Integrate with the [Razorpay Android Custom SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration.md).

         2. Contact our [Integrations team](mailto:integrations@razorpay.com) and provide the following details to get allowlisted:

            - Mobile numbers of your internal users.
            - App id of your debug, staging and production apps.

         3. Contact our [Integrations team](mailto:integrations@razorpay.com) to get the access to the Sample App Repository `https://github.com/upi-turbo/android-turbo-sample-app`. Once you have access, please read the **readme** section of the repository to learn how to locate the library files and integrate them into your project.

         4. Add the following lines to your Android project's `gradle.properties` file:
            - `android.enableJetifier=true`
            - `android.useAndroidX=true`

         5. The `minSDKversion` for using Turbo UPI is currently 23 and cannot be over written.

         **Add the following dependencies:** 

         
         - In the root settings.gradle file, use:
         ```kotlin: Kotlin
            dependencyResolutionManagement {
                repositories {
                    // ... other repositories ...
                    maven {
                        url = uri("https://maven.pkg.github.com/upi-turbo/android-turbo-sample-app")
                        credentials {
                            username = "upi-turbo"
                            password = ""
                        }
                    }
                }
            }
         ```

         - In the library module's build.gradle, use:
         
         ```kotlin: Kotlin
            dependencies {
                // UAT
                implementation "com.razorpay:customui-uat:$CUSTOMUI_VERSION"
                implementation "com.razorpay:razorpay-turbo-uat:$TURBO_VERSION"
                implementation "com.razorpay:turbo-ui-uat:$TURBO_VERSION"

                // Production
                releaseImplementation "com.razorpay:customui:$CUSTOMUI_VERSION"
                releaseImplementation "com.razorpay:razorpay-turbo:$TURBO_VERSION"
                releaseImplementation "com.razorpay:turbo-ui:$TURBO_VERSION"
            }
         ```

         
> **WARN**
>
> 
> 
>          **Watch Out!**
> 
>          - Use the `rzp_test_0wFRWIZnH65uny` API key id for testing on the UAT environment and the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) on the prod testing.
>          - Replace the placeholders ($CUSTOMUI_VERSION, $TURBO_VERSION and $CHECKOUT_VERSION) with the latest versions provided by Razorpay's team or similar to `app/build.gradle` file in the Sample app.
> 
>          

        

## Integrate Steps

### 1.1 Create a Session Token

To enhance security, you must create a session token via a server-to-server (S2S) call between your backend and Razorpay's backend. This session token ensures secure communication between the Turbo SDK and Razorpay's systems.

#### How to Create a Session Token

1. Trigger the S2S API from your Backend. Use the following API to generate a session token:

    Environment based URLs:

    - UAT: `https://api-web-turbo-upi.ext.dev.razorpay.in`

    - Production: `https://api.razorpay.com`

    Authorization Header Creation: `Base64.encode(${public_key}:${secret})`

    
    ```curl: Curl
    curl -X POST '/v1/upi/turbo/customer/session' \ 
    -H "Authorization: Basic " \ 
    -H "Content-type: application/json" \ 
    -d '{
        "customer_reference": "9000090000"
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
    

    
        
### Request Parameters

            `customer_reference` _mandatory_
            : `string` A unique identifier for the customer provided by the business. The recommended value is mobile number. For example, `9000090000`.
            

        
### Response Parameters

            `token`
            : `string` A session token to be used in subsequent session-protected APIs.

            `expire_at`
            : `long` Expiry time (in seconds) for the session token, used to optimise session handling and reduce unnecessary reinitialisations.

            `error`
            : `object` The request failure due to business or technical failure.
            

    

2. Pass the Generated Token to Turbo SDK. Use the session token in the [initialisation step](#12-initialise-turbo-sdk), ensuring that it is refreshed upon expiry.

### 1.2 Initialise Turbo SDK

Initialise the `TurboSessionDelegate` object anonymously and pass it through the initialize method. The SDK will call `fetchToken` whenever required and use the provided callback to handle the new/updated token. 

In the fetchToken function, retrieve a new token from your server (see [1.1 Create a Session Token](#11-create-a-session-token)) and once available, pass it to the completion object. This mechanism allows you to seamlessly refresh the session by retrieving a new token via a server-to-server (S2S) call whenever the SDK requests it.

```kotlin: Kotlin
val turboSessionDelegate: TurboSessionDelegate = object : TurboSessionDelegate {
        override fun fetchToken(completion: (Session) -> Unit) {
            // fetch token here and once fetched,
            // it can be passed back to Turbo SDK using completion lambda callback
            completion(Session(token: ))
        }
}

            // pass the above created turboSessionDelegate object through initialize method
razorpay
    .upiTurbo
    .initialize(turboSessionDelegate)

```kotlin: Java
TurboSessionDelegate turboSessionDelegate = completion -> {
            // Fetch token here and once fetched,
            // it can be passed back to Turbo SDK using the completion callback
            completion.invoke(new Session(""));
        };

            // pass the above created turboSessionDelegate object through initialize method
razorpay
    .upiTurbo
    .initialize(turboSessionDelegate)

```

### 1.3 Getting Linked UPI Accounts

After initialising the Turbo SDK, proceed to securely link UPI accounts and complete the payment flow.

1. **Get already linked accounts**.

    If your customer has already linked accounts, use the following code to fetch them. If there are no linked UPI accounts, an empty list is returned.

    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     - When the user arrives at your checkout screen, use the `getLinkedUpiAccounts` function to fetch the updated list of UPI accounts.
>     - A mobile number is required in the `linkNewUpiAccount` function for an enhanced user experience. Otherwise, feel free to use either your mobile number or customer id.
>     

    
    ```kotlin: Kotlin
    razorpay.upiTurbo?.getLinkedUpiAccounts(, , object : UpiTurboResultListener {
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

    ```kotlin: Java
    razorpay.upiTurbo.getLinkedUpiAccounts(, , new UpiTurboResultListener(){
        @Override
          public void onError(@NonNull Error error) {
            //Display error message to user. 
          }

        @Override
          public void onSuccess(@NonNull List accList) {
            if (accList.size()==0){
              //Display: no UpiAccounts onboarded yet. Please onboard an account.
            }else{
              //Display onboarded UpiAccounts. 
            }
          }
    });
   
    ```

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     If the device binding is not completed and the `getLinkedUpiAccounts` is triggered, it will return an `OnError` with a **DEVICE_BINDING_INCOMPLETE** error code.
>     
  

    
        
### Request Parameters

            `customerMobile` _mandatory_
            : `string` The customer's mobile number.

            `listener`
            : `object` The listener to be sent should be of type `UpiTurboResultListener`.
            

        
### Response Parameters

            `onSuccess`
            : This function is triggered if the list is fetched successfully. `accList` can be empty to indicate that no accounts have been linked yet.
    
            `onError`
            : This function is triggered in case an error is thrown during the retrieval process, either by the Razorpay SDK or the Bank SDK.
            

    

### 1.4 Onboarding Flow

Invoke the below function for these use cases:
1. To initiate new onboarding, in case you get a **DEVICE_BINDING_INCOMPLETE** error in the above section,
2. To link additional bank accounts for already onboarded users.
    
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     A mobile number is required in the `linkNewUpiAccount` function for an enhanced user experience. Otherwise, feel free to use either your mobile number or customer id.
>     

    ```kotlin: Kotlin
    razorpay.upiTurbo?.linkNewUpiAccountWithUI(, , object: UpiTurboLinkAccountResultListener {
        override fun onSuccess(upiAccounts: List) {
            //Display onboarded UpiAccounts. 
        }
        override fun onFailure(error: com.razorpay.upi.Error) {
            //Display error message to user. 
        }
    }, {color-hex for button's theme})

    ```kotlin: Java
    razorpay.upiTurbo.linkNewUpiAccountWithUI(, , new UpiTurboLinkAccountResultListener() {
        @Override
        public void onSuccess(@NonNull List list) {
            //Display onboarded UpiAccounts. 
        }

        @Override
        public void onError(@NonNull Error error) {
            //Display error message to user. 
        }
    }, {color-hex for button's theme});
    ```    

### Transactional Flow

1. To process the payments, call the `submit method` of custom checkout with the provided payload.

    ```kotlin: Kotlin
    val payload = JSONObject("""
   {
     "currency":"INR",
     "amount":"700",
     "email":"gaurav.kumar@example.com",
     "contact":"9000090000",
     "method":"upi",
     // the below upi block is specific for Turbo UPI Payment
     "upi":{ 
       "flow":"in_app"
     },
     "order_id":"order_L2MUBUOeFItcpU",//optional
     "customer_id":"cust_KQlMczYKcDIqmB"//optional
   }
    """.trimIndent())

    ```kotlin: Java
    try {
           JSONObject payload = new JSONObject();
            payload.put("currency", "INR");
            payload.put("amount", "700");
            payload.put("email", "gaurav.kumar@example.com");
            payload.put("contact", "9000090000");
            payload.put("method", "upi");

            // Creating the nested "upi" object
            JSONObject upiObject = new JSONObject();
            upiObject.put("flow", "in_app");

            payload.put("upi", upiObject);
            payload.put("order_id", "order_L2MUBUOeFItcpU");
            payload.put("customer_id", "cust_KQlMczYKcDIqmB"); // Optional

        } catch (Exception e) {
            e.printStackTrace();
        }
    ```

2. Pass the `vpa` and `payload` objects as shown in the code below.
    ```kotlin: Kotlin
    val turboPayload = HashMap ().apply {
        put("upiAccount", upiAccount)
        put("payload", payload)
    }
    razorpay.submit(turboPayload, object: PaymentResultWithDataListener {
        override fun onPaymentSuccess(razorpayPaymentID: String, paymentData: PaymentData) {

        }
        override fun onPaymentFailure(code: Int, response: String, paymentData: PaymentData) {
            //Show error message
        }
    })

    ```kotlin: Java
    HashMap  turboPayload = new HashMap  ();
    turboPayload.put("upiAccount", upiAccount);
    turboPayload.put("payload", payload);
    razorpay.submit(turboPayload, new PaymentResultWithDataListener() {
        @Override
        public void onPaymentSuccess(String razorpayPaymentID, PaymentData paymentData) {
            
        }
        @Override
        public void onPaymentError(int code, String response, PaymentData paymentData) {
            //Show error message
        }
    });

    ```

### Non-Transactional Flow

You can directly interact with the exposed methods of the Turbo Framework to perform the non-transactional flows listed below.

    
### Manage UPI Accounts

            Let Razorpay SDK manage the linked `UpiAccount` on the applications by triggering `manageUpiAccounts()`.
            
> **INFO**
>
> 
>                 **Handy Tips**
>                 
>                 A mobile number is required in the `linkNewUpiAccount` function for an enhanced user experience. Otherwise, feel free to use either your mobile number or customer id.
>             

            
                
                    ```Kotlin: Manage UPI Accounts 
                    razorpay.upiTurbo?.manageUpiAccounts(, ,
                        object : UpiTurboManageAccountListener {
                            override fun onError(error: JSONObject)  {
                                /*Throws error if UPI Turbo cannot be initialized or throws error*/}

                            override fun onSuccess(data: Any) {/*Can be safely ignored*/}
                    })
                    ```
                
                
                    
[Video content]

                
            
        

> **WARN**
>
> 
>     **Watch Out!**
> 
>     The same combination of mobile number and customer id must be consistently passed across all sessions when calling `linkNewUpiAccountWithUI`, `getLinkedUpiAccounts` and `manageUpiAccounts` for a given user.
> 

### Additional Features

1. To get the device binding status, please use the method `isDeviceOnboarded()` which returns a boolean. It indicates whether the device binding, which is a prerequisite for adding UPI accounts, is done with the user's mobile number.

    ```Kotlin: Kotlin
    if (Razorpay.UpiTurbo.isDeviceOnboarded(activity: Activity)) {
        // User Device Binded
    } else {
        // Call Link New Account for Device Binding
    }
    ```

2. Users can now link their credit cards alongside bank accounts during onboarding. You can seamlessly retrieve both credit and bank accounts for transactions, thereby simplifying payments, expanding options, and ensuring security.

3. Charges will be levied for payments made using CC on UPI. Contact the [support team](https://razorpay.com/support/#request) for further information.

### Models Exposed from the SDKs

The SDKs given below provide access to exposed models for seamless integration.

    
### UpiAccount

         

         Method | Return Type | Description
         ---
         `accountNumber` | String | Returns masked bank account number.
         ---
         `getAccountType` | String | The account type. Possible values are `savings` and `current`.
         ---
         `ifsc` | String | Returns IFSC for Bank.
         ---
         `bankName` | String | Returns name of bank.
         ---
         `bankLogoUrl` | String | Returns URL to the logo of the PNG image.
         --- 
         `bankPlaceholderUrl` | String | Image URL for bank logo placeholder.
         ---
         `pinLength` | Integer | Length on UPI PIN. 

         
        

    
### Error 

         

         Error | Description
         ---
         `errorCode` | Types of error codes - `BAD_REQUEST_ERROR`: Failure from the client's end (SDK).`GATEWAY_ERROR`: Failure either from the Secure Component or the Bank.
- `SERVER_ERROR`: Failure at PSP.

         ---
         `errorDescription` | Brief description of the error.
         ---
         `errorReason` | Specifies the specific reason for the error.
         ---
         `errorSource` | Indicates the origin of the error.
         ---
         `errorStep` |  Highlights the stage where the error occurred.

         

         [Refer to the list of possible error reasons](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/android-integration/custom/payment-methods/turbo-upi/error-codes.md). 
        

    
### BankAccount

         

         Method | Return Type | Description
         ---
         `accountNumber` | String | Masked account number.
         ---
         `type` | String | The account type. Possible values are `savings` and `current`.
         ---
         `ifsc` | String | Returns IFSC for Bank.
         ---
         `state` | BankAccountState | The current state of account.

         
        

    
### BankAccountState

         

         Enum Instances | Description
         ---
         `UPI_PIN_NOT_SET` | This is the state of the bank account when the UPI pin is not set.
         ---
         `UPI_PIN_SET` | This is the state of the bank account when the UPI pin is set.
         ---
         `LINKING_IN_PROGRESS` | This is the state of the bank account when account linking is in progress.
         ---
         `LINKING_SUCCESS` | This is the state of the bank account when the account is linked successfully.
         ---
         `LINKING_FAILED` | This is the state of the bank account when the account linking is failed.
         
        

    
### Bank

         

         Method | Return Type | Description
         ---
         `ifsc` | String | IFSC of bank.
         ---
         `name` | String | Name of bank.
         ---
         `getImageURL()` | String | Image URL of bank logo.
         ---
         `bankPlaceholderUrl` | String | Image URL for bank logo placeholder.

         
        

    
### PaymentData

         

         Method | Return Type | Description
         ---
         getUserEmail() |  | 
         ---
         getUserContact() |  | 
         ---
         getPaymentId() |  | 
         ---
         getOrderId() |  | 
         ---
         getSignature() |  | 
         
        

## 2. Test Integration

We recommend the following:

- Complete the integration on UAT before using the prod builds. 
- Perform the UAT using the Razorpay-provided API keys.

## 3. Go-live Checklist

Complete these steps to take your integration live:

- You should get your app id allowlisted by Razorpay to test on prod. 

- As a compliance requirement, you need to get approval from Google for **READ_SMS** permission. Refer [to the Google article](https://support.google.com/googleplay/android-developer/answer/10208820?hl=en) for more details.

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
