---
title: Highlight axio on Checkout
description: Configure and highlight axio as a payment method on Razorpay Checkout.
---

# Highlight axio on Checkout

After [axio payment method is enabled](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md), it appears as a Cardless EMI provider under EMI on Razorpay Standard Checkout. You can highlight **axio** on the Razorpay Checkout using a configuration and make it more prominent.

Follow these steps to highlight axio on Razorpay Checkout:

1. [Configure payment methods](#1-configure-payment-methods).
2. [Build configuration](#2-build-the-configuration).

## 1. Configure Payment Methods

Based on how you want to control the payment methods at the Checkout, there are two different ways to pass the configuration to Checkout: **Options Parameter** and **Global Settings**.

    
        Pass the configuration to the `options` parameter of the Checkout code at run time. *Use it when you want to modify the order of the payment methods for a particular set of payments while rendering the Checkout.* 
    
    
        Create a global setting of the payments as a **Configuration ID**. *Use it when you want to fix the order of the payment methods on all the instances of Checkout.* Check the [Sample Code](#sample-code).

        
> **INFO**
>
>  
>         **Attention Plugin Users** 

>         If you are using one of our [plugins](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/ecommerce-plugins.md) to accept payments, you can highlight axio on Checkout only by creating a global setting of the payments as a **Configuration ID**. Contact our [Support Team](https://razorpay.com/support/#raise-a-request) for more details about Configuration ID.
>         

        

## 2. Build Configuration

Using the `display` config, you can put together all the modules, that is, `blocks`, `sequence`, `preferences`, `hide` instruments as shown below:

You can pass the `display` config in the Checkout options or the Orders API request using the `checkout_config_id` parameter.

```js: display config
let config = {
    display: {
        blocks: {
            walnutBlock: {
                name: "Pay With Axio", // The title of the block
                instruments: [{
                    "method": "cardless_emi",
                    "providers": ["walnut369"]
                }] // The list of instruments
            },
        },
        sequence: ["block.walnutBlock"], // The sequence in which blocks and methods should be shown
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
    currency: "INR",
    config: {
        display: {
            blocks: {
                walnutBlock: {
                    name: "Pay With axio", // The title of the block
                    instruments: [{
                        "method": "cardless_emi",
                        "providers": ["walnut369"]
                    }] // The list of instruments
                },
            },
            sequence: ["block.walnutBlock"], // The sequence in which blocks and methods should be shown
            preferences: {
                show_default_blocks: true // Should Checkout show its default blocks?
            }
        }
    }
};
let razorpay = new Razorpay(options);
razorpay.open();
....
//rest of the Checkout code
```

```curl: Orders Sample Request
//Contact our Support Team to get your `checkout_config_id` parameter.
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "checkout_config_id": "config_Ep0eOCwdSfgkco",
  "notes": {
    "reference_no": "IBFA10106201500002"
    }
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 1000); // amount in the smallest currency unit
        orderRequest.put("currency", "INR");
        orderRequest.put("checkout_config_id", "config_Ep0eOCwdSfgkco");

        Order order = razorpayclient.orders.create(orderRequest);
        System.out.print(order);
```python: Python 

import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
"amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "checkout_config_id": "config_Ep0eOCwdSfgkco"
 })

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 100, 'currency' => 'INR', checkout_config_id=> 'config_Ep0eOCwdSfgkco'));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.Add("receipt", "receipt#1");
options.Add("currency", "INR");
options.Add("checkout_config_id", "config_Ep0eOCwdSfgkco");
Order order = client.Order.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1',   checkout_config_id: 'config_Ep0eOCwdSfgkco'

```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
  currency: "INR",
  receipt: "receipt#1",
  checkout_config_id: "config_Ep0eOCwdSfgkco"
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "checkout_config_id": "config_Ep0eOCwdSfgkco"
}
body, err := client.Order.Create(data, nil)

```

Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

## Sample Code

    
### Given below is the sample code to highlight axio on Standard Checkout: 

        ```html: Highlight axio on Standard Checkout
                
                Pay
                
                
                var options = {
                    "key": " your key_id", // Enter the Key ID generated from the Dashboard
                    "amount": "500000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                    "currency": "INR",
                    "name": "Acme Corp",
                    "description": "Test Transaction",
                    "image": "https://example.com/your_logo",
                //  "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                    "handler": function (response){
                        alert(response.razorpay_payment_id);
                        alert(response.razorpay_order_id);
                        alert(response.razorpay_signature)
                    },
                    "config": {
                        "display": {
                            "blocks": {
                                "walnut": {
                                    "name": 'Pay via axio',
                                    "instruments": [
                                        {
                                    "method": 'cardless_emi',
                                    "providers":['walnut369']
                                }
                            ],
                        },
                    },
                "sequence": ['block.walnut'],
                "preferences": {
                    "show_default_blocks": false,
                },
                },
                },
                    "prefill": {
                        "name": "Gaurav Kumar",
                        "email": "gaurav.kumar@example.com",
                        "contact": "9000090000"
                    },
                    "notes": {
                        "address": "Razorpay Corporate Office"
                    },
                    "theme": {
                        "color": "#3399CC"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function (response){
                        alert(response.error.code);
                        alert(response.error.description);
                        alert(response.error.source);
                        alert(response.error.step);
                        alert(response.error.reason);
                        alert(response.error.metadata.order_id);
                        alert(response.error.metadata.payment_id);
                });
                document.getElementById('rzp-button1').onclick = function(e){
                    rzp1.open();
                    e.preventDefault();
                }
                
                
        ```
        

### Related Information

[Configure Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md) on Razorpay Checkout
