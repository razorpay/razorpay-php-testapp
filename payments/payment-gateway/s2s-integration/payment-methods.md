---
title: Payment Methods
description: Check the various payment methods you can configure at the checkout by integrating with Razorpay APIs.
---

# Payment Methods

You can accept payments through several payment methods such as netbanking, debit cards, credit cards, wallets and UPI. However, you can configure payment methods of your choice for collecting payments from your customers.

Check the [payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/methods-api.md) activated for your account.

### Check the API Endpoint

On this page, we have listed the sample codes with the S2S JSON V2 API. If you are using the Redirect API version, use the API endpoint as suggested below:

API Version | Endpoint
---
Redirect | https://api.razorpay.com/v1/payments/create/redirect
---
JSON V1 and V2 | https://api.razorpay.com/v1/payments/create/json

#### Supported Payment Fields

Understand the fields required to construct a payment request:

`key_id` _mandatory_
: `string` The key id that you have generated from the **API Keys** tab in the Dashboard.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, `INR`. Refer to the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

`order_id` _mandatory_
: `string` Unique identifier of the Order.
 Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`ip` _mandatory_
: `string` Customer's IP address.

`email` _mandatory_
: `string` Email address of the customer. Maximum length supported is 40 characters. 

`contact` _mandatory_
: `string`  Phone number of the customer. Maximum length supported is 15 characters, inclusive of country code. 

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
    : `integer` Time difference between UTC time and the cardholder's browser local time. Obtained from the `getTimezoneOffset()` method applied to the `Date` object.

    `screen_width`
    : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

    `screen_height`
    : `integer` Obtained from the `navigator` HTML DOM object.

    `color_depth`
    : `integer` Obtained from the payer's browser using the `screen.colorDepth` HTML DOM property.

    `language`
    : `string` Obtained from the payer's browser using the `navigator.language` HTML DOM property. Maximum limit of 8 characters.

`method` _mandatory_
: `string` Name of the payment method. Possible values are: 
    - `card` 
    - `netbanking`
    - `wallet`
    - `emi`
    - `upi`
    - `cardless_emi`
    - `paylater`

`card`
:  `object` Details associated with the card. Required if the payment method is `card`.

    `number` _mandatory_
    : `string` Unformatted card number. Required if the method is `card`.

    `name` _mandatory_
    : `string` Name of the cardholder. Required if the method is `card`.

    `expiry_month` _mandatory_
    : `integer` Expiry month for card in `MM` format. Required if the method is `card`.

    `expiry_year` _mandatory_
    : `string` Expiry year for card in `YY` format. Required if the method is `card`.

    `cvv` _mandatory_
    : `string` CVV printed on the back of card. Required if the method is `card`.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>      - CVV is not required by default for tokenised cards across all networks.
>      - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>      - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>      - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>      - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.      
>     

`bank`
: `string` Bank code of the bank used for the payment. Required if the method is `netbanking`.

`bank_account`
: The details of the bank account that should be passed in the request. Required if the method is `emandate`.

    `account_number` _mandatory_
    : `string` Bank account number used to initiate the payment.

    `ifsc` _mandatory_
    : `string` IFSC of the bank used to initiate the payment.

    `name` _mandatory_
    : `string` Name associated with the bank account used to initiate the payment.

`emi_duration`
: `string` The EMI duration in months. Required if the method is `emi`.

`vpa`
: `string` Virtual payment address of the customer. Required if the method is `upi`.

`wallet`
: `string` Wallet code for the wallet used for the payment. Required if the method is `wallet`.

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`referrer` _optional_
: `string` Referrer header passed by the client's browser.

`user_agent` _optional_
: `string` Customer user-agent.

Sample payloads for each of the payment methods are shown below in the JSON format.

## Debit and Credit Cards

Given below is the sample code for card payments:

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
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
    "browser": {
    	"java_enabled": false,
    	"javascript_enabled": false,
    	"timezone_offset": 11,
    	"color_depth": 23,
    	"screen_width": 23,
    	"screen_height": 100
    }
    // Note: The authentication and browser parameters are applicable for 3DS 2 transactions
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

Payment payment = client.Payment.CreateJsonPayment(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createPaymentJson(array('amount'=>100,'currency'=>'INR','contact'=>'9900008989','email'=>'gaurav.kumar@example.com','order_id'=>'order_DPzFe1Q1dEOKed','method'=>'card','card'=>array('number'=>'4386289407660153','name'=>'Gaurav','expiry_month'=>11,'expiry_year'=>30,'cvv'=>100,),'authentication'=>array('authentication_channel'=>'browser',),'browser'=>array('java_enabled'=>false,'javascript_enabled'=>false,'timezone_offset'=>11,'color_depth'=>23,'screen_width'=>23,'screen_height'=>100,)));

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
    }
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
    }
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
    }
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
        "screen_width": 

