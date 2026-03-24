---
title: Additional Support For Payment Methods
description: Additional support features available for card, netbanking, EMI and more.
---

# Additional Support For Payment Methods

The Razorpay iOS Custom SDK lets you integrate the supported payment methods on your iOS app's Checkout form.

## Fetch Payment Methods

Use the [Fetch Payment Methods API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/custom/build-integration.md#14-fetch-payment-methods) to fetch the payment methods available for your account.

Below are the sample payloads for each payment method.

## Debit and Credit Card

Add the following code where you want to initiate a card payment:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR", // We support international currencies.
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
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
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR", // We support international currencies.
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"card",
    @"card[name]": @"Gaurav Kumar",
    @"card[number]": @"4386289407660153",
    @"card[expiry_month]": @"06",
    @"card[expiry_year]": @"30",
    @"card[cvv]": @"123"
};

[_razorpay authorize: options];
```

Check the [list of supported cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-cards).

## Bank Transfer

This payment method allows you to display your Customer Identifier details on checkout. Your customers can make online bank transfers to this account.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

There are no specific request parameters to be passed. Instead, you must pass the `fetchVirtualAccount` method for your Customer Identifier to get created and the details to appear on the checkout. Know more about [integrating bank transfer with Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer/custom-integration.md).

 to get this feature activated on your account.

There are no specific request parameters to be passed. Instead, you must pass the `fetchVirtualAccount` method for your Customer Identifier to get created and the details to appear on the checkout. Know more about [integrating bank transfer with Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer/custom-integration.md).

## EMI on Debit and Credit Cards

Add the following code where you want to initiate an EMI payment:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "emi",
    "emi_duration": 9,
    "card[name]": "Gaurav Kumar",
    "card[number]": "4386289407660153",
    "card[expiry_month]": 06,
    "card[expiry_year]": 30,
    "card[cvv]": "123"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"emi",
    @"emi_duration": @"9",
    @"card[name]": @"Gaurav Kumar",
    @"card[number]": @"4386289407660153",
    @"card[expiry_month]": @"06",
    @"card[expiry_year]": @"30",
    @"card[cvv]": @"123"
};

[_razorpay authorize: options];
```

Check the list of supported [debit card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md#supported-banks-for-debit-card-emis) and [credit card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/credit-card-emi.md#supported-banks-for-credit-card-emis) EMI providers.

## Cardless EMI

Add the following code where you want to initiate a cardless EMI payment:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "cardless_emi",
    "provider": "earlysalary"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"cardless_emi",
    @"provider": @"earlysalary"
};

[_razorpay authorize: options];
```

Check the [list of supported cardless EMI providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md#supported-payment-partners).

## Netbanking

Add the following code where you want to initiate a netbanking payment:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR", // We support international currencies.
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "netbanking",
    "bank": "HDFC"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR", // We support international currencies.
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"netbanking",
    @"bank": @"HDFC"
};

[_razorpay authorize: options];
```

Check the [list of supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md).

## Pay Later

Add the following code where you want to initiate a Pay Later payment:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb", // From response of Step 3
    "method": "paylater",
    "provider": "icic"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"paylater",
    @"provider": @"icic"
};

[_razorpay authorize: options];
```

Check the [list of Pay Later providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md#providers).

## Wallet

Add the following code where you want to initiate a wallet payment:

```swift: ViewController.swift
let options = [
    "amount": "100",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_4xbQrmEoA5WJ0G",
    "contact": "9000090000",
    "method": "wallet",
    "wallet": "mobikwik",
   ]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100",
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"wallet",
    @"wallet": @"mobikwik"
};

