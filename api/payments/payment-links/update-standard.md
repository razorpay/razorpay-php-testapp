---
title: Update Standard Payment Link
description: Update the details of a Standard Payment Link using this endpoint.
---

# Update Standard Payment Link

## Update Standard Payment Link

Use this endpoint to edit the Standard Payment Link details such as the reference id, expiry date and so on.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X PATCH https://api.razorpay.com/v1/payment_links/plink_Et2G7ymGcTTuM5 \
-H 'Content-type: application/json' \
-d '{
    "reference_id": "TS35",
    "expire_by": 1653347540,
    "reminder_enable":false,
    "notes":{
      "policy_name": "Life Insurance Policy"
    }
}'

```php: PHP
$api = new Api($key_id, $secret);

$api->paymentLink->fetch($paymentLinkId)->edit(array("reference_id"=>"TS42", "expire_by"=>"1640270451" , "reminder_enable"=>0, "notes"=>["policy_name"=>"Life Insurance Policy 2"]));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.paymentLink.edit(paymentLinkId, {
    "reference_id": "TS35",
    "expire_by": 1653347540,
    "reminder_enable":false,
    "notes":{
      "policy_name": "Life Insurance Policy"
    }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment_link.edit(paymentLinkId, {
    "reference_id": "TS35",
    "expire_by": 1653347540,
    "reminder_enable":false,
    "notes":{
      "policy_name": "Life Insurance Policy"
    }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
    "reference_id": "TS35",
    "expire_by": 1653347540,
    "reminder_enable":false,
    "notes":map[string]interface{}{
      "policy_name": "Life Insurance Policy",
    },
}
body, err := client.PaymentLink.Update("", data, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')

Razorpay.headers = {"Content-type" => "application/json"}

paymentLinkId = "plink_ExjpAUN3gVHrPJ"

para_attr = {
    "reference_id": "TS35",
    "expire_by": 1653347540,
    "reminder_enable":false,
    "notes":{
      "policy_name": "Life Insurance Policy"
    }
}

Razorpay::PaymentLink.edit(paymentLinkId, para_attr.to_json)

```java: Java
import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
String paymentLinkId = "plink_FMbhpT6nqDjDei";

JSONObject paymentLinkRequest = new JSONObject();
paymentLinkRequest.put("reference_id","TS35");
paymentLinkRequest.put("expire_by",1653347540);
paymentLinkRequest.put("reminder_enable",true);
JSONObject notes = new JSONObject();
notes.put("policy_name","Life Insurance Policy");
paymentLinkRequest.put("notes",notes);
              
PaymentLink paymentlink = razorpay.paymentLink.edit(PaymentLinkId,paymentLinkRequest);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string paymentLinkId = "plink_Z6t7VFTb9xHeOs";

Dictionary paymentLinkRequest = new Dictionary();
paymentLinkRequest.Add("reference_id","TS35");
paymentLinkRequest.Add("expire_by",1653347540);
paymentLinkRequest.Add("reminder_enable",true);
Dictionary notes = new Dictionary();
notes.Add("policy_name", "Life Insurance Policy");
paymentLinkRequest.Add("notes", notes);
              
PaymentLink paymentlink = client.PaymentLink.Fetch(paymentLinkId).Edit(paymentLinkRequest);
```

### Response

### Parameters

`id` _mandatory_
: `string` Unique identifier of the Payment Link.

### Parameters

 Possible values:
  - `true`: Customer can make partial payments. 
  - `false` (default): Customer cannot make partial payments.

`reference_id` _optional_
: `string` Adds a unique reference number to an existing link. 

`expire_by` _optional_
: `integer` Timestamp, in Unix format, when the payment links should expire.

`notes` _optional_ 
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Payment Link for Groceries”`.

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

update can only be made in created or partially paid state
* code: 400
* description: A payment link has been passed in `paid` state.
* solution: Ensure that the Payment Link is in the `created` state or `partially paid` state to update the Payment Link.
 
wrong input fields sent.
* code: 400
* description: When wrong input fields are sent while updating the Payment Link.
* solution: Ensure that the input fields are added correctly. Refer to these [request parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md#request-parameters) on how to add correct input fields.

The id provided does not exist
* code: 400
* description: The Payment Link does not belong to the requestor business, or it doesn't exist.
* solution: Ensure that the Payment Link is valid and belongs to the requestor business.

The api \{key/secret\} provided is invalid
* code: 4xx
* description: There is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Ensure that the API Keys are active and entered correctly. Also, make sure there are no white-spaces before or after the keys.
