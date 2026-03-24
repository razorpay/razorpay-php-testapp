---
title: UPI QR Code API
description: Create UPI QR Codes and associate the received payments with respective customers using Razorpay Virtual Account APIs.
---

# UPI QR Code API

UPI QR Code is a payment method that allows you to accept payments from your customers using the generated QR code. Razorpay UPI QR Codes are built around Razorpay's Virtual Account APIs. You can create virtual accounts and tag them to individual customers to track the customers' payments. Razorpay notifies you about the payment made to any of the virtual accounts and handles the complexity of reconciling these payments.

## UPI QR Code Workflow

1. Send a request to create a virtual account with `receiver.type` as `qr_code`. A QR code is generated as a result of virtual account creation.
2. Display the QR code on your app used for collecting payments.
3. Customers scan and pay using any of the UPI apps on their mobile devices.
4. Verify the payment status either by polling Razorpay APIs or by[ subscribing to Webhook events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

## Prerequisites

1. Ensure that you have the API key required for integration.

    - Log in to the Dashboard with appropriate credentials.
    - Select the mode (**Test** or **Live**) for which you want to generate the API key.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     You have to generate separate API Keys for the test and live modes. No money is deducted from your account in the test mode.
>     

    - Navigate to **Settings** → **API Keys** → **Generate Key** to generate key for the selected mode.

    
    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     After generating the keys from the Dashboard, download and save them securely. If you do not remember your API Keys, you need to re-generate them from the Dashboard.
>     

    

2. Verify that the `virtual_account` feature enabled on your account.

    If you are already using the [Smart Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md) product of Razorpay, this feature is enabled for your account. If you are not, then you must log in to Dashboard and complete the onboarding process of the Smart Collect product for the `virtual_account` feature to be enabled for your account.

    ![](/docs/assets/images/smart-collect-onboarding.jpg)

3. Know about the [Virtual Accounts APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md).

## Integration flow

### Step 1: Creating a QR code

To start accepting payments using UPI QR Code, a virtual account should be created with a `receiver`, which defines the payment collection method associated with it. For UPI QR Code, the receiver type is `qr_code`, which allows your customers to make payments using UPI by scanning the QR code.

You need to create a virtual account by sending an API request to Razorpay for generating the QR code for each payment.

/virtual_accounts

#### Request Parameters

`receivers` _mandatory_
:  `object` Object consisting of configured receivers types.

    `types` _mandatory_
    :  `array` List of desired receiver types. 
 In this case, it will be `qr_code`.

    `qr_code` _mandatory_
    : `array` The payment method that should be used to make the payment.

        `card` _optional_
        : `boolean` Indicates whether card payment should be allowed with the QR Code or not. 
 By default, it is set to `true`. In case of UPI QR payments, set this value to `false`.

        `upi` _mandatory_
        : `boolean` Indicates whether UPI payment should be allowed with the QR Code or not. 
 By default, the value is set to `true`.

`description` _optional_
: `string` A brief description of the payment.

`customer_id` _optional_
: `string` Unique identifier of the customer for whom UPI QR Code is created. Know more about the [ Customers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md).

`close_by`_optional_
: `integer` Specifies the UNIX timestamp at which the virtual account is scheduled to be automatically closed. It should be set at least 15 minutes after the time of creation.

`notes` _optional_
: `object` Object consisting of key value pairs that allow you to store additional data. 
 Know more about[ Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes).

`amount_expected` _mandatory_
: `integer` The maximum amount you expect to receive in this virtual account. Pass `69999` = ₹699.99 (INR is the default currency).

```curl: Sample Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/virtual_accounts \
-H "Content-Type: application/json" \
-d'
{
  "customer_id": "cust_805c8oBQdBGPwS",
  "description": "Test virtual account",
  "receivers": {
    "types": [
      "qr_code"
    ],
    "qr_code": {
      "method": {
        "card": false,
        "upi": true
      }
    }
  },
  "amount_expected": 100,
  "notes": {
    "purpose": "emi payment"
  }
}'

```json: Response
{
  "id": "va_E1yIDtgjgcHtxe",
  "name": "acme",
  "entity": "virtual_account",
  "status": "active",
  "description": "Test001",
  "amount_expected": 100,
  "notes": {
    "purpose": "emi payment"
  },
  "amount_paid": 0,
  "customer_id": null,
  "receivers": [
    {
      "id": "qr_E1yIDu7viyCUFz",
      "entity": "qr_code",
      "reference": "E1yIDu7viyCUFz",
      "short_url": "https://rzp.io/i/XNrJv6i",
      "created_at": 1578484284
    }
  ],
  "close_by": null,
  "closed_at": null,
  "created_at": 1578484284
}
```

#### Response Parameters

`id`
:   `string` Unique identifier of the generated QR Code. 
For example, `qr_4lsdkfldlteskf`

`entity`
: `string` Name of the entity in the response. In this case, it is `qr_code`.

`short_url`
: `string` URL of the QR code. 
 A sample short URL looks like this http://rzp.io/l6MS. Clicking on the link will download the code for offline use.

`status`
: `string` The status of the virtual account. Possible values: 
-`active` 
- `closed`

`closed_at`
: `integer` Specifies the timestamp(in Unix format) at which the virtual account was closed.

### Step 2: Verifying the Payment Status

To know if the customer has made the payment or not, you can track the payment status either by polling the Razorpay servers or subscribing to [ specific events generated in our system](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).

#### Fetch All Virtual Accounts

To fetch all the payments received using the QR Code, send the following API request to Razorpay:

/virtual_accounts

```curl: Sample Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
   -X GET https://api.razorpay.com/v1/virtual_accounts \
    -H "Content-Type: application/json" \
```json: Response
{
  "entity": "collection",
  "count": 2,
  "items": [
    {
      "id": "va_E1yX1U068dKylw",
      "name": "acme",
      "entity": "virtual_account",
      "status": "active",
      "description": "First Payment",
      "amount_expected": 100,
      "notes": {
        "purpose": "emi payment from Gaurav"
      },
      "amount_paid": 100,
      "customer_id": null,
      "receivers": [
        {
          "id": "qr_E1yX1UMG8abT7R",
          "entity": "qr_code",
          "reference": "E1yX1UMG8abT7R",
          "short_url": "https://rzp.io/i/hgNIkEI",
          "created_at": 1578485124
        }
      ],
      "close_by": null,
      "closed_at": null,
      "created_at": 1578485124
    },
    {
      "id": "va_E1yWYl9krnxANV",
      "name": "acme",
      "entity": "virtual_account",
      "status": "active",
      "description": "Second Payment",
      "amount_expected": 100,
      "notes": {
        "purpose": "emi payment from Bhairav"
      },
      "amount_paid": 0,
      "customer_id": null,
      "receivers": [
        {
          "id": "qr_E1yWYlodgS1UH7",
          "entity": "qr_code",
          "reference": "E1yWYlodgS1UH7",
          "short_url": "https://rzp.io/i/hooYNB7",
          "created_at": 1578485098
        }
      ],
      "close_by": null,
      "closed_at": null,
      "created_at": 1578485098
    }
  ]
}
```

#### Fetching a Virtual Account

To fetch a specific payment, send the following request to Razorpay:

/virtual_accounts/:id

#### Path Parameters

`id` _mandatory_
: `string` Unique identifier of a specific virtual account whose details are to be retrieved.

```curl: Sample Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X GET https://api.razorpay.com/v1/virtual_accounts/va_E1yX1U068dKylw \
    -H "Content-Type: application/json" \
```json: Response
{
  "id": "va_E1yX1U068dKylw",
  "name": "acme",
  "entity": "virtual_account",
  "status": "active",
  "description": "First Payment",
  "amount_expected": 100,
  "notes": {
    "purpose": "emi payment from Gaurav"
  },
  "amount_paid": 100,
  "customer_id": null,
  "receivers": [
    {
      "id": "qr_E1yX1UMG8abT7R",
      "entity": "qr_code",
      "reference": "E1yX1UMG8abT7R",
      "short_url": "https://rzp.io/i/hgNIkEI",
      "created_at": 1578485124
    }
  ],
  "close_by": null,
  "closed_at": null,
  "created_at": 1578485124
}
```

#### Fetching all payments of a Virtual account

To fetch all the payments made to a virtual account, send the following request:

/virtual_accounts/:id/payments

#### Path Parameters

`id` _mandatory_
: `string` Unique identifier of a virtual account whose payments should be retrieved.

```curl: Sample Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X GET https://api.razorpay.com/v1/virtual_accounts/va_E1yX1U068dKylw/payments \
     -H "Content-Type: application/json" \
```json: Response
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "pay_E1yZBuTpzBg1DJ",
      "entity": "payment",
      "amount": 100,
      "currency": "INR",
      "status": "captured",
      "order_id": null,
      "invoice_id": null,
      "international": false,
      "method": "upi",
      "amount_refunded": 0,
      "refund_status": null,
      "captured": true,
      "description": null,
      "card_id": null,
      "bank": null,
      "wallet": null,
      "vpa": "gaurav@exampleupi",
      "email": "gaurav.kumar@example.com",
      "contact": "+919000090000",
      "notes": [],
      "fee": 1,
      "tax": 0,
      "error_code": null,
      "error_description": null,
      "created_at": 1578485247
    }
  ]
}
```

#### Closing a Virtual Account

After you have received the payment, you may choose to close the virtual account.

/virtual_accounts/:id/close 

#### Path Parameter

`id` _mandatory_
: `string` Unique identifier of the virtual account that should be closed.

```curl: Sample Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
   -X POST https://api.razorpay.com/v1/virtual_accounts/va_E1yX1U068dKylw/close \
    -H "Content-Type: application/json" \
``` json: Response
{
  "id": "va_E1yX1U068dKylw",
  "name": "acme",
  "entity": "virtual_account",
  "status": "closed",
  "description": "First Payment",
  "amount_expected": 100,
  "notes": {
    "purpose": "emi payment from Gaurav"
  },
  "amount_paid": 100,
  "customer_id": null,
  "receivers": [
    {
      "id": "qr_E1yX1UMG8abT7R",
      "entity": "qr_code",
      "reference": "E1yX1UMG8abT7R",
      "short_url": "https://rzp.io/i/hgNIkEI",
      "created_at": 1578485124
    }
  ],
  "close_by": null,
  "closed_at": 1578485501,
  "created_at": 1578485124
}
```
