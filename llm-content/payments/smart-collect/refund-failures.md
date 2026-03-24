---
title: Refund Failures
description: Check different refund failure scenarios of a Customer Identifier.
---

# Refund Failures

There are some situations where it is **not** possible to refund a payment received on a Customer Identifier. These are listed below:

- UPI payments initiated from UPI PSP apps such as Google Pay, PhonePe. Such payments do not show remitter bank account details and it is not possible to process a refund.

- IMPS Payments made from a small number of banks that do not share the payer's account number and such payments cannot be automatically refunded.

- Payments made from Non-Resident External (NRE) bank accounts. In such cases, Razorpay is not permitted to deposit money into the account and it is not possible to process a refund.

In each of these cases, if a refund is still necessary, you can obtain alternate bank account details from your customer and raise a request on the [Support Portal](https://razorpay.com/support/#request) to initiate a refund.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can create refunds for the payments received on a Customer Identifier. Refunds are generally processed within 3-5 business days via the same mode used by your customer. The platform fee and GST charged on successful transactions will not be reversed in the case of refunds.
> 
> You can initiate refunds from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/refund.md) or using [APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/refunds.md).
> 
> 

### Related Information
- [Razorpay Smart Collect](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect.md)
- [How Smart Collect Works](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/how-it-works.md)
- [Customer Identifier States](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/states.md)
- [Auto Third Party Validation (TPV) on Smart Collect](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/third-party-validation.md)
- [Search for a Customer Identifier](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/search.md)
- [Make Test Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/test-payments.md)
- [Smart Collect APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/smart-collect.md)
- [Subscribe to Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/smart-collect/subscribe-to-webhooks.md)
