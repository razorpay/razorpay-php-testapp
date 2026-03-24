---
title: Modify Settlement Hold for Transfers
description: Modify Settlement Hold for Transfers using the Razorpay API.
---

# Modify Settlement Hold for Transfers

## Modify Settlement Hold for Transfers

Use this endpoint to modify the settlement configuration for a particular `transfer_id`. On a successful request, the API responds with the modified transfer entity.

### Request

```curl: Curl
curl -X PATCH https://api.razorpay.com/v1/transfers/trf_JJD536GI6wuz3m \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type: application/json' \
-d '{
  "on_hold": true,
  "on_hold_until": 1679691505
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String transferId = "trf_JJD536GI6wuz3m";

JSONObject transferRequest = new JSONObject();
transferRequest.put("on_hold",true);
transferRequest.put("on_hold_until",1679691505);   
              
Transfer transfer = razorpay.transfers.edit(transferId,transferRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->transfer->fetch($paymentId)->edit(array('on_hold' => true, 'on_hold_until' => '1679691505'));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.transfers.edit(paymentId,{
  "on_hold": true,
  "on_hold_until": "1679691505"
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.transfer.edit(transferId,{
  "on_hold": True,
  "on_hold_until": "1679691505"
})
```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

paymentId = "pay_EAeSM2Xul8xYRo"

para_attr = {
  "on_hold": "1",
  "on_hold_until": "1679691505"
}
Razorpay::Transfer.fetch(transferId).edit(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "on_hold": true,
  "on_hold_until": 1649971331,
}
body, err := client.Transfer.Edit("", data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]
");

string transferId = "trf_EB17rqOUbzSCEE";

Dictionary transferRequest = new Dictionary();
transferRequest.Add("on_hold",true);
transferRequest.Add("on_hold_until",1679691505);   
              
Transfer transfer = client.Transfer.Fetch(transferId).Edit(transferRequest);
```

### Response

```json: Success
{
  "id": "trf_JJD536GI6wuz3m",
  "entity": "transfer",
  "status": "processed",
  "source": "pay_JGmCgTEa9OTQcX",
  "recipient": "acc_IRQWUleX4BqvYn",
  "amount": 300,
  "currency": "INR",
  "amount_reversed": 0,
  "fees": 1,
  "tax": 0,
  "notes": {
    "name": "Saurav Kumar",
    "roll_no": "IEC2011026"
  },
  "linked_account_notes": [
    "roll_no"
  ],
  "on_hold": true,
  "on_hold_until": 1649971331,
  "settlement_status": "on_hold",
  "recipient_settlement_id": null,
  "created_at": 1649933574,
  "processed_at": 1649933579,
  "error": {
    "code": null,
    "description": null,
    "reason": null,
    "field": null,
    "step": null,
    "id": "trf_JJD536GI6wuz3m",
    "source": null,
    "metadata": null
  }
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

`id` _mandatory_
: `string` Unique identifier of the transfer for which settlement configurations should be modified.

### Parameters

`on_hold` _mandatory_
: `boolean` Indicates whether the account settlement for transfer is on hold. Possible values: 
    - `true`: Put the transfer settlement on hold.
    - `false`: Releases the settlement. 
For example, if the settlement schedule is T+10 days, a transfer made with `on_hold` set to true will not be settled even after 10 days, as it is on hold. If the hold is disabled on `T+15` day, the amount will be settled to the Linked Account by the next working day.

`on_hold_until` _optional_
: `integer` Timestamp, in Unix, that indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely. For example, if a transfer is created with `on_hold_until` timestamp defined as `1583991784`, the settlement will be held off until the specified time period. The amount will be settled to the Linked Account only on the next day.

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
 
The amount must be at least INR 1.00
* code: 400
* description: This error occurs when the amount is less than the minimum amount. The transaction amount expressed in the currency subunit, such as paise (in INR) should always be greater than or equal to ₹1.
* solution: Make sure the amount is equal to or greater than the minimum amount of ₹1.

transfer_id is not a valid id
* code: 400
* description: This error occurs when you pass an invalid `transfer_id` in the API endpoint.
* solution: Make sure to pass a vaild `transfer_id`.
