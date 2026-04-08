---
title: Tokens (Public)
description: Learn how to create tokens to save customer's card details using the Tokens API.
---

# Tokens (Public)

A token represents a customer's card details stored in Razorpay servers. We use these tokens to securely fetch the saved details for making it quick and easy for customers to make payments. Tokens are generally created with every payment requests and Tokens API can be used to migrate them from your current system to Razorpay.

> **WARN**
>
> 
> **PCI-DSS Compliance**
> 
> The customer's payment information should never reach your servers unless you are PCI-DSS certified. Your site must be **PCI-DSS** certified to accept, process, store or transmit customer's card details securely to Razorpay.
> 

## Tokens API

/customers/:customer_id/tokens/public

```curl: Example Request
curl -X POST \
https://api.razorpay.com/v1/customers/cust_EdxDIpddQC9o1F/tokens/public \
 -u '' \
 -h 'content-type: application/json'
 -d '{
  "method": "card",
  "card": {
    "name": "Gaurav Kumar",
    "number": "4386289407660153",
    "expiry_month": "12",
    "expiry_year": "2022"
  }
}'
```json: Response
{
  "id": "token_EdzTmVX52ptw3H",
  "entity": "token",
  "token": "EygTXOq4WaMUDZ",
  "bank": null,
  "wallet": null,
  "method": "card",
  "card": {
    "entity": "card",
    "name": "Gaurav Kumar",
    "last4": "0153",
    "network": "Visa",
    "type": "credit",
    "issuer": null,
    "international": false,
    "emi": false,
    "expiry_month": 12,
    "expiry_year": 2022,
    "flows": {
      "recurring": true,
      "iframe": false
    }
  },
  "recurring": false,
  "auth_type": null,
  "mrn": null,
  "used_at": 1586785385,
  "created_at": 1586785385,
  "customer": {
    "id": "cust_EdxDIpddQC9o1F",
    "entity": "customer",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9988223355",
    "gstin": null,
    "notes": [],
    "created_at": 1586777406
  },
  "expired_at": 1672511399,
  "dcc_enabled": false
}
```

#### Path Parameter

`customer-id` _mandatory_
: `string` Unique identifier of the customer. You can create a customer using [API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) or via the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers.md#create-a-customer).

#### Request Parameters

`method` _mandatory_
: `string` The payment method selected by the customer on checkout. Here, it should be `card`.

`card`
: Details of the customer's card.

    `number` _mandatory_
    : `integer` The card number.

    `name` _mandatory_
    : `string` The name on the card.

    `expiry_month` _mandatory_
    : `string` The expiry month of the card in `MM` format.

    `expiry_year` _mandatory_
    : `string` The expiry year of the card in `YY` format.

All server-side requests must be [authenticated](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#authentication) with `Basic Auth` using the [KEY_ID] as username. You can generate your API keys on the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).
