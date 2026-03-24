---
title: Update a Subscription
description: Update a Subscription using the Razorpay API.
---

# Update a Subscription

## Update a Subscription

Use this endpoint to update a Subscription.

### Request

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

### Response

```json: Success
{
  "id":"sub_00000000000002",
  "entity":"subscription",
  "plan_id":"plan_00000000000002",
  "customer_id":"cust_00000000000002",
  "status":"authenticated",
  "current_start":null,
  "current_end":null,
  "ended_at":null,
  "quantity":3,
  "notes":{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "charge_at":1580453311,
  "start_at":1580453311,
  "end_at":1606588200,
  "auth_attempts":0,
  "total_count":6,
  "paid_count":0,
  "customer_notify":true,
  "created_at":1580283807,
  "expire_by":1580626111,
  "short_url":"https://rzp.io/i/yeDkUKy",
  "has_scheduled_changes":false,
  "change_scheduled_at":null,
  "source": "api",
  "offer_id":"offer_JHD834hjbxzhd38d",
  "remaining_count":6
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "subscriptions cannot be updated when payment mode is UPI"
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier linked to a Subscription. For example, `sub_00000000000001`.

### Parameters

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

Subscriptions cannot be updated when payment mode is UPI
* code: 400
* description: This error occurs when you are trying to update a Subscription authorised via UPI.
* solution: You cannot update a Subscription authorised via UPI mode or Emandate.

 
Can't update Subscription when Subscription is not in Authenticated or Active state
* code: 400
* description: This error occurs when you are trying to update a Subscription in the created state.
* solution: Ensure that the Subscription status is either in the authenticated or active state.
