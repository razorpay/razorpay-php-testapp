---
title: Refund Payments
description: Refund payments made on a QR Code with this endpoint.
---

# Refund Payments

## Refund Payments

Use this endpoint to refund payments made on a QR Code.

### Request

```Curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payments/pay_HKrqmsgBHbaeIM/refund \
-H "Content-Type: application/json" \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String paymentId = "pay_29QQoUBi66xm2f";

JSONObject refundRequest = new JSONObject();
refundRequest.put("amount",100);
refundRequest.put("speed","normal");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
refundRequest.put("notes",notes);
refundRequest.put("receipt","Receipt No. #31");
              
Payment payment = razorpay.payments.refund(paymentId,refundRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->fetch($paymentId)->refund(array("amount"=> "100", "speed"=>"normal", "notes"=>array("notes_key_1"=>"Beam me up Scotty.", "notes_key_2"=>"Engage"), "receipt"=>"Receipt No. 31"));

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.refund(paymentId,{
  "amount": "100",
  "speed": "normal",
  "notes": {
    "notes_key_1": "Beam me up Scotty.",
    "notes_key_2": "Engage"
  },
  "receipt": "Receipt No. 31"
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "speed": "normal",
  "notes": map[string]interface{}{
    "key_1": "value1",
    "key_2": "value2",
  },
}
body, err := client.Payment.Refund("",1200, data, nil)

```ruby: Ruby
require 'razorpay'

Razorpay.setup("YOUR_KEY_ID", "YOUR_KEY_SECRET")
Razorpay::Payment.fetch("pay_29QQoUBi66xm2f").refund()

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.refund(paymentId,{
  "amount": "100",
  "speed": "normal",
  "notes": {
    "notes_key_1": "Beam me up Scotty.",
    "notes_key_2": "Engage"
  },
  "receipt": "Receipt No. 31"
})

```csharp: .NET
//initialize the SDK client
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

// payment to be refunded, payment must be a captured payment
Payment payment = client.Payment.Fetch(paymentId);

//Full Refund
Refund refund = payment.Refund();

//Partial Refund
Dictionary data = new Dictionary();
data.Add("amount", "500100");
Refund refund = payment.Refund(data);
```

### Response

```json: Success
{
  "id": "rfnd_HMtH2fBtD60QkX",
  "entity": "refund",
  "amount": 200,
  "currency": "INR",
  "payment_id": "pay_HKrqmsgBHbaeIM",
  "notes": [],
  "receipt": null,
  "acquirer_data": {
    "rrn": null
  },
  "created_at": 1623663010,
  "batch_id": null,
  "status": "processed",
  "speed_processed": "normal",
  "speed_requested": "normal"
}

```json: Failure 
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "Kbrq5xxQHR8 is not a valid id",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {}
    }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the payment to be refunded.

### Parameters

`amount` _optional_
: `string` Amount to be refunded. If no value is passed, a full refund is issued.

`notes` _optional_
: `object`  Key-value pair that can be used to store additional information about the QR Code. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Parameters

`id`
: `string` The unique identifier of the refund.

`entity`
: `string` Indicates the type of entity. Here, it is `refund`.

`amount`
: `integer` The amount to be refunded (in the smallest unit of currency). 
 For example, refund in INR, a value of 100 means 100 paise (equivalent to ₹1).

`currency`
: `string` The currency of the amount for which refund is initiated.

`payment_id`
: `string` Unique identifier of the payment for which the refund is initiated.

`created_at`
: `integer` Timestamp, in Unix format, when the refund was created.

`batch_id`
: `string` This parameter is populated if the refund was created as part of a batch. upload. For example, `batch_00000000000001`

`notes`
: `json object` Key-value store for storing your reference data. A maximum of 15 key-value pairs can be included.

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

`speed_requested`
: `string` The processing mode of the refund seen in the refund response. 
 This attribute is seen in the refund response only if the `speed` parameter is set in the refund request.
Possible value is `normal`, which indicates that the refund will be processed via the normal speed. That is, the refund will take 5-7 working days. Know more about [normal refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md#create-a-normal-refund).

`speed_processed`
: `string` This is a parameter in the response which describes the mode used to process a refund. 
 This attribute is seen in the refund response only if the `speed` parameter is set in the refund request. Possible value is `normal`, which indicates that the refund has been processed by the payment processing partner. The refund will take 5-7 working days.

Know more about [Refunds API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md) to perform other refund-related operations:
- Fetch a particular refund or a list of refunds for a payment ID.
- Update a refund to modify the Notes field.

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
 
\{Payment_id\} is not a valid id.
* code: 400
* description: A wrong Payment id is provided.
* solution: Check if you have used a valid Payment id.

The requested URL was not found on the server.
* code: 400
* description: - The URL is wrong or is missing something.
- A POST API is executed by GET Method.

* solution: - Ensure that the URL is correct and complete.
- Use the correct method, that is, POST.
