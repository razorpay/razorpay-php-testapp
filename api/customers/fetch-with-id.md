---
title: Fetch Customer With ID
description: Fetch Customer With id using Razorpay Customers API.
---

# Fetch Customer With ID

## Fetch Customer With ID

Use this endpoint to retrieve details of a customer with id.

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/customers/cust_1Aa00000000001 \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_1Aa00000000001";

Customer customer = razorpay.customers.fetch(customerId);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.customer.fetch(customerId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

customerId := "cust_1Aa00000000001"

body, err := client.Customer.Fetch(customerId, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.fetch(customerId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000001"

Razorpay::Customer.fetch(customerId)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
 
string customerId = "cust_1Aa00000000001";

Customer customer = client.Customer.Fetch("cust_M462yViJrhNrQc");
```

### Response

```json: Success
{
  "id": "cust_1Aa00000000001",
  "entity": "customer",
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9123456780",
  "gstin": null,
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "created_at": 1655298731
}
```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "LQPd9lomgwDE5Fs is not a valid id",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {}
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier linked to the customer.

### Parameters

`id`
: `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

`entity` _optional_
: `string` Indicates the type of entity.

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

id is not a valid id.
* code: 400
* description: The `customer_id` passed is invalid.
* solution: Use a valid `customer_id`.

The id provided does not exist.
* code: 400
* description: The `customer_id` does not exist or does not belong to the requestor.
* solution: Ensure that you use a valid `customer_id` that belongs to the requestor.
