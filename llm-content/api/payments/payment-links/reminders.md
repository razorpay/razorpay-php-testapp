---
title: Manage Reminders for Payment Links
description: Enable or disable reminders for Payment Links using Razorpay APIs.
---

# Manage Reminders for Payment Links

## Manage Reminders for Payment Links

Use this endpoint to manage reminders for Payment Links. 

- While reminders are enabled globally from Dashboard Settings, you can disable them for specific Payment Links. A valid use case for this might be when the customer has paid the money to you offline. In this case, you would not want reminders to be sent to them.

- You can disable reminders during creation of Payment Link or by updating the link. To disable reminders for a Payment Link, pass `reminder_enable` as `false`, during [Payment Link creation](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/payment-links/#create-payment-link.md).

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
  "reference_id": "#425",
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
  "reminder_enable": false
}'

```php: PHP
$api = new Api($key_id, $secret);

$api->paymentLink->create(array('amount'=>500, 'currency'=>'INR', 'accept_partial'=>true, 'first_min_partial_amount'=>100, 'description' => 'For XYZ purpose', 'customer' => array('name'=>'', 'email' => '', 'contact'=>''),  'notify'=>array('sms'=>true, 'email'=>true) ,'reminder_enable'=>false));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.paymentLink.create({
  amount: 1000,
  currency: "INR",
  accept_partial: true,
  first_min_partial_amount: 100,
  reference_id: "#425",
  description: "Payment for policy no #23456",
  customer: {
    name: "",
    contact: "",
    email: ""
  },
  notify: {
    sms: true,
    email: true
  },
  reminder_enable: false
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment_link.create({
  "amount": 1000,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#425",
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
  "reminder_enable": false
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
      "amount": 1000,
      "currency": "INR",
      "accept_partial": true,
      "first_min_partial_amount": 100,
      "reference_id": "#425",
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
      "reminder_enable": false
    }
body, err := client.PaymentLink.Create(data, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')

para_attr = {
  "amount": 1000,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#425",
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
  "reminder_enable": false
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
paymentLinkRequest.put("amount",3400);
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
paymentLinkRequest.put("reminder_enable",false);
              
PaymentLink payment = razorpay.paymentLink.create(paymentLinkRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentLinkRequest = new Dictionary();
paymentLinkRequest.Add("amount",3400);
paymentLinkRequest.Add("currency","INR");
paymentLinkRequest.Add("accept_partial",true);
paymentLinkRequest.Add("reference_id","#aasasw8");
paymentLinkRequest.Add("first_min_partial_amount",100);
paymentLinkRequest.Add("description","Payment for policy no #23456");
Dictionary customer = new Dictionary();
customer.Add("contact","");
customer.Add("name","");
customer.Add("email","");
paymentLinkRequest.Add("customer",customer);
Dictionary notify = new Dictionary();
notify.Add("sms",true);
notify.Add("email",true);
paymentLinkRequest.Add("notify",notify);
paymentLinkRequest.Add("reminder_enable",false);
              
PaymentLink paymentlink = client.PaymentLink.Create(paymentLinkRequest);
```

### Response

### Parameters

`amount` _mandatory_
: `integer` Amount to be paid using the Payment Link. Must be in the smallest unit of the currency. For example, if you want to receive a payment of , you must enter the value `30000`.

`currency` _optional_
: `string` A three-letter ISO code for the currency in which you want to accept the payment. For example, INR. Refer to the list of [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

.

. For example, if an amount of  is to be received from the customer in two installments of #1 - , #2 - , then you can set this value as `500000`. Must be passed along with `accept_partial` parameter.

`description` _optional_
: `string` A brief description of the Payment Link. The maximum character limit supported is 2048.

`customer` _optional_
: `json object` Customer details

  `name` _optional_
  : `string` The customer's name.

  `email` _optional_
  : `string` The customer's email address.

  `contact` _optional_
  : `string` The customer's phone number.

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

`reminder_enable` _optional_
: `boolean` Used to send [reminders](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-links/reminders.md) for the Payment Link. Possible values:
    - `true`: To send reminders.
    - `false`: To disable reminders.

### Parameters

@include payment-links-v2/create-res
