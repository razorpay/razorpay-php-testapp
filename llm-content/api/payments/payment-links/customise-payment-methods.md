---
title: Customise Payment Methods - Options and Method Parameters
description: Customise the payment methods available to customers while using Payment Links using Razorpay APIs.
---

# Customise Payment Methods - Options and Method Parameters

## Customise Payment Methods - Options and Method Parameters

Use this endpoint to enable or disable display of specific payment methods. For example, you can use the `options` and `method` parameters to display only `card` and `netbanking` methods on the Checkout.

You can use the `options` parameter to display or hide any of the payment methods:

- Card
- Netbanking
- UPI
- Wallet

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payment_links/ \
-H 'Content-type: application/json' \
-d '{
  "amount": 1000,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#523442",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "checkout": {
      "method": {
        "netbanking": true,
        "card": true,
        "upi": false,
        "wallet": false
      }
    }
  }
}'

```php: PHP
$api = new Api($key_id, $secret);

$api->paymentLink->create(array('amount'=>500, 'currency'=>'INR', 'accept_partial'=>true, 'first_min_partial_amount'=>100, 'description' => 'For XYZ purpose', 'customer' => array('name'=>'', 'email' => '', 'contact'=>''),  'notify'=>array('sms'=>true, 'email'=>true) ,'reminder_enable'=>true , 'options'=>array('checkout'=>array('method'=>array('netbanking'=> true, 'card'=> true, 'upi'=>false, 'wallet'=>false)))));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.paymentLink.create({
  amount: 500,
  currency: "INR",
  accept_partial: true,
  first_min_partial_amount: 100,
  description: "For XYZ purpose",
  customer: {
    name: "",
    email: "",
    contact: ""
  },
  notify: {
    sms: true,
    email: true
  },
  reminder_enable: true,
  options: {
    checkout: {
      method: {
        netbanking: true,
        card: true,
        upi: false,
        wallet: false
      }
    }
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment_link.create({
  "amount": 500,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "description": "For XYZ purpose",
  "customer": {
    "name": "",
    "email": "",
    "contact": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "checkout": {
      "method": {
        "netbanking": True,
        "card": True,
        "upi": False,
        "wallet": False
      }
    }
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 1000,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#523442",
  "description": "Payment for policy no #23456",
  "customer": map[string]interface{}{
    "name": "",
    "contact": "",
    "email": "",
  },
  "notify": map[string]interface{}{
    "sms": true,
    "email": true,
  },
  "reminder_enable": true,
  "options": map[string]interface{}{
    "checkout": map[string]interface{}{
      "method": map[string]interface{}{
        "netbanking": true,
        "card": true,
        "upi": false,
        "wallet": false,
      },
    },
  },
}
body, err := client.PaymentLink.Create(data, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')

para_attr = {
  "amount": 500,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "description": "For XYZ purpose",
  "customer": {
    "name": "",
    "email": "",
    "contact": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "checkout": {
      "method": {
        "netbanking": 1,
        "card": 1,
        "upi": 0,
        "wallet": 0
      }
    }
  }
}

Razorpay.headers = {"Content-type" => "application/json"}

Razorpay::PaymentLink.create(para_attr.to_json)

```java: Java
import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
JSONObject paymentLinkRequest = new JSONObject();
paymentLinkRequest.put("amount",1000);
paymentLinkRequest.put("currency","INR");
paymentLinkRequest.put("accept_partial",true);
paymentLinkRequest.put("reference_id","#aasasw8");
paymentLinkRequest.put("first_min_partial_amount",100);
paymentLinkRequest.put("description","Payment for policy no #23456");
JSONObject customer = new JSONObject();
customer.put("name","");
customer.put("contact","");
customer.put("email","");
paymentLinkRequest.put("customer",customer);
JSONObject notify = new JSONObject();
notify.put("sms",true);
notify.put("email",true);
paymentLinkRequest.put("notify",notify);
paymentLinkRequest.put("reminder_enable",true);

JSONObject options = new JSONObject();
JSONObject notes = new JSONObject();
notes.put("branch","Acme Corp Bangalore North");
notes.put("name","Bhairav Kumar");

JSONObject method = new JSONObject();
method.put("netbanking", true);
method.put("card", true);
method.put("upi", true);
method.put("wallet", true);
JSONObject checkout = new JSONObject();
checkout.put("method",method);
options.put("checkout",checkout);
paymentLinkRequest.put("options",options);
              
