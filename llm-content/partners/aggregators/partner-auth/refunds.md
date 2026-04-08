---
title: Partner Auth | Refunds
heading: Refunds
description: Integrate with Refunds API using partner auth.
---

# Refunds

You can make full or partial refunds to customers. 
Know more about [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md).

> **INFO**
>
> 
> **Refunds Can be Made Only on Captured Payments**
> 
> You can initiate refunds only on those payments that are in `captured` state. A payment in `authorized` state is auto-refunded if not `captured` within 5 days of creation.
> 

## Create a Refund API

Given below are the sample codes to create a full refund. You should send the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. Refer to the [Refunds API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md).

/payments/:id/refund

```curl: Curl
curl -u [CLIENT_ID]:[CLIENT_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-H "X-Razorpay-Account: acc_Ef7ArAsdU5t0XL" \
-d '{
  "amount": 500100
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[CLIENT_ID]", "[CLIENT_SECRET]");
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

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
$api = new Api($CLIENT_ID, $CLIENT_SECRET);
$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->payment->fetch($paymentId)->refund(array("amount"=> "100", "speed"=>"normal", "notes"=>array("notes_key_1"=>"Beam me up Scotty.", "notes_key_2"=>"Engage"), "receipt"=>"Receipt No. 31"));

```python: Python
import razorpay
client = razorpay.Client(auth=("CLIENT_ID", "CLIENT_SECRET"))
Razorpay.headers = {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"}

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
client := razorpay.NewClient("CLIENT_ID", "CLIENT_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

data := map[string]interface{}{
  "speed": "normal",
  "notes": map[string]interface{}{
    "key_1": "value1",
    "key_2": "value2",
  },
}
body, err := client.Payment.Refund("",1200, data, nil)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'CLIENT_ID', key_secret: 'CLIENT_SECRET' })
headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 

instance.payments.refund(paymentId,{
  "amount": "100",
  "speed": "normal",
  "notes": {
    "notes_key_1": "Beam me up Scotty.",
    "notes_key_2": "Engage"
  },
  "receipt": "Receipt No. 31"
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('CLIENT_ID', 'CLIENT_SECRET')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

paymentId = "pay_29QQoUBi66xm2f"

para_attr = {
  "amount": "100",
  "speed": "normal",
  "notes": {
    "notes_key_1": "Beam me up Scotty.",
    "notes_key_2": "Engage"
  },
  "receipt": "Receipt No. 31"
}

Razorpay::Payment.fetch(paymentId).refund(para_attr)

```json: Success
{
  "id": "rfnd_FP8QHiV938haTz",
  "entity": "refund",
  "amount": 500100,
  "receipt": "Receipt No. 31",
  "currency": "INR",
  "payment_id": "pay_29QQoUBi66xm2f",
  "notes": []
  "receipt": null,
  "acquirer_data": {
    "arn": null
  },
  "created_at": 1597078866,
  "batch_id": null,
  "status": "processed",
  "speed_processed": "normal",
  "speed_requested": "normal"
}
```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The amount must be at least INR 1.00",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {},
        "field": "amount"
    }
}
```

### Path Parameters

`id` _mandatory_
: `string` The unique identifier of the payment which needs to be refunded.

### Request Parameters

`amount` _optional_
: `integer` The amount to be refunded. Amount should be in the smallest unit of the currency in which the payment was made.
  - For a **partial refund**, enter a value lesser than the payment amount. For example, if the payment amount is  and you want to refund only , you must pass `50000`.
  - For **full refund**, enter the entire payment amount. If the `amount` parameter is not passed, the entire payment amount will be refunded.

`speed` _optional_
: `string` The speed at which the refund is to be processed. The default value is `normal`. Refund will be processed via the normal speed, and the customer will receive the refund within 5-7 working days. Pass `optimum` for instant refunds. 
    - If the refund can be processed instantly, Razorpay will do so, irrespective of the payment method used to make the payment.
    - If an instant refund is not possible, Razorpay will initiate a refund that is processed at the normal speed.

`notes` _optional_
: `json object` Key-value pairs used to store additional information. A maximum of 15 key-value pairs can be included.

`receipt` _optional_
: `string` A unique identifier provided by you for your internal reference.

### Response Parameters

`id`
: `string` The unique identifier of the refund. For example, `rfnd_FgRAHdNOM4ZVbO`.

`entity`
: `string` Indicates the type of entity. Here, it is `refund`.

`amount`
: `integer` The amount to be refunded (in the smallest unit of currency). 
 For example, if the refund value is  it will be `3000`.

`currency`
: `string` The currency of payment amount for which the refund is initiated. Check the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

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

## Fetch All Refunds API

Given below is the sample code for Fetch all Refunds API. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. Know more about [Fetch all Refunds API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds/fetch-all.md).

By default, only the last 10 refunds are returned. You can use count and skip query parameters to change that behaviour.

/refunds/

```curl: Curl
curl -u [CLIENT_ID]:[CLIENT_SECRET] \
-X GET https://api.razorpay.com/v1/refunds
-H "X-Razorpay-Account: acc_Ef7ArAsdU5t0XL" \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[CLIENT_ID]", "[CLIENT_SECRET]");
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

