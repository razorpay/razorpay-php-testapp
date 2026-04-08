---
title: Cancel a Subscription
description: Cancel a Subscription using the Razorpay API.
---

# Cancel a Subscription

## Cancel a Subscription

Use this endpoint to cancel a Subscription. You can either cancel the Subscription immediately or at the end of the current billing cycle. Once cancelled, you cannot renew or reactivate it.

- When you cancel a Subscription, the status changes to `cancelled`.
- If you choose to cancel a Subscription at the end of a billing cycle, its status changes to `cancelled` only at the end of the current billing cycle.

### Request

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

### Response

```json: Success
{
  "id": "sub_00000000000001",
  "entity": "subscription",
  "plan_id": "plan_00000000000001",
  "customer_id": "cust_D00000000000001",
  "status": "cancelled",
  "current_start": 1580453311,
  "current_end": 1581013800,
  "ended_at": 1580288092,
  "quantity": 1,
  "notes":{
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "charge_at": 1580453311,
  "start_at": 1577385991,
  "end_at": 1603737000,
  "auth_attempts": 0,
  "total_count": 6,
  "paid_count": 1,
  "customer_notify": true,
  "created_at": 1580283117,
  "expire_by": 1581013800,
  "short_url": "https://rzp.io/i/z3b1R61A9",
  "has_scheduled_changes": false,
  "change_scheduled_at": null,
  "source": "api",
  "offer_id":"offer_JHD834hjbxzhd38d",
  "remaining_count": 5
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Subscription is not cancellable in expired status.",
    "field": "status"
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier linked to a Subscription. For example, `sub_00000000000001`.

### Parameters

`cancel_at_cycle_end`_optional_
: `boolean` Use this parameter to cancel a Subscription at the end of a billing cycle. Possible values:
    - `true`: Cancel the subscription at the end of the current billing cycle.
    - `false` (default): Cancel the subscription immediately.

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

Subscription is not cancellable in expired status.
* code: 400
* description: This error occurs when you are trying to cancel a Subscription which is in the expired state.
* solution: You cannot cancel a Subscription in the expired state. Ensure that the Subscription is in the active or authenticated state to cancel.
