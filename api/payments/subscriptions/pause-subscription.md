---
title: Pause a Subscription
description: Pause a Subscription using the Razorpay API.
---

# Pause a Subscription

## Pause a Subscription

Use this endpoint to pause a Subscription.

> **WARN**
>
> 
> **Watch Out!**
> 
> - You can only pause a Subscriptions in the `active` state.
> - If you pause a Subscription in the `authenticated` state, it goes to the `cancelled` state.
> 

### Request

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

### Response

```json: Success
{
  "id": "sub_00000000000001",
  "entity": "subscription",
  "plan_id": "plan_00000000000001",
  "status": "paused",
  "current_start": null,
  "current_end": null,
  "ended_at": null,
  "quantity": 1,
  "notes":{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "charge_at": null,
  "start_at": 1580626111,
  "end_at": 1583433000,
  "auth_attempts": 0,
  "total_count": 6,
  "paid_count": 0,
  "customer_notify": true,
  "created_at": 1580280581,
  "paused_at": 1590280581,
  "expire_by": 1580626111,
  "pause_initiated_by": "self",
  "short_url": "https://rzp.io/i/z3b1R61A9",
  "has_scheduled_changes": false,
  "change_scheduled_at": null,
  "source": "api",
  "offer_id":"offer_JHD834hjbxzhd38d",
  "remaining_count": 6
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

`id` _mandatory_
: `string` The unique identifier linked to a Subscription. For example, `sub_00000000000001`.

### Parameters

`pause_at` _optional_
: `string` The value should be `now` to pause a Subscription immediately.

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

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
