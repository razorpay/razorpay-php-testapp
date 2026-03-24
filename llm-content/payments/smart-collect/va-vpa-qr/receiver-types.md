---
title: API Endpoints
---

# API Endpoints

Base URL: `https://api.razorpay.com/v1/`

The virtual account response contains attributes such as `id` and `customer_id`, and also a field `receivers`. This is an array that defines what receivers are available for the virtual account.

For example, if the `receiver_types` field of the original request contained `bank_account`, then the response will contain a `receivers` array with one element, which gives details of that `bank_account` receiver such as account number,  IFSC, etc.

## Create

> **WARN**
>
> 
> **Note**
> 
> The request format for virtual account creation recently underwent a change, and the updated format can be found [here](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/va-vpa-qr/api.md). The request format given below will eventually be deprecated.
> 
> For new integrations, we strongly recommend you use the updated request format, as it allows a host of new features, most particularly the support for completely-numeric account numbers by default.
> 

/virtual_accounts

```bash: cURL
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
   -X POST \
   --data "receiver_types[]=bank_account" \
   --data "description=First Virtual Account" \
   --data "notes[reference_key]=reference_value" \
   https://api.razorpay.com/v1/virtual_accounts
```json:Response
{
  "id": "va_4xbQrmEoA5WJ0G",
  "entity": "virtual_account",
  "description": "First Virtual Account",
  "customer_id": "cust_805c8oBQdBGPwS",
  "status": "active",
  "amount_paid": 0,
  "notes": {
    "reference_key": "reference_value"
  },
  "receivers": [
    {
      "id": "ba_4lsdkfldlteskf",
      "entity": "bank_account",
      "name": "Merchant Billing Label",
      "account_number": "11122219877893452",
      "ifsc": "RAZR0000001"
    }
  ],
  "created_at": 1455696638
}
```

With the exception of the `Create` API, the request format for all other API endpoints remains the same, and can be checked [here](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/va-vpa-qr/api.md).

## Migration

To migrate to the new request format, simply replace the `receiver_types` parameter in the request body with the equivalent `receivers.types` parameters.

```json:Older Request
{
  "receiver_types": [
    "bank_account"
  ],
  "description": "First Virtual Account",
  "customer_id": "cust_805c8oBQdBGPwS",
  "notes": {
    "reference_key": "reference_value"
  }
}
```json:Updated Request
{
  "receivers": {
    "types": [
      "bank_account"
    ]
  },
  "description": "First Virtual Account",
  "customer_id": "cust_805c8oBQdBGPwS",
  "notes": {
    "reference_key": "reference_value"
  }
}
```

Note that `receiver.types` is a mandatory parameter.

> **INFO**
>
> 
> **Note**
> 
> By default, the account number generated using the new request format is wholly numeric, thus allowing it to be used on a wider range of platforms. This is a change from the older request format, which produced only alphanumeric account numbers.
>
