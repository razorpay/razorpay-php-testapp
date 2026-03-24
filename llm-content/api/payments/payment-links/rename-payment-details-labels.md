---
title: Rename Labels in Payment Details Section
description: Customise and rename the labels in the Payment Details section of the Payment Links payment request page using Razorpay APIs.
---

# Rename Labels in Payment Details Section

## Rename Labels in Payment Details Section

Use this endpoint to change the labels for fields on the Payment Details section of the Payment Link's payment request page.

- You may even display labels in a different language for example, Hindi or Tamil.

- Given below is the list of fields for which you can rename labels.
  - `PAYMENT FOR`
  - `RECEIPT NO.`
  - `AMOUNT PAYABLE`
  - `EXPIRES ON`
  - `EXPIRED ON`
  - `DUE`
  - `PAID`
  - `AMOUNT PAID`
  - `ISSUED TO`

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payment_links/ \
-H 'Content-type: application/json' \
-d '{
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#412232",
  "description": "Payment for policy no #23456",
  "expire_by": 1599193801,
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "hosted_page": {
      "label": {
        "receipt": "Ref No.",
        "description": "Course Name",
        "amount_payable": "Course Fee Payable",
        "amount_paid": "Course Fee Paid",
        "partial_amount_due": "Fee Installment Due",
        "partial_amount_paid": "Fee Installment Paid",
        "expire_by": "Pay Before",
        "expired_on": "Link Expired. Please contact Admin",
        "amount_due": "Course Fee Due"
      },
      "show_preferences": {
        "issued_to": false
      }
    }
  }
}'

```php: PHP
$api = new Api($key_id, $secret);

$api->paymentLink->create(array('amount'=>500, 'currency'=>'', 'accept_partial'=>true, 'first_min_partial_amount'=>100, 'description' => 'For XYZ purpose', 'customer' => array('name'=>'', 'email' => '', 'contact'=>''),  'notify'=>array('sms'=>true, 'email'=>true) ,'reminder_enable'=>true , 'options'=>array('hosted_page'=>array('label'=>array('receipt'=>'Ref No.', 'description'=>'Course Name', 'amount_payable'=>'Course Fee Payable', 'amount_paid'=>'Course Fee Paid', 'partial_amount_due'=>'Fee Installment Due', 'partial_amount_paid'=>'Fee Installment Paid', 'expire_by'=>'Pay Before', 'expired_on'=>'1632223497','amount_due'=>'Course Fee Due'), 'show_preferences'=>array('issued_to'=>false)))));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.paymentLink.create({
  amount: 1000,
  currency: "",
  accept_partial: true,
  first_min_partial_amount: 100,
  reference_id: "#421",
  description: "Payment for policy no #23456",
  customer: {
    name: "",
    contact: "",
    email: ""
  },
  notify: {
    sms: true,
    email: true
  },
  reminder_enable: true,
  options: {
    checkout: {
      partial_payment: {
        min_amount_label: "Minimum Money to be paid",
        partial_amount_label: "Pay in parts",
        partial_amount_description: "Pay at least ₹100",
        full_amount_label: "Pay the entire amount"
      }
    }
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment_link.create({
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#421",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "checkout": {
      "partial_payment": {
        "min_amount_label": "Minimum Money to be paid",
        "partial_amount_label": "Pay in parts",
        "partial_amount_description": "Pay at least ₹100",
        "full_amount_label": "Pay the entire amount"
      }
    }
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#412232",
  "description": "Payment for policy no #23456",
  "expire_by": 1599193801,
  "customer": map[string]interface{}{
    "name": "",
    "contact": "",
    "email": "",
  },
  "notify": map[string]interface{}{
    "sms": true,
    "email": true,
  },
  "reminder_enable": true,
  "options": map[string]interface{}{
    "hosted_page": map[string]interface{}{
      "label": map[string]interface{}{
        "receipt": "Ref No.",
        "description": "Course Name",
        "amount_payable": "Course Fee Payable",
        "amount_paid": "Course Fee Paid",
        "partial_amount_due": "Fee Installment Due",
        "partial_amount_paid": "Fee Installment Paid",
        "expire_by": "Pay Before",
        "expired_on": "Link Expired. Please contact Admin",
        "amount_due": "Course Fee Due",
      },
      "show_preferences": map[string]interface{}{
        "issued_to": false,
      },
    },
  },
}

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')

para_attr = {
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#421",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "checkout": {
      "partial_payment": {
        "min_amount_label": "Minimum Money to be paid",
        "partial_amount_label": "Pay in parts",
        "partial_amount_description": "Pay at least ₹100",
        "full_amount_label": "Pay the entire amount"
      }
    }
  }
}

Razorpay.headers = {"Content-type" => "application/json"}

Razorpay::PaymentLink.create(para_attr.to_json)

```java: Java
import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
JSONObject paymentLinkRequest = new JSONObject();
paymentLinkRequest.put("amount",1000);
paymentLinkRequest.put("currency","");
paymentLinkRequest.put("accept_partial",true);
paymentLinkRequest.put("reference_id","#aasasw8");
paymentLinkRequest.put("first_min_partial_amount",100);
paymentLinkRequest.put("description","Payment for policy no #23456");
JSONObject customer = new JSONObject();
customer.put("name","");
customer.put("contact","");
customer.put("email","");
paymentLinkRequest.put("customer",customer);
JSONObject notify = new JSONObject();
notify.put("sms",true);
notify.put("email",true);
paymentLinkRequest.put("notify",notify);
paymentLinkRequest.put("reminder_enable",true);