[_razorpay authorize: options];
```

## UPI

Specify `upi` the `method` parameter for UPI payments. The SDK supports two flows:
- Collect
- Intent

#### Collect Flow

Customers enter their `vpa` or [phone number](#upi-payments-using-phone-number) on your UI and complete the payments on their respective UPI apps in collect flow. 

You can now pass the `vpa` parameter in the `upi` array as shown below.

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

#### Sample Code

The sample code below sends a collect request to the `gaurav.kumar@exampleupi` handle:

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "upi",
    "_[flow]": "collect",
    "vpa": "gaurav.kumar@exampleupi"
]
razorpay.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"upi",
    @"_[flow]": @"collect",
    @"vpa": @"gaurav.kumar@exampleupi"
};

[_razorpay authorize: options];
```

  
### UPI Payments Using Phone Number

     You can accept UPI payments using phone number for the collect flow. Follow the steps given below: 

     1. You must collect the customer's phone number from your end.
     2. Check if any `vpa` is associated with the given number and get the `vpa_token` for that number using the sample code given below:
        ```swift: ViewController.swift
        self.razorpay?.isValidVpa("9000090000", withSuccessCallback: { response in
            // VPA Validation Successful
            // get and store response.vpa_token for initiating payment
            // you will get response.masked_vpa in this response which you can show to the end user
        }, withFailure: { responseError in
            print(responseError)
            // Error: no VPA associated with the given number
        })
        ```objectivec: ViewController.m
        [razorpay isValidVpa:@"9000090000" withSuccessCallback:^(NSDictionary * _Nonnull success) {
            // VPA Validation Successful
            // get and store response.vpa_token for initiating payment
            // you will get response.masked_vpa in this response which you can show to the end
        } withFailure:^(NSDictionary * _Nonnull error) {
            NSLog(@"%@", error.description);
            // Error: no VPA associated with the given number
        }];
        ```
     3. Pass the `vpa_token` parameter in the `upi` array as shown below:
        ```swift: ViewController.swift
        let options: [String: Any] = [
            "amount": 5000, 
            "currency": "INR",
            "email": "gaurav.kumar@example.com",
            "contact": "9000090000",
            "order_id": "order_DBJOWzybf0XXXX",
            "method": "upi",
            "_[flow]": "collect",
            "vpa_token": "f731951149df8903d374b117f921ab41"
        ]
        razorpay.authorize(options)
        ```objectivec: ViewController.m
        NSDictionary *options = @{
            @"amount": @"5000",
            @"currency": @"INR",
            @"email": @"gaurav.kumar@example.com",
            @"contact": @"9000090000",
            @"order_id": @"order_4xbQrmEoA5XXXX",
            @"method": @"upi",
            @"_[flow]": @"collect",
            @"vpa_token": @"f731951149df8903d374b117f921ab41"
        };
        [_razorpay authorize: options];
        ```
    

#### Intent Flow
Provide your customers with a better payment experience by enabling UPI Intent on your app's Checkout form. In the UPI Intent flow:

1. You have to fetch the list of UPI supported apps and show it in your app so that the customer can see only valid apps.
2. After the customer selects the app, you have to pass the app name in `options`, with the key `upi_app_package_name` value. Possible values for `upi_app_package_name` are:
    - `google_pay`
    - `phonepe`
    - `paytm`
    - `cred` 
3. The customer enters their UPI PIN to complete the transaction.
4. The customer returns to your app manually without redirection.

#### Step 1: Update the info.plist File

Your iOS app must seek permission from the device to open the UPI PSP app that the customer selects on the Checkout. For this, you must make the following changes to your iOS app's info.plist file:

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

#### Step 2: Get a List of UPI Supported Apps
This sample code fetches the list of apps on the customer's device that support UPI payments.

```swift: ViewController.swift
RazorpayCheckout.getAppsWhichSupportUpi { (upiApps) in
    print(upiApps)
}
```objectivec: ViewController.m
[RazorpayCheckout getAppsWhichSupportUpiWithHandler:^(NSArray * upiApps) {
    NSLog(@"%@", upiApps);
}];
```

The sample code below invokes the UPI intent where the user can select the desired application.

Ensure that the `upi_app_package_name` is passed from the `getAppsWhichSupportUpi()` method value. Otherwise, it will not pass the validation.

```swift: ViewController.swift
let options: [String: Any] = [
    "amount": 100, // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_DBJOWzybf0sJbb",
    "method": "upi",
    "_[flow]": "intent",
    "upi_app_package_name": "google_pay"
]
razorpay?.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"upi",
    @"_[flow]": @"intent",
    @"upi_app_package_name": @"google_pay",
};

