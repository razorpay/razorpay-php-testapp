---
title: Integrate Razorpay Magic Checkout on iOS App - Shopify
heading: Integrate Magic Checkout on iOS App - Shopify
description: Steps to integrate Magic Checkout on your iOS app using the Razorpay iOS Standard SDK - Shopify integration.
---

# Integrate Magic Checkout on iOS App - Shopify

Follow these steps to integrate the Razorpay Magic Checkout on your iOS application when using Shopify as your e-commerce platform.

## Prerequisites

- Ensure you enable [Magic Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/troubleshooting-faqs.md#3-how-do-i-check-if-magic-checkout) on your account.
- Integrate [Magic Checkout With Shopify Store](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/shopify.md).
- Integrate with [iOS Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/ios-integration.md).
- Generate [Live API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings.md#api-keys) from the Dashboard. 

  - **1. Build Integration**:  Integrate with iOS App for Shopify.

  - **2. Test Integration**: Test the integration by making a test payment.

## 1. Build Integration

Follow the steps given below:

  
### 1.1 Create a Checkout id

     Generate a unique cart identifier to initiate the Magic Checkout process.
     
     
> **INFO**
>
> 
>      **Important**
>      
>      Ensure you create the Shopify cart before making this request as the cart token must be included in the payload.
>      

     /magic/checkout/shopify?key_id=rzp_live_XXXXXX

     ```curl: Request
     curl -X POST https://api.razorpay.com/v1/magic/checkout/shopify?key_id=rzp_live_XXXXXX \
       -H "Content-Type: application/json" \
       -H "Accept: application/json" \
       -d '{
         "cart": {
           "token": "ashgad?key=abasab",
           "note": null,
           "attributes": {},
           "item_count": 1,
           "items": [
             {
               "id": 100000000001,
               "quantity": 1,
               "product_id": 832938123321,
               "variant_id": 100000000001,
               "properties": {}
             }
           ]
         }
       }'
     ```json: Response
     {
       "shopify_checkout_id": "gid://shopify/Cart/ashgad?key=abasab",
       "tax_details": {
         "total_tax": 0,
         "taxes_included": true
       }
     }
     ```

     
        
            Request Parameters
            
`cart` _mandatory_
: `object` Complete cart object from Shopify.

`cart.token` _mandatory_
: `string` Unique cart token from Shopify cart creation.

`cart.note` _optional_
: `string|null` Customer notes or special instructions.

`cart.attributes` _optional_
: `object` Custom attributes for the cart (key-value pairs).

`cart.item_count` _mandatory_
: `integer` Total number of items in the cart.

`cart.items` _mandatory_
: `array` Array of cart items.

`cart.items[].id` _mandatory_
: `integer` Unique item identifier.

`cart.items[].quantity` _mandatory_
: `integer` Quantity of the item.

`cart.items[].product_id` _mandatory_
: `integer` Shopify product identifier.

`cart.items[].variant_id` _mandatory_
: `integer` Shopify variant identifier.

`cart.items[].properties` _optional_
: `object` Custom item properties.
            

        
### Response Parameters

`shopify_checkout_id`
: `string` Unique checkout identifier for Shopify integration.

`tax_details`
: `object` Tax information for the checkout.

    `total_tax`
    : `integer` Total tax amount in smallest currency unit (paise).

    `taxes_included`
    : `boolean` Whether taxes are included in item prices. Possible values:
      - `true`: Taxes are included in item prices.
      - `false`: Taxes are separate from item prices.

     
    
  
  
### 1.2 Create Order id on Server

     Create a Razorpay order id required for the payment modal. This API requires the `shopify_checkout_id` from [Step 1.1](#11-create-a-checkout-id).
     
     /magic/order/shopify?key_id=rzp_live_XXXXXX

     ```curl: Request
     curl -X POST https://api.razorpay.com/v1/magic/order/shopify?key_id=rzp_live_XXXXXX \
       -H "Content-Type: application/json" \
       -H "Accept: */*" \
       -H "Origin: https://api.razorpay.com" \
       -d '{
         "shopify_checkout_id": "gid://shopify/Cart/ashgad?key=abasab",
         "ga_id": "GA1.1.xxxxxxx.xxxxxxxx",
         "fb_analytics": {
           "external_id": "unique_fb_external_id",
           "fbp": "fb.1.xxxxxxx.xxxxxxxx",
           "fbc": "",
           "event_source_url": "https://your-store.com/"
         },
         "utm_parameters": {
           "landing_page_url": "https://your-store.com/",
           "user_agent": "Mozilla/5.0 (Linux; Android 12; SM-G991B)..."
         },
         "analytics": {
           "fb_analytics": {
             "external_id": "unique_fb_external_id",
             "fbp": "fb.1.xxxxxxx.xxxxxxxx",
             "fbc": ""
           },
           "ga4": {
             "session_ids": {
               "_ga_XXXXXXXXXX": "GS1.1.xxxxxxxx.x.x.x.x.x"
             },
             "client_id": "GA1.1.xxxxxxxx.xxxxxxxx"
           },
           "google_ads": {
             "gclid": "",
             "wbraid": "",
             "gbraid": ""
           },
           "source_url": "https://your-store.com/"
         }
       }'
     ```json: Response
     {
       "preferences": null,
       "order_id": "order_EKwxwAgItmmXdp"
     }
     ```

     
        
            Request Parameters
            
`shopify_checkout_id` _mandatory_
: `string` Checkout id from [Step 1.1](#11-create-a-checkout-id).

`ga_id` _optional_
: `string` Google Analytics client identifier.

`fb_analytics` _optional_
: `object` Facebook Analytics parameters.

    `external_id` _optional_
    : `string` Unique external id for Facebook tracking.

    `fbp` _optional_
    : `string` Facebook browser pixel id.

    `fbc` _optional_
    : `string` Facebook click id.

    `event_source_url` _optional_
    : `string` Source URL for the event.

`utm_parameters` _optional_
: `object` UTM tracking parameters.

    `landing_page_url` _optional_
    : `string` Landing page URL.

    `user_agent` _optional_
    : `string` Browser user agent string.

`analytics` _optional_
: `object` Comprehensive analytics data.

    `fb_analytics` _optional_
    : `object` Facebook Analytics configuration.

        `external_id` _optional_
        : `string` Unique external id for Facebook tracking.

        `fbp` _optional_
        : `string` Facebook browser pixel id.

        `fbc` _optional_
        : `string` Facebook click id.

    `ga4` _optional_
    : `object` Google Analytics 4 configuration.

        `session_ids` _optional_
        : `object` GA4 session identifiers.

        `client_id` _optional_
        : `string` GA4 client identifier.

    `google_ads` _optional_
    : `object` Google Ads tracking parameters.

        `gclid` _optional_
        : `string` Google Click Identifier.

        `wbraid` _optional_
        : `string` Web-to-app measurement parameter.

        `gbraid` _optional_
        : `string` Google Ads Broad match parameter.

    `source_url` _optional_
    : `string` Source URL for analytics.
            

        
### Response Parameters

`preferences`
: `object|null` Customer preferences. Returns `null` if no preferences are set.

`order_id`
: `string` Unique Razorpay order identifier. For example, `order_EKwxwAgItmmXdp`.
            

     
    
  
  
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
    

  
### 1.5 Coupon Handling

     Since this is an SDK integration, Shopify coupons will not auto-apply like they do on the website. You must explicitly pass coupon codes to Magic Checkout. When initialising Magic Checkout, include the coupon code in the prefill options:

     ```javascript
     const options = {
       key: 'rzp_live_XXXXXX',
       order_id: 'order_EKwxwAgItmmXdp',
       // ... other options
       
       prefill: {
         coupon_code: 'MY_COUPON_NAME',  // Coupon from your cart to auto-apply
       },
     };

     // Initialize Magic Checkout with options
     MagicCheckout.open(options);
     ```

     Your app captures the coupon applied on the cart page, then passes the coupon code in the `prefill.coupon_code` field. The SDK internally calls `applyCoupon('MY_COUPON_NAME')`, and if the coupon is valid, it is automatically applied in Magic Checkout.
    

  
### 1.6 Pass Payment Options and Display Checkout Form

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
                         "contact": "+919876543210",
                         "email": "gaurav.kumar@example.com"
                     ],
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
                                     @"email": @"gaurav.kumar@example.com",
                                     @"contact": @"+919876543210"
                                 },
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
            
             `key` _mandatory_
