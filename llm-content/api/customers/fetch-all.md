---
title: Fetch All Customers
description: Fetch all Customers using Razorpay Customers API.
---

# Fetch All Customers

## Fetch All Customers

Use this endpoint to retrieve the details of all the customers.

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/customers?count=2&skip=1

```Java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
params.put("count","1");

List customer = razorpay.customers.fetchAll(params);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.customer.all(options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

optional := map[string]interface{}{
	  "count":1,
	}

body, err := client.Customer.All(optional, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->all($options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

options = {"count": 2}

Razorpay::Customer.all(options)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.all(options) 

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paramRequest = new Dictionary();
paramRequest.Add("count","1");

List card = client.Customer.All(paramRequest);

```

### Response

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "cust_LQPdeJqQeKQrJM",
      "entity": "customer",
      "name": "Gaurav Kumar",
      "email": "gaurav.kumar@example.com",
      "contact": "+919876543210",
      "gstin": null,
      "notes": [],
      "created_at": 1678580352
    },
    {
      "id": "cust_LQPd9lomgwDE5F",
      "entity": "customer",
      "name": "Saurav Kumar",
      "email": "saurav.kumar@example.com",
      "contact": "+919876543210",
      "gstin": null,
      "notes": [],
      "created_at": 1678580324
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

`count` _optional_
: `integer` The number of customer records to be retrieved from the system. The default value is 10. The maximum value is 100. This can be used for pagination in combination with `skip`.

`skip` _optional_
: `integer`  The number of customer records that must be skipped. The default value is 0. This can be used for pagination in combination with `count`.

### Parameters

`entity` _optional_
: `string` Indicates the type of entity.

`id`
: `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

`name` 
: `string` Customer's name. Alphanumeric, with period (.), apostrophe ('), forward slash (/), at (@) and parentheses allowed. The name must be between 3-50 characters in length. For example, `Gaurav Kumar`.

`contact`
: `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919876543210`.

`email`
: `string` The customer's email address. A maximum length of 64 characters. For example, `gaurav.kumar@example.com`.

`gstin`
: `string` GST number linked to the customer. For example, `29XAbbA4369J1PA`.

`notes`
: `string` This is a key-value pair that can be used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` UNIX timestamp, when the customer was created. For example, `1234567890`.

### Errors

The API `` provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.

* solution: The API keys must be active and entered correctly with no whitespace before or after the keys.