```json: Response
{
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/LdDXnHYxjDwQ1b/authenticate?rearch=1"
    },
    {
      "action": "otp_generate",
      "url": "https://api.razorpay.com/pg_router/v1/payments/pay_LdDXnHYxjDwQ1b/otp_generate?key_id=rzp_live_XXXXXXXXXXXXXX"
    }
  ],
  "razorpay_payment_id": "pay_LdDXnHYxjDwQ1b"
}
```

#### Supported Card Networks
List of supported card networks:
- Visa
- Mastercard
- American Express
- Bajaj
- Maestro
- Rupay
- Diners

## Netbanking

Given below is the sample code for netbanking payments. Pass the value for the `bank` parameter as shown below:

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json
-H "Content-Type: application/json" \
-d '{
	"amount": 200000,
	"currency": "INR",
	"contact": "9000090000",
	"email": "gaurav.kumar@example.com",
	"order_id": "order_DPzFe1Q1dEObDT",
	"method": "netbanking",
	"bank": "HDFC"
}'

```java: Java
import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;
RazorpayClient instance = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", "100");
paymentRequest.put("currency", "INR");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "9000090000");
paymentRequest.put("order_id", "order_EAkbvXiCJlwhHR");
paymentRequest.put("method", "netbanking");
paymentRequest.put("bank", "HDFC");

Payment payment = instance.payments.createJsonPayment(paymentRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", "100");
paymentRequest.Add("currency", "INR");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9000090000");
paymentRequest.Add("order_id", "order_EAkbvXiCJlwhHR");
paymentRequest.Add("method", "netbanking");
paymentRequest.Add("bank", "HDFC");

Payment payment = client.Payment.CreateJsonPayment(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createPaymentJson(array(
    'amount' => '100',
    'currency' => 'INR',
    'email' => 'gaurav.kumar@example.com',
    'contact' => '9000090000',
    'order_id' => 'order_EAkbvXiCJlwhHR',
    'method' => 'netbanking',
    'bank' => 'HDFC',
));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var data = {
    "amount": "100",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "netbanking",
    "bank": "HDFC"
};

instance.payments.createPaymentJson(data);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

data = {
    "amount": "100",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "netbanking",
    "bank": "HDFC"
}

client.payment.createPaymentJson(data)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
    "amount": "100",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "netbanking",
    "bank": "HDFC"
}

Razorpay::Payment.create_json_payment(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
    "amount": "100",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "netbanking",
    "bank": "HDFC",
}

body, err := client.Payment.CreatePaymentJson(para_attr, nil)

```json: Response
{
  "razorpay_payment_id": "pay_LH5u4G73PdHG6s",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/LH5u4G73PdHG6s/authenticate"
    }
  ]
}
```

#### Supported Banks

Fetch the supported bank codes using the [Methods API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/methods-api.md).

## EMI

Given below is the sample code for EMI payments. Pass the card details along with these parameters:
- `method`
- `emi_duration`

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
-d '{
	"amount": 200000,
	"currency": "INR",
	"contact": "9000090000",
	"email": "gaurav.kumar@example.com",
	"order_id": "order_DPzFe1Q1dEObeD",
	"method": "emi",
	"emi_duration": 9,
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
    }
    // Note: The authentication and browser parameters are applicable for 3DS 2 transactions
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
paymentRequest.put("contact", "9900008989");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("order_id", "order_DPzFe1Q1dEOKed");
paymentRequest.put("method", "emi");
paymentRequest.put("emi_duration", 9);

JSONObject card = new JSONObject();
card.put("number", "4386289407660153");
card.put("name", "Gaurav");
card.put("expiry_month", "11");
card.put("expiry_year", "2030");
card.put("cvv", "100");
paymentRequest.put("card", card);

JSONObject authentication = new JSONObject();
authentication.put("authentication_channel", "browser");
paymentRequest.put("authentication", authentication);

JSONObject browser = new JSONObject();
browser.put("java_enabled", false);
browser.put("javascript_enabled", false);
browser.put("timezone_offset", 11);
browser.put("color_depth", 23);
browser.put("screen_width", 

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", 100);
paymentRequest.Add("currency", "INR");
paymentRequest.Add("contact", "9900008989");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("order_id", "order_DPzFe1Q1dEOKed");
paymentRequest.Add("method", "emi");
paymentRequest.Add("emi_duration", 9);

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

$api->payment->createPaymentJson(array('amount'=>200000,'currency'=>'INR','contact'=>'9000090000','email'=>'gaurav.kumar@example.com','order_id'=>'order_DPzFe1Q1dEObeD','method'=>'emi','emi_duration'=>9,'card'=>array('number'=>'4386289407660153','name'=>'Gaurav','expiry_month'=>11,'expiry_year'=>30,'cvv'=>100,),'authentication'=>array('authentication_channel'=>'browser',),'browser'=>array('java_enabled'=>false,'javascript_enabled'=>false,'timezone_offset'=>11,'color_depth'=>23,'screen_width'=>23,'screen_height'=>100,),));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var data = {
    "amount": 200000,
    "currency": "INR",
    "contact": "9000090000",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEObeD",
    "method": "emi",
    "emi_duration": 9,
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
    }
};

instance.payments.createPaymentJson(data);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
    "amount": 200000,
    "currency": "INR",
    "contact": "9000090000",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEObeD",
    "method": "emi",
    "emi_duration": 9,
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
    }
}

Razorpay::Payment.create_json_payment(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data = {
    "amount": 100,
    "currency": "INR",
    "contact": "9900008989",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEOKed",
    "method": "emi",
    "emi_duration": 9,
    "card": {
        "number": "4386289407660153",
        "name": "Gaurav",
        "expiry_month": "11",
        "expiry_year": "2030",
        "cvv": "100"
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
    }
}

client.payment.createPaymentJson(data)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

data = {
    "amount": 200000,
    "currency": "INR",
    "contact": "9000090000",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEObeD",
    "method": "emi",
    "emi_duration": 9,
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
    }
}

client.payment.createPaymentJson(data)

```json: Response
{
  "razorpay_payment_id": "pay_LH60wSfk9n0H3U",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/LH60wSfk9n0H3U/authenticate"
    },
    {
      "action": "otp_generate",
      "url": "https://api.razorpay.com/v1/payments/pay_LH60wSfk9n0H3U/otp_generate?track_id=LH60wSfk9n0H3U&key_id=rzp_test_XXXXXXXXXXXXXX"
    }
  ]
}
```

### EMI Plans 

- Fetch the available EMI plans (for each supported bank) by invoking the [Methods API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/methods-api.md). Extract the EMI plans from the response to be shown to your customers while making the payment.
- Know more about EMI plans offered by [OneCard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/emi/one-card.md) and [HSBC](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/emi/hsbc.md).

## Cardless EMI

Given below is the sample code for Cardless EMI payments.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Contact our [Support Team](https://razorpay.com/support/#request) to get the Cardless EMI payment method enabled for your account.
> - Customers should have accounts with the Cardless EMI payment partner.
> 
> 

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json
-H "Content-Type: application/json" \
-d '{
	"amount": 200000,
	"currency": "INR",
	"contact": "9000090000",
	"email": "gaurav.kumar@example.com",
	"order_id": "order_DPzFe1Q1dEOboB",
	"method": "cardless_emi",
	"provider": "zestmoney"
}'

```java: Java
import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;

