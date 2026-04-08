---
title: Token Sharing for Partner Auth Model
description: Provide a superior card payments experience to customers using the Token Sharing feature available under Partner Auth model.
---

# Token Sharing for Partner Auth Model

According to new [Card-on-File tokenisation guidelines from RBI](https://razorpay.com/blog/card-on-file-tokenisation-all-you-need-to-know/), businesses cannot save their customer's card credentials (card number and other card data) on their own servers.

Razorpay has introduced an end-to-end RBI-compliant solution, [TokenHQ](https://razorpay.com/card-tokenisation/), that allows you to save customer credentials **as tokens** with card networks and card-issuing banks. Customers can then make repeat purchases on your website without re-entering card details.

## Token Sharing in Partnership Model

- If you are a single legal entity with multiple businesses, you can get onboarded as a Razorpay partner. For example, consider Acme Corp as a legal entity which runs the businesses Acme Groceries, Acme Fashions and Acme Beauty. All these businesses will have unique Razorpay merchant identifiers (MIDs).

- Currently, if a customer makes an online purchase from Acme Groceries, they would need to enter their card details. If they want to purchase form Acme Fashions, the customer will have to re-enter their card details, though both Acme Groceries and Acme Fashions belong to the same main entity, Acme Corp.

- With Razorpay's **Token Sharing** feature, while each business under your entity will have a unique MID to accept payments, tokens issued under any one MID will be automatically shared across all MIDs under that entity.

- This means that if a customer has made a card payment to Acme Beauty, they need not enter their card details to make a payment at Acme Fashions or Acme Groceries. By saving the customer's card details as a token, you can provide them a smooth payment experience on subsequent transactions.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Token sharing is only possible if you have multiple lines of businesses under the same legal entity. For example, ABC corp can be operating through 3 business lines under the one legal entity of ABC corp. Then, ABC corp  can share a token and use it for processing payments for any of its MIDs with Razorpay.
> - Token Sharing between MIDs will not work if you wish to use another PA/PG as the token requestor.
> 

> **INFO**
>
> 
> **Feature Enablement**
> 
> This is an on-demand feature that is available only to businesses that operate through multiple lines of businesses under a single legal entity. [Get in touch](https://razorpay.com/support) with us to get this feature enabled on your account.
> 

## Partner Auth

You need to create tokens and accept payments from customers as a parent merchant on behalf of your sub-merchants. Razorpay TokenHQ helps you create, manage and use tokens for sub-merchants' payments.

### Token Sharing Structure

### Token Lifecycle

A token goes through various states in its lifecycle.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Status will be available for the service provider token and the overall token entity.
> - The status of overall token entity is derived from the individual service provider tokens.
> - You may choose to consume the status of either the overall token entity or the individual service provider token, based on your integration.
> 

Given below is a diagram representing the token lifecycle:

#### Overall Token States

    
### Token statuses

Status | Description
---
`initiated` | This is the token's primary state. This status indicates that Razorpay is working with token service providers to create the token. It may take a few seconds for the token to move to the active state.
---
`active` | The token reaches the active state when the token is successfully created and activated by a token service provider, that is, card networks. A token in active status can be used for payment processing.
---
`suspended` | The status changes to suspended when the token is suspended temporarily by the card issuing bank or network. A suspended token may become active later. A suspended token cannot be used for payment processing.
---
`failed` | The token status changes to failed when Razorpay fails to create the token with the token service providers due to: - The card not being eligible.
- The issue not being supported.
- An invalid card number.

---
`deactivated` | Status will be deactivated when:- The token has expired.
- The token is deactivated by the bank.
 
 A deactivated token cannot become active again, and cannot be used for payment processing.

        

## Business as the Token Requestor APIs

In this flow, you are onboarded with card networks and Issuers as token requestors as well as a merchant. This requires PCI compliance.

### Create Token on Behalf of a Sub-Merchant

Use this API to create a token using customer card details, on behalf of a sub-merchant.

/tokens

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/tokens
-H "content-type: application/json"
-d'{
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": {
    "number": "4386289407660153",
    "cvv": "123",
    "expiry_month": "12",
    "expiry_year": "21",
    "name": "Gaurav Kumar"
  },
  "authentication": {
    "provider": "razorpay",
    "provider_reference_id": "pay_123wkejnsakd",
    "authentication_reference_number": "100222021120200000000742753928"  
  },
  "notes": []
}'
```json: Response
{
  "id": "token_IJmat4GwYATMtx",
  "entity": "token",
  "method": "card",
  "card": {
    "last4": "0153",
    "network": "Visa",
    "type": "credit",
    "issuer": "IDFB",
    "international": false,
    "emi": false,
    "sub_type": "consumer"
  },
  "customer": {
    "id": "cust_1Aa00000000001",
    "entity": "customer",
    "name": "Bob",
    "email": "bob@gmail.com",
    "contact": "9000090000",
    "gstin": null,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
    },
    "created_at": 1658390470
  },
  "expired_at": 1701368999,
  "customer_id": "cust_1Aa00000000001",
  "compliant_with_tokenisation_guidelines": true,
  "status": "active",
  "notes": []
}
```

#### Request Parameters

`customer_id` _optional_
: `string` The unique identifier of the customer created using [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md).

`method` _mandatory_
: `string` The type of object that needs to be tokenised. Currently, `card` is the only supported value.

`card` _mandatory_
: `object` The card details.

    `number`
    : `string` The card number. If the card number has spaces, it will be trimmed by Razorpay for further processing.

    `cvv`
    : `string` The card CVV.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>       - CVV is not required by default for tokenised cards across all networks.
>       - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>       - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>       - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>       - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.        
>     

    `expiry_month`
    : `string` The card expiry month in `mm` format.
    
    `expiry_year`
    : `string` The card expiry year in `yy` or `yyyy` format.

    `name`
    : `string` The cardholder's name.

`authentication`
: `object` Token authentication details.

    `provider`
    : `string` The platform through which authentication was processed. Possible values:
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
      - `zakpay`

    `provider_reference_id` 
    : `string` The unique payment identifier of the payment used to collect AFA on any PA/PG.
    
    `authentication_reference_number` _conditional_
    : `string` A unique reference number generated when authentication is initiated. The maximum length supported is 26 characters. This field is mandatory for RuPay cards only after June 30, 2022.
      
> **WARN**
>
> 
>       **Watch Out!**
> 
>       For tokenising RuPay cards, you will need to provide the authRefNo provided by NPCI during the payment where AFA was collected from card_holder for tokenising the card. The validity of authRefNo is up to a few minutes.
>       

### Initiate Payment on Behalf of a Sub-Merchant

Use this API to initiate payment on behalf of a sub-merchant.

/payments/create/json

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/payments/create/json
-H "content-type: application/json"
-d '{
  "amount": 500000,
  "currency": "INR",
  "email": "gaurav.kumar@example.com",
  "order_id": "order_Fg6IGePNMKDICF",
  "contact": "9090909090",
  "method": "card",
  "token": "token_IJr7WSRFECVBSX",
  "customer_id": "cust_K3ZhflPARDyCf3",
  "card": {
    "cvv": ""
  },
  "ip": "192.168.0.103",
  "user_agent": "Mozilla/5.0",
  "description": "Test payment",
  "notes": {
    "note_key": "value1"
  },
  "account_id": "acc_Ef7ArAsdU5t0XM"
}' 
```json: Response
{
  "razorpay_payment_id": "pay_IFCxyfBO08Lmb4",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/IFCxyfBO08Lmb4/authenticate"
    }
  ]
}
```

