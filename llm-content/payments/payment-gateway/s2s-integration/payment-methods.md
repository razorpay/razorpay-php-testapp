---
title: Payment Methods
description: Check the various payment methods you can configure at the checkout by integrating with Razorpay APIs.
---

# Payment Methods

You can accept payments through several payment methods such as netbanking, debit cards, credit cards, wallets and UPI. However, you can configure payment methods of your choice for collecting payments from your customers.

Check the [payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/methods-api.md) activated for your account.

### Check the API Endpoint

On this page, we have listed the sample codes with the S2S JSON V2 API. If you are using the Redirect API version, use the API endpoint as suggested below:

API Version | Endpoint
---
Redirect | https://api.razorpay.com/v1/payments/create/redirect
---
JSON V1 and V2 | https://api.razorpay.com/v1/payments/create/json

#### Supported Payment Fields

Understand the fields required to construct a payment request:

@include s2s-integration/request-params

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

Fetch the supported bank codes using the [Methods API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/methods-api.md).

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

- Fetch the available EMI plans (for each supported bank) by invoking the [Methods API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/methods-api.md). Extract the EMI plans from the response to be shown to your customers while making the payment.
- Know more about EMI plans offered by [OneCard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/emi/one-card.md) and [HSBC](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/emi/hsbc.md).

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

@include payment-methods/supported-wallets

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> [Integrate your PayPal account](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/paypal#integration-steps.md) with Razorpay Checkout to accept payments in international currencies.
> 
> You can accept payments based on the transaction limit of your PayPal account.
> 
> 

## UPI

Know about [UPI Intent](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi/intent.md) and [UPI Collect](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/upi.md).

@include payment-methods/upi-collect-deprecated/s2s

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

@include payment-methods/paylater/providers

## CRED

Your customers can pay via a combination of CRED Coins and Credit Cards saved on CRED.

@include payment-methods/cred/s2s

## Emandate

You can accept recurring payments from your customers using `emandate`, `card` or `upi` as the method. Know more about [Recurring Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments.md).

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

### Workflow

1. [Create a customer.](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers/#create-a-customer.md)
2. Create an Order with method as `emandate`, `nach` or `upi`.
3. Collect authorisation transaction.
   - Using custom checkout
   - Using an authorization link
4. Verify Tokens.
5. Charge subsequent payments.

Know more about steps 2,3,4 and 5 in [Recurring Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments.md).

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
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

Follow these steps to register a NACH mandate via S2S Image Transfer:

1. Create a Customer
2. Create an Order
3. Upload the NACH file via API
4. Fetch Token
5. Create Subsequent Payments

Know more about steps 2,3,4 and 5 in [Recurring Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments.md).

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

 to get this feature activated on your account.

### Workflow

1. [Create a customer.](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers/#create-a-customer.md)
2. Create an Order with method as `emandate`, `nach` or `upi`.
3. Collect authorisation transaction.
   - Using custom checkout
   - Using an authorization link
4. Verify Tokens.
5. Charge subsequent payments.

Know more about steps 2,3,4 and 5 in [Recurring Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments.md).

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
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

Follow these steps to register a NACH mandate via S2S Image Transfer:

1. Create a Customer
2. Create an Order
3. Upload the NACH file via API
4. Fetch Token
5. Create Subsequent Payments

Know more about steps 2,3,4 and 5 in [Recurring Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments.md).

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

#### Acceptable Image Formats and Sizes

The acceptable image formats and sizes are:

- .jpeg
- .jpg
- .png
- Maximum accepted size is 6 MB.

#### Error Reasons

Know about [errors under Recurring Payments FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/paper-nach/faqs/#14-what-are-the-errors-i-get-while.md).
