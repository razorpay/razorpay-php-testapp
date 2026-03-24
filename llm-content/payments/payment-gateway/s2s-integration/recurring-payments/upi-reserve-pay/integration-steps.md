---
title: Integrate UPI Reserve Pay
description: Integrate UPI Reserve Pay (SBMD) APIs to block and debit funds using a single customer authorisation.
---

# Integrate UPI Reserve Pay

UPI Reserve Pay APIs use the single-block, multiple-debit (SBMD) framework to manage scheduled or recurring transactions. With a single customer authorisation, this system allows businesses to block a specific sum from the customer's account. This reserved fund can then be debited automatically multiple times, eliminating the need for further customer approvals and ensuring a smoother, more reliable payment flow.

**Example**

A customer using the Acme Quick Commerce app authorises a one-time UPI block of ₹2,000 for future purchases. When they place a ₹400 order on Monday and a ₹600 order on Wednesday, both amounts are automatically debited from that reserved fund. The customer never has to enter a PIN at checkout, making their repeat orders completely frictionless.

  - **Create the Authorisation Transaction**: Create customer, order and authorisation payment to block funds.

  - **Fetch the Token Details**: Retrieve the token_id needed to initiate subsequent payments.

  - **Create Subsequent Payments**: Debit from the blocked amount for customer purchases.

## Create an Authorisation Transaction

To create an authorisation transaction using the Razorpay APIs, you need to:

