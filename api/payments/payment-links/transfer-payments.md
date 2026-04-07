---
title: Transfer Payments Received Using Payment Links
description: Directly transfer the payments received from customers via Payment Links to your linked accounts using Razorpay APIs.
---

# Transfer Payments Received Using Payment Links

## Transfer Payments Received Using Payment Links

Use this endpoint to transfer the payments received from your customers automatically to your linked accounts. Know how to [create a linked account and transfer payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/transfer-payments.md).

### Request

```curl: Curl
curl -X POST https://api.razorpay.com/v1/payment_links
-H 'content-type: application/json'
-d '{
  "amount": 1500,
  "currency": "INR",
  "accept_partial": false,
  "reference_id": "#aasasw8",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "Gaurav Kumar",
    "contact": "+919000090000",
    "email": "gaurav.kumar@example.com"
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "order": {
      "transfers": [
        {
          "account": "acc_CPRsN1LkFccllA",
          "amount": 500,
          "currency": "INR",
          "notes": {
            "branch": "Acme Corp Bangalore North",
            "name": "Bhairav Kumar"
          },
          "linked_account_notes": [
            "branch"
          ]
        },
        {
          "account": "acc_CNo3jSI8OkFJJJ",
          "amount": 500,
          "currency": "INR",
          "notes": {
            "branch": "Acme Corp Bangalore South",
            "name": "Saurav Kumar"
          },
          "linked_account_notes": [
            "branch"
          ]
        }
      ]
    }
  }
}'

```php: PHP
$api = new Api($key_id, $secret);