#### Request Parameters

`key_id` _mandatory_
: `string` API Key ID that must generated from Dashboard.

`amount` _mandatory_
: `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is ₹100, enter `10000`.

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

`order_id` _mandatory_
: `string` Order ID generated via [Razorpay Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`email` _mandatory_
: `string` Email address of the customer.

`contact` _mandatory_
: `string`  Phone number of the customer.

`method` _mandatory_
: `string` Name of the payment method. Possible values are:
    - `card` (default)
    - `netbanking` (default)
    - `wallet` (default)
    - `emi` (default)
    - `upi` (default)
    - `bank_transfer` (requires [approval](https://razorpay.com/support/#request) and [integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md))
    - `cardless_emi` (requires [approval](https://razorpay.com/support/#request) and [integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md))
    - `paylater` (requires [approval](https://razorpay.com/support/#request) and [integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md))
    - `emandate` (requires [approval](https://razorpay.com/support/#request) and integration)

`card`
: The details of the card that should be entered while making the payment.

    `number` _mandatory if method=card/emi_
    : `integer` Unformatted card number.

    `name` _mandatory if method=card/emi_
    : `string` The name of the cardholder.

    `expiry_month` _mandatory if method=card/emi_
    : `integer` Expiry month for card in MM format.

    `expiry_year` _mandatory if method=card/emi_
    : `integer` Expiry year for card in YY format.

    `cvv` _mandatory if method=card/emi_
    : `integer` CVV printed on the back of the card.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>       - CVV is not required by default for tokenised cards across all networks.
>       - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>       - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>       - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>       - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.  
>     

    `emi_duration` _mandatory if method=card/emi_
    : `integer` Defines the number of months in the EMI plan.

`bank` _mandatory if method=netbanking_
: `string` Bank code. List of available banks enabled for your account can be fetched via [**methods**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom.md#step-3-fetch-payment-methods).

`bank_account` _mandatory if method=emandate_
: The details of the bank account that should be passed in the request. Required if the `method` is `emandate`.

    `account_number` _mandatory if method=emandate_
    : `string` Bank account number used to initiate the payment.

    `ifsc` _mandatory if method=emandate_
    : `string` IFSC of the bank used to initiate the payment.

    `name` _mandatory if method=emandate_
    : `string` Name associated with the bank account used to initiate the payment.

`vpa` _mandatory if method=upi_
: `string` UPI ID of the customer. Required if the method is `upi`.

`wallet` _mandatory if method=wallet_
: `string` Wallet code for the wallet used for the payment. Possible values:
    - `payzapp` (default)
    - `olamoney` (requires [approval](https://razorpay.com/support/#request))
    - `phonepe` (requires [approval](https://razorpay.com/support/#request))
    - `airtelmoney` (requires [approval](https://razorpay.com/support/#request))
    - `mobikwik` (requires [approval](https://razorpay.com/support/#request))
    - `jiomoney` (requires [approval](https://razorpay.com/support/#request))
    - `amazonpay` (requires [approval](https://razorpay.com/support/#request) and [integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/amazon-pay.md))
    - `paypal` (requires [approval](https://razorpay.com/support/#request). [Learn more](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/paypal.md))
    - `phonepeswitch` (requires [approval](https://razorpay.com/support/#request) and [integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/custom/phonepe-switch.md))

`provider` _mandatory if method=cardless_emi_
: `string`  Name of the cardless EMI provider partnered with Razorpay. Required if `method` is `cardless_emi`. Available options are:
    - `hdfc`
    - `icic`
    - `idfb`
    - `kkbk`
    - `zestmoney`
    - `earlysalary`
    - `walnut369`

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`ip` _optional_
: `string` Customer IP Address.

`referrer` _optional_
: `string` Customer referrer.

`user_agent` _optional_
: `string` Customer user-agent.

### Delete a Token

Use this API to delete a token.

/tokens/delete

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

#### Request Parameter

`id` _mandatory_
: `string` The unique identifier of the token to be deleted.

> **WARN**
>
> 
> **Watch Out!**
> 
> Token deletion applies at a global level. That is, once you delete a token, you cannot use the token any longer under any of the MIDs.
> 

### Fetch Card Properties of an Existing Token

Use this API to fetch the card properties of an existing token.

/tokens/fetch

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
  "customer": {
        "id": "cust_1Aa00000000001",
        "entity": "customer",
        "name": "Bob",
        "email": "bob@gmail.com",
        "contact": "9000090000",
        "gstin": null,
        "notes": {
            "notes_key_1": "Tea, Earl Grey, Hot",
            "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "created_at": 1658390470
    },
  "customer_id": "cust_1Aa00000000001",
  "compliant_with_tokenisation_guidelines": true,
  "expired_at": 1748716199,
  "status": "active",
  "status_reason": null,
  "notes": []
}
```

