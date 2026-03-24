---
title: 3. Create Subsequent Payments
description: Create and charge subsequent payments using Razorpay APIs after the customer's selected payment method is successfully authorized.
---

# 3. Create Subsequent Payments

@include recurring-payments/subsequent-payments/pay-intro

## 3.1. Create an Order to Charge the Customer

@include recurring-payments/subsequent-payments/order

### Request Parameters

@include recurring-payments/subsequent-payments/order-req

### Response Parameters

@include recurring-payments/subsequent-payments/order-res

## 3.2. Create a Recurring Payment

Once you have generated an `order_id`, use it with the `token_id` to create a payment and charge the customer. The following endpoint creates a payment to charge the customer.

> **INFO**
>
> 
> **Handy Tips**
> 
> If the first attempt fails, you can retry after getting the confirmation or rejection of the last payment, as it may take more than 24 hours.
> 
> For example:
> - If the charge fails on 1 November 2023 and you receive the confirmation, you can retry the attempt on 4 November 2023. 
> - If the charge fails on 1 November 2023 and you receive the confirmation on 2 November 2023, you can retry the attempt on 5 November 2023.
> 

/payments/create/recurring

### Request Parameters

@include recurring-payments/subsequent-payments/rec-pay-req

### Response Parameters

`razorpay_payment_id`
: `string` The unique identifier of the payment that is created. For example, `pay_1Aa00000000001`.

> **WARN**
>
> 
> **Watch Out!**
> 
> You will receive `razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature` as a response when you create a Recurring Payment in [Test mode](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication.md).
>
