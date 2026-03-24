---
title: API | Payment Links - Offers
heading: Offers on Payment Links
description: Provide offers to customers using Payment Links APIs.
---

# Offers on Payment Links

## Offers on Payment Links

Use this endpoint to provide offers on Payment Links. Razorpay Offers provides discounts or cashback on Payment Links issued to customers. You can restrict the payment methods on which the Offers are applied and limit their usage to a defined time period.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you do not enable partial payments on Payment Links on which offer is being applied.
> 

Know more about how to show [Offers Payment Links](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-links/offers.md) via the Dashboard.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payment_links
-H 'content-type: application/json'
-d '{
 "amount": 3400,
 "currency": "INR",
 "accept_partial": false,
 "reference_id": "#425",
 "description": "Payment for policy no #23456",
 "customer": {
   "name": "Gaurav Kumar",
   "contact": "+919000090000",
   "email": "gaurav.kumar@example.com"
 },
 "notify": {
   "sms": true,
   "email": true
 },
 "reminder_enable": false,
 "options": {
   "order": {
     "offers": [
       "offer_F4WMTC3pwFKnzq",
       "offer_F4WJHqvGzw8dWF"
     ]
   }
 }
}'

```php: PHP
$api = new Api($key_id, $secret);

$api->paymentLink->create(array('amount'=>20000, 'currency'=>'INR', 'accept_partial'=>false, 'description' => 'For XYZ purpose', 'customer' => array('name'=>'Gaurav Kumar', 'email' => 'gaurav.kumar@example.com', 'contact'=>'+919000090000'),  'notify'=>array('sms'=>true, 'email'=>true) ,'reminder_enable'=>false , 'options'=>array('order'=>array('offers'=>array('offer_I0PqexIiTmMRnA'))));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.paymentLink.create({
 "amount": 3400,
 "currency": "INR",
 "accept_partial": false,
 "reference_id": "#425",
 "description": "Payment for policy no #23456",
 "customer": {
   "name": "Gaurav Kumar",
   "contact": "+919000090000",
   "email": "gaurav.kumar@example.com"
 },
 "notify": {
   "sms": true,
   "email": true
 },
 "reminder_enable": false,
 "options": {
   "order": {
     "offers": [
       "offer_F4WMTC3pwFKnzq",
       "offer_F4WJHqvGzw8dWF"
     ]
   }
 }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment_link.create({
 "amount": 3400,
 "currency": "INR",
 "accept_partial": false,
 "reference_id": "#425",
 "description": "Payment for policy no #23456",
 "customer": {
   "name": "Gaurav Kumar",
   "contact": "+919000090000",
   "email": "gaurav.kumar@example.com"
 },
 "notify": {
   "sms": true,
   "email": true
 },
 "reminder_enable": false,
 "options": {
   "order": {
     "offers": [
       "offer_F4WMTC3pwFKnzq",
       "offer_F4WJHqvGzw8dWF"
     ]
   }
 }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
    "amount": 3400,
    "currency": "INR",
    "accept_partial": false,
    "reference_id": "#425",
    "description": "Payment for policy no #23456",
    "customer": map[string]interface{}{
      "name": "Gaurav Kumar",
      "contact": "+919000090000",
      "email": "gaurav.kumar@example.com",
    },
    "notify": map[string]interface{}{
      "sms": true,
      "email": true,
    },
    "reminder_enable": false,
    "options": map[string]interface{}{
      "order": map[string]interface{}{
        "offers": []string{
          "offer_JGQvQtvJmVDRIA",
        },
      },
    },
  }
body, err := client.PaymentLink.Create(data, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')

para_attr = {
 "amount": 3400,
 "currency": "INR",
 "accept_partial": false,
 "reference_id": "#425",
 "description": "Payment for policy no #23456",
 "customer": {
   "name": "Gaurav Kumar",
   "contact": "+919000090000",
   "email": "gaurav.kumar@example.com"
 },
 "notify": {
   "sms": true,
   "email": true
 },
 "reminder_enable": false,
 "options": {
   "order": {
     "offers": [
       "offer_F4WMTC3pwFKnzq",
       "offer_F4WJHqvGzw8dWF"
     ]
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
paymentLinkRequest.put("amount",3400);
paymentLinkRequest.put("currency","INR");
paymentLinkRequest.put("accept_partial",false);
paymentLinkRequest.put("reference_id","#aasasw8");
paymentLinkRequest.put("description","Payment for policy no #23456");
JSONObject customer = new JSONObject();
customer.put("name","+919000090000");
customer.put("contact","Gaurav Kumar");
customer.put("email","gaurav.kumar@example.com");
paymentLinkRequest.put("customer",customer);
JSONObject notify = new JSONObject();
notify.put("sms",true);
notify.put("email",true);
paymentLinkRequest.put("notify",notify);
paymentLinkRequest.put("reminder_enable",false);
JSONObject options = new JSONObject();
JSONObject transferRequest = new JSONObject();
List transfers = new ArrayList<>();
List offerParams = new ArrayList<>();
offerParams.add("offer_JTUADI4ZWBGWur");
offerParams.add("offer_F4WJHqvGzw8dWF");
JSONObject order = new JSONObject();
order.put("offers",offerParams);
options.put("order",order);
paymentLinkRequest.put("options",options);
            
PaymentLink payment = razorpay.paymentLink.create(paymentLinkRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentLinkRequest = new Dictionary();
paymentLinkRequest.Add("amount", 3400);
paymentLinkRequest.Add("currency", "INR");
paymentLinkRequest.Add("accept_partial", false);
paymentLinkRequest.Add("reference_id", "#aasasw8");
paymentLinkRequest.Add("description", "Payment for policy no #23456");
Dictionary customer = new Dictionary();
customer.Add("contact", "+919999999999");
customer.Add("name", "Gaurav Kumar");
customer.Add("email", "gaurav.kumar@example.com");
paymentLinkRequest.Add("customer", customer);
Dictionary notify = new Dictionary();
notify.Add("sms", true);
notify.Add("email", true);
paymentLinkRequest.Add("notify", notify);
paymentLinkRequest.Add("reminder_enable", false);
Dictionary options = new Dictionary();
List offerParams = new List();
offerParams.Add("offer_JTUADI4ZWBGWur");
offerParams.Add("offer_F4WJHqvGzw8dWF");
Dictionary order = new Dictionary();
order.Add("offers", offerParams);
options.Add("order", order);
              
PaymentLink paymentlink = client.PaymentLink.Create(paymentLinkRequest);
```

