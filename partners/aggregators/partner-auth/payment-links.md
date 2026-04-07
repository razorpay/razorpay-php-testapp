---
title: Partner Auth | Payment Links
heading: Payment Links
description: Integrate with Payment Links API using partner auth.
---

# Payment Links

Use Payment Links to receive online payments from your customers. Create Payment Links from the Dashboard or using the APIs and share them with your customers. Customers open the links, select the payment method and make the payment.

## Create a Payment Link API

Given below is the sample code for Create a Payment Link API. You should send the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. Refer to the [Payment Links API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md).

/payment_links

### Standard Payment Links

Given below are the sample codes for Standard Payment Links. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payment_links/ \
-H 'Content-type: application/json' \
-H 'X-Razorpay-Account: acc_Ef7ArAsdU5t0XL' \
-d '{
  "amount": 1000,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "expire_by": 1691097057,
  "reference_id": "TS1989",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "Gaurav Kumar",
    "contact": "+919000090000",
    "email": "gaurav.kumar@example.com"
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "notes": {
    "policy_name": "Jeevan Bima"
  },
  "callback_url": "https://example-callback-url.com/",
  "callback_method": "get"
}'

```java: Java 
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentLinkRequest = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);
paymentLinkRequest.put("amount",1000);
paymentLinkRequest.put("currency","INR");
paymentLinkRequest.put("accept_partial",true);
paymentLinkRequest.put("first_min_partial_amount",100);
paymentLinkRequest.put("expire_by",1691097057);
paymentLinkRequest.put("reference_id","TS1989");
paymentLinkRequest.put("description","Payment for policy no #23456");
JSONObject customer = new JSONObject();
customer.put("name","+919000090000");
customer.put("contact","Gaurav Kumar");
customer.put("email","gaurav.kumar@example.com");
paymentLinkRequest.put("customer",customer);
JSONObject notify = new JSONObject();
notify.put("sms",true);
notify.put("email",true);
paymentLinkRequest.put("reminder_enable",true);
JSONObject notes = new JSONObject();
notes.put("policy_name","Jeevan Bima");
paymentLinkRequest.put("notes",notes);
paymentLinkRequest.put("callback_url","https://example-callback-url.com/");
paymentLinkRequest.put("callback_method","get");
              
PaymentLink payment = razorpay.paymentLink.create(paymentLinkRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->paymentLink->create(array('amount'=>500, 'currency'=>'INR', 'accept_partial'=>true,
'first_min_partial_amount'=>100, 'description' => 'For XYZ purpose', 'customer' => array('name'=>'Gaurav Kumar',
'email' => 'gaurav.kumar@example.com', 'contact'=>'+919000090000'),  'notify'=>array('sms'=>true, 'email'=>true) ,
'reminder_enable'=>true ,'notes'=>array('policy_name'=> 'Jeevan Bima'),'callback_url' => 'https://example-callback-url.com/',
'callback_method'=>'get'));

```js: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});
instance.paymentLink.create({
  amount: 500,
  currency: "INR",
  accept_partial: true,
  first_min_partial_amount: 100,
  description: "For XYZ purpose",
  customer: {
    name: "Gaurav Kumar",
    email: "gaurav.kumar@example.com",
    contact: "+919000090000"
  },
  notify: {
    sms: true,
    email: true
  },
  reminder_enable: true,
  notes: {
    policy_name: "Jeevan Bima"
  },
  callback_url: "https://example-callback-url.com/",
  callback_method: "get"
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

para_attr = {
  "amount": 500,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "description": "For XYZ purpose",
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "+919000090000"
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "notes": {
    "policy_name": "Jeevan Bima"
  },
  "callback_url": "https://example-callback-url.com/",
  "callback_method": "get"
}

Razorpay::PaymentLink.create(para_attr.to_json)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

data := map[string]interface{}{
    "amount": 1000,
    "currency": "INR",
    "accept_partial": true,
    "first_min_partial_amount": 100,
    "expire_by": 1691097057,
    "reference_id": "TS1989",
    "description": "Payment for policy no #23456",
    "customer": map[string]interface{}{
        "name": "Gaurav Kumar",
        "contact": "+919000090000",
        "email": "gaurav.kumar@example.com",
    },
    "notify": map[string]interface{}{
        "sms": true,
        "email": true,
    },
    "reminder_enable": true,
    "notes": map[string]interface{}{
        "policy_name": "Jeevan Bima",
    },
    "callback_url": "https://example-callback-url.com/",
    "callback_method": "get",
}
body, err := client.PaymentLink.Create(data, extraHeaders)

```json: Response
{
  "accept_partial": true,
  "amount": 1000,
  "amount_paid": 0,
  "callback_method": "get",
  "callback_url": "https://example-callback-url.com/",
  "cancelled_at": 0,
  "created_at": 1591097057,
  "currency": "INR",
  "customer": {
    "contact": "+919000090000",
    "email": "gaurav.kumar@example.com",
    "name": "Gaurav Kumar"
  },
  "description": "Payment for policy no #23456",
  "expire_by": 1691097057,
  "expired_at": 0,
  "first_min_partial_amount": 100,
  "id": "plink_ExjpAUN3gVHrPJ",
  "notes": {
    "policy_name": "Jeevan Bima"
  },
  "notify": {
    "email": true,
    "sms": true
  },
  "payments": null,
  "reference_id": "TS1989",
  "reminder_enable": true,
  "reminders": [],
  "short_url": "https://rzp.io/i/nxrHnLJ",
  "status": "created",
  "updated_at": 1591097057,
  "user_id": ""
}
```

### UPI Payment Links

Given below are the sample codes for UPI Payment Links. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

```curl: Curl
curl -X POST https://api.razorpay.com/v1/payment_links/ \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'Content-type: application/json' \
-H 'X-Razorpay-Account: acc_Ef7ArAsdU5t0XL' \
-d '{
  "upi_link": "true",
  "amount": 1000,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "expire_by": 1691097057,
  "reference_id": "TS1989",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "Gaurav Kumar",
    "contact": "+919000090000",
    "email": "gaurav.kumar@example.com"
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "notes": {
    "policy_name": "Jeevan Bima"
  },
  "callback_url": "https://example-callback-url.com/",
  "callback_method": "get"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentLinkRequest = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);
paymentLinkRequest.put("upi_link",true);
paymentLinkRequest.put("amount",1000);
paymentLinkRequest.put("currency","INR");
paymentLinkRequest.put("accept_partial",true);
paymentLinkRequest.put("first_min_partial_amount",100);
paymentLinkRequest.put("description","Payment for policy no #23456");
JSONObject customer = new JSONObject();
customer.put("name","+919000090000");
customer.put("contact","Gaurav Kumar");
customer.put("email","gaurav.kumar@example.com");
paymentLinkRequest.put("customer",customer);
JSONObject notify = new JSONObject();
notify.put("sms",true);
notify.put("email",true);
paymentLinkRequest.put("reminder_enable",true);
JSONObject notes = new JSONObject();
notes.put("policy_name","Jeevan Bima");
paymentLinkRequest.put("notes",notes);

PaymentLink payment = instance.paymentLink.create(paymentLinkRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->paymentLink->create(array('upi_link'=>true,'amount'=>500, 'currency'=>'INR', 'accept_partial'=>true,
'first_min_partial_amount'=>100, 'description' => 'For XYZ purpose', 'customer' => array('name'=>'Gaurav Kumar',
'email' => 'gaurav.kumar@example.com', 'contact'=>'+919000090000'),  'notify'=>array('sms'=>true, 'email'=>true) ,
'reminder_enable'=>true ,'notes'=>array('policy_name'=> 'Jeevan Bima')));

```js: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.paymentLink.create({
  upi_link: true,
  amount: 500,
  currency: "INR",
  accept_partial: true,
  first_min_partial_amount: 100,
  description: "For XYZ purpose",
  customer: {
    name: "Gaurav Kumar",
    email: "gaurav.kumar@example.com",
    contact: "+919000090000"
  },
  notify: {
    sms: true,
    email: true
  },
  reminder_enable: true,
  notes: {
    policy_name: "Jeevan Bima"
  }
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

para_attr = {
  "upi_link": true,
  "amount": 500,
  "currency": "INR",
  "description": "For XYZ purpose",
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "+919000090000"
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "notes": {
    "policy_name": "Jeevan Bima"
  }
}

Razorpay::PaymentLink.create(para_attr.to_json)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

data := map[string]interface{}{
    "upi_link": "true",
    "amount": 1000,
    "currency": "INR",
    "accept_partial": false,
    "expire_by": 1691097057,
    "reference_id": "TS1989",
    "description": "Payment for policy no #23456",
    "customer": map[string]interface{}{
        "name": "Gaurav Kumar",
        "contact": "+919000090000",
        "email": "mudududla.sony@razorpay.com",
    },
    "notify": map[string]interface{}{
        "sms": true,
        "email": true,
    },
    "reminder_enable": true,
    "notes": map[string]interface{}{
        "policy_name": "Jeevan Bima",
    },
}
body, err := client.PaymentLink.Create(data, extraHeaders)

```json: Response
{
  "accept_partial": false,
  "amount": 1000,
  "amount_paid": 0,
  "cancelled_at": 0,
  "created_at": 1584524459,
  "currency": "INR",
  "customer": {
    "contact": "9912650835",
    "email": "gaurav.kumar@razorpay.com",
    "name": "Gaurav Kumar"
  },
  "description": "Payment for policy no #23456",
  "expire_by": 0,
  "expired_at": 0,
  "first_min_partial_amount": 0,
  "id": "plink_ETbyWrRHW2oXVt",
  "upi_link": "true",
  "notes": {
    "policy_name": "Jeevan Bima"
  },
  "payments": null,
  "reference_id": "#456",
  "reminder_enable": true,
  "reminders": [],
  "short_url": "https://rzp.io/i/AiGGmnh",
  "status": "created",
  "updated_at": null,
  "user_id": "API"
}
```

### Request Parameters

`amount` _mandatory_
: `integer` Amount to be paid using the Payment Link. Must be in the smallest unit of the currency. For example, if you want to receive a payment of , you must enter the value `30000`. In the case of three decimal currencies, such as KWD, BHD and OMR, to refund a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to refund a payment of 295, pass the value as 295.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to refund a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`currency` _optional_
: `string` A three-letter ISO code for the currency in which you want to accept the payment. For example, INR. Refer to the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

.

. For example, if an amount of  is to be received from the customer in two installments of #1 - , #2 - , then you can set this value as `500000`. Must be passed along with `accept_partial` parameter.

`upi_link` _mandatory for creating UPI Payment Link_
: `boolean` Must be set to `true` for creating UPI Payment Link. If the `upi_link` parameter is not passed or passed with value as false, a Standard Payment Link will be created. Possible values:
  - `true`: Creates a UPI Payment Link.
  - `false`: Creates a Standard Payment Link.
  

`description` _optional_
: `string` A brief description of the Payment Link. The maximum character limit supported is 2048.

`reference_id` _optional_
: `string` Reference number tagged to a Payment Link. Must be a unique number for each Payment Link. The maximum character limit supported is 40.

`customer` _optional_
: `json object` Customer details

  `name` _optional_
  : `string` The customer's name.

  `email` _optional_
  : `string` The customer's email address.

  `contact` _optional_
  : `string` The customer's phone number.

`expire_by` _optional_
: `integer` Timestamp, in Unix, at which the Payment Link will expire. By default, a Payment Link will be valid for six months from the date of creation. Please note that the expire by date cannot exceed more than six months from the date of creation.

`notify` _optional_
: `array` Defines who handles Payment Link notification.

  `sms` _optional_
  : `boolean` Defines who handles the SMS notification. Possible values:
    - `true`: Razorpay handles the notification.
    - `false`: You handle the notification.

  `email` _optional_
  : `boolean` Defines who handles the email notification. Possible values:
    - `true`: Razorpay handles the notification.
    - `false`: You handle the notification.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Payment Link for Groceries.”`.

`callback_url` _optional_
: `string` If specified, adds a redirect URL to the Payment Link. Once customers completes the payment, they are redirected to the specified URL.

   
> **INFO**
>
>  
> 
>    **Handy Tips** 
> 
>     If the `callback_url` is passed, it must be passed in the correct format. That is, it should contain a URL. 
>     
>     

`callback_method` _conditionally mandatory_
: `string` If `callback_url` parameter is passed, callback_method must be passed with the value `get`.

`reminder_enable` _optional_
: `boolean` Used to send [reminders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/reminders.md) for the Payment Link. Possible values:
    - `true`: To send reminders.
    - `false`: To disable reminders.

## Fetch all Payment Links

Given below is the sample code for Fetch all Payment Links API. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

/payment_links

```cURL: Curl
curl -u [CLIENT_ID]:[CLIENT_SECRET] \
-X GET https://api.razorpay.com/v1/payment_links \
-H "Content-Type: application/json" \
-H "X-Razorpay-Account: acc_Ef7ArAsdU5t0XL" \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);
params.put("reference_id","TS1989");
        
List paymentlink = instance.paymentLink.fetchAll(params);

```php: PHP
$api = new Api($key_id, $secret);
$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
$api->paymentLink->all($options)

```js: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.paymentLink.all()

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

Razorpay::PaymentLink.all()

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

body, err := client.PaymentLink.All(nil, extraHeaders)

```json: Response
{
  "accept_partial": false,
  "amount": 100,
  "amount_paid": 100,
  "cancelled_at": 0,
  "created_at": 1602522293,
  "currency": "INR",
  "customer": {
    "contact": "9000090000",
    "email": "gaurav.kumar@razorpay.com"
  },
  "description": "Payment for Acme Inc",
  "expire_by": 0,
  "expired_at": 0,
  "first_min_partial_amount": 0,
  "id": "plink_Fo48rl281ENAg9",
  "notes": {
    "policy_name": "Jivan Asha"
  },
  "notify": {
    "email": true,
    "sms": true
  },
  "order_id": "order_Fo491cL6NGAjkI",
  "payments": [
    {
      "amount": 100,
      "created_at": 1602522351,
      "method": "upi",
      "payment_id": "pay_Fo49sHbQ78PCMI",
      "status": "captured"
    }
  ],
  "reference_id": "TS1989",
  "reminder_enable": false,
  "reminders": [],
  "short_url": "https://rzp.io/i/XQiMe4w",
  "status": "paid",
  "updated_at": 1602522351,
  "upi_link": true,
  "user_id": "FmjfFPCOUOAcSH"
}
```

### Related Information

- [Payment Links API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md).