RazorpayClient instance = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 200000);
paymentRequest.put("currency", "INR");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "9000090000");
paymentRequest.put("order_id", "order_EAkbvXiCJlwhHR");
paymentRequest.put("method", "cardless_emi");
paymentRequest.put("bank", "zestmoney");

Payment payment = instance.payments.createJsonPayment(paymentRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", "100");
paymentRequest.Add("currency", "INR");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9000090000");
paymentRequest.Add("order_id", "order_EAkbvXiCJlwhHR");
paymentRequest.Add("method", "cardless_emi");
paymentRequest.Add("bank", "zestmoney");

Payment payment = client.Payment.CreateJsonPayment(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createPaymentJson(array(
    'amount' => '200000',
    'currency' => 'INR',
    'email' => 'gaurav.kumar@example.com',
    'contact' => '9000090000',
    'order_id' => 'order_EAkbvXiCJlwhHR',
    'method' => 'cardless_emi',
    'bank' => 'zestmoney',
));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var data = {
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "cardless_emi",
    "bank": "zestmoney"
};

instance.payments.createPaymentJson(data);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

data = {
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "cardless_emi",
    "bank": "zestmoney"
}

client.payment.createPaymentJson(data)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "cardless_emi",
    "bank": "zestmoney"
}

Razorpay::Payment.create_json_payment(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "cardless_emi",
    "bank": "zestmoney",
}

body, err := client.Payment.CreatePaymentJson(para_attr, nil)

```json: Response
{
  "razorpay_payment_id": "pay_LH62CGnxazBBkn",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/LH62CGnxazBBkn/authenticate"
    }
  ]
}
```

#### Supported Providers

List of supported Cardless EMI providers:

Banks | Provider Code | Minimum Order Amount
---
ICICI Bank | `icic` | ₹7000 
---
IDFC Bank | `idfb` | ₹5000
---
HDFC Bank | `hdfc` | ₹5000
---
Kotak Bank| `kkbk` | ₹3000
---
axio | `walnut369` | ₹900 
---
Fibe | `earlysalary` | ₹3000  
---
ZestMoney | `zestmoney` | ₹3000

## Wallet

Given below is the sample code for wallet payments. Pass the wallet provider name as shown:

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json
-H "Content-Type: application/json" \
-d '{
	"amount": 200000,
	"currency": "INR",
	"contact": "9000090000",
	"email": "gaurav.kumar@example.com",
	"order_id": "order_DPzFe1Q1dEObDU",
	"method": "wallet",
	"wallet": "payzapp"
}'

