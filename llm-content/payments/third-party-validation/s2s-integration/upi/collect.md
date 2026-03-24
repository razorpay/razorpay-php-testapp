---
title: TPV S2S Integration - UPI Collect Flow
description: Integrate TPV using S2S integration with UPI Collect Flow.
---

# TPV S2S Integration - UPI Collect Flow

With UPI payments, your customers can make payments using a Virtual Payment Address (VPA) without the need to enter the bank account details. In the UPI Collect flow, customers enter their registered VPA at checkout, open the UPI PSP app and complete the payment.

@include payment-methods/upi-collect-deprecated/s2s

**NPCI Restrictions for UPI Collect Flow**

As per NPCI guidelines, the following MCC codes are restricted and cannot accept UPI Collect payments:

  
### Restricted MCC Codes

     
     MCC Code | Category
     ---
     5816 | Digital Goods: Games
     ---
     6540 | POI Funding Transactions (excluding MoneySend)
     ---
     4812 | Telecommunication Equipment and Telephone Sales
     ---
     4814 | Telecommunication Services
     ---
     7408 | Lending Platform
     ---
     6513 | Real Estate Agents and Managers - Rentals
     ---
     7995 | Betting/Lottery
     ---
     5412 | Grocery Stores, Supermarkets
     ---
     5413 | Grocery Stores, Supermarkets
     
    

## Best Practices

Following are a few of the best practices to be followed to accept online payments using UPI Collect Flow:

1. You should validate the VPA before initiating the payment request. Know more about[ VPA Validation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/features/validate-vpa.md).
2. You should add a custom UPI Collect expiry based on the business requirement to provide enough time for the customer to complete the payment.
3. You should use the [Saved VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/saved-vpa.md) feature provided by Razorpay to provide a better customer experience and have a better conversion.

## Prerequisites

