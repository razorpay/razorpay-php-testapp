---
title: 1. Build Integration for UPI Intent
description: Steps to integrate S2S JSON V1 and accept payments using UPI Intent.
---

# 1. Build Integration for UPI Intent

In case of UPI as there is no redirect involved when the customer completes the payment, you should keep polling Razorpay APIs to get the latest status of the payment.

## Intent Flow Integration

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

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the Orders API. It is a server-side API call.
- The order_id received in the response should be passed to the checkout. 

#### Sample Code

@include integration-steps/order-creation

### 1.2 Create a Payment

Once an order is created, your next step is to create a payment. 

#### Sample Code

The following API will create a payment with `upi` with `intent` flow.

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
: `string` The action you need to perform next. In this case, the value is `intent`.

`url`
: `string` Contains the URL that the customer should be redirected. This is commonly done by rendering the URL returned by Razorpay in the form of a button or a link for the customer to use.

`action`
: `string` The action that you need to take to fetch the status of the payment. In this case the value is `poll`.

`url`
: `string` Contains the URL that you need to keep polling to fetch the status of the payment, either `authorized` or `failed`.

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

@include integration-steps/verify-signature

### 1.5 Verify Payment Status

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v1/test-integration.md)
