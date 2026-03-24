---
title: Integrate Turbo UPI (Headless) on Android App
description: Steps to integrate Razorpay Turbo UPI Headless within your app.
---

# Integrate Turbo UPI (Headless) on Android App

Use Razorpay Turbo UPI to make UPI payments faster. Follow these steps to integrate with the Razorpay Turbo UPI Headless SDK.

    
### Prerequisites

         1. Integrate with the [Razorpay Android Custom SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration.md).

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

                // Production
                implementation "com.razorpay:customui:$CUSTOMUI_VERSION"
                implementation "com.razorpay:razorpay-turbo:$TURBO_VERSION"
            }
         ```

         
> **WARN**
>
> 
> 
>          **Watch Out!**
> 
>          - Use the `rzp_test_0wFRWIZnH65uny` API key id for testing on the UAT environment and the [Razorpay live keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) on the prod testing.
> 
>          - Replace the placeholders ($CUSTOMUI_VERSION, $TURBO_VERSION and $CHECKOUT_VERSION) with the latest versions provided by Razorpay's team or similar to `app/build.gradle` file in the Sample app.
>          

        

## 1. Integration Steps

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
            

    

### 1.2 Initialise Turbo SDK

Initialise the `TurboSessionDelegate` object anonymously and pass it through the initialize method. The SDK will call `fetchToken` function whenever required to get new token. 

In the `fetchToken` function, retrieve a new token from your server section, check [1.1 Create a Session Token](#11-create-a-session-token). Once available, pass it to the completion object.

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
>      - When the user arrives at your checkout screen, use the `getLinkedUpiAccounts` function to fetch the updated list of UPI accounts.
>       - For enhanced user experience mobile number is required in `getLinkedUpiAccounts` function, otherwise feel free to use either mobile number or customer id.
>     

    
    ```Kotlin: Kotlin
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
            

    

### 1.4 New user onboarding / Linking additional accounts