JSONObject options = new JSONObject();
JSONObject notes = new JSONObject();
notes.put("branch","Acme Corp Bangalore North");
notes.put("name","Bhairav Kumar");

JSONObject partialPayment = new JSONObject();
partialPayment.put("min_amount_label","Minimum Money to be paid");
partialPayment.put("partial_amount_label","Pay in parts");
partialPayment.put("partial_amount_description","Pay at least ₹100");
partialPayment.put("full_amount_label","Pay the entire amount");
JSONObject checkout = new JSONObject();
checkout.put("partial_payment",partialPayment);
options.put("checkout",checkout);
paymentLinkRequest.put("options",options);
              
PaymentLink payment = razorpay.paymentLink.create(requestRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentLinkRequest = new Dictionary();
paymentLinkRequest.Add("amount", 1000);
paymentLinkRequest.Add("currency", "");
paymentLinkRequest.Add("accept_partial", true);
paymentLinkRequest.Add("reference_id", "#aasasw8");
paymentLinkRequest.Add("first_min_partial_amount", 100);
paymentLinkRequest.Add("description", "Payment for policy no #23456");
Dictionary customer = new Dictionary();
customer.Add("contact", "+919999999999");
customer.Add("name", "");
customer.Add("email", "");
paymentLinkRequest.Add("customer", customer);
Dictionary notify = new Dictionary();
notify.Add("sms", true);
notify.Add("email", true);
paymentLinkRequest.Add("notify", notify);
paymentLinkRequest.Add("reminder_enable", true);

Dictionary options = new Dictionary();
Dictionary notes = new Dictionary();
notes.Add("branch", "Acme Corp Bangalore North");
notes.Add("name", "Bhairav Kumar");

Dictionary partialPayment = new Dictionary();
partialPayment.Add("min_amount_label", "Minimum Money to be paid");
partialPayment.Add("partial_amount_label", "Pay in parts");
partialPayment.Add("partial_amount_description", "Pay at least ₹100");
partialPayment.Add("full_amount_label", "Pay the entire amount");
Dictionary checkout = new Dictionary();
checkout.Add("partial_payment", partialPayment);
options.Add("checkout", checkout);
paymentLinkRequest.Add("options", options);
              
PaymentLink paymentlink = client.PaymentLink.Create(paymentLinkRequest);

```curl: Request - Hindi
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payment_links/ \
-H 'Content-type: application/json' \
-d '{
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#423",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  #customisation parameters start below#
  "options":{
    "hosted_page":{
      "label":{
        "receipt":"रसीद संख्या",
        "description":"कोर्स का नाम",
        "amount_payable":"शुल्क भुगतान",
        "amount_paid":"शुल्क जमा ",
        "partial_amount_due":"बाकी शुल्क किस्त",
        "partial_amount_paid":"शुल्क किस्त जमा",
        "expire_by":"शुल्क पेमेंट लास्ट डेट",
        "expired_on":"लिंक की समय सीमा समाप्त हो गई है। कृपया व्यवस्थापक से संपर्क करें",
        "amount_due": "बाकी शुल्क "
      },
      "show_preferences":{
        "issued_to":false
      }
    }
  }
}'
```curl: Request - Tamil
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payment_links/ \
-H 'Content-type: application/json' \
-d '{
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#424",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  #customisation parameters start below#
  "options":{
    "hosted_page":{
      "label":{
        "receipt":"ரசீது எண்",
        "description":"கடன் வகை",
        "amount_payable":"செலுத்த வேண்டிய கடன் தவணைத் தொகை",
        "amount_paid":"செலுத்தப்பட்ட கடன் தவணைத் தொகை",
        "expire_by":"கடைசி தேதி",
        "expired_on":"இணைப்பு காலாவதியானது. நிர்வாகியைத் தொடர்பு கொள்ளவும்",
        "amount_due": "மீதமுள்ள கடன் தவணைத் தொகை"
      },
      "show_preferences":{
        "issued_to":false
      }
    }
  }
}'
```

### Response

### Parameters

`amount` _mandatory_
: `integer` Amount to be paid using the Payment Link. Must be in the smallest unit of the currency. For example, if you want to receive a payment of , you must enter the value `30000`. In the case of three decimal currencies, such as KWD, BHD and OMR, to refund a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to refund a payment of 295, pass the value as 295.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to refund a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`currency` _optional_
: `string` A three-letter ISO code for the currency in which you want to accept the payment. For example, INR. Refer to the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

.

. For example, if an amount of  is to be received from the customer in two installments of #1 - , #2 - , then you can set this value as `500000`. Must be passed along with `accept_partial` parameter.

`upi_link` _mandatory for creating UPI Payment Link_
: `boolean` Must be set to `true` for creating UPI Payment Link. If the `upi_link` parameter is not passed or passed with value as false, a Standard Payment Link will be created. Possible values:
  - `true`: Creates a UPI Payment Link.
  - `false`: Creates a Standard Payment Link.
  

`description` _optional_
: `string` A brief description of the Payment Link. The maximum character limit supported is 2048.

`reference_id` _optional_
: `string` Reference number tagged to a Payment Link. Must be a unique number for each Payment Link. The maximum character limit supported is 40.

`customer` _optional_
: `json object` Customer details

  `name` _optional_
  : `string` The customer's name.

  `email` _optional_
  : `string` The customer's email address.

  `contact` _optional_
  : `string` The customer's phone number.

`expire_by` _optional_
: `integer` Timestamp, in Unix, at which the Payment Link will expire. By default, a Payment Link will be valid for six months from the date of creation. Please note that the expire by date cannot exceed more than six months from the date of creation.

`notify` _optional_
: `array` Defines who handles Payment Link notification.

  `sms` _optional_
  : `boolean` Defines who handles the SMS notification. Possible values:
    - `true`: Razorpay handles the notification.
    - `false`: You handle the notification.

  `email` _optional_
  : `boolean` Defines who handles the email notification. Possible values:
    - `true`: Razorpay handles the notification.
    - `false`: You handle the notification.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Payment Link for Groceries.”`.