: `string` API key id generated from the Dashboard.

`amount` _mandatory_
: `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is , enter `50000`.

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. Length must be of 3 characters.

`name` _mandatory_
: `string` Your Business/Enterprise name shown on the Checkout form. For example, **Acme Corp**.

`description` _optional_
: `string` Description of the purchase item shown on the Checkout form. It should start with an alphanumeric character.

`image` _optional_
: `string` Link to an image (usually your business logo) shown on the Checkout form. Can also be a **base64** string if you are not loading the image from a network.

`order_id` _mandatory_
: `string` Order id generated via [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`prefill`
: `object` You can prefill the following details at Checkout.

   
> **INFO**
>
> 
>    **Boost Conversions and Minimise Drop-offs**
> 
>    - Autofill customer contact details, especially phone number to ease form completion. Include customer’s phone number in the `contact` parameter of the JSON request's `prefill` object. Format: +(country code)(phone number). Example: "contact": "+919000090000".   
>    - This is not applicable if you do not collect customer contact details on your website before checkout, have Shopify stores or use any of the no-code apps.
> 
>    

   `name` _optional_
   : `string` Cardholder's name to be prefilled if customer is to make card payments on Checkout. For example, **Gaurav Kumar**.

   `email` _optional_
   : `string` Email address of the customer.

   `contact` _optional_
   : `string` Phone number of the customer. The expected format of the phone number is `+ {country code}{phone number}`. If the country code is not specified, `91` will be used as the default value. This is particularly important while prefilling `contact` of customers with phone numbers issued outside India. **Examples**:
       - +14155552671 (a valid non-Indian number)
       - +919977665544 (a valid Indian number). 
If 9977665544 is entered, `+91` is added to it as +919977665544.

   `method` _optional_
   : `string` Pre-selection of the payment method for the customer. Will only work if `contact` and `email` are also prefilled. Possible values:
       
       - `card`

       - `netbanking`

       - `wallet`

       - `upi`

       - `cod`

       

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`show_coupons` _optional_
: `boolean` Determines whether to show the coupons to customer on the checkout. Possible values:
  - `true` (default): Enables the Coupon feature.
  - `false`: Disables the Coupon feature.

`theme`
: `object` Thematic options to modify the appearance of Checkout.

   `color` _optional_
   : `string` Enter your brand colour's HEX code to alter the text, payment method icons and CTA (call-to-action) button colour of the Checkout form.

   `backdrop_color` _optional_
   : `string` Enter a HEX code to change the Checkout's backdrop colour.

`modal`
: `object` Options to handle the Checkout modal.

   `backdropclose` _optional_
   : `boolean` Indicates whether clicking the translucent blank space outside the Checkout form should close the form. Possible values:
       - `true`: Closes the form when your customer clicks outside the checkout form.
       - `false` (default): Does not close the form when customer clicks outside the checkout form.

   `escape` _optional_
   : `boolean` Indicates whether pressing the **escape** key should close the Checkout form. Possible values:
       - `true` (default): Closes the form when the customer presses the **escape** key.
       - `false`: Does not close the form when the customer presses the **escape** key.

   `handleback` _optional_
   : `boolean` Determines whether Checkout must behave similar to the browser when back button is pressed. Possible values:
       - `true` (default): Checkout behaves similarly to the browser. That is, when the browser's back button is pressed, the Checkout also simulates a back press. This happens as long as the Checkout modal is open.
       - `false`: Checkout does not simulate a back press when browser's back button is pressed.

   `confirm_close` _optional_
   : `boolean` Determines whether a confirmation dialog box should be shown if customers attempts to close Checkout. Possible values:
       - `true`: Confirmation dialog box is shown.
       - `false` (default): Confirmation dialog box is not shown.
  
   `ondismiss` _optional_
   : `function` Used to track the status of Checkout. You can pass a modal object with `ondismiss: function()\{\}` as options. This function is called when the modal is closed by the user. If `retry` is `false`, the `ondismiss` function is triggered when checkout closes, even after a failure.

   `animation` _optional_
   : `boolean` Shows an animation before loading of Checkout. Possible values:
       - `true`(default): Animation appears.
       - `false`: Animation does not appear.

`callback_url` _optional_
: `string` Customers will be redirected to this URL on successful payment. Ensure that the domain of the Callback URL is allowlisted.

`redirect` _optional_
: `boolean` Determines whether to post a response to the event handler post payment completion or redirect to Callback URL. `callback_url` must be passed while using this parameter. Possible values:
   - `true`: Customer is redirected to the specified callback URL in case of payment failure.
   - `false` (default): Customer is shown the Checkout popup to retry the payment with the suggested next best option.

`customer_id` _optional_
: `string` Unique identifier of customer. Used for:
   - [Local saved cards feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/features/saved-cards.md#manage-saved-cards).
   - Static bank account details on Checkout in case of [Bank Transfer payment method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md).

`remember_customer` _optional_
: `boolean` Determines whether to allow saving of cards. Can also be configured via the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#flash-checkout). Possible values:
   - `true`: Enables card saving feature.
   - `false` (default): Disables card saving feature.

`timeout` _optional_
: `integer` Sets a timeout on Checkout, in seconds. After the specified time limit, the customer will not be able to use Checkout.

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     Some browsers may pause `JavaScript` timers when the user switches tabs, especially in power saver mode. This can cause the checkout session to stay active beyond the set timeout duration.
>     

`readonly`
: `object` Marks fields as read-only.

   `contact` _optional_
   : `boolean` Used to set the `contact` field as read-only. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.

   `email` _optional_
   : `boolean` Used to set the `email` field as read-only. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.
      
   `name` _optional_
   : `boolean` Used to set the `name` field as read-only. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.

`hidden`
: `object` Hides the contact details.

   `contact` _optional_
   : `boolean` Used to set the `contact` field as optional. Possible values:
       - `true`: Customer will not be able to view this field.
       - `false` (default): Customer will be able to view this field.

   `email` _optional_
   : `boolean` Used to set the `email` field as optional. Possible values:
       - `true`: Customer will not be able to view this field.
       - `false` (default): Customer will be able to view this field.

`send_sms_hash` _optional_
: `boolean` Used to auto-read OTP for cards and netbanking pages. Applicable from Android SDK version 1.5.9 and above. Possible values:
   - `true`: OTP is auto-read.
   - `false` (default): OTP is not auto-read.

`allow_rotation` _optional_
: `boolean` Used to rotate payment page as per screen orientation. Applicable from Android SDK version 1.6.4 and above. Possible values:
   - `true`: Payment page can be rotated.
   - `false` (default): Payment page cannot be rotated.

`retry` _optional_
: `object` Parameters that enable retry of payment on the checkout.

   `enabled`
   : `boolean` Determines whether the customers can retry payments on the checkout. Possible values:
       - `true` (default): Enables customers to retry payments.
       - `false`: Disables customers from retrying the payment.
  
   `max_count`
   : `integer` The number of times the customer can retry the payment. We recommend you to set this to 4. Having a larger number here can cause loops to occur.
       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        Web Integration does not support the `max_count` parameter. It is applicable only in Android and iOS SDKs.
>        

  
`config` _optional_
: `object` Parameters that enable checkout configuration.
  
   `display`
   : `object` Child parameter that enables configuration of checkout display language.

       `language`
       : `string` The language in which checkout should be displayed. Possible values:
           - `en`: English
           - `ben`: Bengali
           - `hi`: Hindi
           - `mar`: Marathi
           - `guj`: Gujarati
           - `tam`: Tamil
           - `tel`: Telugu

             You must pass these parameters in Checkout to initiate the payment.

             
> **WARN**
>
> 
> 
>              **Watch Out!**
> 
>              To support theme colour in the progress bar, please pass HEX colour values only.
>              

            

        
### 1.6.1 Enable UPI Intent on iOS *(Optional)*

             Provide your customers with a better payment experience by enabling UPI Intent on your app's Checkout form. In the UPI Intent flow: 
              1. Customer selects UPI as the payment method in your iOS app. A list of UPI apps supporting the intent flow is displayed. For example, PhonePe, Google Pay and Paytm.
              2. Customer selects the preferred app. The UPI app opens with pre-populated payment details.
              3. Customer enters their UPI PIN to complete their transactions.
              4. Once the payment is successful, the customer is redirected to your app or website.

              To enable this in your iOS integration, you must make the following changes in your app's info.plist file.

              ```xml: info.plist
              LSApplicationQueriesSchemes
              
                  tez
                  phonepe
                  paytmmp
                  credpay
                  mobikwik
                  in.fampay.app
                  bhim
                  amazonpay
                  navi
                  kiwi
                  payzapp
                  jupiter
                  omnicard
                  icici
                  popclubapp
                  sbiyono
                  myjio
                  slice-upi
                  bobupi
                  shriramone
                  indusmobile
                  whatsapp
                  kotakbank
              
              ```

              Know more about [UPI Intent and its benefits](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/upi-intent.md).
            

     
    
  
  
### 1.7 Perform Post Payment Processing

     Based on the response, you can handle post-payment processing on your end. 

> **WARN**
>
> 
> **Timeout Handling**
> 
> If no API call is made within 45 seconds, our background job will assume there is a network drop off and will proceed to place the order on Shopify automatically.
> 

    
        Fetch an Order
        
         Use the Fetch Orders API to retrieve order details, including customer information, address, shipping method and promotions of a particular order:

          v1/orders/:id 

         ```curl: Curl
         curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]\
         -X GET https://api.razorpay.com/v1/orders/order_R1yDkxyIuKXXXX \
         ```java: Java
         RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
         import com.razorpay.Order;
         import com.razorpay.RazorpayClient;
         import com.razorpay.RazorpayException;
         try {
           Order order = razorpay.Orders.fetch("");
         } catch (RazorpayException e) {
           // Handle Exception
           System.out.println(e.getMessage());
         }
         ```Python: Python
         # do easy_install razorpay or
         #    pip install razorpay

         import razorpay
         razorpay.Client(auth=("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]"))

         order_id = 
         resp = client.order.fetch(order_id)
         ```php: PHP 
         $api = new Api($key_id, $secret);

         $api->order->fetch($orderId);
         ```ruby: Ruby
         require "razorpay"
         Razorpay.setup('key_id', 'key_secret')

         order = Razorpay::Order.fetch('order_R1yDkxyIuKXXXX')
         ```javascript: Node.js
         var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

         instance.orders.fetch(orderId)
         ```go: Go
         import ( razorpay "github.com/razorpay/razorpay-go" )
         client := razorpay.NewClient("", "")

         body, err := client.Order.Fetch("", nil, nil)
         ```
         ```json: Response: COD Orders
         {
           "id": "order_R1yDkxyIuKXXXX",
           "entity": "order",
           "amount": 507000,
           "amount_paid": 0,
           "amount_due": 507000,
           "currency": "INR",
           "receipt": "#30567",
           "offers": [
               "offer_QXwkRH1bOvXXXX",
               "offer_QXwoP07qnHXXXX",
               "offer_QYrcJ29gBCXXXX",
               "offer_QZDsVyMNzDXXXX",
               "offer_QtfwFTZYkGXXXX",
               "offer_Qtg3UsQyZaXXXX"
           ],
           "status": "placed",
           "attempts": 0,
           "notes": {
               "cart_id": "hWN2Am4BGnQrizKE3hzeQaXc?key=2b3cad31",
               "storefront_id": "gid://shopify/Cart/hf5Q?key=14bbbce35b8",
               "shopify_order_id": "6302119854247"
           },
           "created_at": 1756045901,
           "description": null,
           "checkout": null,
           "promotions": [
               {
                   "code": "orderOff",
                   "type": "cart_value",
                   "value": 10000,
                   "description": "order off",
                   "reference_id": "offer_ORnSr9d2eAXXXX"
               }
           ],
           "cod_fee": 5000,
           "shipping_fee": 7000,
           "customer_details": {
               "contact": "+919100000000",
               "email": "gaurav.kumar@example.com",
               "shipping_address": {
                   "city": "Bengaluru",
                   "contact": "+919100000000",
                   "country": "in",
                   "line1": "Houseno:24",
                   "line2": "Andree Road, Bheemanna Garden, Shanti Nagar",
                   "name": "Gaurav Kumar",
                   "state": "KARNATAKA",
                   "tag": "Home",
                   "type": "shipping_address",
                   "zipcode": "560001"
               },
               "billing_address": {
                   "city": "Bengaluru",
                   "contact": "+919100000000",
                   "country": "in",
                   "line1": "Houseno:24",
                   "line2": "Andree Road, Bheemanna Garden, Shanti Nagar",
                   "name": "Gaurav Kumar",
                   "state": "KARNATAKA",
                   "tag": "Home",
                   "type": "shipping_address",
                   "zipcode": "560001"
               }
           },
           "line_items_total": 600000,
           "tax_details": {
               "total_tax": 4128,
               "taxes_included": true
           }
         }
         ```json: Response: Prepaid Orders
         {
           "id": "order_R1yDkxyIuKXXXX",
           "entity": "order",
           "amount": 100700,
           "amount_paid": 100700,
           "amount_due": 0,
           "currency": "INR",
           "receipt": "#30414",
           "offers": [
               "offer_QXwkRH1bOvXXXX",
               "offer_QXwoP07qnHXXXX",
               "offer_QYrcJ29gBCXXXX",
               "offer_QZDsVyMNzDXXXX",
               "offer_QtfwFTZYkGXXXX",
               "offer_Qtg3UsQyZaXXXX"
           ],
           "status": "paid",
           "attempts": 1,
           "notes": {
               "cart_id": "hWN1TcwL?key=1a3a5a7c",
               "storefront_id": "gid://shopify/Cart/hIkey=af7c7800",
               "flits_cart_token": "hWcwL?key=1a3741dc_8740f5_175447",
               "shopify_order_id": "6266036191399"
           },
           "created_at": 1754466155,
           "description": null,
           "checkout": null,
           "promotions": [
               {
               "code": "orderOff",
               "type": "cart_value",
               "value": 10000,
               "description": "order off",
               "reference_id": "offer_ORnSr9d2eAXXXX"
               }
           ],
           "cod_fee": 0,
           "shipping_fee": 700,
           "customer_details": {
               "billing_address": {
               "city": "South West Delhi",
               "contact": "+919000090000",
               "country": "in",
               "id": "Qb3BljuFFoXXXX",
               "line1": "12",
               "line2": "Qutab Garh, Rama Krishna Puram",
               "name": "Gaurav Kumar",
               "state": "Delhi",
               "tag": "Home",
               "type": "billing_address",
               "zipcode": "110057"
               },
               "contact": "+919000090000",
               "email": "gaurav.kumar@example.com",
               "shipping_address": {
               "city": "South West Delhi",
               "contact": "+919000090000",
               "country": "in",
               "id": "Qb3BljuFFoXXXX",
               "line1": "12",
               "line2": "Qutab Garh, Rama Krishna Puram",
               "name": "Gaurav Kumar",
               "state": "Delhi",
               "tag": "Home",
               "type": "shipping_address",
               "zipcode": "110057"
               }
           },
           "line_items_total": 110000,
           "tax_details": {
               "total_tax": 0,
               "taxes_included": true
           }
         }
         ```

         Know more about the [Orders API.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md)

         
