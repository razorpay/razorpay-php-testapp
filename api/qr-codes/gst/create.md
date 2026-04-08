---
title: Create a QR Code
description: Create QR Codes with this endpoint and share with your customers.
---

# Create a QR Code

## Create a QR Code

Use this endpoint to create a QR Code.

- You can share the short URL with customers to accept payments.
- You can print and download it.
- You can create QR Codes for single or multiple use and for specific or all customers.

### Request

```curl: Curl
curl -u : \
-X POST https://api.razorpay.com/v1/payments/qr_codes \
-H "Content-Type: application/json" \
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
    "purpose": "Test UPI QR Code notes"
  },
  "tax_invoice": {
    "number": "INV001",
    "date": 1589994898,
    "customer_name": "Gaurav Kumar",
    "business_gstin": "06AABCU9605R1ZR",
    "gst_amount": 4000,
    "cess_amount": 0,
    "supply_type": "interstate"
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject qrRequest = new JSONObject();
qrRequest.put("type","upi_qr");
qrRequest.put("name","Store_1");
qrRequest.put("usage","single_use");
qrRequest.put("fixed_amount",true);
qrRequest.put("payment_amount",300);
qrRequest.put("description","For Store 1");
qrRequest.put("customer_id","cust_HKsR5se84c5LTO");
qrRequest.put("close_by",1681615838);
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
qrRequest.put("notes",notes);
JSONObject taxInvoice = new JSONObject();
taxInvoice.put("number","INV001");
taxInvoice.put("date",1589994898);
taxInvoice.put("customer_name","Gaurav Kumar");
taxInvoice.put("business_gstin","06AABCU9605R1ZR");
taxInvoice.put("gst_amount",4000);
taxInvoice.put("cess_amount",0);
taxInvoice.put("supply_type","interstate");
qrRequest.put("tax_invoice",taxInvoice);

QrCode qrcode = razorpay.qrCode.create(qrRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->qrCode->create(array("type" => "upi_qr","name" => "Store_1", "usage" => "single_use","fixed_amount" => 1,"payment_amount" => 300,"customer_id" => "cust_HKsR5se84c5LTO","description" => "For Store 1","close_by" => 1681615838,"notes" => array("purpose" => "Test UPI QR Code notes"),"tax_invoice" => array("number" => "INV001", "date" => 1589994898,"customer_name" => "Gaurav Kumar", "business_gstin"=> "06AABCU9605R1ZR","gst_amount" => 4000, "cess_amount" => 0, "supply_type" => "interstate")));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

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
    purpose: "Test UPI QR Code notes"
  },
  tax_invoice: {
    number: "INV001",
    date: 1589994898,
    customer_name: "Gaurav Kumar",
    business_gstin: "06AABCU9605R1ZR",
    gst_amount: 4000,
    cess_amount: 0,
    supply_type: "interstate"
  }
})

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.qrcode.create({
  "type": "upi_qr",
  "name": "Store_1",
  "usage": "single_use",
  "fixed_amount": True,
  "payment_amount": 300,
  "description": "For Store 1",
  "customer_id": "cust_HKsR5se84c5LTO",
  "close_by": 1681615838,
  "notes": {
    "purpose": "Test UPI QR Code notes"
  },
  "tax_invoice": {
    "number": "INV001",
    "date": 1589994898,
    "customer_name": "Gaurav Kumar",
    "business_gstin": "06AABCU9605R1ZR",
    "gst_amount": 4000,
    "cess_amount": 0,
    "supply_type": "interstate"
  }
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

notes = map[string]interface{}{
    "purpose": "Test UPI QR Code notes",
  }

tax_invoice = map[string]interface{}{
    "number": "INV001",
    "date": 1589994898,
    "customer_name": "Gaurav Kumar",
    "business_gstin": "06AABCU9605R1ZR",
    "gst_amount": 4000,
    "cess_amount": 0,
    "supply_type": "interstate",
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
  "tax_invoice": tax_invoice,
})

body, err := client.QrCode.create(data, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

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
    "purpose": "Test UPI QR Code notes"
  },
  "tax_invoice": {
    "number": "INV001",
    "date": 1589994898,
    "customer_name": "Gaurav Kumar",
    "business_gstin": "06AABCU9605R1ZR",
    "gst_amount": 4000,
    "cess_amount": 0,
    "supply_type": "interstate"
  }
}

Razorpay::QrCode.create(para_attr)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary qrRequest = new Dictionary();
qrRequest.Add("type","upi_qr");
qrRequest.Add("name","Store_1");
qrRequest.Add("usage","single_use");
qrRequest.Add("fixed_amount",true);
qrRequest.Add("payment_amount",300);
qrRequest.Add("description","For Store 1");
qrRequest.Add("customer_id","cust_JDdNazagOgg9Ig");
qrRequest.Add("close_by",1681615838);
Dictionary notes = new Dictionary();
notes.Add("notes_key_1","Tea, Earl Grey, Hot");
notes.Add("notes_key_2","Tea, Earl Grey… decaf.");
qrRequest.Add("notes",notes);
Dictionary taxInvoice = new Dictionary();
taxInvoice.Add("number","INV001");
taxInvoice.Add("date",1589994898);
taxInvoice.Add("customer_name","Gaurav Kumar");
taxInvoice.Add("business_gstin","06AABCU9605R1ZR");
taxInvoice.Add("gst_amount",4000);
taxInvoice.Add("cess_amount",0);
taxInvoice.Add("supply_type","interstate");
qrRequest.Add("tax_invoice",taxInvoice);

QrCode qrcode = client.QrCode.Create(qrRequest);
```