`callback_url` _optional_
: `string` If specified, adds a redirect URL to the Payment Link. Once customers completes the payment, they are redirected to the specified URL.

   
> **INFO**
>
>  
> 
>    **Handy Tips** 
> 
>     If the `callback_url` is passed, it must be passed in the correct format. That is, it should contain a URL. 
>     
>     

`callback_method` _conditionally mandatory_
: `string` If `callback_url` parameter is passed, callback_method must be passed with the value `get`.

`reminder_enable` _optional_
: `boolean` Used to send [reminders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/reminders.md) for the Payment Link. Possible values:
    - `true`: To send reminders.
    - `false`: To disable reminders.

### Parameters

`accept_partial` 
: `boolean` Indicates whether customers can make [partial payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/partial-payments.md) using the Payment Link. Possible values:
  - `true`: Customer can make partial payments.
  - `false` (default): Customer cannot make partial payments.

`amount`
: `integer` Amount to be paid using the Payment Link. Must be in the smallest unit of the currency. For example, if you want to receive a payment of , you must enter the value `30000`. In the case of three decimal currencies, such as KWD, BHD and OMR, to refund a payment of 295.991, pass the value as 295990. And in the case of zero decimal currencies such as JPY, to refund a payment of 295, pass the value as 295.

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   As per payment guidelines, you should pass the last decimal number as 0 for three decimal currency payments. For example, if you want to refund a customer 99.991 KD for a transaction, you should pass the value for the amount parameter as `99990` and not `99991`.
>   

`amount_paid`
: `integer` Amount paid by the customer.

`callback_url`
: `string` If specified, adds a redirect URL to the Payment Link. Once the customer completes the payment, they are redirected to the specified URL.

`callback_method`
: `string` If `callback_url` parameter is passed, `callback_method` must be passed with the value `get`.

`cancelled_at`
: `integer` Timestamp, in Unix, at which the Payment Link was cancelled by you.

`created_at`
: `integer` Timestamp, in Unix, indicating when the Payment Link was created.

`currency`
: `string` Defaults to INR. We accept payments in [international currencies.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies)

  
> **INFO**
>
> 
> 
>   **Handy Tips**
> 
>   Razorpay has added support for zero decimal currencies, such as JPY, and three decimal currencies, such as KWD, BHD, and OMR, allowing businesses to accept international payments in these currencies. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/currency-conversion.md) (May 2024).
>   

.

