---
title: Fetch Transfers for a Settlement
description: Fetch Transfers for a Settlement using the Razorpay API.
---

# Fetch Transfers for a Settlement

## Fetch Transfers for a Settlement

Use this endpoint to retrieve the collection of all transfers made for a particular `recipient_settlement_id`.

### Request

``` curl: Curl
curl -X GET https://api.razorpay.com/v1/transfers?recipient_settlement_id=setl_HYIIk3H0J4PYdX \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \  

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
params.put("recipient_settlement_id","setl_HYIIk3H0J4PYdX");

List transfers = razorpay.transfers.fetchAll(params);

```php: PHP
$api = new Api($key_id, $secret);

$api->transfer->all(array('recipient_settlement_id'=> $recipientSettlementId));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.transfers.all({
   recipient_settlement_id :  recipientSettlementId
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.transfer.all({
   "recipient_settlement_id":"recipientSettlementId"
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

recipientSettlementId = "setl_HYIIk3H0J4PYdX"

Razorpay::Transfer.all({
   "recipient_settlement_id": recipientSettlementId
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "recipient_settlement_id": "",
}
body, err := client.Transfer.All(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]
");

Dictionary transferRequest = new Dictionary();
transferRequest.Add("recipient_settlement_id", "setl_DHYJ3dRPqQkAgV");

List transfer = client.Transfer.All(transferRequest);
```

### Response

```json: Success
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "trf_HWjmkReRGPhguR",
      "entity": "transfer",
      "status": "processed",
      "source": "pay_HWjY9DZSMsbm5E",
      "recipient": "acc_HWjl1kqobJzf4i",
      "amount": 1000,
      "currency": "INR",
      "amount_reversed": 0,
      "fees": 3,
      "tax": 0,
      "notes": [],
      "linked_account_notes": [],
      "on_hold": false,
      "on_hold_until": null,
      "settlement_status": "settled",
      "recipient_settlement_id": "setl_HYIIk3H0J4PYdX",
      "created_at": 1625812996,
      "processed_at": 1625812996,
      "error": {
        "code": null,
        "description": null,
        "reason": null,
        "field": null,
        "step": null,
        "id": "trf_HWjmkReRGPhguR",
        "source": null,
        "metadata": null
      }
    }
  ]
}

```json: Failure
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"The api key provided is invalid",
      "source":"NA",
      "step":"NA",
      "reason":"NA",
      "metadata":{
         
      }
   }
}
```

### Parameters

`recipient_settlement_id` _mandatory_
: `string` Unique identifier of a settlement obtained from the `settlement.processed` webhook payload.

Descriptions for the optional query parameters are present in the [Pagination & Rate Limiting](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#pagination) documentation.

### Parameters

`id` 
: `string`  Unique identifier of the transfer.

`entity`
: `string` The name of the entity. Here, it is `transfer`.

`transfer_status`
: `string` The status of the transfer. Possible values are:
    - `created`
    - `pending`
    - `processed`
    - `failed`
    - `reversed`
    - `partially_reversed`

`settlement_status`
: `string` The status of the settlement. Possible values are:
    - `pending`
    - `on_hold`
    - `settled`

`source` 
: `string` Unique identifier of the transfer source. The source can be a `payment` or an `order`.

`recipient` 
: `string` Unique identifier of the transfer destination, that is, the Linked Account.

`amount` 
: `integer` The amount to be transferred to the Linked Account, in paise. For example, for an amount of ₹200.35, the value of this field should be 20035.

`currency` 
: `string`  ISO currency code. We support route transfers only in `INR`.

`amount_reversed` 
: `integer` Amount reversed from this transfer for refunds.

`notes` 
: `json object` Set of key-value pairs that can be associated with an entity. These pairs can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "Bangalore"`.

`error`
: `string` Provides error details that may occur during transfers.

    `code`
    : `string` Type of the error.

    `description`
    : `string` Error description.

    `field`
    : `string` Name of the parameter in the API request that caused the error.

    `source`
    : `string` The point of failure in the specific operation. For example, customer, business and so on.

    `step`
    : `string` The stage where the transaction failure occurred. Stages can be different depending on the payment method used to make the transaction.

    `id`
    : `string`  Unique identifier of the transfer.

    `reason`
    : `string` The exact error reason. It can be handled programmatically.

`linked_account_notes` 
: `array` List of keys from the `notes` object which needs to be shown to Linked Accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

`on_hold` 
: `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
    - `true`: Puts the settlement on hold.
    - `false`: Releases the settlement.

`on_hold_until` 
: `integer` Timestamp, in Unix format, indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.

`recipient_settlement_id`
: `string` Unique identifier of the settlement.

`created_at` 
: `integer` Timestamp, in Unix, at which the record was created.

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
