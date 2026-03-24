---
title: 3DS 2 Migration Guide - Browser Flow Cards Integration
description: If you integrated with our APIs before October 15, 2022, you should make the following changes to your integration to accept card payments with the 3DS 2 protocol.
---

# 3DS 2 Migration Guide - Browser Flow Cards Integration

If you integrated with our S2S APIs before October 15, 2022, you must make the following changes to your integration to accept card payments with the 3DS 2 authentication protocol.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You must have a PCI compliance certificate to get this feature enabled on your account.
> 

## Quick Summary of Integration Changes

Ensure you make the following changes in your Create a Payment API request. There is no change in the response. 

Parameter Changes | Description
---
New Parameters | Pass these new parameters: - `authentication` and related child parameter: These determine the [authentication channel](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/build-integration/cards/migrate-3ds2.0.md#:~:text=customer%27s%20IP%20address.-,authentication,-optional) being used.
- `browser` and related child parameters:  These capture the customer's [browser details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/build-integration/cards/migrate-3ds2.0.md#:~:text=the%20authentication%20channel.-,browser,-mandatory), which are sent to the banks to aid their risk analysis.

---
Existing Parameter | The `ip` parameter is now mandatory.

#### Sample Code 

Given below is the sample code:

```curl: Curl
curl -X POST \
https://api.razorpay.com/v1/payments/create/json \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "contact": "9900008989",
  "email": "gaurav.kumar@example.com",
  "order_id": "order_DPzFe1Q1dEOKed",
  "method": "card",
  "card":{
         "number": "4386289407660153",
         "name": "Gaurav",
         "expiry_month": "11",
         "expiry_year": "2030",
         "cvv": "100"
      },
      "authentication":{
         "authentication_channel": "browser"
      },
      ### 3DS2.0 Browser Parameters###
      "browser":{
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
paymentRequest.put("contact", "9900008989");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("order_id", "order_DPzFe1Q1dEOKed");
paymentRequest.put("method", "card");

JSONObject card = new JSONObject();
card.put("number", "4386289407660153");
card.put("name", "Gaurav");
card.put("expiry_month", "11");
card.put("expiry_year", "30");
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

$api->payment->createPaymentJson(array('amount'=>100,'currency'=>'INR','contact'=>'9900008989','email'=>'gaurav.kumar@example.com','order_id'=>'order_DPzFe1Q1dEOKed','method'=>'card','card'=>array('number'=>'4386289407660153','name'=>'Gaurav','expiry_month'=>'11','expiry_year'=>'30','cvv'=>'100',),'authentication'=>array('authentication_channel'=>'browser',),'browser'=>array('java_enabled'=>false,'javascript_enabled'=>false,'timezone_offset'=>11,'color_depth'=>23,'screen_width'=>23,'screen_height'=>100,),'ip'=>'105.106.107.108','referer'=>'https://merchansite.com/example/paybill','user_agent'=>'Mozilla/5.0',));

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
        "expiry_month": "11",
        "expiry_year": "30",
        "cvv": "100"
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
        "expiry_month": "11",
        "expiry_year": "30",
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
    },
    "ip": "105.106.107.108",
    "referer": "https://merchansite.com/example/paybill",
    "user_agent": "Mozilla/5.0",
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
        "expiry_month": "11",
        "expiry_year": "30",
        "cvv": "100",
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
        "expiry_month": "11",
        "expiry_year": "30",
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
    },
    "ip": "105.106.107.108",
    "referer": "https://merchansite.com/example/paybill",
    "user_agent": "Mozilla/5.0"
}

client.payment.createPaymentJson(data)

```json: Response
{
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/authorize"
    },
    {
      "action": "otp_generate",
"url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate?track_id=FVmAtLUe9XZSGM&key_id="
    }
  ]
}
```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> - The payment request and response would remain the same for both frictionless and challenge scenarios.
> - The payment request would remain the same for redirection and native OTP flows.
> 

#### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is ₹299, then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, INR. Refer to the list of supported currencies. The length must be 3 characters.

`order_id` _mandatory_
: `string` Unique identifier of the Order generated in the first step.

`email` _mandatory_
: `string` Email address of the customer. The maximum length supported is 40 characters.

`contact` _mandatory_
: `string` Phone number of the customer. The maximum length supported is 15 characters, inclusive of country code.

`method` _mandatory_
: `string` Name of the payment method. The possible value is `card`.

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

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`referrer` _optional_
: `string` Referrer header passed by the client's browser.

`user-agent` _mandatory_
: `string` The User-Agent header of the user's browser. The default value will be passed by Razorpay if not provided by you.

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
    : `integer` Time difference between UTC time and the cardholder's browser local time. Obtained from the `getTimezoneOffset()` method applied to the `Date` object.

    `screen_width`
    : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

    `screen_height`
    : `integer` Obtained from the `navigator` HTML DOM object.

    `color_depth`
    : `integer` Obtained from the payer's browser using the `screen.colorDepth` HTML DOM property.

    `language`
    : `string` Obtained from the payer's browser using the `navigator.language` HTML DOM property. Maximum limit of 8 characters.

#### Response Parameters

If the payment request is valid, the response contains the following fields.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

`action`
: `string` An indication of the next step available to you to continue the payment process. Possible values:
  - `otp_generate`: This URL allows the customer to generate OTP and complete the payment on your webpage.
  - `redirect`: This URL redirects the customer to submit the OTP on the bank page.

`url`
: `string` URL to be used for the action indicated.

## OTP Generation 

If you would like the customer to enter the OTP on your website instead of the bank page, use the `otp_generate` URL. When this URL is triggered, you get the following response:

```curl: Curl
curl -u [YOUR_KEY_ID]
-X POST https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate
-H "Content-Type: application/json" \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

