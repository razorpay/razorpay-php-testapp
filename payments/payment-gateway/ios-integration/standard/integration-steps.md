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

         **Order is an important step in the payment process.**

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call. Know how to [authenticate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) Orders API.
- The `order_id` received in the response should be passed to the checkout. This ties the order with the payment and secures the request from being tampered.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
> 

You can create an order using:

    
        Use this endpoint to create an order using the Orders API.

        /orders

        ```curl: Curl
        curl -X POST https://api.razorpay.com/v1/orders 
        -U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
        -H 'content-type:application/json'
        -d '{
            "amount": 50000,
            "currency": "",
            "receipt": "qwsaq1",
            "partial_payment": true,
            "first_payment_min_amount": 230
        }'
        ```java: Java
        RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 50000); // amount in the smallest currency unit
        orderRequest.put("currency", "");
        orderRequest.put("receipt", "order_rcptid_11");

        Order order = razorpay.Orders.create(orderRequest);
        } catch (RazorpayException e) {
        // Handle Exception
        System.out.println(e.getMessage());
        }
        ```Python: Python
        import razorpay
        client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

        DATA = {
            "amount": 50000,
            "currency": "",
            "receipt": "receipt#1",
            "notes": {
                "key1": "value3",
                "key2": "value2"
            }
        }
        client.order.create(data=DATA)
        ```php: PHP
        $api = new Api($key_id, $secret);

        $api->order->create(array('receipt' => '123', 'amount' => 50000, 'currency' => '', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
        ```csharp: .NET
        RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

        Dictionary options = new Dictionary();
        options.Add("amount", 50000); // amount in the smallest currency unit
        options.add("receipt", "order_rcptid_11");
        options.add("currency", "");
        Order order = client.Order.Create(options);
        ```ruby: Ruby
        require "razorpay"
        Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

        options = amount: 50000, currency: '', receipt: ''
        order = Razorpay::Order.create
        ```javascript: Node.js
        var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

        instance.orders.create({
        amount: 50000,
        currency: "",
        receipt: "receipt#1",
        notes: {
            key1: "value3",
            key2: "value2"
        }
        })
        ```go: Go
        import ( razorpay "github.com/razorpay/razorpay-go" )
        client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

        data := map[string]interface{}{
        "amount": 50000,
        "currency": "",
        "receipt": "some_receipt_id"
        }
        body, err := client.Order.Create(data)
        ```

        ```json: Success Response
        {
            "id": "order_IluGWxBm9U8zJ8",
            "entity": "order",
            "amount": 50000,
            "amount_paid": 0,
            "amount_due": 50000,
            "currency": "",
            "receipt": "rcptid_11",
            "offer_id": null,
            "status": "created",
            "attempts": 0,
            "notes": [],
            "created_at": 1642662092
        }
        ```json: Failure Response
        {
        "error": {
            "code": "BAD_REQUEST_ERROR",
            "description": "Order amount less than minimum amount allowed",
            "source": "business",
            "step": "payment_initiation",
            "reason": "input_validation_failed",
            "metadata": {},
            "field": "amount"
        }
        }
        ```
    
    
        You can use the Postman workspace below to create an order:

        [](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-6f15a901-06ea-4224-b396-15cd94c6148d)

        
> **INFO**
>
> 
> 
>         **Handy Tips**
> 
>         Under the **Authorization** section in Postman, select **Basic Auth** and add the Key Id and secret as the Username and Password, respectively.
>         

        You can create an order manually by integrating the API sample codes on your server.
    

    
        Request Parameters
        

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit. For example, for an actual amount of , the value of this field should be `22225`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
     - `true`: The customer can make partial payments.
     - `false` (default): The customer cannot make partial payments.

`first_payment_min_amount` _optional_
: `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of ₹7,000 is to be received from the customer in two installments of #1 - ₹5,000, #2 - ₹2,000, then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

        

    
### Response Parameters

         Descriptions for the response parameters are present in the [Orders Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/entity.md) parameters table.
        

    
### Error Response Parameters

         The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
        

        
    

    
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
                             "contact": "+919876543210",
                             "email": "gaurav.kumar@example.com"
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
                                         @"email": @"gaurav.kumar@example.com",
                                         @"contact": @"+919876543210"
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

                 `key` _mandatory_
: `string` API Key ID generated from the Dashboard.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. For example, if the amount to be charged is , enter `222250` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

   
> **WARN**
>
> 
>    **Watch Out!**
> 
>    As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>    

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

   
> **INFO**
>
> 
> 
>    **Handy Tips**
> 
>    Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>    

`name` _mandatory_
: `string` Your Business/Enterprise name shown on the Checkout form. For example, **Acme Corp**.

`description` _optional_
: `string` Description of the purchase item shown on the Checkout form. It should start with an alphanumeric character.

`image` _optional_
: `string` Link to an image (usually your business logo) shown on the Checkout form. Can also be a **base64** string if you are not loading the image from a network.

`order_id` _mandatory_
: `string` Order ID generated via [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

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

       - `emi`

       

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

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

`subscription_id` _optional_
: `string` If you are accepting recurring payments using Razorpay Checkout, you should pass the relevant `subscription_id` to the Checkout. Know more about [Subscriptions on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md#checkout-integration).

`subscription_card_change` _optional_
: `boolean` Permit or restrict customer from changing the card linked to the subscription. You can also do this from the [hosted page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/payment-retries.md#update-the-payment-method-via-our-hosted-page). Possible values:
   - `true`: Allow the customer to change the card from Checkout.
   - `false` (default): Do not allow the customer to change the card from Checkout.

`recurring` _optional_
: `boolean` Determines if you are accepting [recurring (charge-at-will) payments on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments.md) via instruments such as emandate, paper NACH and so on. Possible values:
   - `true`: You are accepting recurring payments.
   - `false` (default): You are not accepting recurring payments.

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
   : `boolean` Used to set the `contact` field as readonly. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.

   `email` _optional_
   : `boolean` Used to set the `email` field as readonly. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.
      
   `name` _optional_
   : `boolean` Used to set the `name` field as readonly. Possible values:
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
: `object` Parameters that enable checkout configuration. Know more about how to [configure payment methods on Razorpay standard checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md).
  
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

                 
> **WARN**
>
> 
> 
>                  **Watch Out!**
> 
>                  To support theme colour in the progress bar, please pass HEX colour values only.
>                  

                

            
            
### 1.4.1 Enable UPI Intent on iOS *(Optional)*

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

### UPI Intent on Recurring Payments

Configure and initiate a recurring payment transaction on UPI Intent:

```swift: ViewController.swift
let options: [String:Any] = [
  "key": "YOUR_KEY_ID",  
  "order_id": "order_DBJOWzybfXXXX", 
  "customer_id": "cust_BtQNqzmBlXXXX",  
  "prefill": [
    "contact": "+919000090000",
    "email": "gaurav.kumar@example.com"
  ],
  "image": "https://spaceplace.nasa.gov/templates/featured/sun/sunburn300.png",
  "amount": 10000,  // Amount should match the order amount 
  "currency": "INR",
  "recurring": 1  // This key value pair is mandatory for Intent Recurring Payment.
]
```objectivec: ViewController.m
NSDictionary *options = @{
    @"key": @"YOUR_KEY_ID",
    @"order_id": @"order_DBJOWzybfXXXX",
    @"customer_id": @"cust_BtQNqzmBlXXXX",
    @"prefill": @{
        @"contact": @"+919000090000",
        @"email": @"gaurav.kumar@example.com"
    },
    @"image": @"https://spaceplace.nasa.gov/templates/featured/sun/sunburn300.png",
    @"amount": @(10000), // Amount should match the order amount 
    @"currency": @"INR",
    @"recurring": @(1)  // This key value pair is mandatory for Intent Recurring Payment.
};
```

                

            
         
        
    

    
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

         A successful payment returns the following fields to the Checkout form.

  
    Success Callback
    
- You need to store these fields in your server.
- You can confirm the authenticity of these details by verifying the signature in the next step.

```json: Success Callback
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout **only** for successful payments.

`razorpay_order_id`
: `string` Unique identifier for the order returned by Checkout.

`razorpay_signature`
: `string` Signature returned by the Checkout. This is used to verify the payment.
    

        
    
    
### 1.7 Verify Payment Signature

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
    

        
    
    
### 1.8 Verify Payment Status

         
> **INFO**
>
> 
> **Handy Tips**
> 
> On the Razorpay Dashboard, ensure that the payment status is `captured`. Refer to the payment capture settings page to know how to [capture payments automatically](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
> 

    
        You can track the payment status in three ways:
        

    
        To verify the payment status from the Razorpay Dashboard:

        1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
        2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**.
        
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

        
    

## 2. Test Integration

After the integration is complete, a **Pay** button appears on your webpage/app. 

Click the button and make a test transaction to ensure the integration is working as expected. You can start accepting actual payments from your customers once the test transaction is successful.

> **WARN**
>
> 
> **Watch Out!**
> 
> This is a mock payment page that uses your test API keys, test card and payment details. 
> - Ensure you have entered only your [Test Mode API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) in the Checkout code. 
> - Test mode features a mock bank page with **Success** and **Failure** buttons to replicate the live payment experience.
> - No real money is deducted due to the usage of test API keys. This is a simulated transaction.
> 

Following are all the payment modes that the customer can use to complete the payment on the Checkout. Some of them are available by default, while others may require approval from us. Raise a request from the Dashboard to enable such payment methods.

Payment Method | Code | Availability
---
[Debit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `debit` | ✓
---
[Credit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `credit` | ✓
---
[Netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md) | `netbanking`| ✓
---
[UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md) | `upi` | ✓
---
EMI - [Credit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/credit-card-emi.md), [Debit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md) and [No Cost EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/no-cost-emi.md) | `emi` | ✓
---
[Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md) | `wallet` | ✓
---
[Cardless EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md) | `cardless_emi` | Requires [Approval](https://razorpay.com/support).
---
[Bank Transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md) | `bank_transfer` | Requires [Approval](https://razorpay.com/support) and Integration.
---
[Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/integrate.md) | `emandate` | Requires [Approval](https://razorpay.com/support) and Integration.
---
[Pay Later](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md)| `paylater` | Requires [Approval](https://razorpay.com/support).

You can make test payments using one of the payment methods configured at the Checkout.

    
### Netbanking

         You can select any of the listed banks. After choosing a bank, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the bank login portals.

         Check the list of [supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md#supported-banks).
        

    
### UPI

         You can enter one of the following UPI IDs:

         - `success@razorpay`: To make the payment successful. 
         - `failure@razorpay`: To fail the payment.

         Check the list of [supported UPI flows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md).

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          You can use **Test Mode** to test UPI payments, and **Live Mode** for UPI Intent and QR payments.
>          

        

    
### Cards

         You can use the following test cards to test transactions for your integration in Test Mode.

         ### Domestic Cards

         Use the following test cards for Indian payments:

         
         Network | Card Number | CVV & Expiry Date
         ---
         Visa  | 4100 2800 0000 1007 | Use a random CVV and any future date ^^^^^
         ---
         Mastercard | 5500 6700 0000 1002 | 
         ---
         RuPay | 6527 6589 0000 1005 | 
         ---
         Diners | 3608 280009 1007 | 
         ---
         Amex | 3402 560004 01007 | 
         

         #### Error Scenarios

         Use these test cards to simulate payment errors. See the [complete list](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#error-scenario-test-cards) of error test cards with detailed scenarios.
         Check the following lists: 
         - [Supported Card Networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
         - [Cards Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/cards.md).

         ### International Cards

         Use the following test cards to test international payments. Use any valid expiration date in the future in the MM/YY format and any random CVV to create a successful payment.

         
         Card Network | Card Number | CVV & Expiry Date
         ---
         Mastercard | 5555 5555 5555 4444
5105 1051 0510 5100
5104 0600 0000 0008 | Use a random CVV and any future date ^^
         ---
         Visa | 4012 8888 8888 1881 |
         

         Check the list of [supported card networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
        

    
### Wallet

         You can select any of the listed wallets. After choosing a wallet, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the wallet login portals.

         Check the list of [supported wallets](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md#supported-wallets).
        

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

         After payment is `authorized`, you need to capture it to settle the amount to your bank account as per the settlement schedule. Payments that are not captured are auto-refunded after a fixed time.

> **WARN**
>
> 
> 
> **Watch Out**
> 
> - You should deliver the products or services to your customers only after the payment is captured. Razorpay automatically refunds all the uncaptured payments.
> - You can track the payment status using our [Fetch a Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-a-payment) or webhooks.
> 

  
    Authorized payments can be automatically captured. You can auto-capture all payments [using global settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#auto-capture-all-payments) on the Razorpay Dashboard. Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Payment capture settings work only if you have integrated with Orders API on your server side. Know more about the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
>     

  
  
    Each authorized payment can also be captured individually. You can manually capture payments using [Payment Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments). Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
  

        

    
### 3.3 Set Up Webhooks

         Ensure you have [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) in the live mode and configured the events for which you want to receive notifications.

         
> **WARN**
>
> 
>          **Implementation Considerations**
> 
>          Webhooks are the primary and most efficient method for event notifications. They are delivered asynchronously in near real-time. For critical user-facing flows that need instant confirmation (like showing "Payment Successful" immediately), supplement webhooks with API verification.
> 
>          **Recommended approach** 

>          - Rely on webhooks for all automation, which can be asynchronous.
>          - If a critical user-facing flow requires instant status, but the webhook notification has not arrived within the time mandated by your business needs, perform an immediate API Fetch call ([Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md), [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-with-id.md) and [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds/fetch-specific-refund-payment.md)) to verify the status.
>
