---
title: 1. Build Integration
description: Steps to integrate your Razorpay iOS Custom SDK with Razorpay Payment Gateway.
---

# 1. Build Integration

Follow the steps to integrate the Razorpay iOS Custom SDK:

**1.1** [Import Razorpay.framework library to Your Project](#11-import-razorpayframework-library-to-your-project).
- [Cocoapod](#cocoapod)

- [Manual](#manual)

- [Objective-C](#objective-c)

**1.2** [Initialise Razorpay iOS Custom SDK](#12-initialise-razorpay-ios-custom-sdk).

**1.3** [Create an Order in Server](#13-create-an-order-in-server).

**1.4** [Get Payment Methods](#14-get-payment-methods).

**1.5** [Initiate Payment](#15-initiate-payment).

**1.6** [Pass WKNavigationDelegate actions to SDK](#16-pass-wknavigationdelegate-actions-to-sdk).

**1.7** [Handle Success and Errors Events](#17-handle-success-and-error-events).

**1.8** [Store Fields in Your Server](#18-store-the-fields-in-server).

**1.9** [Verify Payment Signature](#19-verify-payment-signature).

**1.10** [Verify Payment Status](#110-verify-payment-status).

## 1.1 Import Razorpay.framework library to Your Project

You can import the Razorpay iOS Custom SDK library using any of these ways: Cocoapod, Manual and Objective-C.

#### Cocoapod

Refer to our [Cocoapod](https://cocoapods.org/pods/razorpay-customui-pod) pod.

#### Manual

1. Download the file and unzip the SDK attachment.
2. Open your project in XCode and go to **file** under **Menu** and select **Add files to "yourproject"**.
3. Select **Razorpay.xcframework** in the directory you just unzipped.
4. Click on the **Copy items if needed** checkbox.
5. Click **Add**.

Ensure that you have the framework added in both **Embedded Binaries** and **Linked Frameworks and Libraries** under **Target settings - General**.

#### Objective-C

If you are building an **Objective-C** project, follow the steps given for Swift and the additional steps given below:
1. Go to **Project Settings** and select **Build Settings - All and Combined**.
2. Set the **Always Embed Swift Standard Libraries** option to **TRUE**.

Ensure that you have the framework added in both **Embedded Binaries** and **Linked Frameworks and Libraries** under **Target settings - General**.

#### Xcode 11

Ensure that you have the framework added in **Frameworks, Libraries, and Embed Content** under **Target settings - General**. Change `Embed status` from - `Do not Embed` to `Embed & Sign`. 

Watch the GIF to see how to add Frameworks, Libraries and Embed Content.

![](/docs/assets/images/ios-embed-framework.gif)

## 1.2 Initialise Razorpay iOS Custom SDK

To initialise the Razorpay SDK:

- API key. You can generate this from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings.md#api-keys).
    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     API keys should not be hardcoded in the app. They must be sent from your backend as app-related metadata fetch.
>     

- A delegate that implements `RazorpayPaymentCompletionProtocol` and `WKNavigationDelegate`
- A `WKWebView` to show the bank pages

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> - For Swift version 5.1+, ensure to declare `var razorpay: RazorpayCheckout!`. 
> - For versions lower than 5.1, use `var razorpay: Razorpay!`.
> - Alternatively, you can use the following alias and retain the variable as Razorpay. 

> 
>     `typealias Razorpay = RazorpayCheckout`
> 

```swift: ViewController.swift

import Razorpay

class ViewController: UIViewController, RazorpayPaymentCompletionProtocol, WKNavigationDelegate {
// typealias Razorpay = RazorpayCheckout
    var webView: WKWebView!
    var razorpay: RazorpayCheckout!
    .
    .
    override func viewDidLoad() {
        super.viewDidLoad()
        self.webView = WKWebView(frame: self.view.frame)
        self.razorpay = RazorpayCheckout.initWithKey("Key", andDelegate: self, withPaymentWebView: self.webView)
        self.view.addSubview(self.webView)
    }
}

```objectivec: ViewController.m
#import "Razorpay/Razorpay.h"
// typealias Razorpay = RazorpayCheckout
@interface ViewController() {
    RazorpayCheckout *razorpay;
    WKWebView *webView;
}
.
.
- (void)viewDidLoad {
    [super viewDidLoad];
    webView = [[WKWebView alloc] initWithFrame:self.view.frame];
    razorpay = [RazorpayCheckout initWithKey:@"KEY" andDelegate:self withPaymentWebView:webView];
    [self.view addSubview:webView];
}
```

> **INFO**
>
> 
> **Initialise the Razorpay SDK only with API Key**
> 
> To render your UI based on the available payment methods, initialise the Razorpay SDK only with the API key and call [getPaymentMethods](#14-get-payment-methods).
> ```swift: ViewController.swift
> self.razorpay = RazorpayCheckout.initWithKey("KEY")
> ```objectivec: ViewController.m
> razorpay = [RazorpayCheckout initWithKey:@"KEY"];
> ```
> 
> To use the SDK initialisation mentioned above, call the following method using the previously created Razorpay instance on any other page where you wish to initiate the payment through the authorise method.
> 
> ```swift: ViewController.swift
> do {
>     try self.razorpay?.setWebView(self.wkWebView)
>     try self.razorpay?.setDelegate(self)
> } catch {
>     print(error.localizedDescription)
> } 
> ```objectivec: ViewController.m
> @try {
>      [razorpay setWebView:webView error: NULL];
>      [razorpay setDelegate:self error: NULL];
> } @catch (NSException *exception) {
>      NSLog(@"exception triggered");
> }
> ```
> 

## 1.3 Create an Order in Server

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

You can create an order:
- Using the sample code on the Razorpay Postman Public Workspace.
- By manually integrating the API sample codes on your server.

#### Razorpay Postman Public Workspace

You can use the Postman workspace below to create an order:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-6f15a901-06ea-4224-b396-15cd94c6148d)

> **INFO**
>
> 
> **Handy Tips**
> 
> Under the **Authorization** section in Postman, select **Basic Auth** and add the Key Id and secret as the Username and Password, respectively.
> 

#### API Sample Code

Use this endpoint to create an order using the Orders API.

/orders

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders
-U [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type:application/json'
-d '{
 "amount": 500,
 "currency": "INR",
 "receipt": "qwsaq1",
 "partial_payment": true,
 "first_payment_min_amount": 230,
 "notes": {
   "key1": "value3",
   "key2": "value2"
 }
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount",50000);
orderRequest.put("currency","INR");
orderRequest.put("receipt", "receipt#1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_1","Tea, Earl Grey, Hot");
orderRequest.put("notes",notes);

Order order = instance.orders.create(orderRequest);
```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
 "amount": 50000,
 "currency": "INR",
 "receipt": "receipt#1",
 "partial_payment": False,
 "notes": {
   "key1": "value3",
   "key2": "value2"
 }
})
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 50000);
orderRequest.Add("currency", "INR");
orderRequest.Add("receipt", "receipt#1");
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey, Hot");
orderRequest.Add("notes", notes);

Order order = client.Order.Create(orderRequest);
```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
 "amount": 50000,
 "currency": "INR",
 "receipt": "receipt#1",
 "notes": {
   "key1": "value3",
   "key2": "value2"
 }
}

Razorpay::Order.create(para_attr)
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
 "amount": 50000,
 "currency": "INR",
 "receipt": "receipt#1",
 "partial_payment": false,
 "notes": {
   "key1": "value3",
   "key2": "value2"
 }
})
```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
 "amount": 50000,
 "currency": "INR",
 "receipt": "some_receipt_id",
 "partial_payment": false,
 "notes": map[string]interface{}{
     "key1": "value1",
     "key2": "value2",
   },
}
body, err := client.Order.Create(data, nil)
```

```json: Success Response
{
 "id": "order_IluGWxBm9U8zJ8",
 "entity": "order",
 "amount": 5000,
 "amount_paid": 0,
 "amount_due": 5000,
 "currency": "INR",
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

 
### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

 
> **WARN**
>
> 
>  **Watch Out!**
> 
>  As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>  

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be 3 characters.

 
> **INFO**
>
> 
> 
>  **Handy Tips**
> 
>  Razorpay has added support for zero decimal currencies, such as JPY and three decimal currencies, such as KWD, BHD and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>  

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
 - `true`: The customer can make partial payments.
 - `false` (default): The customer cannot make partial payments.

`first_payment_min_amount` _optional_
: `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of 7000 is to be received from the customer in two installments of #1 - 5000, #2 - 2000 then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).
   

 
### Response Parameters

    Descriptions for the response parameters are present in the [Orders Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/entity.md) parameters table.
   

 
### Error Response Parameters

    The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
   

## 1.4 Get Payment Methods

You can accept payments through UPI, credit/debit cards, netbanking and wallets, depending on the methods enabled for your account. When you use [Razorpay iOS Standard SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/standard.md), you do not have to handle the availability of different payment methods. However, when creating a custom checkout form, ensure the display of only the methods activated for your account to the customer.

To get a list of available payment methods, call `getPaymentMethods`. This fetches the list of payment methods asynchronously and returns the results.

```swift: ViewController.swift
self.razorpay.getPaymentMethods(withOptions: nil, withSuccessCallback: {methods in
     paymentMethods = methods
    }){ error in
        errorDescription = error
    }
```objectivec: ViewController.m

[razorpay getPaymentMethodsWithOptions: nil withSuccessCallback: ^(NSDictionary *methods){
    for(NSString *key in [methods allKeys]) {
        NSLog(@"%@",[methods objectForKey:key]);
    }
} andFailureCallback: ^(NSString *error){
    NSLog(@"%@",error);
}];
```

#### For Subscriptions

If you use your iOS app to receive subscription payments, you must pass the `subscription_id` in `options` to fetch the relevant payment methods. This is because Subscription payments are supported only by select banks and cards.

```swift: ViewController.swift
let options :[String:String] = ["subscription_id": "sub_testid"] \\ For subscriptions
var paymentMethods :[AnyHashable:Any] = [:]
var errorDescription: String = ""
self.razorpay.getPaymentMethods(withOptions: options, withSuccessCallback: {methods in
     paymentMethods = methods
    }){ error in
        errorDescription = error
    }

```objectivec: ViewController.m
NSDictionary *options = @{@"subscription_id": @"sub_testid"};

[razorpay getPaymentMethodsWithOptions: options withSuccessCallback: ^(NSDictionary *methods){
    for(NSString *key in [methods allKeys]) {
        NSLog(@"%@",[methods objectForKey:key]);
    }
} andFailureCallback: ^(NSString *error){
    NSLog(@"%@",error);
}];
```
### Get Subscription Amount

You can get the subscription amount against the subscription ID using the following function:

```swift: ViewController.swift
var errorDescription: String = ""
var amount: UInt64 = 0
self.razorpay.getSubscriptionAmount(havingSubscriptionId: "sub_testid", withSuccessCallback: {subAmount in
        amount = subAmount
    }){ error in
        errorDescription = error
    }
```objectivec: ViewController.m
[razorpay getSubscriptionAmountWithHavingSubscriptionId:@"sub_testid" withSuccessCallback:^(UInt64 amount){
    NSLog(@"%lld",amount);
}andFailureCallback: ^(NSString *error){
    NSLog(@"%@",error);
}];
```

## 1.5 Initiate Payment

Once you receive the required input from the customer, pass them to our SDK, which takes them to the appropriate authentication channel.

Add the following code where you want to initiate payment:

```swift: ViewController.swift
let options: [String:Any] = [
            "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1. We support more than 92 currencies.
            "currency": "INR",//We support more that 92 international currencies.
            "email": "gaurav.kumar@example.com",
            "contact": "9090980808",
            "order_id": "order_DBJOWzybf0sJbb",//From response of Step 3
            "method": "card",
            "card[name]": "Gaurav Kumar",
            "card[number]": "4386289407660153",
            "card[expiry_month]": 06,
            "card[expiry_year]": 30,
            "card[cvv]": "123"
        ]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
                 @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1. We support more than 92 currencies.
                 @"currency": @"INR",////We support more that 92 international currencies.
                 @"email": @"gaurav.kumar@example.com",
                 @"contact": @"9797979797",
                 @"order_id": @"order_4xbQrmEoA5WJ0G",
                 @"method": @"wallet",
                 @"wallet": @"mobikwik"
             };
```

#### UPI Intent

For UPI Intent requests, use the following dictionary and pass it to the `authorize` function as shown below:
```swift: ViewController.swift
let options: [AnyHashable:Any] = [
    "amount": "100", // amount in paise
    "currency": "INR",
    "email": "a@b.com",
    "contact": "1234567890",
    "method": "upi",
    "flow": "intent"
]
self.razorpay?.authorize(options)
```
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in paise
    @"currency": @"INR",
    @"email": @"a@b.com",
    @"contact": @"1234567890",
    @"method": @"upi",
    @"flow": @"intent"
};
[razorpay authorize:options];
```

Here, `razorpay` is an instance of Razorpay.

- When you initiate a UPI Intent payment, the SDK will present a list of UPI apps installed on the device.
- The customer selects their preferred UPI app.
- The customer is redirected to the selected app to complete the authentication.
- After successful authentication, the customer is redirected back to your app.

#### UPI Collect Requests

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#intent-flow). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md).
> 

For UPI collect requests, use the following dictionary and pass it to the `authorize` function as shown below:

```
            let options: [AnyHashable:Any] = [
                "amount": "100", // amount in paise
                "currency": "INR",
                "email": "a@b.com",
                "contact": "1234567890",
                "method":"upi",
                "vpa":"test@axisbank"
            ]
            self.razorpay?.authorize(options)
```
Here, `razorpay` is an instance of Razorpay.

**NPCI Restrictions for UPI Collect Flow**

As per NPCI guidelines, the following MCC codes are restricted and cannot accept UPI Collect payments:

  
### Restricted MCC Codes

     
     MCC Code | Category
     ---
     5816 | Digital Goods: Games
     ---
     6540 | POI Funding Transactions (excluding MoneySend)
     ---
     4812 | Telecommunication Equipment and Telephone Sales
     ---
     4814 | Telecommunication Services
     ---
     7408 | Lending Platform
     ---
     6513 | Real Estate Agents and Managers - Rentals
     ---
     7995 | Betting/Lottery
     ---
     5412 | Grocery Stores, Supermarkets
     ---
     5413 | Grocery Stores, Supermarkets
     
    

Below is a complete list of Checkout form parameters:

`key` _mandatory_
: `string` API Key ID generated from **Dashboard** → **Account & Settings** → [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is , enter `10000`. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as 295.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>     

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. For example, `INR`. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

    
> **INFO**
>
> 
> 
>     **Handy Tips**
> 
>     Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>     

`description` _optional_
: `string` Description of the product shown in the Checkout form. It must start with an alphanumeric character.

`image` _optional_
: `string` Link to an image (usually your business logo) shown in the Checkout form. Can also be a **base64** string, if loading the image from a network is not desirable.

`order_id` _mandatory_
: `string` Order ID generated via the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`method` _mandatory_
: `string` The payment method used by the customer on Checkout. 
Possible values:
    - `card` (default)
    - `upi` (default)
    - `netbanking` (default)
    - `wallet` (default)
    - `emi` (default)
    - `cardless_emi` (requires [approval](https://razorpay.com/support/#request))
    - `paylater` (requires [approval](https://razorpay.com/support/#request))
    - `emandate` (requires [approval](https://razorpay.com/support/#request))

`card` _mandatory if method=card/emi_
: `object` The details of the card that should be entered while making the payment.

            `number` 
            : `integer` Unformatted card number.

            `name`
            : `string` The name of the cardholder.

            `expiry_month`
            : `integer` Expiry month for card in MM format.

            `expiry_year`
            : `integer` Expiry year for card in YY format.

            `cvv`
            : `integer` CVV printed on the back of the card.
            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             - CVV is not required by default for tokenised cards across all networks.
>             - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>             - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>             - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>             - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.   
>             

            `emi_duration`
            : `integer` Defines the number of months in the EMI plan.

`bank_account` _mandatory if method=emandate_
: The details of the bank account that should be passed in the request. These details include bank account number, IFSC code and the name of the customer associated with the bank account.

    `account_number`
    : `string` Bank account number used to initiate the payment.

    `ifsc`
    : `string` IFSC of the bank used to initiate the payment.

    `name`
    : `string` Name associated with the bank account used to initiate the payment.

`bank` _mandatory if method=netbanking_
: `string` Bank code. List of available banks enabled for your account can be fetched via [**methods**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/payment-methods.md#fetch-supported-methods).

`wallet` _mandatory if method=wallet_
: `string` Wallet code for the wallet used for the payment. Possible values:
    - `payzapp` (default)
    - `olamoney` (requires [approval](https://razorpay.com/support/#request))
    - `phonepe` (requires [approval](https://razorpay.com/support/#request))
    - `airtelmoney` (requires [approval](https://razorpay.com/support/#request))
    - `mobikwik` (requires [approval](https://razorpay.com/support/#request))
    - `jiomoney` (requires [approval](https://razorpay.com/support/#request))
    - `amazonpay` (requires [approval](https://razorpay.com/support/#request))
    - `paypal` (requires [approval](https://razorpay.com/support/#request))
    - `phonepeswitch` (requires [approval](https://razorpay.com/support/#request))

`provider` _mandatory if method=cardless_emi/paylater_
: `string`  Name of the cardless EMI provider partnered with Razorpay.

  Available options for Cardless EMI (requires [approval](https://razorpay.com/support/#request)):
    - `hdfc`
    - `icic`
    - `idfb`
    - `kkbk`
    - `zestmoney`
    - `earlysalary`
    - `walnut369`

  Available options for Pay Later:
    - `lazypay`
    - `paypal`

`vpa` _mandatory if method=upi_
: `string`  UPI ID used for making the payment on the UPI app. 

    
> **WARN**
>
> 
>     **Deprecation Notice**
> 
>     UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [ migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/custom-integration.md) to switch to UPI Intent.
>     

`callback_url` _optional_
: `string` The URL to which the customer must be redirected upon completion of payment. The URL must accept incoming `POST` requests. The callback URL will have `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` as the request parameters for a successful payment.

`redirect` _conditionally mandatory_
: `boolean` Determines whether customer should be redirected to the URL mentioned in the
`callback_url` parameter. This is mandatory if `callback_url` parameter is used. Possible values:
    - `true`: Customer will be redirected to the `callback_url`.
    - `false`: Customer will not be redirected to the `callback_url`

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - The `notes` field is a read-only field associated with payment and is returned while fetching payment details. Razorpay cannot modify this field. You can add up to 15 `notes` that will then be associated with the payment. For example: `"notes[internal_key_1]", "notes[internal_key_2]")`. Razorpay returns this when you fetch payment details from the API.
> - The `emi` option is available only for certain banks. To check the right banks, valid duration and EMI rates/plans to display to the user, please visit the [EMI Demo](https://razorpay.com/emidemo/)page and click EMI in the payment form. You can safely cache this data at your end since this does not change without prior notification. Calculate the monthly EMI or
> cache using the following formula:
> 

![EMI Formula](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/ios_customui_emi.jpg.md)

## 1.6 Pass WKNavigationDelegate actions to SDK

SDK handles the responses from WKWebView to give you the correct status of the payment.

```swift: ViewController.swift
override func viewDidLoad() {
    super.viewDidLoad()
    .
    .
    self.webView.navigationDelegate = self
}

public func webView(_ webView: WKWebView, didCommit navigation: WKNavigation!){
    if razorpay != nil{
        self.razorpay.webView(webView, didCommit: navigation)
    }
}

public func webView(_ webView: WKWebView, didFailProvisionalNavigation navigation: WKNavigation!, withError er: Error) {
    if razorpay != nil{
        self.razorpay.webView(webView, didFailProvisionalNavigation: navigation, withError: er)
    }
}

public func webView(_ webView: WKWebView, didFail navigation: WKNavigation!, withError er: Error){
    if razorpay != nil{
        self.razorpay.webView(webView, didFail: navigation, withError: er)
    }
}

public func webView(_ webView: WKWebView, didFinish navigation: WKNavigation!){
    if razorpay != nil{
        self.razorpay.webView(webView, didFinish: navigation)
    }
}

```objectivec: ViewController.m

override func viewDidLoad(){
    super.viewDidLoad();
    .
    .
    webView.navigationDelegate = self;
}

- (void)webView:(WKWebView *)webView didCommitNavigation:(WKNavigation *)navigation{
    if (razorpay){
        [razorpay webView:webView didCommit:navigation];
    }
}

- (void)webView:(WKWebView *)webView didFailProvisionalNavigation:(WKNavigation *)navigation withError:(NSError *)error{
    if (razorpay){
        [razorpay webView:webView didFailProvisionalNavigation:navigation withError:error];
    }
}

- (void)webView:(WKWebView *)webView didFailNavigation:(WKNavigation *)navigation withError:(NSError *)error{
    if (razorpay){
        [razorpay webView:webView didFail:navigation withError:error];
    }
}

- (void)webView:(WKWebView *)webView didFinishNavigation:(WKNavigation *)navigation{
    if (razorpay){
        [razorpay webView:webView didFinish:navigation];
    }
}
```

## 1.7 Handle Success and Error Events

This is done by implementing the `onPaymentSuccess` and `onPaymentError` methods of the `RazorpayPaymentCompletionProtocol`.

We recommend giving the user an option to cancel the payment midway and pass on this action. You may also implement a retry action or display a relevant message at this step based on your use case.

```swift: ViewController.swift
func onPaymentError(_ code: Int32, description str: String, andData response: [AnyHashable : Any]){
    let alertController = UIAlertController(title: "FAILURE", message: str, preferredStyle: UIAlertControllerStyle.alert)
    let cancelAction = UIAlertAction(title: "OK", style: UIAlertActionStyle.cancel, handler: nil)
    alertController.addAction(cancelAction)
    //self.view = view that controller manages
    self.view.sendSubview(toBack: self.webView)
    navBar.isHidden = true
    navBar.isUserInteractionEnabled = false
    self.view.window?.rootViewController?.present(alertController, animated: true, completion: nil)
    self.razorpay = nil
}

func onPaymentSuccess(_ payment_id: String, andData response: [AnyHashable : Any]){
    let alertController = UIAlertController(title: "SUCCESS", message: "Payment Id \(payment_id)", preferredStyle: UIAlertControllerStyle.alert)
    let cancelAction = UIAlertAction(title: "OK", style: UIAlertActionStyle.cancel, handler: nil)
    alertController.addAction(cancelAction)
    //self.view = view that controller manages
    self.view.sendSubview(toBack: self.webView)
    navBar.isHidden = true
    navBar.isUserInteractionEnabled = false
    self.view.window?.rootViewController?.present(alertController, animated: true, completion: nil)
    self.razorpay = nil
}

//MARK: Action functions
@IBAction func cancel(_ sender: Any){

    let alertController = UIAlertController(title: "Cancel Transaction", message: "Are you sure you want to cancel the current transaction ? The page will go back to the checkout page, where you can choose another payment option", preferredStyle: UIAlertControllerStyle.alert)

    let cancelAction = UIAlertAction(title: "Do Not Cancel", style: UIAlertActionStyle.cancel, handler: nil)
    let okayAction = UIAlertAction(title: "Cancel", style: UIAlertActionStyle.destructive, handler: { action in
        self.razorpay.userCancelledPayment()
        } )

    alertController.addAction(cancelAction)
    alertController.addAction(okayAction)

    self.view.window?.rootViewController?.present(alertController, animated: true, completion: nil)
}
```objectivec: ViewController.m

- (void)onPaymentError:(int)code description:(nonnull NSString *)str andData:(NSDictionary *)response {

    [self.view sendSubviewToBack:webView];
    navbar.hidden = true;
    navbar.userInteractionEnabled = false;
    razorpay = nil;

    [[[UIAlertView alloc] initWithTitle:@"Error"
                                message:str
                               delegate:self
                      cancelButtonTitle:@"OK"
                      otherButtonTitles:nil] show];
}

- (void)onPaymentSuccess:(nonnull NSString *)payment_id andData:(NSDictionary *)response {

    [self.view sendSubviewToBack:webView];
    navbar.hidden = true;
    navbar.userInteractionEnabled = false;
    razorpay = nil;

    [[[UIAlertView alloc] initWithTitle:@"Payment Successful"
                                message:payment_id
                               delegate:self
                      cancelButtonTitle:@"OK"
                      otherButtonTitles:nil] show];

}

-(void) cancel:(id)sender{

    [[[UIAlertView alloc] initWithTitle:@"Payment Cancelled" message:@"You cancelled the payment. Please retry or let us know at your-help-email@your-domain.com in case of any difficulty." delegate:self cancelButtonTitle:@"OK" otherButtonTitles:nil] show];

    [self onPaymentError:-1 description:@"User Cancelled Payment" andData:@{}];

    [razorpay userCancelledPayment];

}
```

Success handler will receive `payment_id` that you can use later to capture the payment.

## 1.8 Store the Fields in Server

A successful payment returns the following fields to the Checkout form.

  
### Success Callback

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
    

## 1.9 Verify Payment Signature

This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments.

  
### To verify the `razorpay_signature` returned to you by the Checkout form:

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
    

**Handy Tips**

iOS 9 has higher requirements for secure URLs. As many Indian banks do not comply with the requirements, you can implement the following as a workaround:

```xml: info.plist
NSAppTransportSecurity

    NSAllowsArbitraryLoads
    

```

Add the above to your `info.plist` file. For more information click [here](https://developer.apple.com/library/content/documentation/General/Reference/InfoPlistKeyReference/Articles/CocoaKeys.html#//apple_ref/doc/uid/TP40009251-SW33).

## 1.10 Verify Payment Status

> **INFO**
>
> 
> **Handy Tips**
> 
> On the Razorpay Dashboard, ensure that the payment status is `captured`. Refer to the payment capture settings page to know how to [capture payments automatically](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
> 

    
### You can track the payment status in three ways:

    
        To verify the payment status from the Razorpay Dashboard:

        1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
        2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**.
        ![](/docs/assets/images/testpayment.jpg)
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/test-integration.md)
