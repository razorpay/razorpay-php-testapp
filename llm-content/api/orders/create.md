---
title: Create an Order
description: Create an Order using Razorpay Orders API.
---

# Create an Order

## Create an Order

Use this endpoint to create an order with basic details such as amount and currency.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 5000,
  "currency": "",
  "receipt": "receipt#1",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount",5000);
orderRequest.put("currency","");
orderRequest.put("receipt", "receipt#1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_1","Tea, Earl Grey, Hot");
orderRequest.put("notes",notes);

Order order = razorpay.orders.create(orderRequest);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 5000,
  "currency": "",
  "receipt": "receipt#1",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
})

```php: PHP
$api = new Api($key_id, $secret);

$$api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => '', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 5000); // amount in the smallest currency unit
options.Add("receipt", "order_rcptid_11");
options.Add("currency", "");
Order order = client.Order.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 5000,
  "currency": "",
  "receipt": "receipt#1",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
}

Razorpay::Order.create(para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
  currency: "",
  receipt: "receipt#1",
  notes: {
    key1: "value3",
    key2: "value2"
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 5000,
  "currency": "",
  "receipt": "some_receipt_id",
  "partial_payment": false,
  "notes": map[string]interface{}{
      "key1": "value1",
      "key2": "value2",
    } 
}
body, err := client.Order.Create(data, nil)
```

### Response

```json: Success
{
  "amount": 5000,
  "amount_due": 5000,
  "amount_paid": 0,
  "attempts": 0,
  "created_at": 1756455561,
  "currency": "INR",
  "entity": "order",
  "id": "order_RB58MiP5SPFYyM",
  "notes": {
      "key1": "value3",
      "key2": "value2"
  },
  "offer_id": null,
  "receipt": "receipt#1",
  "status": "created"
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The amount must be at least  1.00",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {},
    "field": "amount"
  }
}
```

### Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. In the case of three decimal currencies, such as KWD, BHD and OMR, to accept a payment of 295.991, pass the value as `295990`. And in the case of zero decimal currencies such as JPY, to accept a payment of 295, pass the value as `295`.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to charge a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>     

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters. Refer to the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Can have a maximum length of 40 characters and has to be unique.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Parameters

`id`
: `string` The unique identifier of the order.

`amount`
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

`entity`
: `string` Name of the entity. Here, it is `order`.

`amount_paid`
: `integer` The amount paid against the order.

`amount_due`
: `integer` The amount pending against the order.

`currency`
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters.

`receipt`
: `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

`status`
: `string` The status of the order. Possible values:
   - `created`: When you create an order it is in the `created` state. It stays in this state till a payment is attempted on it.
   - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
   - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` Indicates the Unix timestamp when this order was created.

### Errors

Authentication failed.
* code: 400
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.

* solution: The API keys must be active and entered correctly with no whitespace before or after the keys.

The amount must be at least INR 1.00.
* code: 400
* description: The amount specified is less than the minimum amount. Currency subunits, such as paise (in the case of INR), should always be greater than 100.
* solution: Enter an amount equal to or greater than the minimum amount, that is 100.

The **field name** is required.
* code: 400
* description: A mandatory field is missing.
* solution: Ensure all mandatory fields and values are present.
