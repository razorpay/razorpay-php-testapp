---
title: Integrating Low Cost EMI Offers in Server-to-Server (S2S)
description: Integrate Low Cost EMI Offers in your payment flow while making direct API calls to Razorpay server.
---

# Integrating Low Cost EMI Offers in Server-to-Server (S2S)

You can integrate Low Cost EMI offers with your payment flows while integrating directly with our APIs. 

## Prerequisites

Generate the API keys to start your integration. The keys are required for authenticating API requests with our servers.

Log in to the Dashboard to generate the API keys, if you have not done earlier. To make the direct API calls, you need the `Key_Secret`.

## Integration Steps

1. [Create a Low Cost EMI Offer](#step-1-create-a-low-cost-emi-offer)
2. [Create an Order and Pass Offer_id](#step-2-create-an-order-and-pass-offer-id)
3. [Create a Payment](#step-3-create-a-payment)
4. [Show the Offer on Checkout](#step-4-show-the-offer-on-checkout)
5. [Verify the Payment](#step-5-verify-the-payment)

## Step 1: Create a Low Cost EMI Offer

[Create a Low Cost EMI offer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md) from the Dashboard.

> **WARN**
>
> 
> **Watch Out!**
> 
> After the offer creation, you need to save the breakdown of the interest rate percentage (subvented by you and your customer) and offer ID for each tenure at your end to [show the offer on checkout](#step-4-show-the-offer-on-checkout).
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
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "offer_id": "offer_ANZoaxsOww2X53"
})
```php: PHP 
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 100, 'currency' => 'INR', 'offer_id'=> 'offer_JTUADI4ZWBGWur'));
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

order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1', offer_id: 'offer_ANZoaxsOww2X53'
```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
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

## Step 3: Create a Payment

Send the following attributes required to create a payment at the following endpoint:

/payments/create/json

### Sample Code

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
-d'{
  "amount": 1000,
  "currency": "INR",
  "contact": 8888888888,
  "email": "gaurav@gmail.com",
  "order_id": "order_CjyltuCttYiMe8",
  "method": "emi",
  "emi_duration": 9,
  "card":{
    "number": "4386289407660153",
    "name": "Gaurav",
    "expiry_month": 11,
    "expiry_year": 30,
    "cvv": 100
  }
}'

```curl: Response
{
    “razorpay_payment_id”: “pay_MfMzOzUwDKgznE”,
    “next”: [
        {
            “action”: “redirect”,
            “url”: “https://api.razorpay.com/v1/payments/MfMzOzUwDKgznE/authenticate”
        },
        {
            “action”: “otp_generate”,
            “url”: “https://api.razorpay.com/v1/payments/pay_MfMzOzUwDKgznE/otp_generate?track_id=MfMzOzUwDKgznE&key_id=rzp_test_XXXXXXXXXXXXXX”
        }
    ]
}
```

### Request Parameters

`key_id` _mandatory_
: `string` The key id that you have generated from the **API Keys** tab in the Dashboard.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, `INR`. Refer to the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

`order_id` _mandatory_
: `string` Unique identifier of the Order.
 Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`ip` _mandatory_
: `string` Customer's IP address.

`email` _mandatory_
: `string` Email address of the customer. Maximum length supported is 40 characters. 

`contact` _mandatory_
: `string`  Phone number of the customer. Maximum length supported is 15 characters, inclusive of country code. 

`method` _mandatory_
: `string` Name of the payment method. Possible value is `emi`.

`card`
:  Details associated with the card. Required if the payment method is `card`.

    `number` _mandatory_
    : `string` Unformatted card number. Required if the method is `card`.

    `name` _mandatory_
    : `string` Name of the cardholder. Required if the method is `card`.

    `expiry_month` _mandatory_
    : `integer` Expiry month for card in `MM` format. Required if the method is `card`.

    `expiry_year` _mandatory_
    : `string` Expiry year for card in `YY` format. Required if the method is `card`.

    `cvv` _mandatory_
    : `string` CVV printed on the back of card. Required if the method is `card`.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>       - CVV is not required by default for tokenised cards across all networks.
>       - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>       - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>       - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>       - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.       
>     

`emi_duration`
: `string` The EMI duration in months. Required if the method is `emi`.

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`referrer` _optional_
: `string` Referrer header passed by the client's browser.

`user_agent` _optional_
: `string` Customer user-agent.

### Response Parameters

If the payment request is valid, the response contains the following fields.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

`action`
: `string` An indication of the next step available to you to continue the payment process. Possible values:
  - `otp_generate`: Use this URL to allow the customer to generate OTP and complete the payment on your webpage.
  - `redirect`: Use this URL to redirect the customer to submit the OTP on the bank page.

`url`
: `string` URL to be used for the action indicated.

## Step 4: Show the Offer on Checkout

You need to show the availability of Low Cost EMI Offers on checkout. Customers should be able to clearly view the discount on interest being given to them and how much interest they need to bear. 

For example, you can view the image below to see how Low Cost EMI offers appear on [Razorpay Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/low-cost-emi.md).

## Step 5: Verify the Payment

Once the customer completes the payment, a `POST` request is sent to the `callback_url` provided in the [payment create request](#step-3-create-a-payment). The data contained in the `POST` request depends on the **success** or **failure** of the payment made by the customer.

## Next Steps

After the customer has availed the offers and made the payment on the Checkout, you can track the status of the payments:

- From the Dashboard.
- By [configuring webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).
- By polling our [payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#fetch-payments-based-on-orders).

### Related Information
- [About Low Cost EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/low-cost-emi.md)
- [Create Low Cost EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/low-cost-emi/create.md)
- [Tutorial - How to Create Low Cost EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/low-cost-emi/tutorial.md)
