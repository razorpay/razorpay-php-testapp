---
title: Fetch All QR codes | Image Content
description: Fetch the details of multiple QR Codes using this endpoint.
---

# Fetch All QR codes | Image Content

## Fetch All QR Codes

Use this endpoint to retrieve the details of multiple QR Codes.

### Request

```Curl: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/payments/qr_codes \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
params.put("count","1");

List qrcode = razorpay.qrCode.fetchAll(params);

```php: PHP
$api = new Api($key_id, $secret);

$api->qrCode->all($options)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.qrCode.all()

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.qrcode.all()

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "count": "2",
}

body, err := client.QrCode.All(nil, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "count": 1  
}

Razorpay::QrCode.all(para_attr)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paramRequest = new Dictionary();
paramRequest.Add("count", "1");

List paymentlink = client.QrCode.All(paramRequest);
```

### Response

```json: Success
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "qr_HO2jGkWReVBMNu",
      "entity": "qr_code",
      "created_at": 1623914648,
      "name": "Store_1",
      "usage": "single_use",
      "type": "upi_qr",
      "image_url": "https://rzp.io/i/w2CEwYmkAu",
      "image_content": "upi://pay?pa=qmart.razorpay@hdfcbank&pn=TestAccount&tr=RZPGT5viB4WHeoUuuqrv2&tn=TestAccountRaftarSoft&am=100&cu=INR&mc=5411",
      "payment_amount": 300,
      "status": "active",
      "description": "For Store 1",
      "fixed_amount": true,
      "payments_amount_received": 0,
      "payments_count_received": 0,
      "notes": {
        "purpose": "Test UPI QR Code notes"
      },
      "customer_id": "cust_HKsR5se84c5LTO",
      "close_by": 1681615838,
      "closed_at": null,
      "close_reason": null
    },
    {
      "id": "qr_HO2e0813YlchUn",
      "entity": "qr_code",
      "created_at": 1623914349,
      "name": "Acme Groceries",
      "usage": "multiple_use",
      "type": "upi_qr",
      "image_url": "https://rzp.io/i/X6QM7LL",
      "image_content": "upi://pay?pa=smart.razorpay@hdfcbank&pn=TestAccount&tr=RZPGT5viB4WHeoUuuqrv2&tn=TestAccountRaftarSoft&am=100&cu=INR&mc=5411",
      "payment_amount": null,
      "status": "closed",
      "description": "Buy fresh groceries",
      "fixed_amount": false,
      "payments_amount_received": 200,
      "payments_count_received": 1,
      "notes": {
        "Branch": "Bangalore - Rajaji Nagar"
      },
      "customer_id": "cust_HKsR5se84c5LTO",
      "close_by": 1625077799,
      "closed_at": 1623914515,
      "close_reason": "on_demand"
    }
  ]
}

```json: Failure 
{
    "error": {
        "code": "SERVER_ERROR",
        "description": "We are facing some trouble completing your request at the moment. Please try again shortly.",
        "source": "NA",
        "step": "NA",
        "reason": "NA",
        "metadata": {}
    }
}
```

### Parameters

`from`
: `integer` Unix timestamp, in seconds, from when QR Codes are to be retrieved.

`to`
: `integer` Unix timestamp, in seconds, till when QR Codes are to be retrieved.

`count`
: `integer` Number of QR Codes to be retrieved.
  - Default value: 10
  - Maximum value: 100
  - This can be used for pagination, in combination with `skip`. 

`skip`
: `integer` Number of records to be skipped while fetching the QR Codes. This can be used for pagination, in combination with `count`.

### Parameters

`id`
: `string` The unique identifier of the QR Code.

`entity`
: `string` Indicates the type of entity. Here, it is `qr_code`.

`type`
: `string` The type of the QR Code. Possible values:
  - `upi_qr`: Create a QR Code that accepts only UPI payments.
  - `bharat_qr`: Create a QR Code that accepts UPI and card payments. This is an on-demand feature. Learn more about [Bharat QR](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bharatqr.md).

`image_url`
: `string` The URL of the QR Code. For example, `http://rzp.io/l6MS`. Click the link to download the code.

`image_content`
: `string` The link encoded to the payable QR Code using any QR Code generator. For example:
  - For UPI QR: `upi://pay?pa=dmart.razorpay@hdfcbank&pn=TestAccount&tr=RZPGT5viB4WHeoUuuqrv2&tn=TestAccountRaftarSoft&am=100&cu=INR&mc=5411`
  - For Bharat QR: `000201010212021643926300000000850415540461000000008061661005900000000890827YESB0CMSNOC222333004882700126430010A0000005240117razorpaybqr@icici02041.1027350010A0000005240117RZPGT8ildsFTgS5Sp52047531530335654041.105802IN5906zxcbmn6005Delhi610611008562300514GT8ildsFTgS5Sp070838R004506304B6A9`

`name`
: `string` Label entered to identify the QR Code. For example, `Store Front Display`.

`usage`
: `string` Indicates if the QR Code should be allowed to accept single payment or multiple payments. Possible values:
  - `single_use`: QR Code will accept only one payment and then close automatically.
  - `multiple_use` (default): QR Code will accept multiple payments.

`fixed_amount`
: `boolean` Indicates if the QR should accept payments of specific amounts or any amount. Possible values:
  - `true`: QR Code accepts only a specific amount.
  - `false` (default): QR Code accepts any amount.

`payment_amount` _if fixed_amount=true_
: `integer` The amount allowed for a transaction. If this is specified, then any transaction of an amount less than or more than this value is not allowed. For example, if this amount is set as `500000`, the customer cannot pay an amount less than or more than ₹5000.

`status`
: `string` Indicates the status of the QR Code. Possible values: 
  - `active`
  - `closed`

`description`
: `string` A brief description about the QR Code.

`payments_amount_received`
: `integer` The total amount received on the QR Code. All captured payments are considered.

`payments_count_received`
: `integer` The total number of payments received on the QR Code. All captured payments are considered.

`notes`
: `object` Key-value pair that can be used to store additional information about the QR Code. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`customer_id`
: `string` Unique identifier of the customer the QR Code is linked with. Know more about to the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

`close_by`
: `integer` Unix timestamp at which the QR Code is scheduled to be automatically closed. The time must be at least 15 minutes after the current time. The date range can be set to `2147483647` in Unix timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   Any request beyond 2147483647 Unix timestamp will fail.
>   

`closed_at`
: `integer` Unix timestamp at which the QR Code is automatically closed.

`created_at`
: `integer` Unix timestamp at which the QR Code was created. 

`close_reason`
: `string` The reason for the closure of the QR Code. Possible values:
  - `on_demand`: When you close the QR Code using the APIs or the Dashboard.
  - `paid`: If the QR Code is created with the `usage=single_payment` parameter, the QR Code closes automatically once the customer makes the payment, with the reason marked as `paid`.
  - `null`: The QR Code has not been closed yet.

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
 
The id provided does not exist.
* code: 400
* description: Possible reasons: - The URL is wrong or is missing something.
- A GET API is executed by POST Method.

* solution: Suggested solutions: - Ensure you have the correct and complete URL.
- Use the right method, that is, GET.
 

We are facing some trouble completing your request at the moment. Please try again shortly.
* code: 400
* description: A GET API is executed by POST Method.
* solution: Use the correct method, that is, GET.

The requested URL was not found on the server.
* code: 400
* description: The URL is wrong or missing something.
* solution: Use the correct and complete URL.
