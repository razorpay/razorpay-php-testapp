---
title: Bank Transfer on Custom Checkout
description: Know how to integrate bank transfer as a payment method on Razorpay Custom Checkout.
---

# Bank Transfer on Custom Checkout

You can now accept payments from customers in the form of online bank transfers using the Razorpay Custom Checkout.

## How it Works

1. Customer selects bank transfer as the payment method on Checkout.
2. A Customer Identifier is created with the bank account number and IFSC details and displayed to the customer.
3. The customer copies these details and makes a netbanking payment from their online banking portal.

These Customer Identifiers are linked to the bank account you have registered with Razorpay. The payments are settled in your account as per the settlement schedule.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

## Prerequisites

- [Create a Razorpay Account](https://dashboard.razorpay.com/signup).
- [Generate the API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md).
- Integrate with [Razorpay Custom Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom.md).

## Integration Steps

1. [Create an order](#step-1-create-an-order).
2. [Add the `fetchVirtualAccount` method to the custom checkout integration](#step-2-add-fetchvirtualaccount-method-to-custom-checkout).
3. [Subscribe to the virtual account credited webhook event](#step-3-subscribe-to-webhook-event).

### Step 1: Create an Order

@include integration-steps/order-creation

### Step 2: Add `fetchVirtualAccount` method to Custom Checkout

Use the method `fetchVirtualAccount` to create and fetch the virtual account details. The method is called with the following data.

#### Sample Code

```js: Bank Transfer
var data = {
 
  order_id: 'order_CuEzONfnOI86Ab',// Replace with Order ID generated in Step 1
  customer_id: "cust_1Aa00000000004",
  notes: {
    address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
  }
};

razorpay.fetchVirtualAccount(data)
.then((response) => {
    console.log(response)
  })
  .catch((error) => {
    // 
});

```js: Sample Response
{
  "id":"va_DlGmm7jInLudH9",
  "name":"Acme Corp",
  "entity":"virtual_account",
  "status":"active",
  "description":"Virtual Account created for Raftar Soft",
  "amount_expected":null,
  "notes":{
    "project_name":"Banking Software"
  },
  "amount_paid":0,
  "customer_id":"cust_1Aa00000000004",
  "receivers":[
    {
      "id":"ba_DlGmm9mSj8fjRM",
      "entity":"bank_account",
      "ifsc":"RATN0VAAPIS",
      "bank_name": "RBL Bank",
      "name":"Acme Corp",
      "notes":[],
      "account_number":"2223330099089860"
    }
  ],
  "close_by":1681615838,
  "closed_at":null,
  "created_at":1574837626
}
```

#### Request Parameters

`order_id` _mandatory
: `string` The unique identifier of the order created in the previous step.

`customer_id` _optional_
: `string` The unique identifier of the customer. Learn how to create a customer using the [Customers API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers.md). This parameter is mandatory if you want to associate the virtual account with a specific customer.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### Response Parameters

@include smart-collect/api/response

> **INFO**
>
> 
> **Handy Tips**
> 
> The above flow also works with the following cases:
> 
> 1. With the Customer Fee bearer model, the amount validation should happen with Amount + Fee.
> 2. You can pass the customer id in Checkout to ensure that a static virtual account is created for each customer.
> 

### Step 3: Subscribe to Webhook Event

You must subscribe to the `virtual_account.credited` webhook event on the Dashboard to receive notifications whenever customers make payments using bank transfers. Learn how to [setup webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/#set-up-webhooks.md).

#### Sample Payload

```json: virtual_account.credited
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "virtual_account.credited",
  "contains": [
    "payment",
    "virtual_account",
    "bank_transfer"
  ],
  "payload": {
    "payment": {
      "entity": {
        "id": "pay_DETA2KrOlhqQzF",
        "entity": "payment",
        "amount": 50000,
        "currency": "INR",
        "status": "captured",
        "order_id": "order_DBJOWzybf0sJbb",
        "invoice_id": null,
        "international": false,
        "method": "bank_transfer",
        "amount_refunded": 0,
        "amount_transferred": 0,
        "refund_status": null,
        "captured": true,
        "description": "NA",
        "card_id": null,
        "bank": null,
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "customer_id": "cust_1Aa00000000004",
        "notes": [],
        "fee": 731,
        "tax": 112,
        "error_code": null,
        "error_description": null,
        "created_at": 1567675983
      }
    },
    "virtual_account": {
      "entity": {
        "id": "va_DET8z3wBxfPB5L",
        "name": "Acme Corp",
        "entity": "virtual_account",
        "status": "active",
        "description": "Virtual Account to test webhook",
        "amount_expected": null,
        "notes": {
          "Important": "Notes for Internal Reference"
        },
        "amount_paid": 50000,
        "customer_id": "cust_1Aa00000000004",
        "close_by": null,
        "closed_at": null,
        "created_at": 1567675923,
        "receivers": [
          {
            "id": "ba_DET8z5Z5ghv4hW",
            "entity": "bank_account",
            "ifsc": "RATN0VAAPIS",
            "bank_name": "RBL Bank",
            "name": "Acme Corp",
            "account_number": "1112220006712324"
          }
        ]
      }
    },
    "bank_transfer": {
      "entity": {
        "id": "bt_DETA2KSUJ3uCM9",
        "entity": "bank_transfer",
        "payment_id": "pay_DETA2KrOlhqQzF",
        "mode": "NEFT",
        "bank_reference": "156767598340",
        "amount": 50000,
        "payer_bank_account": {
          "id": "ba_DETA2UuuKtKLR1",
          "entity": "bank_account",
          "ifsc": "KKBK0000007",
          "bank_name": "Kotak Mahindra Bank",
          "name": "Gaurav Kumar",
          "account_number": "765432123456789"
        },
        "virtual_account_id": "va_DET8z3wBxfPB5L"
      }
    }
  },
  "created_at": 1567675983
}
```
