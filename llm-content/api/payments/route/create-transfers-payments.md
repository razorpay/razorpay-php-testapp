---
title: Create Transfers From Payments
description: Initiate Transfers from captured payments using the Razorpay API.
---

# Create Transfers From Payments

## Create Transfers From Payments

Use this endpoint to create Transfers from captured payments. You can create and capture payments in the regular payments flow using the [Razorpay Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard.md) and [Payment APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#capture-a-payment.md).

You should perform additional steps to disburse payments using Razorpay Route.

1. The customer pays the amount using the standard payment flow.
2. Once the payment is `captured`, you can initiate a transfer to Linked Accounts with a transfer API call. You have to pass the details such as `account_id` and `amount`.

### Request

@include route/api/transfer-via-payments-code

### Response

@include route/api/transfer-via-payments-res-code

### Parameters

@include route/api/transfer-via-payments-path

### Parameters

@include route/api/transfer-via-payments-request

### Parameters

@include route/api/entity-parameters

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
The transfers.0.amount must be at least 100.
* code: 400
* description: This error occurs when the amount is less than the minimum amount. The transaction amount expressed in the currency subunit, such as paise (in INR) should always be greater than or equal to 100.
* solution: Make sure the amount is equal to or greater than the minimum amount of ₹100.

The input field is required
* code: 400
* description: This error occurs when a mandatory field is empty.
* solution: Make sure to fill in all the mandatory fields.

payment_id is not a valid id
* code: 400
* description: This error occurs when you pass an invalid `payment_id` in the API endpoint.
* solution: Make sure to pass a vaild `payment_id`.

The id provided does not exist
* code: 400
* description: This error occurs when there is a miss-match between the API keys via which the transaction was initiated for that particular `payment_id` and the API keys passed in the API call.
* solution: Ensure the API keys via which you have accepted the payment for the `payment_id` passed in the API endpoint matches the API keys passed in the API call.

input is an invalid account_code.
* code: 400
* description: This error occurs when the `account_code` passed is invalid or does not belong to the requested merchant.
* solution: Make sure to pass the valid `account_code`.

Transfer cannot be made due to insufficient balance
* code: 400
* description: This error occurs when the total balance is less than or equal to the transfer amount.
* solution: Make sure you have enough balance. You can also [add funds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/account-settings/balances#add-funds-to-your-reserve-balance.md) to the account and then try doing the transfer.

The sum of amount requested for transfer is greater than the captured amount
* code: 400
* description: This error occurs when the total transferred amount exceeds the captured payment amount.
* solution: Make sure the transfer amount is less than the captured payment.
