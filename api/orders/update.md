---
title: Update an Order
description: Update an Order using Razorpay Orders API.
---

# Update an Order

## Update an Order

Use this endpoint to update an Order. - You can modify an existing order to update the `Notes` field **only**.
-  Notes can be used to record additional information about the order.
-  A key-value store, the `notes` field can have a maximum of 15 key-value pairs, each of 256 characters (maximum).
 

 

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]\
-X PATCH https://api.razorpay.com/v1/orders/order_DaaS6LOUAASb7Y \
-d '{
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String orderId = "order_DaaS6LOUAASb7Y";

JSONObject orderRequest = new JSONObject();
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_1","Tea, Earl Grey, Hot");
orderRequest.put("notes",notes);
              
Order order = razorpay.orders.edit(orderId,orderRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.edit(orderId,{
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
})

```php: PHP
$api = new Api($key_id, $secret);

$api->order->fetch($orderId)->edit(array('notes'=> array('notes_key_1'=>'Beam me up Scotty. 1', 'notes_key_2'=>'Engage')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.edit(orderId,{
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

orderId = "order_DaaS6LOUAASb7Y"

para_attr = {
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
}

Razorpay::Order.edit(orderId,para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "notes": map[string]interface{}{
        "notes_key_1": "value1",
        "notes_key_2": "value2",
      }, 
}
body, err := client.Order.Update("", data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string orderId = "order_Z6t7VFTb9xHeOs";

Dictionary orderRequest = new Dictionary();
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey, Hot Update");
orderRequest.Add("notes", notes);

Order order = client.Order.Fetch(orderId).Edit(orderRequest);
```

### Response

```json: Success
{
  "id":"order_DaaS6LOUAASb7Y",
  "entity":"order",
  "amount":2200,
  "amount_paid":0,
  "amount_due":2200,
  "currency":"",
  "receipt":"Receipt #211",
  "offer_id":null,
  "status":"attempted",
  "attempts":1,
  "notes": {
    "key1": "value3",
    "key2": "value2"
  },
  "created_at":1572505143
}

```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The id provided does not exist",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {}
    }
}
```

### Parameters

`id` _mandatory_
: `string` Unique identifier of the order in which the `Notes` field must be updated.

### Parameters

`notes` _mandatory_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Parameters

`id`
: `string` The unique identifier of the order.

`amount`
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

`entity`
: `string` Name of the entity. Here, it is `order`.

`amount_paid`
: `integer` The amount paid against the order.

`amount_due`
: `integer` The amount pending against the order.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters.

`receipt`
: `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

`status`
: `string` The status of the order. Possible values:
  - `created`: When you create an order it is in the `created` state. It stays in this state till a payment is attempted on it.
  - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
  - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` Indicates the Unix timestamp when this order was created.

### Errors

The API `` provided is invalid.
* code: 400
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.

* solution: The API keys must be active and entered correctly with no whitespace before or after the keys.
 
id is not a valid id.
* code: 400
* description: The `order_id` passed is invalid.
* solution: Use a valid `order_id`.

The id provided does not exist
* code: 400
* description: The `order_id` does not exist or does not belong to the requestor.
* solution: Ensure that you use a valid `order_id` that belongs to the requestor.
