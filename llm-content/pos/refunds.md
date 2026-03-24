---
title: Pay Refunds to Customers with Razorpay POS
heading: About Refunds
description: Initiate refunds using Razorpay POS Dashboard and APIs for your customers.
---

# About Refunds

There could be situations when customers request a refund of the payments made for the products or services purchased or availed on your website or app.

> **INFO**
>
> 
> 
> **Customer Looking for Refund**
> 
> If you are a customer looking for a refund, know about [customer refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/customers/customer-refunds.md).
> 

## Refund Types

You can use [Normal Refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/normal.md) to refund payments to your customers. The amount is refunded within 5-7 working days.

## Dashboard Actions

You can perform the following actions on refunds from the Dashboard:

- [View Refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/refunds/view.md)
- [Issue Refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/refunds/issue.md)
- [View Settlement Details of a Refund](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/refunds/view/#view-settlement-details-of-a-refund.md)

## Refund States

Following are the various states of a refund:

States | Description
---
`created` | This state indicates that the refund is initiated from Razorpay. This state will be displayed only on the Refunds API.
---
`processed` | This is the final state of the refund.
---
`failed` | A refund can attain the failed state in the following scenarios:- Normal refunds are not possible for a payment that is more than 6 months old.
- Instant refunds can sometimes fail because of the customer's account or bank-related issues.

> **WARN**
>
> 
> **Watch Out!**
> 
> Usually, Razorpay moves a refund to the `processed` state before receiving the ARN/RRN number from the Gateway. You can ensure that a refund moves to the `processed` state only after receiving confirmation from the Gateway by activating this feature on your account by raising a [support request](https://razorpay.com/support/#request).
> 

## Handle Refund Chargeback

For the prevention of chargebacks, Razorpay only does **source refunds**. It means that money is refunded to the payment method that the customer used to make the payment. For example, if a credit card was used to make the payment, the refund is pushed to the same credit card. Similarly, in the case of UPI payments, the refund is pushed to the VPA used while making the payment.

If a chargeback is received for an instantly refunded payment, the processed refund will have a **UTR (Unique Transfer Reference)** in the callback. This UTR appears against the **ARN (Application Reference Number)** parameter in the Refund entity. The UTR serves as proof of refund completed between you and Razorpay.

Additionally, Razorpay passes the **RRN (Razorpay Reference Number)** of the payment in the Fund Transfer Request sent for the refund. This ties the instant refund back to the parent payment, thereby, serving as proof of the refund. This data can also be used as a defense against a future chargeback or arbitration case.

## Reports

Detailed insights can be gained using reports and real-time data on the Dashboard. These reports can then be used for accounting and recon purposes. Know more about [reports](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/reports.md).

Understand [how the Refund process works](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/normal/#how-normal-refunds-work.md).

### Related Information

- [Handle refund errors](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/refunds/errors.md)
- [Refunds API](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/refunds/apis.md)
- [Refunds FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/pos/refunds/faqs.md)
