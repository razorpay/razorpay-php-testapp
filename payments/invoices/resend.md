---
title: Resend an Invoice
description: Resend Invoices as a payment reminder or if the customer has not received the link.
---

# Resend an Invoice

You can resend an invoice as a payment reminder or just in case the customer has not received the link.

## Resend an Invoice Using Dashboard

Watch this video to see how to resend an invoice to a customer.

1. Log in to the Dashboard. Click on **Invoices**.
1. Search for the **Draft** invoice that you want to resend using the [search criteria](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/search.md).
1. Select the **Invoice Id**.
1. An invoice in `issued` status cannot be updated. However, you can change the **EXPIRY DATE**, **CUSTOMER NOTES** and **TERMS AND CONDITIONS**.
1. On the right-hand side panel, click **Resend Invoice**.

The invoice details along with the **Payment Link** is resent to the customer using which the customer can pay.

## Resend an Invoice Using API
You can resend `issued` invoices using [this](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/invoices.md#send-notifications/) API.

### Related Information
- [Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md)
- [How Invoices Work](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/how-it-works.md)
- [Invoices States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/states.md)
- [Create an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/create.md)
- [Search an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/search.md)
- [Update an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/update.md)
- [Duplicate an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/duplicate.md)
- [Delete an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/delete.md)
- [Cancel an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/cancel.md)
- [Download and Print an Invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/download-print.md)
- [Invoice APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices/apis.md)
