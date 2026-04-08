---
title: TPV S2S Integration - Netbanking
description: Know how we support Third-Party Validation (TPV) on S2S Integration with the netbanking payment method.
---

# TPV S2S Integration - Netbanking

In the TPV integration flow, Razorpay maps the customer's bank accounts so that the payment is processed only from their registered bank accounts.

## Prerequisites

- Contact our [Support Team](https://razorpay.com/support/#raise-a-request) to get this feature enabled for your account.
- Keep the API key (combination of `Key_Id` and `Key_Secret`) handy for integration. 
- [Generate API Keys from the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) if you have not done already.
- Configure the [payment capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) on the Dashboard.

## Integration

Given below are the steps:
1. [Collect Customer Bank Account Details](#step-1-collect-customer-bank-account-details)
2. [Create an Order](#step-2-create-an-order)
3. [Create a Payment](#step-3-create-a-payment)
4. [Store Fields in Your Server](#step-4-store-fields-in-your-server)
5. [Verify the Signature](#step-5-verify-the-signature)

### Step 1: Collect Customer Bank Account details

Collect the customer's bank details or UPI ID at the time of registration.

### Step 2: Create an Order

Pass the bank account details to the `bank_account` array of the Orders API:

/orders

Given below is the sample code when `method` is `netbanking`.

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "method": "netbanking",
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
    orderRequest.put("method", "netbanking");

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
  "method": "netbanking",
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

$api->order->create(array('amount' => 100, 'receipt' => 'BILL13375649', 'method' => 'netbanking', 'currency' => 'INR', 'bank_account'=> array('account_number'=> '765432123456789','name'=> 'Gaurav Kumar','ifsc'=>'HDFC0000053')));

```csharp: .NET 
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 100);
orderRequest.Add("method", "netbanking");
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
  "method": "netbanking",
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
  "method": "netbanking",
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
  "method": "netbanking",
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

`amount` _mandatory_
: `integer` The transaction amount expressed in paise (currency supported is INR). For example, for an actual amount of ₹1, the value of this field should be `100`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. You can create orders in **INR** only.

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`method` _mandatory_
: `string` The payment method used to make the payment. If this parameter is not passed, investors will be able to make payments using both netbanking and UPI payment methods. Possible values:
  - `netbanking`: Investors can make payments only using netbanking.
  - `card`: Investors can make payments using debit card.
  - `upi`: Investors can make payments only using UPI.

`bank_account` _mandatory_
: `object` Details of the bank account that the investor has provided at the time of registration.

    `account_number`  _mandatory_
    : `string` The bank account number from which the investor should make the payment. For example, `765432123456789` Payments will not be processed for an incorrect account number.

    `name` _mandatory_
    : `string` The name linked to the bank account. For example, `Gaurav Kumar`.

    `ifsc` _mandatory_
    : `string` The bank IFSC. For example, `HDFC0000053`.

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
  "method": "netbanking",
  "bank": "HDFC"
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("amount", 100);
paymentRequest.put("currency", "INR");
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "9000090000");
paymentRequest.put("order_id", "order_GAWN9beXgaqRyO");
paymentRequest.put("method", "netbanking");
paymentRequest.put("bank", "HDFC");

Payment payment = instance.payments.createJsonPayment(paymentRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.createPaymentJson({
    'amount': '100',
    'currency': 'INR',
    'email': 'gaurav.kumar@example.com',
    'contact': '9000090000',
    'order_id': 'order_GAWN9beXgaqRyO',
    'method': 'netbanking',
    'bank': 'HDFC',
    })

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createPaymentJson(array('amount' => 100,'currency' => 'INR','email' => 'gaurav.kumar@example.com','contact' => '9000090000','order_id' => 'order_GAWN9beXgaqRyO','method' => 'netbanking', 'bank'=>'HDFC'));

```csharp: .NET
RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount",100);
paymentRequest.Add("currency","INR");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9000090000");
paymentRequest.Add("order_id", "order_GAWN9beXgaqRyO");
paymentRequest.Add("method", "netbanking");
paymentRequest.Add("bank", "HDFC");
              
Payment payment = client.Payment.CreateJsonPayment(paymentRequest);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

param_attr = {
  "amount": "100",
  "currency": "INR",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "order_id": "order_GAWN9beXgaqRyO",
  "method": "netbanking",
  "bank": "HDFC"
}

Razorpay::Payment.create_json_payment(param_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createPaymentJson({
    "amount": "100",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_GAWN9beXgaqRyO",
    "method": "netbanking",
    "bank": "HDFC"
});

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr: = map[string] interface {} {
    "amount": "100",
    "currency": "INR",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "order_id": "order_GAWN9beXgaqRyO",
    "method": "netbanking",
    "bank": "HDFC",
}
body, err: = client.Payment.CreatePaymentJson(para_attr, nil)
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
: `string` The payment method used to make the payment. Possible value: `netbanking`

`bank` _mandatory_
: `string` The customer's bank code. For example, `HDFC`.

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

A successful payment returns the following fields to the Checkout form.

  
### Success Callback

- You need to store these fields in your server.
- You can confirm the authenticity of these details by verifying the signature in the next step.

```json: Success Callback
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout **only** for successful payments.

`razorpay_order_id`
: `string` Unique identifier for the order returned by Checkout.

`razorpay_signature`
: `string` Signature returned by the Checkout. This is used to verify the payment.
    

### Step 5: Verify the Signature

This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments.

  
### To verify the `razorpay_signature` returned to you by the Checkout form:

     1. Create a signature in your server using the following attributes:
        - `order_id`: Retrieve the `order_id` from your server. Do not use the `razorpay_order_id` returned by Checkout.
        - `razorpay_payment_id`: Returned by Checkout.
        - `key_secret`: Available in your server. The `key_secret` that was generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

     2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `order_id` to construct a HMAC hex digest as shown below:

         ```html: HMAC Hex Digest
         generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

           if (generated_signature == razorpay_signature) {
             payment is successful
           }
         ```
         
     3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.
    

  
### Generate Signature on Your Server

Given below is the sample code for payment signature verification:

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String secret = "EnLs21M47BllR3X8PSFtjtbd";

JSONObject options = new JSONObject();
options.put("razorpay_order_id", "order_IEIaMR65cu6nz3");
options.put("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.put("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f");

boolean status =  Utils.verifyPaymentSignature(options, secret);

```php: PHP
$api = new Api($key_id, $secret);

$api->utility->verifyPaymentSignature(array('razorpay_order_id' => $razorpayOrderId, 'razorpay_payment_id' => $razorpayPaymentId, 'razorpay_signature' => $razorpaySignature));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

payment_response = {
       razorpay_order_id: 'order_IEIaMR65cu6nz3',
       razorpay_payment_id: 'pay_IH4NVgf4Dreq1l',
       razorpay_signature: '0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f'
     }
Razorpay::Utility.verify_payment_signature(payment_response)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.utility.verify_payment_signature({
  'razorpay_order_id': razorpay_order_id,
  'razorpay_payment_id': razorpay_payment_id,
  'razorpay_signature': razorpay_signature
  })

```c: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("razorpay_order_id", "order_IEIaMR65");
options.Add("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.Add("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50");

Utils.verifyPaymentSignature(options);

```nodejs: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var { validatePaymentVerification, validateWebhookSignature } = require('./dist/utils/razorpay-utils');
validatePaymentVerification({"order_id": razorpayOrderId, "payment_id": razorpayPaymentId }, signature, secret);

```Go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

params := map[string]interface{}{
 "razorpay_order_id": "order_IEIaMR65cu6nz3",
 "razorpay_payment_id": "pay_IH4NVgf4Dreq1l",
}

signature := "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f";
secret := "EnLs21M47BllR3X8PSFtjtbd";
utils.VerifyPaymentSignature(params, signature, secret)
```

    

  
### Post Signature Verification

After you have completed the integration, you can [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md), make test payments, replace the test key with the live key and integrate with other [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
    

### Payment Capture Settings

After payment is `authorized`, you need to capture it to settle the amount to your bank account as per the settlement schedule. Payments that are not captured are auto-refunded after a fixed time.

> **WARN**
>
> 
> 
> **Watch Out**
> 
> - You should deliver the products or services to your customers only after the payment is captured. Razorpay automatically refunds all the uncaptured payments.
> - You can track the payment status using our [Fetch a Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-a-payment) or webhooks.
> 

  
    Authorized payments can be automatically captured. You can auto-capture all payments [using global settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#auto-capture-all-payments) on the Razorpay Dashboard. Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Payment capture settings work only if you have integrated with Orders API on your server side. Know more about the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
>     

  
  
    Each authorized payment can also be captured individually. You can manually capture payments using [Payment Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments). Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
  

### Related Information

- [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) (Recommended)
- [Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) (Recommended)
- [How Payment Gateway Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md)
- [Payment States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md)
- [Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements.md)
- [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md)
