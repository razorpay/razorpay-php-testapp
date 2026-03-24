---
title: Integrate Offers with Custom Checkout
description: Integrate Offers with Custom Checkout built using Razorpay.js.
---

# Integrate Offers with Custom Checkout

In the Checkout form designed to meet your business needs and branding, you can display Offers so that customers can derive maximum advantage from them while you promote your business.

> **INFO**
>
> 
> **New to Custom Checkout Integration?**
> 
> If yes, know more about the [custom integration flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom.md).
> 

## Prerequisites

Before integrating offers for your custom Checkout, run through this checklist:

1. Understand the [payment flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments#payment-life-cycle.md).

2. Generate the API keys from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/#api-keys.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> A customer's payment information should never reach your servers unless you are PCI-DSS certified.
> 

## Steps to Integrate

The procedure for integrating Custom Checkout on your website is explained in the [Custom Integration document](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom.md). However, the procedure varies while passing the offers in the payment details.

1. [Create Offers on Dashboard](#step-1-create-offers-on-dashboard)
2. [Create Orders to include the Offers in the payment request](#step-2-create-orders-and-pass-offer_id)
3. [Submit the payment details to Razorpay](#step-3-submit-payment-details)

### Step 1: Create Offers on Dashboard

You can create offers from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/offers/create.md).

### Step 2: Create Orders and Pass Offer_id

After generating offers from the Dashboard, pass the `offer_id` in the order request attributes to the following endpoint:

#### Sample Request

Use the sample codes given below: 

/orders

```curl: Sample Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 1000,
  "currency": "INR",
  "offer_id": "offer_DtEhEm3XslgfXE"
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 1000); // amount in the smallest currency unit
        orderRequest.put("currency", "INR");
        orderRequest.put("offers", "offer_DtEhEm3XslgfXE");

        Order order = razorpayclient.orders.create(orderRequest);
        System.out.print(order);
```python: Python 
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 1000,
  "currency": "INR",
  "receipt": "receipt#1",
  "offer_id": "offer_ANZoaxsOww2X53"
})
```php: PHP 
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 1000, 'currency' => 'INR', 'offer_id'=> 'offer_JTUADI4ZWBGWur'));
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.Add("receipt", "receipt#1");
options.Add("currency", "INR");
options.Add("offer_id", "offer_JTUADI4ZWBGWur");
Order order = client.Order.Create(options);
```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 1000, currency: 'INR', receipt: 'receipt#1', offer_id: 'offer_ANZoaxsOww2X53'
```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 1000,
  currency: "INR",
  receipt: "receipt#1",
  offer_id: "offer_ANZoaxsOww2X53"
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
  "id": "order_DtEkng132N71M8",
  "entity": "order",
  "amount": 1000,
  "amount_paid": 0,
  "amount_due": 1000,
  "currency": "INR",
  "receipt": null,
  "order_id": "order_CjyltuCttYiMe8",
  "offer_id": "offer_DtEhEm3XslgfXE",
  "offers": [
    "offer_DtEhEm3XslgfXE"
  ],
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1576577191
}
```

#### Request Parameters

Using the following attributes, send an order request using the Orders API.

`amount` _mandatory_
: `integer` Enter the amount for which the order is to be created. For example, if the amount to be charged is ₹299.95, then pass `29995` in this field.

`currency` _mandatory_
: `string` ISO code of the currency associated with the order amount. For example,`INR`.

`offer_id` _mandatory_
: `string` Unique identifier of the offer. Pass the `offer_id` obtained from the response of the previous step. 

  
> **INFO**
>
> 
>   **Handy Tips**
> 
>   This is mandatory only in cases where you want to associate an offer or offers with the Order or you had not selected the [Show Offer on Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/offers/create/#offer-validity.md) while creating the offer from the Dashboard.
>   

### Step 3: Submit Payment Details

Once the order is created and the customer's payment details are obtained, the information should be sent to Razorpay to complete the payment. The data that needs to be submitted depends upon the payment method selected by the customer.

While invoking the `createPayment` method, pass the `order_id` and the `offer_id` in the payment request as follows:

```js: Checkout
var data = {
  amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
  currency: "INR", // Default is INR.
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  offer_id: 'offer_DtEhEm3XslgfXE',
  order_id: 'order_DtEkng132N71M8', // pass the Order ID generated in Step 2
  method: 'netbanking', // method specific fields
  bank: 'HDFC'
};

$btn.on('click', function(){
  // has to be placed within user initiated context, such as click, in order for popup to open.
  razorpay.createPayment(data);

  razorpay.on('payment.success', function(resp) {
    alert(resp.razorpay_payment_id),
    alert(resp.razorpay_order_id),
    alert(resp.razorpay_signature)}); // will pass payment ID, order ID, and Razorpay signature to success handler.

  razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error handler

})
```

Know more about [Custom Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom.md).

## Next Steps

After the customer has availed the offers and made the payment at the Checkout, you can track the status of the payments:

- From the Dashboard.
- By [configuring webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md).
- By polling our [payment APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/#fetch-payments-based-on-orders.md).

### Related Information

- [About Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/offers.md)
- [Create Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/offers/create.md)
- [Tutorial - How to Create Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/offers/tutorial.md)