1. [Create a Customer](#11-create-a-customer)
2. [Create an Order](#12-create-an-order)
3. [Create Authorisation Payment](#13-create-an-authorisation-payment)

### 1.1 Create a Customer

Razorpay links recurring tokens to customers using a unique identifier generated through the Customer API.

The following endpoint creates a customer.

/customers

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/customers \
-H "Content-Type: application/json" \
-d '{
  "name": "",
  "email": "",
  "contact": "",
  "fail_existing": "0",
  "notes":{
    "note_key_1": "September",
    "note_key_2": "Make it so."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject customerRequest = new JSONObject();
customerRequest.put("name","");
customerRequest.put("contact","");
customerRequest.put("email","");
customerRequest.put("fail_existing", "0");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
customerRequest.put("notes",notes);

Customer customer = razorpay.customers.create(customerRequest);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.customer.create({
    'name': '',
    'email': '',
    'contact': '',
    'fail_existing': "0",
    'notes': {'note_key_1': 'September', 'note_key_2': 'Make it so.'}
    })

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
    "name": "",
    "contact": ,
    "email": "",
    "fail_existing": "0",
    "notes": map[string]interface{}{
        "notes_key_1": "Tea, Earl Grey, Hot",
        "notes_key_2": "Tea, Earl Grey… decaf.",
    },
}
body, err := client.Customer.Create(data, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->create(array('name' => '', 'email' => '','contact'=>'','fail_existing' => "0", 'notes'=> array('notes_key_1'=> 'Tea, Earl Grey, Hot','notes_key_2'=> 'Tea, Earl Grey… decaf'));
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();

options.Add("name", ""); 
options.Add("contact", ""); 
options.Add("email", ""); 
options.Add("fail_existing", "0"); 

Customer customer = Customer.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "name": "",
  "contact": "",
  "email": "",
  "fail_existing": "0",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}

Razorpay::Customer.create(para_attr)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.create({
  name: "",
  contact: "",
  email: "",
  fail_existing: "0",
  notes: {
    notes_key_1: "Tea, Earl Grey, Hot",
    notes_key_2: "Tea, Earl Grey… decaf."
  }
})
```

```json: Response
{
  "id":"cust_1Aa00000000001",
  "entity":"customer",
  "name":"",
  "email":"",
  "contact":"",
  "gstin":null,
  "notes":{
      "note_key_1":"September",
      "note_key_2":"Make it so."
  },
  "created_at ":1234567890
}
```

  
### Request Parameters

     @include recurring-payments/customer/api-req
    

  
### Response Parameters

`id`
: `string` Unique identifier of the customer. For example, `cust_1Aa00000000004`.

`entity` _optional_
: `string` Indicates the type of entity.

`name` 
: `string` Customer's name. Alphanumeric, with period (.), apostrophe ('), forward slash (/), at (@) and parentheses allowed. The name must be between 3-50 characters in length.

`contact`
: `string` The customer's phone number. A maximum length of 15 characters including country code.

`email`
: `string` The customer's email address. A maximum length of 64 characters.

`gstin`
: `string` GST number linked to the customer. For example, `29XAbbA4369J1PA`.

`notes`
: `json object` This is a key-value pair that can be used to store additional information about the entity. It can hold a maximum of 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` UNIX timestamp, when the customer was created. For example, `1234567890`.

    

### 1.2 Create an Order

@include recurring-payments/auth-order-api-intro-otm

@include recurring-payments/upi/order-code-sbmd

  
### Request Parameters

     @include recurring-payments/upi/order-req-otm-sbmd
    

  
### Response Parameters

`id`
: `string` The unique identifier of the order.

`amount`
: `integer` The amount for which the order was created, in currency subunits. 

`entity`
: `string` Name of the entity. Here, it is `order`.

`amount_paid`
: `integer` The amount paid against the order.

`amount_due`
: `integer` The amount pending against the order.

`currency`
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters.

`receipt`
: `string` Receipt number that corresponds to this order.

`status`
: `string` The status of the order. Possible values:
   - `created`: When you create an order it is in the `created` state. It stays in this state till a payment is attempted on it.
   - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
   - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` Indicates the Unix timestamp when this order was created.
    

### 1.3 Create an Authorisation Payment

Use this API endpoint to initiate UPI mandate authorisation via intent flow. This step creates a pending token. The customer approves the mandate in their TPAP app.

/v1/payments/create/json

```curl: Request
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
-d '{
  "amount": 200,
  "contact": "9123456780",
  "currency": "INR",
  "customer_id": "cust_RtNzXmWrRe0Edr",
  "email": "gaurav.kumar@example.com",  
  "method": "upi",
  "order_id": "order_RtP3VPM5YrzXr8",
  "recurring": true,
  "upi": {
    "flow": "intent"
  }
}'
```json: Success Response
{
  "razorpay_payment_id": "pay_RtP3bnk51QvOF9",
  "next": [
    {
      "action": "intent",
      "url": "upi://mandate?pa=vi228420.rzprec@rxairtel&pn=Big+Basket&mn=Create+Mandate&tid=AIRM2f050321dcb411f08f712aac9325bf5&validitystart=19122025&validityend=30122025&am=2.00&amrule=MAX&recur=ASPRESENTED&tr=RtP3bnk51QvOF90create1&url=&cu=INR&mc=4900&tn=MANDATE&orgid=180100&mode=04&purpose=77&txnType=CREATE&rev=N&block=Y"
    },
    {
      "action": "poll",
      "url": "https://api.razorpay.com/v1/payments/pay_RtP3bnk51QvOF9"
    }
  ]
}
```

  
### Request Parameters

`amount`
: `integer` The amount you want to charge your customer. This should be the same as the order amount. The maximum amount that can be blocked is ₹10,000.

`currency`
: `string` The 3-letter ISO currency code for the payment.

`order_id`
: `string` The unique identifier of the order created.

`customer_id`
: `string` The unique identifier of the customer you want to charge.

`upi.flow`
: `string` The UPI payment flow for the transaction. Here, the value must be `intent`.

`recurring`
: `string` Determines whether recurring payment is enabled or not.
    - `true`: Recurring payment is enabled.
    - `false`: Recurring payment is not enabled.

`contact`
: `string` The customer's phone number.

`email`
: `string` The customer's email address.

`notes`
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each.

`description`
: `string` A user-entered description for the payment.
    

  
### Success Response Parameters

`razorpay_payment_id`
: `string` The unique identifier of the payment created. For example, `pay_RtP3bnk51QvOF9`.

`next`
: `array` A list of action objects describing the next steps to complete the payment.

`next.action`
: `string` The type of action to perform. Possible values:
   - `intent`: Redirects the customer to their TPAP app to approve the mandate.
   - `poll`: Used to poll the payment status.

`next.url`
: `string` The URL corresponding to the action. For `intent`, this is a UPI deep link. For `poll`, this is the Razorpay API endpoint to check payment status.
    

  
### Error Response Parameters

@include recurring-payments/auth-payment-error-res-sbmd
    

## Fetch Tokens

In a Single Block Multiple Debit (SBMD) flow, the **Token** represents the unique mandate or authorisation.

Term | Description
---
Block | The customer authorises a specific amount (for example, ₹5,000) to be "blocked" in their bank account.
---
Debits | You (the business) can then make multiple smaller debits (for example, ₹500, then ₹1,200) against that blocked amount as services are delivered.
---
Token | This is the digital key that allows those subsequent debits to happen without the customer needing to enter their UPI PIN every single time.

You can retrieve the `token_id` using the Dashboard or the APIs given below.

### 2.1 Fetch Token by Customer id

@include recurring-payments/upi/token-by-customer-sbmd

  
### Path Parameter

    @include recurring-payments/fetch-token-cust-path-api
    

  
### Response Parameters

`entity`
: `string` The name of the entity. Here, it is `collection`.

`count`
: `integer` The total number of tokens returned in the response.

`items`
: `array` A list of token objects associated with the customer.

  `id`
  : `string` The unique identifier of the token. For example, `token_RtOSr9o9lZwv5C`.

  `entity`
  : `string` The name of the entity. Here, it is `token`.

  `token`
  : `string` The token value used to identify the mandate.

  `bank`
  : `string` The bank associated with the token. Returns `null` for UPI tokens.

  `wallet`
  : `string` The wallet associated with the token. Returns `null` for UPI tokens.

  `method`
  : `string` The payment method associated with the token. Here, it is `upi`.

  `vpa`
  : `json object` Details of the customer's UPI VPA linked to the token.

    `username`
    : `string` The username part of the customer's UPI 

    `handle`
    : `string` The handle (bank or PSP) part of the customer's UPI  For example, `upi`.

    `name`
    : `string` The account holder's name as registered with the bank. Returns `null` if not available.

    `status`
    : `string` The status of the  For example, `valid`. Returns `null` if not yet validated.

    `received_at`
    : `integer` Unix timestamp at which the VPA was received.

  `recurring`
  : `boolean` Indicates whether the token is enabled for recurring payments. Possible values: 
    - `true`: Token is enabled for recurring payments.
    - `false`: Token us not enabled for recurring payments.

  `recurring_details`
  : `json object` Details of the recurring mandate associated with the token.

    `status`
    : `string` The status of the recurring mandate. For example, `confirmed`.

    `failure_reason`
    : `string` The reason for mandate failure, if applicable. Returns `null` if there is no failure.

    `amount_blocked`
    : `integer` The amount blocked against the mandate, in currency subunits.

    `amount_debited`
    : `integer` The amount debited against the mandate so far, in currency subunits.

  `auth_type`
  : `string` The authentication type used. Returns `null` if not applicable.

  `mrn`
  : `string` The mandate reference number. Returns `null` if not yet assigned.

  `used_at`
  : `integer` Unix timestamp at which the token was last used. Returns `null` if unused.

  `created_at`
  : `integer` Unix timestamp at which the token was created.

  `start_time`
  : `integer` Unix timestamp at which the mandate validity begins.

  `notes`
  : `array` Key-value pairs used to store additional information. Returns an empty array if no notes are added.

  `error_description`
  : `string` Description of the error, if any. Returns `null` for successful mandates.

  `entity_id`
  : `string` The identifier of the entity linked to the token. Returns `null` if not applicable.

  `dcc_enabled`
  : `boolean` Indicates whether Dynamic Currency Conversion (DCC) is enabled. Possible values:
    - `true`: DCC is enabled.
    - `false`: DCC is not enabled.

  `max_amount`
  : `integer` The maximum amount that can be debited per transaction, in currency subunits.

  `expired_at`
  : `integer` Unix timestamp at which the token expires.
    

### 2.2 Fetch Token by Payment id

The following endpoint fetches the `token_id` using a `payment_id`.

/payments/:id

```cURL: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/payments/pay_1Aa00000000002

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String paymentId = "pay_1Aa00000000002";

Payment payment = razorpay.payments.fetch(paymentId)

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->fetch($paymentId);
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.fetch(paymentId)

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.fetch(paymentId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

paymentId = "pay_FHfAzEJ51k8NLj"

Razorpay::Payment.fetch(paymentId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Payment.Fetch("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string paymentid = "pay_FHfqtkRzWvxky4";

Payment payment = client.Payment.Fetch(paymentid);
```

```json: Response
{
  "id": "pay_RtP3bnk51QvOF9",
  "entity": "payment",
  "amount": 200,
  "currency": "INR",
  "status": "created",
  "order_id": "order_RtP3VPM5YrzXr8",
  "invoice_id": null,
  "international": false,
  "method": "upi",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": false,
  "description": null,
  "card_id": null,
  "bank": null,
  "wallet": null,
  "vpa": null,
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "customer_id": "cust_RtNzXmWrRe0Edr",
  "token_id": "token_RtP3bvcI7tle25",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  },
  "fee": null,
  "tax": null,
  "error_code": null,
  "error_description": null,
  "error_source": null,
  "error_step": null,
  "error_reason": null,
  "acquirer_data": {
    "rrn": null
  },
  "created_at": 1766132688,
  "upi": {
    "vpa": null,
    "flow": "intent"
  }
}
```

  
### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the payment whose details are to be fetched. For example, `pay_1Aa00000000002`.
    

  
### Response Parameters

`id`
: `string` The unique identifier of the payment. For example, `pay_RtP3bnk51QvOF9`.

`entity`
: `string` The name of the entity. Here, it is `payment`.

`amount`
: `integer` The payment amount in currency subunits.

`currency`
: `string` The ISO currency code for the payment. For example, `INR`.

`status`
: `string` The status of the payment.

`order_id`
: `string` The unique identifier of the order associated with the payment.

`invoice_id`
: `string` The unique identifier of the invoice associated with the payment. Returns `null` if not applicable.

`international`
: `boolean` Indicates whether the payment is an international transaction. Possible values: 
  - `true`: It is an international payment.
  - `false`: It is a domestic payment.

`method`
: `string` The payment method used. Here, it is `upi`.

`amount_refunded`
: `integer` The amount refunded for the payment, in currency subunits.

`refund_status`
: `string` The refund status of the payment. Returns `null` if no refund has been initiated.

`captured`
: `boolean` Indicates whether the payment has been captured. Possible values: 
  - `true`: It is captured.
  - `false`: It is not captured.

`description`
: `string` A description for the payment. Returns `null` if not provided.

`card_id`
: `string` The unique identifier of the card used for the payment. Returns `null` for UPI payments.

`bank`
: `string` The bank associated with the payment. Returns `null` for UPI payments.

`wallet`
: `string` The wallet used for the payment. Returns `null` for UPI payments.

`vpa`
: `string` The customer's virtual payment address (VPA). Returns `null` until the mandate is confirmed.

`email`
: `string` The customer's email address.

`contact`
: `string` The customer's phone number.

`customer_id`
: `string` The unique identifier of the customer.

`token_id`
: `string` The unique identifier of the token created for the recurring payment mandate.

`notes`
: `json object` Key-value pair used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters each.

`fee`
: `integer` The fee charged by Razorpay for the payment, in currency subunits. Returns `null` if not yet captured.

`tax`
: `integer` The tax charged on the Razorpay fee. Returns `null` if not yet captured.

`error_code`
: `string` The error code if the payment failed. Returns `null` for successful payments.

`error_description`
: `string` The description of the error. Returns `null` for successful payments.

`error_source`
: `string` The source of the error. Returns `null` for successful payments.

`error_step`
: `string` The step at which the error occurred. Returns `null` for successful payments.

`error_reason`
: `string` The reason for the error. Returns `null` for successful payments.

`acquirer_data`
: `json object` Acquirer-specific data for the payment.

`acquirer_data.rrn`
: `string` The retrieval reference number (RRN) assigned by the bank. Returns `null` until the payment is processed.

`created_at`
: `integer` Unix timestamp at which the payment was created.

`upi`
: `json object` UPI details.

    `vpa`
    : `string` The customer's UPI  Returns `null` until the mandate is confirmed.

    `flow`
    : `string` The UPI payment flow used. Here, it is `intent`.
    

> **INFO**
>
> 
> **Handy Tips**
> 
> You can also retrieve the `token_id` via the [payment.failed webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#payment-failed).
> 

  
### Path Parameters

    @include recurring-payments/fetch-token-pay-path-api
    

### 2.3 Fetch Token by Token id and Customer id

Use this API to fetch token details using `token_id` and `customer_id` as path parameters.

/v1/customers/:customer_id/tokens/:token_id

```curl: Request
curl -u : \
-X GET https://api.razorpay.com/v1/customers/cust_RtNzXmWrRe0Edr/tokens/token_RtOSr9o9lZwv5C
```json: Response
{
  "id": "token_RtOSr9o9lZwv5C",
  "entity": "token",
  "token": "9uZG3CE8KsVG9J",
  "bank": null,
  "wallet": null,
  "method": "upi",
  "vpa": {
    "username": "9876543210",
    "handle": "upi",
    "name": "GAURAV KUMAR",
    "status": "valid",
    "received_at": 1757596287
  },
  "recurring": true,
  "recurring_details": {
    "status": "confirmed",
    "failure_reason": "Mandate execution is completed.",
    "amount_blocked": 200,
    "amount_debited": 200
  },
  "auth_type": null,
  "mrn": null,
  "used_at": 1766131484,
  "created_at": 1766130600,
  "start_time": 1766130592,
  "notes": [],
  "error_description": null,
  "entity_id": null,
  "dcc_enabled": false,
  "max_amount": 200,
  "expired_at": 1767091469
}
```

  
### Path Parameters

`customer_id` _mandatory_
: `string` The unique identifier of the customer with whom the token is linked. For example, `cust_1Aa00000000002`.

`token_id` _mandatory_
: `string` The unique identifier of the token to be fetched. For example, `token_1Aa00000000001`.
    

  
### Response Parameters

`id`
: `string` The unique identifier of the token. For example, `token_RtOSr9o9lZwv5C`.

`entity`
: `string` The name of the entity. Here, it is `token`.

`token`
: `string` The token value used to identify the mandate.

`bank`
: `string` The bank associated with the token. Returns `null` for UPI tokens.

`wallet`
: `string` The wallet associated with the token. Returns `null` for UPI tokens.

`method`
: `string` The payment method associated with the token. Here, it is `upi`.

`vpa`
: `json object` Details of the customer's UPI VPA linked to the token.

  `username`
  : `string` The username part of the customer's UPI 

  `handle`
  : `string` The handle (bank or PSP) part of the customer's UPI  For example, `upi`.

  `name`
  : `string` The account holder's name as registered with the bank.

  `status`
  : `string` The status of the  For example, `valid`.

  `received_at`
  : `integer` Unix timestamp at which the VPA was received.

`recurring`
: `boolean` Indicates whether the token is enabled for recurring payments. Possible values: `true`, `false`.

`recurring_details`
: `json object` Details of the recurring mandate associated with the token.

  `status`
  : `string` The status of the recurring mandate. For example, `confirmed`.

  `failure_reason`
  : `string` The reason for mandate failure, if applicable.

  `amount_blocked`
  : `integer` The amount blocked against the mandate, in currency subunits.

  `amount_debited`
  : `integer` The amount debited against the mandate so far, in currency subunits.

`auth_type`
: `string` The authentication type used. Returns `null` if not applicable.

`mrn`
: `string` The mandate reference number. Returns `null` if not yet assigned.

`used_at`
: `integer` Unix timestamp at which the token was last used.

`created_at`
: `integer` Unix timestamp at which the token was created.

`start_time`
: `integer` Unix timestamp at which the mandate validity begins.

`notes`
: `array` Key-value pairs used to store additional information. Returns an empty array if no notes are added.

`error_description`
: `string` Description of the error, if any. Returns `null` for successful mandates.

`entity_id`
: `string` The identifier of the entity linked to the token. Returns `null` if not applicable.

`dcc_enabled`
: `boolean` Indicates whether Dynamic Currency Conversion (DCC) is enabled. Possible values:   
 - `true`: DCC is enabled.
 - `false`: DCC is not enabled.

`max_amount`
: `integer` The maximum amount that can be debited per transaction, in currency subunits.

`expired_at`
: `integer` Unix timestamp at which the token expires.
    

## Create Subsequent Payments

Once the initial amount block is authorised, you can execute debits against the mandate. For each debit, you need to:

1. [Create an Order](#31-create-an-order-to-charge-the-customer)
2. [Initiate a Payment](#32-initiate-a-payment)

> **INFO**
>
> 
> **Handy Tips**
> 
> Before initiating a debit, it is good practice to check the remaining funds available under the mandate to avoid payment failures. See [Track Mandate Funds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-reserve-pay/manage.md#track-mandate-funds).
> 

### 3.1 Create an Order to Charge the Customer

@include recurring-payments/subsequent-payments/order-otm

  
### Request Parameters

     @include recurring-payments/subsequent-payments/order-req
    

  
### Response Parameters

`id`
: `string` The unique identifier of the order. For example, `order_1Aa00000000002`.

`entity`
: `string` The name of the entity. Here, it is `order`.

`amount`
: `integer` The amount for which the order was created, in currency subunits. 

`amount_paid`
: `integer` The amount paid against the order, in currency subunits.

`amount_due`
: `integer` The amount pending against the order, in currency subunits.

`currency`
: `string` The ISO currency code for the order. For example, `INR`.

`receipt`
: `string` The receipt number corresponding to the order.

`offer_id`
: `string` The unique identifier of the offer applied to the order. Returns `null` if no offer is applied.

`status`
: `string` The status of the order.

`attempts`
: `integer` The number of payment attempts made against this order.

`notes`
: `json object` Key-value pairs used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters each.

`created_at`
: `integer` Unix timestamp at which the order was created.
    

### 3.2 Initiate a Payment

Use the following endpoint to create a payment against the blocked amount.

/v1/payments/create/json

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "order_id": "order_RtOeB96x8bofcC",
  "customer_id": "cust_RtNzXmWrRe0Edr",
  "token": "token_RtOSr9o9lZwv5C",
  "recurring": true,
  "contact": "9876543210",
  "email":"gaurav.kumar@example.com",
  "notes": {
    "note_key 1": "note_key",
    "note_key 2": "Beam me up Scotty"
  },
  "description": "Creating recurring payment for Gaurav Kumar"
}'
```json: Response
{
  "razorpay_payment_id": "pay_RuXyQHNgfGG1TR",
  "razorpay_order_id": "order_RuXyCmfRnPfWAE",
  "razorpay_signature":"cbb5a15f3fe520148a677f8c01c5c4dc69823d"
}
```

  
### Request Parameters

`amount`
: `integer` The amount you want to charge your customer. This should be the same as the order amount.

`currency`
: `string` The 3-letter ISO currency code for the payment.

`order_id`
: `string` The unique identifier of the order created.

`customer_id`
: `string` The unique identifier of the customer you want to charge.

`token`
: `string` The `token_id` generated when the customer successfully completes the authorisation payment.

`recurring`
: `string` Determines whether recurring payment is enabled or not.
    - `true`: Recurring payment is enabled.
    - `false`: Recurring payment is not enabled.

`contact`
: `string` The customer's phone number.

`email`
: `string` The customer's email address.

`notes`
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each.

`description`
: `string` A user-entered description for the payment.
    

  
### Response Parameters

`razorpay_payment_id`
: `string` Unique identifier of the payment.

`razorpay_order_id`
: `string` Unique identifier of the order.

`razorpay_signature`
: `string` Signature generated for the payment.
