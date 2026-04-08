---
title: Subscriptions - S2S Integration
description: Create and fetch Plans and Subscriptions. Create and delete Add-ons using Razorpay Subscriptions APIs.
---

# Subscriptions - S2S Integration

You can create, fetch, query or cancel plans, subscriptions and addons using the Subscriptions API. These operations can also be performed on the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md).

## Plans

A plan is a foundation on which a Subscription is built. It acts as a reusable template and contains details of the goods or services offered, the amount to be charged and the frequency at which the customer should be charged (billing cycle). Depending upon your business, you can create multiple plans with different billing cycles and pricing.

You should create a plan using the Checkout or Subscription link before creating a Subscription.

### Create a Plan

Use the below endpoint to create a plan.

/plans

#### Request Parameters

`period` _mandatory_
: `string` This, combined with `interval`, defines the frequency of the plan. Possible values:
    - `daily`
    - `weekly`
    - `monthly`
    - `quarterly`
    - `yearly`

  
  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   You can create custom frequencies while creating a plan. For example, once in 3 weeks.
>   - For UPI, all undefined frequencies except `daily`, `weekly`, `monthly`, `quarterly` and `yearly` are considered `as-presented`.
>   - For domestic cards, all undefined frequencies except `weekly`, `monthly` and `yearly` are considered `as-presented` while registering the mandate with banks.
>   - For Emandate, all defined and undefined frequencies are considered `as-presented` while registering the mandate with banks.
>   

  

`interval` _mandatory_
: `integer` This, combined with `period`, defines the frequency of the plan. If the billing cycle is 2 months, the value should be `2`. For daily plans, the minimum value should be `7`.

