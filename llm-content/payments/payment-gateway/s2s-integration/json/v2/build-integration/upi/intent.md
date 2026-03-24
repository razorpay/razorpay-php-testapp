---
title: 1. Build Integration for UPI Intent
description: Steps to integrate S2S JSON API and accept payments using UPI Intent
---

# 1. Build Integration for UPI Intent

In case of UPI intent flow as there is no redirect involved when the customer completes the payment, you will have to poll the Razorpay APIs to get the latest status of the payment.

## Intent Flow Integration

Follow the steps below to integrate S2S JSON API and accept payments using UPI Intent Flow.

**1.1** [Create an Order](#11-create-an-order)

**1.2** [Create a Payment](#12-create-a-payment)

**1.3** [Handle Payment Success and Error Events](#13-handle-payment-success-and-error-events)

**1.4** [Verify Payment Signature](#14-verify-payment-signature)

**1.5** [Integrate Payments Rainy Day Kit](#15-integrate-payments-rainy-day-kit)

**1.6** [Verify Payment Status](#16-verify-payment-status)

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

Once an order is created, your next step is to create a payment. The following API will create a `upi` payment with `intent` flow:

/payments/create/json

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "order_id": "order_Ky7DOsYy3TVfLS",
  "email": "gaurav.kumar@example.com",
  "contact": "9090909090",
  "method": "upi",
  "upi":{
      "flow":"intent"
  },
  "ip": "192.168.0.103",
  "referer": "http",
  "user_agent": "Mozilla/5.0",
  "description": "Test payment",
  "notes": {
    "note_key": "value1"
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 500);
paymentRequest.put("currency", "INR");
paymentRequest.put("order_id", "order_JZluwjknyWdhnU");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "9123456789");
paymentRequest.put("method", "upi");
paymentRequest.put("ip", "192.168.0.103");
paymentRequest.put("referer", "http");
paymentRequest.put("user_agent", "Mozilla/5.0");
paymentRequest.put("description", "Test flow");
JSONObject notes = new JSONObject();
notes.put("purpose", "UPI test payment");
JSONObject upi = new JSONObject();
upi.put("flow", "intent");
paymentRequest.put("notes", notes);
paymentRequest.put("upi", upi);

Payment payment = instance.payments.createUpi(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createUpi(array("amount" => 200,"currency" => "INR","order_id" => "order_Jhgp4wIVHQrg5H","email" => "gaurav.kumar@example.com","contact" => "9123456789","method" => "upi","customer_id" => "cust_EIW4T2etiweBmG","ip" => "192.168.0.103","referer" => "http","user_agent" => "Mozilla/5.0","description" => "Test flow","notes" => array("note_key" => "value1"),"upi" => array("flow" => "intent")));

```nodejs: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createUpi({
    "amount": 100,
    "currency": "INR",
    "order_id": "order_Ee0biRtLOqzRjP",
    "email": "gaurav.kumar@example.com",
    "contact": "9090909090",
    "method": "upi",
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": {
        "purpose": "UPI test payment"
    },
    "upi": {
        "flow": "intent"
    }
});

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")
para_attr: = map[string] interface {} {
    "amount": 100,
    "currency": "INR",
    "order_id": "order_Ee0biRtLOqzRjP",
    "email": "gaurav.kumar@example.com",
    "contact": "9090909090",
    "method": "upi",
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": map[string] interface {} {
            "purpose": "UPI test payment",
        },
        "upi": map[string] interface {} {
            "flow": "intent",
        },
}
body, err: = client.Payment.CreateUpi(para_attr, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')
para_attr = {
  "amount": 100,
  "currency": "INR",
  "order_id": "order_Ee0biRtLOqzRjP",
  "email": "gaurav.kumar@example.com",
  "contact": "9090909090",
  "method": "upi",
  "ip": "192.168.0.103",
  "referer": "http",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": {
    "purpose": "UPI test payment"
  },
  "upi": {
    "flow": "intent"
  }
}

Razorpay::Payment.create_upi(para_attr)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))
client.payment.createUpi(
    {
        "amount": 100,
        "currency": "INR",
        "order_id": "order_Ee0biRtLOqzRjP",
        "email": "gaurav.kumar@example.com",
        "contact": "9090909090",
        "method": "upi",
        "ip": "192.168.0.103",
        "referer": "http",
        "user_agent": "Mozilla/5.0",
        "description": "Test flow",
        "notes": {"purpose": "UPI test payment"},
        "upi": {
            "flow": "intent"
            
        },
    }
)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount",500);
paymentRequest.Add("currency","INR");
paymentRequest.Add("order_id", "order_Z6t7VFTb9xHeOs");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9000090000");
paymentRequest.Add("method", "upi");
paymentRequest.Add("ip", "192.168.0.103");
paymentRequest.Add("referer", "http");
paymentRequest.Add("user_agent", "Mozilla/5.0");
paymentRequest.Add("description", "Test flow");
Dictionary notes = new Dictionary();
notes.Add("purpose","UPI test payment");
Dictionary upi = new Dictionary();
upi.Add("flow","intent");
paymentRequest.Add("notes",notes);
paymentRequest.Add("upi",upi);

Payment payment = client.Payment.CreateUpi(paymentRequest);

```json: Response
{
  "razorpay_payment_id": "pay_ERNEungCtXpZqM",
  "next": [
    {
      "action": "intent",
      "url": "upi://pay?pa=upi@razopay&pn=acme&tr=QTeEWVyigzIBlUD&tn=razorpay&am=100&cu=INR&mc=5411"
    },
    {
      "action": "poll",
      "url": "https://api.razorpay.com/v1/payments/pay_ERNEungCtXpZqM"
    }
  ]
}
```

The `next` array contains the following objects:

`action`
: `string` In this case the value is `intent`.

`url`
: `string` Contains the URL that the customer should be redirected to a mobile app. This is commonly done by rendering the URL returned by Razorpay in the form of a button or a link for the customer to use.

`action`
: `string` The action that you need to take to fetch the status of the payment. In this case the value is `poll`.

`url`
: `string` Contains the URL that you must poll to fetch the status of the payment, either `authorized` or `failed`.

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

If the payment has failed, the callback will contain details of the error. Refer to [Errors](@/Applications/MAMP/htdocs/new-docs/llm-content/api/#errors.md) for details.

## 1.4 Verify Payment Signature
Signature verification is a mandatory step to ensure that the callback is sent by Razorpay. The `razorpay_signature` contained in the callback can be regenerated by your system and verified as follows.

Create a string to be hashed using the `razorpay_payment_id` contained in the callback and the Order ID generated in the first step, separated by a `|`. Hash this string using SHA256 and your API Secret.

```
generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

if (generated_signature == razorpay_signature) {
    payment is successful
}
```

#### Generate Signature on your Server

```java: Java
/**
* This class defines common routines for generating
* authentication signatures for Razorpay Webhook requests.
*/
public class Signature
{
    private static final String HMAC_SHA256_ALGORITHM = "HmacSHA256";
    /**
    * Computes RFC 2104-compliant HMAC signature.
    * * @param data
    * The data to be signed.
    * @param key
    * The signing key.
    * @return
    * The Base64-encoded RFC 2104-compliant HMAC signature.
    * @throws
    * java.security.SignatureException when signature generation fails
    */
    public static String calculateRFC2104HMAC(String data, String secret)
    throws java.security.SignatureException
    {
        String result;
        try {

            // get an hmac_sha256 key from the raw secret bytes
            SecretKeySpec signingKey = new SecretKeySpec(secret.getBytes(), HMAC_SHA256_ALGORITHM);

            // get an hmac_sha256 Mac instance and initialize with the signing key
            Mac mac = Mac.getInstance(HMAC_SHA256_ALGORITHM);
            mac.init(signingKey);

            // compute the hmac on input data bytes
            byte[] rawHmac = mac.doFinal(data.getBytes());

            // base64-encode the hmac
            result = DatatypeConverter.printHexBinary(rawHmac).toLowerCase();

        } catch (Exception e) {
            throw new SignatureException("Failed to generate HMAC : " + e.getMessage());
        }
        return result;
    }
}
```php: PHP
use Razorpay\Api\Api;
$api = new Api($key_id, $key_secret);
$attributes  = array('razorpay_signature'  => '23233',  'razorpay_payment_id'  => '332' ,  'order_id' => '12122');
$order  = $api->utility->verifyPaymentSignature($attributes)
```ruby: Ruby
require 'razorpay'
Razorpay.setup('key_id', 'key_secret')
payment_response = {
  'order_id': '12122',
  'razorpay_payment_id': '332',
  'razorpay_signature': '23233'
}

Razorpay::Utility.verify_payment_signature(payment_response)
```python: Python
import razorpay

client = razorpay.Client(auth = ('[key_id]', '[key_secret]'))
params_dict = {
    'order_id': '12122',
    'razorpay_payment_id': '332',
    'razorpay_signature': '23233'
}
client.utility.verify_payment_signature(params_dict)
```

### 1.5 Integrate Payments Rainy Day Kit

@include rainy-day/section

### 1.6 Verify Payment Status

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)
