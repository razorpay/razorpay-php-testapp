---
title: Integrate Razorpay Magic Checkout on iOS App
heading: Integrate Magic Checkout on iOS App
description: Steps to integrate Magic Checkout on your iOS app using the Razorpay iOS Standard SDK.
---

# Integrate Magic Checkout on iOS App

Follow these steps to integrate the Razorpay Magic Checkout on your iOS application.

#### Prerequisites

- Create a Razorpay account.
- Generate [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings.md#api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

  - **1. Build Integration**:  Integrate with iOS App.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

## 1. Build Integration

Follow the steps given below:

  
### 1.1 Enable/Disable Magic Checkout and Cash on Delivery

     
       
         Raise a request with your Razorpay SPOC to get this feature enabled on your account.
         Once this feature is enabled, the customer address saving and coupon features are enabled. 
       
       
         Raise a request with our [Support team](https://razorpay.com/support/) to enable this feature for your account.
       
     
    

  
### 1.2 Create Promotions and Shipping Info API Endpoints

     Follow the steps given below to create promotions and shipping info API endpoints: 
     
     
> **WARN**
>
> 
>      **Watch Out!**
>      
>      Ensure that the URLs are publicly accessible, require no authentication and are hosted on your server.
>      

     
     1. Log in to the Dashboard and navigate to **Magic Checkout**.  
     2. In the **Platform Setup**, select **Custom E-Commerce Platform** from the drop-down list and click **Next**.
         ![Choose custom platform](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-custom-platform.jpg.md)
     3. In the **Setup & Settings** section, click **Checkout Settings**. 
     4. In the **Coupon Settings** section, enter the following:
        1. **URL for get promotions**: The API URL should return a list of promotions applicable to the specified order_id and customer. Magic Checkout uses this endpoint to fetch these promotions from your server and display them to your customers in the checkout modal.
        2. **URL for apply promotions**: The API URL validates the promotion code applied by the customer and should return the discount amount. Magic Checkout uses this endpoint to apply promotions via your server.
     5. Click **Save settings**.
        ![Add promotion URLs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-web-promo-url.jpg.md)
     6. Navigate to **Shipping Setup**.
     7. Select **API** as the Shipping Service type from the drop-down list.
     8. Enter the **URL for shipping info**. The API URL should return shipping serviceability, COD serviceability, shipping fees and COD fees for a given list of customer addresses. Magic Checkout uses this endpoint to retrieve shipping information from your server. 
     9. Click **Save Settings**.
        ![Add shipping URL](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/magic-web-shipping-url.jpg.md)
    

  
### 1.3 Import Razorpay iOS Standard SDK Library

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
        

     
    
  
  
### 1.4 Initialise Razorpay iOS Standard SDK

     To initialise Razorpay iOS Standard SDK, you need the following:

     - API keys. You can generate this from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          API keys should not be hardcoded in the app. Must be sent from your backend as app-related metadata fetch.
>          

 
     - A delegate that implements `RazorpayPaymentCompletionProtocol` or `RazorpayPaymentCompletionProtocolWithData`.

     
> **WARN**
>
> 
> 
>      **Watch Out!**
> 
>      - For Swift version 5.1+, ensure that you declare `var razorpay: RazorpayCheckout!`. 
>      - For versions lower than 5.1, use `var razorpay: Razorpay!`.
>      - Alternatively, you can use the following alias and retain the variable as Razorpay. 

> 
>      `typealias Razorpay = RazorpayCheckout`
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
    

  
### 1.5 Create an Order in Server

     @include magic/order-creation
    

  
### 1.6 Interact with Shipping Info API

     This API should return shipping serviceability, COD serviceability, shipping fees and COD fees for a given list of customer addresses.

     /your-server-url/shipping-info-api-path

     ```curl: Request
     {
        "order_id": "SomeReceiptValue", // This is the receipt field set in the Razorpay order
        "razorpay_order_id": "EKwxwAgItmmXdp", // This is the RZP order created without the `order_` prefix
        "email": "", // Email field will be set if the customer enters an email
        "contact": "+919900000000", // Customer phone number with country code
        "addresses": [{
          "id": "0", 
          "zipcode": "560060",
          "state_code": "KA",
          "country": "IN"
        }]
     }

     ```json: Response
     {
       "addresses": [
         {
           "id": "0",
           "zipcode": "560000",
           "state_code": "KA",
           "country": "IN",
           "shipping_methods": [
             {
               "id": "1",
               "description": "Free shipping",
               "name": "Delivery within 5 days",
               "serviceable": true,
               "shipping_fee": 1000, // in paise. Here 1000 = 1000 paise, which equals to ₹10
               "cod": true,
               "cod_fee": 1000 // in paise. Here 1000 = 1000 paise, which equals to ₹10
             },
             {
               "id": "2",
               "description": "Standard Delivery",
               "name": "Delivered on the same day",
               "serviceable": true,
               "shipping_fee": 1000, // in paise. Here 1000 = 1000 paise, which equals to ₹10
               "cod": false,
               "cod_fee": 0 // in paise. Here 1000 = 1000 paise, which equals to ₹10
             }
           ]
         }
       ]
     }
     ```
     
      
        Request Parameters
        
`order_id` _mandatory_
: `string` Unique identifier of the order created [previously](#15-create-an-order).

`razorpay_order_id` _mandatory_
: `string` Unique identifier for the order returned by Checkout.

`email` _optional_
: `string` Customer's email address.

`contact` _mandatory_
: `string` Customer's phone number.

`addresses` _mandatory_
: `array` Customer's address details.

  `id` _mandatory_
  : `string` Unique identifier of the customer's address.

  `zipcode` _mandatory_
  : `string` Customer's ZIP code.

  `state_code` _optional_
  : `string` The code of the state where the customer resides.

  `country` _mandatory_
  : `string` Country where the customer resides. The length cannot exceed 2 characters.
        

      
### Response Parameters

`addresses` _mandatory_
: `array` Customer's address details.

  `id` _mandatory_
  : `string` Unique identifier of the customer's address.

  `zipcode` _mandatory_
  : `string` Customer's ZIP code.

  `country` _mandatory_
  : `string` Country where the customer resides. The length cannot exceed 2 characters.

  `shipping_methods` _mandatory_
  : `array` Details regarding the shipping methods.

    `id` _mandatory_
    : `string` Unique identifier of the shipping method.

    `description`
    : `integer` Brief description of the shipping method.

    `name` _mandatory_
    : `string` Name of the shipping method.

    `serviceable` _mandatory_
    : `boolean` Indicates whether you deliver orders to the  zipcode entered by the customer. This is based on the ZIP codes you have added in the serviceability setting on the Razorpay Dashboard. Possible values:
        - `true`: Orders can be delivered to the added ZIP codes.
        - `false`: Orders cannot be delivered to the added ZIP codes.

    `shipping_fee` _mandatory_
    : `integer` Shipping charge in paise applicable to be paid by the customer.

    `cod` _mandatory_
    : `boolean` Indicates whether you support cash on delivery on this order.
        - `true`: COD payment method is supported.
        - `false`: COD payment method is not supported.

    `cod_fee` _mandatory_ : `integer` Cash on Delivery fee charged in paise. This amount is based on the COD settings configured in your Razorpay Dashboard.

    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     If the `cod` field is false, set the `cod_fee` field to 0.
>     

        

     
    
  
  
### 1.7 Interact with Get Promotions API

     This API should return the list of promotions applicable for the given `order_id` and customer.

     /your-server-url/create-promotions-api-path

     ```curl: Request
     {
       "order_id": "SomeReceiptValue", // this is the receipt field set in Razorpay order
       "contact": "+919000090000", 
       "email": ""
     }'
     ```json: Response
     {
        "promotions": [
          {
            "code": "10%OFF",
            "summary": "10% off on total cart value",
            "description": "10% on total cart value upto ₹300"
          },
          {
            "code": "500OFF",
            "summary": "₹500 off on total cart value",
            "description": "₹500 off on a minimum cart value of ₹1500"
          }
        ]
      }
     ```
     
      
        Request Parameters
        
`order_id` _mandatory_
: `string` Unique identifier of the order created [previously](#15-create-an-order).

`contact` _optional_
: `string` Customer's phone number.

`email` _optional_
: `string` Customer's email address.
        

      
### Response Parameters

`promotions` _mandatory_
: `array` Details of the promotions created.

  `code` _mandatory_
  : `string` Unique identifier of the promotion.

  `summary` _mandatory_
  : `string` Summary about the promotion. For example, 10% off on total cart value.

  `description` _optional_
  : `string` Brief description of the promotion. For example, 10% on total cart value upto ₹300.
        

      
### 1.7.1 Interact with Apply Promotions API

         This API should validate the promotion code applied by the customer and return the discount amount.

         /your-server-url/create-promotions-api-path

         ```curl: Request
         {
           "order_id": "SomeReceiptValue", // this is the receipt field set in Razorpay order
           "contact": "+919000090000",
           "email": "",
           "code": "500OFF"
           }'

         ```json: Success Response
         {
           "promotion": {
           "reference_id": "3rvff", 
           "type": "offer",
           "code": "500OFF", 
           "value": 50000, 
           "value_type": "fixed_amount", 
           "description": "New Year Sale Offer"
           } 
         }
         ```json: Failure Response
         {
          "failure_code": "LOGIN_REQUIRED",
          "failure_reason": “promotion Code has expired" 
         }
         ```

         
           
             Request Parameters
             
`order_id` _mandatory_
: `string` Unique identifier of the order created [previously](#15-create-an-order).

`contact` _optional_
: `string` Customer's phone number.

`email` _optional_
: `string` Customer's email address.

`code` _mandatory_
: `string` Promotion code used to avail discount on checkout.
             

           
### Response Parameters

`promotion` _mandatory_
: `object` Used to pass all offer or discount-related information, including promotion code discount, method discount and so on.

  `reference_id` _mandatory_
  : `string` Identifier of the offer you create. 

  `code` _optional_
  : `string` Promotion code used to avail discount on checkout.

  `type` _optional_
  : `string` Type of offer. Possible values: 
    - `coupon`: A discount applied by customers during checkout. For example, customers can use a coupon like `Diwali Sale 500 Off` to get ₹500 off the total cart value.
    - `offer`: A promotion you create for your customers. For example, you create an offer `Buy 4 t-shirts and get 2 free`. In this case, when customers add 4 t-shirts to their cart, the 2 additional t-shirts will be automatically added for free.

  `value` _optional_
  : `integer` The offer value that needs to be applied in paise. For example, if you want to offer a discount of ₹500, enter 50000.

  `value_type` _optional_
  : `string` The type of value like:
    - `fixed_amount`: A fixed amount discount value in the currency of the order. For example, ₹500.
    - `percentage`: A percentage discount value. For example, 10%.
    - `BXGY`: Buy X and Get Y. For example, if you buy 2 t-shirts, you a get a cap for free or at a discounted value.

     
> **INFO**
>
> 
>      **Handy Tips**
>      
>      Regardless of the `value_type`, the amount specified in the `value` parameter is applied as-is. For example, if `value_type` is percentage and the `value` is 5000, 5000 is considered in currency subunits (paise).
>      

     
  `description` _optional_
  : `string` Description of the promotion applied. For example, `New Year Sale Offer`.
             

           
### Error Code, Description and Next Steps

              
              Code | Description | Next Steps
              ---
              INVALID_PROMOTION | The specified promotion code is not recognised or does not exist in the system. | Please verify the code and try again.
              ---
              LOGIN_REQUIRED | 	This coupon is specifically assigned to a registered customer. | To redeem it, the customer must log in to their account and authenticate their identity.
              ---
              REQUIREMENT_NOT_MET | The current cart conditions do not meet the requirements for this promotion to be valid. For example, the promotion may require a minimum cart value of ₹1,000, but the cart total is ₹800. | Review the promotion's terms and adjust the cart contents accordingly.
              
             

         
        
      
     
    
  

  
### 1.8 Pass Payment Options and Display Checkout Form

     Call `RazorpayCheckout.checkIntegration(withMerchantKey: )` to check the health of integration. This will also let you know if the SDK version is outdated. The opinionated alerting is displayed only when it is running on simulators.

     Add the following code to your `ViewController` or wherever you want to initialise payments:

     ```swift: ViewController.swift
     internal func showPaymentForm(){
         let options: [String:Any] = [
                     "key": "YOUR_KEY_ID",
                     "amount": "100", //This is in currency subunits. 100 = 100 paise= INR 1.
                     "currency": "",//We support more that 92 international currencies.
                     "description": "purchase description",
                     "order_id": "order_DBJOWzybf0sJbb",
                     "image": "https://url-to-image.jpg",
                     "name": "business or product name",
                     "prefill": [
                         "contact": "",
                         "email": ""
                     ],
                     "one_click_checkout": true, //magic checkout
                     "show_coupons": true, //magic checkout
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
                                 @"amount": @"1000",  //This is in currency subunits. 1000 = 1000 paise= INR 10.
                                 // all optional other than amount.
                                 @"currency": @"",  //We support more that 92 international currencies.
                                 @"image": @"https://url-to-image.jpg",
                                 @"name": @"business or product name",
                                 @"description": @"purchase description",
                                 @"order_id": @"order_4xbQrmEoA5WJ0G",
                                 @"prefill" : @{
                                     @"email": @"",
                                     @"contact": @""
                                 },
                                 @"one_click_checkout": @"true", //magic checkout
                                 @"show_coupons": @"true", //magic checkout
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
>      **Optional Parameter - displayController**
> 
>      When the optional parameter- displayController, is specified, the Razorpay controller is pushed onto this controller's navigation controller if present or presented on this controller if absent.
> 
>      ```
>      razorpay.open(options, displayController: self)
>      ```
>      

     
        
            Checkout Options
            
             @include checkout-parameters/magic-sdk

             You must pass these parameters in Checkout to initiate the payment.

             
> **WARN**
>
> 
> 
>              **Watch Out!**
> 
>              To support theme colour in the progress bar, please pass HEX colour values only.
>              

            

        
### 1.8.1 Enable UPI Intent on iOS *(Optional)*

             @include integration-steps/ios-upi-intent
            

     
    
  
  
### 1.9 Handle Success and Error Events

     After completing payment, you can handle success or error events by implementing `onPaymentSuccess` and `onPaymentError` methods of the `RazorpayPaymentCompletionProtocol`.

     Alternatively, you can implement `onPaymentSuccess` and `onPaymentError` methods of `RazorpayPaymentCompletionProtocolWithData`.

     
        
            RazorpayPaymentCompletionProtocol
            
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
            

        
### RazorpayPaymentCompletionProtocolWithData

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

     **Failure Codes**:
     - 0: Network error
     - 1: Initialization failure / Unexpected behaviour
     - 2: Payment cancelled by the user

     Success handler receives `payment_id` that you can use later for capturing the payment.
    
  
  
### 1.10 Store Fields in Your Server

      @include integration-steps/store-fields
    
 
  
### 1.11 Verify Payment Signature

      @include integration-steps/verify-signature
    
 
  
### 1.12 Verify Payment Status

      @include integration-steps/verify-payment-status
    
 
  
### 1.13 Perform Post Payment Processing

     @include magic/post-payment
    

 

## 2. Test Integration

@include integration-steps/next-steps-magic

## 3. Go-live Checklist

Check the go-live checklist for Razorpay Magic Checkout integration. Consider these steps before taking the integration live.

    
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
        

## Related Information

[iOS Standard Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/standard.md)
