---
title: Send GST information in UPI transaction flows
description: Know how to adhere to CBIC regulatory guidelines and send GST information in UPI transaction flows.
---

# Send GST information in UPI transaction flows

As per the 2020 circular issued by the Central Board of Indirect Taxes & Customs (CBIC), businesses meeting the eligibility conditions described below must pass GST information for UPI transactions:

## Eligibility Conditions

Given below are the eligibility conditions:

- Businesses whose annual aggregate turnover exceeds ₹500 crores in any financial year from 2017-18 onwards.
- Businesses that generate B2C (Business-to-Customer) invoices.

The following categories of business will be excluded:
- An insurer or a banking company, or a financial institution, including a non-banking financial company.
- A goods transport agency supplying services in relation to transportation of goods by road in a goods carriage.
- Businesses supplying passenger transportation service.
- Businesses supplying services by way of admission to exhibition of cinematograph in films in multiplex screens.

## How to Comply with the Regulation

We enable eligible businesses to comply with this regulation by making some simple changes to their integration. Non-eligible businesses can also make these changes, even though this regulation does not apply to them at the moment.

1. [Make changes in Orders API integration](#step-1-make-changes-in-orders-api-integration).
2. [Handle API errors](#step-2-handle-api-errors).
3. [Make changes in webhook integration](#step-3-make-changes-in-webhooks-integration).

### Step 1: Make Changes in Orders API Integration

To comply with the change, you should use the [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders/create.md) in your integration flow, along with the following additional parameters request parameters:

#### Additional Request Parameters

`tax_invoice` _optional_
: `object` This object contains information about the invoices. If not provided, the transaction will default to the non-GST compliant UPI flow.

    `number` _optional_
    : `string` This is the invoice number against which the payment is collected. If not provided, the transaction will default to the non-GST compliant UPI flow.

    `date` _optional_
    : `integer` Timestamp, in Unix format, that indicates the issue date of the invoice. If not provided, it will default to the current date.

    `customer_name` _optional_
    : `string` The customer name on the invoice. If not provided, the transaction will default to non-GST compliant UPI flow.

    `gst_amount` _optional_
    : `integer` The GST amount on the invoice in paise. If not provided, Razorpay will compute the values based on the default values provided by you. If default values are not updated, the transaction will default to the non-GST compliant UPI flow.

    `cess_amount` _optional_
    : `integer` The cess amount on the invoice in paise. If not provided, Razorpay will compute the values based on the default values provided by you. If default values are not updated, the transaction will default to the non-GST compliant UPI flow.

    `supply_type` _optional_
    : `string` Supply type indicating whether the transaction is interstate or intrastate. Possible values:
        - `interstate`:  Supply of goods and services takes place across the borders of two states or union territories. Only IGST is to be paid.
        - `intrastate`: Supply of goods and services takes place within the states. Both CGST and SGST should be paid.
        
        If not provided, the default value set by you on the Dashboard will be considered. If default values are not updated, the transaction will default to the non-GST compliant UPI flow.

    `business_gstin` _optional_
    : `string` The GSTIN mentioned on the invoice. If not passed, it will be taken from your Dashboard.

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "tax_invoice": 
    {
      "number": "INV001",
      "date": "1589994898",
      "customer_name": "Gaurav Kumar",
      "business_gstin": "06AABCU9603R1ZR",     
      "gst_amount": 4000,
      "cess_amount": 0,
      "supply_type": "interstate"
    }
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 1000); // amount in the smallest currency unit
        orderRequest.put("currency", "INR");
   
       JSONObject tax_invoice = new JSONObject();
       tax_invoice.put("number", "INV001");
       tax_invoice.put("date", "1589994898");
       tax_invoice.put("customer_name, "Gaurav Kumar");
       tax_invoice.put("business_gstin", "06AABCU9603R1ZR");
       tax_invoice.put("gst_amount", 4000);
       tax_invoice.put("cess_amount", 0);
       tax_invoice.put("supply_type", "interstate");
       orderRequest.put("tax_invoice", tax_invoice);

        Order order = razorpayclient.orders.create(orderRequest);
        System.out.print(order);
```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "tax_invoice": 
    {
      "number": "INV001",
      "date": "1589994898",
      "customer_name": "Gaurav Kumar",
      "business_gstin": "06AABCU9603R1ZR",     
      "gst_amount": 4000,
      "cess_amount": 0,
      "supply_type": "interstate"
    }

 })
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 100, 'currency' => 'INR', tax_invoice => array( 'number' => 'INV001', 'date' => 1589994898, 'customer_name' => 'Gaurav Kumar', 'business_gstin' => '06AABCU9603R1ZR', 'gst_amount' => 4000, 'cess_amount' => 0, 'supply_type' => 'interstate')));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.Add("receipt", "receipt#1");
options.Add("currency", "INR");
tax_invoice.number="INV001";
tax_invoice.date="1589994898";
tax_invoice.customer_name="Gaurav Kumar";
tax_invoice.business_gstin="06AABCU9603R1ZR";
tax_invoice.gst_amount="4000";
tax_invoice.cess_amount="0";
tax_invoice.supply_type="interstate";

options.Add("tax_invoice", tax_invoice);

Order order = client.Order.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1',   tax_invoice: { number: 'INV001', date: '1589994898', customer_name: 'Gaurav Kumar', business_gstin: '06AABCU9603R1ZR', gst_amount: 4000, cess_amount: 0, supply_type: 'interstate' }

```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
  currency: "INR",
  receipt: "receipt#1",
  tax_invoice: 
  {
      number: "INV001",
      date: "1589994898",
      customer_name: "Gaurav Kumar",
      business_gstin: "06AABCU9603R1ZR",     
      gst_amount: 4000,
      cess_amount: 0,
      supply_type: "interstate"
    }
})

```go: Go 
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
 "amount": 50000,
 "currency": "INR",
 "receipt": "receipt#1",
 "tax_invoice": 
    map[string]interface{}{
	 "number": "INV001",
	 "date": "1589994898",
	 "customer_name": "Gaurav Kumar",
	 "business_gstin": "06AABCU9603R1ZR",     
	 "gst_amount": 4000,
	 "cess_amount": 0,
	 "supply_type": "interstate",
	},
}

body, err := client.Order.Create(data, nil)
```json: Response
{
  "id": "order_EKwxwAgItmmXdp",
  "entity": "order",
  "amount": 50000,
  "amount_paid": 0,
  "amount_due": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1582628071,
  "tax_invoice": 
    {
      "number": "INV001", 
      "date": "1589994898", 
      "customer_name": "Gaurav Kumar",
      "business_gstin": "06AABCU9603R1ZR",
      "gst_amount": 4000, 
      "cess_amount": 0,
      "supply_type": "interstate" 
    }
}
```

### Step 2: Handle API Errors

You could face two types of errors while sending GST information using Orders API:
- Data not in the correct format
- Data missing

Given below is a sample error response.

```json: Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "GSTIN Format is invalid",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
  }
}
```

#### Data not in Correct Format

Given below are the error codes and their description:

Datapoint | Expected Value | Error Code | Source | Step | Reason | Description
---
GSTIN not in proper format | 15 character Alphanumeric  | BAD_REQUEST_ERROR | business |  payment_initiation (Order Create) | input_validation_failed | GSTIN Format is invalid
---
GST Amount not in proper format | positive integer | BAD_REQUEST_ERROR | business | payment_initiation (Order Create) | input_validation_failed | GST Amount Format is invalid
---
CESS Amount not in proper format | positive integer | BAD_REQUEST_ERROR | business | payment_initiation (Order Create) | input_validation_failed | CESS Amount Format is invalid
---
Supply Type is not in proper format  | 10 character string, one of \{"Interstate”, "Intrastate” or NULL\}" | BAD_REQUEST_ERROR | business | payment_initiation (Order Create) | input_validation_failed | Supply Type is invalid
---
Invoice Date not in proper format | integer | BAD_REQUEST_ERROR | business | payment_initiation (Order Create) | input_validation_failed | Invoice Date format is invalid

#### Data Missing

Given below are the error codes and their description:

Datapoint | Expected Value | Error Code | Source | Step | Reason | Description
---
GSTIN not present | 15 character Alphanumeric | No Error thrown. Default to non-GST UPI flow | NA | NA | NA | NA
---
Customer Name not provided  | string |No Error thrown. Default to non-GST UPI flow | NA | NA | NA | NA
---
Invoice Number not provided | string | No Error thrown. Default to non-GST UPI flow | NA | NA | NA | NA
---
GST Amount not passed & GST Rate not updated in the Razorpay Dashboard | positive integer | No Error thrown. Default to non-GST UPI flow | NA | NA | NA | NA
---
GST & CESS is passed, but Supply Type is not passed | string | BAD_REQUEST_ERROR | business | payment_initiation (Order Create) | input_validation_failed | Supply Type is not present
---
CESS Amount & Supply Type passed, but GST Amount is not passed | positive integer | BAD_REQUEST_ERROR | business | payment_initiation (Order Create) | input_validation_failed | GST Amount is not present
---
GST Amount & Supply Type passed but CESS Amount is not passed | positive integer | BAD_REQUEST_ERROR | business | payment_initiation (Order Create) | input_validation_failed | CESS Amount is not present

### Step 3: Make Changes in Webhooks Integration

The GST information is also passed in the `order.paid` webhook payload, as shown below. Please make the necessary changes in your webhook integration.

```json: Sample Order.paid Payload with GST information
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "order.paid",
  "contains": [
    "payment",
    "order"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DESyzxuld02Zul",
        "entity": "payment",
        "amount": 100,
        "currency": "INR",
        "status": "captured",
        "order_id": "order_DESxiijbl9xjDB",
        "invoice_id": null,
        "international": false,
        "method": "upi",
        "amount_refunded": 0,
        "refund_status": null,
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": "gaurav.kumar@upi",
        "email": "gaurav.kumar@example.com",
        "contact": "+919876543210",
        "notes": [],
        "fee": 2,
        "tax": 0,
        "error_code": null,
        "error_description": null,
        "created_at": 1567675356
      }
    },
    "order": {
      "entity": {
        "id": "order_DESxiijbl9xjDB",
        "entity": "order",
        "amount": 100,
        "amount_paid": 100,
        "amount_due": 0,
        "currency": "INR",
        "receipt": "rcptid #1",
        "offer_id": null,
        "status": "paid",
        "attempts": 1,
        "notes": [],
        "created_at": 1567675283,
        "tax_invoice": {
          "number": "INV001",
          "date": "1589994898",
          "customer_name": "Gaurav Kumar",
          "business_gstin": "06AABCU9603R1ZR",
          "gst_amount": 4000,
          "cess_amount": 0,
          "supply_type": "interstate"
        }
      }
    },
    "created_at": 1567675356
  }
}
```
