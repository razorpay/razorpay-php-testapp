---
title: Fetch All Settlements
description: Fetch All Settlements using Razorpay Settlements API.
---

# Fetch All Settlements

## Fetch All Settlements

Use this endpoint to retrieve details of all settlements.

### Request

```cURL: Curl
curl -u :\
- X GET \
https://api.razorpay.com/v1/settlements/

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

List settlements = razorpay.settlement.fetchAll();

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.settlement.all(options)

```php: PHP 
$api = new Api($key_id, $secret);

$api->settlement->all($options);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.settlements.all(options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {"count": 2}

Razorpay::Settlement.all(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

options:= map[string]interface{}{
  "count": 2,
  "skip": 1,
}
body, err := client.Settlement.All(options, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

List payment = client.Settlement.All();
```

### Response

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "setl_DGlQ1Rj8os78Ec",
      "entity": "settlement",
      "amount": 9973635,
      "status": "processed",
      "fees": 0,
      "tax": 0,
      "utr": "1568176960vxp0rj",
      "created_at": 1568176960
    },
    {
      "id": "setl_4xbSwsPABDJ8oK",
      "entity": "settlement",
      "amount": 50000,
      "status": "processed",
      "fees": 0,
      "tax": 0,
      "utr": "RZRP173069230702",
      "created_at": 1509622306
    }
  ]
}

```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The count must be at least 1.",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {},
        "field": "count"
    }
}
```

### Parameters

`from` _optional_
: `integer` Unix timestamp (in seconds) from when settlements are to be fetched.

`to` _optional_
: `integer` Unix timestamp (in seconds) till when settlements are to be fetched.

`count` _optional_
: `integer` Number of settlement records to be fetched. 
  - Default value: `10`.
  - Possible value: `1` to `100`.
  - This can be used for pagination, in combination with `skip`.

`skip` _optional_
: `integer` Number of settlement records to be skipped. 
  - Default value: `0`
  - This can be used for pagination, in combination with `count`.

### Parameters

  `id`
: `string` The unique identifier of the settlement transaction. For example, `setl_7IZKKI4Pnt2kEe`

`entity`
: `string` Indicates the type of entity. Here, it is `settlement`.

`amount`
: `integer` The amount to be settled (in the smallest unit of currency). For example,  will be `50000`.

`status`
: `string` Indicates the [settlement states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements.md#settlement-states). Possible values:
  - `created`
  - `processed`
  - `failed`

`fees`
: `integer` This is the total fee charged for processing all payments received from customers settled to you in this settlement transaction. In case of a normal settlement the fee charge will be `0`.

`tax`
: `integer` The total tax, in currency subunits, charged on the fees collected to process all payments received from customers settled to you in this settlement transaction. In case of a normal settlement the tax charge will be `0`.

`utr`
: `string` The Unique Transaction Reference (UTR) number available across banks, which can be used to track a particular settlement in your bank account. For example, `1597813219e1pq6w`.

`created_at`
: `integer` Unix timestamp at which the settlement transaction was created.

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.

from must be between 946684800 and 4765046400.
* code: 400
* description: The `from` UNIX timestamp is not between `946684800` and `4765046400`.
* solution: Use a valid UNIX timestamp between `946684800` and `4765046400`.

to must be between 946684800 and 4765046400.
* code: 400
* description: The `to` UNIX timestamp is not between `946684800` and `4765046400`.
* solution: Use a valid UNIX timestamp between `946684800` and `4765046400`.

The count must be at least 1.
* code: 400
* description: The count passed is `0`.
* solution: Ensure that count is at least `1`.
