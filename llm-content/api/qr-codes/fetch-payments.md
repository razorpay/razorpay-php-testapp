---
title: Fetch Payments for a QR Code
description: Fetch payments made on a particular QR Code using this endpoint.
---

# Fetch Payments for a QR Code

## Fetch Payments for a QR Code

Use this endpoint to fetch the payments made on a QR Code using this endpoint.

### Request

```cURL: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/payments/qr_codes/qr_FuZIYx6rMbP6gs/payments \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String qrCodeId = "qr_FuZIYx6rMbP6gs";

JSONObject params = new JSONObject();
params.put("count","1");
            
List qrcode = razorpay.qrCode.fetchAllPayments(qrCodeId, params);

```php: PHP
$api = new Api($key_id, $secret);

$api->qrCode->fetch($qrCodeId)->fetchAllPayments($options)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.qrCode.fetchAllPayments(qrCodeId, options)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.qrcode.fetch_all_payments(qrCodeId, options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

QrCodeID = "qr_FuZIYx6rMbP6gs"

body, err := client.QrCode.FetchPayments(QrCodeID, nil, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "count" : 1  
}
Razorpay::QrCode.fetch(qrCodeId).fetch_payments(para_attr)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string qrCodeId = "qr_Z6t7VFTb9xHeOs";

Dictionary paramRequest = new Dictionary();
paramRequest.Add("count","1");
            
List qrcode = client.QrCode.FetchAllPayments(qrCodeId, paramRequest);
```

### Response

```json: Success 
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "pay_HMtDKn3TnF4D8x",
      "entity": "payment",
      "amount": 500,
      "currency": "INR",
      "status": "captured",
      "order_id": null,
      "invoice_id": null,
      "international": false,
      "method": "upi",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": "QRv2 Payment",
      "card_id": null,
      "bank": null,
      "wallet": null,
      "vpa": "gauri.kumari@okhdfcbank",
      "email": "gauri.kumari@example.com",
      "contact": "+919000090000",
      "customer_id": "cust_HKsR5se84c5LTO",
      "notes": [],
      "fee": 0,
      "tax": 0,
      "error_code": null,
      "error_description": null,
      "error_source": null,
      "error_step": null,
      "error_reason": null,
      "acquirer_data": {
        "rrn": "116514257019"
      },
      "created_at": 1623662800
    },
    {
      "id": "pay_HMsr242ZnaLumA",
      "entity": "payment",
      "amount": 1000,
      "currency": "INR",
      "status": "refunded",
      "order_id": null,
      "invoice_id": null,
      "international": false,
      "method": "upi",
      "amount_refunded": 1000,
      "refund_status": "full",
      "captured": true,
      "description": "QRv2 Payment",
      "card_id": null,
      "bank": null,
      "wallet": null,
      "vpa": "gauri.kumari@okhdfcbank",
      "email": "gauri.kumari@example.com",
      "contact": "+919000090000",
      "customer_id": "cust_HKsR5se84c5LTO",
      "notes": [],
      "fee": 0,
      "tax": 0,
      "error_code": null,
      "error_description": null,
      "error_source": null,
      "error_step": null,
      "error_reason": null,
      "acquirer_data": {
        "rrn": "116514090501"
      },
      "created_at": 1623661533
    }
  ]
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
: `string` The unique identifier of the QR Code.

### Parameters

`from` _optional_
: `integer` Unix timestamp, in seconds, from when payments are to be retrieved.

`to` _optional_
: `integer` Unix timestamp, in seconds, till when payments are to be fetched.

`count` _optional_
: `integer` Number of payments to be fetched.
  - Default value: 10
  - Maximum value: 100
  - This can be used for pagination, in combination with `skip`. 

`skip`
: `integer` Number of records to be skipped while fetching the payments. This can be used for pagination, in combination with `count`.

### Parameters

`id`
: `string` Unique identifier of the payment.

`entity`
: `string` Indicates the type of entity.

`amount`
: `integer` The payment amount in currency subunits. For example, for an amount of ₹1, enter 100.

`currency`
: `string` The currency in which the payment is made. Refer to the list of [international currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies) that we support.

`status`
: `string` The status of the payment. Possible values:
  - `created`
  - `authorized`
  - `captured`
  - `refunded`
  - `failed`

`method`
: `string` The payment method used for making the payment. Possible values:
  - `card`
  - `netbanking`
  - `wallet`
  - `upi`

`order_id`
: `string` Order id, if provided. Know more about [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders.md).

`description`
: `string` Description of the payment, if any.

