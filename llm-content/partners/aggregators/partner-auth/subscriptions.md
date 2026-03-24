---
title: Partner Auth | Subscriptions
heading: Subscriptions
description: Integrate with Subscriptions API using partner auth.
---

# Subscriptions

You can use Razorpay Subscriptions to set up and manage recurring payments. These recurring payments are payments that:

- You can charge as per a billing model defined that you define.
- Do not require any intervention from the customer as the process is automated.

You can automatically charge customers based on a billing cycle that you control. It allows you to easily create and manage Subscriptions and get instant alerts on payment activity as well as the status of Subscriptions.

## Create a Subscription API

Given below is the sample code for the Create a Subscription API. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

> **WARN**
>
> 
> **Handy Tips**
> 
> 
> You should [create a plan](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions/create-plan.md) before creating a subscription.
> 
> 

/subscriptions

```curl: Curl
curl -X POST https://api.razorpay.com/v1/subscriptions \
-u [CLIENT_ID]:[CLIENT_SECRET] \
-H "Content-Type: application/json" \
-H 'X-Razorpay-Account: acc_Ef7ArAsdU5t0XL' \
-d '{
  "plan_id":"plan_00000000000001",
  "total_count":6,
  "quantity": 1,
  "customer_notify": true,
  "start_at":1773461489,
  "expire_by":1773547889,
  "addons":[
    {
      "item":{
        "name":"Delivery charges",
        "amount":30000,
        "currency":""
      }
    }
  ],
  "offer_id":"offer_JHD834hjbxzhd38d",
  "notes":{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
}'

```java: Java 
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject subscriptionRequest = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);
subscriptionRequest.put("plan_id", "plan_Ja4unjXZUeCT3g");
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
item.put("currency","INR");
linesItem.put("item",item);
addons.add(linesItem);
subscriptionRequest.put("addons",addons);
subscriptionRequest.put("offer_id","offer_JHD834hjbxzhd38d");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
subscriptionRequest.put("notes", notes);

Subscription order = instance.subscriptions.create(subscriptionRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->subscription->create(array('plan_id' => 'plan_7wAosPWtrkhqZw', 'customer_notify' => true,'quantity'=>5, 'total_count' => 6, 'start_at' => 1773461489,  'addons' => array(array('item' => array('name' => 'Delivery charges', 'amount' => 30000, 'currency' => 'INR'))),'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

```javascript: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

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
        currency: "INR"
      }
    }
  ],
  notes: {
    key1: "value3",
    key2: "value2"
  }
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

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
        "currency": "INR"
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

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

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
        "currency":"INR",
      },
    },
  },
  "notes":map[string]interface{}{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf.",
  },
}
body, err := client.Subscription.Create(data, extraHeaders)
```json: Response
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
```

## Fetch All Subscriptions API

Given below is the sample code for Fetch all Subscriptions API. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

```curl: Curl
curl -u [CLIENT_ID]:[CLIENT_SECRET] \
-X POST https://api.razorpay.com/v1/subscriptions/sub_00000000000001 \ 
-H "Content-Type: application/json" \
-H "X-Razorpay-Account: acc_Ef7ArAsdU5t0XL" \

```java: Java 
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);
params.put("count","1");

List subscriptions = instance.subscriptions.fetchAll(params);

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->subscription->all($options);
```js: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.subscriptions.all(options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

options = {"count": 1}

Razorpay::Subscription.all(options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("CLIENT_ID", "CLIENT_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

options := map[string]interface{}

body, err := client.Subscription.All(options, extraHeaders)

```json: Response 
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "sub_00000000000001",
      "entity": "subscription",
      "plan_id": "plan_00000000000001",
      "customer_id": "cust_D00000000000001",
      "status": "active",
      "current_start": 1577355871,
      "current_end": 1582655400,
      "ended_at": null,
      "quantity": 1,
      "notes": {
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey… decaf."
      },
      "charge_at": 1577385991,
      "offer_id": "offer_JHD834hjbxzhd38d",
      "start_at": 1577385991,
      "end_at": 1603737000,
      "auth_attempts": 0,
      "total_count": 6,
      "paid_count": 1,
      "customer_notify": true,
      "created_at": 1577356081,
      "expire_by": 1577485991,
      "short_url": "https://rzp.io/i/z3b1R61A9",
      "has_scheduled_changes": false,
      "change_scheduled_at": null,
      "remaining_count": 5
    }
  ]
}
```

### Related Information

- [Subscriptions API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md).
