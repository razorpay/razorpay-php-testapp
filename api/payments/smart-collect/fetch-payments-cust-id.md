---
title: Fetch Payments for a Customer Identifier
description: Fetch payments for a Customer Identifier using the Razorpay API
---

# Fetch Payments for a Customer Identifier

## Fetch Payments for a Customer Identifier

Use this endpoint to retrieve payment details for a single Customer Identifier by id.

### Request

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET \
https://api.razorpay.com/v1/virtual_accounts/va_CminDKtoToBGmd/payments \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String virtualId = "va_DlGmm7jInLudH9";

JSONObject params = new JSONObject();
params.put("count","1");
        
List virtualaccounts = instance.virtualAccounts.fetchPayments(virtualId,params);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.virtual_account.payments(virtualId,options)

```ruby: Ruby
require "razorpay"
Razorpay.setup('key_id', 'key_secret')

virtualId = "va_IDDYE8gYTLJCEH"

options = {"count":1}

Razorpay::VirtualAccount.fetch(virtualId).payments(options)

```php: PHP
$api = new Api($key_id, $secret);

$api->virtualAccount->fetch($virtualId)->payments($options);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.virtualAccounts.fetchPayments(virtualId,options)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.VirtualAccount.Payments("", nil, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

virtualId = "va_IDDYE8gYTLJCEH"

options = {"count":1}

Razorpay::VirtualAccount.fetch(virtualId).payments(options)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]

string virtualId = "va_Z6t7VFTb9xHeOs";

Dictionary param = new Dictionary();
param.Add("count","1");
        
List virtualaccount = client.VirtualAccount.Fetch(virtualId).Payments(param);
```

### Response

```json: Success
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "pay_JGmL38CqCHTyZZ",
      "entity": "payment",
      "amount": 1000,
      "currency": "INR",
      "status": "captured",
      "order_id": null,
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
      "vpa": "gaurav.kumar@exampleupi",
      "email": "gaurav.kumar@example.com",
      "contact": "+919000090000",
      "customer_id": "cust_HWj3MjySAHSjtq",
      "notes": [],
      "fee": 12,
      "tax": 2,
      "error_code": null,
      "error_description": null,
      "error_source": null,
      "error_step": null,
      "error_reason": null,
      "acquirer_data": {
        "rrn": "209817848101"
      },
      "created_at": 1649402719
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
: `string` The unique identifier of the Customer Identifier for which the payment details are to be fetched.

### Parameters

`from` _optional_
: `integer` Timestamp, in seconds, from when payments are to be fetched.

`to` _optional_
: `integer` Timestamp, in seconds, till when payments are to be fetched.

`count` _optional_
: `integer` Number of payments to be fetched. The default value is 10 and the maximum value is 100. This can be used for pagination, in combination with `skip`. 

`skip` _optional_
: `integer` Number of records to be skipped while fetching the payments. This can be used for pagination, in combination with `count`.

### Parameters

`id`
: `string` Unique identifier of the payment.

`entity`
: `string` Indicates the type of entity.

`amount`
: `integer` The payment amount in currency subunits. For example, for an amount of  enter 100.

`currency`
: `string` The currency in which the payment is made.

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
  - `emi`
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

The API `` provided is invalid.
* code: 4xx
* description: Occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the dashboard.
* solution: Make sure that the API keys are active and entered correctly. Also, make sure there are no whitespaces before or after the keys.