> **INFO**
>
> 
>          **Order Status**
> 
>          Check the order status for the following:
> 
>          - Prepaid orders: `paid`. 
>          - COD orders: `placed`.
>          

         
            
                Path Parameter
                
`id` _mandatory_
: `string` Unique identifier of the order to be retrieved.
                

            
### Response Parameters

`id`
: `string` Unique identifier of the order. For example, `order_R1yDkxyIuKXXXX`.

`entity`
: `string` Type of entity. Value is `order`.

`amount`
: `integer` Total order amount in the smallest currency unit (paise). 

`amount_paid`
: `integer` Amount paid towards the order in paise. For prepaid orders, this shows the actual amount paid. For COD orders, this is `0` until payment is collected.

`amount_due`
: `integer` Outstanding amount due in paise. For prepaid orders, this shows any remaining balance. For COD orders, this equals the `amount` field until payment is collected.

`currency`
: `string` The 3-letter ISO currency code. For example, `INR`.

`receipt`
: `string` Receipt identifier for internal reference. For example, `#30567`.

`offers`
: `array` Array of offer IDs applied to the order. 

`status`
: `string` Current status of the order. Possible values:
    - `placed`: Order placed but payment pending (COD orders).
    - `paid`: Order placed and payment completed (prepaid orders).
    - `cancelled`: Order cancelled.
    - `refunded`: Order refunded.

