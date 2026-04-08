---
title: Manage Mandates and Tokens
description: Track mandate funds, cancel tokens and delete tokens for UPI Reserve Pay (SBMD).
---

# Manage Mandates and Tokens

Once your UPI Reserve Pay integration is live, you can use the following APIs to monitor and manage active mandates.

## Track Mandate Funds

Use the `recurring_details` object to monitor the utilisation of funds within an active mandate. This object is available in the response of the [Fetch Token by Customer id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-reserve-pay/integration-steps.md#21-fetch-token-by-customer-id) and [Fetch Token by Token id and Customer id](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-reserve-pay/integration-steps.md#23-fetch-token-by-token-id-and-customer) APIs. This object contains the following parameters:

Parameter | Description
---
`amount_blocked` | The total amount the customer authorised at the start.
---
`amount_debited` | The cumulative sum of all successful debits made against this token to date.

> **INFO**
>
> 
> **Handy Tips**
> 
> To find the remaining amount available for future debits, subtract the `amount_debited` from the `amount_blocked`. This allows you to manage customer expectations and ensure you do not initiate a debit that exceeds the remaining authorised limit.
> 

## Cancel Tokens

The blocked amount under a UPI Reserve Pay token can be released in two ways:

  
    Use the [Cancel Token API](#cancel-token-api) below to release the blocked funds. When this API is called, all remaining funds under the token are unblocked and credited to the customer's bank account instantly.
  
  
    If you do not cancel the token and the token balance is not fully utilised before expiry, Razorpay automatically triggers a reversal of the remaining funds 10 minutes before the token expires.
  

Released funds reflect in the customer's account instantly. The bank statement may not display this as a separate credit entry, but the account balance is updated immediately.

> **INFO**
>
> 
> **Handy Tips**
> 
> Ensure customers are informed that their funds remain blocked until you explicitly release them or the token expires.
> 

### Cancel Token API

The following endpoint initiates cancellation of the mandate from NPCI.

/customers/:customer_id/tokens/:token_id/cancel

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X PUT https://api.razorpay.com/v1/customers/cust_1Aa00000000002/tokens/token_1Aa00000000001/cancel
```json: Response
{
  "status": "cancellation_initiated"
}
```

  
### Path Parameters

`customer_id` _mandatory_
: `string` The unique identifier of the customer with whom the token is linked. For example, `cust_1Aa00000000002`.

`token_id` _mandatory_
: `string` The unique identifier of the token that is to be cancelled. For example, `token_1Aa00000000001`.
    

## Delete Tokens

> **WARN**
>
> 
> **Watch Out!**
> 
> You cannot delete an active token. Before deleting a token, you must first cancel the mandate using the [Cancel Token API](#cancel-token-api). Attempting to delete a token that has not been cancelled will result in an error. Only proceed with deletion once the token status is `cancelled`.
> 

Deleting a token removes it from Razorpay's database. The deleted token will not appear on the Dashboard or when all tokens are fetched. However, it does not cancel the mandate at NPCI. To cancel the mandate first, use the [Cancel Token API](#cancel-token-api).

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

  
### Path Parameters

     `customer_id` _mandatory_
: `string` The unique identifier of the customer with whom the token is linked. For example, `cust_1Aa00000000002`.

`token_id` _mandatory_
: `string` The unique identifier of the token that is to be deleted. For example, `token_1Aa00000000001`.
