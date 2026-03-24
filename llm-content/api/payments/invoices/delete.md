---
title: Delete an Invoice
description: Delete an invoice using this endpoint.
---

# Delete an Invoice

## Delete an Invoice

Use this endpoint to delete invoices. You can only delete an invoice that is in the `draft` state. 

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X DELETE https://api.razorpay.com/v1/invoices/inv_DAuFuwWYU3R9tg \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String invoiceId = "inv_DAuFuwWYU3R9tg";

List invoice = razorpay.invoices.delete(InvoiceId);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.invoice.delete(invoiceId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Invoice.Delete("", nil, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Invoice.delete(invoiceId)

```php: PHP
$api = new Api($key_id, $secret);

$api->invoice->fetch($invoiceId)->delete();

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.invoices.delete(invoiceId)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]
");

string invoiceId = "inv_DAweOiQ7amIUVd";

List invoice = client.Invoice.Fetch(invoiceId).Delete();
```

### Response

```json: Success 
[]

```json: Failure 
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Operation not allowed for Invoice in cancelled status.",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {}
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the invoice.

### Errors

Operation not allowed for Invoice in cancelled status.
* code: 400
* description: You are trying to delete an invoice that is not in the `Draft` status.
* solution: Try deleting an invoice in `Draft`status.
