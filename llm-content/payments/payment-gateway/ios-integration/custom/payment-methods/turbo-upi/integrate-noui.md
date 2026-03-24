---
title: Integrate Turbo UPI Headless
description: Steps to integrate the Razorpay Turbo UPI Headless SDK with your app.
---

# Integrate Turbo UPI Headless

Use Razorpay Turbo UPI to make UPI payments faster. Follow these steps to integrate with Razorpay Turbo UPI Headless SDK.

    
### Prerequisites

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number, app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/ios-sample-app` - sample app repository. In this repository, you will find the framework files (libraries for Turbo) and the sample app source code to help you with the integration. Use branch `custom_ui/turbo` to access the sample app and frameworks for Turbo UPI. The sample app workspace is divided into Prod and UAT environment targets with separate pod dependencies.

         2. Integrate with [Razorpay iOS Custom SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/build-integration.md).

         3. Add the below line of code to your `Podfile` to install Turbo pods:

             ```ruby:
             pod 'razorpay-customui-pod'

             pod 'razorpay-turbo-pod'
             ```

         4. Import the Turbo plugin as given below:

             ```swift:
             import Razorpay

             import TurboUpiPlugin
             ```

         
> **WARN**
>
> 
> 
>          **Watch Out!**
> 
>          - The minimum supported iOS version for using Turbo UPI is currently 11.0.
>          - Use the `rzp_test_0wFRWIZnH65uny` API key id for testing on the UAT environment and the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.
>          

        

## 1. Integration Steps

Follow these steps:

### 1.1 Initialise the Razorpay Checkout

Initialise the SDK and set up the Checkout instance (Razorpay) to handle payment outcomes like success and errors by listening to delegate methods.

    ```swift: Swift
    var razorpay = 
    RazorpayCheckout.initWithKey("rzp_test_0wFRWIZnH65uny", 
                                andDelegate: self, 
                                withPaymentWebView: wkWebView,
                                plugin: 
    RazorpayTurboUPI.pluginInstance())

    ```objectivec: Objective C
    razorpay = [RazorpayCheckout initWithKey:@"rzp_test_0wFRWIZnH65uny"
                                andDelegate:self
                        withPaymentWebView:webView,
                                    plugin:RazorpayTurboUpi, pluginInstance];
    
    ```

### 1.2 Create a Session Token

To enhance security, you must create a session token via a server-to-server (S2S) call between your backend and Razorpay's backend. This session token ensures secure communication between the Turbo SDK and Razorpay's systems.

#### How to Create a Session Token

1. Trigger the S2S API from your Backend. Use the following API to generate a session token:

    
    ```curl: Curl
    curl -X POST 'https://api.razorpay.com/v1/upi/turbo/customer/session' \
    -u [YOUR_KEY_ID]:[YOUR_SECRET] \
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
            

    

2. Pass the Generated Token to Turbo SDK. Use the session token in the [initialisation step](#13-initialise-turbo-sdk), ensuring that it is refreshed upon expiry.

### 1.3 Initialise Turbo SDK

After generating the session token, initialise the Turbo SDK with the session delegate.

Use the initialize(...) method to configure the session.

```swift: Swift
razorpay?
       .upiTurboUI?
       .initialize(sessionDelegate: Any)
```

#### Create/Retry Session Token Mechanism

**Using Delegate Pattern** 

To ensure a smooth experience during token expiry, the Turbo SDK provides the `TurboSessionDelegate` interface with a `fetchToken` method. This method dynamically fetches and updates the session token without reinitialising the session.

Initialise the `TurboSessionDelegate` object anonymously and pass it through the initialize method. The SDK will call `fetchToken` as needed and use the provided callback to handle the updated token. This allows you to seamlessly refresh the session by retrieving a new token via a server-to-server (S2S) call.

Below is an example of creating an instance of the `TurboSessionDelegate` interface using an anonymous object expression:

```kotlin: Kotlin
extension ViewController: TurboSessionDelegate {
    func fetchToken(completion: @escaping (Session) -> Void) {
// fetch token here and once fetched,
        // it can be passed back to Turbo SDK using completion delegate 
    completion(Session(token: )
    }
}
```

### 1.4 Handle UPI Account Linking and Payment Flow

After initialising the Turbo SDK, proceed to securely link UPI accounts and complete the payment flow

1. You need to link the customer’s UPI account with your app. Use the code samples given below to fetch the UPI account.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     If the device binding is not completed and `getLinkedUpiAccounts` is triggered, it will return an `OnError` with a `DEVICE_BINDING_INCOMPLETE` error message.
>     

    - Get the customer's linked UpiAccount list using the below code. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app.

        ```swift: Swift
        razorpay?.upiTurbo?.getLinkedUpiAccounts("9000090000", resultDelegate: self)

