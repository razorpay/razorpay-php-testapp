---
title: Rainy Day | Payment Method Error Parameters
heading: Payment Method Error Parameters
description: Check the different errors in the payment flow as per each payment method supported by Razorpay.
---

# Payment Method Error Parameters

There are certain error codes specific for each payment method supported by Razorpay. To understand the errors and their `reasons`, it is recommended to know the `source` (stakeholders) and the `steps` involved in the payment flows:

-   [Cards](#cards)
-   [UPI](#upi)
-   [Netbanking](#netbanking)
-   [Wallet](#wallet)
-   [Cardless EMI](#cardless-emi)

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

### Related Information

To understand the error codes, refer to the [Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) section.

For the list of reasons, refer to the [Error Reasons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) section.
