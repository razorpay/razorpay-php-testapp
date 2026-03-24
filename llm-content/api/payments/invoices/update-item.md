---
title: Update an Item
description: Update an Item details using this endpoint.
---

# Update an Item

## Update an Item

Use this endpoint to update the details of an item. You can also edit the details of a created item from the Dashboard by clicking on that specific item from the list of items.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
  -H "Content-Type: application/json" \
  -X PATCH https://api.razorpay.com/v1/items/item_7Oy8OMV6BdEAac \
  -d '{
        "name":"Book / Ignited Minds - Updated name!",
        "description":"New descirption too."
      }'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String itemId = "item_7Oy8OMV6BdEAac";

JSONObject itemRequest = new JSONObject();
itemRequest.put("name","Book / Ignited Minds - Updated name!");
itemRequest.put("description","An indian story, Booker prize winner.");
itemRequest.put("amount", 20000);
itemRequest.put("currency","");
itemRequest.put("active",true);
              
Item item = razorpay.items.edit(itemId, itemRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.item.edit({
  "name": "Book / Ignited Minds - Updated name!",
  "description": "New descirption too.",
  "amount": 20000,
  "currency": "",
  "active": true
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

itemId = "item_7Oy8OMV6BdEAac"

para_attr = {
  "name": "Book / Ignited Minds - Updated name!",
  "description": "New descirption too.",
  "amount": 20000,
  "currency": "",
  "active": true
}

Razorpay::Item.edit(itemId,para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
    "name": "Book / Ignited Minds - Updated name!",
    "description": "New descirption too.",
    "amount": 20000,
    "currency": "",
    "active": true,
}
body, err := client.Item.Update("", data, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->Item->fetch($itemId)->edit(array("name" => "Book / Ignited Minds - Updated name!","description" => "New descirption too.","amount" => 20000,"currency" => "","active" => true
));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.Items.edit({
  "name": "Book / Ignited Minds - Updated name!",
  "description": "New descirption too.",
  "amount": 20000,
  "currency": "",
  "active": true
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

itemId = "item_JDcbIdX9xojCje"

para_attr = {
  "name": "Book / Ignited Minds - Updated name!",
  "description": "New descirption too.",
  "amount": 20000,
  "currency": "",
  "active": true
}

Razorpay::Item.edit(itemId,para_attr)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string itemId = "item_7Oy8OMV6BdEAac";

Dictionary itemRequest = new Dictionary();
itemRequest.Add("name", "Book / Ignited Minds - Updated name!");
itemRequest.Add("description", "An indian story, Booker prize winner.");
itemRequest.Add("amount", 20000);
itemRequest.Add("currency", "");
itemRequest.Add("active", true);

Item payment = client.Item.Fetch(itemId).Edit(itemRequest);
```

### Response

```json: Success
{
  "id": "item_7Oy8OMV6BdEAac",
  "active": true,
  "name": "Book / Ignited Minds - Updated name!",
  "description": "New descirption too.",
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
: `string` The unique identifer of the item whose details are to be updated.

### Parameters

`name` _optional_
: `string` The name of the item.

`description` _optional_
: `string` A brief description about the item.

`amount` _optional_
: `integer` The price of the item in the lowest unit of currency.

`currency` _optional_
: `string` The currency in which the amount should be charged. Check the list of [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

`active` _optional_
: `boolean` Indicates the status of the item. Possible values:
  - `true` (default): Item is in the active state.
  - `false`: Item is in the inactive state.

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
* description: The API key or secret are not entered or an invalid API key is used.
* solution: Use and enter the correct API details while executing the API.

The id provided does not exist.
* code: 400
* description: The invoice id entered is either invalid or does not belong to the requester account.
* solution: Enter a valid invoice id.

The amount field is required when item id is not present.
* code: 400
* description: Only name is entered without item id or amount.
* solution: Provide either the item id or the amount with the name.

The name field is required when item id is not present.
* code: 400
* description:  Possible reasons: - Only the amount field is entered without a name or item id.
- The amount, name or item id are not entered.

* solution: Provide the name field of the item when passing the amount.
