---
title: Google Pay Omnichannel for Server-to-Server Integration
description: Using Razorpay's APIs, you can initiate a UPI intent payment that will be handled by the Google Pay app installed on your customer's mobile device.
---

# Google Pay Omnichannel for Server-to-Server Integration

Use GooglePay Omnichannel API to initiate a UPI payment request that can be sent to your customers on their registered phone numbers. The customers need not enter the VPA while making the payment. On receiving the notification on the Google Pay app, the customer completes the payment.

## Prerequisites

1. [Sign up ](https://support.google.com/pay/business/answer/7684271?hl=en&ref_topic=7684388)for a business account with Google Pay.
1. [Contact our Support Team](https://razorpay.com/support/#request) and have them whitelist your UPI ID/VPA.
1. Verify your UPI ID/VPA details on the [Google Merchant Console](https://support.google.com/pay/business/answer/7684398?hl=en&ref_topic=7684388). Google deposits a small amount into the bank account linked to your VPA (UPI ID).
1. [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard.

## Integration Steps

Following are the steps of the payment flow:

1. Create an Order using the Orders API.
2. Initiate an Omnichannel request on the provided `contact` number of the customer.
3. Poll at regular intervals or listen to Webhook event to check the order's status.

### Step 1. Create an Order

Orders API helps to prevent multiple payments by binding a single successful payment to an order.

Here is the list of attributes for creating the order:

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. 
 You can create Orders in **INR** only.

`receipt` _optional_
: `string` Your receipt id for this order should be passed here. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`partial_payment` _optional_
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

#### Sample Code

The following is a sample API request and response for creating an order:

```curl: Curl
curl  -X POST https://api.razorpay.com/v1/orders
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H 'content-type:application/json'
-d '{
    "amount": 50000,
    "currency": "INR",
    "receipt": "rcptid_11"
}'
```java: Java
try {
  JSONObject orderRequest = new JSONObject();
  orderRequest.put("amount", 50000); // amount in the smallest currency unit
  orderRequest.put("currency", "INR");
  orderRequest.put("receipt", "order_rcptid_11")

  Order order = razorpay.Orders.create(orderRequest);
} catch (RazorpayException e) {
  // Handle Exception
  System.out.println(e.getMessage());
}
```Python: Python
import razorpay
client = razorpay.Client(auth=("api_key", "api_secret"))

DATA = {
    "amount": 100,
    "currency": "INR",
    "receipt": "receipt#1",
    "notes": {
        "key1": "value3",
        "key2": "value2"
    }
}
client.order.create(data=DATA)
```php: PHP
$order  = $client->order->create([
  'receipt'         => 'order_rcptid_11',
  'amount'          => 50000, // amount in the smallest currency unit
  'currency'        => 'INR'
]);
```csharp: .NET
Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.add("receipt", "order_rcptid_11");
options.add("currency", "INR");
Order order = client.Order.Create(options);
```ruby: Ruby
options = amount: 50000, currency: 'INR', receipt: ''
order = Razorpay::Order.create
```javascript: Node.js
var options = {
  amount: 50000,  // amount in the smallest currency unit
  currency: "INR",
  receipt: "order_rcptid_11"
};
instance.orders.create(options, function(err, order) {
  console.log(order);
});
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

A successful creation of the Order returns the `order_id` that you need to store against the Order defined in your system.

### Step 2. Initiate a Payment

To initiate a UPI payment request, invoke an API call with the following attributes:

/payments/create/redirect

#### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency subunit. 
 For example, if the amount to be charged is ₹299, then pass `29900` in this field.

`currency` _mandatory_
: `string` ISO code for the currency in which you want to accept the payment. 
 You can accept payments in **INR** only.

`order_id` _mandatory_
: `string` `order_id` as returned in the response of the [Create Order step](#step-1-create-an-order).

`notes` _optional_
: `json object` Object consisting of key value pairs as [notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes).

`method` _mandatory_
: `string` Payment method used to make the payment. In this case, it is `upi`.

`description` _optional_
: `string` Description about the payment method.

`_[flow]` _mandatory_
: `string` Mode of UPI payment, in this case it is `intent`.

`contact` _mandatory_
: `string` Contact number of the customer.

`email` _mandatory_
: `string` Email ID of the customer.

`upi_provider` _mandatory_
: `string` Name of the UPI provider, in this case `google_pay`.

`ip` _mandatory_
: `string` Client's browser IP address.

`referer` _mandatory_
: `string` Value of `referer` header passed by the client's browser.

`user_agent` _mandatory_
: `string` Value of `user_agent` header passed by the client's browser.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

#### Response

As a result of the initiated payment, a collect request is sent to the customers' mobile devices. Customers can now complete the payment using the Google Pay app installed on their devices.

#### Example

```cURL: cURL
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/redirect \
-H "Content-Type: application/json" \
-d '{
    "amount":50000,
    "email":"gaurav.kumar@gmail.com",
    "currency":"INR", // Only INR is supported
    "method":"upi",
    "_":{
    "flow":"intent"
    },
"upi_provider":"google_pay",
"contact":9972006855
}'
```
### Step 3. Verify the Payment

If you have configured `callback_url` parameter in the original payment request, a POST request is sent along with the `razorpay_payment_id` to the configured URL on your server.

You can subscribe to the payment-related (`payment.authorized`, `payment.captured`) and order-related (`order.paid`) Webhooks to get notified once the customer completes the UPI payment. Know more about subscribing to [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

#### Payment failure and re-initiating payment

If you receive the `payment.failed` notification on the Webhook or the order is not marked `paid` within 2-3 minutes, you can send the request for the same payment again.