[_razorpay authorize: options];
```

#### UPI Intent on Recurring Payments

Configure and initiate a recurring payment transaction on UPI Intent:

```swift: ViewController.swift
let options: [String:Any] = [
    "key": "YOUR_KEY_ID",   
    "order_id": "order_DBJOWzybfXXXX", 
    "customer_id": "cust_BtQNqzmBlXXXX",
    "contact": "9000000000",
    "amount": 10000, // Amount should match the order amount 
    "email": "gaurav.kumar@example.com",
    "currency": "INR",
    "recurring": 1, // This key value pair is mandatory for Intent Recurring Payment.
    "upi_app_package_name": "",
    "method": "upi",
    "_[flow]": "intent"
]
```objectivec: ViewController.m
NSDictionary *options = @{
    @"key": @"YOUR_KEY_ID",
    @"order_id": @"order_DBJOWzybfXXXX",
    @"customer_id": @"cust_BtQNqzmBlXXXX",
    @"contact": @"9000090000",
    @"amount": @(10000), // Amount should match the order amount 
    @"email": @"gaurav.kumar@example.com",
    @"currency": @"INR",
    @"recurring": @(1), // This key value pair is mandatory for Intent Recurring Payment.
    @"upi_app_package_name": @"",
    @"method": @"upi",
    @"_[flow]": @"intent"
};
```

#### Turbo UPI

Make UPI payments a faster, 2-step experience for your customers with Razorpay's Turbo UPI SDK.

1. [Turbo UPI Headless Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-ui.md)
2. [Turbo UPI UI Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi/integrate-noui.md)

Know more about the [Customer Onboarding](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi.md#customer-onboarding-flow) and [Integration Steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ios-integration/custom/payment-methods/turbo-upi.md#next-steps).

## CRED

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

Customers can make payments on your iOS app using their CRED Coins as well as the credit cards saved on CRED. The SDK supports two flows:

1. [Collect](#collect-flow-1)
2. [Intent](#intent-flow-1)

> **IMP**
>
> 
> 
> **Handy Tips**
> 
> Ensure you have integrated with Razorpay iOS SDK version 1.3.5 or higher.
> 
> 

#### Prerequisites

For both collect and intent flow, you need to pass the `app_offer` parameter in the Orders API.

 /orders 

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "app_offer": true
}'
```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "app_offer": true
 })
```php: PHP 
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => 'receipt#1', 'amount' => 1000, 'currency' => 'INR', 'app_offer'=> true));

```csharp: .NET 
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 1000); // amount in the smallest currency unit
options.Add("receipt", "receipt#1");
options.Add("currency", "INR");
options.Add("app_offer", true);
Order order = client.Order.Create(options);

```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 1000,
  currency: "INR",
  receipt: "receipt#1",
  app_offer: true
})

```go: go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "app_offer": true
}
body, err := client.Order.Create(data, nil)

```ruby: Ruby 
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 1000, currency: 'INR', receipt: 'receipt#1', app_offer: 1

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 1000); // amount in the smallest currency unit
orderRequest.put("currency", "INR");
orderRequest.put("receipt", "receipt#1");
orderRequest.put("app_offer", true);

Order order = razorpay.orders.create(orderRequest);

```json: Response
{
  "id": "order_FNPoKwCtPyhJOt",
  "entity": "order",
  "amount": 1000,
  "amount_paid": 0,
  "amount_due": 1000,
  "currency": "INR",
  "receipt": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1596703420
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency`  _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Default is `INR`.

`app_offer` _optional_
: `boolean` Allow/do not allow customers to use CRED coins to make payments. This is used to prevent double discounting scenarios where customers have already availed discounts using voucher/coupon, and you do not want them to redeem Coins as well. Possible values:
    - `true`: Customer not allowed to use CRED coins to make payment.
    - `false` (default): Customer can use CRED coins to make payment.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Collect Flow

