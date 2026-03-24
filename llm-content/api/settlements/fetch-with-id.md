---
title: Fetch Settlements With ID
description: Fetch Settlements with Razorpay Settlements id.
---

# Fetch Settlements With ID

## Fetch Settlements With ID

Use this endpoint to retrieve details of a settlement with its id.

### Request

```cURL: Curl
curl -u :\
- X GET \
https://api.razorpay.com/v1/settlements/setl_DGlQ1Rj8os78Ec

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String settlementId = "setl_DGlQ1Rj8os78Ec";

Settlement settlement = razorpay.settlement.fetch(settlementId);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))
The following endpoint retrieves the
client.settlement.fetch(settlementId)

```php: PHP
$api = new Api($key_id, $secret);

$api->settlement->fetch($settlementId);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.settlements.fetch(settlementId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

settlementId = "setl_DGlQ1Rj8os78Ec"

Razorpay::Settlement.fetch(settlementId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Settlement.Fetch("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string settlementId = "setl_Z6t7VFTb9xXXXX";

Settlement settlement = client.Settlement.Fetch(settlementId);
```

### Response

```json: Success
{
    "id": "setl_DGlQ1Rj8os78Ec",
    "entity": "settlement",
    "amount": 9973635,
    "status": "processed",
    "fees": 0,
    "tax": 0,
    "utr": "1568176960vxp0rj",
    "created_at": 1568176960
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
: `string` The unique identifier of the settlement to be retrieved.

### Parameters

  `id`
: `string` The unique identifier of the settlement transaction. For example, `setl_7IZKKI4Pnt2kEe`

`entity`
: `string` Indicates the type of entity. Here, it is `settlement`.

`amount`
: `integer` The amount to be settled (in the smallest unit of currency). For example,  will be `50000`.

`status`
: `string` Indicates the [settlement states](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/settlements/#settlement-states.md). Possible values:
  - `created`
  - `processed`
  - `failed`

`fees`
: `integer` This is the total fee charged for processing all payments received from customers settled to you in this settlement transaction. In case of a normal settlement, the fee charge will be `0`.

`tax`
: `integer` The total tax, in currency subunits, charged on the fees collected to process all payments received from customers settled to you in this settlement transaction. In case of a normal settlement, the tax charge will be `0`.

`utr`
: `string` The Unique Transaction Reference (UTR) number available across banks, which can be used to track a particular settlement in your bank account. For example, `1597813219e1pq6w`.

`created_at`
: `integer` Unix timestamp at which the settlement transaction was created.

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.

The id provided does not exist.
* code: 400
* description: The settlement id does not belong to the requestor or does not exist.
* solution: Use a valid settlement id that belongs to the requestor.
