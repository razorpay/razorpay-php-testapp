---
title: 2. Fetch and Manage Tokens
description: Retrieve tokens using Razorpay APIs to create subsequent payments.
---

# 2. Fetch and Manage Tokens

Once you capture a payment, Razorpay Checkout returns a `razorpay_payment_id`. You can use this id to fetch the `token_id`, which is used to create and charge subsequent payments.

You can retrieve the `token_id` using the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#3-search-for-the-token) or the APIs given below.

Know more about [Tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/upi/integrate.md#fetch-emandate-registration-details).

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
> You can also retrieve the `token_id` via the [payment.authorized webhook](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/webhooks.md#payment-authorized).
> 

    
### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the payment to be retrieved. For example, `pay_1Aa00000000002`.
        

    
### Response Parameters

`id`
: `string` Unique identifier of the payment.

`entity`
: `string` Indicates the type of entity. Here, it is `payment`.

`amount`
: `integer` The payment amount represented in smallest unit of the currency passed. For example, `amount = 100` translates to `100` subunits, that is .

`currency`
: `string` The currency in which the payment is made. Refer to the list of [international currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies) that we support.

`status`
: `string` The status of the payment. Possible values:    
  - `created`
  - `authorized`
  - `captured`
  - `refunded`
  - `failed`

`order_id`
: `string` The unique identifier of the order.

`invoice_id`
: `string` The unique identifier of the invoice.

`international`
: `boolean` Indicates whether the payment is done via an international card or a domestic one. Possible values:
    - `true`: Payment made using international card.
    - `false`: Payment not made using international card.

`method`
: `string` The payment method used for making the payment. Possible values:
  - `card`
  - `netbanking`
  - `wallet`
  - `emi`
  - `upi`

`amount_refunded`
: `integer` The amount refunded in smallest unit of the currency passed.

`refund_status`
: `string` The refund status of the payment. Possible values:
  - `null`
  - `partial`
  - `full`

`captured`
: `boolean` Indicates if the payment is captured. Possible values:
    - `true`: Payment has been captured.
    - `false`: Payment has not been captured.

`description`
: `string` Description of the payment, if any.

`email`
: `string` Customer email address used for the payment.

`contact`
: `integer` Customer contact number used for the payment.

`customer_id`
: `string` The unique identifier of the customer.

`token_id`
: `string` The unique identifier of the token.

`notes`
: `json object` Contains user-defined fields, stored for reference purposes.

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

`created_at`
: `integer` Timestamp, in UNIX format, on which the payment was created.
        

 
## 2.2. Fetch Tokens by Customer ID 

A customer can have multiple tokens and these tokens can be used to create subsequent payments for multiple products or services. The following endpoint retrieves tokens linked to a customer.

> **WARN**
>
> 
> **Watch Out!**
> 
> - This endpoint will not fetch the details of expired and unused tokens.
> - The UPI tokens are not populated in the API response if the `save_vpa` feature is not enabled in your account. Please raise a request with our Support team to get this activated.
> 

/customers/:id/tokens

```curl: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/customers/cust_1Aa00000000002/tokens

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_1Aa00000000002";

List tokens = razorpay.customers.fetchTokens(customerId);

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)->tokens()->all();
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.fetchTokens(customerId)

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.token.all(customerId)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000004"

Razorpay::Customer.fetch(customerId).fetchTokens

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Token.All("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string customerId = "cust_1Aa00000000001";

List token = client.Customer.Fetch(customerId).Tokens();
```

```json: Response
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "token_FHfAzGzREc1ug6",
      "entity": "token",
      "token": "9KHsdPaCELeQ0t",
      "bank": null,
      "wallet": null,
      "method": "upi",
      "vpa": {
        "username": "gaurav.kumar",
        "handle": "upi",
        "name": null
      },
      "recurring": true,
      "recurring_details": {
        "status": "confirmed",
        "failure_reason": null
      },
      "auth_type": null,
      "mrn": null,
      "used_at": 1595447490,
      "created_at": 1595447490,
      "start_time": 1595447455,
      "dcc_enabled": false
    }
  ]
}
```

    
### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the customer for whom tokens are to be retrieved. For example, `cust_1Aa00000000002`.
        

    
### Response Parameters

`entity`
: `string` The entity being created. Here, it is a `collection`.

`count`
: `integer` The number of tokens to be fetched.

`items`
: `object` Details related to token such as `token id` and bank information.

    `id`
    : `string` The unique identifier linked to an item. In this example, it is `token_id`.

    `entity`
    : `string` The entity being created. Here, it is a `token`.

    `token`
    : `string` The token is being fetched.

    `bank`
    : `string` Card issuing bank details.

    `wallet`
    : `string` Provides wallet information.
    
    `method`
    : `string` The payment method used to make the transaction.

    `card`
    : `object` Details related to card used to make the transaction.

        `entity`
        : `string` The entity being created. Here, it is `card`.

        `name`
        : `string` Name of the cardholder.

        `last4`
        : `integer` Last 4 digits of the card.

        `network`
        : `string` Name of the payment processor. Here it is `Visa`.

        `type`
        : `string` Card type (debit or credit). In this example, it is `credit`.

        `issuer`
        : `string` Name of the card-issuing bank.

        `international`
        : `boolean` Card usage restriction. Possible values:
            - `true`: Supports international transactions.
            - `false`: International transactions are not supported.

        `emi`
        : `string` Card EMI status. Possible values.
            - `true`: The card is on EMI.
            - `false`: The card is not on EMI.

        `sub_type`
        : `string` Type of the customer.

        `expiry_month`
        : `integer` Month on which the card expires.

        `expiry_year`
        : `integer` Year on which the card expires.

        `flows`
        : `object` The transaction flow details.

            `otp`
            : `string` Whether the OTP function is enabled or not. Possible values:
                - `true`: The OTP function is enabled.
                - `false`: The OTP function is not enabled.

            `recurring`
            : `string` Whether the recurring for this payment method is enabled or not. Possible Values:
                - `true`: Recurring is enabled.
                - `false`: Recurring is not enabled.

    
    `vpa`
    : `object` The VPA details.

        `username`
        : `string` The username of the VPA holder. For example, `gaurav.kumar`.

        `handle`
        : `string` The VPA handle. Here it is `upi`.

        `name`
        : `string` The name of the VPA holder.
           

    `recurring`
    : `string` This represents whether recurring is enabled for this token. Possible values:
        - `true`: Recurring is enabled.
        - `false`: Recurring is not enabled.

    `recurring_details`
    : `object` Details of the recurring transaction.

        `status`
        : `string` This represents the status of the recurring transaction. Possible values:
            - `initiated`
            - `confirmed`
            - `rejected`
            - `cancelled`
            - `paused`

        `failure_reason`
        : `string` This provides the reason why the recurring transaction failed.

    `auth_type`
    : `string` The authorisation type details.

    `mrn`
    : `string` The unique identifier issued by the payment gateway during customer registration. This can be Gateway Reference Number or Gateway Token.

    `used_at`
    : `integer` The VPA usage timestamp.

    `created_at`
    : `integer` The token creation timestamp.

    `expired_at`
    : `integer` The token expiry date timestamp.

    `dcc_enabled`
    : `string` Indicates whether the option to change currency is enabled or not. Possible values.
        - `true`: The option to change currency is enabled
        - `false`: The option to change currency is not enabled.
        

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
        

    
### Response Parameters

`deleted`
: `boolean` Indicates whether the token is deleted. Possible values:
            - `true`: The token is deleted successfully.
            - `false`: The token was not deleted.
