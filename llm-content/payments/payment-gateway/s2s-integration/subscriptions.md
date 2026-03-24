---
title: Subscriptions - S2S Integration
description: Create and fetch Plans and Subscriptions. Create and delete Add-ons using Razorpay Subscriptions APIs.
---

# Subscriptions - S2S Integration

You can create, fetch, query or cancel plans, subscriptions and addons using the Subscriptions API. These operations can also be performed on the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions.md).

## Plans

@include subscriptions/plans/plans-intro

### Create a Plan

Use the below endpoint to create a plan.

/plans

#### Request Parameters

@include subscriptions/plans/plans-create-req

@include subscriptions/plans/plans-create

#### Response Parameters

@include subscriptions/plans/plans-create-res

### Fetch all Plans

Use the below endpoint to fetch details of all plans.

/plans

#### Query Parameters

@include subscriptions/plans/plans-query

@include subscriptions/plans/plans-fetch-all

### Fetch a Plan by ID

Use the below endpoint to fetch details of a plan by its unique identifier.

/plans/:id

#### Path Parameter

@include subscriptions/plans/plans-path

@include subscriptions/plans/plans-fetch

## Subscriptions

@include subscriptions/subscriptions/subscriptions-intro

### Create a Subscription

@include subscriptions/subscriptions/subscriptions-create

> **INFO**
>
> 
> **Handy Tips**
> 
> - In order to process subscription, customer card details will need to be secured/tokenised in accordance with the applicable laws. The merchant will be solely responsible for obtaining informed consent from customers for the processing of e-mandates and such consent shall be explicit and not by way of a forced/default/automatic selection of check box, radio button etc.
> - When the merchant is  sharing `plan_id : unique identifier`, it is for  tokenising the card as per applicable rules for subscription mandate creation.
>  If such consent is not shared during the payment flow, then Razorpay will not tokenise the card or process the e-mandate/ subscription transaction.
> 

#### Request Parameters

@include subscriptions/subscriptions/subscriptions-create-req

#### Response Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Create a Subscription Link

@include subscriptions/subscriptions/subscriptions-link-create

> **INFO**
>
> 
> **Handy Tips**
> 
> - In order to process subscription, customer card details will need to be secured/tokenised in accordance with the applicable laws. The merchant will be solely responsible for obtaining informed consent from customers for the processing of e-mandates and such consent shall be explicit and not by way of a forced/default/automatic selection of check box, radio button etc.
> - When the merchant is  sharing `plan_id : unique identifier`, it is for  tokenising the card as per applicable rules for subscription mandate creation.
>  If such consent is not shared during the payment flow, then Razorpay will not tokenise the card or process the e-mandate/ subscription transaction.
> 

#### Request Parameters

@include subscriptions/subscriptions/subscriptions-create-req

@include subscriptions/subscriptions/subscriptions-link-create-req

#### Response Parameters

@include subscriptions/subscriptions/subscriptions-create-res

### Fetch All Subscriptions

@include subscriptions/subscriptions/subscriptions-fetch-all

#### Query Parameters

@include subscriptions/subscriptions/subscriptions-query

### Fetch Subscription by ID

@include subscriptions/subscriptions/subscriptions-fetch

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

### Cancel a Subscription

@include subscriptions/subscriptions/subscriptions-cancel

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

#### Request Parameter

@include subscriptions/subscriptions/subscriptions-cancel-request

### Update a Subscription

@include subscriptions/subscriptions/subscriptions-update

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

#### Request Parameters

@include subscriptions/subscriptions/subscriptions-update-request

### Fetch Details of a Pending Update

@include subscriptions/subscriptions/subscriptions-fetch-pending-update

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

### Cancel an Update

@include subscriptions/subscriptions/subscriptions-cancel-update

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

### Pause a Subscription

@include subscriptions/subscriptions/subscriptions-pause

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

#### Request Parameters

