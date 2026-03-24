---
title: iOS SDK - Integration Steps | Razorpay Payment Gateway
heading: Integration Steps
description: Steps to integrate your iOS application with Razorpay iOS Standard SDK.
---

# Integration Steps

Follow these steps to integrate your iOS application:

  - **1. Build Integration**: Integrate iOS Standard Checkout.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

[Video: https://www.youtube.com/embed/5HTQX-AokIk]

## 1. Build Integration

Follow the steps given below:

    
### 1.1 Import Razorpay iOS Standard SDK Library

         You can import the Razorpay iOS Standard SDK library using any of these ways: 
         
            
                Refer to our [Cocoapod](https://cocoapods.org/pods/razorpay-pod) (bitcode enabled) pod.
            
            
                1. Download the SDK and unzip it.
                2. Open your project in XCode and go to **file** under **Menu**. Select **Add files to "yourproject"**.
                3. Select **Razorpay.xcframework** in the directory you just unzipped.
                4. Select the **Copy items if needed** checkbox.
                5. Click **Add**.
                6. Navigate to **Target settings → General** and add the **Razorpay.xcframework** in both **Embedded Binaries** and **Linked Frameworks and Libraries**.
            
            
                If you are building an **Objective-C** project, follow the steps given for Swift and the additional steps given below:
                1. Go to **Project Settings** and select **Build Settings - All and Combined**.
                2. Set the **Always Embed Swift Standard Libraries** option to **TRUE**.

                Ensure that you have the framework added in both **Embedded Binaries** and **Linked Frameworks and Libraries** under **Target settings - General**.
            
         

         
            
                Xcode 11
                
                 Ensure that you have the framework added in **Frameworks, Libraries, and Embed Content** under **Target settings - General**. Change `Embed status` from - `Do not Embed` to `Embed & Sign`. 

                 Watch the GIF to see how to add Frameworks, Libraries and Embed Content.

                 ![add Frameworks, Libraries and Embed Content](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ios-embed-framework.gif.md)
                

         
        
    
    
### 1.2 Initialize Razorpay iOS Standard SDK

         To initialize Razorpay iOS Standard SDK, you need the following:

         - API keys. You can generate this from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

             
> **WARN**
>
> 
>              **Watch Out!**
> 
>              API keys should not be hardcoded in the app. Must be sent from your backend as app-related metadata fetch.
>              

         - A delegate that implements `RazorpayPaymentCompletionProtocol` or `RazorpayPaymentCompletionProtocolWithData`.

         
> **WARN**
>
> 
> 
>          **Watch Out!**
> 
>          - For Swift version 5.1+, ensure that you declare `var razorpay: RazorpayCheckout!`. 
>          - For versions lower than 5.1, use `var razorpay: Razorpay!`.
>          - Alternatively, you can use the following alias and retain the variable as Razorpay. 

> 
>          `typealias Razorpay = RazorpayCheckout`
>          

         ```swift: ViewController.swift

         import Razorpay

         class ViewController: UIViewController, RazorpayPaymentCompletionProtocol {

         // typealias Razorpay = RazorpayCheckout

             var razorpay: RazorpayCheckout!
             override func viewDidLoad() {
                 super.viewDidLoad()
                 razorpay = RazorpayCheckout.initWithKey(razorpayTestKey, andDelegate: self)
             }
             override func viewWillAppear(_ animated: Bool) {
             super.viewWillAppear(animated)
                     self.showPaymentForm()
             }
         }
         ```objectivec: ViewController.m
         #import 
         //- typedef RazorpayCheckout Razorpay;

         @interface ViewController ()  {
         RazorpayCheckout *razorpay;
             .
             .
             - (void)viewDidLoad {
                 [super viewDidLoad];
                 .
                 .
                 razorpay = [RazorpayCheckout initWithKey:@"YOUR_PUBLIC_KEY" andDelegate:self];
             }
         }
         ```
        

    
### 1.3 Create an Order in Server

         @include integration-steps/order-creation-v2
        

    
### 1.4 Pass Payment Options and Display Checkout Form

         Call `RazorpayCheckout.checkIntegration(withMerchantKey: )` to check the health of integration. This will also let you know if the SDK version is outdated. The opinionated alerting is displayed only when it is running on simulators. Add the following code to your `ViewController` or wherever you want to initialize payments:

         ```swift: ViewController.swift
         internal func showPaymentForm(){
             let options: [String:Any] = [
                         "key": "YOUR_KEY_ID",
                         "amount": "100", // This is in currency subunits. 
                         "currency": "",// We support more that 92 international currencies.
                         "description": "purchase description",
                         "order_id": "order_DBJOWzybf0sJbb",
                         "image": "https://url-to-image.jpg",
                         "name": "business or product name",
                         "prefill": [
                             "contact": "",
                             "email": ""
                         ],
                         "theme": [
                             "color": "#F37254"
                         ]
                     ]
             razorpay.open(options)
         }
         ```objectivec: ViewController.m
         - (void)showPaymentForm { // called by your app
         NSDictionary *options = @{
                                     @"key": @"YOUR_KEY_ID",
                                     @"amount": @"1000",  // This is in currency subunits. 
                                     // all optional other than amount.
                                     @"currency": @"",  // We support more that 92 international currencies.
                                     @"image": @"https://url-to-image.jpg",
                                     @"name": @"business or product name",
                                     @"description": @"purchase description",
                                     @"order_id": @"order_4xbQrmEoA5WJ0G",
                                     @"prefill" : @{
                                         @"email": @"",
                                         @"contact": @""
                                     },
                                     @"theme": @{
                                         @"color": @"#F37254"
                                     }
                                 };
             [razorpay open:options];
         }
         ```

         
> **INFO**
>
> 
> 
>          **Optional Parameter - displayController**
> 
>          When the optional parameter- displayController, is specified, the Razorpay controller is pushed onto this controller's navigation controller if present or presented on this controller if absent.
> 
>          ```
>          razorpay.open(options, displayController: self)
>          ```
>          

         
            
                Checkout Options
                
                 You must pass these parameters in Checkout to initiate the payment.

                 @include checkout-parameters/standard

                 
> **WARN**
>
> 
> 
>                  **Watch Out!**
> 
>                  To support theme colour in the progress bar, please pass HEX colour values only.
>                  

                

            
            
### 1.4.1 Enable UPI Intent on iOS *(Optional)*

                 @include integration-steps/ios-upi-intent
                

            
         
        
    

    
### 1.5 Handle Success and Errors Events

         After completing payment, you can handle success or error events by implementing `onPaymentSuccess` and `onPaymentError` methods of the `RazorpayPaymentCompletionProtocol`.

         Alternatively, you can implement `onPaymentSuccess` and `onPaymentError` methods of `RazorpayPaymentCompletionProtocolWithData`.

         
            
                ```swift: ViewController.swift
                extension CheckoutViewController : RazorpayPaymentCompletionProtocol {

                    func onPaymentError(_ code: Int32, description str: String) {
                        print("error: ", code, str)
                        self.presentAlert(withTitle: "Alert", message: str)
                    }

                    func onPaymentSuccess(_ payment_id: String) {
                        print("success: ", payment_id)
                        self.presentAlert(withTitle: "Success", message: "Payment Succeeded")
                    }
                }
                ```objectivec: ViewController.m
                - (void)onPaymentSuccess:(NSString *)payment_id {
                [self showAlertWithTitle:SUCCESS_TITLE
                                andMessage:[NSString
                                            stringWithFormat:SUCCESS_MESSAGE, payment_id]];
                }

                - (void)onPaymentError:(int)code description:(NSString *)str {
                [self showAlertWithTitle:FAILURE_TITLE
                                andMessage:[NSString
                                            stringWithFormat:FAILURE_MESSAGE, code, str]];
                }
                ```
            
            
               ```swift: ViewController.swift
                extension CheckoutViewController: RazorpayPaymentCompletionProtocolWithData {

                    func onPaymentError(_ code: Int32, description str: String, andData response: [AnyHashable : Any]?) {
                        print("error: ", code)
                        self.presentAlert(withTitle: "Alert", message: str)
                    }

                    func onPaymentSuccess(_ payment_id: String, andData response: [AnyHashable : Any]?) {
                        print("success: ", payment_id)
                        self.presentAlert(withTitle: "Success", message: "Payment Succeeded")
                    }
                }
                ```objectivec: ViewController.m
                - (void)onPaymentError:(int32_t)code description:(NSString * _Nonnull)str andData:(NSDictionary * _Nullable)response {
                    NSLog(@"%@ %@",str, response);
                }
                - (void)onPaymentSuccess:(NSString * _Nonnull)payment_id andData:(NSDictionary * _Nullable)response {
                    NSLog(@"%@ %@",payment_id, response);
                }
                ```

                After completing the payment, add necessary actions based on success or error events.
            
         

         
            
                Failure Codes
                
                 - 0: Network error
                 - 1: Initialization failure / Unexpected behaviour
                 - 2: Payment cancelled by the user

                 Success handler receives `payment_id` that you can use later for capturing the payment.
                

         
        
    
    
### 1.6 Store the Fields in Database

         @include integration-steps/store-fields
        

    
### 1.7 Verify Payment Signature

         @include integration-steps/verify-signature
        

    
### 1.8 Verify Payment Status

         @include integration-steps/verify-payment-status
        

## 2. Test Integration

@include integration-steps/next-steps

## 3. Go-live Checklist

Check the go-live checklist for Razorpay iOS integration. Consider these steps before taking the integration live.

    
### 3.1 Accept Live Payments

         Perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the integration is working as expected, switch to the Live Mode and start accepting payments from customers.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you are switching your test API keys with API keys generated in Live Mode.
> 

To generate API Keys in Live Mode on your Razorpay Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

        

    
### 3.2 Payment Capture

         @include integration-steps/capture-settings
        

    
### 3.3 Set Up Webhooks

         @include integration-steps/set-up-webhooks
