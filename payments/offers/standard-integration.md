---
title: Integrate Offers with Standard Checkout
description: Display general or order-specific Offers on Standard Checkout.
---

# Integrate Offers with Standard Checkout

After creating [offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md) from the Dashboard, you have to integrate them on Razorpay Standard Checkout so that your customers can avail them while making payments.

> **WARN**
>
> 
> **Integrate Offers with Orders API**
> 
> If you use our JS, SDK files or other Ecommerce plugins, you **should** integrate offers with the Orders API.
> 

## Exception

You need **not** integrate offers with Orders API if you use any of the following Razorpay products or plugins to accept payments:

  - Plugins: Magento, Shopify or WooCommerce.
  - Products: Payment Links, Payment Buttons, Payment Pages and Invoices.

This is because Razorpay automatically creates orders for these products or plugins when customers initiate payment at the Checkout.

> **INFO**
>
> 
> **Handy Tips**
> 
> As per the RBI guidelines, the original card number is replaced with a surrogate value called a token. However, we will continue to support BIN-based offers post tokenisation. Note that BIN-based offers will not work on saved American Express (AMEX) cards.
> 

## Validation Criteria

Only those offers that pass the following validations are be displayed at the Checkout:

Criteria | Description
---
**Amount Match** | Order amount should be more than or equal to the [Minimum Order Amount](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md#instant) set in an offer.
---
**Validity** | Offer should be in the active or enabled state.
---
**Date Validation** | The current date lies within the range of the offer's `start` and `end` dates.
---
**Usage** | You can define the maximum number of times an offer can be availed. The offer will not be displayed at the Checkout if this limit is met.
---
**Show Offer on Checkout** | This option must be enabled while creating the offer. This determines whether the offer will be displayed at the Checkout.

## Display Offers at Checkout

There are two ways in which you can display offers at Razorpay Checkout:

- [Display Offers by Default](#method-1-display-offers-by-default)
- [Display Limited Offers](#method-2-display-limited-offers)

### Method 1: Display Offers by Default

This is the easiest way to display offers at the Checkout. While creating the offer from the Dashboard, enable the **Show Offer on Checkout** option.  The offer automatically appears at the Checkout.

### Method 2: Display Limited Offers 

To display a specific offer at the Checkout, you should associate the offer with an order. You can pass the `offers` array as a request attribute in the Create Orders API.

Some use cases:
- If you have multiple product lines running on the same account and certain business logic on your side for displaying offers.
- The discount has already been applied, and you would like to restrict the payment method to avail the offer.

> **WARN**
>
> 
> **Watch Out!**
> 
> To display an Offer for a particular customer:

> - **Do not** select the Show Offer on the Checkout check box while creating an Offer.

> - Specify the offer_id; for example, `offer_ANZoaxsOww2X53` in the `offers` array while creating an order. 
> 

To display offers:
1. [Create an Offer](#step-1-create-an-offer-from-the-dashboard).
2. [Pass the Offer in Orders API](#step-2-pass-the-offer-in-orders-api).
3. [Pass order_id and Trigger Checkout](#step-3-pass-order-id-and-trigger-the).

### Step 1: Create an Offer from the Dashboard

You can [create offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md#create-offers) from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md).

Let us say you have created an offer `offer_ANZoaxsOww2X53`, such that a discount of  is applicable on all transactions done through AXIS netbanking only.

### Step 2: Pass the Offer in Orders API

Create an order and pass the offer in the `offers` array as a request parameter in the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> To display specific offers at checkout, pass them in the `offers` array (see the sample code below). If you don't include anything in the `offers` array, the default offers will automatically appear at checkout.
> 

#### Sample Code

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 1000000,
  "currency": "",
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
        orderRequest.put("currency", "");
        orderRequest.put("offers", Offer);

        Order order = razorpayclient.orders.create(orderRequest);
        System.out.print(order);
```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 1000000,
  "currency": "",
  "receipt": "receipt#1",
  "offers": [
    "offer_ANZoaxsOww2X53"
  ]
})
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 1000000, 'currency' => '', 'offers'=> array('offer_JTUADI4ZWBGWur')));
```ruby: Ruby 
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 1000000, currency: '', receipt: 'receipt#1',  offers: [
    'offer_ANZoaxsOww2X53"'
]
```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 1000000,
  currency: "",
  receipt: "receipt#1",
  offers: [
    "offer_ANZoaxsOww2X53"
  ]
})
```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
 "amount": 1000000,
 "currency": "",
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
  "currency": "",
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
: `integer` Enter the amount for which the order is to be created in currency subunits. For example, for an amount of , enter `1000000`.

`currency` _mandatory_
: `string` ISO code of the currency associated with the order amount. Here, it is `INR`.

`offers` _mandatory_
: `array` Unique identifier of the offer. Pass the offer_id obtained from the response of the previous step.

### Step 3: Pass Order_id and Trigger the Checkout

The `order_id` obtained in the previous step can be passed to the Checkout form as follows:

```js: Checkout
Pay

var options = {
    "key": "[YOUR_KEY_ID]",
    "amount": "1000000",
    "currency": "",
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
        "name": "",
        "email": "",
        "contact": ""
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

Know more about [Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md).

## Next Steps

After the customer has availed the offers and made the payment at the Checkout, you can  track the status of the payments:

- From the Dashboard.
- By [configuring webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md).
- By polling our [payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md).

### Related Information

- [About Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers.md)
- [Create Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md)
- [Tutorial - How to Create Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/tutorial.md)
- [Disable Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md#disabling-offers)
- [Offers FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/faqs.md)
