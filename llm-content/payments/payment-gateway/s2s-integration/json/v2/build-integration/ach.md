---
title: ACH Direct Debit
description: Steps to integrate S2S JSON API and accept payments using ACH Direct Debit.
---

# ACH Direct Debit

ACH (Automated Clearing House) is an electronic network that processes bank-to-bank payments in batches. ACH Direct Debit enables you to withdraw funds directly from a customer's US bank account using their account and routing numbers, with transactions settling within 3-5 business days.

## Integration Steps

Follow the steps below to integrate Razorpay S2S JSON API and accept payments using ACH.

**1.1** [Create an Order](#11-create-an-order)

**1.2** [Create a Payment](#12-create-a-payment)

**1.3** [Handle Payment Success and Error Events](#13-handle-payment-success-and-error-events)

**1.4** [Integrate Payments Rainy Day Kit](#14-integrate-payments-rainy-day-kit)

**1.5** [Fetch Payment Details and Verify Payment Status](#15-fetch-payment-details-and-verify-payment-status)

### 1.1 Create an Order

To process a payment, create a Razorpay Order to correspond with the order in your system. Send the order request parameters to the following endpoint:

@include integration-steps/order-creation

### 1.2 Create a Payment

Once an order is created, your next step is to create a payment. The following API will create a payment with `ach` as the payment method:

/payments/create/json

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "content-type: application/json" \
-d '{
  "amount": 50000,
  "currency": "",
  "order_id": "order_GAWN9beXgaqRyO",
  "email": "",
  "contact": "",
  "method": "ach",
  "bank_account": {
    "account_number": "000000001234",
    "name": "",
    "bank_code": "122105278",
    "bank_code_category": "routing_number",
    "account_type": "personal_savings"
  },
  "billing_address": {
    "line1": "Block",
    "line2": "Street",
    "city": "San Jose",
    "state": "California",
    "postal_code": "33154"
  }
}'
```
```json: Success Response
{
   "razorpay_payment_id": "pay_29QQoUBi66xm2f",
   "razorpay_order_id": "order_GAWN9beXgaqRyO",
   "razorpay_signature": "9ef4dffbfd84f1318f6ae648f114332d8401e0949a3d"
}
```json: Failure - Account Number
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "You entered an account number which is invalid or not found please try again",
    "source": "customer",
    "step": "validation",
    "reason": "invalid_account_number"
  }
}
```json: Failure - Bank Code
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "You entered a bank code which is invalid or not found please try again",
    "source": "customer",
    "step": "validation",
    "reason": "invalid_bank_code"
  }
}
```json: Failure - Account Type
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "You entered an account type which is invalid please try again",
    "source": "customer",
    "step": "validation",
    "reason": "invalid_account_type"
  }
}
```

    
### Request Parameters

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, `USD`.

`order_id` _mandatory_
: `string` Unique identifier of the Order.
 Know more about [Orders API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/orders.md).

`email` _mandatory_
: `string` Email address of the customer. Maximum length supported is 40 characters. 

`contact` _mandatory_
: `string`  Phone number of the customer. Maximum length supported is 15 characters, inclusive of country code. 

`method` _mandatory_
: `string` Name of the payment method. Here it is `ach`.

`bank_account` _mandatory_
: `object` Bank account details.

    `account_number` _mandatory_
    : `string` Customer's bank account number.
    
    `name` _mandatory_
    : `string` Account holder's name as per bank records.
    
    `bank_code` _mandatory_
    : `string` The ACH routing number of the bank account.
    
    `bank_code_category` _mandatory_
    : `string` The category of bank code. Must be `routing_number` for ACH payments.
    
    `account_type` _mandatory_
    : `string` Type of bank account. Possible values:
      - `personal_savings`: Individual savings account.
      - `personal_checking`: Individual current account.
      - `business_savings`: Business savings account.
      - `business_checking`: Business current account.

`billing_address` _optional_
: `json object` This will have details about the billing address of the customer/user.

  `line1` _optional_
  : `string` Address Line 1 of the address.

  `line2` _optional_
  : `string` Address Line 2 of the address.

  `city` _optional_
  : `string` City of the address. For example, `San Jose`.

  `state` _optional_
  : `string` Name of the state. For example, `California`.

  `postal_code` _optional_
  : `string` Postal code of the state. For example, `33514`.

The payment request for each of the supported payment methods will slightly vary. Know more about the [relevant payment request fields](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods.md).
        

    
### Response Parameters

If the payment request is valid, the response contains the following fields:

`razorpay_order_id`
: `string` Order ID returned by Razorpay Orders API.

`razorpay_payment_id`
: `string` Returned by Razorpay API *only* for successful payments.

`razorpay_signature`
: `string` A hexadecimal string used for verifying the payment.
        

    
### Error Response Parameters

Error | Cause | Solution
---
The API `` provided is invalid. | The API credentials passed in the API call differ from the ones generated on the Dashboard. Possible reasons: - Different keys for test mode and live modes.
- Expired API key.
 | The API keys must be active and entered correctly with no whitespace before or after the keys.
---
The amount must be at least USD 1.00. | The amount specified is less than the minimum amount. Currency subunits, such as cents (in the case of USD), should always be greater than or equal to 100. | Enter an amount equal to or greater than the minimum amount, that is 100 (representing $1.00).
---
You entered an account number which is invalid or not found please try again. | The bank account number provided is invalid, does not exist or does not match the format expected by the bank. | - Verify that the account number is entered correctly without any spaces or special characters.
- Confirm the account number with the customer or check their bank statement.
- Ensure the account is active and not closed.

---
You entered a bank code which is invalid or not found please try again. | The routing number (bank code) provided is invalid or does not exist in the ACH network. | - Verify that the routing number is exactly 9 digits.
- Ensure the routing number passes checksum validation using the formula: ((3 × d1 + 7 × d2 + 1 × d3) + (3 × d4 + 7 × d5 + 1 × d6) + (3 × d7 + 7 × d8 + 1 × d9)) % 10 == 0
- Confirm the routing number with the customer or check their cheque or bank statement.

---
You entered an account type which is invalid please try again. | The account type provided does not match the accepted values for ACH transactions. | - Ensure the account type is one of the following valid values: `personal_savings`, `personal_checking`, `business_savings` or `business_checking`.
- Verify that the account type matches the customer's actual bank account type.

        

#### ACH Payment States

ACH payments progress through the following states:

- **Created**: Payment request has been initiated.
- **Authorised**: Payment has been accepted by Razorpay and submitted to the ACH network.
- **Captured**: Funds have been confirmed and will be settled to your account.
- **Failed**: Payment was rejected due to invalid account details, insufficient funds or other errors.

> **INFO**
>
> 
> **Payment Processing Timeline**
> 
> Unlike card payments, ACH transactions are not processed in real-time. After successful payment creation:
> - The payment status moves to `authorised` within seconds.
> - However, actual bank authorisation takes 1-4 business days.
> - Settlement occurs on T+5 (5 business days after transaction).
> - Most returns occur within the first 5 days if there are account issues.
> 
> ![ACH Settlement flow diagram](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/ach-settlement-flow.jpg.md)
> 

### 1.4 Handle Payment Success and Error Events

Once the payment is completed by the customer, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure**.

#### Success Callback

If the payment made by the customer is successful, the following fields are sent:

- `razorpay_payment_id`
- `razorpay_order_id`
- `razorpay_signature`

```json: Callback Example
{
  "razorpay_payment_id": "pay_LUtJxInEqa0oAA&",
  "razorpay_order_id": "order_LUtJ52zWwapfqs&",
  "razorpay_signature": "e617a6c035cb39feb6cd16358d83a4e3d30b11d9e8e2181e6ef442da1d41df20"
}
```

#### Failure Callback

If the payment has failed, the callback will contain details of the error. Refer to [Errors](@/Applications/MAMP/htdocs/new-docs/llm-content/api/#errors.md) for details.

### 1.5 Integrate Payments Rainy Day Kit

@include rainy-day/section

### 1.6 Fetch Payment Details and Verify Payment Status 

After receiving the `razorpay_payment_id` through the `callback_url`, use this endpoint to fetch the payment details:

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/pay_LUuOjDOkeb63gS \

```json: Response
{
  "id": "pay_Ja8Pcd1Q2w3X4Y",
  "entity": "payment",
  "amount": 50000,
  "currency": "",
  "status": "captured",
  "order_id": "order_Ja8Pbcd2Ef3GhI",
  "invoice_id": null,
  "international": false,
  "method": "ach",
  "amount_refunded": 0,
  "refund_status": null,
  "captured": true,
  "description": "Test ACH payment",
  "card_id": null,
  "bank": "JP Morgan and Chase",
  "wallet": null,
  "vpa": null,
  "email": "",
  "contact": "",
  "notes": {
    "merchant_order_id": "M-12345",
    "source": "pg-router"
  },
  "fee": 2950,
  "tax": 450,
  "error_code": null,
  "error_description": null,
  "error_source": null,
  "error_step": null,
  "error_reason": null,
  "acquirer_data": {
    "bank_transaction_id": "123456789012"
  },
  "bank_account": {
    "name": "",
    "last_4": "xxxxxxx1234",
    "bank_code": "122105278",
    "bank_code_category": "routing_number",
    "bank_name": "JP Morgan and Chase",
    "account_type": "business_checking"
  },
  "created_at": 1712123456
}
```

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)
