---
title: No Cost EMIs from Bajaj Finserv - Custom Checkout
description: Let your customers avail Bajaj Finserv EMI options on Razorpay Custom Checkout.
---

# No Cost EMIs from Bajaj Finserv - Custom Checkout

You can display Bajaj Finserv No Cost EMI offers to your customers by integrating with Razorpay custom checkout.

## Prerequisites

- Create a [Razorpay account](https://razorpay.com/dashboard).
- Generate [API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) from the Dashboard.
- Refer to our [web custom integration document](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom.md).

## Integration flow

If you want to display the No Cost EMI offered by Bajaj Finserv on the Checkout, you must associate the offer with an order. Follow the integration steps given below:

1. [Create No Cost EMI offers](#step-1-create-no-cost-emi-offers).
2. [Create an order](#step-2-create-an-order).
3. [Fetch payment methods](#step-3-fetch-payment-methods).
4. [Invoke checkout and pass order_id and other options](#step-4-invoke-checkout-and-pass-order-id).
5. [Store fields in your server](#step-5-store-fields-in-your-server).
6. [Verify payment signature](#step-6-verify-payment-signature).

### Step 1: Create No Cost EMI Offers

Raise a request with the [ Razorpay Support team ](https://razorpay.com/support/#request) to create the relevant No Cost EMIs you want to display on the Checkout. Get the appropriate `offer_id` created for each EMI plan.

### Step 2: Create an Order

Obtain the `offer_id`.  Let us say, `offer_ANZoaxsOww2X53`, from our Support team. Create an order for the transaction amount for which the created offer should be applied.

/orders

`amount` _mandatory_
: `integer` Amount in currency subunits for which the order is created. For example, if the order is for ₹30,000, enter the value `3000000` (in paise).

`currency` _mandatory_
: `string` ISO code of the currency associated with the order amount.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`offers` _mandatory_
: `array` Unique identifier of the Offer. 
 Pass the `offer_id` obtained from the Razorpay Support team.

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

order = Razorpay::Order.create amount: 50000, currency: 'INR', discount: 1, receipt: 'receipt#1',  offers: [
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
 "discount": true,
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

### Step 3: Fetch Payment Methods

When creating a custom checkout form, you need to ensure that only the methods that are activated for your account are displayed to the customer.

Use the below methods to fetch all payments methods available to you.

```js: Request
var razorpay = new Razorpay({
  key: '',
    // logo, displayed in the popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
});
razorpay.once('ready', function(response) {
  console.log(response.methods);
})
```js: Response
{
  "methods": {
    "entity": "methods",
    "card": true,
    "debit_card": true,
    "credit_card": true,
    "prepaid_card": true,
    "card_networks": {
      "AMEX": 0,
      "DICL": 1,
      "MC": 1,
      "MAES": 1,
      "VISA": 1,
      "JCB": 1,
      "RUPAY": 1,
      "BAJAJ": 0
    },
    "amex": false,
    "netbanking": {
      ...
      ...
      "HDFC": "HDFC Bank",
      "ICIC": "ICICI Bank"
      ...
      ...
    },
    "wallet": {
      "payzapp": true
    },
    "emi": true,
    "upi": true,
    "cardless_emi": [],
    "paylater": [],
    "emi_subvention": "customer",
    "emi_options": {
      ...
      ...
      "ICIC": [
        {
          "duration": 3,
          "interest": 13,
          "subvention": "customer",
          "min_amount": 150000
        },
        {
          "duration": 6,
          "interest": 13,
          "subvention": "customer",
          "min_amount": 150000
        }
        ...// rest of the emi plans
      ],
      "HDFC": [
        {
          "duration": 12,
          "interest": 14,
          "subvention": "customer",
          "min_amount": 300000
        },
        {
          "duration": 18,
          "interest": 15,
          "subvention": "customer",
          "min_amount": 300000
        }
        ...
        ...// rest of the emi plans
      ]
    }
  }
}
```

Know more about [the various payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods.md) offered by Razorpay.

### Step 4: Invoke Checkout and Pass Order Id and Other Options 

The list of checkout parameters is available [here](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/build-integration.md).

#### Step 4.1: Include the JavaScript code in your Webpage

Include the following script, preferably in `` section of your page:

```html: Index HTML

```

> **INFO**
>
> 
> **Including the Javascript, not the Library**
> 
> Include the script from `https://checkout.razorpay.com/v1/razorpay.js` instead of serving a copy from your own server. This allows new updates and bug fixes to the library to get automatically served to your application.
> 
> We always maintain backward compatibility with our code.
> 

#### Step 4.2: Instantiate Razorpay Custom Checkout

You can choose to have: 
- [A single instance on a page](#single-instance-on-a-page)
- [Multiple instances on the same page](#multiple-instances-on-same-page)

#### Single Instance on a Page

If you need a single instance on a page, use the code given below:

```js: Invoke a Single Instance
var razorpay = new Razorpay({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
});
```

#### Multiple Instances on Same Page

If you need multiple razorpay instances on same page, you can globally set some of the options:

```js: Invoke Multiple Instances
Razorpay.configure({
  key: '',
    // logo, displayed in the payment processing popup
  image: 'https://i.imgur.com/n5tjHFD.jpg',
})
new Razorpay({}); // will inherit key and image from above.
```

#### Step 4.3: Submit Payment Details

Once the order is created and the customer's payment details are obtained, the information should be sent to Razorpay to complete the payment. The data that needs to be submitted depends upon the payment method selected by the customer.

You can do this by invoking `createPayment` method:

```js: createPayment with handler function
var data = {
  amount: 3000000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
  currency: "INR",// Default is INR. We support more than 90 currencies.
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_CjyoZFRpB8r0AH',// Replace with Order ID generated in Step 2
  method: "emi",
  emi_duration: 3,
  provider: "bajajfinserv"
};

var btn = document.querySelector('#btn');
btn.addEventListener('click', function(){
  // has to be placed within user initiated context, such as click, in order for popup to open.
  razorpay.createPayment(data);

  razorpay.on('payment.success', function(resp) {
    alert(resp.razorpay_payment_id),
    alert(resp.razorpay_order_id),
    alert(resp.razorpay_signature)}); // will pass payment ID, order ID, and Razorpay signature to success handler.

  razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error handler

})
```js: createPayment with callback URL
var data = {
  callback_url: 'https://www.examplecallbackurl.com/',
  amount: 3000000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
  currency: "INR",// Default is INR. We support more than 90 currencies.
  email: 'gaurav.kumar@example.com',
  contact: '9123456780',
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  },
  order_id: 'order_CuEzONfnOI86Ab',// Replace with Order ID generated in Step 4
  method: "emi",
  emi_duration: 3,
  provider: "bajajfinserv"
};

var btn = document.querySelector('#btn');
btn.addEventListener('click', function(){
  // has to be placed within user initiated context, such as click, in order for popup to open.
  razorpay.createPayment(data);

})
```

> **WARN**
>
> 
> **Watch Out!**
> 
> The `createPayment` method should be called within an event listener triggered by user action to prevent the popup from being blocked. For example:
> 

> ```js
> $('button').click( function (){ razorpay.createPayment(...) })
> ```
> 

> **INFO**
>
> 
> **Handler Function vs Callback URL**
> 
> - **Handler Function**
>   
When you use the handler function, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Checkout Form. You need to collect these and send them to your server.
> - **Callback URL**
>   
When you use a callback URL, Razorpay makes a post call to the callback URL, with the `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` in the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id`. 
> 

### Step 5: Store Fields in Your Server

@include integration-steps/store-fields

### Step 6: Verify Payment Signature

@include integration-steps/verify-signature

### Payment Capture Settings

@include integration-steps/capture-settings

## Test Integration

After the integration is complete, you need to test the integration to ensure that it is working as expected. You can make a test transaction using the test cards, verify the payment status from the Dashboard or through APIs or subscribe to related Webhook events to take appropriate actions at your end. After testing the integration in test mode, you can start accepting actual payments from your customers.

#### Test Payments

You can make test payments using any of the payment methods configured at the Checkout. No money is deducted from the customer's account as this is a simulated transaction. In the Checkout code, ensure that you have entered the API keys generated in the test mode.

#### EMI Test Card

You can use the EMI test card given below to make transactions in the test mode. Use any valid expiration date in the future and any random CVV to create a successful payment.

Card Network | Card Number | CVV & Expiry Date
---
Mastercard | 5241 8100 0000 0000 | Use a random CVV and any future date

#### Verify Payment Status

You can track the status of the payment from the Dashboard, subscribe to the Webhook event or poll our APIs.

#### From Dashboard

#### Subscribe to Webhook events

You can subscribe to a Webhook event that is generated when a certain event happens in our server. When one of those events is triggered, Razorpay sends the Webhook payload to the configured URL. [Know how to set up Webhooks.](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md)

#### Poll APIs

You can retrieve the status of the payments by polling our [Payment APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#fetch-multiple-payments.md).

### Accept Live Payments

After testing the flow of funds end-to-end in test mode and confident that the integration is working as expected, switch to the live mode and start accepting payments from customers. However, make sure that you **swap the test API keys with the live keys**.

To generate API key in live mode:

### Related Information

@include integration-steps/related-info

### Next Steps

Once the customer has successfully made the payment after availing the desired Offer, you can check the status of the payment from the Dashboard.
