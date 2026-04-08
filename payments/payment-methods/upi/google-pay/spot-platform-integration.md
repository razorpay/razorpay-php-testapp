---
title: Google Spot Platform Integration
description: Accept payments using your app on the Google Pay Spot Platform at the Razorpay Custom Checkout.
---

# Google Spot Platform Integration

You can use your existing Razorpay custom integration to accept payments via your app on the Google Pay Spot platform.

## What is Google Pay Spot Platform

You can use the Google Pay Spot Platform to set up your Spot on Google Pay. A Spot is a digital storefront that you can create, brand and host, the way you want.

Know more about [Google Spot Platform](https://developers.google.com/pay/spot/).

## Advantages

Given below are the advantages:
- You need not handle reconciliation separately.
- You do not have to integrate directly with Google Pay.

## Workflow

Following are the payment flow steps:

1. The customer logs into the Google Pay app.
1. The customer clicks on your app, selects a product or service, and clicks the **Pay** button.
1. The Razorpay Custom Checkout creates and sends a payment request to Google Pay.
1. The customer completes the payment on the Google Pay app.
1. After the payment is complete, the customer receives an order confirmation (After you get a payment confirmation from Custom Checkout).

## Prerequisites

1. Contact our [Support Team](https://razorpay.com/support/#request) to get a dedicated VPA (UPI ID). This VPA is for Google Spot Platform Integration.
1. [Sign up](https://support.google.com/pay/business/answer/7684271?hl=en&ref_topic=7684388) for a business account with Google Pay.
1. Verify your VPA (UPI ID) details on the [Google Merchant Console](https://support.google.com/pay/business/answer/7684398?hl=en&ref_topic=7684388). Here, Google deposits a small amount into the bank account linked to your VPA (UPI ID). It might take up to 48 hours for the money to reflect in your account.
    
> **INFO**
>
> 
>     **Tips for Multiple VPAs**
> 
>     If you have multiple VPAs, you need to verify all of them individually on the Google Merchant Console.
>     

1. [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.

## Integration Steps

> **WARN**
>
> 
> **Watch Out!**
> 
> This feature is available only on the Chrome browser on your Android mobile devices.
> 

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

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-6f15a901-06ea-4224-b396-15cd94c6148d)

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
   

### Step 2: Invoke Checkout and Pass Order ID and Other Options to it

#### Step 2.1: Include the Razorpay Custom Checkout JavaScript

Include the following script, preferably in the `` section of your page:

```html: razorpay.js

```

> **INFO**
>
> 
> **Include the Javascript, Not the Library**
> 
> Include the script from https://checkout.razorpay.com/v1/razorpay.js instead of serving a copy from your server. This allows new updates and bug fixes to the library to get automatically served to your application.
> 
> We always maintain backward compatibility with our code.
> 

#### Step 2.2: Include the Google Spot JavaScript

Include the following script, preferably in the `` section of your page:

```html: microapps.js

```

#### Step 2.3: Instantiate Razorpay Custom Checkout

#### Single Instance on a Page

```js
var razorpay = new Razorpay({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
});
```

#### Multiple Instances on Same Page

If you need multiple Razorpay instances on the same page, you can globally set some of the options:

```js
Razorpay.configure({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
})
new Razorpay({}); // will inherit key and image from above.
```

#### Step 2.4: Submit Payment Details

Once the order is created and the customer's payment details are obtained, the information should be sent to Razorpay to complete the payment. The data that needs to be submitted depends upon the payment method selected by the customer.

You can do this by invoking the `createPayment` method.

The checkout parameters are listed [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/google-pay/spot-platform-integration/checkout-parameters.md).

#### Apply Offers

During checkout, if there is a co-branded offer run by GooglePay, you should apply the discount, and pass on the offer details to Google. Use [these offers parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/google-pay/spot-platform-integration/checkout-parameters.md#offers-parameters) to pass the offer details.

The `razorpay.js` file receives this data and appends this to the existing data being shared with Google.

> **INFO**
>
> 
> **Handy Tips**
> 
> Razorpay will be agnostic to whatever data is passed within this additional information section. You must structure the data as per Google's formats.
> 

```js: CreatePayment with handler function
var data = {
  amount: 100, // in paise, 1000 equals ₹10, // in paise, 100 equals ₹1
  email: 'gaurav.kumar@example.com',
  contact: '9876543210',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_F8RF6kSs1NXHJZ',
  method: 'upi',
  customer_id: 'cust_00000000000001',
  additional_info: { //used to pass offer details to Google
       "displayItems": [{
        "type": "SUBTOTAL",
        "price": "20.00",
      },
      {
        "type": "DISCOUNT",
        "price": "-10.00",
      }],
      "offerInfo": {
          "offers": [{
              "redemptionCode": "DISCOUNT10",
          }
        ],
      }
  }
}
};

var btn = document.querySelector('#btn');
btn.addEventListener('click', function(){
    // has to be placed within user initiated context, such as click, in order for popup to open.
  window.onload = function(){
      var paymentData = data;
      razorpay.checkPaymentAdapter('microapps.gpay')
        .then(() => {
          // Google Pay Microapps API is available, show the payment option
          pay();
        })
        .catch(() => {
          console.log('Gpay adapter not available');
        });
      function pay(){
        var paymentData = data;
          razorpay.createPayment(paymentData, { microapps: { gpay: true } });
          razorpay.on('payment.success', function(resp) {
            alert(resp.razorpay_payment_id),
            alert(resp.razorpay_order_id),
            alert(resp.razorpay_signature),
            alert(resp.transaction_reference)}); // will pass payment ID, order ID, Razorpay signature and transaction reference to success handler.
          razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error handler
          razorpay.on('payment.cancel', function(resp){alert(resp.error.description)});
        }
})
```js: CreatePayment with callback URL
var data = {
  callback_url: 'https://www.examplecallbackurl.com/',
  amount: 100, // in paise, 1000 equals ₹10, // in paise, 100 equals ₹1
  email: 'gaurav.kumar@example.com',
  contact: '9876543210',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_F8RF6kSs1NXHJZ',
  method: 'upi',
  customer_id: 'cust_00000000000001',
  additional_info: { // Used to pass offer details to Google
       "displayItems": [{
        "type": "SUBTOTAL",
        "price": "20.00",
      },
      {
        "type": "DISCOUNT",
        "price": "-10.00",
      }],
      "offerInfo": {
          "offers": [{
              "redemptionCode": "DISCOUNT10",
          }
        ],
      }
  }
}

};

var btn = document.querySelector('#btn');
btn.addEventListener('click', function(){
    // has to be placed within user initiated context, such as click, in order for popup to open.
  window.onload = function(){
      var paymentData = data;
      razorpay.checkPaymentAdapter('microapps.gpay')
        .then(() => {
          // Google Pay Microapps API is available, show the payment option
          pay();
        })
        .catch(() => {
          console.log('Gpay adapter not available');
        });
      function pay(){
        var paymentData = data;
          razorpay.createPayment(paymentData, { microapps: { gpay: true } });
          razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error handler
          razorpay.on('payment.cancel', function(resp){alert(resp.error.description)});
        }
})
```

### Step 3: Store fields in your Database

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
    

### Step 4: Verify the Signature

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
    

### Step 5: Send Payment Details to Google

Once the payment is complete and signature verified, you must pass the **UPI reference ID** to Google.

1. Copy the **UPI reference ID** from `resp.transaction_reference` which you will receive as part of the `payment.success` response in [step 2.4](#step-24-submit-payment-details).
1. Add it as the value for the `transactionReferenceId` parameter in the Google Spot Orders API.
1. Fire the Google Spot Orders API.

> **INFO**
>
> 
> **Handy Tips**
> 
> You need to be signed in with a whitelisted ID to view the Google Spot Orders API document.
> 
> If you get a 404 error on the above link, contact [Google Support](mailto:spot-support@google.com) and ask them to whitelist your ID.
> 

### Payment Capture Settings

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
  

## Test Integration

Now that the integration is complete, you must ensure that your integration works as expected.

Make a test transaction, verify the payment status from Dashboard, APIs or subscribe to related Webhook events to take appropriate actions at your end. After testing the integration, you can start accepting payments from your customers in real-time.

> **INFO**
>
> 
> **Handy Tips**
> 
> - The Google Pay Spot Platform only supported UPI payments.
> - Testing can only be done with real money. You can make low-value transactions to test the integration.
> 

#### Verify Payment Status

You can track the payment status from the Dashboard or subscribe to the Webhook event or poll our APIs.

#### From Dashboard

1. Log in to the Dashboard and navigate to **Transactions** → **Payments**.
1. Look if a `payment_ID` has been generated.  If no `payment_ID` has been generated, it means that the transaction has failed.
  

#### Subscribe to Webhook events

You can subscribe to a Webhook event that is generated when a specific event happens in our server. When one of those events is triggered, Razorpay sends the Webhook payload to the configured URL.

Know more about how to [set up Webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md)

When the customer makes a successful payment on the Checkout, the `payment.authorized` event is created in Razorpay.

#### Poll APIs

You can retrieve the status of the payments by polling our [Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-multiple-payments).

### Related Information

- [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) (Recommended)
- [Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) (Recommended)
- [How Payment Gateway Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md)
- [Payment States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md)
- [Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements.md)
- [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md)