In the Collect Flow, the SDK sends a push notification to the `contact` number passed in the create request. To initiate collect flow, send `app_present` the parameter as `0` while creating the payment.

```swift: ViewController.swift
let options: [String: Any] = [
  "amount": 100,
  "currency": "INR",
  "contact": "9000090000",
  "order_id": "order_FNPoKwCtPyhJOt",
  "email": "gaurav.kumar@example.com",
  "method": "app",
  "provider": "cred",
  "app_present": 0
]
razorpay?.authorize(options)
```objectivec: ViewController.m
NSDictionary *options = @{
  "amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
  "currency": @"INR",
  "email": @"gaurav.kumar@example.com",
  "contact": @"9000090000",
  "order_id": @"order_4xbQrmEoA5WJ0G",
  "method": @"app",
  "provider": @"cred",
  "app_present": @NO,
};
[_razorpay payWithCred: options];
```

#### Request Parameters

Along with the other payment creation request parameters, you must pass:

`method` _mandatory_
: `string` The method used to make the payment. Here, it must be `app`.

`provider` _mandatory if method=app_
: `string` Name of the PSP app. Here, it must be `cred`.

`app_present` _mandatory if app=cred_
: `integer` Sets the payment flow as collect. Possible values:
    - `1`: Opens the CRED app on the customer's device.
    - `0` (default): Sends a push notification to the customer's device.

#### Intent Flow

In Intent Flow, the SDK invokes an intent, which is handled by the Cred app installed on the iOS device. Follow these steps:

#### Step 1: Update the info.plist File

You must make the following changes to your iOS app's info.plist file:

```xml: info.plist
LSApplicationQueriesSchemes

    credpay

```

#### Step 2: Detect CRED App in Customer's Mobile

- Check if the CRED app is present on the customer's mobile using the `isCredAppAvailable()` method. 

    ```swift: ViewController.swift
    /// This checks if the app is available on the device or not.
    private func isCredAppAvailable() -> Int {
        let credURIScheme = "credpay://" // This will open the CRED URL.
        if let urlString = credURIScheme.addingPercentEncoding(withAllowedCharacters: NSCharacterSet.urlQueryAllowed) {
            if let credURL = URL(string: urlString) {
                if UIApplication.shared.canOpenURL(credURL) {
                    return 1
                }
            }
        }
        return 0
    }
    ```objectivec: ViewController.m
    - (int)isCredAppAvailable {
        NSString *credURIScheme = [NSString stringWithFormat:@"credpay://"];
        NSString *urlString = [credURIScheme stringByAddingPercentEncodingWithAllowedCharacters:[NSCharacterSet URLHostAllowedCharacterSet]];
        NSURL *url = [NSURL URLWithString:urlString];
        if ([[UIApplication sharedApplication] canOpenURL:url]) {
            return 1;
        } else {
            return 0;
        }
    }
    ```

- CRED app listens to the URI Schema.

    ```xml:
    credpay://
    ```

    This can be passed in the `uriSchema` parameter in the above function. `isCredAppAvailable()` returns a boolean value informing whether the app is present on the device or not.

    ```swift: ViewController.swift
    if (isCredAppAvailable()) {
        payWithCredBtn.setText("CRED Pay (Intent Flow)");
    } else {
        payWithCredBtn.setText("CRED Pay (Collect Flow)");
    }
    ```objectivec: ViewController.m
    if ([self isCredAppAvailable]) {
        [_payButton setTitle:@"Pay With Cred (Intent Flow)" forState:UIControlStateNormal];
    } else {
        [_payButton setTitle:@"Pay With Cred (Collect Flow)" forState:UIControlStateNormal];
    }
    ```

- If the CRED app is installed, pass the `callback_url` parameter in the payload:

    ```swift: ViewController.swift
    options["callback_url"] = "://"
    ```objectivec: ViewController.m
    [dict setObject:@"://" forKey:@"callback_url"];
    ```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> The redirect happens from the CRED app based on the URL scheme passed in the payload. If not passed, the app will not redirect.
