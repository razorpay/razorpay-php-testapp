---
title: Fetch Refund With ID
description: Fetch Refund With id using Razorpay Refunds API.
---

# Fetch Refund With ID

## Fetch Refund With ID

Use this endpoint to retrieve the refund using the id.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \

-X GET https://api.razorpay.com/v1/refunds/rfnd_DfjjhJC6eDvUAi

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String refundId = "rfnd_DfjjhJC6eDvUAi";

List refund = razorpay.refunds.fetch(refundId);

```php: PHP
$api = new Api($key_id, $secret);

$api->refund->fetch($refundId);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.refund.fetch(refundId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

refundId = "rfnd_DfjjhJC6eDvUAi"

Razorpay::Refund.fetch(refundId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Refund.Fetch("", nil, nil)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.refunds.fetch(refundId)

```csharp: .NET
//initialize the SDK client
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string refundId = "rfnd_Z6t7VFTb9xHeOs";

Refund refund = client.Refund.Fetch(refundId);
```

### Response

```json: Success
{
  "id": "rfnd_DfjjhJC6eDvUAi",
  "entity": "refund",
  "amount": 6000,
  "currency": "INR",
  "payment_id": "pay_EpkFDYRirena0f",
  "notes": {
    "comment": "Issuing an instant refund"
  },
  "receipt": null,
  "acquirer_data": {
    "arn": "10000000000000"
  },
  "created_at": 1589521675,
  "batch_id": null,
  "status": "processed",
  "speed_processed": "optimum",
  "speed_requested": "optimum"
}

```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The requested URL was not found on the server.",
        "source": "NA",
        "step": "NA",
        "reason": "NA",
        "metadata": {}
    }
}
```

### Parameters

`id` _mandatory_
: `string` Unique identifier of the refund which is to be retrieved.

### Parameters

`id`
: `string` The unique identifier of the refund. For example, `rfnd_FgRAHdNOM4ZVbO`.

`entity`
: `string` Indicates the type of entity. Here, it is `refund`.

`amount`
: `integer` The amount to be refunded (in the smallest unit of currency). 
 For example, if the refund value is , it will be `3000`.

`currency`
: `string` The currency of payment amount for which the refund is initiated. Check the list of [supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

`payment_id`
: `string` The unique identifier of the payment for which a refund is initiated. For example, `pay_FgR9UMzgmKDJRi`.

`created_at`
: `integer` Unix timestamp at which the refund was created. For example, `1600856650`.

`batch_id`
: `string` This parameter is populated if the refund was created as part of a batch upload. For example, `batch_00000000000001`.

`notes`
: `json object` Key-value store for storing your reference data. A maximum of 15 key-value pairs can be included. For example, `"note_key": "Beam me up Scotty”`.

`receipt`
: `string` A unique identifier provided by you for your internal reference.

`acquirer_data`
: `array` A dynamic array consisting of a unique reference number (either RRN, ARN or UTR) that is provided by the banking partner when a refund is processed. This reference number can be used by the customer to track the status of the refund with the bank.

`status`
: `string` Indicates the state of the refund. Possible values:
  - `pending`: This state indicates that Razorpay is attempting to process the refund.
  - `processed`: This is the final state of the refund.
  - `failed`: A refund can attain the failed state in the following scenarios:

     - Normal refund is not possible for a payment which is more than 6 months old.

     - Instant Refund can sometimes fail because of customer's account or bank-related issues.

`speed_requested`
: `string` The processing mode of the refund seen in the refund response. 
 This attribute is seen in the refund response only if the `speed` parameter is set in the refund request.
Possible values:
  - `normal`: Indicates that the refund will be processed via the normal speed. The refund will take 5-7 working days.
  - `optimum`: Indicates that the refund will be processed at an optimal speed based on Razorpay's internal fund transfer logic.
     - If the refund can be processed instantly, Razorpay will do so, irrespective of the payment method used to make the payment.
     - If an instant refund is not possible, Razorpay will initiate a refund that is processed at the normal speed.

`speed_processed`
: `string` This is a parameter in the response which describes the mode used to process a refund. 
 This attribute is seen in the refund response only if the `speed` parameter is set in the refund request. Possible values:
  - `instant`: Indicates that the refund has been processed instantly via fund transfer.
  - `normal`: Indicates that the refund has been processed by the payment processing partner. The refund will take 5-7 working days.

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.

The requested URL was not found on the server.
* code: 400
* description: Possible reasons: - The URL is wrong or is missing something.
- A GET API is executed by POST method.
 
* solution: - Ensure that the URL is correct and complete.
- Use the correct method, that is, GET.

_id is not a valid id
* code: 400
* description: The refund id entered is invalid.
* solution: Use a valid refund id.

The id provided does not exist
* code: 400
* description: The refund id entered is incomplete or invalid.
* solution: Use a complete and valid refund id.
