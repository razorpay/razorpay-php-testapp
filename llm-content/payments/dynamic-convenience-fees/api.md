---
title: Dynamic Convenience Fees API
description: API to charge dynamic convenience fees to customers.
---

# Dynamic Convenience Fees API

You can send the convenience fee split details in the Orders API to override any pre-configured settings. 

> **INFO**
>
> 
> **Handy Tips**
> 
> You can configure the convenience fee based on:
> - Fixed amount/Percentage 
> - From a customer/business perspective
> 
> For example, the business can create a configuration wherein, if the total platform fee is ₹10, then the business will pay ₹5, and the customer will pay ₹5.
> 
> Alternatively, the business can create a configuration wherein the customer will bear 20% of the total platform fee, and the business will bear the rest.
> 
> You can perform this configuration at the method level.
> 
> 

## Orders API

Order is an essential step in the payment process. For every payment, you should create an order. You can create an order using Orders API and pass the convenience fee details. The order_id received in the response should be then passed to checkout.

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "convenience_fee_config": {
    "message": "To make payment without any additional charges, please use UPI or Net Banking",
    "label": "Convenience Fee",
    "rules": [
      {
        "method": "card",
        "card.type": [
          "credit",
          "debit"
        ],
        "fee": {
          "payee": "customer",
          "percentage_value": "100"
        }
      },
      {
        "method": "card",
        "card.type": [
          "prepaid"
        ],
        "fee": {
          "payee": "business",
          "percentage_value": "50"
        }
      },
      {
        "method": "netbanking",
        "fee": {
          "payee": "customer",
          "flat_value": 100
        }
      },
      {
        "method": "upi",
        "fee": {
          "payee": "business",
          "flat_value": 200
        }
      },
      {
        "method": "card",
        "fee": {
          "payee": "customer",
          "percentage_value": "20.33"
        }
      }
    ]
  }
}'
```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "convenience_fee_config": {
    "message": "To make payment without any additional charges, please use UPI or Net Banking",
    "label": "Convenience Fee",
    "rules": [
      {
        "method": "card",
        "card.type": [
          "credit",
          "debit"
        ],
        "fee": {
          "payee": "customer",
          "percentage_value": "100"
        }
      },
      {
        "method": "card",
        "card.type": [
          "prepaid"
        ],
        "fee": {
          "payee": "business",
          "percentage_value": "50"
        }
      },
      {
        "method": "netbanking",
        "fee": {
          "payee": "customer",
          "flat_value": 100
        }
      },
      {
        "method": "upi",
        "fee": {
          "payee": "business",
          "flat_value": 200
        }
      },
      {
        "method": "card",
        "fee": {
          "payee": "customer",
          "percentage_value": "20.33"
        }
      }
    ]
  }
 })
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

        JSONObject orderRequest = new JSONObject();
        JSONObject config = new JSONObject();
        orderRequest.put("amount", 50000);
        orderRequest.put("currency", "INR");
        orderRequest.put("receipt", "receipt#1");
        orderRequest.put("convenience_fee_config", config);
        config.put("message","To make payment without any additional charges, please use UPI or Net Banking");
        config.put("label","GD");

         ArrayList rules = new ArrayList();
        JSONObject method = new JSONObject();
        JSONObject method_param = new JSONObject();

        rules.add(method);
        rules.add(method_param);

        config.put("rules",rules);
        method.put("method","card");
        ArrayList cards = new ArrayList();
        cards.add("credit");
        cards.add("debit");
        method.put("card.type",cards);

        JSONObject fee = new JSONObject();
        fee.put("payee","customer");
        fee.put("percentage_value","100");
        method.put("fee",fee);

        method_param.put("method","card");
        ArrayList cards_param = new ArrayList();
        cards_param.add("credit");
        cards_param.add("debit");
        method.put("card.type",cards_param);

        JSONObject fee_param = new JSONObject();
        fee_param.put("payee","customer");
        fee_param.put("percentage_value","100");
        method.put("fee",fee_param);

Order order = razorpay.Orders.create(orderRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array("amount" => 50000,"currency" => "INR","receipt" => "receipt#1","convenience_fee_config" => array("message" => "To make payment without any additional charges, please use UPI or Net Banking","label" => "Convenience Fee","rules" => array(array("method" => "card","card.type" => array("credit","debit"),"fee" => array("payee" => "customer","percentage_value" => "100")),array("method" => "card","card.type" => array("prepaid"),"fee" => array("payee" => "business","percentage_value" => "50")),array("method" => "netbanking","fee" => array("payee" => "customer","flat_value" => 100)),array("method" => "upi","fee" => array("payee" => "business","flat_value" => 200)),array("method" => "card","fee" => array("payee" => "customer","percentage_value" => "20.33"))))));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1',  convenience_fee_config: {
    message: 'To make payment without any additional charges, please use UPI or Net Banking',
    label: 'Convenience Fee',
    rules: [
      {
        method: 'card',
        card.type: [
          'credit',
          'debit'
        ],
        fee: {
          payee: 'customer',
          percentage_value: '100'
        }
      },
      {
        method: 'card',
        card.type: [
          'prepaid'
        ],
        fee: {
          payee: 'business',
          percentage_value: '50'
        }
      },
      {
        method: 'netbanking',
        fee: {
          payee: 'customer',
          flat_value: 100
        }
      },
      {
        method: 'upi',
        fee: {
          payee: 'business',
          flat_value: 200
        }
      },
      {
        method: 'card',
        fee: {
          payee: 'customer',
          percentage_value: '20.33'
        }
      }
    ]
  }
```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
  currency: "INR",
  receipt: "receipt#1",
  convenience_fee_config: {
    message: “To make payment without any additional charges, please use UPI or Net Banking”,
    label: “Convenience Fee”,
    rules: [
      {
        method: “card”,
        card.type: [
          “credit”,
          “debit”
        ],
        fee: {
          payee: “customer”,
          percentage_value: “100”
        }
      },
      {
        method: “card”,
        card.type: [
          “prepaid”
        ],
        fee: {
          payee: “business”,
          percentage_value: “50”
        }
      },
      {
        method: “netbanking”,
        fee: {
          payee: “customer”,
          flat_value: 100
        }
      },
      {
        method: “upi”,
        fee: {
          payee: “business”,
          flat_value: 200
        }
      },
      {
        method: “card”,
        fee: {
          payee: “customer”,
          percentage_value: “20.33”
        }
      }
    ]
  }

})
```go: Go 
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "convenience_fee_config": {
    "message": "To make payment without any additional charges, please use UPI or Net Banking",
    "label": "Convenience Fee",
    "rules": [
      {
        "method": "card",
        "card.type": [
          "credit",
          "debit"
        ],
        "fee": {
          "payee": "customer",
          "percentage_value": "100"
        }
      },
      {
        "method": "card",
        "card.type": [
          "prepaid"
        ],
        "fee": {
          "payee": "business",
          "percentage_value": "50"
        }
      },
      {
        "method": "netbanking",
        "fee": {
          "payee": "customer",
          "flat_value": 100
        }
      },
      {
        "method": "upi",
        "fee": {
          "payee": "business",
          "flat_value": 200
        }
      },
      {
        "method": "card",
        "fee": {
          "payee": "customer",
          "percentage_value": "20.33"
        }
      }
    ]
  }
}
body, err := client.Order.Create(data)
```json: Response
{
  "id": "order_EKwxwAgItmmXdp",
  "entity": "order",
  "amount": 50000,
  "amount_paid": 0,
  "amount_due": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1582628071,
  "convenience_fee_config": {
    "rules": [
      {
        "method": "card",
        "card.type": [
          "credit",
          "debit"
        ],
        "fee": {
          "payee": "customer",
          "percentage_value": "100"
        }
      },
      {
        "method": "card",
        "card.type": [
          "prepaid"
        ],
        "fee": {
          "payee": "business",
          "percentage_value": "50"
        }
      },
      {
        "method": "netbanking",
        "fee": {
          "payee": "customer",
          "flat_value": 100
        }
      },
      {
        "method": "upi",
        "fee": {
          "payee": "business",
          "flat_value": 200
        }
      },
      {
        "method": "card",
        "fee": {
          "payee": "customer",
          "percentage_value": "20.33"
        }
      }
    ]
  }
}
```

### Request Parameters

`amount` _mandatory_
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of ₹295, enter `29500`. 

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters. For example, `INR`. Dynamic convenience fee feature is supported only on `INR` transactions.

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. It can have a maximum length of 40 characters and has to be unique.

`notes` _optional_
: `json object` Key-value pair used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty"`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
    - `true`: Customers can make a partial payment.
    - `false`: Customers cannot make partial payments.