`attempts`
: `integer` Number of payment attempts made for this order. For example, `1`.

`notes`
: `object` Custom notes added to the order containing integration-specific data.

    `cart_id`
    : `string` Shopping cart identifier.

    `storefront_id`
    : `string` Storefront system identifier.

    `shopify_order_id`
    : `string` Shopify order reference.

    `flits_cart_token`
    : `string` Flits integration token (optional).

`created_at`
: `integer` Unix timestamp indicating when the order was created. For example, `1756045901`.

`description`
: `string|null` Order description. Returns `null` if no description is provided.

`checkout`
: `string|null` Checkout identifier. Returns `null` if not applicable.

`promotions`
: `array` Array of promotion objects applied to the order.

    `code`
    : `string` Promotion code used. For example, `orderOff`.

    `type`
    : `string` Type of promotion. For example, `cart_value`.

    `value`
    : `integer` Discount value in paise. For example, `10000` for ₹100.

    `description`
    : `string` Human-readable promotion description.

    `reference_id`
    : `string` Internal reference for the promotion.

`cod_fee`
: `integer` Cash on Delivery charges in paise. For COD orders, this contains the fee amount (for example, `5000` for ₹50). For prepaid orders, this is `0`.

`shipping_fee`
: `integer` Shipping charges in paise. For example, `700` for ₹7.

