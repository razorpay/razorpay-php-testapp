---
title: 1. Build Integration for Cards (New Integration)
description: Steps to integrate S2S JSON V1 and accept payments using cards.
---

# 1. Build Integration for Cards (New Integration)

Integrate with Razorpay APIs to start accepting card payments. Our APIs support the latest 3DS2 authentication protocol.

> **INFO**
>
> 
> **Handy Tips**
> 
> If you are an existing Razorpay user, that is, you integrated with our S2S APIs before October 15, 2022, you need to make certain integration changes to [migrate to the 3DS2 flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/build-integration/cards/migrate-3ds2.0.md).
> 

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You must have a PCI compliance certificate to get this feature enabled on your account.
> 

## 3DS2 Authentication

3DS2 is an authentication protocol, the successor of 3DS1, that enables businesses and payment providers to send additional information (such as customer device or browser data) to verify the transaction's authenticity. Razorpay integration is compliant with the 3DS2 protocol. 

**Know more**: Razorpay supports [3DS2 transactions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/cards/3ds2.0.md).

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - Integration does not differ for the challenge or frictionless flow.
> - Frictionless flow is not applicable for payments on cards issued in India.
> 

## Integration Steps

The integration consists of the following steps.

**1.1** [Create an Order](#11-create-an-order).

**1.2** [Create a Payment](#12-create-a-payment).

**1.3** [Handle Payment Success and Failure](#13-handle-payment-success-and-failure).

**1.4** [Verify Payment Signature](#14-verify-payment-signature).

**1.5** [Verify Payment Status](#15-verify-payment-status).

> **WARN**
>
> 
> **Watch Out!**
> 
> Do not hardcode the URL returned in the API responses.
> 

### 1.1 Create an Order

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
   

### 1.2 Create a Payment

Create a payment using the API given below after your order is created.

/payments/create/json

```curl: Curl
curl -X POST \
https://api.razorpay.com/v1/payments/create/json \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "contact": "9000090000",
  "email": "gaurav.kumar@example.com",
  "order_id": "order_DPzFe1Q1dEOKed",
  "method": "card",
  "card": {
    "number": "4386289407660153",
    "name": "Gaurav",
    "expiry_month": 11,
    "expiry_year": 30,
    "cvv": 100
  },
  "authentication": {
    "authentication_channel": "browser"
  },
  ### 3DS2.0 Browser Parameters###
  "browser": {
    "java_enabled": false,
    "javascript_enabled": false,
    "timezone_offset": 11,
    "color_depth": 23,
    "screen_width": 23,
    "screen_height": 100
  },
  "ip": "105.106.107.108",
  "referer": "https://merchansite.com/example/paybill",
  "user_agent": "Mozilla/5.0"
}'

```java: Java
import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;

RazorpayClient instance = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 100);
paymentRequest.put("currency", "INR");
paymentRequest.put("contact", "9000090000");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("order_id", "order_DPzFe1Q1dEOKed");
paymentRequest.put("method", "card");

JSONObject card = new JSONObject();
card.put("number", "4386289407660153");
card.put("name", "Gaurav");
card.put("expiry_month", 11);
card.put("expiry_year", 30);
card.put("cvv", 100);
paymentRequest.put("card", card);

JSONObject authentication = new JSONObject();
authentication.put("authentication_channel", "browser");
paymentRequest.put("authentication", authentication);

JSONObject browser = new JSONObject();
browser.put("java_enabled", false);
browser.put("javascript_enabled", false);
browser.put("timezone_offset", 11);
browser.put("color_depth", 23);
browser.put("screen_width", 23);
browser.put("screen_height", 100);
paymentRequest.put("browser", browser);

paymentRequest.put("ip", "105.106.107.108");
paymentRequest.put("referer", "https://merchansite.com/example/paybill");
paymentRequest.put("user_agent", "Mozilla/5.0");

Payment payment = instance.payments.createJsonPayment(paymentRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", 100);
paymentRequest.Add("currency", "INR");
paymentRequest.Add("contact", "9900008989");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("order_id", "order_DPzFe1Q1dEOKed");
paymentRequest.Add("method", "card");

Dictionary card = new Dictionary();
card.Add("number", "4386289407660153");
card.Add("name", "Gaurav");
card.Add("expiry_month", "11");
card.Add("expiry_year", "30");
card.Add("cvv", "100");
paymentRequest.Add("card", card);

Dictionary authentication = new Dictionary();
authentication.Add("authentication_channel", "browser");
paymentRequest.Add("authentication", authentication);

Dictionary browser = new Dictionary();
browser.Add("java_enabled", false);
browser.Add("javascript_enabled", false);
browser.Add("timezone_offset", 11);
browser.Add("color_depth", 23);
browser.Add("screen_width", 23);
browser.Add("screen_height", 100);
paymentRequest.Add("browser", browser);

paymentRequest.Add("ip", "105.106.107.108");
paymentRequest.Add("referer", "https://merchansite.com/example/paybill");
paymentRequest.Add("user_agent", "Mozilla/5.0");

Payment payment = client.Payment.CreateJsonPayment(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createPaymentJson(array('amount'=>100,'currency'=>'INR','contact'=>'9900008989','email'=>'gaurav.kumar@example.com','order_id'=>'order_DPzFe1Q1dEOKed','method'=>'card','card'=>array('number'=>'4386289407660153','name'=>'Gaurav','expiry_month'=>11,'expiry_year'=>30,'cvv'=>100,),'authentication'=>array('authentication_channel'=>'browser',),'browser'=>array('java_enabled'=>false,'javascript_enabled'=>false,'timezone_offset'=>11,'color_depth'=>23,'screen_width'=>23,'screen_height'=>100,),'ip'=>'105.106.107.108','referer'=>'https://merchansite.com/example/paybill','user_agent'=>'Mozilla/5.0',));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var data = {
    "amount": 100,
    "currency": "INR",
    "contact": "9900008989",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEOKed",
    "method": "card",
    "card": {
        "number": "4386289407660153",
        "name": "Gaurav",
        "expiry_month": 11,
        "expiry_year": 30,
        "cvv": 100
    },
    "authentication": {
        "authentication_channel": "browser"
    },
    "browser": {
        "java_enabled": false,
        "javascript_enabled": false,
        "timezone_offset": 11,
        "color_depth": 23,
        "screen_width": 23,
        "screen_height": 100
    },
    "ip": "105.106.107.108",
    "referer": "https://merchansite.com/example/paybill",
    "user_agent": "Mozilla/5.0"
};

instance.payments.createPaymentJson(data);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

data = {
    "amount": 100,
    "currency": "INR",
    "contact": "9900008989",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEOKed",
    "method": "card",
    "card": {
        "number": "4386289407660153",
        "name": "Gaurav",
        "expiry_month": 11,
        "expiry_year": 30,
        "cvv": 100
    },
    "authentication": {
        "authentication_channel": "browser"
    },
    "browser": {
        "java_enabled": False,
        "javascript_enabled": False,
        "timezone_offset": 11,
        "color_depth": 23,
        "screen_width": 23,
        "screen_height": 100
    },
    "ip": "105.106.107.108",
    "referer": "https://merchansite.com/example/paybill",
    "user_agent": "Mozilla/5.0"
}

client.payment.createPaymentJson(data)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
    "amount": 100,
    "currency": "INR",
    "contact": "9900008989",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEOKed",
    "method": "card",
    "card": {
        "number": "4386289407660153",
        "name": "Gaurav",
        "expiry_month": 11,
        "expiry_year": 30,
        "cvv": 100
    },
    "authentication": {
        "authentication_channel": "browser"
    },
    "browser": {
        "java_enabled": False,
        "javascript_enabled": False,
        "timezone_offset": 11,
        "color_depth": 23,
        "screen_width": 23,
        "screen_height": 100
    },
    "ip": "105.106.107.108",
    "referer": "https://merchansite.com/example/paybill",
    "user_agent": "Mozilla/5.0"
}

Razorpay::Payment.create_json_payment(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
    "amount": 100,
    "currency": "INR",
    "contact": "9900008989",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEOKed",
    "method": "card",
    "card": map[string]interface{}{
        "number": "4386289407660153",
        "name": "Gaurav",
        "expiry_month": 11,
        "expiry_year": 30,
        "cvv": 100,
    },
    "authentication": map[string]interface{}{
        "authentication_channel": "browser",
    },
    "browser": map[string]interface{}{
        "java_enabled": false,
        "javascript_enabled": false,
        "timezone_offset": 11,
        "color_depth": 23,
        "screen_width": 23,
        "screen_height": 100,
    },
    "ip": "105.106.107.108",
    "referer": "https://merchansite.com/example/paybill",
    "user_agent": "Mozilla/5.0",
}

body, err := client.Payment.CreatePaymentJson(para_attr, nil)

```json: Response
{
  "next": [
    {
      "action": "otp_submit",
      "url": "https://api.razorpay.com/v1/payments/pay_PSiqof91TWqwvu/otp/submit"
    },
    {
      "action": "otp_resend",
      "url": "https://api.razorpay.com/v1/payments/pay_PSiqof91TWqwvu/otp/resend"
    },
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/pg_router/v1/payments/pay_PSiqof91TWqwvu/authentication/redirect?key_id=rzp_live_XXXXXXXXXXXXXX"
    }
  ],
  "razorpay_payment_id": "pay_PSiqof91TWqwvu"
}

```

#### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is ₹299, then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as `295`.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, INR. Refer to the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

`order_id` _mandatory_
: `string` Unique identifier of the Order generated in the first step.

`email` _mandatory_
: `string` Email address of the customer. Maximum length supported is 40 characters.

`contact` _mandatory_
: `string` Phone number of the customer. Maximum length supported is 15 characters, inclusive of country code.

`method` _mandatory_
: `string` Name of the payment method. Possible value is `card`.

`card` _mandatory_
: `object` Details associated with the card.

    `number`
    : `string` Unformatted card number.

    `name`
    : `string` Name of the cardholder.

    `expiry_month`
    : `string` Expiry month for the card in MM format.

    `expiry_year`
    : `string` Expiry year for the card in YY format.

    `cvv`
    : `string` CVV printed on the back of the card.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>       - CVV is not required by default for tokenised cards across all networks.
>       - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>       - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>       - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>       - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.       
>     

`user-agent` _mandatory_
: `string` The User-Agent header of the user's browser. Default value will be passed by Razorpay if not provided by merchant.

`ip` _mandatory_
: `string` The customer's IP address.

`authentication` _optional_
: `object` Details of the authentication channel.

    `authentication_channel`
    : `string` The authentication channel for the payment. Possible values:
      - `browser` (default)
      - `app`

`browser` _mandatory_
: `object` Information regarding the customer's browser. This parameter need not be passed when `authentication_channel=app`.

    `java_enabled`
    : `boolean` Indicates whether the customer's browser supports Java. Obtained from the `navigator` HTML DOM object. Possible values:
        - `true`: Customer's browser supports Java.
        - `false`: Customer's browser does not support Java.

    `javascript_enabled`
    : `boolean` Indicates whether the customer's browser can execute JavaScript. Obtained from the `navigator` HTML DOM object. Possible values:
        - `true`: Customer's browser can execute JavaScript.
        - `false`: Customer's browser cannot execute JavaScript.

    `timezone_offset`
    : `integer` Time difference between UTC time and the cardholder browser local time. Obtained from the `getTimezoneOffset()` method applied to `Date` object.

    `screen_width`
    : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

    `screen_height`
    : `integer` Obtained from the `navigator` HTML DOM object.

    `color_depth`
    : `integer` Obtained from payer's browser using the `screen.colorDepth` HTML DOM property.

    `language`
    : `string` Obtained from payer's browser using the `navigator.language` HTML DOM property. Maximum limit of 8 characters.

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`referrer` _optional_
: `string` Referrer header passed by the client's browser.

#### Response Parameters

If the payment request is valid, the response contains the following fields.

`razorpay_payment_id`
: `string` Razorpay-generated ID for the payment created for this request. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process.    

  `action`
  : `string` An indication of the next step available for payment processing. Possible value:
    - `redirect`: The payment requires the customer to be redirected to a bank page. Redirect the customer's browser to the URL returned in the `url` attribute of the object.

  `url`
  : `string` URL to be used for the action indicated. For `redirect`, this will be a URL that the customer's browser needs to be redirected to for authentication.

A basic integration must look out for one type of `next` action:

### Implementing Native OTP flows

If you are using this endpoint to implement [native OTP](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/authentication/native-otp.md) on your website, you can pass the following additional request parameters.

`auth_type`
: `string` Can be set to `otp` for Native OTP or `3ds` for regular ACS payments. This will force the payment to use this authentication type.

`preferred_auth`
: `array` List of authentication types that can be sent instead of `auth_type`, in order to indicate a preference. In this case, if the first authentication type is not supported, the payment will fallback to the next.

You can also opt to have `['otp', '3ds']` defined as your default preferred auth. Get in touch with our [Support Team](https://razorpay.com/support/#raise-a-request) to have this configured for your account.

The response contains the following actions that should be consumed:

Next Action | Description
---
`otp_submit` | The payment requires an OTP to be submitted via a `POST` request to the URL returned in the `url` attribute of the object.
---
`otp_resend` | The option to resend an OTP is available for the payment. It can be triggered by sending an empty `POST` request to the URL returned in the `url` attribute of the object.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> The OTP Submit and Resend APIs return a response in a particular [format](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/authentication/native-otp.md#4-otp-authentication). A payment that is successfully authenticated in this manner need not be verified.
> 

#### Examples

Different samples of payments using Native OTP with and without redirect flows are given below.

#### Payment Using Native OTP

This payment request results in `next` array containing `otp_submit` and `otp_resend`. This means the customer must be prompted for an OTP which can be submitted in the **OTP Submit** endpoint.

As `otp_resend` is also available, you can re-trigger the OTP SMS using the URL shared.

```curl: Request
curl -X POST https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H 'content-type: application/json'
-d '{
  "amount": "1000",
  "currency": "INR",
  "order_id": "order_D32tqGE9vgwgJq",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "method": "card",
  "card": {
    "number": "4386289407660153",
    "name": "Gaurav",
    "expiry_month": 11,
    "expiry_year": 23,
    "cvv": 100
  },
  "authentication": {
    "authentication_channel": "browser"
  },
  ### 3DS2.0 Browser Parameters###
  "browser": {
    "java_enabled": false,
    "javascript_enabled": false,
    "timezone_offset": 11,
    "color_depth": 23,
    "screen_width": 23,
    "screen_height": 100
  },
  "ip": "105.106.107.108",
  "referer": "https://merchansite.com/example/paybill",
  "user_agent": "Mozilla/5.0",
  "auth_type": "otp"
}'
```json: Response
{
  "razorpay_payment_id": "pay_D5jmY2H6vC7Cy3",
  "next": [
    {
      "action": "otp_submit",
      "url": "https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/otp/submit"
    },
    {
      "action": "otp_resend",
      "url": "https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/otp/resend"
    }
  ]
}
```

#### Payment Using Native OTP with Redirect Fallback

This payment request results in a `next` array containing `otp_submit`, `otp_resend`, and `redirect`. The `redirect` action here acts as a fallback to the bank page, that is, if your customer opts to enter the OTP on his bank page only, the browser can be redirected to the redirect URL in order to complete the payment using 3DS flow.

```curl: Request
curl -X POST https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H 'content-type: application/json'
-d '{
  "amount": "1000",
  "currency": "INR",
  "order_id": "order_D32tqGE9vgwgJq",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "method": "card",
  "card": {
    "number": "4386289407660153",
    "name": "Gaurav",
    "expiry_month": 11,
    "expiry_year": 23,
    "cvv": 100
  },
  "authentication": {
    "authentication_channel": "browser"
  },
  ### 3DS2.0 Browser Parameters###
  "browser": {
    "java_enabled": false,
    "javascript_enabled": false,
    "timezone_offset": 11,
    "color_depth": 23,
    "screen_width": 23,
    "screen_height": 100
  },
  "ip": "105.106.107.108",
  "referer": "https://merchansite.com/example/paybill",
  "user_agent": "Mozilla/5.0",
  "auth_type": "otp"
}
```json: Response
{
  "razorpay_payment_id": "pay_D5jmY2H6vC7Cy3",
  "next": [
    {
      "action": "otp_submit",
      "url": "https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/otp/submit"
    },
    {
      "action": "otp_resend",
      "url": "https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/otp/resend"
    },
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/authentication/redirect?key_id=rzp_live_XXXXXXXXXXXXXX"
    }
  ]
}
```

#### Payment Using Native OTP as Preferred Auth

Here the payment request contains `preferred auth` that opts for `otp` and falls back to `3ds`. This will result in a `next` array containing `otp_submit` and `otp_resend`. If Native OTP is not supported for the card, the `next` array containing only `redirect` is returned in the response. 

```curl: Request
curl -X POST https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_SECRET] \
-H 'content-type: application/json'
-d '{
  "amount": "1000",
  "currency": "INR",
  "order_id": "order_D32tqGE9vgwgJq",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "method": "card",
  "card": {
    "number": "4386289407660153",
    "name": "Gaurav",
    "expiry_month": 11,
    "expiry_year": 23,
    "cvv": 100
  },
  "authentication": {
    "authentication_channel": "browser"
  },
  ### 3DS2.0 Browser Parameters###
  "browser": {
    "java_enabled": false,
    "javascript_enabled": false,
    "timezone_offset": 11,
    "color_depth": 23,
    "screen_width": 23,
    "screen_height": 100
  },
  "ip": "105.106.107.108",
  "referer": "https://merchansite.com/example/paybill",
  "user_agent": "Mozilla/5.0",
  "preferred_auth": [
    "otp",
    "3ds"
  ]
}
```json: Response for Native OTP Supported
{
  "razorpay_payment_id": "pay_D5jmY2H6vC7Cy3",
  "next": [
    {
      "action": "otp_submit",
      "url": "https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/otp/submit"
    },
    {
      "action": "otp_resend",
      "url": "https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/otp/resend"
    },
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/authentication/redirect?key_id=rzp_live_XXXXXXXXXXXXXX"
    }
  ]
}
```json: Response for Native OTP Not Supported
{
  "razorpay_payment_id": "pay_D5jmY2H6vC7Cy3",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/authentication/redirect?key_id=rzp_live_XXXXXXXXXXXXXX"
    }
  ]
}
```

#### Response on Submitting OTP

Once the customer submits the OTP using the following endpoint, the respective success or failure responses will be generated.

 to get this feature activated on your Razorpay account.

The following endpoint submits the OTP:

payments/:id/otp/submit

```curl: Example Request
curl -X POST \
'https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/otp/submit' \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/x-www-form-urlencoded" \
-d 'otp=123456'
```json: Success - Auto Capture
{
  "id": "pay_D5jmY2H6vC7Cy3",
  "entity": "payment",
  "amount": 200000,
  "currency": "INR",
  "status": "captured",
  "order_id": "order_D32tqGE9vgwgJq",
  "invoice_id": null,
  "international": false,
  "method": "emi",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": true,
  "description": null,
  "card_id": "card_DG4ZdUO3xABb20",
  "bank": "ICIC",
  "wallet": null,
  "vpa": null,
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "notes": [],
  "fee": 1438,
  "tax": 138,
  "error_code": null,
  "error_description": null,
  "created_at": 1568026077
}
```json: Success - Manual Capture
{
  "id": "pay_D5jmY2H6vC7Cy3",
  "entity": "payment",
  "amount": 200000,
  "currency": "INR",
  "status": "authorized",
  "order_id": "order_D32tqGE9vgwgJq",
  "invoice_id": null,
  "international": false,
  "method": "emi",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": false,
  "description": null,
  "card_id": "card_DG4ZdUO3xABb20",
  "bank": "ICIC",
  "wallet": null,
  "vpa": null,
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "notes": [],
  "fee": null,
  "tax": null,
  "error_code": null,
  "error_description": null,
  "created_at": 1568026077
}
```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",        
    "description": "Authentication failed due to incorrect otp", 
    "field": null,
    "source": "customer",
    "step": "payment_authentication",
    "reason": "invalid_otp",
    "metadata": {
      "payment_id": "pay_D5jmY2H6vC7Cy3",
      "order_id": "order_D32tqGE9vgwgJq"
    }
  }
  "next": ["otp_submit", "otp_resend"]                
}
```

After the payment is completed, the final response is posted to the URL given in `callback_url` of the request.

### 1.3 Handle Payment Success and Failure

Once the payment is completed by the customer, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure** of the payment made by the customer.

#### Success Callback

If the payment made by the customer is successful, the following fields are sent:

- `razorpay_payment_id`
- `razorpay_order_id`
- `razorpay_signature`

```json: Callback Example
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

#### Failure Callback

If the payment has failed, the callback will contain details of the error. Refer to [errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#errors) for details.

### 1.4 Verify Payment Signature

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
    

### 1.5 Verify Payment Status

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
        
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

#### Test Cards

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

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v1/test-integration.md)
