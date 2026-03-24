---
title: Payments | Subscriptions
heading: Supported Payment Methods
description: Learn about the payment methods supported by Razorpay Subscriptions, including Cards, UPI Autopay and Emandate.
---

# Supported Payment Methods

Razorpay Subscriptions supports Cards, UPI Autopay and Emandate. The table below provides a summary of each payment method, the supported networks or banks, and the maximum subscription amount allowed.

## Payment Methods Overview
 

Payment Method | Supported Networks / Banks | Maximum Subscription Amount
----
Cards | Visa, Mastercard and RuPay | [Refer to monetary limits](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/faqs/#7-is-there-a-maximum-monetary-limit-for.md)
---
UPI Autopay | [Popular UPI apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/supported-banks-apps/#upi-autopay.md) and [NPCI-supported banks](https://www.npci.org.in/product/autopay/all-members) | Up to ₹1,00,000 (mandate creation)
Frictionless debits: ₹15,000 (all) / ₹1,00,000 (BFSI only)
---
Emandate (eNACH) | [NPCI-supported banks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/supported-banks-apps/#emandate.md) | ₹1,00,00,000

## Cards

Customers can authorise subscriptions using their card. They enter their card details to authorise the subscription, similar to a regular one-time online payment. The payment is then debited automatically based on the selected plan.

Standing Instructions (SI) on cards are supported on **Visa**, **Mastercard** and **RuPay** cards of all major banks. For the list of supported banks, see [Supported Banks — Cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/supported-banks-apps/#cards.md).

For maximum monetary limits for card mandates, see [Card mandate limits](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/faqs/#7-is-there-a-maximum-monetary-limit-for.md).

> **INFO**
>
> 
> **Handy Tips** 

> 
> For card-based subscriptions, customer card details must be tokenised as per applicable laws. Customer consent is explicitly taken for tokenising the card to process e-mandate/subscription transactions.
> 

## UPI Autopay

With UPI Autopay, customers can pay for subscriptions using any UPI application. They must enter their UPI VPA and authorise the subscription first. Razorpay supports popular UPI apps including PhonePe, Google Pay, Paytm, BHIM and more.

For the complete list of supported UPI applications, handles and banks, see [Supported Banks and Apps — UPI Autopay](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/supported-banks-apps/#upi-autopay.md).

## Emandate (eNACH)

Emandate is a digital payment service that enables customers to set up recurring payments using their bank account. With Emandate, the customer provides standing instructions to their issuing bank, allowing them to debit the specified amount from their bank account automatically at fixed intervals.

Customers can authorise an Emandate subscription using one of the following methods:

- **Netbanking**: The customer logs in to their bank's netbanking portal to authorise the mandate.
- **Debit Card**: The customer enters their debit card details to authorise.
- **Aadhaar**: The customer uses Aadhaar-based authentication to authorise.

### Related Information

- [About Subscriptions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions.md)
- [Subscription Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/workflow.md)
- [Supported Banks and Apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/supported-banks-apps.md)
- [Create Subscriptions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/create.md)
- [Test Subscriptions](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/test.md)
- [Payment Retries](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/payment-retries.md)
