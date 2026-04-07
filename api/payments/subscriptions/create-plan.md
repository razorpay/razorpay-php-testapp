---
title: Create a Plan
description: Create a plan with basic details such as amount and currency
---

# Create a Plan

## Create a Plan

Use this endpoint to create a plan.

### Request

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

### Response

```json: Success
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
```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "offer_id is/are not required and should not be sent"
  }
}
```

### Parameters

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

### Parameters

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

### Errors

Authentication failed
* code: 401
* description: This error occurs when you use incorrect or invalid API Keys.
* solution: Use the right set of API keys.

`offer_id` is/are not required and should not be sent
* code: 400
* description: This error occurs when you are passing `offer_id` parameter in the request body.
* solution: `offer_id` should not be passed in the request body.

 
The amount must be at least INR 1.00.
* code: 400
* description: The amount specified is less than the minimum amount. Currency subunits, such as paise (in the case of INR), should always be greater than 100.
* solution: Enter an amount equal to or greater than the minimum amount, that is 100.
