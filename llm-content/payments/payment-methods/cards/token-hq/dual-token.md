---
title: TokenHQ - Issuer Tokenisation
description: Know how to save customer card details as tokens using Razorpay TokenHQ.
---

# TokenHQ - Issuer Tokenisation

TokenHQ, a complete RBI-compliant solution from Razorpay, enables you to save customer credentials as tokens with card networks and card-issuing banks.

Razorpay provides a Dual Token process which works with networks and issuing banks both to create network and issuer tokens with a single Token Create request. 

Tokenisation is the process by which the original card number/Primary Account Number (PAN) is replaced with a surrogate value called a `token`.

## Razorpay Dual Token

When a customer tries to save a card on your platform, our Dual Token feature communicates with networks and issuers to generate one network and one issuer token against the card respectively. To the customer saving their card, this process is invisible, and they view a single saved instance of their card on your checkout page. When the customer tries attempting the payment via saved card, the payment is processed via issuer/network token depending on your preference or best possible success rate.

> **INFO**
>
> 
> **Handy Tips**
> 
> Dual Tokenisation is currently only available for Axis-issued cards, and is a work in progress for HDFC, ICICI and other Banks.
> 

## List of APIs

Given below is the list of APIs:

1. [Tokenise Cards](#1-tokenise-cards)
   - [Token Entity](#token-entity)
   - [Create a Token](#11-create-a-token)
   - [Delete a Token](#12-delete-a-token)
2. [Initiate a Tokenised Payment](#2-initiate-a-tokenised-payments)
   - [Initiate Payment Using the Dual Token](#21-initiate-payment-using-the-dual-token)
   - [Initiate Payment Using Only the Network Token](#22-initiate-payment-using-only-the-network-token)

## 1. Tokenise Cards

You can save customer card details in the form of tokens and then use these tokens to accept payments from customers. 

#### Token Entity

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
    "issuer": "Axis",
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
        "token_expiry_year": 2030
      }
    },
    {
      "id": "spt_1234efgh",
      "entity": "service_provider_token",
      "provider_type": "issuer",
      "provider_name": "Axis",
      "interoperable": true,
      "status": "active",
      "status_reason": null,
      "provider_data": {
        "token_reference_number": "bass7wqaoidasdfssqwrjjk",
        "payment_account_reference": null,
        "token_iin":null,
        "token_expiry_month": 12,
        "token_expiry_year": 2021
      }
    }
  ],
  "expired_at": 1748716199,   // this will be maximum expiry of network/issuer token
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
: `string` This is the Razorpay customer id. You can create a token for a specific customer using their customer id. Use the [Customers API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/customers.md) to create a customer id. This is an optional parameter.

`method`
: `string` The type of object that was tokenised. Currently, it only supports `card`.

`card`
: `object` The customer card details.

`compliant_with_tokenisation_guidelines`
: `boolean` Indicates whether the token is compliant with the RBI guidelines. Possible values:
  - `true`: The token is compliant with RBI guidelines.
  - `false`: The token is not compliant with RBI guidelines.

`service_provider_tokens`
: `array` Every Razorpay token will have one or more token service providers (card networks, issuing banks or Razorpay). For each service provider, Razorpay will return a service provider token. This service provider token is the raw token returned by the token service provider (card network or issuer).

  
> **INFO**
>
> 
> 
>   **Handy Tips**
>     
>   The `service_provider_tokens` object is an on-demand feature, made available only to PCI DSS-compliant businesses.
>   

`expired_at`
: `string` The expiry timestamp for the token.

`status`
: `string` The overall status for the token. Possible values:
  - `active` : The token attains this state if it is activated for at least one of the token service providers.
  - `suspended` : The token attains this state if: 
    - The token is not activated for any one of the token service providers. 
    - The token is suspended for at least one of the token service providers.
  - `deactivated` : The token attains this state if the token is not active/suspended for any one of the token service providers and is deactivated for at least one token service provider. Know about the complete list of [token states](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/merchant-requestor/token-lifecycle.md).
  
`status_reason`
: `string` When the token reaches the deactivated state, this field will provide the reason for deactivation. Possible values:
  - `expired`
  - `deactivated_by_bank`

`notes` 
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

### 1.1 Create a Token

A token is an alias for the actual card number. Use this API to save your customer's card. 

1. When a merchant requests for token creation (with or without payment), the token id is created by Razorpay.
2. For those token id created, there are two calls made:
    - to the network for a network token.
    - to the issuer for an issuer token.
3. For both, these tokens (service provider) are mapped to the same token reference number is displayed to the business.

 /tokens 

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/tokens
-H "content-type: application/json"
-d'{
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": {
    "number": "4386289407660153",
    "cvv": "",
    "expiry_month": "12",
    "expiry_year": "30",
    "name": "Gaurav Kumar"
  },
  "authentication": {
    "provider": "razorpay",
    "provider_reference_id": "pay_123wkejnsakd",
    "authentication_reference_number": "100222021120200000000742753928"   
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject tokenRequest = new JSONObject();
tokenRequest.put("customer_id","cust_1Aa00000000001");
tokenRequest.put("method","card");

JSONObject card = new JSONObject();
card.put("number","4386289407660153");
card.put("cvv","");
card.put("expiry_month","12");
card.put("expiry_year","30");
card.put("name","Gaurav Kumar");

tokenRequest.put("card",card);

JSONObject authentication = new JSONObject();
authentication.put("provider","razorpay");
authentication.put("provider_reference_id","pay_123wkejnsakd");
authentication.put("authentication_reference_number","100222021120200000000742753928");
tokenRequest.put("authentication",authentication);

Token token = instance.token.create(tokenRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->token->create(array(
    "customer_id" => "cust_1Aa00000000001",
    "method" => "card",
    "card" => array(
        "number" => "4386289407660153",
        "cvv" => "",
        "expiry_month" => "12",
        "expiry_year" => "30",
        "name" => "Gaurav Kumar"
    ),
    "authentication" => array(
        "provider" => "razorpay",
        "provider_reference_id" => "pay_123wkejnsakd",
        "authentication_reference_number" => "100222021120200000000742753928"
    ),
    "notes" => array()
));

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": map[string]interface{}{
    "number": "4386289407660153",
    "cvv": "",
    "expiry_month": "12",
    "expiry_year": "30",
    "name": "Gaurav Kumar"
  },
  "authentication": map[string]interface{}{
    "provider": "razorpay",
    "provider_reference_id": "pay_123wkejnsakd",
    "authentication_reference_number": "100222021120200000000742753928"  
  },
  "notes": []
}
body, err := client.Token.Create(data, nil);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.tokens.create({
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": {
    "number": "4386289407660153",
    "cvv": "",
    "expiry_month": "12",
    "expiry_year": "30",
    "name": "Gaurav Kumar"
  },
  "authentication": {
    "provider": "razorpay",
    "provider_reference_id": "pay_123wkejnsakd",
    "authentication_reference_number": "100222021120200000000742753928"  
  },
  "notes": []
});

```

```json: Success Response
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
      }
    },
    {
      "id": "spt_1234efgh",
      "entity": "service_provider_token",
      "provider_type": "issuer",
      "provider_name": "Axis",
      "interoperable": true,
      "status": "active",
      "status_reason": null,
      "provider_data": {
        "token_reference_number": "bass7wqaoidasdfssqwrjjk",
        "payment_account_reference": null,
        "token_iin":null,
        "token_expiry_month": 12,
        "token_expiry_year": 2021
      }
    }
  ],
  "expired_at": 1748716199,   
  "status": "active",
  "status_reason": null,
  "notes": []
}

