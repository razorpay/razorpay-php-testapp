---
title: Fetch a Plan With ID
description: Fetch a plan using the unique identifier
---

# Fetch a Plan With ID

## Fetch a Plan With ID

Use this endpoint to retrieve the details of a plan using its unique identifier.

### Request

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
    "created_at":1580220492,
    "updated_at":1580220492
  },
  "notes":{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "created_at":1580220492
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "an_id%7D is not a valid id"
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the plan. For example, `plan_00000000000001`.

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

an_id%7D is not a valid id
* code: 400
* description: This error occurs when you are not passing the `plan_id` in the API endpoint to fetch a plan based on the id.
* solution: Ensure that you are passing the `plan_id` in the API endpoint. 
 For example, `https://api.razorpay.com/v1/plans/plan_K8lVuxetc2OGR8`.
