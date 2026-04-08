---
title: Create a Direct Transfer
description: Create a Direct Transfer using the Razorpay API.
---

# Create a Direct Transfer

## Create a Direct Transfer

Use this endpoint to create a direct transfer of funds from your account to a Linked Account. Apart from transferring payments received from customers, you can also transfer funds to your Linked Accounts directly from your account balance using the **Direct Transfers** API.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> 
> 

 to get this feature activated on your account.

### Request

```curl: Curl
curl -X POST https://api.razorpay.com/v1/transfers \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type: application/json' \
-d '{
  "account": "acc_CPRsN1LkFccllA",
  "amount": 100,
  "currency": "INR"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject transferRequest = new JSONObject();
transferRequest.put("amount",50000);
transferRequest.put("currency","INR");
transferRequest.put("account","acc_CPRsN1LkFccllA");
               
Transfer transfer = razorpay.transfers.create(transferRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->transfer->create(array('account' => $accountId, 'amount' => 500, 'currency' => 'INR'));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.transfers.create({
  "amount": 500,
  "currency": "INR",
  "account": "acc_CPRsN1LkFccllA"
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.transfer.create({
   "amount":500,
   "currency":"INR",
   "account": "acc_CPRsN1LkFccllA"
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "account": accountId,
  "amount": 500,
  "currency": "INR"
}

Razorpay::Transfer.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "account": "",
  "amount": 100,
  "currency": "INR",
}
body, err := client.Transfer.Create(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]
");

Dictionary transferRequest = new Dictionary();
transferRequest.Add("account", "acc_I0QRP7PpvaHhpB");
transferRequest.Add("amount", 100);
transferRequest.Add("currency", "INR");
               
Transfer transfer = client.Transfer.Create(transferRequest);
```

### Response

```json: Success
{
  "id": "trf_JqpKevElHShZkw",
  "entity": "transfer",
  "status": "processed",
  "source": "acc_CJoeHMNpi0nC7k",
  "recipient": "acc_CPRsN1LkFccllA",
  "amount": 100,
  "currency": "INR",
  "amount_reversed": 0,
  "fees": 1,
  "tax": 0,
  "notes": [],
  "linked_account_notes": [],
  "on_hold": false,
  "on_hold_until": null,
  "recipient_settlement_id": null,
  "created_at": 1657273505,
  "processed_at": 1657273505,
  "error": {
    "code": null,
    "description": null,
    "reason": null,
    "field": null,
    "step": null,
    "id": "trf_JqpKevElHShZkw",
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

`account` _mandatory_
: `string` Unique identifier of the Linked Account to which the transfer must be made.

`amount` _mandatory_
: `integer` The amount (in paise) to be transferred to the Linked Account. For example, for an amount of ₹200.35, the value of this field should be 20035. 

`currency` _mandatory_
: `string` The currency used in the transaction. We support only `INR` for Route transactions.

`notes` _optional_
: `json object` Set of key-value pairs that can be associated with an entity.  These pairs can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. 

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
 
The transfers.0.amount must be at least 100.
* code: 400
* description: This error occurs when the amount is less than the minimum amount. The transaction amount expressed in the currency subunit, such as paise (in INR) should always be greater than or equal to 100.
* solution: Make sure the amount is equal to or greater than the minimum amount of ₹100.

The input field is required
* code: 400
* description: This error occurs when a mandatory field is empty.
* solution: Make sure to fill in all the mandatory fields.