$api->paymentLink->create(array('amount'=>20000, 'currency'=>'INR', 'accept_partial'=>false, 'description' => 'For XYZ purpose', 'customer' => array('name'=>'Gaurav Kumar', 'email' => 'gaurav.kumar@example.com', 'contact'=>'+919000090000'),  'notify'=>array('sms'=>true, 'email'=>true) ,'reminder_enable'=>true , 'options'=>array('order'=>array('transfers'=>array('account'=>'acc_CPRsN1LkFccllA', 'amount'=>500, 'currency'=>'INR', 'notes'=>array('branch'=>'Acme Corp Bangalore North', 'name'=>'Bhairav Kumar' ,'linked_account_notes'=>array('branch'))), array('account'=>'acc_CNo3jSI8OkFJJJ', 'amount'=>500, 'currency'=>'INR', 'notes'=>array('branch'=>'Acme Corp Bangalore North', 'name'=>'Saurav Kumar' ,'linked_account_notes'=>array('branch')))))));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.paymentLink.create({
  amount: 20000,
  currency: "INR",
  accept_partial: false,
  description: "For XYZ purpose",
  customer: {
    name: "Gaurav Kumar",
    email: "gaurav.kumar@example.com",
    contact: "+919000090000"
  },
  notify: {
    sms: true,
    email: true
  },
  reminder_enable: true,
  options: {
    order: [
      {
        account: "acc_CNo3jSI8OkFJJJ",
        amount: 500,
        currency: "INR",
        notes: {
          branch: "Acme Corp Bangalore North",
          name: "Saurav Kumar",
          linked_account_notes: [
            "branch"
          ]
        }
      }
    ]
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment_link.create({
  "amount": 20000,
  "currency": "INR",
  "accept_partial": false,
  "description": "For XYZ purpose",
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "+919000090000"
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "order": [
      {
        "account": "acc_CNo3jSI8OkFJJJ",
        "amount": 500,
        "currency": "INR",
        "notes": {
          "branch": "Acme Corp Bangalore North",
          "name": "Saurav Kumar",
          "linked_account_notes": [
            "branch"
          ]
        }
      }
    ]
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
     "amount": 1500,
     "currency": "INR",
     "accept_partial": false,
     "reference_id": "#aasasw8",
     "description": "Payment for policy no #23456",
     "customer": map[string]interface{}{
       "name": "Gaurav Kumar",
       "contact": "+919000090000",
       "email": "gaurav.kumar@example.com",
     },
     "notify": map[string]interface{}{
       "sms": true,
       "email": true,
     },
     "reminder_enable": true,
     "options": map[string]interface{}{
       "order": map[string]interface{}{
         "transfers": []interface{}{
           map[string]interface{}{
             "account": "acc_HjVXbtpSCIxENR",
             "amount": 500,
             "currency": "INR",
             "notes": map[string]interface{}{
               "branch": "Acme Corp Bangalore North",
               "name": "Bhairav Kumar",
             },
             "linked_account_notes": []string{
               "branch",
             },
           },
           map[string]interface{}{
             "account": "acc_HalyQGZh9ZyiGg",
             "amount": 500,
             "currency": "INR",
             "notes": map[string]interface{}{
               "branch": "Acme Corp Bangalore South",
               "name": "Saurav Kumar",
             },
             "linked_account_notes": []string{
               "branch",
             },
           },
         },
       },
     },
   }
body, err := client.PaymentLink.Create(data, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')

para_attr = {
  "amount": 20000,
  "currency": "INR",
  "accept_partial": false,
  "description": "For XYZ purpose",
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "+919000090000"
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "order": [
      {
        "account": "acc_CNo3jSI8OkFJJJ",
        "amount": 500,
        "currency": "INR",
        "notes": {
          "branch": "Acme Corp Bangalore North",
          "name": "Saurav Kumar",
          "linked_account_notes": [
            "branch"
          ]
        }
      }
    ]
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
paymentLinkRequest.put("amount", 1000);
paymentLinkRequest.put("currency", "INR");
paymentLinkRequest.put("accept_partial", false);
paymentLinkRequest.put("reference_id", "#aasasw8");
paymentLinkRequest.put("description", "Payment for policy no #23456");
JSONObject customer = new JSONObject();
customer.put("name", "+919000090000");
customer.put("contact", "Gaurav Kumar");
customer.put("email", "gaurav.kumar@example.com");
paymentLinkRequest.put("customer", customer);
JSONObject notify = new JSONObject();
notify.put("sms", true);
notify.put("email", true);
paymentLinkRequest.put("notify", notify);
paymentLinkRequest.put("reminder_enable", true);

JSONObject options = new JSONObject();
JSONObject transferRequest = new JSONObject();
List  transfers = new ArrayList  ();

JSONObject transferParams = new JSONObject();
transferParams.put("account", "acc_I0QRP7PpvaHhpB");
transferParams.put("amount", 500);
transferParams.put("currency", "INR");
JSONObject notes = new JSONObject();
notes.put("branch", "Acme Corp Bangalore North");
notes.put("name", "Bhairav Kumar");
transferParams.put("notes", notes);
List  linkedAccountNotes = new ArrayList  ();
linkedAccountNotes.add("branch");
transferParams.put("linked_account_notes", linkedAccountNotes);
transfers.add(transferParams);
JSONObject order = new JSONObject();
order.put("transfer", transfers);
options.put("order", order);
paymentLinkRequest.put("options", options);

PaymentLink payment = razorpay.paymentLink.create(paymentLinkRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentLinkRequest = new Dictionary();
paymentLinkRequest.Add("amount", 1000);
paymentLinkRequest.Add("currency", "INR");
paymentLinkRequest.Add("accept_partial", false);
paymentLinkRequest.Add("reference_id", "#aasasw8");
paymentLinkRequest.Add("description", "Payment for policy no #23456");
Dictionary customer = new Dictionary();
customer.Add("contact", "+919999999999");
customer.Add("name", "Gaurav Kumar");
customer.Add("email", "gaurav.kumar@example.com");
paymentLinkRequest.Add("customer", customer);
Dictionary notify = new Dictionary();
notify.Add("sms", true);
notify.Add("email", true);
paymentLinkRequest.Add("notify", notify);
paymentLinkRequest.Add("reminder_enable", true);

Dictionary options = new Dictionary();
List> transfers = new List>();
Dictionary transferParams = new Dictionary();
transferParams.Add("account", "acc_I0QRP7PpvaHhpB");
transferParams.Add("amount", 500);
transferParams.Add("currency", "INR");
Dictionary notes = new Dictionary();
notes.Add("branch", "Acme Corp Bangalore North");
notes.Add("name", "Bhairav Kumar");
transferParams.Add("notes", notes);
List linkedAccountNotes = new List();
linkedAccountNotes.Add("branch");
transferParams.Add("linked_account_notes", linkedAccountNotes);
transfers.Add(transferParams);
Dictionary order = new Dictionary();
order.Add("transfers", transfers);
options.Add("order", order);
paymentLinkRequest.Add("options", options);

PaymentLink paymentlink = client.PaymentLink.Create(paymentLinkRequest);
```

### Response

``` json: Success
{
  "accept_partial": false,
  "amount": 1500,
  "amount_paid": 0,
  "callback_method": "",
  "callback_url": "",
  "cancelled_at": 0,
  "created_at": 1596526969,
  "currency": "INR",
  "customer": {
    "contact": "+919000090000",
    "email": "gaurav.kumar@example.com",
    "name": "Gaurav Kumar"
  },
  "deleted_at": 0,
  "description": "Payment for policy no #23456",
  "expire_by": 0,
  "expired_at": 0,
  "first_min_partial_amount": 0,
  "id": "plink_FMbhpT6nqDjDei",
  "notes": null,
  "notify": {
    "email": true,
    "sms": true
  },
  "payments": null,
  "reference_id": "#aasasw8",
  "reminder_enable": true,
  "reminders": [],
  "short_url": "https://rzp.io/i/ORor1MT",
  "source": "",
  "source_id": "",
  "status": "created",
  "updated_at": 1596526969,
  "user_id": ""
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The api key provided is invalid",
    "source": "NA",
    "step": "NA",
    "reason": "NA",
    "metadata": {}
  }
}
```

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

`options` _mandatory_
: `array` Options to configure the transfer in the Payment Link. Parent parameter under which the `order` child parameter must be passed.

    `order` _mandatory_
    : `array` The parameter under which the linked account and transfer details must be configured to perform the transfer. `transfer` is a child parameter of `order`.

        `transfers`
        : `array` Pass transfer details such as amount, account, linked account information and more.

            `account` _mandatory_
            : `string` Unique identifier of the linked account to which the transfer is to be made.

            `amount` _mandatory_
            : `integer` The amount to be transferred to the linked account. For example, for an amount of ₹200.35, the value of this field should be 20035. This amount cannot exceed the order amount.

            `currency` _mandatory_
            : `string` The currency in which the transfer should be made. We support only `INR` for Route transactions.

            `notes` 
            : `json object` Set of key-value pairs that can be associated with an entity.  This can be useful for storing additional information about the entity. A maximum of 15 key-value pairs, each of 256 characters (maximum), are supported. For example, `"region": "south", "city": "bangalore"`.

            `linked_account_notes` 
            : `array` List of keys from the `notes` object which needs to be shown to linked accounts on their Dashboard. For example, `"region", "city"`. Only the keys will be shown, not values.

            `on_hold` _optional_
            : `boolean` Indicates whether settlements to the linked account should be put on hold. Possible values:
              - `true`: Puts the settlement on hold.
              - `false`: Releases the settlement.

            `on_hold_until` _optional_
            : `integer` Timestamp, in Unix, that indicates until when the settlement of the transfer must be put on hold. If no value is passed, the settlement is put on hold indefinitely.

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
