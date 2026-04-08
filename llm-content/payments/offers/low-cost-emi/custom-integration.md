---
title: Integrate Low Cost EMI Offers with Custom Checkout
description: Integrate Low Cost EMI Offers with Custom Checkout built using Razorpay.js.
---

# Integrate Low Cost EMI Offers with Custom Checkout

In the Checkout form designed to meet your business needs and branding, you can display Low Cost EMI Offers to attract a broader customer base by reducing the upfront cost barrier, leading to increased sales and higher average order values. 

You can decide the cost to subvent for each EMI tenure while [creating an offer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/low-cost-emi/create.md) and the customer bears the remaining cost. This approach ensures that customers enjoy the benefits of EMI at an affordable cost, helping you minimise the overall cost.

> **INFO**
>
> 
> **New to Custom Checkout Integration?**
> 
> If yes, know more about the [custom integration flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom.md).
> 

## Prerequisites

Before integrating Low Cost EMI offers for your custom Checkout, run through this checklist:

1. Understand the [payment flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md#payment-life-cycle).
2. Generate the API keys from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings.md#api-keys).

> **WARN**
>
> 
> **Watch Out!**
> 
> A customer's payment information should never reach your servers unless you are PCI-DSS certified.
> 

## Integration Steps

The procedure for integrating Custom Checkout on your website is explained in the [Custom Integration document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom.md). However, the procedure varies while passing the offers in the payment details.

1. [Create a Low Cost EMI Offer](#step-1-create-a-low-cost-emi-offer)
2. [Create an Order and Pass Offer_id](#step-2-create-an-order-and-pass-offer-id)
3. [Show the Offer on Checkout](#step-3-show-the-offer-on-checkout)
4. [Submit Payment Details](#step-4-submit-payment-details)

## Step 1: Create a Low Cost EMI Offer

You can create a Low Cost EMI offer from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> After the offer creation, you need to save the breakdown of the interest rate percentage (subvented by you and your customer) and offer ID at your end.
> 

## Step 2: Create an Order and Pass Offer_id

After generating the offer from the Dashboard, pass the `offer_id` in the order request attributes to the following endpoint:

> **WARN**
>
> 
> **Watch Out!**
> 
> For Low Cost EMI, a separate `offer_id` is created for each tenure.
> 

### Sample Request

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

### Request Parameters

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
>   This is mandatory only in cases where you want to associate an offer or offers with the Order or you had not selected the [Show Offer on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md#offer-validity) while creating the offer from the Dashboard.
>   

## Step 3: Show the Offer on Checkout

You need to show the availability of Low Cost EMI Offers on checkout. Customers should be able to view the discount on interest being given to them and how much interest they need to bear. 

For example, you can view the image below to see how Low Cost EMI offers appear on [Razorpay Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/low-cost-emi.md).

![Low Cost EMI on Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/low-cost-emi-standard.jpg.md)

## Step 4: Submit Payment Details

Once the order is created and the customer's payment details are obtained, the information should be sent to Razorpay to complete the payment. The data that needs to be submitted depends upon the payment method the customer selects.

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

Know more about [Custom Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom.md).

## Next Steps

After the customer has availed the offer and made the payment at the Checkout, you can track the status of the payments:

- From the Dashboard.
- By [configuring webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).
- By polling our [payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#fetch-payments-based-on-orders).

### Related Information
- [About Low Cost EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/low-cost-emi.md)
- [Create Low Cost EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/low-cost-emi/create.md)
- [Tutorial - How to Create Low Cost EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/low-cost-emi/tutorial.md)
