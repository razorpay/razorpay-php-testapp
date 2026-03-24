---
title: Fetch Payments Based on Orders
description: Fetch Payments Based on Orders using Razorpay Payments API.
---

# Fetch Payments Based on Orders

## Fetch Payments Based on Orders

Use this endpoint to retrieve payments corresponding to an order.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/orders/order_DovFx48wjYEr2I/payments

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String orderId = "order_DovFx48wjYEr2I";

Order order = razorpay.orders.fetchPayments(orderId)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.payment(orderId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

orderId := "order_DovFx48wjYEr2I"

body, err := client.Order.Payments(orderId, nil, nil)

```php: PHP
$api = new Api($key_id, $secret);

$api->order->fetch($orderId)->payments();

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

orderId = "order_DovFx48wjYEr2I"

Razorpay::Order.fetch(orderId).payments

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.fetchPayments(orderId)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string orderId = "order_Z6t7VFTb9xHeOs";

List payments = client.Order.Fetch(orderId).Payments();

```

### Response

```json: Success - Card
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "pay_KbCaQOgY6QclC7",
      "entity": "payment",
      "amount": 1234,
      "currency": "INR",
      "status": "captured",
      "order_id": "order_KbCZFK4mhbWLoO",
      "invoice_id": null,
      "international": false,
      "method": "card",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": "Test Transaction",
      "card_id": "card_KbCaQTTxBsAVLQ",
      "card": {
        "id": "card_KbCaQTTxBsAVLQ",
        "entity": "card",
        "name": "",
        "last4": "3818",
        "network": "RuPay",
        "type": "debit",
        "issuer": null,
        "international": false,
        "emi": false,
        "sub_type": "consumer",
        "token_iin": null
      },
      "bank": null,
      "wallet": null,
      "vpa": null,
      "email": "gaurav.kumar@example.com",
      "contact": "+919000090000",
      "notes": {
        "address": "Razorpay Corporate Office"
      },
      "fee": 25,
      "tax": 0,
      "error_code": null,
      "error_description": null,
      "error_source": null,
      "error_step": null,
      "error_reason": null,
      "acquirer_data": {
        "auth_code": "457282",
        "authentication_reference_number": null
      },
      "created_at": 1667399043
    }
  ]
}

```json: Success - UPI
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "acquirer_data": {
        "rrn": "867001630595",
        "upi_transaction_id": "AXI217bee8713a042c0a55d0ffaa12528ed"
      },
      "amount": 102,
      "amount_captured": null,
      "amount_refunded": 0,
      "bank": null,
      "captured": true,
      "card_id": null,
      "contact": "+919000090000",
      "created_at": 1740728156,
      "currency": "INR",
      "description": null,
      "email": "gaurav.kumar@gmail.com",
      "entity": "payment",
      "error_code": null,
      "error_description": null,
      "error_reason": null,
      "error_source": null,
      "error_step": null,
      "fee": 2,
      "gateway_provider": "Razorpay",
      "id": "pay_Q13AaZ8lLVJbTX",
      "international": false,
      "invoice_id": null,
      "method": "upi",
      "notes": [],
      "order_id": "order_Q139NCRSCkyESs",
      "provider": null,
      "refund_status": null,
      "reward": null,
      "status": "captured",
      "tax": 0,
      "token_id": "token_78aXYt4Iy7ThPb",
      "upi": {
        "payer_account_type": "bank_account",
        "vpa": "gaurav.kumar@okicici",
        "flow": "intent"
      },
      "vpa": "gaurav.kumar@okicici",
      "wallet": null
    }
  ]
}

```json: Failure
{
    "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "x48wjYEr2I is not a valid id",
        "source": "business",
        "step": "payment_initiation",
        "reason": "input_validation_failed",
        "metadata": {}
    }
}
```

### Parameters

`id` _mandatory_
: `string` Unique identifier of the order for which you want to fetch payment details.

### Parameters

`id`
: `string` Unique identifier of the payment.

`entity`
: `string` Indicates the type of entity.

`amount`
: `integer` The payment amount in currency subunits. For example, for an amount of  enter 100.

`currency`
: `string` The currency in which the payment is made. Refer to the list of [international currencies](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/international-payments/#supported-currencies.md) that we support.

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
: `string` Order id, if provided. Know more about [Orders](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/orders.md).

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
  : `string` The card issuer. The 4-character code denotes the issuing bank. This attribute will not be set for the card issued by a foreign bank.

  `emi`
  : `boolean` Indicates whether the card can be used for EMI payment method. Possible values:
     - `true`: Card can be used for EMI payments.
     - `false`: Card cannot be used for EMI payments.

  `sub_type`
  : `string` The sub-type of the customer's card. Possible values:
    - `customer` 
    - `business`

    
    Know how to accept payments made by customers using [corporate cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/corporate-cards.md).

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
  : `string` The type of UPI flow. Possible values:
    - `intent`: When a UPI app is selected and user is redirected to it.
    - `collect`: The user enters their UPI ID and receives a notification from the UPI app. They open the app and complete the payment.
    - `in_app`: In case of Turbo UPI Payments.

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
* description: The API credentials passed in the API call differ from the ones generated on the Dashboard.
* solution: The API keys must be active and entered correctly with no whitespace before or after.

The id provided does not exist.
* code: 400
* description: The `order_id` is missing.
* solution: Ensure that you pass the `order_id` in the URL.

_id is not a valid id.
* code: 400
* description: The `order_id` provided is incorrect.
* solution: Enter the correct `order_id`.