- Contact our [Support Team](https://razorpay.com/support/#raise-a-request) to get this feature enabled for your account.
- Keep the API key (combination of `Key_Id` and `Key_Secret`) handy for integration. 
- [Generate API Keys from the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) if you have not done already.
- Configure the [payment capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) on the Dashboard.

## UPI Collect Flow

Following is the process for accepting payments using the UPI Collect Flow:

1. The customer selects UPI as the payment method and enters their VPA on your app or website. Razorpay validates the VPA.
2. The customer saves the entered VPA details while completing the payment. Razorpay saves the valid VPA details as **tokens**.
3. The next time the customer wants to make a payment using VPA, the customer can select the saved VPA and complete the payment.

## Integration Steps

1. [Create a Payment and a VPA Token](#1-create-a-payment-and-a-vpa-token)
2. [Create Payments Using Tokens](#2-create-payments-using-tokens)

### 1. Create a Payment and a VPA Token

Follow these steps to create and save valid VPA tokens in the payment flow:

1. [Create a customer or fetch the customer for whom VPA should be saved.](#step-11-create-a-customer)
2. [Create an order.](#step-12-create-an-order)
3. [Validate the VPA entered by the customer.](#step-13-validate-the-vpa)
4. [Initiate a payment.](#step-14-initiate-a-payment)

### Step 1.1: Create a Customer

Skip this step if the customer is already created for your account.

Create a customer whose VPAs should be saved with details such as `email` and `contact`.

Razorpay identifies a customer by a unique customer identifier generated at the time of creation. This allows Razorpay to take action on a particular customer on behalf of the merchant for example, send an invoice, set recurring payments, and others./create-customer

#### Request Parameters

Razorpay identifies a customer by a unique customer identifier generated at the time of creation. This allows Razorpay to take action on a particular customer on behalf of the merchant for example, send an invoice, set recurring payments, and others./create-customer-req

### Step 1.2: Create an Order

You need to create an order before initiating the payment.

/orders

Given below is the sample code when `method` is `upi`.

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "method": "upi",
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
    orderRequest.put("method", "upi");

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
  "method": "upi",
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

$api->order->create(array('amount' => 100, 'receipt' => 'BILL13375649', 'method' => 'upi', 'currency' => 'INR', 'bank_account'=> array('account_number'=> '765432123456789','name'=> 'Gaurav Kumar','ifsc'=>'HDFC0000053')));

```csharp: .NET 
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 100);
orderRequest.Add("method", "upi");
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
  "method": "upi",
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
  "method": "upi",
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
  "method": "upi",
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

@include tpv/order-request-parameters

### Step 1.3: Validate the VPA

Collect the VPA details of the customer and validate it as follows:

/payments/validate/vpa

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payments/validate/vpa \
-H "Content-Type: application/json" \
-d '{
  "vpa": "gauravkumar@exampleupi"
}'

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.validateVpa({
  "vpa": "gauravkumar@exampleupi"
})

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("vpa", "gauravkumar@exampleupi");

Payment payment = instance.payments.validateUpi(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->validateVpa(array('vpa'=>'gauravkumar@exampleupi'));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("vpa", "gauravkumar@exampleupi");

Payment payment = client.Payment.ValidateUpi(paymentRequest)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "vpa": "gauravkumar@exampleupi"
}
Razorpay::Payment.validate_vpa(para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.validateVpa({
  "vpa": "gauravkumar@exampleupi"
});

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr: = map[string] interface {} {
    "vpa": "gauravkumar@exampleupi",
}

body, err: = client.Payment.ValidateVpa(para_attr, nil)

```json: Response
{
  "vpa": "gauravkumar@exampleupi",
  "success": true,
  "customer_name": "Gaurav Kumar"
}
```

#### Request Parameters

`vpa` _mandatory_
: `string` The virtual payment address (VPA) you want to validate. For example, `gauravkumar@exampleupi`.

  
> **WARN**
>
> 
>   **Deprecation Notice**
> 
>   UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [ migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/s2s-integration.md) to switch to UPI Intent.
>   

### Step 1.4: Initiate a Payment

Once validated, save the VPA provided by the customer. Create a payment with the valid `vpa` as follows:

/payments/create/upi

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/upi \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "order_id": "order_GAWRjlWkVcRh0V",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "method": "upi",
  "customer_id": "cust_EIW4T2etiweBmG",
  "save": true,
  "ip": "192.168.0.103",
  "referer": "http",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": {
    "note_key": "value1"
  },
  "upi": {
    "flow": "collect",
    "vpa": "gauravkumar@exampleupi",
    "expiry_time": 5
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 100);
paymentRequest.put("currency", "INR");
paymentRequest.put("order_id", "order_JZluwjknyWdhnU");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "9000090000");
paymentRequest.put("method", "upi");
paymentRequest.put("customer_id", "cust_EIW4T2etiweBmG");
paymentRequest.put("save", true);
paymentRequest.put("ip", "192.168.0.103");
paymentRequest.put("referer", "http");
paymentRequest.put("user_agent", "Mozilla/5.0");
paymentRequest.put("description", "Test flow");
JSONObject notes = new JSONObject();
notes.put("note_key", "value1");
JSONObject upi = new JSONObject();
upi.put("flow", "collect");
upi.put("vpa", "gauravkumar@exampleupi");
upi.put("expiry_time", 5);
paymentRequest.put("notes", notes);
paymentRequest.put("upi", upi);

Payment payment = instance.payments.createUpi(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createUpi(array("amount" => 100,"currency" => "INR","order_id" => "order_Jhgp4wIVHQrg5H","email" => "gaurav.kumar@example.com","contact" => "9000090000","method" => "upi","customer_id" => "cust_EIW4T2etiweBmG","save" => true,"ip" => "192.168.0.103","referer" => "http","user_agent" => "Mozilla/5.0","description" => "Test flow","notes" => array("note_key" => "value1"),"upi" => array("flow" => "collect","vpa" => "gauravkumar@exampleupi","expiry_time" => 5)));

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.createUpi({
    'amount': 100,
    'currency': 'INR',
    'order_id': 'order_GAWRjlWkVcRh0V',
    'email': 'gaurav.kumar@example.com',
    'contact': '9000090000',
    'method': 'upi',
    'customer_id': 'cust_EIW4T2etiweBmG',
    'save': True,
    'ip': '192.168.0.103',
    'referer': 'http',
    'user_agent': 'Mozilla/5.0',
    'description': 'Test flow',
    'notes': {'note_key': 'value1'},
    'upi': {
        'flow': 'collect', 
        'vpa': 'gauravkumar@exampleupi',
        'expiry_time': 5},
    })
  
```csharp: .NET
RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", 100);
paymentRequest.Add("currency", "INR");
paymentRequest.Add("order_id", "order_MSd9LNbSEB2Gnv");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9000090000");
paymentRequest.Add("method", "upi");
paymentRequest.Add("customer_id", "cust_Z6t7VFTb9xHeOs");
paymentRequest.Add("save", true);
paymentRequest.Add("ip", "192.168.0.103");
paymentRequest.Add("referer", "http");
paymentRequest.Add("user_agent", "Mozilla/5.0");
paymentRequest.Add("description", "Test flow");
Dictionary notes = new Dictionary();
notes.Add("note_key", "value1");
Dictionary upi = new Dictionary();
upi.Add("flow", "collect");
upi.Add("vpa", "gauravkumar@exampleupi");
upi.Add("expiry_time", 5);
paymentRequest.Add("notes", notes);
paymentRequest.Add("upi", upi);

Payment payment = client.Payment.CreateUpi(paymentRequest);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 100,
  "currency": "INR",
  "order_id": "order_GAWRjlWkVcRh0V",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "method": "upi",
  "customer_id": "cust_EIW4T2etiweBmG",
  "save": 1,
  "ip": "192.168.0.103",
  "referer": "http",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": {
    "note_key": "value1"
  },
  "upi": {
    "flow": "collect",
    "vpa": "gauravkumar@exampleupi",
    "expiry_time": 5
  }
}

Razorpay::Payment.create_upi(para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createUpi({
    "amount": 100,
    "currency": "INR",
    "order_id": "order_GAWRjlWkVcRh0V",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "method": "upi",
    "customer_id": "cust_EIW4T2etiweBmG",
    "save": true,
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": {
        "note_key": "value1"
    },
    "upi": {
        "flow": "collect",
        "vpa": "gauravkumar@exampleupi",
        "expiry_time": 5
    }
});

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr: = map[string] interface {} {
    "amount": 100,
    "currency": "INR",
    "order_id": "order_GAWRjlWkVcRh0V",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "method": "upi",
    "customer_id": "cust_EIW4T2etiweBmG",
    "save": true,
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": map[string] interface {} {
            "note_key": "value1",
        },
        "upi": map[string] interface {} {
            "flow": "collect",
            "vpa": "gauravkumar@exampleupi",
            "expiry_time": 5,
        },
}
body, err: = client.Payment.CreateUpi(para_attr, nil)

```json: Response
{
  "razorpay_payment_id": "pay_EAm09NKReXi2e0"
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The amount associated with the payment in the smallest unit of the supported currency. For example, 2000 means ₹20.

`currency` _mandatory_
: `string` ISO code of the currency associated with the payment amount. Only `INR` is supported.

`order_id` _mandatory_
: `string` Unique identifier of the order, obtained in the response of the previous step.

`notes` _optional_
: `json object` Key-value pairs that can hold additional information about the payment. Refer to the [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) section of the API Reference Guide.

`description` _optional_
: `string` Descriptive text of the payment.

`contact` _mandatory_
: `string` Phone number of the customer.

`email` _mandatory_
: `string` Email address of the customer.

`save`
: `boolean` Specifies if the VPA should be stored as tokens. Possible values:
  - `true`: Saves the VPA details.
  - `false`(default): Does not save the VPA details.

`customer_id` _mandatory_
: `string` Unique identifier of the customer, obtained from the response of [Step 1](#step-1-create-a-customer).

`callback_url` _optional_
: `string` URL where Razorpay will submit the final payment status.

`ip` _mandatory_
: `string` The client's browser IP address. For example, **117.217.74.98**

`referer` _mandatory_
: `string` Value of `referer` header passed by the client's browser. For example, **https://example.com/**

`user_agent` _mandatory_
: `string` Value of `user_agent` header passed by the client's browser. 
For example, **Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36**

`upi`
: Details of the expiry of the UPI link

    `flow` _mandatory_
    : `string` Specify the type of the UPI payment flow. 
 Possible values:
      - `collect` (default)
      - `intent`

     `vpa` _mandatory_
    : `string` VPA of the customer where the collect request will be sent.

    `expiry_time` _mandatory_
    : `integer` Period of time (in minutes) after which the link will expire. The default value is **5**.

## 2. Create Payments Using Tokens

On a repeat transaction, customers can make payments using the VPA tokens, which were saved earlier. Follow these steps to create a payment using a saved token:

1. [Create an Order.](#step-21-create-an-order)
2. [Fetch all tokens of a customer.](#step-22-fetch-vpa-tokens-of-a-customer)
3. [Initiate a payment with the token selected by the customer.](#step-23-initiate-a-payment-using-vpa-token)
4. [Verify Payment Signature](#step-24-verify-the-payment-signature)

### Step 2.1: Create an Order

You need to create an order before initiating the payment.

/orders

Given below is the sample code when `method` is `upi`.

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "method": "upi",
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

       ArrayList Offer = new ArrayList();
        Offer.add("offer_JTUADI4ZWBGWur");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 100); // amount in the smallest currency unit
        orderRequest.put("currency", "INR");
        orderRequest.put("receipt", "BILL13375649");
        orderRequest.put("method", "upi");
   
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
  "method": "upi",
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

$api->order->create(array('amount' => 100, 'method' => 'upi', 'currency' => 'INR', bank_account => array( 'account_number' => '765432123456789', 'name' => 'Gaurav Kumar', 'ifsc' => 'HDFC0000053')));

```csharp: .NET 
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 100); // amount in the smallest currency unit
options.Add("receipt", "receipt#1");
options.Add("currency", "INR");
options.Add("method", "upi");
bank_account.account_number="765432123456789";
bank_account.name="Gaurav Kumar";
bank_account.ifsc="HDFC0000053";

options.Add("bank_account", bank_account);

Order order = client.Order.Create(options);

```ruby: Ruby 
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 100, currency: 'INR', receipt: 'receipt#1', method: 'upi',  bank_account: { account_number: '765432123456789', name: 'Gaurav Kumar', ifsc: 'HDFC0000053'}

```js: Node.js 
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 100,
  currency: "INR",
  receipt: "receipt#1",
  method: 'upi',
  bank_account: {
    account_number: "765432123456789",
    name: "Gaurav Kumar",
    ifsc: "HDFC0000053"
  }
})

```go: Go 
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 100,
  "currency": "INR",
  "receipt": "receipt#1",
  "method": "upi",
  "bank_account": {
    "account_number": "765432123456789",
    "name": "Gaurav Kumar",
    "ifsc": "HDFC0000053"
  }
}
body, err := client.Order.Create(data)

```json: Response
{
  "id": "order_GAWRjlWkVcRh0V",
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
  "created_at": 1573044206
}
```

If the user selects the payment method within the Razorpay UI, there is no need to include the `method` field. Below is a sample code for reference.

```curl: Request
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

```json: Response
{
  "id": "order_GAWRjlWkVcRh0V",
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
  "created_at": 1573044206
}
```

#### Request Parameters

@include tpv/order-request-parameters

### Step 2.2: Fetch VPA Tokens of a Customer

You can retrieve all the card and VPA tokens of a customer if they have been previously saved.

/customers/:customer_id/tokens

```curl: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/customers/cust_EIW4T2etiweBmG/tokens

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_DtHaBuooGHTuyZ";
List  token = instance.customers.fetchTokens(customerId);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.token.all(customerId)

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)->tokens()->all();

```csharp: .NET
RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

string customerId = "cust_DtHaBuooGHTuyZ";

List token = client.Customer.Fetch(customerId).Tokens();

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Customer.fetch(customerId).fetchTokens

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.fetchTokens(customerId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Token.All("", nil, nil)

```json: Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "token_EeO65VIv8BXZg5",
      "entity": "token",
      "token": "D7Qun28CcPwNVy",
      "bank": null,
      "wallet": null,
      "method": "upi",
      "vpa": {
        "username": "gauravkumar",
        "handle": "exampleupi",
        "name": null,
        "status": "valid",
        "received_at": 1605620835
      },
      "recurring": false,
      "recurring_details": {
        "status": "not_applicable",
        "failure_reason": null
      },
      "auth_type": null,
      "mrn": null,
      "used_at": 1586872080,
      "created_at": 1586872080,
      "start_time": null,
      "dcc_enabled": false
    },
    {
      "id": "token_EeroOjvOvorT5L",
      "entity": "token",
      "token": "4ydxm47GQjrIEx",
      "bank": null,
      "wallet": null,
      "method": "card",
      "card": {
        "entity": "card",
        "name": "Gaurav Kumar",
        "last4": "8430",
        "network": "Visa",
        "type": "credit",
        "issuer": "HDFC",
        "international": false,
        "emi": true,
        "expiry_month": 12,
        "expiry_year": 2022,
        "flows": {
          "otp": true,
          "recurring": true
        }
      },
      "vpa": null,
      "recurring": false,
      "auth_type": null,
      "mrn": null,
      "used_at": 1586976724,
      "created_at": 1586976724,
      "expired_at": 1672511399,
      "dcc_enabled": false
    }
  ]
}
```

### Step 2.3: Initiate a Payment Using VPA Token

To initiate a payment using a VPA token, pass the `customer_id` and `token` parameters instead of the `vpa` parameter.

/payments/create/upi

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/upi \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "order_id": "order_ExhN1Y0100Dkjw",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "method": "upi",
  "customer_id": "cust_EIW4T2etiweBmG",
  "token": "token_EeO65VIv8BXZg5"
  "ip": "192.168.0.103",
  "referer": "http",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": {
    "note_key": "value1"
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 100);
paymentRequest.put("currency", "INR");
paymentRequest.put("order_id", "order_JZluwjknyWdhnU");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "9123456789");
paymentRequest.put("method", "upi");
paymentRequest.put("customer_id", "cust_EIW4T2etiweBmG");
paymentRequest.put("token", "token_EeO65VIv8BXZg5");
paymentRequest.put("ip", "192.168.0.103");
paymentRequest.put("referer", "http");
paymentRequest.put("user_agent", "Mozilla/5.0");
paymentRequest.put("description", "Test flow");
JSONObject notes = new JSONObject();
notes.put("note_key", "value1");
paymentRequest.put("notes", notes);

