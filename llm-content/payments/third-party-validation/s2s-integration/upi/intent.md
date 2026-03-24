---
title: TPV S2S Integration - UPI Intent Flow
description: Integrate TPV using S2S integration with UPI Intent Flow.
---

# TPV S2S Integration - UPI Intent Flow

You can collect payments using the UPI Intent Flow. In this flow, when customer selects UPI as the payment method, the list of UPI PSP apps is displayed. When the customer selects their preferred app, it opens automatically. They can complete the payment on the UPI PSP app.

## Best Practices

Following are a few of the best practices to be followed to accept online payments using UPI Intent Flow:

1. **Do not change Intent URL** 

  Do not make changes to the intent URL shared by Razorpay as part of the API response. Making changes to the intent URL can lead to payment failure.
2. **Host UPI apps** 

  It is recommended to host the UPI apps on your page/app instead of just hosting the Intent URI where the native Android drawer shows the apps. This improves conversion.
3. **Rank UPI Apps by Success Rate** 

  Show the UPI PSP apps in the order of their success rate.
4. **Mobile site**  

  If you have higher traffic via mobile site, make sure you provide the option of UPI intent payment to your users using [our m-site integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/google-pay/custom-integration.md). This will help you achieve better success rates.
5. **Gpay SDK** 

  If your UPI transaction volumes are high, you can also explore integrating [Gpay SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/google-pay.md#android-integration-using-google-pay-sdk). This provides a better user experience and about a 3-5% improvement in success rate.

## Prerequisites

- Contact our [Support Team](https://razorpay.com/support/#raise-a-request) to get this feature enabled for your account.
- Keep the API key (combination of `Key_Id` and `Key_Secret`) handy for integration. 
- [Generate API Keys from the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) if you have not done already.
- Configure the [payment capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) on the Dashboard.

## UPI Intent Flow

Following is the process for accepting payments using the UPI Intent Flow:

Customers need not enter VPA or phone number as these details are pre-filled and submitted along with the other payment details. While making the payment, customers select the UPI PSP app on your app. The UPI PSP app is launched automatically on their mobile devices, where the payment is completed.

1. The customer selects UPI as the payment method.
2. The customer chooses their preferred UPI PSP app from the list.
3. The UPI PSP app opens automatically and the customer completes the payment.

## Integration Steps

1. [Create an order](#step-1-create-an-order).
2. [Initiate Payment using the intent URL](#step-2-initiate-a-payment).
3. [Store Fields in Your Server](#step-3-store-fields-in-your-server).
4. [Verify the Signature](#step-4-verify-the-signature).

### Step 1: Create an Order

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

#### Request Parameters

@include tpv/order-request-parameters

### Step 2: Initiate a Payment

/payments/create/upi

```curl: Request
  curl -u : \
  -X POST https://api.razorpay.com/v1/payments/create/upi \
  -H "Content-Type: application/json" \
  -d '{
    "amount": 100,
    "currency": "INR",
    "order_id": "order_Ee0biRtLOqzRjP",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "method": "upi",
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": {
      "purpose": "UPI test payment"
    },
    "upi": {
      "flow" : "intent"
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
paymentRequest.put("ip", "192.168.0.103");
paymentRequest.put("referer", "http");
paymentRequest.put("user_agent", "Mozilla/5.0");
paymentRequest.put("description", "Test flow");
JSONObject notes = new JSONObject();
notes.put("purpose", "UPI test payment");
JSONObject upi = new JSONObject();
upi.put("flow", "intent");
paymentRequest.put("notes", notes);
paymentRequest.put("upi", upi);

Payment payment = instance.payments.createUpi(paymentRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.createUpi({
    'amount': 100,
    'currency': 'INR',
    'order_id': 'order_Ee0biRtLOqzRjP',
    'email': 'gaurav.kumar@example.com',
    'contact': '9000090000',
    'method': 'upi',
    'ip': '192.168.0.103',
    'referer': 'http',
    'user_agent': 'Mozilla/5.0',
    'description': 'Test flow',
    'notes': {
        'purpose': 'UPI test payment
    '},
    'upi': {
        'flow': 'intent'
    },
})

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createUpi(array("amount" => 100,"currency" => "INR","order_id" => "order_Jhgp4wIVHQrg5H","email" => "gaurav.kumar@example.com","contact" => "9000090000","method" => "upi","customer_id" => "cust_EIW4T2etiweBmG","ip" => "192.168.0.103","referer" => "http","user_agent" => "Mozilla/5.0","description" => "Test flow","notes" => array("note_key" => "value1"),"upi" => array("flow" => "intent")));

```csharp: .NET
RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("amount",100);
paymentRequest.Add("currency","INR");
paymentRequest.Add("order_id", "order_Z6t7VFTb9xHeOs");
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "9000090000");
paymentRequest.Add("method", "upi");
paymentRequest.Add("ip", "192.168.0.103");
paymentRequest.Add("referer", "http");
paymentRequest.Add("user_agent", "Mozilla/5.0");
paymentRequest.Add("description", "Test flow");
Dictionary notes = new Dictionary();
notes.Add("purpose","UPI test payment");
Dictionary upi = new Dictionary();
upi.Add("flow","intent");
paymentRequest.Add("notes",notes);
paymentRequest.Add("upi",upi);

Payment payment = client.Payment.CreateUpi(paymentRequest);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
    "amount": 100,
    "currency": "INR",
    "order_id": "order_Ee0biRtLOqzRjP",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "method": "upi",
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": {
      "purpose": "UPI test payment"
    },
    "upi": {
      "flow": "intent"
    }
}

Razorpay::Payment.create_upi(para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createUpi({
    "amount": 100,
    "currency": "INR",
    "order_id": "order_Ee0biRtLOqzRjP",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "method": "upi",
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": {
        "purpose": "UPI test payment"
    },
    "upi": {
        "flow": "intent"
    }
});

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr: = map[string] interface {} {
    "amount": 100,
    "currency": "INR",
    "order_id": "order_Ee0biRtLOqzRjP",
    "email": "gaurav.kumar@example.com",
    "contact": "9000090000",
    "method": "upi",
    "ip": "192.168.0.103",
    "referer": "http",
    "user_agent": "Mozilla/5.0",
    "description": "Test flow",
    "notes": map[string] interface {} {
            "purpose": "UPI test payment",
        },
        "upi": map[string] interface {} {
            "flow": "intent",
        },
}
body, err: = client.Payment.CreateUpi(para_attr, nil)

``` json: Response
{
  "razorpay_payment_id": "pay_CMeM6XvOPGFiF",
  "link": "upi://pay?pa=success@razorpay&pn=xyz&tr=xxxxxxxxxxx&tn=gourav&am=1&cu=INR&mc=xyzw"
}
```

> **WARN**
>
> 
> **Do Not Make Changes to Link Received in Response**
> 
> Do not make changes to the link you receive in the response. This is the Razorpay Intent URL. Making changes to this URL can lead to payment failure or other unexpected errors with the payment.
> 

#### Request Parameters

Following are the request parameters for the API:

`amount` _mandatory_
: `integer` The amount associated with the payment in the smallest unit of the supported currency. For example, 2000 means ₹20.

`currency` _mandatory_
: `string` ISO code of the currency associated with the payment amount. In this case, it is `INR`.

`order_id` _mandatory_
: `string` Unique identifier of the order obtained from the response of the previous step.

`method` _mandatory_
: `string` The payment method used to make the payment. Possible values:
  - `netbanking`
  - `upi`

`notes` _optional_
: `json object` Key-value pair used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`description` _optional_
: `string` Descriptive text of the payment.

`contact` _mandatory_
: `string` Phone number of the customer.

`email` _mandatory_
: `string` Email address of the customer.

`callback_url` _optional_
: `string` URL where Razorpay will submit the final payment status.

`ip` _mandatory_
: `string` The client's browser IP address. For example, **117.217.74.98**

`referer` _mandatory_
: `string` Value of the `referer` header passed by the client's browser. For example, **https://example.com/**.

`user_agent` _mandatory_
: `string` Value of the `user_agent` header passed by client's browser. For example, **Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36**

`upi` _mandatory_
: Details of the UPI payment

  `flow`
  : `string` Type of the UPI method. In this case, it is `intent`.

You will get the UPI Intent URI as part of the payment response.

To pass the payment data to the respective UPI app and to initiate the payment, use the following code:

```js: Pass data to UPI app
Intent i = new Intent(Intent.ACTION_VIEW);
        i.setData(Uri.parse(url)); //uri from the create S2S payment response
        i.setPackage(packageName); //package name from the `upi://pay` intent response

activity.startActivityForResult(i,2561); //unique activity code to get the callback
```

### Step 3: Store Fields in Your Server

@include integration-steps/store-fields

### Step 4: Verify the Payment Signature

@include integration-steps/verify-signature

### Payment Capture Settings

@include integration-steps/capture-settings

### Related Information

@include integration-steps/related-info
