---
title: TPV S2S Integration - Debit Card
description: Understand Third-Party Validation (TPV) support on S2S Integration with the debit card payment method by Razorpay.
---

# TPV S2S Integration - Debit Card

Investors can pay with a debit card and input the necessary card details (card number, CVV, expiry information). When a debit card payment request is made, the system checks to confirm that the bank account associated with the debit card matches the registered bank account details. If this verification is successful, the customer is prompted to enter a one-time password (OTP) from the card to complete the payment.

### Checkout Flow

- **Guest Checkout**: Investors can add a new debit card for their purchase in this flow. They are given the option to save the card for future use or proceed with the purchase without saving the card details.

- **[Coming Soon] Tokenized or Saved Card**: We will introduce a streamlined checkout experience where customers can select a saved debit card for their purchase, eliminating the need to re-enter the card information.

> **INFO**
>
> 
> **Handy Tips**
> 
> - You must have a PCI compliance certificate to enable this feature on your account. For more details, refer to the [PCI Compliance](https://www.pcisecuritystandards.org/) website.
> - To begin accepting Debit Card payment requests, make sure to prominently display **Debit Cards** as a payment option in your user interface (UI).
> 

## Prerequisites

- Contact our [Support Team](https://razorpay.com/support/#raise-a-request) to get this feature enabled for your account.
- Keep the API key (combination of `Key_Id` and `Key_Secret`) handy for integration. 
- [Generate API Keys from the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) if you have not done already.
- Configure the [payment capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) on the Dashboard.

## Integration

Given below are the steps:
1. [Collect Investor Bank Account Details](#step-1-collect-investor-bank-account-details)
2. [Create an Order](#step-2-create-an-order)
3. [Create a Payment](#step-3-create-a-payment)
4. [Store Fields in Your Server](#step-4-store-fields-in-your-server)
5. [Verify the Signature](#step-5-verify-the-signature)

### Step 1: Collect Investor Bank Account details

Collect the investor's bank details or UPI ID at the time of investor registration.

### Step 2: Create an Order

If the user is choosing debit cards on your UI, pass the method as `card`.

/orders

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "method": "card",
  "receipt": "BILL13375649",
  "currency": "INR",
  "bank_account": {
    "account_number": "765432123456789",
    "name": "Gaurav Kumar",
    "ifsc": "HDFC0000053"
  }
}'

```java: Java 
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

    JSONObject orderRequest = new JSONObject();
    orderRequest.put("amount", 100); // amount in the smallest currency unit
    orderRequest.put("currency", "INR");
    orderRequest.put("receipt", "BILL13375649");
    orderRequest.put("method", "card");

    JSONObject bank_account = new JSONObject();
    bank_account.put("account_number", "765432123456789");
    bank_account.put("name", "Gaurav Kumar");
    bank_account.put("ifsc, "HDFC0000053");
    orderRequest.put("bank_account", bank_account);

    Order order = razorpayclient.orders.create(orderRequest);
    System.out.print(order);
        
```python: Python 
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
{
  "amount": 100,
  "method": "card",
  "receipt": "BILL13375649",
  "currency": "INR",
  "bank_account": {
    "account_number": "765432123456789",
    "name": "Gaurav Kumar",
    "ifsc": "HDFC0000053"
  }
 })

```php: PHP 
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 100, 'receipt' => 'BILL13375649', 'method' => 'card', 'currency' => 'INR', 'bank_account'=> array('account_number'=> '765432123456789','name'=> 'Gaurav Kumar','ifsc'=>'HDFC0000053')));

```csharp: .NET 
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 100);
orderRequest.Add("method", "card");
orderRequest.Add("currency", "INR");
orderRequest.Add("receipt", "receipt#1");
Dictionary bankAccount = new Dictionary();
bankAccount.Add("account_number","765432123456789");
bankAccount.Add("name","Gaurav Kumar");
bankAccount.Add("ifsc","HDFC0000053");
orderRequest.Add("bank_account", bankAccount);

Order order = client.Order.Create(orderRequest);

```ruby: Ruby 
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 100,
  "method": "card",
  "receipt": "BILL13375649",
  "currency": "INR",
  "bank_account": {
    "account_number": "765432123456789",
    "name": "Gaurav Kumar",
    "ifsc": "HDFC0000053"
  }
}  

Razorpay::Order.create(para_attr)

```js: Node.js 
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  "amount": 100,
  "method": "card",
  "receipt": "BILL13375649",
  "currency": "INR",
  "bank_account": {
    "account_number": "765432123456789",
    "name": "Gaurav Kumar",
    "ifsc": "HDFC0000053"
  }
})

```go: Go 
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 100,
  "method": "card",
  "receipt": "BILL13375649",
  "currency": "INR",
  "bank_account": map[string]interface{}{
    "account_number": "765432123456789",
    "name": "Gaurav Kumar",
    "ifsc": "HDFC0000053",
  },
}

body, err := client.Order.Create(data, nil)

```json: Response
{
  "id": "order_GAWN9beXgaqRyO",
  "entity": "order",
  "amount": 100,
  "amount_paid": 0,
  "amount_due": 500,
  "currency": "INR",
  "receipt": "BILL13375649",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1573044247
}
```

If the user selects the payment method within the Razorpay UI, there is no need to include the `method` field. Below is a sample code for reference.

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "receipt": "BILL13375649",
  "currency": "INR",
  "bank_account": {
    "account_number": "765432123456789",
    "name": "Gaurav Kumar",
    "ifsc": "HDFC0000053"
  }
}'

```java: Java 
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount",100);
orderRequest.put("currency","INR");
orderRequest.put("receipt", "receipt#1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_1","Tea, Earl Grey, Hot");
orderRequest.put("notes",notes);

Order order = instance.orders.create(orderRequest);
        
```python: Python 
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 100,
  "currency": "INR",
  "receipt": "receipt#1",
  "partial_payment":False,
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
})

```php: PHP 
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => 'INR', 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

```csharp: .NET 
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 100);
orderRequest.Add("currency", "INR");
orderRequest.Add("receipt", "receipt#1");
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey, Hot");
orderRequest.Add("notes", notes);

Order order = client.Order.Create(orderRequest);

```ruby: Ruby 
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 100,
  "currency": "INR",
  "receipt": "receipt#1",
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
}

Razorpay::Order.create(para_attr)

```js: Node.js 
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  "amount": 100,
  "currency": "INR",
  "receipt": "receipt#1",
  "partial_payment": false,
  "notes": {
    "key1": "value3",
    "key2": "value2"
  }
})

```go: Go 
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 100,
  "currency": "INR",
  "receipt": "some_receipt_id",
  "partial_payment": false,
  "notes": map[string]interface{}{
      "key1": "value1",
      "key2": "value2",
    },
}
body, err := client.Order.Create(data, nil)