Payment payment = instance.payments.createUpi(paymentRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.createUpi({
 "amount": 100,
 "currency": "INR",
 "order_id": "order_ExhN1Y0100Dkjw",
 "email": "gaurav.kumar@example.com",
 "contact": "9000090000",
 "method": "upi",
 "customer_id": "cust_EIW4T2etiweBmG",
 "token": "token_EeO65VIv8BXZg5"
 "ip": "192.168.0.103",
 "referer": "http",
 "user_agent": "Mozilla/5.0",
 "description": "Test flow",
 "notes": {
   "note_key": "value1"
 }
})

```php: PHP
$api = new Api($key_id, $secret);

$paymentData = [
    "amount" => 100,
    "currency" => "INR",
    "order_id" => "order_Jhgp4wIVHQrg5H",
    "email" => "gaurav.kumar@example.com",
    "contact" => "9123456789",
    "method" => "upi",
    "customer_id" => "cust_EIW4T2etiweBmG",
    "token" => "token_EeO65VIv8BXZg5",
    "ip" => "192.168.0.103",
    "referer" => "http",
    "user_agent" => "Mozilla/5.0",
    "description" => "Test flow",
    "notes" => [
        "note_key" => "value1"
    ],
];

$response = $api->payment->createUpi($paymentData);

```csharp: .NET
RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount", 100);
paymentRequest.Add("currency", "INR");
paymentRequest.Add("order_id", "order_MSd9LNbSEB2Gnv");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9999999999");
paymentRequest.Add("method", "upi");
paymentRequest.Add("customer_id", "cust_Z6t7VFTb9xHeOs");
paymentRequest.Add("token", "token_EeO65VIv8BXZg5");
paymentRequest.Add("ip", "192.168.0.103");
paymentRequest.Add("referer", "http");
paymentRequest.Add("user_agent", "Mozilla/5.0");
paymentRequest.Add("description", "Test flow");
Dictionary notes = new Dictionary();
notes.Add("note_key", "value1");
paymentRequest.Add("notes", notes);

Payment payment = client.Payment.CreateUpi(paymentRequest);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 100,
  "currency": "INR",
  "order_id": "order_GAWRjlWkVcRh0V",
  "email": "gaurav.kumar@example.com",
  "contact": "9123456789",
  "method": "upi",
  "customer_id": "cust_EIW4T2etiweBmG",
  "token": "token_EeO65VIv8BXZg5",
  "ip": "192.168.0.103",
  "referer": "http",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": {
    "note_key": "value1"
  },
}

