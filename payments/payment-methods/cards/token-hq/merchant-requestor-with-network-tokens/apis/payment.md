---
title: Process Payments Directly Using Network Tokens API
description: API to directly process payments using network tokens.
---

# Process Payments Directly Using Network Tokens API

Use this API to directly process payments with tokens saved on another PA/PG.

/payments/create/json

> **INFO**
>
> 
> **Handy Tips**
> 
> The payment processing flow is the same as mentioned [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md). However, you need to make the following changes:
> - Pass the token number and token expiry values instead of the card number and card expiry values.
> - Pass the cryptogram (TAVV) in the `cryptogram_value` field.
> 

## Card Payments

```curl: Mastercard, Visa & RuPay
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/payments/create/json
-H "content-type: application/json"
-d '{
  "amount": 500000,
  "currency": "INR",
  "order_id": "order_Fg6IGePNMKDICF",
  "email": "gaurav.kumar@example.com",
  "contact": "9090909090",
  "method": "card",
  "card": {
    "number": "4854980604708430",
    "expiry_month": "12",
    "expiry_year": "21",
    "cryptogram_value": "as34ag3h78dsdasdsd1",
    "cvv": "123",
    "tokenised": true,
    "token_provider": "payu"
  },
  "ip": "192.168.0.103",
  "user_agent": "Mozilla/5.0",
  "description": "Test payment",
  "notes": {
    "note_key": "value1"
  }
}'
```curl: Amex 
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/payments/create/json
-H "content-type: application/json"
-d '{
  "amount": 500000,
  "currency": "INR",
  "order_id": "order_Fg6IGePNMKDICF",
  "email": "gaurav.kumar@example.com",
  "contact": "9090909090",
  "method": "card",
  "card": {
    "number": "4854980604708430",
    "expiry_month": "12",
    "expiry_year": "21",
    "cvv": "123",
    "tokenised": true,
    "token_provider": "payu"
  },
  "ip": "192.168.0.103",
  "user_agent": "Mozilla/5.0",
  "description": "Test payment",
  "notes": {
    "note_key": "value1"
  }
}
```json: Response
{
  "razorpay_payment_id": "pay_IFCxyfBO08Lnb4",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/IFCxyfBO08Lmb4/authenticate"
    }
  ]
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The payment amount you want to collect from the customer.

`currency` _mandatory_
: `string` The 3-character ISO code of the currency. Here, it is `INR`.

`order_id` _mandatory_
: `string` The unique identifier of the order created for this payment. Create an order using the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`email` _mandatory_
: `string` The customer's email address.

`contact` _mandatory_
: `string` The customer's phone number.

`method` _mandatory_
: `string` The payment method. Possible value is `card`.

`card` _mandatory_
: `object` The details of the card.
    
    `number` _mandatory_
    : `string` If payment is made using an actual card, then this field should have the entire actual card number. If card number has spaces, Razorpay will trim them for further processing. If payment is made using a network token, then this field should have the token number. If token number has spaces, Razorpay will trim them for further processing.
    
    `expiry_month` _mandatory_
    : `string` If payment is made using an actual card, then this field should have the 2-digit expiry month for the card. If payment is made using a network token, then this field should have the 2-digit expiry month for the token.

    `expiry_year` _mandatory_
    : `string` If payment is made using an actual card, then this field should have the 2 or 4-digit expiry year for the card. If payment is made using a network token, then this field should have the 2 or 4-digit expiry year for the token.

    `cryptogram_value` __conditionally mandatory_
    : `string` The cryptogram value for the token. This will be provided by the entity which provided the token. This field is mandatory if `tokenised=true` only for Visa, Mastercard and Rupay. Do not pass this for Amex cards.

    `tokenised` _optional_
    : `boolean` Indicates if the payment is made using tokenised card or actual card. Possible values:
      - `true`: Pass `true` when you are making the payment using a token.
      - `false` (default): Pass `false` when you are making the payment using a card.

    `token_provider` _optional_
    : `string` The name of the aggregator that provided the token. Possible values:
      - `amex`
      - `axis_migs`
      - `cashfree`
      - `ccavenue`
      - `cybersource` 
      - `first_data`  
      - `fss`
      - `hdfc`
      - `mpgs`
      - `paysecure`
      - `paytm`
      - `payu`
      - `zaakpay`
      - `Visa`
      - `RuPay`
      - `MasterCard`

    `cvv` _mandatory_
    : `string` The card's cvv. For Amex tokenised cards, this will be a dynamic CVV provided by Amex for every payment on the tokenised card. Dynamic CVV is valid for about 20 minutes.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Response Parameters

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

`action`
: `string` An indication of the next step available to you to continue the payment process. Possible value:
  - `redirect`: Use this URL to redirect the customer to submit the OTP on the bank page.

`url`
: `string` URL to be used for the action indicated.

## EMI Payments

> **INFO**
>
> 
> **Handy Tips**
> 
> The payment processing flow is the same as mentioned [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods.md#emi). However, you need to make the following changes:
> - Pass the token number and token expiry values instead of the card number and card expiry values.
> - Pass the cryptogram (TAVV) in the `cryptogram_value` field.
> - Additionally, provide the actual card's last 4 digits along with tokens for EMI payments.
> 

```curl: Mastercard, Visa & RuPay
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/payments/create/json
-H "content-type: application/json"
-d '{
  "amount": 500000,
  "currency": "INR",
  "order_id": "order_Fg6IGePNMKDICF",
  "email": "gaurav.kumar@example.com",
  "contact": "9090909090",
  "method": "emi",
  "emi_duration": 9,
  "card": {
    "number": "4154980604708430",
    "expiry_month": "12",
    "expiry_year": "21",
    "cryptogram_value": "as34ag3h78dsdasdsd1",
    "cvv": "123",
    "tokenised": true,
    "token_provider": "payu",
    "last4": "8430"
  },
  "ip": "192.168.0.103",
  "user_agent": "Mozilla/5.0",
  "description": "Test payment",
  "notes": {
    "note_key": "value1"
  }
}'
```curl: Amex
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/payments/create/json
-H "content-type: application/json"
-d '{
  "amount": 500000,
  "currency": "INR",
  "order_id": "order_Fg6IGePNMKDICF",
  "email": "gaurav.kumar@example.com",
  "contact": "9090909090",
  "method": "emi",
  "emi_duration": 9,
  "card": {
    "number": "4154980604708430",
    "expiry_month": "12",
    "expiry_year": "21",
    "cvv": "123",
    "tokenised": true,
    "token_provider": "payu",
    "last4": "8430"
  },
  "ip": "192.168.0.103",
  "user_agent": "Mozilla/5.0",
  "description": "Test payment",
  "notes": {
    "note_key": "value1"
  }
}'
```json: Response
{
  "razorpay_payment_id": "pay_IFCxyfBO08Lnb4",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/IFCxyfBO08Lmb4/authenticate"
    }
  ]
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` The payment amount you want to collect from the customer.

`currency` _mandatory_
: `string` The 3-character ISO code of the currency. Here, it is `INR`.

`order_id` _mandatory_
: `string` The unique identifier of the order created for this payment. Create an order using the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`email` _mandatory_
: `string` The customer's email address.

`contact` _mandatory_
: `string` The customer's phone number.

`method` _mandatory_
: `string` The payment method. Possible value is `emi`.

`emi_duration` _mandatory_
  : `integer` The EMI duration in months.

`card` _mandatory_
: `object` The details of the card.
    
    `number` _mandatory_
    : `string` If payment is made using an actual card, then this field should have the entire actual card number. If card number has spaces, they will be trimmed by Razorpay for further processing. If payment is made using a network token, then this field should have the token number. If token number has spaces, they will be trimmed by Razorpay for further processing.
    
    `expiry_month` _mandatory_
    : `string` If payment is made using an actual card, then this field should have the 2-digit expiry month for the card. If payment is made using a network token, then this field should have the 2-digit expiry month for the token.

    `expiry_year` _mandatory_
    : `string` If payment is made using an actual card, then this field should have the 2 or 4-digit expiry year for the card. If payment is made using a network token, then this field should have the 2 or 4-digit expiry year for the token.

    `cryptogram_value` __conditionally mandatory_
    : `string` The cryptogram value for the token. This will be provided by the entity which provided the token. This field is mandatory if `tokenised=true`.

    `tokenised` _optional_
    : `boolean` Indicates if the payment is made using tokenised card or actual card. Possible values:
      - `true`: Pass `true` when you are making the payment using a token.
      - `false` (default): Pass `false` when you are making the payment using a card.

    `token_provider` _optional_
    : `string` The name of the aggregator that provided the token. Possible values:
      - `amex`
      - `axis_migs`
      - `cashfree`
      - `ccavenue`
      - `cybersource` 
      - `first_data`  
      - `fss`
      - `hdfc`
      - `mpgs`
      - `paysecure`
      - `paytm`
      - `payu`
      - `zaakpay`
      - `Visa`
      - `RuPay`
      - `MasterCard`

    `cvv` _mandatory_
    : `string` The card's cvv.

    `last4` _conditionally mandatory_
    : `string` The last four digits of the credit card used to make the EMI payment. This parameter is mandatory if `method=emi` and `tokenised=true`.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Response Parameters

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

`action`
: `string` An indication of the next step available to you to continue the payment process. Possible value:
  - `redirect`: Use this URL to redirect the customer to submit the OTP on the bank page.

`url`
: `string` URL to be used for the action indicated.