        ```objectivec: Objective C
        [[razorpay upiTurbo] getLinkedUpiAccountsWithMobileNumber:@"9000090000" delegate:self];
        ```

        
         
### Request Parameters

            `mobile_num` 
            : `string` The customer's mobile number.

            `Delegate`
            : `object` The Delegate to be sent is of type `UpiTurboResultDelegate`.
            
 
        

    - If your customer has already linked the UPI account, use the following code to fetch it. If there are no linked UPI accounts, an empty list is returned.

        ```swift: Swift
        extension ViewController: UPITurboResultDelegate {
        func onSuccessFetchingLinkedAcc(_ accList: [UpiAccount]) {
            if accList.count > 0 {
                print("Success Fetching Accounts")
            } else {
                // call linkNewUpiAccount()
            }
        }

        func onErrorFetchingLinkedAcc(_ error: TurboUpiPlugin.TurboError?) {
            print("Error: \(error?.errorDescription)")
            print("Error code: \(error?.errorCode)")
        }
        }

        ```objectivec: Objective C
        (void)onErrorFetchingLinkedAcc:(TurboError * _Nullable)error { 
            printf("Error %s", [error errorDescription]);
            printf("Error code %s", [error errorCode]);
        }
        (void)onSuccessFetchingLinkedAcc : (NSArray *_Nonnull)accList {
            if (accList.count > 0) {
                printf("Success Fetching Accounts");
            } else {
                // call linkNewUpiAccount()
            }
        }
        ```

     
        
### Response Parameters

            `onSuccess` 
            : `string` This function is triggered if the list is fetched successfully. `accList` can be empty to indicate that no accounts have been linked yet.

            `onError`
            : `string` This function is triggered in case an error is thrown during the retrieval process, either by the Razorpay SDK or the Bank SDK.
            

     

2.  If the customer has not linked any UPI account, they can link UPI accounts using the following method: 

    - Link one UPI account at a time: 

    Use the following code to link the newly created UPI account with your app. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app.

    ```swift: Swift
    self.razorpay?.upiTurbo?.linkNewUpiAccount("9000090000", linkActionDelegate: self)

    extension ViewController: UpiTurboLinkAccountDelegate {
    func onResponse(_ action: LinkUpiAction) {
        switch action.code {
        case .sendSms:
            guard action.error == nil else {
                return
            }
            action.registerDevice()
        case .selectBank:
            guard action.error == nil else {
                return
            }
            if let banks = action.data as? [UpiBank] {
            let selectedBank = banks[0]
            action.selectedBank(selectedBank)
            }
        case .selectBankAccount:
            guard action.error == nil else {
                return
            }
            if let bankAccounts = action.data as? [UpiBankAccount] {
                let bankAccount = bankAccounts[0]
                action.selectedBankAccount(bankAccount)
            }
        case .setUpiPin:
            let card = UpiCard("last6Digits", "expiry", "cvv")
            action.setUpiPin(bankAccount, card)
        case .linkAccountResponse:
            guard action.error == nil else {
                return
            }
            if let upiAccounts = action.data as? [UpiAccount] {
                //save the upi account response
            }
        default: break
        }
    }
    }

