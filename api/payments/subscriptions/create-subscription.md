---
title: Create a Subscription
description: Create a Subscription using the Razorpay API.
---

# Create a Subscription

## Create a Subscription

Use this endpoint to create a Subscription.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/subscriptions \
-H "Content-Type: application/json" \
-d '{
   "plan_id":"plan_00000000000001",
   "total_count":6,
   "quantity":1,
   "customer_notify": true,
   "start_at":1773461489,
   "expire_by":1773547889,
   "addons":[
      {
         "item":{
            "name":"Delivery charges",
            "amount":3000,
            "currency":""
         }
      }
   ],
   "notes":{
      "notes_key_1":"Tea, Earl Grey, Hot",
      "notes_key_2":"Tea, Earl Grey… decaf."
   }
}'

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary subscriptionRequest = new Dictionary();
subscriptionRequest.Add("plan_id", "plan_Z6t7VFTb9xHeOs");
subscriptionRequest.Add("total_count", 6);
subscriptionRequest.Add("quantity", 1);
subscriptionRequest.Add("customer_notify", true);
subscriptionRequest.Add("start_at", 1773461489);
subscriptionRequest.Add("expire_by", 1773547889);
Dictionary linesItem = new Dictionary();
Dictionary item = new Dictionary();
item.Add("name", "Delivery charges");
item.Add("amount", 30000);
item.Add("currency", "");
linesItem.Add("item", item);
object[] addons = new object[]{ linesItem };
subscriptionRequest.Add("addons", addons);
subscriptionRequest.Add("offer_id", "offer_LFw2SqDBi8kf53");
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
subscriptionRequest.Add("notes", notes);

Subscription subscription = client.Subscription.Create(subscriptionRequest);
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject subscriptionRequest = new JSONObject();
subscriptionRequest.put("plan_id", "plan_7wAosPWtrkhqZw");
subscriptionRequest.put("total_count", 6);
subscriptionRequest.put("quantity", 1);
subscriptionRequest.put("customer_notify", true);
subscriptionRequest.put("start_at", 1773461489);
subscriptionRequest.put("expire_by", 1773547889);
List addons = new ArrayList<>();
JSONObject linesItem = new JSONObject();
JSONObject item = new JSONObject();
item.put("name","Delivery charges");
item.put("amount",30000);
item.put("currency","");
linesItem.put("item",item);
addons.add(linesItem);
subscriptionRequest.put("addons",addons);
subscriptionRequest.put("offer_id","offer_JHD834hjbxzhd38d");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
subscriptionRequest.put("notes", notes);