Razorpay::Payment.create_upi(para_attr)

```javascript: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_SECRET",
});

instance.payments.createUpi({
  amount: 100,
  currency: "INR",
  order_id: "order_GAWRjlWkVcRh0V",
  email: "gaurav.kumar@example.com",
  contact: "9123456789",
  method: "upi",
  customer_id: "cust_EIW4T2etiweBmG",
  token: "token_EeO65VIv8BXZg5",
  ip: "192.168.0.103",
  referer: "http",
  user_agent: "Mozilla/5.0",
  description: "Test flow",
  notes: {
    note_key: "value1",
  },
});

```go: Go
client := razorpay.NewClient("", "")

para_attr := map[string]interface{}{
  "amount": 100,
  "currency": "INR",
  "order_id": "order_GAWRjlWkVcRh0V",
  "email": "gaurav.kumar@example.com",
  "contact": "9123456789",
  "method": "upi",
  "customer_id": "cust_EIW4T2etiweBmG",
  "token": "token_EeO65VIv8BXZg5",
  "ip": "192.168.0.103",
  "referer": "http",
  "user_agent": "Mozilla/5.0",
  "description": "Test flow",
  "notes": map[string]interface{}{
      "note_key": "value1",
   },
}

body, err := client.Payment.CreateUpi(para_attr, nil)

