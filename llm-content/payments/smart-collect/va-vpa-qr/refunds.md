---
title: Refunds
description: Learn how to refund payments received on a virtual account.
---

# Refunds

You can create refunds for the payments received on a virtual account. Refunds are generally processed within 3-5 business days via the same mode used by your customer. The platform fee and GST charged on successful transactions will not be reversed in the case of refunds.

You can initiate refunds from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/dashboard/refund.md) or using [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/refunds.md).

## Refund Failures

There are some situations where it is **not** possible to refund a payment received on a virtual account. These are listed below:

- UPI payments initiated from UPI PSP apps such as Google Pay, PhonePe. Such payments do not show remitter bank account details and it is not possible to process a refund.

- IMPS Payments made from a small number of banks that do not share the payer's account number and such payments cannot be automatically refunded.

- Payments made from Non-Resident External (NRE) bank accounts. In such cases, Razorpay is not permitted to deposit money into the account and it is not possible to process a refund.

In each of these cases, if a refund is still necessary, you can obtain alternate bank account details from your customer and raise a request on the [Support Portal](https://razorpay.com/support/#request) to initiate a refund.
