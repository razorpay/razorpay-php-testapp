---
title: Integrate Push Tokenisation
description: Steps to integrate Push Tokenisation with Standard Checkout, Custom Checkout and S2S.
---

# Integrate Push Tokenisation

Integrating Push Tokenisation allows you to securely handle card details by converting them into tokens. Given below are the steps to integrate Push Tokenisation with Standard Checkout, Custom Checkout and S2S.

## Prerequisites

To integrate Push Tokenisation, you must:
- Have an active Razorpay Account
- Have a live payment integration such as Standard or Custom or S2S.

Businesses must be onboarded with Razorpay to appear on bank portals for customer selection. The integration requirements vary by your current Razorpay implementation.

## Standard Checkout

**Integration Effort** - None.

Razorpay provides a fully managed checkout experience with end-to-end control. To enable this feature for Standard Checkout, contact [Razorpay Support](https://razorpay.com/support/#request) for assistance.

For more information, refer [Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md)

## Custom Checkout

Existing Custom Checkout users are automatically eligible for Push Tokenisation. If your business has already integrated with Custom Checkout, you can retrieve all tokens associated with a cardholder by using the Fetch Token API.

### Retrieve Token Via Fetch Token API

You should continue using the same API. However, ensure that the user's phone number is provided in the same format as specified in the payload. You should pass this token to checkout to show customers the saved card details and help them complete the payment.

Refer to the [Fetch Token API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-private.md) document for more information.

> **WARN**
>
> 
> **Watch Out!**
> 
> While creating a customer, ensure that the phone number includes the country code and follows the specified format in the payload (for example, +919900990099) for accurate data mapping.
> 

## S2S (Server-to-Server) Integration

**Integration Effort** - None.

Current S2S Integration Users can use Push Tokenisation without modifications. Integrate with Razorpay’s webhook to receive and process push tokens. Enable relevant events to efficiently consume and manage these tokens.

For more information, refer to the [S2S Integration - Tokenisation APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/token-hq/merchant-requestor/apis.md) documentation.

## Third Party Solutions

**Integration Effort** - Customised.

Customised solutions are available based on specific requirements. Contact your Account Manager or raise a support request via [Razorpay Support](https://razorpay.com/support/#request) for assistance.

## Implementation Requirements

Push Tokenisation uses phone numbers as the unique customer identifier for fetch token operations, enabling seamless token sharing between banks and businesses. Email-only identification is not fully supported.

  
### Step 1 - Fetching Customer Tokens

     To be able to create tokens using Push Tokenisation, you must create a customer using phone number as the primary identifier. For more details, refer [Create a Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers/create.md). 
     The response will include all tokens the customer has authorised for your business account through their bank portal.
    

  
### Step 2 - Webhook Enablement

     - **Event Configuration**: Confirm that the `token.service_provider.activated` event is enabled in your webhook configuration. This event captures successfully tokenised details, including push tokens.
     - **Payload Mapping**: The event payload includes unique customer details. Ensure that you map these details with the unique customer identifier (in this case, phone number) when processing the data.
    

### Setting Up Webhooks for the First Time

If you need to set up a webhook for the first time, follow these steps:

1. Enable the following features:
    - Ensure your Razorpay terminal is activated.
    - Ensure tokenisation is activated for the relevant card networks.
2. Webhook Setup:
    - Watch this [tutorial video](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) for detailed steps on setting up the webhook.
    - Set Up Endpoint: Provide the URL of the endpoint where you want to receive webhook payloads. This should be the same endpoint used for storing token details during checkout.
    - Whitelist Razorpay: Ensure your endpoint is configured to accept requests from Razorpay.

3. The sample modified payload for push tokenisation with customer details 

## token.service_provider.activated

```json: payload
{
  "entity": "event",
  "account_id": "acc_EDUGNVWZIB7Ewb",
  "event": "token.service_provider.activated",
  "contains": [
    "token",
    "service_provider_token"
    "customer"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_OGgK06YEVLnTc0",
        "entity": "token",
        "method": "card",
        "card": {
          "last4": "5003",
          "network": "Visa",
          "type": "credit",
          "issuer": "ICICI",
          "international": false,
          "emi": true,
          "sub_type": "consumer",
          "token_iin": "48202---",
          "cobranding_partner": null
        },
        "created_at": 1717066962,
        "customer": {
          "id": "cust_NgH3a3tGNtvCkA",
          "entity": "customer",
          "name": "Gaurav",
          "email": "gaurav.kumar@example.com",
          "contact": "+919900990099",
          "gstin": null,
          "notes": {
            "notes_key_1": "Tea, Earl Grey",
            "notes_key_2": "Tea, Earl"
          },
          "created_at": 1709117745
        },
        "expired_at": 1853951399,
        "status": "active",
        "notes": [],
        "source": "issuer",
        "customer_id": "cust_NgH3a3--tvCkA",
        "compliant_with_tokenisation_guidelines": true,
        "service_provider_tokens": [
          {
            "id": "spt_OGgK1--ST1rE9",
            "entity": "service_provider_token",
            "provider_type": "network",
            "provider_name": "visa",
            "interoperable": true,
            "provider_data": {
              "token_reference_number": "676dd1c68e5e24a48f1518ccee092a0b",
              "payment_account_reference": "V0010015821281661606691594406",
              "token_expiry_month": 9,
              "token_expiry_year": 2028
            },
            "status": "active"
          }
        ]
      }
    },
    "service_provider_token": {
      "entity": [
        {
          "id": "spt_OGgK1aR3ST1rE9",
          "entity": "service_provider_token",
          "provider_type": "network",
          "provider_name": "visa",
          "interoperable": true,
          "provider_data": {
            "token_reference_number": "676dd1c68e5e24a48f1518ccee092a0b",
            "payment_account_reference": "V0010015821281661606691594406",
            "token_expiry_month": 9,
            "token_expiry_year": 2028,
            "card": []
          },
          "status": "active",
          "tokenised_terminal_id": "IPjK2jYGlbH3jq"
        }
      ]
    },
    "customer": {
      "entity": {
        "id": "NgH3a3tGNtvCkA",
        "email": "example@gmail.com",
        "contact": "9--------0"
      }
    }
  },
  "created_at": 1717066964,
}
```