#### Request Parameter

`id` _mandatory_
: `string` The unique identifier of the token whose details are to be fetched.

## Razorpay as the Token Requestor APIs

In this flow, you will be onboarded with card networks and Issuers as a merchant with Razorpay as the token requestor. You need not be PCI compliant for this solution.

### Create Token During Payment on Behalf of a Sub-Merchant

You can create the token when your customer opts to save their card on your checkout during the first payment. As per RBI guidelines, you must collect customer consent to save their card.

Use the following API to save the customer card details and create a token.
- Pass an additional field save=true to save and tokenise the card.
- Pass the account_id of the sub-merchant in the payment request.

```curl: Request
curl -u [CLIENT_ID]:[CLIENT_SECRET]
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
  },
  "account_id": "acc_Ef7ArAsdU5t0XM"
}' 
```json: Response
{
  {
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "redirect",
       "url": "https://api.razorpay.com/v1/payments/FVmAstJWfsD3SO/authenticate"
    }
  ]
}
```

#### Request Parameters

Same as the request parameters for [this API](#initiate-payment-on-behalf-of-a-sub-merchant).

### Initiate Payment Using Saved Token

Use this API to create a payment using an existing token.

/payments/create/json

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
  "token": "token_4lsdksD31GaZ09",
  "customer_id": "cust_1Aa00000000001",
  "card": {
    "cvv": "123"
  },
  "ip": "192.168.0.103",
  "user_agent": "Mozilla/5.0",
  "description": "Test payment",
  "notes": {
    "note_key": "value1"
  },
  "account_id": "acc_Ef7ArAsdU5t0XM"
}' 
```json: Response
{
  {
  "razorpay_payment_id": "pay_FVmAstJWfsD3SO",
  "next": [
    {
      "action": "redirect",
       "url": "https://api.razorpay.com/v1/payments/FVmAstJWfsD3SO/authenticate"
    }
]
}
```

#### Request Parameters

`token` _mandatory_
: `string` Pass the unique token id created when the customer made the first payment.

`account_id` _mandatory_
: `string` Pass the sub-merchant's unique identifier.

### Delete a Token

Use this API to delete a token.

/tokens/delete

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X https://api.razorpay.com/v1/tokens/delete
-H "content-type: application/json"
-d '{
  "id" : "token_4lsdksD31GaZ09"
}'
```json:Response
[]
```

#### Request Parameter

`token` _mandatory_
: `string` Pass the unique identifier of the token to be deleted.

### Fetch Card Properties of an Existing Token

Use this API to fetch the card properties of an existing token.

/tokens/fetch

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
 "customer": {
        "id": "cust_1Aa00000000001",
        "entity": "customer",
        "name": "Bob",
        "email": "bob@gmail.com",
        "contact": "9000090000",
        "gstin": null,
        "notes": {
            "notes_key_1": "Tea, Earl Grey, Hot",
            "notes_key_2": "Tea, Earl Grey… decaf."
        },
        "created_at": 1658390470
    },
   "customer_id": "cust_1Aa00000000001",
  "compliant_with_tokenisation_guidelines": true,
  "expired_at": 1748716199,
  "status": "active",
  "status_reason": null,
  "notes": []
}
```

#### Request Parameter

`token` _mandatory_
: `string` Pass the unique identifier of the token whose details are to be fetched.

## Webhooks

Use Razorpay Webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL.

The table below lists the webhook events available for tokens.

Event | Description
---
`token.initiated` | Triggered when the tokenisation request is initiated.
---
`token.activated` | Triggered when: - The token status is changed to active for the first time.
- The token status for a previously suspended token is changed to active again.

---
`token.suspended` | Triggered when the issuing bank temporarily suspends a token.
---
`token.deactivated` | Triggered when the token is permanently deactivated.
---
`token.expiry_updated` | Triggered when the issuing bank updates the expiry date for a token.

### token.initiated

```json: Initiated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.initiated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
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
        "status": "initiated",
        "notes": []
      }
    }
  }
}
```

### token.activated

```json: Activated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.activated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
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
        "notes": []
      }
    }
  }
}
```

#### Sample Payload for token.activated as part of payment

```json: Token activated as part of payment
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.activated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
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
        "notes": []
      }
    },
    "payment": {
      "entity": {
        "id": "pay_FPoJKWQQ8lK13n",
        "entity": "payment",
        "amount": 500000,
        "currency": "INR",
        "base_amount": 500000,
        "status": "captured",
        "order_id": "order_FPoIeimWki9j8A",
        "invoice_id": null,
        "international": false,
        "method": "netbanking",
        "amount_refunded": 190000,
        "amount_transferred": 0,
        "refund_status": "partial",
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "notes": [],
        "fee": 11800,
        "tax": 1800,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "bank_transaction_id": "4827433"
        },
        "created_at": 1597226379
      }
    }
  }
}
```

### token.suspended

```json: Suspended
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.suspended",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
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
        "status": "suspended",
        "notes": []
      }
    }
  }
}
```

### token.deactivated

```json: Deactivated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.deactivated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
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
        "status": "deactivated",
        "notes": []
      }
    }
  }
}
```

### token.expiry_updated

```json: Expiry updated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.expiry_updated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
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
        "notes": []
      }
    }
  }
}
```

### Other Token APIs
- [Token IIN API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/merchant-requestor/iin-validation.md) 
- [PAR API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/cards/fingerprints.md) 
- [Fetch Card IIN Information API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/cards/iin-api.md)

## FAQs

    
### 1. Do I have to be PCI compliant for Token Sharing?

         Not necessarily. If you wish to be the token requestor (to create and store tokens), then yes, you will require PCI compliance. If Razorpay is the token requestor, compliance is not required.
        

    
### 2. Can I use Token Sharing while using another PA/PG as a token requestor?

         No, tokens cannot be shared within MIDs with another PA/PG as the token requestor.
        

    
### 3. Can I use Token Sharing while using another PA/PG as a payment processor?

         No, token creation and payment initiation has to be with Razorpay.
        

    
### 4. Is this feature enabled automatically for me if I am a Razorpay partner?

            No, this feature will be enabled only upon request and is subject to the following conditions:
            - You are a Razorpay partner under the Partner Auth model.
            - You are a single legal entity that operates with multiple sub-merchants with unique Razorapy MIDs.
        

    
### 5. How can I get this feature enabled for my MIDs?

         Get in [touch with us](https://razorpay.com/support) to get this feature enabled on your account.
        

    
### 6. Can I migrate to the partnership model without any changes to my existing tokens across my MIDs?

         Yes, you can migrate to the partnership model without any integration effort. We would recommend that you get in touch with your sales POC to assist you with the token migration process.