PaymentLink payment = razorpay.paymentLink.create(paymentLinkRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentLinkRequest = new Dictionary();
paymentLinkRequest.Add("amount", 1000);
paymentLinkRequest.Add("currency", "INR");
paymentLinkRequest.Add("accept_partial", true);
paymentLinkRequest.Add("reference_id", "#aasasw8");
paymentLinkRequest.Add("first_min_partial_amount", 100);
paymentLinkRequest.Add("description", "Payment for policy no #23456");
Dictionary customer = new Dictionary();
customer.Add("contact", "");
customer.Add("name", "");
customer.Add("email", "");
paymentLinkRequest.Add("customer", customer);
Dictionary notify = new Dictionary();
notify.Add("sms", true);
notify.Add("email", true);
paymentLinkRequest.Add("notify", notify);
paymentLinkRequest.Add("reminder_enable", true);

Dictionary options = new Dictionary();
Dictionary notes = new Dictionary();
notes.Add("branch", "Acme Corp Bangalore North");
notes.Add("name", "Bhairav Kumar");

Dictionary method = new Dictionary();
method.Add("netbanking", true);
method.Add("card", true);
method.Add("upi", true);
method.Add("wallet", true);

Dictionary checkout = new Dictionary();
checkout.Add("prefill", prefill);
options.Add("checkout", checkout);
paymentLinkRequest.Add("options", options);
              
PaymentLink paymentlink = client.PaymentLink.Create(paymentLinkRequest);
```

### Response

### Parameters

@include payment-links-v2/create-req

`options` _mandatory_
: `array` Options to display or hide payment methods on the Checkout section. Parent parameter under which the `checkout` and `method` child parameters must be passed.

    `checkout` _mandatory_
    : `array` The parameter for the Checkout section. `method` is its child parameter.

        `method` _mandatory_
        : `array` Using this parameter, you can control the display of payment methods on the Checkout section. Possible values of the payment methods are:
        - `netbanking`
        - `upi`
        - `card`
        - `wallet`
        
            `netbanking`
            : `boolean` Used to enable or disable `netbanking` as a payment method on the Checkout section. Possible values are:
              - `true` (default): Displays netbanking on the Checkout.
              - `false`: Hides netbanking on the Checkout.

            `upi`
            : `boolean` Used to enable or disable `UPI` as a payment method on the Checkout section. Possible values are:
              - `true` (default): Displays UPI on the Checkout.
              - `false`: Hides UPI on the Checkout.

            `card` _optional_
            : `boolean` Used to enable or disable `card` as a payment method on the Checkout section. Possible values are:
              - `true` (default): Displays card on the Checkout.
              - `false`: Hides card on the Checkout.

            `wallet` _optional_
            : `boolean` Used to enable or disable `wallet` as a payment method on the Checkout section. Possible values are:
              - `true` (default): Displays wallet on the Checkout.
              - `false`: Hides wallet on the Checkout.

### Parameters

@include payment-links-v2/create-res

### Errors

The api \{key/secret\} provided is invalid
* code: 4xx
* description: There is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure that: - The API Keys are active and entered correctly.
- There are no white-spaces before or after the keys.

The \{input field\} is required
* code: 4xx
* description: A mandatory field is empty.
* solution: Ensure all mandatory fields and values are present.

wrong input fields sent.
* code: 400
* description: When wrong input fields are sent during Payment Link creation.
* solution: Ensure that the input fields are added correctly. Refer to these [request parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md#request-parameters) on how to add correct input fields.

payment link creation with reference ID already attempted
* code: 400
* description: An existing reference id has been passed.
* solution: Ensure that a unique reference id is used for all Payment Links.

timestamp must be atleast 15 minutes in future
* code: 400
* description: The epoch time passed is less than 15 minutes from the current time.
* solution: The `close_by` time should be more than 15 minutes from the current time.

Invalid access: Cannot create a payment link in live mode, as live mode is disabled for merchant.
* code: 400
* description: Occurs when you try to create a Payment Link in Live mode, but live mode is disabled for you
* solution: Raise a request to our [support team](https://razorpay.com/support/) to get live mode enabled for you.

Invalid access: Cannot create a payment link, as Merchant is Suspended.
* code: 400
* description: Occurs when you try to create a Payment Link when you have been been suspended.
* solution: Raise a request to our [support team](https://razorpay.com/support/) to be reinstated.

value: the length must not be greater than 255.
* code: 400
* description: When the notes length is greater than 255 characters during Payment Link creation.
* solution: Please create a payment link with notes values less than 255 characters.