`item`
: `object` Details of the plan.

    `name` _mandatory_
    : `string` Name of the plan. For example, `Test Plan`.

    `amount` _mandatory_
    : `integer` Amount for the plan that is to be charged to the subscription in the next billing cycle. For example, `69900` translates to .

    `currency` _mandatory_
    : `string` Currency for the payment. For example, `INR`. You can accept payment in any of the [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

    `description` _optional_
    : `string` Description for the plan. For example, `Description for the test plan`.

`notes` _optional_
: `object` Notes you can enter of the contact for future reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Monthly gym membership"`.

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/plans \
-H "Content-Type: application/json" \
-d '{
  "period": "weekly",
  "interval": 1,
  "item": {
    "name": "Test plan - Weekly",
    "amount": 69900,
    "currency": "",
    "description": "Description for the test plan"
  },
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject planRequest = new JSONObject();
planRequest.put("period","weekly");
planRequest.put("interval",1);
JSONObject item = new JSONObject();
item.put("name","Test plan - Weekly");
item.put("amount",69900);
item.put("currency","");
item.put("description","Description for the test plan");
planRequest.put("item",item);
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
planRequest.put("notes",notes);
              
Plan plan = razorpay.plans.create(planRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->plan->create(array('period' => 'weekly', 'interval' => 1, 'item' => array('name' => 'Test Weekly 1 plan', 'description' => 'Description for the weekly 1 plan', 'amount' => 600, 'currency' => ''),'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.plans.create({
  period: "weekly",
  interval: 1,
  item: {
    name: "Test plan - Weekly",
    amount: 69900,
    currency: "",
    description: "Description for the test plan"
  },
  notes: {
    notes_key_1: "Tea, Earl Grey, Hot",
    notes_key_2: "Tea, Earl Grey… decaf."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.plan.create({
    'period': 'weekly',
    'interval': 1,
    'item': {
        'name': 'Test plan - Weekly',
        'amount': 69900,
        'currency': '',
        'description': 'Description for the test plan',
        },
    'notes': {'notes_key_1': 'Tea, Earl Grey, Hot',
              'notes_key_2': 'Tea, Earl Grey... decaf.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "period": "weekly",
  "interval": 1,
  "item": {
    "name": "Test plan - Weekly",
    "amount": 69900,
    "currency": "",
    "description": "Description for the test plan"
  },
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}

Razorpay::Plan.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "period": "weekly",
  "interval": 1,
  "item": map[string]interface{}{
    "name": "Test plan - Weekly",
    "amount": 69900,
    "currency": "",
    "description": "Description for the test plan",
  },
  "notes": map[string]interface{}{
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf.",
  },
}
body, err := client.Plan.Create(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary planRequest = new Dictionary();
planRequest.Add("period", "weekly");
planRequest.Add("interval", 1);
Dictionary item = new Dictionary();
item.Add("name", "Test plan - Weekly");
item.Add("amount", 69900);
item.Add("currency", "");
item.Add("description", "Description for the test plan");
planRequest.Add("item", item);
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
planRequest.Add("notes", notes);

Plan plan = client.Plan.Create(planRequest);
```

```json: Success Response
{
  "id":"plan_00000000000001",
  "entity":"plan",
  "interval":1,
  "period":"weekly",
  "item":{
    "id":"item_00000000000001",
    "active":true,
    "name":"Test plan - Weekly",
    "description":"Description for the test plan - Weekly",
    "amount":69900,
    "unit_amount":69900,
    "currency":"",
    "type":"plan",
    "unit":null,
    "tax_inclusive":false,
    "hsn_code":null,
    "sac_code":null,
    "tax_rate":null,
    "tax_id":null,
    "tax_group_id":null,
    "created_at":1580219935,
    "updated_at":1580219935
  },
  "notes":{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "created_at":1580219935
}

```json: Failure Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "offer_id is/are not required and should not be sent"
  }
}
```

#### Response Parameters

`id`
: `string` The unique identifier linked to a plan. For example, `plan_00000000000001`. This ID is used when creating a subscription for a customer.

`entity`
: `string` The entity being created. Here, it is `plan`.

`interval`
: `integer` Used together with `period` to define how often the customer should be charged.

`period`
: `string` Used together with `interval` to define how often the customer should be charged. Possible values:
    - `daily`
    - `weekly`
    - `monthly`
    - `yearly`

`item`
: `array` Details of the plan.

    `id`
    : `string` The unique identifier linked to an item. For example, `item_00000000000001`.

    `name`
    : `string` Name of the plan. For example, `Test Plan`.

    `amount`
    : `integer` Amount for the plan. When you use this plan to create a subscription, the customer will be charged this amount periodically.

    `currency`
    : `string` Currency for the payment. You can accept payment in any of the  [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

    `description`
    : `string` Description for the plan. For example, `Description for the test plan`.

`notes`
: `object` Notes you can enter of the contact for future reference. This is a key-value pair. You can enter a maximum of 15 key-value pairs. For example, `"note_key": "Monthly Gym"`.

`created_at`
: `integer` The Unix timestamp at which the plan was created.

### Fetch all Plans

Use the below endpoint to fetch details of all plans.

/plans

#### Query Parameters

`from` _optional_
: `integer` The Unix timestamp from when plans are to be fetched.

`to` _optional_
: `integer` The Unix timestamp till when plans are to be fetched.

`count` _optional_
: `integer` The number of plans to be fetched. Default value is 10. Maximum value is 100. This can be used for pagination in combination with `skip`.

`skip` _optional_
: `integer` The number of plans to be skipped. Default value is 0. This can be used for pagination in combination with `count`.

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/plans \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
params.put("count","1");

List plans =  razorpay.plans.fetchAll(params);

```php: PHP
$api = new Api($key_id, $secret);

$api->plan->all($options);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.plans.all(options)

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.plan.all(options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

options = {"count": 2}

Razorpay::Plan.all(options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

options:= map[string]interface{}{
  "count": 1,
  "skip": 1,
}
body, err := client.Plan.All(options, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paramRequest = new Dictionary();
paramRequest.Add("count","1");

List plan = client.Plan.All(paramRequest);
```

### Fetch a Plan by ID

Use the below endpoint to fetch details of a plan by its unique identifier.

/plans/:id

#### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the plan. For example, `plan_00000000000001`.

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/plans/plan_00000000000001 \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String planId = "plan_00000000000001";

Plan plan = razorpay.plans.fetch(planId);

```php: PHP
$api = new Api($key_id, $secret);

$api->plan->fetch($planId);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.plans.fetch(planId)

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.plan.fetch(planId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

planId = "plan_00000000000001"

Razorpay::Plan.fetch(planId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Plan.Fetch("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String planId = "plan_00000000000001";

Plan plan = client.Plan.Fetch(planId);
```

## Subscriptions

You can use Subscriptions to charge a customer periodically. A Subscription ties a customer to a particular plan you have created. It contains details like the plan, the start date, total number of billing cycles, free trial period (if any) and upfront amount to be collected.

### Create a Subscription

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

> **INFO**
>
> 
> **Handy Tips**
> 
> - In order to process subscription, customer card details will need to be secured/tokenised in accordance with the applicable laws. The merchant will be solely responsible for obtaining informed consent from customers for the processing of e-mandates and such consent shall be explicit and not by way of a forced/default/automatic selection of check box, radio button etc.
> - When the merchant is  sharing `plan_id : unique identifier`, it is for  tokenising the card as per applicable rules for subscription mandate creation.
>  If such consent is not shared during the payment flow, then Razorpay will not tokenise the card or process the e-mandate/ subscription transaction.
> 

#### Request Parameters

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

#### Response Parameters

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

### Create a Subscription Link

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/subscriptions \
-H "Content-Type: application/json" \
-d '{
  "plan_id": "plan_00000000000001",
  "total_count": 12,
  "quantity": 1,
  "start_at": 1561852800,
  "expire_by": 1561939199,
  "customer_notify": true,
  "addons": [
    {
    "item": {
      "name": "Delivery charges",
      "amount": 30000,
      "currency": ""
      }
    }
  ],
  "offer_id":"offer_JHD834hjbxzhd38d",
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "notify_info":{
    "notify_phone": "+919876543210",
    "notify_email": "gaurav.kumar@example.com"
  }
}'

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
Dictionary subscriptionRequest = new Dictionary();
subscriptionRequest.Add("plan_id", "plan_Z6t7VFTb9xHeOs");
subscriptionRequest.Add("total_count", 12);
subscriptionRequest.Add("quantity", 1);
subscriptionRequest.Add("customer_notify", true);
subscriptionRequest.Add("start_at", 1580453311);
subscriptionRequest.Add("expire_by", 1580626111);
List> addons = new List>();
Dictionary linesItem = new Dictionary();
Dictionary item = new Dictionary();
item.Add("name", "Delivery charges");
item.Add("amount", 30000);
item.Add("currency", "");
linesItem.Add("item", item);
addons.Add(linesItem);
subscriptionRequest.Add("addons", addons);
subscriptionRequest.Add("offer_id", "offer_Z6t7VFTb9xHeOs");
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
subscriptionRequest.Add("notes", notes);
Dictionary notifyInfo = new Dictionary();
notifyInfo.Add("notify_phone", "+919876543210");
notifyInfo.Add("notify_email", "gaurav.kumar@example.com");
subscriptionRequest.Add("notify_info", notifyInfo);

Subscription subscription = client.Subscription.Create(subscriptionRequest);

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject subscriptionRequest = new JSONObject();
subscriptionRequest.put("plan_id", "plan_HoYg68p5kmuvzD");
subscriptionRequest.put("total_count", 12);
subscriptionRequest.put("quantity", 1);
subscriptionRequest.put("customer_notify", true);
subscriptionRequest.put("start_at", 1580453311);
subscriptionRequest.put("expire_by", 1580626111);
List addons = new ArrayList<>();
JSONObject linesItem = new JSONObject();
JSONObject item = new JSONObject();
item.put("name","Delivery charges");
item.put("amount",30000);
item.put("currency","");
linesItem.put("item",item);
addons.add(linesItem);
subscriptionRequest.put("addons",addons);
subscriptionRequest.put("offer_id","offer_JTUADI4ZWBGWur");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
subscriptionRequest.put("notes", notes);
JSONObject notifyInfo = new JSONObject();
notifyInfo.put("notify_phone","+919876543210");
notifyInfo.put("notify_email","gaurav.kumar@example.com");
subscriptionRequest.put("notify_info",notifyInfo);

Subscription subscription = razorpay.subscriptions.create(subscriptionRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->create(array('plan_id' => 'plan_HoYg68p5kmuvzD','total_count' => 12,'quantity' => 1,'expire_by' => 1633237807,'customer_notify' => true, 'addons' => array(array('item'=>array('name' => 'Delivery charges','amount' => 30000,'currency' => ''))),'notes'=>array('notes_key_1'=>'Tea, Earl Grey, Hot','notes_key_2'=>'Tea, Earl Grey… decaf.'),'notify_info'=>array('notify_phone' => '+919876543210','notify_email'=> 'gaurav.kumar@example.com')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.create({
  plan_id: "plan_HoYg68p5kmuvzD",
  total_count: 12,
  quantity: 1,
  expire_by: 1633237807,
  customer_notify: true,
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
    notes_key_1: "Tea, Earl Grey, Hot",
    notes_key_2: "Tea, Earl Grey… decaf."
  },
  notify_info: {
    notify_phone: "+919876543210",
    notify_email: "gaurav.kumar@example.com"
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.subscription.create({
    'plan_id': 'plan_HoYg68p5kmuvzD',
    'total_count': 12,
    'quantity': 1,
    'expire_by': 1633237807,
    'customer_notify': True,
    'addons': [{'item': {'name': 'Delivery charges', 'amount': 30000,
               'currency': ''}}],
    'notes': {'notes_key_1': 'Tea, Earl Grey, Hot',
              'notes_key_2': 'Tea, Earl Grey\xe2\x80\xa6 decaf.'},
    'notify_info': {'notify_phone': '+919876543210',
                    'notify_email': 'gaurav.kumar@example.com'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "plan_id": "plan_HoYg68p5kmuvzD",
  "total_count": 12,
  "quantity": 1,
  "expire_by": 1633237807,
  "customer_notify": 1,
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
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "notify_info": {
    "notify_phone": "+919876543210",
    "notify_email": "gaurav.kumar@example.com"
  }
}

Razorpay::Subscription.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "plan_id": "plan_00000000000001",
  "total_count": 12,
  "quantity": 1,
  "start_at": 1561852800,
  "expire_by": 1561939199,
  "customer_notify": true,
  "addons": []interface{}{
    map[string]interface{}{
    "item": map[string]interface{}{
      "name": "Delivery charges",
      "amount": 30000,
      "currency": "",
      },
    },
  },
  "offer_id":"offer_JHD834hjbxzhd38d",
  "notes": map[string]interface{}{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf.",
  },
  "notify_info":map[string]interface{}{
    "notify_phone": "+919876543210",
    "notify_email": "gaurav.kumar@example.com",
  },
}
body, err := client.Subscription.Create(data, nil)
```

> **INFO**
>
> 
> **Handy Tips**
> 
> - In order to process subscription, customer card details will need to be secured/tokenised in accordance with the applicable laws. The merchant will be solely responsible for obtaining informed consent from customers for the processing of e-mandates and such consent shall be explicit and not by way of a forced/default/automatic selection of check box, radio button etc.
> - When the merchant is  sharing `plan_id : unique identifier`, it is for  tokenising the card as per applicable rules for subscription mandate creation.
>  If such consent is not shared during the payment flow, then Razorpay will not tokenise the card or process the e-mandate/ subscription transaction.
> 

#### Request Parameters

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

`notify_info`
: `object` The customer's email and phone number to which notifications are to be sent. Use this array only if you have set the `customer_notify` parameter to `true`. That is, Razorpay sends notifications to the customer. The customer details entered in the API request are only to notify the customer about the Subscription. The same will not be prefilled in the checkout as per the government guidelines.

    `notify_phone` _optional_
    : `string` The customer's phone number. 

    `notify_email` _optional_
    : `string` The customer's email. 

You can perform various actions related to Subscriptions using the Dashboard.

#### Response Parameters

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

### Fetch All Subscriptions

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/subscriptions \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
params.put("count","1");

List subscriptions = razorpay.subscriptions.fetchAll(params);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->all($options);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.all(options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

options = {"count": 1}

Razorpay::Subscription.all(options)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.subscription.all(options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

options := map[string]interface{}{
    "count": 2,
}
body, err := client.Subscription.All(options, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paramRequest = new Dictionary();
paramRequest.Add("count","1");

List subscription = client.Subscription.All(paramRequest);
```

#### Query Parameters

`plan_id` _optional_
: `string` The unique identifier of the plan for which you want to retrieve all the Subscriptions.

`from` _optional_
: `integer` The Unix timestamp from when Subscriptions are to be fetched.

`to` _optional_
: `integer` The Unix timestamp till when Subscriptions are to be fetched.

`count` _optional_
: `integer` The number of Subscriptions to be fetched. Default value is `10`. Maximum value is 100. This can be used for pagination, in combination with `skip`.

`skip` _optional_
: `integer` The number of Subscriptions to be skipped. Default value is `0`. This can be used for pagination, in combination with `count`.

### Fetch Subscription by ID

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/subscriptions/sub_00000000000001 \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String subscriptionId = "sub_00000000000001";

Subscription subscription = razorpay.subscriptions.fetch(subscriptionId);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->fetch($subscriptionId);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.fetch(subscriptionId)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.subscription.fetch(subscriptionId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

subscriptionId = "sub_00000000000001"

Razorpay::Subscription.fetch(subscriptionId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Subscription.Fetch("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String subscriptionId = "sub_00000000000001";

Subscription subscription = client.Subscription.Fetch(subscriptionId);
```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier linked to a Subscription. For example, `sub_00000000000001`.

### Cancel a Subscription

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/subscriptions/sub_00000000000001/cancel \
-H "Content-Type: application/json" \
-d '{
  "cancel_at_cycle_end": false
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String subscriptionId = "sub_00000000000001";

JSONObject params = new JSONObject();
params.put("cancel_at_cycle_end", true);

Subscription subscription = razorpay.subscriptions.cancel(subscriptionId, params);

```php: PHP
$api = new Api($key_id, $secret);

$options = array("cancel_at_cycle_end" => true)

$api->subscription->fetch($subscriptionId)->cancel($options);

```javascript: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_SECRET",
});

var subscriptionId = "sub_00000000000001";

instance.subscriptions.cancel(subscriptionId, {
  cancel_at_cycle_end: true,
});

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

subscriptionId = "sub_1N6I3dbbIrc3wUG"

client.subscription.cancel(subscriptionId, {
 "cancel_at_cycle_end": True
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

subscriptionId = "sub_00000000000001"

options = {"cancel_at_cycle_end":0}

Razorpay::Subscription.cancel(subscriptionId,options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "cancel_at_cycle_end": true,
}
body, err := client.Subscription.Cancel("", data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String subscriptionId = "sub_00000000000001";

Dictionary param = new Dictionary();
param.Add("cancel_at_cycle_end", true);

Subscription subscription = client.Subscription.Fetch(subscriptionId).Cancel(param);
```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier linked to a Subscription. For example, `sub_00000000000001`.

#### Request Parameter

`cancel_at_cycle_end`_optional_
: `boolean` Use this parameter to cancel a Subscription at the end of a billing cycle. Possible values:
    - `true`: Cancel the subscription at the end of the current billing cycle.
    - `false` (default): Cancel the subscription immediately.

### Update a Subscription

```curl: Curl
curl -u : \
-X PATCH https://api.razorpay.com/v1/subscriptions/sub_00000000000001 \
-H "Content-Type: application/json" \
-d '{
  "plan_id":"plan_00000000000002",
  "offer_id":"offer_JHD834hjbxzhd38d",
  "quantity":5,
  "remaining_count":5,
  "start_at":1496000432,
  "schedule_change_at":"now",
  "customer_notify": true
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String subscriptionId = "sub_00000000000002";

JSONObject params = new JSONObject();
params.put("plan_id","plan_00000000000002");
params.put("offer_id","offer_JHD834hjbxzhd38d");
params.put("quantity",5);
params.put("remaining_count",5);
params.put("start_at",1496000432);
params.put("schedule_change_at","now");
params.put("customer_notify", true);
 
Subscription subscription = razorpay.subscription.update(subscriptionId,params);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->fetch($subscriptionId)->update($options);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.update(subscriptionId,options)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.subscription.update(subscriptionId, options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

subscriptionId = "sub_00000000000002"

options = {
  "plan_id":"plan_00000000000002",
  "offer_id":"offer_JHD834hjbxzhd38d",
  "quantity":5,
  "remaining_count":5,
  "start_at":1496000432,
  "schedule_change_at":"now",
  "customer_notify":1
}

Razorpay::Subscription.fetch(subscriptionId).edit(options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Subscription.Update("", options, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string subscriptionId = "sub_00000000000002";

Dictionary param = new Dictionary();
param.Add("plan_id","plan_00000000000002");
param.Add("offer_id","offer_JHD834hjbxzhd38d");
param.Add("quantity",5);
param.Add("remaining_count",5);
param.Add("start_at",1496000432);
param.Add("schedule_change_at","now");
param.Add("customer_notify", true);
 
Subscription subscription = client.Subscription.Fetch(subscriptionId).Edit(param);
```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier linked to a Subscription. For example, `sub_00000000000001`.

#### Request Parameters

`plan_id`_optional_
: `string` The unique identifier of the new plan that should be linked to the Subscription. For example, `plan_00000000000001`.

`offer_id` _optional_
: `string` The unique identifier of the offer that should be linked to the Subscription. You can obtain this from the Dashboard. For example, `offer_JHD834hjbxzhd38d`.

`quantity`_optional_
: `integer` The number of times the plan should be linked to the Subscription. For example, if the plan is /user/month and the customer has 5 users, you should pass `5` as the quantity to have the customer charged  (5 x ) monthly. By default, this value is set to `1`.

`remaining_count`_optional_
: `integer` This parameter is used to update the `total_count` for a Subscription. For example, let us consider a monthly Subscription with 12 billing cycles. The Subscription has been charged successfully 4 times and 3 more invoices have been issued, but have not been charged. The remaining count in such cases is 5. However, you can overwrite this value using this parameter.

`start_at`_optional_
: `integer` Unix timestamp. The new start date for the Subscription.

`schedule_change_at`_optional_
: `string` Represents when the Subscription should be updated.
    - `now` (default): Updates the Subscription immediately.
    - `cycle_end`: Updates the Subscription at the end of the current billing cycle.

`customer_notify`_optional_
: `boolean` Represents who sends notifications to the customer. Possible values:
    - `true` (default): Notifications sent by Razorpay.
    - `false`: Notifications sent by you.

### Fetch Details of a Pending Update

```curl: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/subscriptions/sub_00000000000001/retrieve_scheduled_changes \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String subscriptionId = "sub_00000000000001";

Subscription subscription = razorpay.subscription.fetchPendingUpdate(subscriptionId);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->fetch($subscriptionId)->pendingUpdate()

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.pendingUpdate(subscriptionId)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.subscription.pending_update(subscriptionId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

subscriptionId = "sub_00000000000001"

Razorpay::Subscription.fetch(subscriptionId).pending_update

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Subscription.PendingUpdate("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string subscriptionId = "sub_00000000000001";

Subscription subscription = client.Subscription.Fetch(subscriptionId).FetchPendingUpdate();

```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier linked to a Subscription. For example, `sub_00000000000001`.

### Cancel an Update

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/subscriptions/sub_00000000000001/cancel_scheduled_changes \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String subscriptionId = "sub_00000000000001";

Subscription subscription = razorpay.subscription.cancelPendingUpdate(subscriptionId);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->fetch($subscriptionId)->cancelScheduledChanges();

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.cancelScheduledChanges(subscriptionId)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.subscription.cancel_scheduled_changes(subscriptionId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

subscriptionId = "sub_00000000000001"

Razorpay::Subscription.cancel_scheduled_changes(subscriptionId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Subscription.CancelScheduledChanges("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string subscriptionId = "sub_00000000000001";

Subscription subscription = client.Subscription.Fetch(subscriptionId).CancelPendingUpdate();
```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier linked to a Subscription. For example, `sub_00000000000001`.

### Pause a Subscription

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/subscriptions/sub_00000000000001/pause \
-H "Content-Type: application/json" \
-d '{
  "pause_at":"now"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String subscriptionId = "sub_00000000000001";

JSONObject params = new JSONObject();
params.put("pause_at","now");
        
Subscription subscription = razorpay.subscription.pause(SubscriptionId,params);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->fetch($subscriptionId)->pause(array('pause_at'=>'now'))

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.pause(subscriptionId,{
  pause_at : 'now'
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.subscription.pause(subscriptionId, {'pause_at': 'now'})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

subscriptionId = "sub_00000000000001"

options = {"pause_at": "now"}

Razorpay::Subscription.pause(subscriptionId,options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

options := map[string]interface{}{ "pause_at" : "now" }
body, err := client.Subscription.Pause("", options, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string subscriptionId = "sub_00000000000001";

Dictionary param = new Dictionary();
param.Add("pause_at","now");
        
Subscription subscription = client.Subscription.Fetch(subscriptionId).Pause(param);

```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier linked to a Subscription. For example, `sub_00000000000001`.

#### Request Parameters

`pause_at` _optional_
: `string` The value should be `now` to pause a Subscription immediately.

### Resume a Subscription

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/subscriptions/sub_00000000000001/resume \
-H "Content-Type: application/json" \
-d '{
  "resume_at":"now"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String SubscriptionId = "sub_00000000000001";

JSONObject params = new JSONObject();
params.put("resume_at","now");
             
Subscription subscription = razorpay.subscription.resume(SubscriptionId,requestJson);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->fetch($subscriptionId)->resume(array('resume_at'=>'now'))

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.resume(subscriptionId,{
  resume_at : 'now'
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.subscription.resume(subscriptionId, {'resume_at': 'now'})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

subscriptionId = "sub_00000000000001"

options = {"resume_at": "now"}

Razorpay::Subscription.resume(subscriptionId,options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

options := map[string]interface{}{ "resume_at" : "now" }
body, err := client.Subscription.Resume("", options, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string subscriptionId = "sub_00000000000001";

Dictionary param = new Dictionary();
param.Add("resume_at","now");
             
Subscription subscription = client.Subscription.Fetch(subscriptionId).Resume(param);
```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier linked to a Subscription. For example, `sub_00000000000001`.

#### Request Parameters

`resume_at` _optional_
: `string` The value should be `now` to resume a Subscription immediately.

### Fetch All Invoices for a Subscription

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/invoices?subscription_id=sub_00000000000001 \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
params.put("subscription_id",subscriptionId);
              
List invoices = razorpay.invoices.fetchAll(params);

```php: PHP
$api = new Api($key_id, $secret);

$api->invoice->all(['subscription_id'=>$subscriptionId]);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.invoices.all({
  'subscription_id':subscriptionId
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.invoice.all({'subscription_id': subscriptionId})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {"subscription_id": "sub_00000000000001"}

Razorpay::Invoice.all(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{ "subscription_id": "sub_00000000000001" }
body, err := client.Invoice.All(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary param = new Dictionary();
param.Add("subscription_id", "sub_Z6t7VFTb9xHeOs");
              
List subscription = client.Invoice.All(param);
```

#### Query Parameter

`subscription_id` _mandatory_
: `string` The unique identifier linked to the Subscription. For example, `sub_00000000000001`.

#### Response Parameters

`count`
: `integer` The number of invoices generated for the Subscription.

`item`
: `array` List of invoices generated for the Subscription.

  `id`
  : `string` The unique identifier of the invoice issued for the Subscription.

  `entity`
  : `string` The entity being created. Here, it is `invoice`.

  `receipt`
  : `string` Here, it is `null`.

  `invoice_number`
  : `string` The invoice number. Here, it is `null`.

  `customer_id`
  : `string` The unique identifier of the customer linked to the Subscription.

  `customer_details`
  : `object` Details of the customer.

      `id`
      : `string` The unique identifier of the customer linked to the Subscription.

      `name`
      : `string` The customer's name. Know more [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

      `email`
      : `string` The customer's email address.

      `contact`
      : `string` The customer's contact number.

      `billing_address`
      : `string` The customer's billing address.

      `shipping_address`
      : `string` The customer's shipping address.

      `customer_name`
      : `string` The customer's name.

      `customer_email`
      : `string` The customer's email address.

      `customer_contact`
      : `string` The customer's contact number.

`order_id`
: `string` The unique identifier of the order associated with the invoice.

`subscription_id`
: `string` The unique identifier of the Subscription. For example, `sub_00000000000001`.

`line_items`
: `array` Details of the line item that is billed in the invoice. Number of arrays = number of line items billed in the invoice. For example, if the Subscription starts immediately and has an upfront fee attached to it, the number of line items = 2. One for the Subscription charge and one for the upfront fee.

  `id`
  : `string` The unique identifier linked to the item billed in the invoice. For example, `li_00000000000001`.

  `item_id`
  : `string` Here, it is `null`.

  `name`
  : `string` The item's name. For example, `Monthly Plan`.

  `description`
  : `string` A brief description of the item. Here, it is `null`.

  `amount`
  : `integer` The item's price, in currency subunits. For example, `99900`.

  `currency`
  : `string` The currency for the amount charged for the item.

  `type`
  : `string` The type of charge. Possible values:
    - `plan`
    - `addon`

  `quantity`
  : `integer` The number of units of the item billed in the invoice. For example, `1`.

`payment_id`
: `string` Unique identifier of the payment made by the customer using this invoice. For example, `pay_00000000000001`.

`status`
: `string` The status of the invoice. Possible values:
      - `draft`
      - `issued`
      - `partially_paid`
      - `paid`
      - `expired`
      - `cancelled`
      - `deleted`

`expire_by`
: `integer` The Unix timestamp, indicates at which the invoice will expire. For example, `1593411509`

`issued_at`
: `integer` The Unix timestamp, indicates at which the invoice was issued to the customer. For example, `1593411209`

`paid_at`
: `integer` The Unix timestamp, indicates at which the payment was made. For example, `1593411325`

`cancelled_at`
: `integer` The Unix timestamp, indicates at which the invoice was canceled by you. For example, `1593411209`

`expired_at`
: `integer` The Unix timestamp, indicates at which the invoice has expired. For example, `1593411209`

`sms_status`
: `string` Indicates whether the SMS notification for the invoice was sent to the customer. Possible values:
    - `pending`
    - `sent`

`email_status`
: `string` Indicates whether the email notification for the invoice was sent to the customer. Possible values:
    - `pending`
    - `sent`

`date`
: `integer` The Unix timestamp, that indicates the date of the invoice.

`terms`
: `string` Any terms to be included in the invoice. Here, it is `null`.

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment on the invoice.   
    - `true`: Customer can make partial payments.
    - `false`: Customer cannot make partial payments.

`amount`
: `integer` Amount to be paid using the invoice. This should be in the smallest unit of the currency. For example, `29995`.

`amount_paid`
: `integer` Amount paid by the customer using the invoice. For example, `29995`.

`amount_due`
: `integer` The remaining amount to be paid by the customer for the issued invoice.

`currency`
: `string` The currency associated with the item.

`description`
: `string`  A brief description of the invoice. Here, it is `null`.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`comment`
: `string` Any comments to be added in the invoice. Here, it is `null`.

`short_url`
: `string` The short URL that is generated. This is the link that can be shared with customers to accept payments. Once canceled, no payments can be accepted using the link. For example, `https://rzp.io/i/gb5827Hh`.

`view_less`
: `boolean` Used when the link description is lengthy and you want to make the text collapsible. The text can be expanded by the customer using the **Show More** link.
  - `true` (default): Link description appears collapsed, with a **Show More** link.
  - `false`: Link description appears expanded.

`type`
: `string` Here, it is `invoice`.

`created_at`
: `integer` The Unix timestamp, that indicates when this invoice entity was created. For example, `1593411943`.

### Delete an Offer Linked to a Subscription

```curl: Curl
curl -u [YOUR_KEY_ID]:YOUR_KEY_SECRET] \
-X DELETE https://api.razorpay.com/v1/subscriptions/sub_00000000000001/offer_JHD834hjbxzhd38d \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String subscriptionId = "sub_00000000000001";

String offerId = "offer_JHD834hjbxzhd38d";

Subscription subscription = razorpay.subscription.deleteSubscriptionOffer(subscriptionId, offerId);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->fetch($subscriptionId)->deleteOffer($offerId)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.deleteOffer(subscriptionId, offerId)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.subscription.delete_offer(subscriptionId, offerId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

subscriptionId = "sub_00000000000001"

offerId = "offer_JHD834hjbxzhd38d"

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Subscription.DeleteOffer("", "", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string subscriptionId = "sub_I3GGEs7Xgmnozy";

string offerId = "offer_JCTD1XMlUmzF6Z";

Subscription subscription = client.Subscription.Fetch(subscriptionId).DeleteOffer(offerId);
```

#### Path Parameters

`sub_id` _mandatory_
: `string` The unique identifier of the Subscription from which you want to remove the offer. For example, `sub_00000000000001`.

`offer_id` _mandatory_
: `string` The unique identifier of the offer you want remove from the Subscription. For example, `offer_JHD834hjbxzhd38d`.

## Authentication Transaction

### Create Authentication Transaction

After you create a plan and a subscription, you have to create an authentication transaction. This authenticates the customer's payment method and authorizes you to collect recurring payments via the authenticated payment method.

Use the below endpoint to create an authentication transaction with method `card`.

/payments/create/json

```curl: Request
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
 -d '{
  "amount": "100",
  "currency": "INR",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "subscription_id": "sub_00000000000001",
  "method": "card",
  "card": {
    "number": "4854980604708430",
    "cvv": "",
    "expiry_month": "12",
    "expiry_year": "21",
    "name": "Gaurav Kumar"
  }
}'

```json: Response
{
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/FVmAtLUe9XZSGM/authorize"
    },
    {
      "action": "otp_generate",
      "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate?track_id=FVmAtLUe9XZSGM&key_id="
    }
  ]
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the minimum value is `100` ().

`subscription_id` _mandatory_
: `string` The unique identifier of the subscription. For example, `sub_00000000000001`.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`email` _mandatory_
: `string` The customer's email address. For example, `gaurav.kumar@example.com`.

`contact` _mandatory_
: `string` The customer's contact number. For example, `9123456780`.

`method` _mandatory_
: `string` The payment method selected by the customer. Here, the value must be `card`.

`card`
: The attributes associated with a card.

    `number` _mandatory_
    : `integer` Unformatted card number. This field is required if value of `method` is `card`. Use one of our test cards to try out the payment flow.

    `name` _mandatory_
    : `string` The name of the cardholder.

    `expiry_month` _mandatory_
    : `integer` The expiry month of the card in `MM` format. For example, `01` for January and `12` for December.

    `expiry_year` _mandatory_
    : `integer` Expiry year for card in the `YY` format. For example, 2025 will be in format `25`.

    `cvv` _mandatory_
    : `integer` CVV printed on the back of the card.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>      - CVV is not required by default for tokenised cards across all networks.
>      - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>      - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>      - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>      - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.         
>     

#### Response Parameters

If the payment request is valid, the response contains the following fields. Refer to the [S2S Json V2 integration document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md#step-2-create-a-payment) for more details.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. Possible values:
      - `otp_generate` - Use this URL to allow the customer to generate OTP and complete the payment on your webpage.
      - `redirect` - Use this URL to redirect the customer to submit the OTP on the bank page.

    `url`
    : `string` URL to be used for the action indicated.

### Verify Payment

This is a mandatory step that allows you to confirm the authenticity of the card details returned to the Checkout form for successful payments.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> You should consider the payment as successful and Subscription as authorised only after the signature has been successfully verified.
> 

To verify the `razorpay_signature` returned to you by the Checkout form:

1. Create a signature in your server using the following attributes:
    - `subscription_id`: Retrieve the `subscription_id` from your server. Do not use the `razorpay_subscription_id` returned by Checkout.
    - `razorpay_payment_id`: Returned by Checkout.
    - `key_secret`: Available in your server.
 The `key_secret` that was generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md#prerequisites).

1. Use the SHA256 algorithm, the `razorpay_payment_id` and the `subscription_id` to construct a HMAC hex digest as shown below:

      ```
      generated_signature = hmac_sha256(razorpay_payment_id + "|" + subscription_id, secret);

        if (generated_signature == razorpay_signature) {
          payment is successful
        }
      ```

1. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String secret = "EnLs21M47BllR3X8PSFtjtbd";

JSONObject options = new JSONObject();
options.put("razorpay_subscription_id", "sub_ID6MOhgkcoHj9I");
options.put("razorpay_payment_id", "pay_IDZNwZZFtnjyym");
options.put("razorpay_signature", "601f383334975c714c91a7d97dd723eb56520318355863dcf3821c0d07a17693");

boolean status =  Utils.verifySubscription(options, secret);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.utility.verify_subscription_payment_signature({
   'razorpay_subscription_id': razorpay_order_id,
   'razorpay_payment_id': razorpay_payment_id,
   'razorpay_signature': razorpay_signature
   })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

payment_response = {
        razorpay_order_id: 'pay_IDZNwZZFtnjyym',
        razorpay_payment_id: 'sub_ID6MOhgkcoHj9I',
        razorpay_signature: '601f383334975c714c91a7d97dd723eb56520318355863dcf3821c0d07a17693'
      }

Razorpay::Utility.verify_payment_signature(payment_response)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

params := map[string]interface{}{
	"razorpay_subscription_id": "sub_ID6MOhgkcoHj9I",
	"razorpay_payment_id": "pay_IDZNwZZFtnjyym",
}

signature := "601f383334975c714c91a7d97dd723eb56520318355863dcf3821c0d07a17693";
secret := "EnLs21M47BllR3X8PSFtjtbd";
utils.VerifySubscriptionSignature(params, signature, secret)

```php: PHP
$api = new Api($key_id, $secret);

$api->utility->verifyPaymentSignature(array('razorpay_subscription_id' => $razorpaySubscriptionId, 'razorpay_payment_id' => $razorpayPaymentId, 'razorpay_signature' => $razorpaySignature));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.paymentVerification({
   'subscription_id':'sub_ID6MOhgkcoHj9I',
   'payment_id':'pay_IDZNwZZFtnjyym',
   'signature':'601f383334975c714c91a7d97dd723eb56520318355863dcf3821c0d07a17693'
   },secret)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("razorpay_subscription_id", "sub_ID6MOhgkcoHj9I");
options.Add("razorpay_payment_id", "pay_IDZNwZZFtnjyym");
options.Add("razorpay_signature", "601f383334975c714c91a7d97dd723eb56520318355863dcf3821c0d07a17693");

Utils.verifySubscriptionSignature(options);
```

## Add-ons

You can create add-ons to charge the customer an extra amount for a particular billing cycle. Once you create an add-on for a Subscription, it is added to the next invoice that is generated. On the next scheduled charge, the customer is charged the add-on amount in addition to their regular Subscription amount.

### Create an Add-on

#### Path Parameter

`id` _mandatory_
: `string` The subscription ID to which the add-on is being added.

#### Request Parameters

.

    `description` _optional_
    : `string` Description for the add-on. For example, `1 extra oil fried appala with meals`.

`quantity` _optional_
: `integer` This specifies the number of units of the add-on to be charged to the customer. For example, `2`. Defaults to `1`. The total amount is calculated as `amount` * `quantity`.

#### Response Parameters

`id`
: `string` The unique identifier of the created add-on. For example, `ao_00000000000001`.

`quantity`
: `integer` This specifies the number of units of the add-on to be charged to the customer. For example, `2`. The total amount is calculated as `amount` * `quantity`.

`created_at`
: `integer` The timestamp, in Unix format, when the add-on was created. For example, `1581597318`.

`subscription_id`
: `string` The unique identifier of the subscription to which the add-on is being added. For example, `sub_00000000000001`.

`invoice_id`
: `string` The add-on is added to the **next** invoice that is generated after the add-on is created. This field is populated only after the invoice is generated. Until then, it is `null`. Once the add-on is linked to an invoice, it cannot be deleted.

### Fetch all Add-ons

#### Query Parameters

`from` _optional_
: `integer` The Unix timestamp from when add-ons are to be fetched.

`to` _optional_
: `integer` The Unix timestamp till when add-ons are to be fetched.

`count` _optional_
: `integer` The number of add-ons to be fetched. Default value is `10`. Maximum value is `100`. This can be used for pagination, in combination with `skip`.

`skip` _optional_
: `integer` The number of add-ons to be skipped. Default value is `0`. This can be used for pagination, in combination with `count`.

### Fetch an Add-on by ID

#### Path Parameter

`id` _mandatory_
: `string` The unique identifier of an add-on. For example, `ao_00000000000001`.

### Delete an Add-on

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X DELETE https://api.razorpay.com/v1/addons/ao_00000000000001 \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String addonId = "ao_00000000000001";

List addon = razorpay.addons.delete(addonId)

```php: PHP
$api = new Api($key_id, $secret);

$api->addon->fetch($addonId)->delete();

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.addons.delete(addonId)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.addon.delete(addonId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Addon.delete("ao_00000000000001")

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

addonId := "ao_Jey1r0000000" 
body, err := client.Addon.Delete(addonId, nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string addonId = "ao_00000000000001";

List addon = client.Addon.Fetch(addonId).Delete();
```

#### Path Parameter

`id` _mandatory_
: `string` The unique identifier of an add-on. For example, `ao_00000000000001`.

## Webhooks

### Available Webhook Events

Refer to the Webhooks section for a list of available webhook events for Subscriptions.

### Setup Webhooks

Refer to the Webhooks section to learn how to setup webhooks.

### Sample Payloads

Refer to the Webhooks section for sample payloads.

### Related Information

- [API authentication](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md)
- [Subscription product documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md)