Invoke the below function for these use cases:
1. To initiate new onboarding, in case you get a **DEVICE_BINDING_INCOMPLETE** error in the above section,
2. To link additional bank accounts for already onboarded users.

    
> **INFO**
>
> 
>         **Handy Tips**
>                 
>         A mobile number is required in the `linkNewUpiAccount` function for an enhanced user experience. Otherwise, feel free to use either your mobile number or customer id.
>     

    ```kotlin: Kotlin
    razorpay.upiTurbo?.linkNewUpiAccount(, , object: UpiTurboLinkAccountListener {
        override fun onResponse(action: UpiTurbo.LinkAction) {
            when(action.code) {
                UpiTurbo.LinkAction.ASK_FOR_PERMISSION - > {
                    action.requestPermission()
                }
                UpiTurbo.LinkAction.SHOW_PERMISSION_ERROR - > {
                    //Show Permission Required error
                }
                UpiTurbo.LinkAction.SELECT_SIM - > {
                    action.error ? .let {
                        //show ERROR UI with State.
                        return
                    }
                    val sims = action.data as List 
                    val sim1 = sims[0] as Sim
                    val sim2 = sims[1] as Sim
                    // show UI to select SIM
                    action.selectedSim(sim2)
                }
                UpiTurbo.LinkAction.SELECT_BANK - > {
                    action.error ? .let {
                        //show ERROR UI with State.
                        return
                    }
                    val banks = action.data as AllBanks
                    val popularBanks : List  = banks.popularBanks
                    val allBanks: List  = banks.allBanks
                    //show UI with banks
                    action.selectedBank(popularBanks[0])
                }
                UpiTurbo.LinkAction.SELECT_BANK_ACCOUNT - > {
                    action.error ? .let {
                        //show ERROR UI with State.
                        return
                    }
                    val bankAccounts = action.data as List 
                    val bankAccount = bankAccounts[0] as BankAccount
                    // show Bank Accounts
                    action.selectedBankAccount(bankAccount)
                }
                UpiTurbo.LinkAction.SET_UPI_PIN - > {
                    action.error ? .let {
                        //show ERROR UI with State.
                        return
                    }
                    val card = Card("234567", "01", "28")
                    action.setUpiPin(card)
                }
                UpiTurboLinkAction.LOADER_DATA - > {
                    val message = action.data.toString()
                }
                UpiTurboLinkAction.STATUS - > {
                    if (action.error != null) {
                        showErrorAlert(action.error!!.errorDescription)
                        return
                    }
                    getLinkedUpiAccounts()
                }
                else - > {}
            }
        }
    })

    ```kotlin: Java
    razorpay.upiTurbo.linkNewUpiAccount(, , new UpiTurboLinkAccountListener() {
        @Override
        public void onResponse(@NonNull UpiTurboLinkAction action) {
            switch (action.getCode()) {
                case ASK_FOR_PERMISSION:
                    action.requestPermission();
                    break;
                case SHOW_PERMISSION_ERROR:
                    //Show dialog to redirect the user to the settings page of the application to grant permissions
                    break;
                case SELECT_SIM:
                    if (action.getError() != null) {
                        //Display error message
                        return;
                    }
                    if (action.getData() != null && action.getData() instanceof List) {
                        try {
                            List  simList = (List  ) action.getData();
                            Sim sim1 = (Sim) simList.get(0);
                            Sim sim2 = (Sim) simList.get(1);
                            //Show dialogue with a list of sims
                            action.selectedSim(sim1);
                        } catch (ClassCastException e) {}
                    }
                    break;
                case SELECT_BANK:
                    if (action.getError() != null) {
                        return;
                    }
                    if (action.getData() != null && action.getData() instanceof AllBanks) {
                        AllBanks allBanks = (AllBanks) action.getData();
                        List  popularBanks = allBanks.getPopularBanks();
                        List  allBanksList = allBanks.getBanks();
                        //show dialog with bank list
                        action.selectedBank(popularBanks.get(0));
                    }
                    break;
                case SELECT_BANK_ACCOUNT:
                    if (action.getError() != null) {
                        return;
                    }
                    if (action.getData() != null && action.getData() instanceof List) {
                        List  bankAccountList = (List  ) action.getData();
                        if (bankAccountList.get(0) instanceof BankAccount) {
                            //Show dialog with bank account list
                            action.selectedBankAccount((BankAccount) bankAccountList.get(0));
                        }
                    }
                    break;
                case SETUP_UPI_PIN:
                    Card card = new Card("01", "28", "234567");
                    action.setupUpiPin(card);
                    break;
                case STATUS:
                    if (action.getError() != null) {
                        //Show error message
                        return;
                    }
                    if (action.getData() != null && action.getData() instanceof List) {
                        List  onboardedUpiAccounts = (List  ) action.getData();
                        showUpiAccount((UpiAccount) onboardedUpiAccounts.get(0));
                    }
                    break;
                case LOADER_DATA:
                    //Use this trigger to easily show background process happening in the SDK during onboarding
                    showLoaderData((String) action.getData());
                    break;
            }
        }
    });
    ```

2. Invoke the below function in your Activity's `onRequestPermissionsResult` function.
    
    ```kotlin: Kotlin 
    override fun onRequestPermissionsResult(
        requestCode: Int,
        permissions: Array,
        grantResults: IntArray){
        if (requestCode == 101) {
            // make sure not to use the 101 requestCode for your other cases 
            razorpay.upiTurbo.onPermissionsRequestResult()
        }
    }

    ```kotlin: Java 
    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults){
        if (requestCode == 101) {
            // make sure not to use the 101 requestCode for your other cases 
            razorpay.upiTurbo.onPermissionsRequestResult()
            return
        }
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
    }

    ```

