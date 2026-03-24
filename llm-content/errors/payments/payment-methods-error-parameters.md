---
title: Payment Method Error Parameters
description: List of values for Source and Step parameters for each payment method supported by Razorpay.
---

# Payment Method Error Parameters

There are certain error codes specific for each payment method supported by Razorpay. To understand the errors and their `reasons`, it is recommended to know the `source` (stakeholders) and the `steps` involved in the payment flows:

-   [Cards](#cards)
-   [UPI](#upi)
-   [Netbanking](#netbanking)
-   [Wallet](#wallet)
-   [Cardless EMI](#cardless-emi)
-   [Emandate](#emandate)

## Cards

@include error-reasons/card-flow

## UPI

@include error-reasons/upi-flow

@include payment-methods/upi-collect-deprecated/standard

## Netbanking

@include error-reasons/netbanking-flow

## Wallet

@include error-reasons/wallet-flow

## Cardless EMI

@include error-reasons/cardless-emi-flow

## Emandate

@include error-reasons/emandate-flow
