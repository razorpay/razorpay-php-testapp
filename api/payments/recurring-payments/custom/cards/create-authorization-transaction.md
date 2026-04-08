---
title: 1. Create the Authorisation Transaction
description: Create an authorisation transaction for cards using Razorpay APIs.
---

# 1. Create the Authorisation Transaction

You can create an authorisation transaction using [Razorpay APIs](#11-using-razorpay-apis) or [Registration Link](#12-using-a-registration-link).

## 1.1. Using Razorpay APIs

To create an authorisation transaction using Razorpay APIs, you need to:

1. [Create a Customer](#111-create-a-customer).
2. [Create an Order](#112-create-an-order).
3. [Create Authorisation Payment using Razorpay APIs](#113-create-an-authorisation-payment).

> **INFO**
>
> 
> **Handy Tips**
> 
> For the Authorisation Payment to be successful in a day (for example, 5th June), you should create an Order and the Authorisation Transaction on the same day (5th June) before 11:59 pm.
> 

### 1.1.1. Create a Customer

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

The Orders API allows you to create a unique Razorpay `order_id`, for example, `order_1Aa00000000001`, that would be tied to the authorisation transaction. Refer to our detailed [Order documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders.md) for more details.

Use the below endpoint to create an order.

/orders

You can create a payment against the `order_id` once it is generated.

```cURL: Request
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "",
  "customer_id":"cust_1Aa00000000001",
  "token": {
    "max_amount": 1500000,
    "expire_at": 2709971120,
    "frequency": "monthly"
  },
  "receipt": "Receipt No. 1",
  notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
    }
}'
```json: Response
{
  "id": "order_1Aa00000000002",
  "entity": "order",
  "amount": 100,
  "amount_paid": 0,
  "amount_due": 100,
  "currency": "",
  "customer_id":"cust_1Aa00000000001",
  "receipt": "Receipt No. 1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
    }
  "created_at": 1565172642
}
```

    
### Request Parameters

         `amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the minimum value is `100`, that is, .

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment.

`customer_id` _mandatory_
: `string` The unique identifier of the customer. For example, `cust_1Aa00000000001`.

`token`
: `object` Details related to the authorisation such as max amount, frequency and expiry information.

    `max_amount` _mandatory_
    : `integer` The maximum amount that can be auto-debited in a single charge. The minimum value is `100`, that is, , and the maximum value is `1500000`, that is, . For an amount higher than this, the cardholder should provide an Additional Factor of Authentication (AFA) as per RBI guidelines.

    `expire_at` _mandatory_
    : `integer` The Unix timestamp that indicates when the authorisation transaction must expire. The default value is 10 years.

    `frequency` _mandatory_
    : `string` The frequency at which you can charge your customer. Currently supported frequencies are `as_presented` and `monthly`. The support for other frequencies is expected to be live soon.

`receipt` _optional_
: `string` A user-entered unique identifier for the order. For example, `Receipt No. 1`. This parameter should be mapped to the `order_id` sent by Razorpay.

`notes`_optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
        

    
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

> **INFO**
>
> 
> **Handler Function vs Callback URL**
> 
> - **Handler Function**:
>   
When you use the handler function, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Checkout Form. You need to collect these and send them to your server.
> - **Callback URL**:
>   
When you use a Callback URL, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Callback URL.
> 

```html: Custom checkout with handler functions

  
    Pay
  

  
    const btn = document.querySelector("#btn");

    var razorpay = new Razorpay({
      key: "",
      image: "https://i.imgur.com/n5tjHFD.jpg"
    });

    razorpay.once("ready", function (response) {
      console.log(response.methods);
    })

    var data = {
      "amount": 100, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
      "currency": "", // Default is INR. We support more than 90 currencies.
      "email": "",
      "contact": "",
      "notes": {
        "address": "Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru",
      },
      "order_id": "order_00000000000001",
      "customer_id": "cust_00000000000001",
      "recurring": true,
      "save": 1,
      "consent_to_save_card": 1,
      "method": "card",
      "card[name]": "",
      "card[number]": "5104015555555558",
      "card[cvv]": "123",
      "card[expiry_month]": "10",
      "card[expiry_year]": "30"
    };

    btn.addEventListener("click", function () { // has to be placed within user initiated context, such as click, in order for popup to open.
      razorpay.createPayment(data);

      razorpay.on("payment.success", function (resp) {
        alert(resp.razorpay_payment_id),
        alert(resp.razorpay_order_id),
        alert(resp.razorpay_signature)
      }); // will pass payment ID, order ID and Razorpay signature to success handler.

      razorpay.on("payment.error", function (resp) {
        alert(resp.error.description)
      }); // will pass error object to error handler
    })
  

```html: Custom checkout with Callback URL

  
    Pay
  

  
    const btn = document.querySelector("#btn");

    var razorpay = new Razorpay({
      key: "",
      image: "https://i.imgur.com/n5tjHFD.jpg"
    });

    razorpay.once("ready", function (response) {
      console.log(response.methods);
    })

    var data = {
      "callback_url": "www.example-callback-url.com",
      "amount": 100, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
      "currency": "", // Default is INR. We support more than 90 currencies.
      "email": "",
      "contact": "",
      "notes": {
        "address": "Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru",
      },
      "order_id": "order_00000000000001",
      "customer_id": "cust_00000000000001",
      "recurring": true,
      "save": 1,
      "consent_to_save_card": 1,
      "method": "card",
      "card[name]": "",
      "card[number]": "5104015555555558",
      "card[cvv]": "123",
      "card[expiry_month]": "10",
      "card[expiry_year]": "30"
    };

    btn.addEventListener("click", function () { // has to be placed within user initiated context, such as click, in order for popup to open.
      razorpay.createPayment(data);
    })
  

```

    
### Additional Checkout Fields

         `customer_id` _mandatory_
: `string` Unique identifier of the customer created in the [first step](#111-create-a-customer).

`order_id` _mandatory_
: `string` Unique identifier of the  order created in the [second step](#112-create-an-order).
         
         `recurring` _mandatory_
: `boolean` Possible values:
        - `true`: Recurring payment is enabled.
        - `false`: Recurring payment is not enabled.

        
> **INFO**
>
> 
>         **Handy Tips**
>         
>         The `recurring` parameter also supports the value `preferred`. Use this when you want to support **recurring payments** and **one-time payment** in the same flow.
>         

`save` _mandatory_
: `integer` Indicates whether to save the card details. Possible values:
        - `1`: Save the card details.
        - `0`: Do not save the card details.

`consent_to_save_card` _mandatory_
: `integer` Indicates whether you have taken the customer's consent for tokenising the card. Possible values:
        - `1`: Taken the customer's consent.
        - `0`: Not taken the customer's consent.
        

After this step, you can proceed to integrate with the [Fetch Token API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/custom/cards/tokens.md).

## 1.2. Using a Registration Link

Registration Link is an alternate way of creating an authorisation transaction. You can create a registration link using the [API](#121-create-a-registration-link) or [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#1-create-a-registration-link).

> **INFO**
>
> 
> **Handy Tips**
> 
> - You do not have to create a customer if you choose the registration link method for creating an authorisation transaction.
> - You can [use Webhooks to get notifications about successful payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#check-authorization-link-status-using-webhooks) against a registration link.
> 

When you create a registration link, an [invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) is automatically issued to the customer. They can use this invoice to make the authorisation payment.

A registration link must always have the amount (in Paise) that the customer will be charged when making the authorisation payment. For cards, the amount must be a minimum of `₹1`.

### 1.2.1. Create a Registration Link

Use the below endpoint to create a registration link.

/subscription_registration/auth_links

```curl: Request
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
  "description":"Registration Link for Gaurav Kumar",
  "subscription_registration":{
    "method":"card",
    "max_amount":"100000000",
    "expire_at":1609423824
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
```json: Response
{
  "id": "inv_FHrXGIpd3N17DX",
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
  "description": "Registration Link for Gaurav Kumar",
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
: Details of the customer to whom the registration link will be sent.

  `name` _mandatory_
  : `string` Customer's name.

  `email` _mandatory_
  : `string` Customer's email address.

  `contact`_mandatory_
  : `string` Customer's phone number.

`type` _mandatory_
: `string` In this case, the value is `link`.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, only `INR` is supported.

`amount` _mandatory_
: `integer` The payment amount in the smallest currency sub-unit.

`description` _mandatory_
: `string` A description that appears on the hosted page. For example, `12:30 p.m. Thali meals (Gaurav Kumar)`.
         `subscription_registration`
: Details of the authorisation transaction.

  `method` _mandatory_
  : `string` The authorization method. Here it is `card`.

  `max_amount` _optional_
  : `integer` Use to set the maximum amount (in paise) per debit request. The value can range from `500` - `9999900`. Defaults to ₹99,000.

  `expire_at` _optional_
  : `integer` The timestamp, in Unix format, till when you can use the token (authorization on the payment method) to charge the customer subsequent payments.
         `sms_notify` _optional_
: `boolean` Indicates if SMS notifications are to be sent by Razorpay. Can have the following values:
    - `true` (default): Notifications are sent by Razorpay.
    - `false`: Notifications are not sent by Razorpay.

`email_notify` _optional_
: `boolean` Indicates if email notifications are to be sent by Razorpay. Can have the following values:
    - `true` (default): Notifications are sent by Razorpay.
    - `false`: Notifications are not sent by Razorpay.

`expire_by` _optional_
: `integer` The timestamp, in Unix, till when the registration link should be available to the customer to make the authorisation transaction.

`receipt` _optional_
: `string` A unique identifier entered by you for the order. For example, `Receipt No. 1`. This parameter should be mapped to the `order_id` sent by Razorpay.

`notes` _optional_
: `object` This is a key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
        

    
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
        

After this step, you can proceed to integrate with the [Fetch Token API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/custom/cards/tokens.md).
