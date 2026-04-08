---
title: UPI Intent on iOS - S2S
description: Integrate with Razorpay APIs to support UPI Intent flow on your app.
---

# UPI Intent on iOS - S2S

You can collect payments using the UPI intent flow that is handled by UPI apps installed on your customers' mobile devices. We support UPI Intent on iOS for these PSP apps:
- Google Pay
- PhonePe
- Paytm

## Prerequisites

- Sign up for a Razorpay account.
- [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.

## Workflow

To enable UPI Intent on your customer's iOS device:

1. [Create an Order](#step-1-create-an-order).
2. [Update your iOS app's `info.plist` file](#step-2-update-your-apps-infoplist-file).
3. [Check availability of PSP app on customer's device](#step-3-check-availability-of-psp-app-on).
4. [Initiate Payment using the intent URL](#step-4-initiate-the-payment).
5. [Deep link the URL by prefixing App Name](#step-5-deep-link-the-url-by-prefixing).
6. [Verify Payment Status](#step-6-verify-payment-status).

### Step 1: Create an Order

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
   

### Step 2: Update your app's info.plist file

Your iOS app must seek permission from the device to open the UPI PSP app that the customer selects on Checkout. For this, you must make the following changes in your iOS app's info.plist file.

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

### Step 3:  Check Availability of PSP App on Customer Device

You must ensure that the UPI PSP app (Google Pay, PhonePe or Paytm) is available on the customer's device. This can be done by checking the URI scheme.

If an app is not available, it will not be displayed on the Checkout. For example, if you want to determine availability of PhonePe on customer's device:

```js: Check PSP App Availability
let urlPhonePe = "phonepe://" // This will open PhonePe URL.

if let urlString = urlPhonePe.addingPercentEncoding(withAllowedCharacters: NSCharacterSet.urlQueryAllowed) {
            if let phonepeURL = URL(string: urlString) {
                if UIApplication.shared.canOpenURL(phonepeURL) {
        //Show Phonepe image
                } else {
        // Hide Phonepe icon
                }
            }
        }
```

### Step 4: Initiate the Payment

/payments/create/upi

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/upi \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "order_id": "order_DBJOWzybf0sJbb",
  "email": "gaurav.kumar@example.com",
  "contact": "9090909090",
  "method": "upi",
  "flow": "intent",
  "ip": "105.106.107.108",
  "referer": "http://merchantsite.com/pay",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": {
    "purpose": "UPI test payment"
  }
}'
``` json: Response
{
  "razorpay_payment_id": "pay_FEmLehpBBG0ntV",
  "link": "upi://pay?pa=upi@razopay&pn=Acme&tr=z5WHDd077OGFvPK&tn=razorpay&am=1&cu=INR&mc=5411"
}
```

#### Request Parameters

Following are the request parameters:

`amount` _mandatory_
: `integer` Amount in paisa. The amount associated with the payment in smallest unit of the supported currency. For example, 2000 means ₹20.

`currency` _mandatory_
: `string` ISO code of the currency associated with the payment amount. In this case, it is `INR`.

`order_id` _mandatory_
: `string` Unique identifier of the order, obtained from the response of the previous step.

`contact` _mandatory_
: `string` Phone number of the customer.

`email` _mandatory_
: `string` Email address of the customer.

`method` _mandatory_
: `string` Method used to make the payment. Here, it is `upi`.

`flow` _mandatory_
: `string` Type of the UPI method. In this case, it is `flow`.

`ip` _mandatory_
: `string` Client's browser IP address. For example, **117.217.74.98**

`referer` _mandatory_
: `string` Value of the`referer` header passed by the client's browser. For example, **https://example.com/**

`user_agent` _mandatory_
: `string` Value of the `user_agent` header passed by client's browser. For example, **Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36**

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`description` _optional_
: `string` Descriptive text of the payment.

`callback_URL` _optional_
: `string` URL where Razorpay will submit the final payment status.

### Step 5: Deep link the URL by prefixing App Name

After the URL is generated in the response of the previous step, you should edit it and prefix the app name to the URL. For example, if you detect the presence of PhonePe on the customer's device, you should add a prefix to the URL as shown below:

Original URL | Edited URL
---
upi://pay?pa=upi@razopay&pn=Acme&tr=z5WHDd077OGFvPK&tn=razorpay&am=1&cu=INR&mc=5411 | phonepe://pay?pa=upi@razorpay&pn=Acme&tr=99fz4Q6LKearD1B&tn=razorpay&am=1&cu=INR&mc=5411

For Google Pay and Paytm, you should append the prefix to the URL as shown:

App Name | Prefix-appended URL
---
Google Pay | tez://upi/pay?pa=upi@razorpay&pn=Acme&tr=99fz4Q6LKearD1B&tn=razorpay&am=1&cu=INR&mc=5411
---
Paytm | paytmmp://upi/pay?pa=upi@razorpay&pn=Acme&tr=99fz4Q6LKearD1B&tn=razorpay&am=1&cu=INR&mc=5411

### Step 6: Verify Payment Status

You can subscribe to the `order.paid`, `payment.authorized` and `payment.captured` Webhook events to get notified once the customer completes the UPI payment. Know more about[ Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

You can also poll our APIs at regular intervals to track the status of the [payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-payments-based-on-orders) made for an order.

#### Payment Failure and Re-initiating Payments

If the order is not marked `paid` within 2-3 minutes, you can re-initiate payment for the same order.