### Response

```json: Success
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
    "purpose": "Test UPI QR Code notes"
  },
  "customer_id": "cust_HKsR5se84c5LTO",
  "close_by": 1681615838,
  "tax_invoice": {
    "number": "INV001",
    "date": 1589994898,
    "customer_name": "Gaurav Kumar",
    "business_gstin": "06AABCU9605R1ZR",
    "gst_amount": 4000,
    "cess_amount": 0,
    "supply_type": "interstate"
  }
}
```

### Parameters

`type` _mandatory_
: `string` The type of the QR Code. Possible values:
    - `upi_qr`: Create a QR Code that accepts only UPI payments.

`name` _optional_
: `string` Label entered to identify the QR Code. For example, `Store Front Display`.

`usage` _mandatory_
: `string` Indicates if the QR Code should be allowed to accept single payment or multiple payments. Possible values:
    - `single_use`: QR Code will accept only one payment and then close automatically.
    - `multiple_use` (default): QR Code will accept multiple payments.

`fixed_amount` _optional_
: `boolean` Indicates if the QR should accept payments of specific amounts or any amount. Possible values:
    - `true`: QR Code accepts only a specific amount.
    - `false` (default): QR Code accepts any amount.

`payment_amount` _mandatory if fixed_amount=true_
: `integer` The amount allowed for a transaction. If this is specified, then any transaction of an amount less than or more than this value is not allowed. For example, if this amount is set as `500000`, the customer cannot pay an amount less than or more than ₹5000. This is a mandatory parameter if **fixed_amount** is selected.

`description` _optional_
: `string` A brief description about the QR Code.

`notes` _optional_
: `object`  Key-value pair that can be used to store additional information about the QR Code. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`customer_id` _optional_
: `string` Unique identifier of the customer the QR Code is linked with. Know more about to the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