### Response

```json: Success
{
 "accept_partial": false,
 "amount": 3400,
 "amount_paid": 0,
 "cancelled_at": 0,
 "created_at": 1600183040,
 "currency": "INR",
 "customer": {
   "contact": "+919000090000",
   "email": "gaurav.kumar@example.com",
   "name": "Gaurav Kumar"
 },
 "description": "Payment for policy no #23456",
 "expire_by": 0,
 "expired_at": 0,
 "first_min_partial_amount": 0,
 "id": "plink_FdLt0WBldRyE5t",
 "notes": null,
 "notify": {
   "email": true,
   "sms": true
 },
 "payments": null,
 "reference_id": "#425",
 "reminder_enable": false,
 "reminders": [],
 "short_url": "https://rzp.io/i/CM5ohDC",
 "status": "created",
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
: `array` Options to associate the `offer_id` with the Payment Link. Parent parameter under which the `order` child parameter must be passed.
 
   `order` _mandatory_
   : `array` The parameter under which the `offer_id` must be passed.
 
       `offer_id` _mandatory_
       : `string` Unique identifier of the offer created in the previous step. For example, `offer_F4WMTC3pwFKnzq`.

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
* description: Occurs when you try to create a Payment Link when you have been been suspended.
* solution: Raise a request to our [support team](https://razorpay.com/support/) to be reinstated.

value: the length must not be greater than 255.
* code: 400
* description: When the notes length is greater than 255 characters during Payment Link creation.
* solution: Please create a payment link with notes values less than 255 characters.