```json: Response
{
  "id": "order_GAWRjlWkVcRh0V",
  "entity": "order",
  "amount": 100,
  "amount_paid": 0,
  "amount_due": 100,
  "currency": "INR",
  "receipt": "BILL13375649",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1573044206
}
```

#### Request Parameters

Create a request payload using the following attributes:

@include tpv/order-request-parameters

### Step 3: Create a Payment

/payments/create/json

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
 -d '{
  "amount": "100",
  "currency": "INR",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "order_id": "order_GAWN9beXgaqRyO",
  "method": "card",
  "card":{
    "number": "4386289407660153",
    "name": "Gaurav",
    "expiry_month": "11",
    "expiry_year": "30",
    "cvv": "100"
  },
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount",100);
paymentRequest.put("currency","INR");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "9000090000");
paymentRequest.put("order_id", "order_JZluwjknyWdhnU");
paymentRequest.put("method", "card");
JSONObject card = new JSONObject();
card.put("number","4854980604708430");
card.put("cvv","123");
card.put("expiry_month","12");
card.put("expiry_year","30");
card.put("name","Gaurav Kumar");
paymentRequest.put("card",card);
              
Payment payment = instance.payments.createJsonPayment(paymentRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.createPaymentJson({
  "amount": 100,
  "currency": "INR",
  "order_id": "order_EAkbvXiCJlwhHR",
  "email": "gaurav.kumar@example.com",
  "contact": 9000090000,
  "method": "card",
  "card":{
    "number": 4386289407660153,
    "name": "Gaurav",
    "expiry_month": 11,
    "expiry_year": 30,
    "cvv": 100
  }
})

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createPaymentJson(array('amount' => 100,'currency' => 'INR','email' => 'gaurav.kumar@example.com','contact' => '9000090000','order_id' => 'order_I6LVPRQ6upW3uh','method' => 'card','card' => array('number' => '4854980604708430','cvv' => '123','expiry_month' => '12','expiry_year' => '30','name' => 'Gaurav Kumar')));

```csharp: .NET
RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", 100);
paymentRequest.Add("currency", "INR");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9000090000");
paymentRequest.Add("order_id", "order_MScdJxfAb4NFbD");
paymentRequest.Add("method", "card");
Dictionary card = new Dictionary();
card.Add("number", "4854980604708430");
card.Add("cvv", "123");
card.Add("expiry_month", "12");
card.Add("expiry_year", "30");
card.Add("name", "Gaurav Kumar");
paymentRequest.Add("card", card);

Payment payment = client.Payment.CreateJsonPayment(paymentRequest);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 100,
  "currency": "INR",
  "order_id": "order_EAkbvXiCJlwhHR",
  "email": "gaurav.kumar@example.com",
  "contact": 9000090000,
  "method": "card",
  "card":{
    "number": 4386289407660153,
    "name": "Gaurav",
    "expiry_month": 11,
    "expiry_year": 30,
    "cvv": 100
  }
}

Razorpay::Payment.create_json_payment(para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createPaymentJson({
  "amount": 100,
  "currency": "INR",
  "order_id": "order_EAkbvXiCJlwhHR",
  "email": "gaurav.kumar@example.com",
  "contact": 9000090000,
  "method": "card",
  "card":{
    "number": 4386289407660153,
    "name": "Gaurav",
    "expiry_month": 11,
    "expiry_year": 30,
    "cvv": 100
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
  "amount": 100,
  "currency": "INR",
  "order_id": "order_EAkbvXiCJlwhHR",
  "email": "gaurav.kumar@example.com",
  "contact": 9000090000,
  "method": "card",
  "card": map[string]interface{}{
    "number": "4386289407660153",
    "name": "Gaurav",
    "expiry_month": 11,
    "expiry_year": 30,
    "cvv": 100,
  },
}
body, err := client.Payment.CreatePaymentJson(para_attr, nil)

```json: Response
{
  "razorpay_payment_id": "pay_GAWOYqPlvrtPSi",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/pay_GAWOYqPlvrtPSi/authorize"
    }
  ]
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount expressed in paise (currency supported is INR). For example, for an actual amount of ₹1, this field's value should be `100`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. You can create Orders in **INR** only.

`order_id` _mandatory_
: `string` Unique identifier of the order created in the previous step.

`method` _mandatory_
: `string` The payment method used to make the payment. Possible value: `card`

`card` _mandatory_
: `object`` Details associated with the card.

    `number`
    : `string` Unformatted card number.

    `name`
    : `string` Name of the cardholder.

    `expiry_month`
    : `string` Expiry month for the card in MM format.

    `expiry_year`
    : `string` Expiry year for the card in YY format.

    `cvv`
    `string` CVV printed on the back of the card.

`email` _mandatory_
: `string` The customer's email address.

`contact` _mandatory_
: `string` The customer's phone number.

#### Response Parameters

If the payment request is valid, the response contains the following fields:

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. Possible values:
        - `redirect` - Use this URL to redirect the customer to the bank page.
        - `poll` - A payment request notification is sent to the customer's UPI PSP app.

    `url`
    : `string`  URL to be used for the action indicated.

### Step 4: Store Fields in Your Server

@include integration-steps/store-fields

### Step 5: Verify the Signature

@include integration-steps/verify-signature

### Payment Capture Settings

@include integration-steps/capture-settings

### Related Information

@include integration-steps/related-info
