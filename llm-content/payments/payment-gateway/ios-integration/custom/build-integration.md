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

@include integration-steps/order-creation

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

@include payment-methods/upi-collect-deprecated/custom

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

@include checkout-parameters/custom

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

@include integration-steps/store-fields

## 1.9 Verify Payment Signature

@include integration-steps/verify-signature

**Handy Tips**

iOS 9 has higher requirements for secure URLs. As many Indian banks do not comply with the requirements, you can implement the following as a workaround:

```xml: info.plist
NSAppTransportSecurity

    NSAllowsArbitraryLoads
    

```

Add the above to your `info.plist` file. For more information click [here](https://developer.apple.com/library/content/documentation/General/Reference/InfoPlistKeyReference/Articles/CocoaKeys.html#//apple_ref/doc/uid/TP40009251-SW33).

## 1.10 Verify Payment Status

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/test-integration.md)
