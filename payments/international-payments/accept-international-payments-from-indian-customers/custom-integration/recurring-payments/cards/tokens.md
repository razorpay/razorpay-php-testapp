---
title: 2. Fetch and Manage Tokens
description: Retrieve tokens using Razorpay APIs to create subsequent payments.
---

# 2. Fetch and Manage Tokens

Once you capture a payment, Razorpay Checkout returns a `razorpay_payment_id`. You can use this id to fetch the `token_id`, which is used to create and charge subsequent payments.

You can retrieve the `token_id` using the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#3-search-for-the-token) or the APIs given below.

## 2.1. Fetch Token by Payment ID 

Use the below endpoint to fetch `token_id` using the `payment_id`.

/payments/:id

```cURL: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/payments/pay_1Aa00000000001

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String Paymentid = "pay_FHfqtkRzWvxky4";

Payment payment = instance.payments.fetch(paymentids);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->fetch($paymentId);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

paymentId = "pay_FHfqtkRzWvxky4"

Razorpay::Payment.fetch(paymentId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Payment.Fetch("", nil, nil)
```

```json: Response
{
  "id": "pay_FHfqtkRzWvxky4",
  "entity": "payment",
  "amount": 100,
  "currency": "",
  "status": "captured",
  "order_id": "order_FHfnswDdfu96HQ",
  "invoice_id": null,
  "international": false,
  "method": "card",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": true,
  "description": null,
  "card_id": "card_F0zoXUp4IPPGoI",
  "bank": null,
  "wallet": null,
  "vpa": null,
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "customer_id": "cust_DtHaBuooGHTuyZ",
  "token_id": "token_FHfn3rIiM1Z8nr",
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
    "auth_code": "541898"
  },
  "created_at": 1595449871
}
```

> **INFO**
>
> 
> **Handy Tips**
> 
> You can also retrieve the `token_id` from the [payment.authorized webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#payment-authorized).
> 

    
### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the payment to be retrieved. For example, `pay_1Aa00000000002`. 
        

## 2.2. Fetch Tokens by Customer ID 

Use the below endpoint to fetch all tokens linked to a customer.

A customer can have multiple tokens tied to them. These tokens can be used to create subsequent payments for multiple products or services.

/customers/:id/tokens

```curl: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/customers/cust_1Aa00000000002/tokens

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_1Aa00000000002";

String tokenId = "token_FHfn3rIiM1Z8nr";

Customer customer = instance.customers.fetchToken(customerId, tokenId)

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)->tokens()->all();

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000002"

tokenId = "token_FHfn3rIiM1Z8nr"

Razorpay::Customer.fetch(customerId).fetchToken(tokenId)
```

```json: Response
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "token_FHfn3rIiM1Z8nr",
      "entity": "token",
      "token": "2aqzyte2EqvuDr",
      "bank": null,
      "wallet": null,
      "method": "card",
      "card": {
        "entity": "card",
        "name": "Gaurav Kumar",
        "last4": "2002",
        "network": "Visa",
        "type": "credit",
        "issuer": "CITI",
        "international": false,
        "emi": true,
        "sub_type": "consumer",
        "expiry_month": 5,
        "expiry_year": 2030,
        "flows": {
          "otp": true,
          "recurring": true
        }
      },
      "vpa": null,
      "recurring": true,
      "auth_type": null,
      "mrn": null,
      "used_at": 1595449871,
      "created_at": 1595449652,
      "expired_at": 1748716199,
      "dcc_enabled": false
    }
  ]
}
```

    
### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the customer for whom tokens are to be retrieved. For example, `cust_1Aa00000000002`. 
        

## 2.3. Delete Tokens 

The following endpoint deletes a token.

/customers/:customer_id/tokens/:token_id

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X DELETE https://api.razorpay.com/v1/customers/cust_1Aa00000000002/tokens/token_1Aa00000000001

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_1Aa00000000002";

String tokenId = "token_1Aa00000000001";

Customer customer = razorpay.customers.deleteToken(customerId, tokenId);

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)->tokens()->delete($tokenId);
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.deleteToken(customerId, tokenId)

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.token.delete(customerId, tokenId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000004"

tokenId = "token_Hxe0skTXLeg9pF"

Razorpay::Customer.fetch(customerId).deleteToken(tokenId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Token.Delete("", "", nil, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000004"

tokenId = "token_Hxe0skTXLeg9pF"

Razorpay::fetch(customerId).deleteToken(tokenId)

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_DtHaBuooGHTuyZ";

String tokenId = "token_HouA2OQR5Z2jTL";

Customer customer = instance.customers.deleteToken(customerId, tokenId);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string customerId = "cust_Z6t7VFTb9xHeOs";

string tokenId = "token_1Aa00000000001";

Customer customer = client.Customer.Fetch(customerId).DeleteToken(tokenId);
```
```json: Response
{
    "deleted": true
}
```

    
### Path Parameter

`customer_id` _mandatory_
: `string` The unique identifier of the customer with whom the token is linked. For example, `cust_1Aa00000000002`.

`token_id` _mandatory_
: `string` The unique identifier of the token that is to be deleted. For example, `token_1Aa00000000001`.
