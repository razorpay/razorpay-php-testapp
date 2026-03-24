---
title: Refund Payments and Reverse Transfer from a Linked Account
description: Refund Payments and reverse Transfer from a Linked Account using the Razorpay API.
---

# Refund Payments and Reverse Transfer from a Linked Account

## Refund Payments and Reverse Transfer from a Linked Account

Use this endpoint to create refunds on a particular `payment_id`. 

- The amount is deducted from your main account balance when refunding a payment. You can set the `reverse_all` parameter to `true` in the refund POST request to recover the amount from the Linked Account. This will recover the amount for every transfer made on the payment before processing the refund to the customer.

- You can automate reversals with the `reverse_all` parameter in the following refund scenarios:
    - Full refund
    - Partial refund for a payment transferred to a single account.

> **WARN**
>
> 
> **Watch Out!**
> 
> For partial refunds on a payment transferred to multiple accounts, the `reverse_all` parameter cannot be applied since Razorpay cannot determine which transfer to reverse partially. You will have to use the transfer reversal API to reverse this payment.
> 

A new `reversal` entity is created internally and linked for every `reversal` defined by the `transfer_id`.

### Request

@include route/api/refund-code

### Response

@include route/api/refund-res-code

### Parameters

@include route/api/refund-path

### Parameters

@include route/api/refund

### Parameters

@include route/api/refund-res

### Errors

The api key/secret provided is invalid
* code: 4xx
* description: This error occurs when there is a mismatch between the API credentials passed in the API call and the API credentials generated on the Dashboard.
* solution: Make sure the API Keys are active and entered correctly. Also, there should not be any whitespaces before or after the keys.
 
The sum of amount requested for refund is greater than the available  amount
* code: 400
* description: This error occurs when the total transferred amount exceeds the payment amount.
* solution: Make sure to check the amount passed with the payment made.

The amount must be at least INR 1.00
* code: 400
* description: This error occurs when the amount is less than the minimum amount. The transaction amount expressed in the currency subunit, such as paise (in INR) should always be greater than or equal to ₹1.
* solution: Make sure the amount is equal to or greater than the minimum amount of ₹1.

payment_id is not a valid id
* code: 400
* description: This error occurs when you pass an invalid `payment_id` in the API endpoint.
* solution: Make sure to pass a vaild `payment_id`.
