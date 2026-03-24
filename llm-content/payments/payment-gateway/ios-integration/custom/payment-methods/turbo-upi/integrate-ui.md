---
title: Integrate Turbo UPI UI
description: Steps to integrate Razorpay Turbo UPI with your app.
---

# Integrate Turbo UPI UI

Use Razorpay Turbo UPI to make UPI payments faster. Follow these steps to integrate with the Razorpay Turbo UPI UI SDK.

    
### Prerequisites

         1. Contact our [integrations team](mailto:integrations@razorpay.com) to get your mobile number, app, and GitHub account whitelisted to get access to the `https://github.com/upi-turbo/ios-sample-app` - sample app repository. In this repository, you will find the framework files (libraries for Turbo) and the sample app source code to help you with the integration. Use branch `custom_ui/turbo_ui` to access sample app and frameworks for Turbo UPI with UI.

         2. Integrate with the [Razorpay iOS Custom SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/build-integration.md).

         3. Add the following lines to your Podfile for Turbo pod installation:

             ```ruby: 
             pod 'razorpay-customui-pod'

             pod 'razorpay-turbo-custom/ui'
             ```

         4. Import the Turbo plugin as given below:

             ```swift
             import Razorpay
             import TurboUpiPluginUI
             ```

         
> **WARN**
>
> 
> 
>          **Watch Out!**
> 
>          - The minimum supported iOS version for using Turbo UPI is currently 12.0.
>          - Use the `rzp_test_0wFRWIZnH65uny` API key id for testing on the UAT environment and the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.
>          

        

## 1. Integration Steps

Follow these steps:

### 1.1 Initialise the Razorpay Checkout

Initialise the SDK and set up the Checkout instance (Razorpay) to handle payment outcomes like success and errors by listening to delegate methods.

```swift: Swift
var razorpay = RazorpayCheckout.initWithKey(
 "YOUR_KEY_ID",
 andDelegate: self,
 withPaymentWebView: wkWebView,
 UIPlugin: RazorpayTurboUPI.UIPluginInstance
)

```objc: Objective C
razorpay = [RazorpayCheckout initWithKey:@"YOUR_KEY_ID"
                            andDelegate:self
                    withPaymentWebView:webView
                                UIPlugin:RazorpayTurboUpi.UIPluginInstance];
```

### 1.2 Create a Session Token

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

1. You need to link the customer's UPI account with your app. Use the below code samples to fetch the UPI account.

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     If the device binding is not completed and `getLinkedUpiAccounts` is triggered, it will return an `OnError` with a `DEVICE_BINDING_INCOMPLETE` error message.
>     

    
    - Get the customer's linked UpiAccount list using the below code. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app.

    ```swift: Swift
    razorpay?.upiTurboUI?.getLinkedUpiAccounts("9000090000", resultDelegate: self)

    ```objectivec: Objective C
    [[razorpay upiTurboUI] getLinkedUpiAccountsWithMobileNumber:@"9000090000" delegate:self];
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

2. If the customer has not linked any UPI account, they can link UPI accounts using the following method:

    - Link one UPI account at a time:

    Use the following code to link the newly created UPI account with your app. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app.

    ```swift: Swift 
    self.razorpay?.upiTurboUI?.linkNewUpiAccount(
     mobileNumber: "MOBILE_NUMBER",
     color: "",
     completionHandler: { upiAccounts, error in
         print(upiAccounts)
     }
    )

    ```objc: Objective C
    [[razorpay upiTurboUI]
        linkNewUpiAccountWithMobileNumber:@"MOBILE_NUMBER"
                                    color:@"accent color"
                        completionHandler:^(id _Nullable response,
                                            NSError *_Nullable error) {
                        if (error == NULL) {
                            UpiAccounts *upiAccounts = (UpiAccount *)response;
                            printf(upiAccounts);
                        } else {
                            // handle error
                        }
                        }];
    ```

    
        
### Request Parameters

            `mobile_num` _mandatory_
            : `string` Customer's mobile number needed to initialise the SDKs.
             
            `color` 
            : `string` Colour in HEX format.
            

    

