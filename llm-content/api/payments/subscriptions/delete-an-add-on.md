---
title: Delete an Add-on
description: Delete an Add-on by its unique ID.
---

# Delete an Add-on

## Delete an Add-on

Use this endpoint to delete an add-on.

**Handy Tips**

You cannot delete an add-on associated with an invoice.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X DELETE https://api.razorpay.com/v1/addons/ao_00000000000001 \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String addonId = "ao_00000000000001";

List addon = razorpay.addons.delete(addonId)

```php: PHP
$api = new Api($key_id, $secret);

$api->addon->fetch($addonId)->delete();

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.addons.delete(addonId)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.addon.delete(addonId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Addon.delete("ao_00000000000001")

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

addonId := "ao_Jey1r0000000" 
body, err := client.Addon.Delete(addonId, nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string addonId = "ao_00000000000001";

List addon = client.Addon.Fetch(addonId).Delete();
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
: `string` The unique identifier of an add-on. For example, `ao_00000000000001`.

### Parameters

`id`
: `string` The unique identifier of the created add-on. For example, `ao_00000000000001`.

`quantity`
: `integer` This specifies the number of units of the add-on to be charged to the customer. For example, `2`. The total amount is calculated as `amount` * `quantity`.

`created_at`
: `integer` The  Unix timestamp, indicates when the add-on was created. For example, `1581597318`.

`subscription_id`
: `string` The unique identifier of the Subscription to which the add-on is being added. For example, `sub_00000000000001`.

`invoice_id`
: `string` The add-on is added to the next invoice that is generated after it is created. This field is populated only after the invoice is generated. Until then, it is `null`. Once the add-on is linked to an invoice, it cannot be deleted.

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs due to a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution: Ensure that the API keys are active and correctly entered, with no whitespaces before or after the keys.
