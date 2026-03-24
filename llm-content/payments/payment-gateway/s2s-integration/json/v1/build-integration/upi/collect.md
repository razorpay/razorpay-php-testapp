---
title: 1. Build Integration for UPI Collect
description: Steps to integrate S2S JSON V1 and accept payments using UPI Collect
---

# 1. Build Integration for UPI Collect

In case of UPI as there is no redirect involved when the customer completes the payment, you should keep polling Razorpay APIs to get the latest status of the payment.

@include payment-methods/upi-collect-deprecated/s2s

## Collect Flow Integration

The integration consists of the following steps.

**1.1** [Create an Order](#11-create-an-order).

**1.2** [Create a Payment](#12-create-a-payment).

**1.3** [Handle Payment Success and Failure](#13-handle-payment-success-and-failure).

**1.4** [Verify Payment Signature](#14-verify-payment-signature).

**1.5** [Verify Payment Status](#15-verify-payment-status).

> **WARN**
>
> 
> **Watch Out!**
> 
> Do not hardcode the URL returned in the API responses.
> 

### 1.1 Create an Order

Order is an important step in the payment process.

- An order should be created for every payment.
- You can create an order using the Orders API. It is a server-side API call.
- The order_id received in the response should be passed to the checkout. 

#### Sample Code

@include integration-steps/order-creation

### 1.2 Create a Payment

Create a payment using the API given below after your order is created.

@include s2s-integration/json/upi/create-payment

### 1.3 Handle Payment Success and Failure

Once the payment is completed by the customer, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure** of the payment made by the customer.

#### Success Callback

If the payment made by the customer is successful, the following fields are sent:

- `razorpay_payment_id`
- `razorpay_order_id`
- `razorpay_signature`

```json: Callback Example
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```
#### Failure Callback

If the payment has failed, the callback will contain details of the error. Refer to [errors](@/Applications/MAMP/htdocs/new-docs/llm-content/api/#errors.md) for details.

### 1.4 Verify Payment Signature

@include integration-steps/verify-signature

### 1.5 Verify Payment Status

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/json/v1/test-integration.md)