3. The **Reward feature** allows you to allocate rewards to users without specific criteria. To avail rewards, you need to configure them from the Dashboard. You can seamlessly integrate this function into your application, providing multiple entry points for users to check their rewards eligibility before completing a payment.

    ```swift: Swift
    razorpay.upiTurboUI?.getRewardForCustomer(
        mobileNumber: "9000090000", 
        action: RewardAction.payment, 
        amount: "10000", 
        rewardsDelegate: self
    )

    extension ViewController: UpiTurboCustomerRewardsDelegate {
        
        func onSuccess(_ reward: CustomerReward) {
            // Handle success
        }
        
        func onFailure(_ error: TurboError?) {
            // Handle failure
        }
    }

    ```objc: Objective C
    [razorpay.upiTurboUI getRewardForCustomerWithMobileNumber:@"9000090000" 
                                                        action:RewardAction.payment 
                                                        amount:@"10000" 
                                            rewardsDelegate:self];

    @interface ViewController () 

    @end

    @implementation ViewController

    - (void)onFailure:(TurboError * _Nullable)error {
        // Handle failure
    }

    - (void)onSuccess:(CustomerReward * _Nonnull)reward {
        // Handle success
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
    "email": "EMAIL_ID",
    "contact": "9000090000",
    "method": "upi",
    "upi": [
        "flow": "in_app"
       ],
      "order_id": "YOUR_ORDER_ID",  
    ]

    turboPayload["upiAccount"] = upiAccount
    razorpay?.authorize(turboPayload)

    extension ViewController: RazorpayPaymentCompletionProtocol {

    func onPaymentSuccess(_ payment_id: String, andData response: [AnyHashable: Any]) {
        let rewardStatus = response["rewardStatus"]
        // Show payment success screen with reward if rewarded
    }

    func onPaymentError(_ code: Int32, description str: String, andData response: [AnyHashable: Any])
    {
        // Handle payment error
    }
    }

    ```objectivec: Objective C
    NSDictionary *turboPayload = @{
        @"currency" : @"INR",
        @"amount" : @"700",
        @"email" : @"EMAIL_ID",
        @"contact" : @"9000090000",
        @"method" : @"upi",
        @"upi" : @{@"flow" : @"in_app"},
        @"order_id" : @"YOUR_ORDER_ID"
    };

    NSMutableDictionary *mutableTurboPayload = [turboPayload mutableCopy];
    [mutableTurboPayload setObject:upiAccountObject forKey:@"upiAccount"];
    [razorpay authorize:mutableTurboPayload];

    @interface ViewController () 

    @end

    @implementation ViewController

    - (void)onPaymentError:(int32_t)code description:(NSString * _Nonnull)str andData:(NSDictionary * _Nonnull)response { 
        // Handle payment error
    }

    - (void)onPaymentSuccess:(NSString * _Nonnull)payment_id andData:(NSDictionary * _Nonnull)response { 
        BOOL rewardStatus = [response[@"rewardStatus"] boolValue];
        // Show payment success screen with reward if rewarded
    }
    ```

   
    
### Request Parameters

        `customer_id` _optional_
        : `string` Unique identifier of the customer to whom the Customer Identifier must be tagged. Create a customer using the [Customer API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers.md)

        `amount` _mandatory_
        : `integer` The transaction amount expressed in the currency subunit. For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

        `currency` _mandatory_
        : `string` The currency in which the transaction should be made.

        `email` _mandatory_
        : `string` Email address of the customer.

        `contact` _mandatory_
        : `string` Customer's phone number.

        `order_id`  _mandatory_
        : `string` Order id generated via the [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

        `method` _mandatory_
        : `string` The payment method used by the customer on Checkout. In this case, it is `upi` (default).
   
        `upi` _mandatory_
        : Details of the UPI payment.

             `flow` _mandatory_
             : `string` Type of the UPI method. In this case, it is `in_app`.
        

   

### Non-Transactional Flow

You can directly interact with the exposed methods of the Turbo Framework to perform the non-transactional flows listed below.

    
### Manage UPI Accounts

         Let Razorpay SDK manage the linked UpiAccounts on the applications by triggering `manageUpiAccounts()`.

            ```swift: Swift
            self.razorpay?.upiTurboUI?.manageUpiAccount(
                mobileNumber: "",
                color: ""
            )

            ```objc: Objective C
            [[razorpay upiTurboUI] manageUpiAccountWithMobileNumber:@""
                                                  color:@"accent color"];
            ```
        

### Additional Features

    
### Device Binding Status

        To determine the device binding status, use the `RZPTurboUPI.isDeviceOnboarded()` variable, which returns a boolean value. This indicates whether device binding—a prerequisite for adding UPI accounts—has been successfully completed for the user's mobile number.

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
      

    
### Clear SDK

        To clear all SDK data, use `RZPTurboUPI.clearSDKState()`. This will remove all stored SDK values and allow you to start fresh.

     ```swift: Swift
     RZPTurboUPI.clearSDKState()

    ```objectivec: Objective C
    [RZPTurboUPI clearSDKState];
    ```

        

### Models Exposed from the SDKs

The SDKs given below provide access to exposed models for seamless integration.

    
### UpiAccount

         

         Method | Return Type | Description
         ---
         `accountNumber` | String | Returns masked bank account number.
         ---
         `type` | String | The account type. Possible values are `bank_account` or `credit_card`.
         ---
         `ifsc` | String | Returns IFSC for Bank.
         ---
         `bankName` | String | Returns the name of the bank.
         ---
         `bankLogoUrl` | String | Returns the URL to the logo of the PNG image.
         ---
         `bankPlaceholderUrl` | String | Image URL for bank logo placeholder. 
         ---
         `pinLength` | Integer | Length on UPI PIN.

         
        

    
### UpiBankAccount

         

         Method | Return Type | Description
         ---
         `accountNumber` | String | Account number.
         ---
         `beneficiaryName` | String | Name of account holder.
         ---
         `bank` | UpiBank | The bank Object.
         ---
         `type` | String | The account type. Possible values are `savings`,  `current` and `credit`.

         
        

    
### UpiBank

         

         Properties | Type | Description
         ---
         `ifsc` | String | IFSC of the bank.
         ---
         `logo` | String | Bank logo URL.
         ---
         `name` | String | Name of the bank.
         ---
         `bankPlaceholderUrl` | String | Image URL for bank logo placeholder.
         
        

    
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
         `Onboarding` | RewardAction | Action associated with the onboarding process.
         ---
         `Payment` | RewardAction | Action associated with the payment process.
         
        

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

    
- Import the prod library from the GitHub repository → `https://github.com/upi-turbo/ios-sample-app` custom_ui/turbo_ui branch.

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
