---
title: Fetch Payments for an Order
description: Fetch payments for an Order using Razorpay Orders API.
---

# Fetch Payments for an Order

## Fetch Payments for an Order

Use this endpoint to fetch all the payments made for an order. The response contains all the authorised or failed payments for that order.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]\

-X GET https://api.razorpay.com/v1/orders/order_DaaS6LOUAASb7Y/payments \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String orderId = "order_DaaS6LOUAASb7Y";

Order order = razorpay.orders.fetchPayments(orderId);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.payments(orderId)

```php: PHP
$api = new Api($key_id, $secret);

$api->order->fetch($orderId)->payments();

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

orderId = "order_DaaS6LOUAASb7Y"

Razorpay::Order.fetch("order_JCRhAvzvZQPkwT").payments

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.fetchPayments(orderId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Order.Payments("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string orderId = "order_Z6t7VFTb9xHeOs";

List order = client.Order.Fetch(orderId).Payments();
```

### Response

```json: Success
{
  "entity":"collection",
  "count":2,
  "items":[
    {
      "id":"pay_N8FUmetkCE2hZP",
      "entity":"payment",
      "amount":100,
      "currency":"INR",
      "status":"failed",
      "order_id":"order_N8FRN5zTm5S3wx",
      "invoice_id":null,
      "international":false,
      "method":"upi",
      "amount_refunded":0,
      "refund_status":null,
      "captured":false,
      "description":null,
      "card_id":null,
      "bank":null,
      "wallet":null,
      "vpa":"failure@razorpay",
      "email":"void@razorpay.com",
      "contact":"+919999999999",
      "notes":{
        "notes_key_1":"Tea, Earl Grey, Hot",
        "notes_key_2":"Tea, Earl Grey… decaf."
      },
      "fee":null,
      "tax":null,
      "error_code":"BAD_REQUEST_ERROR",
      "error_description":"Payment was unsuccessful due to a temporary issue. If amount got deducted, it will be refunded within 5-7 working days.",
      "error_source":"gateway",
      "error_step":"payment_response",
      "error_reason":"payment_failed",
      "acquirer_data":{
        "rrn":null
      },
      "created_at":1701688684,
      "upi":{
        "vpa":"failure@razorpay"
      }
    },
    {
      "id":"pay_N8FVRD1DzYzBh1",
      "entity":"payment",
      "amount":100,
      "currency":"INR",
      "status":"captured",
      "order_id":"order_N8FRN5zTm5S3wx",
      "invoice_id":null,
      "international":false,
      "method":"upi",
      "amount_refunded":0,
      "refund_status":null,
      "captured":true,
      "description":null,
      "card_id":null,
      "bank":null,
      "wallet":null,
      "vpa":"success@razorpay",
      "email":"void@razorpay.com",
      "contact":"+919999999999",
      "notes":{
        "notes_key_1":"Tea, Earl Grey, Hot",
        "notes_key_2":"Tea, Earl Grey… decaf."
      },
      "fee":2,
      "tax":0,
      "error_code":null,
      "error_description":null,
      "error_source":null,
      "error_step":null,
      "error_reason":null,
      "acquirer_data":{
        "rrn":"267567962619",
        "upi_transaction_id":"F5B66C7C07CA6FEAD77E956DC2FC7ABE"
      },
      "created_at":1701688721,
      "upi":{
        "vpa":"success@razorpay"
      }
    }
  ]
}
```

### Parameters

`id` _mandatory_
: `string` Unique identifier of the order for which the payments should be retrieved.

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
: `integer` Fee (including tax) charged by us.

`tax`
: `integer` Tax charged for the payment.

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

    

`bank`
: `string` The 4-character bank code which the customer's account is associated with. For example, `UTIB` for Axis Bank.

  

 

`upi`
: `object` Details of the UPI payment received. Applicable if `method` is `upi`.

    `payer_account_type`
    : `string` The payment method used for making the payment. Possible values:
        - `bank_account`
        - `credit_card`
        - `wallet`

    `vpa`
    : `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.

`vpa`
: `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, `gauravkumar@exampleupi`.
