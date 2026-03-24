---
title: Charge Customers During Registration - Use Cases and Payment Methods
description: Register a customer's mandate and debit the first recurring payment as part of the same transaction using Emandate.
---

# Charge Customers During Registration - Use Cases and Payment Methods

If you are using the existing emandate flow, you can only charge the customer after they complete the authorisation transaction and the token is confirmed. This means, you need to wait a few days before you can charge the customer. If the mandate registration fails, you have to start the process again, causing further delays. This may lead to a delay in onboarding the customer impacting your business.

You can use this feature where you can charge any amount to your customer as part of the authorisation transaction. The customer is charged an amount immediately while initiating the mandate registration in the background. This helps you to onboard the customer immediately without waiting for the mandate to be registered.

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

## Use Cases

Following are a couple of use cases where you can use this feature:

### Mutual Funds

When a customer starts a new Systematic Investment Plan (SIP), the investment needs to be made immediately. The customer needs to be charged as part of the mandate registered process. It is not possible to wait for a few days while the mandate is registered before charging the customer.

### Insurance

If you are an insurance provider, you need to charge the customer the first premium immediately when selling them the policy.

## Supported Banks

Currently, only **HDFC** and **ICICI** support this feature.

## Integration Steps

The integration flow here is same as that for emandate registration.
1. [Create an authorisation transaction](#1-create-an-authorization-transaction).
1. [Check token status](#2-fetch-and-manage-tokens).
1. [Create subsequent charges](#3-create-subsequent-payments).

## 1. Create an Authorisation Transaction

@include recurring-payments/create-auth-tran-two-methods

### 1.1. Using Razorpay Standard Checkout

@include recurring-payments/create-auth-tran-checkout-intro

#### 1.1.1. Create a Customer

@include recurring-payments/customer/api

##### Request Parameters

@include recurring-payments/customer/api-req

#### 1.1.2. Create an Order

Use the below endpoint to create an order.

/orders

You can create a payment against the `order_id` generated in the response.

```cURL: Emandate via Netbanking
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 100,
  "currency": "INR",
  "method": "emandate",
  "payment_capture": true,
  "customer_id": "cust_1Aa00000000001",
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "token": {
    "auth_type": "netbanking",
    "max_amount": 9999900,
    "expire_at": 4102444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
    },
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "ifsc_code": "HDFC0000001"
    }
  }
}'
```json: Response
{
  "id": "order_1Aa00000000001",
  "entity": "order",
  "amount": 100,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "receipt": "Receipt No. 1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "created_at": 1579700597,
  "token": {
    "method": "emandate",
    "recurring_status": null,
    "failure_reason": null,
    "currency": "INR",
    "max_amount": 9999900,
    "auth_type": "netbanking",
    "expire_at": 4102444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey… decaf."
    },
    "bank_account": {
      "ifsc": "HDFC0000001",
      "bank_name": "HDFC Bank",
      "name": "Gaurav Kumar",
      "account_number": "1121431121541121",
      "account_type": "savings",
      "beneficiary_email": "gaurav.kumar@example.com",
      "beneficiary_mobile": "9000090000"
    },
    "first_payment_amount": 0
  }
}
```

##### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. Pass `100` for ₹1.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support `INR`.

`method` _mandatory_
: `string` The authorisation method. In this case the value will be `emandate`.

`payment_capture` _mandatory_
: `boolean` Determines if payment should be automatically captured. Possible values:
   - `true` (recommended): Automatically capture the payment.
   - `false` (default/not recommended): You have to manually capture payments.

`customer_id` _mandatory_
: `string` The unique identifier of the customer, who is to be charged. For example, `cust_D0cs04OIpPPU1F`.

`receipt` _optional_
: `string` A user-entered unique identifier for the order. For example, `rcptid #1`. This parameter should be mapped to the `order_id` sent by Razorpay.

`notes`_optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`token`
: Details related to the authorization such as max amount and bank account information.

  `auth_type` _optional_
  : `string` Here, it has to be `netbanking`.

  `max_amount` _optional_
  : `integer` The maximum amount, in paise, that a customer can be charged in one transaction. Know about [maximum and default values](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/faqs/#2-what-is-the-maximum-amount-which-can.md).

  `expire_at` _optional_
  : `integer` The timestamp, in Unix format, till when you can use the token (authorisation on the payment method) to charge the customer subsequent payments. Default is 10 years for `emandate`. The value can range from the current date to 31-12-2099 (`4101580799`).

  `bank_account`
  : Customer bank account details.

    `account_number` _optional_
    : `string` Customer's bank account number.

    `ifsc_code` _optional_
    : `string` Customer's bank IFSC. For example `UTIB0000001`.

    `beneficiary_name` _optional_
    : `string` Customer's name. For example, `Gaurav Kumar`.

    `account_type` _optional_
    : `string` Customer's bank account type. Possible values:
      - `savings` (default)
      - `current`

  `notes`_optional_
  : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

#### 1.1.3. Create an Authorisation Payment

@include recurring-payments/auth-payment-api

##### Additional Checkout Fields

@include recurring-payments/auth-payment-api-additional-fields
`recurring` _mandatory_
: `integer` In this case, the value has to be `1`.

### 1.2. Using a Registration Link

@include recurring-payments/link-api-intro

#### 1.2.1. Create a Registration Link

Use the below endpoint to create a registration link.

/subscription_registration/auth_links

```cURL: Emandate via Netbanking
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/subscription_registration/auth_links
-H "Content-Type: application/json" \
-d '{
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780"
  },
  "type": "link",
  "amount": 100,
  "currency": "INR",
  "description": "12 p.m. Meals",
  "subscription_registration": {
    "method": "emandate",
    "auth_type": "netbanking",
    "expire_at": 1580480689,
    "max_amount": 9999900,
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "11214311215411",
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  },
  "receipt": "Receipt no. 1",
  "expire_by": 1880480689,
  "sms_notify": true,
  "email_notify": true,
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'
```json: Response
{
  "id": "inv_FHrY6tDtVP2dHg",
  "entity": "invoice",
  "receipt": "Receipt no. 25",
  "invoice_number": "Receipt no. 25",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "9123456780"
  },
  "order_id": "order_FHrY6tiC2y7NNN",
  "line_items": [],
  "payment_id": null,
  "status": "issued",
  "expire_by": 1880480689,
  "issued_at": 1595491063,
  "paid_at": null,
  "cancelled_at": null,
  "expired_at": null,
  "sms_status": "pending",
  "email_status": "pending",
  "date": 1595491063,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 0,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "currency_symbol": "₹",
  "description": "test registration link",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/DxEcNtR",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491063,
  "idempotency_key": null
}
```

##### Request Parameters

@include recurring-payments/link-req-man
`subscription_registration`
: Details of the authorisation payment.

  `method` _mandatory_
  : `string` The authorisation method. In this case, it will be `emandate`.

  `auth_type` _optional_
  : `string` Here, it has to be `netbanking`.

  `max_amount` _optional_
  : `integer` The maximum amount, in paise, that a customer can be charged in one transaction. Know about [maximum and default values](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/faqs/#2-what-is-the-maximum-amount-which-can.md).

  `expire_at` _optional_
  : `integer` The timestamp, in Unix, till when you can use the token (authorization on the payment method) to charge the customer subsequent payments. Default is 10 years for `emandate`. The value can range from the current date to 31-12-2099 (`4101580799`).

  `bank_account`
  : The customer's bank account details.

    `beneficiary_name` _optional_
    : `string` The account holder's name. For example `Gaurav Kumar`.

    `account_number` _optional_
    : `integer` Customer's bank account number. For example `11214311215411`.

    `account_type` _optional_
    : `string` Customer's bank account type. Possible values:
        - `savings` (default)
        - `current`

    `ifsc_code` _optional_
    : `string` Customer's bank IFSC. For example `HDFC0000001`.

@include recurring-payments/link-req-opt

#### 1.2.2. Send/Resend Notifications

@include recurring-payments/send-notification-api

##### Path Parameters

@include recurring-payments/send-notification-path-api

#### 1.2.4. Cancel a Registration Link

@include recurring-payments/cancel-auth-link-api

##### Path Parameter

@include recurring-payments/cancel-path

## 2. Fetch and Manage Tokens

@include recurring-payments/fetch-token-api

### 2.1. Fetch Token by Payment ID

@include recurring-payments/emandate/token-by-payment

#### Path Parameter

@include recurring-payments/fetch-token-pay-path-api

### 2.2. Fetch Tokens by Customer ID

@include recurring-payments/emandate/token-by-customer

#### Path Parameter

@include recurring-payments/fetch-token-cust-path-api

### 2.3. Delete Tokens

@include recurring-payments/fetch-token-delete-api

#### Path Parameter

@include recurring-payments/delete-token-path

## 3. Create Subsequent Payments

Following are the two steps to create and charge your customer a subsequent payment:

@include recurring-payments/subsequent-payments/pay-intro

### 3.1. Create an Order to Charge the Customer

@include recurring-payments/subsequent-payments/order

#### Request Parameters

@include recurring-payments/subsequent-payments/order-req

### 3.2. Create a Recurring Payment

@include recurring-payments/subsequent-payments/rec-pay

#### Request Parameters

@include recurring-payments/subsequent-payments/rec-pay-req

### Related Information
- [Integrate Recurring Payments Using Emandate](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/integrate.md)
- [Supported Banks and Apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/supported-banks.md)
- [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/apis.md)
- [Handle Errors](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/emandate/errors.md)
