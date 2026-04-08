---
title: Fetch Card Reference Number Using Tokenised Card Number
description: Retrieve the card reference number for a specific card using tokenised card number.
---

# Fetch Card Reference Number Using Tokenised Card Number

## Fetch Card Reference Number Using Tokenised Card Number

Use this endpoint to retrieve the card reference number for a specific card using the tokenised card number.

> **WARN**
>
> 
> **Watch Out!**
> 
> Using a RuPay card will throw an error as it is not supported. It will not provide `network_reference_id` for tokenised card numbers. It will be available as part of Create Token response only.
> 

### Request

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/cards/fingerprints \
-H "content-type: application/json" \
-d '{
    "number": "4854980604708430"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject request = new JSONObject();
request.put("number","4854980604708430");

Card card = instance.card.requestCardReference(request);

```php:PHP
$api = new Api($key_id, $secret);

$api->card->requestCardReference(array("number" =>"4854980604708430"));

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "number":"4854980604708430",
}
body, err := client.Card.RequestCardReference(data, nil)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.cards.requestCardReference({"number":"4854980604708430"});

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary cardRequest = new Dictionary();
cardRequest.Add("number", "4854980604708430");

Card card = client.Card.RequestCardReference(cardRequest);
```

### Response

```json: Success - Visa and MC
{
  "network": "Visa",
  "payment_account_reference": "V0010013819231376539033235990",
  "network_reference_id": null
}
```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The card network was not able to provide card reference value for this request",
    "field": null,
    "source": "gateway",
    "step": "card_reference_provision",
    "reason": "card_reference_not_found",
    "metadata": {
    }
  }
}
```

### Parameters

`number` _mandatory_
: `string` The tokenised card number whose PAR or network reference id should be retrieved. 

### Parameters

`network`
: `string` The card network. Possible values:
    - `Mastercard`
    - `RuPay`
    - `Visa`

`payment_account_reference`
: `string` The 29-character unique identifier for Mastercard and Visa cards. For RuPay cards, the value is `null`.

`network_reference_id`
: `string` The unique identifier generated for RuPay cards.
