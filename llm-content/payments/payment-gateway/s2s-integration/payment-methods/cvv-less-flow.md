---
title: CVV-less Flow for Card Payments
description: Save customer card details as tokens and enable CVV-less payment flows for customers via Razorpay.
---

# CVV-less Flow for Card Payments

CVV-less card payments are recently introduced for saved cards where the card-holder can complete a payment without the card CVV. CVV-less card payments are simple, fast and secure, and do not require a memory test of your customers.

## Recommended Checkout Experience

To provide your customers with a faster and more seamless payment experience, we recommend removing the CVV field from your checkout flow.
- Removing the CVV field encourages customers to use their saved (tokenised) cards, making payments more convenient and frictionless.
- Alternatively, you can also make CVV optional. You can choose to retain the CVV box but mark it as optional, with a clear message such as “CVV not required for tokenised cards”.

> **INFO**
>
> 
> 
> **Note**
> 
> If you are already integrated with Razorpay Standard Checkout, these UI changes are handled automatically and no additional action is required on your part.
> 

> **INFO**
>
> 
> **Handy Tips**
> 
> Offering CVV-less saved card flows to your customers can increase their conversion rate by 4%.
> 

![CVV Less Card Payment Flow GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cvv-less-otp-less.gif.md)

## Saved Card Payment without CVV

```java: Payment Request using token ref
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
  "token" : "token_4lsdksD31GaZ09",
    "card": {
      "cvv": "123"
    },
  "ip": "192.168.0.103",
  "user_agent": "Mozilla/5.0",
  "description": "Test payment",
  "notes": {
    "note_key": "value1"
  }
}'

```java: Payment Request using Cryptogram
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
    "number": "4154980604708430",
    "expiry_month": "12",
    "expiry_year": "21",
    "name": "Gaurav Kumar",
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
```

### Request Parameters

`card` _optional_
: `string` The card’s CVV.

> **INFO**
>
> 
> **Handy Tips**
> 
> CVV-less payments on RuPay is an on-demand feature for standard checkout merchants. Reach out to our [support team](https://razorpay.com/support/#request) for more information.
> 

## Related information

- [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/features/cvv-less-flow/#frequently-asked-questions-faqs.md)
