---
title: Integrate Turbo UPI UI with TPV
description: Know how Razorpay performs Third-Party Validation (TPV) of investor bank accounts in real time using Razorpay Turbo UPI with UI.
---

# Integrate Turbo UPI UI with TPV

Third-party validation (TPV) of bank accounts is mandatory for businesses in the BFSI (Banking, Financial Services and Insurance) sector that deal with Securities, Brokerage and Mutual Funds. You can accept customer payments using the Turbo UPI UI with TPV SDK. Know more about [how TPV works](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation/#how-it-works.md).

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> To whitelist the customer account, use our S2S [Customer Add Bank Account API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers/bank-accounts/#1-add-bank-account-of-customer.md). This optional functionality ensures that only pre-approved accounts are displayed to users during the onboarding process, streamlining the experience and enhancing security.
> 

    
### Prerequisites

         1. Contact our [integrations team](mailto:integrations@razorpay.com) for

            - Whitelisting mobile numbers and app id whitelisted for testing on UAT.
             - Getting access to our sample app `https://github.com/upi-turbo/ios-sample-app` repository.

         2. In this repository, you will find the UAT frameworks and the sample app source code to help you with the integration. Use branches inside `ui/tpv/` to access sample app and frameworks for Turbo UPI with UI TPV.

         3. Integrate with the [Razorpay iOS Custom SDK](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/build-integration.md).

         4. Add the following lines to your Podfile for Turbo pod installation:

             ```ruby: 
             pod 'razorpay-customui-pod'

             pod 'razorpay-turbo-custom/ui'
             ```

         5. Import the Turbo plugin as given below:

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
>          - Use the `rzp_test_8UzRYt0d70Ntgz` API key id for testing on the UAT environment and the [Razorpay live keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md) for prod testing.
>          

        

## 1. Integration Steps

Environment based URLs:
    - UAT: `https://api-web-turbo-upi.ext.dev.razorpay.in`

    - Production: `https://api.razorpay.com`

Given below are the steps:

    
### Step 1: Whitelist Customer Bank Accounts *(Optional)*

         You can whitelist (also known as allowlist) your customer's bank accounts to ensure that only those accounts are considered during customer onboarding. By whitelisting the accounts at the start, you can avoid the bank account linking during payment. Use the Customer APIs to create customers and add their bank account details.

         For example, if a customer named Gaurav has two bank accounts, ABC and XYZ, you can use the APIs to create a customer id and link the bank accounts to that id. You can then pass this customer id at the time of payment.

         Follow these steps.
         
            
                1.1: Create a Customer
                
                 Use this endpoint to create or add a customer with basic details such as name and contact details.

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

                 customers/:customer_id/bank_account

                 ```cURL: Request
                 curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
                 -X POST {environment_based_url}/v1/customers/:customer_id/bank_account \
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

         To link the customer's UPI account with your app. Use the code samples given below to fetch the UPI account.  

            
                
                    3.1 Initialise the SDK
                    
                    
                     Use the code given below to initialise the SDK.

                     Initialise the SDK and set up the Checkout instance (Razorpay) to handle payment outcomes like success and errors by listening to delegate methods.

                    ```swift: Swift
                    var razorpay: RazorpayCheckout? // Globally declare
                    let wkWebView = WKWebView(frame: self.view.frame) // configure your webview
                    razorpay = RazorpayCheckout.initWithKey( "YOUR_KEY_ID",
                        andDelegate: self, withPaymentWebView: wkWebView, UIPlugin: RZPTurboUPI.UIPluginInstance)

                    ```objc: Objective C
                     RazorpayCheckout *razorpay; // Globally declare
                     WKWebView *wkWebView = [[WKWebView alloc] initWithFrame:self.view.frame]; // configure your webview
                     razorpay = [RazorpayCheckout initWithKey:@"YOUR_KEY_ID"
                            andDelegate:self withPaymentWebView:webView
                            UIPlugin:RZPTurboUPI.UIPluginInstance];
                    ```
                    

                
### 3.2 Create a Session Token

                    
                    To enhance security, you must create a session token via a server-to-server (S2S) call between your backend and Razorpay's backend. This session token ensures secure communication between the Turbo SDK and Razorpay's systems.
                         
                    #### How to Create a Session Token
                    
                    1. Trigger the S2S API from your Backend. Use the following API to generate a session token:

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
                        
                        
`customer_reference` _mandatory_
: `string` A unique identifier for the customer provided by the business. The recommended value is mobile number. For example, `9000090000`
                         

                         
### Response Parameters

`token`
: `string` A session token to be used in subsequent session-protected APIs.

`expire_at` 
: `long` Expiry time (in seconds) for the session token, used to optimise session handling and reduce unnecessary reinitialisations.

`error` 
: `object` The request failure due to business or technical failure.
                               

                        
                    
                    2. Create/Retry Session Token Mechanism

                    **Using Delegate Pattern** 

                    To ensure a smooth experience during token expiry, the Turbo SDK provides the `TurboSessionDelegate` interface with a `fetchToken` method. This method dynamically fetches and updates the session token without reinitialising the session.

                    Initialise the `TurboSessionDelegate` object anonymously and pass it through the initialize method. 
                    ```swift: Swift
                    self.razorpay?.upiTurboUI?.initialize(self)

                    ```objc: Objective C
                    self.razorpay.upiTurboUI.initialize(self);
                       ```
                       
                    The SDK will call `fetchToken` as needed and use the provided callback to handle the updated token. This allows you to seamlessly refresh the session by retrieving a new token via a server-to-server (S2S) call.

                    Below is an example of creating an instance of the `TurboSessionDelegate` interface using an anonymous object expression:

                  ```swift: Swift
                    extension ViewController: TurboSessionDelegate {
                        func fetchToken(completion: @escaping (Session) -> Void) {
                        // Fetch token here and once fetched,
                        // it can be passed back to Turbo SDK using the completion delegate
                          completion(Session(token: ""))
                        }
                    }

                    ```objc: Objective C
                    @interface ViewController () 
                    @end

                    @implementation ViewController

                    - (void)fetchTokenWithCompletion:(void (^)(Session *))completion {
                        // Fetch token here and once fetched,
                        // it can be passed back to Turbo SDK using the completion delegate
                        Session *session = [[Session alloc] initWithToken:@""];
                        completion(session);
                    }
                    @end    
                        ```

                    
                

                
### 3.3 Link New UPI Account

                    
                     Use the following code to link the newly created UPI account with your app. This function can be called from anywhere in the application, providing multiple entry points for customers to link their UPI account with your app.

                    ### Parameter Combinations

                    #### Using Order ID
                    When calling the `linkNewUpiAccount` function with an `OrderId`, the TPV process is initiated for linking whitelisted accounts. Ensure that TPV bank account details are not provided in this case.

                    #### Using Customer ID with TPV Bank Account
                    When calling the `linkNewUpiAccount` function with a `CustomerId`, you must also include TPV bank account details. This links the specific whitelisted account associated with that user.

                    #### Restrictions
                    - **Order ID and Customer ID**: Do not pass both `OrderId` and `CustomerId` simultaneously in the `linkNewUpiAccount` function. Choose one based on your use case.
                    - **Order ID and TPV Bank Account**: Do not pass `OrderId` and `TPV bank account` details together. Use either one.
                    - **TPV Bank Account without Customer ID or Order ID**: TPV bank account details cannot be provided without a `CustomerId`.

                    These combinations ensure proper functionality and avoid conflicts during the UPI account linking process.   

                    - Using Order Id and Mobile Number

                    ```swift: Swift
                    self.razorpay?.upiTurboUI?.TPV?
                        .setMobileNumber(mobile: "YOUR_MOBILE_NUMBER")
                        .setOrderId(orderId: "YOUR_ORDER_ID")
                        .linkNewUpiAccountWithUI(color: "#0000FF", completionHandler: 
                        { upiAccounts, error in
                            guard error == nil else {
                                let error = error as? TurboError
                                // handle error
                                return
                            }
                            guard let vpaAccounts = upiAccounts as? [UpiAccount] 
                            else {
                                return
                             }
                         // handle UPI Account Response here and save it globally in this file for further usage.
                     })
                     ```objc: Objective C
                    [[self.razorpay.upiTurboUI.TPV setMobileNumber:@"YOUR_MOBILE_NUMBER"]
                         .setOrderId(@"YOUR_ORDER_ID")
                         .linkNewUpiAccountWithUIWithColor:@"#0000FF"
                         completionHandler:^(NSArray *upiAccounts, NSError *error) {
                         if (error != nil) {
                         TurboError *turboError = (TurboError *)error;
                        // Handle error
                         return;
                        }
  
                         NSArray *vpaAccounts = (NSArray *)upiAccounts;
                         // Handle UPI Account Response here and save it globally in this file for further usage.
                     }];
                      ```

                     - Using Customer Id and TPV Bank Account

                    ```swift: Swift
                     self.razorpay?.upiTurboUI?.TPV?
                        .setMobileNumber(mobile: "YOUR_MOBILE_NUMBER")
                        .setCustomerId(customerId: "YOUR_CUSTOMER_ID")
                        .setTpvBankAccount(tpvBankAccount: "TPV_BANK_ACCOUNT")
                        .linkNewUpiAccountWithUI(color: "#0000FF", completionHandler: 
                        { upiAccounts, error in
                            guard error == nil else {
                                let error = error as? TurboError
                                // handle error
                                return
                            }
                            guard let vpaAccounts = upiAccounts as? [UpiAccount] 
                            else {
                                return
                             }
                         // handle UPI Account Response here and save it globally in this file for further usage.
                     })
                    ```objc: Objective C
                    [[self.razorpay.upiTurboUI.TPV setMobileNumber:@"YOUR_MOBILE_NUMBER"]
                         .setCustomerId(@"YOUR_MOBILE_NUMBER")
                         .setTpvBankAccount(@"TPV_BANK_ACCOUNT")
                        .linkNewUpiAccountWithUIWithColor:@"#0000FF"
                         completionHandler:^(NSArray *upiAccounts, NSError *error) {
                         if (error != nil) {
                         TurboError *turboError = (TurboError *)error;
                        // Handle error
                         return;
                        }
  
                         NSArray *vpaAccounts = (NSArray *)upiAccounts;
                         // Handle UPI Account Response here and save it globally in this file for further usage.
                     }];
                        ```

                     

                         
                         Request Parameters
                        
                        
`customerMobile` _mandatory_
: `string` A unique identifier for the customer provided by the business. The recommended value is mobile number. For example, `9000090000`

`customer_id`
:  `string` The CustomerId will be used for fetching the TPV whitelisted bank accounts when the OrderId is not provided.

`order_id` 
: `string` The OrderId to be used for fetching the TPV whitelisted bank account for the order.

`tpvBankAccount` 
: `object` This object type `TurboTPVBankAccount` will contain the bank account that the user selected in the onboard flow.

                         

                     

                    
                
                
### 3.4 Authorize Method

                    
                     To accept payments, call Custom Checkout’s `authorize` method with the following payload:

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
                         "order_id": "[YOUR_ORDER_ID]",  // Mandatory
                        ]
                        
                    turboPayload["upiAccount"] = upiAccount
                    razorpay?.authorize(turboPayload)

                 extension ViewController: RazorpayPaymentCompletionProtocol {
                     func onPaymentSuccess(_ payment_id: String, andData 
                     response: [AnyHashable: Any]) {
                          // Handle Success
                     }

                    func onPaymentError(_ code: Int32, description str: String, andData response: [AnyHashable: Any]) {
                      // Handle payment error
                     }
                 }
        
                ```objc: Objective C
                    NSDictionary *turboPayload = @{
                            @"currency": @"INR",
                            @"amount": @"700",
                            @"email": @"gaurav.kumar@example.com",
                            @"contact": @"9000090000",
                            @"method": @"upi",
                            @"upi": @{
                                @"flow": @"in_app"
                                },
                            @"order_id": @"[YOUR_ORDER_ID]"  // Mandatory
                        };
                                            
                    [turboPayload setValue:upiAccount forKey:@"upiAccount"];
                    [razorpay authorize:turboPayload];

                 @interface ViewController () 

                 @end

                 @implementation ViewController

                  - (void)onPaymentSuccess:(NSString * _Nonnull)payment_id andData:(NSDictionary * _Nonnull)response { 
                     
                    // Hanlde Payement Success
                 }
                  - (void)onPaymentError:(int32_t)code description:(NSString * _Nonnull)str andData:(NSDictionary * _Nonnull)response { 
                   // Handle Payement Failure
                 }

                         ```

                         

                          
                        Request Parameters
                        
                        
`turboPayload` _mandatory_
: `dictionary` Payload for initiating the transaction.
                         

                         
                         
                         
### Response Parameters

`onSuccess` 
: This function is triggered if the list is fetched successfully. accList can be empty to indicate that no accounts have been linked yet.

`onFailure` 
: This function is triggered in case an error is thrown during the retrieval process, either by the Razorpay SDK or the Bank SDK.
                            

                         

                     
                
             
        
    
    
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

> **WARN**
>
> 
>     **Watch Out!**
>     If the device binding is not completed and `getLinkedUpiAccounts` is triggered, it will return a `Device Binding Not Done` error message.
>     

    - You can retrieve the list of UPI accounts linked to a customer's mobile number using the following code. This function can be invoked from any part of the application, offering multiple entry points for customers to manage their UPI accounts.

    ```swift: Swift
    razorpay?.upiTurboUI?.getLinkedUpiAccounts("MOBILE_NUMBER", resultDelegate: self)

    ```objc: Objective C
    [[razorpay upiTurboUI] getLinkedUpiAccountsWithMobileNumber:@"9000090000" delegate:self];
    ```

    - Implement the delegate methods to handle the response for fetching linked UPI accounts. Below is an example:

    ```swift: Swift
    extension ViewController: UPITurboResultDelegate {
        func onSuccessFetchingLinkedAcc(_ accList: [UpiAccount]) {
            if accList.count > 0 {
                print("Linked UPI Accounts fetched successfully.")
            } else {
                print("No linked UPI accounts found. Prompt user to link a new account.")
            }
        }

        func onErrorFetchingLinkedAcc(_ error: TurboUpiPlugin.TurboError?) {
            print("Error fetching linked UPI accounts: \(error?.errorDescription ?? "Unknown error")")
            print("Error code: \(error?.errorCode ?? 0)")
        }
    }

    ```objc: Objective C
    @interface ViewController () 
    @end

    @implementation ViewController

    - (void)onSuccessFetchingLinkedAcc:(NSArray *)accList {
        if (accList.count > 0) {
            NSLog(@"Linked UPI Accounts fetched successfully.");
        } else {
            NSLog(@"No linked UPI accounts found. Prompt user to link a new account.");
        }
    }

    - (void)onErrorFetchingLinkedAcc:(TurboError *)error {
        NSLog(@"Error fetching linked UPI accounts: %@", error.errorDescription);
        NSLog(@"Error code: %ld", (long)error.errorCode);
    }

    @end
    ```

### Non-Transactional Flow

You can directly interact with the exposed methods of the Turbo Framework to perform the non-transactional flows listed below.

    
### Manage UPI Accounts

         Let Razorpay SDK manage the linked UpiAccounts on the applications by triggering `manageUpiAccounts()`.

            ```swift: Swift
            self.razorpay?.upiTurboUI?.manageUpiAccount(mobileNumber: "MOBILE_NUMBER", color: "#0000FF", completionHandler: { upiAccounts, error in
                guard error == nil else {
                    let err = error as? TurboError
                    // Handle error
                    return
                }
            
                guard let vpaAccounts = upiAccounts as? [UpiAccount] else {
                    return
                }
                // Handle UPI Account Response here
            
             })

            ```objc: Objective C
            [[self.razorpay upiTurboUI] manageUpiAccountWithMobileNumber:@"MOBILE_NUMBER"
                                                                  color:@"#0000FF"
                                                      completionHandler:^(NSArray *upiAccounts, NSError *error) {
                if (error != nil) {
                    TurboError *err = (TurboError *)error;
                    // Handle error
                    return;
                }

                if (![upiAccounts isKindOfClass:[NSArray class]] || upiAccounts.count == 0) {
                    return;
                }

                // Handle UPI Account Response here
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

### Models Exposed from the SDKs

The SDKs provide access to exposed models for seamless integration.

   
### UpiAccount

         

        Properties | Return Type | Description   
         ---
         accountNumber | String | Returns masked bank account number.
         ---
         type | String | The account type. Possible values are `bank_account` or `credit_card`.
         ---
         ifsc | String | Returns IFSC for Bank.
         ---
         bankName | String | Returns the name of the bank.
         ---
         bankLogoUrl | String | Returns the URL to the logo of the PNG image.
         ---
         bankPlaceholderUrl | String | Image URL for bank logo placeholder. 
         ---
         pinLength | Integer | Length on UPI PIN.

         
        

    
### UpiBankAccount

         

         Properties | Return Type | Description
         ---
         accountNumber | String | Account number.
         ---
         beneficiaryName | String | Name of account holder.
         ---
         bank | UpiBank | The bank Object.
         ---
         type | String | The account type. Possible values are `savings`,  `current` and `credit`.

         
        

    
### UpiBank

         

         Properties | Type | Description
         ---
         ifsc | String | IFSC of the bank.
         ---
         logo | String | Bank logo URL.
         ---
         name | String | Name of the bank.
         ---
         bankPlaceholderUrl | String | Image URL for bank logo placeholder.
         
        

    
### TurboError

         

         Properties | Type | Description
         ---
         errorCode | String | Types of error codes - `BAD_REQUEST_ERROR`: Failure from the client's end (SDK).
- `GATEWAY_ERROR`: Failure either from the Secure Component or the Bank.
- `SERVER_ERROR`: Failure at PSP.

         ---
         errorDescription | String | Brief description of the error.
         ---
         errorReason | String | Specifies the specific reason for the error.
         ---
         errorSource | String | Indicates the origin of the error. Possible values: - `gateway`
- `issuer_bank`
- `beneficiary_bank`
- `customer_psp`
- `customer`
- `internal`

         ---
         errorStep | String |  Highlights the stage where the error occurred.

         

         [Refer to the list of possible error reasons](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/error-codes.md).
        

    
### TurboTPVBankAccount

         

         Properties | Return Type | Description
         ---
         accountNumber | String | Returns the account number.
         ---
         ifsc | String | IFSC of the bank.
         ---
         bankName | String | Name of the bank.
           
        

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
