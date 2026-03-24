---
title: 1. Create the Authorisation Transaction
description: Create an authorisation transaction for cards using Razorpay APIs.
---

# 1. Create the Authorisation Transaction

@include recurring-payments/create-auth-s2s-tran-two-methods

> **INFO**
>
> 
> **Handy Tips**
> 
> Bank downtime can affect success rates when processing recurring payments via debit cards.
> 

## 1.1. Using Razorpay APIs

@include recurring-payments/create-auth-tran-s2s-checkout-intro

### 1.1.1. Create a Customer

> **INFO**
>
> 
> **Token Sharing for Partner Auth Model**
> 
> If you are a Razorpay Partner, who wants to use this API via Partner Auth, you must ensure the following:
> - Add the basic auth with partner credentials (client_id and client_secret).
> - Add the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. For example, -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
> 
> ```curl: Request
> curl -X POST https://api.razorpay.com/v1/customers \
> -u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
> -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
> ```
> 

@include recurring-payments/customer/api

  
### Request Parameters

     @include recurring-payments/customer/api-req
    

    
### Response Parameters

         @include recurring-payments/customer/api-res 
        

### 1.1.2. Create an Order

@include recurring-payments/auth-order-api-intro

> **INFO**
>
> 
> **Token Sharing for Partner Auth Model**
> 
> If you are a Razorpay Partner, who wants to use this API via Partner Auth, you must ensure the following:
> - Add the basic auth with partner credentials (client_id and client_secret).
> - Add the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. For example, -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
> 
> ```curl: Request
> curl -X POST https://api.razorpay.com/v1/orders \
> -u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
> -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
> ```
> 
> 

@include recurring-payments/card/order-api

    
### Request Parameters

         @include recurring-payments/card/order-api-req
        

    
### Response Parameters

         @include recurring-payments/card/order-api-res
        

### 1.1.3. Create an Authorisation Payment

Once an order is created, your next step is to create a payment. Use the below endpoint to create a payment with payment method `card`.

> **INFO**
>
> 
> **Token Sharing for Partner Auth Model**
> 
> If you are a Razorpay Partner, who wants to use this API via Partner Auth, you must ensure the following:
> - Add the basic auth with partner credentials (client_id and client_secret).
> - Add the `account_id` of the sub-merchant using `X-Razorpay-Account` in the header. For example, -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
> 
> ```curl: Request
> curl -X POST https://api.razorpay.com/v1/create/json \
> -u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
> -H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
> ```
> 
> 

/payments/create/json

```curl: Request
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
 -d '{
  "amount": "100",
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_4xbQrmEoA5WJ01",
  "recurring": true,
  "save": 1,
  "email": "",
  "contact": "",
  "method": "card",
  "card": {
    "number": "4854980604708430",
    "cvv": "",
    "expiry_month": "12",
    "expiry_year": "30",
    "name": ""
  }
}'

```json: Response
{
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/FVmAtLUe9XZSGM/authorize"
    },
    {
      "action": "otp_generate",
      "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate?track_id=FVmAtLUe9XZSGM&key_id="
    }
  ]
}
```

> **INFO**
>
> 
> **Handy Tips**
> 
> - To process recurring transactions, customer card details will need to be secured/tokenised in accordance with the applicable laws. You will be solely responsible for obtaining informed consent from customers for the processing of emandates and such consent shall be explicit and not by way of a forced/default/automatic selection of check box, radio button etc.
> - When the merchant is  sharing `recurring: true` or `preferred`, it is for tokenising the card as per applicable rules for recurring mandate creation.
>  If such consent is not shared during the payment flow, then Razorpay will not tokenise the card or process the emandate/ recurring transaction.
> 

  
### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the minimum value is `100`, that is, .

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment.

`order_id` _mandatory_
: `string` The unique identifier of the order created in [Step 1.1.2.: Create an Order](#112-create-an-order).

`customer_id` _mandatory_
: `string` The unique identifier of the customer.

`recurring` _mandatory_
: `boolean` Possible values:
    - `true`: Recurring payment is enabled.
    - `false`: Recurring payment is not enabled.
   
    
> **INFO**
>
> 
>     **Handy Tips**
>     
>      The `recurring` parameter also supports the value `preferred`. Use this when you want to support recurring payments and one-time payment in the same flow.
>     

`save` _mandatory_
: `integer` Saves the customer's card details. Possible values:
    - `1`: Saves the card details.
    - `0`: Does not save the card details.

    
`email` _mandatory_
: `string` The customer's email address.

`contact` _mandatory_
: `string` The customer's contact number.

`method` _mandatory_
: `string` The payment method selected by the customer. Here, the value must be `card`.

`card`
: `object` The attributes associated with a card.

    `number` _mandatory_
    : `integer` Unformatted card number. This field is required if value of `method` is `card`. Use one of our [test cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/test-card-details.md) to try out the payment flow.

    `name` _mandatory_
    : `string` The name of the cardholder.

    `expiry_month` _mandatory_
    : `integer` The expiry month of the card in `MM` format. For example, `01` for January and `12` for December.

    `expiry_year` _mandatory_
    : `integer` Expiry year for card in the `YY` format. For example, 2030 will be in format `30`.

    `cvv` _mandatory_
    : `integer` CVV printed on the back of the card.
        
        
> **INFO**
>
> 
>         **Handy Tips**
>           - CVV is not required by default for tokenised cards across all networks.
>           - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>           - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>           - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>           - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.          
>         

        
    

  
### Response Parameters

     If the payment request is valid, the response contains the following fields. Refer to the [S2S Json V2 integration document](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/#step-2-create-a-payment.md) for more details.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. Possible values:
      - `otp_generate` - Use this URL to allow the customer to generate OTP and complete the payment on your webpage.
      - `redirect` - Use this URL to redirect the customer to submit the OTP on the bank page.

    `url`
    : `string` URL to be used for the action indicated.
    

After this step, you can proceed to integrate with the [Fetch Token API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/cards/tokens.md).

## 1.2. Using a Registration Link

@include recurring-payments/auth-link-intro-api

A registration link must always have the amount (in currency subunits) that the customer will be charged when making the authorisation payment. For cards, the amount must be a minimum of .

### 1.2.1. Create a Registration Link

@include recurring-payments/card/auth-link

  
### Request Parameters

     @include recurring-payments/auth-link-req-man

     @include recurring-payments/card/auth-link-req

     @include recurring-payments/auth-link-req-opt
    

    
### Response Parameters

         @include recurring-payments/auth-link-res
        

### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

    
### Path Parameters

         @include recurring-payments/send-notification-path-api
        

    
### Response Parameter

`success`
: `boolean` Indicates whether the notifications were sent successfully. Possible values:
        - `true`: The notifications were successfully sent via SMS, email or both.
        - `false`: The notifications were not sent.
        

### 1.2.3. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

    
### Path Parameter

         @include recurring-payments/cancel-path
        

    
### Response Parameter

         @include recurring-payments/auth-link-res
        

After this step, you can proceed to integrate with the [Fetch Token API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/cards/tokens.md).
