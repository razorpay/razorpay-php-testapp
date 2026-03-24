---
title: Bank Transfer on Hosted Checkout
description: Offer bank transfer as a payment method to customers on Razorpay Hosted Checkout.
---

# Bank Transfer on Hosted Checkout

You can now accept payments from customers in the form of online bank transfers, using the Razorpay Checkout form.

![](/docs/assets/images/bank-transfer-bank-transfer-hosted.jpg)

## How it Works

1. Customer selects bank transfer as the payment method on Hosted Checkout.
2. A virtual bank account is created with bank account number and IFSC details and displayed to the customer.
3. Customer copies these details and make a netbanking payment from their online banking portal.

These virtual bank accounts are linked to the bank account you have registered with Razorpay. The money will be settled to your account as per the settlement schedule.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

You can choose:

- [**Method 1: Create New Virtual Bank Account Per Order**](#method-1-create-new-virtual-bank-account-per)
- [**Method 2: Create New Virtual Bank Account Per Customer**](#method-2-create-new-virtual-bank-account-per)

## Method 1: Create New Virtual Bank Account Per Order

This creates a new virtual bank account every time a customer selects bank transfer as the payment method on Hosted Checkout.

### Integration

The bank transfer payment method will appear for the [payment gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/hosted.md) and products such as Payment Links, Payment Pages and Subscriptions.

| Approval | Integration
---
Payment Gateway | ✓ | ✓
---
Products such as Payment Links, Payment Pages, Invoices, etc. | ✓ | Not Required

Complete the following steps to integrate this payment method on your Razorpay Hosted Checkout Integration:

1. Create Order.
2. Pass `method` and `order_id` to Hosted Checkout.
3. Subscribe to webhooks event.

### Step 1: Create an Order

@include integration-steps/order-creation

### Step 2: Add `method` parameter to Hosted Checkout

Update your integration with the `method` and `order` parameters as shown below. This will display bank transfer as a payment method.

```html: Hosted Checkout

  ">
  // Adds bank transfer payment method
   //Generated using Orders API at server-side
  
  
  
  
  
  
  
  
  
  
  Submit

```

#### Request Parameter

`method[smartcollect]` _mandatory_
: `boolean` Display bank transfer payment method on Checkout. Possible values:
    - `true`: Bank transfer payment method is displayed on Checkout.
    - `false`: Bank transfer payment method is not displayed on Checkout.

### Step 3: Subscribe to Webhook Event

You must subscribe to the `virtual_account.credited` webhook event on the Dashboard to receive notifications whenever customers make payments using bank transfers. Know how to [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md#set-up-webhooks).

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

## Method 2: Create New Virtual Bank Account Per Customer

This ensures that each customer will be allocated a unique virtual bank account, whenever they use bank transfer method on Hosted Checkout. This method requires specific integration steps, which are mentioned in the following section.

### Integration

The bank transfer payment method will appear for the [payment gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/hosted.md) and products such as Payment Links, Invoices and Subscriptions.

| Approval | Integration
---
Payment Gateway | ✓ | ✓
---
Products such as Payment Links, Payment Pages, Invoices, etc. | ✓ | Not Required

Complete the following steps to integrate this payment method on your Razorpay Hosted Checkout Integration:

1. Create a Customer.
2. Create an Order.
3. Pass `method`, `customer_id` and `order_id` to Hosted Checkout.
4. Subscribe to webhooks event.

### Step 1: Create a Customer

You must create a customer using the Customers ID. You can also do same using the Dashboard.

Razorpay identifies a customer by a unique customer identifier generated at the time of creation. This allows Razorpay to take action on a particular customer on behalf of the merchant for example, send an invoice, set recurring payments, and others./create-customer

#### Request Parameters

Razorpay identifies a customer by a unique customer identifier generated at the time of creation. This allows Razorpay to take action on a particular customer on behalf of the merchant for example, send an invoice, set recurring payments, and others./create-customer-req

#### Request Parameters

Razorpay identifies a customer by a unique customer identifier generated at the time of creation. This allows Razorpay to take action on a particular customer on behalf of the merchant for example, send an invoice, set recurring payments, and others./create-customer-res

Pass the `customer_id` available in the response to Checkout.

### Step 2: Create an Order

@include integration-steps/order-creation

### Step 3: Pass `customer_id` and `order_id` to Hosted Checkout

You must pass the `customer_id` and `order_id` generated in the previous steps to Checkout, as shown below:

```html: Hosted Checkout

  ">
  //Adds bank transfer payment method
  //Customer identifier generated in Step 1
  /Order identifier generated in Step 2
  
  
  
  
  
  
  
  
  
  
  Submit

```

#### Request Parameter

`method[smartcollect]` _mandatory_
: `boolean` Display bank transfer payment method on Checkout. Possible values:
    - `true`: Bank transfer payment method is displayed on Checkout.
    - `false`: Bank transfer payment method is not displayed on Checkout.

`customer_id` _mandatory_
: `string` Unique identifier of the customer to whom the virtual account has been allocated. [Generated in Step 1](#step-1-create-a-customer).

`order_id` _mandatory_
: `string` Unique identifier of the order. [Generated in Step 2](#step-2-create-an-order).

**Read More**: [List of parameters for Hosted Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/hosted/integration-steps.md#1-build-integration).

#### Subscribe to Webhook Event

You must subscribe to the `virtual_account.credited` webhook event on the Dashboard to receive notifications whenever customers make payments using bank transfers. Know how to [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md#set-up-webhooks).

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

### Try It Out

To understand how your customers can transfer money to you:

1. [Launch our demo Standard Checkout.](https://razorpay.com/demo/smartcollect/)
2. Provide your phone number and email address.
3. Select **Bank Transfer** as your payment method.
4. Click **Copy Details** to copy the account number, IFSC and Beneficiary Name.
5. Go to your preferred netbanking portal, enter the copied details and initiate an online bank transfer.

> **WARN**
>
> 
> **Live Payment**
> 
> This initiates a live payment. The amount will be refunded within 5-7 days.
>
