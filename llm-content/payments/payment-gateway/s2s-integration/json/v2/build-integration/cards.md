---
title: 1. Build Integration for Cards (New Integration)
description: Steps to integrate S2S JSON API and accept payments using cards.
---

# 1. Build Integration for Cards (New Integration)

You can integrate with Razorpay APIs to start accepting card payments. Razorpay APIs support the latest 3DS2 authentication protocol.

> **INFO**
>
> 
> **Handy Tips**
> 
> If you are an existing Razorpay user, that is, you integrated with our S2S APIs before October 15, 2022, you need to make certain integration changes to [migrate to the 3DS2 flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/build-integration/cards/migrate-3ds2.0.md).
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> You must have a PCI compliance certificate to get this feature enabled on your account.
> 

## 3DS2 Authentication

3DS2 is an authentication protocol, the successor of 3DS1, that enables businesses and payment providers to send additional information (such as customer device or browser data) to verify the transaction's authenticity. Razorpay integration is compliant with the 3DS2 protocol. 

**Know more**: Razorpay supports [3DS2 transactions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods/cards/3ds2.0.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> - Integration does not differ for the challenge flow or frictionless flow.
> - Frictionless flow is not applicable for payments on cards issued in India.
> 

## Integration Steps

Follow the steps below to integrate S2S JSON API with browser flow and accept payments using cards.

**1.1** [Create an Order](#11-create-an-order).

**1.2** [Create a Payment](#12-create-a-payment).

**1.3** [Handle Payment Success and Error Events](#13-handle-payment-success-and-error-events).

**1.4** [Verify Payment Signature](#14-verify-payment-signature).

**1.5** [Integrate Payments Rainy Day Kit](#15-integrate-payments-rainy-day-kit).

**1.6** [Verify Payment Status](#16-verify-payment-status).

> **WARN**
>
> 
> **Watch Out!**
> 
> Do not hardcode the URL returned in the API responses.
> 

### 1.1 Create an Order

@include integration-steps/order-creation

### 1.2 Create a Payment

After the order is created, your next step is to create a payment. The following API will create a payment with `card` as the payment method. The [`browser` parameters](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/build-integration/cards#:~:text=the%20authentication%20channel.-,browser,-mandatory.md) capture the customer's browser details, which are sent to the banks to aid their risk analysis.

#### Sample Code 

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
  "callback_url": "https://webhook.site/fa184d00-53da-4257-b5e4-f98e3373b005",
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
paymentRequest.put("callback_url", "https://webhook.site/fa184d00-53da-4257-b5e4-f98e3373b005");
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
paymentRequest.Add("callback_url", "https://webhook.site/fa184d00-53da-4257-b5e4-f98e3373b005");
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

$api->payment->createPaymentJson(array('amount'=>100,'currency'=>'INR','contact'=>'9900008989','email'=>'gaurav.kumar@example.com','order_id'=>'order_DPzFe1Q1dEOKed','callback_url'=>'https://webhook.site/fa184d00-53da-4257-b5e4-f98e3373b005','method'=>'card','card'=>array('number'=>'4386289407660153','name'=>'Gaurav','expiry_month'=>'11','expiry_year'=>'30','cvv'=>'100',),'authentication'=>array('authentication_channel'=>'browser',),'browser'=>array('java_enabled'=>false,'javascript_enabled'=>false,'timezone_offset'=>11,'color_depth'=>23,'screen_width'=>23,'screen_height'=>100,),'ip'=>'105.106.107.108','referer'=>'https://merchansite.com/example/paybill','user_agent'=>'Mozilla/5.0',));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var data = {
    "amount": 100,
    "currency": "INR",
    "contact": "9900008989",
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DPzFe1Q1dEOKed",
    "callback_url": "https://webhook.site/fa184d00-53da-4257-b5e4-f98e3373b005",
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
    "callback_url": "https://webhook.site/fa184d00-53da-4257-b5e4-f98e3373b005",
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
    "callback_url": "https://webhook.site/fa184d00-53da-4257-b5e4-f98e3373b005",
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
    "callback_url": "https://webhook.site/fa184d00-53da-4257-b5e4-f98e3373b005",
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
  "razorpay_payment_id": "pay_PSix5yL6ycr4oI",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/PSix5yL6ycr4oI/authenticate"
    },
    {
      "action": "otp_generate",
      "url": "https://api.razorpay.com/v1/payments/pay_PSix5yL6ycr4oI/otp_generate?track_id=PSix5yL6ycr4oI&key_id=rzp_live_XXXXXXXXXXXXXX"
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
> The payment request and response would remain the same for both frictionless and challenge scenarios.
> 

#### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as `295`.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, INR. Refer to the list of supported currencies. The length must be 3 characters.

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

. Refer to the list of supported currencies. The length must be 3 characters.

`order_id` _mandatory_
: `string` Unique identifier of the Order generated in the first step.

`email` _mandatory_
: `string` Email address of the customer. The maximum length supported is 40 characters.

`contact` _mandatory_
: `string` Phone number of the customer. The maximum length supported is 15 characters, inclusive of country code.

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

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [Notes](@/Applications/MAMP/htdocs/new-docs/llm-content/api/understand#notes.md) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`referrer` _optional_
: `string` Referrer header passed by the client's browser.

#### Response Parameters

If the payment request is valid, the response contains the following fields.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

`action`
: `string` An indication of the next step available to you to continue the payment process. Possible values:
  - `otp_generate`: Use this URL to allow the customer to generate OTP and complete the payment on your webpage.
  - `redirect`: Use this URL to redirect the customer to submit the OTP on the bank page.

`url`
: `string` URL to be used for the action indicated.

#### OTP Generation 

If you would like the customer to enter the OTP on your website instead of the bank page, use the `otp_generate` URL. When this URL is triggered, you get the following response:

@include s2s-integration/json/cards/otp-generation

### 1.3 Handle Payment Success and Error Events

Once the payment is completed by the customer, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure**.

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

If the payment has failed, the callback will contain details of the error. Refer to [Errors](@/Applications/MAMP/htdocs/new-docs/llm-content/errors.md) for details.

### 1.4 Verify Payment Signature
Signature verification is a mandatory step to ensure that the callback is sent by Razorpay. The `razorpay_signature` contained in the callback can be regenerated by your system and verified as follows.

Create a string to be hashed using the `razorpay_payment_id` contained in the callback and the Order ID generated in the first step, separated by a `|`. Hash this string using SHA256 and your API Secret.

```
generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

if (generated_signature == razorpay_signature) {
    payment is successful
}
```

#### Generate Signature on your Server

@include s2s-integration/json/cards/generate-signature

### 1.5 Integrate Payments Rainy Day Kit

@include rainy-day/section

### 1.6 Verify Payment Status

@include integration-steps/verify-payment-status

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

Use these test cards to simulate payment errors. See the [complete list](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/test-card-details/#error-scenario-test-cards.md) of error test cards with detailed scenarios.
Check the following lists: 
- [Supported Card Networks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards.md).
- [Cards Error Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/payments/cards.md).

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)
