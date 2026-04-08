---
title: 3. Create Subsequent Payments
description: Create and charge subsequent payments using Razorpay APIs after the customer's selected payment method is successfully authorised.
---

# 3. Create Subsequent Payments

You should perform the following steps to create and charge your customer subsequent payments:

1. [Create an order to charge the customer](#31-create-an-order-to-charge-the-customer)
1. [Create a recurring payment](#32-create-a-recurring-payment)

## 3.1. Create an Order to Charge the Customer

You have to create a new order every time you want to charge your customers. This order is different from the one created during the authorisation transaction.

The following endpoint creates an order.

/orders

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notification":{ 
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 1000);
orderRequest.put("currency", "");
orderRequest.put("payment_capture", true);
orderRequest.put("receipt", "Receipt No. 1");
JSONObject notification = new JSONObject();
notification.put("token_id","token_M7K2eFBU7vToaQ");
notification.put("payment_after","1634057114");
orderRequest.put("notification", notification);
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
orderRequest.put("notes", notes);

Order order = razorpay.orders.create(orderRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array(
    'receipt' => '123',
    'amount' => 1000,
    'payment_capture' => true,
    'currency' => '',
    'notification' => array(
        'token_id' => 'token_M7K2eFBU7vToaQ',
        'payment_after' => '1634057114'
    ),
    'notes' => array(
        'key1' => 'value3',
        'key2' => 'value2'
    )
));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notification": {
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
    'amount': 1000,
    'currency': '',
    'payment_capture': True,
    'receipt': 'Receipt No. 1',
    'notification': {
        'token_id': 'token_M7K2eFBU7vToaQ',
        'payment_after': 1634057114
    },
    'notes': {
        'notes_key_1': 'Tea, Earl Grey, Hot',
        'notes_key_2': 'Tea, Earl Grey... decaf.'
    }
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 1000,
  "currency": "",
  "payment_capture": true,
  "receipt": "Receipt No. 1",
  "notification": {
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}

Razorpay::Order.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_S ECRET")

data:= map[string]interface{}{
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notification": map[string]interface{}{
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": map[string]interface{}{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf.",
  },
}
body, err := client.Order.Create(data, nil)
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 1000);
orderRequest.Add("currency", "");
orderRequest.Add("receipt", "receipt#12b");
orderRequest.Add("payment_capture", true);
Dictionary notification = new Dictionary();
notification.Add("token_id", "token_M7K2eFBU7vToaQ");
notification.Add("payment_after", "1634057114");
orderRequest.Add("notification", notification);
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
orderRequest.Add("notes", notes);

Order order = client.Order.Create(orderRequest);

```

```json: Success Response
{
   "id":"order_1Aa00000000002",
   "entity":"order",
   "amount":1000,
   "amount_paid":0,
   "amount_due":1000,
   "currency":"",
   "receipt":"Receipt No. 1",
   "offer_id":null,
   "status":"created",
   "attempts":0,
   "notes":{
      "notes_key_1":"Tea, Earl Grey, Hot",
      "notes_key_2":"Tea, Earl Grey… decaf."
   },
   "created_at":1579782776
}

```json: Failure Response
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"The id provided does not exist",
      "source":"business",
      "step":"payment_initiation",
      "reason":"input_validation_failed",
      "metadata":{
         
      }
   }
}
```

  
### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the minimum value is `100`, that is, .

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment.

`receipt` _optional_
: `string` A user-entered unique identifier for the order. For example, `Receipt No. 1`. You should map this parameter to the `order_id` sent by Razorpay.

`notes` _optional_
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.

`notification`
: `object` Details of the pre-debit notification. This object is optional. You should use it only if you want to control pre-debit notifications and debits. If you do not pass this object, we will automatically try to debit after 36 hours and 5 minutes.

    
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     The TAT to create a debit if you send a pre-debit notification is 36 hours and 5 minutes.
>     

    

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     We will not attempt any retry if the debit fails for tokens with the notification object in the created order. You should manually retry the debit attempt.
>     

    `token_id` _mandatory_
    : `string` The `token_id` generated when the customer successfully completes the authorisation payment. Different payment instruments for the same customer have different `token_id`.

    `payment_after` _optional_
    : `integer` UNIX timestamp post which the debit is supposed to happen. Defaults to 36 hours and 5 minutes after the pre-debit notification is delivered.

`payment_capture` _mandatory_
: `boolean` Determines whether the payment status should be changed to `captured` automatically or not. Possible values:
    - `true`: Payments are captured automatically.
    - `false`: Payments are not captured automatically. You can manually capture payments using the [Manually Capture Payments API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment).
    

    
### Response Parameters

         `id`
: `string` A unique identifier of the order created. For example `order_1Aa00000000001`.

`entity`
: `string` The entity that has been created. Here it is `order`.

`amount`
: `integer` Amount in currency subunits.

`amount_paid`
: `integer` The amount that has been paid.

`amount_due`
: `integer` The amount that is yet to be paid.

`currency`
: `string` The 3-letter ISO currency code for the payment.