`close_by` _optional_
: `integer` UNIX timestamp at which the QR Code is scheduled to be automatically closed. The time must be at least 2 minutes after the current time. The date range can be set to `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30). Any request beyond 2147483647 UNIX timestamp will fail.

`tax_invoice` _optional_
: `json object` This block contains information about the invoices. If not provided, the transaction will default to non-GST compliant UPI flow.
    
    `number` _optional_
    : `string` This is the invoice number against which the payment is collected. If not provided, the transaction will default to non-GST compliant UPI flow.

    `date` _optional_
    : `integer` Unix Timestamp that indicates the issue date of the invoice. For example. `1589994898`. If not provided, it will default to the current date.

    `customer_name` _optional_
    : `string` Customer name on the invoice. If not provided, the transaction will default to non-GST compliant UPI flow.

    `gst_amount` _optional_
    : `integer` GST amount on the invoice in paise. If not provided, the transaction will default to the non-GST compliant UPI flow.

    `cess_amount` _optional_
    : `integer` CESS Amount on the invoice in paise. If not provided, the transaction will default to the non-GST compliant UPI flow.

    `supply_type` _optional_
    : `string` Indicates whether the transaction is interstate or intrastate. Possible values:
        - `interstate`
        - `intrastate`

      If not provided, the transaction will default to the non-GST compliant UPI flow.

    `business_gstin` _optional_
    : `string` The GSTIN mentioned on the invoice. For example, `06AABCU9603R1ZR`. If not passed, it is picked up from the database.

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         1. This parameter is only available for UPI QR Codes.

>         2. This is an optional parameter.

>         3. The business is responsible for the completeness and correctness of the data and not Razorpay.
>         

### Parameters

`id`
: `string` The unique identifier of the QR Code.

`entity`
: `string` Indicates the type of entity. Here, it is `qr_code`.

`tax_invoice`
: `json object` This block contains information about the invoices. If not provided, the transaction will default to non-GST compliant UPI flow.
    
    `number`
    : `string` This is the invoice number against which the payment is collected. If not provided, the transaction will default to non-GST compliant UPI flow.

    `date`
    : `integer` Timestamp, in Unix format, that indicates the issue date of the invoice. For example. `1589994898`. If not provided, it will default to the current date.

    `customer_name`
    : `string` Customer name on the invoice. If not provided, the transaction will default to non-GST compliant UPI flow.

    `gst_amount`
    : `integer` GST amount on the invoice in paise. If not provided, the transaction will default to the non-GST compliant UPI flow.

    `cess_amount`
    : `integer` CESS Amount on the invoice in paise. If not provided, the transaction will default to the non-GST compliant UPI flow.

    `supply_type`
    : `string` Indicates whether the transaction is interstate or intrastate. Possible values:
      - `interstate`
      - `intrastate`

      If not provided, the transaction will default to the non-GST compliant UPI flow.

    `business_gstin`
    : `string` The GSTIN mentioned on the invoice. For example, `06AABCU9603R1ZR`. If not passed, it will be picked up from the database.

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         1. This parameter is only available for UPI QR Codes.

>         2. This is an optional parameter.

>         3. The business is responsible for the completeness and correctness of the data and not Razorpay.
>         

      
`type`
: `string` The type of the QR Code. Possible values:
  - `upi_qr`: Create a QR Code that accepts only UPI payments.

`image_url`
: `string` The URL of the QR Code. A sample short URL looks like this `http://rzp.io/l6MS`. Click the link to download the code.

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
: `integer` UNIX timestamp at which the QR Code is scheduled to be automatically closed. The time must be at least 15 minutes after the current time. The date range can be set to `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

  
> **WARN**
>
> 
>   **Watch Out**
> 
>   Any request beyond 2147483647 UNIX timestamp will fail.
>   

`closed_at`
: `integer` UNIX timestamp at which the QR Code is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the QR Code was created. 

`close_reason`
: `string` The reason for the closure of the QR Code. Possible values:
  - `on_demand`: When you close the QR Code using the APIs or the Dashboard.
  - `paid`: If the QR Code is created with the `usage=single_payment` parameter, the QR Code closes automatically once the customer makes the payment, with the reason marked as `paid`.
  - `null`: The QR Code has not been closed yet.
