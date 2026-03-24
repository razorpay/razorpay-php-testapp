---
title: Integrate Low Cost EMI Offers with Standard Checkout
description: Display general or order specific Low Cost EMI Offers on Standard Checkout.
---

# Integrate Low Cost EMI Offers with Standard Checkout

After creating [ Low Cost EMI Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/low-cost-emi/create.md) from the Dashboard, you have to integrate them with Razorpay Standard Checkout so that your customers can avail them while making payments.

> **WARN**
>
> 
> **Integrate Offers with Orders API**
> 
> If you use our JS, SDK files or other ecommerce plugins, you **should** integrate offers with the Orders API.
> 

## Exception

You need **not** integrate offers with Orders API, if you use any of the following Razorpay products or plugins to accept payments:

  - Plugins: Razorpay Magento, Shopify, or WooCommerce.
  - Products: Payment Links, Payment Buttons, Payment Pages and Invoices. 

This is because Razorpay automatically creates orders for these products or plugins when customers initiate payment at the Checkout.

## Validation Criteria

Only those Low Cost EMI offers that pass the following validations are displayed at the Checkout:

Criteria | Description
---
**Amount Match** | Order amount should be more than or equal to the [Minimum Order Amount](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/low-cost-emi/create.md) set in an offer.
--- 
**EMI Offer Type** | Select **Low Cost EMI** as the offer type and configure the interest that you and your customer will bear.
---
**Validity** | Offer should be in the active or enabled state.
---
**Date Validation** | The current date lies within the range of the `start` and `end` date defined in the offer.
---
**Usage** | You can define the maximum number of times an offer can be availed. If this limit is met, the offer will not be displayed on Checkout.
---
**Show Offer on Checkout** | This option must be enabled while the offer is created. This determines whether the offer will be displayed at the Checkout or not.

## Display Low Cost EMI Offers at Checkout

There are two ways in which you can display Low Cost EMI offers at the Razorpay Checkout:

- [Display Low Cost EMI Offers by Default](#method-1-display-low-cost-emi-offers-by-default)
- [Display Limited Low Cost EMI Offers](#method-2-display-limited-low-cost-emi-offers)

## Method 1: Display Low Cost EMI Offers by Default

This is the easiest way to display Low Cost EMI offers at the Checkout. While [creating the Low Cost EMI offer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/low-cost-emi/create.md) from the Dashboard, enable the **Show Offer on Checkout** option.

![Enter the offer validity details to proceed](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/offers-low-cost-emi-offer-validity.jpg.md)

## Method 2: Display Limited Low Cost EMI offers

To display a specific Low Cost EMI offer at Checkout, you should associate the offer with an order. You can pass the `offers` array as a request attribute in the Create Orders API.

Some use cases:
- If you have multiple product lines running on the same account and have certain business logic on your side for displaying Low Cost EMI offers.
- The discount has already been applied, and you would like to restrict the payment method to avail the offer.

To display offers:
1. [Create an Offer](#step-1-create-an-offer-from-the-dashboard).
2. [Pass offer_id in Orders API](#step-2-pass-offer-id-in-orders-api).
3. [Pass order_id and Trigger Checkout](#step-3-pass-order-id-and-trigger-the).

### Step 1: Create an Offer from the Dashboard

You can [create Low Cost EMI offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/create#create-offers.md) from the Dashboard.

Let us say you have created a Low Cost EMI offer `offer_ANZoaxsOww2X53`, such that a discount of ₹200 is applicable on all transactions done through AXIS netbanking only.

### Step 2: Pass offer_id in Orders API

Create an order using the Orders API and pass the `offer_id` as a request parameter.

#### Sample Code

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 1000000,
  "currency": "INR",
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
  "offers": [
    "offer_ANZoaxsOww2X53"
  ]
})
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 1000000, 'currency' => 'INR', 'offers'=> array('offer_JTUADI4ZWBGWur')));
```ruby: Ruby 
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1',  offers: [
    'offer_ANZoaxsOww2X53"'
]
```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 1000000,
  currency: "INR",
  receipt: "receipt#1",
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

#### Request Parameters

`amount` _mandatory_
: `integer` Enter the amount for which the order is to be created in currency subunits. For example, for an amount of ₹10000, enter `1000000`.

`currency` _mandatory_
: `string` ISO code of the currency associated with the order amount. Here, it is `INR`.

`offers` _mandatory_
: `array` Unique identifier of the offer. Pass the `offer_id` obtained from the response of the previous step.

### Step 3: Pass Order_id and Trigger the Checkout

The `order_id` obtained in the previous step can be passed to the Checkout form as follows:

```js: Checkout
Pay

var options = {
    "key": "[YOUR_KEY_ID]",
    "amount": "1000000",
    "currency": "INR",
    "order_id":"order_FIL1vBOsWFllnO",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://cdn.razorpay.com/logos/F9Yhfb7ZXjXmIQ_medium.jpg",
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
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

```

Know more about [Standard Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard.md).

## Next Steps

After the customer has availed the offers and made the payment at the Checkout, you can track the status of the payments:

- From the Dashboard.
- By [configuring webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md).
- By polling our [payment APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments.md).

### Related Information

- [About Low Cost EMI Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/low-cost-emi.md)
- [Create Low Cost EMI Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/low-cost-emi/create.md)
- [Tutorial - How to Create Low Cost EMI Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/low-cost-emi/tutorial.md)
- [Low Cost EMI FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/low-cost-emi/faqs.md)
- [Disable Offers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/low-cost-emi/create/#disabling-low-cost-emi-offers.md)