```java: Java
import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;
RazorpayClient instance = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 200000);
paymentRequest.put("currency", "INR");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "9000090000");
paymentRequest.put("order_id", "order_EAkbvXiCJlwhHR");
paymentRequest.put("method", "wallet");
paymentRequest.put("bank", "payzapp");

Payment payment = instance.payments.createJsonPayment(paymentRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", "200000");
paymentRequest.Add("currency", "INR");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9000090000");
paymentRequest.Add("order_id", "order_EAkbvXiCJlwhHR");
paymentRequest.Add("method", "wallet");
paymentRequest.Add("bank", "payzapp");

Payment payment = client.Payment.CreateJsonPayment(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createPaymentJson(array(
    'amount' => '200000',
    'currency' => 'INR',
    'email' => 'gaurav.kumar@example.com',
    'contact' => '9000090000',
    'order_id' => 'order_EAkbvXiCJlwhHR',
    'method' => 'wallet',
    'bank' => 'payzapp',
));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var data = {
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "wallet",
    "bank": "payzapp"
};

instance.payments.createPaymentJson(data);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

data = {
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "wallet",
    "bank": "payzapp"
}

client.payment.createPaymentJson(data)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "wallet",
    "bank": "payzapp"
}

Razorpay::Payment.create_json_payment(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "wallet",
    "bank": "payzapp",
}

body, err := client.Payment.CreatePaymentJson(para_attr, nil)

```json: Response
{
  "razorpay_payment_id": "pay_LH66fCVePbPIN3",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/LH66fCVePbPIN3/authenticate"
    }
  ]
}
```

#### Supported Wallets

The table below lists the various wallets available to you. Some of them are available by default, while others require approval from us. Raise a request with our [Support Team](https://razorpay.com/support/#request) to enable such wallets.

Wallet Provider | Availability | Wallet Code
---
PayZapp | Requires [approval](https://razorpay.com/support) | `payzapp`
---
Airtel Money | ✓ | `airtelmoney`
---
MobiKwik | ✓ | `mobikwik`
---
JioMoney | ✓ | `jiomoney`
---
Ola Money | ✓ | `olamoney`
---
Bajaj Pay | Requires [approval](https://razorpay.com/support) | `bajajpay` 
---
PhonePe | Requires [approval](https://razorpay.com/support) | `phonepe`
---
[PhonePe Switch](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch.md) | **For businesses registered with PhonePe Switch only** | `phonepeswitch`
---
[PayPal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/paypal.md) | **International Payments Only**.
Requires [approval](https://razorpay.com/support) | `paypal`
---
[Amazon Pay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/amazon-pay.md)| Requires [approval](https://razorpay.com/support) | `amazonpay`

.

Wallet Provider | Wallet Code | Availability
---
PayZapp | `payzapp` | Requires approval (Reach out to support team)
---
Airtel Money | `airtelmoney` | ✓
---
MobiKwik | `mobikwik` | ✓
---
JioMoney| `jiomoney` | ✓ 
---
Ola Money | `olamoney` | ✓
---
PhonePe | `phonepe` | Requires approval (Reach out to support team)
---
[PhonePe Switch](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch.md) | `phonepeswitch` | **For businesses registered with PhonePe Switch only**
---
[PayPal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/paypal.md) | `paypal` | **International Payments Only**
Requires approval (Reach out to support team)
---
[Amazon Pay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/amazon-pay.md) | `amazonpay` | Requires approval (Reach out to support team)

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> [Integrate your PayPal account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/paypal.md#integration-steps) with Razorpay Checkout to accept payments in international currencies.
> 
> You can accept payments based on the transaction limit of your PayPal account.
> 
> 

## UPI

Know about [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md) and [UPI Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi.md).

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
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md).
> 

## Pay Later

Given below is the sample code for Pay Later payments.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Contact our [Support Team](https://razorpay.com/support/#request) to get this payment method enabled for your account.
> - Customers should have accounts with the Pay Later service providers.
> 

Once the order is created and the customer's payment details are obtained, the information should be sent to Razorpay to complete the payment. You can do this by invoking `createPayment` and passing `method=paylater` and `provider=`.

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
	"amount": 200000,
	"currency": "INR",
	"contact": "9000090000",
	"email": "gaurav.kumar@example.com",
	"order_id": "order_DPzFe1Q1dEObDv",
	"method": "paylater",
	"provider": ""
}'

```java: Java
import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;
RazorpayClient instance = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 200000);
paymentRequest.put("currency", "INR");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "9000090000");
paymentRequest.put("order_id", "order_EAkbvXiCJlwhHR");
paymentRequest.put("method", "paylater");
paymentRequest.put("provider", "");