```json: Response
{
  "razorpay_payment_id": "pay_ExjU9GqiYqobDq"
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The amount associated with the payment in the smallest unit of the supported currency. For example, 2000 means ₹20.

`currency` _mandatory_
: `string` ISO code of the currency associated with the payment amount. Only `INR` is supported.

`order_id` _mandatory_
: `string` Unique identifier of the order, obtained in the response of the previous step.

`customer_id` _mandatory_
: `string` Unique identifier of the customer.

`token` _mandatory_
: `string` Token of the saved VPA.

`notes` _optional_
: `json object` Key-value pairs that can hold additional information about the payment. Refer to the [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) section of the API Reference Guide.

`description` _optional_
: `string` Descriptive text of the payment.

`contact` _mandatory_
: `string` Phone number of the customer.

`email` _mandatory_
: `string` Email address of the customer.

`customer_id` _mandatory_
: `string` Unique identifier of the customer.

`callback_url` _optional_
: `string` URL where Razorpay will submit the final payment status.

`ip` _mandatory_
: `string` The client's browser IP address. For example, **117.217.74.98**

`referer` _mandatory_
: `string` Value of `referer` header passed by the client's browser. For example, **https://example.com/**

`user_agent` _mandatory_
: `string` Value of `user_agent` header passed by the client's browser. 
For example, **Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36**

### Step 2.4: Verify the Payment Signature

@include integration-steps/verify-signature

### Payment Capture Settings

@include integration-steps/capture-settings

@include integration-steps/next-steps-tpv

### Related Information

@include integration-steps/related-info
