---
title: Partner Auth | Payment Gateway
heading: Payment Gateway
description: Integrate Razorpay Payment Gateway using Partner Auth.
---

# Payment Gateway

Follow these steps to integrate with the Razorpay Payment Gateway:

1. [Create an order using Orders API](#step-1-create-an-order-using-orders-api).
2. [Add the Razorpay Checkout code to your website](#step-2-add-razorpay-checkout-code-to-website).
3. [Store fields in your server](#step-3-store-fields-in-your-server).
4. [Verify payment signature](#step-4-verify-payment-signature).
5. [Verify payment status](#step-5-verify-payment-status).

## Step 1: Create an Order Using Orders API

Integrate with [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md) to create an order. Given below is the sample code for Create an Order API. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

/orders

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders \
-u [CLIENT_ID]:[CLIENT_SECRET] \
-H 'content-type:application/json' \
-H 'X-Razorpay-Account: acc_Ef7ArAsdU5t0XL' \
-d '{
    "amount": 50000,
    "currency": "INR",
    "receipt": "rcptid_11"
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);
orderRequest.put("amount", 50000); // amount in the smallest currency unit
orderRequest.put("currency", "INR");
orderRequest.put("receipt", "receipt#1");

Order order = razorpay.orders.create(orderRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

headers = {"headers": {"X-Razorpay-Account": "acc_ImoLtoiOGXlyEi"}}

client.order.create(data={
    "amount": 50000,
    "currency": "INR",
    "receipt": "rcptid_11"
,}, **headers)

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->order->create(array('receipt' => 'receipt#1', 'amount' => 50000, 'currency' => 'INR'));

```csharp: .NET
RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

client.addHeader("X-Razorpay-Account", "acc_Ef7ArAsdU5t0XL");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 50000);
orderRequest.Add("currency", "INR");
orderRequest.Add("receipt", "receipt#1");

Order order = client.Order.Create(orderRequest);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1'

```javascript: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.orders.create({
"amount": 50000,
"currency": "INR",
"receipt": "rcptid_11"
}) 

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

data := map[string]interface{}{
  "amount": 50000,
  "currency": "INR",
  "receipt": "some_receipt_id",
  "partial_payment": false,
  "notes": map[string]interface{}{
      "key1": "value1",
      "key2": "value2",
    } 
}
body, err := client.Order.Create(data, extraHeaders)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr:= map[string]interface{}{
    "amount": "50000",
    "currency": "INR",
    "receipt": "rcptid_11",
}

headers:= map[string]string{
    "X-Razorpay-Account": "acc_ImoLtoiOGXlyEi",
}

body, err := client.Order.Create(para_attr, headers)

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

Here is the list of parameters and their description for creating an order:

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunits. For example, for an actual amount of , the value of this field should be `30000`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md). Length must be 3 characters.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

## Step 2: Add Razorpay Checkout Code to Website

Copy-paste the parameters as `options` in your code. This creates a Pay button on the website, which the customer can use to invoke Checkout and complete the payment. Pass the `order_id` received in the response of [step 1](#step-1-create-an-order-using-orders-api) to the checkout code.

```html: Checkout with Handler Functions (JavaScript)
Pay

var options = {
    "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise.
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "account_id": "acc_Ef7ArAsdU5t0XL",
    "order_id": "order_DBJOWzybf0sJbb", //This is a sample Order id. Pass the `id` obtained in the response of Step 1.
    "handler": function (response){
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
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
        "color": "#3399cc"
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

```html: Manual Checkout with Callback URL (JavaScript)
Pay

var options = {
    "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise.
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "account_id": "acc_Ef7ArAsdU5t0XL",
    "order_id": "order_DBJOWzybf0sJbb", //This is a sample Order id. Pass the `id` obtained in the response of Step 1.
    "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9000090000"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

```

> **INFO**
>
> 
> **Handy Tips**
> 
> Test your integration using these [test cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps/#2-test-integration.md).
> 

### Checkout Options

@include checkout-parameters/standard

## Step 3: Store Fields in Your Server

@include integration-steps/store-fields

## Step 4: Verify Payment Signature

@include integration-steps/verify-signature

Check [our SDKs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/server-integration.md) for the supported platforms.

## Step 5: Verify Payment Status

@include integration-steps/verify-payment-status

## Next Steps

You can view the payments received from customers on the sub-merchant's  Dashboard. Also, you can retrieve the status of the payments by polling our [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api.md).

Given below is the APIs used to fetch payments. You must pass the sub-merchant account identifier as a header while retrieving details using GET requests.

### Fetch Payments of Sub-Merchants API

You can fetch the details of the payments received by sub-merchant using the endpoint given below. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

/payments

```curl: Curl
curl -X GET https://api.razorpay.com/v1/payments \
-u : \ 
-H 'X-Razorpay-Account: acc_Ef7ArAsdU5t0XL' \

```java: Java
RazorpayClient razorpay = new RazorpayClient([YOUR_KEY_ID],[YOUR_KEY_SECRET]);
try {
  JSONObject orderRequest = new JSONObject();
  headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
  instance.addHeaders(headers);

    //supported option filters (from, to, count, skip)

  List payments = razorpay.Payments.fetchAll(paymentRequest);
} catch (RazorpayException e) {
  // Handle Exception
    System.out.println(e.getMessage());
}

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->payment->all($options)

```js:Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.payments.all(option)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

Razorpay::Payment.all

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

body, err := client.Payment.All(nil, extraHeaders)
```json: Response
{
  "id": "pay_EfXir8l3TPO9zw",
  "entity": "payment",
  "amount": 10000,
  "currency": "MYR",
  "status": "authorized",
  "order_id": "order_EfXfUWQzL1YyI4",
  "invoice_id": null,
  "international": false,
  "method": "wallet",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": false,
  "description": "Test transaction",
  "card_id": null,
  "bank": null,
  "wallet": "touchngo",
  "email": "gaurav.kumar@example.com",
  "contact": "+919988776644",
  "notes": [],
  "fee": null,
  "tax": null,
  "error_code": null,
  "error_description": null,
  "created_at": 1587124317
}
```

### Related Information

- [Razorpay Payment Gateway: Web Standard Integration Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard.md).