Payment payment = instance.payments.createJsonPayment(paymentRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", "200000");
paymentRequest.Add("currency", "INR");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9000090000");
paymentRequest.Add("order_id", "order_EAkbvXiCJlwhHR");
paymentRequest.Add("method", "paylater");
paymentRequest.Add("provider", "");

Payment payment = client.Payment.CreateJsonPayment(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createPaymentJson(array(
    'amount' => '200000',
    'currency' => 'INR',
    'email' => 'gaurav.kumar@example.com',
    'contact' => '9000090000',
    'order_id' => 'order_EAkbvXiCJlwhHR',
    'method' => 'paylater',
    'provider' => ''
));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var data = {
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "paylater",
    "provider": ""
};

instance.payments.createPaymentJson(data);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

data = {
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "paylater",
    "provider": ""
}

client.payment.createPaymentJson(data)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = data = {
  "amount": "200000",
  "currency": "INR",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "order_id": "order_EAkbvXiCJlwhHR",
  "method": "paylater",
  "provider": ""
}

Razorpay::Payment.create_json_payment(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
    "amount": "200000",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_EAkbvXiCJlwhHR",
    "method": "paylater",
    "provider": "",
}

body, err := client.Payment.CreatePaymentJson(para_attr, nil)

```json: Response
{
  "razorpay_payment_id": "pay_LH691g8owT4PUh",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/LH691g8owT4PUh/authenticate"
    }
  ]
}
```

#### Supported Providers

Provider | Provider Code | Availability | Minimum Transaction | Maximum Transaction
---
LazyPay | `lazypay` | [Requires Approval](https://razorpay.com/support/#request)  | ₹1 | ₹10,000
---
PayPal | `paypal` | [Requires Approval](https://razorpay.com/support/#request)  | ₹100 | Based on the customer's approved limit.

## CRED

Your customers can pay via a combination of CRED Coins and Credit Cards saved on CRED.

To add CRED Pay as a payment method, you need to:
- Pass the `app_offer` parameter in Orders API.
- Pass the `method` and `provider` parameters in Create Payments API.

#### Pass app_offer Parameter in Order

You must create an order using Orders API. In the response, you obtain an `order_id` which you must pass to Checkout.

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

order = Razorpay::Order.create amount: 1000, currency: 'INR', receipt: 'receipt#1', app_offer: true

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
: `integer` The transaction amount, expressed in the currency sub-unit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Default is `INR`.

`app_offer` _optional_
: `boolean` Allow/disallow customers from using CRED coins to make payments. This is used to prevent double discounting scenarios where customers have already availed discounts using voucher/coupon and you do not want them to redeem Coins as well. Possible values:
    - `true`: Customer not allowed to use CRED coins to make payment.
    - `false` (default): Customer can use CRED coins to make payment.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Pass method and provider Parameters in Create Payments API

```curl: Create Payment
curl -X POST https://api.razorpay.com/v1/payments/create/json \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type: application/json'
-d '{
  "amount": 1000,
  "currency": "INR",
  "contact": 9900988990,
  "email": "gaurav.kumar@example.com",
  "order_id": "order_4xbQrmEoA5WJ0G",
  "method": "app",
  "provider": "cred",
  "app_present": "false"
}'
```json: Response
{
  "razorpay_payment_id": "pay_xxxx",
  "next": [
    {
      "action": "poll",
      "url": "https://api.razorpay.com/v1/payments/pay_xxx/status"
    }
  ]
}
```

#### Request Parameters

Along with the other Create Payment API request parameters, you must pass:

`method` _mandatory_
: `string` The method used to make the payment. Here, it must be `app`.

`provider` _mandatory if method=app_
: `string` Name of the PSP app. Here, it must be `cred`. 

`app_present` _mandatory if app=cred_
: `boolean` Sets the payment flow as collect. Possible values:
    - `true`: Opens CRED app on customer's device.
    - `false` (default): Sends a push notification to customer's device.

## Emandate

You can accept recurring payments from your customers using `emandate`, `card` or `upi` as the method. Know more about [Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments.md).

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> 
> 

 to get this feature activated on your account.

### Workflow

1. [Create a customer.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#create-a-customer)
2. Create an Order with method as `emandate`, `nach` or `upi`.
3. Collect authorisation transaction.
   - Using custom checkout
   - Using an authorization link
4. Verify Tokens.
5. Charge subsequent payments.

Know more about steps 2,3,4 and 5 in [Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments.md).

#### Sample Checkout Code to Collect Authorisation Transaction

```curl: Emandate (Netbanking)
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
   "amount":0,
   "currency":"INR",
   "contact":"9000090000",
   "email":"gaurav.kumar@example.com",
   "order_id":"order_EAbtuXPh24LrEc",
   "customer_id":"cust_E9penp7VGhT5yt",
   "recurring":"1",
   "method":"emandate",
   "bank":"HDFC",
   "auth_type":"netbanking",
   "bank_account":{
      "name":"Gaurav Kumar",
      "account_number":"1121431121541121",
      "account_type":"savings",
      "ifsc":"HDFC0000001"
   }
}'
```curl: Emandate (Debit Card)
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
   "amount":0,
   "currency":"INR",
   "contact":"9000090000",
   "email":"gaurav.kumar@example.com",
   "order_id":"order_EAbtuXPh24LrEc",
   "customer_id":"cust_E9penp7VGhT5yt",
   "recurring":"1",
   "method":"emandate",
   "bank":"HDFC",
   "auth_type":"debitcard",
   "bank_account":{
      "name":"Gaurav Kumar",
      "account_number":"1121431121541121",
      "account_type":"savings",
      "ifsc":"HDFC0000001"
   }
}'
```curl: Emandate (Aadhaar)
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
   "amount":0,
   "currency":"INR",
   "contact":"9000090000",
   "email":"gaurav.kumar@example.com",
   "order_id":"order_EAbtuXPh24LrEc",
   "customer_id":"cust_E9penp7VGhT5yt",
   "recurring":"1",
   "method":"emandate",
   "bank":"HDFC",
   "auth_type":"aadhaar",
   "bank_account":{
      "name":"Gaurav Kumar",
      "account_number":"1121431121541121",
      "account_type":"savings",
      "ifsc":"HDFC0000001"
   }
}'
```curl: Cards
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
	"amount": "100",
	"currency": "INR",
	"contact":"9000090000",
   	"email":"gaurav.kumar@example.com",
	"order_id": "order_EAeQWl3JYERSly",
	"customer_id":"cust_Cg3pRMEIgetEDe",
	"recurring":"1",
	"method": "card",
   	"card": {
    	"number": "4047458064386281",
    	"cvv": "123",
    	"expiry_month": "01",
    	"expiry_year": "30",
    	"name": "Gaurav Kumar"
    }
}'
```curl: UPI
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
	"amount": "100",
	"currency": "INR",
   "contact":"9000090000",
   "email":"gaurav.kumar@example.com",
	"order_id": "order_EAeQWl3JYERSly",
	"customer_id":"cust_Cg3pRMEIgetEDe",
	"recurring":"1",
	"method": "upi",
   "flow": "collect”,
​    "upi" : {
      "vpa": "gaurav.kumar@exampleupi" //Payer VPA in case of collect request
   }
}'
```

### Upload NACH File Using API

The current way to collect the NACH form is via Razorpay:

* Checkout
* Merchant Dashboard
* Hosted Checkout page, where a customer signs and uploads the form via Checkout while attempting authorisation transaction.

You can upload the signed NACH forms that you have collected from your customers using the NACH file API. Razorpay OCR-enabled NACH engine submits the form to NPCI. on successful verification and you will receive a success/failure response.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> 
> 

 to get this feature activated on your account.

Follow these steps to register a NACH mandate via S2S Image Transfer:

1. Create a Customer
2. Create an Order
3. Upload the NACH file via API
4. Fetch Token
5. Create Subsequent Payments

Know more about steps 2,3,4 and 5 in [Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments.md).

#### Sample Server Request and Responses

```Curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST 'https://api.razorpay.com/v1/payments/create/nach/file' \
-H "Content-Type: multipart/form-data" \
-F 'order_id=order_FoLdZrq6QGKUWg' \
-F 'file=@/Users/your_name/sample_uploaded.jpeg' // file path
```json: Successful Response
{
  "razorpay_payment_id": "pay_FjDn43bvssCqEM",
  "razorpay_order_id": "order_FjDdQ6a0GluJ2c",
  "razorpay_signature": "f13775ea8a91e9bf229b9fdba3ad783f7ff2bdbce1c35e87a69ae7418808da04"
}
```json: Error Response
{
"error": {
  "code": "BAD_REQUEST_ERROR",
  "description": "file size exceeds limit",
  "field": null,
  "source": "customer",
  "step": "form_upload",
  "reason": "file size exceeds limit",
  "metadata": {
    "payment_id": null,
    "order_id": "order_DBJKIP31Y4jl8"
    }
  }
}
```

.

Wallet Provider | Wallet Code | Availability
---
PayZapp | `payzapp` | Requires approval (Reach out to support team)
---
Airtel Money | `airtelmoney` | ✓
---
MobiKwik | `mobikwik` | ✓
---
JioMoney| `jiomoney` | ✓ 
---
Ola Money | `olamoney` | ✓
---
PhonePe | `phonepe` | Requires approval (Reach out to support team)
---
[PhonePe Switch](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch.md) | `phonepeswitch` | **For businesses registered with PhonePe Switch only**
---
[PayPal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/paypal.md) | `paypal` | **International Payments Only**
Requires approval (Reach out to support team)
---
[Amazon Pay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/amazon-pay.md) | `amazonpay` | Requires approval (Reach out to support team)

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> [Integrate your PayPal account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/paypal.md#integration-steps) with Razorpay Checkout to accept payments in international currencies.
> 
> You can accept payments based on the transaction limit of your PayPal account.
> 
> 

## UPI

Know about [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md) and [UPI Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi.md).

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
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md).
> 

## Pay Later

Given below is the sample code for Pay Later payments.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Contact our [Support Team](https://razorpay.com/support/#request) to get this payment method enabled for your account.
> - Customers should have accounts with the Pay Later service providers.
> 

Once the order is created and the customer's payment details are obtained, the information should be sent to Razorpay to complete the payment. You can do this by invoking `createPayment` and passing `method=paylater` and `provider=`.

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
	"amount": 200000,
	"currency": "INR",
	"contact": "9000090000",
	"email": "gaurav.kumar@example.com",
	"order_id": "order_DPzFe1Q1dEObDv",
	"method": "paylater",
	"provider": ""
}'
```json: Response
{
  "razorpay_payment_id": "pay_LH691g8owT4PUh",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/LH691g8owT4PUh/authenticate"
    }
  ]
}
```

#### Supported Providers

Provider | Provider Code | Availability | Minimum Transaction | Maximum Transaction
---
LazyPay | `lazypay` | [Requires Approval](https://razorpay.com/support/#request)  | ₹1 | ₹10,000
---
PayPal | `paypal` | [Requires Approval](https://razorpay.com/support/#request)  | ₹100 | Based on the customer's approved limit.

## CRED

Your customers can pay via a combination of CRED Coins and Credit Cards saved on CRED.

To add CRED Pay as a payment method, you need to:
- Pass the `app_offer` parameter in Orders API.
- Pass the `method` and `provider` parameters in Create Payments API.

#### Pass app_offer Parameter in Order

You must create an order using Orders API. In the response, you obtain an `order_id` which you must pass to Checkout.

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

order = Razorpay::Order.create amount: 1000, currency: 'INR', receipt: 'receipt#1', app_offer: true

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
: `integer` The transaction amount, expressed in the currency sub-unit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Default is `INR`.

`app_offer` _optional_
: `boolean` Allow/disallow customers from using CRED coins to make payments. This is used to prevent double discounting scenarios where customers have already availed discounts using voucher/coupon and you do not want them to redeem Coins as well. Possible values:
    - `true`: Customer not allowed to use CRED coins to make payment.
    - `false` (default): Customer can use CRED coins to make payment.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Pass method and provider Parameters in Create Payments API

```curl: Create Payment
curl -X POST https://api.razorpay.com/v1/payments/create/json \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type: application/json'
-d '{
  "amount": 1000,
  "currency": "INR",
  "contact": 9900988990,
  "email": "gaurav.kumar@example.com",
  "order_id": "order_4xbQrmEoA5WJ0G",
  "method": "app",
  "provider": "cred",
  "app_present": "false"
}'
```json: Response
{
  "razorpay_payment_id": "pay_xxxx",
  "next": [
    {
      "action": "poll",
      "url": "https://api.razorpay.com/v1/payments/pay_xxx/status"
    }
  ]
}
```

