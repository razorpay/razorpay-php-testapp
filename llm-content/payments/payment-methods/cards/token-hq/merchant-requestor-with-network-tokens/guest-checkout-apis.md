---
title: Guest Checkout APIs for Alt ID Requestors
description: Implement Alt ID for Guest Checkout payments, ensuring compliance with RBI guidelines.
---

# Guest Checkout APIs for Alt ID Requestors

As per the latest RBI guidelines for Payment Acquirers (PA) and Payment Gateways (PG), guest checkout payments need to use an Alternate Identifier, known as Alt ID. 

If you are a token requestor directly integrated with a payment network, you can consider one of these approaches:

1. [**You are the Alt ID requestor**](#approach-1-you-are-the-alt-id-requestor): Before initiating the payment, you fetch the Alt ID from networks and process the payment with Razorpay using Alt ID details.

2. [**Razorpay is the Alt requestor and payment processor**](#approach-2-razorpay-as-the-alt-id-requestor): Razorpay will fetch the Alt ID from networks and process the payment. You can continue using our Create Payment APIs.

> **INFO**
>
> 
> **Handy Tips**
> 
> The first approach is only possible for Visa, Mastercard, Amex and Diners payments. Razorpay will be the token and the Alt ID requestor for all Rupay payments.
> 

## Approach 1: You are the Alt ID Requestor

Use this API to make the payment when a customer initiates a payment.

/payments/create/json 

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "content-type: application/json" \
-d '{
  "amount": 500000,
  "currency": "INR",
  "order_id": "order_Fg6IGePNMKXXXX",
  "email": "gaurav.kumar@example.com",
  "contact": "9090909090",
  "method": "card",
  "card": {
    "number": "4386289407660153",
    "expiry_month": "12",
    "expiry_year": "30",
    "cryptogram_value": "as34ag3h78dsdasdsd1",
    "cvv": "123",
    "tokenised": false,
    "token_provider": "Visa",
    "provider_type": "network"
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

### Request Parameters

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
: `string` The payment method. Here, it is `card`.

`card` _mandatory_
: `object` The details of the card.

   `expiry_month`
   : `integer` The expiry month of Alt ID.
   
   
> **INFO**
>
> 
>    **Handy Tips**
>    
>     For Visa, add the original card expiry month.
>    

   `expiry_year`
   : `integer` The expiry year Alt ID.

   
> **INFO**
>
> 
>    **Handy Tips**
>    
>     For Visa, add the original card expiry year.
>    

  
   `number`  _mandatory_
   : `integer` Alt ID.

   `cryptogram_value` 
   : `string` The Alt cryptogram value.

   `tokenised` _mandatory_
   : `boolean` Indicates if the payment is made using tokenised card or actual card. Possible values:
      - `true`: Pass `true` when you are making the payment using a token.
      - `false` (default): Pass `false` when you are making the payment using an Alt ID. 

   `token_provider` _mandatory_
    : `string` The name of the aggregator that provided the token. Possible values:
        - Visa
        - Mastercard
        - Amex
        - Rupay
        - HDFC for Diners

   `cvv` 
    : `string` The card's CVV number.

## Approach 2: Razorpay as Alt ID Requestor

Use this API to make the payment when a customer initiates a payment.

> **INFO**
>
> 
> **Handy Tips**
> 
> Approach 2 is applicable only for Visa, Mastercard, Diners, and Amex payments. If you are processing Rupay payments, you should initiate the payment request using plain card details.
> 

/payments/create/json 

```curl: Request
curl -X POST \
https://api.razorpay.com/v1/payments/create/json \
-u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-H "Content-Type: application/json" \
-d '{
	"amount": 100,
	"currency": "INR",
	"contact": "9900008989",
	"email": "gaurav.kumar@example.com",
	"order_id": "order_DPzFe1Q1dEOKed",
	"method": "card",
	"card":{
    	   "number": "4386289407660153",
    	   "name": "Gaurav",
    	   "expiry_month": "11",
    	   "expiry_year": "30",
    	   "cvv": "100"
      },
      "authentication":{
    	   "authentication_channel": "browser"
      },
      "browser":{
    	   "java_enabled": false,
    	   "javascript_enabled": false,
    	   "timezone_offset": 11,
    	   "color_depth": 23,
    	   "screen_width": 23,
    	   "screen_height": 100
     },
     "ip": "105.106.107.108",
     "referer": "https://merchansite.com/example/paybill",
     "user_agent": "Mozilla/5.0" 
}'
```json: Response
{
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/authorize"
    },
    {
      "action": "otp_generate",
      "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate?track_id=FVmAtLUe9XZSGM&key_id="
    }
  ]
}
```

### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field. 

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, INR for Alt ID payments. 

`order_id` _mandatory_
: `string` Unique identifier of the Order generated in the first step.

`email` _mandatory_
: `string` Email address of the customer. The maximum length supported is 40 characters.

`contact` _mandatory_
: `string` Phone number of the customer. The maximum length supported is 15 characters, inclusive of country code.

`method` _mandatory_
: `string` Name of the payment method. Possible value is `card`.

`card` _mandatory_
: `object` Details associated with the card.

    `number`
    : `string` Unformatted card number.

    `name`
    : `string` Name of the cardholder.

    `expiry_month`
    : `string` Expiry month for the card in MM format.

    `expiry_year`
    : `string` Expiry year for the card in YY format.

    `cvv`
    : `string` CVV printed on the back of the card.

`user-agent` _mandatory_
: `string` The User-Agent header of the user's browser. The default value will be passed by Razorpay if not provided by you.

`ip` _mandatory_
: `string` The customer's IP address.

`authentication` _optional_
: `object` Details of the authentication channel.

    `authentication_channel`
    : `string` The authentication channel for the payment. Possible values:
      - `browser` (default)
      - `app`

`browser` _mandatory_
: `object` Information regarding the customer's browser. This parameter need not be passed when `authentication_channel=app`.

    `java_enabled`
    : `boolean` Indicates whether the customer's browser supports Java. Obtained from the `navigator` HTML DOM object. Possible values:
        - `true`: Customer's browser supports Java.
        - `false`: Customer's browser does not support Java.

    `javascript_enabled`
    : `boolean` Indicates whether the customer's browser can execute JavaScript. Obtained from the `navigator` HTML DOM object. Possible values:
        - `true`: Customer's browser can execute JavaScript.
        - `false`: Customer's browser cannot execute JavaScript.

    `timezone_offset`
    : `integer` Time difference between UTC time and the cardholder's browser local time. Obtained from the `getTimezoneOffset()` method applied to the `Date` object.

    `screen_width`
    : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

    `screen_height`
    : `integer` Obtained from the `navigator` HTML DOM object.

    `color_depth`
    : `integer` Obtained from the payer's browser using the `screen.colorDepth` HTML DOM property.

    `language`
    : `string` Obtained from the payer's browser using the `navigator.language` HTML DOM property. Maximum limit of 8 characters.

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`referrer` _optional_
: `string` Referrer header passed by the client's browser.
