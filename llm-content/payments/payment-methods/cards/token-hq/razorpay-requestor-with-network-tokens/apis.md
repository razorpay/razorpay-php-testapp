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

1. Token APIs
   - [Token Entity](#token-entity)
   - [Fetch card properties of an existing token](#11-fetch-card-properties-of-an-existing-token)
   - [Delete a token](#12-delete-a-token)
2. [Save card request along with payment](#2-save-card-request-along-with-payment)
3. [Initiate a payment using a previously created token](#3-initiate-payment-using-saved-token)
4. [Process a Payment on another PA/PG with Token Created on Razorpay](#4-process-a-payment-on-another-pa-pg)

## 1. Tokenise Cards

You can save customer card details in the form of tokens and then use these tokens to accept payments from customers.

### Token Entity

Given on the right is a sample entity.

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
  "service_provider_tokens": [
    {
      "id": "spt_1234abcd",
      "entity": "service_provider_token",
      "provider_type": "network",
      "provider_name": "Visa",
      "interoperable": true,
      "status": "active",
      "status_reason": null,
      "provider_data": {
        "token_reference_number": "sas7wqaoidasdfssdjjk",
        "payment_account_reference": "8324ssdas7wqaoidassdjjk",
        "token_iin": "453335",
        "token_expiry_month": 12,
        "token_expiry_year": 2021
      },
      "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "Authentication failed due to incorrect CVV",
        "field": null,
        "source": "bank",
        "step": "token_creation",
        "reason": "invalid_cvv",
        "metadata": {}
      }
    },
    {
      "id": "spt_1234abcd",
      "entity": "service_provider_token",
      "provider_type": "aggregator",
      "provider_name": "razorpay",
      "interoperable": false,
      "status": "active",
      "status_reason": null,
      "provider_data": {
        "expired_at": 1748716199
      },
      "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "Authentication failed due to incorrect CVV",
        "field": null,
        "source": "bank",
        "step": "token_creation",
        "reason": "invalid_cvv",
        "metadata": {}
      }
    }
  ],
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
: `string` This is the Razorpay customer id. You can create token for a specific customer using their customer id. Use the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md) to create customer id. This is an optional parameter.

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
      - MasterCard`
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
    : `string` The token IIN provided by the card network. When a token is created with card networks such as Visa or MasterCard, this field will have the token IIN. This will be useful to fetch all the token properties so that you can apply your existing IIN validations and processing. This field will be absent when the token is created by a token service provider other than the card network.

`compliant_with_tokenisation_guidelines`
: `boolean` Indicates whether the token is compliant with the RBI guidelines. Possible values:
  - `true`: The token is compliant with RBI guidelines.
  - `false`: The token is not compliant with RBI guidelines.

`service_provider_tokens`
: `array` Every Razorpay token will have one or more token service providers(card networks, issuing banks or Razorpay). For each service provider, Razorpay will return a service provider token. This service provider token is the raw token returned by the token service provider (card network or issuer). Currently, we will have only card networks as token service providers. In future, a token may be created with more than one service provider. A token can be created with one or more of the following service providers:
  
> **INFO**
>
> 
>   **Handy Tips**
> 
>   The `service_provider_tokens` object is an on-demand feature, made available only to PCI DSS compliant businesses.
>   

    `id`
    : `string` The unique identifier of the token.

    `entity`
    : `string` The name of the entity. Here, it is `service_provider_token`.

    `provider_type`
    : `string` The type of provider through which the token was created. Possible values:
      - `network`
      - `issuer`
      - `aggregator` (When the token provider is Razorpay.)

    `provider_name`
    : `string` The name of the provider through which the token was created. Possible values:
      - `Visa`
      - `MasterCard`
      - `HDFC`
      - `razorpay`

    `interoperable`
    : `boolean` This field suggests if the token provided is interoperable across different acquirers. Possible values:
      - `true`: The token is interoperable.
      - `false`: The token is not interoperable.

    `status`
    : `string` The current status for the token as provided by the token service provider. Possible values:
      - `active`
      - `suspended`
      - `deactivated`
      - `failed`
      
 Know about the complete list of [token states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/merchant-requestor-with-network-tokens/token-lifecycle.md).

    `status_reason`
    : `string` When the token status is deactivated, this field will provide the reason for deactivation. Possible values:
      - `expired`
      - `deactivated_by_bank`

    `provider_data`
    : `object` Service provider data.

        `token_reference_number`
        : `string` The token reference number provider by the token provider.

        `payment_account_reference`
        : `string` The unique card identifier provided by the token provider. If the `service_provider` is `network`, this identifier will be consistent for a given card across the card network ecosystem.

        `token_iin`
        : `string` The IIN of the token thus created. The IIN will be helpful to fetch all the properties of the token and apply your existing IIN validations and processes.

        `token_expiry_month`
        : `string` The expiry date for the token. The format used is `mm`.

        `token_expiry_year`
        : `string` The expiry year for the token. The format used is `yyyy`.

    `error`
    : `object` Details of error.

        `code`
        : `string` Type of the error.

        `description`
        : `string` Description of the error.

        `field`
        : `string` Name of the parameter that caused the error.

        `source`
        : `string` The point of failure in token creation.

        `step`
        : `string` The stage where the failure occurred.

        `reason`
        : `string` The exact error reason.

        `metadata`
        : `object` Contains additional information about the request.

`expired_at`
: `string` The expiry timestamp for the token.

`status`
: `string` The overall status for the token. Possible values:
  - `initiated`: The token attains this state after Razorpay has received the tokenisation request and is working with token service providers for creating the token.
  - `active`: The token attains this state if the token is activated for at least one of the token service providers.
  - `suspended`: The token attains this state if:
    - The token is not activated for any one of the token service providers.
    - The token is suspended for at least one of the token service providers.
  - `deactivated`: The token attains this state if the token is not `active`/`suspended` for any one of the token service providers and is deactivated for at least one token service provider. 

 Know about the complete list of [token states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/merchant-requestor-with-network-tokens/token-lifecycle.md#overall-token-states).

`status_reason`
: `string` When the token reaches the `deactivated` state, this field will provide the reason for deactivation. Possible values:
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
  "service_provider_tokens": [
    {
      "id": "spt_1234abcd",
      "entity": "service_provider_token",
      "provider_type": "network",
      "provider_name": "Visa",
      "interoperable": true,
      "status": "active",
      "status_reason": null,
      "provider_data": {
        "token_reference_number": "sas7wqaoidasdfssdjjk",
        "payment_account_reference": "8324ssdas7wqaoidassdjjk",
        "token_iin": "453335",
        "token_expiry_month": 12,
        "token_expiry_year": 2021
      },
      "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "Authentication failed due to incorrect CVV",
        "field": null,
        "source": "bank",
        "step": "token_creation",
        "reason": "invalid_cvv",
        "metadata": {}
      }
    },
    {
      "id": "spt_1234abcd",
      "entity": "service_provider_token",
      "provider_type": "aggregator",
      "provider_name": "razorpay",
      "interoperable": false,
      "status": "active",
      "status_reason": null,
      "provider_data": {
        "expired_at": 1748716199
      },
      "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "Authentication failed due to incorrect CVV",
        "field": null,
        "source": "bank",
        "step": "token_creation",
        "reason": "invalid_cvv",
        "metadata": {}
      }
    }
  ],
  "expired_at": 1748716199,
  "status": "active",
  "status_reason": null,
  "notes": []
}
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

You can create the token when your customer opts to save their card on your checkout during the first payment. As per RBI guidelines, you must collect customer consent to save their card.

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
: `string` The unique identifier of the order created for this payment. Create an order using the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`customer_id` _optional_
: `string` Unique identifier of customer.

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
    : `string` The card's cvv.

`save` _mandatory_
: `boolean` Pass this parameter to save the card details. Possible values:
  - `true`: Saves the card details.
  - `false`: Does not save the card details.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/payments/create/json
-H "content-type: application/json"
-d'{
  "amount": 500000,
  "currency": "INR",
  "order_id": "order_Fg6IGePNMKDICF",
  "email": "gaurav.kumar@example.com",
  "contact": "9090909090",
  "customer_id": "cust_DtHaBuooGHTuyZ",
  "method": "card",
  "card": {
    "number": "4854980604708430",
    "cvv": "123",
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

/payments/`\{id\}`?expand[]=token

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/payments/pay_DG4ZdRK8ZnXC3k?expand[]=token
```json: Response
{
  "id": "pay_G8VQzjPLoAvm6D",
  "entity": "payment",
  "amount": 1000,
  "currency": "INR",
  "status": "captured",
  "order_id": "order_G8VPOayFxWEU28",
  "invoice_id": null,
  "international": false,
  "method": "card",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": true,
  "description": "Purchase Shoes",
  "card_id": null,
  "bank": null,
  "wallet": null,
  "vpa": "gaurav.kumar@exampleupi",
  "email": "gaurav.kumar@example.com",
  "contact": "+919000090000",
  "customer_id": "cust_DitrYCFtCIokBO",
  "notes": [],
  "fee": 24,
  "tax": 4,
  "error_code": null,
  "error_description": null,
  "error_source": null,
  "error_step": null,
  "error_reason": null,
  "acquirer_data": {
    "rrn": "033814379298"
  },
  "created_at": 1606985209,
  "token": {
    "id": "token_4lsdksD31GaZ09",
    "entity": "token",
    "method": "card",
    "card": {
      "last4": "8430",
      "network": "Visa",
      "type": "debit",
      "issuer": "HDFC",
      "international": false,
      "emi": true,
      "sub_type": "consumer",
      "token_iin": "333135"
    },
    "expiry_month": 12,
    "expiry_year": 2021,
    "expired_at": 1748716199,
    "status": "active"
  }
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
: `string` The unique identifier of the order created for this payment. Create an order using the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

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

    `cvv` _optional_
    : `string` The card's cvv.

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
> 
> Know more about the [S2S Integration payment flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md).
> 

## 4. Process a Payment on another PA/PG with Token Created on Razorpay

To process a payment on the tokenised card on another PA/PG, you will need the token and relevant additional data for each token.
- The data required may vary for different networks.
- Use the API given below to obtain the token and the relevant data.
- You can pass this data to any PA/PG to process the payment.

/tokens/service_provider_tokens/token_transactional_data

#### Request Parameters

`id` _mandatory_
: `string` The unique identifier of the token.

#### Response Parameters

`token_number`
: `string` The unique reference number generated for the token. For example, `4016981500100002`.

`cryptogram_value`
: `string` The token cryptogram value.

`token_expiry_month`
: `integer` The token expiry month in `mm` format.

`token_expiry_year`
: `integer` The token expiry year in `yyyy` format.

`cvv` _amex only_
: `integer` A dynamic 4-digit number printed on the front of the `Amex` card. This cvv should be passed in the CVV field to your PA/PG for processing the payment.

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/tokens/service_provider_tokens/token_transactional_data
-H "content-type: application/json"
-d '{
  "id": "spt_4lsdksD31GaZ09"
}'
```json: Response - Visa, MasterCard & RuPay
{
  "token_number": "4016981500100002",
  "cryptogram_value": "a345345dfgdfasdfh45jtyhgjkyutsdasd2",
  "token_expiry_month": 12,
  "token_expiry_year": 2021
}
```json: Response - Amex
{
  "token_number": "4016981500100002",
  "cvv": "1234",
  "token_expiry_month": 12,
  "token_expiry_year": 2021
}
```json: Error Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The token is invalid.",
    "source": "business",
    "step": "get_cryptogram",
    "reason": "invalid_token"
  }
}
```