#### Request Parameters

Along with the other Create Payment API request parameters, you must pass:

`method` _mandatory_
: `string` The method used to make the payment. Here, it must be `app`.

`provider` _mandatory if method=app_
: `string` Name of the PSP app. Here, it must be `cred`. 

`app_present` _mandatory if app=cred_
: `boolean` Sets the payment flow as collect. Possible values:
    - `true`: Opens CRED app on customer's device.
    - `false` (default): Sends a push notification to customer's device.

## Emandate

You can accept recurring payments from your customers using `emandate`, `card` or `upi` as the method. Know more about [Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments.md).

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> 
> 

 to get this feature activated on your account.

### Workflow

1. [Create a customer.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#create-a-customer)
2. Create an Order with method as `emandate`, `nach` or `upi`.
3. Collect authorisation transaction.
   - Using custom checkout
   - Using an authorization link
4. Verify Tokens.
5. Charge subsequent payments.

Know more about steps 2,3,4 and 5 in [Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments.md).

#### Sample Checkout Code to Collect Authorisation Transaction

```curl: Emandate (Netbanking)
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
   "amount":0,
   "currency":"INR",
   "contact":"9000090000",
   "email":"gaurav.kumar@example.com",
   "order_id":"order_EAbtuXPh24LrEc",
   "customer_id":"cust_E9penp7VGhT5yt",
   "recurring":"1",
   "method":"emandate",
   "bank":"HDFC",
   "auth_type":"netbanking",
   "bank_account":{
      "name":"Gaurav Kumar",
      "account_number":"1121431121541121",
      "account_type":"savings",
      "ifsc":"HDFC0000001"
   }
}'
```curl: Emandate (Debit Card)
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
   "amount":0,
   "currency":"INR",
   "contact":"9000090000",
   "email":"gaurav.kumar@example.com",
   "order_id":"order_EAbtuXPh24LrEc",
   "customer_id":"cust_E9penp7VGhT5yt",
   "recurring":"1",
   "method":"emandate",
   "bank":"HDFC",
   "auth_type":"debitcard",
   "bank_account":{
      "name":"Gaurav Kumar",
      "account_number":"1121431121541121",
      "account_type":"savings",
      "ifsc":"HDFC0000001"
   }
}'
```curl: Emandate (Aadhaar)
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
   "amount":0,
   "currency":"INR",
   "contact":"9000090000",
   "email":"gaurav.kumar@example.com",
   "order_id":"order_EAbtuXPh24LrEc",
   "customer_id":"cust_E9penp7VGhT5yt",
   "recurring":"1",
   "method":"emandate",
   "bank":"HDFC",
   "auth_type":"aadhaar",
   "bank_account":{
      "name":"Gaurav Kumar",
      "account_number":"1121431121541121",
      "account_type":"savings",
      "ifsc":"HDFC0000001"
   }
}'
```curl: Cards
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
	"amount": "100",
	"currency": "INR",
	"contact":"9000090000",
   	"email":"gaurav.kumar@example.com",
	"order_id": "order_EAeQWl3JYERSly",
	"customer_id":"cust_Cg3pRMEIgetEDe",
	"recurring":"1",
	"method": "card",
   	"card": {
    	"number": "4047458064386281",
    	"cvv": "123",
    	"expiry_month": "01",
    	"expiry_year": "30",
    	"name": "Gaurav Kumar"
    }
}'
```curl: UPI
curl -X POST \
https://api.razorpay.com/v1/payments/create/redirect \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
	"amount": "100",
	"currency": "INR",
   "contact":"9000090000",
   "email":"gaurav.kumar@example.com",
	"order_id": "order_EAeQWl3JYERSly",
	"customer_id":"cust_Cg3pRMEIgetEDe",
	"recurring":"1",
	"method": "upi",
   "flow": "collect”,
​    "upi" : {
      "vpa": "gaurav.kumar@exampleupi" //Payer VPA in case of collect request
   }
}'
```

