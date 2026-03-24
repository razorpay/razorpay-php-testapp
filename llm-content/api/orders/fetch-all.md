---
title: Fetch All Orders
description: Fetch all Orders using Razorpay Orders API.
---

# Fetch All Orders

## Fetch All Orders

Use this endpoint to retrieve the details of all the orders you created. In this example, **count and skip query parameters** have been used. You can invoke this API without these query parameters as well.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]\
-X GET https://api.razorpay.com/v1/orders?count=2&skip=1

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
params.put("count","1");

List order = razorpay.orders.fetchAll(params);

```python: Python
# do easy_install razorpay or
#    pip install razorpay
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.all(option)
```php: PHP
$api = new Api($key_id, $secret);

$api->order->all($options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

option = {"count":1}

Razorpay::Order.all(option)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.all(option)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

options := map[string]interface{}{
  "count": 1,
}
body, err := client.Order.All(options, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("count","1");

List order = client.Order.All(orderRequest);

```

### Response

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "order_EKzX2WiEWbMxmx",
      "entity": "order",
      "amount": 1234,
      "amount_paid": 0,
      "amount_due": 1234,
      "currency": "",
      "receipt": "Receipt No. 1",
      "offer_id": null,
      "status": "created",
      "attempts": 0,
      "notes": [],
      "created_at": 1582637108
    },
    {
      "id": "order_EAI5nRfThga2TU",
      "entity": "order",
      "amount": 100,
      "amount_paid": 0,
      "amount_due": 100,
      "currency": "",
      "receipt": "Receipt No. 1",
      "offer_id": null,
      "status": "created",
      "attempts": 0,
      "notes": [],
      "created_at": 1580300731
    }
  ]
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

`authorized`_optional_
: `integer` Possible values:
  - `1` : Retrieves Orders for which payments have been authorized. Payment and order states differ. Know more about [payment states](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/#payment-life-cycle.md).
  - `0` : Retrieves orders for which payments have not been authorized.

`receipt`_optional_
: `string` Retrieves the orders that contain the provided value for receipt.

`from`_optional_
: `integer` Timestamp (in Unix format) from when the orders should be fetched.

`to`_optional_
: `integer` Timestamp (in Unix format) up till when orders are to be fetched.

`count`_optional_
: `integer` The number of orders to be fetched. The default value is 10. The maximum value is 100. This can be used for pagination, in combination with `skip`.

`skip`_optional_
: `integer` The number of orders to be skipped. The default value is `0`. This can be used for pagination, in combination with `count`.

`expand[]`_optional_
: `array` Used to retrieve additional information about the payment. Using this parameter will cause a sub-entity to be added to the response. Supported values are:- `payments`: Returns a collection of all payments made for each order.
- `payments.card`: Returns the card details of each payment made for each order.
- `transfers`: Returns a collection of transfers created for each order. 
For more information about creating transfers using orders, refer to the [Route](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/route.md) section of the [Route API](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/route.md) documentation.
- `virtual_account`: Returns the virtual account details created for each order. 
For more information about creating Virtual Accounts, refer to the [Smart Collect API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect.md)

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
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters. Refer to the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).  

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
