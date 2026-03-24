---
title: Fetch Card IIN Information using IIN API
description: Fetch customer card IIN information before payment initiation using the IIN API.
---

# Fetch Card IIN Information using IIN API

The Issuer Identification Number (IIN, also known as BIN) is the first 6 digits of a credit or debit card. Our IIN API provides all the details about a given IIN. 

Using this API, you can get details about customers' cards even before the payment is initiated. This helps you to determine whether the payment should be allowed.

For example, if you do not want to accept credit card payments from customers, you can use this API to detect the customer's card type by checking the IIN. Based on the response, you can decide whether to allow the payment to proceed or not.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## Card Tokenisation

Tokenisation is a process by which the card number gets replaced by another virtual 16-digit number called Token. This token (or tokenised card number) is used to process payments instead of the actual card number.

A token is a unique digital identifier in mobile and online transactions. The first 6 or 9 digits of token created is referred to as token_iin.

### RBI Guidelines on Tokenisation

As per RBI guidelines, businesses or Payment Aggregators cannot save actual card numbers on their servers. They can only tokenise the card and use these tokens for subsequent payments.

## Tokenised IIN
The first 9 digits of the token are referred to as tokenised IIN. 
- For Visa, Mastercard and RuPay tokenised cards, the IIN is the first 9 digits of the token. This is referred to as token_iin. For example, `438628111`.
- For other networks, the length of Token IIN might change to 6 or 8 digits.

> **INFO**
>
> 
> **Handy Tips**
> - You will get the token_iin from your tokenisation solution provider as part of the token entity.
> - If you use **Razorpay** as your tokenisation solution provider, you will get the token_iin within the card object. Refer to the `token.card.token_iin` parameter.
> 

## Uses

You can use this API to:

- Check if the IIN of the card number entered by a customer is valid.
- Check if the IIN is eligible for different payment flows such as recurring and EMI.
- Get information about the card network, card type and issuing bank.
- Detect customer's card type.
- Fetch the actual card IIN for a given token IIN. This is currently supported for Visa and MasterCard.

## Supported Length of the IIN

Please make sure to pass the IIN with correct length as described in the table below:

Network | Normal (non-tokenised) Card IINs | Tokenised Card IINs
---
Visa | 6 to 8 digits | 9 digits
---
MasterCard | 6 to 8 digits | 9 digits
---
RuPay| 6 to 8 digits | 9 digits
---
DICL |  6 to 8 digits | Not Supported
---
American Express | 6 to 8 digits | Not Supported
---

## IIN Entity

```json: Entity
{
  "iin": "438628",
  "entity": "iin",
  "network": "Visa",
  "type": "credit",
  "sub_type": "business",
  "issuer_code": "HSBC",
  "issuer_name": "HSBC Bank",
  "international": false,
  "tokenised_iin": false,
  "card_iin": null,
  "emi": {
    "available": false
  },
  "recurring": {
    "available": true
  },
  "authentication_types": [
    {
      "type": "3ds"
    },
    {
      "type": "otp"
    }
  ]
}
```

`iin`
: `string` The Issuer Identification Number (IIN). The starting 6 digits of credit or debit card number. For example, `438628` or `438628111`.

`entity`
: `string` The name of the entity. Here, it is `iin`.

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
  

    
    - `Visa`
    - `MasterCard`
  

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
: `string` The 4-character issuer code unique to each issuing bank. For example, `HSBC`.

`issuer_name`
: `string` The name of the issuing bank. Available for cards issued in India only. For example, `HSBC Bank`.

`emi`
: `json object` A JSON object which provides information about the applicability of EMI on the IIN.

    `available`
    : `boolean` Determines whether the card is eligible for EMI payments or not. Possible values:
      - `true`: IIN is eligible for EMI payments.
      - `false`: IIN is not eligible for EMI payments.

`recurring`
: `json object` A JSON object which provides information about the applicability of recurring payments on the IIN.

    `available`
    : `boolean` Determines whether the card is eligible for recurring payments or not. Possible values:
      - `true`: IIN is eligible for recurring payments.
      - `false`: IIN is not eligible for recurring payments.

`authentication_types`
: `array` Array which lists the possible authentication types for which the IIN is eligible. Possible values:
  - `type: 3ds`: Indicates that the card IIN supports normal 3ds payments.
  - `type: otp`: Indicates that the card IIN supports native OTP payments. Native OTP gives you flexibility to accept the OTP entered by the cardholder on your screen.

## Fetch IIN

The following API helps you get all the information about the IIN:

/iins/:iin

### Path Parameter

`id` _mandatory_
: `string` The first 6 to 9 digits of the customer's card number depending on the network.
  - The IIN length will be 6 digits for:
    - Non-tokenised card IINs for all networks.
    - Tokenised IINs for Amex.
  - The IIN length will be 9 digits for tokenised IINs for Visa and Mastercard.

#### 6-digit IINs

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/iins/438628/

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String tokenIin = "438628";
Iin token = instance.iin.fetch(tokenIin);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

tokenIin = "438628"
client.iin.fetch(tokenIin)

```php: PHP
$api = new Api($key_id, $secret);

$tokenIin = "438628";
$api->iin->fetch($tokenIin);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var tokenIin = "438628";
instance.iins.fetch(tokenIin)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

tokenIin := "438628"

body, err := client.Iin.Fetch(tokenIin, nil, nil)

```json: Response
{
  "iin": "438628",
  "entity": "iin",
  "network": "Visa",
  "type": "credit",
  "sub_type": "business",
  "issuer_code": "HSBC",
  "issuer_name": "HSBC Bank",
  "international": false,
  "emi": {
    "available": true
  },
  "recurring": {
    "available": true
  },
  "authentication_types": [
    {
      "type": "3ds"
    },
    {
      "type": "otp"
    },
    {
      "type": "otp_less_authentication"
    }
  ]
}
```

#### 9-digit IINs

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/iins/987654321/

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String tokenIin = "987654321";
Iin token = instance.iin.fetch(tokenIin);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

tokenIin = "987654321"
client.iin.fetch(tokenIin)

```php: PHP
$api = new Api($key_id, $secret);

$tokenIin = "987654321";
$api->iin->fetch($tokenIin);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var tokenIin = "987654321";
instance.iins.fetch(tokenIin)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

tokenIin := "987654321"

body, err := client.Iin.Fetch(tokenIin, nil, nil)

```json: Response
{
  "iin": "987654321",
  "entity": "iin",
  "network": "Visa",
  "type": "credit",
  "sub_type": "business",
  "issuer_code": "HSBC",
  "issuer_name": "HSBC Bank",
  "international": false,
  "tokenised_iin": true,
  "card_iin": "438628”,
  }
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

## Error Handling

### Invalid IIN

The following error will be shown when the IIN is invalid:

```json: Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "IIN 000000 does not exist",
    "source": "merchant",
    "step": "NA",
    "reason": "iin_does_not_exist",
    "metadata": {}
  }
}
```

### Invalid IIN length

The following error will be shown when the length of IIN is invalid :

```json: Error Response: 6 digits
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The requested IIN is a card IIN & should be 6 digits long.",
    "source": "business",
    "step": "NA",
    "reason": "invalid_iin_length",
    "metadata": {}
  }
}
```json: Error Response: 9 digits
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The requested IIN is a token IIN & should be 9 digits long.",
    "source": "business",
    "step": "NA",
    "reason": "invalid_iin_length",
    "metadata": {}
  }
}
```