`customer`
: `json object` Customer details.

  `name`
  : `string` The customer's name.

  `email`
  : `string` The customer's email address.

  `contact`
  : `string` The customer's phone number.

`description`
: `string` A brief description of the Payment Link.

`expire_by`
: `integer` Timestamp, in Unix, when the Payment Link will expire. By default, a Payment Link will be valid for six months from the date of creation. Please note that the expire by date cannot exceed more than six months from the date of creation.

`expired_at`
: `integer` Timestamp, in Unix, at which the Payment Link expired.

`id`
: `string` Unique identifier of the Payment Link. For example, `plink_ERgihyaAAC0VNW`.

`upi_link`
: `boolean` Indicates whether the Payment Link is a UPI Payment Link.
  - `true`: A UPI Payment Link has been created.
  - `false`: It is a Standard Payment Link.

`notes`
: `object` Set of key-value pairs that you can use to store additional information. You (Businesses) can enter a maximum of 15 key-value pairs, with each value having a maximum limit of 256 characters.

`notify`
: `array` Defines who handles Payment Link notification.

  `sms`
  : `boolean` Defines who handles the SMS notification.
    - `true`: Razorpay handles the notification.
    - `false`: Businesses handle the notification.

  `email`
  : `boolean` Defines who handles the email notification.
    - `true`: Razorpay handles the notification.
    - `false`: Businesses handle the notification.

`payments`
: `array` Payment details such as amount, payment id, Payment Link id and more are stored in this array. It is populated only after a payment is successfully captured by the customer. Only captured payments will be shown here. Until then, the value is `null`.

  `amount`
  : `integer` The amount paid by the customer using the Payment Link.

  `created_at`
  : `integer` Timestamp, in Unix, indicating when the payment was made.

  

  `method`
  : `string` The payment method used to make the payment. Possible values:
    - `netbanking`
    - `card`
    - `wallet`
    - `upi`
    - `emi`
    - `bank_transfer`
  
  

  

  

  

  `payment_id`
  : `string` Unique identifier of the payment made against the Payment Link.

  `plink_id`
  : `string` Unique identifier of the Payment Link. For example, `plink_ERgihyaAAC0VNW`.

  `status`
  : `string` The payment state. Possible value is `captured`.

  `updated_at`
  : `integer` Timestamp, in Unix, indicating when the payment was updated.

`reference_id`
: `string` Reference number tagged to a Payment Link. Must be a unique number for each Payment Link. The maximum character limit supported is 40.

`short_url`
: `string` The unique short URL generated for the Payment Link.

`status`
: `string` Displays the current state of the Payment Link. Possible values:
  - `created`
  - `partially_paid`
  - `expired`
  - `cancelled`
  - `paid`

`updated_at`
: `integer` Timestamp, in Unix, indicating when the Payment Link was updated.

`reminder_enable`
: `boolean` Used to send [reminders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/reminders.md) for the Payment Link. Possible values:
    - `true`: To send reminders.
    - `false`: To disable reminders.

`user_id`
: `string` A unique identifier for the user role through which the Payment Link was created. For example, `HD1JAKCCPGDfRx`.

### Errors

The api \{key/secret\} provided is invalid
* code: 4xx
* description: There is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure that: - The API Keys are active and entered correctly.
- There are no white-spaces before or after the keys.

The \{input field\} is required
* code: 4xx
* description: A mandatory field is empty.
* solution: Ensure all mandatory fields and values are present.

wrong input fields sent.
* code: 400
* description: When wrong input fields are sent during Payment Link creation.
* solution: Ensure that the input fields are added correctly. Refer to these [request parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md#request-parameters) on how to add correct input fields.

payment link creation with reference ID already attempted
* code: 400
* description: An existing reference id has been passed.
* solution: Ensure that a unique reference id is used for all Payment Links.

timestamp must be atleast 15 minutes in future
* code: 400
* description: The epoch time passed is less than 15 minutes from the current time.
* solution: The `close_by` time should be more than 15 minutes from the current time.

Invalid access: Cannot create a payment link in live mode, as live mode is disabled for merchant.
* code: 400
* description: Occurs when you try to create a Payment Link in Live mode, but live mode is disabled for you
* solution: Raise a request to our [support team](https://razorpay.com/support/) to get live mode enabled for you.

Invalid access: Cannot create a payment link, as Merchant is Suspended.
* code: 400
* description: Occurs when you try to create a Payment Link when you have been been suspended.
* solution: Raise a request to our [support team](https://razorpay.com/support/) to be reinstated.

value: the length must not be greater than 255.
* code: 400
* description: When the notes length is greater than 255 characters during Payment Link creation.
* solution: Please create a payment link with notes values less than 255 characters.
