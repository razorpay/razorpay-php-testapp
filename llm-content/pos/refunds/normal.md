---
title: Normal Refunds for POS
heading: Normal Refunds
description: Check how to issue Normal Refunds to your customers, the refund process, processing time and refund fees.
---

# Normal Refunds

You can issue Normal refunds to your customers which is processed within 5-7 working days.

> **INFO**
>
> 
> 
> **Customer Looking for Refund**
> 
> If you are a customer looking for a refund, know more about [customer refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/customers/customer-refunds.md).
> 

## How Normal Refunds Work

When you make a Normal refund request to Razorpay, the information is sent to banking partners or other related stakeholders. Each of them has their process for refund requests. After processing the refund request, the refund amount is sent to the customer's bank account or card balance.

Following is a typical flow for card refunds:

### Payment Methods

We support all payment methods for Normal refunds.

Refunds are sent back to the original payment method used in making the payment. For example, if a credit card was used to make the payment, the refund amount is pushed to the same credit card.

### Processing Time

When you send a Normal refund request to Razorpay, the information is sent to our banking partners. Depending on the bank's processing time, it can take 5-7 business days for the refunds to reflect in the customer's bank account or card balance.

The time taken to process a normal refund depends on the payment mode used while making the payment.

**Payment Method** | **Refund Time**
---
`credit` or `debit` cards | 5-10 days
---
`netbanking` | 2-10 days
---
`upi` | 2-7 days

### Refund Fees

For Normal refunds, Razorpay does not charge any processing fee. However, the transaction fee and GST levied by Razorpay at the time of payment capture will not be reversed to your account (merchant's account).

## Dashboard and API Actions

You can perform the following actions:
- [Issue Normal refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos/refunds/issue.md)
- [View Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos/refunds/view.md)
- [Handle refund errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos/refunds/errors.md)

### Related Information

- [Add funds to your account to process refunds (low account balance)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/balances.md#add-funds-to-your-current-balance)
- [Refunds FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/pos/refunds/faqs.md)
