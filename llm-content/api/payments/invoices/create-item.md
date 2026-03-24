---
title: Create an Item
description: Create an Item with basic details such as name and amount.
---

# Create an Item

## Create an Item

Use this endpoint to create an item with basic details such as name and amount. After an item is created, it appears on the list of created items and in the drop-down menu at the time of invoice creation.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
  -H "Content-Type: application/json" \
  -X POST https://api.razorpay.com/v1/items \
  -d '{
        "name":"Book / English August",
        "description":"An indian story, Booker prize winner.",
        "amount": 20000,
        "currency": ""
      }'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject itemRequest = new JSONObject();
itemRequest.put("name","Book / English August");
itemRequest.put("description","An indian story, Booker prize winner.");
itemRequest.put("amount", 20000);
itemRequest.put("currency","");

Item item = razorpay.items.create(itemRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.item.create({
  "name": "Book / English August",
  "description": "An indian story, Booker prize winner.",
  "amount": 20000,
  "currency": ""
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Item.create({
  "name": "Book / English August",
  "description": "An indian story, Booker prize winner.",
  "amount": 20000,
  "currency": ""
});

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
    "name": "Book / English August",
    "description": "An indian story, Booker prize winner.",
    "amount": 20000,
    "currency": "",
}
body, err := client.Item.Create(data, nil)

  ```php: PHP
$api = new Api($key_id, $secret);

$api->Item->create(array("name" => "Book / English August","description" => "An indian story, Booker prize winner.","amount" => 20000,"currency" => ""));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.Items.create({
  "name": "Book / English August",
  "description": "An indian story, Booker prize winner.",
  "amount": 20000,
  "currency": ""
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Item.create({
  "name": "Book / English August",
  "description": "An indian story, Booker prize winner.",
  "amount": 20000,
  "currency": ""
});

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary itemRequest = new Dictionary();
itemRequest.Add("name", "Book / English August");
itemRequest.Add("description", "An indian story, Booker prize winner.");
itemRequest.Add("amount", 20000);
itemRequest.Add("currency", "");

Item item = client.Item.Create(itemRequest);
```

### Response

```json: Success
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

`name` _mandatory_
: `string` Name of the item.

`description` _optional_
: `string` A brief description about the item.

`amount` _mandatory_
: `integer` The price of the item. In the case of three decimal currencies, such as KWD, BHD and OMR, to refund a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to refund a payment of 295, pass the value as `295`.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to refund a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`currency` _mandatory_
: `string` The currency in which the amount should be charged. Check the list of [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

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
 
The currency field is required.
* code: 400
* description: The currency field is blank.
* solution: Ensure that the currency field is added with a valid currency code.

The merchant doesn't have international activated
* code: 400
* description: This happens when an international currency code is added.
* solution: Ensure that the currency field is added with a valid currency code.

The amount must be at least INR 1.00
* code: 400
* description: This happens when the amount added in the amount field is less than INR 1.
* solution: Ensure that the amount is INR 1 or greater.
