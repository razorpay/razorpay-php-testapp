---
title: Delete an Item
description: Delete an Item using this endpoint.
---

# Delete an Item

## Delete an Item

Use this endpoint to delete an item.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
  -X DELETE https://api.razorpay.com/v1/items/item_7Oy8OMV6BdEAac \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String itemId = "item_7Oy8OMV6BdEAac";

List item  = razorpay.items.delete(itemId)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.item.delete(itemId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

itemId = "item_7Oy8OMV6BdEAac"

Razorpay::Item.delete(itemId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Item.Delete("", nil, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->Item->fetch($itemId)->delete();
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.Items.delete(itemId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

itemId = "item_7Oy8OMV6BdEAac"

Razorpay::Item.delete(itemId)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string itemId = "item_7Oy8OMV6BdEAac";

List payment = client.Item.Fetch(itemId).Delete();

```

### Response

```json: Success
[]

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
: `string` The unique identifier of the item that must be deleted.

### Errors

The API `` provided is invalid.
* code: 4xx
* description: The API key or secret are not entered or an invalid API key is used.
* solution: Use and enter the correct API details while executing the API.

The id provided does not exist.
* code: 400
* description: The invoice id entered is either invalid or does not belong to the requester account.
* solution: Enter a valid invoice id.
