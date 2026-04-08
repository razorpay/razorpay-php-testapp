---
title: Tokenisation APIs
description: List of APIs to tokenise customer cards.
---

# Tokenisation APIs

According to recent Payment Acquirer (PA)/ Payment Gateway (PG) guidelines from RBI, businesses cannot save their customers' card numbers and other card data on their servers. Razorpay TokenHQ is a RBI-compliant solution that allows you to save customer credentials with card networks and card-issuing banks. You can use Razorpay Optimizer to route payments through the PA/PG of your choice.

## List of APIs

Given below is the list of APIs:

1. [Tokenise cards](#1-tokenise-cards).
   - [Token Entity](#token-entity)
   - [Create a token](#11-create-a-token)
   - [Fetch card properties of an existing token](#12-fetch-card-properties-of-an-existing-token)
   - [Delete a token](#13-delete-a-token)
2. [Initiate payment using token saved with Razorpay](#2-initiate-payment-using-token-saved-with-razorpay).
3. [Process a payment on another PA/PG with token created on Razorpay](#3-process-a-payment-on-another-pa-pg).
4. [Initiate Payment on Razorpay with token created on another PA/PG](#4-initiate-payment-on-razorpay-with-token-created).
5. [Save card to vault token while making a payment on Razorpay](#5-save-card-to-vault-token-while-making).

## 1. Tokenise Cards

You can save customer card details in the form of tokens and then use these tokens to accept payments from customers. 

### Token Entity

Given below is a sample entity.

```json: Mastercard, Visa & RuPay
{
  "id": "token_4lsdksD31GaZ09",
  "entity": "token",
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": {
    "last4": "0153",
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
        "token_expiry_year": 2030
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
```json: Diners
{
  "id": "token_4lsdksD31GaZ09",
  "entity": "token",
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": {
    "last4": "0153",
    "network": "Diners Club",
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
      "provider_type": "issuer",
      "provider_name": "HDFC",
      "interoperable": true,
      "status": "active",
      "provider_data": {
        "token_requestor_id": "INBENRAZOVIVIWIBPAY56428", 
        "token_reference_number": "sas7wqaoidasdfssdjjk",
        "payment_account_reference": "8324ssdas7wqaoidassdjjk",
        "token_iin": "453335",
        "token_expiry_month": 12,
        "token_expiry_year": 2030
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
  "notes": []
}
```

  
### Entity Parameters

      `id`
      : `string` The unique identifier of the Razorpay token. 

      `entity`
      : `string` The name of the entity. Here, it is `token`.

      `customer_id`
      : `string` This is the Razorpay customer id. You can create token for a specific customer using their customer id. Use the [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) to create customer id. This is an optional parameter.

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
          : `string` The token IIN provided by the card network. When a token is created with card networks such as Visa or MasterCard, this field will have the token IIN. This will be useful to fetch all the token properties so that you can apply your existing IIN validations and processing. This field will be absent when the token is created by a token service provider other than the card network.

      `compliant_with_tokenisation_guidelines`
      : `boolean` Indicates whether the token is compliant with the RBI guidelines. Possible values:
        - `true`: The token is compliant with RBI guidelines.
        - `false`: The token is not compliant with RBI guidelines.

      `service_provider_tokens`
      : `array` Every Razorpay token will have one or more token service providers(card networks, issuing banks or Razorpay). For each service provider, Razorpay will return a service provider token. This service provider token is the raw token returned by the token service provider (card network or issuer). Currently, we will have only card networks as token service providers. In future, a token may be created with more than one service provider. A token can be created with one or more of the following service providers: 

> **INFO**
>
>  **Handy Tips**
 The `service_provider_tokens` object is an on-demand feature, made available only to PCI DSS compliant businesses. 

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

              `token_requestor_id`
              : `string` The tr_merchant_id provided by HDFC. (Displayed only for Diners tokens).

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
        - `active`: The token attains this state if the token is activated for at least one of the token service providers.
        - `suspended`: The token attains this state if:
          - The token is not activated for any one of the token service providers.
          - The token is suspended for at least one of the token service providers.
        - `deactivated`: The token attains this state if the token is not `active`/`suspended` for any one of the token service providers and is deactivated for at least one token service provider. 
 Know about the complete list of [token states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/merchant-requestor-with-network-tokens/token-lifecycle.md).

      `status_reason`
      : `string` When the token reaches the `deactivated` state, this field will provide the reason for deactivation. Possible values:
        - `expired`
        - `deactivated_by_bank`
        
      `notes`
      : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
    

### 1.1 Create a Token

A token is an alias for the actual card number. Use this API to save your customer's card. 

As per RBI guidelines, customer consent and AFA (3ds authentication) are mandatory for saving a card.
- This API should be called only after authentication is complete. Authentication can be processed through any payment processor.
- You will receive a token as a response. 

> **INFO**
>
> 
> **Handy Tips**
> 
> If multiple tokenisation requests have been raised for the same card using this API, then for:
> - MasterCard and RuPay Cards: Different tokens will be created for each request.
> - Visa Cards: If a token has already been created, the API will return the same token for subsequent requests.
> This is in sync with the Network Tokenisation API.
> 

> **WARN**
>
> 
> **Watch Out**
> 
> This API is only available to businesses that are TRs and not available for Rupay payments.
> 

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

```json: Response
{
  "id": "token_4lsdksD31GaZ09",
  "entity": "token",
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": {
    "last4": "0153",
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
        "token_expiry_year": 2030
      }
    }
  ],
  "expired_at": 1748716199,
  "status": "active",
  "status_reason": null,
  "notes": []
}
```json: Error Response
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

  
### Request Parameters

      `customer_id` _optional_
      : `string` The unique identifier of the customer created using [Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

      `method` _mandatory_
      : `string` The type of object that needs to be tokenised. Currently, `card` is the only supported value.

      `card` _mandatory_
      : `object` The card details.

          `number`
          : `string` The card number. If the card number has spaces, it will be trimmed by Razorpay for further processing.

          `cvv`
          : `string` The card's CVV number.
          
> **INFO**
>
> 
>           **Handy Tips**
> 
>             - CVV is not required by default for tokenised cards across all networks.
>             - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>             - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>             - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>             - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.  
>           

          `expiry_month`
          : `string` The card expiry month in `mm` format.
          
          `expiry_year`
          : `string` The card expiry year in `yy` or `yyyy` format.

          `name`
          : `string` The cardholder's name.

      `authentication` _mandatory_
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
            - `zaakpay`

          `provider_reference_id` 
          : `string` The unique payment identifier of the payment used to collect AFA on any PA/PG.

          `authentication_reference_number` _conditional_
          : `string` A unique reference number generated for Amex and RuPay payments when the cardholder consents to tokenisation and AFA is successfully completed. This value must be obtained from the payment processor/gateway that handled the authentication and passed to Razorpay during token creation. It is mandatory for all Amex token creation requests. For RuPay, it is required only when generated and provided by the gateway.
    

> **WARN**
>
> 
>     **Watch Out!**
> 
>     To tokenise RuPay and Amex cards, the following information is required:
>     - **authRefNo**: Provided by NPCI for RuPay transactions.
>     - **AeVV**: Provided by Amex during payments where AFA was collected from the cardholder for tokenisation.

>     These values must be shared by the payment processor handling the transaction. For RuPay, this is required only if generated by the gateway. For Amex, it is mandatory for all payments.
> 
> 

### Error Codes

Given below is a list of sample error codes:

  
### Scenario 1: When any mandatory field is empty

     - Code: BAD_REQUEST_ERROR
     - Description: The `` is required
     - Source: internal
     - Step: token_initiation
     - Reason: input_validation_failed
    

  
### Scenario 2: When the field name is invalid

     - Code: BAD_REQUEST_ERROR 
     - Description: The `` is invalid
     - Source: internal
     - Step: token_initiation
     - Reason: input_validation_failed
    

  
### Scenario 3: When the connection with token service provider times out

     - Code: TOKEN_SERVICE_PROVIDER_TIMEOUT 
     - Description: There is an issue in connecting with the token service provider
     - Source: service_provider
     - Step: token_creation
     - Reason: token_service_provider_timed_out
    

### 1.2 Fetch Card Properties of an Existing Token

Use this API to retrieve card details such as network, issuer and so on for a given token.

/tokens/fetch

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/tokens/fetch
-H "content-type: application/json"
-d'{
  "id": "token_4lsdksD31GaZ09"
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject productRequest = new JSONObject();
productRequest.put("id","token_4lsdksD31GaZ09")

Token token = instance.token.fetch(productRequest);

```php:PHP
$api = new Api($key_id, $secret);

$api->token->fetch(array("id" => "token_4lsdksD31GaZ09"));

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "id" : "token_4lsdksD31GaZ09",
}
body, err := client.Token.FetchCardPropertiesByToken(data, nil);

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.tokens.fetch({"id": "token_4lsdksD31GaZ09"});

```json: Response - Visa, MasterCard & RuPay
{
  "id": "token_4lsdksD31GaZ09",
  "entity": "token",
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": {
    "last4": "0153",
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
      "provider_data": {
        "token_reference_number": "sas7wqaoidasdfssdjjk",
        "payment_account_reference": "8324ssdas7wqaoidassdjjk",
        "token_iin": "453335",
        "token_expiry_month": 12,
        "token_expiry_year": 2030
      }
    }
  ],
  "expired_at": 1748716199,
  "status": "active",
  "notes": []
}
```json: Response - Diners
{
  "id": "token_4lsdksD31GaZ09",
  "entity": "token",
  "customer_id": "cust_1Aa00000000001",
  "method": "card",
  "card": {
    "last4": "0153",
    "network": "Diners Club",
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
      "provider_type": "issuer",
      "provider_name": "hdfc",
      "interoperable": true,
      "status": "active",
      "provider_data": {
        "token_requestor_id": "INBENRAZOVIVIWIBPAY56428",
        "token_reference_number": "sas7wqaoidasdfssdjjk",
        "payment_account_reference": "8324ssdas7wqaoidassdjjk",
        "token_iin": "453335",
        "token_expiry_month": 12,
        "token_expiry_year": 2030
      }
    }
  ],
  "expired_at": 1748716199,
  "status": "active",
  "notes": []
}
```

  
### Request Parameters

      `id` _mandatory_
      : `string` The unique identifier of the token.
    

### 1.3 Delete a Token

Use the following API to delete a token already saved with Razorpay.

/tokens/delete

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X https://api.razorpay.com/v1/tokens/delete
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

  
### Request Parameter

      `id` _mandatory_
      : `string` The unique identifier of the token to be deleted.
    

## 2. Initiate Payment using Token saved with Razorpay

Use this API to make the payment when a customer initiates a subsequent payment using the saved card. Pass the token ID from the previous API request to initiate a payment using the token.

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
  "contact": "9000090000",
  "method": "card",
  "token": "token_IJr7WSRFECVBSX",
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
  "razorpay_payment_id": "pay_IFCxyfBO08Lmb4",
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

      `token` _mandatory_
      : `string` The unique identifier of the token.

      `card` _mandatory_
      : `object` The details of the card.

        `cvv` _optional_
          : `string` The card's CVV number.

      `notes` _optional_
      : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
    

> **INFO**
>
> 
> **Handy Tips**
> 
> Know more about the [S2S Integration payment flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md).
> 

## 3. Process a Payment on another PA/PG with Token Created on Razorpay

To process a payment on the tokenised card on another PA/PG, you will need the token and relevant additional data for each token. You can pass the service provider token id or the token id.
- The data required may vary for different networks. 
- Use the API given below to obtain the token and the relevant data.
- You can pass this data to any PA/PG to process the payment.

/tokens/service_provider_tokens/token_transactional_data

> **WARN**
>
> 
> **Watch Out!**
> 
> **This endpoint is decommissioned for Diners cards**.
> 
> To use a Razorpay-created Diners token on a different Payment Aggregator (PA) or Payment Gateway (PG), switch to the `/tokens/fetch` API. Use the response from `/tokens/fetch` to retrieve the necessary `requestor_id` and `reference_number`.
> 
> 

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/tokens/service_provider_tokens/token_transactional_data
-H "content-type: application/json"
-d '{
  "id": "spt_4lsdksD31GaZ09" // Alternatively, you can pass token_id, e.g., "token_id": "token_IJmat4GwYATMtx"
}'

```json: Response - Visa, MasterCard & RuPay
{
  "token_number": "4016981500100002",
  "cryptogram_value": "a345345dfgdfasdfh45jtyhgjkyutsdasd2",
  "token_expiry_month": 12,
  "token_expiry_year": 2030
}

```json: Response - Amex
{
  "token_number": "4016981500100002",
  "cvv": "1234",
  "token_expiry_month": 12,   
  "token_expiry_year": 2030 
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

  
### Request Parameters

      `id`
      : `string` The unique identifier of the service provider token whose details are to be fetched. Pass either this id or the `token_id`.

      `token_id`
      : `string` The unique identifier of the token. Pass either this id or the `spt_id`.
    

  
### Response Parameters

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
    

## 4. Initiate Payment on Razorpay with Token Created on another PA/PG

Use this API to create a payment with token saved on another PA/PG.

/payments/create/json

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
    "number": "4386289407660153",
    "expiry_month": "12",
    "expiry_year": "30",
    "cryptogram_value": "as34ag3h78dsdasdsd1",
    "cvv": "",
    "tokenised": true,
    "token_provider": "payu",
    "provider_type": "network"
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
    "number": "4386289407660153",
    "expiry_month": "12",
    "expiry_year": "30",
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

```curl: Diners
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
    "cvv": "123",
    "tokenised": true,
    "token_provider": "payu",
    "last4": "8430",
    "provider_type": "issuer",
    "service_provider_token_data": {
      "requestor_id": "INBENRAZOVIVIWIBPAY56428",
      "reference_number": "349c969a-d749-46fd-a08f-b955f49207b9"
    }
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
          
          `number` _mandatory_
          : `string` If payment is made using an actual card, then this field should have the entire actual card number. If card number has spaces, Razorpay will trim them for further processing. If payment is made using a network token, then this field should have the token number. If token number has spaces, Razorpay will trim them for further processing.
          
          `expiry_month` _mandatory_
          : `string` If payment is made using an actual card, then this field should have the 2-digit expiry month for the card. If payment is made using a network token, then this field should have the 2-digit expiry month for the token.

          `expiry_year` _mandatory_
          : `string` If payment is made using an actual card, then this field should have the 2 or 4-digit expiry year for the card. If payment is made using a network token, then this field should have the 2 or 4-digit expiry year for the token.

          `cryptogram_value` _mandatory_
          : `string` The cryptogram value for the token. This will be provided by the entity which provided the token. This field is mandatory if `tokenised=true` only for Visa, Mastercard and Rupay. Do not pass this for Amex and Diners cards.

          `tokenised` _optional_
          : `boolean` Indicates if the payment is made using tokenised card or actual card. Possible values:
            - `true`: Pass `true` when you are making the payment using a token.
            - `false` (default): Pass `false` when you are making the payment using a card.

          `token_provider` _mandatory_
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
          
          `last4` _mandatory_
          : `string` The last four digits of the original card number.

          `provider_type` _optional_
          : `string` The type of provider through which the token was created. Possible values:
            - `network`
            - `issuer`

          `service_provider_token_data ` _mandatory for diners_
          : `object` Token service provider data created by the network/issuer.

            `requestor_id` 
            : `string` The `tr_merchant_id` provided by HDFC.

            `reference_number`
            : `string` The token reference number provided by HDFC.

          `cvv` 
          : `string` The card's CVV number. For Amex tokenised cards, this will be a dynamic CVV provided by Amex for every payment on the tokenised card. Dynamic CVV is valid for about 20 minutes.

          
> **INFO**
>
> 
>           **Handy Tips**
> 
>             - CVV is not required by default for tokenised cards across all networks.
>             - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>             - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>             - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>             - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.        
>           

      `notes` _optional_
      : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.
    

> **INFO**
>
> 
> **Handy Tips**
> 
> Know more about the [S2S Integration payment flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2.md).
> 

## 5. Save Card to Vault Token While Making a Payment on Razorpay

If you are using Razorpay to process the first payment from a new card, do not call the tokenisation API. Instead, initiate the existing Razorpay Payment API, with an additional parameter `save=true`. This avoids two API requests and processes payments faster.

Use the following API to save card details while making a payment:

/payments/create/json

```curl: Request
-X POST https://api.razorpay.com/v1/payments/create/json
-H "content-type: application/json"
-d '{
  "amount": 500000,
  "currency": "INR",
  "order_id": "order_Fg6IGePNMKDICF",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "method": "card",
  "card": {
    "number": "4386289407660153",
    "cvv": "123",
    "expiry_month": "12",
    "expiry_year": "30",
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

Redirect the customer to the URL given in the response to complete the authentication.

### Fetch a Payment API for Token Information

The token will be created only if the cardholder successfully completes 3ds authentication.

Use the Fetch Payment API to fetch the token.

/payments/\{pay_id\}

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/payments/pay_DG4ZdRK8ZnXC3k
-H "content-type: application/json"
```json: Response
{
  "id": "pay_IJuRCejcSCxf2L",
  "entity": "payment",
  "amount": 500000,
  "currency": "INR",
  "status": "created",
  "order_id": null,
  "invoice_id": null,
  "international": false,
  "method": "card",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": false,
  "description": "Test payment",
  "card_id": "card_IJr7VIQUzucNc2",
  "bank": null,
  "wallet": null,
  "vpa": null,
  "email": "gaurav.kumar@example.com",
  "contact": "+919000090000",
  "token_id": "token_IJr7WSRFECVBSX",
  "notes": {
    "note_key": "value1"
  },
  "fee": null,
  "tax": null,
  "error_code": null,
  "error_description": null,
  "error_source": null,
  "error_step": null,
  "error_reason": null,
  "acquirer_data": {
    "rrn": "033814379298",
    "authentication_reference_number": "100222021120200000000742753928"
  },
  "created_at": 1636549176,
  "reference17": null
}
```

  
### Path Parameter

      `id` _mandatory_
      : `string` The unique identifier of the payment.