    ```objectivec: Objective C
    [[razorpay upiTurbo] linkNewUpiAccountWithMobileNumber:@"" delegate:self];
    (void)onResponse : (LinkUpiAction *_Nonnull)action {
    switch (action.code) {
        case LinkActionSendSms:
         if (action.error == NULL) {
             NSArray *banks = (NSArray *)action.data;
             [action fetchAllBanks];
         } else {
             break;
        }
        case LinkActionSelectBank:
         if (action.error == NULL) {
             NSArray *banks = (NSArray *)action.data;
             [action selectedBank:banks[0]];
         } else {
             break;
        }
        case LinkActionSelectBankAccount:
         if (action.error == NULL) {
             NSArray *bankAccounts =
                 (NSArray *)action.data;
             [action selectedBankAccount:bankAccounts[0]];
         } else {
             break;
        }
        case LinkActionSetUpiPin:
         if (action.error == NULL) {
             UpiCard *card = [[UpiCard alloc] initWith:@"last6Digits"
                                            expiry:@"06"
                                                cvv:"123"];
             [action setUpiPin:bankAccount:card]
        }
        case LinkActionLinkAccountResponse:
         if (action.error == NULL) {
             // Handle success / error during new account onboarding
        }
    }
    }
    ``` 

    `action` 
    : The current state of customer registration with which you can call further functions. All values for this variable are exposed as an enum for ease of integration. Know more about the [action parameters](#action-parameter-values).

    
        
### Request Parameters

            `mobileNumber` _mandatory_
            : `string` Customer's mobile number needed to initialise the SDKs.

            `linkActionDelegate`
            : `UpiTurboLinkAccountDelegate` Used as a callback to send a response or failure to you. Given below are the functions:
                 - `action.code`: This function denotes that the user registration is incomplete and additional action is required.
                 - `action.data`: This function denotes that the user has registered UpiAccounts on the device. It returns a list of UpiAccount objects, which can then be used to show the details on UI.
                 - `action.error`: Returns an error object with a description and message relating to a failure in either one of the registration steps or in retrieving the UpiAccount list.
            

    
   
     
> **WARN**
>
> 
>      **Watch Out!**
>     
>      If the merchant wants to use the prefetch feature, they need to specifically include a case for prefetch in their code's switch statement. If they do not need prefetching, they can just use a default case in the switch statement to handle all other situations.
>      

3. The **Reward feature** allows you to allocate rewards to users without specific criteria. To avail rewards, you need to configure them from the Dashboard. You can seamlessly integrate this function into your application, providing multiple entry points for users to check their rewards eligibility before completing a payment.

    ```swift: Swift
    razorpay.upiTurbo?.getRewardForCustomer(
        mobileNumber: "9000090000",
        action: RewardAction.payment,
        amount: "10000"?,
        rewardsDelegate: self
    )

    extension ViewController: UpiTurboCustomerRewardsDelegate {
        
        func onSuccess(_ reward: CustomerReward) {
            
        }
        
        func onFailure(_ error: TurboError?) {
            
        }
    }

    ```objectivec: Objective C
    [razorpay.upiTurbo getRewardForCustomerWithMobileNumber:@"9000090000"
                                                    action:RewardAction.payment
                                                    amount:@"10000"
                                        rewardsDelegate:self];

    @interface ViewController () 

    - (void)onFailure:(TurboError * _Nullable)error {
        
    }

    - (void)onSuccess:(CustomerReward * _Nonnull)reward {
        
    }
    ```

    
        
### Request Parameters

            `mobileNumber` _mandatory_
            : `string` The customer's mobile number.

            `action` _mandatory_
            : `RewardAction` This parameter specifies the action to check reward eligibility. Possible values:
                - `onboarding`: To check reward eligibility for Onboarding.
                - `payment`: To check reward eligibility for Payment.
            
            `amount` _optional_
            : `string` The transaction amount expressed in the currency subunits.

            `rewardsDelegate` _mandatory_
            : `delegate` This parameter allows you to receive callbacks regarding reward eligibility.
            

    

4. To process the payments, call the `authorize` method of custom checkout with the provided payload. Upon receiving the `PaymentData` response, you will also receive `rewardStatus` along with the payment response. Please note that the `rewardStatus` key will be present in the response only if your eligible for a reward.

    ```swift: Swift

    let turboPayload: [AnyHashable: Any] = [
    "currency": "INR",
    "amount": "700",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "method": "upi",
    "upi": [
        "flow": "in_app"
    ],
    "order_id": "order_L2MUBUOeFItcpU",  //optional
    ]
    turboPayload["upiAccount"] = upiAccount
    razorpay?.authorize(turboPayload)

    extension ViewController: RazorpayPaymentCompletionProtocol {

    func onPaymentSuccess(_ payment_id: String, andData response: [AnyHashable: Any]) {
        let rewardStatus = response["rewardStatus"]
        // show payment success screen with reward if rewarded
    }

    func onPaymentError(_ code: Int32, description str: String, andData response: [AnyHashable: Any])
    {

    }
    }

    ```objectivec: Objective C

    NSDictionary *turboPayload = @{
        @"currency" : @"INR",
        @"amount" : @"700",
        @"email" : @"gaurav.kumar@example.com",
        @"contact" : @"9000090000",
        @"method" : @"upi",
        @"upi" : @{@"flow" : @"in_app"},
        @"order_id" : @"order_4xbQrmEoA5WJ0G",
    };
    [turboPayload setObject:upiAccountObject forKey:@"upiAccount"];
    [razorpay authorize:turboPayload];

    @interface ViewController () 

    - (void)onPaymentError:(int32_t)code description:(NSString * _Nonnull)str andData:(NSDictionary * _Nonnull)response {
        // handle error
    }

    - (void)onPaymentSuccess:(NSString * _Nonnull)payment_id andData:(NSDictionary * _Nonnull)response {
        BOOL rewardStatus = [response[@"rewardStatus"] boolValue];
        // show payment success screen with reward if rewarded
    }
    ```

        
### Request Parameters

            `amount` _mandatory_
            : `integer` The transaction amount expressed in the currency subunit. For example, for an actual amount of ₹299.35, the value of this field should be `29935`.
    
            `currency` _mandatory_
            : `string` The currency in which the transaction should be made.

            `email` _mandatory_
            : `string` Email address of the customer.

            `contact` _mandatory_
            : `string` Customer's phone number.

            `order_id`  _optional_
            : `string` Order id generated via the [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

            `method` _mandatory_
            : `string` The payment method used by the customer on Checkout. In this case, it is `upi` (default).

            `upi` _mandatory_
            : `array` Details of the UPI payment.

                `flow` _mandatory_
                : `string` Type of the UPI method. In this case, it is `in_app`.
            

    

## Non-Transactional Flows

You can directly interact with the exposed methods of the Turbo Framework to perform the non-transactional flows listed below.

    
### Fetch Balance

         Fetch the customer's account balance. Call `getBalance()` on the bank account object received from upiAccount.

            ```swift: Swift
            razorpay?.upiTurbo?.fetchAccountBalance(upiAccount: upiAccount) { (accountBalance, error) in
                if error == nil {
                    //error
                } else if let accountBalance = accountBalance {
                    //success
                    print(accountBalance.balance)
                }
            }

            ```objectivec: Objective C
            [razorpay.upiTurbo fetchAccountBalanceWithUpiAccount: upiAccount handler:^(id _Nullable response, NSError * _Nullable error) {
                    if (error == NULL) {
                    UpiAccountBalance *accountBalance = (UpiAccountBalance *) response;            
                    printf(accountBalance.balance);
                    } else {
                        //error
                    }
            }];
            ```
        

    
### Change UPI PIN

         Provide the customer the ability to change their UPI PIN. Call `changeUpiPin()` on the bank account object received from upiAccount.

            ```swift: Swift
            razorpay?.upiTurbo?.changeUpiPin(upiAccount: upiAccount) { (bankAccount, error) in
                if error == nil {
                    //error
                } else if let account = bankAccount {
                    //success
                    print(“UPI Pin Updated”)
                }
            }

            ```objectivec: Objective C
            [razorpay.upiTurbo changeUpiPinWithUpiAccount: upiAccount handler:^(id _Nullable response, NSError * _Nullable error) {
                    if (error == NULL) {
                        UpiBankAccount *bankAccount = (UpiBankAccount *) response;
                    } else {
                        //error
                    }
            }];
            ``` 
        

    
### Reset UPI PIN

         Let your customers reset their UPI PIN. Call `resetUpiPin()` on the bank account object received from getLinkedUpiAccounts().

            ```swift: Swift
            razorpay?.upiTurbo?.resetUpiPin(upiAccount: upiAccount, card: cardObj) { (bankAcount, error) in
                if error == nil {
                    //error
                } else if let account = bankAccount {
                    //success
                }
            }

            ```objectivec: Objective C
            [razorpay.upiTurbo resetUpiPinWithUpiAccount: upiAccount card: card handler:^(id _Nullable response, NSError * _Nullable error) {
                    if (error == NULL) {
                        UpiBankAccount *bankAccount = (UpiBankAccount *) response;
                    } else {
                        //Error
                    }
            }];
            ```
        

    
### Delink UpiAccount

        Let your customers delink their UpiAccounts.

            ```swift: Delink
            razorpay?.upiTurbo?.delink(upiAccount: upiAccount) { (isSuccess, error) in
                if let error = error {
                    //error
                } else if isSuccess == true {
                    //success
                }
            }

            ```objectivec: Objective C
            [razorpay.upiTurbo delinkVpaWithUpiAccount: upiAccount handler:^(id _Nullable response, NSError * _Nullable error) {
                    if (error == NULL) {
                        printf("Delinked Successfully");
                    } else {
                    //error
                    }
            }];
            ```
        

### Additional Features

To get the device binding status, please use the variable `razorpay.upiTurbo.deviceBindingDone` of type boolean. It indicates whether the device binding, which is a prerequisite for adding UPI accounts, is done with the user's mobile number.

    ```swift: Swift
    if RZPTurboUPI.isDeviceOnboarded() {
        // User device onboarded 
    } else {
        // Call Link New Account for Device Binding
    }

    ```objectivec: Objective C
    if ([RZPTurboUPI isDeviceOnboarded]) {
        // User device onboarded
    } else {
        // Call Link New Account for Device Binding
    }
    ```

    
### Action Parameter Values

            Following are the constants that are passed in `action.code` parameter in `onResponse`. 

            

            **Name** | **Description** | **Next function**
            ---
            sendSms | SIM details are fetched from the device to show to the user to begin the registration process. | action.fetchAllBanks
            ---
            selectBank | Object AllBanks returned by SDK for user selection with
 - popularBanks
- allBanks
 | action.selectedBank(bank)
            ---
            selectBankAccount | List of accounts related to the user in selected bank. | action.selectedBankAccount(bankAccount) 
            ---
            setUpiPin | Triggered in the event UPI Pin is not set for a selected bank account. | action.setUpiPin(Card)
            ---
            linkAccountResponse | Triggered if any errors occurred during the onboarding flow or on Onboard completion with UPI Accounts. | NA
            
        

## Models Exposed from the SDKs

The SDKs given below provide access to exposed models for seamless integration.

    
### UpiBankAccount

         

         Method | Return Type | Description
         ---
         `accountNumber` | String | Masked bank account number.
         ---
         `beneficiaryName` | String | Name of account holder.
         ---
         `bank` | String | The bank code.
         ---
         `state` | UpiBankAccountState | The status of your bank account linked to your UPI. Possible values: - `upiPinNotSet`
- `upiPinSet`
- `linkingInProgress`
- `linkingSuccess`
- `linkingFailed`

         
        

    
### UpiAccountBalance

         

         Method | Return Type | Description
         ---
         `balance` | Integer | Balance amount in paise. 
         ---
         `outstanding` | Integer | Outstanding balance for Credit accounts in paise.
         ---
         `currency` | String | Currency Type INR. 
         ---
         `id` | String | Bank Account id.
           
       

    
### UpiAccount

         

         Method | Return Type | Description
         ---
         `accountNumber` | String | Returns masked bank account number.
         ---
         `type` | String | The account type. Possible values are `bank_account` or `credit_card`.
         ---
         `ifsc` | String | Returns IFSC for Bank.
         ---
         `bankName` | String |  Returns the name of the bank.
         ---
         `bankLogoUrl` | String | Returns the URL to the logo of the PNG image.
         ---
         `bankPlaceholderUrl` | String | Image URL for bank logo placeholder.
         
        

    
### UpiCard

         

         Method | Return Type | Description
         ---
         `expiryMonth` | String | Expiry month of the card.
         ---
         `expiryYear` | String | Expiry year of the card. The format is `YY`.
         ---
         `lastSixDigits` | String | Last six digits of the card.

         
        

    
### UpiBank

         

         Method | Return Type | Description
         ---
         `ifsc` | String | IFSC of the bank.
         ---
         `logo` | String | Bank logo URL.
         ---
         `name` | String | Name of the bank.
         ---
         `bankPlaceholderUrl` | String | Image URL for bank logo placeholder.

         
        

    
### AllBanks

         

         Method | Return Type | Description
         ---
         `popularBanks` | `Array` | Returns the list of the top 8 banks.
         ---
         `banks` | `Array` | Returns a list of all banks.
         
        

    
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

         

         [Refer to the list of possible error reasons](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/error-codes.md).
        

    
### UpiBankAccountState

         

         Enum Instances | Description
         ---
         `upiPinNotSet` | This is the state of the bank account when the UPI pin is not set.
         ---
         `upiPinSet` | This is the state of the bank account when the UPI pin is set.
         ---
         `linkingInProgress	` | This is the state of the bank account when account linking is in progress.
         ---
         `linkingSuccess` | This is the state of the bank account when the account is linked successfully.
         ---
         `linkingFailed` | This is the state of the bank account when the account linking is failed.
         
        

    
### Consent

         
         Method | Return Type | Required | Description
         ---
         `acknowledge` | Boolean | Mandatory | If the user gives consent to prefetch and link accounts.
         ---
         `message` | String | Mandatory | The message is shown to the user while requesting prefetch permission.
         ---
         `timeStamp` | String | Mandatory | The timestamp in seconds when the user accepts the consent.
         ---
         `type` | ConsentType | Mandatory | The type of consent the user asks.
         ---
         `data` | [String:Any] | Optional | Provide the list of banks to prefetch from with banks key.
         
        

    
### ConsentType enum

         
         Instances | Description
         ---
         `prefetchAndLink` | Type of consent to prefetch and link accounts.
         
        

    
### PrefetchBank

         
         Method | Return Type | Description
         ---
         `priority` | String | Priority of bank.
         ---
         `id` | String | The IIN of the bank.
         ---
         `displayName` | String | The name of the bank.
         ---
         `bankLogo` | String | Bank logo image URL.
         
        

    
### CustomerReward

         

         Method | Return Type | Description
         ---
         `eligible` | Boolean | Eligible status of the reward.
         ---
         `rewards` | `Array` | List of rewards from multiple rewards partners.
         
        

    
### Reward

         

         Method | Return Type | Description
         ---
         `rewardPartnerName` | String | Partner name from whom the reward is assigned.
         ---
         `rewardPartnerLogoUrl` | String | Partner logo URL. 
         ---
         `preAllotText` | String | Customer action before allotting the reward.
         ---
         `postAllotText` | String | Customer action after allotting the reward.
         ---
         `couponCode` | String | Coupon code for allotting the reward.
         ---
         `termsAndConditions` | `Array` | Terms and conditions for allotting the reward.
         
        

    
### PaymentData

         

         Method | Return Type | Description
         ---
         `rewardStatus` | Boolean | Reward allotment status.
         
        

    
### RewardAction

         
        
         Method | Return Type | Description
         ---
         `Onboarding` | RewardAction | Action associated with the Onboarding process.
         ---
         `Payment` | RewardAction | Action associated with the Payment process.
         
        

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

- Import the prod library from the GitHub repository → `https://github.com/upi-turbo/ios-sample-app` `custom_ui/turbo` branch.

- Switch to Prod environment and podfile.

- Replace the UAT credential with the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.

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
