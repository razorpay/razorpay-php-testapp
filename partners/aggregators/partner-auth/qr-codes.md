---
title: Partner Auth | QR Codes
heading: QR Codes
description: Integrate with QR Codes API using partner auth.
---

# QR Codes

Use Razorpay QR Codes to receive UPI payments from your customers. Create QR Codes from the Dashboard or using our APIs and share them with your customers. Customers can scan these codes and make payments.

> **INFO**
>
> 
> **Handy Tips**
> 
> Consider these [prerequisites](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/qr-codes.md#prerequisites) before getting started with QR Codes.
> 

## Create a QR Code API

Given below is the sample code for Create a QR Code API. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. Refer to the [QR Codes API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes.md).

payments/qr_codes

```curl: Curl
curl -X POST https://api.razorpay.com/v1/payments/qr_codes \
-u : \
-H "Content-Type: application/json" \
-H 'X-Razorpay-Account: acc_Ef7ArAsdU5t0XL' \
-d '{
  "type": "upi_qr",
  "name": "Store_1",
  "usage": "single_use",
  "fixed_amount": true,
  "payment_amount": 300,
  "description": "For Store 1",
  "customer_id": "cust_HKsR5se84c5LTO",
  "close_by": 1681615838,
  "notes": {
    "purpose": "Test UPI QR code notes"
  },
}' 

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject qrRequest = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);
qrRequest.put("type","upi_qr");
qrRequest.put("name","Store_1");
qrRequest.put("usage","single_use");
qrRequest.put("fixed_amount",true);
qrRequest.put("payment_amount",300);
qrRequest.put("description","For Store 1");
qrRequest.put("customer_id","cust_JDdNazagOgg9Ig");
qrRequest.put("close_by",1681615838);
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
qrRequest.put("notes",notes);

QrCode qrcode = instance.qrCode.create(qrRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->qrCode->create(array("type" => "upi_qr","name" => "Store_1", "usage" => "single_use","fixed_amount" => true,"payment_amount" => 300,"customer_id" => "cust_HKsR5se84c5LTO","description" => "For Store 1","close_by" => 1681615838,"notes" => array("purpose" => "Test UPI QR code notes")));

```javascript: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.qrCode.create({
  type: "upi_qr",
  name: "Store_1",
  usage: "single_use",
  fixed_amount: true,
  payment_amount: 300,
  description: "For Store 1",
  customer_id: "cust_HKsR5se84c5LTO",
  close_by: 1681615838,
  notes: {
    purpose: "Test UPI QR code notes"
  }
})

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

para_attr = {
  "type": "upi_qr",
  "name": "Store_1",
  "usage": "single_use",
  "fixed_amount": true,
  "payment_amount": 300,
  "description": "For Store 1",
  "customer_id": "cust_HKsR5se84c5LTO",
  "close_by": 1681615838,
  "notes": {
    "purpose": "Test UPI QR code notes"
  }
}
Razorpay::QrCode.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

notes := map[string]interface{}{
  "purpose": "Test UPI QR code notes",
}

data := map[string]interface{}{
  "type": "upi_qr",
  "name": "Store_1",
  "usage": "single_use",
  "fixed_amount": true,
  "payment_amount": 300,
  "description": "For Store 1",
  "customer_id": "cust_HKsR5se84c5LTO",
  "close_by": 1681615838,
  "notes": notes,
}
body, err := client.QrCode.create(data, extraHeaders)
```json: Response
{
  "id": "qr_HMsVL8HOpbMcjU",
  "entity": "qr_code",
  "created_at": 1623660301,
  "name": "Store_1",
  "usage": "single_use",
  "type": "upi_qr",
  "image_url": "https://rzp.io/i/BWcUVrLp",
  "payment_amount": 300,
  "status": "active",
  "description": "For Store 1",
  "fixed_amount": true,
  "payments_amount_received": 0,
  "payments_count_received": 0,
  "notes": {
    "purpose": "Test UPI QR code notes"
  },
  "customer_id": "cust_HKsR5se84c5LTO",
  "close_by": 1681615838
}
```

### Request Parameters

`type` _mandatory_
: `string` The type of QR code. Possible values:
  - `upi_qr`: Create a QR code that accepts only UPI payments.
  - `bharat_qr`: Create a QR code that accepts UPI and card payments. This is an on-demand feature. Know more about [Bharat QR](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bharatqr.md).

`name` _optional_
: `string` Label entered to identify the QR code. For example, Store Front Display.

`usage` _mandatory_
: `string` Indicates if the QR code should be allowed to accept single payment or multiple payments. Possible values:
  - `single_use`: QR code will accept only one payment and then close automatically.
  - `multiple_use` (default): QR code will accept multiple payments.

`fixed_amount` _optional_
: `boolean` Indicates if the QR should accept payments of specific amounts or any amount. Possible values:
  - `true`: QR code accepts only a specific amount.
  - `false` (default): QR code will accept any amount.

`payment_amount`_mandatory if fixed_amount=true_
: `integer` The amount allowed for a transaction. If this is specified, then any transaction of amount less than or more than this value will not be allowed. For example, if this amount is set as 500000, the customer cannot pay an amount less than or more than ₹5000.

`description` _optional_
: `string` A brief description about the QR code.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the QR code. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty"`.

`customer_id` _optional_
: `string` Unique identifier of the customer the QR code is linked with. Know more about the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

`close_by` _optional_
: `integer` UNIX timestamp at which the QR code is scheduled to be automatically closed. The time must be at least 2 minutes after the current time. The date range can be set to 2147483647 in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).
  
