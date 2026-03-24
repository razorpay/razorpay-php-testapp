---
title: Fetch All Items
description: Retrieve all the Items created till date.
---

# Fetch All Items

## Fetch All Items

Use this endpoint to retrieve the details of all the items created till date.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
  - X GET https://api.razorpay.com/v1/items/ \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
params.put("count","1");

List item = razorpay.items.fetchAll(params);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.item.all(options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

options = {"count":1}

Razorpay::Item.all(options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

options:= map[string]interface{}{
    "count": 2,
    "skip": 1,
}
body, err := client.Item.All(options, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->Item->all($options);
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.items.all(options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

options = {"count":2}

Razorpay::Item.all(options)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary itemRequest = new Dictionary();
itemRequest.Add("count","1");

List item = client.Item.All();
```

### Response

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "item_JInaSLODeDUQiQ",
      "active": true,
      "name": "Book / English August",
      "description": "An indian story, Booker prize winner.",
      "amount": 20000,
      "unit_amount": 20000,
      "currency": "",
      "type": "invoice",
      "unit": null,
      "tax_inclusive": false,
      "hsn_code": null,
      "sac_code": null,
      "tax_rate": null,
      "tax_id": null,
      "tax_group_id": null,
      "created_at": 1649843796
    },
    {
      "id": "item_JIPSg5L06yhHie",
      "active": false,
      "name": "Book / Ignited Minds - Updated name!",
      "description": "New descirption too. :).",
      "amount": 20000,
      "unit_amount": 20000,
      "currency": "INR",
      "type": "invoice",
      "unit": null,
      "tax_inclusive": false,
      "hsn_code": null,
      "sac_code": null,
      "tax_rate": null,
      "tax_id": null,
      "tax_group_id": null,
      "created_at": 1649758835
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

`from`
: `integer` Unix timestamp, in seconds, from when the items are to be fetched.

`to`
: `integer` Unix timestamp, in seconds, till when the items are to be fetched.

`count`
: `integer` Number of items to be fetched.
  - Default value: `10`
  - Maximum value: `100` 
  - This can be used for pagination, in combination with the `skip` parameter.

`skip`
: `integer` Number of records to be skipped while fetching the items.

`active`
: `integer` Fetches number of active or inactive items.
  - The value is `1` for active items.
  - The value is `0` for inactive items.

### Parameters

`id`
: `string` The unique identifier of the item.

`active`
: `boolean` Indicates the status of the item. Possible values:
  - `true` (default): Item is in the active state.
  - `false`: Item is in the inactive state.

`name`
: `string` The name of the item.

`description`
: `string` A text description about the item.

`amount`
: `integer` The price of the item.

`unit_amount`
: `integer` The per unit billing amount for each individual unit.

`currency`
: `string` The currency in which the amount should be charged. Check the list of [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

`type`
: `string` Here, it must be `invoice`.

`unit`
: `integer` The number of units of the item billed in the invoice.

`tax_inclusive`
: `boolean` Indicates whether the base amount includes tax.
  - `true`: The base amount includes tax.
  - `false`: The base amount does not include tax. By default, the value is set to `false`.

`hsn_code`
: `integer` The 8-digit code used to classify the product as per the Harmonised System of Nomenclature.

`sac_code`
: `integer` The 6-digit code used to classify the service as per the Services Accounting Code.

`tax_rate`
: `string` The percentage at which an individual or a corporation is taxed.

`tax_id`
: `string` The identification number that gets displayed on invoices issued to the customer.

`tax_group_id`
: `string` The identification number for the tax group. A tax group is a collection of taxes that can be applied as a single set of rules. 

`created_at`
: `integer` Unix timestamp, at which the item was created. For example, `1649843796`.

### Errors

The API `` provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.- Different keys for test mode and live modes.
- Expired API key.

* solution: The API keys must be active and entered correctly with no whitespace before or after the keys.
