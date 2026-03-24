---
title: Outward Remittances - Education and Travel
description: Customers can make international payments for their foreign university admission, tuition, hostel fees and travel payments with our Outward Remittance solution.
---

# Outward Remittances - Education and Travel

You can enable your customers to make payments to foreign universities towards fees payments such as admission, application, hostel, tuition, and travel (flight and hotel bookings) with our Outward Remittance solution.

## Order and Payments States

### Order States
Given below are the order states that an Outward Remittances transaction assumes:

State | Description
---
Created | When a new order is created, it is in the created state. It stays in this state until payment is attempted.
---
Attempted | An order moves from created to attempted state when payment is first attempted on it. It remains in the attempted state until a payment associated with that order is captured.
---
Paid | After successfully capturing the payment, the order moves to the paid state. No further payment requests are allowed once the order moves to the paid state. The order continues to be in the paid state even if the payment associated with the order is refunded.

## Payment States
Given below are the payment states that an Outward Remittances transaction assumes:

State | Description
---
Created | When the customer initiates the payment, the payment_id is generated.
---
Authorized | The payment moves from created to authorized once Razorpay receives success response from the gateway and the LRS check is pending.
---
Captured | The payment moves to the Captured state when we receive confirmation on LRS check success from our AD banking partner.
---
Refunded | The payment acquires this state when the refund request is initiated, or the LRS check has failed.
---
Failed | The payment acquires this state when it fails.

Given below is a diagram representing the relationship between order and payment states.

![Order and Payment States](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/lrs-order-payment-states.jpg.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> Manual capture of payments is not allowed, as the payment cannot be captured until our banking partner completes an LRS check, which typically takes a minimum of 30 minutes. Payment will only be captured following the successful completion of the LRS check.
> 

## Refunds and Settlements

### Refunds

- You should maintain a separate refund balance in order for Razorpay to process any refund or chargeback. 
- In case the refund or chargeback balance is insufficient, Razorpay fails the request. You should recharge the account for the refund to get processed.

### Settlements

The payment settlement will take T+2 working days (where T is the day of the transaction after which the payment is Captured.)

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> Instant Settlements are not applicable for Outward Remittance transactions.
> 

## Integration Steps

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

After this feature is enabled for your Razorpay account, you can accept payments using:

### Razorpay Standard Checkout

Integrate with [Razorpay Standard Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation#integration-flow.md). No additional integration is required for Outward Remittances.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> - Third-Party Validation (TPV) is mandatory for all LRS transactions.
> - Under this flow, capture of payments or auto-capture is not allowed. It is disabled by default.
> 
>