`convenience_fee_config` _optional_
: `json object` This parameter will contain information about the convenience fee split for the given order.

    `message` _optional_
    : `string` Message displayed at the checkout in case convenience fee is applicable. The maximum character limit is `120`.

    `label` _optional_
    : `string` Label shown at the checkout in case convenience fee is applicable. The maximum character limit is `20`. The default value is `Convenience Fee`.

    `rules` _mandatory_
    : `array` Conditions to determine the fee split for different payment methods.

        `method` _mandatory_
        : `string` Payment method for which the given rule will be applicable. Possible values:
            - `card`
            - `netbanking`
            - `upi`
            - `wallet`

        `card.type` _optional_
        : `array` Applicable only when the `method=card`. Possible values:
            - `debit`
            - `credit`
            - `prepaid`

        `fee` _mandatory_
        : `json object` Contains information about the convenience fee split and payee details for the given order.

            `payee` _mandatory_
            : `string` The party that will be bearing the convenience fee. Possible values:
                - `customer`
                - `business`

            `percentage_value` _optional_
            : `string` The percentage of convenience fee that the customer or business will pay. Up to two decimal places are supported. Pass either `percentage_value` or `flat_value` to decide the final fee split.

            `flat_value` _optional_
            : `integer` Convenience fee value, in paisa, that the customer or business will pay. If this value exceeds the total platform fee, then the minimum amount will be considered. Pass either `percentage_value` or `flat_value` to decide the final fee split.

## Error Responses

Given below are some of the error responses:

1. When the dynamic convenience fee feature is not enabled for your Razorpay account.
2. When an invalid value is sent for the `convenience_fee_config.rules.method` or `convenience_fee_config.rules.card.type` field in the request.
3. When the percentage value is not passed in string format.

```json: Error #1
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Convenience fee configurable for dynamic fee bearer users only",
    "source": "business",
    "step": "payment_initiation",
    "reason": "invalid_convenience_fee_config",
    "metadata": {},
    "field": "convenience_fee_config"
  }
}
```json: Error #2
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "emi is not a valid method",
    "source": "business",
    "step": "payment_initiation",
    "reason": "invalid_convenience_fee_config",
    "metadata": {},
    "field": "convenience_fee_config.rules.emi"
  }
}
```json: Error #3
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "percentage_value value should be string",
    "source": "business",
    "step": "payment_initiation",
    "reason": "invalid_convenience_fee_config",
    "metadata": {},
    "field": "convenience_fee_config.rules.percentage_value"
  }
}
```