> **WARN**
>
> 
>   **Watch Out!**
> 
>   Any request beyond 2147483647 UNIX timestamp will fail.
>   

### Response Parameters

Descriptions for the response parameters are present in the [QR Codes Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes.md#qr-code-entity) parameters table.

### Error Response Parameters

Error codes and descriptions are present in the [Error Response Parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes.md#error-response-parameters) table.

## Fetch all QR Codes API

Given below is the sample code for Fetch all QR Codes API. Pass the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header.

payments/qr_codes

```cURL: Curl
curl -u [CLIENT_ID]:[CLIENT_SECRET] \
-X GET https://api.razorpay.com/v1/payments/qr_codes \
-H "Content-Type: application/json" \
-H "X-Razorpay-Account: acc_Ef7ArAsdU5t0XL" \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject params = new JSONObject();
headers.put("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");
instance.addHeaders(headers);
params.put("count","1");

List qrcode = instance.qrCode.fetchAll(params);

```php: PHP
$api = new Api($key_id, $secret);

$api->setHeader("X-Razorpay-Account","acc_Ef7ArAsdU5t0XL");

$api->qrCode->all($options)

```javascript: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_KEY_SECRET",
  headers: {"X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL"} 
});

instance.qrCode.all()

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')
Razorpay.headers = {"X-Razorpay-Account" => "acc_Ef7ArAsdU5t0XL"}

para_attr = {
  "count": 1  
}

Razorpay::QrCode.all(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

extraHeaders:= map[string]string{
    "X-Razorpay-Account": "acc_Ef7ArAsdU5t0XL",
    }

body, err := client.QrCode.All(nil, extraHeaders)

```json: Response
{
  "id": "qr_HO2r1MDprYtWRT",
  "entity": "qr_code",
  "created_at": 1623915088,
  "name": "Store_1",
  "usage": "single_use",
  "type": "upi_qr",
  "image_url": "https://rzp.io/i/oCswTOcCo",
  "payment_amount": 300,
  "status": "active",
  "description": "For Store 1",
  "fixed_amount": true,
  "payments_amount_received": 0,
  "payments_count_received": 0,
  "notes": {
    "purpose": "Test UPI QR code notes"
  },
  "customer_id": "cust_HKsR5se84c5LTO",
  "close_by": 1681615838,
  "closed_at": null,
  "close_reason": null
}
```
### Response Parameters

Descriptions for the response parameters are present in the [QR Codes Entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes.md#qr-code-entity) parameters table.

### Error Response Parameters

Error codes and descriptions are present in the [Error Response Parameters](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes.md#error-response-parameters-2) table.

### Related Information

- [QR Codes API documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/qr-codes.md)