### Upload NACH File Using API

The current way to collect the NACH form is via Razorpay:

* Checkout
* Merchant Dashboard
* Hosted Checkout page, where a customer signs and uploads the form via Checkout while attempting authorisation transaction.

You can upload the signed NACH forms that you have collected from your customers using the NACH file API. Razorpay OCR-enabled NACH engine submits the form to NPCI. on successful verification and you will receive a success/failure response.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> 
> 

 to get this feature activated on your account.

Follow these steps to register a NACH mandate via S2S Image Transfer:

1. Create a Customer
2. Create an Order
3. Upload the NACH file via API
4. Fetch Token
5. Create Subsequent Payments

Know more about steps 2,3,4 and 5 in [Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments.md).

#### Sample Server Request and Responses

```Curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST 'https://api.razorpay.com/v1/payments/create/nach/file' \
-H "Content-Type: multipart/form-data" \
-F 'order_id=order_FoLdZrq6QGKUWg' \
-F 'file=@/Users/your_name/sample_uploaded.jpeg' // file path
```json: Successful Response
{
  "razorpay_payment_id": "pay_FjDn43bvssCqEM",
  "razorpay_order_id": "order_FjDdQ6a0GluJ2c",
  "razorpay_signature": "f13775ea8a91e9bf229b9fdba3ad783f7ff2bdbce1c35e87a69ae7418808da04"
}
```json: Error Response
{
"error": {
  "code": "BAD_REQUEST_ERROR",
  "description": "file size exceeds limit",
  "field": null,
  "source": "customer",
  "step": "form_upload",
  "reason": "file size exceeds limit",
  "metadata": {
    "payment_id": null,
    "order_id": "order_DBJKIP31Y4jl8"
    }
  }
}
```

.

Wallet Provider | Wallet Code | Availability
---
PayZapp | `payzapp` | Requires approval (Reach out to support team)
---
Airtel Money | `airtelmoney` | ✓
---
MobiKwik | `mobikwik` | ✓
---
JioMoney| `jiomoney` | ✓ 
---
Ola Money | `olamoney` | ✓
---
PhonePe | `phonepe` | Requires approval (Reach out to support team)
---
[PhonePe Switch](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch.md) | `phonepeswitch` | **For businesses registered with PhonePe Switch only**
---
[PayPal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/paypal.md) | `paypal` | **International Payments Only**
Requires approval (Reach out to support team)
---
[Amazon Pay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/amazon-pay.md) | `amazonpay` | Requires approval (Reach out to support team)

#### Acceptable Image Formats and Sizes

The acceptable image formats and sizes are:

- .jpeg
- .jpg
- .png
- Maximum accepted size is 6 MB.

#### Error Reasons

Know about [errors under Recurring Payments FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/paper-nach/faqs.md#14-what-are-the-errors-i-get-while).
