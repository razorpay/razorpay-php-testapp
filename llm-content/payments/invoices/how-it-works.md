---
title: How Invoices Work
description: Create Invoices, send them to customers to receive payments and perform other actions.
---

# How Invoices Work

Given below is a complete end-to-end flow about how you can use Razorpay Invoices.

![Invoices Flow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/invoices-invoices-flow-chart.jpg.md)

### Step 1: Create an Invoice

[Create an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/create.md) by providing all the required details. You can set an expiry date and enable partial payments.

Save the invoice. The invoice is in `draft` status. Know more about [invoice states](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/states.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can [update](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/update.md), [delete](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/delete.md), or [create a duplicate ](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/duplicate.md) of an invoice in `draft` status. 

> - **Invoice APIs**:
>     - [Create an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/invoices/#create-an-invoice.md)
>     - [Update an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/invoices/#update-an-invoice.md)
>     - [Delete an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/invoices/#delete-an-invoice.md)
> 

### Step 2: Issue an Invoice

[Issue an invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/issue.md) to a customer via email and/or sms.
The customer receives a notification by email or sms with a payment link using which the customer can pay using one of the available [payment methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/#list-of-supported-payment-methods.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> Use the [Issue an Invoice API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/invoices/#issue-an-invoice.md).
> 

### Step 3: Receive Payments

Customer clicks the payment link and tries to make the payment.
- If [partial payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-links/partial-payments.md) payments was enabled, the customer chooses the amount to be paid.
- The customer chooses the mode of payment: Pay Online or Pay via Bank Transfer

Customer makes a successful payment. The invoice is marked as `paid` or `partially paid`. You receive a notification about the payment.

> **INFO**
>
> 
> **Handy Tips**
> 
> After the payment is captured, the amount is settled to your account as per the settlement schedule. Know more about [payments](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments.md), [settlements](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/settlements.md), [ refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds.md) and [disputes](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/disputes.md).
> 

### Step 4: Track Invoices and Reports

- Notifications

You receive notifications regarding activity on invoices via SMS, emails and webhook. Know more about [subscribing to Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/subscribe-to-webhooks.md).
- Track Payments

Track payments made against the issued invoices on Dashboard. Click **Invoices** from the left menu. All the invoices are listed with their status under **Invoices**.
- Reports

Detailed insights can be gained using reports and real-time data on the Dashboard. These reports can then be used for accounting and reconciliation purposes. Know more about [reports](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/reports.md).

### Related Information
- [Invoices](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices.md)
- [Invoices States](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/states.md)
- [Create an Invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/create.md)
- [Issue an Invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/issue.md)
- [Search an Invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/search.md)
- [Update an Invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/update.md)
- [Duplicate an Invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/duplicate.md)
- [Delete an Invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/delete.md)
- [Cancel an Invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/cancel.md)
- [Download and Print an Invoice](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/download-print.md)
- [Subscribe to Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/subscribe-to-webhooks.md)
- [Invoice APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/invoices/apis.md)
