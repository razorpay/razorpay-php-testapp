---
title: Fetch Card Reference Number Using Razorpay Token
description: Retrieve the card reference number for a specific card using Razorpay token.
---

# Fetch Card Reference Number Using Razorpay Token

## Fetch Card Reference Number Using Razorpay Token

Use this endpoint to retrieve the card reference number for a specific card using Razorpay token.

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/cards/fingerprints \
-H "content-type: application/json" \
-d '{
    "token": "token_4lsdksD31GaZ09"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject request = new JSONObject();
request.put("token","token_4lsdksD31GaZ09");

Card card = instance.card.requestCardReference(request);

```php: PHP
$api = new Api($key_id, $secret);

$api->card->requestCardReference(array("token" =>"token_4lsdksD31GaZ09"));

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "token":"token_4lsdksD31GaZ09",
}
body, err := client.Card.RequestCardReference(data, nil)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.cards.requestCardReference({"token":"token_4lsdksD31GaZ09"});

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary cardRequest = new Dictionary();
cardRequest.Add("token","token_Z6t7VFTb9xHeOs");

Card card = client.Card.RequestCardReference(cardRequest);
```

### Response

```json: Success - Visa
{
  "provider": "Visa",
  "payment_account_reference": "V0010013819231376539033235990",
  "network_reference_id": null
}
```json: Success - Mastercard
{
  "provider": "Mastercard",
  "payment_account_reference": "V0010013819231376539033235990",
  "network_reference_id": null
}
```json: Success - Rupay
{
  "provider": "RuPay",
  "payment_account_reference": null,
  "network_reference_id": "1001381923137653903323591234sdfds90"
}
```

### Parameters

`token` _mandatory_
: `string` The token whose PAR or network reference id should be retrieved. 

### Parameters

`provider`
: `string` The card network provider. Possible values:
    - `Mastercard`
    - `RuPay`
    - `Visa`

`payment_account_reference`
: `string` The 29-character unique identifier for Mastercard and Visa cards. For RuPay cards, the value is `null`.

`network_reference_id`
: `string` The unique identifier generated for RuPay cards.
