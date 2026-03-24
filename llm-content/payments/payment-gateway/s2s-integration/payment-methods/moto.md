---
title: MOTO Payments - S2S
description: Know how you can configure MOTO payments on your S2S integration.
---

# MOTO Payments - S2S

With Razorpay, you can use MOTO (Mail-Order-Telephone-Order) transactions to charge a customer's credit card without using the CVV or 2-factor-authentication. You can extend this flow to your customers to reduce payment failures that may occur due to low internet speeds or redirects to bank pages.

## Step 1: Create an Order

Order creation is the first step to integrate your application with Razorpay and start accepting payments. Orders API allows you to create an Order when a payment is expected from a customer.

Ensure the `razorpay_order_id` is stored against the corresponding transaction. The API endpoint given below will create an Order at your server-side:

/orders

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the [Orders API](#api-sample-code). It is a server-side API call.  Know how to [authenticate](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#generate-api-keys.md) Orders API.  
- The order_id received in the response should be passed to the checkout. This ties the Order with the payment and secures the request from being tampered.

> **WARN**
>
> 
> **Watch Out!**
> 
> Payments made without an `order_id` cannot be captured and will be automatically refunded. You must create an order before initiating payments to ensure proper payment processing.
> 

## API Sample Code

The following is a sample API request and response for creating an order:

```curl: Curl
curl -X POST https://api.razorpay.com/v1/orders
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
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
  orderRequest.put("receipt", "order_rcptid_11");

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
  'currency'        => 'INR'// [See the list of supported currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md).)
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

#### Request Parameters

Here is the list of parameters and their description for creating an order:

`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit. For example, for an actual amount of , the value of this field should be `29935`.

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

`id` _optional_
: `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

Know more about [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

## Error Response Parameters

The error response parameters are available in the [API Reference Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md).

## Step 2: Create a Payment

Use the `order_id`, that is the `id` returned in the [previous step](#step-1-create-an-order) to create a payment. The API endpoint given below creates a payment using cards. Your customers can make payments by providing either card details or the token id.

### Pay using Cards

Use the following endpoint to make payment using card details.

/payments/create/redirect

```curl: Request
curl -u :
-X POST https://api.razorpay.com/v1/payments/create/redirect
-H 'content-type:application/json'
-d '{
  "amount": 50000,
  "currency": "INR",
  "email": "gaurav.kumar@example.com",
  "contact": 9000090000,
  "order_id": "order_DBJOWzybf0sJbb",
  "method": "card",
  "card":{
    "number": "5104060000000008",
    "name": "Gaurav Kumar",
    "expiry_month": "01",
    "expiry_year": "22"
  },
  "auth_type": "skip"
}'
```json: Response
{
  "razorpay_payment_id" : "pay_2xxQoUBi66xm2f",
  "razorpay_order_id" : "order_DBJOWzybf0sJbb",
  "razorpay_signature" : "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

### Pay using Tokens

According to recent Payment Acquirer (PA)/ Payment Gateway (PG) guidelines from RBI, businesses cannot save their customers' card numbers and other card data on their servers.

Use the following endpoint to make payment using token id.

/payments/create/redirect

```curl: Request
curl -u :
-X POST https://api.razorpay.com/v1/payments/create/redirect
-H 'content-type:application/json'
-d '{
"amount":100,
"currency":"INR",
"contact":"9164544995",
"email":"shivamyuvraaj1@gmail.com",
"order_id": "order_JfhhSvgLYUDoNC",
"token":"token_IaoGJDRc9eRff0",
"customer_id" :"cust_IaV8vdrgdosxe6",
"auth_type":"skip"
}'
```json: Response
{
  "razorpay_payment_id" : "pay_2xxQoUBi66xm2f",
  "razorpay_order_id" : "order_DBJOWzybf0sJbb",
  "razorpay_signature" : "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

## Step 3: Post Processing
If the payment is successful, you can query the `razorpay_order_id` in your database and mark the corresponding transaction at your end as paid.

## Create Multiple Payments in a Batch
