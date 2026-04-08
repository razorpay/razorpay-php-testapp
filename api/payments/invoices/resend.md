---
title: Send Notifications
description: Send notifications to your customers via SMS and Email using this endpoint.
---

# Send Notifications

## Send Notifications

Use this endpoint to send notifications with the short URL to the customer via email or SMS.

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/invoices/inv_DAuFuwWYU3R9tg/notify_by/sms \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String invoiceId = "inv_DAuFuwWYU3R9tg";

String medium = "sms";

Invoice invoice = razorpay.invoices.notifyBy(invoiceId,medium);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.invoice.notify_by(invoiceId,medium)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

invoiceId = "inv_DAuFuwWYU3R9tg"

medium = "email"

Razorpay::Invoice.notifyBy(invoiceId,medium)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Invoice.Notify("", "", nil, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->invoice->fetch($invoiceId)->notify($medium);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.invoices.notifyBy(invoiceId,medium)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]
");

string invoiceId = "inv_DAweOiQ7amIUVd";

string medium = "sms";

Invoice invoice = client.Invoice.Fetch(invoiceId).NotifyBy(medium);
```

### Response

```json: Success 
{
    "success": true
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

`id` _mandatory_
: `string` The unique identifier of the invoice whose link is to be sent by SMS or email.

`medium` _mandatory_
: `string` Possible values:
    - `sms`
    - `email`

### Parameters

`success`
: `boolean` Indicates whether the notifications were sent successfully. Possible values:
    - `true`: The notifications were successfully via SMS, email or both.
    - `false`: The notifications were not sent.

### Errors

The API `` provided is invalid.
* code: 4xx
* description: There is a mismatch between the API credentials passed in the API call and those generated on the Dashboard.
* solution:  - Ensure that the API Keys are active and entered correctly.
- There should be no whitespaces before or after the keys.

 
The id provided does not exist.
* code: 400
* description: The invoice id entered is either invalid or does not belong to the requester account.
* solution: Enter a valid invoice id.

email is not a valid communication medium.
* code: 400
* description: There is a spelling error in “email” in the URL.
* solution: Check that the keywords are spelled correctly.