RazorpayClient razorpayclient = new RazorpayClient("key",""); // Use Only razorpay key

String paymentId = "pay_FVmAstJWfsD3SO";

Payment payment = razorpayclient.payments.otpGenerate(paymentId);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->fetch($paymentId)->otpGenerate();

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.otpGenerate();

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

#Use Only razorpay key
Razorpay.setup("key", "") 

paymentId = "pay_FVmAstJWfsD3SO";

Razorpay::Payment.otp_generate(paymentId)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

RazorpayClient instance = new RazorpayClient("key",""); // Use Only razorpay key

string paymentId = "pay_Z6t7VFTb9xHeOs";

Payment payment = client.Payment.OtpGenerate(paymentId);

```json: Response
{
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "otp_submit",
      "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_submit/ac2d415a8be7595de09a24b41661729fd9028fdc?key_id="
    },
    {
      "action": "otp_resend",
      "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_resend/json?key_id="
    }
  ],
  "metadata": {
    "issuer": "HDFC",
    "network": "MC",
    "last4": "0153",
    "iin": "438628"
  }
}
```

#### Path Parameter

`id` _mandatory_
: `string` Unique identifier of the payment.

#### Response Parameters

If the payment request is valid, the response contains the following fields.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available for payment processing. Possible values:
      - `opt_submit` - Use this URL to allow the customer to submit OTP and complete the payment on your webpage.
      - `opt_resend` - Use this URL to resend OTP to the customer.
    
    `url`
    : `string`  URL to be used for the action indicated. 

If the customer faces any latency issues, you can choose to cancel this request and redirect the customer to the bank page to enter the OTP and complete the payment. Thus, you can avoid payment failure by switching the customer to the bank page payment flow.

#### Response on Submitting OTP

Razorpay sends the respective success or failure response after the customer submits the OTP on your page.

The following endpoint submits the OTP:

payments/:id/otp/submit

```curl: Curl
curl -X POST \
'https://api.razorpay.com/v1/payments/pay_D5jmY2H6vC7Cy3/otp/submit' \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/x-www-form-urlencoded" \
-d 'otp=123456'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String paymentId = "pay_D5jmY2H6vC7Cy3";

String jsonRequest = "{\n" +
                "  \"otp\": \"123456\",\n" +
                "}";

JSONObject requestJson = new JSONObject(jsonRequest);

Payment payment = razorpayclient.payments.otpSubmit(paymentId, requestJson);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->fetch($paymentId)->otpSubmit(array('otp'=> '12345'));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.otpSubmit(paymentId,{otp:'12345'})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "otp": "123456"
}

paymentId = "pay_D5jmY2H6vC7Cy3";

Razorpay::Payment.otp_generate(paymentId, para_attr)

```csharp: .NET

RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string paymentId = "pay_Z6t7VFTb9xHeOs";

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("otp", "123456");

Payment payment = client.Payment.OtpSubmit(paymentId, paymentRequest);
```

```json: Success Response
{
  "razorpay_payment_id": "pay_D5jmY2H6vC7Cy3",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```json: Failure Response
{
  "error": {
    "code" : "BAD_REQUEST_ERROR",
    "description": "payment processing failed because of incorrect otp"
  },
  "next": ["otp_submit", "otp_resend"]
}
```

After the payment is completed, the final response is posted to the URL given in `callback_url` of the request, and can then be verified.

## Next Step

The rest of the integration steps mentioned in the [S2S JSON V2 Cards Build Integration document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/build-integration/cards.md) remain the same. No changes are required in those.

After completing the build integration steps, you can continue with [Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)