JSONObject params = new JSONObject();
params.put("count","1");
        
List refund = razorpay.refunds.fetchAll(params);

```php: PHP
$api = new Api($CLIENT_ID, $CLIENT_SECRET);
$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->refund->all($options);

```python: Python
import razorpay
client = razorpay.Client(auth=("CLIENT_ID", "CLIENT_SECRET"))
Razorpay.headers = {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"}

client.refund.all(options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("CLIENT_ID", "CLIENT_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

option := map[string]interface{}{
    "count" : 2
}
body, err := client.Payment.All(option, nil)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'CLIENT_ID', key_secret: 'CLIENT_SECRET' })
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

instance.refunds.all(options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('CLIENT_ID', 'YOUR_SECRET')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

options = {"count":1}

Razorpay::Refund.all(options)

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "rfnd_FFX6AnnIN3puqW",
      "entity": "refund",
      "amount": 88800,
      "currency": "INR",
      "payment_id": "pay_FFX5FdEYx8jPwA",
      "notes": {
        "comment": "Issuing an instant refund"
      },
      "receipt": null,
      "acquirer_data": {},
      "created_at": 1594982363,
      "batch_id": null,
      "status": "processed",
      "speed_processed": "optimum",
      "speed_requested": "optimum"
    },
    {
      "id": "rfnd_EqWThTE7dd7utf",
      "entity": "refund",
      "amount": 6000,
      "currency": "INR",
      "payment_id": "pay_EpkFDYRirena0f",
      "notes": {
        "comment": "Issuing a normal refund"
      },
      "receipt": null,
      "acquirer_data": {
        "arn": "10000000000000"
      },
      "created_at": 1589521675,
      "batch_id": null,
      "status": "processed",
      "speed_processed": "normal",
      "speed_requested": "normal"
    }
  ]
}
```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The payment id field is required.",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {},
        "field": "payment_id"
    }
}
```

### Query Parameters

`from` _optional_
: `integer` Unix timestamp at which the refunds were created.

`to` _optional_
: `integer` Unix timestamp till which the refunds were created.

`count` _optional_
: `integer` The number of refunds to fetch. You can fetch a maximum of 100 refunds.

`skip` _optional_
: `integer` The number of refunds to be skipped.

### Response Parameters

`id`
: `string` The unique identifier of the refund. For example, `rfnd_FgRAHdNOM4ZVbO`.

`entity`
: `string` Indicates the type of entity. Here, it is `refund`.

`amount`
: `integer` The amount to be refunded (in the smallest unit of currency). 
 For example, if the refund value is  it will be `3000`.

`currency`
: `string` The currency of payment amount for which the refund is initiated. Check the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

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

### Related Information

- [Refunds API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds.md)
