---
title: Configure Payment Capture Settings using Orders API
description: Configure auto-capture settings for individual payments using APIs.
---

# Configure Payment Capture Settings using Orders API

Once your customer completes a payment, it is automatically moved to `captured` state. However, the payment can attain `authorized` state in the following scenarios:

- **Late authorization** 

  Due to external factors such as network issues or technical errors, Razorpay may not receive payment status from the bank immediately. In this case, Razorpay polls the APIs intermittently for 5 days to check the status. If we receive the payment status as successful, the payment is moved to the `authorized` state. [Learn more about late authorization](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md).
- **Specific business use case** 

  Some businesses such as those in the Ecommerce industry may retain the payment in the `authorized` state and later move them to the `captured` state.

You must ensure that all payments in the `authorized` state are moved to the `captured` state within 5 days of creation. This is mandatory because payments that are not captured within this time period will be refunded automatically to customers.

You can configure **Payment Capture setting** for individual payments using the Orders API.

> **WARN**
>
> 
> **Watch Out!**
> 
> The options sent in the below API take precedence over the [account level auto-capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) configured using the Dashboard.
> 

## API

Use the below endpoint to configure auto-capture settings for individual payments.

/orders

```cURL: Curl
curl  -X POST https://api.razorpay.com/v1/orders
-u :
-H 'content-type:application/json'
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "rcptid_11",
  "payment": {
    "capture": "automatic",
    "capture_options": {
      "automatic_expiry_period": 12,
      "manual_expiry_period": 7200,
      "refund_speed": "optimum"
    }
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount",50000);
orderRequest.put("currency","INR");
orderRequest.put("receipt", "rcptid_11");
JSONObject payment = new JSONObject();
payment.put("capture","automatic");
JSONObject captureOptions = new JSONObject();
captureOptions.put("automatic_expiry_period",12);
captureOptions.put("manual_expiry_period",7200);
captureOptions.put("refund_speed","optimum");
payment.put("capture_options",captureOptions);
orderRequest.put("payment",payment);
              
Order order = razorpay.orders.create(orderRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  'amount':50000,
  'currency': 'INR',
  'receipt': 'rcptid_11',
  'payment': {
    'capture': 'automatic',
    'capture_options': {
      'automatic_expiry_period': 12,
      'manual_expiry_period': 7200,
      'refund_speed': 'optimum'
    }  
  }
})

```php: PHP

order->create(
    array(
        'amount'   => 50000,
        'currency' => 'INR',
        'receipt'  => 'rcptid_11',
        'payment'  => array(
            'capture'       => 'automatic',
            'capture_options' => array(
                'automatic_expiry_period' => 12,
                'manual_expiry_period'    => 7200,
                'refund_speed'            => 'optimum'
            )
        )
    )
);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount":50000,
  "currency": "INR",
  "receipt": "rcptid_11",
  "payment": {
    "capture ": "automatic",
    "capture_options ": {
      "automatic_expiry_period ": 12,
      "manual_expiry_period ": 7200,
      "refund_speed": "optimum"
    }  
  }
}
Razorpay::Order.create(para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount:50000,
  currency: 'INR',
  receipt: 'rcptid_11',
  payment: {
    capture : 'automatic',
    capture_options : {
      automatic_expiry_period : 12,
      manual_expiry_period : 7200,
      refund_speed : 'optimum'
    }  
  }
})

```csharp: .NET
RazorpayClient client = new RazorpayClient(api_key, api_secret);

Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.Add("receipt", "order_rcptid_11");
options.Add("currency", "INR");
payment.capture="automatic";
payment.capture_options.automatic_expiry_period=12;
payment.capture_options.manual_expiry_period=7200;
payment.capture_options.refund_speed="optimum";
options.Add("payment", payment);
Order order = client.Order.Create(options);
```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )

client := razorpay.NewClient("api_key", "api_secret")