`customer_details`
: `object` Customer information.

    `contact`
    : `string` Customer's phone number.

    `email`
    : `string` Customer's email address.

    `shipping_address`
    : `object` Complete shipping address information.

        `city`
        : `string` City name.
        
        `contact`
        : `string` Contact number for delivery.
        
        `country`
        : `string` Country code. For example, `in`.
        
        `id`
        : `string` Address identifier (optional).
        
        `line1`
        : `string` Address line 1.
        
        `line2`
        : `string` Address line 2.
        
        `name`
        : `string` Recipient name.
        
        `state`
        : `string` State name.
        
        `tag`
        : `string` Address tag. For example, `Home`.
        
        `type`
        : `string` Address type. Value is `shipping_address`.
        
        `zipcode`
        : `string` Postal code.

    `billing_address`
    : `object` Complete billing address information.

        `city`
        : `string` City name.
        
        `contact`
        : `string` Contact number for billing.
        
        `country`
        : `string` Country code. For example, `in`.
        
        `id`
        : `string` Address identifier (optional).
        
        `line1`
        : `string` Address line 1.
        
        `line2`
        : `string` Address line 2.
        
        `name`
        : `string` Account holder name.
        
        `state`
        : `string` State name.
        
        `tag`
        : `string` Address tag. For example, `Home`.
        
        `type`
        : `string` Address type. Value is `billing_address`.
        
        `zipcode`
        : `string` Postal code.

