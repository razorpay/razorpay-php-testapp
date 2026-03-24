---
title: 1. Create the Authorisation Transaction
description: Create an authorisation transaction for cards using Razorpay APIs.
---

# 1. Create the Authorisation Transaction

You can create an authorisation transaction using the [Razorpay APIs](#11-using-razorpay-apis) or [Registration Link](#12-using-a-registration-link).

> **INFO**
>
> 
> **Handy Tips**
> 
> Bank downtime can affect success rates when processing recurring payments via debit cards.
> 

## 1.1. Using Razorpay APIs

To create an authorisation transaction using the Razorpay APIs, you need to:

1. [Create a Customer](#111-create-a-customer).
2. [Create an Order](#112-create-an-order).
3. [Create Authorisation Payment using Razorpay APIs](#113-create-an-authorisation-payment).

### 1.1.1. Create a Customer

> **INFO**
>
> 
> **Token Sharing for Partner Auth Model**
> 
> If you are a Razorpay Partner, who wants to use this API via Partner Auth, you must ensure the following:
> - Add the basic auth with partner credentials (client_id and client_secret).
> - Add the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. For example, -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
> 
> ```curl: Request
> curl -X POST https://api.razorpay.com/v1/customers \
> -u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
> -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
> ```
> 

Razorpay links recurring tokens to customers using a unique identifier generated through the Customer API.

You can create [customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) with basic information such as `email` and `contact` and use them for various Razorpay offerings. The following endpoint creates a customer.

/customers

  
### Sample Code

     
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

     `name`
: `string` The name of the customer. For example, `Gaurav Kumar`.

`email`
: `string` The email address of the customer. For example, `gaurav.kumar@example.com`.

`contact`
: `string` The phone number of the customer. For example, `9876543210`.

`fail_existing` _optional_
: `string` The request throws an exception by default if a customer with the exact details already exists. You can pass an additional parameter `fail_existing` to get the existing customer's details in the response. Possible values:
     - `1` (default): If a customer with the same details already exists, throws an error.
     - `0`: If a customer with the same details already exists, fetches details of the existing customer.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
    

    
### Response Parameters

         `id`
: `string` The unique identifier of the customer. For example `cust_1Aa00000000001`.

`entity`
: `string` The name of the entity. Here, it is `customer`.

`name`
: `string` The name of the customer. For example, `Gaurav Kumar`.

`email`
: `string` The email address of the customer. For example, `gaurav.kumar@example.com`.

`contact`
: `string` The phone number of the customer. For example, `9876543210`.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` A Unix timestamp, at which the customer was created.

You can create an order once you create a customer for the payment authorisation. 
        

### 1.1.2. Create an Order

Use the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md) to create a unique Razorpay `order_id` that is associated with the authorisation transaction. The following endpoint creates an order.

/orders

> **INFO**
>
> 
> **Token Sharing for Partner Auth Model**
> 
> If you are a Razorpay Partner, who wants to use this API via Partner Auth, you must ensure the following:
> - Add the basic auth with partner credentials (client_id and client_secret).
> - Add the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. For example, -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
> 
> ```curl: Request
> curl -X POST https://api.razorpay.com/v1/orders \
> -u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
> -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
> ```
> 
> 

```cURL: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
   "amount":100,
   "currency":"",
   "customer_id":"cust_4xbQrmEoA5WJ01",
   "method":"card",
   "token": {
    "max_amount": 1000000,
    "expire_at": 2709971120,
    "frequency": "monthly"
  },
   "receipt":"Receipt No. 1",
   "notes":{
      "notes_key_1":"Tea, Earl Grey, Hot",
      "notes_key_2":"Tea, Earl Grey... decaf."
   }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 100);
orderRequest.put("currency", "");
orderRequest.put("customer_id", "cust_4xbQrmEoA5WJ01");
orderRequest.put("method", "card");
JSONObject token = new JSONObject();
token.put("max_amount","100000000"); 
token.put("expire_at","2709971120");
token.put("frequency","monthly");
orderRequest.put("token", token);
orderRequest.put("receipt", "receipt#1");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
orderRequest.put("notes", notes);

Order order = razorpay.orders.create(orderRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 100, 'currency' => '',  'receipt' => '123', 'customer_id'=> $customerId, 'method'=>'card', 'token' => array('max_amount' => 100000000, 'expire_at' => 2709971120, 'frequency' => 'monthly'), 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
   "amount":100,
   "currency":"",
   "customer_id":"cust_4xbQrmEoA5WJ01",
   "method":"card",
   "token": {
    "max_amount": 1000000,
    "expire_at": 4102444799,
    "frequency": "monthly"
   },
   "receipt":"Receipt No. 1",
   "notes":{
      "notes_key_1":"Tea, Earl Grey, Hot",
      "notes_key_2":"Tea, Earl Grey... decaf."
   }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
    'amount': 50000,
    'currency': '',
    'customer_id': 'cust_4xbQrmEoA5WJ01',
    'method': 'card',
    'token':{
      'max_amount': 100000000,
      'expire_at': 4102444799,
      'frequency': 'monthly'
   },
    'receipt': 'receipt#1',
    'notes': {'key1': 'value3', 'key2': 'value2'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

param_attr = {
   "amount":100,
   "currency": "",
   "customer_id": "cust_4xbQrmEoA5WJ01",
   "method": "card",
   "token": {
    "max_amount": 1000000,
    "expire_at": 4102444799,
    "frequency": "monthly"
   },
   "receipt": "Receipt No. 1",
   "notes":{
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey... decaf."
   }
}

Razorpay::Order.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
   "amount":100,
   "currency":"",
   "customer_id":"",
   "method":"card",
   "token":map[string]interface{}{
    "max_amount": 1000000,
    "expire_at": 4102444799,
    "frequency": "monthly"
   },
   "receipt":"Receipt No. 1",
   "notes":map[string]interface{}{
      "notes_key_1":"Tea, Earl Grey, Hot",
      "notes_key_2":"Tea, Earl Grey... decaf.",
   },
}
body, err := client.Order.Create(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 100);
orderRequest.Add("currency", "");
orderRequest.Add("customer_id", "cust_Z6t7VFTb9xHeOs");
orderRequest.Add("method", "card");
Dictionary token = new Dictionary();
token.Add("max_amount", "5000");
token.Add("expire_at", "2709971120");
token.Add("frequency", "monthly");
orderRequest.Add("token", token);
orderRequest.Add("receipt", "receipt#176");
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
orderRequest.Add("notes", notes);

Order order = client.Order.Create(orderRequest);
```

```json: Response
{
   "id":"order_1Aa00000000002",
   "entity":"order",
   "amount":100,
   "amount_paid":0,
   "amount_due":100,
   "currency":"",
   "receipt":"Receipt No. 1",
   "method":"card",
   "description":null,
   "customer_id":"cust_4xbQrmEoA5WJ01",
   "offer_id":null,
   "status":"created",
   "attempts":0,
   "notes":{
      "notes_key_1":"Tea, Earl Grey, Hot",
      "notes_key_2":"Tea, Earl Grey… decaf."
   },
   "created_at":1565172642
}
```

    
### Request Parameters

         `amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the amount should be `100`, that is, .

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. 

`customer_id` _mandatory_
: `string` The unique identifier of the customer. For example, `cust_4xbQrmEoA5WJ01`.

`method` _optional_
: `string` Payment method used to make the authorisation transaction. Here, it is `card`.

`token`
: `object` Details related to the authorisation such as max amount, frequency and expiry information.

    `max_amount` _mandatory_
    : `integer` The maximum amount that can be auto-debited in a single charge. The minimum value is `100`, that is, , and the maximum value is `1500000`, that is, . For an amount higher than this, the cardholder should provide an Additional Factor of Authentication (AFA) as per RBI guidelines.

    `expire_at` _mandatory_
    : `integer` The Unix timestamp that indicates when the authorisation transaction must expire. The card's expiry year is considered a default value.

    `frequency` _mandatory_
    : `string` The frequency at which you can charge your customer. Possible values:
        - `weekly`
        - `monthly`
        - `yearly`
        - `as_presented`

, that is, . For an amount higher than this, the cardholder should provide an Additional Factor of Authentication (AFA) as per RBI guidelines.

    `expire_at` _mandatory_
    : `integer` The Unix timestamp that indicates when the authorisation transaction must expire. The card's expiry year is considered a default value.

    `frequency` _mandatory_
    : `string` The frequency at which you can charge your customer. Possible values:
        - `weekly`
        - `monthly`
        - `yearly`
        - `as_presented`

`receipt` _optional_
: `string` A user-entered unique identifier for the order. For example, `Receipt No. 1`. You should map this parameter to the `order_id` sent by Razorpay.

`notes`_optional_
: `object` Key-value pair you can use to store additional information about the entity. Maximum 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.
        

    
### Response Parameters

         `id`
: `string` A unique identifier of the order created. For example `order_1Aa00000000002`.

`entity`
: `string` The entity that has been created. Here it is `order`.

`amount`
: `integer` Amount in currency subunits. For cards, the amount should be `100`, that is, .

`amount_paid`
: `integer` The amount that has been paid.

`amount_due`
: `integer` The amount that is yet to pay.

`currency`
: `string` The 3-letter ISO currency code for the payment. 

`receipt`
: `string` A user-entered unique identifier of the order. For example, `Receipt No. 1`. You should map this parameter to the `order_id` sent by Razorpay.

`method`
: `string` Payment method used to make the authorisation transaction. Here, it is `card`.

`customer_id`
: `string` The unique identifier of the customer. For example, `cust_4xbQrmEoA5WJ01`.

`status`
: `string` The status of the order.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` The Unix timestamp at which the order was created.

You can create a payment against the `order_id` after you create an order.
        

### 1.1.3. Create an Authorisation Payment

Once an order is created, your next step is to create a payment. Use the below endpoint to create a payment with payment method `card`.

> **INFO**
>
> 
> **Token Sharing for Partner Auth Model**
> 
> If you are a Razorpay Partner, who wants to use this API via Partner Auth, you must ensure the following:
> - Add the basic auth with partner credentials (client_id and client_secret).
> - Add the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. For example, -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
> 
> ```curl: Request
> curl -X POST https://api.razorpay.com/v1/create/json \
> -u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
> -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
> ```
> 
> 

/payments/create/json

```curl: Request
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
 -d '{
  "amount": "100",
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_4xbQrmEoA5WJ01",
  "recurring": true,
  "save": 1,
  "email": "",
  "contact": "",
  "method": "card",
  "card": {
    "number": "4854980604708430",
    "cvv": "",
    "expiry_month": "12",
    "expiry_year": "30",
    "name": ""
  }
}'

```json: Response
{
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/FVmAtLUe9XZSGM/authorize"
    },
    {
      "action": "otp_generate",
      "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate?track_id=FVmAtLUe9XZSGM&key_id="
    }
  ]
}
```

> **INFO**
>
> 
> **Handy Tips**
> 
> - To process recurring transactions, customer card details will need to be secured/tokenised in accordance with the applicable laws. You will be solely responsible for obtaining informed consent from customers for the processing of emandates and such consent shall be explicit and not by way of a forced/default/automatic selection of check box, radio button etc.
> - When the merchant is  sharing `recurring: true` or `preferred`, it is for tokenising the card as per applicable rules for recurring mandate creation.
>  If such consent is not shared during the payment flow, then Razorpay will not tokenise the card or process the emandate/ recurring transaction.
> 

  
### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the minimum value is `100`, that is, .

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment.

`order_id` _mandatory_
: `string` The unique identifier of the order created in [Step 1.1.2.: Create an Order](#112-create-an-order).

`customer_id` _mandatory_
: `string` The unique identifier of the customer.

`recurring` _mandatory_
: `boolean` Possible values:
    - `true`: Recurring payment is enabled.
    - `false`: Recurring payment is not enabled.
   
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>      The `recurring` parameter also supports the value `preferred`. Use this when you want to support recurring payments and one-time payment in the same flow.
>     

`save` _mandatory_
: `integer` Saves the customer's card details. Possible values:
    - `1`: Saves the card details.
    - `0`: Does not save the card details.

    
`email` _mandatory_
: `string` The customer's email address.

`contact` _mandatory_
: `string` The customer's contact number.

`method` _mandatory_
: `string` The payment method selected by the customer. Here, the value must be `card`.

`card`
: `object` The attributes associated with a card.

    `number` _mandatory_
    : `integer` Unformatted card number. This field is required if value of `method` is `card`. Use one of our [test cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md) to try out the payment flow.

    `name` _mandatory_
    : `string` The name of the cardholder.

    `expiry_month` _mandatory_
    : `integer` The expiry month of the card in `MM` format. For example, `01` for January and `12` for December.

    `expiry_year` _mandatory_
    : `integer` Expiry year for card in the `YY` format. For example, 2030 will be in format `30`.

    `cvv` _mandatory_
    : `integer` CVV printed on the back of the card.
        
        
> **INFO**
>
> 
>         **Handy Tips**
>           - CVV is not required by default for tokenised cards across all networks.
>           - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>           - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>           - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>           - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.          
>         

        
    

  
### Response Parameters

     If the payment request is valid, the response contains the following fields. Refer to the [S2S Json V2 integration document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md#step-2-create-a-payment) for more details.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. Possible values:
      - `otp_generate` - Use this URL to allow the customer to generate OTP and complete the payment on your webpage.
      - `redirect` - Use this URL to redirect the customer to submit the OTP on the bank page.

    `url`
    : `string` URL to be used for the action indicated.
    

After this step, you can proceed to integrate with the [Fetch Token API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/cards/tokens.md).

## 1.2. Using a Registration Link

Registration Links are an alternate way of creating an authorisation transaction. If you create a registration link, you need not create a customer or an order.

When you create a registration link, an [invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) is automatically issued to the customer. The customer can use the invoice to make the Authorisation Payment.

Know how to [create Registration Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md) using the Dashboard.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can use webhooks to get notifications about successful payments against a registration link. Know more about [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-authorization-link-status-using-webhooks).
> 

A registration link must always have the amount (in currency subunits) that the customer will be charged when making the authorisation payment. For cards, the amount must be a minimum of .

### 1.2.1. Create a Registration Link

The following endpoint creates a registration link.

/subscription_registration/auth_links

```curl: Curl
curl -u :
-X POST https://api.razorpay.com/v1/subscription_registration/auth_links
-H "Content-Type: application/json" \
-d '{
  "customer":{
    "name":"",
    "email":"",
    "contact":""
  },
  "type":"link",
  "amount":"100",
  "currency":"",
  "description":"Registration Link for ",
  "subscription_registration":{
    "method":"card",
    "max_amount":"1000000",
    "expire_at":1609423824,
    "frequency": "monthly"
  },
  "receipt":"Receipt No. 1",
  "email_notify": true,
  "sms_notify": true,
  "expire_by":1580479824,
  "notes":{
    "note_key 1":"Beam me up Scotty",
    "note_key 2":"Tea. Earl Gray. Hot."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject registrationLinkRequest = new JSONObject();
JSONObject customer = new JSONObject();
customer.put("name","");
customer.put("email","");
customer.put("contact","");
registrationLinkRequest.put("customer", customer);
registrationLinkRequest.put("type", "link");
registrationLinkRequest.put("amount", 100);
registrationLinkRequest.put("currency", "");
registrationLinkRequest.put("description", "Registration Link for ");
JSONObject subscriptionRegistration = new JSONObject();
subscriptionRegistration.put("method","card");
subscriptionRegistration.put("max_amount",1000000);
subscriptionRegistration.put("expire_at",1609423824);
subscriptionRegistration.put("frequency","monthly");
registrationLinkRequest.put("subscription_registration", subscriptionRegistration);
registrationLinkRequest.put("receipt", "Receipt No. 1");
registrationLinkRequest.put("email_notify", true);
registrationLinkRequest.put("sms_notify", true);
registrationLinkRequest.put("expire_by", 1580479824);
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
registrationLinkRequest.put("notes", notes);

Invoice invoice = razorpay.invoices.createRegistrationLink(registrationLinkRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->subscription->createSubscriptionRegistration(array('customer'=>array('name'=>'','email'=>'','contact'=>''),'type'=>'link','amount'=>100,'currency'=>'','description'=>'Registration Link for ','subscription_registration'=>array('method'=>'card','max_amount'=>'1000000','expire_at'=>'1634215992','frequency'=>'monthly'),'receipt'=>'Receipt No. 5','email_notify'=> true,'sms_notify'=>true,'expire_by'=>1634215992, 'notes'=> array('note_key 1'=> 'Beam me up Scotty','note_key 2'=> 'Tea. Earl Gray. Hot.')));
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.subscriptions.createRegistrationLink({
  customer: {
    name: "",
    email: "",
    contact: ""
  },
  type: "link",
  amount: 100,
  currency: "",
  description: "Registration Link for ",
  subscription_registration: {
    method: "card",
    max_amount: 1000000,
    expire_at: 1609423824,
    frequency: "monthly"
  },
  receipt: "Receipt No. 1",
  email_notify: true,
  sms_notify: true,
  expire_by: 1580479824,
  notes: {
    notes_key_1: "Tea, Earl Grey, Hot",
    notes_key_2: "Tea, Earl Grey... decaf."
  }
})
```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.registration_link.create({
    'customer': {'name': '',
                 'email': '',
                 'contact': ''},
    'type': 'link',
    'amount': '100',
    'currency': '',
    'description': 'Registration Link for Gaurav',
    'subscription_registration': {'method': 'card', 'max_amount': '1000000'
                                  , 'expire_at': 1644737663, 'frequency': 'monthly'},
    'receipt': 'Receipt No. #11',
    'email_notify': True,
    'sms_notify': True,
    'expire_by': 1644737663,
    'notes': {'note_key 1': 'Beam me up Scotty',
              'note_key 2': 'Tea. Earl Gray. Hot.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "customer":{
    "name": "",
    "email": "",
    "contact": ""
  },
  "type": "link",
  "amount": "100",
  "currency": "",
  "description": "Registration Link for ",
  "subscription_registration":{
    "method": "card",
    "max_amount": "1000000",
    "expire_at": 1609423824,
    "frequency": "monthly"
  },
  "receipt": "Receipt No. 1",
  "email_notify": true,
  "sms_notify": true,
  "expire_by":1580479824,
  "notes":{
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}

Razorpay::SubscriptionRegistration.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "customer":map[string]interface{}{
    "name":"",
    "email":"",
    "contact":"",
  },
  "type":"link",
  "amount":"100",
  "currency":"",
  "description":"Registration Link for ",
  "subscription_registration":map[string]interface{}{
    "method":"card",
    "max_amount":"1000000",
    "expire_at":1609423824,
    "frequency": "monthly"
  },
  "receipt":"Receipt No. 1",
  "email_notify": true,
  "sms_notify": true,
  "expire_by":1681987284,
  "notes":map[string]interface{}{
    "note_key 1":"Beam me up Scotty",
    "note_key 2":"Tea. Earl Gray. Hot.",
  },
}

body, err := client.Invoice.CreateRegistrationLink(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary registrationLinkRequest = new Dictionary();
Dictionary customer = new Dictionary();
customer.Add("name", "");
customer.Add("email", "");
customer.Add("contact", "");
registrationLinkRequest.Add("customer", customer);
registrationLinkRequest.Add("type", "link");
registrationLinkRequest.Add("amount", 100);
registrationLinkRequest.Add("currency", "");
registrationLinkRequest.Add("description", "Registration Link for ");
Dictionary subscriptionRegistration = new Dictionary();
subscriptionRegistration.Add("method", "card");
subscriptionRegistration.Add("max_amount", 1000000);
subscriptionRegistration.Add("expire_at", 1609423824);
registrationLinkRequest.Add("subscription_registration", subscriptionRegistration);
registrationLinkRequest.Add("receipt", "Receipt No. #18d");
registrationLinkRequest.Add("email_notify", true);
registrationLinkRequest.Add("sms_notify", true);
registrationLinkRequest.Add("expire_by", 1580479824);
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
registrationLinkRequest.Add("notes", notes);

Invoice invoice = client.Invoice.CreateRegistrationLink(registrationLinkRequest);
```

```json: Response
{
  "id": "inv_FHrXGIpd3N17DX",
  "entity": "invoice",
  "receipt": "Receipt No. 24",
  "invoice_number": "Receipt No. 24",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "",
    "email": "",
    "contact": "",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "",
    "customer_email": "",
    "customer_contact": ""
  },
  "order_id": "order_FHrXGJNngJyEAe",
  "line_items": [],
  "payment_id": null,
  "status": "issued",
  "expire_by": 4102444799,
  "issued_at": 1595491014,
  "paid_at": null,
  "cancelled_at": null,
  "expired_at": null,
  "sms_status": "pending",
  "email_status": "pending",
  "date": 1595491014,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 100,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 100,
  "amount_paid": 0,
  "amount_due": 100,
  "currency": "",
  "currency_symbol": "₹",
  "description": "Registration Link for ",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/VSriCfn",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491014,
  "idempotency_key": null
}
```

  
### Request Parameters

     `customer`
: `object` Details of the customer to whom the registration link is sent.

    `name` _mandatory_
    : `string` Customer's name.

    `email` _mandatory_
    : `string` Customer's email address.

    `contact`_mandatory_
    : `integer` Customer's contact number.

`type` _mandatory_
: `string` In this case, the value is `link`.

`amount` _mandatory_
: `integer` The payment amount in the smallest currency sub-unit.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment.

`description` _mandatory_
: `string` A description that appears on the hosted page.

     `subscription_registration`
: `object` Details of the authorisation transaction.

  `method` _mandatory_
  : `string` The authorisation method. Here it is `card`.

  `max_amount` _mandatory_
  : `integer` The maximum amount that can be auto-debited in a single charge. The minimum value is `100` (₹1) and the maximum value is `100000000` (₹10,00,000). For an amount higher than this or the RBI limit of ₹15,000 (`1500000`) or ₹1,00,000 (`10000000`) respectively, the cardholder should provide an Additional Factor of Authentication (AFA) as per RBI guidelines.

  `expire_at` _optional_
  : `integer` The Unix timestamp till when you can use the token (authorisation on the payment method) to charge the customer subsequent payments. The card's expiry year is considered a default value.

  `frequency` _mandatory_
  : `string` The frequency at which you can charge your customer. Possible values:
    - `weekly`
    - `monthly`
    - `yearly`
    - `as_presented`

     `sms_notify` _optional_
: `boolean` Indicates if SMS notifications are to be sent by Razorpay. Possible values:
    - `true` (default): Notifications are sent by Razorpay .
    - `false`: Notifications are not sent by Razorpay.

`email_notify` _optional_
: `boolean` Indicates if email notifications are to be sent by Razorpay. Possible values:
    - `true` (default): Notifications are sent by Razorpay .
    - `false`: Notifications are not sent by Razorpay.

`expire_by` _optional_
: `integer` The Unix timestamp indicates the expiry of the registration link.

`receipt` _optional_
: `string` A unique identifier entered by you for the order. For example, `Receipt No. 1`. You should map this parameter to the `order_id` sent by Razorpay.

`notes` _optional_
: `object` This is a key-value pair that is used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
    

    
### Response Parameters

         `id`
: `string` The unique identifier of the invoice.

`entity`
: `string` The entity that has been created. Here, it is `invoice`.

`receipt`
: `string` A user-entered unique identifier of the invoice.

`invoice_number`
: `string` Unique number you added for internal reference.

`customer_id`
: `string` The unique identifier of the customer. For example, `cust_BMB3EwbqnqZ2EI`.

`customer_details`
: `object` Details of the customer.

    `id`
    : `string` The unique identifier associated with the customer to whom the invoice has been issued.

    `name`
    : `string` The customer's name.

    `email`
    : `string` The customer's email address.

    `contact`
    : `integer` The customer's phone number.

    `billing_address`
    : `string` Details of the customer's billing address.

    `shipping_address`
    : `string` Details of the customer's shipping address.

`order_id`
: `string` The unique identifier of the order associated with the invoice.

`line_items`
: `string` Details of the line item that is billed in the invoice. Maximum of 50 line items are allowed.

`payment_id`
: `string` Unique identifier of a payment made against the invoice.

`status`
: `string` The status of the invoice. Possible values:
    - `draft`
    - `issued`
    - `partially_paid`
    - `paid`
    - `cancelled`
    - `expired`
    - `deleted`

`expire_by`
: `integer` The Unix timestamp at which the invoice will expire.

`issued_at`
: `integer` The Unix timestamp at which the invoice was issued to the customer.

`paid_at`
: `integer` The Unix timestamp at which the payment was made.

`cancelled_at`
: `integer` The Unix timestamp at which the invoice was cancelled.

`expired_at`
: `integer` The Unix timestamp at which the invoice expired.

`sms_status`
: `string` The delivery status of the SMS notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`email_status`
: `string` The delivery status of the email notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`date`
: `integer` Timestamp, in Unix format, that indicates the issue date of the invoice.

`terms`
: `string` Any terms to be included in the invoice. Maximum of 2048 characters.

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment on the invoice. Possible values:
  - `true`:  The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`amount`
: `integer` Amount to be paid using the invoice. Must be in the smallest unit of the currency. For example, if the amount to be received from the customer is , pass the value as `29995`.

`amount_paid`
: `integer` Amount paid by the customer against the invoice.

`amount_due`
: `integer` The remaining amount to be paid by the customer for the issued invoice.

`currency`
: `string` The currency associated with the invoice.

`description`
: `string`  A brief description of the invoice.

`notes`
: `object` Any custom notes added to the invoice. Maximum of 2048 characters.

`short_url`
: `string` The short URL that is generated. This is the link that can be shared with the customer to receive payments.

`type`
: `string` Here, it is `invoice`.

`comment`
: `string` Any comments to be added in the invoice. Maximum of 2048 characters.
        

### 1.2.2. Send/Resend Notifications

The following endpoint sends/resends notifications with the short URL to the customer:

/invoices/:id/notify_by/:medium

  
### Sample Code

     ```cURL: Curl
      curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
      -X POST https://api.razorpay.com/v1/invoices/inv_1Aa00000000001/notify_by/sms

      ```java: Java
      RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

      String invoiceId = "inv_1Aa00000000001";

      String medium = "sms";

      Invoice invoice = razorpay.invoices.notifyBy(invoiceId, medium);

      ```php: PHP
      $api = new Api($key_id, $secret);

      $api->invoice->fetch($invoiceId)->notify($medium);

      ```javascript: Node.js
      var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

      instance.invoices.notifyBy(invoiceId, medium)

      ```python: Python
      client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

      client.invoice.notify_by(invoiceId, medium)

      ```ruby: Ruby
      require "razorpay"
      Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

      invoiceId = "inv_JDdNb4xdf4gxQ7"

      medium = "email" 

      Razorpay::Invoice.notify_by(invoiceId, medium)

      ```go: Go
      import ( razorpay "github.com/razorpay/razorpay-go" )
      client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

      body, err := client.Invoice.Notify("", "", nil, nil)

      ```csharp: .NET
      RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

      string invoiceId = "inv_Z6t7VFTb9xHeOs";

      string medium = "sms";

      Invoice invoice = client.Invoice.Fetch(invoiceId).NotifyBy(medium);
      ```

      ```json: Response
      {
        "success": true
      }
      ```
    

    
### Path Parameters

         `id`_mandatory_
: `string` The unique identifier of the invoice linked to the registration link for which you want to send the notification. For example, `inv_1Aa00000000001`.

`medium` _mandatory_
: `string` Determines through which medium you want to resend the notification. Possible values:
        - `sms`
        - `email`
        

    
### Response Parameter

`success`
: `boolean` Indicates whether the notifications were sent successfully. Possible values:
        - `true`: The notifications were successfully sent via SMS, email or both.
        - `false`: The notifications were not sent.
        

### 1.2.3. Cancel a Registration Link

The following endpoint cancels a registration link.

/invoices/:id/cancel

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> You can only cancel registration link in the `issued` state.
> 

  
### Sample Code

     ```cURL: Curl
      curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
      -X POST https://api.razorpay.com/v1/invoices/inv_1Aa00000000001/cancel

      ```java: Java
      RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

      String invoiceId = "inv_1Aa00000000001";

      Invoice invoice = razorpay.invoices.cancel(invoiceId);

      ```php:PHP
      $api = new Api($key_id, $secret);

      $api->invoice->fetch($invoiceId)->cancel();
      ```javascript: Node.js
      var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

      instance.invoices.cancel(invoiceId)

      ```python: Python
      client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

      client.invoice.cancel(invoiceId)

      ```ruby: Ruby
      require "razorpay"
      Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

      invoiceId = "inv_1Aa00000000001"

      Razorpay::Invoice.cancel(invoiceId)

      ```go: Go
      import ( razorpay "github.com/razorpay/razorpay-go" )
      client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

      body, err := client.Invoice.Cancel("", nil, nil)

      ```csharp: .NET
      RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

      string invoiceId = "inv_Z6t7VFTb9xHeOs";

      Invoice invoice = client.Invoice.Fetch(invoiceId).Cancel();
      ```

      

      ```json: Response
      {
        "id": "inv_FHrfRupD2ouKIt",
        "entity": "invoice",
        "receipt": "Receipt No. 1",
        "invoice_number": "Receipt No. 1",
        "customer_id": "cust_BMB3EwbqnqZ2EI",
        "customer_details": {
            "id": "cust_BMB3EwbqnqZ2EI",
            "name": "",
            "email": "",
            "contact": "",
            "gstin": null,
            "billing_address": null,
            "shipping_address": null,
            "customer_name": "",
            "customer_email": "",
            "customer_contact": ""
        },
        "order_id": "order_FHrfRw4TZU5Q2L",
        "line_items": [],
        "payment_id": null,
        "status": "cancelled",
        "expire_by": 4102444799,
        "issued_at": 1595491479,
        "paid_at": null,
        "cancelled_at": 1595491488,
        "expired_at": null,
        "sms_status": "sent",
        "email_status": "sent",
        "date": 1595491479,
        "terms": null,
        "partial_payment": false,
        "gross_amount": 100,
        "tax_amount": 0,
        "taxable_amount": 0,
        "amount": 100,
        "amount_paid": 0,
        "amount_due": 100,
        "currency": "",
        "currency_symbol": "₹",
        "description": "Registration Link for Gaurav Kumar",
        "notes": {
            "note_key 1": "Beam me up Scotty",
            "note_key 2": "Tea. Earl Gray. Hot."
        },
        "comment": null,
        "short_url": "https://rzp.io/i/QlfexTj",
        "view_less": true,
        "billing_start": null,
        "billing_end": null,
        "type": "link",
        "group_taxes_discounts": false,
        "created_at": 1595491480,
        "idempotency_key": null
      }

      ```
      

      

      

      
    

    
### Path Parameter

         `id` _mandatory_
: `string` The unique identifier for the invoice linked to the registration link that you want to cancel. For example, `inv_1Aa00000000001`.
        

    
### Response Parameter

         `id`
: `string` The unique identifier of the invoice.

`entity`
: `string` The entity that has been created. Here, it is `invoice`.

`receipt`
: `string` A user-entered unique identifier of the invoice.

`invoice_number`
: `string` Unique number you added for internal reference.

`customer_id`
: `string` The unique identifier of the customer. For example, `cust_BMB3EwbqnqZ2EI`.

`customer_details`
: `object` Details of the customer.

    `id`
    : `string` The unique identifier associated with the customer to whom the invoice has been issued.

    `name`
    : `string` The customer's name.

    `email`
    : `string` The customer's email address.

    `contact`
    : `integer` The customer's phone number.

    `billing_address`
    : `string` Details of the customer's billing address.

    `shipping_address`
    : `string` Details of the customer's shipping address.

`order_id`
: `string` The unique identifier of the order associated with the invoice.

`line_items`
: `string` Details of the line item that is billed in the invoice. Maximum of 50 line items are allowed.

`payment_id`
: `string` Unique identifier of a payment made against the invoice.

`status`
: `string` The status of the invoice. Possible values:
    - `draft`
    - `issued`
    - `partially_paid`
    - `paid`
    - `cancelled`
    - `expired`
    - `deleted`

`expire_by`
: `integer` The Unix timestamp at which the invoice will expire.

`issued_at`
: `integer` The Unix timestamp at which the invoice was issued to the customer.

`paid_at`
: `integer` The Unix timestamp at which the payment was made.

`cancelled_at`
: `integer` The Unix timestamp at which the invoice was cancelled.

`expired_at`
: `integer` The Unix timestamp at which the invoice expired.

`sms_status`
: `string` The delivery status of the SMS notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`email_status`
: `string` The delivery status of the email notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`date`
: `integer` Timestamp, in Unix format, that indicates the issue date of the invoice.

`terms`
: `string` Any terms to be included in the invoice. Maximum of 2048 characters.

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment on the invoice. Possible values:
  - `true`:  The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`amount`
: `integer` Amount to be paid using the invoice. Must be in the smallest unit of the currency. For example, if the amount to be received from the customer is , pass the value as `29995`.

`amount_paid`
: `integer` Amount paid by the customer against the invoice.

`amount_due`
: `integer` The remaining amount to be paid by the customer for the issued invoice.

`currency`
: `string` The currency associated with the invoice.

`description`
: `string`  A brief description of the invoice.

`notes`
: `object` Any custom notes added to the invoice. Maximum of 2048 characters.

`short_url`
: `string` The short URL that is generated. This is the link that can be shared with the customer to receive payments.

`type`
: `string` Here, it is `invoice`.

`comment`
: `string` Any comments to be added in the invoice. Maximum of 2048 characters.
        

After this step, you can proceed to integrate with the [Fetch Token API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/cards/tokens.md).
