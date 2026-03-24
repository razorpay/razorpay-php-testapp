---
title: Fetch Reversals for a Transfer
description: Fetch Reversals for a Transfer using the Razorpay API.
---

# Fetch Reversals for a Transfer

## Fetch Reversals for a Transfer

Use this endpoint to retrieve a list of reversals made for a transfer.

### Request

```curl: Curl
curl -X GET https://api.razorpay.com/v1/transfers/trf_Lt048W7cgLdo1u/reversals \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \ 

```php: PHP
$api = new Api($key_id, $secret);

$api->transfer->fetch("trf_Lt048W7cgLdo1u")->reversals();

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.transfer.reversals(transferId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Transfer.Reversals("", nil, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

transferId = "trf_JhemwjNekar9Za"
Razorpay::Transfer.reversals(transferId)
```

### Response

```json: Success
{
   "entity":"collection",
   "count":1,
   "items":[
      {
         "id":"rvrsl_Lt09xvyzskI7KZ",
         "entity":"reversal",
         "transfer_id":"trf_Lt048W7cgLdo1u",
         "amount":50000,
         "fee":0,
         "tax":0,
         "currency":"INR",
         "notes":[
            
         ],
         "initiator_id":"Ghri4beeOuMTAb",
         "customer_refund_id":null,
         "utr":null,
         "created_at":1684822489
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

`id` _mandatory_
: `string` Unique identifier of the transfer.

### Parameters

`id`
: `string` The unique identifier of the reversal.

`entity`
: `string` The name of the entity. Here, it is `reversal`.

`transfer_id`
: `string` The unique identifier of the transfer that was reversed.

`amount`
: `integer` The amount that was reversed, in paise.

`currency`
: `string` ISO currency code. We support route reversals only in INR.

`initiator_id`
: `string` The unique identifier of the merchant (MID).

`created_at`
: `integer` Timestamp in Unix. This indicates the time at which the reversal was created.

### Errors

The API key/secret provided is invalid.
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