`line_items_total`
: `integer` Total value of line items in paise before adding shipping fees and COD fees, after applying promotions. For example, `60000` for ₹600.

`tax_details`
: `object` Tax information.

    `total_tax`
    : `integer` Total tax amount in paise. For example, `4128`.

    `taxes_included`
    : `boolean` Indicates whether taxes are included in the item prices. Possible values:
      - `true`: Taxes are included in item prices.
      - `false`: Taxes are separate from item prices.

         
        
    
    
### Fetch a Payment

         Use the Fetch Payments API to retrieve comprehensive payment details, including transaction status, payment method, customer information, settlement details, and the associated order information for a specific payment:

          v1/payments/:id 

         ```curl: Curl
         curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
         -X GET https://api.razorpay.com/v1/payments/pay_R1yFlWQar3XXXX

         ```java: Java
         RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

         String paymentId = "pay_R1yFlWQar3XXXX";

         Payment payment = razorpay.payments.fetch(paymentId);

         ```python: Python
         import razorpay
         client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

         client.payment.fetch(paymentId)

         ```go: Go
         import ( razorpay "github.com/razorpay/razorpay-go" )
         client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

         paymentId := "pay_R1yFlWQar3XXXX"

         body, err := client.Payment.Fetch(paymentId, nil, nil)

         ```php: PHP
         $api = new Api($key_id, $secret);

         $api->payment->fetch($paymentId);

         ```ruby: Ruby
         require "razorpay"
         Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

         paymentId = "pay_R1yFlWQar3XXXX"

         Razorpay::Payment.fetch(paymentId)

         ```javascript: Node.js
         var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

         instance.payments.fetch(paymentId)

         ```csharp: .NET
         RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
         Payment payment = client.Payment.Fetch(paymentId);
         ```

         ```json: Response: COD Orders
         {
           "id": "pay_R1yFlWQar3XXXX",
           "entity": "payment",
           "amount": 55700,
           "currency": "INR",
           "status": "pending",
           "order_id": "order_R1yDkxyIuKXXXX",
           "invoice_id": null,
           "international": false,
           "method": "cod",
           "amount_refunded": 0,
           "refund_status": null,
           "captured": false,
           "description": null,
           "card_id": null,
           "bank": null,
           "wallet": null,
           "vpa": null,
           "email": "gaurav.kumar@example.com",
           "contact": "+919100000000",
           "notes": {
             "cart_id": "hWN2QaXc?key=2b3cad31",
             "storefront_id": "gid://shopify/Cart/h?key=14bbf59ce35b8"
           },
           "fee": null,
           "tax": null,
           "error_code": null,
           "error_description": null,
           "error_source": null,
           "error_step": null,
           "error_reason": null,
           "acquirer_data": {},
           "created_at": 1756046099,
           "receiver_type": null
         }
         ```json: Response: Prepaid Orders
         {
           "id": "pay_R1yFlWQar3XXXX",
           "entity": "payment",
           "amount": 90630,
           "currency": "INR",
           "status": "captured",
           "order_id": "order_R1yDkxyIuKXXXX",
           "invoice_id": null,
           "international": false,
           "method": "upi",
           "amount_refunded": 0,
           "refund_status": null,
           "captured": true,
           "description": null,
           "card_id": null,
           "bank": null,
           "wallet": null,
           "vpa": "gaurav.kumar@exampleupi",
           "email": "gaurav.kumar@example.com",
           "contact": "+919000090000",
           "notes": {
             "cart_id": "hWNsVrcwL?key=1a3a457ddc",
             "storefront_id": "gid://shopify/Cart/hWv3e8?key=af707",
             "flits_cart_token": "hWrcwL?key=1a3a5a70f5_17547",
             "optimizer_provider_name": "razorpay"
           },
           "fee": 0,
           "tax": 0,
           "error_code": null,
           "error_description": null,
           "error_source": null,
           "error_step": null,
           "error_reason": null,
           "acquirer_data": {
             "rrn": "727947422583",
             "upi_transaction_id": "1F723677C679EF578A95"
           },
           "created_at": 1754466271,
           "receiver_type": null,
           "upi": {
             "vpa": "gaurav.kumar@exampleupi"
           }
         }
         ```

         Know more about the [Payments API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md).
         
            
                Path Parameter
                
