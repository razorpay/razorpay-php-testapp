---
title: Settlements Webhook Events
description: List of Settlements webhook events along with sample payloads.
---

# Settlements Webhook Events

Track settlements by subscribing to settlement webhook events, which notify when funds are processed and settled to your account.

### Settlement Processed

> **INFO**
>
> 
> **Handy Tips**
> 
> - The `settlement.processed` event is triggered **after** Razorpay has successfully transferred funds to your bank account.
> - The settlement payload includes key financial details such as the settlement amount, fees deducted, applicable tax, UTR (Unique Transaction Reference) and the settlement period.
> - Use UTR to reconcile settlement funds received from Razorpay against your bank statement.
> - Settlement amounts are always provided in the smallest currency unit (for example, paise for INR, cents for USD).
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> The `processed` status confirms the initiation of fund transfer, but does not mean that funds have been credited to your account. The amount will reflect in your bank account after the standard NEFT/RTGS/IMPS timeline, which can take up to **3 hours**.
> 

Given below is the sample payload for Settlement webhook events.

@include route/settlement-processed-payload
