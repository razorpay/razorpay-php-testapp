---
title: Fetch Customer Identifiers
description: Learn how to fetch Customer Identifiers and payments made to specific Customer Identifiers using the Smart Collect APIs.
---

# Fetch Customer Identifiers

You can retrieve details of Customer Identifiers and payments made to Customer Identifiers using these APIs.

APIs are available to:
- [Fetch Customer Identifier by ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/fetch.md#fetch-virtual-account-by-id)
- [Fetch All Customer Identifiers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/fetch.md#fetch-all-virtual-accounts)
- [Fetch Payments made to a Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/fetch.md#fetch-payments-made-to-a-virtual-account)
- [Fetch Payment Details using ID and Transfer Method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/fetch.md#fetch-payment-details-using-id-and-transfer-method)

## Fetch Customer Identifier by ID

/virtual_accounts/:id

Retrieves a specific Customer Identifier using its ID.

@include smart-collect-qr/api/fetch/fetch-id

## Fetch All Customer Identifiers

/virtual_accounts

Retrieves all the Customer Identifiers that are created by you.

@include smart-collect-qr/api/fetch/all

## Fetch Payments made to a Customer Identifier

/virtual_accounts/:id/payments

Retrieves all the payments made to a specific Customer Identifier for a given ID.

@include smart-collect-qr/api/fetch/payments

## Fetch Payment Details using ID and Transfer Method

Retrieve the payment details for a given payment ID and transfer method.

### Bank Transfer

/payments/:id/bank_transfer

Retrieves the bank transfer details of a given payment ID.

@include smart-collect-qr/api/fetch/transfer-method-bank

### UPI

/payments/:id/upi_transfer

Retrieves the UPI transfer details of a given payment ID.

@include smart-collect-qr/api/fetch/transfer-method-upi
