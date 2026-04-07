---
title: Fetch Card Reference Number Using Card Number
description: Retrieve the card reference number for a specific card using card number.
---

# Fetch Card Reference Number Using Card Number

## Fetch Card Reference Number Using Card Number

Use this endpoint to retrieve the card reference number for a specific card using card number.

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
```json: Success - Rupay
{
  "network": "RuPay",
  "payment_account_reference": null,
  "network_reference_id": "1001381923137653903323591234sdfds90"
}
```

### Parameters

`number` _mandatory_
: `string` The card number whose PAR or network reference id should be retrieved.

`tokenised` _optional_
: `boolean` Determines if the card is saved as a token.
Possible Values:
 - `true`: The card number is saved as a token.
- `false`: The card number is not saved as a token.

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
