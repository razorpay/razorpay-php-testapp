---
title: Add an Allowed Payer Account
description: Add an Allowed Payer Account using the Razorpay **Smart Collect TPV** APIs.
---

# Add an Allowed Payer Account

## Add an Allowed Payer With TPV

Use this endpoint to add an allowed payer's account.

### Request

@include smart-collect/api-tpv/add

### Response

@include smart-collect/api-tpv/add-res-code

### Parameters

`va_id` _mandatory_
: `string` The unique identifier of the Customer Identifier to which you want to add `allowed_payers` account details.

### Parameters

@include smart-collect/api-tpv/add-req

### Parameters

@include smart-collect/api-tpv/entity

### Errors

Account validation is only applicable on bank account as a receiver type
* code: 400
* description: This error occurs when you try to add an allowed payer account on a Customer Identifier with VPA added as a receiver (with or without a Bank account).
* solution: You cannot add an allowed payer account on a Customer Identifier with VPA added as a receiver (with or without a Bank account).

Only 10 allowed payer accounts can be added.
* code: 400
* description: This error occurs when you try to add new allowed payer accounts when the overall `allowed_payers` limit is exceeded. You can only add up to 10 allowed payer accounts.
* solution: Do not add more than 10 allowed payers.

The bank account.account number field is required when bank account is present.
* code: 400
* description: This error occurs when you do not pass the bank account number in the request.
* solution: Make sure to pass the bank account number in the request.

The bank account.ifsc field is required when bank account is present
* code: 400
* description: This error occurs when you do not pass the IFSC in the request.
* solution: Make sure to pass the IFSC in the request.

The ifsc must be 11 characters.
* code: 400
* description: This error occurs when you pass an incorrect IFSC in the request. An IFSC must be 11 characters.
* solution: Make sure to pass a valid IFSC in the request.

Payer detail already exist for virtual account.
* code: 400
* description: This error occurs when you try to add a duplicate allowed payer's account with the same IFSC and account number that already exists.
* solution: Make sure to add a valid allowed payer's account.

Bharat QR not supported for Customer Identifier.
* code: 400
* description: Passing the receivers as `qr`.
* solution: We have deprecated the `qr` receiver type from our APIs. From now on, only `vpa` and `bank_account` will be supported. (Jun 2022).
 
Bharat QR not enabled.
* code: 400
* description: If you are a new merchant trying to create a Bharat QR code.
* solution: We have deprecated the `bharat_qr` type for QR v2 product.