@include subscriptions/subscriptions/subscriptions-pause-req

### Resume a Subscription

@include subscriptions/subscriptions/subscriptions-resume

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-path

#### Request Parameters

@include subscriptions/subscriptions/subscriptions-resume-req

### Fetch All Invoices for a Subscription

@include subscriptions/subscriptions/subscriptions-invoice

#### Query Parameter

@include subscriptions/subscriptions/subscriptions-invoice-query

#### Response Parameters

@include subscriptions/subscriptions/subscriptions-invoice-res

### Delete an Offer Linked to a Subscription

@include subscriptions/subscriptions/subscriptions-delete-offer

#### Path Parameters

@include subscriptions/subscriptions/subscriptions-delete-offer-path

## Authentication Transaction

### Create Authentication Transaction

After you create a plan and a subscription, you have to create an authentication transaction. This authenticates the customer's payment method and authorizes you to collect recurring payments via the authenticated payment method.

Use the below endpoint to create an authentication transaction with method `card`.

/payments/create/json

```curl: Request
curl -u : \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
 -d '{
  "amount": "100",
  "currency": "INR",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "subscription_id": "sub_00000000000001",
  "method": "card",
  "card": {
    "number": "4854980604708430",
    "cvv": "",
    "expiry_month": "12",
    "expiry_year": "21",
    "name": "Gaurav Kumar"
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

#### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the minimum value is `100` ().

`subscription_id` _mandatory_
: `string` The unique identifier of the subscription. For example, `sub_00000000000001`.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`email` _mandatory_
: `string` The customer's email address. For example, `gaurav.kumar@example.com`.

`contact` _mandatory_
: `string` The customer's contact number. For example, `9123456780`.

`method` _mandatory_
: `string` The payment method selected by the customer. Here, the value must be `card`.

`card`
: The attributes associated with a card.

    `number` _mandatory_
    : `integer` Unformatted card number. This field is required if value of `method` is `card`. Use one of our test cards to try out the payment flow.

    `name` _mandatory_
    : `string` The name of the cardholder.

    `expiry_month` _mandatory_
    : `integer` The expiry month of the card in `MM` format. For example, `01` for January and `12` for December.

    `expiry_year` _mandatory_
    : `integer` Expiry year for card in the `YY` format. For example, 2025 will be in format `25`.

    `cvv` _mandatory_
    : `integer` CVV printed on the back of the card.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>      - CVV is not required by default for tokenised cards across all networks.
>      - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>      - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>      - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>      - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.         
>     

#### Response Parameters

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

### Verify Payment

@include subscriptions/payment-verification

## Add-ons

@include subscriptions/add-ons/add-ons-intro

### Create an Add-on

@include subscriptions/add-ons/add-ons-create

#### Path Parameter

`id` _mandatory_
: `string` The subscription ID to which the add-on is being added.

#### Request Parameters

@include subscriptions/add-ons/add-ons-create-req

#### Response Parameters

@include subscriptions/add-ons/add-ons-create-res

### Fetch all Add-ons

@include subscriptions/add-ons/add-ons-fetch-all

#### Query Parameters

@include subscriptions/add-ons/add-ons-query

### Fetch an Add-on by ID

@include subscriptions/add-ons/add-ons-fetch

#### Path Parameter

@include subscriptions/add-ons/add-ons-path

### Delete an Add-on

@include subscriptions/add-ons/add-ons-delete

#### Path Parameter

@include subscriptions/add-ons/add-ons-path

## Webhooks

### Available Webhook Events

Refer to the Webhooks section for a list of available webhook events for Subscriptions.

### Setup Webhooks

Refer to the Webhooks section to learn how to setup webhooks.

### Sample Payloads

Refer to the Webhooks section for sample payloads.

### Related Information

- [API authentication](@/Applications/MAMP/htdocs/new-docs/llm-content/api.md)
- [Subscription product documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions.md)
