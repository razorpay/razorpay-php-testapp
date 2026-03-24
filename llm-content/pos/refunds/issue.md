---
title: Issue Refunds
description: Issue refunds to customers using Razorpay Dashboard and APIs.
---

# Issue Refunds

You can issue refunds to your customers using the Dashboard or APIs. Refunds are possible for `captured` payments only.

> **INFO**
>
> 
> 
> **Customer Looking for Refund**
> 
> If you are a customer looking for a refund, know about [customer refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/customers/customer-refunds.md).
> 

## Full and Partial Refunds

Refunds can be made either in **full** or in **part**.

- **Full Refund**

You can refund the entire amount that you received in the payment.

- **Partial Refund**

You can refund part of the amount received in the payment. You can issue multiple, partial refunds as long as their sum does not exceed the captured amount.

A payment moves to the `refunded` state only when the entire amount is refunded to the customer. In case of partial refunds, the payment continues to remain in the `captured` state till the entire payment is refunded.

## Issue Refunds

### Issue Refunds Using Dashboard

To issue refunds:

1. Log in to the Dashboard.
2. Navigate to **Transactions** → **Payments**.
3. Select the payment for which a refund is requested. The payment should be in the `captured` state.
4. Scroll to the **Refund** section and click **Issue Refund**. 
5. In the **amount** field, enter an amount lesser than the captured amount for issuing a partial refund. By default, the entire amount will be refunded.
5. Review the fees that will be levied for the refund to be processed instantly. 
6. Click the **Issue Full Refund** or **Issue Partial Refund** button, depending on the amount to be refunded.

### Issue Refunds Using API

- To create a normal refund, use the [Create a Normal Refund API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/refunds/create-normal.md).

### Related Information

- [About Refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/refunds.md)
- [Normal Refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/refunds/normal.md)
- [Refunds FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/refunds/faqs.md)
