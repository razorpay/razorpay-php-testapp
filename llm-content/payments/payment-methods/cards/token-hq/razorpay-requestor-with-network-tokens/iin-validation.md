---
title: IIN/BIN Validations on Tokens
description: API to fetch card properties using token IIN.
---

# IIN/BIN Validations on Tokens

> **WARN**
>
> 
> **Watch Out**
> 
> - As per RBI guidelines, businesses and payment acquirers are allowed to save the last 4 card digits and the Bank Identification Number (BIN) only.
> - As per current interpretation, businesses and Payment Acquirer are not allowed to save the Issuer Identification Number (IIN) of the card.* 

> *Razorpay is seeking clarification on this from the industry and RBI.
> 

## Token IIN API

A token is an alias or surrogate value for the actual card number. Whenever the network tokenises a card, the token generated will be a numeric value with the same length as the actual card number.

#### For Example

Card Number | Token
--- 
4386 2894 0766 0153 | 4123 4511 1111 1117

When a card is tokenised, the first 6 digits or the IIN of the card gets updated.
The new IIN for the card is referred to as token IIN.

Use the following API to fetch the properties of the card using token IIN.
  
/iins/:token_iin

#### Path Parameter

`token_iin` _mandatory_
: `integer` The token IIN.

#### Response Parameters

`iin`
: `string` The Issuer Identification Number (IIN). The first 6 digits of credit or debit card number. For example, 438628.

`entity`
: `string` The name of the entity. Here, it is iin.

`network`
: `string` The card network for the given IIN. Possible values:
  - `Visa`
  - `RuPay`
  - `MasterCard`
  - `American Express`
  - `Diners Club`
  - `Maestro`
  - `JCB`
  - `Union Pay`
  - `Unknown`

`type`
: `string` The card type for the given IIN. The card payment pricing may differ based on the card type. Possible values:
  - `credit`
  - `debit`
  - `prepaid`
  - `unknown`

`sub_type`
: `string` The card sub-type for the given IIN. The card payment pricing may differ based on the card sub-type. Possible values:
  - `consumer`
  - `business`
  - `unknown`

`international`
: `boolean` Determines whether the card is international (issued outside India) or domestic. Possible values:
  - `true`: Card issued outside India.
  - `false`: Card issued within India.

`issuer_code`
: `string` The 4-character issuer code unique to each issuing bank in India. For example, SBIN.

`issuer_name`
: `string` The name of the issuing bank. Available for cards issued in India only. For example, State Bank of India.

`issuer_logo`
: `string` URL pointing to the logo of the issuing bank hosted on the Razorpay server.

`emi`
: `json object` A JSON object which provides information about the applicability of EMI on the IIN.

`recurring`
: `json object` A JSON object which provides information about the applicability of recurring payments on the IIN.

`authentication_types`
: `array` Array which lists the possible authentication types for which the IIN is eligible. Possible values:
  - `type`: 3ds: Indicates that the card IIN supports normal 3ds payments.
  - `type`: otp: Indicates that the card IIN supports native OTP payments. Native OTP gives you flexibility to accept the OTP entered by the cardholder on your screen.

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/iins/412345
-H "content-type: application/json"

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String tokenIin = "412345";

Iin token = instance.iin.fetch(tokenIin);

```php: PHP
$api = new Api($key_id, $secret);

$tokenIin = "412345";
$api->iin->fetch($tokenIin);

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

tokenIin := "412345"

body, err := client.Iin.Fetch(tokenIin, nil, nil)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var tokenIin = "412345";

instance.iins.fetch(tokenIin);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string tokenIin = "412345";

Iin iin = client.Iin.Fetch(tokenIin);

```json: Response
{
  "iin": "412345",
  "entity": "iin",
  "network": "Visa",
  "type": "credit",
  "sub_type": "business",
  "issuer_code": "HDFC",
  "issuer_name": "HDFC Bank Ltd",
  "international": false,
  "is_tokenized": true,
  "card_iin": "438628",
  "emi":{
     "available": true
     },
  "recurring": {
     "available": true
     },
  "authentication_types": [
   {
       "type":"3ds"
   },
   {
       "type":"otp"
   }
  ]
}
```

### Related Information

- [Fetch Card IIN Information API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/cards/iin-api.md)
