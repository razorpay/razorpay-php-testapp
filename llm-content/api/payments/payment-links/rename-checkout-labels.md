---
title: Rename Labels in Checkout Section
description: Customise and rename the labels in the Checkout Section of the Payment Links payment request page using Razorpay APIs.
---

# Rename Labels in Checkout Section

## Rename Labels in Checkout Section

Use this endpoint to change the labels for the fields related to partial payments. 

- When you enable partial payments for a Payment Link, the following fields that appear in the payment request page are `Pay in full`, `Make payments in parts`, `Pay some now and the remaining later` and `Minimum first amount`.

- You can replace the labels for these fields with custom labels that are specific to your business use case. You may even display labels in a different language.

### Request

``` curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payment_links/ \
-H 'Content-type: application/json' \
-d '{
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#421",
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
  #customisation parameters start below#
  "options": {
    "checkout": {
      "partial_payment": {
        "min_amount_label": "Minimum Money to be paid",
        "partial_amount_label": "Pay in parts",
        "partial_amount_description": "Pay at least ₹100",
        "full_amount_label": "Pay the entire amount"
      }
    }
  }
}'

```php: PHP
$api = new Api($key_id, $secret);

$api->paymentLink->create(array('amount'=>500, 'currency'=>'', 'accept_partial'=>true, 'first_min_partial_amount'=>100, 'description' => 'For XYZ purpose', 'customer' => array('name'=>'', 'email' => '', 'contact'=>''),  'notify'=>array('sms'=>true, 'email'=>true) ,'reminder_enable'=>true , 'options'=>array('checkout'=>array('partial_payment'=>array('min_amount_label'=>'Minimum Money to be paid', 'partial_amount_label'=>'Pay in parts', 'partial_amount_description'=>'Pay at least ₹100', 'full_amount_label'=>'Pay the entire amount')))));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.paymentLink.create({
  amount: 1000,
  currency: "",
  accept_partial: true,
  first_min_partial_amount: 100,
  reference_id: "#412232",
  description: "Payment for policy no #23456",
  expire_by: 1599193801,
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
    hosted_page: {
      label: {
        receipt: "Ref No.",
        description: "Course Name",
        amount_payable: "Course Fee Payable",
        amount_paid: "Course Fee Paid",
        partial_amount_due: "Fee Installment Due",
        partial_amount_paid: "Fee Installment Paid",
        expire_by: "Pay Before",
        expired_on: "Link Expired. Please contact Admin",
        amount_due: "Course Fee Due"
      },
      show_preferences: {
        issued_to: false
      }
    }
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment_link.create({
  "amount": 500,
  "currency": "",
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
      "partial_payment": {
        "min_amount_label": "Minimum Money to be paid",
        "partial_amount_label": "Pay in parts",
        "partial_amount_description": "Pay at least ₹100",
        "full_amount_label": "Pay the entire amount"
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
   "reference_id": "#421",
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
         "partial_payment": map[string]interface{}{
             "min_amount_label": "Minimum Money to be paid",
             "partial_amount_label": "Pay in parts",
             "partial_amount_description": "Pay at least ₹100",
             "full_amount_label": "Pay the entire amount",
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
  "currency": "",
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
      "partial_payment": {
        "min_amount_label": "Minimum Money to be paid",
        "partial_amount_label": "Pay in parts",
        "partial_amount_description": "Pay at least ₹100",
        "full_amount_label": "Pay the entire amount"
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
notes.put("name","");

JSONObject partialPayment = new JSONObject();
partialPayment.put("min_amount_label","Minimum Money to be pai");
partialPayment.put("partial_amount_label","Pay in parts");
partialPayment.put("partial_amount_description","Pay at least ₹100");
partialPayment.put("full_amount_label","Pay the entire amount");
JSONObject checkout = new JSONObject();
checkout.put("partial_payment",partialPayment);
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

Dictionary notes = new Dictionary();
Dictionary options = new Dictionary();

notes.Add("branch", "Acme Corp Bangalore North");
notes.Add("name", "Bhairav Kumar");

Dictionary partialPayment = new Dictionary(); ;
partialPayment.Add("min_amount_label", "Minimum Money to be pai");
partialPayment.Add("partial_amount_label", "Pay in parts");
partialPayment.Add("partial_amount_description", "Pay at least ₹100");
partialPayment.Add("full_amount_label", "Pay the entire amount");
Dictionary checkout = new Dictionary();
checkout.Add("partial_payment", partialPayment);
options.Add("checkout", checkout);
paymentLinkRequest.Add("options", options);
              
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
  "created_at": 1596193199,
  "currency": "",
  "customer": {
    "contact": "",
    "email": "",
    "name": ""
  },
  "deleted_at": 0,
  "description": "Payment for policy no #23456",
  "expire_by": 0,
  "expired_at": 0,
  "first_min_partial_amount": 100,
  "id": "plink_FL4vbXVKfW7PAz",
  "notes": null,
  "notify": {
    "email": true,
    "sms": true
  },
  "payments": null,
  "reference_id": "#42321",
  "reminder_enable": true,
  "reminders": [],
  "short_url": "https://rzp.io/i/F4GC9z1",
  "source": "",
  "source_id": "",
  "status": "created",
  "updated_at": 1596193199,
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

`options` _mandatory_
: `array` Options to rename the labels for partial payment fields in the checkout form. Parent parameter under which the `checkout` and `partial_payment` child parameters must be passed.

    `checkout` _mandatory_
    : `array` The parameter for the Checkout section. `partial_payment` is its child parameter.

        `accept_partial`
        : `array` Modifies labels of fields related to partial payments.

            `min_amount_label` _optional_
            : `string` Changes the label for the `Minimum first amount` field.

            `partial_amount_label` _optional_
            : `string` Changes the label for the `Make payment in parts` field.

            `partial_amount_description` _optional_
            : `string` Changes the label for the `Pay some now and the remaining later` field.

            `full_amount_label` _optional_
            : `string` Changes the label for the `Pay in full` field.

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