`id` _mandatory_
: `string` Unique identifier of the payment to be retrieved.
                

            
### Response Parameters

`id`
: `string` Unique identifier of the payment. For example, `pay_R1yFlWQar3XXXX`.

`entity`
: `string` Type of entity. Value is `payment`.

`amount`
: `integer` Payment amount in the smallest currency unit (paise). For COD payments, this includes the COD fee (for example, `55700` for ₹557). For prepaid payments, this equals the captured amount (for example, `90630` for ₹906.30).

`currency`
: `string` The 3-letter ISO currency code. For example, `INR`.

`status`
: `string` Current status of the payment. Possible values:
  - `pending`: Payment pending collection (COD orders).
  - `captured`: Payment successfully captured (prepaid orders).
  - `authorized`: Payment authorized but not captured.
  - `failed`: Payment attempt failed.

`order_id`
: `string` Unique identifier of the associated order. For example, `order_R1yDkxyIuKXXXX`.

`invoice_id`
: `string|null` Unique identifier of the associated invoice. Returns `null` if no invoice is linked.

`international`
: `boolean` Indicates whether this is an international payment. Possible values:
  - `true`: International payment.
  - `false`: Domestic payment.

`method`
: `string` Payment method used. Possible values include:
  - `cod`
  - `upi`
  - `card`
  - `netbanking`
  - `wallet`

`amount_refunded`
: `integer` Amount refunded in paise. For example, `0` indicates no refund has been processed.

`refund_status`
: `string|null` Current refund status. Returns `null` if no refund is applicable. Possible values:
  - `partial`: Partial refund processed.
  - `full`: Full refund processed.

`captured`
: `boolean` Indicates whether the payment has been captured. Possible values:
  - `true`: Payment has been captured.
  - `false`: Payment has not been captured.

`description`
: `string|null` Payment description. Returns `null` if no description is provided.

`card_id`
: `string|null` Unique identifier of the card used for payment. Returns `null` for non-card payments.

`bank`
: `string|null` Bank identifier for netbanking payments. Returns `null` for other payment methods.

`wallet`
: `string|null` Wallet provider identifier. Returns `null` for non-wallet payments.

`vpa`
: `string|null` Virtual Payment Address for UPI payments. For example, `gaurav.kumar@exampleupi`. Returns `null` for non-UPI payments.

`email`
: `string` Customer's email address.

`contact`
: `string` Customer's phone number.

`notes`
: `object` Custom notes added to the payment containing integration-specific data.

  `cart_id`
  : `string` Shopping cart identifier.
  
  `storefront_id`
  : `string` Storefront system identifier.
  
  `flits_cart_token`
  : `string` Flits integration token (optional).
  
  `optimizer_provider_name`
  : `string` Payment optimizer provider name (optional).

`fee`
: `integer|null` Processing fee charged in paise. For example, `0` indicates no fee. Returns `null` for COD payments.

`tax`
: `integer|null` Tax amount on processing fee in paise. For example, `0` indicates no tax. Returns `null` for COD payments.

`error_code`
: `string|null` Error code if payment failed. Returns `null` for successful payments.

`error_description`
: `string|null` Human-readable error description. Returns `null` for successful payments.

`error_source`
: `string|null` Source of the error. Returns `null` for successful payments.

`error_step`
: `string|null` Step at which error occurred. Returns `null` for successful payments.

`error_reason`
: `string|null` Reason for the error. Returns `null` for successful payments.

`acquirer_data`
: `object` Data from the payment acquirer.

  `rrn`
  : `string` Retrieval Reference Number from the acquirer (optional).
  
  `upi_transaction_id`
  : `string` UPI transaction identifier from the acquirer (optional).

`created_at`
: `integer` Unix timestamp indicating when the payment was created. For example, `1756046099`.

`receiver_type`
: `string|null` Type of receiver for the payment. Returns `null` if not applicable.

`upi`
: `object` UPI-specific payment details (only present for UPI payments).

  `vpa`
  : `string` Virtual Payment Address used for the UPI payment.
                

         
        
    

    
  

