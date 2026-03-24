---
title: Display the Configuration
description: Display the configured payment methods on Razorpay Checkout.
---

# Display the Configuration

The `display` configuration can be passed in the Checkout options.

You can use the `display` configuration to put together all the modules, that is, `blocks`, `sequence`, `preferences`, and `hide` instruments as shown below:

```js: display configuration
let config = {
  display: {
    blocks: {
      code: {
        name: "The name of the block", // The title of the block
        instruments: [instrument, instrument] // The list of instruments
      },

      anotherCode: {
        name: "Another block",
        instruments: [instrument]
      }
    },

    hide: [
      {
        method: "method"
      }
    ],

    sequence: ["block.code"], // The sequence in which blocks and methods should be shown

    preferences: {
      show_default_blocks: true // Should Checkout show its default blocks?
    }
  }
};

```js: JavaScript Checkout options
// beginning of the Checkout code
.....

let options = {
  key: "[YOUR_KEY_ID]",
  amount: 60000,
  currency: "",

  config: {
    display: {
      // The display config
    }
  }
};

let razorpay = new Razorpay(options);

razorpay.open();
....
//rest of the Checkout code

```

## Checkout options

Descriptions for the checkout options parameters are present in the [Checkout Options](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps/#123-checkout-options.md) table.

## Orders API Sample Code

Given below is the sample code:

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/orders
-H "content-type: application/json"
-d '{
  "amount": 50000,
  "currency": "",
  "receipt": "receipt#1",
  "checkout_config_id": "config_Ep0eOCwdSfgkco"
}'
```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 50000,
  "currency": "",
  "receipt": "receipt#1",
  "checkout_config_id": "config_Ep0eOCwdSfgkco"
 })
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => 'receipt#1', 'amount' => 50000, 'currency' => '', 'checkout_config_id' => 'config_Ep0eOCwdSfgkco'));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.Add("receipt", "receipt#1");
options.Add("currency", "");
options.Add("checkout_config_id", "config_Ep0eOCwdSfgkco");
Order order = client.Order.Create(options);

```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
  currency: "",
  receipt: "receipt#1",
  checkout_config_id: "config_Ep0eOCwdSfgkco"
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 50000,
  "currency": "",
  "receipt": "receipt#1",
  "checkout_config_id": "config_Ep0eOCwdSfgkco"
}
body, err := client.Order.Create(data, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 50000, currency: '', receipt: 'receipt#1', checkout_config_id: 'config_Ep0eOCwdSfgkco'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 50000); // amount in the smallest currency unit
orderRequest.put("currency", "");
orderRequest.put("receipt", "receipt#1");
orderRequest.put("checkout_config_id", "config_Ep0eOCwdSfgkco");

Order order = razorpay.orders.create(orderRequest);

```json: Response
{
  "id": "order_EKwxwAgItmmXdp",
  "entity": "order",
  "amount": 50000,
  "amount_paid": 0,
  "amount_due": 50000,
  "currency": "",
  "receipt": "receipt#1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1582628071
}
```

Know more about [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

#### Request Parameters

Descriptions for the request parameters are present in the [Create an Order Request Parameters](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md) table.

#### Response Parameters

Descriptions for the response parameters are present in the [Orders Entity](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/entity.md) parameters table.

### Related Information

- [Supported Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md)
- [Sample Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/sample-code.md)