```json: Failure Response
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The number is invalid.",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {},
    "field": "number"
  }
}
```

#### Request Parameters

`customer_id` _optional_
: `string` The unique identifier of the customer created using [Customers API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/customers.md).

`method` _mandatory_
: `string` The type of object that needs to be tokenised. Currently, `card` is the only supported value.

`card` _mandatory_
: `object` The card details.

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

`authentication`
: `object` Token authentication details.

    `provider`
    : `string` The platform through which authentication was processed.

    `provider_reference_id` 
    : `string` The unique payment identifier of the payment used to collect AFA on any PA/PG.

    `authentication_reference_number`
    : `string` A unique reference number generated when authentication is initiated. The maximum length supported is 26 characters.

#### Response Parameters

Descriptions for the response parameters are present in the [Token Entity parameters table](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/dual-token/#token-entity.md).

### 1.2 Delete a Token

Use the following API to delete a token already saved with Razorpay.

/tokens/delete

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/tokens/delete
-H "content-type: application/json"
-d '{
  "id" : "token_4lsdksD31GaZ09"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject productRequest = new JSONObject();
productRequest.put("id","token_4lsdksD31GaZ09")

List token = instance.token.delete(productRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->token->delete(array("id" => "token_4lsdksD31GaZ09"));

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "id" : "token_4lsdksD31GaZ09",
}

body, err := client.Token.DeleteToken(data, nil);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.tokens.delete({"id": "token_4lsdksD31GaZ09"});

```json: Response
[]

```

#### Request Parameters

`id` _mandatory_
: `string` The unique identifier of the token to be deleted.

> **WARN**
>
> 
> **Watch Out!**
> 
> Deleting a token will apply at a global level. That is, once you delete a token, you cannot use that token under any of the MIDs.
> 

## 2. Initiate a Tokenised Payment

### 2.1 Initiate Payment Using the Dual Token

Use this API to use either issuer or network token.

Razorpay processes the payment using either the issuer or network token based on the one that gives the best success rate.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Payment in this case will be routed via issuer or network token depending on the better success rate.
> - Issuer tokens are not interoperable.

> For example, ABD Corp cannot request Razorpay to process an issuer token created by Juspay.
> 

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

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is ₹299, then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, INR. Refer to the list of supported currencies. Length must be of 3 characters.

`order_id` _mandatory_
: `string` Unique identifier of the Order generated in the first step.

`email` _mandatory_
: `string` Email address of the customer. Maximum length supported is 40 characters.

`contact` _mandatory_
: `string` Phone number of the customer. Maximum length supported is 15 characters, inclusive of country code.

`method` _mandatory_
: `string` Name of the payment method. Possible value is `card`.

`card` _mandatory_
: `object` Details associated with the card.

    `cvv`
    : `string` CVV printed on the back of card.
    
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

`ip` _mandatory_
: `string` The customer's IP address.

`user-agent` _mandatory_
: `string` The User-Agent header of the user's browser. Default value will be passed by Razorpay if not provided by merchant.

`description` _optional_
: `string` A brief description of the Customer Identifier.

`notes` 
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Response Parameters

Descriptions for the response parameters are present in the [Token Entity parameters table](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/dual-token/#token-entity.md).

### 2.2 Initiate Payment Using Only the Network Token

Use the following API for initiating a payment using the network token.

> **WARN**
>
> 
> **Watch Out!**
> 
> 1. Fetching the cryptogram value precedes the below request.
> 2. Make the fetch cryptogram request with your token service provider and then call the below API.
> 

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
    "number": "4154980604708430",
    "expiry_month": "12",
    "expiry_year": "30",
    "name": "Gaurav Kumar",
    "cryptogram_value": "as34ag3h78dsdasdsd1",
    "cvv": "",
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
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is ₹299, then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, INR. Refer to the list of supported currencies. Length must be of 3 characters.

`order_id` _mandatory_
: `string` Unique identifier of the Order generated in the first step.

`email` _mandatory_
: `string` Email address of the customer. Maximum length supported is 40 characters.

`contact` _mandatory_
: `string` Phone number of the customer. Maximum length supported is 15 characters, inclusive of country code.

`method` _mandatory_
: `string` Name of the payment method. Possible value is `card`.

`card` _mandatory_
: `object` Details associated with the card.

    `number` _mandatory_
    : `string` Unformatted card number. Required if the method is `card`.

    `name` _mandatory_
    : `string` Name of the cardholder. Required if the method is `card`

    `expiry_month` _mandatory_
    : `integer` Expiry month for card in `MM` format. Required if the method is `card`.

    `expiry_year` _mandatory_
    : `string` Expiry year for card in `YY` format. Required if the method is `card`.

    `cvv` _mandatory_
    : `string` CVV printed on the back of card.
    
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

    `cryptogram_value` _mandatory_
    : `string` The cryptogram value for the token. 

    `tokenised` _mandatory_
    : `boolean` Indicates if the payment is made using tokenised card or actual card. Possible values:
      - `true`: Pass `true` when you are making the payment using a token.
      - `false` (default): Pass `false` when you are making the payment using a card. 

    `token_provider` _mandatory_
    : `string` The name of the aggregator that provided the token.

`ip` _mandatory_
: `string` The customer's IP address.

`user-agent` _mandatory_
: `string` The User-Agent header of the user's browser. Default value will be passed by Razorpay if not provided by merchant.

`description` _optional_
: `string` A brief description of the Customer Identifier.

`notes` 
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Response Parameters

Descriptions for the response parameters are present in the [Token Entity parameters table](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/dual-token/#token-entity.md).
