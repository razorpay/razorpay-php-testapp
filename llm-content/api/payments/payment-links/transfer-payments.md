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

@include payment-links-v2/create-req

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

@include payment-links-v2/create-res

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
