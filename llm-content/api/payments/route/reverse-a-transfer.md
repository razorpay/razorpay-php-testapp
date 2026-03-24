---
title: Reverse a Transfer
description: Reverse a Transfer using the Razorpay API.
---

# Reverse a Transfer

## Reverse a Transfer

Use this endpoint to create reversals on a particular `transfer_id`.

- The amount specified is debited from the Linked Account balance and credited to your balance.

- Partial reversals are also supported, and you can create multiple reversals on a `transfer_id`. If you do not provide the `amount` parameter in the request, then the entire amount of the transfer is reversed.

> **INFO**
>
> 
> **Handy Tips**
> If a reversal ID is generated, the reversal was successful.
> 

### Request

```curl: Curl
curl -X POST https://api.razorpay.com/v1/transfers/trf_EAznuJ9cDLnF7Y/reversals \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type: application/json'
-d '{
   "amount":100,
   "notes":{
      "branch":"Acme Corp Bangalore North",
      "name":"Gaurav Kumar"
   }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String transferId = "trf_EAznuJ9cDLnF7Y";

JSONObject transferRequest = new JSONObject();
transferRequest.put("amount","100");
JSONObject notes = new JSONObject();
notes.put("branch","Acme Corp Bangalore North");
notes.put("name","Gaurav Kumar");
transferParams.put("notes",notes);
 
Transfer transfer = razorpay.transfers.reversal(transferId,transferRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->transfer->fetch($transferId)->reverse(array('amount'=>'100','notes' => array('branch' => 'Acme Corp Bangalore North','name' => 'Gaurav Kumar')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.transfers.reverse(transferId,{
    amount:100,
    notes: {
        branch: "Acme Corp Bangalore North",
        name: "Gaurav Kumar"
      }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.transfer.reverse(transferId, {
  "amount": 100,
  "notes":{
            "branch":"Acme Corp Bangalore North",
            "name":"Gaurav Kumar"
         }
  })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

transferId = "trf_EAznuJ9cDLnF7Y"

para_attr = {
    "amount":100,
    "notes": {
        "branch": "Acme Corp Bangalore North",
        "name": "Gaurav Kumar"
      }
}

Razorpay::Transfer.fetch(transferId).reverse(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "amount": 100,
  "notes": map[string]interface{}{
        "branch": "Acme Corp Bangalore North",
        "name": "Gaurav Kumar"
      }
}
body, err := client.Transfer.Reverse("", data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]
");

string transferId = "trf_EAznuJ9cDLnF7Y";

Dictionary transferRequest = new Dictionary();
transferRequest.Add("amount","100");
 
Reversal transfer = client.Transfer.Fetch(transferId).Reversal(transferRequest);
```

### Response

```json: Success
{
  "id": "rvrsl_EB0BWgGDAu7tOz",
  "entity": "reversal",
  "transfer_id": "trf_EAznuJ9cDLnF7Y",
  "amount": 100,
  "fee": 0,
  "tax": 0,
  "currency": "INR",
  "notes": [],
  "initiator_id": "CJoeHMNpi0nC7k",
  "customer_refund_id": null,
  "created_at": 1580456007
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
: `string` Unique identifier of the transfer to be reversed.

### Parameters

`amount` _optional_
:  `integer` The amount to be reversed from the Linked Account to your account. If this parameter is not passed, the entire transfer amount will be reversed.

`notes` _optional_
: `json object` Set of key-value pairs that can be associated with an entity. These pairs can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "Bangalore"`.

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

`created_at`
: `integer` Timestamp in Unix. This indicates the time at which the reversal was created.

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

The linked account does not have sufficient balance to process reversal.
* code: 400
* description: Insufficient balance in the linked account to complete the reversal.
* solution: Ensure that you have sufficient balance in your linked account to complete the reversal.
