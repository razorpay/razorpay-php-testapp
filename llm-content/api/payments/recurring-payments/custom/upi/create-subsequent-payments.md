---
title: 3. Create Subsequent Payments
description: Create and charge subsequent payments using Razorpay APIs after the customer's selected payment method is successfully authorised.
---

# 3. Create Subsequent Payments

@include recurring-payments/subsequent-payments/pay-intro

## 3.1. Create an Order to Charge the Customer

You have to create a new order every time you want to charge your customers. This order is different from the one created during the authorisation transaction.

The following endpoint creates an order.

/orders

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notification":{ 
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 1000);
orderRequest.put("currency", "");
orderRequest.put("payment_capture", true);
orderRequest.put("receipt", "Receipt No. 1");
JSONObject notification = new JSONObject();
notification.put("token_id","token_M7K2eFBU7vToaQ");
notification.put("payment_after","1634057114");
orderRequest.put("notification", notification);
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
orderRequest.put("notes", notes);

Order order = razorpay.orders.create(orderRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array(
    'receipt' => '123',
    'amount' => 100,
    'payment_capture' => true,
    'currency' => '',
    'notification' => array(
        'token_id' => 'token_M7K2eFBU7vToaQ',
        'payment_after' => '1634057114'
    ),
    'notes' => array(
        'key1' => 'value3',
        'key2' => 'value2'
    )
));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notification": {
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
    'amount': 1000,
    'currency': '',
    'payment_capture': True,
    'receipt': 'Receipt No. 1',
    'notification': {'token_id': 'token_M7K2eFBU7vToaQ',
    'payment_after': 1634057114},
    'notes': {'notes_key_1': 'Tea, Earl Grey, Hot',
              'notes_key_2': 'Tea, Earl Grey... decaf.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 1000,
  "currency": "",
  "payment_capture": true,
  "receipt": "Receipt No. 1",
  "notification": {
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}

Razorpay::Order.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_S ECRET")

data:= map[string]interface{}{
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notification": map[string]interface{}{
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": map[string]interface{}{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf.",
  },
}
body, err := client.Order.Create(data, nil)
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 100);
orderRequest.Add("currency", "");
orderRequest.Add("receipt", "receipt#12b");
orderRequest.Add("payment_capture", true);
Dictionary notification = new Dictionary();
notification.Add("token_id", "token_M7K2eFBU7vToaQ");
notification.Add("payment_after", "1634057114");
orderRequest.Add("notification", notification);
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
orderRequest.Add("notes", notes);

Order order = client.Order.Create(orderRequest);

```

```json: Success Response
{
   "id":"order_1Aa00000000002",
   "entity":"order",
   "amount":1000,
   "amount_paid":0,
   "amount_due":1000,
   "currency":"",
   "receipt":"Receipt No. 1",
   "offer_id":null,
   "status":"created",
   "attempts":0,
   "notes":{
      "notes_key_1":"Tea, Earl Grey, Hot",
      "notes_key_2":"Tea, Earl Grey… decaf."
   },
   "created_at":1579782776
}

```json: Failure Response
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"The id provided does not exist",
      "source":"business",
      "step":"payment_initiation",
      "reason":"input_validation_failed",
      "metadata":{
         
      }
   }
}
```

### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the minimum value is `100` ().

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support `INR`.

`receipt` _optional_
: `string` A user-entered unique identifier for the order. For example, `Receipt No. 1`. You should map this parameter to the `order_id` sent by Razorpay.

`notes` _optional_
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.

`notification`
: `object` Details of the pre-debit notification. This object is optional. You should use it only if you want to control pre-debit notifications and debits. If you do not pass this object, we will automatically try to debit 25 hours after the pre-debit notification is delivered.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     We will not attempt any retry if the debit fails for tokens with the notification object in the created order. You should manually retry the debit attempt.
>     

    `token_id` _mandatory_
    : `string` The `token_id` generated when the customer successfully completes the authorisation payment. Different payment instruments for the same customer have different `token_id`.

    `payment_after` _optional_
    : `integer` UNIX timestamp post which the debit is supposed to happen. Defaults to 25 hours after the pre-debit notification is delivered.

`payment_capture` _mandatory_
: `boolean` Determines whether the payment status should be changed to `captured` automatically or not. Possible values:
    - `true`: Payments are captured automatically.
    - `false`: Payments are not captured automatically. You can manually capture payments using the [Manually Capture Payments API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#capture-a-payment.md).

## 3.2. Create a Recurring Payment

@include recurring-payments/subsequent-payments/rec-pay

@include recurring-payments/upi/sub-pay-note

### Request Parameters

@include recurring-payments/subsequent-payments/rec-pay-req