### 1.8 Complete Checkout Call

     After a successful payment, call the complete checkout API to create the order in Shopify. You must make the call from the callback handler implemented when importing the react SDK. Ensure you redirect the user to the `order_status_url` to show them the order success page on Shopify.

     /1cc/shopify/complete?key_id=rzp_live_XXXXXX

     ```curl: Request
     curl -X POST https://api.razorpay.com/v1/1cc/shopify/complete?key_id=rzp_live_XXXXXX \
       -H "Content-Type: application/json" \
       -H "Accept: application/json" \
       -d '{
         "razorpay_payment_id": "pay_Rk3b76fSqXXXXX",
         "razorpay_order_id": "order_Rk3UmCXXW5XXXX"
       }'
     ```json: Response
     {
       "id": 65157213390123,
       "order_id": "#32697",
       "payment_id": "pay_Rk3b76fSqXXXXX",
       "payment_method": "netbanking",
       "payment_currency": "",
       "total_amount": 659430,
       "total_tax": "543.91",
       "shipping_fee": 700,
       "cod_fee": 0,
       "promotions": [
         {
           "reference_id": "Auto Order Amount Discount",
           "code": "Auto Order Amount Discount",
           "type": "automatic",
           "value": 100000,
           "source": "shopify"
         }
       ],
       "shipping_country": "in",
       "customer_details": {
         "email": "gaurav.kumar@example.com",
         "contact": "+919876543210",
         "shipping_address": {
           "name": "Gaurav Kumar",
           "line1": "123 Main Street",
           "city": "Bengaluru",
           "state": "KARNATAKA",
           "zipcode": "560049",
           "country": "in"
         }
       },
       "order_status_url": "https://your-store.myshopify.com/orders/...",
       "is_new_customer": false
     }
     ```

     
        
            Request Parameters
            
`razorpay_payment_id` _mandatory_
: `string` Unique payment identifier. Format: `pay_` followed by 14 characters.

`razorpay_order_id` _mandatory_
: `string` Unique order identifier from Step 1.2. Format: `order_` followed by 14 characters.
            

        
### Response Parameters

`id`
: `integer` Unique Shopify order identifier. For example, `65157213390123`.

`order_id`
: `string` Human-readable order number. For example, `#32697`.

`payment_id`
: `string` Razorpay payment identifier. For example, `pay_Rk3b76fSqXXXXX`.

`payment_method`
: `string` Payment method used. Possible values include:
  - `netbanking`
  - `upi`
  - `card`
  - `wallet`

`payment_currency`
: `string` The 3-letter ISO currency code. For example, `INR`.

`total_amount`
: `integer` Total order amount in smallest currency unit (paise). For example, `659430` for ₹6594.30.

`total_tax`
: `string` Total tax amount as string. For example, `543.91`.

`shipping_fee`
: `integer` Shipping charges in smallest currency unit (paise). For example, `700` for ₹7.

`cod_fee`
: `integer` Cash on Delivery fee in smallest currency unit (paise). For example, `0` indicates no COD fee.

`promotions`
: `array` Array of applied promotions/discounts.

    `reference_id`
    : `string` Internal reference for the promotion.

    `code`
    : `string` Promotion code used.

    `type`
    : `string` Type of promotion. Possible values:
      - `automatic`: Automatically applied discount.
      - `coupon`: Coupon-based discount.

    `value`
    : `integer` Discount value in smallest currency unit (paise). For example, `100000` for ₹1000.

    `source`
    : `string` Source of the promotion. For example, `shopify`.

`shipping_country`
: `string` Country code for shipping destination. For example, `in`.

`customer_details`
: `object` Complete customer information.

    `email`
    : `string` Customer's email address.

    `contact`
    : `string` Customer's phone number.

    `shipping_address`
    : `object` Complete shipping address information.

        `name`
        : `string` Recipient name.

        `line1`
        : `string` Address line 1.

        `city`
        : `string` City name.

        `state`
        : `string` State name.

        `zipcode`
        : `string` Postal code.

        `country`
        : `string` Country code. For example, `in`.

`order_status_url`
: `string` Shopify order status page URL for customer.

`is_new_customer`
: `boolean` Whether this is a new customer's first order. Possible values:
  - `true`: New customer's first order.
  - `false`: Existing customer order.

     
    
  
 

#### Pass Additional Attributes to Shopify Orders

Shopify orders support Tags and Additional Attributes (note attributes). Include the attributes in the Shopify cart's attributes object before initiating checkout:

```javascript
// When creating/updating Shopify cart
const cartPayload = {
  cart: {
    token: "your_cart_token",
    note: "Customer special instructions",
    attributes: {
      "Source": "Mobile App",
      "App Version": "2.1.0",
      "Campaign": "Summer Sale 2025",
      "Custom Field": "Your custom value"
    },
    item_count: 1,
    items: [/* ... */]
  },
  key: "rzp_live_XXXXXX"
};
```

These attributes will flow through to the Shopify order and appear in the additional attributes section in Shopify Admin.

## 2. Test Integration

Check the following checklist below: 

- Shopify cart creation is working correctly.
- Checkout id is generated successfully.
- Order id is created with analytics parameters.
- Magic Checkout SDK opens without errors.
- Coupons apply correctly via prefill.
- Payment flow completes successfully.
- Complete Checkout API creates order in Shopify.
- Order appears in Shopify Admin with correct details.
- Additional attributes appear correctly in Shopify order.

## Error Handling

Error Scenario | Recommended Action 
---
Invalid cart token | Ensure Shopify cart exists before [Step 1.1](#11-create-a-checkout-id).
---
Payment not captured | Verify payment status before complete checkout.
---
Invalid signature | Regenerate signature using Razorpay's signature verification.
---
Coupon invalid | Handle error callback and notify user.

> **WARN**
>
> 
> **Fallback to Shopify Checkout**
> 
> If any Magic Checkout API fails, redirect users to the standard Shopify checkout to ensure customers can still complete their purchase.
> 

## Support

For integration support, reach out to your Razorpay account manager or raise a request with our [support team](https://razorpay.com/support/#request).
