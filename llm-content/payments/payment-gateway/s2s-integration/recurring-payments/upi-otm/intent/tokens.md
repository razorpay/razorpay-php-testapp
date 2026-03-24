---
title: 2. Fetch and Manage Tokens
description: Retrieve tokens using Razorpay APIs to create subsequent payments.
---

# 2. Fetch and Manage Tokens

@include recurring-payments/fetch-token-api

## 2.1. Fetch Token by Payment ID

The following endpoint fetches the `token_id` using a `payment_id`.

/payments/:id

```cURL: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/payments/pay_1Aa00000000002

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String paymentId = "pay_1Aa00000000002";

Payment payment = razorpay.payments.fetch(paymentId)

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->fetch($paymentId);
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.fetch(paymentId)

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.fetch(paymentId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

paymentId = "pay_FHfAzEJ51k8NLj"

Razorpay::Payment.fetch(paymentId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Payment.Fetch("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string paymentid = "pay_FHfqtkRzWvxky4";

Payment payment = client.Payment.Fetch(paymentid);
```

```json: Debit Payment
{
  "id": "pay_FHfAzEJ51k8NLj",
  "entity": "payment",
  "amount": 100,
  "currency": "INR",
  "status": "captured",
  "order_id": "order_FHfANdTUYeP8lb",
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
  "customer_id": "cust_DtHaBuooGHTuyZ",
  "token_id": "token_FHfAzGzREc1ug6",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "fee": 0,
  "tax": 0,
  "error_code": null,
  "error_description": null,
  "error_source": null,
  "error_step": null,
  "error_reason": null,
  "acquirer_data": {
    "rrn": "854977234911",
    "upi_transaction_id": "D0BED5A062ECDB3E9B3A1071C96BB273"
  },
  "created_at": 1595447490
}
```json: Authorisation Payment
{
  "id": "pay_QDhVJ5M23wt4rh",
  "entity": "payment",
  "amount": 1000,
  "currency": "INR",
  "status": "failed",
  "order_id": "order_QDhT2PqFJvtg4y",
  "invoice_id": null,
  "international": false,
  "method": "upi",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": false,
  "description": null,
  "card_id": null,
  "bank": null,
  "wallet": null,
  "vpa": "success@razorpay",
  "email": "gaurav.kumar@example.com",
  "contact": "+919123456780",
  "customer_id": "cust_Q0g6LTYw3obZEn",
  "token_id": "token_QDhVJHYr5m87fF",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey\u2026 decaf.",
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot.",
    "optimizer_provider_name": "razorpay"
  },
  "fee": null,
  "tax": null,
  "error_code": "BAD_REQUEST_ERROR",
  "error_description": "Payment was a dummy payment for one time mandate registration.",
  "error_source": "business",
  "error_step": "payment_initiation",
  "error_reason": "upi_dummy_payment",
  "acquirer_data": {
    "rrn": null
  },
  "gateway_provider": "Razorpay",
  "created_at": 1743490280,
  "upi": {
    "vpa": "success@razorpay"
  }
}
```

> **INFO**
>
> 
> **Handy Tips**
> 
> You can also retrieve the `token_id` via the [payment.failed webhook](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/webhooks/#payment-failed.md).
> 

  
### Path Parameters

     @include recurring-payments/fetch-token-pay-path-api
    

## 2.2. Fetch Tokens by Customer ID

@include recurring-payments/upi/token-by-customer

  
### Path Parameters

     @include recurring-payments/fetch-token-cust-path-api
    

## 2.3. Delete Tokens

> **WARN**
>
> 
> **Watch Out!**
> 
> Deleting a token removes it from Razorpay's database. The deleted token will not appear on the Dashboard or when all tokens are fetched. However, it does not cancel the mandate. If you wish to cancel the mandate from NPCI, use the [Cancel Token API](#24-cancel-token).
> 

@include recurring-payments/fetch-token-delete-api

  
### Path Parameters

     @include recurring-payments/delete-token-path
    

## 2.4. Cancel Token
The following endpoint initiates cancellation of the mandate from NPCI.

/customers/:customer_id/tokens/:token_id/cancel

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X PUT https://api.razorpay.com/v1/customers/cust_1Aa00000000002/tokens/token_1Aa00000000001/cancel
```json: Response
{
      "status": "cancellation_initiated”
}
```

  
### Path Parameters

    
`customer_id` _mandatory_
: `string` The unique identifier of the customer with whom the token is linked. For example, `cust_1Aa00000000002`.

`token_id` _mandatory_
: `string` The unique identifier of the token that is to be cancelled. For example, `token_1Aa00000000001`.
