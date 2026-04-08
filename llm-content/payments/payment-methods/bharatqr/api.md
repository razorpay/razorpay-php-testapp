---
title: API Reference
description: Razorpay APIs lets you create, fetch, fetch all payments made from BharatQR.
---

# API Reference

Learn how to create a BQR payment and perform other operations using Razorpay APIs. To understand the basic concepts of our API usage, refer our [API Documentation.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md)

## Get Postman Collection

We have a Postman collection to make the integration quicker and easier. You can try out our APIs on the Razorpay Postman Public Workspace.

[](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-11b2db21-9019-4814-9669-c70305b8fd6e)

## Create 

Each BharatQR is mapped to a virtual account. In order to generate a BharatQR, a virtual account must be created with the appropriate receiver type. The receiver defines the method of payment collection. In the case of BharatQR, the receiver type is QR Code which allows you to accept payments made via UPI or Cards.

/virtual_accounts

```curl:Example Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts \
-H "Content-Type: application/json" \
-d '{
  "receivers": {
    "types": [
      "qr_code"
    ]
  },
  "description": "First Payment by BharatQR",
  "customer_id": "cust_805c8oBQdBGPwS",
  "notes": {
    "reference_key": "reference_value"
  }
}'
```json:Response
{
  "id": "va_4xbQrmEoA5WJ0G",
  "name": "Acme Corp",
  "entity": "virtual_account",
  "status": "active",
  "description": "First Payment by BharatQR",
  "amount_expected": null,
  "notes": {
    "reference_key": "reference_value"
  },
  "amount_paid": 0,
  "customer_id": "cust_805c8oBQdBGPwS",
  "receivers": [
    {
      "id": "qr_4lsdkfldlteskf",
      "entity": "qr_code",
      "reference": "AgdeP8aBgZGckl",
      "short_url": "https://rzp.io/i/PLs03pOc"
    }
  ],
  "close_by": null,
  "closed_at": null,
  "created_at": 1607938184
}
```

### Request Parameters

`receivers` _mandatory_
: `array` consisting of configured receivers types.

  `types` _mandatory_
  : `array` The receiver type. Here, it will be `qr_code`.

`description` _optional_
: `string` A brief description of the payment.

`customer_id` _optional_
: `string` Unique identifier of customer for whom BharatQR is being created. Refer [Customer API.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md)

`notes` _optional_
: `object` consisting of key value pairs as notes. Refer [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`amount_expected` _optional_
: `integer` The maximum amount you expect to receive in this virtual account. Pass `69999` for ₹699.99.

## Response Parameters

`id` 
: `string` The unique identifier of the generated QR code. A sample `id` for a QR code will look like this: `qr_4lsdkfldlteskf`.

`entity`
: `string` The name of the response entity. Here, it is `qr_code`.

`reference` 
: `string` A 14-digit reference number or a receipt for the payment. It will be the same as the value of `id` without the prefix `qr_`. A sample `reference` value will look like this: `4lsdkfldlteskf`.

`short_url`
: The URL of the QR code. A sample short URL looks like this `http://rzp.io/l6MS`. Clicking on the link will download the code. This will be useful for offline merchants.

`status`
: The status of the payment. It can have two values, `active` and `closed`.

## Fetch a Payment

The following endpoint retrieves details of a specific payment.

/virtual_accounts/:id

```curl: Curl
curl -u : \
   -X GET \
   https://api.razorpay.com/v1/virtual_accounts/va_4xbQrmEoA5WJ0G

```json:Response
{
  "id": "va_4xbQrmEoA5WJ0G",
  "entity": "virtual_account",
  "description": "First Payment by BharatQR",
  "customer_id": "cust_805c8oBQdBGPwS",
  "status": "active",
  "amount_paid": 10000,
  "notes": {
    "reference_key": "reference_value"
  },
  "receivers": [
    {
      "id": "qr_4lsdkfldlteskf",
      "entity": "qr_code",
      "reference": "AgdeP8aBgZGckl",
      "short_url": "http://rzp.io/l6MS",
      }
  ],
  "created_at": 1455696638
}
```

## Fetch All Payments

The following endpoint retrieves details of all the payments.

/virtual_accounts

```curl: Curl
curl -u : \
   -X GET \
   https://api.razorpay.com/v1/virtual_accounts
```json:Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "va_84lyVss1CRZ6eM",
      "entity": "virtual_account",
      "name": "Merchant Billing Label",
      "description": "Second Payment by BharatQR",
      "status": "active",
      "amount_paid": 90000,
      "notes": [],
      "customer_id": null,
      "receivers": [
        {
          "id": "qr_4lsdkfldlteskf",
          "entity": "qr_code",
          "reference": "",
          "short_url": "http://rzp.io/l6MS",
          }
      ],
      "created_at": 1497873405
    },
    {
      "id": "va_4xbQrmEoA5WJ0G",
      "entity": "virtual_account",
      "name": "Merchant Billing Label",
      "description": "First Payment by BharatQR",
      "status": "active",
      "amount_paid": 10000,
      "notes": {
        "reference_key": "reference_value"
      },
      "receivers": [
        {
          "id": "qr_4lsdkfldlfr4er",
          "entity": "qr_code",
          "reference": "",
          "short_url": "http://rzp.io/l6MS",
          }
      ],
      "customer_id": "cust_805c8oBQdBGPwS",
      "created_at": 1497922042
    }
  ]
}
```

## Close 

/virtual_accounts/:id/close

### Path Parameter

`id` _mandatory_
:  `string`The unique identifier of the virtual account that is to be closed.

```cURL: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts/va_FaulaIlvXeGqfV/close\
```json:Response
{
   "id": "va_FaulaIlvXeGqfV",
   "name": "Acme Corp",
   "entity": "virtual_account",
   "status": "closed",
   "description": "Description for this QR Code",
   "amount_expected": null,
   "notes": {
       "reference_key": "You can pass any notes here"
   },
   "amount_paid": 0,
   "customer_id": "cust_FPOJP9UkUpRO14",
   "receivers": [
       {
           "id": "qr_FaulaJ6gYWovHF",
           "entity": "qr_code",
           "reference": "FaulaJ6gYWovHF",
           "short_url": "https://rzp.io/i/sA2Tjoc",
           "created_at": 1599650857
       }
   ],
   "close_by": null,
   "closed_at": 1599650868,
   "created_at": 1599650857
}

```