`international`
: `boolean` Indicates whether the payment is done via an international card or a domestic one. Possible values:
    - `true`: Payment made using international card.
    - `false`: Payment not made using international card.

`refund_status`
: `string` The refund status of the payment. Possible values:
  - `null`
  - `partial` 
  - `full`

`amount_refunded`
: `integer` The amount refunded in currency subunits. For example, if `amount_refunded = 100`, it is equal to .

`captured`
: `boolean` Indicates if the payment is captured. Possible values:
    - `true`: Payment has been captured.
    - `false`: Payment has not been captured.

`email`
: `string` Customer email address used for the payment.

`contact`
: `string` Customer contact number used for the payment.

`fee`
: `integer` Fee (including GST) charged by Razorpay.

`tax`
: `integer` GST charged for the payment.

`error_code`
: `string` Error that occurred during payment. For example, `BAD_REQUEST_ERROR`.

`error_description`
: `string` Description of the error that occurred during payment. For example, `Payment processing failed because of incorrect OTP`.

`error_source`
: `string` The point of failure. For example, `customer`.

`error_step`
: `string` The stage where the transaction failure occurred. The stages can vary depending on the payment method used to complete the transaction. For example, `payment_authentication`.

`error_reason`
: `string` The exact error reason. For example, `incorrect_otp`.

`notes`
: `json object` Contains user-defined fields, stored for reference purposes.

`created_at`
: `integer` Timestamp, in UNIX format, on which the payment was created.

`card_id`
: `string` The unique identifier of the card used by the customer to make the payment.

`card`
: `object` Details of the card used to make the payment.

  `id`
  : `string` The unique identifier of the card used by the customer to make the payment.

  `entity`
  : `string` The name of the entity. Here, it is `card`.

  `name`
  : `string` Name of the cardholder.

  `last4`
  : `integer` The last 4 digits of the card number.

  `network`
  : `string` The card network. Possible values:
    - `American Express`
    - `Diners Club`
    - `Maestro`
    - `MasterCard`
    - `RuPay`
    - `Unknown`
    - `Visa`

  `type`
  : `string` The card type. Possible values:
    - `credit`
    - `debit`
    - `prepaid`
    - `unknown`

  `issuer`
  : `string` The card issuer. The 4-character code denotes the issuing bank. 

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     This attribute will not be set for the card issued by a foreign bank.
>     

  `emi`
  : `boolean` Indicates whether the card can be used for EMI payment method. Possible values:
     - `true`: Card can be used for EMI payments.
     - `false`: Card cannot be used for EMI payments.

  `sub_type`
  : `string` The sub-type of the customer's card. Possible values:
    - `customer` 
    - `business`

      
> **INFO**
>
> 
>       **Handy Tips**
> 
>       Know how to accept payments made by customers using [corporate cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/corporate-cards.md).
>       

`upi`
: `object` Details of the UPI payment received. Only applicable if `method` is `upi`.

  `payer_account_type`
  : `string` The payment method used for making the payment. Possible values:
    - `bank_account`
    - `credit_card`
    - `wallet`

  `vpa`
  : `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.

  `flow` 
  : `string` The type of UPI flow. Possible value `in_app`.
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     The field `flow` is present only in the case of Turbo UPI Payments.
>     

`bank`
: `string` The 4-character bank code which the customer's account is associated with. For example, `UTIB` for Axis Bank.

`vpa`
: `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.

`wallet`
: `string` The name of the wallet used by the customer to make the payment. For example, `payzapp`.

`acquirer_data`
: `array` A dynamic array consisting of a unique reference numbers. 

    `rrn`
    : `string` A unique bank reference number provided by the banking partner when a refund is processed. This reference number can be used by the customer to track the status of the refund with the bank.

    `authentication_reference_number`
    : `string` A unique reference number generated for RuPay card payments.
    
    `bank_transaction_id`
    : `string` A unique reference number provided by the banking partner in case of netbanking payments.

### Errors

The API \{key/secret\} provided is invalid.
* code: 4xx
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.
 
\{Qr code id\} is not a valid id.
* code: 400
* description: A wrong QR Code id is provided.
* solution: Check if you have used a valid QR Code id.

The requested URL was not found on the server.
* code: 400
* description: - The URL is wrong or is missing something.
- A GET API is executed by POST Method.

* solution: - Ensure that the URL is correct and complete.
- Use the correct method, that is GET.

"count": 0
* code: 400
* description: No QR Code is found for the search criteria.
* solution: There is no data for a particular Payment id. Try a different Payment id.
