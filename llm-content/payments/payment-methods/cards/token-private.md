---
title: Tokens (Private)
description: Learn how to create tokens to save customer's card details using the Tokens API.
---

# Tokens (Private)

A token represents a customer's card details stored in Razorpay servers. We use these tokens to securely fetch the saved details for making it quick and easy for customers to make payments. Tokens are generally created with every payment requests and Tokens API can be used to migrate them from your current system to Razorpay.

> **WARN**
>
> 
> **PCI-DSS Compliance**
> 
> The customer's payment information should never reach your servers unless you are PCI-DSS certified. Your site must be **PCI-DSS** certified to accept, process, store or transmit customer's card details securely to Razorpay.
> 

## Tokens API

/customers/:customer_id/tokens

#### Request Parameters

`customer_id`
: The unique customer ID. To create a customer, refer the [Customer API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers.md) section.

`method`
: The payment method selected by the customer on checkout.

`card[number]`
: The card number.

`card[name]`
: The name on the card.

`card[expiry_month]`
: The expiry month of the card.

`card[expiry_year]`
: The expiry year of the card.

All server-side requests must be authenticated with Basic Auth using the **key-id** as username and **key-secret** as password. You can acces your keys on your Dashboard. Know more about [API authentication](@/Applications/MAMP/htdocs/new-docs/llm-content/api/#authentication.md) to get started with Razorpay APIs.

```curl: Example Request
curl -X POST \
  https://api.razorpay.com/v1/customers/cust_9W8HsFCULn3aTK/tokens \
  -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
  -d 'method=card' \
  -d 'card[name]=Gaurav Kumar' \
  -d 'card[number]=4386289407660153' \
  -d 'card[expiry_month]=1' \
  -d 'card[expiry_year]=2022'
  
```json: Response
{
  "id": "token_94sMeNFjCouADt",
  "entity": "token",
  "bank": null,
  "wallet": null,
  "method": "card",
  "card": {
    "entity": "card",
    "name": "gauravkumar",
    "last4": "0153",
    "network": "Visa",
    "type": "credit",
    "issuer": "UTIB",
    "international": false,
    "emi": true,
    "expiry_month": 1,
    "expiry_year": 2022
  },
  "recurring": false,
  "used_at": 1505935715,
  "created_at": 1488446398
}
```
