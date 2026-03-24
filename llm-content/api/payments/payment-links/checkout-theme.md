---
title: API | Payment Links - Checkout Theme
heading: Implement Thematic Changes in Payment Links Checkout Section
description: Customise the Checkout UI in the Payment Links payment request page using Razorpay APIs. Hide the top bar and prevent customers from choosing a different payment method.
---

# Implement Thematic Changes in Payment Links Checkout Section

## Implement Thematic Changes in Payment Links Checkout Section

Use this endpoint to modify the top bar theme element of the Checkout UI on the payment request page. This restricts customers from navigating to the initial screen of Checkout and selecting a different payment method.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payment_links/ \
-H 'Content-type: application/json' \
-d '{
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#423212",
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
      "theme": {
        "hide_topbar": true
      }
    }
  }
}'

```php: PHP
$api = new Api($key_id, $secret);

$api->paymentLink->create(array('amount'=>500, 'currency'=>'', 'accept_partial'=>true, 'first_min_partial_amount'=>100, 'description' => 'For XYZ purpose', 'customer' => array('name'=>'', 'email' => '', 'contact'=>''),  'notify'=>array('sms'=>true, 'email'=>true) ,'reminder_enable'=>true , 'options'=>array('checkout'=>array('theme'=>array('hide_topbar'=>'true')))));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.paymentLink.create({
  amount: 1000,
  currency: "",
  accept_partial: true,
  first_min_partial_amount: 100,
  reference_id: "#423212",
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
  reminder_enable: true,
  options: {
    checkout: {
      theme: {
        hide_topbar: true
      }
    }
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment_link.create({
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#423212",
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
      "theme": {
        "hide_topbar": true
      }
    }
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#423212",
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
      "theme": map[string]interface{}{
        "hide_topbar": true,
      },
    },
  },
}
body, err := client.PaymentLink.Create(data, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')

para_attr = {
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#423212",
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
      "theme": {
        "hide_topbar": true
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
paymentLinkRequest.put("currency","");
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

JSONObject theme = new JSONObject();
theme.put("hide_topbar",true);
JSONObject checkout = new JSONObject();
checkout.put("theme",theme);
options.put("checkout",checkout);
paymentLinkRequest.put("options",options);
              
PaymentLink payment = razorpay.paymentLink.create(paymentLinkRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentLinkRequest = new Dictionary();
paymentLinkRequest.Add("amount", 1000);
paymentLinkRequest.Add("currency", "");
paymentLinkRequest.Add("accept_partial", true);
paymentLinkRequest.Add("reference_id", "#aasasw8");
paymentLinkRequest.Add("first_min_partial_amount", 100);
paymentLinkRequest.Add("description", "Payment for policy no #23456");
Dictionary customer = new Dictionary();
customer.Add("contact", "+919999999999");
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

Dictionary theme = new Dictionary();
theme.Add("hide_topbar",true);
Dictionary checkout = new Dictionary();
checkout.Add("theme",theme);
options.Add("checkout",checkout);
paymentLinkRequest.Add("options",options);
              
PaymentLink paymentlink = client.PaymentLink.Create(paymentLinkRequest);
```

### Response

```json: Success
{
  "accept_partial": true,
  "amount": 1000,
  "amount_paid": 0,
  "callback_method": "",
  "callback_url": "",
  "cancelled_at": 0,
  "created_at": 1596187814,
  "currency": "",
  "customer": {
    "contact": "",
    "email": "",
    "name": ""
  },
  "description": "Payment for policy no #23456",
  "expire_by": 0,
  "expired_at": 0,
  "first_min_partial_amount": 100,
  "id": "plink_FL3Oncr7XxXFf6",
  "notes": null,
  "notify": {
    "email": true,
    "sms": true
  },
  "payments": null,
  "reference_id": "#423212",
  "reminder_enable": true,
  "reminders": [],
  "short_url": "https://rzp.io/i/j45EmLE",
  "source": "",
  "source_id": "",
  "status": "created",
  "updated_at": 1596187814,
  "user_id": ""
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The api key provided is invalid",
    "source": "NA",
    "step": "NA",
    "reason": "NA",
    "metadata": {}
  }
}
```

### Parameters

@include payment-links-v2/create-req

`options`
: `array` Options to show or hide the top bar. Parent parameter under which the `checkout` and `theme` child parameters must be passed.

    `checkout` _mandatory_
    : `array` The parameter for the Checkout section.

        `theme`
        : `array` Modifies the thematic elements of Checkout.

            `hide_topbar` _mandatory_
            : `boolean` Used to display or hide the top bar on the Checkout. This bar shows the selected payment method, phone number and gives the customer the option to navigate to the initial Checkout screen and change the payment method. Possible values are:
              - `true`: Hides the top bar.
              - `false` (default): Displays the top bar.

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
* solution: Ensure that the input fields are added correctly. Refer to these [request parameters](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/payment-links#request-parameters.md) on how to add correct input fields.

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
* description: Occurs when you try to create a Payment Link when you have been suspended.
* solution: Raise a request to our [support team](https://razorpay.com/support/) to be reinstated.

value: the length must not be greater than 255.
* code: 400
* description: When the notes length is greater than 255 characters during Payment Link creation.
* solution: Please create a payment link with notes values less than 255 characters.