`receipt`
: `string` A user-entered unique identifier of the order. For example, `rcptid #1`.

`notification`
: `object` Details of the pre-debit notification.

    `token_id`
    : `string` The `token_id` generated when the customer successfully completes the authorisation payment. Different payment instruments for the same customer have different `token_id`.

    `payment_after`
    : `integer` UNIX timestamp post which the debit is supposed to happen.

    `id`
    : `string` the unique identifier of the notification. For example, `notification_00000000000001`.

`status`
: `string` The status of the order.

`notes`
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` The Unix timestamp at which the order was created.
        

## 3.2. Create a Recurring Payment

Once you have generated an `order_id`, use it with the `token_id` to create a payment and charge the customer. The following endpoint creates a payment to charge the customer.

/payments/create/recurring

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/recurring \
-H "Content-Type: application/json" \
-d '{
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "+919876543210");
paymentRequest.put("amount", 1000);
paymentRequest.put("currency", "");
paymentRequest.put("order_id", "order_1Aa00000000002");
paymentRequest.put("customer_id", "cust_1Aa00000000001");
paymentRequest.put("token", "token_1Aa00000000001");
paymentRequest.put("recurring", true);
paymentRequest.put("description", "Creating recurring payment for Gaurav Kumar");
JSONObject notes = new JSONObject();
paymentRequest.put("notes_key_1","Tea, Earl Grey, Hot");
paymentRequest.put("notes_key_2","Tea, Earl Grey… decaf.");

Payment payment = razorpay.payments.createRecurringPayment(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createRecurring(array('email'=>'gaurav.kumar@example.com','contact'=>'+919876543210','amount'=>100,'currency'=>'','order_id'=>'order_1Aa00000000002','customer_id'=>'cust_1Aa00000000001','token'=>'token_1Aa00000000001','recurring'=>true,'description'=>'Creating recurring payment for Gaurav Kumar'));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createRecurringPayment({
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.createRecurring({
    'email': 'gaurav.kumar@example.com',
    'contact': +919876543210,
    'amount': 1000,
    'currency': '',
    'order_id': "order_1Aa00000000002",
    'customer_id': "cust_1Aa00000000001",
    'token': 'token_1Aa00000000001',
    'recurring': True,
    'description': 'Creating recurring payment for Gaurav Kumar',
    'notes': {'note_key 1': 'Beam me up Scotty',
              'note_key 2': 'Tea. Earl Gray. Hot.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}
Razorpay::Payment.create_recurring_payment(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": map[string]interface{}{
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot.",
  },
}
body, err := Client.Payment.CreateRecurringPayment(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "+919876543210");
paymentRequest.Add("amount", 1000);
paymentRequest.Add("currency", "");
paymentRequest.Add("order_id", "order_MZ35KPxZaqxfXq");
paymentRequest.Add("customer_id", "cust_KUyah9o60OPhfj");
paymentRequest.Add("token", "token_MZ37MsnhLNH4tN");
paymentRequest.Add("recurring", true);
paymentRequest.Add("description", "Creating recurring payment for Gaurav Kumar");
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
paymentRequest.Add("notes", notes);

Payment payment = client.Payment.CreateRecurringPayment(paymentRequest);
```

```json: Success Response
{
  "razorpay_payment_id" : "pay_1Aa00000000001"
}

```json: Failure Response
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"Amount exceeds maximum amount allowed",
      "source":"business",
      "step":"payment_initiation",
      "reason":"input_validation_failed",
      "metadata":{
         
      }
   }
}
```

  
### Request Parameters

     

`amount` _mandatory_
: `integer` The amount you want to charge your customer. This should be the same as the order amount.

`order_id`_mandatory_
: `string` The unique identifier of the order created. For example, `order_1Aa00000000002`.

`customer_id` _mandatory_
: `string` The unique identifier of the customer you want to charge. For example, `cust_1Aa00000000002`.

`token` _mandatory_
: `string` The `token_id` generated when the customer successfully completes the authorisation payment. Different payment instruments for the same customer have different `token_id`.

`recurring` _mandatory_
: `boolean` Determines whether recurring payment is enabled or not.
    - `true`: Recurring payment is enabled.
    - `false`: Recurring payment is not enabled.

`notes`_optional_
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.
    

    
### Response Parameter

`razorpay_payment_id`
: `string` The unique identifier of the payment that is created. For example, `pay_1Aa00000000001`.
        

    
### Error Response Parameters

         Given below is a list of possible errors you may face while creating a Recurring Payment.

Error [columWidth="30"] | Cause | Solution
---
pre_debit_notification_not_sent | This error occurs when a pre-debit notification is not sent and a debit attempt is made. | Make sure to send a pre-debit notification before an attempt.
---
BAD_REQUEST_MANDATE_PROMISED_DEBIT_DATE_NOT_HONOURED | This error occurs when you attempt a debit within 36 hours and 5 minutes of a notification being delivered. | You can only attempt a manual debit 36 hours and 5 minutes after the notification is delivered.
