---
title: Create Transfers From Orders
description: Initiate Transfers when creating an Order using the Razorpay API.
---

# Create Transfers From Orders

## Create Transfers From Orders

Use this endpoint to set up transfer of funds while creating an order. This can be done by passing the transfers parameters as part of the request body.

- You cannot create transfers on orders which has the `partial_payment` parameter enabled. Ensure that this parameter is set to `0`.
- You cannot create transfers on orders for international currencies. Currently, this feature only supports orders created using INR.

### Request

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-H 'content-type: application/json'
-d '{
  "amount": 2000,
  "currency": "INR",
  "transfers": [
    {
      "account": "acc_IRQWUleX4BqvYn",
      "amount": 1000,
      "currency": "INR",
      "notes": {
        "branch": "Acme Corp Bangalore North",
        "name": "Gaurav Kumar"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": true,
      "on_hold_until": 1671222870
    },
    {
      "account": "acc_IROu8Nod6PXPtZ",
      "amount": 1000,
      "currency": "INR",
      "notes": {
        "branch": "Acme Corp Bangalore South",
        "name": "Saurav Kumar"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": false
    }
  ]
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount",2000);
orderRequest.put("currency","INR");
orderRequest.put("receipt", "receipt#1");
List transfers = new ArrayList<>();
JSONObject transferParams = new JSONObject();
transferParams.put("account","acc_CPRsN1LkFccllA");
transferParams.put("amount",100);
transferParams.put("currency","INR");
JSONObject notes = new JSONObject();
notes.put("name","Gaurav Kumar");
notes.put("roll_no","IEC2011025");
transferParams.put("notes",notes);
List linkedAccountNotes = new ArrayList<>();
linkedAccountNotes.add("roll_no");
transferParams.put("linked_account_notes",linkedAccountNotes);
transferParams.put("on_hold",true);
transfers.add(transferParams);
orderRequest.put("transfers", transfers);
              
Order order = razorpay.orders.create(orderRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 2000,'currency' => 'INR','transfers' => array(array('account' => 'acc_CPRsN1LkFccllA','amount' => 1000,'currency' => 'INR','notes' => array('branch' => 'Acme Corp Bangalore North','name' => 'Gaurav Kumar'),'linked_account_notes' => array('branch'),'on_hold' => true,'on_hold_until' => 1671222870),array('account' => 'acc_CNo3jSI8OkFJJJ','amount' => 1000,'currency' => 'INR','notes' => array('branch' => 'Acme Corp Bangalore South','name' => 'Saurav Kumar'),'linked_account_notes' => array('branch'),'on_hold' => false))));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 2000,
  currency: "INR",
  transfers: [
    {
      account: "acc_CPRsN1LkFccllA",
      amount: 1000,
      currency: "INR",
      notes: {
        branch: "Acme Corp Bangalore North",
        name: "Gaurav Kumar"
      },
      linked_account_notes: [
        "branch"
      ],
      on_hold: true,
      on_hold_until: 1671222870
    },
    {
      account: "acc_CNo3jSI8OkFJJJ",
      amount: 1000,
      currency: "INR",
      notes: {
        branch: "Acme Corp Bangalore South",
        name: "Saurav Kumar"
      },
      linked_account_notes: [
        "branch"
      ],
      on_hold: false
    }
  ]
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
   "amount":2000,
   "currency":"INR",
   "transfers":[
      {
         "account":"acc_CPRsN1LkFccllA",
         "amount":1000,
         "currency":"INR",
         "notes":{
            "branch":"Acme Corp Bangalore North",
            "name":"Gaurav Kumar"
         },
         "linked_account_notes":[
            "branch"
         ],
         "on_hold": True,
         "on_hold_until":1671222870
      },
      {
         "account":"acc_CNo3jSI8OkFJJJ",
         "amount":1000,
         "currency":"INR",
         "notes":{
            "branch":"Acme Corp Bangalore South",
            "name":"Saurav Kumar"
         },
         "linked_account_notes":[
            "branch"
         ],
         "on_hold": False
      }
   ]
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 2000,
  "currency": "INR",
  "transfers": [
    {
      "account": "acc_CPRsN1LkFccllA",
      "amount": 1000,
      "currency": "INR",
      "notes": {
        "branch": "Acme Corp Bangalore North",
        "name": "Gaurav Kumar"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": 1,
      "on_hold_until": 1671222870
    },
    {
      "account": "acc_CNo3jSI8OkFJJJ",
      "amount": 1000,
      "currency": "INR",
      "notes": {
        "branch": "Acme Corp Bangalore South",
        "name": "Saurav Kumar"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": 0
    }
  ]
}

Razorpay::Order.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "amount": 2000,
  "currency": "INR",
  "transfers": []interface{}{
    map[string]interface{}{
      "account": "acc_IRQWUleX4BqvYn",
      "amount": 100,
      "currency": "INR",
      "notes": map[string]interface{}{
        "branch": "Acme Corp Bangalore North",
        "name": "Gaurav Kumar",
      },
      "linked_account_notes": []string{
        "branch",
      },
      "on_hold": true,
      "on_hold_until": 1671222870,
      },
  },
}

body, err := client.Order.Create(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]
");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 100);
orderRequest.Add("currency", "INR");
orderRequest.Add("receipt", "receipt#341");
List> transfers = new List>();
Dictionary transferParams = new Dictionary();
transferParams.Add("account", "acc_I0QRP7PpvaHhpB");
transferParams.Add("amount", 100);
transferParams.Add("currency", "INR");
Dictionary notes = new Dictionary();
notes.Add("name", "Gaurav Kumar");
notes.Add("roll_no", "IEC2011025");
transferParams.Add("notes", notes);
List linkedAccountNotes = new List();
linkedAccountNotes.Add("roll_no");
transferParams.Add("linked_account_notes", linkedAccountNotes);
transferParams.Add("on_hold", true);
transfers.Add(transferParams);
orderRequest.Add("transfers", transfers);

Order token = client.Order.Create(orderRequest);
```

### Response

```json: Success
{
  "id": "order_JJCYnu3hipocHz",
  "entity": "order",
  "amount": 2000,
  "amount_paid": 0,
  "amount_due": 2000,
  "currency": "INR",
  "receipt": null,
  "offer_id": null,
  "offers": {
    "entity": "collection",
    "count": 0,
    "items": []
  },
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1649931742,
  "transfers": [
    {
      "id": "trf_JJCYnw77tqUT9r",
      "entity": "transfer",
      "status": "created",
      "source": "order_JJCYnu3hipocHz",
      "recipient": "acc_IRQWUleX4BqvYn",
      "amount": 1000,
      "currency": "INR",
      "amount_reversed": 0,
      "notes": {
        "branch": "Acme Corp Bangalore North",
        "name": "Gaurav Kumar"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": true,
      "on_hold_until": 1671222870,
      "recipient_settlement_id": null,
      "created_at": 1649931742,
      "processed_at": null,
      "error": {
        "code": null,
        "description": null,
        "reason": null,
        "field": null,
        "step": null,
        "id": "trf_JJCYnw77tqUT9r",
        "source": null,
        "metadata": null
      }
    },
    {
      "id": "trf_JJCYnxe5GV19Kk",
      "entity": "transfer",
      "status": "created",
      "source": "order_JJCYnu3hipocHz",
      "recipient": "acc_IROu8Nod6PXPtZ",
      "amount": 1000,
      "currency": "INR",
      "amount_reversed": 0,
      "notes": {
        "branch": "Acme Corp Bangalore South",
        "name": "Saurav Kumar"
      },
      "linked_account_notes": [
        "branch"
      ],
      "on_hold": false,
      "on_hold_until": null,
      "recipient_settlement_id": null,
      "created_at": 1649931742,
      "processed_at": null,
      "error": {
        "code": null,
        "description": null,
        "reason": null,
        "field": null,
        "step": null,
        "id": "trf_JJCYnxe5GV19Kk",
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

`amount` _mandatory_
: `integer` The transaction amount, in paise. For example, for an amount of ₹299.35, the value of this field should be 29935.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. We support only `INR` for Route transactions.

`receipt` _optional_
: `string` Unique identifier that you can use for internal reference.

`transfers`
: `array` Details regarding the transfer.

    `account` _mandatory_
    : `string` Unique identifier of the Linked Account to which the transfer is to be made.

    `amount` _mandatory_
    : `integer` The amount to be transferred to the Linked Account. For example, for an amount of ₹200.35, the value of this field should be 20035. This amount cannot exceed the order amount.

    `currency` _mandatory_
    : `string` The currency in which the transfer should be made. We support only `INR` for Route transactions.

    `notes` 
    : `json object` Set of key-value pairs that can be associated with an entity.  These pairs can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "Bangalore"`.

    `linked_account_notes` 
    : `array` List of keys from the `notes` object which needs to be shown to Linked Accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

    `on_hold` _optional_
    : `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
        - `true`: Puts the settlement on hold.
        - `false`: Releases the settlement.

    `on_hold_until` _optional_
    : `integer` Timestamp, in Unix format, that indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.

### Parameters

`id`
: `string` Unique identifier of the order created.

`entity`
: `string` The name of the entity. Here, it is `order`.

`amount`
: `integer` The order amount, in paise. For example, for an amount of ₹299.35, the value of this field should be 29935.

`amount_paid`
: `integer` The amount paid against the order.

`amount_due`
: `integer` The amount pending against the order.

`currency`
: `string` The currency in which the order should be created. We support only `INR` for Route transactions.

`receipt`
: `string` Unique identifier that you can use for internal reference.

`status`
: `string` The status of the order. Possible values:
  - `created`
  - `attempted`
  - `paid`

`notes`
: `json object` Set of key-value pairs that can be associated with an entity.  These pairs can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported.

`created_at`
: `integer` Timestamp in Unix. This indicates the time of the order created.

`transfers`
: `array` Details regarding the transfer.

    `id`
    : `string` Unique identifier of the transfer.
    
    `recipient`
    : `string` Unique identifier of the Linked Account to which the transfer is to be made.

    `transfer_status`
    : `string` The status of the transfer. Possible values:
      - `created`
      - `pending`
      - `processed`
      - `failed`
      - `reversed`
      - `partially_reversed`

    `settlement_status`
    : `string` The status of the settlement. Possible values:
      - `pending`
      - `on_hold`
      - `settled`

    `amount`
    : `integer` The amount to be transferred to the Linked Account, in paise. For example, for an amount of ₹200.35, the value of this field should be 20035. This amount cannot exceed the order amount.

    `currency`
    : `string` The currency in which the transfer should be made. We support only `INR` for Route transactions.

    `notes` 
    : `json object` Set of key-value pairs that can be associated with an entity.  These pairs can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "Bangalore"`.

    `linked_account_notes` 
    : `array` List of keys from the `notes` object which needs to be shown to Linked Accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

    `on_hold`
    : `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
      - `true`: Puts the settlement on hold.
      - `false`: Releases the settlement.

    `on_hold_until`
    : `integer` Timestamp, in Unix, that indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.

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

      `reason`
      : `string` The exact error reason. It can be handled programmatically.

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
The amount must be at least INR 1.00
* code: 400
* description: This error occurs when the amount is less than the minimum amount. The transaction amount expressed in the currency subunit, such as paise (in INR) should always be greater than or equal to 100.
* solution: Make sure the amount is equal to or greater than the minimum amount of ₹100.

The input field is required
* code: 400
* description: This error occurs when a mandatory field is empty.
* solution: Make sure to fill in all the mandatory fields.

The currency should be INR for transfers
* code: 400
* description: This error occurs when the currency is anything other than `INR`.
* solution: Ensure the currency value is `INR` as we support only `INR` for Route transactions.

Keys sent in linked_account_notes must exist in notes
* code: 400
* description: This error occurs when there is a mismatch between the key passed in the `linked_account_notes` array and the key from the `notes` object.
* solution: Make sure the key passed in the `linked_account_notes` array always matches the key from the `notes` object.

on_hold_until must be between 946684800 and 4765046400
* code: 400
* description: This error occurs when the time stamp provided for the `on_hold_until` entity is not correct or if it is not between `946684800` and `4765046400`.
* solution: Make sure to enter the relevant `on_hold_until` entity time stamp. It should also be within the time `946684800` and `4765046400`.

input is an invalid account_code.
* code: 400
* description: This error occurs when the `account_code` passed is invalid or does not belong to the requested merchant.
* solution: Make sure to pass the valid `account_code`.

Transfer cannot be made due to insufficient balance
* code: 400
* description: This error occurs when the total balance is less than or equal to the transfer amount.
* solution: Make sure you have enough balance. You can also [add funds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/balances.md#add-funds-to-your-reserve-balance) to the account and then try doing the transfer.

The sum of amount requested for transfer is greater than the captured amount
* code: 400
* description: This error occurs when the total transferred amount exceeds the captured payment amount.
* solution: Make sure the transfer amount is less than the captured payment.
