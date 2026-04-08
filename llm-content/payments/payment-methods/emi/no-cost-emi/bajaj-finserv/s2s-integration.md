---
title: No Cost EMIs from Bajaj Finserv - S2S
description: Integrate directly with Razorpay APIs to enabling No Cost EMI offers provided by Bajaj Finserv in your payment flow.
---

# No Cost EMIs from Bajaj Finserv - S2S

You can integrate Bajaj Finserv No Cost EMI offers with your payment flows by integrating directly with the Razorpay APIs.

## Prerequisites

- Generate API keys from the Dashboard.
- A combination of `key_id` and `key_secret` is required to authenticate each API request sent to Razorpay servers.

## Workflow

1. Obtain the relevant No Cost EMI offers created by our Support team.
2. Create orders for each of the offers.
3. Create a payment to be sent to the customer.
4. Verify the payment made by the customer.

### Step 1: Create Offers

Raise a request with the[ Razorpay Support team ](https://razorpay.com/support/#request)to create the relevant No Cost EMIs you want to display on the Checkout. Get the appropriate `offer_id` created for each EMI plan.

### Step 2: Create an Order

Pass the relevant `offer_id`, let us say `offer_Dlf8r40nEMm3wI` obtained from our Support team, in the Orders API as shown below:

/orders

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

order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1',  discount: 1, offers: [
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
 "discount": true,
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
: `boolean` Indicates if a discount is to be applied by Razorpay or not. Possible values are:
    - `true`: Discount is applied.
    - `false`: Discount is not applied.

### Step 3: Create a Payment

Send the `order_id` obtained in the previous step along with the following attributes to create a payment:

/payments/create/redirect

#### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. 
 For example, if the amount to be charged is ₹299, then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example,`INR`.

`order_id` _mandatory_
: `string` Unique identifier of the Order created at your server-side.
 Pass the Order ID created in the [Step 2](#step-2-create-an-order) response.

`email` _mandatory_
: `string` Email address of the customer.

`contact` _mandatory_
: `string` Phone number of the customer.

`method` _mandatory_
: `string` The payment method used to complete the payment. Here, it is `emi`.

`emi_duration` _mandatory_
: `integer` The duration of the EMI plans offered by the EMI card provider. 
 Possible values:
    - `3`
    - `6`
    - `9`
    - `12`
    - `18`
    - `24`

`provider` _mandatory_
: `string` Name of the EMI card provider. Supported value is `bajajfinserv`.

`notes` _optional_
: `json object` Key-value object used for passing additional information. 
 A maximum of 15 key-value pairs can be created.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`ip` _optional_
: `string` IP Address of the client's browser.

`referrer` _optional_
: `string` Referrer URL of the client's browser.

`user_agent` _optional_
: `string`  User-agent of the client's browser.

```curl: Sample Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X POST https://api.razorpay.com/v1/payments/create/redirect \
    -H "Content-Type: application/json" \
    -d'{
    "amount": 300000,
    "currency": "INR",
    "contact": 8888888888,
    "email": "gaurav.kumar@example.com",
    "order_id": "order_DtEkng132N71M8",
    "method": "emi",
    "emi_duration": 3,
    "provider": "bajajfinserv"
 }'
```

#### Response Types

`2OO OK`
: In this case, the response contains `200 OK` code along with the HTML content that needs to be opened in the customer's browser. This HTML content contains form-fields, which are automatically posted to the redirect URL for the payment to be completed by the customer.

`400 Bad Request`
: This can happen when incorrect parameters are passed in the request. For example, when the limit set in offers is exceeded:

    ```
    {
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "Offer Maximum Usage limit exceeded"
    }
    ```

Know more about [error codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#error-codes) for more details.

The HTML form returned in the response should be opened in the customer's browser. The customer completes the payment on the displayed page.

## Step 4: Verify the Payment

Once the payment is completed by the customer, a `POST` request is sent to the `callback_url` provided in the [payment create request](#step-3-create-a-payment). The data contained in the `POST` request depends on the **success** or **failure** of the payment made by the customer.

You can be notified of the payment status if you have configured the Webhook notifications or fetching the payment status by polling our [Payments API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#fetch-payments-based-on-orders). Know more about [configuring webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).