> 
> 

#### Listen to CRED Callback

Listen to CRED callback in the `AppDelegate` class by implementing the `open url`  method. Handle the success response.

```swift: ViewController.swift
func application(_ app: UIApplication, open url: URL, options: [UIApplication.OpenURLOptionsKey : Any] = [:]) -> Bool {
    DispatchQueue.main.asyncAfter(deadline: .now() + 4.0) {
        /** Post the notification to CustomWebVC **/
        NotificationCenter.default.post(name: NSNotification.Name(rawValue: "CREDPAYURIEVENT"), object: nil, userInfo: ["response":url.absoluteString])
    }
    return false
}
```objectivec: ViewController.m
- (BOOL)application:(UIApplication *)app openURL:(NSURL *)url options:(NSDictionary *)options {
    [[NSNotificationCenter defaultCenter] postNotificationName:@"CREDPAYURIEVENT" object:NULL userInfo:@{@"response": [url absoluteString]}];
    return NO;
}
```

#### Register for Notification

Register for notification in CustomWebVC using the code sample given below:

```swift: ViewController.swift
NotificationCenter.default.addObserver(self, selector: #selector(self.statusCredData(_:)), name:NSNotification.Name(rawValue: "CREDPAYURIEVENT"), object: nil);
```objectivec: ViewController.m
[[NSNotificationCenter defaultCenter] addObserver:self selector:@selector(statusCredData:) name:@"CREDPAYURIEVENT" object:NULL];
```

Use the code given below to handle payment data:

```swift: ViewController.swift
@objc func statusCredData(_ notification: NSNotification) {
    if let dict = notification.userInfo {
        if let uriScheme = dict["response"] as? String {
            DispatchQueue.main.async {
                self.razorpay?.publishUri(with: uriScheme)
            }
        }
    }
}
```objectivec: ViewController.m
- (void)statusCredData:(NSNotification *) notification {
    NSDictionary *dict = [notification userInfo];
    NSString *uriScheme = dict[@"response"];
    dispatch_async(dispatch_get_main_queue(), ^{
        [razorpay publishUri:uriScheme];
    });
}
```

#### Initiate Intent Flow

To initiate intent flow, send the `app_present` parameter as `1` while creating the payment.

```swift: ViewController.swift
let options: [String:Any] = [
  "amount": 100,
  "currency": "INR",
  "contact": "9000090000",
  "order_id": "order_FNPoKwCtPyhJOt",
  "email": "gaurav.kumar@example.com",
  "method": "app",
  "provider": "cred",
  "app_present": 1,
  "callback_url": "://"
]
razorpay.payWithCred(options)
```objectivec: ViewController.m
NSDictionary *options = @{
    @"amount": @"100", // amount in currency subunits. Defaults to INR. 100 = 100 paise = INR 1.
    @"currency": @"INR",
    @"email": @"gaurav.kumar@example.com",
    @"contact": @"9000090000",
    @"order_id": @"order_4xbQrmEoA5WJ0G",
    @"method": @"app",
    @"provider": @"cred",
    @"app_present": @YES,
    @"callback_url": @"://"
};

[_razorpay payWithCred: options];
```

#### Request Parameters

Along with the other payment creation request parameters, you must pass:

`method`  _mandatory_
: `string` The method used to make the payment. Here, it must be `app`.

`provider` _mandatory if method=app_
: `string` Name of the PSP app. Here, it must be `cred`.

`app_present` _mandatory if app=cred_
: `integer` Based upon response from the app present function, pass the value in this field. Possible values:
    - `1`: Opens the CRED app on customer's device.
    - `0` (default): Sends a push notification to the customer's device.

`callback_url` _mandatory_
: `string` The URI scheme, using which the CRED app will be opened on the customer's mobile device.