3. Additionally `razorpay.onBackPressed()` has to be invoked when a user tries to exit the app or return to the previous page. The `razorpay.upiTurbo.releaseActivityReference()` function releases the allocated memory.

    ```kotlin: Kotlin
    override fun onBackPressed() {
        razorpay.onBackPressed()
        razorpay.upiTurbo.releaseActivityReference()
        super.onBackPressed()
    }

    ```kotlin: Java
    @Override
    public void onBackPressed() {
        razorpay.onBackPressed();
        razorpay.upiTurbo.releaseActivityReference();
        super.onBackPressed();
    }
    ```

4. To process the payment, first create a payload, which will be a `JSONObject` as shown in the code below.

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
        "order_id":"order_L2MUBUOeFItcpU",//mandatory
        "customer_id":"cust_KQlMczYKcDIqmB"//optional
    }
        """.trimIndent())

    ```kotlin: Java
    JSONObject payload = new JSONObject();
    payload.put("currency", "INR");
    payload.put("email", "gaurav.kumar@example.com");
    payload.put("contact", "9000090000");
    payload.put("amount", "10000");
    payload.put("method", "upi");
    JSONObject upiBlock = new JSONObject();
    upiBlock.put("flow", "in_app");
    payload.put("upi", upiBlock);
    payload.put("order_id", "order_L2MUBUOeFItcpU");//mandatory
    payload.put("customer_id", "cust_KQlMczYKcDIqmB");//optional

    ```

5. Pass the `upiAccount` and `payload` objects as shown in the code below.
    ```kotlin: Kotlin
    val turboPayload = HashMap()
        turboPayload["upiAccount"] = upiAccount
        turboPayload["payload"] = payload
        razorpay.submit(turboPayload, object : PaymentResultWithDataListener {
            override fun onPaymentSuccess(razorpayPaymentID: String?, paymentData: PaymentData?) {}
            override fun onPaymentError(code: Int, response: String?, paymentData: PaymentData?) {
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

> **INFO**
>
> 
> 
> **Handy Tips**
>  
> In case of an error response, you will get a nested `reason` JSON object, which will contain the original error code and description from the bank/NPCI.
> 

### Non-Transactional Flow

You can directly interact with the exposed methods of the Turbo Framework to perform the non-transactional flows listed below.

    
### Fetch Balance 

         Fetch the customer's account balance. Call `getBalance()` and pass the `UpiAccount` instance you have received from Turbo SDK before.
         
         ```kotlin: Kotlin
         razorpay.upiTurbo.getBalance(upiAccount = upiAccount, listener = object: Callback{
             override fun onFailure(error: Error) {}
 
             override fun onSuccess(accBalance : AccountBalance) {
             `object`.balance
             }
         })

         ```kotlin: Java
         razorpay.upiTurbo.getBalance(upiAccount, new Callback() {
         @Override
         public void onSuccess(AccountBalance accountBalance) {
         }

         @Override
         public void onFailure(@NonNull Error error) {
         }
         });

         ```
        

    
### Change UPI PIN

         Provide the customer the ability to change their UPI PIN. Call `changeUpiPin()` and pass the `upiAccount` instance you have received from Turbo SDK before.
         
         ```kotlin: Kotlin
         razorpay.upiTurbo.changeUpiPin(upiAccount = upiAccount, listener = object: Callback{
             override fun onFailure(error: Error) {}
 
             override fun onSuccess(upiAccount : UpiAccount) {}
         })

         ```kotlin: Java
         razorpay.upiTurbo.changeUpiPin(upiAccount, new Callback() {
         @Override
         public void onSuccess(UpiAccount upiAccount) {
         }

         @Override
         public void onFailure(@NonNull Error error) {
         }
         });

         ```
        

    
### Reset UPI

         Let your customers reset the PIN for their account. You will need to collect the below mentioned details for the account:

            - Bank accounts: last 6 digits, expiry month & year of the Debit Card.
            - Credit cards: last 6 digits, expiry month & year of the Credit Card.
            
         Pass these details in the `Card` data class provided by Turbo SDK and the `upiAccount` object you received from Turbo SDK.
         
         ```kotlin: Kotlin
         razorpay.upiTurbo.resetUpiPin(card, upiAccount, listener = object : Callback{
         override fun onFailure(error : Error) {}
 
         override fun onSuccess(bankAcc : BankAccount) {}  
         })

         ```kotlin: Java
         razorpay.upiTurbo.resetUpiPin(card, upiAccount, new Callback() {
         @Override
         public void onSuccess(Empty empty) {
         }

         @Override
         public void onFailure(@NonNull Error error) {
         }
         });
 
         ```
        

    
### Delink

        Let your customers delink, that is, remove a selected UPI account from your application.
         
         ```kotlin: Kotlin
         razorpay.upiTurbo.delink(upiAccount: UpiAccount, listener = object : Callback{
         override fun onFailure(error : Error) {}

         override fun onSuccess(response : Empty) {}
        
         })

         ```kotlin: Java
         razorpay.upiTurbo.delink(upiAccount, new Callback() {
         @Override
         public void onSuccess(Empty empty) {
         }

         @Override
         public void onFailure(@NonNull Error error) {  
         }
         });

         ```
        

> **WARN**
>
> 
>     **Watch Out!**
> 
>     The same mobile number and customer id combination must be consistently passed across all sessions when calling linkNewUpiAccount and getLinkedUpiAccounts for a given user.
> 

### Additional Features

1. To get the device binding status, please use the method `isDeviceOnboarded()` which returns a boolean. It indicates whether the device binding, which is a prerequisite for adding UPI accounts, is done with the user's mobile number.

    ```kotlin: Kotlin
    if (Razorpay.UpiTurbo.isDeviceOnboarded(activity: Activity)) {
        // User Device Binded
    } else {
        // Call Link New Account for Device Binding
    }
    ```

2. Users can now link their credit cards alongside bank accounts during onboarding. You can seamlessly retrieve both credit and bank accounts for transactions, thereby simplifying payments, expanding options, and ensuring security.

3. Changes have been made to the [AccountBalance](#accountbalance) and [UpiAccount](#upiaccount) models regarding credit card support on UPI. 

4. Charges will be levied for payments made using CC on UPI. Contact the [support team](https://razorpay.com/support/#request) for further information.

5. Turbo SDK will auto-select the SIM card in few cases and the `SELECT_SIM` action will not be triggered in such cases:

    - Device has only one SIM card.

    - Device has multiple SIM cards and the mobile number provided by you matches the number on one of the SIM cards.

    
### Action Parameter Values

         Following are the constants passed in the `action.code` parameter in `onResponse`. 

         
 
         Name | Description | Next Function
         ---
         ASK_FOR_PERMISSION | Runtime permissions have not been granted yet, or were revoked by the user later. | action.requestPermission()
         ---
         SHOW_PERMISSION_ERROR | You can use this to show a dialogue directing customers to navigate and enable permissions from app settings. | NA (You should **show** Go To Settings UI to enable permissions for the customers)
         ---
         SELECT_SIM | SIM details are fetched from the device to show the customer to begin the registration process. This will be skipped if the customer only has one SIM on the device. | action.selectedSim(sim)
         ---
         SELECT_BANK | Object AllBanks returned by SDK for customer selection with: -  `popularBanks`
- `allBanks`
 | action.selectedBank(bank)
         ---
         SELECT_BANK_ACCOUNT | List of accounts related to the customer in the selected bank. (If no accounts are found on the mobile number, `onError` will not be null, indicating that you should request a different number/SIM based on the use case.) | action.selectedBankAccount(bankAccount)
         ---
         SET_UPI_PIN | Triggered if the UPI Pin is not set for the selected bank account. | action.setUpiPin(Card)
         ---
         LOADER_DATA | Returns messages that can be used for the loader, informing the customer of the steps happening during the onboarding process. | NA
         ---
         STATUS | The onboarding process's final status returns the onboarded UpiAccount or error after a bank account was selected or SET_UPI_PIN was triggered. | NA
         
        

### Models Exposed from the SDKs

The SDKs given below provide access to exposed models for seamless integration.

    
### BankAccount

         
 
         Method | Return Type | Description
         ---
         `getAccountNumber()` | String | Masked account number.
         ---
         `getBeneficiaryName()` | String | Name of the account holder.
         ---
         `getBank()` | String | The bank code.
         ---
         `state()` | BankAccountState | The current state of account.

         
        

    
### Bank

         
 
         Method | Return Type | Description
         ---
         `getIfsc()` | String | IFSC code of bank.
         ---
         `getName()` | String | Name of bank.
         ---
         `getImageURL()` | String | Image URL of bank logo.
         ---
         `getBankPlaceholderUrl()` | String | Image URL for bank logo placeholder.

         
        

    
### AccountBalance

         

         Method | Return Type | Description
         ---
         `getBalance()` | long | Balance amount in paise.
         ---
         `getCurrency()` | String | Currency Type in INR.
         ---
         `getId()` | String | Bank Account id.
         ---
         `getOutstanding()` | Long | Outstanding balance for Credit accounts.

         
        

    
### Error

         

         Error | Description
         ---
         `getErrorCode()` | Types of error codes - `BAD_REQUEST_ERROR`: Failure from client's end (SDK).
- `GATEWAY_ERROR`: Failure either from the NPCI or the Bank.
- `SERVER_ERROR`: Failure at PSP.

         ---
         `getErrorDescription()` | Brief description of the error.
 
         
        

    
### UpiAccount

         
 
         Method | Return Type | Description
         ---
         `getAccountNumber()` | String | Returns masked bank account number.
         ---
         `getType()` | String | The account type. Possible values are `bank_account` and `credit_card`.
         ---
         `getIfsc()` | String | Returns IFSC for Bank.
         ---
         `getBankName()` | String | Returns name of bank.
         ---
         `getBankLogoUrl()` | String | Returns URL to the logo of the PNG image.
         --- 
         `getBankPlaceholderUrl()` | String | Image URL for bank logo placeholder.
 
         
        

    
### SIM

         
 
         Method | Return Type | Description
         ---
         `getId()` | String | SIM id used to target SIM card for binding.
         ---
         `getProvider()` | String | Network provider name.
         ---
         `getSlotNumber()` | Integer | SIM slot number. Possible values are `0` and `1`.
         ---
         `getNumber()` | String | Mobile number stored in SIM card.

         
        

    
### Card

         
 
         Method | Return Type | Description
         ---
         `getLastSixDigits()` | String | Last six digits of the debit card number.
         ---
         `getExpiryYear()` | String | Expiry year. Format: YY.
         ---
         `getExpiryMonth()` | String | Expiry month.

         
        

    
### AllBanks

         
 
         Method | Return Type | Description
         ---
         `getPopularBanks()` | `List` | Returns the list of the top 8 banks.
         --
         `getAllBanks()` | `List` | Returns a list of all banks.
         
        

    
### UpiTurbo.LinkAction

         
 
         Method | Return Type | Description
         ---
         `additionalDetails()` | NA | Send additional required parameters.
         ---
         `requestPermissions()` | NA | Request for required permissions and get SIM details.
         ---
         `selectedSim()` | NA | Send selected SIM object to SDK.
         ---
         `selectedBank()` | NA | Send selected bank object to SDK.
         ---
         `selectedBankAccount()` | NA | Send selected bankAccount object to SDK.
         ---
         `setUpiPin()` | NA | Send card object to SDK to create UPI PIN.
         ---
         `selectBankAccount()` | NA | Send bank account and card details to set the pin.

         
        

    
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
         
        

## 2. Test Integration

We recommend the following:
- Complete the integration on UAT before using the prod builds. 
- Perform the UAT using the Razorpay-provided API keys.

## 3. Go-live Checklist

Complete these steps to take your integration live:

- You should get your app id whitelisted by Razorpay to test on prod. 

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

- Replace the UAT credential with the [Razorpay live keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) for prod testing.
