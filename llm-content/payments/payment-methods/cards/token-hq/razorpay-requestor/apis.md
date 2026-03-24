---
title: Tokenisation APIs
description: List of APIs to tokenise customer cards.
---

# Tokenisation APIs

According to recent Payment Acquirer (PA)/ Payment Gateway (PG) guidelines from RBI, businesses cannot save their customers' card numbers and other card data on their servers. Razorpay TokenHQ is a RBI-compliant solution that allows you to save customer credentials with card networks and card-issuing banks. You can use Razorpay Optimizer to route payments through the PA/PG of your choice.

**PA/PGs supported by Razorpay Optimizer**
---
• `amex` 
• `axis_migs` 
• `cashfree` 
• `ccavenue` 
• `cybersource` 
• `first_data` 
• `fss` 
• `hdfc` 
• `mpgs` 
• `paysecure` 
• `paytm` 
• `payu` 
• `zakpay` 

## List of APIs

Given below is the list of APIs:

1. [Token APIs](#1-token-apis).
   - [Token Entity](#token-entity)
   - [Fetch card properties of an existing token](#11-fetch-card-properties-of-an-existing-token)
   - [Delete a token](#12-delete-a-token)
2. [Save card request along with payment](#2-save-card-request-along-with-payment).
3. [Initiate a payment using a previously created token](#3-initiate-payment-using-saved-token).

## 1. Token APIs

Customer card details are saved in the form of tokens. These tokens are used to accept payments from customers.

### Token Entity

Given below is a sample entity.

```json: Entity
{
  "id": "token_4lsdksD31GaZ09",
  "entity": "token",
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": {
    "last4": "3335",
    "network": "Visa",
    "type": "debit",
    "issuer": "HDFC",
    "international": false,
    "emi": true,
    "sub_type": "consumer",
    "token_iin": "453335"
  },
  "compliant_with_tokenisation_guidelines": true,
  "expired_at": 1748716199,
  "status": "active",
  "status_reason": null,
  "notes": []
}
```

`id`
: `string` The unique identifier of the Razorpay token.

`entity`
: `string` The name of the entity. Here, it is `token`.

`customer_id`
: `string` This is the Razorpay customer id. You can create token for a specific customer using their customer id. Use the [Customers API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers.md) to create customer id.

`method`
: `string` The type of object that was tokenised. Currently, it only supports `card`.

`card`
: `object` The customer card details.

    `last4`
    : `string` The last 4 digits of the tokenised card.

    `network`
    : `string` The card network. Possible values:
      - `Visa`
      - `RuPay`
      - `MasterCard`
      - `American Express`
      - `Diners Club`
      - `Maestro`
      - `JCB`
      - `Union Pay`

    `issuer`
    : `string` The 4-character issuer code unique to each issuing bank in India. For example, `HDFC`, `SBIN` and so on.

    `type`
    : `string` The type of card. Possible values:
      - `credit`
      - `debit`
      - `prepaid`

    `international`
    : `boolean` Indicates whether the card is international (issued outside India) or domestic. Possible values:
      - `true`: The card is international.
      - `false`: The card is domestic.

    `emi`
    : `boolean` Indicates whether the card is eligible for EMI payments or not. Possible values:
      - `true`: The card is eligible for EMI payments.
      - `false`: The card is not eligible for EMI payments.

    `sub_type`
    : `string` The card sub_type for the given IIN. Pricing of card payment may change on the basis of card type. Possible values:
      - `consumer`
      - `business`
      - `unknown`

    `token_iin`
    : `string` The unique token IIN.

`compliant_with_tokenisation_guidelines`
: `boolean` Indicates whether the token is compliant with the RBI guidelines. Possible values:
  - `true`: The token is compliant with RBI guidelines.
  - `false`: The token is not compliant with RBI guidelines.

`expired_at`
: `string` The expiry timestamp for the token.

`status`
: `string` The overall status for the token. Possible values:
  - `activated`: This status is attained if the token is activated for at least one of the token service providers.
  - `suspended`: This status is attained if:
      - The token is not activated for any one of the token service providers.
      - The token is suspended for at least one of the token service providers.
  - `deactivated`: This status is attained if token is not activated/suspended for any one of the token service providers and is deactivated for each token service provider.

`status_reason`
: `string` When the token reaches the deactivated state, this field will provide the reason for deactivation. Possible values:
  - `expired`
  - `deactivated_by_bank`

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### 1.1 Fetch Card Properties of an Existing Token

Use this API to retrieve card details such as network, issuer and so on for a given token.

/tokens/fetch

#### Path Parameter

`id` _mandatory_
: `string` The unique identifier of the token.

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/tokens/fetch
-H "content-type: application/json"
-d'{
  "id": "token_4lsdksD31GaZ09"
}'
```json: Response
{
  "id": "token_4lsdksD31GaZ09",
  "entity": "token",
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": {
    "last4": "3335",
    "network": "Visa",
    "type": "debit",
    "issuer": "HDFC",
    "international": false,
    "emi": true,
    "sub_type": "consumer",
    "token_iin": "453335"
  },
  "compliant_with_tokenisation_guidelines": true,
  "expired_at": 1748716199,
  "status": "active",
  "status_reason": null,
  "notes": []
}
```

### 1.2 Delete a Token

Use the following API to delete a token already saved with Razorpay.

/tokens/delete

#### Request Parameter

`id` _mandatory_
: `string` The unique identifier of the token to be deleted.

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X https://api.razorpay.com/v1/tokens/delete
-H "content-type: application/json"
-d '{
  "id" : "token_4lsdksD31GaZ09"
}'
```json: Response
[]
```

## 2. Save Card Request along with Payment

> **INFO**
>
> 
> **Handy Tips**
> 
> This API is available for testing. 
> 

You can create the token when your customer opts to save their card on your checkout during the first payment. As per RBI guidelines, you must collect explicit customer consent to save their card.

- Use the following API to save the customer card details and create a token.
- Pass an additional field `save=true` to save and tokenise the card.
- Use Razorpay Optimizer to route this payment to a PA/PG of your preference.

/payments/create/json

#### Request Parameters

`amount` _mandatory_
: `integer` The payment amount you want to collect from the customer.

`currency` _mandatory_
: `string` The 3-character ISO code of the currency. Here, it is `INR`.

`order_id` _mandatory_
: `string` The unique identifier of the order created for this payment. Create an order using the [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

`email` _mandatory_
: `string` The customer's email address.

`contact` _mandatory_
: `string` The customer's phone number.

`method` _mandatory_
: `string` The payment method. Here, it is `card`.

`card` _mandatory_
: `object` The details of the card.

    `name`
    : `string`  The cardholder's name.

    `number`
    : `string` The card number.

    `expiry_month`
    : `string` The expiry month of the card in `mm` format.

    `expiry_year`
    : `string` The expiry year of the card in `yy` format.

    `cvv` _mandatory_
    : `string` The card's CVV.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     - CVV is not required by default for tokenised cards across all networks.
>     - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>     - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>     - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>     - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.        
>     

`save` _mandatory_
: `boolean` Pass this parameter to save the card details. Possible values:
  - `true`: Saves the card details.
  - `false`: Does not save the card detail.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

```curl: Request
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
    "cvv": "",
    "expiry_month": "12",
    "expiry_year": "21",
    "name": "Gaurav Kumar"
  },
  "save": true,
  "ip": "192.168.0.103",
  "user_agent": "Mozilla/5.0",
  "description": "Test payment",
  "notes": {
    "note_key": "value1"
  }
}'

```json: Response
{
  {
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "redirect",
       "url": "https://api.razorpay.com/v1/payments/FVmAtLUe9XZSGM/authorize"
    },
    {
      "action": "otp_generate",
      "url" : "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate?track_id=FVmAtLUe9XZSGM&key_id="
    }
  ]
}
```

Redirect the customer to the above URL to complete the authentication.

#### Fetch the Token Information

The token is created only if the cardholder successfully completes 3DS authentication.

Use the  Fetch Payment API to fetch the token.

/payments/\{id\}

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/payments/pay_DG4ZdRK8ZnXC3k
```json: Response
{
    "id": "pay_Ja8pfNSq9X0lKL",
    "entity": "payment",
    "amount": 100,
    "currency": "INR",
    "status": "captured",
    "order_id": "order_Ja8o6c5kiUQQ1J",
    "invoice_id": null,
    "international": false,
    "method": "card",
    "amount_refunded": 0,
    "refund_status": null,
    "captured": true,
    "description": "Test payment",
    "card_id": "card_Ja8pfQ4lA8hEjD",
    "bank": null,
    "wallet": null,
    "vpa": null,
    "email": "gaurav.kumar@example.com",
    "contact": "+919090909090",
    "token_id": "token_Ja8pfWDe9HhH6U",
    "notes": {
        "note_key": "value1"
    },
    "fee": 1,
    "tax": 0,
    "error_code": null,
    "error_description": null,
    "error_source": null,
    "error_step": null,
    "error_reason": null,
    "acquirer_data": {
        "auth_code": "358332"
        "arn": "74119663031031075351326",
        "rrn": "303107535132"
    },
    "created_at": 1653630396,
    "authorized_at": 1653630866,
    "auto_captured": true,
    "captured_at": 1653630866,
    "late_authorized": false
}
```

## 3. Initiate Payment using Saved Token

When a customer initiates a subsequent payment using the saved card, use this API to make the payment.

- Pass the token ID from the previous API request to initiate a payment using the token.
- Use Razorpay Optimizer to route this payment to a PA/PG of your preference.

/payments/create/json

#### Request Parameters

`amount` _mandatory_
: `integer` The payment amount you want to collect from the customer.

`currency` _mandatory_
: `string` The 3-character ISO code of the currency. Here, it is `INR`.

`order_id` _mandatory_
: `string` The unique identifier of the order created for this payment. Create an order using the [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

`email` _mandatory_
: `string` The customer's email address.

`contact` _mandatory_
: `string` The customer's phone number.

`method` _mandatory_
: `string` The payment method. Here, it is `card`.

`token` _mandatory_
: `string` The unique identifier of the token.

`card` _mandatory_
: `object` The details of the card.

    `cvv` 
    : `string` The card's CVV number.
    
    
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

    

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”` `.

```curl: Request 
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
      "cvv": ""
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
  {
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "redirect",
       "url": "https://api.razorpay.com/v1/payments/FVmAtLUe9XZSGM/authorize"
    },
    {
      "action": "otp_generate",
      "url" : "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate?track_id=FVmAtLUe9XZSGM&key_id="
    }
  ]
}
```

> **INFO**
>
> 
> **Handy Tips**

> Know more about the [S2S Integration payment flow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md).
> 

### Related Information

- [Customers API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers.md)
- [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md)
- [Server-to-Server JSON V2 Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md)
