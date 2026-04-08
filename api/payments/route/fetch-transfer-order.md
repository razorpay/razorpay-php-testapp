---
title: Fetch Transfer for an Order
description: Fetch Transfer for an order using the Razorpay API.
---

# Fetch Transfer for an Order

## Fetch Transfer for an Order

Use this endpoint to retrieve the collection of all transfers created on a specific order id.

### Request

```curl: Curl
curl -X GET https://api.razorpay.com/v1/orders/order_DSkl2lBNvueOly/?expand[]=transfers&status=processing \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \ 

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject request = new JSONObject();
request.put("expand[]","transfers");

Order response = razorpayclient.orders.get("orders/order_JJCYnu3hipocHz",request);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->fetch($orderId)->transfers(array('expand[]'=>'transfers'));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.fetchTransferOrder(orderId)

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.fetch(orderId, {
  "expand[]": "transfers"
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

orderId = "order_JJCYnu3hipocHz"

Razorpay::Order.fetch_transfer_order(orderId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "expand[]": "transfers",
}
body, err := client.Order.Fetch("", data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]
");

string orderId = "order_JkaIDdkgGXVcwS";

Dictionary transferRequest = new Dictionary();
transferRequest.Add("expand[]", "transfers");

Order token = client.Order.Fetch(orderId, transferRequest);
```

### Response

```json: Success
{
  "id": "order_JJCYnu3hipocHz",
  "entity": "order",
  "amount": 2000,
  "amount_paid": 0,
  "amount_due": 2000,
  "currency": "INR",
  "receipt": null,
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1649931742,
  "transfers": {
    "entity": "collection",
    "count": 2,
    "items": [
      {
        "id": "trf_JJCYnw77tqUT9r",
        "entity": "transfer",
        "status": "created",
        "source": "order_JJCYnu3hipocHz",
        "recipient": "acc_IRQWUleX4BqvYn",
        "amount": 1000,
        "currency": "INR",
        "amount_reversed": 0,
        "fees": 0,
        "tax": null,
        "notes": {
          "branch": "Acme Corp Bangalore North",
          "name": "Gaurav Kumar"
        },
        "linked_account_notes": [
          "branch"
        ],
        "on_hold": true,
        "on_hold_until": 1671222870,
        "settlement_status": null,
        "recipient_settlement_id": null,
        "created_at": 1649931742,
        "processed_at": null,
        "error": {
          "code": null,
          "description": null,
          "reason": null,
          "field": null,
          "step": null,
          "id": "trf_JJCYnw77tqUT9r",
          "source": null,
          "metadata": null
        }
      },
      {
        "id": "trf_JJCYnxe5GV19Kk",
        "entity": "transfer",
        "status": "created",
        "source": "order_JJCYnu3hipocHz",
        "recipient": "acc_IROu8Nod6PXPtZ",
        "amount": 1000,
        "currency": "INR",
        "amount_reversed": 0,
        "fees": 0,
        "tax": null,
        "notes": {
          "branch": "Acme Corp Bangalore South",
          "name": "Saurav Kumar"
        },
        "linked_account_notes": [
          "branch"
        ],
        "on_hold": false,
        "on_hold_until": null,
        "settlement_status": null,
        "recipient_settlement_id": null,
        "created_at": 1649931742,
        "processed_at": null,
        "error": {
          "code": null,
          "description": null,
          "reason": null,
          "field": null,
          "step": null,
          "id": "trf_JJCYnxe5GV19Kk",
          "source": null,
          "metadata": null
        }
      }
    ]
  }
}

```json: Failure
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"The api key provided is invalid",
      "source":"NA",
      "step":"NA",
      "reason":"NA",
      "metadata":{
         
      }
   }
}
```

### Parameters

`id` _mandatory_
: `string` Unique identifier of the Order for which transfers must be retrieved.

### Parameters

`expand` _mandatory_
: `array` Used to retrieve details regarding the transfers initiated via an order. Supported value is `transfers`.

`status` _optional_
: `string` Status of the transfer.

### Parameters

`id` 
: `string`  Unique identifier of the transfer.

`entity`
: `string` The name of the entity. Here, it is `transfer`.

`transfer_status`
: `string` The status of the transfer. Possible values are:
    - `created`
    - `pending`
    - `processed`
    - `failed`
    - `reversed`
    - `partially_reversed`

`settlement_status`
: `string` The status of the settlement. Possible values are:
    - `pending`
    - `on_hold`
    - `settled`

`source` 
: `string` Unique identifier of the transfer source. The source can be a `payment` or an `order`.

`recipient` 
: `string` Unique identifier of the transfer destination, that is, the Linked Account.

`amount` 
: `integer` The amount to be transferred to the Linked Account, in paise. For example, for an amount of ₹200.35, the value of this field should be 20035.

`currency` 
: `string`  ISO currency code. We support route transfers only in `INR`.

`amount_reversed` 
: `integer` Amount reversed from this transfer for refunds.

`notes` 
: `json object` Set of key-value pairs that can be associated with an entity. These pairs can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "Bangalore"`.

`error`
: `string` Provides error details that may occur during transfers.

    `code`
    : `string` Type of the error.

    `description`
    : `string` Error description.

    `field`
    : `string` Name of the parameter in the API request that caused the error.

    `source`
    : `string` The point of failure in the specific operation. For example, customer, business and so on.

    `step`
    : `string` The stage where the transaction failure occurred. Stages can be different depending on the payment method used to make the transaction.

    `id`
    : `string`  Unique identifier of the transfer.

    `reason`
    : `string` The exact error reason. It can be handled programmatically.

`linked_account_notes` 
: `array` List of keys from the `notes` object which needs to be shown to Linked Accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

`on_hold` 
: `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
    - `true`: Puts the settlement on hold.
    - `false`: Releases the settlement.

`on_hold_until` 
: `integer` Timestamp, in Unix format, indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.

`recipient_settlement_id`
: `string` Unique identifier of the settlement.

`created_at` 
: `integer` Timestamp, in Unix, at which the record was created.

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
order_id is not a valid id
* code: 400
* description: This error occurs when you pass an invalid `order_id` in the API endpoint.
* solution: Make sure to pass a vaild `order_id`.