data := map[string]interface{}{ 
  "amount": 1234, 
  "currency": "INR", 
  "receipt": "some_receipt_id", 
  "payment": map[string]interface{}{ 
    "capture": "automatic", 
    "capture_options": map[string]interface{}{ 
      "automatic_expiry_period": 12, 
      "manual_expiry_period": 7200, 
      "refund_speed": "optimum"
    } 
  } 
}
body, err := client.Order.Create(data)
```

```json: Response
{
  "id": "order_DBJOWzybf0sJbb",
  "entity": "order",
  "amount": 50000,
  "amount_paid": 0,
  "amount_due": 50000,
  "currency": "INR",
  "receipt": "rcptid_11",
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1566986570
}
```

### Request Parameters

`amount` _mandatory_
: `integer` The amount, in currency subunit, for order. For example, for an amount of ₹295, enter `29500`.

`currency` _mandatory_
: `string` 3-letter ISO currency code for the payment. [List of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

`payment` _optional_
: `array` Payment capture settings for the payment. The options sent here override the [account level auto-capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) configured using the Dashboard.

  `capture` _mandatory_
  : `string` Option to automatically capture payment. Possible values:
    - `automatic`: Payments are auto-captured according to the configurations specified in the `capture_options` array.
    - `manual`: You have to manually capture payments using our [Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments).

  `capture_options` _optional_
  : `array` Use this array to determine the expiry period for automatic and [manual capture](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings/api.md) of payments and the refund speed in the case of non-capture.

    `automatic_expiry_period` _mandatory if capture = automatic_
    : `integer` Time in minutes till when payments in the `authorized` state should be auto-captured.
      Minimum value `12` minutes. This parameter is mandatory only if the value of `capture` parameter is `automatic`.

    `manual_expiry_period` _optional_ 
    : `integer` Time in minutes till when you can manually capture payments in the `authorized` state.
      - Must be equal to or greater than the `automatic_expiry_period` value.
      - Default value `7200` minutes.
      - Maximum value `7200` minutes.
      - Payments in the `authorized` state after the `manual_expiry_period` are auto-refunded.

    `refund_speed` _mandatory_
    : `string` Refund speed for payments that were not captured (automatically or manually). Possible values:
      - `normal`: The refund is processed in 5-7 working days.

If no value is passed, the refund is processed using the [default speed set on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#setting-the-default-speed-of-refunds).

`receipt` _optional_
: `string` Maximum length is 40 characters. Receipt number, for internal reference, entered by you for the order.

`notes` _optional_
: `object` Key-value pair to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### Response Parameters

`id`
: `string` The unique identifier of the order. For example, `order_EKwxwAgItmmXdp`.

`amount`
: `integer` The amount, in currency subunit, for the order. For example, for an amount of ₹295, enter `29500`.

`amount_paid`
: `integer` The amount, in currency subunit, paid against the order.

`amount_due`
: `integer` The amount, in currency subunit, pending against the order.

`currency`
: `string` 3-letter ISO currency code for the payment. [List of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

`receipt`
: `string` Maximum length is 40 characters. Receipt number, for internal reference, entered by you for the order.

`status`
: `string` The status of the order. Possible values:
  - `created`: When you create an order it is in the `created` state.
It stays in this state till a payment is attempted on it.
  - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it.
It remains in the `attempted` state till one payment associated with that order is captured.
  - `paid`: After the successful capture of the payment, the order moves to the `paid` state.
No further payment requests are permitted once the order moves to the `paid` state.
The order stays in the `paid` state even if the payment associated with the order is refunded.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order. For example, `1`.

`notes`
: `object` Key-value pairs to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` Timestamp, in Unix, when the order was created. For example, `1593607540`.

**Handy Tips**

- If `automatic_expiry_period` is `60` minutes and `manual_expiry_period` is `120` minutes, payments in the `authorized` state after `120` minutes are auto-refunded.
- If `automatic_expiry_period` is `0` minutes and `manual_expiry_period` is `120` minutes, payments in the `authorized` state after `120` minutes are auto-refunded.

### Related Information

- [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md)
- [How Payment Gateway Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md)
- [Payment States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md#payment-life-cycle)
- [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md)
- [Manually capture payments using Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment)
- [Manually capture payments from the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments)
- [Set up and subscribe to Webhook events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)