Subscription order = razorpay.subscriptions.create(subscriptionRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->create(array('plan_id' => 'plan_7wAosPWtrkhqZw', 'customer_notify' => true,'quantity'=>5, 'total_count' => 6, 'start_at' => 1773461489, 'addons' => array(array('item' => array('name' => 'Delivery charges', 'amount' => 30000, 'currency' => ''))),'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.create({
  plan_id: "plan_7wAosPWtrkhqZw",
  customer_notify: true,
  quantity: 5,
  total_count: 6,
  start_at: 1773461489,
  addons: [
    {
      item: {
        name: "Delivery charges",
        amount: 30000,
        currency: ""
      }
    }
  ],
  notes: {
    key1: "value3",
    key2: "value2"
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.subscription.create({
    'plan_id': 'plan_7wAosPWtrkhqZw',
    'customer_notify': True,
    'quantity': 5,
    'total_count': 6,
    'start_at': 1773461489,
    'addons': [{'item': {'name': 'Delivery charges', 'amount': 30000,
               'currency': ''}}],
    'notes': {'key1': 'value3', 'key2': 'value2'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "plan_id": "plan_7wAosPWtrkhqZw",
  "customer_notify": 1,
  "quantity": 5,
  "total_count": 6,
  "start_at": 1773461489,
  "addons": [
    {
      "item": {
        "name": "Delivery charges",
        "amount": 30000,
        "currency": ""
      }
    }
  ],
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
}

Razorpay::Subscription.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "plan_id":"plan_JCPs6ZkAutbaCe",
  "total_count":3,
  "quantity": 1,
  "customer_notify": true,
  "start_at":1773461489,
  "expire_by":1773547889,
  "addons":[]interface{}{
    map[string]interface{}{
      "item":map[string]interface{}{
        "name":"Delivery charges",
        "amount":3000,
        "currency":"",
      },
    },
  },
  "notes":map[string]interface{}{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf.",
  },
}
body, err := client.Subscription.Create(data, nil)
```

### Response

```json: Success
{
  "id": "sub_00000000000001",
  "entity": "subscription",
  "plan_id": "plan_00000000000001",
  "customer_email": null,
  "status": "created",
  "current_start": null,
  "current_end": null,
  "ended_at": null,
  "quantity": 1,
  "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "charge_at": 1773461489,
  "start_at": 1773461489,
  "end_at": 1776450600,
  "auth_attempts": 0,
  "total_count": 6,
  "paid_count": 0,
  "customer_notify": true,
  "created_at": 1773394958,
  "expire_by": 1773547889,
  "short_url": "https://rzp.io/rzp/Dqdqx3h",
  "has_scheduled_changes": false,
  "change_scheduled_at": null,
  "source": "api",
  "remaining_count": 6
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The requested URL was not found on the server.",
    "source": "NA",
    "step": "NA",
    "reason": "NA",
    "metadata": {}
  }
}
```

### Parameters

`plan_id` _mandatory_
: `string` The unique identifier of a plan that should be linked to the Subscription. For example, `plan_00000000000001`.

`total_count` _mandatory_
: `integer` The number of billing cycles for which the customer should be charged. For example, if a customer is buying a 1-year subscription billed on a bi-monthly basis, this value should be `6`.

`quantity` _optional_
: `integer` The number of times the customer should be charged the plan amount per invoice. For example, a customer subscribes to use software. The charges are  /month/license. The customer wants 5 licenses. You should pass `5` as the quantity. The customer is charged  (5 x ) monthly. By default, this value is set to `1`.

`start_at` _optional_
: `integer` Unix timestamp that indicates from when the Subscription should start. If not passed, the Subscription starts immediately after the authorisation payment. For example, `1581013800`. For Subscriptions with a future start_date, frequency is considered `as_presented`.

`expire_by` _optional_
: `integer` Unix timestamp that indicates till when the customer can make the authorisation payment. For example, `1581013800`. The default value is 30 years. Do not pass any value if you do not want to set an expiry date.

`customer_notify` _optional_
: `boolean` Indicates whether the communication to the customer would be handled by businesses or Razorpay. Possible values:
    - `true` (default): Communication handled by Razorpay.
    - `false`: Communication handled by businesses.

`addons`
: `object` Array that contains details of any upfront amount you want to collect as part of the authorisation transaction.

    `item`
    : `object` Details of the upfront amount you want to charge your customer.

        `name` _optional_
        : `string` A name for the upfront amount you want to charge the customer. For example, `Delivery Fee`.

        `amount` _optional_
        : `integer` The upfront amount in the currency subunit you want to charge the customer. For example ,`30000`.

        `currency` _optional_
        : `string` The currency in which you want to charge the customer. This has to match the plan currency. For example, `INR`.

`offer_id` _optional_
: `string` The unique identifier of the offer that is linked to the Subscription. You can obtain this from the Dashboard. For example, `offer_JHD834hjbxzhd38d`.

`notes` _optional_
: `object` Notes you can enter for the contact for future reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Beam me up Scotty”`.

### Parameters

`id`
: `string` The unique identifier of the subscription created. For example, `sub_00000000000001`.

`entity`
: `string` The entity being created. Here, it will be `subscription`.

`plan_id`
: `string` The unique identifier for a plan that is linked to the created subscription. For example, `plan_00000000000001`.

`customer_id`
: `string` The unique identifier of the customer linked to the subscription. This is populated automatically once the customer completes the authorisation transaction. For example, `cust_00000000000001`.

`status`
: `string` Status of the subscription. Refer to the [life cycle section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/states.md) for more details. Possible values:
    - `created`
    - `authenticated`
    - `active`
    - `pending`
    - `halted`
    - `cancelled`
    - `completed`
    - `expired`

`current_start`
: `integer` Unix timestamp. The start time of the current billing cycle of the subscription. For example, `1581013800`.

`current_end`
: `integer` Unix timestamp. The end time of the current billing cycle of the subscription. For example, `1581013800`.

`ended_at`
: `integer` The timestamp, in Unix format, when the subscription was completed or was cancelled. For example, `1581013800`.

`quantity`
: `integer` The number of times the plan should be linked to the subscription. For example, if the plan is /user/month and the customer has 5 users, you should pass 5 as the quantity to have the customer charged  (5 x ) monthly. By default, this value is set to 1.

`notes`
: `object` Notes you can enter for the contact for future reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Beam me up Scotty”`.

`charge_at`
: `integer` Unix timestamp. This indicates when the next charge on the subscription should be made. For example, `1581013800`.

`offer_id`
: `string` The unique identifier of the offer that should be linked to the subscription. For example, `offer_JHD834hjbxzhd38d`.

`start_at`
: `integer` The timestamp, in Unix format, when the subscription should start. If not passed, the subscription starts immediately after the authorisation payment. For example, `1581013800`.

`end_at`
: `integer` The timestamp, in Unix format, when the subscription should end. For example, `1581013800`.

`auth_attempts`
: `integer` The number of times that the charge for the current billing cycle has been attempted on the card. For example, `2`.

`total_count`
: `integer` The number of billing cycles for which the customer should be charged. For example, `2`. We support subscriptions for a maximum duration of 100 years. The number of billing cycles depends if the subscription is daily, weekly, monthly or yearly.

`paid_count`
: `integer` This indicates the number of billing cycles for which the customer has already been charged. For example, `2`.

`customer_notify`
: `boolean` Indicates whether the communication to the customer would be handled by businesses or Razorpay.
    - `true`: Communication handled by Razorpay. Defaults to `true`.
    - `false`: Communication handled by businesses.

`created_at`
: `integer` The timestamp, in Unix format, when the subscription was created. For example, `1581013800`.

`expire_by`
: `integer` The timestamp, in Unix format, till when the customer can make the authorisation payment. For example, `1581013800`.

`short_url`
: `string` URL that can be used to make the authorisation payment. For example, `https://rzp.io/i/PWtAiEo`.

`has_scheduled_changes`
: `boolean` Indicates if the subscription has any scheduled changes. Possible values:
    - `true`: Subscription has scheduled changes.
    - `false`: Subscription does not have scheduled changes.

`schedule_change_at`
: `string` Represents when the subscription should be updated. Possible values:
    - `now` (default): Updates the subscription immediately.
    - `cycle_end`: Updates the subscription at the end of the current billing cycle.

`remaining_count`
: `integer` This indicates the number of billing cycles remaining on the subscription. For example, `2`.

### Errors

The requested URL was not found on the server.
* code: 400
* description: This error occurs when the Subscriptions feature is not enabled.
* solution: Ensure that the [Subscriptions feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md#flash-checkout) is enabled both in the test and live modes before creating a Subscription.
 
The id provided does not exist
* code: 400
* description: This error occurs when passing  an incorrect `plan_id`.
* solution: Ensure that you are passing the correct `plan_id`. The plan should be active and created using the same API key and Secret.

Offer Not Found
* code: 400
* description: This error occurs when you are linking an invalid/expired offer to a Subscription.
* solution: Ensure that the Subscription offer created on the Dashboard is valid and has not expired.

Offer not applicable for this Subscription
* code: 400
* description: This error occurs when you are linking/passing an `offer_id` to a Subscription on which the offer doesn't apply.
* solution: Ensure that the plan amount is greater than the minimum amount set for the offer.
