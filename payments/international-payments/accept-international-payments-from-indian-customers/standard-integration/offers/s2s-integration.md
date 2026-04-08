---
title: Integrating Offers in Server-to-Server (S2S)
description: Integrate Offers in your payment flow while making direct API calls to Razorpay server.
---

# Integrating Offers in Server-to-Server (S2S)

You can integrate offers with your payment flows while integrating directly with our APIs. This is particularly useful, if you are a business that is **not PCI-compliant** and would like to avail the offers that the issuer of network might provide. In such cases, validations must be done once the payment creation request is sent. Razorpay gives you the flexibility to design offers such that you can decide whether to pass the payments or not based on the set validations while creating the offers.

## Prerequisites

Generate the API keys to start your integration. The keys are required for authenticating API requests with our servers.

Log in to the Dashboard to generate the API keys, if you have not done earlier. For making the direct API calls, you need the `Key_Secret` as well.

## Workflow

1. [Create Offers from Dashboard](#step-1-create-offers).
2. [Create Orders to include the Offers in the payment request](#step-2-create-an-order).
3. [Create a payment to be sent to the customer](#step-3-create-a-payment).
4. [Verify the payment made by the customer](#step-4-verify-the-payment).

### Step 1: Create Offers

[Create an offer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/create.md) from the Dashboard.

### Step 2: Create an Order

After generating offers from the Dashboard, pass the `offer_id` in the order request attributes to the following endpoint:

/orders

```curl: Curl
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

```json: Success
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

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The amount must be at least INR 1.00",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {},
    "field": "amount"
  }
}
```

### Step 3: Create a Payment

Send the following attributes required to create a payment at the following endpoint:

/payments/create/json

#### Sample Code

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
-d'{
  "amount": 1000,
  "currency": "INR",
  "contact": 9000090000,
  "email": "gaurav.kumar@example.com",
  "order_id": "order_CjyltuCttYiMe8",
  "offer_id": "offer_DtEhEm3XslgfXE",
  "method": "netbanking",
  "bank": "UTIB"
}'

```json: Success
{
  "razorpay_payment_id": "pay_OsfBn07R1sgSXQ",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/OsfBn07R1sgSXQ/authenticate"
    }
  ]
}
``` json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Offer Maximum Usage limit exceeded"
  }
}
```

#### Request Parameters

`key_id` _mandatory_
: `string` The key id that you have generated from the **API Keys** tab in the Dashboard.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, `INR`. Refer to the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

`order_id` _mandatory_
: `string` Unique identifier of the Order.
 Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`offer_id` 
: `string` Unique identifier of the offer.

`ip` _mandatory_
: `string` Customer's IP address.

`email` _mandatory_
: `string` Email address of the customer. Maximum length supported is 40 characters. 

`contact` _mandatory_
: `string`  Phone number of the customer. Maximum length supported is 15 characters, inclusive of country code. 

`authentication` _optional_
: `object` Details of the authentication channel.

    `authentication_channel`
    : `string` The authentication channel for the payment. Possible values:
      - `browser` (default)
      - `app`

`browser` _mandatory_
: `object` Information regarding the customer's browser. This parameter need not be passed when `authentication_channel=app`.

    `java_enabled`
    : `boolean` Indicates whether the customer's browser supports Java. Obtained from the `navigator` HTML DOM object. Possible values:
        - `true`: Customer's browser supports Java.
        - `false`: Customer's browser does not support Java.

    `javascript_enabled`
    : `boolean` Indicates whether the customer's browser can execute JavaScript. Obtained from the `navigator` HTML DOM object. Possible values:
        - `true`: Customer's browser can execute JavaScript.
        - `false`: Customer's browser cannot execute JavaScript.

    `timezone_offset`
    : `integer` Time difference between UTC time and the cardholder's browser local time. Obtained from the `getTimezoneOffset()` method applied to the `Date` object.

    `screen_width`
    : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

    `screen_height`
    : `integer` Obtained from the `navigator` HTML DOM object.

    `color_depth`
    : `integer` Obtained from the payer's browser using the `screen.colorDepth` HTML DOM property.

    `language`
    : `string` Obtained from the payer's browser using the `navigator.language` HTML DOM property. Maximum limit of 8 characters.

`method` _mandatory_
: `string` Name of the payment method. Possible values are: 
    - `card` 
    - `netbanking`
    - `wallet`
    - `emi`
    - `upi`
    - `cardless_emi`
    - `paylater`

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
>     - CVV is not required by default for Visa and Amex tokenised cards.
>     - To enable CVV-less flow for Rupay and Mastercard, contact our [support team](https://razorpay.com/support/#request).
>     - CVV is mandatory for Diners tokenised cards.
>     - CVV is an optional field. Skip passing the `cvv` parameter to Razorpay to implement this change.    
>     

`bank`
: `string` Bank code of the bank used for the payment. Required if the method is `netbanking`.

`bank_account`
: The details of the bank account that should be passed in the request. Required if the method is `emandate`.

    `account_number` _mandatory_
    : `string` Bank account number used to initiate the payment.

    `ifsc` _mandatory_
    : `string` IFSC of the bank used to initiate the payment.

    `name` _mandatory_
    : `string` Name associated with the bank account used to initiate the payment.

`emi_duration`
: `string` The EMI duration in months. Required if the method is `emi`.

`vpa`
: `string` Virtual payment address of the customer. Required if the method is `upi`.

`wallet`
: `string` Wallet code for the wallet used for the payment. Required if the method is `wallet`.

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`referrer` _optional_
: `string` Referrer header passed by the client's browser.

`user_agent` _optional_
: `string` Customer user-agent.

#### Response Types

`2OO OK`
: In this case, the response contains `200 OK` code and the HTML content that needs to be opened in the customer's browser. This HTML content contains form-fields, which will be automatically posted to the redirect URL for the customer to complete the payment.

`400 Bad Request`
: This can happen when erroneous parameters are passed in the request. For example, when the limit set in Offers is exceeded:

Know more about the [error codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#error-codes).

The HTML form returned in the response should be opened in the customer's browser. The customer completes the payment on the displayed page.

### Step 4: Verify the Payment

Once the customer completes the payment, a `POST` request is sent to the `callback_url` provided in the [payment create request](#step-3-create-a-payment). The data contained in the `POST` request depends on the **success** or **failure** of the payment made by the customer.

## Next Steps

After the customer has availed the offers and made the payment on the Checkout, you can track the status of the payments:

- From the Dashboard.
- By [configuring webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).
- By polling our [payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#fetch-payments-based-on-orders).

### Related Information

- [About Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers.md)
- [Create Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/create.md)
- [Tutorial - How to Create Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/tutorial.md)
