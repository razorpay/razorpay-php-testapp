---
title: Card Fingerprints (or PAR) API
description: Retrieve a unique card reference for a given card or token using the Card Fingerprints API.
---

# Card Fingerprints (or PAR) API

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> 
> 

 to get this feature activated on your account.

Razorpay works with card networks to return a unique card fingerprint for each card and all tokens created against that card.

This value is unique across the payment ecosystem. It means this fingerprint will act as a global identifier and will not change while processing payments.

You can use the Card Fingerprints API to retrieve:

- **Payment Account Reference** for Mastercard and Visa cards.
- **Network Reference id** for non-tokenised RuPay cards.

## What is Payment Account Reference

Payment Account Reference (PAR) is a 29-character identifier associated with a specific card. It is independent of Razorpay and is provided by card networks and card-issuing banks.

## What is Network Reference ID

Card networks need issuing banks' support to generate PAR value. However, RuPay currently has very low coverage on PAR value and needs to work with a large number of banks to increase the coverage. To overcome this challenge they have introduced - network reference id.
It works in the same way as the PAR value and is 36-character long. The token create API call returns the Network Reference id.

Razorpay returns both **network reference id** as well as **PAR** value wherever available for RuPay Cards.

## Use cases
This API is helpful for card identification in various situations:
- Restricting the number of times an offer is availed on the card.
- Applying risk checks as to how many times a card is used or if it is associated with fraud users.
- Block existing and newly blacklisted cards.

## List of Endpoints

> **INFO**
>
> 
> **Handy Tips**
> 
> You can initiate a request for a card reference number using the following:
>   - Card number
>   - Tokenised card number
>   - Razorpay token 
> 

API Endpoint | Description
---
[Fetch Card Reference Number Using Card Number](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/cards/fingerprints/fetch-card-number.md) | Fetches the card reference number for a specific card using card number.
---
[Fetch Card Reference Number Using Tokenised Card Number](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/cards/fingerprints/fetch-tokenised-number.md) | Fetches the card reference number for a specific card using tokenised card number.
---
[Fetch Card Reference Number Using Razorpay Token](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/cards/fingerprints/fetch-razorpay-token.md) | Fetches the card reference number for a specific card using Razorpay Token.

## Card Fingerprint Entity

`network`
: `string` The card network. Possible values:
    - `Mastercard`
    - `RuPay`
    - `Visa`

`payment_account_reference`
: `string` The 29-character unique identifier for Mastercard and Visa cards. For RuPay cards, the value is `null`.

`network_reference_id`
: `string` The unique identifier generated for RuPay cards.

```json: Sample Entity
{
  "network": "Visa",
  "payment_account_reference": "V0010013819231376539033235990",
  "network_reference_id": null
}
```

`network`
: `string` The card network. Possible values:
    - `Mastercard`
    - `RuPay`
    - `Visa`

`payment_account_reference`
: `string` The 29-character unique identifier for Mastercard and Visa cards. For RuPay cards, the value is `null`.

`network_reference_id`
: `string` The unique identifier generated for RuPay cards.
