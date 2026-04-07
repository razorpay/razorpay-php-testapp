---
title: No Cost EMIs from Bajaj Finserv - Standard Checkout
description: Let your customers avail Bajaj Finserv EMI options on Razorpay Standard Checkout.
---

# No Cost EMIs from Bajaj Finserv - Standard Checkout

Let your customers avail No Cost EMIs offered by Bajaj Finserv on Razorpay Standard Checkout.

## Integration Flow

If you want to display the No Cost EMI offered by Bajaj Finserv on the Checkout, you must associate the offer with an order. The details of the integration are listed below.

### Step 1: Create No Cost EMI Offers

Raise a request with the[Razorpay Support team](https://razorpay.com/support/#request)to create the relevant No Cost EMIs you want to display on the Checkout. Get the appropriate `offer_id` created for each EMI plan.

### Step 2: Create an Order

Obtain the `offer_id`.  Let us say, `offer_ANZoaxsOww2X53`, from our Support team. Create an order for the transaction amount for which the created offer should be applied.

/orders

`amount` _mandatory_
: `integer` Amount, in currency subunits, for which the order is created. For example, if the order is to be created for ₹30,000, enter the value 3000000 (in paise).

`currency` _mandatory_
: `string` ISO code of the currency associated with the order amount.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`offers` _mandatory_
: `array` Unique identifier of the Offer. 
 Pass the `offer_id` obtained from Razorpay Support team.

`discount`_optional_
: `boolean` Indicate if a discount is to be applied by Razorpay or not. Possible values are:
  - `true`: Discount is applied.
  - `false`: Discount is not applied.

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 1000000,
  "currency": "INR",
  "discount": true,
  "offers": [
    "offer_ANZoaxsOww2X53"
  ]
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

       ArrayList Offer = new ArrayList();
        Offer.add("offer_JTUADI4ZWBGWur");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 1000000); // amount in the smallest currency unit
        orderRequest.put("currency", "INR");
        orderRequest.put("discount", true);
        orderRequest.put("offers", Offer);

        Order order = razorpayclient.orders.create(orderRequest);
        System.out.print(order);
```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 1000000,
  "currency": "INR",
  "receipt": "receipt#1",
  "discount": True,
  "offers": [
    "offer_ANZoaxsOww2X53"
  ]
})
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 1000000, 'currency' => 'INR', 'discount' => true, 'offers'=> array('offer_JTUADI4ZWBGWur')));
```ruby: Ruby 
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 50000, currency: 'INR', discount: '1', receipt: 'receipt#1',  offers: [
    'offer_ANZoaxsOww2X53"'
]
```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 1000000,
  currency: "INR",
  receipt: "receipt#1",
  discount: true,
  offers: [
    "offer_ANZoaxsOww2X53"
  ]
})
```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
 "amount": 50000,
 "currency": "INR",
 "receipt": "receipt#1",
	"offers": []interface{}{
	"offer_JTUADI4ZWBGWur",
  },
}
body, err := client.Order.Create(data, nil)

```json: Response
{
  "id": "order_CjyoZFRpB8r0AH",
  "entity": "order",
  "amount": 1000000,
  "amount_paid": 0,
  "amount_due": 1000000,
  "currency": "INR",
  "receipt": null,
  "offer_id": "offer_ANZoaxsOww2X53",
  "offers": [
    "offer_ANZoaxsOww2X53"
  ],
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1561018912
}
```

### Step 3: Trigger the Checkout

The `order_id` obtained in the previous step can be passed to Checkout form as follows:

```js: JavaScript

```

### Next Steps

Once the customer has successfully made the payment after availing the desired Offer, you can check the status of the payment from the Dashboard.
